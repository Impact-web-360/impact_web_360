FROM php:8.2-apache

# Installer les dépendances
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath

# Activer mod_rewrite
RUN a2enmod rewrite

# Copier les fichiers de ton projet
COPY . /var/www/html/

# Configurer le dossier
WORKDIR /var/www/html

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Donner les bons droits
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Config Apache pour Laravel
RUN echo '<Directory /var/www/html>\n\
    AllowOverride All\n\
</Directory>' >> /etc/apache2/apache2.conf