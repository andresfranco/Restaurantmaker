<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;
use UploadHandlerController as  UploadHandler;
use Phalcon\Paginator\Adapter\NativeArray as PaginatorArray;
/**
 * @RoutePrefix("/file")
 */
class FileController extends ControllerBase
{
  public $file_params =array();
  public function onConstruct()
    {

        $this->file_params['upload_files_path']= $this->get_upload_files_path();
        $this->file_params['download_files_path'] =$this->url->getBaseUri().'files/';
        $this->file_params['thumbnail_path']= $this->get_thumbnail_path();
    }



public function get_assets()
{
  $this->assets
  ->collection('upload_file_css')
    ->addCss('tools/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css')
    ->addCss('tools/jquery-file-upload/css/jquery.fileupload.css')
    ->addCss('tools/jquery-file-upload/css/jquery.fileupload-ui.css');

   $this->assets
    ->collection('upload_file_javascripts')
      ->addJs('tools/jquery-file-upload/js/vendor/jquery.ui.widget.js')
      ->addJs('tools/jquery-file-upload/js/vendor/tmpl.min.js')
      ->addJs('tools/jquery-file-upload/js/vendor/load-image.min.js')
      ->addJs('tools/jquery-file-upload/js/vendor/canvas-to-blob.min.js')
      ->addJs('tools/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js')
      ->addJs('tools/jquery-file-upload/js/jquery.iframe-transport.js')
      ->addJs('tools/jquery-file-upload/js/jquery.fileupload.js')
      ->addJs('tools/jquery-file-upload/js/jquery.fileupload-process.js')
      ->addJs('tools/jquery-file-upload/js/jquery.fileupload-image.js')
      ->addJs('tools/jquery-file-upload/js/jquery.fileupload-audio.js')
      ->addJs('tools/jquery-file-upload/js/jquery.fileupload-video.js')
      ->addJs('tools/jquery-file-upload/js/jquery.fileupload-validate.js')
      ->addJs('tools/jquery-file-upload/js/jquery.fileupload-ui.js')
      ->addJs('tools/form-fileupload.js');


    }

    /**
    * @Route("/index", methods={"GET"}, name="index")
    */
    public function file_indexAction()
    {
      $title_tags =array();
      $title_tags['main_title'] ='index.files.title';
      $title_tags['images_title'] ='index.files.images_title';
      $title_tags['documents_title'] ='index.files.documents_title';
      $title_tags['videos_title'] ='index.files.videos_title';
      $title_tags['others_title'] ='index.files.others_title';
      $this->view->title_tags =$title_tags;
      $this->view->pick('files/files_index');
    }

    public function get_modal_assets()
    {
        $this->assets->collection('delete_modal_js')->addJs('js/validate_files/delete_file_modal.js');
    }

    /**
    * @Route("/set_files", methods={"GET"}, name="set_files")
    */
    public function view_upload_files_Action()
    {
     $title_tags =array();
     $title_tags['main_title'] ='upload.files.title';
     $title_tags['add_files_title'] = 'upload.files.add_files_title';
     $title_tags['start_upload_title'] ='upload.files.start_upload_title';
     $title_tags['cancel_upload_title'] = 'upload.files.cancel_upload_title';
     $title_tags['start_button_title'] ='upload.start_button';
     $title_tags['cancel_button_title']='upload.cancel_button';
     $this->get_assets();
     $this->view->file_formats =$this->get_file_formats();
     $this->view->upload_params =$this->get_file_upload_params();

     $this->view->title_tags = $title_tags;
     $this->view->pick('files/upload_files');
    }

    /**
    * @Route("/upload_files", methods={"GET","POST"}, name="upload_files")
    */
    public function upload_filesAction()
    {
      $file_formats = $this->get_file_formats();
      $file_upload_params = $this->get_file_upload_params();
      error_reporting(E_ALL | E_STRICT);
      $upload_handler = new  UploadHandler(
      array('image_versions' => array()
      ,'accept_file_types' => $file_formats['accept_file_types']
      ,'max_file_size' => $file_upload_params['max_file_size']
      ,'min_file_size' => $file_upload_params['min_file_size']
      ,'max_number_of_files' => $file_upload_params['max_number_of_files']
      ,'all_file_formats'=>$file_formats
      ,'gallery_data'=>array()));


    }

    /**
    * @Route("/uploadfiles", methods={"GET","POST"}, name="uploadfiles")
    */
    public function uploadviewAction()
    {
      $this->view->pick('files/fileupload');
    }

    /**
    * @Route("/upload", methods={"GET","POST"}, name="upload")
    */
    public function uploadAction()
    {

    if($this->request->hasFiles() == true)
    {
    $uploads = $this->request->getUploadedFiles();
    $isUploaded = false;
    #do a loop to handle each file individually
    foreach($uploads as $upload){
    #define a “unique” name and a path to where our file must go
    $path =  $this->file_params['upload_files_path'].md5(uniqid(rand(), true)).'-'.strtolower($upload->getname());
    #move the file and simultaneously check if everything was ok
   ($upload->moveTo($path)) ? $isUploaded = true : $isUploaded = false;
   }
    #if any file couldn’t be moved, then throw an message
   ($isUploaded) ? die('Files successfully uploaded') : die('Some error ocurred');
   }
   else{
   #if no files were sent, throw a message warning user
   die('You must choose at least one file to send. Please try again.');
    }

    }



