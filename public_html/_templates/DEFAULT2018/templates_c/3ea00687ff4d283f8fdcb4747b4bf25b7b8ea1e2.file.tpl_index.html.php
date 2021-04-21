<?php /* Smarty version Smarty-3.1.8, created on 2021-04-12 16:16:59
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_index.html" */ ?>
<?php /*%%SmartyHeaderCode:1664380091602e1fea5a6587-40149620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ea00687ff4d283f8fdcb4747b4bf25b7b8ea1e2' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_index.html',
      1 => 1618244198,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1664380091602e1fea5a6587-40149620',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e1fea64a0b0_41867973',
  'variables' => 
  array (
    'tituloPagina' => 0,
    'version_imprimir' => 0,
    'tpl_cabezote' => 0,
    'esHome' => 0,
    'tpl_contenido' => 0,
    'tipoCategoria' => 0,
    'tpl_lateral_derecho' => 0,
    'tpl_lateral' => 0,
    'tpl_pie' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e1fea64a0b0_41867973')) {function content_602e1fea64a0b0_41867973($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE HTML>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	
		<title><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</title>
		<?php if (FriendlyURL::$enable){?><base href="<?php echo @_URL;?>
"><?php }?>
		<!-- <meta http-equiv="pragma" content="no-cache"> -->
		<meta name="google-site-verification" content="jGxcjLj1cmeZbqF9QvVRNLqshLoBEa3FvqhNzwpklqE">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="author" content="<?php echo @_AUTHOR;?>
">
		<meta name="copyright" content="<?php echo smarty_modifier_date_format(time(),"%Y");?>
 &copy; Micrositios Ltda. www.micrositios.net">
		<META NAME="description" CONTENT="<?php echo @_METADESCRIPTION;?>
">
		<META NAME="Robots" CONTENT="index,follow">
		<META NAME="keywords" CONTENT="<?php echo @_METAKEYWORDS;?>
">
		<META NAME="classification" CONTENT="<?php echo @_METACLASSIFICATION;?>
">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="generator" content="Micrositios CMS http://www.micrositios.net">

		<!-- MetaTags facebook -->
		<meta property="og:type" content="website">
		<meta property="og:image" content="https://www.ejercito.mil.co/_templates/Default2011/recursos/images/cabezote/escudo_ejercito.png">
		<meta property="og:site_name" content="EjÃ©rcito Nacional de Colombia ">
		<meta property="fb:admins" content="100002005634412">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		
		<meta charset="iso-8859-1" />
			
		
		<link href="https://www.ejercito.mil.co/favicon1.ico" rel="shortcut icon">

		<?php if ($_smarty_tpl->tpl_vars['version_imprimir']->value===true){?>
			<link href="<?php echo @_DIRCSS;?>
estilo_imprimir.css" rel="stylesheet" type="text/css" title="VersiÃ³n Imprimir">
		<?php }else{ ?>
			<!-- Bootstrap -->

			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


	        <link href="<?php echo @_DIRCSS;?>
bootstrap/bootstrap.css" rel="stylesheet" type="text/css" media="all">
			<link href="<?php echo @_DIRCSS;?>
bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css" media="all">
			<link href="<?php echo @_DIRCSS;?>
estilo_general.css" rel="stylesheet" type="text/css" title="VersiÃ³n Normal" media="screen,print">
			<link href="<?php echo @_DIRCSS;?>
style.css?<?php echo time();?>
" rel="stylesheet" type="text/css" title="VersiÃ³n Normal" media="screen,print">
			<link href="<?php echo @_DIRCSS;?>
ejercito.css?<?php echo time();?>
" rel="stylesheet" type="text/css" title="VersiÃ³n Normal" media="screen,print">
			<link href="<?php echo @_DIRCSS;?>
estilo_herramientas.css" rel="stylesheet" type="text/css" media="screen,print">
			<link href="<?php echo @_DIRCSS_ADMIN;?>
estilo_admin.css" rel="stylesheet" type="text/css" media="screen,print">
			<link href="<?php echo @_DIRCSS;?>
flexslider.css" rel="stylesheet" type="text/css" media="screen,print">
			<link href="<?php echo @_DIRCSS;?>
jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen,print">
		<?php }?>	
		<link rel="alternate" TITLE="<?php echo @_NOMBRESITIO;?>
 : RSS" HREF="rss/" TYPE="application/rss+xml">
				
		<script src="js/scripts_misc_01.js" type="text/javascript"></script>
		<script src="js/misc.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/objetoajax.js"></script>
		<script type="text/javascript" src="js/responsive-nav.js"></script>	
  		<script src="https://use.fontawesome.com/89a7330f63.js"></script>
		
		<?php if (@_SINICIO==1||@_SINICIO==113867){?>
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

		    <script type="text/javascript" src="js/tabs_automaticos.js"></script>
		    <script src="tools/colorbox/jquery.colorbox.js"></script>		  
			<link rel="stylesheet" href="tools/colorbox/colorbox.css" /> 
        <?php }?>	
        
        <script type="text/javascript" src="<?php echo @_DIRCSS;?>
bootstrap/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo @_DIRJS;?>
bootstrap-hover-dropdown.min.js"></script>
		<!-- Slider Kit scripts -->
		<script type="text/javascript" src="js/sliderkit-2015/js/sliderkit/jquery.sliderkit.1.9.2.pack.js"></script>
		<script type="text/javascript" src="js/sliderkit-2015/js/sliderkit/addons/sliderkit.counter.1.0.pack.js"></script>
		<script type="text/javascript" src="js/sliderkit-2015/js/sliderkit/addons/sliderkit.imagefx.1.0.pack.js"></script>
		<script type="text/javascript" src="js/sliderkit-2015/js/sliderkit/addons/sliderkit.delaycaptions.1.1.pack.js"></script>
		<script type="text/javascript" src="js/sliderkit-2015/js/external/jquery.easing.1.3.min.js"></script>
		<script type="text/javascript" src="js/sliderkit-2015/js/external/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" src="js/jquery.fancybox.js"></script>
		<script type="text/javascript" src="js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="js/script.js"></script>

		<script type="text/javascript" src="js/instafeed.min.js"></script>
		<script type="text/javascript" src="js/slick.min.js"></script>
		<link rel="stylesheet" type="text/css" href="_templates/DEFAULT2018/recursos/css/slick-theme.css">
		<script src="js/slick/slick.js" type="text/javascript" charset="utf-8"></script>

		<!-- Jquery youtube Popup-->
		<link rel="stylesheet" type="text/css" href="<?php echo @_DIRCSS;?>
jquery_youtube_popup/css/lightbox.min.css">
		<script type="text/javascript" src="<?php echo @_DIRCSS;?>
jquery_youtube_popup/js/lightbox.js"></script>

		<!-- jQuery Plugin scripts -->
		<link rel="stylesheet" type="text/css" href="js/sliderkit-2015/css/sliderkit-core.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="js/sliderkit-2015/css/sliderkit-demos.css" media="screen" />

		<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
jqueryjustified/justifiedGallery.min.css" />
		<script src="<?php echo @_DIRCSS;?>
jqueryjustified/jquery.justifiedGallery.min.js"></script>

		 <!--Implementacion efecto Nieve Navidad-->
		<!--<script src="<?php echo @_DIRCSS;?>
efecto_nieve/snowstorm.js"></script> -->
        
	</head>		
    <body style=" background: rgba(230,230,230,1);" id="cuerp_int">
        <!-- Div efecto artificiasl 
        <div id="fireworks-template">
            <div id="fw" class="firework"></div>
            <div id="fp" class="fireworkParticle"><img src="<?php echo @_DIRCSS;?>
efecto_artificial/image/particles.gif" alt="" /></div>
        </div>
        <div id="fireContainer"></div>-->
		<!-- JS SDK -->
		<div id="fb-root"></div>

		<div class="secondaryBody" id="secondaryBody1">
			<h1><?php echo @_NOMBRESITIO;?>
</h1>
			<?php echo $_smarty_tpl->tpl_vars['tpl_cabezote']->value;?>

			<!--Panel de Navegación-->
			<!--<div id="social_network" class="hidden-sm hidden-xs">
				<div id="fb_red" class="red_social_item" style="width:55px"><a href="<?php echo @__FACEBOOK;?>
" title="Facebook" target="_blank" class=""><p class="hidden"><?php echo @__FACEBOOK;?>
</p></a></div>
				<div id="tw_red" class="red_social_item" style="width:55px"><a href="<?php echo @__TWITTER;?>
" title="Twitter" target="_blank" class=""><p class="hidden"><?php echo @__TWITTER;?>
</p></a></div>
				<div id="fk_red" class="red_social_item" style="width:55px"><a href="<?php echo @__FLICKR;?>
" title="Flickr" target="_blank" class=""><p class="hidden"><?php echo @__FLICKR;?>
</p></a></div>
				<div id="yt_red" class="red_social_item" style="width:55px"><a href="<?php echo @__YOUTUBE;?>
" title="Youtube" target="_blank" class=""><p class="hidden"><?php echo @__YOUTUBE;?>
</p></a></div>
				<div id="in_red" class="red_social_item" style="width:55px"><a href="<?php echo @__LINKEDIN;?>
" title="Google +" target="_blank" class=""><p class="hidden"><?php echo @__LINKEDIN;?>
</p></a></div>
				<div id="ig_red" class="red_social_item" style="width:55px"><a href="<?php echo @__INSTAGRAM;?>
" title="Instagram" target="_blank" class=""><p class="hidden"><?php echo @__INSTAGRAM;?>
</p></a></div>
				<div id="bg_red" class="red_social_item" style="width:55px"><a href="<?php echo @__BLOG;?>
" title="Blog" target="_blank" class=""><p class="hidden"><?php echo @__BLOG;?>
</p></a></div>
			</div>-->
			<?php if ($_smarty_tpl->tpl_vars['esHome']->value==1){?>
				<?php echo $_smarty_tpl->tpl_vars['tpl_contenido']->value;?>
 
			<?php }elseif($_smarty_tpl->tpl_vars['tipoCategoria']->value==22||$_smarty_tpl->tpl_vars['tipoCategoria']->value==21||$_smarty_tpl->tpl_vars['tipoCategoria']->value==20){?>
				<div class="container" style="min-height:900px;">
					<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12" style=" margin-top: 36px;">
						<!--Datos de Contenido -->
						<?php echo $_smarty_tpl->tpl_vars['tpl_contenido']->value;?>
 
						<?php if ($_smarty_tpl->tpl_vars['tipoCategoria']->value==22||$_smarty_tpl->tpl_vars['tipoCategoria']->value==21||$_smarty_tpl->tpl_vars['tipoCategoria']->value==20){?>
							</div>
							</div>
						<?php }?>
					</div>
					<div class="col-md-3 col-lg-3 hidden-sm hidden-xs">
						<div class="row"><?php echo $_smarty_tpl->tpl_vars['tpl_lateral_derecho']->value;?>
</div>
					</div>
				</div>
			<?php }else{ ?>
				<div class="container" style="min-height:900px;">
					<div class="col-md-3 col-lg-3 hidden-xs hidden-sm" style="margin-top: 60px; z-index: 1;">
						<div class="row"><?php echo $_smarty_tpl->tpl_vars['tpl_lateral']->value;?>
</div>
					</div>
					<div class="col-md-12 col-lg-6 col-sm-12 col-xs-12 back-grey" style=" margin-top: 36px;">
						<?php echo $_smarty_tpl->tpl_vars['tpl_contenido']->value;?>

					</div>

					
					<div class="col-md-3 col-lg-3 hidden-sm hidden-xs" style="margin-top: 60px; z-index: 1; left:40px;">
						<div class="row"><?php echo $_smarty_tpl->tpl_vars['tpl_lateral_derecho']->value;?>
</div>
					</div>
					
				</div>
			<?php }?>
			<?php echo $_smarty_tpl->tpl_vars['tpl_pie']->value;?>
				
		</div>
		<?php if ($_smarty_tpl->tpl_vars['version_imprimir']->value===true){?>
			<script type="text/javascript">
					if (confirm('Â¿Desea imprimir esta pÃ¡gina?')) self.print();
			</script>
		<?php }?>
        
			<script>
				setTimeout(function()
				{  
					$("html").removeAttr("class");
					$("#twitter-widget-0").prop('title', 'timeline_twitter-portal-web');
				}, 1000);
			</script>
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			  ga('create', '<?php echo @_GOOGLE_ANALYTICS;?>
', 'auto');
			  ga('send', 'pageview');

			</script>
			
<?php }} ?>