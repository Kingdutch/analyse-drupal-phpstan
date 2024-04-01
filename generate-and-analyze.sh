#/usr/bin/env bash
set -e
# Fix an issue on Apple which runs bash as zsh.
set +o posix

if [[ $# -ne 3 ]]; then
  echo "Invalid arguments" 1>&2
  echo "" 1>&2
  echo "usage: ${BASH_SOURCE[0]} phpstan_level start_branch end_branch" 1>&2
  echo "" 1>&2
  echo "  phpstan_level     The PHPStan level to analyse at" 1>&2
  echo "" 1>&2
  echo "  start_branch      The branch from which to start" 1>&2
  echo "" 1>&2
  echo "  end_branch        The branch from which to end" 1>&2
  echo "" 1>&2
  exit 1
fi

PHPSTAN_LEVEL="$1"
START_BRANCH="$2"
END_BRANCH="$3"

SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )"
PROJECT_DIR="$SCRIPT_DIR/workdir/project"

if [ ! -d "$PROJECT_DIR" ]; then
  echo "Expected project directory at '$PROJECT_DIR'." 1>&2
  echo "" 1>&2
  echo "Hint: clone the project you wish to analyse into the directory." 1>&2
  echo "" 1>&2
  exit 1
fi

# Go into our project checkout folder.
cd "$PROJECT_DIR"

BASELINE_FILE="../.phpstan-baseline.${PHPSTAN_LEVEL}.php"
RESULT_FILE="../../results/$(basename "$START_BRANCH")-$(basename "$END_BRANCH")-$PHPSTAN_LEVEL.csv"

rm -f $RESULT_FILE

REV_COUNT=`git rev-list --reverse --topo-order "${START_BRANCH}...${END_BRANCH}" | wc -l`
echo "Starting to process $REV_COUNT commits"

while read -r rev; do
    git config advice.detachedHead false
    git checkout "$rev" >/dev/null

    # Install dependencies with composer.
    composer install >/dev/null

    # Ensure our level is available.
    cp "../../levels/phpstan.${PHPSTAN_LEVEL}.neon" "phpstan.neon"

    # Copy a baseline file if one exists from a previous check, this speeds up
    # future baseline generation by allowing the PHPStan cache to remain intact.
    if [[ -f "$BASELINE_FILE" ]]; then
      cp "$BASELINE_FILE" "./.phpstan-baseline.php"
    # Otherwise start with an empty baseline.
    else
      cp "../../levels/.phpstan-baseline.php" "./.phpstan-baseline.php"
    fi

    # Generate a baseline with PHPStan.
    vendor/bin/phpstan --memory-limit=-1 --generate-baseline=.phpstan-baseline.php # >/dev/null

    # Store the baseline for the next commit.
    cp .phpstan-baseline.php "$BASELINE_FILE"

    # Analyse the baseline and collect the output.
    OUTPUT=`../../analysis.php --csv --quiet .phpstan-baseline.php`

    RESULT=`echo "$OUTPUT" | tail -n1`

    # If the result file does not exist we output the header.
    if [[ ! -f "$RESULT_FILE" ]]; then
      HEADER=`echo "$OUTPUT" | head -n1`
      echo -n "\"commit\"," > "$RESULT_FILE"
      echo "$HEADER" >> "$RESULT_FILE"
    fi

    # Add the result to the result file.
    echo -n "\"$rev\"," >> "$RESULT_FILE"
    echo "$RESULT" >> "$RESULT_FILE"
done < <(git rev-list --reverse --topo-order "${START_BRANCH}...${END_BRANCH}")
