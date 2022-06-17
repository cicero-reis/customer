#!/bin/sh

cp. env.exemple .env

php artisan cache:clear
php artisan config:clear
php artisan key:generate

