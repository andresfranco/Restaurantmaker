<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use TranslationForm as TranslationForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/translation")
 */
class TranslationController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'translation/list';
        $this->crud_params['entityname']         = 'Translation';
        $this->crud_params['not_found_message']  = 'translation.entity.notfound';
        $this->crud_params['controller']         = 'Translation';
        $this->crud_params['action_list']        = 'translationlist';
        $this->crud_params['form_name']          = 'TranslationForm';
        $this->crud_params['delete_message']     = 'translation.delete.question';
        $this->crud_params['create_route']       = 'translation/create';
        $this->crud_params['save_route']         = 'translation/save/';
        $this->crud_params['delete_route']       = 'translation/delete/';
        $this->crud_params['add_edit_view']      = 'translation/addedit';
        $this->crud_params['show_view']          = 'translation/show';
        $this->crud_params['new_title']          = 'translation.title.new';
        $this->crud_params['edit_title']         = 'translation.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'languagecode','label'=>'Idioma'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="codeerror" name ="codeerror" class="has-error"></span>'),
        array('name' => 'translatekey','label'=>'Llave'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="translationerror" name ="stateerror" class="has-error"></span>'),
        array('name' => 'translatevalue','label'=>'Valor'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'div_control_class'=>'input-control select full-size'
        ,'div_cell_class'=>'cell colspan3'
        ,'div_row_class'=>'row cells1'
        ,'label_error'=>'<span id ="translationerror" name ="stateerror" class="has-error"></span>')
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
      $this->tag->setDefault("languagecode", $entity_object->getLanguagecode());
      $this->tag->setDefault("translatekey", $entity_object->getTranslatekey());
      $this->tag->setDefault("translatevalue", $entity_object->getValue());
      }
    }

    public function set_post_values($entity)
    {
      $entity->setLanguagecode($this->request->getPost("languagecode"));
      $entity->setTranslatekey($this->request->getPost("translatekey"));
      $entity->setValue($this->request->getPost("translatevalue"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'translation/new'
    ,'edit_route'=>'translation/edit/'
    ,'show_route'=>'translation/show/'
    ,'search_route'=>'translation/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'translation/translationlist'
    ,'numberPage'=>1
    ,'pagelimit'=>5
    ,'noitems_message'=>'translation.notfound'
    ,'title' =>'translation.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'language','title' => 'Idioma','class'=>''),
      array('column_name'=>'translatekey','title' => 'Llave','class'=>''),
      array('column_name'=>'value','title' => 'Valor','class'=>'')
    )
    ,'search_columns'=>array(
      array('name' => 'language','title' => 'Idioma','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'translatekey','title' => 'Llave','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'value','title' => 'Valor','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="translationlist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('translation/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('t.id as id','l.language as language','t.translatekey as translatekey','t.value as value'))
             ->from(array('t' => 'Translation'))
             ->join('Language', 'l.code = t.languagecode', 'l')
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
    ,'Create Translation'
    ,'Edit Translation'
    ,'Manage Translations'
    ,'Delete Translation');
  }

  /**
  * @Route("/search", methods={"GET","POST"}, name="translationsearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('translation/search');

    $search_values =array(array('name'=>'language','value'=>$this->request->getPost("language"))
    ,array('name'=>'translatekey','value'=>$this->request->getPost("translatekey"))
    ,array('name'=>'value','value'=>$this->request->getPost("value")));

    $params_query =$this->set_search_grid_post_values($search_values);

    $query = $this->modelsManager->createBuilder()
             ->columns(array('t.id as id','l.language as language','t.translatekey as translatekey','t.value as value'))
             ->from(array('t' => 'Translation'))
             ->join('Language', 'l.code = t.languagecode', 'l')
             ->Where('l.language LIKE :language:', array('language' => '%' . $params_query['language']. '%'))
             ->AndWhere('t.translatekey LIKE :translatekey:', array('translatekey' => '%' . $params_query['translatekey']. '%'))
             ->AndWhere('t.value LIKE :value:', array('value' => '%' . $params_query['value']. '%'))
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
    ->addJs('js/validatetranslation/validate_translation.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="translationenew")
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
  * @Route("/edit/{id}", methods={"GET"}, name="translationedit")
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
  * @Route("/create", methods={"POST","GET"}, name="translationcreate")
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
  * @Route("/save/{id}", methods={"POST"}, name="translationsave")
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
  * @Route("/show/{id}", methods={"GET"}, name="translationshow")
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
  * @Route("/delete/{id}", methods={"POST"}, name="translationdelete")
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
