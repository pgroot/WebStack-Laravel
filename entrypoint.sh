#!/usr/bin/env bash

set -e


role=${CONTAINER_ROLE:-app}
env=${APP_ENV:-local}

if [ "$env" != "local" ]; then
    echo "Caching configuration..."
    (cd /var/www/html && php artisan config:cache && php artisan route:cache && php artisan view:cache)
fi

if [ "$role" = "app" ]; then
    exec apache2-foreground
fi
