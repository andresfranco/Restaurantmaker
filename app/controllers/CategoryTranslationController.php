<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use CategoryTranslationForm as CategoryTranslationForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/category_translation")
 */
class CategoryTranslationController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'category_translation/list';
        $this->crud_params['entityname']         = 'CategoryTranslation';
        $this->crud_params['not_found_message']  = 'category_translation.entity.notfound';
        $this->crud_params['controller']         = 'CategoryTranslation';
        $this->crud_params['action_list']        = 'category_translation_list';
        $this->crud_params['form_name']          = 'CategoryTranslationForm';
        $this->crud_params['delete_message']     = 'category_translation.delete.question';
        $this->crud_params['create_route']       = 'category_translation/create';
        $this->crud_params['save_route']         = 'category_translation/save/';
        $this->crud_params['delete_route']       = 'category_translation/delete/';
        $this->crud_params['add_edit_view']      = 'category_translation/addedit';
        $this->crud_params['show_view']          = 'category_translation/show';
        $this->crud_params['new_title']          = 'category_translation.title.new';
        $this->crud_params['edit_title']         = 'category_translation.title.edit';
        $this->crud_params['form_columns']       = array(

        array('name' => 'languagecode','label'=>'Language'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="category_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'category','label'=>'Category'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="category_translationerror" name ="codeerror" class="has-error"></span>')
       
        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
        $this->tag->setDefault("categoryid", $entity_object->getCategoryid());
        $this->tag->setDefault("languagecode", $entity_object->getLanguagecode());
        $this->tag->setDefault("category", $entity_object->getCategory());
      }
    }

    public function set_post_values($entity,$categoryid)
    {
      $entity->setCategoryid($categoryid);
      $entity->setLanguagecode($this->request->getPost("languagecode"));
      $entity->setCategory($this->request->getPost("category"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'category_translation/new'
    ,'edit_route'=>'category_translation/edit/'
    ,'show_route'=>'category_translation/show/'
    ,'search_route'=>'category_translation/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'category_translation/category_translation_list'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'category_translation.notfound'
    ,'title' =>'category_translation.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'category','title' => 'Category','class'=>'')
      ,array('column_name' => 'language','title' => 'Language','class'=>'')
      ,array('column_name' => 'translation','title' => 'Translate Category','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'category','title' => 'Category','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'language','title' => 'Language','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'translation','title' => 'Translate title','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')

    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list/{articleid}", methods={"GET","POST"}, name="category_translation_list")
  */
  public function listAction($articleid)
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('category_translation/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('at.id as id','at.articleid as articleid','at.languagecode as languagecode','l.language as language','a.title as article','at.title_translation as translation'))
             ->from(array('at' => 'CategoryTranslation'))
             ->join('Article', 'a.id = at.articleid', 'a')
             ->join('Language', 'l.code = at.languagecode', 'l')
             ->where('at.articleid = :articleid:', array('articleid' =>$articleid))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->articleid = $articleid;
    $category_data = $this->get_articledata_by_id($articleid);
    $this->view->category_name =$category_data['title'];
    $this->view->category_id = $category_data['id'];
    $this->view->obj =$this;
  }

  public function check_all_permissions($userid)
  {
    $this->view->permissions =$this->check_user_actions(
    $userid
    ,'Create Article Translation'
    ,'Edit Article Translation'
    ,'Manage Article Translation'
    ,'Delete Article Translation');

  }


  /**
  * @Route("/search/{articleid}", methods={"GET","POST"}, name="category_translationsearch")
  */
  public function searchAction($articleid)

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('category_translation/search');

    $search_values =array(array('name'=>'article','value'=>$this->request->getPost("article"))

    ,array('name'=>'language','value'=>$this->request->getPost("language"))
    ,array('name'=>'title','value'=>$this->request->getPost("translation"))
     );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =$this->modelsManager->createBuilder()
             ->columns(array('at.id as id','at.articleid as articleid','at.languagecode as languagecode','l.language as language','a.title as article','at.title_translation as translation'))
             ->from(array('at' => 'CategoryTranslation'))
             ->join('Article', 'a.id = at.articleid', 'a')
             ->join('Language', 'l.code = at.languagecode', 'l')
             ->where('at.articleid = :articleid:', array('articleid' =>$articleid))
             ->AndWhere('a.title LIKE :article:', array('article' => '%' . $params_query['article']. '%'))
             ->AndWhere('l.language LIKE :language:', array('language' => '%' . $params_query['language']. '%'))
             ->AndWhere('at.title_translation LIKE :title:', array('title' => '%' . $params_query['title']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();

    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->articleid = $articleid;
    $category_data = $this->get_articledata_by_id($articleid);
    $this->view->category_name =$category_data['title'];
    $this->view->category_id = $category_data['articleid'];
    $this->view->obj =$this;

  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validate_category_translation/validate_category_translation.js');
  }


  public function set_form_routes_custom($routeform,$routelist,$title
  ,$view_name,$mode,$entity,$form_name
  ,$form_columns,$save_button_name,$cancel_button_name,$delete_button_name,$articleid)
  {

    $category_data = $this->get_articledata_by_id($articleid);
    $this->view->form = new CategoryTranslationForm($entity,array());
    $this->view->routelist =$routelist;
    $this->view->routeform =$routeform;
    $this->view->title =$title;
    $this->view->formcolumns =$form_columns;
    $this->view->save_button_name =$save_button_name;
    $this->view->cancel_button_name =$cancel_button_name;
    $this->view->delete_button_name =$delete_button_name;
    $this->view->articleid =$category_data['id'];
    $this->view->category_name =$category_data['title'];
    $this->view->mode =$mode;
    $this->view->pick($view_name);
  }

  public function get_articledata_by_id($articleid)
  {
    $category_data = Article::findFirst($articleid)->toArray();
    return $category_data;

  }

  /**
  * @Route("/new/{articleid}", methods={"GET"}, name="dishenew")
  */
  public function newAction($articleid)
  {
    
    $entity =null;
    $this->get_assets();
    $this->set_form_routes_custom(
    $this->crud_params['create_route'].'/'.$articleid
    ,$this->crud_params['route_list']
    ,$this->crud_params['new_title']
    ,$this->crud_params['add_edit_view']
    ,'new'
    ,$entity
    ,$this->crud_params['form_name']
    ,$this->crud_params['form_columns']
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,''
    ,$articleid);

    $this->tag->setDefault("content", $this->request->getPost("articlecontent"));
  }

  /**
  * @Route("/edit/{id}/{articleid}", methods={"GET"}, name="dishedit")
  */
  public function editAction($id,$articleid)
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

    $this->set_form_routes_custom(
    $this->crud_params['save_route'].$id
    ,$this->crud_params['route_list']
    ,$this->crud_params['edit_title']
    ,$this->crud_params['add_edit_view']
    ,'edit',$entity,$this->crud_params['form_name']
    ,$this->crud_params['form_columns']
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,''
    ,$articleid
    );
  }

  public function execute_entity_action_custom($entity,$controller,$action,$params,$redirect_route,$mode,$articleid)
  {
  $form_action =$entity->save();
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
             "params"=>array($articleid)

         ));
   }

   $this->response->redirect('category_translation/list/'.$articleid);
  }
  /**
  * @Route("/create/{articleid}", methods={"POST"}, name="dishcreate")
  */
  public function createAction($articleid)
  {
    $entity = $this->set_entity(
    ''
    ,$this->crud_params['entityname']
    ,$this->crud_params['not_found_message']
    ,$this->crud_params['controller']
    ,$this->crud_params['action_list']
    ,'create');

    $this->set_post_values($entity,$articleid);
    $this->audit_fields($entity,'create');


    $this->execute_entity_action_custom($entity
    ,$this->crud_params['controller']
    ,'new',array($entity),$this->crud_params['action_list']
    ,'create',$articleid);
  }

  /**
  * @Route("/save/{id}", methods={"POST"}, name="dishsave")
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

    $this->set_post_values($entity,$entity->getArticleid());
    $this->audit_fields($entity,'edit');

    $this->execute_entity_action_custom(
    $entity
    ,$this->crud_params['controller']
    ,'edit',array($entity->id)
    ,$this->crud_params['action_list'],'update',$entity->getArticleid());
  }

  /**
  * @Route("/show/{id}", methods={"GET"}, name="dishshow")
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

    $this->set_form_routes_custom(
    $this->crud_params['delete_route'].$id
    ,$this->crud_params['route_list'].'/'.$entity->getArticleid()
    ,$this->crud_params['delete_message']
    ,$this->crud_params['show_view'] ,'show'
    ,$entity
    ,$this->crud_params['form_name']
    ,$this->crud_params['form_columns']
    ,$this->crud_params['save_button_name']
    ,$this->crud_params['cancel_button_name']
    ,$this->crud_params['delete_button_name']
    ,''
    );
    $this->set_tags('delete',$entity,'Y');
  }

  /**
  * @Route("/delete/{id}", methods={"POST"}, name="dishdelete")
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
    $this->execute_entity_action_custom(
    $entity
    ,$this->crud_params['controller']
    ,'show'
    ,array('id'=>$id)
    ,$this->crud_params['action_list']
    ,'delete',$entity->getArticleid());
  }

}