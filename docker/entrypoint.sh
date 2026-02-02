#!/bin/bash
set -e

mkdir -p /var/www/var/DoctrineProxies /var/www/var/logs

touch /var/www/var/logs/app.log

chown -R www-data: /var/www/var/DoctrineProxies /var/www/var/logs

sudo -E -u www-data /var/www/scripts/db-update.sh
sudo -E -u www-data /var/www/scripts/mc-db-updates.sh

if ! cmp /var/www/version.txt /var/www/var/private-files/deployment-version >/dev/null 2>&1
then
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

chown www-data:www-data /var/www/public/assets 
chown www-data:www-data /var/www/public/files 
chown www-data:www-data /var/www/var/private-files

cd /
touch /nohup.out
chown www-data: /nohup.out
sudo -E -u www-data nohup /jobs-cron.sh >> /dev/stdout &
sudo -E -u www-data nohup /recreate-pending-pcache-cron.sh >> /dev/stdout &

tail -f /nohup.out > /dev/stdout &
touch /mapas-ready

exec "$@"
