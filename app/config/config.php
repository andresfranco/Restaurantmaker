<?php

defined('APP_PATH') || define('APP_PATH', realpath('..'));

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => 'picoromz2509',
        'dbname'      => 'testphalcon',
        'charset'     => 'utf8',
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'migrationsDir'  => APP_PATH . '/app/migrations/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/libraries/',
        'cacheDir'       => APP_PATH . '/app/cache/',
        'messagesDir'    => APP_PATH . '/app/messages/',
        'formsDir'       => APP_PATH . '/app/forms/',
        'filesDir'       => APP_PATH.'/public/metronic/assets/global/plugins/jquery-file-upload/server/php/files',
        'baseUri'        => '/Phalcontest/',
    )
));
