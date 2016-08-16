
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