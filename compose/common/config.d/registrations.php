<?php

return [
    'registration.ownerDefinition' => array(
        'required' => true,
        'label' => \MapasCulturais\i::__('Agente responsável pela inscrição'),
        'agentRelationGroupName' => 'owner',
        'description' => \MapasCulturais\i::__('Agente individual (pessoa física). O agente deve estar devidamente cadastrado, não podendo ser um agente Coletivo ou ter seu cadastro pertencente a um outro agente. '),
        'type' => 1
    ),
];