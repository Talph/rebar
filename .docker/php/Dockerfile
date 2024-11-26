FROM php:8.2-fpm as rebar

RUN apt-get update \
    && apt-get install -y libzip-dev git curl libpng-dev libonig-dev libxml2-dev unzip \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd \
    && docker-php-ext-configure zip

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/rebar

# Copy the existing application directory contents
COPY . /var/www/rebar

COPY ./composer.* ./

RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction --optimize-autoloader

# RUN chmod -R 777 ./storage/ ./bootstrap/

FROM rebar as rebar_dev

ENV XDEBUG_MODE=off

COPY ./.docker/php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN pecl install xdebug-3.2.1  \
    && docker-php-ext-enable xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

# Expose port 9000 to Nginx
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
