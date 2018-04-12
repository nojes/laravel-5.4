#!/usr/bin/env bash

if [ ! -d /var/www/laravel-employees/vendor ]
then
    composer install
fi

php-fpm
