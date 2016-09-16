#!/usr/bin/env bash

# Laravel optimizations
php artisan config:cache && php artisan route:cache && php artisan optimize --force

# optimize assets
ASSETS_DIR="public/build"

# gzip assets
bash assets_gzip.sh $ASSETS_DIR

# brotli assets
bash assets_brotli.sh $ASSETS_DIR

# set rights for "www-data" user
chmod -R a-rwx,u+rwX,g+rX $ASSETS_DIR && chown www-data:www-data -R $ASSETS_DIR