FROM php-8.1-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www
WORKDIR /var/www
RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "zip"]
RUN ["apt-get", "install", "-y", "unzip"]

COPY . /var/www