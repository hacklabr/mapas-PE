<?php
namespace MapasPE;

class Theme extends \MapasCulturais\Themes\BaseV2\Theme {
    static function getThemeFolder() {
        return __DIR__;
    }

    function _init(){
        parent::_init();

        // eval(\psy\sh());
    }
}