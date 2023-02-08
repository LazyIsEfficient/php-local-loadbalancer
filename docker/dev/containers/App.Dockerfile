FROM php:8.1.2-fpm-alpine3.15

COPY ./docker/dev/php/php.ini-overrides /usr/local/etc/php/conf.d/custom-php-overrides.ini
COPY ./docker/dev/scripts/docker-php-cmd.sh /usr/local/bin/docker-php-cmd

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN apk add zip unzip

RUN chmod +x /usr/local/bin/docker-php-cmd && \
    chmod 755 /usr/local/bin/docker-php-cmd

CMD ["docker-php-cmd"]