<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use EventTranslationForm as EventTranslationForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/event_translation")
 */
class EventTranslationController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'event_translation/list';
        $this->crud_params['entityname']         = 'EventTranslation';
        $this->crud_params['not_found_message']  = 'event_translation.entity.notfound';
        $this->crud_params['controller']         = 'EventTranslation';
        $this->crud_params['action_list']        = 'event_translation_list';
        $this->crud_params['form_name']          = 'EventTranslationForm';
        $this->crud_params['delete_message']     = 'event_translation.delete.question';
        $this->crud_params['create_route']       = 'event_translation/create';
        $this->crud_params['save_route']         = 'event_translation/save/';
        $this->crud_params['delete_route']       = 'event_translation/delete/';
        $this->crud_params['add_edit_view']      = 'event_translation/addedit';
        $this->crud_params['show_view']          = 'event_translation/show';
        $this->crud_params['new_title']          = 'event_translation.title.new';
        $this->crud_params['edit_title']         = 'event_translation.title.edit';
        $this->crud_params['form_columns']       = array(

        array('name' => 'languagecode','label'=>'Language'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="event_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'name','label'=>'Name translation'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="event_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'location','label'=>'Location'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="event_translationerror" name ="codeerror" class="has-error"></span>') 
        ,array('name' => 'description','label'=>'Description translation'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="event_translationerror" name ="codeerror" class="has-error"></span>')

        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
        $this->tag->setDefault("eventid", $entity_object->getEventId());
        $this->tag->setDefault("languagecode", $entity_object->getLanguagecode());
        $this->tag->setDefault("name", $entity_object->getNameTranslation());
        $this->tag->setDefault("location", $entity_object->getLocation());
        $this->tag->setDefault("description", $entity_object->getDescription());
      }
    }

    public function set_post_values($entity,$eventid)
    {
      $entity->setEventId($eventid);
      $entity->setLanguagecode($this->request->getPost("languagecode"));
      $entity->setNameTranslation($this->request->getPost("name"));
      $entity->setLocation($this->request->getPost("location"));
      $entity->setDescription($this->request->getPost("eventcontent"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'event_translation/new'
    ,'edit_route'=>'event_translation/edit/'
    ,'show_route'=>'event_translation/show/'
    ,'search_route'=>'event_translation/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'event_translation/event_translation_list'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'event_translation.notfound'
    ,'title' =>'event_translation.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'event','title' => 'Event','class'=>'')
      ,array('column_name' => 'language','title' => 'Language','class'=>'')
      ,array('column_name' => 'name','title' => 'Name translation','class'=>''))
      
    ,'search_columns'=>array(
     
      array('name' => 'language','title' => 'Language','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'name','title' => 'Name translation','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')

    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list/{eventid}", methods={"GET","POST"}, name="event_translation_list")
  */
  public function listAction($eventid)
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('event_translation/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('et.id as id','et.eventid as eventid','l.language as language','e.name as event' ,'et.name_translation as name'))
             ->from(array('et' => 'EventTranslation'))
             ->join('Event', 'e.id = et.eventid', 'e')
             ->join('Language', 'l.code = et.languagecode', 'l')
             ->where('et.eventid = :eventid:', array('eventid' =>$eventid ))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->eventid = $eventid;
   $event_data = $this->get_eventdata_by_id($eventid);
    $this->view->event_name =$event_data['name'];
    $this->view->eventid=$event_data['id'];
    $this->view->obj = $this;
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
  * @Route("/search/{eventid}", methods={"GET","POST"}, name="event_translationsearch")
  */
  public function searchAction($eventid)

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('event_translation/search');

    $search_values =array(
    array('name'=>'language','value'=>$this->request->getPost("language"))
    ,array('name'=>'name','value'=>$this->request->getPost("name"))
     );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =$this->modelsManager->createBuilder()
             ->columns(array('et.id as id','et.eventid as eventid','l.language as language','e.name as event' ,'et.name_translation as name'))
             ->from(array('et' => 'EventTranslation'))
             ->join('Event', 'e.id = et.eventid', 'e')
             ->join('Language', 'l.code = et.languagecode', 'l')
             ->where('et.eventid = :eventid:', array('eventid' =>$eventid ))
             ->AndWhere('l.language LIKE :language:', array('language' => '%' . $params_query['language']. '%'))
             ->AndWhere('et.name_translation LIKE :name:', array('name' => '%' . $params_query['name']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->eventid = $eventid;
    $event_data = $this->get_eventdata_by_id($eventid);
    $this->view->event_name =$event_data['name'];
    $this->view->obj = $this;

  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validate_event_translation/validate_event_translation.js');
  }


  public function set_form_routes_custom($routeform,$routelist,$title
  ,$view_name,$mode,$entity,$form_name
  ,$form_columns,$save_button_name,$cancel_button_name,$delete_button_name,$eventid)
  {

   $event_data = $this->get_eventdata_by_id($eventid);
    $this->view->form = new EventTranslationForm($entity,array());
    $this->view->routelist =$routelist;
    $this->view->routeform =$routeform;
    $this->view->title =$title;
    $this->view->formcolumns =$form_columns;
    $this->view->save_button_name =$save_button_name;
    $this->view->cancel_button_name =$cancel_button_name;
    $this->view->delete_button_name =$delete_button_name;
    $this->view->eventid =$event_data['id'];
    $this->view->event_name =$event_data['name'];
    $this->view->mode =$mode;
    $this->view->pick($view_name);
  }

  public function get_eventdata_by_id($eventid)
  {
   $event_data = Event::findFirst($eventid)->toArray();
   return $event_data;

  }

  /**
  * @Route("/new/{eventid}", methods={"GET"}, name="Eventenew")
  */
  public function newAction($eventid)
  {

    $entity =null;
    $this->get_assets();
    $this->set_form_routes_custom(
    $this->crud_params['create_route'].'/'.$eventid
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
    ,$eventid);
     $this->tag->setDefault("description", $this->request->getPost("eventcontent"));
  }

  /**
  * @Route("/edit/{id}/{eventid}", methods={"GET"}, name="Eventedit")
  */
  public function editAction($id,$eventid)
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
    ,$eventid);
     
  }

  public function execute_entity_action_custom($entity,$controller,$action,$params,$redirect_route,$mode,$eventid)
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
             "params"=>array($eventid)
         ));
   }

   $this->response->redirect('event_translation/list/'.$eventid);
  }
  /**
  * @Route("/create/{eventid}", methods={"POST"}, name="Eventcreate")
  */
  public function createAction($eventid)
  {
    $entity = $this->set_entity(
    ''
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'create');

    $this->set_post_values($entity,$eventid);
    $this->audit_fields($entity,'create');


    $this->execute_entity_action_custom($entity
    ,$this->crud_params['controller']
    ,'new',array($entity),$this->crud_params['action_list']
    ,'create',$eventid);
  }

  /**
  * @Route("/save/{id}", methods={"POST"}, name="Eventsave")
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

    $this->set_post_values($entity,$entity->geteventid());
    $this->audit_fields($entity,'edit');

    $this->execute_entity_action_custom(
    $entity
    ,$this->crud_params['controller']
    ,'edit',array()
    ,$this->crud_params['action_list'],'update',$entity->geteventid());
  }

  /**
  * @Route("/show/{id}", methods={"GET"}, name="Eventshow")
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
    ,$this->crud_params['route_list'].'/'.$entity->geteventid()
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
  * @Route("/delete/{id}", methods={"POST"}, name="Eventdelete")
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
    ,'delete',$entity->geteventid());
  }

}
