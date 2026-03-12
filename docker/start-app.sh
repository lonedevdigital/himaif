#!/usr/bin/env sh
set -eu

max_tries="${DB_WAIT_TRIES:-120}"
sleep_seconds="${DB_WAIT_SLEEP:-2}"
i=1

echo "Checking Laravel app files..."
test -f /var/www/html/artisan

echo "Waiting for MySQL at ${DB_HOST:-mysql}:${DB_PORT:-3306}..."
while [ "$i" -le "$max_tries" ]; do
  err="$(
  php -r '
    $host = getenv("DB_HOST") ?: "mysql";
    $port = getenv("DB_PORT") ?: "3306";
    $db = getenv("DB_DATABASE") ?: "db_hima";
    $user = getenv("DB_USERNAME") ?: "hima_app";
    $pass = getenv("DB_PASSWORD") ?: "";
    try {
        new PDO("mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4", $user, $pass, [PDO::ATTR_TIMEOUT => 3]);
        echo "ok";
        exit(0);
    } catch (Throwable $e) {
        fwrite(STDERR, $e->getMessage());
        exit(1);
    }
  ' 2>&1
  )"

  if [ "$err" = "ok" ]; then
    echo "MySQL is ready."
    break
  fi

  echo "MySQL not ready (${i}/${max_tries}): ${err}"
  i=$((i + 1))
  sleep "$sleep_seconds"
done

if [ "$i" -gt "$max_tries" ]; then
  echo "MySQL did not become ready in time."
  exit 1
fi

php artisan migrate --force --no-interaction
exec php artisan serve --host=0.0.0.0 --port=8000
