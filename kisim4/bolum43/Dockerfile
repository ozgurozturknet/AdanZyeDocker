FROM php:7.3-apache
RUN apt-get update -y && apt-get install mariadb-client-10.3 -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN mkdir /var/www/html/images
RUN chmod 777 /var/www/html/images
COPY ./php/ /var/www/html/