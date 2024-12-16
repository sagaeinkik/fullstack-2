#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

#echo "generating application key..."
#php artisan key:generate --show
while true; do
    php artisan serve --host=0.0.0.0 --port=$PORT
    sleep 1
done

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force
