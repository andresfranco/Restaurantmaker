<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use SystemParameterForm as SystemParameterForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/systemparameter")
 */
class SystemParameterController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'systemparameter/list';
        $this->crud_params['entityname']         = 'SystemParameter';
        $this->crud_params['not_found_message']  = 'action.entity.notfound';
        $this->crud_params['controller']         = 'SystemParameter';
        $this->crud_params['action_list']        = 'systemparameterlist';
        $this->crud_params['form_name']          = 'SystemParameterForm';
        $this->crud_params['delete_message']     = 'systemparameter.delete.question';
        $this->crud_params['create_route']       = 'systemparameter/create';
        $this->crud_params['save_route']         = 'systemparameter/save/';
        $this->crud_params['delete_route']       = 'systemparameter/delete/';
        $this->crud_params['add_edit_view']      = 'systemparameter/addedit';
        $this->crud_params['show_view']          = 'systemparameter/show';
        $this->crud_params['new_title']          = 'systemparameter.title.new';
        $this->crud_params['edit_title']         = 'systemparameter.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'code','label'=>'Code','required'=>'<span class="required" aria-required="true">* </span>'),
        array('name' => 'parameter','label'=>'Parameter','required'=>'<span class="required" aria-required="true">* </span>'),
        array('name' => 'textvalue','label'=>'Value','required'=>'<span class="required" aria-required="true">* </span>')
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
      $this->tag->setDefault("code", $entity_object->getCode());
      $this->tag->setDefault("parameter", $entity_object->getParameter());
      $this->tag->setDefault("textvalue", $entity_object->getTextValue());
      }
    }

    public function set_post_values($entity)
    {
      $entity->setCode($this->request->getPost("code"));
      $entity->setParameter($this->request->getPost("parameter"));
      $entity->setTextvalue($this->request->getPost("textvalue"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'systemparameter/new'
    ,'edit_route'=>'systemparameter/edit/'
    ,'show_route'=>'systemparameter/show/'
    ,'search_route'=>'systemparameter/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'systemparameter/systemparameterlist'
    ,'numberPage'=>1
    ,'pagelimit'=>5
    ,'noitems_message'=>'systemparameter.notfound'
    ,'title' =>'systemparameter.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'code','title' => 'Code','class'=>''),
      array('column_name'=>'parameter','title' => 'Parameter','class'=>''),
      array('column_name'=>'textvalue','title' => 'Value','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'code','title' => 'Code','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'parameter','title' => 'Parameter','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'textvalue','title' => 'Value','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="systemparameterlist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('systemparameter/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('sp.id ','sp.code','sp.parameter','sp.textvalue'))
             ->from(array('sp' => 'SystemParameter'))
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
    ,'Create System Parameter'
    ,'Edit System Parameter'
    ,'Manage System Parameter'
    ,'Delete System Parameter');

  }


  /**
  * @Route("/search", methods={"GET","POST"}, name="systemparametersearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('systemparameter/search');

    $search_values =array(array('name'=>'code','value'=>$this->request->getPost("code"))
    ,array('name'=>'parameter','value'=>$this->request->getPost("parameter"))
    ,array('name'=>'textvalue','value'=>$this->request->getPost("textvalue")));

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =$this->modelsManager->createBuilder()
             ->columns(array('sp.id ','sp.code','sp.parameter','sp.textvalue'))
             ->from(array('sp' => 'SystemParameter'))
             ->Where('sp.code LIKE :code:', array('code' => '%' . $params_query['code']. '%'))
             ->AndWhere('sp.parameter LIKE :parameter:', array('parameter' => '%' . $params_query['parameter']. '%'))
             ->AndWhere('sp.textvalue LIKE :textvalue:', array('textvalue' => '%' . $params_query['textvalue']. '%'))
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
    ->addJs('js/validate_system_parameter/validate_system_parameter.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="systemparameterenew")
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
  * @Route("/edit/{id}", methods={"GET"}, name="systemparameteredit")
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
  * @Route("/create", methods={"POST","GET"}, name="systemparametercreate")
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
  * @Route("/save/{id}", methods={"POST"}, name="systemparametersave")
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
  * @Route("/show/{id}", methods={"GET"}, name="systemparametershow")
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
  * @Route("/delete/{id}", methods={"POST"}, name="systemparameterdelete")
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
