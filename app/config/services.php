<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\Router\Annotations as RouterAnnotations;
use Phalcon\Translate\Adapter\NativeArray as NativeArray;
use Phalcon\Http\Request;
use \Phalcon\Mvc\Dispatcher as Dispatcher;
use Phalcon\Mvc\Controller;

defined('APP_PATH') || define('APP_PATH', realpath('..'));

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);



/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            $volt->getCompiler()->addFilter('t', function($resolvedArgs, $exprArgs) use ($di) {
            return '$this->getDI()->get("translate")->_(' . $resolvedArgs . ')';
            });
            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter($config->database->toArray());
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

$language =  $di->get("session")->get("language");
//Set default language
if (!$language)
{
  $language ='es';
}

$di->set('translate', function() use ($config,$language) {
  // Ask browser what is the best language
  $request = new Request();
  //echo "language". $dispatcher->getParam('language');

$translation = Translation::findBylanguagecode($language)->toArray();
$messages =array();
foreach($translation as $item)
{
 $messages[$item['translatekey']] =$item['value'];
}
  //$language = $dispatcher->getParam('language');
  //echo "lenguage".$language."<br>";
//$language =$request->getBestLanguage();

  // Check if we have a translation file for that lang
/*  if (file_exists(APP_PATH ."/app/messages/" . $language . ".php")) {
     require APP_PATH ."/app/messages/" . $language . ".php";
  } else {
     // fallback to some default
     require APP_PATH ."/app/messages/es.php";
  }
*/
    //require $config->application->messagesDir."es.php";

    return new NativeArray(array(
        "content" => $messages
    ));
});

//SET APP ROUTES
$di->set('router', function () {
    require APP_PATH.'/app/config/routes.php';
    return $router;
});
