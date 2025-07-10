<?php

$agent = $relation->owner;

$area_atuacao_principal = null;
$sub_area_atuacao_principal = null;

if($resgistration){
    $resgistration->registerFieldsMetadata();
    $settings_pe_config =$app->plugins['SettingsPe']->config;
    $area_atuacao_principal = $resgistration->{$settings_pe_config['field_area_principal']};
    $sub_area_atuacao_principal = $resgistration->{$settings_pe_config['field_sub_area_principal']};
}
?>

<br><br>
<div class="card" style="background-image: url(<?php $this->asset("img/cadunico/card-bg.png") ?>);">
    <div class="card--left">
        <div class="user-img">
            <?php if ($agent->avatar) : ?>
                <img src="<?= $agent->avatar->url ?>" />
            <?php endif ?>
        </div>
    </div>
    <div class="card--right">
        <div class="title">
            Cadastro único da cultura
        </div>
        <div class="user-name">
            <?= $agent->name ?>
        </div>
        <div class="user-info">
            <div class="user-info__name">
                Nome completo: <?= $agent->nomeCompleto ?>
            </div>
            <div class="user-info__notation">
                ID: <?= $agent->id ?> | CPC: <?= $agent->CPC ?>
            </div>
        </div>
        <div class="user-description">
            <strong>Descrição curta:</strong> <?= $agent->shortDescription ?>
        </div>
        <div class="user-tags">
                <div class="tag-group">
                    <div class="tag-group__title"> Área de atuação principal: </div>
                    <div class="tag-group__content">
                        <div class="tag"> <?= $agent->areaprincipal ?> </div>
                    </div>
                </div>

                <div class="tag-group">
                    <div class="tag-group__title"> Subárea de atuação principal: </div>
                    <div class="tag-group__content">
                        <div class="tag"> <?= $agent->subareaprincipal ?> </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="cadunico">
    <div class="logos">
        <div class="logo">
            <img src="<?php $this->asset("img/cadunico/pe-img1.png") ?>" aria-hidden="true">
        </div>
        <div class="logo">
            <img src="<?php $this->asset("img/cadunico/pe-img2.png") ?>" aria-hidden="true">
        </div>
        <div class="logo">
            <img src="<?php $this->asset("img/cadunico/pe-img3.png") ?>" aria-hidden="true">
        </div>
        <div class="logo">
            <img src="<?php $this->asset("img/cadunico/pe-img4.png") ?>" aria-hidden="true">
        </div>
        <div class="logo">
            <img src="<?php $this->asset("img/cadunico/pe-img7.png") ?>" aria-hidden="true">
        </div>
        <div class="logo">
            <img src="<?php $this->asset("img/cadunico/pe-img6.png") ?>" aria-hidden="true">
        </div>
        <div class="logo">
            <img src="<?php $this->asset("img/cadunico/pe-img5.png") ?>" aria-hidden="true">
        </div>
    </div>
    <div class="text">
        Esse cartão não configura em uma comprovação de atuação artística para fins de candidatura em editais da SECULT-PE e FUNDARPE
    </div>
</div>
