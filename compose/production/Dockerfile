FROM hacklab/mapasculturais:5.8.11

COPY compose/common/config.php /var/www/html/protected/application/conf/config.php
COPY compose/common/config.d /var/www/html/protected/application/conf/conf-common.d
COPY compose/production/config.d /var/www/html/protected/application/conf/config.d
COPY compose/common/lgpd-terms /var/www/html/protected/application/conf/lgpd-terms

COPY themes /var/www/html/protected/application/themes
COPY plugins /var/www/html/protected/application/plugins

COPY compose/overrides/plugins/AldirBlancDataprev/config-csv-inciso1.php var/www/html/protected/application/plugins/AldirBlancDataprev/config-csv-inciso1.php
COPY compose/overrides/mapas/BaseV1/downloads.php protected/application/themes/BaseV1/layouts/parts/downloads.php
COPY compose/overrides/mapas/BaseV1/gallery.php protected/application/themes/BaseV1/layouts/parts/gallery.php
COPY compose/overrides/mapas/BaseV1/link-list.php protected/application/themes/BaseV1/layouts/parts/link-list.php

COPY compose/production/php.ini /usr/local/etc/php/php.ini