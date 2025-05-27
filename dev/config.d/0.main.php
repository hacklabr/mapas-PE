<?php
$_ENV['APP_MODE'] = 'development';
$__process_assets = false;

return [
    /* MAIN */
    'themes.active' => 'MapasPE',
    'app.mode' => $_ENV['APP_MODE'],
    'doctrine.isDev' => false, // deixe true somente se estiver trabalhando nos mapeamentos das entidades
    
    /* SELOS */
    'app.verifiedSealsIds' => [1],

    'cep.token' => 'bb4285301780180553bac282db70aa14',

    /* ASSET MANAGER */
    'themes.assetManager' => new \MapasCulturais\AssetManagers\FileSystem([
        'publishPath' => BASE_PATH . 'assets/',

        'mergeScripts' => $__process_assets,
        'mergeStyles' => $__process_assets,

        'process.js' => !$__process_assets ?
                'cp {IN} {OUT}':
                'terser {IN} --source-map --output {OUT} ',

        'process.css' => !$__process_assets ?
                'cp {IN} {OUT}':
                'uglifycss {IN} > {OUT}',

        'publishFolderCommand' => 'cp -R {IN} {PUBLISH_PATH}{FILENAME}'
    ]),
];