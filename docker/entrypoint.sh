#!/bin/sh
set -e

cd /var/www/html

# Create storage symlink
php artisan storage:link --force 2>/dev/null || true

# Run migrations
php artisan migrate --force

# Clear and cache config for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start supervisor (nginx + php-fpm)
exec supervisord -c /etc/supervisord.conf
