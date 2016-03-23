<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use ActionForm as ActionForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/article_comment")
 */
class ArticleCommentController extends ControllerBase
{
  public $crud_params =array();
  public function onConstruct()
    {
        $this->crud_params['route_list']         = 'article_comment/list';
        $this->crud_params['entityname']         = 'ArticleComment';
        $this->crud_params['not_found_message']  = 'action.entity.notfound';
        $this->crud_params['controller']         = 'ArticleComment';
        $this->crud_params['action_list']        = 'articlecommentlist';
        $this->crud_params['form_name']          = 'ArticleCommentForm';
        $this->crud_params['delete_message']     = 'article_comment.delete.question';
        $this->crud_params['create_route']       = 'article_comment/create';
        $this->crud_params['save_route']         = 'article_comment/save/';
        $this->crud_params['delete_route']       = 'article_comment/delete/';
        $this->crud_params['add_edit_view']      = 'article_comment/addedit';
        $this->crud_params['show_view']          = 'article_comment/show';
        $this->crud_params['new_title']          = 'article_comment.title.new';
        $this->crud_params['edit_title']         = 'article_comment.title.edit';
        $this->crud_params['form_columns']       = array(
        array('name' => 'articleid','label'=>'Article'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="article_commenterror" name ="codeerror" class="has-error"></span>'),
        array('name' => 'name','label'=>'Name'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="article_commenterror" name ="codeerror" class="has-error"></span>'),
        array('name' => 'email','label'=>'Email'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="article_commenterror" name ="codeerror" class="has-error"></span>'),
        array('name' => 'comment','label'=>'Comment'
        ,'required'=>'<span class="required" aria-required="true">* </span>'
        ,'label_error'=>'<span id ="article_commenterror" name ="codeerror" class="has-error"></span>'),
        array('name' => 'active','label'=>'Active'
        ,'required'=>''
        ,'label_error'=>'')
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
      $this->tag->setDefault("name", $entity_object->getName());
      $this->tag->setDefault("email", $entity_object->getEmail());
      $this->tag->setDefault("comment", $entity_object->getComment());
      $this->tag->setDefault("active", $entity_object->getActive());
      }
    }

    public function set_post_values($entity)
    {
      $entity->setArticleid($this->request->getPost("articleid"));
      $entity->setName($this->request->getPost("name"));
      $entity->setEmail($this->request->getPost("email"));
      $entity->setComment($this->request->getPost("comment_content"));
      $entity->setActive($this->request->getPost("active"));
    }

  public function set_grid_parameters($routelist)
  {
    $grid_values =
    [
     'new_route'=>'article_comment/new'
    ,'edit_route'=>'article_comment/edit/'
    ,'show_route'=>'article_comment/show/'
    ,'search_route'=>'article_comment/search'
    ,'route_list'=>$routelist
    ,'view_name'=>'article_comment/articlecommentlist'
    ,'numberPage'=>1
    ,'pagelimit'=>10
    ,'noitems_message'=>'article_comment.notfound'
    ,'title' =>'article_comment.list.title'
    ,'header_columns'=>array(
      array('column_name' => 'article','title' => 'Article','class'=>''),
      array('column_name'=>'name','title' => 'Name','class'=>''),
      array('column_name'=>'email','title' => 'Email','class'=>''),
      array('column_name'=>'active','title' => 'Active','class'=>''),
      array('column_name'=>'comment','title' => 'Comment','class'=>'')
    )
    ,'search_columns'=>array(
      array('name' => 'article','title' => 'Article','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'name','title' => 'Name','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'email','title' => 'Email','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'active','title' => 'Active','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
      array('name' => 'comment','title' => 'Comment','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
    )
  ];
    return $grid_values;
  }


  /**
  * @Route("/list", methods={"GET","POST"}, name="articlecommentlist")
  */
  public function listAction()
  {
    $order=$this->set_grid_order();
    $grid_values =$this->set_grid_parameters('article_comment/list');
    $query= $this->modelsManager->createBuilder()
             ->columns(array('ac.id ','ac.articleid','a.title as article','ac.name','ac.email','ac.comment','ac.active'))
             ->from(array('ac' => 'ArticleComment'))
             ->join('Article', 'a.id = ac.articleid', 'a')
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
    ,'Create Article Comment'
    ,'Edit Article Comment'
    ,'Manage Article Comment'
    ,'Delete Article Comment');

  }


  /**
  * @Route("/search", methods={"GET","POST"}, name="article_commentsearch")
  */
  public function searchAction()

  {

    $order=$this->set_grid_order();

    $grid_values =$this->set_grid_parameters('article_comment/search');

    $search_values =array(array('name'=>'article','value'=>$this->request->getPost("article"))
    ,array('name'=>'name','value'=>$this->request->getPost("name"))
    ,array('name'=>'email','value'=>$this->request->getPost("email"))
    ,array('name'=>'comment','value'=>$this->request->getPost("comment"))
    ,array('name'=>'active','value'=>$this->request->getPost("active"))
    );

    $params_query =$this->set_search_grid_post_values($search_values);
    if (strtoupper($params_query['active']) =='YES' or
    strtoupper($params_query['active']) == strtoupper($this->di->get('translate')->_('Yes')))
    {
      $params_query['active']='Y';
    }
    if (strtoupper($params_query['active']) =='NO' or
    strtoupper($params_query['active']) == strtoupper($this->di->get('translate')->_('No')))
    {
      $params_query['active']='N';
    }
    $query =$this->modelsManager->createBuilder()
             ->columns(array('ac.id ','ac.articleid','a.title as article','ac.name','ac.email','ac.comment','ac.active'))
             ->from(array('ac' => 'ArticleComment'))
             ->join('Article', 'a.id = ac.articleid', 'a')
             ->Where('a.title LIKE :article:', array('article' => '%' . $params_query['article']. '%'))
             ->AndWhere('ac.name LIKE :name:', array('name' => '%' . $params_query['name']. '%'))
             ->AndWhere('ac.email LIKE :email:', array('email' => '%' . $params_query['email']. '%'))
             ->AndWhere('ac.comment LIKE :comment:', array('comment' => '%' . $params_query['comment']. '%'))
             ->AndWhere('ac.active LIKE :active:', array('active' => '%' . $params_query['active']. '%'))
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
    ->addJs('js/validate_article_comment/validate_article_comment.js');
  }


  /**
  * @Route("/new", methods={"GET"}, name="article_commentenew")
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
  * @Route("/edit/{id}", methods={"GET"}, name="article_commentedit")
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
  * @Route("/create", methods={"POST"}, name="article_commentcreate")
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

    $this->execute_entity_action($entity
    ,$this->crud_params['controller']
    ,'new',array($entity),$this->crud_params['action_list']
    ,'create');
  }

  /**
  * @Route("/save/{id}", methods={"POST"}, name="article_commentsave")
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

    $this->execute_entity_action(
    $entity
    ,$this->crud_params['controller']
    ,'edit',array($entity->id)
    ,$this->crud_params['action_list'],'update');
  }

  /**
  * @Route("/show/{id}", methods={"GET"}, name="article_commentshow")
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
  * @Route("/delete/{id}", methods={"POST"}, name="article_commentdelete")
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
