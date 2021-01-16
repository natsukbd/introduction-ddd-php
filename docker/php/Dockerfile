FROM php:8-fpm

WORKDIR /root

RUN apt-get update && apt-get install -y libicu-dev && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install intl pdo_mysql opcache