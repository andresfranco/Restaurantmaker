<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?= $this->getDI()->get("translate")->_($website_title) ?></title>

<?= $this->assets->outputCss('frontend_fonts') ?>



<?= $this->assets->outputCss('frontend_css') ?>



<!-- favicon -->
<link rel="shortcut icon" href="<?= $this->url->getStatic($favicon_url) ?>" type="image/x-icon">
<link rel="icon" href="<?= $this->url->getStatic($favicon_url) ?>" type="image/x-icon">

</head>

<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
      <div class="container">
        <div class="navbar-header">
        <!-- Logo Starts -->
        <a class="navbar-brand" href="#home">
        <img src="<?= $logo ?>" alt="logo" width="93px" height="100px">
        <span style="font: 1em Lobster,Arial,Helvetica;color:#00b504;font-weight:bold;"><?= $main_page_title ?></span>
        </a>
        <!-- #Logo Ends -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        </div>
      <!-- Nav Starts -->
        <div class="navbar-collapse  collapse">

            <ul class="nav navbar-nav navbar-right scroll">
              <li class="active"><a href="#home"><?= $this->getDI()->get("translate")->_('headermenu.home') ?></a></li>
              <li ><a href="#menu"><?= $this->getDI()->get("translate")->_('headermenu.menu') ?></a></li>
              <li ><a href="#foods"><?= $this->getDI()->get("translate")->_('headermenu.event') ?></a></li>
              <li ><a href="#blog"><?= $this->getDI()->get("translate")->_('headermenu.blog') ?></a></li>
              <li> 
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
              </li>
            </ul>

        </div>
      <!-- #Nav Ends -->
      </div>
    </div>
  </div>
</div>

<!-- #Header Starts -->


<div id="home">
<!-- Slider Starts -->
  <div class="banner">
  <img src="<?= $mainImage ?>" alt="banner" class="img-responsive" width="100%">
  <div class="caption">
    <div class="caption-wrapper">
    <div class="caption-info">
    <h1 class="animated bounceInUp"><?= $mainImageTitle ?></h1>
    <p class="animated bounceInLeft"> </p>
    <a href="#menu" class="explore animated bounceInDown"><i class="fa fa-angle-down  fa-3x"></i></a>
    </div>
    </div>
  </div>
  </div>
<!-- #Slider Ends -->
</div>




<!-- Cirlce Starts -->
<div id="menu"  class="container spacer about">

<h2 class="text-center wowload fadeInUp"><?= $menuTitle ?></h2>
<div class="row">
  <div class="col-sm-6 wowload fadeInLeft">
   <p><?= $menuDescription ?></p>
  </div>
  <div class="col-sm-6 wowload fadeInRight">
  <h4><i class="fa fa-bars"></i> Menu</h4>
  <!-- menus -->
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
      <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <i class="fa fa-coffee"></i> Bebidas no alcoholicas
      </a>
      </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
      <div class="clearfix food-list"><div class="pull-left">Té</div><span class="pull-right">$ 2.50</span></div>
      <div class="clearfix food-list"><div class="pull-left">Café</div><span class="pull-right">$ 2.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Sodas</div><span class="pull-right">$ 2.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Botella de Agua</div><span class="pull-right">$ 2.00</span></div>
      </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
      <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <i class="fa fa-beer"></i> Cervezas Nacionales
      </a>
      </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
      <div class="clearfix food-list"><div class="pull-left">Panamá</div><span class="pull-right">$ 2.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Balboa</div><span class="pull-right">$ 2.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Atlas</div><span class="pull-right">$ 2.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">507</div><span class="pull-right">$ 2.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Soberana</div><span class="pull-right">$ 2.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Fula</div><span class="pull-right">$ 3.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">ChivoPerro</div><span class="pull-right">$ 3.00</span></div>
      </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
      <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      <i class="fa fa-beer"></i> Cervezas Importadas
      </a>
      </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
      <div class="clearfix food-list"><div class="pull-left">Stella</div><span class="pull-right">$ 5.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Dellirium</div><span class="pull-right">$ 5.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Lucifer</div><span class="pull-right">$ 5.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Paulaner</div><span class="pull-right">$ 5.00</span></div>
      </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
      <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      <i class="glyphicon glyphicon-glass"></i>Tragos y Cocktails
      </a>
      </h4>
      </div>
      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
      <div class="clearfix food-list"><div class="pull-left">Vodka Smirnoff</div><span class="pull-right">$ 5.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Mojito</div><span class="pull-right">$ 5.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Ron abuelo</div><span class="pull-right">$ 5.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Margarita</div><span class="pull-right">$ 5.00</span></div>
      </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
      <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsebottles" aria-expanded="false" aria-controls="collapseFour">
      <i class="glyphicon glyphicon-glass"></i>Botellas de Licor
      </a>
      </h4>
      </div>
      <div id="collapsebottles" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
      <div class="clearfix food-list"><div class="pull-left">Vodka Smirnoff</div><span class="pull-right">$ 35.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Flor de caña</div><span class="pull-right">$ 35.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Seco Herrerano</div><span class="pull-right">$ 35.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Wisky Old Park</div><span class="pull-right">$ 55.00</span></div>
      </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
      <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
      <i class="fa fa-cutlery"></i>Entradas
      </a>
      </h4>
      </div>
      <div id="collapseFive" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
      <div class="clearfix food-list"><div class="pull-left">Ceviche de Camaron</div><span class="pull-right">$ 10.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Ceviche de corvina</div><span class="pull-right">$ 10.00</span></div>
      </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
      <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseFive">
      <i class="fa fa-cutlery"></i>Platos Fuertes
      </a>
      </h4>
      </div>
      <div id="collapseSix" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
      <div class="clearfix food-list"><div class="pull-left">Hamburguesa Doble Angus</div><span class="pull-right">$ 10.00</span></div>
      <div class="clearfix food-list"><div class="pull-left">Langostinos al ajillo</div><span class="pull-right">$ 10.00</span></div>
      </div>
      </div>
    </div>
  </div>
