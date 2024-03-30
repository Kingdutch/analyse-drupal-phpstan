#!/usr/bin/env php
<?php

if (!isset($argv[1])) {
  fwrite(STDERR, "Usage: {$argv[0]} <baseline> [--unclassified]" . PHP_EOL);
  exit(1);
}

if (isset($argv[2])) {
  if ($argv[1] === "--unclassified") {
    $print_unclassified = TRUE;
    $baseline_file = $argv[2];
  }
  elseif ($argv[2] === "--unclassified") {
    $print_unclassified = TRUE;
    $baseline_file = $argv[1];
  }
  else {
    fwrite(STDERR, "Usage: {$argv[0]} <baseline> [--unclassified]" . PHP_EOL);
    exit(1);
  }
}
else {
  $print_unclassified = FALSE;
  $baseline_file = $argv[1];
}

if (!file_exists($baseline_file)) {
  fwrite(STDERR, "Baseline file '$baseline_file' does not exist." . PHP_EOL);
  exit(1);
}

$baseline = require_once($baseline_file);

if (!is_array($baseline)) {
  fwrite(STDERR, "Baseline file '$baseline_file' should return an array." . PHP_EOL);
  exit(1);
}

if (!isset($baseline['parameters']['ignoreErrors'])) {
  fwrite(STDERR, "Malformed baseline, expected returned array to be ['parameters' => ['ignoreErrors' => \$errors]].");
  exit(1);
}

$ignoredErrors = $baseline['parameters']['ignoreErrors'];
$ignoredErrorCount = count($ignoredErrors);
echo "Analysing {$ignoredErrorCount} ignored PHPStan errors" . PHP_EOL;

$missingFunctionReturn = 0;
$missingInterfaceMethodReturn = 0;
$missingOtherMethodReturn = 0;
$unreachable = 0;
$ifAlwaysTrue = 0;
$ifAlwaysFalse = 0;
$partialConditionAlways = 0;
$accessUndefinedPropertyObject = 0;
$accessUndefinedPropertyOthers = 0;
$methodCallOnMaybeNull = 0;
$methodCallOnMaybeFalse = 0;
$propertyAccessOnMaybeNull = 0;
$propertyAccessOnMaybeFalse = 0;
$incorrectReturn = 0;
$invalidTypeForeach = 0;
$binaryOperationError = 0;
$callToUndefined = 0;
$poisonousMixedType = 0;
$callToDeprecated = 0;
$callToUnneededAssert = 0;
$isArrayAlwaysFalse = 0;
$isArrayAlwaysTrue = 0;
$isBoolAlways = 0;
$isCallableAlways = 0;
$isIntAlways = 0;
$isNullAlways = 0;
$isNumericAlways = 0;
$isObjectAlways = 0;
$isResourceAlways = 0;
$isStringAlways = 0;
$isSubclassOfAlways = 0;
$methodExistsAlways = 0;
$propertyExistsAlways = 0;
$unneededPHPUnitAssert = 0;
$functionMissingParameterType = 0;
$methodMissingParameterType = 0;
$otherAlwaysTrue = 0;
$otherAlwaysFalse = 0;
$incorrectParam = 0;
$drupalLoginMaybeFalse = 0;

$unclassified = 0;
$unclassified_messages = [];

