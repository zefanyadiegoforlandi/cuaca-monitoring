# Menggunakan PHP 8.3 FPM
FROM php:8.3-fpm

WORKDIR /var/www/html/cuaca-monitoring

# Copy file composer.json dan composer.lock
COPY composer.* ./

# Install ekstensi yang diperlukan oleh Laravel
RUN apt-get update && apt-get install -y \
    build-essential \
    libmcrypt-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    vim \
    zip \
    unzip \
    git \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install pdo pdo_mysql mbstring gd zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy seluruh file Laravel ke dalam container
COPY . .

# Install dependensi menggunakan Composer
RUN composer install --no-interaction --prefer-dist

# Membuat pengguna dan grup untuk aplikasi
RUN groupadd -g 1000 www && \
    useradd -u 1000 -ms /bin/bash -g www www

# Setel pemilik file untuk pengguna www
RUN chown -R www:www /var/www/html/cuaca-monitoring

USER www

# Expose port 80 untuk Nginx
EXPOSE 80

# Jalankan Nginx dan PHP-FPM ketika container dijalankan
CMD ["php-fpm"]
