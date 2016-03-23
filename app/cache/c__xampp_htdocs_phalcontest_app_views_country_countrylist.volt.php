<?php echo $globalobj->checkuser($this->session->get('userid')); ?>
<?php $actions = $globalobj->get_user_actions($this->session->get('userid')); ?>
<?php $languages = $globalobj->get_languages(); ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
  <!-- Stylesheets --> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('/tools/bootstrap/css/bootstrap.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('/tools/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('/stylesheets/masterpage_standard/layout.css'); ?>">
  <!-- End Stylesheets --> 
</head>
 
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
      <a class="navbar-brand" href="<?php echo $this->url->get('index/home'); ?>">
      <i class="fa fa-cutlery"></i><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('RESTAURANT MAKER'); ?>
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
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="<?php echo $this->url->getStatic('img/flags/' . $flag); ?>" alt=""><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_($languagename); ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
        <?php foreach ($languages as $item) { ?>
        <li>
        <a href="<?php echo $this->url->get('setlang') . '/' . $item->code; ?>">
        <img src="<?php echo $this->url->getStatic('img/flags/' . $item->flag); ?>" alt=""><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_($item->language); ?> </a>
        </li>
        <?php } ?>
      </ul>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="<?php echo $this->url->getStatic('img/avatar.png'); ?>" width="16px" height="16px"><?php echo ' '; ?><?php echo $this->session->get('username'); ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
      <li> <a href="<?php echo $this->url->get('login/logout'); ?>"><i class="fa fa-sign-out"></i><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('logout.text'); ?></a></li>
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
      <?php foreach (array('country', 'state', 'city', 'township', 'neighborhood', 'address') as $key => $name) { ?>
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
      <div class="<?php echo $active_class; ?>">
      <h4 class="panel-title"><span class="fa fa-home"></span><b><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Direcciones'); ?></b></h4>
      </div>
    </a>
      <div id="collapseOne" class="panel-collapse <?php echo $class_colapse; ?>">
        <ul class="list-group">
          <?php if ($countries == 'Y') { ?>
          <a href="<?php echo $this->url->get('country/list'); ?>">
          <li class="list-group-item <?php if ($this->isIncluded('country', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Paises'); ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($states == 'Y') { ?>
          <a href="<?php echo $this->url->get('state/list'); ?>">
          <li class="list-group-item <?php if ($this->isIncluded('state', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Estados'); ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($cities == 'Y') { ?>
          <a href="<?php echo $this->url->get('city/list'); ?>">
          <li class="list-group-item <?php if ($this->isIncluded('city', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Ciudades'); ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($townships == 'Y') { ?>
          <a href="<?php echo $this->url->get('township/list'); ?>">
          <li class="list-group-item <?php if ($this->isIncluded('township', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Sectores'); ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($neighborhoods == 'Y') { ?>
          <a href="<?php echo $this->url->get('neighborhood/list'); ?>">
          <li class="list-group-item <?php if ($this->isIncluded('neighborhood', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Barrios'); ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($addresses == 'Y') { ?>
          <a href="<?php echo $this->url->get('address/list'); ?>">
          <li class="list-group-item <?php if ($this->isIncluded('address', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-flag"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Direcciones'); ?>
          </li>
          </a>
          <?php } ?>
        </ul>
      </div>
    </div>
     <?php if ($security == 'Y') { ?>
     <div class="panel panel-default">
      <?php foreach (array('user', 'role', 'action') as $key => $name) { ?>
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
      <div class="<?php echo $active_class; ?>">
      <h4 class="panel-title"><span class="fa fa-lock"></span><b><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Seguridad'); ?></b></h4>
      </div>
    </a>
      <div id="collapse2" class="panel-collapse <?php echo $class_colapse; ?>">
        <ul class="list-group">
          <?php if ($users == 'Y') { ?>
          <a href="<?php echo $this->url->get('user/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('user', $this->router->getRewriteUri())) || ($this->isIncluded('/userrole', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-user"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Usuarios'); ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($roles == 'Y') { ?>
          <a href="<?php echo $this->url->get('role/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('/role', $this->router->getRewriteUri())) || ($this->isIncluded('/actionrole/list', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-user-plus"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Roles'); ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($action == 'Y') { ?>
          <a href="<?php echo $this->url->get('action/list'); ?>">
          <li class="list-group-item <?php if ($this->isIncluded('/action/list', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-check-circle-o"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Acciones'); ?>
          </li>
          </a>
          <?php } ?>
        </ul>
      </div>
    </div>
    <?php } ?>

    <?php if ($translation == 'Y') { ?>
     <div class="panel panel-default">
      <?php foreach (array('language', '/translation') as $key => $name) { ?>
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
      <div class="<?php echo $active_class; ?>">
      <h4 class="panel-title"><span class="fa fa-exchange"></span><b><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Traducciones'); ?></b></h4>
      </div>
    </a>
      <div id="collapse3" class="panel-collapse <?php echo $class_colapse; ?>">
        <ul class="list-group">
          <?php if ($languages == 'Y') { ?>
          <a href="<?php echo $this->url->get('language/list'); ?>">
          <li class="list-group-item <?php if ($this->isIncluded('language', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-language"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Idiomas'); ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($translation == 'Y') { ?>
          <a href="<?php echo $this->url->get('translation/list'); ?>">
          <li class="list-group-item <?php if ($this->isIncluded('translation', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-exchange"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Traducciones'); ?>
          </li>
          </a>
          <?php } ?>
        </ul>
      </div>
    </div>
    <?php } ?>

    <?php if ($media == 'Y') { ?>
     <div class="panel panel-default">
      <?php foreach (array('media', 'file/set_files', 'files/', '/gallery') as $key => $name) { ?>
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
      <div class="<?php echo $active_class; ?>">
      <h4 class="panel-title"><span class="fa fa-file-image-o"></span><b><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Manage Media'); ?></b></h4>
      </div>
    </a>
      <div id="collapse4" class="panel-collapse <?php echo $class_colapse; ?>">
        <ul class="list-group">
          <?php if ($files == 'Y') { ?>
          <a href="<?php echo $this->url->get('file/set_files'); ?>">
          <li class="list-group-item <?php if ($this->isIncluded('file/set_files', $this->router->getRewriteUri())) { ?>option_active<?php } ?>">
            <span class="fa fa-cloud-upload"></span><?php echo ' '; ?> <?php echo $this->getDI()->get("translate")->_('Upload Files'); ?>
          </li>
          </a>
          <a href="<?php echo $this->url->get('files/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('files/', $this->router->getRewriteUri())) || ($this->isIncluded('file/list', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-file-archive-o"></span><?php echo ' '; ?> <?php echo $this->getDI()->get("translate")->_('Manage Files'); ?>
          </li>
          </a>
          <a href="<?php echo $this->url->get('gallery/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('gallery', $this->router->getRewriteUri())) || ($this->isIncluded('file/list', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-picture-o"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Manage Galleries'); ?>
          </li>
          </a>
          <?php } ?>
        </ul>
      </div>
    </div>
    <?php } ?>

    <?php if ($system_parameter == 'Y') { ?>
      <div class="panel panel-default">
      <?php foreach (array('systemparameter', 'fileformat') as $key => $name) { ?>
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
      <div class="<?php echo $active_class; ?>">
      <h4 class="panel-title"><span class="fa fa-gear"></span><b><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Parámetros del Sistema'); ?></b></h4>
      </div>
    </a>
      <div id="collapse5" class="panel-collapse <?php echo $class_colapse; ?>">
        <ul class="list-group">
          <?php if ($system_parameter == 'Y') { ?>
          <a href="<?php echo $this->url->get('systemparameter/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('systemparameter', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-gear"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Parámetros Generales'); ?>
          </li>
          </a>
          <a href="<?php echo $this->url->get('fileformat/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('fileformat', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-picture-o"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Formatos de Archivos'); ?>
          </li>
          </a>
          <?php } ?>
        </ul> 
      </div>
    </div>
    <?php } ?>
    
    <?php if ($articles == 'Y') { ?>
      <div class="panel panel-default">
      <?php foreach (array('/article', '/article_translation', 'article_comment') as $key => $name) { ?>
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
      <div class="<?php echo $active_class; ?>">
      <h4 class="panel-title"><span class="fa fa-book"></span><b><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Artículos'); ?></b></h4>
      </div>
    </a>
      <div id="collapse6" class="panel-collapse <?php echo $class_colapse; ?>">
        <ul class="list-group">
          <?php if ($articles == 'Y') { ?>
          <a href="<?php echo $this->url->get('article/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('/article/', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-book"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Artículos'); ?>
          </li>
          </a>
          <?php } ?>
          <?php if ($article_comments == 'Y') { ?>
          <a href="<?php echo $this->url->get('article_comment/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('/article_comment', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-comment-o"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Comentarios'); ?>
          </li>
          </a>
          <?php } ?>
        </ul> 
      </div>
    </div>
    <?php } ?>

    <?php if ($restaurant == 'Y') { ?>
      <div class="panel panel-default">
      <?php foreach (array('restaurant', 'menu', 'dish', 'dish_translation', 'dish_category') as $key => $name) { ?>
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
      <div class="<?php echo $active_class; ?>">
      <h4 class="panel-title"><span class="fa fa-cutlery"></span><b><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Restaurants'); ?></b></h4>
      </div>
    </a>
      <div id="collapse7" class="panel-collapse <?php echo $class_colapse; ?>">
        <ul class="list-group">
          <a href="<?php echo $this->url->get('restaurant/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('restaurant', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-cutlery"></span><?php echo ' '; ?><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Restaurants'); ?>
          </li>
          </a>
          <?php if ($menu == 'Y') { ?>
          <a href="<?php echo $this->url->get('menu/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('menu', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-list-alt"></span><?php echo ' '; ?><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Menu'); ?>
          </li>
          </a>
          <a href="<?php echo $this->url->get('dish_category/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('dish_category', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-bookmark-o"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Category'); ?>
          </li>
          </a>
          <?php } ?>
        </ul> 
      </div>
    </div>
    <?php } ?>

     <?php if ($event == 'Y') { ?>
      <div class="panel panel-default">
      <?php foreach (array('event', 'eventgallery') as $key => $name) { ?>
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
      <div class="<?php echo $active_class; ?>">
      <h4 class="panel-title"><span class="fa fa-calendar"></span><b><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Events'); ?></b></h4>
      </div>
    </a>
      <div id="collapse8" class="panel-collapse <?php echo $class_colapse; ?>">
        <ul class="list-group">
         
          <a href="<?php echo $this->url->get('event/list'); ?>">
          <li class="list-group-item <?php if (($this->isIncluded('event', $this->router->getRewriteUri()))) { ?>option_active<?php } ?>">
            <span class="fa fa-calendar"></span><?php echo ' '; ?><?php echo $this->getDI()->get("translate")->_('Events'); ?>
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
  
   <h3 class="page-title" align ="left"><?php echo $this->getDI()->get("translate")->_($title); ?></h3>
	<hr/>
  <!-- GRID SEARCH -->
	<div align="left" >
	<?php echo $this->tag->form(array($searchroute, 'method' => 'post', 'autocomplete' => 'off')); ?>
	<div class="row">
	<div class="form-group col-md-10" style="padding-left:0;">
	<?php foreach ($searchcolumns as $index => $item) { ?>
	<div class="col-md-4 col-sm-4" style="padding-left:0;">
	<label><?php echo $this->getDI()->get("translate")->_($item['title']); ?></label>
	<?php echo $this->tag->textField(array($item['name'], 'size' => $item['size'], 'class' => 'form-control', 'placeholder' => '')); ?>
	</div>
	<?php } ?>
	</div>
	</div>
	<div class="row search_button">
	<div class="col-md-1" style="padding-left:0;">
	<?php echo $this->tag->submitButton(array($this->getDI()->get("translate")->_('Buscar'), 'class' => 'btn btn-primary')); ?>
	</div>
	
	</div>
	</form>
	</div>
  <!-- END GRID SEARCH-->

	<?php if ($permissions['create'] == 'Y') { ?>
	 <!-- NEW ITEM ICON-->
	<div align="left"><?php echo $this->tag->linkTo(array($newroute, '<i class="fa fa-plus fa-lg"></i>')); ?></div>
  <?php } ?>
	<br>
	<?php if ($noitems == '') { ?>
	<table class="table table-bordered table-striped table-condensed flip-content">
	<thead>
	<tr>
	<!-- GRID HEADER-->
	<?php foreach ($headercolumns as $index => $item) { ?>
	<th style="background-color:#eee;">
	<span><?php echo $this->getDI()->get("translate")->_($item['title']); ?></span>
	<div class="btn-group pull-right">
	<button aria-expanded="false" type="button" class="btn btn-fit-height gray dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
	<?php if ($order == 'asc') { ?>
		<?php $order_class = 'fa fa-arrow-up'; ?>
	<?php } else { ?>
		<?php if ($order == 'desc') { ?>
			<?php $order_class = 'fa fa-arrow-down'; ?>
		<?php } else { ?>
			<?php $order_class = 'fa fa-sort'; ?>
		<?php } ?>
	<?php } ?>
	<i class="<?php echo $order_class; ?>"></i>
	</button>
	<!-- GRID HEADER-->
	<ul class="dropdown-menu pull-right" role="menu">
	<li class="ms-hover">
	<a href="<?php echo '..' . $this->router->getRewriteUri() . '?page=' . $page->current . '&order=' . $item['column_name'] . ' asc'; ?>">
	<i class="fa fa-arrow-up"></i>
	<?php echo ' Asc'; ?>
	</a>
	</li>
	<li class="divider">
	</li>
	<li class="ms-hover">
	<a href="<?php echo '..' . $this->router->getRewriteUri() . '?page=' . $page->current . '&order=' . $item['column_name'] . ' desc'; ?>">
	<i class="fa fa-arrow-down"></i>
	<?php echo ' Desc'; ?>
	</a>
	</li>
	</ul>
	</div>
	</th>
	<?php } ?>
	<th></th>
	<th></th>
	</tr>
	</thead>
	<!-- END HEADER-->
	<!-- GRID BODY -->
	<tbody>
	<?php if (isset($page->items)) { ?>
		<?php foreach ($page->items as $entity) { ?>
			<tr>
			<?php foreach ($headercolumns as $index => $item) { ?>
				<td width ="20%"><?php echo $entity->readAttribute($item['column_name']); ?></td>
			<?php } ?>
			<td width ="2%">
				<?php if ($permissions['edit'] == 'Y') { ?>
				<?php echo $this->tag->linkTo(array($editroute . $entity->id, '<i class="fa fa-edit fa-lg"></i>', 'class' => 'btn btn-icon-only green')); ?>
				<?php } ?>
			</td>
			<td width ="2%">
				<?php if ($permissions['delete'] == 'Y') { ?>
				<?php echo $this->tag->linkTo(array($showroute . $entity->id, '<i class="fa fa-remove fa-lg"></i>', 'class' => 'btn btn-icon-only red')); ?>
				<?php } ?>
			</td>
			</tr>
		<?php } ?>
		<?php } ?>
		</tbody>
	<!--END GRID BODY -->
		</table>
		<!--END GRID PAGINATION -->
		<div align="left"><?php echo $this->getDI()->get("translate")->_('Página') . ' ' . $page->current . ' ' . $this->getDI()->get("translate")->_('de') . ' ' . $page->total_pages; ?></div>
		<div align ="left">
		<ul class="pagination">
		<li><?php echo $this->tag->linkTo(array($listroute, '<i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i>')); ?></li>
		<li><?php echo $this->tag->linkTo(array($listroute . '?page=' . $page->before, '<i class="fa fa-angle-left"></i>')); ?></li>
		<?php foreach (range(1, $page->total_pages) as $i) { ?>
		<?php if ($page->current == $i) { ?>
		<?php $classitem = 'active'; ?>
		<?php } else { ?>
		<?php $classitem = ''; ?>
		<?php } ?>
		<li class="<?php echo $classitem; ?>"><?php echo $this->tag->linkTo(array($listroute . '?page=' . $i, $i)); ?></li>
		<?php } ?>
		<li><?php echo $this->tag->linkTo(array($listroute . '?page=' . $page->next, '<i class="fa fa-angle-right"></i>')); ?></li>
		<li><?php echo $this->tag->linkTo(array($listroute . '?page=' . $page->last, '<i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>')); ?></li>
		</ul>
		</div>
    <!--END GRID PAGINATION -->
	<?php } else { ?>
	  <!--NO ITEMS VALIDATION -->
		<div class="alert alert-warning alert-dismissable">
		<strong><i class="glyphicon glyphicon-warning-sign"></i> <?php echo $this->getDI()->get("translate")->_($noitems); ?></strong>
		</div>
	<?php } ?>

  </div>
  </div>
  <!-- End Main Content-->   
  </div>
   <!-- End Content menu and main content -->
</div>
 <!-- End Main Row Container -->
 <!-- Footet-->  
<footer class="footer">
     <p align="center" style="padding-top:25px;"><?php echo '2016 &copy; Restaurant Maker'; ?></p>   
</footer>
<!-- End footer--> 

<!-- javaScripts --> 
  
  <script src="<?php echo $this->url->getStatic('tools/jquery/jquery2.2.0/jquery.min.js'); ?>"></script>
  <script src="<?php echo $this->url->getStatic('tools/bootstrap/js/bootstrap.min.js'); ?>"></script> 
  
  <!-- End JavaScripts --> 
</body>
</html>