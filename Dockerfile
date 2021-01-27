FROM php:7.4.9-apache

RUN apt-get update -y

RUN docker-php-ext-install -j$(nproc) pdo pdo_mysql mysqli

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www

EXPOSE 80
