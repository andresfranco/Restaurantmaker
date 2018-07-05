<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use NeighborhoodForm as NeighborhoodForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/neighborhood")
 */
class NeighborhoodController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'neighborhood/list';
        $this->crud_params['entityname']         = 'Neighborhood';
        $this->crud_params['not_found_message']  = 'neighborhood.entity.notfound';
        $this->crud_params['controller']         = 'Neighborhood';
        $this->crud_params['action_list']        = 'neighborhoodlist';
        $this->crud_params['form_name']          = 'NeighborhoodForm';
        $this->crud_params['delete_message']     = 'neighborhood.delete.question';
        $this->crud_params['create_route']       = 'neighborhood/create';
        $this->crud_params['save_route']         = 'neighborhood/save/';
        $this->crud_params['delete_route']       = 'neighborhood/delete/';
        $this->crud_params['add_edit_view']      = 'neighborhood/addedit';
        $this->crud_params['show_view']          = 'neighborhood/show';
        $this->crud_params['new_title']          = 'neighborhood.title.new';
        $this->crud_params['edit_title']         = 'neighborhood.title.edit';
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
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>''),
        array('name' => 'townshipid','label'=>'Sector'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>''),
        array('name' => 'neighborhood','label'=>'Barrio'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="neighborhooderror" name ="stateerror" class="has-error"></span>')
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }
    private function set_tags($mode,$entity_object)

    {
      if($entity_object)
      {
      $this->tag->setDefault("neighborhood", $entity_object->getNeighborhood());
      $this->tag->setDefault("cityid", $entity_object->getCityid());
      $this->tag->setDefault("townshipid", $entity_object->getTownshipid());
      $this->tag->setDefault("country", $entity_object->getCity()->getCountry()->getCountry());
      $this->tag->setDefault("state", $entity_object->getCity()->getState()->getState());
      }

   }
   private function set_post_values($entity)
   {
   $entity->setNeighborhood($this->request->getPost("neighborhood"));
   $entity->setTownshipid($this->request->getPost("townshipid"));
   $entity->setCityid($this->request->getPost("cityid"));
   }


  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'neighborhood/new'
    ,'edit_route'=>'neighborhood/edit/'
    ,'show_route'=>'neighborhood/show/'
    ,'search_route'=>'neighborhood/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'neighborhood/neighborhoodlist'
    ,'numberPage'=>1
    ,'pagelimit'=>5
    ,'noitems_message'=>'neighborhood.notfound'
    ,'title' =>'neighborhood.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'country','title' => 'País','class'=>''),
      array('column_name' => 'state','title' => 'Estado','class'=>''),
      array('column_name' => 'city','title' => 'Ciudad','class'=>''),
      array('column_name'=>'township','title' => 'Sector','class'=>''),
      array('column_name'=>'neighborhood','title' => 'Barrio','class'=>'')
    )
    ,'search_columns'=>array(
      array('name' => 'country','title' => 'País','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'state','title' => 'Estado','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'city','title' => 'Ciudad','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'township','title' => 'Sector','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'neighborhood','title' => 'Barrio','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="neighborhoodlist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('neighborhood/list');
    $query=  $this->modelsManager->createBuilder()
                 ->columns(array('n.id as id','c.city as city','c2.country as country','s.state as state','t.township as township','n.neighborhood as neighborhood'))
                 ->from(array('n' => 'Neighborhood'))
                 ->join('City', 'c.id =n.cityid', 'c')
                 ->join('Country', 'c2.id =c.countryid', 'c2')
                 ->join('State', 's.id =c.stateid', 's')
                 ->join('Township', 't.id =n.townshipid', 't')
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
    ,'Create Neighborhood'
    ,'Edit Neighborhood'
    ,'Manage Neighborhood'
    ,'Delete Neighborhood');

  }


  /**
  * @Route("/search", methods={"GET","POST"}, name="Countrysearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('neighborhood/search');

    $search_values =array(array('name'=>'code','value'=>$this->request->getPost("code"))
    ,array('name'=>'city','value'=>$this->request->getPost("city"))
    ,array('name'=>'township','value'=>$this->request->getPost("township"))
    ,array('name'=>'neighborhood','value'=>$this->request->getPost('neighborhood'))
    ,array('name'=>'country','value'=>$this->request->getPost('country'))
    ,array('name'=>'state','value'=>$this->request->getPost('state'))
    );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =  $this->modelsManager->createBuilder()
                 ->columns(array('n.id as id','c.city as city','c2.country as country','s.state as state','t.township as township','n.neighborhood as neighborhood'))
                 ->from(array('n' => 'Neighborhood'))
                 ->join('City', 'c.id =n.cityid', 'c')
                 ->join('Country', 'c2.id =c.countryid', 'c2')
                 ->join('State', 's.id =c.stateid', 's')
                 ->join('Township', 't.id =n.townshipid', 't')
                 ->where('c.city LIKE :city:', array('city' => '%' . $params_query['city']. '%'))
                 ->andWhere('t.township LIKE :township:', array('township' => '%' . $params_query['township']. '%'))
                 ->andWhere('n.neighborhood LIKE :neighborhood:', array('neighborhood' => '%' . $params_query['neighborhood']. '%'))
                 ->andWhere('c2.country LIKE :country:', array('country' => '%' . $params_query['country']. '%'))
                 ->andWhere('s.state LIKE :state:', array('state' => '%' . $params_query['state'] . '%'))
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
        ->addJs('js/validateneighborhood/validate_neighborhood.js')
        ->addJs('js/validateneighborhood/get_township_data.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="Countryenew")
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
  * @Route("/edit/{id}", methods={"GET"}, name="Countryedit")
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
  * @Route("/create", methods={"POST"}, name="Countrycreate")
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
  * @Route("/save/{id}", methods={"POST"}, name="Countrysave")
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
  * @Route("/show/{id}", methods={"GET"}, name="Countryshow")
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
  * @Route("/delete/{id}", methods={"POST"}, name="Countrydelete")
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


  public function get_citydata($cityid)
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

  return($data);

  }

  /**
  * @Route("/get_township_data/{cityid}", methods={"POST"}, name="get_township_data")
 */
  public function get_township_dataAction($cityid)
  {
     $this->view->disable();
    $citydata =$this->get_citydata($cityid);

    $townshipdata= Township::findBycityid($cityid)->toArray();

    $data = array('township'=>$townshipdata,'citydata'=>$citydata);
    echo json_encode($data);

  }

}
