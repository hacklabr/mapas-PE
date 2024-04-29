<?php
// creating base url
$prot_part = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'https://' : 'http://';
//added @ for HTTP_HOST undefined in Tests
$host_part = @$_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
if(substr($host_part,-1) !== '/') $host_part .= '/';
$_APP_BASE_URL = $prot_part . $host_part;

return [
    'auth.provider' => '\MultipleLocalAuth\Provider',
    'auth.config' => array(
        'salt' => env('AUTH_SALT', null),
        'timeout' => '24 hours',
        'strategies' => [
            'Facebook' => array(
               'app_id' => env('AUTH_FACEBOOK_APP_ID', null),
               'app_secret' => env('AUTH_FACEBOOK_APP_SECRET', null),
               'scope' => env('AUTH_FACEBOOK_SCOPE', 'email'),
            ),

            'LinkedIn' => array(
                'api_key' => env('AUTH_LINKEDIN_API_KEY', null),
                'secret_key' => env('AUTH_LINKEDIN_SECRET_KEY', null),
                'redirect_uri' => $_APP_BASE_URL . 'autenticacao/linkedin/oauth2callback',
                'scope' => env('AUTH_LINKEDIN_SCOPE', 'r_emailaddress')
            ),
            'Google' => array(
                'client_id' => env('AUTH_GOOGLE_CLIENT_ID', null),
                'client_secret' => env('AUTH_GOOGLE_CLIENT_SECRET', null),
                'redirect_uri' => $_APP_BASE_URL . 'autenticacao/google/oauth2callback',
                'scope' => env('AUTH_GOOGLE_SCOPE', 'email'),
            ),
            'Twitter' => array(
                'app_id' => env('AUTH_TWITTER_APP_ID', null),
                'app_secret' => env('AUTH_TWITTER_APP_SECRET', null),
            ),
            'govbr' => array(
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
                'applySealId' => 17,
                'menssagem_authenticated' => "",
                'dic_agent_fields_update' => [
                    'nomeCompleto' => 'full_name',
                    'name' => 'name',
                    'documento' => 'cpf',
                    'cpf' => 'cpf',
                    'emailPrivado' => 'email',
                    'telefone1' => 'phone_number',
                ]
            )

        ]
    ),
];
