<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use CountryForm as CountryForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/township")
 */
class TownshipController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'township/list';
        $this->crud_params['entityname']         = 'Township';
        $this->crud_params['not_found_message']  = 'township.entity.notfound';
        $this->crud_params['controller']         = 'Township';
        $this->crud_params['action_list']        = 'townshiplist';
        $this->crud_params['form_name']          = 'TownshipForm';
        $this->crud_params['delete_message']     = 'township.delete.question';
        $this->crud_params['create_route']       = 'township/create';
        $this->crud_params['save_route']         = 'township/save/';
        $this->crud_params['delete_route']       = 'township/delete/';
        $this->crud_params['add_edit_view']      = 'township/addedit';
        $this->crud_params['show_view']          = 'township/show';
        $this->crud_params['new_title']          = 'township.title.new';
        $this->crud_params['edit_title']         = 'township.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'country','label'=>'País'
        ,'required'=>''
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>''),
        array('name' => 'state','label'=>'Estado'
        ,'required'=>''
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>''),
        array('name' => 'cityid','label'=>'Ciudad'
        ,'required'=>''
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>''),
        array('name' => 'township','label'=>'Sector'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="townshiperror" name ="stateerror" class="has-error"></span>')
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    private function set_tags($mode,$entity_object)

    {
      if($entity_object)
      {
      $this->tag->setDefault("township", $entity_object->getTownship());
      $this->tag->setDefault("cityid", $entity_object->getCityid());
      $this->tag->setDefault("country", $entity_object->getCity()->getCountry()->getCountry());
      $this->tag->setDefault("state", $entity_object->getCity()->getState()->getState());
     }

   }
   private function set_post_values($entity)
   {
   $entity->setTownship($this->request->getPost("township"));
   $entity->setCityid($this->request->getPost("cityid"));
   }


  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'township/new'
    ,'edit_route'=>'township/edit/'
    ,'show_route'=>'township/show/'
    ,'search_route'=>'township/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'township/townshiplist'
    ,'numberPage'=>1
    ,'pagelimit'=>5
    ,'noitems_message'=>'township.notfound'
    ,'title' =>'township.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'country','title' => 'País','class'=>''),
      array('column_name'=>'state','title' => 'Estado','class'=>''),
      array('column_name'=>'city','title' => 'Ciudad','class'=>''),
      array('column_name'=>'township','title' => 'Sector','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'country','title' => 'País','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'state','title' => 'Estado','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'city','title' => 'Ciudad','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'township','title' => 'Sector','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="townshiplist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('township/list');
    $query= $this->modelsManager->createBuilder()
                 ->columns(array('t.id as id','c.city as city','c2.country as country','s.state as state','t.township as township'))
                 ->from(array('t' => 'Township'))
                 ->join('City', 'c.id =t.cityid', 'c')
                 ->join('Country', 'c2.id =c.countryid', 'c2')
                 ->join('State', 's.id =c.stateid', 's')
                 ->getQuery()
                 ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));

  }

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create Township'
    ,'Edit Township'
    ,'Manage Township'
    ,'Delete Township');

  }


  /**
  * @Route("/search", methods={"GET","POST"}, name="townshipsearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('township/search');

    $search_values =array(array('name'=>'country','value'=>$this->request->getPost("country"))
    ,array('name'=>'state','value'=>$this->request->getPost("state"))
    ,array('name'=>'city','value'=>$this->request->getPost("city"))
    ,array('name'=>'township','value'=>$this->request->getPost("township"))
    );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query = $this->modelsManager->createBuilder()
                 ->columns(array('t.id as id','c.city as city','c2.country as country','s.state as state','t.township as township'))
                 ->from(array('t' => 'Township'))
                 ->join('City', 'c.id =t.cityid', 'c')
                 ->join('Country', 'c2.id =c.countryid', 'c2')
                 ->join('State', 's.id =c.stateid', 's')
                 ->where('c.city LIKE :city:', array('city' => '%' . $params_query['city']. '%'))
                 ->andWhere('t.township LIKE :township:', array('township' => '%' . $params_query['township']. '%'))
                 ->andWhere('c2.country LIKE :country:', array('country' => '%' . $params_query['country']. '%'))
                 ->andWhere('s.state LIKE :state:', array('state' => '%' . $params_query['state'] . '%'))
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
        ->addJs('js/validatetownship/validate_township.js')
        ->addJs('js/validatetownship/get_city_data.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="townshipnew")
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
  * @Route("/edit/{id}", methods={"GET"}, name="townshipedit")
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
  * @Route("/create", methods={"POST","GET"}, name="townshipcreate")
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
  * @Route("/save/{id}", methods={"POST"}, name="townshipsave")
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
  * @Route("/show/{id}", methods={"GET"}, name="townshipshow")
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
  * @Route("/delete/{id}", methods={"POST","GET"}, name="townshipdelete")
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
  /**
  * @Route("/get_citydata/{cityid}", methods={"POST"}, name="township_citydata")
 */
  public function get_citydataAction($cityid)
  {
     $this->view->disable();
    $city = $this->modelsManager->createBuilder()
                ->columns(array('c.id as idcity','s.state as state','c2.country as country'))
                ->from(array('c' => 'City'))
                ->join('State', 's.id =c.stateid', 's')
                ->join('Country', 'c2.id =c.countryid', 'c2')
                ->where('c.id = :cityid:', array('cityid' =>$cityid ))
                ->getQuery()
                ->execute();
      $data = array();
              foreach ($city as $cityitem) {
                  $data= array(
                      'country'   => $cityitem->country,
                      'state' => $cityitem->state
                  );
              }

    echo json_encode($data);

  }

}
