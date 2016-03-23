<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use EventGalleryForm as EventGalleryForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/eventgallery")
 */
class EventGalleryController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'eventgallery/list';
        $this->crud_params['entityname']         = 'EventGallery';
        $this->crud_params['not_found_message']  = 'eventgallery.entity.notfound';
        $this->crud_params['controller']         = 'EventGallery';
        $this->crud_params['action_list']        = 'eventgallerylist';
        $this->crud_params['form_name']          = 'EventGalleryForm';
        $this->crud_params['delete_message']     = 'eventgallery.delete.question';
        $this->crud_params['create_route']       = 'eventgallery/create';
        $this->crud_params['save_route']         = 'eventgallery/save/';
        $this->crud_params['delete_route']       = 'eventgallery/delete/';
        $this->crud_params['add_edit_view']      = 'eventgallery/addedit';
        $this->crud_params['show_view']          = 'eventgallery/show';
        $this->crud_params['new_title']          = 'eventgallery.title.new';
        $this->crud_params['edit_title']         = 'eventgallery.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'galleryid','label'=>'Gallery'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="eventgalleryerror" name ="codeerror" class="has-error"></span>')
        
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object,$galleryid)
    {
      if($entity_object)
      {
        if ($mode =='edit' or $mode =='delete')
         {
            $this->tag->setDefault("galleryid", $galleryid);
         } 
         else
         {
           $this->tag->setDefault("galleryid", $entity_object->getGalleryid());

         }
     
    }
  }

    public function set_post_values($entity,$eventid)
    {
      $entity->setEventid($eventid);
      $entity->setGalleryid($this->request->getPost("galleryid"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'eventgallery/new'
    ,'edit_route'=>'eventgallery/edit/'
    ,'show_route'=>'eventgallery/show/'
    ,'search_route'=>'eventgallery/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'eventgallery/eventgallerylist'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'eventgallery.notfound'
    ,'title' =>'eventgallery.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'gallery','title' => 'Gallery','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'gallery','title' => 'Gallery','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list/{eventid}", methods={"GET","POST"}, name="eventgallerylist")
  */
  public function listAction($eventid)
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('eventgallery/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('eg.eventid ','eg.galleryid','g.name as gallery'))
             ->from(array('eg' => 'EventGallery'))
             ->join('Gallery', 'g.id = eg.galleryid', 'g')
             ->Where('eg.eventid = :eventid:', array('eventid' =>$eventid ))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->eventid = $eventid;

  }

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create EventGallery'
    ,'Edit EventGallery'
    ,'Manage EventGallery'
    ,'Delete EventGallery');

  }


  /**
  * @Route("/search/{eventid}", methods={"GET","POST"}, name="eventgallerysearch")
  */
  public function searchAction($eventid)

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('eventgallery/search');

    $search_values =array(array('name'=>'gallery','value'=>$this->request->getPost("gallery")));

    $params_query =$this->set_search_grid_post_values($search_values);

    $query = $this->modelsManager->createBuilder()
             ->columns(array('eg.eventid ','eg.galleryid','g.name as gallery'))
             ->from(array('eg' => 'EventGallery'))
             ->join('Gallery', 'g.id =eg.galleryid', 'g')
             ->Where('eg.eventid = :eventid:', array('eventid' =>$eventid ))
             ->AndWhere('g.name LIKE :gallery:', array('gallery' => '%' . $params_query['gallery']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->eventid = $eventid;

  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validate_eventgallery/validate_eventgallery.js');
  }


  /**
  * @Route("/new/{eventid}", methods={"GET"}, name="eventgalleryenew")
  */
  public function newAction($eventid)
  {
    
    $entity =null;
    $this->get_assets();
    $this->set_form_routes(
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
    ,'');
    $this->view->eventid =$eventid;
  }


  /**
  * @Route("/create/{eventid}", methods={"POST"}, name="eventgallerycreate")
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
    ,'new',array($eventid),$this->crud_params['action_list']
    ,'create');
  }

  public function execute_entity_action_custom($entity,$controller,$action,$params,$redirect_route,$mode)
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
            "params"=>$params
        ));
  }
  $this->response->redirect('eventgallery/list/'.$params[0]);
 }

  

  /**
  * @Route("/show/{eventid}/{galleryid}", methods={"GET"}, name="eventgalleryshow")
  */
  public function showAction($eventid,$galleryid)
  {
    
     $entity = EventGallery::query()
    ->where("eventid = :eventid:")
    ->andWhere("galleryid =:galleryid:")
    ->bind(array("eventid" => $eventid ,"galleryid" => $galleryid))
    ->execute();

    $gallery = Gallery::Findfirst($galleryid);

    $this->view->galleryid = $galleryid;
    $this->view->eventid= $eventid;
    $this->view->gallery_name = $gallery->name;
    

    $this->get_assets();

    $this->set_form_routes(
    $this->crud_params['delete_route'].$eventid.'/'.$galleryid
    ,$this->crud_params['route_list'].'/'.$eventid
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
  * @Route("/delete/{eventid}/{galleryid}", methods={"POST"}, name="eventgallerydelete")
  */
  public function deleteAction($eventid,$galleryid)
  {
  
    $entity =new EventGallery();
    $entity->setGalleryid($galleryid);
    $entity->setEventid($eventid);

    $this->execute_entity_action_custom(
    $entity
    ,$this->crud_params['controller']
    ,'show'
    ,array($eventid)
    ,$this->crud_params['action_list']
    ,'delete');
  }

}
