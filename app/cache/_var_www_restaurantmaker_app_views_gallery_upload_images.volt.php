<?= $globalobj->checkuser($this->session->get('userid')) ?>
<?php $actions = $globalobj->get_user_actions($this->session->get('userid')); ?>
<?php $languages = $globalobj->get_languages(); ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

    
<head>
  <!-- Stylesheets --> 
  <link rel="stylesheet" type="text/css" href="<?= $this->url->getStatic('/tools/bootstrap/css/bootstrap.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= $this->url->getStatic('/tools/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= $this->url->getStatic('/stylesheets/masterpage_standard/layout.css') ?>">
  <!-- End Stylesheets --> 
</head>
 
    <?= $this->assets->outputCss('upload_file_css') ?>
    <script>
    var file_param =new Array();
    file_param['acceptFileTypes'] =<?= $file_formats['accept_file_types'] ?> ;
    file_param['maxFileSize'] =<?= $upload_params['max_file_size'] ?>;
    file_param['minFileSize'] =<?= $upload_params['min_file_size'] ?>;
    file_param['maxNumberOfFiles'] =<?= $upload_params['max_number_of_files'] ?>;
    file_param['accept_file_error']='<?= $this->getDI()->get("translate")->_('validate.file.validformats') ?>';
    file_param['max_file_size_error']='<?= $this->getDI()->get("translate")->_('validate.file.maxsize') ?>';
    file_param['min_file_size_error']='<?= $this->getDI()->get("translate")->_('validate.file.minsize') ?>';
    file_param['max_number_files_error']='<?= $this->getDI()->get("translate")->_('validate.file.filesnumber') ?>';
    </script>

<body>
 <!-- Main Row Container --> 
<div class="row">
  <!-- Header Nav bar--> 
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= $this->url->get('index/home') ?>">
      <i class="fa fa-cutlery"></i><?= ' ' ?><?= $this->getDI()->get("translate")->_('RESTAURANT MAKER') ?>
      </a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        
           <?php $flag = 'es.png'; ?>
           <?php $languagename = 'Spanish'; ?>
           <?php foreach ($languages as $item) { ?>
             <?php if ($this->session->get('language') == $item->code) { ?>
                 <?php $flag = $item->flag; ?>
                 <?php $languagename = $item->language; ?>
             <?php } ?>
          <?php } ?>
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="<?= $this->url->getStatic('img/flags/' . $flag) ?>" alt=""><?= ' ' ?><?= $this->getDI()->get("translate")->_($languagename) ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
        <?php foreach ($languages as $item) { ?>
        <li>
        <a href="<?= $this->url->get('setlang') . '/' . $item->code ?>">
        <img src="<?= $this->url->getStatic('img/flags/' . $item->flag) ?>" alt=""><?= ' ' ?><?= $this->getDI()->get("translate")->_($item->language) ?> </a>
        </li>
        <?php } ?>
      </ul>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="<?= $this->url->getStatic('img/avatar.png') ?>" width="16px" height="16px"><?= ' ' ?><?= $this->session->get('username') ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
      <li> <a href="<?= $this->url->get('login/logout') ?>"><i class="fa fa-sign-out"></i><?= ' ' ?><?= $this->getDI()->get("translate")->_('logout.text') ?></a></li>
      </ul>
      </li>
      </ul>
      </div>
    </div>
  </nav>
<!--End Header Nav bar--> 

  <!-- Content menu and main content -->
  <div class="row"> 
    <!-- Accordion Menu -->
    
      
