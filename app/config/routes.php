<?php
use Phalcon\Mvc\Router\Annotations as RouterAnnotations;
use Phalcon\Mvc\Router;
$router = new RouterAnnotations(false);

$router->notFound(
    [

      "controller" => "Error",
      "action" => "error404"
    ]
  );

$router->add(
"/setlang/{lang}",
array(
  "controller" => "Manager",
  "action"     => "setlanguage"
)
);
$router->add(
"/error404",
array(
  "controller" => "Error",
  "action"     => "error404"
)


)->setName("error404");

$router->addResource('Apartment', '/apartment');
$router->addResource('Tower', '/tower');
$router->addResource('Login', '/login');
$router->addResource('Country', '/country');
$router->addResource('State', '/state');
$router->addResource('City', '/city');
$router->addResource('Township', '/township');
$router->addResource('Neighborhood', '/neighborhood');
$router->addResource('Index', '/index');
$router->addResource('Test', '/test');
$router->addResource('Address', '/address');
$router->addResource('Error', '/error');
$router->addResource('User', '/user');
$router->addResource('Role', '/role');
$router->addResource('Action', '/action');
$router->addResource('UserRole', '/userrole');
$router->addResource('ActionRole', '/actionrole');
$router->addResource('Language', '/language');
$router->addResource('Translation', '/translation');
$router->addResource('Address', '/address');
$router->addResource('File', '/file');
$router->addResource('Gallery', '/gallery');
$router->addResource('SystemParameter', '/systemparameter');
$router->addResource('FileFormat', '/fileformat');
$router->addResource('Article', '/article');
$router->addResource('ArticleComment', '/article_comment');
$router->addResource('Files', '/files');
$router->addResource('Restaurant', '/restaurant');
$router->addResource('RestaurantTranslation', '/restaurant_translation');
$router->addResource('FrontEnd', '/front_end');
$router->addResource('Menu', '/menu');
$router->addResource('Dish', '/dish');
$router->addResource('DishCategory', '/dish_category');
$router->addResource('DishTranslation', '/dish_translation');
$router->addResource('ArticleTranslation', '/article_translation');
$router->addResource('Event', '/event');
$router->addResource('EventGallery', '/eventgallery');
$router->addResource('Test', '/test');
return $router;