$column = 0;
for ($i = 0; $i < $ignoredErrorCount; $i++) {
  // Show some progress indication every 100 errors.
  if (($i % 100) === 0) {
    echo ".";
    if (++$column === 80) {
      echo PHP_EOL;
      $column = 0;
    }
  }

  $ignoredError = $ignoredErrors[$i];

  if (str_ends_with($ignoredError['message'], ' has no return type specified\.$#')) {
    if (str_starts_with($ignoredError['message'], "#^Function ", )) {
      $missingFunctionReturn++;
    }
    elseif (str_starts_with($ignoredError['message'], "#^Method ")) {
      if (str_ends_with($ignoredError['path'], "Interface.php")) {
        $missingInterfaceMethodReturn++;
      }
      else {
        $missingOtherMethodReturn++;
      }
    }
  }
  elseif (str_starts_with($ignoredError['message'], "#^Unreachable statement")) {
    $unreachable++;
  }
  elseif (str_contains($ignoredError['message'], "If condition is always true")) {
    $ifAlwaysTrue++;
  }
  elseif(str_contains($ignoredError['message'], "If condition is always false")) {
    $ifAlwaysFalse++;
  }
  elseif((str_starts_with($ignoredError['message'], "#^Right side of ") || str_starts_With($ignoredError['message'], "#^Leftside of ")) && (str_ends_with($ignoredError['message'], ' is always false\\.$#') || str_ends_with($ignoredError['message'], ' is always true\\.$#'))) {
    $partialConditionAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Access to an undefined property ')) {
    if (str_contains($ignoredError['message'], "property object")) {
      $accessUndefinedPropertyObject++;
    }
    else {
      $accessUndefinedPropertyOthers++;
    }
  }
  elseif (str_starts_with($ignoredError['message'], '#^Cannot call method ')) {
    if (str_ends_with($ignoredError['message'], '|null\\.$#')) {
      $methodCallOnMaybeNull++;
    }
    elseif (str_ends_with($ignoredError['message'], '|false\\.$#')) {
      $methodCallOnMaybeFalse++;
    }
    else {
      $unclassified++;
    }
  }
  elseif (str_starts_with($ignoredError['message'], '#^Cannot access property ')) {
    if (str_ends_with($ignoredError['message'], '|null\\.$#')) {
      $propertyAccessOnMaybeNull++;
    }
    elseif (str_ends_with($ignoredError['message'], '|false\\.$#')) {
      $propertyAccessOnMaybeFalse++;
    }
    else {
      $unclassified++;
    }
  }
  elseif (str_contains($ignoredError['message'], ' should return ') && str_contains($ignoredError['message'], ' but returns ')) {
    $incorrectReturn++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Argument of an invalid type ') && str_ends_with($ignoredError['message'], ' supplied for foreach, only iterables are supported\.$#')) {
    $invalidTypeForeach++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Binary operation ') && str_ends_with($ignoredError['message'], ' results in an error\.$#')) {
    $binaryOperationError++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to an undefined method ')) {
    $callToUndefined++;
  }
  elseif (str_ends_with($ignoredError['message'], ' on mixed\.$#')) {
    $poisonousMixedType++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to deprecated ')) {
    $callToDeprecated++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function assert\(\) ')) {
    $callToUnneededAssert++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function is_array\(\) with ')) {
    if (str_ends_with($ignoredError['message'], ' will always evaluate to false\.$#')) {
      $isArrayAlwaysFalse++;
    }
    else {
      $isArrayAlwaysTrue++;
    }
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function is_bool\(\) ')) {
    $isBoolAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function is_callable\(\) ')) {
    $isCallableAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function is_int\(\) ')) {
    $isIntAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function is_null\(\) ')) {
    $isNullAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function is_numeric\(\) ')) {
    $isNumericAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function is_object\(\) ')) {
    $isObjectAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function is_resource\(\) ')) {
    $isResourceAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function is_string\(\) ')) {
    $isStringAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function is_subclass_of\(\) ')) {
    $isSubclassOfAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function method_exists\(\) ')) {
    $methodExistsAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to function property_exists\(\) ')) {
    $propertyExistsAlways++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Call to method PHPUnit\\\\Framework\\\\Assert\:\:assert')) {
    $unneededPHPUnitAssert++;
  }
  elseif (str_ends_with($ignoredError['message'], ' with no type specified\.$#') && str_contains($ignoredError['message'], ' has parameter ')) {
    if (str_starts_with($ignoredError['message'], '#^Function ')) {
      $functionMissingParameterType++;
    }
    elseif (str_starts_with($ignoredError['message'], '#^Method ')) {
      $methodMissingParameterType++;
    }
    else {
      $unclassified++;
    }
  }
  elseif (str_ends_with($ignoredError['message'], ' is always true\.$#') || str_ends_with($ignoredError['message'], ' is always evaluate to true\.$#')) {
    $otherAlwaysTrue++;
  }
  elseif (str_ends_with($ignoredError['message'], ' is always false\.$#') || str_ends_with($ignoredError['message'], ' is always evaluate to false\.$#')) {
    $otherAlwaysFalse++;
  }
  elseif (str_starts_with($ignoredError['message'], '#^Parameter \#1 ') && str_contains($ignoredError['message'], 'drupalLogin')) {
    $drupalLoginMaybeFalse++;
  }
  elseif (str_starts_with($ignoredError['message'], "#^Parameter ") && str_contains($ignoredError['message'], ' expects ') && str_ends_with($ignoredError['message'], ' given\.$#')) {
    $incorrectParam++;
  }
  else {
    $unclassified++;
    $unclassified_messages[] = $ignoredError['message'];
  }
}

