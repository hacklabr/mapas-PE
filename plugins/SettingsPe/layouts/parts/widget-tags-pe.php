<?php

use MapasCulturais\i;

$entityClass = $entity->getClassName();
$entityName = strtolower(array_slice(explode('\\', $entityClass), -1)[0]);

$subareas = array_values($app->getRegisteredTaxonomy($entityClass, 'subarea')->restrictedTerms);
sort($subareas);


$areas = array_values($app->getRegisteredTaxonomy($entityClass, 'area')->restrictedTerms);
sort($areas);

$funcoes = array_values($app->getRegisteredTaxonomy($entityClass, 'funcao')->restrictedTerms);
sort($funcoes);


$viewModeString = $entityName !== 'project' ? '' : ',viewMode:list';
$tags = $entity->terms['tag'];
?>

<div class="widget areas elements-wideget">
    <div>
        <h3> <span class="required"></span> <?php $this->dict('taxonomies:area: name') ?></h3>
        <?php if ($this->isEditable()) : ?>
            <span id="term-area" class="js-editable-taxonomy" data-original-title="<?php $this->dict('taxonomies:area: name') ?>" data-emptytext="<?php $this->dict('taxonomies:area: select at least one') ?>" data-restrict="true" data-taxonomy="area"><?php echo implode('; ', $entity->terms['area']) ?></span>
        <?php else : ?>
            <?php
            foreach ($areas as $i => $t) : if (in_array($t, $entity->terms['area'])) : ?>
                    <a class="tag tag-<?php echo $this->controller->id ?>" href="<?php echo $app->createUrl('site', 'search') ?>##(<?php echo $entityName ?>:(areas:!(<?php echo $i ?>)),global:(enabled:(<?php echo $entityName ?>:!t),filterEntity:<?php echo $entityName ?>))">
                        <?php echo $t ?>
                    </a>
            <?php endif;
            endforeach; ?>
        <?php endif; ?>
    </div>

    <div>
        <h3> <span class="required"></span> <?php i::_e('Sub área de atuação'); ?></h3>
        <?php if ($this->isEditable()) : ?>
            <span id="term-area" class="js-editable-taxonomy" data-original-title="<?php i::_e('Sub área de atuação'); ?>" data-emptytext="<?php i::_e('Selecione a sub-área de atuação'); ?>" data-restrict="true" data-taxonomy="subarea"><?php echo implode('; ', $entity->terms['subarea']) ?></span>
        <?php else : ?>
            <?php
            foreach ($subareas as $i => $t) : if (in_array($t, $entity->terms['subarea'])) : ?>
                    <a class="tag tag-<?php echo $this->controller->id ?>" href="<?php echo $app->createUrl('site', 'search') ?>##(<?php echo $entityName ?>:(subareas:!(<?php echo $i ?>)),global:(enabled:(<?php echo $entityName ?>:!t),filterEntity:<?php echo $entityName ?>))">
                        <?php echo $t ?>
                    </a>
            <?php endif;
            endforeach; ?>
        <?php endif; ?>
    </div>

    <?php if ($this->isEditable() || !empty($tags)) : ?>
        <div>
            <h3><?php \MapasCulturais\i::_e("Tags"); ?></h3>
            <?php if ($this->isEditable()) : ?>
                <span id="term-area" class="js-editable-taxonomy" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Tags"); ?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira tags"); ?>" data-taxonomy="tag"><?php echo implode('; ', $entity->terms['tag']) ?></span>
            <?php else : ?>
                <?php
                foreach ($tags as $i => $t) : ?>
                    <a class="tag tag-<?php echo $this->controller->id ?>" href="<?php echo $app->createUrl('site', 'search') ?>##(<?php echo $entityName ?>:(keyword:'<?php echo $t ?>'),global:(enabled:(<?php echo $entityName ?>:!t),filterEntity:<?php echo $entityName ?><?php echo $viewModeString; ?>))">
                        <?php echo $t ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div>
            <h3> <?php \MapasCulturais\i::_e("Funções"); ?> </h3>
            <?php if ($this->isEditable()) : ?>
                <span id="term-funcao" class="js-editable-taxonomy" data-original-title="<?php \MapasCulturais\i::_e("Funções"); ?>" data-emptytext="<?php \MapasCulturais\i::_e("Selecione suas funções") ?>" data-restrict="true" data-taxonomy="funcao"><?php echo implode('; ', $entity->terms['funcao']) ?></span>
            <?php else : ?>
                <?php
                foreach ($funcoes as $i => $t) : if (in_array($t, $entity->terms['funcao'])) : ?>
                        <a class="tag tag-<?php echo $this->controller->id ?>" href="<?php echo $app->createUrl('site', 'search') ?>##(<?php echo $entityName ?>:(funcao:!(<?php echo $i ?>)),global:(enabled:(<?php echo $entityName ?>:!t),filterEntity:<?php echo $entityName ?>))">
                            <?php echo $t ?>
                        </a>
                <?php endif;
                endforeach; ?>
            <?php endif; ?>
        </div>

</div>