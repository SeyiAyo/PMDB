#!/bin/bash
export DB_CONNECTION=sqlite
export DB_DATABASE=/home/runner/workspace/database/database.sqlite
export SESSION_DRIVER=file
export QUEUE_CONNECTION=sync
export CACHE_STORE=file

# Run migrations
php artisan migrate --force 2>/dev/null

# Build frontend assets
npm run build 2>/dev/null

# Start Laravel on port 5000
php artisan serve --host=0.0.0.0 --port=5000
