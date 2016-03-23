<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use LanguageForm as LanguageForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/language")
 */
class LanguageController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'language/list';
        $this->crud_params['entityname']         = 'Language';
        $this->crud_params['not_found_message']  = 'language.entity.notfound';
        $this->crud_params['controller']         = 'Language';
        $this->crud_params['action_list']        = 'languagelist';
        $this->crud_params['form_name']          = 'LanguageForm';
        $this->crud_params['delete_message']     = 'language.delete.question';
        $this->crud_params['create_route']       = 'language/create';
        $this->crud_params['save_route']         = 'language/save/';
        $this->crud_params['delete_route']       = 'language/delete/';
        $this->crud_params['add_edit_view']      = 'language/addedit';
        $this->crud_params['show_view']          = 'language/show';
        $this->crud_params['new_title']          = 'language.title.new';
        $this->crud_params['edit_title']         = 'language.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'code','label'=>'Código'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="codeerror" name ="codeerror" class="has-error"></span>'),
        array('name' => 'language','label'=>'Idioma'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="languageerror" name ="stateerror" class="has-error"></span>'),
        array('name' => 'flag','label'=>'Bandera'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="flagerror" name ="stateerror" class="has-error"></span>')
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
      $this->tag->setDefault("language", $entity_object->getLanguage());
      $this->tag->setDefault("flag", $entity_object->getFlag());
      }
    }

    public function set_post_values($entity)
    {

      $entity->setCode($this->request->getPost("code"));
      $entity->setLanguage($this->request->getPost("language"));
      $entity->setFlag($this->request->getPost("flag"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'language/new'
    ,'edit_route'=>'language/edit/'
    ,'show_route'=>'language/show/'
    ,'search_route'=>'language/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'language/languagelist'
    ,'numberPage'=>1
    ,'pagelimit'=>5
    ,'noitems_message'=>'language.notfound'
    ,'title' =>'language.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'code','title' => 'Código','class'=>''),
      array('column_name'=>'language','title' => 'Idioma','class'=>''),
      array('column_name'=>'flag','title' => 'Bandera','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'code','title' => 'Código','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'language','title' => 'Idioma','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="languagelist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('language/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('l.code as code','l.language as language','l.flag as flag'))
             ->from(array('l' => 'Language'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions();

  }

  public function check_all_permissions()
  {
    $this->view->permissions =$this->check_user_actions(
    $this->session->get('userid')
    ,'Create Language'
    ,'Edit Language'
    ,'Manage Language'
    ,'Delete Language');
  }

  /**
  * @Route("/search", methods={"GET","POST"}, name="languagesearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('language/search');

    $search_values =array(array('name'=>'code','value'=>$this->request->getPost("code"))
    ,array('name'=>'language','value'=>$this->request->getPost("language")),
     array('name'=>'flag','value'=>$this->request->getPost("flag")));

    $params_query =$this->set_search_grid_post_values($search_values);

    $query = $this->modelsManager->createBuilder()
            ->columns(array('l.code as code','l.language as language','l.flag as flag'))
            ->from(array('l' => 'Language'))
             ->Where('l.code LIKE :code:', array('code' => '%' . $params_query['code']. '%'))
             ->AndWhere('l.language LIKE :language:', array('language' => '%' . $params_query['language']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions();

  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validatelanguage/validate_language.js')
    ->addJs('js/validatelanguage/get_language_flags.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="languageenew")
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

  public function set_Language_entity($code,$entityname,$errormessage,$controller,$action,$mode)
  {
        if ($mode =='create')
        {
          $entity = new $entityname();
        }
        else
        {

         $entity = Language::findByCode($code)->getFirst();

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
 public function execute_language_action($entity,$controller,$action,$params,$redirect_route,$mode)
 {
 $form_action = $entity->save();
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
  $this->response->redirect(array('for' => $redirect_route));
 }
  /**
  * @Route("/edit/{id}", methods={"GET"}, name="languageedit")
  */
  public function editAction($id)
  {
    $entity =$this->set_Language_entity(
    $id
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'edit');

    $this->get_assets();
    $this->set_tags('edit',$entity);

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
  * @Route("/create", methods={"POST","GET"}, name="languagecreate")
  */
  public function createAction()
  {
    $entity = $this->set_Language_entity(
    ''
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'create');

    $this->set_post_values($entity);
    $this->audit_fields($entity,'create');

    $this->execute_language_action($entity
    ,$this->crud_params['controller']
    ,'new',array($entity),$this->crud_params['action_list']
    ,'create');
  }

  /**
  * @Route("/save/{id}", methods={"POST"}, name="languagesave")
  */
  public function saveAction($id)
  {
    $entity =$this->set_Language_entity(
    $id
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'update');

    $this->set_post_values($entity);
    $this->audit_fields($entity,'edit');
    $this->execute_language_action(
    $entity
    ,$this->crud_params['controller']
    ,'edit',array($entity->code)
    ,$this->crud_params['action_list'],'update');
  }

  /**
  * @Route("/show/{id}", methods={"GET"}, name="languageshow")
  */
  public function showAction($id)
  {
    $entity =$this->set_Language_entity(
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
  * @Route("/delete/{id}", methods={"POST","GET"}, name="languagedelete")
  */
  public function deleteAction($id)
  {
    $entity =$this->set_Language_entity(
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
