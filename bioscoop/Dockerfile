# Start with the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install the necessary packages for installing PDO extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable the Apache rewrite module (optional but often useful for PHP apps)
RUN a2enmod rewrite

# Copy application files to the container (if you want to use this Dockerfile to copy files)
COPY ./html /var/www/html

# Set proper file permissions (optional)
RUN chown -R www-data:www-data /var/www/html
