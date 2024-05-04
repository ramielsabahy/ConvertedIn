

## ConvertedIn Task

## Installation Steps (I prefer having docker and using `sh InstallWithDocker.sh`)
- If you are using docker run this command on linux or mac `sh InstallWithDocker.sh`
- If you are not using docker run this command on linux or mac `sh Install.sh`
- Else you can install using the way with docker and sail
  - `composer install`
  - `./vendor/bin/sail up`
  - `./vendor/bin/sail artisan migrate --seed`
  - `npm install`
  - `npm run dev`

### The Project is hosted on AWS and you can access it here [http://3.8.182.224/](http://3.8.182.224/)


## Technologies used in this project

- Laravel 11 (latest)
- Laravel sail
- Docker based on laravel sail
- PHP version 8.2
- PHPUnit for unit test
- MySQL as a DBMS
- AWS (Free Tier) as a hosting platform

## About the architecture which i used
- ##### I used service oriented architecture to make it easy for everyone who maintains this code
- ##### Made some unit tests to showcase how a unit test could be implemented

## For testing, you can use the following user (the passwords is `password`)

- admin@admin.com
