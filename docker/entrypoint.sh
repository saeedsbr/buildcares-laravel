#!/bin/sh

cd /var/www/html

# Wait for database (max 60s)
if [ -n "${DB_HOST}" ]; then
  echo "Waiting for database at ${DB_HOST}:${DB_PORT:-3306}..."
  i=0
  while [ $i -lt 20 ]; do
    if php -r "new PDO('mysql:host=${DB_HOST};port=${DB_PORT:-3306};dbname=${DB_DATABASE}', '${DB_USERNAME}', '${DB_PASSWORD}');" 2>/dev/null; then
      echo "Database ready."
      break
    fi
    i=$((i+1))
    echo "Attempt $i/20, retrying in 3s..."
    sleep 3
  done
fi

# Run Laravel bootstrap commands (never exit on failure)
php artisan storage:link --force 2>/dev/null || true
php artisan migrate --force 2>/dev/null || true
php artisan config:cache 2>/dev/null || true
php artisan route:cache 2>/dev/null || true
php artisan view:cache 2>/dev/null || true

echo "Starting supervisord..."
exec supervisord -c /etc/supervisord.conf
