# Portonics Limited Project Test

## Prerequisites
This software needs to be installed in your system before proceeding next step:
- Docker
- Docker Compose

## Tools
- PHP 8.2
- MySQL 8.0
- Redis
- `friendsofphp/php-cs-fixer`: PSR-12
- `phpunit/phpunit`: Unit testing

## Installation
Run these commands one by one from root directory to up and running this PHP project with docker compose with dummy data:
- `docker compose build --no-cache`
- `docker compose up -d`
- `docker compose exec portonics-online-project.test composer install`
- `docker compose exec portonics-online-project.test php artisan migrate`
- `docker compose exec portonics-online-project.test php artisan db:seed`

## Usage
This application will be up and running to this address: http://localhost/. You may visit that local address to test the PHP application from web interface or use this postman collection: https://documenter.getpostman.com/view/1974679/2sA3JQ5L9B.
