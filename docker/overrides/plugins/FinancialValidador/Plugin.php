<?php

namespace FinancialValidador;

use MapasCulturais\App;
use MapasCulturais\Entities\Registration;

require_once __DIR__ . "/../AbstractValidator/AbstractValidator.php";

class Plugin extends \AbstractValidator\AbstractValidator
{
    protected static $instanceBySlug = null;

    
    function __construct(array $config = [])
    {
        $slug = $config['slug'] ?? null;

        $config += [
            // se true, só exporta as inscrições pendentes que já tenham alguma avaliação
            'exportador_requer_homologacao' => true,

            //Retorna o nome que sera exibido na interface
            'name' => "",
            // Campos que devem existir na planilha
            'fields' => [],

            // se true, só exporta as inscrições 
            'exportador_requer_validacao' => [],

            // Trata os campos que aparecem na exportação
            'fields_tratament' => function ($registration, $field) {
                if(!$this->config['fields']){return;}
                $result = [                   
                    'CPF' => function () use ($registration, $field) {
                       
                        $field = $this->prefixFieldId($field);
                        return preg_replace('/[^0-9]/i', '', $registration->$field);
                    },
                    'NOME_COMPLETO' => function () use ($registration, $field) {                        
                        $field = $this->prefixFieldId($field);
                        return $registration->$field;
                    },
                ];

                $callable = $result[$field] ?? null;

                return $callable ? $callable() : null;
            }
        ];
        
        $config['forcar_resultado'] = true;
        $this->_config = $config;
        parent::__construct($config);

        self::$instanceBySlug[$config["slug"]] = $this;
    }

    function _init()
    {
        $app = App::i();

        $plugin = $this;


        //botao de export csv
        $app->hook('template(opportunity.<<single|edit>>.sidebar-right):end', function () use($plugin, $app){
            
            $opportunity = $this->controller->requestedEntity; //Tive que chamar o controller para poder requisitar a entity
            $isOpportunityManager = $plugin->config['is_opportunity_managed_handler'];
            
            if ($opportunity->id == $isOpportunityManager($opportunity) && $opportunity->canUser('@control')) {

                /** @var \MapasCulturais\Theme $this */
                $this->part('financial-validador/validador-uploads', ['entity' => $opportunity, 'plugin' => $plugin]);
            }
        });

        // atualiza os metadados legados para o novo formato requerido
        if (!$app->repo('DbUpdate')->findBy(['name' => 'update registration_meta financeiro'])) {
            $conn = $app->em->getConnection();
            $conn->beginTransaction();
            
            $slug = $this->getSlug();
            $conn->executeQuery("
                UPDATE 
                    registration_meta 
                SET 
                    value = CONCAT('[\"',value,'\"]') 
                WHERE 
                    key = '{$slug}_filename'");
                    
            $conn->executeQuery("
                UPDATE 
                    registration_meta 
                SET 
                    value = CONCAT('[',value,']') 
                WHERE 
                    key = '{$slug}_raw'");

            $app->disableAccessControl();
            $db_update = new \MapasCulturais\Entities\DbUpdate;
            $db_update->name = 'update registration_meta financeiro';
            $db_update->save(true);
            $app->enableAccessControl();
            $conn->commit();
        }

        parent::_init();
    }

    function register()
    {
        $app = App::i();
        $slug = $this->getSlug();

        $this->registerOpportunityMetadata($this->prefix('processed_files'), [
            'label' => 'Arquivos do Validador Financeiro Processados',
            'type' => 'json',
            'private' => true,
            'default_value' => '{}'
        ]);

        $this->registerRegistrationMetadata($this->prefix('filename'), [
            'label' => 'Nome do arquivo de retorno do validador financeiro',
            'type' => 'json',
            'private' => true,
            'default_value' => '[]'
        ]);

        $this->registerRegistrationMetadata($this->prefix('raw'), [
            'label' => 'Validador Financeiro raw data (csv row)',
            'type' => 'json',
            'private' => true,
            'default_value' => '[]'
        ]);

        // $file_group_definition = new \MapasCulturais\Definitions\FileGroup($slug, ['^text/csv$', 'aplication/vnd.ms-excel'], 'O arquivo enviado não é um csv.',false,null,true);
        $file_group_definition = new \MapasCulturais\Definitions\FileGroup($slug, [], '',false,null,true);
        $app->registerFileGroup('opportunity', $file_group_definition);

        parent::register();

        // $app->controller($slug)->plugin = $this;
    }
    
    /**
     * Retorna o nome configurado
     *
     * @return string
     */
    function getName(): string
    {
        return $this->config['name'];
    }
    
    /**
     * Retorna o slug configurado
     *
     * @return string
     */
    function getSlug(): string
    {
        return $this->config['slug'];
    }
    
    /**
     * Retorna o nome da classe
     *
     * @return string
     */
    function getControllerClassname(): string
    {
        return Controller::class;
    }   
    
    /**
     * Retorna o usuário autenticado
     *
     */
    function getUser()
    {
        $app = App::i();

        return $app->repo('User')->findOneBy(['authUid' => $this->getAuthUid()]);
    }
    
    /**
     * Retorna uma instancia do plugin com base no slug
     *
     * @param  string $slug
     * @return Plugin
     */
    public static function getInstanceBySlug(string $slug)
    {
        return  self::$instanceBySlug[$slug];
    }

        
    /**
     * Retorna o valor com o slug fixado como prefixo
     *
     * @param  string $value
     * @return string
     */
    public function prefix(string $value)
    {
        return $this->getSlug()."_".$value;
    }

    function isRegistrationEligible(Registration $registration): bool
    {
        return true;
    }

    public function prefixFieldId($value)
    {
        $fields_id = $this->config['fields'];
        return $fields_id[$value] ? "field_".$fields_id[$value] : null;
    }
    
}
