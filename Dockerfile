FROM php:8.1-fpm

# Copy the application code
COPY . /var/www/html

# Ensure the database directory is writable
RUN mkdir -p /var/www/html/database && chown -R www-data:www-data /var/www/html/database

# Expose port 9000 for FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]