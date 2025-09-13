#!/bin/sh
set -e

# Chờ Postgres sẵn sàng
until nc -z -v -w30 $DB_HOST $DB_PORT
do
  echo "⏳ Waiting for Postgres at $DB_HOST:$DB_PORT..."
  sleep 5
done

echo "✅ Database is up!"

# Chạy migrate + seed StudentsSeeder
php artisan migrate --force
php artisan db:seed --class=StudentsSeeder --force

# Start Laravel server
php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
