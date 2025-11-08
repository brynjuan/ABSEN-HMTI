# Tahap 1: Base Image dengan PHP 8.2 dan Apache
FROM php:8.2-apache AS base

# Instal dependensi sistem yang umum dibutuhkan
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Instal ekstensi PHP yang dibutuhkan Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql gd zip bcmath

# Instal Composer (Manajer paket PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Atur working directory
WORKDIR /var/www/html

# Tahap 2: Build dependensi Composer
FROM base AS composer_deps
COPY database/ database/
COPY routes/ routes/
COPY composer.json composer.lock ./
# Instal dependensi composer
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

# Tahap 3: Build aset Node.js (Vite)
FROM node:18 AS node_assets
WORKDIR /var/www/html
COPY package.json package-lock.json ./
RUN npm install
COPY . .
# Build aset frontend
RUN npm run build

# Tahap 4: Final Image
FROM base AS final

# Salin file vhost Apache
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Salin file aplikasi dari tahap sebelumnya
COPY --from=composer_deps /var/www/html/vendor/ vendor/
COPY --from=node_assets /var/www/html/public/build/ public/build/
COPY . .

# Atur kepemilikan file agar Apache bisa menulis ke storage
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Expose port 80
EXPOSE 80