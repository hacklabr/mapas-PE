<?php

namespace SettingsPe;

use DateTime;
use MapasCulturais\App;
use MapasCulturais\i;

class Controller extends \MapasCulturais\Controllers\EntityController
{
    use \MapasCulturais\Traits\ControllerAPI;

    function __construct()
    {
    }


    public function GET_copyBankData()
    {
        $this->requireAuthentication();

        $app = App::i();

        if (!$app->user->is('admin')) {
            return;
        }

        $save = isset($this->data['save']) ? true : false;
        $error = [];
        $success = [];
        $path_file = __DIR__ . '/config/copy-bank-data.php';
        if (file_exists($path_file)) {
            include($path_file);
            $app->disableAccessControl();
            foreach ($data as $values) {
                foreach ($values as $key => $value) {
                    $exp = explode(":", $key);
                    $opp_from = trim($exp[0]);
                    $opp_to = trim($exp[1]);

                    if (isset($value['registrations'])) {
                        $registrations = $value['registrations'];
                        foreach ($registrations as $registration) {
                            $reg_from = $app->repo('Registration')->findOneBy(['number' => $registration, 'opportunity' => $opp_from]);
                            $reg_to = $app->repo('Registration')->findOneBy(['number' => $registration, 'opportunity' => $opp_to]);


                            if ($reg_from && $reg_to) {
                                $reg_from->registerFieldsMetadata();
                                $reg_to->registerFieldsMetadata();

                                foreach ($value['fields'] as $from => $to) {
                                    $field_name_from = "field_{$from}";
                                    $field_name_to = "field_{$to}";

                                    if ($reg_from->$field_name_from && $reg_from->$field_name_from != "" || is_numeric($reg_from->$field_name_from) || $reg_from->$field_name_from === 0) {
                                        $reg_to->$field_name_to = $reg_from->$field_name_from;
                                        $_val = str_pad($reg_from->$field_name_from, 20, ' ');
                                        $success[] = "{$_val} do campo de ID: {$from} da fase de origem {$opp_from}, foi copiado para fase de destino {$opp_to} no campo de ID {$to} na inscrição {$registration}";
                                    } else {
                                        $error[] = "Durante a cópia dados da inscrição {$registration} verificamos que -- O campo de ID: {$from} não esta preenchido na fase de origem ID: {$opp_from}";
                                    }
                                }

                                if($save) {
                                    $reg_to->save(true); 
                                }
                            } else {
                                $error[] = "Inscrição {$registration} não importada da fase de origem ID: {$opp_from} para fase de destino ID: {$opp_to}";
                            }
                        }
                    }
                }
            }
            $app->enableAccessControl();
        }

        dump(["Sucessos" => $success, "Error" => $error]);
    }
}
