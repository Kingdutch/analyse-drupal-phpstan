#!/usr/bin/env php
<?php

$options = ['--unclassified', '--csv', '--quiet'];

$exit_with_usage = static function () use ($argv, $options) : never {
  $option_help = implode(" ", array_map(fn (string $o) => "[$o]", $options));
  fwrite(STDERR, "Usage: {$argv[0]} {$option_help} <baseline>" . PHP_EOL);
  exit(1);
};

$provided_options = [];
$provided_arguments = [];
for ($i = 1; $i < $argc; $i++) {
  if (str_starts_with($argv[$i], "--")) {
    if (!in_array($argv[$i], $options, TRUE)) {
      fwrite(STDERR, "Invalid option: {$argv[$i]}" . PHP_EOL . PHP_EOL);
      $exit_with_usage();
    }
    $provided_options[substr($argv[$i], 2)] = TRUE;
  }
  else {
    $provided_arguments[] = $argv[$i];
  }
}

if (count($provided_arguments) !== 1) {
  fwrite(STDERR, "Invalid argument count." . PHP_EOL . PHP_EOL);
  $exit_with_usage();
}

$print_unclassified = isset($provided_options['unclassified']);
$print_csv = isset($provided_options['csv']);
$quiet = isset($provided_options['quiet']);
$progress = !$quiet;

if ($print_unclassified && $print_csv) {
  fwrite(STDERR, "Can not print unclassified when outputting as CSV." . PHP_EOL . PHP_EOL);
  $exit_with_usage();
}

$baseline_file = reset($provided_arguments);

if (!file_exists($baseline_file)) {
  fwrite(STDERR, "Baseline file '$baseline_file' does not exist." . PHP_EOL);
  exit(1);
}

$baseline = require_once($baseline_file);

if (!is_array($baseline)) {
  fwrite(STDERR, "Baseline file '$baseline_file' should return an array." . PHP_EOL);
  exit(1);
}

if (!isset($baseline['parameters']) || !is_array($baseline['parameters']) || !isset($baseline['parameters']['ignoreErrors']) || !is_array($baseline['parameters']['ignoreErrors'])) {
  fwrite(STDERR, "Malformed baseline, expected returned array to be ['parameters' => ['ignoreErrors' => \$errors]].");
  exit(1);
}

$ignoredErrors = $baseline['parameters']['ignoreErrors'];
$ignoredErrorCount = count($ignoredErrors);
fwrite($print_csv ? STDERR : STDOUT, "Analysing {$ignoredErrorCount} ignored PHPStan errors" . PHP_EOL);

$errorClassification = require_once __DIR__ . '/classification.php';

$unclassified = 0;
$unclassified_messages = [];

/**
 * @param string $string
 * @param array{ starts_with?: string, contains?: string|list<string>, ends_with?: string } $conditions
 *
 * @return bool
 */
function satisfiesStringConditions(string $string, array $conditions) : bool {
  foreach ($conditions as $type => $needles) {
    // Allow certain conditions to be repeated (AND all).
    if (is_array($needles)) {
      if (!in_array($type, ['contains'], TRUE)) {
        throw new \RuntimeException("Cannot require multiple $type conditions.");
      }
    }
    else {
      $needles = [$needles];
    }

    $function = "str_$type";
    foreach ($needles as $needle) {
      if (!$function($string, $needle)) {
        return FALSE;
      }
    }
  }

  return TRUE;
}

/**
 * @param string $string
 * @param list<array{ starts_with?: string, contains?: string|list<string>, ends_with?: string }> $condition_sets
 *
 * @return bool
 */
function satisfiesAnyStringConditions(string $string, array $condition_sets) : bool {
  foreach ($condition_sets as $conditions) {
    if (satisfiesStringConditions($string, $conditions)) {
      return TRUE;
    }
  }

  return FALSE;
}

/**
 * @param array{ path: string, message: string } $error
 * @param array{
 *   path?:    array{ starts_with?: string, contains?: string|list<string>, ends_with?: string }|list<array{ starts_with?: string, contains?: string|list<string>, ends_with?: string }>,
 *   message?: array{ starts_with?: string, contains?: string|list<string>, ends_with?: string }|list<array{ starts_with?: string, contains?: string|list<string>, ends_with?: string }>,
 * } $criteria
 *
 * @return bool
 */
function errorMatchesCriteria(array $error, array $criteria) : bool {
  foreach ($criteria as $target => $match_ors) {
    if (!array_is_list($match_ors)) {
      $match_ors = [$match_ors];
    }
    if (!satisfiesAnyStringConditions($error[$target], $match_ors)) {
      return FALSE;
    }
  }

  return TRUE;
}

/**
 * @param mixed $baselineEntry
 *
 * @phpstan-assert array{ message: string, count: int, path: string } $baselineEntry
 */
function assertBaseline(mixed $baselineEntry) : void {
  assert(is_array($baselineEntry));
  assert(isset($baselineEntry['message']) && is_string($baselineEntry['message']));
  assert(isset($baselineEntry['count']) && is_int($baselineEntry['count']));
  assert(isset($baselineEntry['path']) && is_string($baselineEntry['path']));
}

$column = 0;
for ($i = 0; $i < $ignoredErrorCount; $i++) {
  // Show some progress indication every 100 errors.
  if ($progress && ($i % 100) === 0) {
    fwrite(STDERR, ".");
    if (++$column === 80) {
      fwrite(STDERR, PHP_EOL);
      $column = 0;
    }
  }

  $ignoredError = $ignoredErrors[$i];
  assertBaseline($ignoredError);

  $classifiedIssue = NULL;
  foreach ($errorClassification as $label => $error) {
    if (errorMatchesCriteria($ignoredError, $error['criteria'])) {
      // If we get here then at least one complete set of criteria matched for all
      // targets (e.g. both path and message) and we have classified the issue.
      $classifiedIssue = $label;
      break;
    }
  }

  if ($classifiedIssue !== NULL) {
    $errorClassification[$classifiedIssue]['count']++;
  }
  else {
    $unclassified++;
    $unclassified_messages[] = $ignoredError['message'];
  }
}

if (!$quiet) {
  fwrite($print_csv ? STDERR : STDOUT, PHP_EOL . PHP_EOL);
  foreach ($errorClassification as $error) {
    fwrite($print_csv ? STDERR : STDOUT, "{$error['count']}\t{$error['message']}" . PHP_EOL);
  }

  fwrite($print_csv ? STDERR : STDOUT, PHP_EOL . "$unclassified ignored errors without classification." . PHP_EOL);
}


if ($print_csv) {
  fputcsv(STDOUT, array_column($errorClassification, 'message'));
  fputcsv(STDOUT, array_column($errorClassification, 'count'));
}

// Only allowed when we want human readable output.
if ($print_unclassified) {
  echo PHP_EOL;
  sort($unclassified_messages);
  $occurrences = array_count_values($unclassified_messages);
  asort($occurrences);
  foreach ($occurrences as $error => $count) {
    echo "$count\t$error" . PHP_EOL;
  }
}