<!-- menus -->
</div>
</div>
</div>


<!-- #Cirlce Ends -->


<!-- works -->
<div id="foods"  class=" clearfix grid">
  <figure class="effect-oscar  wowload fadeInUp">
  <img src="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/1.jpg') ?>" alt="img01"/>
  <figcaption>
  <h2>Pedidos Online</h2>
  <p><a href="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/1.jpg') ?>"title="1" data-gallery>Hacer pedido</a></p>
  </figcaption>
  </figure>
  <figure class="effect-oscar  wowload fadeInUp">
  <img src="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/2.jpg') ?>" alt="img01"/>
  <figcaption>
  <h2>Carnavales</h2>
  <p>After culeco oficial en Penonomé
  <a href="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/2.jpg') ?>" title="1" data-gallery>Ver más</a></p>
  </figcaption>
  </figure>
  <figure class="effect-oscar  wowload fadeInUp">
  <img src="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/3.jpg') ?>" alt="img01"/>
  <figcaption>
  <h2>Eventos</h2>
  <p><a href="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/3.jpg') ?>" title="1" data-gallery>Ver más</a></p>
  </figcaption>
  </figure>
  <figure class="effect-oscar  wowload fadeInUp">
  <img src="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/4.jpg') ?>" alt="img01"/>
  <figcaption>
  <h2>Noticias</h2>
  <p><a href="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/4.jpg') ?>" title="1" data-gallery>Ver más</a></p>
  </figcaption>
  </figure>
  <figure class="effect-oscar  wowload fadeInUp">
  <img src="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/5.jpg') ?>" alt="img01"/>
  <figcaption>
  <h2>Promociones</h2>
  <p>Mira nuestras promociones en tragos y cocktails<br>
  <a href="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/5.jpg') ?>" title="1" data-gallery>Ver más</a></p>
  </figcaption>
  </figure>
  <figure class="effect-oscar  wowload fadeInUp">
  <img src="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/6.jpg') ?>" alt="img01"/>
  <figcaption>
  <h2>Comunidad</h2>
  <p>Participa en nuestra comunidad<br>
  <a href="<?= $this->url->getStatic('frontend/themes/default/images/portfolio/6.jpg') ?>" title="1" data-gallery>Ver más</a></p>
  </figcaption>
  </figure>
</div>
<!-- works -->



