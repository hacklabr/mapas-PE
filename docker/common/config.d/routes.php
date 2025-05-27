<?php
$routes = $config['routes'];

$routes["shortcuts"]['paineis-de-dados'] = ["metabase", "panel"];
$routes["shortcuts"]['painel-de-dados'] = ["metabase", "dashboard"];

return ['routes' => $routes];
