<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use CountryForm as CountryForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/state")
 */
class StateController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'state/list';
        $this->crud_params['entityname']         = 'State';
        $this->crud_params['not_found_message']  = 'state.entity.notfound';
        $this->crud_params['controller']         = 'State';
        $this->crud_params['action_list']        = 'statelist';
        $this->crud_params['form_name']          = 'StateForm';
        $this->crud_params['delete_message']     = 'state.delete.question';
        $this->crud_params['create_route']       = 'state/create';
        $this->crud_params['save_route']         = 'state/save/';
        $this->crud_params['delete_route']       = 'state/delete/';
        $this->crud_params['add_edit_view']      = 'state/addedit';
        $this->crud_params['show_view']          = 'state/show';
        $this->crud_params['new_title']          = 'state.title.new';
        $this->crud_params['edit_title']         = 'state.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'countryid','label'=>'País'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>''),
        array('name' => 'state','label'=>'Estado'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="stateerror" name ="stateerror" class="has-error"></span>')
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
      $this->tag->setDefault("countryid", $entity_object->getCountryid());
      $this->tag->setDefault("state", $entity_object->getState());
      }
    }

    public function set_post_values($entity)
    {
      $entity->setCountryid($this->request->getPost("countryid"));
      $entity->setState($this->request->getPost("state"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'state/new'
    ,'edit_route'=>'state/edit/'
    ,'show_route'=>'state/show/'
    ,'search_route'=>'state/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'state/statelist'
    ,'numberPage'=>1
    ,'pagelimit'=>5
    ,'noitems_message'=>'state.notfound'
    ,'title' =>'state.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'country','title' => 'País','class'=>''),
      array('column_name'=>'state','title' => 'Estado','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'country','title' => 'País','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'state','title' => 'Estado','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="statelist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('state/list');
    $query= $this->modelsManager->createBuilder()
                   ->columns(array('s.id as id','s.state as state','c.country as country'))
                   ->from(array('s' => 'State'))
                   ->join('Country', 'c.id = s.countryid', 'c')
                   ->orderBy('c.country,s.state')
                   ->getQuery()
                   ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));

  }

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create State'
    ,'Edit State'
    ,'Manage State'
    ,'Delete State');

  }


  /**
  * @Route("/search", methods={"GET","POST"}, name="statesearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('state/search');

    $search_values =array(array('name'=>'country','value'=>$this->request->getPost("country"))
    ,array('name'=>'state','value'=>$this->request->getPost("state")));

    $params_query =$this->set_search_grid_post_values($search_values);

    $query = $this->modelsManager->createBuilder()
                   ->columns(array('s.id as id','s.state as state','c.country as country'))
                   ->from(array('s' => 'State'))
                   ->join('Country', 'c.id = s.countryid', 'c')
                   ->Where('s.state LIKE :state:', array('state' => '%' . $params_query['state']. '%'))
                   ->AndWhere('c.country LIKE :country:', array('country' => '%' . $params_query['country']. '%'))
                   ->orderBy('c.country,s.state')
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
    ->addJs('js/validatestate/validate_state.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="statenew")
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
  * @Route("/edit/{id}", methods={"GET"}, name="stateedit")
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
  * @Route("/create", methods={"POST","GET"}, name="statecreate")
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
  * @Route("/save/{id}", methods={"POST"}, name="statesave")
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
  * @Route("/show/{id}", methods={"GET"}, name="stateshow")
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
  * @Route("/delete/{id}", methods={"POST","GET"}, name="statedelete")
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
