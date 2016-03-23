<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use DishForm as DishForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/dish")
 */
class DishController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'dish/list';
        $this->crud_params['entityname']         = 'Dish';
        $this->crud_params['not_found_message']  = 'dish.entity.notfound';
        $this->crud_params['controller']         = 'Dish';
        $this->crud_params['action_list']        = 'dishlist';
        $this->crud_params['form_name']          = 'DishForm';
        $this->crud_params['delete_message']     = 'dish.delete.question';
        $this->crud_params['create_route']       = 'dish/create';
        $this->crud_params['save_route']         = 'dish/save/';
        $this->crud_params['delete_route']       = 'dish/delete/';
        $this->crud_params['add_edit_view']      = 'dish/addedit';
        $this->crud_params['show_view']          = 'dish/show';
        $this->crud_params['new_title']          = 'dish.title.new';
        $this->crud_params['edit_title']         = 'dish.title.edit';
        $this->crud_params['form_columns']       = array(

        array('name' => 'categoryid','label'=>'Category'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'name','label'=>'Name'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'price','label'=>'Price'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'image_path','label'=>'Image'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'description','label'=>'Description'
        ,'required'=>''
        ,'label_error'=>''),
        array('name' => 'galleryid','label'=>'Gallery'
        ,'required'=>''
        ,'label_error'=>''),
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
      $this->tag->setDefault("menuid", $entity_object->getMenuid());
      $this->tag->setDefault("categoryid", $entity_object->getCategoryid());
      $this->tag->setDefault("galleryid",  $entity_object->getGalleryid());
      $this->tag->setDefault("name", $entity_object->getName());
      $this->tag->setDefault("price", $entity_object->getPrice());
      $this->tag->setDefault("image_path", $entity_object->getImagePath());
      $this->tag->setDefault("description", $entity_object->getDescription());
      }
    }

    public function set_post_values($entity,$menuid)
    {
      $entity->setMenuid($menuid);
      $entity->setCategoryid($this->request->getPost("categoryid"));
      $entity->setGalleryid($this->request->getPost("galleryid"));
      $entity->setPrice($this->request->getPost("price"));
      $entity->setName($this->request->getPost("name"));
      $entity->setImagePath($this->request->getPost("image_path"));
      $entity->setDescription($this->request->getPost("description"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'dish/new'
    ,'edit_route'=>'dish/edit/'
    ,'show_route'=>'dish/show/'
    ,'search_route'=>'dish/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'dish/dishlist'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'dish.notfound'
    ,'title' =>'dish.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'menu','title' => 'Menu','class'=>''),
      array('column_name'=>'category','title' => 'Category','class'=>''),
      array('column_name'=>'name','title' => 'Name','class'=>''),
      array('column_name'=>'price','title' => 'Price','class'=>'')
    )
    ,'search_columns'=>array(
      array('name' => 'menu','title' => 'Menu','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'category','title' => 'Category','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'price','title' => 'Price','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'name','title' => 'Name','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list/{menuid}", methods={"GET"}, name="dishlist")
  */
  public function listAction($menuid)
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('dish/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('d.id','d.menuid as menuid','m.name as menu','d.name as name','dc.category as category','d.price as price'))
             ->from(array('d' => 'Dish'))
             ->join('Menu', 'm.id = d.menuid', 'm')
             ->join('DishCategory', 'dc.id = d.categoryid', 'dc')
             ->where('d.menuid = :menuid:', array('menuid' =>$menuid ))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->menuid = $menuid;
    $menu_data =$this->get_menudata_by_id($menuid);
    $this->view->menu_name =$menu_data['name'];

  }

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create Action'
    ,'Edit Action'
    ,'Manage Action'
    ,'Delete Action');

  }


  /**
  * @Route("/search/{menuid}", methods={"GET","POST"}, name="dishsearch")
  */
  public function searchAction($menuid)

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('dish/search');

    $search_values =array(array('name'=>'menu','value'=>$this->request->getPost("menu"))
    ,array('name'=>'category','value'=>$this->request->getPost("category"))
    ,array('name'=>'price','value'=>$this->request->getPost("price"))
    );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =  $this->modelsManager->createBuilder()
             ->columns(array('d.id','d.menuid as menuid','m.name as menu','dc.category as category','d.price as price'))
             ->from(array('d' => 'Dish'))
             ->join('Menu', 'm.id = d.menuid', 'm')
             ->join('DishCategory', 'dc.id = d.categoryid', 'dc')
             ->where('d.menuid = :menuid:', array('menuid' =>$menuid ))
             ->AndWhere('m.name LIKE :menu:', array('menu' => '%' . $params_query['menu']. '%'))
             ->AndWhere('dc.category LIKE :category:', array('category' => '%' . $params_query['category']. '%'))
             ->AndWhere('d.price LIKE :price:', array('price' => '%' . $params_query['price']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $menu_data =$this->get_menudata_by_id($menuid);
    $this->view->menuid = $menuid;
    $this->view->menu_name =$menu_data['name'];

  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validate_dish/validate_dish.js');
  }



  public function set_form_routes_custom($routeform,$routelist,$title
  ,$view_name,$mode,$entity,$form_name
  ,$form_columns,$save_button_name,$cancel_button_name,$delete_button_name,$menuid)
  {

    $menu_data = $this->get_menudata_by_id($menuid);
    $restaurantid = $menu_data['restaurantid'];
    $menu_name =$menu_data['name'];
    $this->view->form = new DishForm($entity,array("restaurantid"=>$restaurantid));
    $this->view->routelist =$routelist;
    $this->view->routeform =$routeform;
    $this->view->title =$title;
    $this->view->menu_name = $menu_name;
    $this->view->formcolumns =$form_columns;
    $this->view->save_button_name =$save_button_name;
    $this->view->cancel_button_name =$cancel_button_name;
    $this->view->delete_button_name =$delete_button_name;
    $this->view->menuid =$menuid;
    $this->view->mode =$mode;
    if ($mode =='edit' or $mode =='show')
    {
      $this->view->image_path =$entity->image_path;
    }

    $this->view->images =$this->get_images();
    $this->view->pick($view_name);
  }

  public function get_menudata_by_id($menuid)
  {
    $menu = Menu ::findFirst($menuid)->toArray();
     return $menu;

  }

  public function get_images()
     {
       $files = File::find(array(
        "conditions" => "type like '%image%'"
    ));
       return $files->toArray();

     }

  /**
  * @Route("/new/{menuid}", methods={"GET"}, name="dishenew")
  */
  public function newAction($menuid)
  {

    $entity =null;
    $this->get_assets();
    $this->set_form_routes_custom(
    $this->crud_params['create_route'].'/'.$menuid
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
    ,$menuid);
  }

  /**
  * @Route("/edit/{id}/{menuid}", methods={"GET"}, name="dishedit")
  */
  public function editAction($id,$menuid)
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
    ,$menuid
    );
  }

  public function execute_entity_action_custom($entity,$controller,$action,$params,$redirect_route,$mode,$menuid)
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
             "params"=>array($menuid)
         ));
   }

   $this->response->redirect('dish/list/'.$menuid);
  }
  /**
  * @Route("/create/{menuid}", methods={"POST"}, name="dishcreate")
  */
  public function createAction($menuid)
  {
    $entity = $this->set_entity(
    ''
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'create');

    $this->set_post_values($entity,$menuid);
    $this->audit_fields($entity,'create');


    $this->execute_entity_action_custom($entity
    ,$this->crud_params['controller']
    ,'new',array($entity),$this->crud_params['action_list']
    ,'create',$menuid);
  }

  /**
  * @Route("/save/{id}/{dishid}", methods={"POST"}, name="dishsave")
  */
  public function saveAction($id,$dishid)
  {
    $entity =$this->set_entity(
    $id
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'update');

    $this->set_post_values($entity,$entity->getMenuid());
    $this->audit_fields($entity,'edit');

    $this->execute_entity_action_custom(
    $entity
    ,$this->crud_params['controller']
    ,'edit',array()
    ,$this->crud_params['action_list'],'update',$entity->getMenuid());
  }

  /**
  * @Route("/show/{id}", methods={"GET"}, name="dishshow")
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
    ,$this->crud_params['route_list'].'/'.$entity->getMenuid()
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
  * @Route("/delete/{id}", methods={"POST"}, name="dishdelete")
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
    ,'delete',$entity->getMenuid());
  }

}