<?php $security = 'N'; ?>
<?php $address = 'N'; ?>
<?php $users = 'N'; ?>
<?php $action = 'N'; ?>
<?php $roles = 'N'; ?>
<?php $translation = 'N'; ?>
<?php $languages = 'N'; ?>
<?php $countries = 'N'; ?>
<?php $states = 'N'; ?>
<?php $cities = 'N'; ?>
<?php $townships = 'N'; ?>
<?php $neighborhoods = 'N'; ?>
<?php $media = 'N'; ?>
<?php $files = 'N'; ?>
<?php $restaurant = 'N'; ?>
<?php $system_parameter = 'N'; ?>
<?php $articles = 'N'; ?>
<?php $article_comments = 'N'; ?>
<?php $restaurant = 'N'; ?>
<?php $menu = 'N'; ?>
<?php $event = 'N'; ?>

<?php foreach ($actions as $item) { ?>

<?php if ($item->action == 'Manage Security') { ?>
 <?php $security = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Addresses') { ?>
 <?php $address = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Users') { ?>
 <?php $users = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Actions') { ?>
 <?php $action = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Roles') { ?>
 <?php $roles = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage System Parameter') { ?>
 <?php $system_parameter = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Translations') { ?>
 <?php $translation = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Languages') { ?>
 <?php $languages = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Countries') { ?>
 <?php $countries = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage States') { ?>
 <?php $states = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Cities') { ?>
 <?php $cities = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Townships') { ?>
 <?php $townships = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Neighborhoods') { ?>
 <?php $neighborhoods = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Addresses') { ?>
 <?php $addresses = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Media') { ?>
 <?php $media = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Files') { ?>
 <?php $files = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Articles') { ?>
    <?php $articles = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Article Comment') { ?>
    <?php $article_comments = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Restaurant') { ?>
    <?php $restaurant = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Menu') { ?>
    <?php $menu = 'Y'; ?>
<?php } ?>
<?php if ($item->action == 'Manage Event') { ?>
    <?php $event = 'Y'; ?>
<?php } ?>
<?php } ?>
<div class="col-sm-12 col-md-2 col-xs-12 col-lg-2 accordion_menu">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <?php foreach (['country', 'state', 'city', 'township', 'neighborhood', 'address'] as $key => $name) { ?>
      <?php if ($this->isIncluded($name, $this->router->getRewriteUri())) { ?>
         <?php $class_colapse = 'collapse in'; ?>
         <?php $active_class = 'panel-heading main_option_active'; ?> 
         <?php break; ?> 
      <?php } else { ?>
         <?php $class_colapse = 'collapse'; ?>
         <?php $active_class = 'panel-heading'; ?>
      <?php } ?>
      <?php } ?>
    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">  
      <div class="<?= $active_class ?>">
      <h4 class="panel-title"><span class="fa fa-home"></span><b><?= ' ' ?><?= $this->getDI()->get("translate")->_('Direcciones') ?></b></h4>
      </div>
    </a>
      <div id="collapseOne" class="panel-collapse <?= $class_colapse ?>">
        <ul class="list-group">
          <?php if ($countries == 'Y') { ?>
          <a href="<?= $this->url->get('country/list') ?>">
          <li class="list-group-item <?php if ($this->isIncluded('country', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Paises') ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($states == 'Y') { ?>
          <a href="<?= $this->url->get('state/list') ?>">
          <li class="list-group-item <?php if ($this->isIncluded('state', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Estados') ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($cities == 'Y') { ?>
          <a href="<?= $this->url->get('city/list') ?>">
          <li class="list-group-item <?php if ($this->isIncluded('city', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Ciudades') ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($townships == 'Y') { ?>
          <a href="<?= $this->url->get('township/list') ?>">
          <li class="list-group-item <?php if ($this->isIncluded('township', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Sectores') ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($neighborhoods == 'Y') { ?>
          <a href="<?= $this->url->get('neighborhood/list') ?>">
          <li class="list-group-item <?php if ($this->isIncluded('neighborhood', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Barrios') ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($addresses == 'Y') { ?>
          <a href="<?= $this->url->get('address/list') ?>">
          <li class="list-group-item <?php if ($this->isIncluded('address', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Direcciones') ?>
          </li>
          </a>
          <?php } ?>
        </ul>
      </div>
    </div>
     <?php if ($security == 'Y') { ?>
     <div class="panel panel-default">
      <?php foreach (['user', 'role', 'action'] as $key => $name) { ?>
      <?php if ($this->isIncluded($name, $this->router->getRewriteUri())) { ?>
         <?php $class_colapse = 'collapse in'; ?>
         <?php $active_class = 'panel-heading main_option_active'; ?> 
         <?php break; ?> 
      <?php } else { ?>
         <?php $class_colapse = 'collapse'; ?>
         <?php $active_class = 'panel-heading'; ?>
      <?php } ?>
      <?php } ?>
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">  
      <div class="<?= $active_class ?>">
      <h4 class="panel-title"><span class="fa fa-lock"></span><b><?= ' ' ?><?= $this->getDI()->get("translate")->_('Seguridad') ?></b></h4>
      </div>
    </a>
      <div id="collapse2" class="panel-collapse <?= $class_colapse ?>">
        <ul class="list-group">
          <?php if ($users == 'Y') { ?>
          <a href="<?= $this->url->get('user/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('user', $this->router->getRewriteUri())) || ($this->isIncluded('/userrole', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-user"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Usuarios') ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($roles == 'Y') { ?>
          <a href="<?= $this->url->get('role/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('/role', $this->router->getRewriteUri())) || ($this->isIncluded('/actionrole/list', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-user-plus"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Roles') ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($action == 'Y') { ?>
          <a href="<?= $this->url->get('action/list') ?>">
          <li class="list-group-item <?php if ($this->isIncluded('/action/list', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-check-circle-o"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Acciones') ?>
          </li>
          </a>
          <?php } ?>
        </ul>
      </div>
    </div>
    <?php } ?>

    <?php if ($translation == 'Y') { ?>
     <div class="panel panel-default">
      <?php foreach (['language', '/translation'] as $key => $name) { ?>
      <?php if ($this->isIncluded($name, $this->router->getRewriteUri())) { ?>
         <?php $class_colapse = 'collapse in'; ?>
         <?php $active_class = 'panel-heading main_option_active'; ?> 
         <?php break; ?> 
      <?php } else { ?>
         <?php $class_colapse = 'collapse'; ?>
         <?php $active_class = 'panel-heading'; ?>
      <?php } ?>
      <?php } ?>
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">  
      <div class="<?= $active_class ?>">
      <h4 class="panel-title"><span class="fa fa-exchange"></span><b><?= ' ' ?><?= $this->getDI()->get("translate")->_('Traducciones') ?></b></h4>
      </div>
    </a>
      <div id="collapse3" class="panel-collapse <?= $class_colapse ?>">
        <ul class="list-group">
          <?php if ($languages == 'Y') { ?>
          <a href="<?= $this->url->get('language/list') ?>">
          <li class="list-group-item <?php if ($this->isIncluded('language', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-language"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Idiomas') ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($translation == 'Y') { ?>
          <a href="<?= $this->url->get('translation/list') ?>">
          <li class="list-group-item <?php if ($this->isIncluded('translation', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-exchange"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Traducciones') ?>
          </li>
          </a>
          <?php } ?>
        </ul>
      </div>
    </div>
    <?php } ?>

    <?php if ($media == 'Y') { ?>
     <div class="panel panel-default">
      <?php foreach (['media', 'file/set_files', 'files/', '/gallery'] as $key => $name) { ?>
      <?php if ($this->isIncluded($name, $this->router->getRewriteUri())) { ?>
         <?php $class_colapse = 'collapse in'; ?>
         <?php $active_class = 'panel-heading main_option_active'; ?> 
         <?php break; ?> 
      <?php } else { ?>
         <?php $class_colapse = 'collapse'; ?>
         <?php $active_class = 'panel-heading'; ?>
      <?php } ?>
      <?php } ?>
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">  
      <div class="<?= $active_class ?>">
      <h4 class="panel-title"><span class="fa fa-file-image-o"></span><b><?= ' ' ?><?= $this->getDI()->get("translate")->_('Manage Media') ?></b></h4>
      </div>
    </a>
      <div id="collapse4" class="panel-collapse <?= $class_colapse ?>">
        <ul class="list-group">
          <?php if ($files == 'Y') { ?>
          <a href="<?= $this->url->get('file/set_files') ?>">
          <li class="list-group-item <?php if ($this->isIncluded('file/set_files', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-cloud-upload"></span><?= ' ' ?> <?= $this->getDI()->get("translate")->_('Upload Files') ?>
          </li>
          </a>
          <a href="<?= $this->url->get('files/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('files/', $this->router->getRewriteUri())) || ($this->isIncluded('file/list', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-file-archive-o"></span><?= ' ' ?> <?= $this->getDI()->get("translate")->_('Manage Files') ?>
          </li>
          </a>
          <a href="<?= $this->url->get('gallery/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('gallery', $this->router->getRewriteUri())) || ($this->isIncluded('file/list', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-picture-o"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Manage Galleries') ?>
          </li>
          </a>
          <?php } ?>
        </ul>
      </div>
    </div>
    <?php } ?>

    <?php if ($system_parameter == 'Y') { ?>
      <div class="panel panel-default">
      <?php foreach (['systemparameter', 'fileformat'] as $key => $name) { ?>
      <?php if ($this->isIncluded($name, $this->router->getRewriteUri())) { ?>
         <?php $class_colapse = 'collapse in'; ?>
         <?php $active_class = 'panel-heading main_option_active'; ?> 
         <?php break; ?> 
      <?php } else { ?>
         <?php $class_colapse = 'collapse'; ?>
         <?php $active_class = 'panel-heading'; ?>
      <?php } ?>
      <?php } ?>
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"> 
      <div class="<?= $active_class ?>">
      <h4 class="panel-title"><span class="fa fa-gear"></span><b><?= ' ' ?><?= $this->getDI()->get("translate")->_('Parámetros del Sistema') ?></b></h4>
      </div>
    </a>
      <div id="collapse5" class="panel-collapse <?= $class_colapse ?>">
        <ul class="list-group">
          <?php if ($system_parameter == 'Y') { ?>
          <a href="<?= $this->url->get('systemparameter/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('systemparameter', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-gear"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Parámetros Generales') ?>
          </li>
          </a>
          <a href="<?= $this->url->get('fileformat/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('fileformat', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-picture-o"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Formatos de Archivos') ?>
          </li>
          </a>
          <?php } ?>
        </ul> 
      </div>
    </div>
    <?php } ?>
    
    <?php if ($articles == 'Y') { ?>
      <div class="panel panel-default">
      <?php foreach (['/article', '/article_translation', 'article_comment'] as $key => $name) { ?>
      <?php if ($this->isIncluded($name, $this->router->getRewriteUri())) { ?>
         <?php $class_colapse = 'collapse in'; ?>
         <?php $active_class = 'panel-heading main_option_active'; ?> 
         <?php break; ?> 
      <?php } else { ?>
         <?php $class_colapse = 'collapse'; ?>
         <?php $active_class = 'panel-heading'; ?>
      <?php } ?>
      <?php } ?>
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"> 
      <div class="<?= $active_class ?>">
      <h4 class="panel-title"><span class="fa fa-book"></span><b><?= ' ' ?><?= $this->getDI()->get("translate")->_('Artículos') ?></b></h4>
      </div>
    </a>
      <div id="collapse6" class="panel-collapse <?= $class_colapse ?>">
        <ul class="list-group">
          <?php if ($articles == 'Y') { ?>
          <a href="<?= $this->url->get('article/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('/article/', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-book"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Artículos') ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($article_comments == 'Y') { ?>
          <a href="<?= $this->url->get('article_comment/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('/article_comment', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-comment-o"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Comentarios') ?>
          </li>
          </a>
          <?php } ?>
        </ul> 
      </div>
    </div>
    <?php } ?>

    <?php if ($restaurant == 'Y') { ?>
      <div class="panel panel-default">
      <?php foreach (['restaurant', 'menu', 'dish', 'dish_translation', 'dish_category'] as $key => $name) { ?>
      <?php if ($this->isIncluded($name, $this->router->getRewriteUri())) { ?>
         <?php $class_colapse = 'collapse in'; ?>
         <?php $active_class = 'panel-heading main_option_active'; ?> 
         <?php break; ?> 
      <?php } else { ?>
         <?php $class_colapse = 'collapse'; ?>
         <?php $active_class = 'panel-heading'; ?>
      <?php } ?>
      <?php } ?>
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7"> 
      <div class="<?= $active_class ?>">
      <h4 class="panel-title"><span class="fa fa-cutlery"></span><b><?= ' ' ?><?= $this->getDI()->get("translate")->_('Restaurants') ?></b></h4>
      </div>
    </a>
      <div id="collapse7" class="panel-collapse <?= $class_colapse ?>">
        <ul class="list-group">
          <a href="<?= $this->url->get('restaurant/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('restaurant', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-cutlery"></span><?= ' ' ?><?= ' ' ?><?= $this->getDI()->get("translate")->_('Restaurants') ?>
          </li>
          </a>
          <?php if ($menu == 'Y') { ?>
          <a href="<?= $this->url->get('menu/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('menu', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-list-alt"></span><?= ' ' ?><?= ' ' ?><?= $this->getDI()->get("translate")->_('Menu') ?>
          </li>
          </a>
          <a href="<?= $this->url->get('dish_category/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('dish_category', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-bookmark-o"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Category') ?>
          </li>
          </a>
          <?php } ?>
        </ul> 
      </div>
    </div>
    <?php } ?>

     <?php if ($event == 'Y') { ?>
      <div class="panel panel-default">
      <?php foreach (['event', 'eventgallery'] as $key => $name) { ?>
      <?php if ($this->isIncluded($name, $this->router->getRewriteUri())) { ?>
         <?php $class_colapse = 'collapse in'; ?>
         <?php $active_class = 'panel-heading main_option_active'; ?> 
         <?php break; ?> 
      <?php } else { ?>
         <?php $class_colapse = 'collapse'; ?>
         <?php $active_class = 'panel-heading'; ?>
      <?php } ?>
      <?php } ?>
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8"> 
      <div class="<?= $active_class ?>">
      <h4 class="panel-title"><span class="fa fa-calendar"></span><b><?= ' ' ?><?= $this->getDI()->get("translate")->_('Events') ?></b></h4>
      </div>
    </a>
      <div id="collapse8" class="panel-collapse <?= $class_colapse ?>">
        <ul class="list-group">
         
          <a href="<?= $this->url->get('event/list') ?>">
          <li class="list-group-item <?php if (($this->isIncluded('event', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-calendar"></span><?= ' ' ?><?= $this->getDI()->get("translate")->_('Events') ?>
          </li>
          </a>
        </ul> 
      </div>
    </div>
    <?php } ?>

  </div>
