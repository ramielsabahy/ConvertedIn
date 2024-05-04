#!/bin/bash

cp .env.example .env

composer install

npm install
npm run dev

echo "migrating tables"
./vendor/bin/sail artisan migrate

echo "seeding data"
./vendor/bin/sail artisan db:seed

echo "Server Ready"
./vendor/bin/sail up -d
echo "Queue Started"
./vendor/bin/sail artisan queue:work
