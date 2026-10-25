#!/bin/sh
set -e

echo "Starting Little Sprouts Nursery Application..."

# Create storage symlink
php artisan storage:link || true

# Check if database migrations should be run
if [ "$RUN_MIGRATIONS" = "true" ] || [ -n "$DB_HOST" ]; then
    echo "Running database migrations..."
    php artisan migrate --force || true
fi

# Cache configuration, routes, and views for production
if [ "$APP_ENV" = "production" ]; then
    echo "Caching configuration and routes..."
    php artisan config:cache || true
    php artisan route:cache || true
    php artisan view:cache || true
fi

echo "Starting PHP-FPM..."
php-fpm -D

echo "Starting Nginx on port 8000..."
exec nginx -g "daemon off;"
