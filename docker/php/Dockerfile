FROM php:7.3-fpm

RUN apt-get update --fix-missing \
    && apt-get install -y libncurses-dev apt-utils libxml2-dev vim \
        libcurl3-dev pkg-config zlib1g-dev libzip-dev wget git \
    && docker-php-ext-install iconv curl mbstring xml json mysqli pdo pdo_mysql zip \
    && apt-get purge -y --auto-remove \
    && rm -rf /var/cache/apt/* \
    && rm -rf /var/lib/apt/lists/* \
    && rm -rf /pecl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