    /**
    * @Route("/list/{file_type}", methods={"GET"}, name="list")
    */
    public function list_filesAction($file_type)
    {

      $file_names =array();
      $dir = $this->get_file_folder($file_type);

        if (is_dir($dir))
        {
         if ($dh = opendir($dir))
         {
           while (($file = readdir($dh)) !== false)
           {

                if( $file == '.' || $file == '..' || $file =='thumbnail' || is_dir($dir.$file)==true)continue;

                $file_data = $this->get_file_data($dir,$file);
                $file_names[]=$file_data;

           }
           closedir($dh);

         }
      }

    $this->set_grid_files('list',$file_type,$file_names);
   }


    /**
     * @Route("/search/{file_type}", methods={"GET","POST"}, name="search")
     */
    public function search_filesAction($file_type)
    {

        if ($this->request->isPost()) {

            $name =$this->request->getPost("name");
            $type =$this->request->getPost("type");
            $size =$this->request->getPost("size");

            $this->persistent->name=$name;
            $this->persistent->type=$type;
            $this->persistent->size=$size;

        } else {
            $name =$this->persistent->name;
            $type =$this->persistent->type;
            $size =$this->persistent->size;

        }
        if($this->request->getPost("name"))
        {
            $this->persistent->name =$this->request->getPost("name");
        }

        $this->tag->setDefault("name",$this->persistent->name);
        $this->tag->setDefault("type",$this->persistent->type);
        $this->tag->setDefault("size",$this->persistent->size);

        $file_names =array();
        $dir = $this->get_file_folder($file_type);
        if (is_dir($dir))
        {
            if ($dh = opendir($dir))
            {
               while (($file = readdir($dh)) !== false)
                {
                    if( $file == '.' || $file == '..' || $file =='thumbnail')continue;

                    $file_data = $this->get_file_data($dir,$file);
                     if (empty($name)==false or empty($type)==false or empty($size)==false)
                     {

                         if (empty($name)==false){$name_value = is_numeric(strpos($file, $name));}
                         else{$name_value = false;}

                         if (empty($type)==false){$type_value = is_numeric(strpos( $file_data['type'], $type));}
                         else{$type_value = false;}

                         if (empty($size)==false){$size_value = is_numeric(strpos(strval($this->get_file_size($file)), $size));}
                         else{$size_value = false;}

                        if ( $name_value == true or $type_value == true or $size_value == true ){$file_names[]=$file_data;}

                     } else{$file_names[]=$file_data;}

                }
                closedir($dh);
            }
        }
     $this->set_grid_files('search',$file_type,$file_names);
    }

     public function set_grid_files($mode,$file_type,$file_names)
     {
      $grid_params =array();
      $no_items ="";

      $numberPage =1;
      if ($this->request->isGet()) {
        $numberPage = $this->request->getQuery("page", "int");
      }
       //Set search columns
       $search_columns= array(
           array('name' => 'name','title' => 'File Name','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
           array('name' => 'type','title' => 'Type','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search'),
           array('name' => 'size','title' => 'Size','size'=>30,'div_class'=>"input-control full-size",'label_class'=>'search')
       );

       //Set grid Paginator
       $paginator = new PaginatorArray(array("data" => $file_names,"limit"=>10,"page" => $numberPage));

       if (count($file_names) == 0){$no_items ="files.list.no_data";}

       switch($mode)
       {
         case 'list':$listroute = 'file/list/'.$file_type;break;
         case 'search':$listroute = 'file/search/'.$file_type;break;
       }

       switch($file_type)
       {
         case 'image':$title = 'Images';break;
         case 'video':$title = 'Videos';break;
         case 'document':$title = 'Documents';break;
         case 'other':$title = 'Other Files';break;
       }

       $this->get_modal_assets();
       $this->view->noitems =$no_items;
       $this->view->searchroute = 'file/search/'.$file_type;
       $this->view->file_names = $file_names;
       $this->view->searchcolumns =$search_columns;
       $this->view->showroute ='file/show/';
       $this->view->title =$title;
       $this->view->listroute =$listroute;
       $this->view->page = $paginator->getPaginate();
       $this->view->download_path =$this->file_params['download_files_path'];
       $this->view->pick('files/filelist');

     }


    /**
     * @Route("/delete/{filename}", methods={"POST"}, name="delete")
     */
    public function delete_file_Action($file_name)
    {

        $dir = $this->get_path_by_extension($file_name);
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {

                while (($file = readdir($dh)) !== false) {
                  if ($file ==$file_name)
                  {
                      unlink($this->get_path_by_extension($file_name).$file);
                      break;
                  }

                }
                closedir($dh);
            }
        }
    }

    /**
     * @Route("/image_gallery", methods={"GET"}, name="image_gallery")
     */
    public function image_gallery_Action()
    {
      $this->view->title ="Imágenes";
      $this->view->pick('files/image_gallery');
    }
    public function get_file_size($file)
    {
        $size =round(filesize($this->file_params['upload_files_path'].$file)/1024/1024,3);
        return $size;
    }

}
