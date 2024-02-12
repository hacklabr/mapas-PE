<?php
use MApasCulturais\Entities;

return [
    'plugins' => [
        'RegistrationPayments' => ['namespace' => 'RegistrationPayments'],
        'AdminLoginAsUser' => ['namespace' => 'AdminLoginAsUser'],
        'FormCommunication' => [
            'namespace' => "FormCommunication",
            'config' => ['sendEmailTo' => 'contato.mapacultural@secult.pe.gov.br']
        ],
        'MultipleLocalAuth' => [
            'namespace' => 'MultipleLocalAuth',
            'config' => array(
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
        ],
        'MapasBlame' => ['namespace' => 'MapasBlame'],
        'SettingsPe' => ['namespace' => "SettingsPe"],
        'ClaimForm' => ['namespace' => 'ClaimForm'],
        'CadUnico' => [
            'namespace' => 'CadUnico',
            'config' => [
                'enabled' => true,
                'approved_after_send' => true,
                'featured' => true,
                'slug' => 'cadunico',
                'limit' => 1,
                'opportunity_id' => env("CADUNICO_OPPORTUNITY_ID", 1),
                'logo_institution' => 'cadunico/img/logo-pe.png',
                'logo_footer' => 'img/share.png',
                'logo_center' => 'cadunico/img/blob-2.png',
                'schedule_datetime' => '2021-08-30 9:00:00',
                'schedule_closing' => '2021-09-24 23:59:00',
                'consolidation_requires_validations' => ['funtrabvalidador', 'sisgedvalidador', 'conselheirosvalidador'],
                'initial_statement_enabled' => true,
                'sealrelation_layout' => 'cadunico',
                "terms" => [
                    "Declaro que sou maior de 18 anos e resido no estado de Pernambuco.", 
                    "Declaro me responsabilizar pelas músicas, documentos, textos, imagens e outros arquivos ou meios, cujos direitos autorais estejam protegidos pela legislação vigente.", 
                    "Declaro que as informações presentes neste formulário são legítimas e têm validade em todo território brasileiro.",
                    "Declaro que todos os campos deste formulário constituem autodeclaração e, em caso de falsidade, uso ilícito e/ou imoral da mesma, incorrerei nas penalidades previstas no código penal brasileiro (artigos 171 e 299 da Lei n° 2848/40) "
                ]
            ]
        ],

        'Metabase' => [
            'namespace' => 'Metabase',
            'config' => [
                'links' => [
                    'opportunities' => [
                        'title' => 'Painel sobre oportunidades',
                        'link' => 'https://bi.mapacultural.pe.gov.br/public/dashboard/39ce65ee-9d2b-432e-b9d2-e688b18ece7d',
                        'text' => 'Tenha acesso ao número de oportunidades e  editais cadastrados, a quantidade de pessoas participantes inscritas, o perfil demográfico e mais informações.',
                    ],
                    'users' => [
                        'title' => 'Painel sobre usuários',
                        'link' => 'https://bi.mapacultural.pe.gov.br/public/dashboard/44f04f96-70aa-4fb6-bcc6-6ec06c72d8e8',
                        'text' => 'Acesse e confira os dados gerais dos usuários da plataforma, como o total de pessoas cadastradas, atividades dos usuários e outras informações. ',

                    ],
                    'entities' => [
                        'title' => 'Painel geral das entidades ',
                        'link' => 'https://bi.mapacultural.pe.gov.br/public/dashboard/b0d48d8e-d5c2-4a7b-a56f-207c0caa77bc',
                        'text' => 'Confira dados relacionados às entidades cadastradas na plataforma, como agentes individuais e coletivos, oportunidades, espaços, eventos e projetos.',
                    ],
                    'agent1' => [
                        'title' => 'Painel sobre agentes individuais',
                        'link' => 'https://bi.mapacultural.pe.gov.br/public/dashboard/dbf9eb35-9304-49a5-9c63-646687bdde41',
                        'text' => 'Saiba os números de agentes individuais cadastrados, quantos são criados mensalmente, por onde estão distribuídos no território e outras informações.',
                    ],
                    'agent2' => [
                        'title' => 'Painel sobre agentes coletivos',
                        'link' => 'https://bi.mapacultural.pe.gov.br/public/dashboard/3b01b14a-d1e4-4e42-bb83-220352704e26',
                        'text' => 'Dados sobre a quantidade de  coletivos e instituições (com ou sem CNPJ) cadastrados, por onde se distribuem pelo estado e outras informações.',
                    ],

                    'spaces' => [
                        'title' => 'Painel sobre espaços',
                        'link' => 'https://bi.mapacultural.pe.gov.br/public/dashboard/7eb10b1d-43f3-4adf-aabc-fa46bdd0073a',
                        'text' => 'Conheça, entre outras informações, por onde os espaços estão distribuídos, a quantidade de espaços cadastros na plataforma, os tipos e as áreas de atuação.',
                    ],
                    'events' => [
                        'title' => 'Painel sobre eventos',
                        'link' => 'https://bi.mapacultural.pe.gov.br/public/dashboard/1bfdba17-1340-4ca9-9bc6-ab7dde8c8503',
                        'text' => 'Indicadores relacionados a quantidade de eventos cadastrados, às linguagens culturais e características, as datas de criação e também eventos agendados. ',
                    ],
                    'projects' => [
                        'title' => 'Painel sobre projetos',
                        'link' => 'https://bi.mapacultural.pe.gov.br/public/dashboard/3107052a-bdda-4113-b635-6d7e4a1df10b',
                        'text' => 'Tenha acesso ao número total de projetos cadastrados, projetos certificados, quantidade de projetos com subprojetos, os tipos e outros dados. ',
                    ],
                ],
                'cards' =>[
                    [
                        'label' => 'Oportunidade',
                        'icon' => 'opportunity',
                        'iconClass' => 'opportunity__color',
                        'panelLink' => 'opportunities',
                        'data' => [
                            [
                                'label' => 'oportunidades criadas',
                                'entity' => Entities\Opportunity::class,
                                'query' => [],
                            ],
                            [
                                'label' => 'oportunidades certificadas',
                                'entity' => Entities\Opportunity::class,
                                'query' => [
                                    '@verified' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Agentes coletivos',
                        'icon' => 'agent-2',
                        'iconClass' => 'agent__color',
                        'panelLink' => 'agent2',
                        'data' => [
                            [
                                'label' => 'coletivos cadastrados',
                                'entity' => Entities\Agent::class,
                                'query' => [
                                    'type' => 'EQ(2)',
                                ],
                            ],
                            [
                                'label' => 'coletivos certificados',
                                'entity' => Entities\Agent::class,
                                'query' => [
                                    'type' => 'EQ(2)',
                                    '@verified' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Agentes individuais',
                        'icon' => 'agent-1',
                        'iconClass' => 'agent__color',
                        'panelLink' => 'agent1',
                        'data' => [
                            [
                                'label' => 'agentes individuais cadastrados',
                                'entity' => Entities\Agent::class,
                                'query' => [
                                    'type' => 'EQ(1)'
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Espaços',
                        'icon' => 'space',
                        'iconClass' => 'space__color',
                        'panelLink' => 'spaces',
                        'data' => [
                            [
                                'label' => 'espaços cadastrados',
                                'entity' => Entities\Space::class,
                                'query' => [],
                            ],
                            [
                                'label' => 'espaços certificados',
                                'entity' => Entities\Space::class,
                                'query' => [
                                    '@verified' => 1
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Projetos',
                        'icon' => 'project',
                        'iconClass' => 'project__color',
                        'panelLink' => 'projects',
                        'data' => [
                            [
                                'label' => 'projetos cadastrados',
                                'entity' => Entities\Project::class,
                                'query' => [],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Eventos',
                        'icon' => 'event',
                        'iconClass' => 'event__color',
                        'panelLink' => 'events',
                        'data' => [
                            [
                                'label' => 'eventos cadastrados',
                                'entity' => Entities\Event::class,
                                'query' => [],
                            ],
                        ],
                    ],
                
                ],
            ],
        ]
    ]
];
