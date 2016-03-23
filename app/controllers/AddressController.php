<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use AddressForm as AddressForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;
/**
 * @RoutePrefix("/address")
 */
class AddressController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'address/list';
        $this->crud_params['entityname']         = 'Address';
        $this->crud_params['not_found_message']  = 'address.entity.notfound';
        $this->crud_params['controller']         = 'Address';
        $this->crud_params['action_list']        = 'addresslist';
        $this->crud_params['form_name']          = 'AddressForm';
        $this->crud_params['delete_message']     = 'address.delete.question';
        $this->crud_params['create_route']       = 'address/create';
        $this->crud_params['save_route']         = 'address/save/';
        $this->crud_params['delete_route']       = 'address/delete/';
        $this->crud_params['add_edit_view']      = 'address/addedit';
        $this->crud_params['show_view']          = 'address/show';
        $this->crud_params['new_title']          = 'address.title.new';
        $this->crud_params['edit_title']         = 'address.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'countryid','label'=>'País'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'stateid','label'=>'Estado'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'cityid','label'=>'Ciudad'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'townshipid','label'=>'Sector'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'neighborhoodid','label'=>'Barrio'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'address','label'=>'Dirección'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>''),
        array('name' => 'description','label'=>'Descripción'
        ,'required'=>''
        ,'label_error'=>'')
        );
        $this->crud_params['save_button_name']       ='button.save';
        $this->crud_params['cancel_button_name']     ='button.cancel';
        $this->crud_params['delete_button_name']     ='button.delete';
    }
    private function set_tags($mode,$entity_object)

    {
      if($entity_object)
      {
      $this->tag->setDefault("countryid", $entity_object->getCountryid());
      $this->tag->setDefault("stateid", $entity_object->getStateid());
      $this->tag->setDefault("cityid", $entity_object->getCityid());
      $this->tag->setDefault("townshipid", $entity_object->getTownshipid());
      $this->tag->setDefault("neighborhoodid", $entity_object->getNeighborhoodid());
      $this->tag->setDefault("address", $entity_object->getAddress());
      $this->tag->setDefault("description", $entity_object->getDescription());

      }

   }
   private function set_post_values($entity)
   {
   $entity->setCountryid($this->request->getPost("countryid"));
   $entity->setStateid($this->request->getPost("stateid"));
   $entity->setCityid($this->request->getPost("cityid"));
   $entity->setTownshipid($this->request->getPost("townshipid"));
   $entity->setNeighborhoodid($this->request->getPost("neighborhoodid"));
   $entity->setAddress($this->request->getPost("address"));
   $entity->setDescription($this->request->getPost("description"));
   }


  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'address/new'
    ,'edit_route'=>'address/edit/'
    ,'show_route'=>'address/show/'
    ,'search_route'=>'address/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'address/addresslist'
    ,'numberPage'=>1
    ,'pagelimit'=>5
    ,'noitems_message'=>'address.notfound'
    ,'title' =>'address.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'country','title' => 'País','class'=>''),
      array('column_name' => 'state','title' => 'Estado','class'=>''),
      array('column_name' => 'city','title' => 'Ciudad','class'=>''),
      array('column_name'=>'township','title' => 'Sector','class'=>''),
      array('column_name'=>'neighborhood','title' => 'Barrio','class'=>''),
      array('column_name'=>'address','title' => 'Dirección','class'=>'')
    )
    ,'search_columns'=>array(
      array('name' => 'country','title' => 'País','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'state','title' => 'Estado','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'city','title' => 'Ciudad','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'township','title' => 'Sector','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'neighborhood','title' => 'Barrio','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'address','title' => 'Dirección','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="addresslist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('address/list');
    $query=  $this->modelsManager->createBuilder()
                 ->columns(array('a.id as id'
                 ,'c.country as country'
                 ,'s.state as state'
                 ,'c2.city as city'
                 ,'t.township as township'
                 ,'n.neighborhood as neighborhood'
                 ,'a.address as address'))
                 ->from(array('a' => 'Address'))
                 ->join('Country', 'c.id =a.countryid', 'c')
                 ->join('State', 's.id =a.stateid', 's')
                 ->join('City', 'c2.id =a.cityid', 'c2')
                 ->join('Township', 't.id =a.townshipid', 't')
                 ->join('Neighborhood', 'n.id =a.neighborhoodid', 'n')
                 ->getQuery()
                 ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));

  }

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create Address'
    ,'Edit Address'
    ,'Manage Address'
    ,'Delete Address');

  }


  /**
  * @Route("/search", methods={"GET","POST"}, name="addresssearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('address/search');

    $search_values =array(
     array('name'=>'country','value'=>$this->request->getPost("address"))
    ,array('name'=>'state','value'=>$this->request->getPost("state"))
    ,array('name'=>'city','value'=>$this->request->getPost("city"))
    ,array('name'=>'township','value'=>$this->request->getPost("township"))
    ,array('name'=>'neighborhood','value'=>$this->request->getPost("neighborhood"))
    ,array('name'=>'address','value'=>$this->request->getPost("address"))
    );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =  $this->modelsManager->createBuilder()
                 ->columns(array('a.id as id'
                 ,'c.country as country'
                 ,'s.state as state'
                 ,'c2.city as city'
                 ,'t.township as township'
                 ,'n.neighborhood as neighborhood'
                 ,'a.address as address'))
                 ->from(array('a' => 'Address'))
                 ->join('Country', 'c.id =a.countryid', 'c')
                 ->join('State', 's.id =a.stateid', 's')
                 ->join('City', 'c2.id =a.cityid', 'c2')
                 ->join('Township', 't.id =a.townshipid', 't')
                 ->join('Neighborhood', 'n.id =a.neighborhoodid', 'n')
                 ->where('c.country LIKE :country:', array('Neighborhood' => '%' . $params_query['Neighborhood']. '%'))
                 ->andWhere('s.state LIKE :state:', array('state' => '%' . $params_query['state'] . '%'))
                 ->andWhere('c.city LIKE :city:', array('city' => '%' . $params_query['city']. '%'))
                 ->andWhere('t.township LIKE :township:', array('township' => '%' . $params_query['township']. '%'))
                 ->andWhere('n.neighborhood LIKE :neighborhood:', array('neighborhood' => '%' . $params_query['neighborhood']. '%'))
                 ->andWhere('a.address LIKE :address:', array('address' => '%' . $params_query['address']. '%'))
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
        ->addJs('js/validateaddress/validate_address.js')
        ->addJs('js/validateaddress/get_address_data.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="addressenew")
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
  * @Route("/edit/{id}", methods={"GET"}, name="addressedit")
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
  * @Route("/create", methods={"POST"}, name="addresscreate")
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
  * @Route("/save/{id}", methods={"POST"}, name="addresssave")
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
  * @Route("/show/{id}", methods={"GET"}, name="addressshow")
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
  * @Route("/delete/{id}", methods={"POST"}, name="addressdelete")
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


  public function get_country_data()
  {

    $countries= $this->modelsManager->createBuilder()
             ->columns(array('c.id as id','c.code as code','c.country as country'))
             ->from(array('c' => 'Country'))
             ->getQuery()
             ->execute()->toArray();
    return $countries;

  }

  /**
  * @Route("/get_state_data/{countryid}", methods={"POST"}, name="get_state_data")
 */
  public function get_state_dataAction($countryid)
  {
     $this->view->disable();

    $statedata= State::findBycountryid($countryid)->toArray();

    echo json_encode($statedata);

  }

  /**
  * @Route("/get_city_data/{countryid}/{stateid}", methods={"POST"}, name="get_city_data")
 */
  public function get_city_dataAction($countryid,$stateid)
  {
     $this->view->disable();

    $townshipdata= City::find(array(
    "columns"   =>  array("id,city")
    ,"conditions"=>  "countryid = :countryid: AND stateid =:stateid:"
    ,"bind"      =>  array("countryid"=>$countryid,"stateid"=>$stateid)
    ))->toArray();

    echo json_encode($townshipdata);

  }

  /**
  * @Route("/get_township_data/{cityid}", methods={"POST"}, name="get_township_data")
 */
  public function get_township_dataAction($cityid)
  {
     $this->view->disable();

    $townshipdata= Township::findBycityid($cityid)->toArray();

    echo json_encode($townshipdata);

  }

  /**
  * @Route("/get_neighborhood_data/{cityid}/{townshipid}", methods={"POST"}, name="get_neighborhood_data")
 */
  public function get_neighborhood_dataAction($cityid,$townshipid)
  {
    $this->view->disable();

    $neighborhood_data= Neighborhood::find(array(
    "columns"   =>  array("id,neighborhood")
    ,"conditions"=>  "cityid = :cityid: AND townshipid =:townshipid:"
    ,"bind"      =>  array("cityid"=>$cityid,"townshipid"=>$townshipid)
    ))->toArray();

    echo json_encode($neighborhood_data);

  }

}
