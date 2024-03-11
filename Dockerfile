FROM --platform=linux/amd64 php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and npm
RUN apt-get update && apt-get install -y \
    nodejs \
    npm

# Set the ServerName directive to suppress Apache warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy package.json and package-lock.json
COPY package*.json /var/www/

# Set ownership and permissions
RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www
RUN chmod -R 777 /var/www

# Set working directory
WORKDIR /var/www

# Update packages and install zip
RUN apt-get update && apt-get install -y zip unzip

# Copy composer files and install dependencies
COPY composer.json composer.lock /var/www/
RUN composer install --no-interaction --no-scripts --no-autoloader

# Copy the rest of the application files
COPY . /var/www

# Install npm packages
RUN npm install
