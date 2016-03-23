<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use FileFormatForm as FileFormatForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/fileformat")
 */
class FileFormatController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'fileformat/list';
        $this->crud_params['entityname']         = 'FileFormat';
        $this->crud_params['not_found_message']  = 'fileformat.entity.notfound';
        $this->crud_params['controller']         = 'FileFormat';
        $this->crud_params['action_list']        = 'fileformatlist';
        $this->crud_params['form_name']          = 'FileFormatForm';
        $this->crud_params['delete_message']     = 'fileformat.delete.question';
        $this->crud_params['create_route']       = 'fileformat/create';
        $this->crud_params['save_route']         = 'fileformat/save/';
        $this->crud_params['delete_route']       = 'fileformat/delete/';
        $this->crud_params['add_edit_view']      = 'fileformat/addedit';
        $this->crud_params['show_view']          = 'fileformat/show';
        $this->crud_params['new_title']          = 'fileformat.title.new';
        $this->crud_params['edit_title']         = 'fileformat.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'extension','label'=>'Extension'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'type','label'=>'Type','required'=>'','label_error'=>''),
        array('name' => 'mimetype','label'=>'Mime Type','required'=>'','label_error'=>''),
        array('name' => 'accept','label'=>'Accepted','required'=>'','label_error'=>''));
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
      $this->tag->setDefault("extension", $entity_object->getExtension());
      $this->tag->setDefault("type", $entity_object->getType());
      $this->tag->setDefault("mimetype", $entity_object->getMimetype());
      $this->tag->setDefault("accept", $entity_object->getAccept());
      }
    }

    public function set_post_values($entity)
    {
      $entity->setExtension($this->request->getPost("extension"));
      $entity->setType($this->request->getPost("type"));
      $entity->setMimetype($this->request->getPost("mimetype"));
      $entity->setAccept($this->request->getPost("accept"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'fileformat/new'
    ,'edit_route'=>'fileformat/edit/'
    ,'show_route'=>'fileformat/show/'
    ,'search_route'=>'fileformat/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'fileformat/fileformatlist'
    ,'numberPage'=>1
    ,'pagelimit'=>5
    ,'noitems_message'=>'fileformat.notfound'
    ,'title' =>'fileformat.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'extension','title' => 'Extension','class'=>''),
      array('column_name'=>'type','title' => 'Type','class'=>''),
      array('column_name'=>'mimetype','title' => 'Mime Type','class'=>''),
      array('column_name'=>'accept','title' => 'Accepted','class'=>'')
    )
    ,'search_columns'=>array(
      array('name' => 'extension','title' => 'Extension','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'type','title' => 'Type','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'mimetype','title' => 'Mime Type','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'accept','title' => 'Accepted','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')

    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="fileformatlist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('fileformat/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('ff.id ','ff.extension','ff.type','ff.mimetype','ff.accept'))
             ->from(array('ff' => 'FileFormat'))
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
    ,'Create File Format'
    ,'Edit File Format'
    ,'Manage File Format'
    ,'Delete File Format');

  }


  /**
  * @Route("/search", methods={"GET","POST"}, name="fileformatsearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('fileformat/search');

    $search_values =array(array('name'=>'extension','value'=>$this->request->getPost("extension"))
    ,array('name'=>'type','value'=>$this->request->getPost("type"))
    ,array('name'=>'accept','value'=>$this->request->getPost("accept")));

    $params_query =$this->set_search_grid_post_values($search_values);
    if(strtoupper($params_query['accept']) =='YES'){$params_query['accept'] ='T';}if(strtoupper($params_query['accept']) =='NO'){$params_query['accept'] ='F';}
    $query = $this->modelsManager->createBuilder()
            ->columns(array('ff.id ','ff.extension','ff.type','ff.accept'))
            ->from(array('ff' => 'FileFormat'))
             ->Where('ff.extension LIKE :extension:', array('extension' => '%' . $params_query['extension']. '%'))
             ->AndWhere('ff.type LIKE :type:', array('type' => '%' . $params_query['type']. '%'))
             ->AndWhere('ff.accept LIKE :accept:', array('accept' => '%' . $params_query['accept']. '%'))
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
    ->addJs('js/validate_file_format/validate_file_format.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="fileformatenew")
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
  * @Route("/edit/{id}", methods={"GET"}, name="fileformatedit")
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
  * @Route("/create", methods={"POST"}, name="fileformatcreate")
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
  * @Route("/save/{id}", methods={"POST"}, name="fileformatsave")
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
  * @Route("/show/{id}", methods={"GET"}, name="fileformatshow")
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
  * @Route("/delete/{id}", methods={"POST"}, name="fileformatdelete")
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
