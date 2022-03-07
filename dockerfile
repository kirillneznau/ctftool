FROM php:7.4-apache
RUN docker-php-source extract && docker-php-ext-install mysqli && docker-php-source delete
WORKDIR /var/www/html
COPY . /var/www/html/
EXPOSE 80