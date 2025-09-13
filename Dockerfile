# Stage 1: Build assets
FROM node:18 as build

WORKDIR /app
COPY package*.json vite.config.* ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: PHP + Laravel
FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    libpq-dev git unzip curl libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .
COPY --from=build /app/public/build ./public/build  # copy css/js đã build

RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data storage bootstrap/cache

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 10000
CMD ["sh", "/entrypoint.sh"]
