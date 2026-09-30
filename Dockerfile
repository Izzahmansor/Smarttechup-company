FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy all project files to Apache root
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
