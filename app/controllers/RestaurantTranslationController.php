<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use RestaurantTranslationForm as RestaurantTranslationForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/restaurant_translation")
 */
class RestaurantTranslationController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'restaurant_translation/list';
        $this->crud_params['entityname']         = 'RestaurantTranslation';
        $this->crud_params['not_found_message']  = 'restaurant_translation.entity.notfound';
        $this->crud_params['controller']         = 'RestaurantTranslation';
        $this->crud_params['action_list']        = 'restaurant_translation_list';
        $this->crud_params['form_name']          = 'RestaurantTranslationForm';
        $this->crud_params['delete_message']     = 'restaurant_translation.delete.question';
        $this->crud_params['create_route']       = 'restaurant_translation/create';
        $this->crud_params['save_route']         = 'restaurant_translation/save/';
        $this->crud_params['delete_route']       = 'restaurant_translation/delete/';
        $this->crud_params['add_edit_view']      = 'restaurant_translation/addedit';
        $this->crud_params['show_view']          = 'restaurant_translation/show';
        $this->crud_params['new_title']          = 'restaurant_translation.title.new';
        $this->crud_params['edit_title']         = 'restaurant_translation.title.edit';
        $this->crud_params['form_columns']       = array(

        array('name' => 'languagecode','label'=>'Language'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="restaurant_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'name','label'=>'Name translation'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="restaurant_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'description','label'=>'Description translation'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="restaurant_translationerror" name ="codeerror" class="has-error"></span>')

        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
        $this->tag->setDefault("restaurantId", $entity_object->getrestaurantId());
        $this->tag->setDefault("languagecode", $entity_object->getLanguagecode());
        $this->tag->setDefault("name", $entity_object->getName());
        $this->tag->setDefault("description", $entity_object->getDescription());
      }
    }

    public function set_post_values($entity,$restaurantId)
    {
      $entity->setrestaurantId($restaurantId);
      $entity->setLanguagecode($this->request->getPost("languagecode"));
      $entity->setName($this->request->getPost("name"));
      $entity->setDescription($this->request->getPost("description"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'restaurant_translation/new'
    ,'edit_route'=>'restaurant_translation/edit/'
    ,'show_route'=>'restaurant_translation/show/'
    ,'search_route'=>'restaurant_translation/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'restaurant_translation/restaurant_translation_list'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'restaurant_translation.notfound'
    ,'title' =>'restaurant_translation.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'restaurant','title' => 'restaurant','class'=>'')
      ,array('column_name' => 'language','title' => 'Language','class'=>'')
      ,array('column_name' => 'name','title' => 'Name translation','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'restaurant','title' => 'restaurant','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'language','title' => 'Language','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'name','title' => 'Name translation','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')

    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list/{restaurantId}", methods={"GET","POST"}, name="restaurant_translation_list")
  */
  public function listAction($restaurantId)
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('restaurant_translation/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('rt.id as id','rt.restaurantId as restaurantId','rt.languagecode as languagecode','l.language as language','r.name as restaurant','rt.name as name'))
             ->from(array('rt' => 'RestaurantTranslation'))
             ->join('Restaurant', 'r.id = rt.restaurantId', 'r')
             ->join('Language', 'l.code = rt.languagecode', 'l')
             ->where('rt.restaurantId = :restaurantId:', array('restaurantId' =>$restaurantId ))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->restaurantId = $restaurantId;
    $restaurant_data = $this->get_restaurantdata_by_id($restaurantId);
    $this->view->restaurant_name =$restaurant_data['name'];
    $this->view->menu_id = $restaurant_data['menuid'];
    $this->view->obj = $this;
  }

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create restaurant Category'
    ,'Edit restaurant Category'
    ,'Manage restaurant Category'
    ,'Delete restaurant Category');

  }

  
  /**
  * @Route("/search/{restaurantId}", methods={"GET","POST"}, name="restaurant_translationsearch")
  */
  public function searchAction($restaurantId)

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('restaurant_translation/search');

    $search_values =array(array('name'=>'restaurant','value'=>$this->request->getPost("restaurant"))

    ,array('name'=>'language','value'=>$this->request->getPost("language"))
    ,array('name'=>'name','value'=>$this->request->getPost("name"))
     );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =$this->modelsManager->createBuilder()
             ->columns(array('rt.id as id','rt.restaurantId as restaurantId','rt.languagecode as languagecode','l.language as language','d.name as restaurant','rt.name'))
             ->from(array('rt' => 'RestaurantTranslation'))
             ->join('restaurant', 'd.id = rt.restaurantId', 'd')
             ->join('Language', 'l.code = rt.languagecode', 'l')
             ->where('rt.restaurantId = :restaurantId:', array('restaurantId' =>$restaurantId ))
             ->AndWhere('d.name LIKE :restaurant:', array('restaurant' => '%' . $params_query['restaurant']. '%'))
             ->AndWhere('l.language LIKE :language:', array('language' => '%' . $params_query['language']. '%'))
             ->AndWhere('rt.name LIKE :name:', array('name' => '%' . $params_query['name']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->restaurantId = $restaurantId;
    $restaurant_data = $this->get_restaurantdata_by_id($restaurantId);
    $this->view->restaurant_name =$restaurant_data['name'];
    $this->view->menu_id = $restaurant_data['menuid'];
    $this->view->obj = $this;

  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validate_restaurant_translation/validate_restaurant_translation.js');
  }


  public function set_form_routes_custom($routeform,$routelist,$title
  ,$view_name,$mode,$entity,$form_name
  ,$form_columns,$save_button_name,$cancel_button_name,$delete_button_name,$restaurantId)
  {

    $restaurant_data = $this->get_restaurantdata_by_id($restaurantId);
    $this->view->form = new restaurantTranslationForm($entity,array());
    $this->view->routelist =$routelist;
    $this->view->routeform =$routeform;
    $this->view->title =$title;
    $this->view->formcolumns =$form_columns;
    $this->view->save_button_name =$save_button_name;
    $this->view->cancel_button_name =$cancel_button_name;
    $this->view->delete_button_name =$delete_button_name;
    $this->view->restaurantId =$restaurant_data['id'];
    $this->view->restaurant_name =$restaurant_data['name'];
    $this->view->mode =$mode;
    $this->view->pick($view_name);
  }

  public function get_restaurantdata_by_id($restaurantId)
  {
    $restaurant_data = restaurant ::findFirst($restaurantId)->toArray();
    return $restaurant_data;

  }

  /**
  * @Route("/new/{restaurantId}", methods={"GET"}, name="restaurantenew")
  */
  public function newAction($restaurantId)
  {

    $entity =null;
    $this->get_assets();
    $this->set_form_routes_custom(
    $this->crud_params['create_route'].'/'.$restaurantId
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
    ,$restaurantId);
  }

  /**
  * @Route("/edit/{id}/{restaurantId}", methods={"GET"}, name="restaurantedit")
  */
  public function editAction($id,$restaurantId)
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
    ,$restaurantId
    );
  }

  public function execute_entity_action_custom($entity,$controller,$action,$params,$redirect_route,$mode,$restaurantId)
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
             "params"=>array($restaurantId)
         ));
   }

   $this->response->redirect('restaurant_translation/list/'.$restaurantId);
  }
  /**
  * @Route("/create/{restaurantId}", methods={"POST"}, name="restaurantcreate")
  */
  public function createAction($restaurantId)
  {
    $entity = $this->set_entity(
    ''
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'create');

    $this->set_post_values($entity,$restaurantId);
    $this->audit_fields($entity,'create');


    $this->execute_entity_action_custom($entity
    ,$this->crud_params['controller']
    ,'new',array($entity),$this->crud_params['action_list']
    ,'create',$restaurantId);
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

    $this->set_post_values($entity,$entity->getrestaurantId());
    $this->audit_fields($entity,'edit');

    $this->execute_entity_action_custom(
    $entity
    ,$this->crud_params['controller']
    ,'edit',array()
    ,$this->crud_params['action_list'],'update',$entity->getrestaurantId());
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
    ,$this->crud_params['route_list'].'/'.$entity->getrestaurantId()
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
    ,'delete',$entity->getrestaurantId());
  }

}
