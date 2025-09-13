#!/bin/sh
set -e

# Chờ Postgres sẵn sàng
until nc -z -v -w30 $DB_HOST $DB_PORT
do
  echo "⏳ Waiting for Postgres at $DB_HOST:$DB_PORT..."
  sleep 5
done

echo "✅ Database is up!"

# Chạy migrate + seed StudentSeeder
php artisan migrate --force
php artisan db:seed --class=StudentSeeder --force

# Start Laravel server
php artisan serve --host=0.0.0.0 --port=8000
