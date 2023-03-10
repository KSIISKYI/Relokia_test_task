FROM php:7.4-fpm

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN set -eux

# apt update
RUN apt update

# install git
RUN apt-get install -y git

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
