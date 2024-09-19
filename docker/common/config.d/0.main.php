<?php

date_default_timezone_set('America/Recife');

use MapasCulturais\i;
$museus_domain = env("DOMAIN_MUSEUS", "www.museusdepernambuco.pe.gov.br");
$museus_mapas = env("DOMAIN_MAPAS", "www.mapacultural.pe.gov.br");

$protocol = str_ends_with($museus_mapas,'localhost') ? 'http' : 'https';

if ($_SERVER['HTTP_HOST'] === $museus_domain) {
    $base_url = "{$protocol}://{$museus_domain}/";
} else {
    $base_url = "{$protocol}://{$museus_mapas}/";
}

return [
    'app.siteName' => 'Mapa Cultural de Pernambuco',
    'app.siteDescription' => "O Mapa Cultural de Pernambuco é uma plataforma livre, gratuita e colaborativa de mapeamento da Secretaria da Cultura do Estado do Pernambuco e da Fundação do Patrimônio Histórico e Artístico de Pernambuco. O objetivo é traçarmos, juntos, o cenário cultural pernambucano, considerando e permitindo o acesso às informações sobre eventos, programas, espaços e agentes culturais. Pesquise livremente ou cadastre aqui a sua iniciativa.",

    'themes.active' => 'MapasPE',

    'app.lcode' => 'pt_BR',
     
    'base.assetUrl' => $base_url . 'assets/',
    'base.url' => $base_url,

    'doctrine.database' => [
        'host'           => env('DB_HOST', 'db'),
        'dbname'         => env('DB_NAME', 'mapas'),
        'user'           => env('DB_USER', 'mapas'),
        'password'       => env('DB_PASS', 'mapas'),
        'server_version' => env('DB_VERSION', 10),
    ],
    'app.geoDivisionsHierarchy' => [
        'pais'              => ['name' => i::__('País'),            'showLayer' => true],
        'estado'            => ['name' => i::__('Estado'),          'showLayer' => true],
        'mesorregiao'       => ['name' => i::__('Mesorregião'),     'showLayer' => true],
        'RD'  => ['name' => i::__('Região de desenvolvimento'),'showLayer' => true],
        'microrregiao'      => ['name' => i::__('Microrregião'),    'showLayer' => true],
        'municipio'         => ['name' => i::__('Município'),       'showLayer' => true],
    ]
];
