#!/bin/sh
set -e

cd /var/www/html

# Wait for database to be ready
echo "Waiting for database..."
until php -r "new PDO('mysql:host=${DB_HOST:-db};port=${DB_PORT:-3306};dbname=${DB_DATABASE:-buildcares}', '${DB_USERNAME:-buildcares}', '${DB_PASSWORD}');" 2>/dev/null; do
  echo "Database not ready, retrying in 3s..."
  sleep 3
done
echo "Database is ready."

# Create storage symlink
php artisan storage:link --force 2>/dev/null || true

# Run migrations
php artisan migrate --force || echo "Migration failed, continuing..."

# Clear and cache config for production
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Start supervisor (nginx + php-fpm)
exec supervisord -c /etc/supervisord.conf
