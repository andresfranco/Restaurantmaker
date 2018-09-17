<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use MenuTranslationForm as MenuTranslationForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/menu_translation")
 */
class MenuTranslationController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'menu_translation/list';
        $this->crud_params['entityname']         = 'MenuTranslation';
        $this->crud_params['not_found_message']  = 'menu_translation.entity.notfound';
        $this->crud_params['controller']         = 'MenuTranslation';
        $this->crud_params['action_list']        = 'menu_translation_list';
        $this->crud_params['form_name']          = 'MenuTranslationForm';
        $this->crud_params['delete_message']     = 'menu_translation.delete.question';
        $this->crud_params['create_route']       = 'menu_translation/create';
        $this->crud_params['save_route']         = 'menu_translation/save/';
        $this->crud_params['delete_route']       = 'menu_translation/delete/';
        $this->crud_params['add_edit_view']      = 'menu_translation/addedit';
        $this->crud_params['show_view']          = 'menu_translation/show';
        $this->crud_params['new_title']          = 'menu_translation.title.new';
        $this->crud_params['edit_title']         = 'menu_translation.title.edit';
        $this->crud_params['form_columns']       = array(

        array('name' => 'languagecode','label'=>'Language'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="menu_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'name','label'=>'Name translation'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="menu_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'title','label'=>'Title'
        ,'required'=>'<span  aria-required="true">* </span>'
        ,'label_error'=>'<span id ="menu_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'description','label'=>'Description'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="menu_translationerror" name ="codeerror" class="has-error"></span>')
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
        $this->tag->setDefault("menuId", $entity_object->getmenuId());
        $this->tag->setDefault("languagecode", $entity_object->getLanguagecode());
        $this->tag->setDefault("name", $entity_object->getName());
        $this->tag->setDefault("title", $entity_object->getTitle());
        $this->tag->setDefault("description", $entity_object->getDescription());
      }
    }

    public function set_post_values($entity,$menuId)
    {
      $entity->setmenuId($menuId);
      $entity->setLanguagecode($this->request->getPost("languagecode"));
      $entity->setName($this->request->getPost("name"));
      $entity->setTitle($this->request->getPost("title"));
      $entity->setDescription($this->request->getPost("descriptioncontent"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'menu_translation/new'
    ,'edit_route'=>'menu_translation/edit/'
    ,'show_route'=>'menu_translation/show/'
    ,'search_route'=>'menu_translation/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'menu_translation/menu_translation_list'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'menu_translation.notfound'
    ,'title' =>'menu_translation.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'restaurant','title' => 'Restaurant','class'=>'')
      ,array('column_name' => 'menu','title' => 'Menu','class'=>'')
      ,array('column_name' => 'language','title' => 'Language','class'=>'')
      ,array('column_name' => 'title','title' => 'Title','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'restaurant','title' => 'Restaurant','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'menu','title' => 'Menu','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'language','title' => 'Language','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'title','title' => 'Title','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')

    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list/{menuId}", methods={"GET","POST"}, name="menu_translation_list")
  */
  public function listAction($menuId)
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('menu_translation/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('mt.id as id','mt.menuId as menuId','mt.languagecode as languagecode','l.language as language','r.name as restaurant','m.menu_name as menu','mt.title'))
             ->from(array('mt' => 'MenuTranslation'))
             ->join('Menu', 'm.id = mt.menuId', 'm')
              ->join('Restaurant', 'm.restaurantid= r.id', 'r')
             ->join('Language', 'l.code = mt.languagecode', 'l')
             ->where('mt.menuId = :menuId:', array('menuId' =>$menuId ))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->menuId = $menuId;
   $menuData = $this->getMenuDataById($menuId);
    
    $restaurantData= $this->getRestaurantDataById($menuData['restaurantid']);
   
    $this->view->restaurant_name =$restaurantData['name'].'-'.$menuData['menu_name'];
    
    $this->view->menu_id = $menuData['menuid'];
    $this->view->obj = $this;
  }

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create Menu'
    ,'Edit Menu'
    ,'Manage Menu'
    ,'Delete Menu');

  }

  
  /**
  * @Route("/search/{menuId}", methods={"GET","POST"}, name="menu_translationsearch")
  */
  public function searchAction($menuId)

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('menu_translation/search');

    $search_values =array(array('name'=>'restaurant','value'=>$this->request->getPost("restaurant"))
    
    ,array('name'=>'menu','value'=>$this->request->getPost("menu"))                      
    ,array('name'=>'language','value'=>$this->request->getPost("language"))
    ,array('name'=>'title','value'=>$this->request->getPost("title"))
     );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =$this->modelsManager->createBuilder()
              ->columns(array('mt.id as id','mt.menuId as menuId','mt.languagecode as languagecode','l.language as language','r.name as restaurant','m.menu_name as menu','mt.title'))
             ->from(array('mt' => 'MenuTranslation'))
             ->join('Menu', 'm.id = mt.menuId', 'm')
              ->join('Restaurant', 'm.restaurantid= r.id', 'r')
             ->join('Language', 'l.code = mt.languagecode', 'l')
             ->where('mt.menuId = :menuId:', array('menuId' =>$menuId ))
             ->AndWhere('r.name LIKE :restaurant:', array('restaurant' => '%' . $params_query['restaurant']. '%'))
             ->AndWhere('m.menu_name LIKE :menu:', array('menu' => '%' . $params_query['menu']. '%'))
             ->AndWhere('l.language LIKE :language:', array('language' => '%' . $params_query['language']. '%'))
             ->AndWhere('mt.title LIKE :title:', array('title' => '%' . $params_query['title']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->menuId = $menuId;
   
    $menuData = $this->getMenuDataById($menuId);
    
    $restaurantData= $this->getRestaurantDataById($menuData['restaurantid']);
   
    $this->view->restaurant_name =$restaurantData['name'].'-'.$menuData['menu_name'];
    
    $this->view->menu_id = $menuData['menuid'];
    $this->view->obj = $this;

  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validate_menu_translation/validate_menu_translation.js');
  }


  public function set_form_routes_custom($routeform,$routelist,$title
  ,$view_name,$mode,$entity,$form_name
  ,$form_columns,$save_button_name,$cancel_button_name,$delete_button_name,$menuId)
  {

    $menuData = $this->getMenuDataById($menuId);
    $this->view->form = new MenuTranslationForm($entity,array());
    $this->view->routelist =$routelist;
    $this->view->routeform =$routeform;
    $this->view->title =$title;
    $this->view->formcolumns =$form_columns;
    $this->view->save_button_name =$save_button_name;
    $this->view->cancel_button_name =$cancel_button_name;
    $this->view->delete_button_name =$delete_button_name;
    $this->view->menuId =$menuData['id'];
    $this->view->menu_name =$menuData['menu_name'];
    $this->view->mode =$mode;
    $this->view->pick($view_name);
  }

  public function getMenuDataById($menuId)
  {
    $data = Menu::findFirst($menuId)->toArray();
    return $data;

  }
  
  public function getRestaurantDataById($restaurantId){
    $data =Restaurant::findFirst($restaurantId)->toArray();
    return $data;
  }
  
  

  /**
  * @Route("/new/{menuId}", methods={"GET"}, name="menu_translation_new")
  */
  public function newAction($menuId)
  {

    $entity =null;
    $this->get_assets();
    $this->set_form_routes_custom(
    $this->crud_params['create_route'].'/'.$menuId
    ,$this->crud_params['route_list']
    ,$this->crud_params['new_title']
    ,$this->crud_params['add_edit_view']
    ,'new'
    ,$entity
    ,$this->crud_params['form_name']
    ,$this->crud_params['form_columns']
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,''
    ,$menuId);
    $this->tag->setDefault("description", $this->request->getPost("descriptioncontent"));
  }

  /**
  * @Route("/edit/{id}/{menuId}", methods={"GET"}, name="restaurantedit")
  */
  public function editAction($id,$menuId)
  {
    $entity =$this->set_entity(
    $id
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'edit');

    $this->get_assets();
    $this->set_tags('edit',$entity);
    $this->view->id = $entity->id;
    $this->view->menuId=$menuId;
    $this->set_form_routes_custom(
    $this->crud_params['save_route'].$id
    ,$this->crud_params['route_list']
    ,$this->crud_params['edit_title']
    ,$this->crud_params['add_edit_view']
    ,'edit',$entity,$this->crud_params['form_name']
    ,$this->crud_params['form_columns']
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,''
    ,$menuId
    );
  }

  public function execute_entity_action_custom($entity,$controller,$action,$params,$redirect_route,$mode,$menuId)
  {
  $form_action =$entity->save();
   if ($mode =='delete')
   {
     $form_action = $entity->delete();
   }
   if (!$form_action)
     {

         foreach ($entity->getMessages() as $message) {
             $this->flash->error($message);
         }

         return $this->dispatcher->forward(array(
             "controller" => $controller,
             "action" => $action,
             "params"=>array($menuId)
         ));
   }

   $this->response->redirect('menu_translation/list/'.$menuId);
  }
  /**
  * @Route("/create/{menuId}", methods={"POST"}, name="restaurantcreate")
  */
  public function createAction($menuId)
  {
    $entity = $this->set_entity(
    ''
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'create');

    $this->set_post_values($entity,$menuId);
    $this->audit_fields($entity,'create');


    $this->execute_entity_action_custom($entity
    ,$this->crud_params['controller']
    ,'new',array($entity),$this->crud_params['action_list']
    ,'create',$menuId);
  }

  /**
  * @Route("/save/{id}", methods={"POST"}, name="restaurantsave")
  */
  public function saveAction($id)
  {
    $entity =$this->set_entity(
    $id
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'update');

    $this->set_post_values($entity,$entity->getmenuId());
    $this->audit_fields($entity,'edit');

    $this->execute_entity_action_custom(
    $entity
    ,$this->crud_params['controller']
    ,'edit',array()
    ,$this->crud_params['action_list'],'update',$entity->getmenuId());
  }

  /**
  * @Route("/show/{id}", methods={"GET"}, name="restaurantshow")
  */
  public function showAction($id)
  {
    $entity =$this->set_entity(
    $id
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'show');

    $this->get_assets();

    $this->set_form_routes_custom(
    $this->crud_params['delete_route'].$id
    ,$this->crud_params['route_list'].'/'.$entity->getmenuId()
    ,$this->crud_params['delete_message']
    ,$this->crud_params['show_view'] ,'show'
    ,$entity
    ,$this->crud_params['form_name']
    ,$this->crud_params['form_columns']
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,$this->crud_params['delete_button_name']
    ,''
    );
    $this->set_tags('delete',$entity,'Y');
  }

  /**
  * @Route("/delete/{id}", methods={"POST"}, name="restaurantdelete")
  */
  public function deleteAction($id)
  {
    $entity =$this->set_entity(
    $id
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'delete');
    $this->execute_entity_action_custom(
    $entity
    ,$this->crud_params['controller']
    ,'show'
    ,array('id'=>$id)
    ,$this->crud_params['action_list']
    ,'delete',$entity->getmenuId());
  }

}
