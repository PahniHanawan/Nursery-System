# Stage 1: Build frontend assets
FROM node:22-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: PHP 8.5-FPM + Nginx
FROM php:8.5-fpm

# Install system packages & Nginx
RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    git \
    curl \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql mbstring zip opcache bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application code
COPY . /var/www/html

# Copy compiled frontend assets from Stage 1
COPY --from=frontend /app/public/build /var/www/html/public/build

# Copy Nginx server configuration
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Install PHP dependencies for production
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set directory permissions for web server
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod +x /var/www/html/docker/entrypoint.sh

# Koyeb default listening port
EXPOSE 8000

ENTRYPOINT ["/var/www/html/docker/entrypoint.sh"]
