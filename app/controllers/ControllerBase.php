<?php
use Phalcon\Mvc\Controller;
use Phalcon\Translate\Adapter\NativeArray;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Mvc\Model\Query;

defined('APP_PATH') || define('APP_PATH', realpath('..'));
define('SEP', DIRECTORY_SEPARATOR);
class ControllerBase extends Controller
{


public function initialize()
{

  // Login Assests
 /* $this->assets
        ->collection('mastercss')
        ->addCss('metro/build/css/metro.min.css')
        ->addCss('metro/build/css/metro-responsive.min.css')
        ->addCss('metro/build/css/metro-icons.min.css')
        ->addCss('css/masterpage/masterpage.css')
        ->addCss('css/masterpage/search.css');

  $this->assets
    ->collection('masterjs')
   ->addJs('js/jquery/jquery-2.1.4.min.js')
   ->addJs('metro/build/js/metro.min.js');

*/
  // Login Assests
  $this->assets
        ->collection('logincss')
        ->addCss('metro/build/css/metro.min.css')
        ->addCss('metro/build/css/metro-responsive.min.css')
        ->addCss('css/login/login.css');

  $this->assets
    ->collection('loginjs')
   ->addJs('js/jquery/jquery-2.1.4.min.js')
   ->addJs('metro/build/js/metro.min.js')
   ->addJs('js/jqueryvalidate/jquery.validate.js')
   ->addJs('js/login/validatelogin.js');

   $this->assets->collection('metronicjs')
  ->addJs('metronic/assets/global/plugins/jquery.min.js')
  ->addJs('metronic/assets/global/plugins/jquery-migrate.min.js')
  ->addJs('metronic/assets/global/plugins/jquery-ui/jquery-ui.min.js')
  ->addJs('metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js')
  ->addJs('metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')
  ->addJs('metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')
  ->addJs('metronic/assets/global/plugins/jquery.blockui.min.js')
  ->addJs('metronic/assets/global/plugins/jquery.cokie.min.js')
  ->addJs('metronic/assets/global/plugins/uniform/jquery.uniform.min.js')
  ->addJs('metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')
  ->addJs('metronic/assets/global/scripts/metronic.js')
  ->addJs('metronic/assets/admin/layout/scripts/layout.js')
  ->addJs('metronic/assets/admin/layout/scripts/quick-sidebar.js')
  ->addJs('metronic/assets/admin/layout/scripts/demo.js');



  $this->assets->collection('metroniccss')
 ->addCss('metronic/assets/admin/layout/css/googleapifonts.css')
 ->addCss('metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css')
 ->addCss('metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')
 ->addCss('metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css')
 ->addCss('metronic/assets/global/plugins/uniform/css/uniform.default.css')
 ->addCss('metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')
 ->addCss('metronic/assets/global/css/components.css')
 ->addCss('metronic/assets/global/css/plugins.css')
 ->addCss('metronic/assets/admin/layout/css/layout.css')
 ->addCss('metronic/assets/admin/layout/css/themes/darkblue.css')
 ->addCss('metronic/assets/admin/layout/css/custom.css');

  $this->assets->collection('validate_forms_js')
  ->addJs('metronic/assets/global/plugins/select2/select2.min.js')
  ->addJs('metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')
  ->addJs('metronic/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')
  ->addJs('metronic/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')
  ->addJs('metronic/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js')
  ->addJs('metronic/assets/global/plugins/bootstrap-markdown/lib/markdown.js');

   $this->view->globalobj =$this;


}
public function checkuser($userid)
{
  if ($userid =="")
  {
    $this->response->redirect('login');
  }

}

// FIle upload functions--------------------------------------------------
public function get_upload_files_path()
{

  $real_path = realpath('..');
  $path =  $real_path.SEP.'public'.SEP.'files'.SEP;
  return $path;
}


public function get_thumbnail_path()
{

    $real_path = realpath('..');
    $thumbnail_path =  $real_path.SEP.'public'.SEP.'files'.SEP.'thumbnail'.SEP;
    return $thumbnail_path;
}

public function get_file_extension($file_name)
{
  $userfile_extn = substr($file_name, strrpos($file_name, '.')+1);
  return $userfile_extn;
}


public function get_file_data($file_path,$file_name)
{
    $file_data =array();

    $file_data['name'] = $file_name;
    $file_data['path'] =$file_path.$file_name;
    $file_data['extension'] = pathinfo($file_name, PATHINFO_EXTENSION);

    $file_info = finfo_open(FILEINFO_MIME_TYPE);
    $file_type = finfo_file($file_info,$file_path.$file_name);


    $file_data['type'] =$file_type;

    //size in MB
    $file_data['size'] =round(filesize($file_path.$file_name)/1024/1024,3);
    return($file_data);

}

public function get_folder_by_extension($file_name,$file_extensions)
{

  $file_ext = $this->get_file_extension($file_name);
  $images_type =$file_extensions['image_ext'];
  $documents_type =$file_extensions['document_ext'];
  $videos_type =$file_extensions['video_ext'];
  $other_type =$file_extensions['other_ext'];
  $file_path ="";


  if(in_array($file_ext,$images_type) ) {$file_path = $this->get_upload_files_path().'images'.SEP;}

  if(in_array($file_ext,$videos_type) ) {$file_path = $this->get_upload_files_path().'videos'.SEP;}

  if(in_array($file_ext,$documents_type) ) {$file_path = $this->get_upload_files_path().'documents'.SEP;}
  if(in_array($file_ext,$other_type)) {$file_path = $this->get_upload_files_path().'other'.SEP;}

  return $file_path;

}

public function get_path_by_extension($file_name)
{
  $file_extensions=$this->get_file_formats();
  $path = $this->get_folder_by_extension($file_name,$file_extensions);
  return $path;
}

public function get_system_param($code)
{
   $system_parameters = SystemParameter::find(
       array("conditions" => "code =:code:","bind"  =>  array("code"=>$code)))->toArray();
   return $system_parameters;
}

public function get_file_upload_params()
{
   $params = $this->get_system_param('file_upload');
   $file_upload_params =array();
   foreach ( $params as  $param)
   {
       Switch ($param['parameter'])
       {
         case 'max_file_size' :
             $file_upload_params['max_file_size']=$param['textvalue'];
         break;
       case 'min_file_size' :
           $file_upload_params['min_file_size']=$param['textvalue'];
           break;
       case 'max_number_of_files' :
           $file_upload_params['max_number_of_files']=$param['textvalue'];
           break;

       }

   }
   return $file_upload_params;
}

public function get_file_formats()
{
  $file_formats = FileFormat::find(array("conditions"=>  "accept ='T'"))->toArray();

  $image_ext =array();
  $video_ext =array();
  $document_ext =array();
  $other_ext =array();
  foreach ( $file_formats as  $file)
  {
     switch ($file['type'])
     {
       case 'image':
       array_push($image_ext,$file['extension']);
       break;
       case 'video':
       array_push($video_ext,$file['extension']);
       break;
       case 'document':
       array_push($document_ext,$file['extension']);
       break;
       case 'other':
       array_push($other_ext,$file['extension']);
       break;
     }

  }

  $file_extensions =array('image_ext' =>$image_ext
  ,'document_ext'=>$document_ext
  ,'video_ext'=>$video_ext
  ,'other_ext'=>$other_ext
  ,'accept_file_types'=> $this->get_accept_file_types($file_formats)
  );

  return $file_extensions;
}

public function get_image_file_formats()
{
    $file_formats = FileFormat::find(array("conditions"=>  "accept ='T' AND type='image' "))->toArray();
    $image_ext =array();
    foreach ( $file_formats as  $file)
    {
        array_push($image_ext,$file['extension']);
    }

    $file_extensions =array('image_ext' =>$image_ext
    ,'accept_file_types'=> $this->get_accept_file_types($file_formats)
    );

    return $file_extensions;

}

public function get_accept_file_types($file_formats)

{
   $reg_exp ='/\.(';
  foreach ( $file_formats as  $file)
  {
    $reg_exp .= $file['extension'].'|';
  }
  $reg_exp  =$reg_exp.')$/i';
  return $reg_exp;
}

public function get_file_folder($file_type)

{
  switch ($file_type)
  {
    case 'image':
     $file_dir = $this->file_params['upload_files_path'].'images'.SEP;
    break;
    case 'video':
     $file_dir = $this->file_params['upload_files_path'].'videos'.SEP;
    break;
    case 'document':
     $file_dir = $this->file_params['upload_files_path'].'documents'.SEP;
    break;
    case 'other':
     $file_dir = $this->file_params['upload_files_path'].'other'.SEP;
    break;
  }
  return $file_dir;

}

////-------------------------end file upload-----------------------------------------

//------------------------Galleries----------------------------------------
    public function Delete_folder_content($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        rmdir($dir);
    }
    public function set_gallery_dir($name)
    {

        $dir = $this->get_upload_files_path()."galleries".SEP.$name."_gallery";
        return $dir;
    }

//---------------------------End Galleries-----------------------------------

