#!/bin/sh
set -e

# Run migrations + seed
php artisan migrate --force
php artisan db:seed --force

# Start Laravel with the correct Render port
php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
