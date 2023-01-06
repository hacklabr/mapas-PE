<?php 
use MapasCulturais\i;

return [
    'app.siteName' => env('SITE_NAME', 'Mapa Cultural de pernambuco'),
    'app.siteDescription' => i::__("O Mapa Cultural de Pernambuco é uma plataforma livre, gratuita e colaborativa de mapeamento da Secretaria da Cultura do Estado do Pernambuco e da Fundação do Patrimônio Histórico e Artístico de Pernambuco. O objetivo é traçarmos, juntos, o cenário cultural pernambucano, considerando e permitindo o acesso às informações sobre eventos, programas, espaços e agentes culturais. Pesquise livremente ou cadastre aqui a sua iniciativa."),

    'themes.active' => env('ACTIVE_THEME', 'MapasCulturais\Themes\BaseV1'),

    'app.lcode' => env('APP_LCODE', 'pt_BR,es_ES'),

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
    'auth.config' => array(
        'salt' => env('AUTH_SALT', null),
        'timeout' => '24 hours',
        'strategies' => [
            'govbr' => [
                'visible' => env('AUTH_GOV_BR_ID', true),
                'response_type' => 'code',
                'client_id' => 'aldirblanchomolog.mapacultural.pe.gov.br',
                'client_secret' => '5da4a129-1143-451f-864c-cb99f7b3f5d4',
                'scope' => 'openid email profile govbr_confiabilidades phone',
                'redirect_uri' => 'https://www.aldirblanchomolog.mapacultural.pe.gov.br/autenticacao/govbr/oauth2callback',
                'auth_endpoint' => 'https://sso.staging.acesso.gov.br/authorize',
                'token_endpoint' => 'https://sso.staging.acesso.gov.br/token',
                'nonce' => 'abc',
                'code_verifier' => 'Ub0hCVGslVjxaME539ljWBvvTLmK6DWsUHplOIc8Ci8Ub0hCVGslVjxaME539ljWBvvTLmK6DWsUHplOIc8Ci8',
                'code_challenge' => 'xiB-jB0zqoOm18PZx1K4H1mp5E_Yl5EW1KQ3qGS40F8',
                'code_challenge_method' => 'S256',
                'userinfo_endpoint' => 'https://sso.staging.acesso.gov.br/jwk',
                'state_salt' => "mapaspe",
                'applySealId' => 2,
                'menssagem_authenticated' => "",
                'dic_agent_fields_update' => [
                    'nomeCompleto' => 'full_name',
                    'name' => 'name',
                    'documento' => 'cpf',
                    'cpf' => 'cpf',
                    'emailPrivado' => 'email',
                    'telefone1' => 'phone_number',
                ]
            ]

        ]
    )
];