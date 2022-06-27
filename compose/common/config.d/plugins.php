<?php

return [
    'plugins' => [
        'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical', 'config' => ['step' => 0.1]],
        'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
        'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],

        'MultipleLocalAuth' => ['namespace' => 'MultipleLocalAuth'],
        'SamplePlugin' => ['namespace' => 'SamplePlugin'],
        'MapasBlame' => ['namespace' => 'MapasBlame'],
        'AbstractValidator' => [
            'namespace' => 'AbstractValidator',
            'config' => [
                'is_opportunity_managed_handler' => function ($opportunity) {
                    $opportunityList =  ['820', '821', '822', '823', '825', '826', '827', '840', '841', '842', '843'];
                    return in_array($opportunity->id, $opportunityList) ? true : false;
                },
            ]
        ],
        'AldirBlanc' => [
            'namespace' => 'AldirBlanc',
            'config' => [
                'homologacao_requer_validacao' => [],
                'consolidacao_requer_validacao' => ['dataprev', 'scge'],
                'logotipo_instituicao' => 'https://www.mapacultural.pe.gov.br/files/agent/234/1.png',
                'logotipo_central' => 'https://www.mapacultural.pe.gov.br/files/agent/234/favicon2.png',
                'link_suporte' => 'https://api.whatsapp.com/message/3PZVUAWQPDDEM1',
                'privacidade_termos_condicoes' => 'https://www.mapacultural.pe.gov.br/autenticacao/termos-e-condicoes',
                'project_id' => 431,
                'inciso1_enabled' => false,
                'inciso1_opportunity_id' => 323,
                'inciso2_enabled' => true,
                'inciso2_opportunity_ids' => [
                    'Afogados da Ingazeira' => 512,
                    'Agrestina' => 482,
                    'Aguas Belas' => 414,
                    'Alianca' => 415,
                    'Angelim' => 335,
                    'Araripina' => 484,
                    'Belo Jardim' => 488,
                    'Bonito' => 416,
                    'Brejo da Madre de Deus' => 417,
                    'Cabrobo' => 494,
                    'Caétes' => 381,
                    'Casinhas' => 518,
                    'Chã Grande' => 419,
                    'Escada' => 421,
                    'Exu' => 521,
                    'Floresta' => 423,
                    'Frei Miguelinho' => 387,
                    'Garanhuns' => 425,
                    'Ibimirim' => 389,
                    'Itaíba' => 504,
                    'Jatoba' => 393,
                    'Lagoa dos Gatos' => 507,
                    'Ouricuri' => 432,
                    'Palmares' => 346,
                    'Palmeirina'  => 526,
                    'Paudalho' => 398,
                    'Paulista' => 529,
                    'Petrolandia' => 399,
                    'Petrolina' => 466,
                    'Riacho das Almas' => 401,
                    'Santa Maria do Cambuca' => 469,
                    'Sao Jose do Belmonte' => 448,
                    'Surubim' => 538,
                    'Terezinha' => 493,
                    'Timbauba' => 440,
                    'Triunfo' => 441,
                    'Trindade' => 511,
                    'Tupanatinga' => 500,
                    'Tuparetama' => 451,
                    'Venturosa' => 540,
                ],
                'inciso3_opportunity_ids' => [],
                'inciso3_enabled' => true,
                'inciso2' => [],
            ],
        ],
        'AldirBlancDataprev' => [
            'namespace' => 'AldirBlancDataprev',
            'config' => [
                'exportador_requer_homologacao' => true,
                'consolidacao_requer_validacoes' => ['scge']
            ],
        ],
        'Recursos' => ['namespace' => 'AldirBlancValidadorRecurso'],
        'Financeiro' => [
            'namespace' => 'AldirBlancValidadorFinanceiro',
            'config' => [
                'exportador_requer_validacao' => ['dataprev', 'scge'],
                'consolidacao_requer_homologacao' => true,
                'consolidacao_requer_validacoes' => ['scge'],
            ],
        ],
        'SCGE' => [
            'namespace' => 'AldirBlancValidador',
            'config' => [
                'slug' => 'scge',
                'name' => 'SCGE',
                'exportador_requer_homologacao' => true,
                'exportador_requer_validacao' => [],
                'consolidacao_requer_validacoes' => ['dataprev'],
                'inciso1' => [
                    'CPF' => 1567,
                    'MULHER PROVEDORA DE FAMÍLIA MONOPARENTAL:' => 1573,
                ]
            ]
        ]
    ]
];