</div>
     
    
    
    <!-- End Accordion Menu --> 
  <!-- Main Content--> 
  <div class="col-sm-12 col-md-10 col-xs-12 col-lg-10 column_content">
  <div class="main_content">
  


    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->

    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    Widget settings form goes here
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn blue">Save changes</button>
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- END STYLE CUSTOMIZER -->
    
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" align ="left">
                <?= $this->getDI()->get("translate")->_($title_tags['main_title']) ?><?= ' (' . $gallery_data['title'] . ')' ?>
            </h3>
            <div align="right"><a href ="<?= $this->url->get('gallery/list') ?>" class="btn btn blue"><?= $this->getDI()->get("translate")->_('Galleries') ?> <i class="fa fa-arrow-right "></i> </a></div>
            <hr/>
            <form id="fileupload" action="<?= $this->url->get('gallery/upload_images/' . $galleryid) ?>" method="POST" enctype="multipart/form-data">
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                    <div class="col-lg-10">
                        <!-- The fileinput-button span is used to style the file input field as button -->
								<span class="btn btn-primary fileinput-button">
								<i class="fa fa-plus"></i>
								<span>
								<?= $this->getDI()->get("translate")->_($title_tags['add_files_title']) ?><?= '...' ?> </span>
								<input type="file" name="files[]" multiple="">
								</span>
                        <button type="submit" class="btn btn-success start">
                            <i class="fa fa-upload"></i>
								<span>
								<?= $this->getDI()->get("translate")->_($title_tags['start_upload_title']) ?></span>
                        </button>
                        <button type="reset" class="btn btn-default cancel">
                            <i class="fa fa-ban-circle"></i>
								<span>
								<?= $this->getDI()->get("translate")->_($title_tags['cancel_upload_title']) ?> </span>
                        </button>

                        <!-- The global file processing state -->
								<span class="fileupload-process">
								</span>
                    </div>
                    <!-- The global progress information -->
                    <div class="col-lg-5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width:0%;">
                            </div>
                        </div>
                        <!-- The extended global progress information -->
                        <div class="progress-extended">
                            &nbsp;
                        </div>
                    </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped clearfix">
                    <tbody class="files">
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
        <div class="slides">
        </div>
        <h3 class="title"></h3>
        <a class="prev">
            ‹ </a>
        <a class="next">
            › </a>
        <a class="close white">
        </a>
        <a class="play-pause">
        </a>
        <ol class="indicator">
        </ol>
    </div>


  </div>
  </div>
  <!-- End Main Content-->   
  </div>
   <!-- End Content menu and main content -->
