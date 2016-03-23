<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use MenuForm as MenuForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/menu")
 */
class MenuController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'menu/list';
        $this->crud_params['entityname']         = 'Menu';
        $this->crud_params['not_found_message']  = 'menu.entity.notfound';
        $this->crud_params['controller']         = 'Menu';
        $this->crud_params['action_list']        = 'menulist';
        $this->crud_params['form_name']          = 'MenuForm';
        $this->crud_params['delete_message']     = 'menu.delete.question';
        $this->crud_params['create_route']       = 'menu/create';
        $this->crud_params['save_route']         = 'menu/save/';
        $this->crud_params['delete_route']       = 'menu/delete/';
        $this->crud_params['add_edit_view']      = 'restaurant_menu/addedit';
        $this->crud_params['show_view']          = 'restaurant_menu/show';
        $this->crud_params['new_title']          = 'menu.title.new';
        $this->crud_params['edit_title']         = 'menu.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'restaurantid','label'=>'Restaurant'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'name','label'=>'Name','required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'active','label'=>'Active'  ,'required'=>'','label_error'=>'')
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
      $this->tag->setDefault("restaurantid", $entity_object->getRestaurantid());
      $this->tag->setDefault("name", $entity_object->getName());
      $this->tag->setDefault("active", $entity_object->getActive());
      }
    }

    public function set_post_values($entity)
    {
      $entity->setRestaurantid($this->request->getPost("restaurantid"));
      $entity->setName($this->request->getPost("name"));
      $entity->setActive($this->request->getPost("active"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'menu/new'
    ,'edit_route'=>'menu/edit/'
    ,'show_route'=>'menu/show/'
    ,'search_route'=>'menu/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'restaurant_menu/menulist'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'menu.notfound'
    ,'title' =>'menu.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'restaurant','title' => 'Restaurant','class'=>''),
      array('column_name'=>'name','title' => 'Name','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'restaurant','title' => 'Restaurant','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'name','title' => 'Name','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="menulist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('menu/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('m.id ','r.name as restaurant','m.name','m.active'))
             ->from(array('m' => 'Menu'))
             ->join('Restaurant', 'r.id = m.restaurantid', 'r')
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->pick('restaurant_menu/menulist');

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
  * @Route("/search", methods={"GET","POST"}, name="menusearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('menu/search');

    $search_values =array(
      array('name'=>'restaurant','value'=>$this->request->getPost("restaurant"))
    ,array('name'=>'name','value'=>$this->request->getPost("name"))
  );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =  $query= $this->modelsManager->createBuilder()
             ->columns(array('m.id ','r.name as restaurant','m.name','m.active'))
             ->from(array('m' => 'Menu'))
             ->join('Restaurant', 'r.id = m.restaurantid', 'r')
             ->Where('r.name LIKE :restaurant:', array('restaurant' => '%' . $params_query['restaurant']. '%'))
             ->AndWhere('m.name LIKE :name:', array('name' => '%' . $params_query['name']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));

  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validate_menu/validate_menu.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="menuenew")
  */
  public function newAction($entity=null)
  {
    $this->get_assets();
    $this->set_form_routes(
    $this->crud_params['create_route']
    ,$this->crud_params['route_list']
    ,$this->crud_params['new_title']
    ,$this->crud_params['add_edit_view']
    ,'new'
    ,$entity
    ,$this->crud_params['form_name']
    ,$this->crud_params['form_columns']
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,'');
  }

  /**
  * @Route("/edit/{id}", methods={"GET"}, name="menuedit")
  */
  public function editAction($id)
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

    $this->set_form_routes(
    $this->crud_params['save_route'].$id
    ,$this->crud_params['route_list']
    ,$this->crud_params['edit_title']
    ,$this->crud_params['add_edit_view']
    ,'edit',$entity,$this->crud_params['form_name']
    ,$this->crud_params['form_columns']
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,''
    );
  }

  /**
  * @Route("/create", methods={"POST"}, name="menucreate")
  */
  public function createAction()
  {
    $entity = $this->set_entity(
    ''
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'create');

    $this->set_post_values($entity);
    $this->audit_fields($entity,'create');

    $this->execute_entity_action($entity
    ,$this->crud_params['controller']
    ,'new',array($entity),$this->crud_params['action_list']
    ,'create');
  }

  /**
  * @Route("/save/{id}", methods={"POST"}, name="menusave")
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

    $this->set_post_values($entity);
    $this->audit_fields($entity,'edit');

    $this->execute_entity_action(
    $entity
    ,$this->crud_params['controller']
    ,'edit',array($entity->id)
    ,$this->crud_params['action_list'],'update');
  }

  /**
  * @Route("/show/{id}", methods={"GET"}, name="menushow")
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

    $this->set_form_routes(
    $this->crud_params['delete_route'].$id
    ,$this->crud_params['route_list']
    ,$this->crud_params['delete_message']
    ,$this->crud_params['show_view'] ,'delete'
    ,$entity
    ,$this->crud_params['form_name']
    ,$this->crud_params['form_columns']
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,$this->crud_params['delete_button_name']
    );
    $this->set_tags('delete',$entity,'Y');
  }

  /**
  * @Route("/delete/{id}", methods={"POST"}, name="menudelete")
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
    $this->execute_entity_action(
    $entity
    ,$this->crud_params['controller']
    ,'show'
    ,array('id'=>$id)
    ,$this->crud_params['action_list']
    ,'delete');
  }

}
