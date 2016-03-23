<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use RestaurantForm as RestaurantForm;
use AddressController as AddressController;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;
use \Phalcon\Mvc\Model;

/**
 * @RoutePrefix("/restaurant")
 */
class RestaurantController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'restaurant/list';
        $this->crud_params['entityname']         = 'Restaurant';
        $this->crud_params['not_found_message']  = 'action.entity.notfound';
        $this->crud_params['controller']         = 'Restaurant';
        $this->crud_params['action_list']        = 'restaurantlist';
        $this->crud_params['form_name']          = 'RestaurantForm';
        $this->crud_params['delete_message']     = 'restaurant.delete.question';
        $this->crud_params['create_route']       = 'restaurant/create';
        $this->crud_params['save_route']         = 'restaurant/save/';
        $this->crud_params['delete_route']       = 'restaurant/delete/';
        $this->crud_params['add_edit_view']      = 'restaurant/addedit';
        $this->crud_params['show_view']          = 'restaurant/show';
        $this->crud_params['new_title']          = 'restaurant.title.new';
        $this->crud_params['edit_title']         = 'restaurant.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'name','label'=>'Name'
        ,'required'=>'<span class="required" aria-required="true">* </span>','label_error'=>''),
        array('name' => 'phone','label'=>'Phone','required'=>'<span class="required" aria-required="true">* </span>','label_error'=>''),
        array('name' => 'address','label'=>'Address','required'=>'<span class="required" aria-required="true">* </span>','label_error'=>''),
        array('name' => 'email','label'=>'Email','required'=>'<span class="required" aria-required="true">* </span>','label_error'=>''),
        array('name' => 'website','label'=>'Website','required'=>'','label_error'=>'')
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
      $this->tag->setDefault("phone", $entity_object->getPhone());
      $this->tag->setDefault("addressid", $entity_object->getAddressid());
      $this->tag->setDefault("email", $entity_object->getEmail());
      $this->tag->setDefault("website", $entity_object->getWebsite());
      $this->tag->setDefault("logo", $entity_object->getLogoPath());
      }
    }

    public function set_post_values($entity)
    {
      $entity->setName($this->request->getPost("name"));
      $entity->setPhone($this->request->getPost("phone"));
      $entity->setEmail($this->request->getPost("email"));
      $address_values = $this->request->getPost("addressid");
      $addressid ="";
      if($address_values)
      {
      $addressid =$this->create_addressAction($address_values);
      }
      $entity->setAddressid($addressid);
      $entity->setWebsite($this->request->getPost("website"));
      $entity->setLogoPath($this->request->getPost("logo"));
    }



  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'restaurant/new'
    ,'edit_route'=>'restaurant/edit/'
    ,'show_route'=>'restaurant/show/'
    ,'search_route'=>'restaurant/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'restaurant/restaurantlist'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'restaurant.notfound'
    ,'title' =>'restaurant.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'name','title' => 'Name','class'=>''),
      array('column_name'=>'phone','title' => 'Phone','class'=>''),
      array('column_name'=>'email','title' => 'Email','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'name','title' => 'Name','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'phone','title' => 'Phone','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'email','title' => 'Email','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="restaurantlist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('restaurant/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('r.id ','r.name','r.phone','r.addressid','r.email','r.website'))
             ->from(array('r' => 'Restaurant'))
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
    ,'Create Action'
    ,'Edit Action'
    ,'Manage Action'
    ,'Delete Action');

  }


  /**
  * @Route("/search", methods={"GET","POST"}, name="restaurantsearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('restaurant/search');

    $search_values =array(array('name'=>'name','value'=>$this->request->getPost("name"))
    ,array('name'=>'phone','value'=>$this->request->getPost("phone"))
    ,array('name'=>'address','value'=>$this->request->getPost("address"))
    ,array('name'=>'email','value'=>$this->request->getPost("email"))
    ,array('name'=>'website','value'=>$this->request->getPost("website"))
    );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query = $this->modelsManager->createBuilder()
             ->columns(array('r.id ','r.name','r.phone','a.address','r.email','r.website'))
             ->from(array('r' => 'Restaurant'))
             ->join('Address', 'a.id = r.addressid', 'a')
             ->Where('r.name LIKE :name:', array('name' => '%' . $params_query['name']. '%'))
             ->AndWhere('a.address LIKE :address:', array('address' => '%' . $params_query['address']. '%'))
             ->AndWhere('r.phone LIKE :phone:', array('phone' => '%' . $params_query['phone']. '%'))
             ->AndWhere('r.email LIKE :email:', array('email' => '%' . $params_query['email']. '%'))
             ->AndWhere('r.website LIKE :website:', array('website' => '%' . $params_query['website']. '%'))
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
    ->addJs('js/validate_restaurant/validate_restaurant.js')
    ->addJs('js/validate_restaurant/get_restaurant_data.js');

    $this->assets
    ->collection('modal_js')
    ->addJs('metronic/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')
    ->addJs('metronic/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="restaurantenew")
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
    $addressobj = new AddressController();
    $this->view->images = $this->get_logo_images();
    $this->view->countries_data = $addressobj->get_country_data();
    $this->view->logo_path ='' ;
    $this->view->mode ='new';
  }



  public function set_post_values_edit($entity,$address)
  {
    $entity->setName($this->request->getPost("name"));
    $entity->setPhone($this->request->getPost("phone"));
    $entity->setEmail($this->request->getPost("email"));

    $address_description = $this->request->getPost("rest_address");
    $address->setDescription($address_description);
    $address->save();

    $entity->setAddressid($address->getId());
    $entity->setWebsite($this->request->getPost("website"));
    $entity->setLogoPath($this->request->getPost("logo"));
  }
  /**
  * @Route("/edit/{id}", methods={"GET"}, name="restaurantedit")
  */
  public function editAction($id)
  {
    $entity = Restaurant::findFirstByid($id);
    $address_entity = Address::findFirstByid($entity->getAddressid());
    $this->get_assets();
    $this->view->id = $entity->id;
    $this->view->title = $this->crud_params['edit_title'];
    $this->view->routeform = $this->crud_params['save_route'].$id;
    $addressobj = new AddressController();
    $this->view->countries_data = $addressobj->get_country_data();
    $this->view->logo_path =$entity->logo_path ;
    $this->view->mode ='edit';

    $this->tag->setDefault("name", $entity->getName());

    $this->tag->setDefault("rest_address", $address_entity->getDescription());

    $this->view->pick('restaurant/addedit');

    $address_data = '{
      "countryid":"'.$address_entity->getCountryid().'"'.
      ',"cityid":"'.$address_entity->getCityid().'"'.
      ',"stateid":"'.$address_entity->getStateid().'"'.
      ',"townshipid":"'.$address_entity->getTownshipid().'"'.
      ',"neighborhoodid":"'.$address_entity->getNeighborhoodid().'"'.
      ',"address":"'.$address_entity->getAddress().'"'.
    '}';
    $this->tag->setDefault("addressid",$address_data);

    $this->tag->setDefault("phone", $entity->getPhone());

    $this->tag->setDefault("email", $entity->getEmail());

    $this->tag->setDefault("website", $entity->getWebsite());

    $this->tag->setDefault("logo", $entity->getLogoPath());


    $this->view->images = $this->get_logo_images();
  }

  /**
  * @Route("/create_address/{address_data}", methods={"POST"}, name="restaurant_address_create")
  */
  public function create_addressAction($address_data)
  {
    $address_info =json_decode($address_data,true);
    $address = new Address();
    $address->setCountryid($address_info['countryid']);
    $address->setStateid($address_info['stateid']);
    $address->setCityid($address_info['cityid']);
    $address->setTownshipid($address_info['townshipid']);
    $address->setNeighborhoodid($address_info['neighborhoodid']);
    $address->setAddress($address_info['address']);
    $this->audit_fields($address,'create');
    $address->save();

    $description_info = $this->modelsManager->createBuilder()
                 ->columns(array('a.id as addressid'
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
                 ->where('a.id =:addressid:')
                 ->getQuery()
                 ->execute(array("addressid"=>$address->id_temp))->toArray();

    $addres_description ="";
     foreach ($description_info  as $info)
      {
        $addres_description =$info['country']
        .','.$info['state']
        .','.$info['city']
        .','.$info['township']
        .','.$info['neighborhood']
        .','.$info['address'];
      }


    $address->setDescription($addres_description);
    $address->save();

    return $address->id_temp;

  }

  /**
  * @Route("/create", methods={"POST"}, name="restaurantcreate")
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
  * @Route("/save/{id}", methods={"POST"}, name="restaurantsave")
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

    $address = Address::findFirstByid($entity->getAddressid());
    $this->set_post_values_edit($entity,$address);
    //$this->set_post_values($entity);
    $this->audit_fields($entity,'edit');

    $this->execute_entity_action(
    $entity
    ,$this->crud_params['controller']
    ,'edit',array($entity->id)
    ,$this->crud_params['action_list'],'update');
  }

  /**
  * @Route("/show/{id}", methods={"GET"}, name="restaurantshow")
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
    $address = Address::findFirstByid($entity->getAddressid());
    $this->tag->setDefault("rest_address", $address->getDescription());
    $this->view->logo_path =$entity->logo_path ;
    $this->view->mode ='show';
  }

  /**
  * @Route("/delete/{id}", methods={"POST"}, name="restaurantdelete")
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

  public function get_logo_images()
     {
       $files = File::find(array(
        "conditions" => "type like '%image%'"
    ));
       return $files->toArray();

     }

}