echo PHP_EOL . PHP_EOL;
echo "$missingFunctionReturn functions without a return type specified." . PHP_EOL;
echo "$missingInterfaceMethodReturn methods on interfaces without a return type specified." . PHP_EOL;
echo "$missingOtherMethodReturn methods on other classes without a return type specified." . PHP_EOL;
echo "$unreachable unreachable pieces of code." . PHP_EOL;
echo "$ifAlwaysTrue if-statements that will always be TRUE." . PHP_EOL;
echo "$ifAlwaysFalse if-statements that will always be FALSE." . PHP_EOL;
echo "$partialConditionAlways partial conditions always TRUE/FALSE." . PHP_EOL;
echo "$accessUndefinedPropertyObject undefined property accesses on an object." . PHP_EOL;
echo "$accessUndefinedPropertyOthers undefined property accesses on other things." . PHP_EOL;
echo "$methodCallOnMaybeNull method calls on values that may be NULL." . PHP_EOL;
echo "$methodCallOnMaybeFalse method calls on values that may be FALSE." . PHP_EOL;
echo "$propertyAccessOnMaybeNull property access on values that may be NULL." . PHP_EOL;
echo "$propertyAccessOnMaybeFalse property access on values that may be FALSE." . PHP_EOL;
echo "$incorrectReturn values returned that don't match the return type." . PHP_EOL;
echo "$invalidTypeForeach invalid types supplied to foreach." . PHP_EOL;
echo "$binaryOperationError binary operations resulting in error." . PHP_EOL;
echo "$callToUndefined calls to undefined method (usually value is not of specific enough type)." . PHP_EOL;
echo "$poisonousMixedType unsupported operation on mixed type." . PHP_EOL;
echo "$callToDeprecated calls to undefined function/method." . PHP_EOL;
echo "$callToUnneededAssert calls to assert which isn't needed." . PHP_EOL;
echo "$isArrayAlwaysFalse calls to is_array which are always FALSE." . PHP_EOL;
echo "$isArrayAlwaysTrue calls to is_array which are always TRUE." . PHP_EOL;
echo "$isBoolAlways unnecessary calls to is_bool." . PHP_EOL;
echo "$isCallableAlways unnecessary calls to is_callable." . PHP_EOL;
echo "$isIntAlways unnecessary calls to is_int." . PHP_EOL;
echo "$isNullAlways unnecessary calls to is_null." . PHP_EOL;
echo "$isNumericAlways unnecessary calls to is_numeric." . PHP_EOL;
echo "$isObjectAlways unnecessary calls to is_object." . PHP_EOL;
echo "$isResourceAlways unnecessary calls to is_resource." . PHP_EOL;
echo "$isStringAlways unnecessary calls to is_string." . PHP_EOL;
echo "$isSubclassOfAlways unnecessary calls to is_subclass_of." . PHP_EOL;
echo "$methodExistsAlways unnecessary calls to method_exists." . PHP_EOL;
echo "$propertyExistsAlways unnecessary calls to property_exists." . PHP_EOL;
echo "$unneededPHPUnitAssert unnecessary PHPUnit Assert." . PHP_EOL;
echo "$functionMissingParameterType functions with missing parameter type." . PHP_EOL;
echo "$methodMissingParameterType method with missing parameter type." . PHP_EOL;
echo "$otherAlwaysTrue other statements are always TRUE." . PHP_EOL;
echo "$otherAlwaysFalse other statements are always FALSE." . PHP_EOL;
echo "$drupalLoginMaybeFalse drupalLogin calls may receive FALSE." . PHP_EOL;
echo "$incorrectParam incorrect type of parameter provided for method call." . PHP_EOL;

echo PHP_EOL . "$unclassified ignored errors without classification." . PHP_EOL;

if ($print_unclassified) {
  echo PHP_EOL;
  sort($unclassified_messages);
  $occurrences = array_count_values($unclassified_messages);
  asort($occurrences);
  foreach ($occurrences as $error => $count) {
    echo "$count\t$error" . PHP_EOL;
  }
}
