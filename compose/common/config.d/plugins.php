<?php

return [
    'plugins' => [
        'ValuersManagement' => ['namespace' => 'ValuersManagement'],
        'Analytics' => [
            'namespace' => 'Analytics',
        ],

        'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical', 'config' => ['step' => 0.1]],
        'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
        'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
        'FormCommunication' => [
            'namespace' => "FormCommunication",
            'config' => ['sendEmailTo' => 'contato.mapacultural@secult.pe.gov.br']
        ],
        'RegistrationPayments' => [
            'namespace' => 'RegistrationPayments',
            'config' => [
                'cnab240_enabled' => true, // Habilita ou Desabilita exportação do CNAB240
                'opportunitys_cnab_active' => ['820', '821', '822', '823', '825', '826', '827', '840', '841', '842', '843', '1120', '1131', '1146', '1147', '1175', '1176', '1177', '1178', '1179', '1180', '1181', '1182', '1183', '1184', '1185', '1186', '1187', '1188', '1189', '1190'],
                'cnab240_company_data' => [
                    'nome_empresa' => 'SECRETARIA DE CULTURA PE',
                    'tipo_inscricao' => '2',
                    'numero_inscricao' => '13.270.478/0001-83',
                    'agencia' => '697',
                    'agencia_dv' => '1',
                    'conta' => '79849',
                    'conta_dv' => '5',
                    'numero_sequencial_arquivo' => 1,
                    'convenio' => '000264470',
                    'carteira' => '',
                    'situacao_arquivo' => " ",
                    'uso_bb1' => '000264470',
                    'operacao' => 'C',
                ],
                "opportunitysCnab" => [ // Configurações de oportunidades
                    "1175" => [
                        'company_data' => [
                            'conta' => '79848', 
                            'conta_dv' => 7, 
                        ],
                        "canab_bb_default_value" => '1', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28553, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28126, // Não utilizado neste edital, por isso id repetido
                            2 => 28128,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28127,  // Não utilizado neste edital, por isso id repetido
                            2 => 28129,
                        ],
                        "account_type" => 28773, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28552, // ID campo que define a o banco do proponente
                        "branch" => 28554, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28555, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28556, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28557, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1176" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28560, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28139, // Não utilizado neste edital, por isso id repetido
                            2 => 28139,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28140,  // Não utilizado neste edital, por isso id repetido
                            2 => 28140,
                        ],
                        "account_type" => 28774, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28559, // ID campo que define a o banco do proponente
                        "branch" => 28561, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28562, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28563, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28564, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1177" => [
                        'company_data' => [
                            'conta' => '79848', 
                            'conta_dv' => 7, 
                        ],
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28567, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28155,
                            2 => 28157,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28156, 
                            2 => 28159,
                        ],
                        "account_type" => 28775, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28566, // ID campo que define a o banco do proponente
                        "branch" => 28568, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28569, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28570, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28571, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1178" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28574, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28177, // Não utilizado neste edital, por isso id repetido
                            2 => 28177,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28179,  // Não utilizado neste edital, por isso id repetido
                            2 => 28179,
                        ],
                        "account_type" => 28776, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28573, // ID campo que define a o banco do proponente
                        "branch" => 28575, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28576, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28577, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28578, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1179" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28581, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28192, // Não utilizado neste edital, por isso id repetido
                            2 => 28192,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28193,  // Não utilizado neste edital, por isso id repetido
                            2 => 28193,
                        ],
                        "account_type" => 28777, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28580, // ID campo que define a o banco do proponente
                        "branch" => 28582, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28583, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28584, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28585, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1180" => [
                        'company_data' => [
                            'conta' => '79848', 
                            'conta_dv' => 7, 
                        ],
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28588, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28211,
                            2 => 28213,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28212, 
                            2 => 28214,
                        ],
                        "account_type" => 28778, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28587, // ID campo que define a o banco do proponente
                        "branch" => 28589, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28590, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28591, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28592, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1181" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28595, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28221,
                            2 => 28226,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28224, 
                            2 => 28227,
                        ],
                        "account_type" => 28779, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28594, // ID campo que define a o banco do proponente
                        "branch" => 28596, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28597, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28598, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28599, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1182" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28602, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28240,
                            2 => 28244,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28241, 
                            2 => 28245,
                        ],
                        "account_type" => 28780, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28601, // ID campo que define a o banco do proponente
                        "branch" => 28603, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28604, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28605, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28606, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1183" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28609, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28281, // Não utilizado neste edital, por isso id repetido
                            2 => 28281,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28283,  // Não utilizado neste edital, por isso id repetido
                            2 => 28283,
                        ],
                        "account_type" => 28781, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28608, // ID campo que define a o banco do proponente
                        "branch" => 28610, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28611, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28612, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28613, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1184" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28616, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28313,
                            2 => 28315,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28314, 
                            2 => 28316,
                        ],
                        "account_type" => 28782, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28615, // ID campo que define a o banco do proponente
                        "branch" => 28617, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28618, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28619, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28620, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1185" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28623, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28300,
                            2 => 28302,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28301, 
                            2 => 28303,
                        ],
                        "account_type" => 28783, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28622, // ID campo que define a o banco do proponente
                        "branch" => 28624, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28625, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28626, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28627, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1186" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28630, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28276,
                            2 => 28278,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28277, 
                            2 => 28279,
                        ],
                        "account_type" => 28784, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28629, // ID campo que define a o banco do proponente
                        "branch" => 28631, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28632, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28633, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28634, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1187" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28637, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28257,
                            2 => 28262,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28259, 
                            2 => 28263,
                        ],
                        "account_type" => 28785, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28636, // ID campo que define a o banco do proponente
                        "branch" => 28638, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28639, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28640, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28641, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1188" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28644, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28238,
                            2 => 28242,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28239, 
                            2 => 28243,
                        ],
                        "account_type" => 28786, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28643, // ID campo que define a o banco do proponente
                        "branch" => 28645, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28646, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28647, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28648, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1189" => [
                        'company_data' => [
                            'conta' => '79848', 
                            'conta_dv' => 7, 
                        ],
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28651, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28178,
                            2 => 28181,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28180, 
                            2 => 28184,
                        ],
                        "account_type" => 28787, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28650, // ID campo que define a o banco do proponente
                        "branch" => 28652, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28653, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28654, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28655, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1190" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 28658, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28144,
                            2 => 28152,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 28147, 
                            2 => 28153,
                        ],
                        "account_type" => 28788, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28657, // ID campo que define a o banco do proponente
                        "branch" => 28659, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28660, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28661, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28662, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1147" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "MESTRES E MESTRAS  - PESSOA FÍSICA" => "1",  // Não utilizado neste edital, por isso id repetido
                                "GRUPOS, COLETIVOS, POVOS E COMUNIDADES TRADICIONAIS – SEM CONSTITUIÇÃO JURÍDICA REPRESENTADO POR PESSOA FÍSICA" => "1",  // Não utilizado neste edital, por isso id repetido
                                "GRUPOS, COLETIVOS, POVOS E COMUNIDADES TRADICIONAIS - PESSOA JURÍDICA (INCLUINDO MEI)" => "2",
                                "MESTRES E MESTRAS  - PESSOA JURÍDICA (INCLUINDO MEI)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 'category', // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "category",
                            1 => 25328, // Não utilizado neste edital, por isso id repetido
                            2 => 25342,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "category",
                            1 => 25330,  // Não utilizado neste edital, por isso id repetido
                            2 => 25315,
                        ],
                        "account_type" => 28027, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28025, // ID campo que define a o banco do proponente
                        "branch" => 28028, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28029, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28030, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28031, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1146" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  // Não utilizado neste edital, por isso id repetido
                                "Pessoa Jurídica (Exclusivamente MEI)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 'category', // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "category",
                            1 => 26186, // Não utilizado neste edital, por isso id repetido
                            2 => 26196,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "category",
                            1 => 26190,  // Não utilizado neste edital, por isso id repetido
                            2 => 26198,
                        ],
                        "account_type" => 28015, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 28013, // ID campo que define a o banco do proponente
                        "branch" => 28016, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 28017, // ID campo que define o DV da agência bancária do proponente
                        "account" => 28018, // ID campo que define a conta bancária do proponente
                        "account_dv" => 28019, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1131" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa Física" => "1",  // Não utilizado neste edital, por isso id repetido
                                "Pessoa Jurídica" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 27914, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 27922, // Não utilizado neste edital, por isso id repetido
                            2 => 27922,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 27912,  // Não utilizado neste edital, por isso id repetido
                            2 => 27912,
                        ],
                        "account_type" => 27909, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 27918, // ID campo que define a o banco do proponente
                        "branch" => 27910, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 27915, // ID campo que define o DV da agência bancária do proponente
                        "account" => 27916, // ID campo que define a conta bancária do proponente
                        "account_dv" => 27917, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "1120" => [
                        "canab_bb_default_value" => 1, // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Pessoa física" => "1",
                                "Pessoa jurídica de natureza cultural (MEI)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                            "default_lot_type" => [
                                '01' => 'Conta corrente',
                                '05' => 'Conta poupança',
                            ]
                        ],
                        "social_type" => 'category', // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "category",
                            1 => 27829,
                            2 => 27832,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "category",
                            1 => 27818,
                            2 => 27820,
                        ],
                        "account_type" => 27815, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 27826, // ID campo que define a o banco do proponente
                        "branch" => 27816, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 27823, // ID campo que define o DV da agência bancária do proponente
                        "account" => 27824, // ID campo que define a conta bancária do proponente
                        "account_dv" => 27825, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "820" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "PF (Pessoa Física)" => "1",
                                "Grupo/coletivo sem constituição jurídica (representado por Pessoa Física)" => "1",
                                "PJ (Pessoa Jurídica), incluindo MEI (Microempreendedor Individual)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => 17169, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 17183,
                            2 => 17176,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 17159,
                            2 => 17174,
                        ],
                        "account_type" => 17214, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 17213, // ID campo que define a o banco do proponente
                        "branch" => 17216, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 17217, // ID campo que define o DV da agência bancária do proponente
                        "account" => 17218, // ID campo que define a conta bancária do proponente
                        "account_dv" => 17219, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "821" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "PF (Pessoa Física)" => "1",
                                "Grupo/coletivo sem constituição jurídica (representado por Pessoa Física)" => "1",
                                "PJ (Pessoa Jurídica), incluindo MEI (Microempreendedor Individual)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => 17564, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 17597,
                            2 => 17576,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 17585,
                            2 => 17590,
                        ],
                        "account_type" => 17601, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 17628, // ID campo que define a o banco do proponente
                        "branch" => 17593, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 17582, // ID campo que define o DV da agência bancária do proponente
                        "account" => 17633, // ID campo que define a conta bancária do proponente
                        "account_dv" => 17594, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "822" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "PF (Pessoa Física)" => "1",
                                "PJ (Pessoa Jurídica), incluindo MEI (Microempreendedor Individual)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => 17666, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 17684,
                            2 => 17692,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 17682,
                            2 => 17697,
                        ],
                        "account_type" => 17658, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 17660, // ID campo que define a o banco do proponente
                        "branch" => 17657, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 17656, // ID campo que define o DV da agência bancária do proponente
                        "account" => 17655, // ID campo que define a conta bancária do proponente
                        "account_dv" => 17654, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "823" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "PF (Pessoa Física)" => "1",
                                "Grupo/coletivo sem constituição jurídica (representado por Pessoa Física)" => "1",
                                "PJ (Pessoa Jurídica), incluindo MEI (Microempreendedor Individual)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => 17932, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 17949,
                            2 => 17931,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 17947,
                            2 => 17929,
                        ],
                        "account_type" => 17922, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 17924, // ID campo que define a o banco do proponente
                        "branch" => 17921, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 17920, // ID campo que define o DV da agência bancária do proponente
                        "account" => 17919, // ID campo que define a conta bancária do proponente
                        "account_dv" => 17918, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "825" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "PF (Pessoa Física)" => "1",
                                "Grupo/coletivo sem constituição jurídica (representado por Pessoa Física)" => "1",
                                "PJ (Pessoa Jurídica), incluindo MEI (Microempreendedor Individual)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => 17804, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 17792,
                            2 => 17803,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 17798,
                            2 => 17794,
                        ],
                        "account_type" => 17772, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 17774, // ID campo que define a o banco do proponente
                        "branch" => 17771, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 17770, // ID campo que define o DV da agência bancária do proponente
                        "account" => 17769, // ID campo que define a conta bancária do proponente
                        "account_dv" => 17768, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "826" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "FAIXA I - NÃO PREMIADOS na LAB PE 2020 - Proposta de R$ 5.000,00 até R$ 70.000,00" => "2",
                                "FAIXA II - PREMIADOS na LAB PE 2020 - Proposta de R$ 5.000,00 até R$ 40.000,00" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => "category", // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "category",
                            1 => 18016,
                            2 => 18027,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "category",
                            1 => 18014,
                            2 => 18025,
                        ],
                        "account_type" => 17974, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 17976, // ID campo que define a o banco do proponente
                        "branch" => 17973, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 17972, // ID campo que define o DV da agência bancária do proponente
                        "account" => 17971, // ID campo que define a conta bancária do proponente
                        "account_dv" => 17970, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "827" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "Faixa 1 - Instituições/Entidades formalizadas - Proposta de R$ 15.000,00" => "2",
                                "Faixa 2 - Coletivos/Grupos não formalizados - Proposta de R$ 10.000,00" => "1",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => "category", // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "category",
                            1 => 18066,
                            2 => 18038,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "category",
                            1 => 18064,
                            2 => 18067,
                        ],
                        "account_type" => 18094, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 18095, // ID campo que define a o banco do proponente
                        "branch" => 18093, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 18092, // ID campo que define o DV da agência bancária do proponente
                        "account" => 18091, // ID campo que define a conta bancária do proponente
                        "account_dv" => 18090, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "840" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "PF (Pessoa Física)" => "1",
                                "Circo Itinerante, Escola, Espaço de Formação Circense, Companhia, Coletivo, Grupo ou Trupe Circense sem constituição jurídica (representado por Pessoa Física)" => "1",
                                "PJ (Pessoa Jurídica), incluindo MEI (Microempreendedor Individual)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => 18191, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 18220,
                            2 => 18214,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 18185,
                            2 => 18222,
                        ],
                        "account_type" => 18231, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 18229, // ID campo que define a o banco do proponente
                        "branch" => 18232, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 18203, // ID campo que define o DV da agência bancária do proponente
                        "account" => 18210, // ID campo que define a conta bancária do proponente
                        "account_dv" => 18202, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "841" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "PF (Pessoa Física)" => "1",
                                "Coletivos de Artesanato, Ateliês ou Feira de Arte e Artesanato sem constituição jurídica (representado por Pessoa Física)" => "1",
                                "PJ (Pessoa Jurídica), incluindo MEI (Microempreendedor Individual)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => 18250, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 18271,
                            2 => 18259,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 18249,
                            2 => 18275,
                        ],
                        "account_type" => 18280, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 18278, // ID campo que define a o banco do proponente
                        "branch" => 18279, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 18277, // ID campo que define o DV da agência bancária do proponente
                        "account" => 18266, // ID campo que define a conta bancária do proponente
                        "account_dv" => 18282, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "842" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "PF (Pessoa Física)" => "1",
                                "Grupo/coletivo sem constituição jurídica (representado por Pessoa Física)" => "1",
                                "PJ (Pessoa Jurídica), incluindo MEI (Microempreendedor Individual)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => 18307, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 18322,
                            2 => 18330,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 18320,
                            2 => 18319,
                        ],
                        "account_type" => 18310, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 18312, // ID campo que define a o banco do proponente
                        "branch" => 18309, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 18347, // ID campo que define o DV da agência bancária do proponente
                        "account" => 18340, // ID campo que define a conta bancária do proponente
                        "account_dv" => 18348, // ID campo que define o DV da conta bancária do proponente
                    ],
                    "843" => [
                        "canab_bb_default_value" => '1 Banco Do Brasil S.A (BB)', // Define qual valor padão representa o Banco do Brasil
                        "settings" => [ // Configurações padrões
                            "social_type" => [ // Tipo de proponente (Pessoa Fisica ou Pessoa Jurídica) Pessoa Fisica = 1 Pessoa Jurídica = 2
                                "PF (Pessoa Física)" => "1",
                                "Grupo/coletivo sem constituição formal (representado por Pessoa Física)" => "1",
                                "Grupo/coletivo sem constituição jurídica (representado por Pessoa Física)" => "1",
                                "PJ (Pessoa Jurídica), incluindo MEI (Microempreendedor Individual)" => "2",
                            ],
                            "release_type" => [
                                1 => "01", // Corrente BB
                                2 => "05", // Poupança BB
                                3 => "03", // Outros bancos
                            ],
                        ],
                        "social_type" => 18382, // ID campo que define o tipo de ptoponente, (Pessoa Fisica ou Pessoa Jurídica)
                        "proponent_name" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 18406,
                            2 => 18381,
                        ],
                        "proponent_document" => [ // Chave 1 Pessoa física Chave 2 Pessoa Jurídica
                            "dependence" => "social_type",
                            1 => 18411,
                            2 => 18402,
                        ],
                        "account_type" => 18398, // ID campo que define o tipo de conta bancária do proponente
                        "bank" => 18380, // ID campo que define a o banco do proponente
                        "branch" => 18399, // ID campo que define a agência bancária do proponente
                        "branch_dv" => 18400, // ID campo que define o DV da agência bancária do proponente
                        "account" => 18414, // ID campo que define a conta bancária do proponente
                        "account_dv" => 18397, // ID campo que define o DV da conta bancária do proponente
                    ],
                ],
            ],
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
        ],
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
        ],
        "AbstractValidator" => [
            "namespace" => "AbstractValidator",
            "config" => [
                "is_opportunity_managed_handler" => function ($opportunity) {
                    $opportunityList =  ['820', '821', '822', '823', '825', '826', '827', '840', '841', '842', '843', '1120', '1131', '1146', '1147', '1175', '1176', '1177', '1178', '1179', '1180', '1181', '1182', '1183', '1184', '1185', '1186', '1187', '1188', '1189', '1190'];
                    return in_array($opportunity->id, $opportunityList) ? true : false;
                },
            ]
        ],
        "ValidadorHomodador" => [
            "namespace" => "GenericValidator",
            "config" => [
                "homologation_required_for_export" => false,
                "homologation_required" => false,
                "enabled_alter_status_on_import" => true,
                "name" => "validador homologador",
                'slug' => "validadorhomologador",
                'is_opportunity_managed_handler' => function ($opportunity) {
                    $opportunityList =  ['820', '821', '822', '823', '825', '826', '827', '840', '841', '842', '843'];
                    return in_array($opportunity->id, $opportunityList) ? true : false;
                },
            ]
        ],
        'FinancialValidador' => [
            'namespace' => "FinancialValidador",
            'config' => [
                'exportador_requer_homologacao' => false,
                'homologation_required' => false,
                'slug' => 'financial_validator',
                'name' => 'Validador Financeiro',
                'is_opportunity_managed_handler' => function ($opportunity) {
                    $opportunityList =  ['820', '821', '822', '823', '825', '826', '827', '840', '841', '842', '843', '1120', '1131', '1146', '1147', '1175', '1176', '1177', '1178', '1179', '1180', '1181', '1182', '1183', '1184', '1185', '1186', '1187', '1188', '1189', '1190'];
                    return in_array($opportunity->id, $opportunityList) ? true : false;
                },
            ]
        ],
        'SettingsPe' => [
            'namespace' => 'SettingsPe',
            'config' => [
                'home-banners' => [
                    [
                        'label' => '',
                        'alt' => 'Atualização do MapasCulturais',
                        'url' => '',
                        'image' => 'img/Mapa-Cultural_Full-HD.jpg'
                    ]
                ]
            ]
        ],
        'ClaimForm' => ['namespace' => 'ClaimForm'],
        'CadUnico' => [
            'namespace' => 'CadUnico',
            'config' => [
                'enabled' => true,
                'approved_after_send' => true,
                'featured' => true,
                'slug' => 'cadunico',
                'limit' => 1,
                'opportunity_id' => env("CADUNICO_OPPORTUNITY_ID", 970),
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
        'SubsiteMuseusSwitcher' => [
            'namespace' => 'SubsiteMuseusSwitcher',
            'config' => [
                "main_site_id" => 1,
                "museu_site_id" => 2,
            ]
        ]
    ]
];