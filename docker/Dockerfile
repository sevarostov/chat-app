FROM php:8.3-cli

ENV DEBIAN_FRONTEND=noninteractive

RUN echo "deb http://ru.archive.ubuntu.com/ubuntu jammy main restricted" > /etc/apt/sources.list && \
        echo "deb http://ru.archive.ubuntu.com/ubuntu jammy-updates main restricted" >> /etc/apt/sources.list && \
        echo "deb http://ru.archive.ubuntu.com/ubuntu jammy universe" >> /etc/apt/sources.list && \
        echo "deb http://ru.archive.ubuntu.com/ubuntu jammy-updates universe" >> /etc/apt/sources.list && \
        echo "deb http://ru.archive.ubuntu.com/ubuntu jammy multiverse" >> /etc/apt/sources.list && \
        echo "deb http://ru.archive.ubuntu.com/ubuntu jammy-updates multiverse" >> /etc/apt/sources.list && \
        echo "deb http://ru.archive.ubuntu.com/ubuntu jammy-backports main restricted universe multiverse" >> /etc/apt/sources.list

RUN pecl install xdebug-3.2.1 \
	&& docker-php-ext-enable xdebug

FROM php:8.3-fpm as php

RUN apt update  \
    && docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli


WORKDIR /var/www/html

COPY php.ini /usr/local/etc/php/



