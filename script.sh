#!/bin/bash

cp .env.example .env

composer install

echo "migrating tables"
./vendor/bin/sail artisan migrate

echo "seeding data"
./vendor/bin/sail artisan db:seed

echo "Server Ready"
./vendor/bin/sail up -d
echo "Queue Started"
sudo php artisan queue:work
