FROM php:7.4-fpm-alpine

RUN apk --update --no-cache add curl libzip-dev freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && rm -rf /var/cache/apk/* && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install bcmath && \
    docker-php-ext-install zip && \
    docker-php-ext-install opcache && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j "$(nproc)" gd && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && \
    composer global require hirak/prestissimo

RUN apk add git && \
    git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis && \
    docker-php-ext-install redis