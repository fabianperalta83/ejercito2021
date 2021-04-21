<?php /* Smarty version Smarty-3.1.8, created on 2021-04-14 17:37:20
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_home.html" */ ?>
<?php /*%%SmartyHeaderCode:468865769602e7f875730e1-40982646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86b5fbf9f14ddbb6ca540841c0c0e791aa32f05a' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_home.html',
      1 => 1618421817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '468865769602e7f875730e1-40982646',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e7f87715a22_26319272',
  'variables' => 
  array (
    '_popup_sub' => 0,
    'url_popup_global' => 0,
    'noticias' => 0,
    'videos_home_ppal' => 0,
    'galeria_imagen' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e7f87715a22_26319272')) {function content_602e7f87715a22_26319272($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?><script src="<?php echo @_DIRJS;?>
cabezote.js"></script>
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
galleriffic/galleriffic-2.css" type="text/css">
<!-- Implermentación de Librerias para Redes Sociales -->
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/social-likes_birman.css" type="text/css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/style.css" type="text/css">
<script src="<?php echo @_DIRCSS;?>
redes_sociales/social-likes.min.js"></script>
<script src="https://momentjs.com/downloads/moment.min.js"></script>


<div  class="hidden-xs">
 <input type="hidden" name="url_youtube" id="url_youtube" value="<?php echo @_URL_YOUTUBE_POPUP;?>
">
 <input type="hidden" name="pop_youtube" id="pop_youtube" value="<?php echo $_smarty_tpl->tpl_vars['_popup_sub']->value;?>
">
 <input type="hidden" name="url_youtube_global" id="url_youtube_global" value="<?php echo $_smarty_tpl->tpl_vars['url_popup_global']->value;?>
">
 </div>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- SE AGREGA PARA QUE PUEDA FUNCIONAR EL WIDGET DE INSTAGRAM 16/05/2019-->

<!--<script src="<?php echo @_DIRRECURSOS;?>
js/jquery.instagramFeed.js" type="text/javascript"></script>-->
 <!-- SE AGREGA PARA QUE PUEDA FUNCIONAR EL WIDGET DE INSTAGRAM 16/05/2019-->

<!-- SE AÑADE SCRIPTS NUEVOS PARA QUE TRABAJEN CON LA VERSIÓN 3.3.1 EN EL CASO DE LA FUNCIONALIDAD DE FANCYBOX -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<!-- 23/05/2019-->

 <!-- SCRIPT PARA QUE PUEDA FUNCIONAR EL WIDGET DE INSTAGRAM 16/05/2019-->
<script>
$(window).on('load', function(){
        
        var InstagramUser = '<?php echo @_RED_INSTAGRAM;?>
';
    var Prueba = InstagramUser.replace("https://www.instagram.com/","");
    var UserInstagram = Prueba.replace("/","");

			$.instagramFeed({
				'username': UserInstagram,
				'container': "#instagram-widget",
				'display_profile': true,
				'display_biography': true,
				'display_gallery': true,
				'get_raw_json': false,
				'callback': null,
				'styling': true,
				'items': 100,
				'items_per_row': 3,
				'margin': 1 
			});
    });
</script> <!-- SCRIPT PARA QUE PUEDA FUNCIONAR EL WIDGET DE INSTAGRAM 16/05/2019-->


<h2 class="hidden" style="font-family: 'Fira Sans', sans-serif;">Sección Noticias</h2>
<div class="container-fluid back-grey margin-noticias" id="descatados2" style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  margin-bottom:0; background: rgba(230,230,230,1);z-index: 12;">
    <div class="container" style=" ">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <div class="" style="text-align: left;margin-top:20px;margin-bottom:10px; font-family: 'Roboto-Bold'; font-size: 36px;width: 100%;">
                
                    <?php if (@_EN_INGLES!=1){?>
                    <a href="index.php?idcategoria=<?php echo @_SECCIONES_RSS;?>
">
                    <div class="col-md-4 wrap8" style="font-size: 1em;font-weight: bold; color:black;" id="noticias_interes1">
                        Noticias de interés
                    </div>
                    </a>
                    
                    <?php }else{ ?>
                    <div class="col-md-7 wrap8" style="font-size: 1.2em;font-weight: bold;">
                        Latest news
                    </div>

                   
                    <?php }?>

                    <div class="col-md-8"style="height:3px; width: 60%;background: rgba(50,50,50,1); margin-top: 25px; margin-left:40px;"></div>
                
            </div>
        </div>
      
        
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <br>
        <br>
                <div class="col-xs-12 col-12 col-md-8 my-8">
                  
                   <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['idcategoria'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
#">

                        <div class="box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
                            <?php if ($_smarty_tpl->tpl_vars['noticias']->value[0][0]['imagen']==''){?>
                            <div class="box-default-camara" style="border-bottom: none !important;">
                                <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; height: auto;border-bottom: none !important;" alt="Imagen" id="id_imag_not3">
                            </div>
                            <?php }else{ ?>
                            <div class="img-noticias imgContainer" style="
                                 background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['imagen'];?>
')!important;
                                 background-size: cover!important;
                                 background-repeat: no-repeat!important;
                                 background-position: center center!important;
                                 width: 100%;
                                 height: 460px;
                                 border-bottom: none !important;
                                 " id="id_imag_not3">
                                <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['nombre'];?>
" style="border-bottom: none !important;">
                                <?php if (@_EN_INGLES!=1){?>
                                    <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">Noticia</div>
                                <?php }else{ ?>
                                    <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">News</div>
                                <?php }?> 
                                <!--                            <div class="fecha-noticias">
                                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                                </div>-->
                            </div>
                            <?php }?>
                            <!--<div class="fecha-noticias">
                                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                                                        </div>-->
                            <div class="content-noticia wrap9" style="background-color: white!important; margin:0px; height:178px;overflow: hidden;">
                                <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px; ">
                                     
                                    <?php if (@_EN_INGLES!=1){?>
                                        <p style="text-align: justify;font-size: 1em;color:black;" class="wrap8">
                                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[0][0]['fecha1'],"%e de %B %Y");?>

                                        </p>

                                    <?php }else{ ?>
                                        <p style="text-align: justify;font-size: 1em;text-transform: capitalize;color:black;" class="wrap8">
                                            <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[0][0]['fecha1'],"%m / %e / %Y");?>

                                        </p>
                                    <?php }?>
                                   
                                    <p style="text-align: justify;">
                                        <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['idcategoria'];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
#" class="wrap7" style="font-size: 1.2em;" id="nacional1">
                                            <strong class="wrap8" style="font-weight: bold;">
                                               <?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['nombre'];?>

                                           </strong>        
                                        </a>
                                    </p>
                                   <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['idcategoria'];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
#">
                                    <p style="text-align: justify;font-size: 0.7em;text-align: justify; color:black;" class="wrap8">

                                        <?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['entradilla'];?>

                                    </p>
                                    </a>
                                    <p style="text-align: justify;" hidden>
                                        <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['idcategoria'];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
#" class="wrap7" style="font-size: 0.8em; color: blue!important;" id="nacional1">
                                           <u> leer noticia </u>
                                        </a>
                                    </p>
                                </div>

                            </div>

                        </div>
                    </a>
                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][3]['idcategoria'];?>
<?php $_tmp5=ob_get_clean();?><?php echo $_tmp5;?>
#">
                    <div class= "box-noticias1" style="margin-top:-20px;">
                    <div class="col-sm-6 col-12 hidden-md hidden-sm hidden-xs" style="padding:0px; top:20px;">
                   
                    <div class=" box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;">
                        <?php if ($_smarty_tpl->tpl_vars['noticias']->value[0][3]['imagen']==''){?>
                        <div class="box-default-camara" style="border-bottom: none !important;">
                            <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; height: auto;border-bottom: none !important;" alt="Imagen">
                        </div>
                        <?php }else{ ?>
                        <div class="img-noticias imgContainer" style="
                             background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][3]['imagen'];?>
')!important;
                             background-size: cover!important;
                             background-repeat: no-repeat!important;
                             background-position: center center!important;
                             width: 100%;
                             height: 260px;
                             border-bottom: none !important;
                             ">
                            <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][3]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][3]['nombre'];?>
" style="border-bottom: none !important;">
                            
                            <!--                            <div class="fecha-noticias">
                                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                            </div>-->
                        </div>
                        <?php }?>
                        <!--<div class="fecha-noticias">
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                                                    </div>-->
                        
                         
                    </div>
                    </div>
                    <div class="col-sm-6 col-12 hidden-md hidden-sm hidden-xs"style="padding:0px; top:20px;" >
                    
                    <div class="content-noticia wrap9" style="background-color: white!important; margin:0px; padding: 0px;height: 260px;overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                                  <div class="" style="bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;width:75px;margin-top:-10px;margin-bottom:10px;">Noticia</div>

                                <?php if (@_EN_INGLES!=1){?>
                                    <p class="wrap8" style="text-align: justify;font-size: 1em;color:black;">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[0][3]['fecha1'],"%e de %B %Y");?>

                                    </p>

                                <?php }else{ ?>
                                    <p class="wrap8" style="text-align: justify;font-size: 1em;text-transform: capitalize;color:black;">
                                        <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[0][3]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                <?php }?>
                                
                                <p style="text-align: justify; margin-bottom:20px;">
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][3]['idcategoria'];?>
<?php $_tmp6=ob_get_clean();?><?php echo $_tmp6;?>
#" class="wrap7" style="font-size: 1.2em;" id="nacional1">
                                        <strong class="wrap8" style="font-weight: bold;">
                                         
                                          <?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][3]['nombre'];?>

                                        </strong>        
                                    </a>
                                </p>

                               
                                <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][3]['idcategoria'];?>
<?php $_tmp7=ob_get_clean();?><?php echo $_tmp7;?>
#">
                                <p class="wrap8" style="text-align: justify;font-size: 0.8em;color: black;">

                                    <?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][3]['entradilla'];?>

                                </p>
                                </a>
                                <p style="text-align: justify;" hidden>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][3]['idcategoria'];?>
<?php $_tmp8=ob_get_clean();?><?php echo $_tmp8;?>
#" class="wrap7" style="font-size: 0.8em; color: blue!important;" id="nacional1">
                                       <u> leer noticia </u>
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
                </a>
                </div>
                
                <div class="col-xs-12 col-12 col-md-4 my-4" style="margin-top:0px!important;">
                   <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][1]['idcategoria'];?>
<?php $_tmp9=ob_get_clean();?><?php echo $_tmp9;?>
#">
                    <div class="box-noticias1 box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:0px;">
                        <?php if ($_smarty_tpl->tpl_vars['noticias']->value[0][1]['imagen']==''){?>
                        <div class="box-default-camara" style="border-bottom: none !important;">
                            <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; height: auto;border-bottom: none !important;" alt="Imagen">
                        </div>
                        <?php }else{ ?>
                        <div class="img-noticias imgContainer" style="
                             background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][1]['imagen'];?>
')!important;
                             background-size: cover!important;
                             background-repeat: no-repeat!important;
                             background-position: center center!important;
                             width: 100%;
                             height: 220px;
                             border-bottom: none !important;
                             ">
                            <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][1]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][1]['nombre'];?>
" style="border-bottom: none !important;">
                            <?php if (@_EN_INGLES!=1){?>
                                <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color: #90240D; font-size: 1em;">Noticia</div>
                            <?php }else{ ?>
                                <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">News</div>
                            <?php }?> 
                            <!--                            <div class="fecha-noticias">
                                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                            </div>-->
                        </div>
                        <?php }?>
                        <!--<div class="fecha-noticias">
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                                                    </div>-->
                        <div class="content-noticia wrap9" style="background-color: white!important; margin:0px; padding: 0px;height:230px;overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                                 
                                <?php if (@_EN_INGLES!=1){?>
                                    <p class="wrap8" style="text-align: justify;font-size: 1em;color:black;">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[0][1]['fecha1'],"%e de %B %Y");?>

                                    </p>

                                <?php }else{ ?>
                                    <p class="wrap8" style="text-align: justify;font-size: 1em;text-transform: capitalize;color:black;">
                                        <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[0][1]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                <?php }?>
                                
                                <p style="text-align: justify;">
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][1]['idcategoria'];?>
<?php $_tmp10=ob_get_clean();?><?php echo $_tmp10;?>
#" class="wrap7" style="font-size: 1.2em;" id="nacional1">
                                        <strong class="wrap8" style="font-weight: bold;">
                                           <?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][1]['nombre'];?>

                                        </strong>        
                                    </a>
                                </p>

                               
                                <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][1]['idcategoria'];?>
<?php $_tmp11=ob_get_clean();?><?php echo $_tmp11;?>
#">
                                <p class="wrap8" style="text-align: justify;font-size: 0.8em; color:black;">

                                    <?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][1]['entradilla'];?>

                                </p>
                                </a>
                                <p style="text-align: justify;" hidden>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][1]['idcategoria'];?>
<?php $_tmp12=ob_get_clean();?><?php echo $_tmp12;?>
#" class="wrap7" style="font-size: 0.8em; color: blue!important;" id="nacional1">
                                       <u> leer noticia </u>
                                    </a>
                                </p>
                            </div>

                        </div>
                    

                    </div>
                   
                </a>
                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][2]['idcategoria'];?>
<?php $_tmp13=ob_get_clean();?><?php echo $_tmp13;?>
#">
                    <div class="box-noticias1 box-noticias box-noticias-bicentenario  alto_contraste hidden-md hidden-sm hidden-xs " style="background-color: transparent !important; margin-top: -10px">
                        <?php if ($_smarty_tpl->tpl_vars['noticias']->value[0][2]['imagen']==''){?>
                        <div class="box-default-camara" style="border-bottom: none !important;">
                            <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; height: auto;border-bottom: none !important;" alt="Imagen">
                        </div>
                        <?php }else{ ?>
                        <div class="img-noticias imgContainer" style="
                             background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][2]['imagen'];?>
')!important;
                             background-size: cover!important;
                             background-repeat: no-repeat!important;
                             background-position: center center!important;
                             width: 100%;
                             height: 220px;
                             border-bottom: none !important;
                             ">
                            <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][2]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][2]['nombre'];?>
" style="border-bottom: none !important;">
                            <?php if (@_EN_INGLES!=1){?>
                                <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">Noticia</div>
                            <?php }else{ ?>
                                <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color: #90240D; font-size: 1em;">News</div>
                            <?php }?> 
                            <!--                            <div class="fecha-noticias">
                                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                            </div>-->
                        </div>
                        <?php }?>
                        <!--<div class="fecha-noticias">
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                                                    </div>-->
                         <div class="content-noticia wrap9" style="background-color: white!important; margin:0px;  padding: 0px;height:232px; overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                                 
                                <?php if (@_EN_INGLES!=1){?>
                                    <p class="wrap8" style="text-align: justify;font-size: 1em;color:black;">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[0][2]['fecha1'],"%e de %B %Y");?>

                                    </p>

                                <?php }else{ ?>
                                    <p class="wrap8" style="text-align: justify;font-size: 1em;text-transform: capitalize;color:black;">
                                        <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[0][2]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                <?php }?>
                                
                                <p style="text-align: justify;">
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][2]['idcategoria'];?>
<?php $_tmp14=ob_get_clean();?><?php echo $_tmp14;?>
#" class="wrap7" style="font-size: 1.2em;" id="nacional1">
                                        <strong class="wrap8" style="font-weight: bold;"> <?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][2]['nombre'];?>
</strong>

                                        
                                    </a>
                                </p>

                                
                                <p class="wrap8" style="text-align: justify;font-size: 0.8em;color:black;">

                                    <?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][2]['entradilla'];?>

                                </p>

                                <p style="text-align: justify;" hidden>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][2]['idcategoria'];?>
<?php $_tmp15=ob_get_clean();?><?php echo $_tmp15;?>
#" class="wrap7" style="font-size: 0.8em; color: blue!important;" id="nacional1">
                                       <u> leer noticia </u>
                                    </a>
                                </p>
                            </div>

                        </div>

                    </div>

                    </a>


                </div>

            
           
        </div>


        <div class="col-md-12 col-lg-12 col-sm-12 col-12" id="seccion2"style="text-align: center; padding: 30px 0px;" >
  
          <button type="button" onclick="window.location.href='index.php?idcategoria=<?php echo @_HOME_NOTICIAS;?>
'" class="btn-danger" style="background:red; padding:10px; border:none; border-radius: 8px;">Ver todas las noticias</button>
      </div>
    </div>
</div>






<?php if (@_URL_BOTON_CHAT!=''){?>
<div id="forolink" style="z-index: 12;">
  <a href="javascript:WindowOpener2('<?php echo @_URL_BOTON_CHAT;?>
')" title="Chat de dudas y consultas?" style="color: white; "><?php echo @NOMBRE_CHAT;?>
</a>
</div>

 <?php }?>

<!--Seccion Multimedia-->
<div class="container-fluid back-grey margin-noticias" id="descatados23" style="font-family: 'Fira Sans', sans-serif; margin-top:-2px; margin-bottom:0px; padding-bottom:40px;  background: rgba(50,50,50,1);">
    <div class="container" style="">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <div class="" style="text-align: left;margin-top:20px;margin-bottom:10px; font-family: 'Roboto-Bold'; font-size: 36px;width: 100%;">
                
                    <?php if (@_EN_INGLES!=1){?>
                   
                    <div class="col-md-4" style="color:white; width:300px;font-size: 1em;" id="title-galeria">
                        Canal Multimedia
                    </div>
                    
                    
                    <?php }else{ ?>
                    <div class="col-md-5" style="font-size: 1em;font-weight: bold;color: white; " id="title-galeria">
                        Multimedia
                    </div>

                    <?php }?>

                    <div class="col-md-8  hidden-md hidden-sm hidden-xs"style="height:2px; width: 100%;background: rgba(250,250,250,1); top:30px; left:50px;"></div>
                
            </div>

             <div class="col-md-12 hidden-xs hidden-sm" style="max-height: 200px; padding: 16px 0px;">
                
                 
                  <a id="link">
                  <img id="imag_stream" class="" width="100%" height="100%" src="recursos_user/imagenes/Banners/imag_video_enc_play1.png" alt="Emisora" style="max-height:80px; padding: 0px;">
                  </a>
                  <audio id="myAudio">
                   
                    <source src="https://radio35.virtualtronics.com:20023/stream?type=.mp3" type="audio/mpeg">
                    
                  </audio>
                 
                  <script type="text/javascript">
                  var x = document.getElementById("myAudio"); 
                  var playing_stream = true;

                  function script() {
                    if (playing_stream){
                     

                            playing_stream = false;
                            document.getElementById("imag_stream").src ="recursos_user/imagenes/Banners/imag_video_enc_pause1.png";
                            
                            x.play(); 

                            
                    }else{
                            
                            playing_stream = true;
                            document.getElementById("imag_stream").src ="recursos_user/imagenes/Banners/imag_video_enc_play1.png";
                            x.pause();

                            
                    }
                     
                  };

                  document.getElementById('link').onclick = function () {
                      script();
                  };
                </script>
                

            </div>
            

            <div class="col-md-12 hidden-md hidden-lg hidden-xl" style="max-height: 200px; padding: 16px 0px;">
                
                 
                  <a id="link1">
                  <img id="imag_stream1" class="" width="100%" height="100%" src="recursos_user/imagenes/Banners/imag_video_enc_play2.png" alt="Emisora" style="max-height:80px; padding: 0px;">
                  </a>
                  <audio id="myAudio1">
                   
                    <source src="https://radio35.virtualtronics.com:20023/stream?type=.mp3" type="audio/mpeg">
                    
                  </audio>
                 
                  <script type="text/javascript">
                  var x = document.getElementById("myAudio1"); 
                  var playing_stream1 = true;

                  function script1() {
                    if (playing_stream1){
                          
                            playing_stream1 = false;
                            document.getElementById("imag_stream1").src ="recursos_user/imagenes/Banners/imag_video_enc_pause2.png";
                            
                            x.play(); 

                            
                    }else{
                            
                            playing_stream = true;
                            document.getElementById("imag_stream1").src ="recursos_user/imagenes/Banners/imag_video_enc_play2.png";
                            x.pause();

                            
                    }
                     
                  };

                  document.getElementById('link1').onclick = function () {
                      script1();
                  };
                </script>
                

            </div>



            <div class="row" id="load_video" style="width:100%; margin:0px;">
              <div class="col-md-6"  style="padding:0; margin:0;padding-bottom:0px;">
                <div class="" style="height:320px;">
                  <!--<?php echo $_smarty_tpl->tpl_vars['videos_home_ppal']->value[0]['descripcion'];?>
-->
                  
                 <div id="pantalla_videos" class="pantalla_dv">
                        <div class="slider-videos-for">
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['name'] = 'idMultiVideo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['videos_home_ppal']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['max'] = (int)4;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['total']);
?>
                                <div class="item_multi_video" id="itemMultiVideo_<?php echo $_smarty_tpl->tpl_vars['videos_home_ppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idMultiVideo']['index']]['idcategoria'];?>
" style="height:320px!important">
                                    <?php if ($_smarty_tpl->tpl_vars['videos_home_ppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idMultiVideo']['index']]['tipo_video']=='flv'||$_smarty_tpl->tpl_vars['videos_home_ppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idMultiVideo']['index']]['tipo_video']=='mp4'){?> 
                                        <video loop="true" muted="muted">
                                            <source src="<?php echo @_URL;?>
/<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['videos_home_ppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idMultiVideo']['index']]['descripcion'];?>
" type="video/mp4">
                                                Your browser does not support the video tag.
                                        </video>
                                    <?php }else{ ?>
                                        <?php echo $_smarty_tpl->tpl_vars['videos_home_ppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idMultiVideo']['index']]['descripcion'];?>

                                    <?php }?>
                                </div>
                            <?php endfor; endif; ?>
                        </div>
                    </div>
                </div>

                 <button type="button" onclick="window.location.href='https://www.youtube.com/channel/UCcSa3Es-fSXrBWistM6sYRQ'" class="btn-danger" style="background:red; padding:10px; border:none; border-radius: 8px; margin-top:10px;">Ver todos los videos</button>
              </div>

              <style>
                .container1 {
                  
                }

                .container2 {
                  
                }

                .container3 {
                  
                }

                .container4 {
                  
                }

                .image1 {
                  width: 100%; 
                  height:160px;
                  border: 1px solid #323232;
                }

                .image2 {
                  width: 100%; 
                  height:160px;
                  border: 1px solid #323232;
                }

                .image3 {
                  width: 100%; 
                  height:160px;
                  border: 1px solid #323232;
                }

                .image4 {
                  width: 100%; 
                  height:160px;
                  border: 1px solid #323232;
                }

                .overlay1 {
                  position: absolute;
                  top: 0;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  height:160px;
                  width: 100%;
                  opacity: 0;
                  transition: .5s ease;
                  background-color: #7C0808;
                }

                .overlay2 {
                  position: absolute;
                  top: 160px;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  height:160px;
                  width: 100%;
                  opacity: 0;
                  transition: .5s ease;
                  background-color: #7C0808;
                }

                .overlay3 {
                  position: absolute;
                  top: 0;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  height:160px;
                  width: 100%;
                  opacity: 0;
                  transition: .5s ease;
                  background-color: #7C0808;
                }

                .overlay4 {
                  position: absolute;
                  top: 160px;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  height:160px;
                  width: 100%;
                  opacity: 0;
                  transition: .5s ease;
                  background-color: #7C0808;
                }

                .container1:hover .overlay1 {
                  opacity: 0.8;
                }

                .container2:hover .overlay2 {
                  opacity: 0.8;
                }
                .container3:hover .overlay3 {
                  opacity: 0.8;
                }
                .container4:hover .overlay4 {
                  opacity: 0.8;
                }

                

                .text1 {
                  color: white;
                  font-size: 20px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  -ms-transform: translate(-50%, -50%);
                  font-family: 'Roboto';
                }

                .text2 {
                  color: white;
                  font-size: 20px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  -ms-transform: translate(-50%, -50%);
                  font-family: 'Roboto';
                }

                .text3 {
                  color: white;
                  font-size: 20px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  -ms-transform: translate(-50%, -50%);
                  font-family: 'Roboto';
                }

                .text4 {
                  color: white;
                  font-size: 20px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  -ms-transform: translate(-50%, -50%);
                  font-family: 'Roboto';
                }
                </style>


              <div class="col-md-6" style="padding:0; margin:0; min-height: 300px; padding-bottom:30px;">
                 <div class="col-md-6" style="padding:0; margin:0; ">
                    <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[0]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[0]['nombre'];?>
">
                        <div class="container1">
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[0]['imagen'];?>
&w=320" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[0]['nombre'];?>
" class="image1" style="width: 100%;border-left: 5px solid #323232;border-bottom: 5px solid #323232;">
                        <div class="overlay1">
                          <div class="text1"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagen']->value[0]['nombre'],40,"...",true);?>
</div>
                        </div>
                      </div>
                    </a>
                    <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[0]['idcategoria'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[0]['nombre'];?>
">
                        <div class="container2">
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[2]['imagen'];?>
&w=320" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[2]['nombre'];?>
"  class="image2" style="width: 100%;border-left: 5px solid #323232;">
                        <div class="overlay2">
                          <div class="text2"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagen']->value[2]['nombre'],40,"...",true);?>
</div>
                        </div>
                      </div>
                    </a>
                </div>
                 <div class="col-md-6 hidden-xs hidden-sm" style="padding:0; margin:0; ">
                     <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[1]['idcategoria'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[1]['nombre'];?>
">
                        <div class="container3">
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[1]['imagen'];?>
&w=320" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[1]['nombre'];?>
"  class="image3" style="width: 100%;border-left: 5px solid #323232;border-bottom: 5px solid #323232;">
                        <div class="overlay3">
                          <div class="text3"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagen']->value[1]['nombre'],40,"...",true);?>
</div>
                        </div>
                      </div>
                    </a>

                     <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[3]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[3]['nombre'];?>
">
                        <div class="container4">
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[3]['imagen'];?>
&w=320" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[3]['nombre'];?>
"  class="image4" style="width: 100%;border-left: 5px solid #323232;">
                        <div class="overlay4">
                          <div class="text4"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagen']->value[3]['nombre'],40,"...",true);?>
</div>
                        </div>
                      </div>
                    </a>
                </div>

                 <button type="button" onclick="window.location.href='index.php?idcategoria=<?php echo @_GALERIA_FOTOGRAFICA;?>
'" class="btn-danger" style="background:red; padding:10px; border:none; border-radius: 8px;margin-top:10px;">Ver galeria completa</button>
                
                
              </div>
            </div>
            <style type="text/css">
              
              .home-videos-img {
                height: 50%;
                position: relative;
                overflow: hidden;
              }

              .home-videos-img a {
                display: block;
                width: 100%;
                height: 100%;
              }

              .home-videos-img:first-child img {
                object-position: center 24%;
              }

              .home-videos-img:last-child img {
                object-position: center bottom;
              }
            </style>

        </div>
      </div>
    </div>


<div class="container-fluid my-5" id="estr_4ejc">
    <div class="row">
        <div class="container">
            <div class="row">
                 <?php if (@_EN_INGLES!=1){?>
                    
                    <div class="col-md-2 wrap8" style="font-size: 2em;font-weight: bold; color:black; margin-bottom:30px;" id="title_recursos">
                        Recursos
                    </div>
                    
                    
                    <?php }else{ ?>
                    <div class="col-md-2 wrap8" style="font-size: 1em;font-weight: bold;" id="title_recursos">
                        Means
                    </div>

                    
                    <?php }?>

                    <div class="col-md-10"style="height:2px; min-width: 500px;background: rgba(50,50,50,1); margin-top:20px;width:100%; margin-bottom:30px;"></div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="https://webapp.mindefensa.gov.co/Iwebsiath/appws_Login/appws_Login.php ">
                        <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="_templates/DEFAULT2018/recursos/images/Group 25.png" alt="SIATH">
                    

                    <div class="wrap8" style="margin-top: 20px; text-align:center; font-weight:bold; color:black;">
                       Sistema de información y Administración de Talentos Humanos (SIATH)
                    </div>
                    </a>
                     <a target="_blank" href="https://webapp.mindefensa.gov.co/Iwebsiath/appws_Login/appws_Login.php">
                        <div style="margin-top: 10px; text-align:center;" hidden>
                            <u>Ingresar al SIATH</u>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="http://www.pqr.mil.co">
                         <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="_templates/DEFAULT2018/recursos/images/Group 28.png" alt="PQRS">
                    

                     <div  class="wrap8" style="margin-top: 20px; text-align:center; font-weight:bold; color:black;">
                        Sistema PQRS (Peticiones, Quejas, Reclamos y Sugerencias)
                    </div>
                    
                    </a>
                     <a target="_blank" href="http://www.pqr.mil.co">
                        <div style="margin-top: 10px; text-align:center;" hidden>
                            <u>Ir al PQRS</u>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="https://correo.buzonejercito.mil.co/?loginOp=logout">
                         <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="_templates/DEFAULT2018/recursos/images//Group 29.png" alt="CORREO">
                    

                     <div class="wrap8" style="margin-top: 20px; text-align:center; font-weight:bold; color:black;">
                        Correo electrónico - Ejército Nacional de Colombia
                    </div>
                    </a>
                    <br>
                     <a target="_blank" href="https://correo.buzonejercito.mil.co/?loginOp=logout">
                        <div style="margin-top: 10px; text-align:center;" hidden>
                            <u>Ingresar al correo</u>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="https://fovid2.ejercito.mil.co/Fovid-2.0/faces/seg_login.xhtml">
                         <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="_templates/DEFAULT2018/recursos/images//Group 30.png" alt="FOVID">
                    


                     <div class="wrap8" style="margin-top: 20px; text-align:center; font-weight:bold; color:black;">
                        Folio de Vida Digital - Ejército Nacional de Colombia
                    </div>
                    </a>
                     <a target="_blank" href="https://fovid2.ejercito.mil.co/Fovid-2.0/faces/seg_login.xhtml">
                        <br>
                        <div style="margin-top: 10px; text-align:center;" hidden>
                            <u>Ingresar al FOVID</u>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>    
</div>


<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row" style="margin-bottom: 30px;">
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="http://es.presidencia.gov.co/Paginas/portada.aspx">
                        <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="<?php echo @_DIRIMAGES_USER;?>
Destacados_Pie_Pagina/1.png" alt="Presidencia">
                    </a>
                </div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="https://www.mindefensa.gov.co/irj/portal/Mindefensa">
                         <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="<?php echo @_DIRIMAGES_USER;?>
Destacados_Pie_Pagina/4.png" alt="Presidencia">
                    </a>
                </div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="https://cgfm.mil.co/en">
                         <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="<?php echo @_DIRIMAGES_USER;?>
Destacados_Pie_Pagina/2.png" alt="Presidencia">
                    </a>
                </div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="https://www.gov.co">
                         <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="<?php echo @_DIRIMAGES_USER;?>
Destacados_Pie_Pagina/3.png" alt="Presidencia">
                    </a>
                </div>
            </div>
        </div>
    </div>    
</div>





<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" >

	<script type="text/javascript">
        function showEntidades(){
            if(document.getElementById('estructura_ejercito').style.display=='none'){ 
                $('#estructura_ejercito').slideToggle('slow');
            }else{
                $('#estructura_ejercito').slideToggle('hide');
            }
        }
    </script>
	<script language="JavaScript">
		function Abrir_ventana(pagina) {
			var opciones = "toolbar=false,location=false,directories=false,status=false,menubar=false,scrollbars=false,resizable=false,width=350px,height=130px,top=false,left=false";
			window.open(pagina,"",opciones);
		}
	</script>
	<script type="text/javascript"> 		
		/*jQuery(document).ready(function(){
			$("#mygallery").justifiedGallery({
				rowHeight : 200,
			    lastRow : 'justify',
			    margins : 3,
			    sizeRangeSuffixes : {
				      500: '_t',
				      2000: '_m'
				  }
			}).on('jg.complete', function () {
			    $(this).find('a').colorbox({
			        maxWidth : '80%',
			        maxHeight : '80%',
			        opacity : 0.8,
			        transition : 'elastic',
			        current : ''
			    });
			});
		});*/
	</script>

    <script type="text/javascript">
        // Slide Destacados
        $('.mySlider1').slick({
          slidesToShow: 3,
          slidesToScroll: 3,
          autoplay: false,
          arrows: true,
          nextArrow: '<div class="slick-next right-minislide-arrow"></div>',
          prevArrow: '<div class="slick-prev left-minislide-arrow"></div>',
          dots: true,
          speed: 2000,
          autoplaySpeed: 3000,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="slick-next right-minislide-arrow"></div>',
                prevArrow: '<div class="slick-prev left-minislide-arrow"></div>',
                dots: false
              }
            },
            {
              breakpoint: 900,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="slick-next right-minislide-arrow"></div>',
                prevArrow: '<div class="slick-prev left-minislide-arrow"></div>',
                dots: false
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="slick-next right-minislide-arrow"></div>',
                prevArrow: '<div class="slick-prev left-minislide-arrow"></div>',
                dots: false
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="slick-next right-minislide-arrow"></div>',
                prevArrow: '<div class="slick-prev left-minislide-arrow"></div>',
                dots: false
              }
            }
          ]
        });
    </script>

     <script language="JavaScript">
        function WindowOpener2(fileName) 
        {
            var aWin = window.open(fileName+"","ventana","toolbar=no,location=no,resizable=no,scrollbar=no,width=600,height=375,top=0,left=0");
            resizeTo(345, 267);
            moveTo(screen.width-345, screen.height-267);
        }
    </script>


	<!--<script>
		var playing = true;
		var pauseButton = document.getElementById('pauseButton');

		function pauseHomeslider(){
			$('#pauseButton').removeClass('fa fa-pause');
			$('#pauseButton').toggleClass('fa fa-play');
			playing  = false;
			$('#home-silder2').carousel('pause');
		}

		function playHomeslider(){	
			$('#pauseButton').removeClass('fa fa-play');
			$('#pauseButton').toggleClass('fa fa-pause');
			playing = true;
			$('#home-silder2').carousel('cycle');
		}

		pauseButton.onclick = function(){
			if (playing){
				pauseHomeslider();
			}else{
				playHomeslider();
			}
		}
	</script>-->
	<script type="text/javascript">
        function showDiv(nombre){
            if (nombre == "nacional") {
                $("#nacional").css("display", "block");
                $("#actualidad").css("display", "none");
                $("#internacional").css("display", "none");
                $("#title-nacional").addClass("active");
                $("#title-internacional").removeClass("active");
                $("#title-actualidad").removeClass("active");
            }
            if (nombre == "actualidad") {
                $("#nacional").css("display", "none");
                $("#actualidad").css("display", "block");
                $("#internacional").css("display", "none");
                $("#title-actualidad").addClass("active");
                $("#title-internacional").removeClass("active");
                $("#title-nacional").removeClass("active");
            }
            if (nombre == "internacional") {
                $("#nacional").css("display", "none");
                $("#actualidad").css("display", "none");
                $("#internacional").css("display", "block");
                $("#title-internacional").addClass("active");
                $("#title-nacional").removeClass("active");
                $("#title-actualidad").removeClass("active");
            }
        }
        function showBox(nombre){
            if (nombre == "videos") {
                $("#videos").css("display", "block");
                $("#galeria").css("display", "none");
                $("#audio").css("display", "none");
                $("#title-videos").addClass("active");
                $("#title-audio").removeClass("active");
                $("#title-galeria").removeClass("active");
            }
            if (nombre == "galeria") {
                $("#videos").css("display", "none");
                $("#galeria").css("display", "block");
                $("#audio").css("display", "none");
                $("#title-galeria").addClass("active");
                $("#title-audio").removeClass("active");
                $("#title-videos").removeClass("active");
            }
        }
    </script>


	<script type="text/javascript">
	     //var a = jQuery.noConflict();
		$(window).load(function(){ //$(window).load() must be used instead of $(document).ready() because of Webkit compatibility						
			/*---------------------------------
			 *	Example #01
			 *---------------------------------*/
			$(".delaycaptions-01").sliderkit({
				circular:true,
				mousewheel:false,
				keyboard:true,
				shownavitems:4,
				navclipcenter:true,
				auto:true,
				panelfxspeed:500,
				delaycaptions:{
					delay:500, // must be equal or higher than panelfxspeed
					position:'bottom',
					transition:'sliding',
					duration:300, // must be less equal or higher than panelfxspeed
					easing:'easeOutExpo'
				}
			});
		});			
	</script>


	<script type="text/javascript">   
		$(window).load(function(){
		  	$('.flexslider').flexslider({
				animation: "slide",
				start: function(slider){
				  $('body').removeClass('loading');
				}
		  	});
		});
		$(function() {
		    $('.carousel_multimedia').each(function(){
		        $(this).carousel({
		            interval: 4000
		        });
		    });
		});
	</script>


    <script type="text/javascript">
        // Wait until the DOM has loaded before querying the document
        $(document).ready(function(){
            $('ul.tabs').each(function(){
                // For each set of tabs, we want to keep track of
                // which tab is active and it's associated content
                var $active, $content, $links = $(this).find('a');
                // Use the first link as the initial active tab
                $active = $links.first().addClass('active');
                $content = $($active.attr('href'));
                // Hide the remaining content
                $links.not(':first').each(function () {
                    $($(this).attr('href')).hide();
                });
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    // Make the old tab inactive.
                    $active.removeClass('active');
                    $content.hide();
                    // Update the variables with the new link and content
                    $active = $(this);
                    $content = $($(this).attr('href'));
                    // Make the tab active.
                    $active.addClass('active');
                    $content.show();
                    // Prevent the anchor's default click action
                    e.preventDefault();
                });
            });
            
            // var url = "https://svera.micrositios.us/EJERCITOOO/_templates/DEFAULT2016/recursos/css/jquery_youtube_popup/temporizador_popup.php";
            
            // var url = "<?php echo @_DIRCSS;?>
