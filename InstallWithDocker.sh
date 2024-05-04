#!/bin/bash

cp .env.docker .env

composer install

npm install
npm run build

echo "starting sail"
./vendor/bin/sail up -d

echo "migrating tables"
./vendor/bin/sail artisan migrate

echo "seeding data"
./vendor/bin/sail artisan db:seed

echo "Server Ready"

echo "Queue Started"
./vendor/bin/sail artisan queue:work
