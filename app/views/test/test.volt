<html>
<head>
<script src="{{static_url('tools/jquery/jquery2.2.0/jquery.min.js')}}"></script>	
<script type="text/javascript" src="{{static_url('tools/fancybox//lib/jquery.mousewheel-3.0.6.pack.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{static_url('tools/fancybox/source/jquery.fancybox.css')}}" />
<script type="text/javascript" src="{{static_url('tools/fancybox/source/jquery.fancybox.js')}}"></script>
<script type="text/javascript" src="{{static_url('tools/fancybox/source/jquery.fancybox.pack.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{static_url('tools/fancybox/source/helpers/jquery.fancybox-buttons.css')}}" />
<script type="text/javascript" src="{{static_url('tools/fancybox/source/helpers/jquery.fancybox-buttons.js')}}"></script>
<script type="text/javascript" src="{{static_url('tools/fancybox/source/helpers/jquery.fancybox-media.js')}}"></script>
<link rel="stylesheet" type="text/css" src="{{static_url('tools/fancybox/source/helpers/jquery.fancybox-thumbs.css')}}"/>
    <script type="text/javascript" src="{{static_url('tools/fancybox/source/helpers/jquery.fancybox-thumbs.js')}}"></script>
    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <script>
        
        jQuery(document).ready(function()
        {
      
             $("#single_1").fancybox({
         openEffect : 'elastic',
      closeEffect : 'elastic',

      helpers : {
        title : {
          type : 'inside'
        }
      }
      });

        });
    </script>
    
</head>
<body>

	<a class="fancybox"  href="/Phalcontest/files/galleries/prueba_gallery/failure_succes.jpg" title="Lorem ipsum dolor sit amet"><img id ="single_1" src="/Phalcontest/files/galleries/prueba_gallery/failure_succes.jpg" alt="" height="200" width="270"></a>

	<h1>fancyBox</h1>

	<p>This is a demonstration. More information and examples: <a href="http://fancyapps.com/fancybox/">www.fancyapps.com/fancybox/</a></p>

	<h3>Simple image gallery</h3>
	<p>
		<a class="fancybox" href="{{static_url('tools/fancybox/demo/1_b.jpg')}}" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="{{static_url('tools/fancybox/demo/1_s.jpg')}}" alt="" /></a>

		<a class="fancybox" href="2_b.jpg" data-fancybox-group="gallery" title="Etiam quis mi eu elit temp"><img src="2_s.jpg" alt="" /></a>

		<a class="fancybox" href="3_b.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="3_s.jpg" alt="" /></a>

		<a class="fancybox" href="4_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno"><img src="4_s.jpg" alt="" /></a>
	</p>

	<h3>Different effects</h3>
	<p>
		<a class="fancybox-effects-a" href="5_b.jpg" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit"><img src="5_s.jpg" alt="" /></a>

		<a class="fancybox-effects-b" href="5_b.jpg" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit"><img src="5_s.jpg" alt="" /></a>

		<a class="fancybox-effects-c" href="5_b.jpg" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit"><img src="5_s.jpg" alt="" /></a>

		<a class="fancybox-effects-d" href="5_b.jpg" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit"><img src="5_s.jpg" alt="" /></a>
	</p>

	<h3>Various types</h3>
	<p>
		fancyBox will try to guess content type from href attribute but you can specify it directly by adding classname (fancybox.image, fancybox.iframe, etc).
	</p>
	<ul>
		<li><a class="fancybox" href="#inline1" title="Lorem ipsum dolor sit amet">Inline</a></li>
		<li><a class="fancybox fancybox.ajax" href="ajax.txt">Ajax</a></li>
		<li><a class="fancybox fancybox.iframe" href="iframe.html">Iframe</a></li>
		<li><a class="fancybox" href="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf">Swf</a></li>
	</ul>

	<div id="inline1" style="width:400px;display: none;">
		<h3>Etiam quis mi eu elit</h3>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis mi eu elit tempor facilisis id et neque. Nulla sit amet sem sapien. Vestibulum imperdiet porta ante ac ornare. Nulla et lorem eu nibh adipiscing ultricies nec at lacus. Cras laoreet ultricies sem, at blandit mi eleifend aliquam. Nunc enim ipsum, vehicula non pretium varius, cursus ac tortor. Vivamus fringilla congue laoreet. Quisque ultrices sodales orci, quis rhoncus justo auctor in. Phasellus dui eros, bibendum eu feugiat ornare, faucibus eu mi. Nunc aliquet tempus sem, id aliquam diam varius ac. Maecenas nisl nunc, molestie vitae eleifend vel, iaculis sed magna. Aenean tempus lacus vitae orci posuere porttitor eget non felis. Donec lectus elit, aliquam nec eleifend sit amet, vestibulum sed nunc.
		</p>
	</div>

	<p>
		Ajax example will not run from your local computer and requires a server to run.
	</p>

	<h3>Button helper</h3>
	<p>
		<a class="fancybox-buttons" data-fancybox-group="button" href="1_b.jpg"><img src="1_s.jpg" alt="" /></a>

		<a class="fancybox-buttons" data-fancybox-group="button" href="2_b.jpg"><img src="2_s.jpg" alt="" /></a>

		<a class="fancybox-buttons" data-fancybox-group="button" href="3_b.jpg"><img src="3_s.jpg" alt="" /></a>

		<a class="fancybox-buttons" data-fancybox-group="button" href="4_b.jpg"><img src="4_s.jpg" alt="" /></a>
	</p>

	<h3>Thumbnail helper</h3>
	<p>
		<a class="fancybox-thumbs" data-fancybox-group="thumb" href="4_b.jpg"><img src="4_s.jpg" alt="" /></a>

		<a class="fancybox-thumbs" data-fancybox-group="thumb" href="3_b.jpg"><img src="3_s.jpg" alt="" /></a>

		<a class="fancybox-thumbs" data-fancybox-group="thumb" href="2_b.jpg"><img src="2_s.jpg" alt="" /></a>

		<a class="fancybox-thumbs" data-fancybox-group="thumb" href="1_b.jpg"><img src="1_s.jpg" alt="" /></a>
	</p>

	<h3>Media helper</h3>
	<p>
		Will not run from your local computer, requires a server to run.
	</p>

	<ul>
		<li><a class="fancybox-media" href="http://www.youtube.com/watch?v=opj24KnzrWo">Youtube</a></li>
		<li><a class="fancybox-media" href="http://vimeo.com/47480346">Vimeo</a></li>
		<li><a class="fancybox-media" href="http://www.metacafe.com/watch/7635964/">Metacafe</a></li>
		<li><a class="fancybox-media" href="http://www.dailymotion.com/video/xoeylt_electric-guest-this-head-i-hold_music">Dailymotion</a></li>
		<li><a class="fancybox-media" href="http://twitvid.com/QY7MD">Twitvid</a></li>
		<li><a class="fancybox-media" href="http://twitpic.com/7p93st">Twitpic</a></li>
		<li><a class="fancybox-media" href="http://instagr.am/p/IejkuUGxQn">Instagram</a></li>
	</ul>

	<h3>Open manually</h3>
	<ul>
		<li><a id="fancybox-manual-a" href="javascript:;">Open single item</a></li>
		<li><a id="fancybox-manual-b" href="javascript:;">Open single item, custom options</a></li>
		<li><a id="fancybox-manual-c" href="javascript:;">Open gallery</a></li>
	</ul>

	<p>
		Photo Credit: Instagrammer @whitjohns
	</p>

</body>
</html>