#!/bin/bash
set -e

log() {
    echo "[$(date +'%Y-%m-%d %H:%M:%S')] $1"
}

# Copier .env si inexistant
# if [ ! -f .env ]; then
#    log "Fichier .env non trouvé, copie depuis .env.example..."
#    cp .env.example .env
# fi

# Générer la clé d'application si manquante ou vide
# if ! grep -q "^APP_KEY=base64:" .env; then
#    log "Génération de la clé d'application Laravel..."
#    php artisan key:generate --no-interaction
# fi

# Création des dossiers nécessaires
log "Création des dossiers de cache, sessions, logs..."
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Permissions
log "Configuration des permissions..."
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod -R 775 public

# Vider tous les caches pour garantir un démarrage propre
php artisan cache:clear || true
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true
composer dump-autoload

# Vérification de la configuration Apache
log "Vérification configuration Apache..."
if ! grep -q "AllowOverride All" /etc/apache2/conf-enabled/laravel.conf; then
    log "Configuration Apache manquante, création..."
    cat > /etc/apache2/conf-available/laravel.conf << EOF
<Directory /var/www/html/public>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
    DirectoryIndex index.php
</Directory>
EOF
    a2enconf laravel
fi

# Lancement d'Apache en mode foreground
log "Démarrage d'Apache..."
exec "$@"
