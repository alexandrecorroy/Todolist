#!/bin/bash
set -e

if [ ! -d "vendor" ]; then
  echo "Installation des dépendances PHP..."
  composer install --no-interaction --prefer-dist --optimize-autoloader
fi

until php bin/console doctrine:query:sql "SELECT 1" --env=prod >/dev/null 2>&1; do
  echo "Attente de la base de données..."
  sleep 2
done

php bin/console cache:clear --env=prod --no-warmup
php bin/console cache:warmup --env=prod

chown -R www-data:www-data /var/www/html/var
php bin/console doctrine:schema:update --force --env=prod
php bin/console doctrine:fixtures:load --no-interaction

# Start Apache
exec apache2-foreground
