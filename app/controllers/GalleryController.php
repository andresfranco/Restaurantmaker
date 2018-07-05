<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;
//use  UploadHandler as  UploadHandler;
use UploadHandlerController as  UploadHandler;
use Phalcon\Paginator\Adapter\NativeArray as PaginatorArray;
/**
 * @RoutePrefix("/gallery")
 */
class GalleryController extends ControllerBase
{
    public $crud_params =array();
    public function onConstruct()
    {
        $this->crud_params['route_list']         = 'gallery/list';
        $this->crud_params['entityname']         = 'Gallery';
        $this->crud_params['not_found_message']  = 'action.entity.notfound';
        $this->crud_params['controller']         = 'Gallery';
        $this->crud_params['action_list']        = 'gallerylist';
        $this->crud_params['form_name']          = 'GalleryForm';
        $this->crud_params['delete_message']     = 'gallery.delete.question';
        $this->crud_params['create_route']       = 'gallery/create';
        $this->crud_params['save_route']         = 'gallery/save/';
        $this->crud_params['delete_route']       = 'gallery/delete/';
        $this->crud_params['add_edit_view']      = 'gallery/addedit';
        $this->crud_params['show_view']          = 'gallery/show';
        $this->crud_params['new_title']          = 'gallery.title.new';
        $this->crud_params['edit_title']         = 'gallery.title.edit';
        $this->crud_params['form_columns']       = array(
            array('name' => 'name','label'=>'Name'
            ,'required'=>'<span class="required" aria-required="true">* </span>'
            ,'div_control_class'=>'input-control select full-size'
            ,'div_cell_class'=>'cell colspan3'
            ,'div_row_class'=>'row cells1'
            ,'label_error'=>''),
            array('name' => 'title','label'=>'Title'
            ,'required'=>'<span class="required" aria-required="true">* </span>'
            ,'div_control_class'=>'input-control select full-size'
            ,'div_cell_class'=>'cell colspan3'
            ,'div_row_class'=>'row cells1'
            ,'label_error'=>''),
            array('name' => 'type','label'=>'Type'
            ,'required'=>''
            ,'div_control_class'=>'input-control select full-size'
            ,'div_cell_class'=>'cell colspan3'
            ,'div_row_class'=>'row cells1'
            ,'label_error'=>''),
            array('name' => 'description','label'=>'Description'
            ,'required'=>''
            ,'div_control_class'=>'input-control select full-size'
            ,'div_cell_class'=>'cell colspan3'
            ,'div_row_class'=>'row cells1'
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
            $this->tag->setDefault("name", $entity_object->getName());
            $this->tag->setDefault("title", $entity_object->getTitle());
            $this->tag->setDefault("type", $entity_object->getType());
            $this->tag->setDefault("description", $entity_object->getDescription());
        }
    }

    public function set_post_values($entity)
    {
        $entity->setName($this->request->getPost("name"));
        $entity->setTitle($this->request->getPost("title"));
        $entity->setType($this->request->getPost("type"));
        $entity->setDescription($this->request->getPost("description"));
    }

    public function set_grid_parameters($routelist)
    {
        $grid_values =
            [
                'new_route'=>'gallery/new'
                ,'edit_route'=>'gallery/edit/'
                ,'show_route'=>'gallery/show/'
                ,'search_route'=>'gallery/search'
                ,'route_list'=>$routelist
                ,'view_name'=>'gallery/gallerylist'
                ,'numberPage'=>1
                ,'pagelimit'=>5
                ,'noitems_message'=>'gallery.notfound'
                ,'title' =>'gallery.list.title'
                ,'header_columns'=>array(
                array('column_name' => 'name','title' => 'Name','class'=>''),
                array('column_name'=>'title','title' => 'Title','class'=>''),
                array('column_name'=>'type','title' => 'Type','class'=>''))
                ,'search_columns'=>array(
                array('name' => 'name','title' =>  'Name','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
                array('name' => 'title','title' => 'Title','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
                array('name' => 'type','title' => 'Type','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
            )
            ];
        return $grid_values;
    }


    /**
     * @Route("/list", methods={"GET","POST"}, name="gallerylist")
     */
    public function listAction()
    {
        $order=$this->set_grid_order();
        $grid_values =$this->set_grid_parameters('gallery/list');
        $query= $this->modelsManager->createBuilder()
            ->columns(array('g.id ','g.name','g.title','g.type'))
            ->from(array('g' => 'Gallery'))
            ->orderBy($order)
            ->getQuery()
            ->execute();
        $this->set_grid_values($query,$grid_values);
        $this->check_all_permissions($this->session->get('userid'));

        $this->view->uploadroute="gallery/set_images/";
        $this->view->view_gallery_route ='gallery/view_gallery/';

    }

    public function check_all_permissions($userid)
    {
        $this->view->permissions =$this->check_user_actions(
            $userid
            ,'Create Gallery'
            ,'Edit Gallery'
            ,'Manage Gallery'
            ,'Delete Gallery');

    }


    /**
     * @Route("/search", methods={"GET","POST"}, name="gallerysearch")
     */
    public function searchAction()

    {

        $order=$this->set_grid_order();

        $grid_values =$this->set_grid_parameters('gallery/search');

        $search_values =array(array('name'=>'name','value'=>$this->request->getPost("name"))
        ,array('name'=>'title','value'=>$this->request->getPost("title"))
        ,array('name'=>'type','value'=>$this->request->getPost("type")));

        $params_query =$this->set_search_grid_post_values($search_values);

        $query = $this->modelsManager->createBuilder()
            ->columns(array('g.id ','g.name','g.title','g.type'))
            ->from(array('g' => 'Gallery'))
            ->Where('g.name LIKE :name:', array('name' => '%' . $params_query['name']. '%'))
            ->AndWhere('g.title LIKE :title:', array('title' => '%' . $params_query['title']. '%'))
            ->AndWhere('g.type LIKE :type:', array('type' => '%' . $params_query['type']. '%'))
            ->orderBy($order)
            ->getQuery()
            ->execute();
        $this->set_grid_values($query,$grid_values);
        $this->view->uploadroute="gallery/set_images/";
        $this->view->view_gallery_route ='gallery/view_gallery/';

        $this->check_all_permissions($this->session->get('userid'));

    }


    public function get_assets()
    {
        $this->assets
            ->collection('validatejs')
            ->addJs('js/jqueryvalidate/jquery.validate.js')
            ->addJs('js/jqueryvalidate/additional-methods.min.js')
            ->addJs('js/validate_gallery/validate_gallery.js');
        $this->assets
            ->collection('upload_file_css')
            ->addCss('metronic/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css')
            ->addCss('metronic/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css')
            ->addCss('metronic/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css');

        $this->assets
            ->collection('upload_file_javascripts')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js')
            ->addJs('metronic/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js')
            ->addJs('metronic/assets/admin/pages/scripts/form-fileupload.js');
    }


    /**
     * @Route("/new", methods={"GET"}, name="galleryenew")
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
     * @Route("/edit/{id}", methods={"GET"}, name="galleryedit")
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
     * @Route("/create", methods={"POST","GET"}, name="gallerycreate")
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
     * @Route("/save/{id}", methods={"POST"}, name="gallerysave")
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
     * @Route("/show/{id}", methods={"GET"}, name="galleryshow")
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
     * @Route("/delete/{id}", methods={"POST"}, name="gallerydelete")
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
     * @Route("/upload_images/{galleryid}", methods={"POST"}, name="gallery_upload_images")
     */
    public function upload_imagesAction ($galleryid)
    {
        $file_formats = $this->get_image_file_formats();
        $file_upload_params = $this->get_file_upload_params();
        error_reporting(E_ALL | E_STRICT);
        $upload_handler = new  UploadHandler(
        array('image_versions' => array()
        ,'accept_file_types' => $file_formats['accept_file_types']
        ,'max_file_size' => $file_upload_params['max_file_size']
        ,'min_file_size' => $file_upload_params['min_file_size']
        ,'max_number_of_files' => $file_upload_params['max_number_of_files']
        ,'all_file_formats'=>$file_formats
        ,'gallery_data' =>$this->get_gallery_data($galleryid)));
    }

    public function get_gallery_data($galleryid)
    {
        $gallery_data =array();
        $gallery = Gallery::findFirst($galleryid);


            $gallery_data['id'] =$gallery->id;
            $gallery_data['name'] =$gallery->name;
            $gallery_data['title'] =$gallery->title;
            $gallery_data['type'] =$gallery->type;
            $gallery_data['description'] =$gallery->description;



        return $gallery_data;

    }


    /**
     * @Route("/set_images/{galleryid}", methods={"GET"}, name="gallery_set_images")
     */
    public function view_upload_files_Action($galleryid)
    {
        $title_tags =array();
        $title_tags['main_title'] ='upload.images.title';
        $title_tags['add_files_title'] = 'upload.files.add_files_title';
        $title_tags['start_upload_title'] ='upload.files.start_upload_title';
        $title_tags['cancel_upload_title'] = 'upload.files.cancel_upload_title';
        $title_tags['start_button_title'] ='upload.start_button';
        $title_tags['cancel_button_title']='upload.cancel_button';
        $this->get_assets();
        $this->view->file_formats =$this->get_image_file_formats();
        $this->view->upload_params =$this->get_file_upload_params();
        $this->view->galleryid =$galleryid;
        $this->view->gallery_data =$this->get_gallery_data($galleryid);
        $this->view->title_tags = $title_tags;
        $this->view->pick('gallery/upload_images');
    }

    /**
     * @Route("/view_gallery/{galleryid}", methods={"GET"}, name="view_gallery")
     */
    public function view_galleryAction($galleryid)
    {
      $gallery_data =$this->get_gallery_data($galleryid);
      $gallery_images = $this->get_gallery_images($gallery_data['id']);
      $this->assets->collection('delete_modal_js')->addJs('js/validate_gallery/delete_image_modal.js');
      $this->view->gallery_images =$gallery_images;
      $this->view->title ='gallery.view.title';
      $this->view->noitems ='gallery.view.noitems';
      $this->view->gallery_dir =$dir;
      $this->view->gallery_data =$gallery_data;
      $this->view->pick('gallery/view_gallery');
    }

    public function get_gallery_images($galleryid)
    {

      $gallery_images= $this->modelsManager->createBuilder()
          ->columns(array('gi.imageid ','i.name','i.title','i.path'))
          ->from(array('gi' => 'GalleryImage'))
          ->join('Image', 'i.id = gi.imageid', 'i')
          ->join('Gallery', 'g.id = gi.galleryid', 'g')
          ->where('g.id ='.$galleryid)
          ->getQuery()
          ->execute()->toArray();
      return $gallery_images;
    }


    public function delete_gallery_image($galleryid,$file_id)
    {
      //Delete Gallery_image
      $this->modelsManager->executeQuery(
    "DELETE FROM GalleryImage WHERE galleryid =:galleryid: AND imageid=:imageid:",
    array(
        'galleryid' =>$galleryid,
        'imageid'   =>$file_id
    ));
    }

    public function delete_image($galleryid,$file_id)
    {
      //Delete Image
        $images = Image::findFirst($file_id);
        $file_name = $images->name;
        $images->delete();
        return $file_name;
    }

    public function delete_image_file($galleryid,$file_name)
    {
    //Delete File
       $gallery_data =$this->get_gallery_data($galleryid);
       $dir = $this->set_gallery_dir($gallery_data['name']);
       if (is_dir($dir)) {
           if ($dh = opendir($dir))
           {
              while (($file = readdir($dh)) !== false)
             {
              if ($file ==$file_name){unlink($dir.'/'.$file);break;}

              }
             closedir($dh);
           }
       }
    }
    /**
     * @Route("/delete/{galleryid}/{file_id}", methods={"POST"}, name="delete")
     */
    public function delete_image_Action($galleryid,$file_id)
    {

      $this->delete_gallery_image($galleryid,$file_id);
      $file_name =$this->delete_image($galleryid,$file_id);
      $this->delete_image_file($galleryid,$file_name);
    }

}
