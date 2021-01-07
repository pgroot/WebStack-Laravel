#!/usr/bin/env bash

set -e


role=${CONTAINER_ROLE:-app}
env=${APP_ENV:-local}

if [ "$env" != "local" ]; then
    if [ ! -f '/var/www/html/storage/.init' ]; then
        (cd /var/www/html && php artisan key:generate && php artisan migrate:refresh --seed && php artisan webstack:clean && touch /var/www/html/storage/.init)
    fi
    echo "Caching configuration..."
    (cd /var/www/html && php artisan config:cache && php artisan route:cache && php artisan view:cache)
fi

if [ "$role" = "app" ]; then
    exec apache2-foreground
fi
