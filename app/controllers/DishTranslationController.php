<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use DishTranslationForm as DishTranslationForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/dish_translation")
 */
class DishTranslationController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'dish_translation/list';
        $this->crud_params['entityname']         = 'DishTranslation';
        $this->crud_params['not_found_message']  = 'dish_translation.entity.notfound';
        $this->crud_params['controller']         = 'DishTranslation';
        $this->crud_params['action_list']        = 'dish_translation_list';
        $this->crud_params['form_name']          = 'DishTranslationForm';
        $this->crud_params['delete_message']     = 'dish_translation.delete.question';
        $this->crud_params['create_route']       = 'dish_translation/create';
        $this->crud_params['save_route']         = 'dish_translation/save/';
        $this->crud_params['delete_route']       = 'dish_translation/delete/';
        $this->crud_params['add_edit_view']      = 'dish_translation/addedit';
        $this->crud_params['show_view']          = 'dish_translation/show';
        $this->crud_params['new_title']          = 'dish_translation.title.new';
        $this->crud_params['edit_title']         = 'dish_translation.title.edit';
        $this->crud_params['form_columns']       = array(

        array('name' => 'languagecode','label'=>'Language'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="dish_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'name','label'=>'Name translation'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="dish_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'description','label'=>'Description translation'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="dish_translationerror" name ="codeerror" class="has-error"></span>')

        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
        $this->tag->setDefault("dishid", $entity_object->getDishid());
        $this->tag->setDefault("languagecode", $entity_object->getLanguagecode());
        $this->tag->setDefault("name", $entity_object->getName());
        $this->tag->setDefault("description", $entity_object->getDescription());
      }
    }

    public function set_post_values($entity,$dishid)
    {
      $entity->setDishid($dishid);
      $entity->setLanguagecode($this->request->getPost("languagecode"));
      $entity->setName($this->request->getPost("name"));
      $entity->setDescription($this->request->getPost("description"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'dish_translation/new'
    ,'edit_route'=>'dish_translation/edit/'
    ,'show_route'=>'dish_translation/show/'
    ,'search_route'=>'dish_translation/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'dish_translation/dish_translation_list'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'dish_translation.notfound'
    ,'title' =>'dish_translation.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'dish','title' => 'Dish','class'=>'')
      ,array('column_name' => 'language','title' => 'Language','class'=>'')
      ,array('column_name' => 'name','title' => 'Name translation','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'dish','title' => 'Dish','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'language','title' => 'Language','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'name','title' => 'Name translation','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')

    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list/{dishid}", methods={"GET","POST"}, name="dish_translation_list")
  */
  public function listAction($dishid)
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('dish_translation/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('dt.id as id','dt.dishid as dishid','dt.languagecode as languagecode','l.language as language','d.name as dish','dt.name as name'))
             ->from(array('dt' => 'DishTranslation'))
             ->join('Dish', 'd.id = dt.dishid', 'd')
             ->join('Language', 'l.code = dt.languagecode', 'l')
             ->where('dt.dishid = :dishid:', array('dishid' =>$dishid ))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->dishid = $dishid;
    $dish_data = $this->get_dishdata_by_id($dishid);
    $this->view->dish_name =$dish_data['name'];
    $this->view->menu_id = $dish_data['menuid'];
  }

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create Dish Category'
    ,'Edit Dish Category'
    ,'Manage Dish Category'
    ,'Delete Dish Category');

  }


  /**
  * @Route("/search/{dishid}", methods={"GET","POST"}, name="dish_translationsearch")
  */
  public function searchAction($dishid)

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('dish_translation/search');

    $search_values =array(array('name'=>'dish','value'=>$this->request->getPost("dish"))

    ,array('name'=>'language','value'=>$this->request->getPost("language"))
    ,array('name'=>'name','value'=>$this->request->getPost("name"))
     );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =$this->modelsManager->createBuilder()
             ->columns(array('dt.id as id','dt.dishid as dishid','dt.languagecode as languagecode','l.language as language','d.name as dish','dt.name'))
             ->from(array('dt' => 'DishTranslation'))
             ->join('Dish', 'd.id = dt.dishid', 'd')
             ->join('Language', 'l.code = dt.languagecode', 'l')
             ->where('dt.dishid = :dishid:', array('dishid' =>$dishid ))
             ->AndWhere('d.name LIKE :dish:', array('dish' => '%' . $params_query['dish']. '%'))
             ->AndWhere('l.language LIKE :language:', array('language' => '%' . $params_query['language']. '%'))
             ->AndWhere('dt.name LIKE :name:', array('name' => '%' . $params_query['name']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->dishid = $dishid;
    $dish_data = $this->get_dishdata_by_id($dishid);
    $this->view->dish_name =$dish_data['name'];
    $this->view->menu_id = $dish_data['menuid'];

  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validate_dish_translation/validate_dish_translation.js');
  }


  public function set_form_routes_custom($routeform,$routelist,$title
  ,$view_name,$mode,$entity,$form_name
  ,$form_columns,$save_button_name,$cancel_button_name,$delete_button_name,$dishid)
  {

    $dish_data = $this->get_dishdata_by_id($dishid);
    $this->view->form = new DishTranslationForm($entity,array());
    $this->view->routelist =$routelist;
    $this->view->routeform =$routeform;
    $this->view->title =$title;
    $this->view->formcolumns =$form_columns;
    $this->view->save_button_name =$save_button_name;
    $this->view->cancel_button_name =$cancel_button_name;
    $this->view->delete_button_name =$delete_button_name;
    $this->view->dishid =$dish_data['id'];
    $this->view->dish_name =$dish_data['name'];
    $this->view->mode =$mode;
    $this->view->pick($view_name);
  }

  public function get_dishdata_by_id($dishid)
  {
    $dish_data = Dish ::findFirst($dishid)->toArray();
    return $dish_data;

  }

  /**
  * @Route("/new/{dishid}", methods={"GET"}, name="dishenew")
  */
  public function newAction($dishid)
  {

    $entity =null;
    $this->get_assets();
    $this->set_form_routes_custom(
    $this->crud_params['create_route'].'/'.$dishid
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
    ,$dishid);
  }

  /**
  * @Route("/edit/{id}/{dishid}", methods={"GET"}, name="dishedit")
  */
  public function editAction($id,$dishid)
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
    ,$dishid
    );
  }

  public function execute_entity_action_custom($entity,$controller,$action,$params,$redirect_route,$mode,$dishid)
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
             "params"=>array($dishid)
         ));
   }

   $this->response->redirect('dish_translation/list/'.$dishid);
  }
  /**
  * @Route("/create/{dishid}", methods={"POST"}, name="dishcreate")
  */
  public function createAction($dishid)
  {
    $entity = $this->set_entity(
    ''
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'create');

    $this->set_post_values($entity,$dishid);
    $this->audit_fields($entity,'create');


    $this->execute_entity_action_custom($entity
    ,$this->crud_params['controller']
    ,'new',array($entity),$this->crud_params['action_list']
    ,'create',$dishid);
  }

  /**
  * @Route("/save/{id}", methods={"POST"}, name="dishsave")
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

    $this->set_post_values($entity,$entity->getDishid());
    $this->audit_fields($entity,'edit');

    $this->execute_entity_action_custom(
    $entity
    ,$this->crud_params['controller']
    ,'edit',array()
    ,$this->crud_params['action_list'],'update',$entity->getDishid());
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
    ,$this->crud_params['route_list'].'/'.$entity->getDishid()
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
    ,'delete',$entity->getDishid());
  }

}
