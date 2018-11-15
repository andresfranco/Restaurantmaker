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
    $this->checkActiveMenu($menu);
    $this->view->pick('front_end/themes/default/default_theme');
    // Restaurant  Data
    $restarantTranaslationData =$this->getRestaurantTranslationData($restaurantid);
    $this->view->restaurantTranslations = $this->checkRestaurantTranslationData($restarantTranaslationData); 
    //Main Menu Data
    $menu = $this->getActiveMenu($restaurantid);
    $this->view->menuTranslations = $this->checkMenuData($menu);
    $menuDishesData =$this->checkMenuDishesAndCategories($menu);
    $this->view->categoryTranslations=$menuDishesData["categories"];
    $this->view->dishTranslations=$menuDishesData["dishes"];     
  }
  

  
  public function checkMenuDishesAndCategories($menu){
     if($menu->id)
     {
      $categories =$this->getDishCategories($menu->id,$this->getSelectedLanguage());

      //Get Menu dishes
       $dishes =$this->getMenuDishes($menu->id,$this->getSelectedLanguage());
       $dishData =$this->checkDishTranslation($dishes);

     }
     else
     {
        $categories = null;
     }
      
     $data =["dishes"=>$dishes,"dishData"=>$dishData,"categories"=>$categories];
     return $data;
  }
  public function checkMenuData($menu){
    if($menu){
      $menuData =$this->checkRestaurantMenu($menu);
    
    }else
    {
      $menuData=(object)["title"=>"No menu title translation set","name"=>"No menu translation name set"];
    }  
    return $menuData;
  }
  public function checkRestaurantTranslationData($restarantTranaslationData){
     if($restarantTranaslationData)
    {
      $restaurantData = $this->checkRestaurantTranslation($restarantTranaslationData); 
    }else
    {
      $restaurantData=(object)["name"=>"No translation name set","image_title"=>"No image title set"];
    }
    return $restaurantData;
  }
  
  public function checkRestaurantTranslation($restaurantData){
    if(!is_object($restaurantData)) {
        $restaurantData->name ="restaurant.translation.name.data.required";
        $restaurantData->image_title="restaurant.translation.image_title.data.required";
    }
     return $restaurantData;
  }
  
  public function checkRestaurantMenu($menu)
  {
    $menuData = "<p>No menu Data</p>";
    if ($menu){
      $menuData =$this->checkMenuTranslation($this->getMenuTranslationData($restaurantid,$menu));
    }
    return $menuData;
    
  }
  public function checkActiveMenu($menu)
  {
    if($menu){   
    $this->view->menuTitle =$menu->title;
    $this->view->menuDescription= $menu->description;
    }else{
        $this->view->menuTitle ="No menu title available";
        $this->view->menuDescription= "No menu description available";
    }
  }
  
  public function checkMenuTranslation($menuData){
    if(!is_object($menuData)) {
        $menuData->title="menu.translation.title.data.required";
        $menuData->name="menu.translation.name.data.required";
        $menuData->description="menu.translation.description.data.required";
    }
     return $menuData;
  }
  
   public function checkCategoryTranslation($categoryData)
   {
    if(!is_object($categoryData)) 
    {
        $categoryData->category="category.translation.category.data.required";
       
    }
     return $categoryData;
   }
  public function checkDishTranslation($dishData)
   {
    if(!is_object($dishData))
    {
        $dishData->name="dish.translation.name.data.required";       
    }
     return $dishData;
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
    
    return $menuData;
  }
  
   public function getCategoriesTranslationData($categories){
      $languagecode= $this->getSelectedLanguage();
      $categoryData = CategoryTranslation::find(
    [
        "categoryid = :categoryid: AND languagecode = :languagecode:",
        "bind" => ["categoryid" => $categories->id,"languagecode" => $languagecode]
    ]
    );
    
    return $categoryData;
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
  
  public function getDishCategories($menuId,$languagecode){
     $categories = CategoryTranslation::getTranslatedCategoryByDish($menuId,$languagecode)->toArray();   
     return $categories;
   
  }
  
  public function getMenuDishes($menuId,$languagecode){
  
       $dishes= $this->modelsManager->createBuilder()
             ->columns(array('dt.name as name','dt.description as description','d.price as price','d.categoryid as categoryid'))
             ->from(array('dt' => 'DishTranslation'))
             ->join('Dish', 'd.id = dt.dishid', 'd')
             ->join('Language', 'l.code = dt.languagecode', 'l')
             ->where('d.menuid = :menuid:', array('menuid' =>$menuId))
             ->AndWhere('l.code = :languagecode:', array('languagecode' =>$languagecode ))
             ->getQuery()
             ->execute();
      return $dishes;   
  }
    public function getEvents($languagecode){
  //SELECT * FROM `event` order by start_date desc LIMIT 3
       $dishes= $this->modelsManager->createBuilder()
             ->columns(array('et.name_translation as name','et.description as description','et.location as location'))
             ->from(array('et' => 'EventTranslation'))
             ->join('Event', 'e.id = et.eventid', 'e')
             ->join('Language', 'l.code = dt.languagecode', 'l')
             ->where('d.menuid = :menuid:', array('menuid' =>$menuId))
             ->AndWhere('l.code = :languagecode:', array('languagecode' =>$languagecode ))
             ->getQuery()
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
