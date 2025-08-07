# Guide de Build Docker pour Laravel

## Problème résolu

L'erreur `Script @php artisan package:discover --ansi handling the post-autoload-dump event returned with error code 1` se produit quand `composer install` s'exécute avant que tous les fichiers nécessaires soient copiés.

## Solutions disponibles

### 1. Dockerfile principal (recommandé pour la simplicité)

**Fichier :** `Dockerfile`

**Approche :** Copie tous les fichiers d'abord, puis exécute `composer install`

**Avantages :**
- Simple et direct
- Garantit que tous les fichiers sont disponibles
- Moins de risques d'erreurs

**Inconvénients :**
- Pas d'optimisation du cache Docker
- Build plus long en cas de modifications fréquentes

### 2. Dockerfile optimisé (recommandé pour la performance)

**Fichier :** `Dockerfile.optimized`

**Approche :** Copie les fichiers nécessaires par étapes pour optimiser le cache

**Avantages :**
- Optimisation du cache Docker
- Build plus rapide lors des modifications de code
- Séparation des couches Docker

**Inconvénients :**
- Plus complexe
- Nécessite de connaître les fichiers requis par Laravel

## Utilisation

### Pour le développement et tests rapides :
```bash
docker build -t impact-web-360 .
```

### Pour la production avec optimisation :
```bash
docker build -f Dockerfile.optimized -t impact-web-360-optimized .
```

## Ordre des opérations corrigé

### Version simple (Dockerfile)
1. Copier tous les fichiers du projet
2. Créer les dossiers nécessaires
3. Définir les permissions
4. Exécuter `composer install`
5. Configurer Laravel
6. Optimiser pour la production

### Version optimisée (Dockerfile.optimized)
1. Copier `composer.json` et `composer.lock`
2. Copier les dossiers essentiels pour Laravel :
   - `app/`
   - `bootstrap/`
   - `config/`
   - `database/`
   - `resources/`
   - `routes/`
   - `artisan`
3. Créer les dossiers nécessaires
4. Définir les permissions
5. Exécuter `composer install`
6. Copier le reste des fichiers
7. Configurer Laravel
8. Optimiser pour la production

## Fichiers nécessaires pour composer install

Laravel a besoin de ces fichiers pour que `php artisan package:discover` fonctionne :

- `app/` - Contient les contrôleurs, modèles, etc.
- `bootstrap/` - Fichiers de démarrage de l'application
- `config/` - Fichiers de configuration
- `database/` - Migrations et seeders
- `resources/` - Vues et assets
- `routes/` - Définition des routes
- `artisan` - Console Laravel

## Permissions requises

Avant `composer install`, ces dossiers doivent avoir les bonnes permissions :
- `storage/` - 775
- `bootstrap/cache/` - 775
- Propriétaire : `www-data:www-data`

## Variables d'environnement importantes

```bash
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
```

## Dépannage

### Si l'erreur persiste :

1. **Vérifiez les logs :**
   ```bash
   docker logs <container_id>
   ```

2. **Accédez au conteneur :**
   ```bash
   docker exec -it <container_id> bash
   ```

3. **Testez manuellement :**
   ```bash
   composer install --no-dev --optimize-autoloader --no-interaction
   php artisan package:discover
   ```

4. **Vérifiez les permissions :**
   ```bash
   ls -la storage/
   ls -la bootstrap/cache/
   ```

### Erreurs courantes :

- **Permission denied :** Vérifiez que `www-data` est propriétaire
- **Missing files :** Vérifiez que tous les dossiers Laravel sont copiés
- **Extension missing :** Vérifiez que toutes les extensions PHP sont installées

## Recommandations

- **Développement :** Utilisez `Dockerfile` (version simple)
- **Production :** Utilisez `Dockerfile.optimized` (version optimisée)
- **Tests :** Testez toujours les deux versions avant le déploiement 