#!/bin/bash
set -e

echo "-p /var/www/var/DoctrineProxies /var/www/var/logs"
mkdir -p /var/www/var/DoctrineProxies /var/www/var/logs

echo "/var/www/var/logs/app.log"
touch /var/www/var/logs/app.log

echo "chown -R www-data: /var/www/var/DoctrineProxies /var/www/var/logs"
chown -R www-data: /var/www/var/DoctrineProxies /var/www/var/logs

echo "sudo -E -u www-data /var/www/scripts/db-update.sh"
sudo -E -u www-data /var/www/scripts/db-update.sh

echo "-E -u www-data /var/www/scripts/mc-db-updates.sh"
sudo -E -u www-data /var/www/scripts/mc-db-updates.sh

if ! cmp /var/www/version.txt /var/www/var/private-files/deployment-version >/dev/null 2>&1
then
    echo "compile sass e generate proxies"
    sudo -E -u www-data /var/www/scripts/compile-sass.sh
    sudo -E -u www-data /var/www/src/tools/doctrine orm:generate-proxies
    cp /var/www/version.txt /var/www/var/private-files/deployment-version
fi


if [ $BUILD_ASSETS = "1" ]; then
    chown www-data: /var/www/public/assets
    cd /var/www/src
    pnpm install --recursive 
    pnpm run dev
fi

echo "chown "www-data:www-data /var/www/public/..."
chown www-data:www-data /var/www/public/assets 
chown www-data:www-data /var/www/public/files 
chown www-data:www-data /var/www/var/private-files

cd /
touch /nohup.out
chown www-data: /nohup.out

echo "inicializando crons"
sudo -E -u www-data nohup /jobs-cron.sh >> /dev/stdout &
sudo -E -u www-data nohup /recreate-pending-pcache-cron.sh >> /dev/stdout &

tail -f /nohup.out > /dev/stdout &
touch /mapas-ready

exec "$@"
