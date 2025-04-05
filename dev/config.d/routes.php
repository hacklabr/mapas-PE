<?php
$routes = $config['routes'];

$routes["shortcuts"]['paineis-de-dados'] = ["metabase", "panel"];
$routes["shortcuts"]['painel-de-dados'] = ["metabase", "dashboard"];

$routes["shortcuts"]['pontos-de-memoria'] = ["search", "memory"];

return ['routes' => $routes];
