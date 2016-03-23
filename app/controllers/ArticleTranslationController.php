<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use ArticleTranslationForm as ArticleTranslationForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/article_translation")
 */
class ArticleTranslationController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'article_translation/list';
        $this->crud_params['entityname']         = 'ArticleTranslation';
        $this->crud_params['not_found_message']  = 'article_translation.entity.notfound';
        $this->crud_params['controller']         = 'ArticleTranslation';
        $this->crud_params['action_list']        = 'article_translation_list';
        $this->crud_params['form_name']          = 'ArticleTranslationForm';
        $this->crud_params['delete_message']     = 'article_translation.delete.question';
        $this->crud_params['create_route']       = 'article_translation/create';
        $this->crud_params['save_route']         = 'article_translation/save/';
        $this->crud_params['delete_route']       = 'article_translation/delete/';
        $this->crud_params['add_edit_view']      = 'article_translation/addedit';
        $this->crud_params['show_view']          = 'article_translation/show';
        $this->crud_params['new_title']          = 'article_translation.title.new';
        $this->crud_params['edit_title']         = 'article_translation.title.edit';
        $this->crud_params['form_columns']       = array(

        array('name' => 'languagecode','label'=>'Language'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="article_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'title','label'=>'Title'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="article_translationerror" name ="codeerror" class="has-error"></span>')
        ,array('name' => 'content','label'=>'Content'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="article_translationerror" name ="codeerror" class="has-error"></span>')

        );
        $this->crud_params['save_button_name']       ='Guardar';
        $this->crud_params['cancel_button_name']     ='Cancelar';
        $this->crud_params['delete_button_name']     ='Eliminar';
    }

    public function set_tags($mode,$entity_object)
    {
      if($entity_object)
      {
        $this->tag->setDefault("articleid", $entity_object->getArticleid());
        $this->tag->setDefault("languagecode", $entity_object->getLanguagecode());
        $this->tag->setDefault("title", $entity_object->getTitle());
        $this->tag->setDefault("content", $entity_object->getContent());
      }
    }

    public function set_post_values($entity,$articleid)
    {
      $entity->setArticleid($articleid);
      $entity->setLanguagecode($this->request->getPost("languagecode"));
      $entity->setTitle($this->request->getPost("title"));
      $entity->setContent($this->request->getPost("articlecontent"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'article_translation/new'
    ,'edit_route'=>'article_translation/edit/'
    ,'show_route'=>'article_translation/show/'
    ,'search_route'=>'article_translation/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'article_translation/article_translation_list'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'article_translation.notfound'
    ,'title' =>'article_translation.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'article','title' => 'Article Name','class'=>'')
      ,array('column_name' => 'language','title' => 'Language','class'=>'')
      ,array('column_name' => 'title','title' => 'Translate title','class'=>''))
    ,'search_columns'=>array(
      array('name' => 'article','title' => 'Article Name','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'language','title' => 'Language','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
      ,array('name' => 'title','title' => 'Translate title','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')

    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list/{articleid}", methods={"GET","POST"}, name="article_translation_list")
  */
  public function listAction($articleid)
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('article_translation/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('at.id as id','at.articleid as articleid','at.languagecode as languagecode','l.language as language','a.title as article','at.title as title'))
             ->from(array('at' => 'ArticleTranslation'))
             ->join('Article', 'a.id = at.articleid', 'a')
             ->join('Language', 'l.code = at.languagecode', 'l')
             ->where('at.articleid = :articleid:', array('articleid' =>$articleid))
             ->orderBy($order)
             ->getQuery()
             ->execute();
    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->articleid = $articleid;
    $article_data = $this->get_articledata_by_id($articleid);
    $this->view->article_name =$article_data['title'];
    $this->view->article_id = $article_data['id'];
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
  * @Route("/search/{articleid}", methods={"GET","POST"}, name="article_translationsearch")
  */
  public function searchAction($articleid)

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('article_translation/search');

    $search_values =array(array('name'=>'article','value'=>$this->request->getPost("article"))

    ,array('name'=>'language','value'=>$this->request->getPost("language"))
    ,array('name'=>'title','value'=>$this->request->getPost("title"))
     );

    $params_query =$this->set_search_grid_post_values($search_values);

    $query =$this->modelsManager->createBuilder()
             ->columns(array('at.id as id','at.articleid as articleid','at.languagecode as languagecode','l.language as language','a.title as article','at.title'))
             ->from(array('at' => 'ArticleTranslation'))
             ->join('Article', 'a.id = at.articleid', 'a')
             ->join('Language', 'l.code = at.languagecode', 'l')
             ->where('at.articleid = :articleid:', array('articleid' =>$articleid))
             ->AndWhere('a.title LIKE :article:', array('article' => '%' . $params_query['article']. '%'))
             ->AndWhere('l.language LIKE :language:', array('language' => '%' . $params_query['language']. '%'))
             ->AndWhere('at.title LIKE :title:', array('title' => '%' . $params_query['title']. '%'))
             ->orderBy($order)
             ->getQuery()
             ->execute();

    $this->set_grid_values($query,$grid_values);
    $this->check_all_permissions($this->session->get('userid'));
    $this->view->articleid = $articleid;
    $article_data = $this->get_articledata_by_id($articleid);
    $this->view->article_name =$article_data['title'];
    $this->view->article_id = $article_data['articleid'];

  }


  public function get_assets()
  {
    $this->assets
    ->collection('validatejs')
    ->addJs('js/jqueryvalidate/jquery.validate.js')
    ->addJs('js/jqueryvalidate/additional-methods.min.js')
    ->addJs('js/validate_article_translation/validate_article_translation.js');
  }


  public function set_form_routes_custom($routeform,$routelist,$title
  ,$view_name,$mode,$entity,$form_name
  ,$form_columns,$save_button_name,$cancel_button_name,$delete_button_name,$articleid)
  {

    $article_data = $this->get_articledata_by_id($articleid);
    $this->view->form = new ArticleTranslationForm($entity,array());
    $this->view->routelist =$routelist;
    $this->view->routeform =$routeform;
    $this->view->title =$title;
    $this->view->formcolumns =$form_columns;
    $this->view->save_button_name =$save_button_name;
    $this->view->cancel_button_name =$cancel_button_name;
    $this->view->delete_button_name =$delete_button_name;
    $this->view->articleid =$article_data['id'];
    $this->view->article_name =$article_data['title'];
    $this->view->mode =$mode;
    $this->view->pick($view_name);
  }

  public function get_articledata_by_id($articleid)
  {
    $article_data = Article::findFirst($articleid)->toArray();
    return $article_data;

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

   $this->response->redirect('article_translation/list/'.$articleid);
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