#!/usr/bin/env bash

set -e


role=${CONTAINER_ROLE:-app}
env=${APP_ENV:-production}

if [ "$role" = "app" ]; then
    exec apache2-foreground
fi
