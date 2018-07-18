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
 
	<link href="<?= $this->url->getStatic('tools/bootstrap-summernote/summernote.css') ?>" rel="stylesheet" type="text/css" />

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
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="<?= $this->url->getStatic('/img/flags/' . $flag) ?>" alt=""><?= ' ' ?><?= $this->getDI()->get("translate")->_($languagename) ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
        <?php foreach ($languages as $item) { ?>
        <li>
        <a href="<?= $this->url->get('setlang') . '/' . $item->code ?>">
        <img src="<?= $this->url->getStatic('/img/flags/' . $item->flag) ?>" alt=""><?= ' ' ?><?= $this->getDI()->get("translate")->_($item->language) ?> </a>
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
  
<div class="row">
<div class="col-md-12">
<!-- BEGIN PORTLET-->
<div class="row row_container_form">
	<div class="row">
     <h3><?= $this->getDI()->get("translate")->_($title) ?></h3>
	</div>
	<hr></hr>
	<div class="row">
	<!-- BEGIN FORM-->
	<?= $this->tag->form([$routeform, 'method' => 'post', 'id' => 'appform', 'role' => 'form', 'class' => 'form-horizontal']) ?>
	<div class="form-body">
	<!-- FORM ERROR MESSAGES-->
	<?php $errorvar = $this->getContent(); ?>
	<?php if (!empty($errorvar)) { ?>
	<div class="alert alert-danger">
	<button data-close="alert" class="close"></button>
	<?= $this->getDI()->get("translate")->_($this->getContent()) ?>
	</div>
	<?php } ?>
		<!-- LOAD FORM CONTROLS-->
	<?php foreach ($formcolumns as $index => $item) { ?>
		<div class="form-group">
		<label name="<?= $item['name'] ?>" id ="item['name']" class="control-label col-md-1 align_label_left" style="padding-right:0;">
		<?= $this->getDI()->get("translate")->_($item['label']) ?>
		<?= $item['required'] ?>
                </label>
		<div class="col-md-4">
		<?= $form->render($item['name']) ?>
		<!-- LOAD CONTROL ERROR LABEL-->
    <?php if ($item['name'] == 'content') { ?>
     <label id="lblcontent" name ="lblcontent"></label>
    <?php } ?>
		<?= $this->getDI()->get("translate")->_($item['label_error']) ?>
		</div>
		</div>
	<?php } ?>

	</div>
	<!-- FORM ACTION BUTTONS-->
	<div class="col-md-offset-1 col-md-3" style="padding-left:0;">
       	<input type="submit" class="btn btn-primary" value="<?= $this->getDI()->get("translate")->_('Guardar') ?>"></input>
		<?= $this->tag->linkTo([$routelist, $this->getDI()->get("translate")->_($cancel_button_name), 'class' => 'btn btn-default']) ?>
       </div>
    <textarea id ="articlecontent" name= "articlecontent" style="visibility: hidden; height: 0;"></textarea>
	</form>
	<!-- END FORM-->
	</div>
</div>
<!-- END PORTLET-->
</div>
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
  
<script src="<?= $this->url->getStatic('tools/bootstrap-summernote/summernote.min.js') ?>"></script>
<?= $this->assets->outputJs('validate_forms_js') ?>
<?= $this->assets->outputJs('validatejs') ?>
<script>
var validatemessages = {
title:'<?= $this->getDI()->get("translate")->_('article.title.required') ?>',
author:'<?= $this->getDI()->get("translate")->_('article.author.required') ?>',
content:'<?= $this->getDI()->get("translate")->_('article.content.required') ?>'
};
</script>
<script type="text/javascript">
$(document).ready(function() {
 $('#articlecontent').val($('#summernote').code());	
$('#summernote').summernote({
	height: "250px",
	width:"600px",
  onChange:function() {
  $('#articlecontent').val($('#summernote').code());
  }

});
});
</script>

  <!-- End JavaScripts --> 
</body>
</html>