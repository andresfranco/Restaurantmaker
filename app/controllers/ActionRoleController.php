<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use ActionRoleForm as ActionRoleForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/actionrole")
 */
class ActionRoleController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'actionrole/list';
        $this->crud_params['entityname']         = 'ActionRole';
        $this->crud_params['not_found_message']  = 'actionrole.entity.notfound';
        $this->crud_params['controller']         = 'ActionRole';
        $this->crud_params['action_list']        = 'actionrolelist';
        $this->crud_params['form_name']          = 'ActionRoleForm';
        $this->crud_params['delete_message']     = 'actionrole.delete.question';
        $this->crud_params['create_route']       = 'actionrole/create';
        $this->crud_params['save_route']         = 'actionrole/save/';
        $this->crud_params['delete_route']       = 'actionrole/delete/';
        $this->crud_params['add_edit_view']      = 'action_role/addedit';
        $this->crud_params['show_view']          = 'action_role/show';
        $this->crud_params['new_title']          = 'actionrole.title.new';
        $this->crud_params['edit_title']         = 'actionrole.title.edit';
        $this->crud_params['form_columns']       = array(

        array('name' => 'actionid','label'=>'Acción'
        ,'required'=>'<span class="required" aria-required="true">*</span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="actionroleerror" name ="stateerror" class="has-error"></span>')
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
        foreach ($entity_object  as $entityitem )
        {
        $actionid =$entityitem['actionid'];
       }
      $this->tag->setDefault("actionid", $actionid);
      }
    }

    public function set_post_values($entity)
    {

      $entity->setActionid($this->request->getPost("actionid"));
    }

  public function set_grid_parameters($roleid,$routelist)
  {
    $grid_values =
    [
     'new_route'=>'actionrole/new'
    ,'edit_route'=>'actionrole/edit/'
    ,'show_route'=>'actionrole/show/'
    ,'search_route'=>'actionrole/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'actionrole/actionrolelist'
    ,'numberPage'=>1
    ,'pagelimit'=>5
    ,'noitems_message'=>'actionrole.notfound'
    ,'title' =>'actionrole.list.title'
    ,'header_columns'=>array(
      array('column_name'=>'action','title' => 'Action','class'=>''))
    ,'search_columns'=>array(
     array('name' => 'action','title' => 'Acción','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list/{roleid}", methods={"GET","POST"}, name="actionrolelist")
  */
  public function listAction($roleid)
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters($roleid,'actionrole/list/'.$roleid);
    $query= $this->modelsManager->createBuilder()
             ->columns(array('ar.roleid as roleid','ar.actionid as actionid','r.role as role','a.action as action'))
             ->from(array('ar' => 'ActionRole'))
             ->join('Role', 'r.id = ar.roleid', 'r')
             ->join('Action', 'a.id = ar.actionid', 'a')
             ->where('ar.roleid = :roleid:', array('roleid' => $roleid))
              ->orderBy($order)
             ->getQuery()
             ->execute();

    $this->set_grid_values($query,$grid_values);
    $this->view->roleid =$roleid;
    $role= Role::findFirstByid($roleid);
    $this->view->role =$role->role;
    $this->view->listroute ='actionrole/list/'.$roleid;
    $this->view->pick('action_role/actionrolelist');
    $this->view->obj =$this;
  }



  /**
  * @Route("/search/{roleid}", methods={"GET","POST"}, name="actionrolesearch")
  */
  public function searchAction($roleid)

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('actionrole/search');

    $search_values =array(array('name'=>'action','value'=>$this->request->getPost("action")));

    $params_query =$this->set_search_grid_post_values($search_values);

    $query = $this->modelsManager->createBuilder()
            ->columns(array('ar.roleid as roleid','ar.actionid as actionid','r.role as role','a.action as action'))
            ->from(array('ar' => 'ActionRole'))
            ->join('Role', 'r.id = ar.roleid', 'r')
            ->join('Action', 'a.id = ar.actionid', 'a')
             ->Where('a.action LIKE :action:', array('action' => '%' . $params_query['action']. '%'))
             ->AndWhere('ar.roleid = :roleid: ', array('roleid' =>  $roleid))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->view->roleid =$roleid;
    $role= Role::findFirstByid($roleid);
    $this->view->role =$role->role;
    $this->view->listroute ='actionrole/search/'.$roleid;
    $this->view->pick('action_role/actionrolelist');
    $this->view->obj =$this;
  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validateactionrole/validate_action_role.js');
  }


  /**
  * @Route("/new/{roleid}", methods={"GET"}, name="actionroleenew")
  */
  public function newAction($roleid)
  {
    $role= Role::findFirstByid($roleid);
    $this->view->role = $role->role;
    $this->get_assets();
    $this->set_form_routes(
    $this->crud_params['create_route'].'/'.$roleid
    ,$this->crud_params['route_list'].'/'.$roleid
    ,$this->crud_params['new_title']
    ,$this->crud_params['add_edit_view']
    ,'new'
    ,null
    ,$this->crud_params['form_name']
    ,$this->crud_params['form_columns']
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,'');
  }

  /**
  * @Route("/edit/{id}", methods={"GET"}, name="actionroleedit")
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
  * @Route("/create/{roleid}", methods={"POST","GET"}, name="actionrolecreate")
  */
  public function createAction($roleid)
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
    $entity->SetRoleid($roleid);

    $form_action =$entity->save();

     if (!$form_action)
       {

           foreach ($entity->getMessages() as $message) {
               $this->flash->error($message);
           }
           return $this->dispatcher->forward(array(
               "controller" => 'ActionRole',
               "action" => 'new',
               "params"=>array($roleid)
           ));
     }
     $this->response->redirect(array('for' =>'actionrolelist','roleid'=>$roleid));
  /*  $this->execute_entity_action($entity
    ,$this->crud_params['controller']
    ,'new',array($entity),'actionrole/list'.'/'.$userid
    ,'create');*/
  }

  /**
  * @Route("/save/{id}", methods={"POST"}, name="actionrolesave")
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
  * @Route("/show/{id}", methods={"GET"}, name="actionroleshow")
  */
  public function showAction($id)
  {

    $userdata =explode('-',$id);
    $roleid =$userdata[0];
    $entity =$this->set_user_role_entity(
    $id
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'show');

    $this->get_assets();

    $this->set_form_routes(
    $this->crud_params['delete_route'].$id
    ,$this->crud_params['route_list'].'/'.$roleid
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

  public function set_user_role_entity($id,$errormessage,$controller,$action,$mode)
  {

    $roledata =explode('-',$id);
    $roleid =$roledata[0];

    $actionid =$roledata[1];

    //var_dump($userid);
    //var_dump($userid[0]);

          if ($mode =='create')
          {
            $entity = new $entityname();
          }
          else
          {

          $entity  = $this->modelsManager->createBuilder()
                      ->columns(array('ar.actionid as actionid','ar.roleid as roleid','a.action as action','r.role as role'))
                      ->from(array('ar' => 'Actionrole'))
                      ->join('Action', 'a.id = ar.actionid', 'a')
                      ->join('Role', 'r.id = ar.roleid', 'r')
                     ->Where('ar.roleid = :roleid: ', array('roleid' => $roleid))
                     ->AndWhere('ar.actionid = :actionid: ', array('actionid' =>  $actionid))
                     ->getQuery()
                     ->execute();
           if ($mode='edit' and !$entity)
           {
             return $this->dispatcher->forward(array(
               "controller" => "Error",
               "action" => "error404"
             ));
           }
           else {
             if (!$entity) {
                 $this->flash->error($errormessage);
                 return $this->dispatcher->forward(array(
                     "controller" => $controller,
                     "action" => $action
                 ));
             }
           }

          }

      return $entity;


  }

  /**
  * @Route("/delete/{id}", methods={"POST"}, name="actionroledelete")
  */
  public function deleteAction($id)
  {
    $roledata =explode('-',$id);
    $roleid =$roledata[0];

    $actionid =$roledata[1];

    $entity =ActionRole::find(array(
        "conditions" => "actionid = :actionid: and roleid = :roleid:",
        "bind"       => array('actionid' => $actionid ,'roleid'=>$roleid)
    ));

    if (!$entity->delete()) {

        foreach ($addres->getMessages() as $message) {
            $this->flash->error($message);
        }

        return $this->dispatcher->forward(array(
            "controller" => "ActionRole",
            "action" => "show",
            "parameters"=>array($id)
        ));
    }
    else {
      $this->response->redirect(array('for' => 'actionrolelist','roleid'=>$roleid));
    }


}

}
