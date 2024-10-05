# Menggunakan PHP 8.1 FPM
FROM php:8.1-fpm

# Install ekstensi yang diperlukan oleh Laravel dan Nginx
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring gd zip

# Install Composer
COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy seluruh file Laravel ke dalam container
COPY . .

# Berikan izin penulisan pada folder Laravel tertentu
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Salin file konfigurasi Nginx
COPY nginx/default.conf /etc/nginx/conf.d/default.conf

# Expose port 80 untuk Nginx
EXPOSE 80

# Jalankan Nginx dan PHP-FPM ketika container dijalankan
CMD ["sh", "-c", "service nginx start && php-fpm"]