<div id="blog" class="container spacer ">
  <h2 class="text-center  wowload fadeInUp">Comentarios de nuestros clientes felices</h2>
  <div class="clearfix">
    <div class="col-sm-6 col-sm-offset-3">
      <div id="carousel-testimonials" class="carousel slide testimonails  wowload fadeInRight" data-ride="carousel">
        <div class="carousel-inner">
          <div class="item active animated bounceInRight row">
          <div class="animated slideInLeft col-xs-2"><img alt="portfolio" src="<?= $this->url->getStatic('frontend/themes/default/images/team/yo.png') ?>" width="100" class="img-circle img-responsive"></div>
          <div  class="col-xs-10">
          <p> La comida es excelente y definitivamente tienen la mejor cerveza de Penonomé. </p>
          <span>Andrés Franco  - <b>Panamá</b></span>
          </div>
          </div>
          <div class="item  animated bounceInRight row">
          <div class="animated slideInLeft  col-xs-2"><img alt="portfolio" src="<?= $this->url->getStatic('frontend/themes/default/images/team/wala.jpg') ?>" width="100" class="img-circle img-responsive"></div>
          <div  class="col-xs-10">
          <p>La rumba en carnavales es excelente , tiene un ambiente diferente y divertido</p>
          <span>Orlando Abarca - <b>Panamá</b></span>
          </div>
          </div>
        </div>

        <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-testimonials" data-slide-to="1"></li>
        <li data-target="#carousel-testimonials" data-slide-to="2"></li>
        </ol>
      <!-- Indicators -->
      </div>
    </div>
  </div>
  

  
  <!-- team -->
  <h3 class="text-center  wowload fadeInUp">Nuestro Staff</h3>
  <p class="text-center  wowload fadeInLeft">Estamos haciendo lo posible para darte una excelente atención</p>
  <div class="row grid team  wowload fadeInUpBig">
    <div class=" col-sm-3 col-xs-6">
    <figure class="effect-chico">
    <img src="<?= $this->url->getStatic('frontend/themes/default/images/team/19.jpg') ?>" alt="img01" class="img-responsive" />
    <figcaption>
    <p><b>name1</b><br>position1</p>
    </figcaption>
    </figure>
    </div>
    <div class=" col-sm-3 col-xs-6">
    <figure class="effect-chico">
    <img src="<?= $this->url->getStatic('frontend/themes/default/images/team/18.jpg') ?>" alt="img01"/>
    <figcaption>
    <p><b>Name2</b><br>position2</p>
    </figcaption>
    </figure>
    </div>
  </div>
<!-- team -->
</div>



<!-- About Starts -->
<div class="highlight-info">
  <div class="overlay spacer">
    <center><div><h3>SIGUENOS EN LAS REDES SOCIALES</h3></div></center><br><br>
    <div class="container">
      <div class="row text-center  wowload fadeInDownBig">
        <div class="col-sm-3 col-xs-6">
        <i class="fa fa-facebook fa-5x"></i><h4>Facebook</h4>
        </div>
        <div class="col-sm-3 col-xs-6">
        <i class="fa fa-twitter  fa-5x"></i><h4>Twitter</h4>
        </div>
        <div class="col-sm-3 col-xs-6">
        <i class="fa fa-instagram fa-5x"></i><h4>Instagram</h4>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About Ends -->



<div id="contact" class="spacer">
<!--Contact Starts-->
  <div class="container contactform center">
    <h2 class="text-center  wowload fadeInUp">Contáctenos</h2>
    <div class="row wowload fadeInLeftBig">
      <div class="col-sm-6 col-sm-offset-3 col-xs-12">
      <input type="text" placeholder="Nombre">
      <input type="text" placeholder="Email">
      <textarea rows="5" placeholder="Mensaje"></textarea>
      <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Enviar</button>
      </div>
    </div>
  </div>
</div>

<div id="map">
<iframe src="<?= $this->url->getStatic('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.827076125955!2d-80.35367128517285!3d8.516164499154613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fac4f38f3099faf%3A0x26dbfc6ff3b26845!2sGambrinus!5e0!3m2!1ses!2ses!4v1449069015487') ?>" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!--Contact Ends-->



<!-- Footer Starts -->
<div class="footer text-center spacer">
<p>Copyright 2015 Gambrinus Panamá Todos los derechos reservados</p>
<p>Usamos el poder de <a href ="<?= $this->url->getStatic('https://phalconphp.com') ?>"><img src="<?= $this->url->getStatic('frontend/themes/default/images/phalcon1.png') ?>"></a>
<span style="color:white;"><i class="fa fa-cutlery"></i> RESTAURANT MAKER</span></p>
</div>
<!-- # Footer Ends -->

<a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
<!-- The container for the modal slides -->
<div class="slides"></div>
<!-- Controls for the borderless lightbox -->
<h3 class="title">Title</h3>
<a class="prev">‹</a>
<a class="next">›</a>
<a class="close">×</a>
<!-- The modal dialog, which will be used to wrap the lightbox content -->
</div>


  <script src="<?= $this->url->getStatic('tools/jquery/jquery2.2.0/jquery.min.js') ?>"></script>
  <script src="<?= $this->url->getStatic('tools/bootstrap/js/bootstrap.min.js') ?>"></script>
  <?= $this->assets->outputCJs('frontend_js') ?>

</body>

</html>