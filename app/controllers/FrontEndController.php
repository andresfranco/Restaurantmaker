<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use ActionForm as ActionForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/front_end")
 */
class FrontEndController extends ControllerBase
{

  /**
   * @Route("/home", methods={"GET"}, name="home")
  */
  public function homeAction()

  {
     $this->get_assets();
     $this->view->website_title ='Gambrinus Pub and Grill';
     $this->view->favicon_url = 'frontend/themes/default/images/beer.ico';
     $this->view->main_page_title = 'Gambrinus Pub & Grill';
     $this->view->pick('front_end/themes/default/default_theme');

  }

  public function get_assets()
  {
    $this->assets->collection('frontend_js')
    //Jquery
    ->addJs('frontend/themes/default/assets/jquery.js')
    //wow script
    ->addJs('frontend/themes/default/assets/wow/wow.min.js')
    //Bootstrap
    ->addJs('frontend/themes/default/assets/bootstrap/js/bootstrap.js')
    //Jquery Mobile
    ->addJs('frontend/themes/default/assets/mobile/touchSwipe.min.js')
    ->addJs('frontend/themes/default/assets/respond/respond.js')
     //Gallery
    ->addJs('frontend/themes/default/assets/gallery/jquery.blueimp-gallery.min.js')
    //Maps
    ->addJs('https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js')
    //Angular JS
    ->addJs('https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js',false)
    //Custom Script
    ->addJs('frontend/themes/default/assets/script.js');



    $this->assets
    ->collection('frontend_fonts')
    ->addCss('http://fonts.googleapis.com/css?family=Roboto:400,300,700',false)
    ->addCss('http://fonts.googleapis.com/css?family=Lobster',false)
    ->addCss('http://fonts.googleapis.com/css?family=Josefin+Sans:600',false);


    $this->assets
    ->collection('frontend_css')
    //font awesome
    ->addCss('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css',false)
    //bootstrap
    ->addCss('frontend/themes/default/assets/bootstrap/css/bootstrap.min.css')
    //animate.css
    ->addCss('frontend/themes/default/assets/animate/animate.css')
    ->addCss('frontend/themes/default/assets/animate/set.css')
    //gallery
    ->addCss('frontend/themes/default/assets/gallery/blueimp-gallery.min.css')
    ->addCss('frontend/themes/default/assets/style.css');
  }

}
