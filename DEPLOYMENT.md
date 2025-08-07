# Guide de Déploiement Laravel sur Render avec Docker

## Configuration Docker

Le projet utilise un Dockerfile optimisé pour Laravel avec Apache. Voici les principales caractéristiques :

### Dockerfile
- **Image de base** : `php:8.2-apache`
- **DocumentRoot** : `/var/www/html/public`
- **Modules Apache** : `mod_rewrite` et `mod_headers` activés
- **Extensions PHP** : Toutes les extensions nécessaires pour Laravel
- **Optimisations** : Composer avec `--no-dev --optimize-autoloader`

### Script d'entrée
Le fichier `docker-entrypoint.sh` gère :
- Création automatique du fichier `.env`
- Génération de la clé d'application
- Configuration des permissions
- Optimisation de Laravel pour la production

## Configuration Apache

### Configuration automatique
Le Dockerfile configure automatiquement Apache pour :
- Servir le dossier `/public` comme DocumentRoot
- Activer `AllowOverride All` pour le `.htaccess`
- Configurer les permissions correctes

### Configuration manuelle (alternative)
Si vous préférez une configuration manuelle, utilisez le fichier `apache-laravel.conf` :

```bash
# Copier la configuration
cp apache-laravel.conf /etc/apache2/sites-available/000-default.conf

# Activer le site
a2ensite 000-default.conf

# Redémarrer Apache
service apache2 restart
```

## Variables d'environnement

Créez un fichier `.env` basé sur `.env.example` avec les valeurs suivantes :

```env
APP_NAME="Impact Web 360"
APP_ENV=production
APP_KEY=base64:VOTRE_CLE_GENEREE
APP_DEBUG=false
APP_URL=https://votre-domaine.render.com

DB_CONNECTION=mysql
DB_HOST=votre-host-db
DB_PORT=3306
DB_DATABASE=votre-database
DB_USERNAME=votre-username
DB_PASSWORD=votre-password

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

## Permissions

Les permissions sont automatiquement configurées :
- `/var/www/html` : 755 (www-data:www-data)
- `/storage` : 775 (www-data:www-data)
- `/bootstrap/cache` : 775 (www-data:www-data)
- `/public` : 775 (www-data:www-data)

## Déploiement sur Render

1. **Connectez votre repository** à Render
2. **Configurez les variables d'environnement** dans l'interface Render
3. **Utilisez le fichier `render.yaml`** pour la configuration automatique

### Variables d'environnement Render
- `APP_ENV=production`
- `APP_DEBUG=false`
- `DB_CONNECTION=mysql`
- `CACHE_DRIVER=file`
- `SESSION_DRIVER=file`

## Résolution des problèmes

### Erreur 403 Forbidden
1. Vérifiez que `mod_rewrite` est activé
2. Vérifiez que `AllowOverride All` est configuré
3. Vérifiez les permissions sur `/public`

### Erreur 500 Internal Server Error
1. Vérifiez les logs Apache : `/var/log/apache2/error.log`
2. Vérifiez les logs Laravel : `storage/logs/laravel.log`
3. Vérifiez que la clé d'application est générée

### Problèmes de permissions
```bash
# Dans le conteneur Docker
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html
chmod -R 775 storage bootstrap/cache public
```

## Commandes utiles

```bash
# Build de l'image Docker
docker build -t impact-web-360 .

# Test local
docker run -p 8080:80 impact-web-360

# Accès au conteneur
docker exec -it <container_id> bash

# Vérification des logs
docker logs <container_id>
```

## Optimisations de production

Le Dockerfile inclut automatiquement :
- `composer install --no-dev --optimize-autoloader`
- `php artisan config:cache`
- `php artisan route:cache`
- `php artisan view:cache` 