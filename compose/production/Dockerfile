FROM hacklab/mapasculturais:v5.3.22

COPY compose/common/config.php /var/www/html/protected/application/conf/config.php
COPY compose/common/config.d /var/www/html/protected/application/conf/conf-common.d
COPY compose/production/config.d /var/www/html/protected/application/conf/config.d

COPY themes /var/www/html/protected/application/themes
COPY plugins /var/www/html/protected/application/plugins

COPY compose/overrides/plugins/AldirBlancDataprev/Plugin.php var/www/html/protected/application/plugins/AldirBlancDataprev/Plugin.php
COPY compose/overrides/plugins/AldirBlancDataprev/config-csv-inciso1.php var/www/html/protected/application/plugins/AldirBlancDataprev/config-csv-inciso1.php
COPY compose/overrides/plugins/AldirBlancValidador/Controller.php var/www/html/protected/application/plugins/AldirBlancValidador/Controller.php
COPY compose/overrides/plugins/AldirBlancValidador/Plugin.php var/www/html/protected/application/plugins/AldirBlancValidador/Plugin.php
COPY compose/overrides/plugins/FinancialValidador/Plugin.php var/www/html/protected/application/plugins/FinancialValidador/Plugin.php
COPY compose/overrides/mapas/conf/registrations.php var/www/html/protected/application/conf/conf-base.d/registrations.php
COPY compose/overrides/mapas/conf/notification-types.php var/www/html/protected/application/conf/notification-types.php
COPY compose/overrides/mapas/conf/taxonomies.php var/www/html/protected/application/conf/taxonomies.php
COPY compose/overrides/mapas/lib/EntityAgentRelation.php var/www/html/protected/application/lib/MapasCulturais/Traits/EntityAgentRelation.php
COPY compose/overrides/mapas/modules/CompliantSuggestion/ng.modules.compliantSuggestion.js var/www/html/protected/application/lib/modules/CompliantSuggestion/assets/js/ng.modules.compliantSuggestion.js
COPY compose/overrides/mapas/modules/ProfileCompletion/profile-complete-message.php var/www/html/protected/application/lib/modules/ProfileCompletion/layouts/parts/profile-complete-message.php
COPY compose/overrides/mapas/modules/Reports/registrationsDraftVsSent.php var/www/html/protected/application/lib/modules/Reports/layouts/parts/registrationsDraftVsSent.php
COPY compose/overrides/mapas/BaseV1/downloads.php protected/application/themes/BaseV1/layouts/parts/downloads.php
COPY compose/overrides/mapas/BaseV1/gallery.php protected/application/themes/BaseV1/layouts/parts/gallery.php
COPY compose/overrides/mapas/BaseV1/link-list.php protected/application/themes/BaseV1/layouts/parts/link-list.php
COPY compose/overrides/mapas/BaseV1/report-evaluations.php protected/application/themes/BaseV1/views/opportunity/report-evaluations.php
COPY compose/overrides/mapas/Subsite/_variables.scss var/www/html/protected/application/themes/Subsite/assets/css/sass/_overrides.scss

