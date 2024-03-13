<?php

use function MapasCulturais\__exec;
use function MapasCulturais\__table_exists;
use function MapasCulturais\__try;
use MapasCulturais\App;

return [
    'Insere campo de conta corrente para extração do CNAB' => function () {
        $app = App::i();
        $em = $app->em;
        $conn = $em->getConnection();

        $opportunities_ids = [
            '1175' => '28773',
            '1176' => '28774',
            '1177' => '28775',
            '1178' => '28776',
            '1179' => '28777',
            '1180' => '28778',
            '1181' => '28779',
            '1182' => '28780',
            '1183' => '28781',
            '1184' => '28782',
            '1185' => '28783',
            '1186' => '28784',
            '1187' => '28785',
            '1188' => '28786',
            '1189' => '28787',
            '1190' => '28788'
        ];

        $app->disableAccessControl();
        foreach($opportunities_ids as $opp => $field) {
            $field_name = "field_".$field;
            if($registration_ids = $conn->fetchAll("SELECT id FROM registration WHERE opportunity_id = {$opp}")) {
                foreach($registration_ids as $value) {
                    $reg_id = $value['id'];
                    __exec("
                    INSERT INTO registration_meta (
                        id,
                        object_id,
                        key,
                        value
                    ) VALUES (
                        nextval('registration_meta_id_seq'::regclass), 
                        {$reg_id},
                        '{$field_name}',
                        'Conta corrente'
                    )");
                    $app->log->debug("{$reg_id} definido campo de conta corrente no campo {$field_name}");
                }
            }
        }
        $app->enableAccessControl();
    },
];