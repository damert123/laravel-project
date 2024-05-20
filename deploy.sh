#!/bin/bash

set -e



echo "Deploying..."


git pull origin master

php8.1 composer.phar install --no-dev --optimize-autoloader

php8.1 artisan down


php8.1 artisan migrate: --force

php8.1 artisan config:cache

php8.1 artisan view:cache

php8.1 artisan route:cache

php8.1 artisan up

echo "Done !!"



