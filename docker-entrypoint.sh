#!/bin/bash
set -e

log() {
  echo "[$(date +'%Y-%m-%d %H:%M:%S')] $1"
}

# La gestion de .env et APP_KEY doit être faite par Render.
# Ces lignes sont commentées car elles peuvent causer des problèmes.
# if [ ! -f .env ]; then
#   log "Fichier .env non trouvé, copie depuis .env.example..."
#   cp .env.example .env
# fi
#
# if ! grep -q "^APP_KEY=" .env; then
#   log "Génération de la clé d'application Laravel..."
#   php artisan key:generate --no-interaction
# fi

# Création des dossiers nécessaires
log "Création des dossiers de cache, sessions, logs..."
mkdir -p storage/framework/{cache/data,sessions,views}
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Vider tous les caches pour garantir un démarrage propre
# L'utilisation de "|| true" permet au script de continuer même si le cache n'existe pas encore.
log "Vidage du cache de l'application..."
php artisan cache:clear || true
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Mise à jour de l'autoload de Composer
# Cette étape est cruciale si les noms de fichiers ont changé
log "Mise à jour de l'autoload de Composer..."
composer dump-autoload --optimize

# Définir les permissions finales
log "Configuration des permissions..."
chown -R www-data:www-data /var/www/html
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod -R 755 public # Les fichiers publics n'ont pas besoin d'être exécutables par tous

# Lancement d'Apache en mode foreground
log "Démarrage d'Apache..."
exec "$@"