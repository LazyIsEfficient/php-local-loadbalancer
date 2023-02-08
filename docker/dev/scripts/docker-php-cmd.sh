#!/bin/sh

composer install --prefer-dist --no-ansi --no-interaction

php-fpm
