# 1. Mulai dari image PHP resmi (misal: PHP 8.2 + Apache)
FROM php:8.2-apache

# 2. Instal ekstensi PHP yang dibutuhkan Laravel
RUN docker-php-ext-install pdo pdo_mysql bcmath

# 3. Instal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Atur folder kerja
WORKDIR /var/www/html

# 5. Salin file proyek Anda
COPY . .

# 6. Instal dependensi PHP
RUN composer install --no-dev --optimize-autoloader

# 7. (Opsional tapi penting) Instal Node.js & build aset
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install
RUN npm run build

# 8. Atur izin folder
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# 9. (Penting) Konfigurasi Apache untuk menunjuk ke folder /public
# (Ini sering diabaikan. Anda perlu menimpa konfigurasi default Apache)
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# 10. Expose port 80
EXPOSE 80