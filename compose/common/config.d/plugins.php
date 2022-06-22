<?php

return [
    'plugins' => [
        'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical'],
        'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
        'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
        
        'MultipleLocalAuth' => [ 'namespace' => 'MultipleLocalAuth' ],
        'SamplePlugin' => ['namespace' => 'SamplePlugin'],
        'MapasBlame' => ['namespace' => 'MapasBlame'],
        'AbstractValidator' => [
          'namespace' => 'AbstractValidator',
          'config' => [
               'is_opportunity_managed_handler' => function ($opportunity) {
                    $opportunityList =  ['820','821','822','823','825','826','827','840','841','842','843'];
                    return in_array($opportunity->id, $opportunityList) ? true : false;
                },
            ]
        ],

    ]
];
