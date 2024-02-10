FROM hacklab/mapasculturais:develop

COPY themes /var/www/src/themes
COPY plugins /var/www/src/plugins

WORKDIR /var/www/src
RUN pnpm install --recursive && pnpm run build 

COPY docker/common/config.d /var/www/config/common.d
COPY docker/common/lgpd-terms /var/www/config/lgpd-terms
COPY docker/production/config.d /var/www/config/config.d

COPY docker/common/php-ini.d /usr/local/etc/php/conf.d

## OS ARQUIVOS ABAIXO ESTAVAM SOBRESCREVENDO OS ORIGINAIS NA VERSÃO 5, TEM QUE ANALISAR

# COPY compose/overrides/mapas/conf/registrations.php var/www/html/protected/application/conf/conf-base.d/registrations.php
# COPY compose/overrides/mapas/conf/notification-types.php var/www/html/protected/application/conf/notification-types.php
# COPY compose/overrides/mapas/conf/taxonomies.php var/www/html/protected/application/conf/taxonomies.php
# COPY compose/overrides/mapas/modules/CompliantSuggestion/ng.modules.compliantSuggestion.js var/www/html/protected/application/lib/modules/CompliantSuggestion/assets/js/ng.modules.compliantSuggestion.js
# COPY compose/overrides/mapas/modules/ProfileCompletion/profile-complete-message.php var/www/html/protected/application/lib/modules/ProfileCompletion/layouts/parts/profile-complete-message.php
# COPY compose/overrides/mapas/modules/Reports/registrationsDraftVsSent.php var/www/html/protected/application/lib/modules/Reports/layouts/parts/registrationsDraftVsSent.php
# COPY compose/overrides/mapas/BaseV1/report-evaluations.php protected/application/themes/BaseV1/views/opportunity/report-evaluations.php


COPY docker/common/conf-base-museus.php /var/www/src/themes/MapasMuseus/conf-base.php

WORKDIR /var/www