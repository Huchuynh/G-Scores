# Base image PHP (có FPM)
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    curl \
    libzip-dev \
    netcat-traditional \
    && docker-php-ext-install pdo pdo_pgsql zip \
    && docker-php-ext-enable pdo_pgsql

# Cài Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy toàn bộ source
COPY . .

# Cài Laravel dependencies
RUN composer install --no-dev --no-interaction --optimize-autoloader

# Set quyền cho storage & bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port
EXPOSE 8000

# Copy entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

CMD ["entrypoint.sh"]
