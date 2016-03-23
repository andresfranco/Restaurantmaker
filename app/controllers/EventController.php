<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use EventForm as EventForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/event")
 */
class EventController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'event/list';
        $this->crud_params['entityname']         = 'Event';
        $this->crud_params['not_found_message']  = 'event.entity.notfound';
        $this->crud_params['controller']         = 'Event';
        $this->crud_params['action_list']        = 'eventlist';
        $this->crud_params['form_name']          = 'EventForm';
        $this->crud_params['delete_message']     = 'event.delete.question';
        $this->crud_params['create_route']       = 'event/create';
        $this->crud_params['save_route']         = 'event/save/';
        $this->crud_params['delete_route']       = 'event/delete/';
        $this->crud_params['add_edit_view']      = 'event/addedit';
        $this->crud_params['show_view']          = 'event/show';
        $this->crud_params['new_title']          = 'event.title.new';
        $this->crud_params['edit_title']         = 'event.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'name','label'=>'Name'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'location','label'=>'Location'
        ,'required'=>''
        ,'label_error'=>''),
        array('name' => 'start_date','label'=>'Start Date'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
         array('name' => 'finish_date','label'=>'Finish Date'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
         array('name' => 'description','label'=>'Description'
        ,'required'=>''
        ,'label_error'=>'')
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
      $this->tag->setDefault("name", $entity_object->getName());
      $this->tag->setDefault("location", $entity_object->getLocation());
      $this->tag->setDefault("start_date", $entity_object->getStartDate());
      $this->tag->setDefault("finish_date", $entity_object->getFinishDate());
      $this->tag->setDefault("description", $entity_object->getDescription());
      }
    }

    public function set_post_values($entity)
    {
        
      $entity->setName($this->request->getPost("name"));
      $entity->setLocation($this->request->getPost("location"));
      $entity->setStartDate($this->request->getPost("start_date"));
      $entity->setFinishDate($this->request->getPost("finish_date"));
      $entity->setDescription($this->request->getPost("description"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'event/new'
    ,'edit_route'=>'event/edit/'
    ,'show_route'=>'event/show/'
    ,'search_route'=>'event/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'event/eventlist'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'event.notfound'
    ,'title' =>'event.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'name','title' => 'Name','class'=>''),
      array('column_name'=>'location','title' => 'Location','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'name','title' => 'Name','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'location','title' => 'Location','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
     
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="eventlist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('event/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('e.id ','e.name','e.location','e.start_date','e.finish_date'))
             ->from(array('e' => 'Event'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));

  }

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create Event'
    ,'Edit Event'
    ,'Manage Event'
    ,'Delete Event');

  }


  /**
  * @Route("/search", methods={"GET","POST"}, name="eventsearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('event/search');

    $search_values =array(array('name'=>'name','value'=>$this->request->getPost("name"))
    ,array('name'=>'location','value'=>$this->request->getPost("location"))
    ,array('name'=>'start_date','value'=>$this->request->getPost("start_date"))
    ,array('name'=>'finish_date','value'=>$this->request->getPost("finish_date"))
    );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =  $this->modelsManager->createBuilder()
             ->columns(array('e.id ','e.name','e.location','e.start_date','e.finish_date'))
             ->from(array('e' => 'Event'))
             ->Where('e.name LIKE :name:', array('name' => '%' . $params_query['name']. '%'))
             ->AndWhere('e.location LIKE :location:', array('location' => '%' . $params_query['location']. '%'))
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
    ->addJs('js/validate_event/validate_event.js')
    ->addJs('js/validate_event/custom_values.js');

    $this->assets
    ->collection('date_picker')
    ->addJs('metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')
    ->addJs('metronic/assets/global/plugins/bootstrap-daterangepicker/moment.min.js')
    ->addJs('metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')
    ->addJs('metronic/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')
    ->addJs('metronic/assets/admin/pages/scripts/components-pickers.js');
    
    
  }


  /**
  * @Route("/new", methods={"GET"}, name="eventenew")
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
  * @Route("/edit/{id}", methods={"GET"}, name="eventedit")
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
  * @Route("/create", methods={"POST"}, name="eventcreate")
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
  * @Route("/save/{id}", methods={"POST"}, name="eventsave")
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
  * @Route("/show/{id}", methods={"GET"}, name="eventshow")
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
  * @Route("/delete/{id}", methods={"POST"}, name="eventdelete")
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
