FROM php:8.0-fpm-alpine

RUN apk add --no-cache postgresql-dev fcgi git unzip \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
