FROM php:7.3-fpm

RUN apt update \
    && apt install -y --no-install-recommends libzip-dev libpng-dev mysql-client git unzip \
    && docker-php-ext-install pdo_mysql zip gd sockets bcmath > /dev/null \
    && docker-php-ext-configure zip --with-libzip \
    && curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && apt clean && rm -rf /var/lib/apt/lists/*

WORKDIR /app
