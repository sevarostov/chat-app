FROM php:8.3-fpm as php

RUN apt update  \
    && docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

WORKDIR /var/www/html




