<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use UserForm as UserForm;
//use Phalcon\Mvc\Model\User as User;
/**
 * @RoutePrefix("/user")
 */
class UserController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'user/list';
        $this->crud_params['entityname']         = 'User';
        $this->crud_params['not_found_message']  = 'user.entity.notfound';
        $this->crud_params['controller']         = 'User';
        $this->crud_params['action_list']        = 'userlist';
        $this->crud_params['form_name']          = 'UserForm';
        $this->crud_params['delete_message']     = 'user.delete.question';
        $this->crud_params['create_route']       = 'user/create';
        $this->crud_params['save_route']         = 'user/save/';
        $this->crud_params['delete_route']       = 'user/delete/';
        $this->crud_params['add_edit_view']      = 'user/addedit';
        $this->crud_params['show_view']          = 'user/show';
        $this->crud_params['new_title']          = 'user.title.new';
        $this->crud_params['edit_title']         = 'user.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'username','label'=>'User Name'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="usernameerror" name ="codeerror" class="has-error"></span>'),
        array('name' => 'email','label'=>'E-mail'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="emailerror" name ="stateerror" class="has-error"></span>'),
        array('name' => 'password','label'=>'Password'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="passworderror" name ="codeerror" class="has-error"></span>'),
        array('name' => 'confirm_password','label'=>'Confirmar Password'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="usernameerror" name ="codeerror" class="has-error"></span>')
        );
        $this->crud_params['save_button_name']       ='button.save';
        $this->crud_params['cancel_button_name']     ='button.cancel';
        $this->crud_params['delete_button_name']     ='button.delete';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {

        $this->tag->setDefault("id", $entity_object->getId());
        $this->tag->setDefault("username", $entity_object->getUsername());
        $this->tag->setDefault("email", $entity_object->getEmail());

        if($mode !='edit')
        {
          $this->tag->setDefault("password", $entity_object->getPassword());
          $this->tag->setDefault("confirm_password", $entity_object->getConfirm_password());
        }
      }
    }

    public function set_post_values($entity)
    {
      $entity->setUsername($this->request->getPost("username"));
      $entity->setEmail($this->request->getPost("email", "email"));
      if ($this->request->getPost("password"))
      {
        $entity->setPassword($this->request->getPost("password"));
        $entity->setConfirm_password($this->request->getPost("confirm_password"));
      }
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'user/new'
    ,'edit_route'=>'user/edit/'
    ,'show_route'=>'user/show/'
    ,'search_route'=>'user/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'user/userlist'
    ,'numberPage'=>1
    ,'pagelimit'=>5
    ,'noitems_message'=>'user.notfound'
    ,'title' =>'user.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'username','title' => 'User Name','class'=>''),
      array('column_name'=>'email','title' => 'E-Mail','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'username','title' => 'User Name','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'email','title' => 'E-mail','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="userlist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('user/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('u.id','u.username','u.email'))
             ->from(array('u' => 'User'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);

    $this->check_all_permissions( $this->session->get('userid'));

}

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create User'
    ,'Edit User'
    ,'Manage Users'
    ,'Delete User');
    $this->view->special_permission =$this->check_user_special_actions(
    $userid
    ,'Change User Password'
    ,'Manage User Role');


  }


  public function check_user_special_actions($userid,$change_password_action,$add_user_role)
  {
    $special_permission =array();
    $special_permission['change_password'] ='N';
    $special_permission['add_user_role']  ='N';
    $actions = $this->get_user_actions($userid);
    foreach ($actions as $item)
    {
     if ($item->action ==$change_password_action)
     {
      $special_permission['change_password'] ='Y';
     }
     if ($item->action ==$add_user_role)
     {
     $special_permission['add_user_role'] ='Y';
     }

   }
   return $special_permission;
   }




  /**
  * @Route("/search", methods={"GET","POST"}, name="usersearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('user/search');

    $search_values =array(array('name'=>'username','value'=>$this->request->getPost("username"))
    ,array('name'=>'email','value'=>$this->request->getPost("email")));

    $params_query =$this->set_search_grid_post_values($search_values);

    $query = $this->modelsManager->createBuilder()
             ->columns(array('u.id','u.username','u.email'))
             ->from(array('u' => 'User'))
             ->Where('u.username LIKE :username:', array('username' => '%' . $params_query['username']. '%'))
             ->AndWhere('u.email LIKE :email:', array('email' => '%' . $params_query['email']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions( $this->session->get('userid'));

  }


  public function get_assets()
  {
    $this->assets
       ->collection('validatejs')
        ->addJs('js/jqueryvalidate/jquery.validate.js')
        ->addJs('js/jqueryvalidate/additional-methods.min.js')
        ->addJs('js/validateuser/validateuser.js');
  }

  /**
  * @Route("/new", methods={"GET"}, name="userenew")
  */
  public function newAction ($entity=null)
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
    $this->view->mode ='new';
  }

  /**
  * @Route("/edit/{id}", methods={"GET"}, name="useredit")
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
    $this->view->mode ='edit';
    $this->set_form_routes(
    $this->crud_params['save_route'].$id
    ,$this->crud_params['route_list']
    ,$this->crud_params['edit_title']
    ,$this->crud_params['add_edit_view']
    ,'edit',$entity,$this->crud_params['form_name']
    ,array(
    array('name' => 'username','label'=>'User Name'
    ,'required'=>'<span class="required" aria-required="true">* </span>'
    ,'div_control_class'=>'input-control select full-size'
    ,'div_cell_class'=>'cell colspan3'
    ,'div_row_class'=>'row cells1'
    ,'label_error'=>'<span id ="usernameerror" name ="codeerror" class="has-error"></span>'),
    array('name' => 'email','label'=>'E-mail'
    ,'required'=>'<span class="required" aria-required="true">* </span>'
    ,'div_control_class'=>'input-control select full-size'
    ,'div_cell_class'=>'cell colspan3'
    ,'div_row_class'=>'row cells1'
    ,'label_error'=>'<span id ="emailerror" name ="stateerror" class="has-error"></span>'))
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,''
    );
  }

  /**
  * @Route("/create", methods={"GET","POST"}, name="usercreate")
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
  * @Route("/save/{id}", methods={"POST"}, name="usersave")
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
  * @Route("/show/{id}", methods={"GET"}, name="usershow")
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
  * @Route("/delete/{id}", methods={"POST","GET"}, name="userdelete")
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
  * @Route("/set_password_change/{id}", methods={"GET","POST"}, name="set_password_change")
  */
  public function set_password_changeAction($id)
  {

            $entity = User::findFirst($id);
            
           if (!$entity) {
                $this->flash->error($this->crud_params['not_found_message']);

                return $this->dispatcher->forward(array(
                    "controller" => "user",
                    "action" => "change_password"
                ));
            }
            $this->set_change_password_assets();
            $this->view->id = $entity->id;
            $this->view->title ='Cambiar Password '.$entity->username;
            $this->view->routeform ='user/change_password/'.$entity->id;
            $this->view->cancel_button_name=$this->crud_params['cancel_button_name'];
            $this->view->routelist =$this->crud_params['route_list'];

            $this->view->pick('user/changepassword');

  }
   /**
  * @Route("/change_password/{id}", methods={"POST"}, name="change_password")
  */
    public function change_passwordAction($id)
    {

        $entity = User::findFirst($id);
        if (!$entity) {
            $this->flash->error($this->crud_params['not_found_message']);

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "set_password_change"
            ));
        }


        $message = $this->validate_password($this->request->getPost("password"),$this->request->getPost("confirm_password"));
        if ($message =="")
        {
        $entity->setPassword( $this->getDI()->getSecurity()->hash($this->request->getPost("password")));

        if (!$entity->save()) {

            foreach ($entity->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "set_password_change",
                "params" => array($id)
            ));
        }
        else
        {
        $this->response->redirect(array('for' => 'userlist'));
        }

        }
        else
        {
             $this->flash->error($message);
             $this->dispatcher->forward(array(
             "action" => "set_password_change",
             "parameters"=>array($id)

                ));
        }



    }

       public function set_change_password_assets()
       {
           $this->assets
         ->collection('change_password')
        ->addJs('js/jqueryvalidate/jquery.validate.js')
        ->addJs('js/jqueryvalidate/additional-methods.min.js')
        ->addJs('js/validateuser/change_password.js');
       }

       public function validate_password($password,$confirm_password)
        {
           $message="";
           if((empty($password) ==true) or (empty($password) ==true))
            {
             $message = "El password y el password de confirmacion no pueden estar vacios";
            }
           if($password !=$confirm_password)
          {
           $message="El password y el password de confirmación deben ser iguales.";
          }

          return $message;

       }



}
