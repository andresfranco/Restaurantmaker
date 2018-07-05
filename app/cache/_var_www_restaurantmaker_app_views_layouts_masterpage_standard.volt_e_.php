a:11:{i:0;s:245:"<?= $globalobj->checkuser($this->session->get('userid')) ?>
<?php $actions = $globalobj->get_user_actions($this->session->get('userid')); ?>
<?php $languages = $globalobj->get_languages(); ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
";s:4:"head";a:7:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:79:"
<head>
  <!-- Stylesheets --> 
  <link rel="stylesheet" type="text/css" href="";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:10;}i:1;a:4:{s:4:"type";i:359;s:4:"expr";a:5:{s:4:"type";i:350;s:4:"name";a:4:{s:4:"type";i:265;s:5:"value";s:10:"static_url";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:10;}s:9:"arguments";a:1:{i:0;a:3:{s:4:"expr";a:4:{s:4:"type";i:260;s:5:"value";s:34:"/tools/bootstrap/css/bootstrap.css";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:10;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:10;}}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:10;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:11;}i:2;a:4:{s:4:"type";i:357;s:5:"value";s:50:"">
  <link rel="stylesheet" type="text/css" href="";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:11;}i:3;a:4:{s:4:"type";i:359;s:4:"expr";a:5:{s:4:"type";i:350;s:4:"name";a:4:{s:4:"type";i:265;s:5:"value";s:10:"static_url";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:11;}s:9:"arguments";a:1:{i:0;a:3:{s:4:"expr";a:4:{s:4:"type";i:260;s:5:"value";s:44:"/tools/font-awesome/css/font-awesome.min.css";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:11;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:11;}}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:11;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:12;}i:4;a:4:{s:4:"type";i:357;s:5:"value";s:50:"">
  <link rel="stylesheet" type="text/css" href="";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:12;}i:5;a:4:{s:4:"type";i:359;s:4:"expr";a:5:{s:4:"type";i:350;s:4:"name";a:4:{s:4:"type";i:265;s:5:"value";s:10:"static_url";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:12;}s:9:"arguments";a:1:{i:0;a:3:{s:4:"expr";a:4:{s:4:"type";i:260;s:5:"value";s:43:"/stylesheets/masterpage_standard/layout.css";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:12;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:12;}}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:12;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:15;}i:6;a:4:{s:4:"type";i:357;s:5:"value";s:40:"">
  <!-- End Stylesheets --> 
</head>
 ";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:15;}}i:1;s:2845:"
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
    ";s:12:"sidebar_menu";a:3:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:7:"
      ";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:77;}i:1;a:4:{s:4:"type";i:313;s:4:"path";a:4:{s:4:"type";i:260;s:5:"value";s:26:"layouts/menu_standard.volt";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:77;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:78;}i:2;a:4:{s:4:"type";i:357;s:5:"value";s:5:"
    ";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:78;}}i:2;s:6:" 
    ";s:9:"pagetitle";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:5:"
    ";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:80;}}i:3;s:160:"
    <!-- End Accordion Menu --> 
  <!-- Main Content--> 
  <div class="col-sm-12 col-md-10 col-xs-12 col-lg-10 column_content">
  <div class="main_content">
  ";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:22:"

  <!--CONTENT-->

  ";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:89;}}i:4;s:335:"
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
  ";s:11:"javascripts";a:5:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:16:"
  <script src="";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:105;}i:1;a:4:{s:4:"type";i:359;s:4:"expr";a:5:{s:4:"type";i:350;s:4:"name";a:4:{s:4:"type";i:265;s:5:"value";s:10:"static_url";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:105;}s:9:"arguments";a:1:{i:0;a:3:{s:4:"expr";a:4:{s:4:"type";i:260;s:5:"value";s:38:"tools/jquery/jquery2.2.0/jquery.min.js";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:105;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:105;}}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:105;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:106;}i:2;a:4:{s:4:"type";i:357;s:5:"value";s:27:""></script>
  <script src="";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:106;}i:3;a:4:{s:4:"type";i:359;s:4:"expr";a:5:{s:4:"type";i:350;s:4:"name";a:4:{s:4:"type";i:265;s:5:"value";s:10:"static_url";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:106;}s:9:"arguments";a:1:{i:0;a:3:{s:4:"expr";a:4:{s:4:"type";i:260;s:5:"value";s:35:"tools/bootstrap/js/bootstrap.min.js";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:106;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:106;}}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:106;}s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:107;}i:4;a:4:{s:4:"type";i:357;s:5:"value";s:15:""></script> 
  ";s:4:"file";s:67:"/var/www/Restaurantmaker/app/views/layouts/masterpage_standard.volt";s:4:"line";i:107;}}i:5;s:44:"
  <!-- End JavaScripts --> 
</body>
</html>";}