#!/bin/bash

cp .env.example .env

composer install

npm install
npm run dev

# config name database
sed -i -e 's/DB_DATABASE=laravel//g' .env
echo -n "Enter a database name > "
read database
sed  -i "12i  DB_DATABASE=$database" .env

# config username
sed -i -e 's/DB_USERNAME=root//g' .env
echo -n "Enter a  username > "
read username
sed  -i "12i  DB_DATABASE=$username" .env

# config password
sed -i -e 's/DB_PASSWORD=//g' .env
echo -n "Enter  password > "
read password
sed  -i "12i  DB_DATABASE=$password" .env

echo "Server Ready"
sudo php artisan serve &
echo "Migration Started"
sudo php artisan migrate &
echo "migration Finished Successfully"
echo "Queue Started"
sudo php artisan queue:work --daemon --timeout=3000 &
