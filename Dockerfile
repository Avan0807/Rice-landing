# PHP 8.2 + Apache
FROM php:8.2-apache

# Enable mod_rewrite cho Laravel
RUN a2enmod rewrite

# Extensions cần thiết
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo pdo_mysql zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Đặt DocumentRoot = public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
  /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf

WORKDIR /var/www/html

# Copy code
COPY . .

# Cài vendor PHP
RUN composer install --no-dev --optimize-autoloader

# Quyền ghi cho storage/cache
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]
