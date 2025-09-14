set -e

# Chạy migrate + seed StudentsSeeder
php artisan migrate --force
php artisan db:seed --class=StudentsSeeder --force

# Start Laravel server
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
