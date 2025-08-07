#!/bin/bash
set -e

# Fonction pour afficher les messages
log() {
    echo "[$(date +'%Y-%m-%d %H:%M:%S')] $1"
}

# Vérifier si le fichier .env existe
if [ ! -f .env ]; then
    log "Fichier .env non trouvé, copie depuis .env.example..."
    cp .env.example .env
fi

# Générer la clé d'application si elle n'existe pas
if ! grep -q "APP_KEY=base64:" .env; then
    log "Génération de la clé d'application..."
    php artisan key:generate --no-interaction
fi

# Créer les dossiers nécessaires s'ils n'existent pas
log "Création des dossiers de cache..."
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Définir les permissions correctes
log "Configuration des permissions..."
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod -R 775 public

# Optimiser Laravel pour la production
log "Optimisation de Laravel pour la production..."
php artisan config:cache --no-interaction || true
php artisan route:cache --no-interaction || true
php artisan view:cache --no-interaction || true

# Vérifier la configuration Apache
log "Vérification de la configuration Apache..."
if ! grep -q "AllowOverride All" /etc/apache2/conf-enabled/laravel.conf; then
    log "Configuration Apache manquante, recréation..."
    echo '<Directory /var/www/html/public>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
    </Directory>' > /etc/apache2/conf-available/laravel.conf
    a2enconf laravel
fi

# Démarrer Apache
log "Démarrage d'Apache..."
exec "$@" 