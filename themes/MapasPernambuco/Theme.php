<?php
namespace MapasPernambuco;
use MapasCulturais\Themes\BaseV1;
use MapasCulturais\App;
use MapasCulturais\i;

class Theme extends BaseV1\Theme{

    protected static function _getTexts(){
        $app = App::i();

        return [
           'site: name' => 'Mapas Cultural de Pernambuco',
           'home: title' => i::__("Bem-vind@!"),
           'home: abbreviation' => "plataforma Mapa Cultural de Pernambuco",
        ];
    }

    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {
        parent::_init();
        $app = App::i();
        $app->hook('view.render(<<*>>):before', function() use($app) {
            $this->_publishAssets();
        });

        // impede o download automático dos arquivos privados
        $app->hook('GET(file.privateFile).headers', function(&$headers){
            if(isset($headers['Content-Disposition']) && strpos($headers['Content-Disposition'], '.pdf')){
                unset($headers['Content-Description']);
                $headers['Content-Disposition'] = str_replace('attachment; ', '', $headers['Content-Disposition']);
            }
        });

        
       
    }

    protected function _publishAssets() {

    }
}
