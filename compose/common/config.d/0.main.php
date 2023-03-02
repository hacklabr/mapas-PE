<?php

use MapasCulturais\i;

if ($_SERVER['HTTP_HOST'] === 'homolog.museus.mapacultural.pe.gov.br') {
    $base_url = 'https://homolog.museus.mapacultural.pe.gov.br/';
} else {
    $base_url = 'https://www.aldirblanchomolog.mapacultural.pe.gov.br/';
}

return [
    'app.siteName' => env('SITE_NAME', 'Mapa Cultural de pernambuco'),
    'app.siteDescription' => i::__("O Mapa Cultural de Pernambuco é uma plataforma livre, gratuita e colaborativa de mapeamento da Secretaria da Cultura do Estado do Pernambuco e da Fundação do Patrimônio Histórico e Artístico de Pernambuco. O objetivo é traçarmos, juntos, o cenário cultural pernambucano, considerando e permitindo o acesso às informações sobre eventos, programas, espaços e agentes culturais. Pesquise livremente ou cadastre aqui a sua iniciativa."),

    'themes.active' => env('ACTIVE_THEME', 'MapasCulturais\Themes\BaseV1'),

    'app.lcode' => env('APP_LCODE', 'pt_BR,es_ES'),

    'base.assetUrl' => $base_url . 'assets/',
    'base.url' => $base_url,

    'mailer.user' => "mapacultural",
    'mailer.psw'  => "#-m@p@-!",
    'mailer.server' => 'antispamout.ati.pe.gov.br',
    'mailer.protocol' => null, // 'tls',
    'mailer.port'   => '587',
    'mailer.from' => 'naoresponda@secult.pe.gov.br',

    'namespaces' => array(
        'MapasCulturais\Themes' => THEMES_PATH,
        'MapasCulturais\Themes\BaseV1' => THEMES_PATH . 'BaseV1/',
        'Subsite' => THEMES_PATH . 'Subsite/',
    ),

    'doctrine.database' => [
        'host'           => env('DB_HOST', 'db'),
        'dbname'         => env('DB_NAME', 'mapas'),
        'user'           => env('DB_USER', 'mapas'),
        'password'       => env('DB_PASS', 'mapas'),
        'server_version' => env('DB_VERSION', 10),
    ],
];
