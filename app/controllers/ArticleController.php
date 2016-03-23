<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use ArticleForm as ArticleForm;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

/**
 * @RoutePrefix("/article")
 */
class ArticleController extends ControllerBase
{
    public $crud_params =array();
    public function onConstruct()
    {
        $this->crud_params['route_list']         = 'article/list';
        $this->crud_params['entityname']         = 'Article';
        $this->crud_params['not_found_message']  = 'article.entity.notfound';
        $this->crud_params['controller']         = 'Article';
        $this->crud_params['action_list']        = 'articlelist';
        $this->crud_params['form_name']          = 'ArticleForm';
        $this->crud_params['delete_message']     = 'article.delete.question';
        $this->crud_params['create_route']       = 'article/create';
        $this->crud_params['save_route']         = 'article/save/';
        $this->crud_params['delete_route']       = 'article/delete/';
        $this->crud_params['add_edit_view']      = 'article/addedit';
        $this->crud_params['show_view']          = 'article/show';
        $this->crud_params['new_title']          = 'article.title.new';
        $this->crud_params['edit_title']         = 'article.title.edit';
        $this->crud_params['form_columns']       = array(
            array('name' => 'title','label'=>'Title'
            ,'required'=>'<span class="required" aria-required="true">* </span>'
            ,'label_error'=>''),
            array('name' => 'author','label'=>'Author'
            ,'required'=>'<span class="required" aria-required="true">* </span>'
            ,'label_error'=>''),
            array('name' => 'content','label'=>'Content'
            ,'required'=>'<span class="required" aria-required="true">* </span>'
            ,'label_error'=>''),
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
            $this->tag->setDefault("title", $entity_object->getTitle());
            $this->tag->setDefault("author", $entity_object->getAuthor());
            $this->tag->setDefault("content", $entity_object->getContent());
            $this->tag->setDefault("active", $entity_object->getActive());

        }
    }

    public function set_post_values($entity)
    {

        $entity->setTitle($this->request->getPost("title"));
        $entity->setAuthor($this->request->getPost("author"));
        $entity->setContent($this->request->getPost("articlecontent"));
        $entity->setActive($this->request->getPost("active"));
    }

    public function set_grid_parameters($routelist)
    {
    $grid_values =
        [
            'new_route'=>'article/new'
            ,'edit_route'=>'article/edit/'
            ,'show_route'=>'article/show/'
            ,'search_route'=>'article/search'
            ,'route_list'=>$routelist
            ,'view_name'=>'article/articlelist'
            ,'numberPage'=>1
            ,'pagelimit'=>5
            ,'noitems_message'=>'article.notfound'
            ,'title' =>'article.list.title'
            ,'header_columns'=>array(
            array('column_name' => 'title','title' => 'Title','class'=>''),
            array('column_name'=>'author','title' => 'Author','class'=>''),
            array('column_name'=>'content','title' => 'Content','class'=>''),
            array('column_name'=>'active','title' => 'Active','class'=>''))
            ,'search_columns'=>array(
            array('name' => 'title','title' => 'Title','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
            array('name' => 'author','title' => 'Author','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
            array('name' => 'content','title' => 'Content','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
            array('name' => 'active','title' => 'Active','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
        )
        ];
        return $grid_values;
    }


    /**
     * @Route("/list", methods={"GET","POST"}, name="articlelist")
     */
    public function listAction()
    {
        $order=$this->set_grid_order();
        $grid_values =$this->set_grid_parameters('article/list');
        $query= $this->modelsManager->createBuilder()
            ->columns(array('a.id ','a.title','a.author','a.content','a.active'))
            ->from(array('a' => 'Article'))
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
            ,'Create Article'
            ,'Edit Article'
            ,'Manage Article'
            ,'Delete Article');

    }


    /**
     * @Route("/search", methods={"GET","POST"}, name="articlesearch")
     */
    public function searchAction()

    {

        $order=$this->set_grid_order();

        $grid_values =$this->set_grid_parameters('article/search');

        $search_values =array(array('name'=>'title','value'=>$this->request->getPost("title"))
        ,array('name'=>'author','value'=>$this->request->getPost("author"))
        ,array('name'=>'content','value'=>$this->request->getPost("content"))
        ,array('name'=>'active','value'=>$this->request->getPost("active")));

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

        $query = $this->modelsManager->createBuilder()
            ->columns(array('a.id ','a.title','a.author','a.content','a.active'))
            ->from(array('a' => 'Article'))
            ->Where('a.title LIKE :title:', array('title' => '%' . $params_query['title']. '%'))
            ->AndWhere('a.author LIKE :author:', array('author' => '%' . $params_query['author']. '%'))
            ->AndWhere('a.content LIKE :content:', array('content' => '%' . $params_query['content']. '%'))
            ->AndWhere('a.active LIKE :active:', array('active' => '%' . $params_query['active']. '%'))
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
            ->addJs('js/validate_article/validate_article.js');

    }


    /**
     * @Route("/new", methods={"GET"}, name="articleenew")
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
     * @Route("/edit/{id}", methods={"GET"}, name="articleedit")
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
     * @Route("/create", methods={"POST","GET"}, name="articlecreate")
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
     * @Route("/save/{id}", methods={"POST"}, name="articlesave")
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
     * @Route("/show/{id}", methods={"GET"}, name="articleshow")
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
     * @Route("/delete/{id}", methods={"POST"}, name="articledelete")
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
