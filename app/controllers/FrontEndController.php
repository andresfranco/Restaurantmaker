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
   * @Route("/{restaurantid}", methods={"GET"}, name="home")
  */
  public function homeAction($restaurantid)

  {
    $restaurant = Restaurant::findFirst($restaurantid);
    $this->getAssets();
    //Restaurant Favicon 
    $this->view->favicon_url = '/files/images/'.$restaurant->favicon;
    //Restaurant Main Image Slider
    $this->view->mainImage = '/files/images/'.$restaurant->main_image;   
    //Restaurant Logo
    $this->view->logo = '/files/images/'.$restaurant->logo_path;
    //Front End Languages
     $this->view->languages = Language::find();
    //Get Main Menu 
    $menu = $this->getActiveMenu($restaurantid);
    
    $this->view->menuTitle =$menu->title;
    $this->view->menuDescription= $menu->description;
    
    
    $this->view->pick('front_end/themes/default/default_theme');
    
    // Restaurant  Data
    $restaurantData = $this->checkRestaurantTranslation($this->getRestaurantTranslationData($restaurantid));
    $this->view->restaurantTranslations = $restaurantData;
    
    //Main Menu Data
    $menu = $this->getActiveMenu($restaurantid);
    $menuData =$this->checkMenuTranslation($this->getMenuTranslationData($restaurantid,$menu));
    $this->view->menuTranslations = $menuData;
    
    $dishes =$this->getMenuDishes($menu->id);
   // $dishesData = 
     
  }
  
  public function checkRestaurantTranslation($restaurantData){
    if(!is_object($restaurantData)) {
        $restaurantData->name ="restaurant.translation.name.data.required";
        $restaurantData->image_title="restaurant.translation.image_title.data.required";
    }
     return $restaurantData;
  }
  
  public function checkMenuTranslation($menuData){
    if(!is_object($menuData)) {
        $menuData->title="menu.translation.title.data.required";
        $menuData->name="menu.translation.name.data.required";
        $menuData->description="menu.translation.description.data.required";
    }
     return $menuData;
  }
  
  public function getRestaurantTranslationData($restaurantid)
  {   
      $languagecode= $this->getSelectedLanguage();
      $restaurantTranslation = RestaurantTranslation::findFirst(
    [
        "restaurantId = :restaurantid: AND languagecode = :languagecode:",
        "bind" => ["restaurantid" => $restaurantid,"languagecode" => $languagecode]
    ]
    );
      //var_dump($this->getRestaurantTranslationData($restaurantid));
    return $restaurantTranslation;
  }
  
  public function getMenuTranslationData($restaurantid,$menu){
      $languagecode= $this->getSelectedLanguage();
      $menuData = MenuTranslation::findFirst(
    [
        "menuId = :menuid: AND languagecode = :languagecode:",
        "bind" => ["menuid" => $menu->id,"languagecode" => $languagecode]
    ]
    );
      //var_dump($this->getRestaurantTranslationData($restaurantid));
    return $menuData;
  }
  
  
  public function getSelectedLanguage()
  { 
    $languagecode ='en';
    if($this->session->get('language'))
    { 
      $languagecode =$this->session->get('language'); 
    }
    return $languagecode;
  }
    
  
  
  public function getActiveMenu($restaurantId){
    
     $menu = Menu::findFirst(
    [
        "restaurantid = :restaurantid: AND active = :active:",
        "bind" => [
            "restaurantid" => $restaurantId,
            "active" => "Y",
        ],
    ]
);
   
      return $menu;
        
  }
  
  public function getMenuDishes($menuId){
        $dishes=Dish::query()
            ->where("menuid = :menuid:")
            ->bind(["menuid" => $menuId])
            ->execute();
      return $dishes;   
  }
  
  
  
  
 
  public function getAssets()
  {
    $this->assets->collection('frontend_js')
    //Jquery
    //->addJs('frontend/themes/default/assets/jquery.js')
    //wow script
    ->addJs('frontend/themes/default/assets/wow/wow.min.js')
    //Bootstrap
   // ->addJs('frontend/themes/default/assets/bootstrap/js/bootstrap.js')
    //Jquery Mobile
    ->addJs('frontend/themes/default/assets/mobile/touchSwipe.min.js')
    ->addJs('frontend/themes/default/assets/respond/respond.js')
     //Gallery
    ->addJs('frontend/themes/default/assets/gallery/jquery.blueimp-gallery.min.js')
    //Maps
    ->addJs('https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js')
    //Angular JS
   // ->addJs('https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js',false)
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
  

  
  public function getRestaurantData($restaurantid){
    $restaurant = Restaurant::findFirst($restaurantid);
    return $restaurant;
  }
  public function getMenuData($restaurantid){
    $menu = Menu::findFirst($restaurantid);
    return $menu;
  }
  
  public function getMenuCategories(){
    $categories = DishCategory::find();
    return $category;
  }
  
  public function getDishData($menuid){
    $dishes = Dish::findByMenuid($menuid);
    return $dishes;
    
  }

}
