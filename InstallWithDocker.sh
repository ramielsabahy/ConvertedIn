#!/bin/bash

cp .env.example .env

composer install

npm install
npm run dev

echo "migrating tables"
php artisan migrate

echo "seeding data"
php artisan db:seed

echo "Server Ready"
php artisan serve

echo "Queue Started"
php artisan queue:work