jquery_youtube_popup/temporizador_popup.php";
           ejecutar_popup();
           /* var url = "../tools/temporizador_popup.php";
			retorno = new Array();
			var ejecutar_ajax = $.ajax
			({		
				async:true, 	
				url: url,
				type: "POST",
				data: 
				{
					funcion: 1
				},
				cache : false,	

				success: function(s)
				{			
					retorno = JSON.parse(s);	
					var resultado = retorno[0];
					if(resultado == 1)
					{
						ejecutar_popup();
					}
				},
				error: function(e)
				{
					ejecutar_ajax.abort();
				}
			});*/
        });
        //Audio
        function setVariableAudio(theValue){
            if (theValue != ''){
                document['mp3Custom'].SetVariable('song.text', 'recursos_user' + theValue);
            }else{
                alert("No tiene un archivo de audio asociado.");
            }
        }

        function ejecutar_popup()
        {           
            var down = document.getElementById('GFG_DOWN');

            var url = "";
            var url_youtube_global = document.getElementById("url_youtube_global").value;
            var pop_youtube = document.getElementById("pop_youtube").value;
           

            

            if (pop_youtube != "")
            {
                url = pop_youtube;
            }
            
            if (url_youtube_global != "")
            {
                url = url_youtube_global;
            }

            if (url != "")
            {
                if (window.innerHeight > 540)
                {
                    var margintop = (window.innerHeight - 540) / 2;
                }
                else
                {
                    var margintop = 100;
                }

                var ventana_ancho = $(window).width();

                if (ventana_ancho > 1024)
                {
                    var ifr = '<iframe src="" title="Emisora" width="640" height="480" id="slvj-video-embed" style="border:0;"></iframe>';
                    var close = '<div id="slvj-close-icon"></div>';
                    var lightbox = '<div class="slvj-lightbox" style="margin-top: 23%">';
                    var back = '<div id="slvj-back-lightbox">';
                    var bclo = '<div id="slvj-background-close" style="background-color:rgba(0,0,0,0.5)">';
                    var win = '<div id="slvj-window">';
                    var end = '</div></div></div></div>';

                    $('body').append(win + bclo + back + lightbox + close + ifr + end);
                    $('#slvj-window').hide();

                    $('#slvj-window').fadeIn();
                    $('#slvj-video-embed').attr('src', url);

                    $('#slvj-close-icon').click(function()
                    {
                        $('#slvj-window').remove();
                        $('#slvj-window').fadeOut($.simpleLightboxVideo, function()
                        {
                            $(this).remove();
                        });
                    });

                    $('#slvj-background-close').click(function()
                    {
                        $('#slvj-window').remove();
                        $('#slvj-window').fadeOut($.simpleLightboxVideo, function()
                        {
                            $(this).remove();
                        });
                    });

                    // Handle ESC key (key code 27)
                    document.addEventListener('keyup', function(e) {
                        if (e.keyCode == 27) {
                            $('#slvj-window').remove();
                            $('#slvj-window').hide();
                        }
                    });

                    return false;   
                }
            }
            
        }


        $(window).on("load", function() {
      //myfunction3();
    });

    $(function() {
     // myfunction3();
    });   

    function myfunction3() {

       
       
      }
    </script>
     <script type="text/javascript">

    	function converDate(timestamp) {
		 var date = new Date(timestamp*1000);
		   var _mes=date.getMonth()+1; //getMonth devuelve el mes empezando por 0
		   var _dia=date.getDate(); //getDate devuelve el dia del mes
		   var _anyo=date.getFullYear();
		   var _hour = date.getHours();
		   var _min = date.getMinutes();
		   var _seg = date.getSeconds();

		 return _anyo+'-'+_mes+'-'+_dia+' '+_hour+':'+_min+':'+_seg;
		}
		function getCurrentDate() {
		   var dt = new Date();

		   // Display the month, day, and year. getMonth() returns a 0-based number.
		   var month = dt.getMonth()+1;
		   var day = dt.getDate();
		   var year = dt.getFullYear();
		   var hour = dt.getHours();
		   var min = dt.getMinutes();
		   var seg = dt.getSeconds();
		   return year + '-' + month + '-' + day+' '+hour+':'+min+':'+seg;
		}
        /*$.ajax({
                url: 'https://api.instagram.com/v1/users/self/media/recent/?access_token=499169839.1677ed0.5cc4d150067646a7a967c44debaf2db3',
                type: 'GET',
                dataType: 'json',
            })*/
            
            .done(function(data) {

                $.each(data.data, function(index, val) {

                	var fecha1 = moment(converDate(val.created_time));
					var fecha2 = moment(getCurrentDate());

					tiempo = fecha2.diff(fecha1, 'hours');

					if(tiempo < 1){
						tiempo = 'HACE '+fecha2.diff(fecha1,'minutes')+' MINUTOS';
					}
					if(tiempo < 23){

						tiempo = 'HACE '+fecha2.diff(fecha1, 'hours')+' HORAS';

					}
					if(tiempo > 23){

						tiempo = 'HACE '+fecha2.diff(fecha1, 'days')+' D&iacute;AS';

					 }
                    $('#instagram-feed').append('<div><a href="https://www.instagram.com/'+val.user.username+'" target="_blank"><img class="img-cuenta" src="'+val.user.profile_picture+'"/><div><span class="titulo">'+val.user.username+'</span></div></a></div><div class="div-container"><br><div class="tiempo">'+tiempo+'</div><a href="'+val.link+'" target="_blank"><img class="img-micros" src="'+val.images.standard_resolution.url+'" />'
                    +'<div class="redes"><span class="glyphicon glyphicon-heart-empty" style="color:#000;"></span><span class="like-text">'+val.likes.count+'</span><span class="glyphicon glyphicon-comment" style="color:#000;"></span><span class="coments-text">'+val.comments.count+'</span></div>'
                    +'<div class="caption-text">'+val.caption.text+'</div>'
                    +'</div></a>')


                });
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        </script>

        <script>
          $(document).ready(function() {
              $('a[href="#galeria"]').click(function() {
                var destino = $(this.hash);
                if (destino.length == 0) {
                  destino = $('a[name="' + this.hash.substr(1) + '"]');
                }
                if (destino.length == 0) {
                  destino = $('html');
                }
                $('html, body').animate({ scrollTop: destino.offset().top }, 500);
                return false;
              });

              $('a[href="#seccion3"]').click(function() {
                var destino = $(this.hash);
                if (destino.length == 0) {
                  destino = $('a[name="' + this.hash.substr(1) + '"]');
                }
                if (destino.length == 0) {
                  destino = $('html');
                }
                $('html, body').animate({ scrollTop: destino.offset().top }, 500);
                return false;
              });


              $('a[href="#home-silder1"]').click(function() {
                var destino = $(this.hash);
                if (destino.length == 0) {
                  destino = $('a[name="' + this.hash.substr(1) + '"]');
                }
                if (destino.length == 0) {
                  destino = $('html');
                }
                $('html, body').animate({ scrollTop: destino.offset().top }, 500);
                return false;
              });
            });
        </script>
<?php }} ?>