</div>
 <!-- End Main Row Container -->
 <!-- Footet-->  
<footer class="footer">
     <p align="center" style="padding-top:25px;"><?= '2016 &copy; Restaurant Maker' ?></p>   
</footer>
<!-- End footer--> 

<!-- javaScripts --> 
  
     
  <script src="<?= $this->url->getStatic('tools/jquery/jquery2.2.0/jquery.min.js') ?>"></script>
  <script src="<?= $this->url->getStatic('tools/bootstrap/js/bootstrap.min.js') ?>"></script> 
  
    <?= $this->assets->outputJs('upload_file_javascripts') ?>
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <script id="template-upload" type="text/x-tmpl">
<?= '{%' ?> for (var i=0, file; file=o.files[i]; i++) { <?= '%}' ?>
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name"><?= '{%=file.name%}' ?></p>
            <strong class="error text-danger label label-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
            </div>
        </td>
        <td>
            <?= '{%' ?> if (!i && !o.options.autoUpload) { <?= '%}' ?>
                <button class="btn btn-success start" disabled>
                    <i class="fa fa-upload"></i>
                    <span><?= $this->getDI()->get("translate")->_($title_tags['start_button_title']) ?></span>
                </button>
            <?= '{%' ?> } <?= '%}' ?>
            <?= '{%' ?>if (!i) { <?= '%}' ?>
                <button class="btn btn-danger cancel">
                    <i class="fa fa-ban"></i>
                    <span><?= $this->getDI()->get("translate")->_($title_tags['cancel_button_title']) ?></span>
                </button>
          <?= '{%' ?> } <?= '%}' ?>
        </td>
    </tr>
<?= '{%' ?> } <?= '%}' ?>
</script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
      <?= '{%' ?> for (var i=0, file; file=o.files[i]; i++) { <?= '%}' ?>

        <?= '{%' ?> } <?= '%}' ?>
    </script>
    <script>
        jQuery(document).ready(function() {
            FormFileUpload.init();
        });


    </script>

  <!-- End JavaScripts --> 
</body>
</html>