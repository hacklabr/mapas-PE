<?php
namespace MapasPE;

class Theme extends \MapasCulturais\Themes\BaseV2\Theme {
    static function getThemeFolder() {
        return __DIR__;
    }

    function _init(){
        parent::_init();

        $app = App::i();
        
        // Manifest do five icon
        $app->hook('GET(site.webmanifest)', function() use ($app) {
            /** @var \MapasCulturais\Controller $this */
            $this->json([
                'icons' => [
                    [ 'src' => $app->view->asset('img/favicon.jpeg', false), 'type' => 'image/png', 'sizes' => '192x192' ],
                    [ 'src' => $app->view->asset('img/favicon.ico', false), 'type' => 'image/png', 'sizes' => '512x512' ]
                ],
            ]);
        });
    }
}