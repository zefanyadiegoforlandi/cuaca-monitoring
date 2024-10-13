
# Menggunakan PHP 8.1 FPM
FROM php:8.3-fpm

COPY composer.* /var/www/html/cuaca-monitoring/

WORKDIR /var/www/html/cuaca-monitoring

# Install ekstensi yang diperlukan oleh Laravel dan Nginx
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

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www

RUN useradd -u 1000 -ms /bin/bash -g www www


# Copy seluruh file Laravel ke dalam container
COPY . .

COPY --chown=www:www . .

USER www

# Expose port 80 untuk Nginx
EXPOSE 80

# Jalankan Nginx dan PHP-FPM ketika container dijalankan
CMD ["php-fpm"]


