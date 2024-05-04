#!/bin/bash

cp .env.example .env

composer install

npm install
npm run build

# Prompt the user for database credentials
read -p "Enter your database name (DB_DATABASE): " db_name
read -p "Enter your database username (DB_USERNAME): " db_username
read -sp "Enter your database password (DB_PASSWORD): " db_password
echo

# Update the .env file with database credentials
sed -i "s/DB_DATABASE=.*/DB_DATABASE=$db_name/" .env
sed -i "s/DB_USERNAME=.*/DB_USERNAME=$db_username/" .env
sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=$db_password/" .env

echo "Server Ready"
php artisan serve &
echo "Migration Started"
php artisan migrate &
echo "migration Finished Successfully"
echo "Queue Started"
php artisan queue:work --daemon --timeout=3000 &
