# PHP 8.2 + Apache
FROM php:8.2-apache

# Bật mod_rewrite cho Laravel (RewriteRule trong public/.htaccess)
RUN a2enmod rewrite

# Cài các extension Laravel thường cần
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo pdo_mysql zip

# Cài Composer (từ image composer chính thức)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Đặt DocumentRoot = public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
  /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf

# Thư mục làm việc
WORKDIR /var/www/html

# Copy code vào image
COPY . .

# Cài vendor PHP (không cài dev) + autoload tối ưu
RUN composer install --no-dev --optimize-autoloader

# Quyền ghi cho storage & cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port (Render tự map cổng ngoài → 80 trong container)
EXPOSE 80

# Chạy Apache (sẽ serve file public/index.php)
CMD ["apache2-foreground"]
