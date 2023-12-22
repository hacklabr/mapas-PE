<?php 

return [
    'doctrine.isDev' => false,


    // LOG --------------------
    'slim.log.level'        => \Slim\Log::DEBUG,
    'slim.log.enabled'      => true,

    // app.log.hook aceita regex para filtrar quais hooks são exibidos no output, 
    // ex: "panel", "^template", "template\(site\.index\.*\):before"
    'app.log.hook'          => false, 
    // 'app.log.query'         => true,
    // 'app.log.requestData'   => true,
    // 'app.log.translations'  => true,
    // 'app.log.apiCache'      => true,
    // 'app.log.apiDql'        => true,
    // 'app.log.assets'        => true,


    // MAILER -----------------
    // 'mailer.user'       => 'you@gmail.com', 
    // 'mailer.psw'        => 'passwd', 
    // 'mailer.protocol'   => 'SSL', 
    // 'mailer.server'     => 'smtp.gmail.com', 
    // 'mailer.port'       => '465', 
    // 'mailer.from'       => 'you@gmail.com', 
    // 'mailer.alwaysTo'   => 'you@gmail.com', // todos os emails serão enviados para este endereço


    // AUTH -------------------
    // 'auth.provider' => 'Fake', 
    'auth.provider' => '\MultipleLocalAuth\Provider',
    'auth.config' => array(
        'salt' => env('AUTH_SALT', null),
        'timeout' => '24 hours',
        'strategies' => [
            'govbr' => [
                'visible' => env('AUTH_GOV_BR_ID', true),
                'response_type' => 'code',
                'scope' => 'openid email profile phone govbr_confiabilidades',
                'redirect_uri' => 'https://www.mapacultural.pe.gov.br/autenticacao/govbr/oauth2callback', 
                'auth_endpoint' => 'https://sso.acesso.gov.br/authorize',
                'token_endpoint' => 'https://sso.acesso.gov.br/token',
                'nonce' => 'abc',
                'code_challenge_method' => 'S256',
                'userinfo_endpoint' => 'https://sso.acesso.gov.br/jwk',
                'state_salt' => "mapaspe",
                'applySealId' => 21,
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