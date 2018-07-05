<?php $languages = $globalobj->get_languages(); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js') }}"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js') }}"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Restaurant Maker Admin</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>

<link rel="stylesheet" type="text/css" href="<?= $this->url->getStatic('/tools/bootstrap/css/bootstrap.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= $this->url->getStatic('/tools/font-awesome/css/font-awesome.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= $this->url->getStatic('/stylesheets/login/login.css') ?>">
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->

  <div class="panel panel-primary login-panel">
  <div class="panel-heading">
    <div class="row">
       <div class="col-md-7 col-xs-6 col-sm-7" style="padding-top:10px;">
        <h3 class="panel-title"><i class="fa fa-lock"></i> <?= $this->getDI()->get("translate")->_('Administración') ?></h3></div>
      <div class="col-md-5 col-xs-6 col-sm-5">
      <ul class="dropdown" style="padding-top:10px;">
      <li style ="list-style:none;">
        
           <?php $flag = 'es.png'; ?>
           <?php $languagename = 'Spanish'; ?>
           <?php foreach ($languages as $item) { ?>
             <?php if ($this->session->get('language') == $item->code) { ?>
                 <?php $flag = $item->flag; ?>
                 <?php $languagename = $item->language; ?>
             <?php } ?>
          <?php } ?>
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;"> <img src="<?= $this->url->getStatic('img/flags/' . $flag) ?>" alt=""><?= ' ' ?><?= $this->getDI()->get("translate")->_($languagename) ?><span class="caret"></span></a>
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
    </div>
    </div>  
     
  </div>
	<div class="panel-body">
	<?php $errorvar = $this->getContent(); ?>
	<?php if (!empty($errorvar)) { ?><div class="alert alert-danger">
	<button class="close" data-close="alert"></button>
	<?= $this->getContent() ?>
	</div><?php } ?>

     <?= $this->tag->form(['id' => 'appform']) ?>
		<div class="form-group">
	    <?= $form->label('username', ['class' => 'control-label visible-ie8 visible-ie9']) ?>
		<div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
       <?= $form->render('username', ['class' => 'form-control placeholder-no-fix', 'autocompete' => 'off']) ?>
        </div>
        <label id="errorusername"><label>	
		</div>
		<div class="form-group">
        <?= $form->label('password', ['class' => 'control-label visible-ie8 visible-ie9']) ?>
		<div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
        <?= $form->render('password', ['class' => 'form-control placeholder-no-fix', 'autocompete' => 'off']) ?>
        </div>
        <label id="errorpassword"><label>	
        </div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary" >
			<?= $this->getDI()->get("translate")->_('Iniciar Sesión') ?> <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
  </div>
</div>
</div>
<footer class="footer">
     <p align="center" style="padding-top:25px;"><?= '2016 &copy; Restaurant Maker' ?></p>   
</footer>
<script>
var validatemessages = {user:'<?= $this->getDI()->get("translate")->_('user.required') ?>',key:'<?= $this->getDI()->get("translate")->_('password.required') ?>'};
</script>
<script src="<?= $this->url->getStatic('tools/jquery/jquery2.2.0/jquery.min.js') ?>"></script>
<script src="<?= $this->url->getStatic('tools/bootstrap/js/bootstrap.min.js') ?>"></script> 
<script src="<?= $this->url->getStatic('metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') ?>" type="text/javascript"></script>
<script src="<?= $this->url->getStatic('js/login/validatelogin.js') ?>"></script>  
<script type="text/javascript" src="<?= $this->url->getStatic('metronic/assets/global/plugins/select2/select2.min.js') ?>"></script>

</body>
<!-- END BODY -->
</html>