    protected function getTranslation()
  {


      $language =$this->dispatcher->getParam('language');
    // Ask browser what is the best language
    //$language = $this->request->getBestLanguage();

    // Check if we have a translation file for that lang
    if (file_exists(APP_PATH ."/app/messages/" . $language . ".php")) {
       require APP_PATH ."/app/messages/" . $language . ".php";
    } else {
       // fallback to some default
       require APP_PATH ."/app/messages/en.php";
    }

    // Return a translation object
    return new NativeArray(array(
       "content" => $messages
    ));
  }

  public function Set_language($urlpath)
  {
    $this->view->trans = $this->getTranslation();
    $this->view->currenturl = $this->url->get($urlpath);
  }

 public function get_languages()
 {
   $entity = Language::find();
   return $entity;
 }
//USER DATA FUNCTIONS -----------------------------------------------------------------------------------------------------------------
 public function get_user_actions($userid)
 {
   $entity = $this->modelsManager->executeQuery("select a.action as action ,r.role as role  from ActionRole  ar
   inner join Action a on (ar.actionid =a.id) inner join Role r on (r.id =ar.roleid) Where ar.roleid in (
   select distinct ur.roleid as roleid from UserRole ur where ur.userid =:userid:)",array('userid'=>$userid));

   return $entity;
 }

public function check_user_actions($userid,$create_action_name,$edit_action_name,$view_action_name,$delete_action_name)
{
  $permission =array();
  $permission['create'] ='N';
  $permission['edit']  ='N';
  $permission['view'] ='N';
  $permission['delete']='N';
  $actions = $this->get_user_actions($userid);
  foreach ($actions as $item)
  {
   if ($item->action == $create_action_name)
   {
    $permission['create'] ='Y';
   }
   if ($item->action == $edit_action_name)
   {
   $permission['edit'] ='Y';
   }
   if ($item->action == $view_action_name)
   {
   $permission['view'] ='Y';
   }
  if ($item->action == $delete_action_name)
  {
   $permission['delete'] ='Y';
  }
 }
 return $permission;
 }




//END USER DATA FUNCTIONS -------------------------------------------------------------------------------------------------------------

// CRUD FUNCTIONS ---------------------------------------------------------------------------------------------------------------------


public function get_search_params($search_values)
{
  $searchparams=array();
  foreach ($search_values as $key => $val)
  {
  $searchparams[$val['name']] =$val['value'];
  }
  return $searchparams;
}

public function set_search_grid_post_values($search_values)
{
  $searchparams=$this->get_search_params($search_values);
  if ($this->request->isPost())
  {
    $this->persistent->params =$searchparams;
    $this->persistent->searchvalues =$search_values;
  }
  else
  {
    $searchparams=$this->persistent->params;
    $search_values =$this->persistent->searchvalues;
    $numberPage = $this->request->getQuery("page", "int");
  }

  $this->bind_search_values($search_values);
  return $searchparams;
}

public function bind_search_values($search_values)
{
  foreach ($search_values as $key => $val)
  {
    $this->tag->setDefault($val['name'],$val['value'] );
  }
}


  public function set_grid_values($entity,$grid_values)
  {
    $numberPage=$grid_values['numberPage'];
    if ($this->request->isPost()) {

    } else {
        $numberPage = $this->request->getQuery("page", "int");
    }

    if (count($entity) == 0)
    {
     $no_items =$grid_values['noitems_message'];

    }
    else {
      $no_items ="";
    }
    $paginator = new Paginator(array(
         "data" => $entity,
         "limit"=> $grid_values['pagelimit'],
         "page" => $numberPage
     ));
    $this->view->title         = $grid_values['title'];
    $this->view->noitems       = $no_items;
    $this->view->newroute      = $grid_values['new_route'];
    $this->view->editroute     = $grid_values['edit_route'];
    $this->view->showroute     = $grid_values['show_route'];
    $this->view->searchroute   = $grid_values['search_route'];
    $this->view->listroute     = $grid_values['route_list'];
    $this->view->headercolumns = $grid_values['header_columns'];
    $this->view->searchcolumns = $grid_values['search_columns'];
    $this->view->page          = $paginator->getPaginate();
    $this->view->pick($grid_values['view_name']);
  }



  public function set_grid_order()
  {
    if($this->request->getQuery("order"))
    {
       $this->persistent->order =$this->request->getQuery("order");
    }
       $order =$this->persistent->order;
       $ordertype = trim(substr($order,-4));
       $this->view->order = $ordertype ;

       return $order;
  }

  public function set_entity($id,$entityname,$errormessage,$controller,$action,$mode)
  {
        if ($mode =='create')
        {
          $entity = new $entityname();
        }
        else
        {

         $entity = $entityname::findFirstByid($id);
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

 public function execute_entity_action($entity,$controller,$action,$params,$redirect_route,$mode)
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
            "params"=>$params
        ));
  }
  $this->response->redirect(array('for' => $redirect_route));
 }

 public function set_form_routes($routeform,$routelist,$title
 ,$view_name,$mode,$entity,$form_name,$form_columns
 ,$save_button_name,$cancel_button_name,$delete_button_name)
 {
   $this->view->form = new $form_name($entity,array());
   $this->view->routelist =$routelist;
   $this->view->routeform =$routeform;
   $this->view->title =$title;
   $this->view->formcolumns =$form_columns;
   $this->view->save_button_name =$save_button_name;
   $this->view->cancel_button_name =$cancel_button_name;
   $this->view->delete_button_name =$delete_button_name;
   $this->view->pick($view_name);
 }

 //-------Set Audit Fields-----------------
   public function audit_fields($entity,$mode)
   {

     if ($mode =='create')
     {
      $entity->setCreateuser($this->session->get('username'));
      $entity->setCreatedate(date('Y-m-d H:i:s'));
      $entity->setModifyuser($this->session->get('username'));
      $entity->setModifydate(date('Y-m-d H:i:s'));
     }
     else {
       $entity->setModifyuser($this->session->get('username'));
       $entity->setModifydate(date('Y-m-d H:i:s'));
     }


   }


  //--------------------------------------------------------------------------END CRUD FUNCTIONS ------------------------


}
