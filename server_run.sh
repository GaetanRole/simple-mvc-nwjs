#!/usr/bin/env bash

## Install vendor and run PHP built-in server
composer install
php -S localhost:8000 -t public/
