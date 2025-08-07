FROM php:8.2-apache

# Variables d'environnement
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV COMPOSER_ALLOW_SUPERUSER=1

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    libgd-dev \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP nécessaires
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mbstring \
        zip \
        exif \
        pcntl \
        bcmath \
        gd \
        intl

# Activer les modules Apache nécessaires
RUN a2enmod rewrite headers

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Créer le répertoire de travail
WORKDIR /var/www/html

# Copier tous les fichiers du projet
COPY . .

# Créer le fichier .env s'il n'existe pas
RUN if [ ! -f .env ]; then \
    echo 'APP_NAME="Impact Web 360"' > .env && \
    echo 'APP_ENV=production' >> .env && \
    echo 'APP_KEY=' >> .env && \
    echo 'APP_DEBUG=false' >> .env && \
    echo 'APP_URL=http://localhost' >> .env && \
    echo 'LOG_CHANNEL=stack' >> .env && \
    echo 'LOG_LEVEL=error' >> .env && \
    echo 'DB_CONNECTION=mysql' >> .env && \
    echo 'DB_HOST=127.0.0.1' >> .env && \
    echo 'DB_PORT=3306' >> .env && \
    echo 'DB_DATABASE=laravel' >> .env && \
    echo 'DB_USERNAME=root' >> .env && \
    echo 'DB_PASSWORD=' >> .env && \
    echo 'CACHE_DRIVER=file' >> .env && \
    echo 'SESSION_DRIVER=file' >> .env && \
    echo 'QUEUE_CONNECTION=sync' >> .env && \
    echo 'FILESYSTEM_DISK=local' >> .env; \
    fi

# Créer les dossiers nécessaires avant composer install
RUN mkdir -p storage/framework/cache/data \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache

# Définir les permissions temporaires pour composer
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache

# Installer les dépendances PHP (après avoir copié tous les fichiers)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Générer la clé d'application Laravel
RUN php artisan key:generate --no-interaction || true

# Optimiser Laravel pour la production
RUN php artisan config:cache --no-interaction || true \
    && php artisan route:cache --no-interaction || true \
    && php artisan view:cache --no-interaction || true

# Définir les permissions finales
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache \
    && chmod -R 775 public

# Configurer Apache pour servir le dossier public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Créer la configuration Apache personnalisée
RUN echo '<Directory ${APACHE_DOCUMENT_ROOT}>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
    </Directory>' > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

# Exposer le port 80
EXPOSE 80

# Script de démarrage
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]