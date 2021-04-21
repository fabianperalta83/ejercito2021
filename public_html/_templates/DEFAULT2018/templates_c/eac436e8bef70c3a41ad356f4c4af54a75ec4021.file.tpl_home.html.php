<?php /* Smarty version Smarty-3.1.8, created on 2021-04-19 16:45:55
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_home.html" */ ?>
<?php /*%%SmartyHeaderCode:191370796057dc567a58c1-56829886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eac436e8bef70c3a41ad356f4c4af54a75ec4021' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_home.html',
      1 => 1618850743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191370796057dc567a58c1-56829886',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_6057dc56c61cf7_09971614',
  'variables' => 
  array (
    'noticias4' => 0,
    'ejercitotv2' => 0,
    'actualidad' => 0,
    'noticias' => 0,
    'internacional' => 0,
    'medios2' => 0,
    'especiales2' => 0,
    'podcast2' => 0,
    'galeria_imagenppal' => 0,
    'videos_home_ppal' => 0,
    'home_jefaturas' => 0,
    'imagen_accesibilidad' => 0,
    'banners' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6057dc56c61cf7_09971614')) {function content_6057dc56c61cf7_09971614($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?>
 

<script src="<?php echo @_DIRJS;?>
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
<!-- <div class="gif hidden-xs">
        <img class="avion" alt="helicoptero" src="<?php echo @_DIRIMAGES;?>
cabezote/helicoptero-OKEY.gif">
</div>
<div class="gif_2 hidden-xs">
        <img class="tanque_2" alt="carro" src="<?php echo @_DIRIMAGES;?>
cabezote/carro-animado.gif">
</div> -->
<!--<?php if (@VIDEO_BANNER_YOUTUBE==''){?>
<div  class="hidden-xs">
<input type="hidden" name="url_youtube" id="url_youtube" value="<?php echo @_URL_YOUTUBE_POPUP;?>
">

</div>

<?php }?>-->


<div  class="hidden-xs">
<input type="hidden" name="url_youtube" id="url_youtube" value="<?php echo @_URL_YOUTUBE_POPUP;?>
">

</div>


<!-- CONTENEDORES PARA TRAER INFORMACIÓN DE LAS NUEVAS VARIABLES PARA POPUP 17/05/2019 -->
<input type="hidden" name="validar_eje_contador" id="validar_eje_contador" value="<?php echo @_VALIDAR_EJE_CONTADOR;?>
">
<input type="hidden" name="validar_url_contador" id="validar_url_contador" value="<?php echo @_VALIDAR_URL_CONTADOR;?>
">
<input type="hidden" name="validar_temp_contador" id="validar_temp_contador" value="<?php echo @_VALIDAR_TEMP_CONTADOR;?>
">
<script type="text/javascript" src="_templates/DEFAULT2018/recursos/Bicentenario/js/multislider.js"></script>
<!-- CONTENEDORES PARA TRAER INFORMACIÓN DE LAS NUEVAS VARIABLES PARA POPUP 17/05/2019 -->




<script>
    //efecto scroll
$(document).ready(function() {
  $('a[href="#load_video"]').click(function() {
    var destino = $(this.hash);
    if (destino.length == 0) {
      destino = $('a[name="' + this.hash.substr(1) + '"]');
    }
    if (destino.length == 0) {
      destino = $('html');
    }
    $('html, body').animate({ scrollTop: destino.offset().top }, 750);
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
    $('html, body').animate({ scrollTop: destino.offset().top }, 950);
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

/*
     $('a.smooth').live('click', function(e) {  
        e.preventDefault();
        var link = $(this);  
        var anchor  = link.attr('href');  
        $('html, body').stop().animate({  
            scrollTop: $(anchor).offset().top - ($('#menu').height()+21)
        }, 1500, 'easeOutBack');  
    });*/
</script>

<div class="col-md-12 col-lg-12 col-sm-12 col-12" id="seccion1" >
    <div  style="text-align: center;">
        <?php if (@VIDEO_BANNER_YOUTUBE!=''){?>
             <a  href="#load_video"><img src="_templates/DEFAULT2018/recursos/images/scrolldw_mtr.png" class="hidden-xs" style="position:absolute; margin-left: -50px; margin-right: auto; z-index: 10; top: -54px; " alt="V" hidden></a>
        <?php }else{ ?>
             <a href="#load_video" class="" style=""><img src="_templates/DEFAULT2018/recursos/images/scrolldw_mtr.png" class="hidden-xs"  style="position:absolute; margin-left: -50px; margin-right: auto; z-index: 10; top: -56px; " alt="V" hidden></a>
        <?php }?>
      
    </div>
       


</div>





<h2 class="hidden" style="font-family: 'Fira Sans', sans-serif;">Sección Noticias</h2>
<div class="col-12" style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  margin-bottom:0; background: white; padding:0px;" >
<div class="container">
<div class="container-fluid back-grey margin-noticias col-md-8 col-lg-8 col-sm-12" id="descatados2" style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  margin-bottom:0; background: white;">
    <div class="container" style=" ">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <div class="" style="text-align: left;margin-top:20px;margin-bottom:10px; font-family: 'Roboto-Bold'; font-size: 36px;width: 100%;">
                
                    <?php if (@_EN_INGLES!=1){?>
                        <a href="index.php?idcategoria=<?php echo @_SECCIONES_RSS;?>
">
                        <div class="col-md-4" style="font-size: 0.95em;font-weight: bold; color:black;padding-right: 0px;" id="noticias_interes1">
                            Noticias de interés
                        </div>
                        </a>
                    
                    <?php }else{ ?>
                        <a href="index.php?idcategoria=<?php echo @_SECCIONES_RSS;?>
">
                        <div class="col-md-4" style="font-size: 1.1em;font-weight: bold; color:black;" id="noticias_interes1">
                           Latest news
                        </div>
                        </a>
                    <?php }?>

                    <div class="col-md-8 hidden-xs"style="height:3px; width: 40%;background: rgba(50,50,50,1); margin-top: 25px; margin-left:0px;"></div>
                
            </div>
        </div>
        <div class="col-md-8 col-lg-8 col-sm-12">
        <br>
        <br>
                <div class="col-xs-12 col-12 col-md-8 my-8">
                  
                   
                    <div class="box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
                        <?php if ($_smarty_tpl->tpl_vars['noticias4']->value[0][0]['imagen']==''){?>
                        <div class="box-default-camara" style="border-bottom: none !important;">
                            <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; min-height: 320px;border-bottom: none !important;" alt="Imagen" id="id_imag_not3" class="objectCover">
                        </div>
                        <?php }else{ ?>
                        <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][0]['idcategoria'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
#">
                        <div class="img-noticias imgContainer" style="
                             background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][0]['imagen'];?>
')!important;
                             background-size: cover!important;
                             background-repeat: no-repeat!important;
                             background-position: center center!important;
                             width: 100%;
                             min-height: 320px;
                             border-bottom: none !important;
                             " id="id_imag_not3">
                            <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][0]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][0]['nombre'];?>
" style="border-bottom: none !important;">
                            
                            
                        </div>
                            </a>
                        <?php }?>
                        
                        <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; height:auto; overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                                
                                <?php if (@_EN_INGLES!=1){?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][0]['idcategoria'];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
#"> 
                                    <p class="wrap15" style="text-align: justify;font-size: 0.8em; color:black;">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][0]['fecha1'],"%e de %B %Y");?>


                                    </p>
                                    </a>
                                <?php }else{ ?>

                                    <p style="text-align: justify;font-size: 0.8em;text-transform: capitalize; color:black;">
                                        <i class="calendar wrap15"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][0]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                <?php }?>
                               
                                <p style="text-align: justify;">
                                     <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][0]['idcategoria'];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
#" class="wrap7" style="font-size: 1.4em; " id="nacional1">
                                   
                                        <strong style="font-weight: bold;color:black;"  class="wrap15">
                                            <?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][0]['nombre'];?>
</a>
                                       </strong>        
                                        </a>
                                </p>
                               
                                
                                
                               
                            </div>

                        </div>

                    </div>
                   <div class= "box-noticias1 box-noticias box-noticias-bicentenario  alto_contraste">
                    <div class="col-sm-6 col-12 hidden-md hidden-sm hidden-xs" style="padding:5px; top:20px;">
                   
                    <div class="box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;">
                        <?php if ($_smarty_tpl->tpl_vars['noticias4']->value[0][1]['imagen']==''){?>
                        <div class="box-default-camara" style="border-bottom: none !important;">
                            <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; height: 260px;border-bottom: none !important;" alt="Imagen" class="objectCover">
                        </div>
                        <?php }else{ ?>
                        <div class="img-noticias imgContainer" style="
                             background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][1]['imagen'];?>
')!important;
                             background-size: cover!important;
                             background-repeat: no-repeat!important;
                             background-position: center center!important;
                             width: 100%;
                             height: 260px;
                             border-bottom: none !important;
                             ">
                              <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][1]['idcategoria'];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
#">
                            <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][1]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][1]['nombre'];?>
" style="border-bottom: none !important;">
                            </a>
                            
                        </div>
                        <?php }?>
                       
                         
                    </div>
                    
                    
                    <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; padding: 0px;height: auto; overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                            
                                <?php if (@_EN_INGLES!=1){?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][1]['idcategoria'];?>
<?php $_tmp5=ob_get_clean();?><?php echo $_tmp5;?>
#">
                                    <p style="text-align: justify;font-size: 0.8em;color:black;margin-top: 10px;"  class="wrap15">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][1]['fecha1'],"%e de %B %Y");?>

                                    </p>
                                    </a>
                                <?php }else{ ?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][1]['idcategoria'];?>
<?php $_tmp6=ob_get_clean();?><?php echo $_tmp6;?>
#">
                                    <p style="text-align: justify;font-size: 0.8em;text-transform: capitalize;color:black;" class="wrap15">
                                        <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][1]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                    </a>
                                <?php }?>
                                
                                <p style="text-align: justify; text-align: justify; overflow:hidden;margin-bottom:12px;">
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][1]['idcategoria'];?>
<?php $_tmp7=ob_get_clean();?><?php echo $_tmp7;?>
#" class="wrap7" style="font-size: 1.4em;" >
                                        <strong style="font-weight: bold;"  class="wrap15">
                                         
                                          <?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][1]['nombre'];?>

                                        </strong>        
                                    </a>
                                </p>


                                
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-12 hidden-md hidden-sm hidden-xs" style="padding:5px; top:20px;">
                   
                    <div class="box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;">
                        <?php if ($_smarty_tpl->tpl_vars['noticias4']->value[0][2]['imagen']==''){?>
                        <div class="box-default-camara" style="border-bottom: none !important;">
                            <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; height: 260px;border-bottom: none !important;" alt="Imagen" class="objectCover">
                        </div>
                        <?php }else{ ?>
                        <div class="img-noticias imgContainer" style="
                             background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][2]['imagen'];?>
')!important;
                             background-size: cover!important;
                             background-repeat: no-repeat!important;
                             background-position: center center!important;
                             width: 100%;
                             min-height: 260px;
                             border-bottom: none !important;
                             ">
                              <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][2]['idcategoria'];?>
<?php $_tmp8=ob_get_clean();?><?php echo $_tmp8;?>
#">
                            <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][2]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][2]['nombre'];?>
" style="border-bottom: none !important;">
                            </a>
                           
                        </div>
                        <?php }?>
                       
                         
                    </div>
                    
                    
                    <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; padding: 0px;height: auto; overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                                 

                                <?php if (@_EN_INGLES!=1){?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][2]['idcategoria'];?>
<?php $_tmp9=ob_get_clean();?><?php echo $_tmp9;?>
#">
                                    <p style="text-align: justify;font-size: 0.8em;color:black;margin-top: 10px;"  class="wrap15">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][2]['fecha1'],"%e de %B %Y");?>

                                    </p>
                                    </a>
                                <?php }else{ ?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][2]['idcategoria'];?>
<?php $_tmp10=ob_get_clean();?><?php echo $_tmp10;?>
#">
                                    <p style="text-align: justify;font-size: 0.8em;text-transform: capitalize;color:black;" class="wrap15">
                                        <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][2]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                    </a>
                                <?php }?>
                                
                                <p style="text-align: justify; text-align: justify; overflow:hidden;margin-bottom:12px;">
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][2]['idcategoria'];?>
<?php $_tmp11=ob_get_clean();?><?php echo $_tmp11;?>
#" class="wrap7" style="font-size: 1.4em;" >
                                        <strong style="font-weight: bold;"  class="wrap15">
                                         
                                          <?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][2]['nombre'];?>

                                        </strong>        
                                    </a>
                                </p>

                               

                               
                            </div>

                        </div>
                    </div>

                </div>
                </div>
                
                <div class="col-xs-12 col-12 col-md-4 my-4" style="margin-top:0px!important;">
                   
                    <div class="box-noticias1 box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
                        
                        
                        <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; padding: 0px;height:auto; overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                                 
                                <?php if (@_EN_INGLES!=1){?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][3]['idcategoria'];?>
<?php $_tmp12=ob_get_clean();?><?php echo $_tmp12;?>
#">
                                    <p style="text-align: justify;font-size: 0.65em; color:black;" class="wrap15">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][3]['fecha1'],"%e de %B %Y");?>

                                    </p>
                                    </a>
                                <?php }else{ ?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][3]['idcategoria'];?>
<?php $_tmp13=ob_get_clean();?><?php echo $_tmp13;?>
#">
                                    <p style="text-align: justify;font-size: 0.65em;text-transform: capitalize;color:black;" class="wrap15">
                                        <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][3]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                    </a>
                                <?php }?>
                                
                                <p style="text-align: justify; text-align: justify;">
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][3]['idcategoria'];?>
<?php $_tmp14=ob_get_clean();?><?php echo $_tmp14;?>
#" class="wrap7" style="font-size: 1em;" >
                                        <strong style="font-weight: bold;" class="wrap15">
                                           <?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][3]['nombre'];?>

                                        </strong>        
                                    </a>
                                </p>

                               <div style="height:1px; width: 100%;background: rgba(124,8,8,1); margin-top: 25px; margin-left:0px;">
                                </div>
                            </div>

                        </div>
                        

                    </div>


                   
                    <div class="box-noticias1 box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
                        
                        
                        <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; padding: 0px;height:auto; overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                                 
                                <?php if (@_EN_INGLES!=1){?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][4]['idcategoria'];?>
<?php $_tmp15=ob_get_clean();?><?php echo $_tmp15;?>
#">
                                    <p style="text-align: justify;font-size: 0.65em; color:black;" class="wrap15">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][4]['fecha1'],"%e de %B %Y");?>

                                    </p>
                                    </a>
                                <?php }else{ ?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][4]['idcategoria'];?>
<?php $_tmp16=ob_get_clean();?><?php echo $_tmp16;?>
#">
                                    <p style="text-align: justify;font-size: 0.65em;text-transform: capitalize;color:black;" class="wrap15">
                                        <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][4]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                    </a>
                                <?php }?>
                                
                                <p style="text-align: justify; text-align: justify;">
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][4]['idcategoria'];?>
<?php $_tmp17=ob_get_clean();?><?php echo $_tmp17;?>
#" class="wrap7" style="font-size: 1em;" >
                                        <strong style="font-weight: bold;" class="wrap15">
                                           <?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][4]['nombre'];?>

                                        </strong>        
                                    </a>
                                </p>

                                <div style="height:1px; width: 100%;background: rgba(124,8,8,1); margin-top: 25px; margin-left:0px;">
                                </div>
                            </div>

                        </div>
                        

                    </div>


                    <div class="box-noticias1 box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
                        
                        
                        <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; padding: 0px;height:auto; overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                                 
                                <?php if (@_EN_INGLES!=1){?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][5]['idcategoria'];?>
<?php $_tmp18=ob_get_clean();?><?php echo $_tmp18;?>
#">
                                    <p style="text-align: justify;font-size: 0.65em; color:black;" class="wrap15">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][5]['fecha1'],"%e de %B %Y");?>

                                    </p>
                                    </a>
                                <?php }else{ ?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][5]['idcategoria'];?>
<?php $_tmp19=ob_get_clean();?><?php echo $_tmp19;?>
#">
                                    <p style="text-align: justify;font-size: 0.65em;text-transform: capitalize;color:black;" class="wrap15">
                                        <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][5]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                    </a>
                                <?php }?>
                                
                                <p style="text-align: justify; text-align: justify;">
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][5]['idcategoria'];?>
<?php $_tmp20=ob_get_clean();?><?php echo $_tmp20;?>
#" class="wrap7" style="font-size: 1em;" >
                                        <strong style="font-weight: bold;" class="wrap15">
                                           <?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][5]['nombre'];?>

                                        </strong>        
                                    </a>
                                </p>

                                <div style="height:1px; width: 100%;background: rgba(124,8,8,1); margin-top: 25px; margin-left:0px;">
                                </div>
                            </div>

                        </div>
                        

                    </div>


                    <div class="box-noticias1 box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
                        
                        
                        <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; padding: 0px;height:auto; overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                                 
                                <?php if (@_EN_INGLES!=1){?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][6]['idcategoria'];?>
<?php $_tmp21=ob_get_clean();?><?php echo $_tmp21;?>
#">
                                    <p style="text-align: justify;font-size: 0.65em; color:black;" class="wrap15">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][6]['fecha1'],"%e de %B %Y");?>

                                    </p>
                                    </a>
                                <?php }else{ ?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][6]['idcategoria'];?>
<?php $_tmp22=ob_get_clean();?><?php echo $_tmp22;?>
#">
                                    <p style="text-align: justify;font-size: 0.65em;text-transform: capitalize;color:black;" class="wrap15">
                                        <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][6]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                    </a>
                                <?php }?>
                                
                                <p style="text-align: justify; text-align: justify;">
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][6]['idcategoria'];?>
<?php $_tmp23=ob_get_clean();?><?php echo $_tmp23;?>
#" class="wrap7" style="font-size: 1em;" >
                                        <strong style="font-weight: bold;" class="wrap15">
                                           <?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][6]['nombre'];?>

                                        </strong>        
                                    </a>
                                </p>

                                <div style="height:1px; width: 100%;background: rgba(124,8,8,1); margin-top: 25px; margin-left:0px;">
                                </div>
                            </div>

                        </div>
                        

                    </div>


                    <div class="box-noticias1 box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
                        
                        
                        <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; padding: 0px;height:auto; overflow: hidden;">
                            <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                                 
                                <?php if (@_EN_INGLES!=1){?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][7]['idcategoria'];?>
<?php $_tmp24=ob_get_clean();?><?php echo $_tmp24;?>
#">
                                    <p style="text-align: justify;font-size: 0.65em; color:black;" class="wrap15">
                                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][7]['fecha1'],"%e de %B %Y");?>

                                    </p>
                                    </a>
                                <?php }else{ ?>
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][7]['idcategoria'];?>
<?php $_tmp25=ob_get_clean();?><?php echo $_tmp25;?>
#">
                                    <p style="text-align: justify;font-size: 0.65em;text-transform: capitalize;color:black;" class="wrap15">
                                        <i class="calendar"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias4']->value[0][7]['fecha1'],"%m / %e / %Y");?>

                                    </p>
                                    </a>
                                <?php }?>
                                
                                <p style="text-align: justify; text-align: justify;">
                                    <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][7]['idcategoria'];?>
<?php $_tmp26=ob_get_clean();?><?php echo $_tmp26;?>
#" class="wrap7" style="font-size: 1em;" >
                                        <strong style="font-weight: bold;" class="wrap15">
                                           <?php echo $_smarty_tpl->tpl_vars['noticias4']->value[0][7]['nombre'];?>

                                        </strong>        
                                    </a>
                                </p>

                                <div style="height:1px; width: 100%;background: rgba(124,8,8,1); margin-top: 25px; margin-left:0px;">
                                </div>
                            </div>

                        </div>
                        

                    </div>

                   

                    
                    
                </div>

            
           
        

        
        <div class="col-md-12 col-lg-12 col-sm-12 col-12" id="seccion2"style="text-align: center; padding: 20px 0px 30px 0px;" >
  
          <button type="button" onclick="window.location.href='index.php?idcategoria=<?php echo @_SECCIONES_RSS;?>
'" class="btn-danger" style="background:red; padding:10px; border:none; border-radius: 8px;"><?php if (@_EN_INGLES!=1){?>Ver todas las noticias<?php }else{ ?>All news<?php }?></button>
        </div>
        </div>
    </div>
</div>
<div class="container-fluid back-grey margin-noticias col-md-4 col-lg-4 col-sm-12"  style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  margin-bottom:0; background: white;">



    
   <?php if (@_EN_INGLES!=1){?>
  


    
    <div class="col-md-7" style="text-align: left;margin-top:20px;margin-bottom:10px; font-family: 'Roboto-Bold'; font-size: 36px;width: 100%;" id="noticias_interes1">
        Ejército TV
    </div>
    <div  class="col-md-5  hidden-xs" style="height:3px; width: 40%;background: rgba(50,50,50,1); margin-top: 45px; margin-left:0px;">
    </div>
    <br>
    <br>
    <br>
    <div  style="padding: 0 20px 0 20px;">
     <button type="button" onclick="window.location.href='https://www.ejercito.mil.co/index.php?idcategoria=498031'" class="button" style="margin-top: 16px; ">Ejército TV +</button>
   </div>
	<?php }?>
    <div class=" wrap15" style="font-size: 0.95em;font-weight: bold; color:black; padding: 15px;" id="redes_sociales1">
      
    <?php if (@_EN_INGLES!=1){?>
      <div class="mySlider3 alto_contraste" id="SliderBicentenario" style="margin-top:20px; min-height:100px; margin-bottom:0px;">
     
        <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 100px; min-width: 200px;">
           <video controls="controls" height="auto" style="width: 100% ; max-height:170px;"><source src="https://ejercito.mil.co/<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['ejercitotv2']->value[0][0]['descripcion'];?>
" type="video/mp4">Your browser does not support the video tag.</video>
        </div>

        <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 100px; min-width: 200px;">
           <video controls="controls" height="auto" style="width: 100%; max-height:170px;"><source src="https://ejercito.mil.co/<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['ejercitotv2']->value[0][1]['descripcion'];?>
" type="video/mp4">Your browser does not support the video tag.</video>
        </div>


        <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 100px; min-width: 200px;">
           <video controls="controls" height="auto" style="width: 100%; max-height:170px;"><source src="https://ejercito.mil.co/<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['ejercitotv2']->value[0][2]['descripcion'];?>
" type="video/mp4">Your browser does not support the video tag.</video>
        </div>


        <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 100px; min-width: 200px;">
           <video controls="controls" height="auto" style="width: 100%; max-height:170px;"><source src="https://ejercito.mil.co/<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['ejercitotv2']->value[0][3]['descripcion'];?>
" type="video/mp4">Your browser does not support the video tag.</video>
        </div>

        

    </div>
	<?php }?>
    <div class="col-md-12 wrap15" style="font-size: 0.95em;font-weight: bold; color:black;" id="redes_sociales1">
       
    </div>



    <div class="col-xs-12 col-12 col-md-12 my-12" style="padding:0" >
        <button type="button" onclick="window.location.href='https://www.facebook.com/ejercitocolombia/'" class="button" style="margin-top: 16px;margin-bottom:16px"><img  src="_templates/DEFAULT2018/recursos/images/redes/face.png" alt="" style="padding-right:10px;"><?php if (@_EN_INGLES!=1){?>Seguir a<?php }else{ ?>Follow<?php }?> Ejercito Nacional de Colombia</button>

        <iframe id="facebook-w" title="Facebook del Ejército Nacional de Colombia" src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/ejercitocolombia/&tabs=timeline&width=460&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1302240496568256" data-width="100%" data-height="700" style="border:none;overflow:hidden; min-height:300px;" scrolling="no" frameborder="0" allowtransparency="true" title="Facebook1"></iframe>
        <style type="text/css">
            #facebook-w {
                width: 310px !important;
                height: 400px!important;
                display: block!important;
                visibility: visible!important;
            }
        </style>

         
      </div>

      <div class="col-xs-12 col-12 col-md-12 my-12" style="padding:0;" >
        <button type="button" onclick="window.location.href='https://twitter.com/COL_EJERCITO'" class="button" style="margin-bottom:16px"><img  src="_templates/DEFAULT2018/recursos/images/redes/twiter.png" alt="" style="padding-right:10px;"><?php if (@_EN_INGLES!=1){?>Seguir a<?php }else{ ?>Follow<?php }?> @COL_EJERCITO</button>
        <div id="twitter-plugin" class="col-md-12 col-lg-12 col-12 col-xs-12" style="padding:0px;">
          <div class="embeb_ft">
              <a class="twitter-timeline" data-height="300" data-theme="light" href="https://twitter.com/COL_EJERCITO?ref_src=twsrc%5Etfw">Tweets by COL_EJERCITO</a>
              <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
        </div>
         
      </div>
 </div>   
</div>
</div>
<div class="col-12" style="background-color: white;">
<div class="container">
<div class="container-fluid back-grey margin-noticias col-md-12 col-lg-12 col-sm-12 col-12"  style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  margin-bottom:0; background: white;">

    <div class="col-md-3 col-lg-3 col-sm-12 col-12">
        <div class="box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
            <?php if ($_smarty_tpl->tpl_vars['actualidad']->value[0][0]['imagen']==''){?>
            <div class="box-default-camara" style="border-bottom: none !important;">
                <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; height: 250px;border-bottom: none !important;" alt="Imagen" id="id_imag_not3">
            </div>
            <?php }else{ ?>
            <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['actualidad']->value[0][0]['idcategoria'];?>
<?php $_tmp27=ob_get_clean();?><?php echo $_tmp27;?>
#">
            <div class="img-noticias imgContainer" style="
                 background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['actualidad']->value[0][0]['imagen'];?>
')!important;
                 background-size: cover!important;
                 background-repeat: no-repeat!important;
                 background-position: center center!important;
                 width: 100%;
                 height: auto;
                 min-height: 250px;
                 border-bottom: none !important;
                 " id="id_imag_not3">
                <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['actualidad']->value[0][0]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['actualidad']->value[0][0]['nombre'];?>
" style="border-bottom: none !important;">
                <?php if (@_EN_INGLES!=1){?>
                    <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">Actualidad</div>
                <?php }else{ ?>
                    <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">Updates</div>
                <?php }?> 
                <!--                            <div class="fecha-noticias">
                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                </div>-->
            </div>
                </a>
            <?php }?>
            <!--<div class="fecha-noticias">
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                                        </div>-->

            <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; ">
                <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                    
                    <?php if (@_EN_INGLES!=1){?>
                        <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['actualidad']->value[0][0]['idcategoria'];?>
<?php $_tmp28=ob_get_clean();?><?php echo $_tmp28;?>
#"> 
                        <p class="wrap15" style="text-align: justify;font-size: 1em; color:black;">
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['actualidad']->value[0][0]['fecha1'],"%e de %B %Y");?>


                        </p>
                        </a>
                    <?php }else{ ?>

                        <p style="text-align: justify;font-size: 1em;text-transform: capitalize; color:black;">
                            <i class="calendar wrap15"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['actualidad']->value[0][0]['fecha1'],"%m / %e / %Y");?>

                        </p>
                    <?php }?>
                   
                    <p style="text-align: justify;">
                         <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['actualidad']->value[0][0]['idcategoria'];?>
<?php $_tmp29=ob_get_clean();?><?php echo $_tmp29;?>
#" class="wrap7" style="font-size: 1.2em; " id="nacional1">
                       
                            <strong style="font-weight: bold;color:black;"  class="wrap15">
                                <?php echo $_smarty_tpl->tpl_vars['actualidad']->value[0][0]['nombre'];?>
</a>
                           </strong>        
                            </a>
                    </p>
                   
              
                </div>

            </div>

        </div>
    </div>

    <div class="col-md-3 col-lg-3 col-sm-12 col-12">
        <div class="box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
            <?php if ($_smarty_tpl->tpl_vars['internacional']->value[0][0]['imagen']==''){?>
            <div class="box-default-camara" style="border-bottom: none !important;">
                <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; height: 250px;border-bottom: none !important;" alt="Imagen" id="id_imag_not3">
            </div>
            <?php }else{ ?>
            <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['internacional']->value[0][0]['idcategoria'];?>
<?php $_tmp30=ob_get_clean();?><?php echo $_tmp30;?>
#">
            <div class="img-noticias imgContainer" style="
                 background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['internacional']->value[0][0]['imagen'];?>
')!important;
                 background-size: cover!important;
                 background-repeat: no-repeat!important;
                 background-position: center center!important;
                 width: 100%;
                 height: auto;
                 min-height: 250px;
                 border-bottom: none !important;
                 " id="id_imag_not3">
                <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['internacional']->value[0][0]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['internacional']->value[0][0]['nombre'];?>
" style="border-bottom: none !important;">
                <?php if (@_EN_INGLES!=1){?>
                    <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">Internacional</div>
                <?php }else{ ?>
                    <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">International News</div>
                <?php }?> 
                <!--                            <div class="fecha-noticias">
                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                </div>-->
            </div>
                </a>
            <?php }?>
            <!--<div class="fecha-noticias">
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                                        </div>-->

            <div class="content-noticia wrap10" style="background-color: white!important; margin:0px;">
                <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                    
                    <?php if (@_EN_INGLES!=1){?>
                        <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['internacional']->value[0][0]['idcategoria'];?>
<?php $_tmp31=ob_get_clean();?><?php echo $_tmp31;?>
#"> 
                        <p class="wrap15" style="text-align: justify;font-size: 1em; color:black;">
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['internacional']->value[0][0]['fecha1'],"%e de %B %Y");?>


                        </p>
                        </a>
                    <?php }else{ ?>

                        <p style="text-align: justify;font-size: 1em;text-transform: capitalize; color:black;">
                            <i class="calendar wrap15"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['internacional']->value[0][0]['fecha1'],"%m / %e / %Y");?>

                        </p>
                    <?php }?>
                   
                    <p style="text-align: justify;">
                         <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['internacional']->value[0][0]['idcategoria'];?>
<?php $_tmp32=ob_get_clean();?><?php echo $_tmp32;?>
#" class="wrap7" style="font-size: 1.2em; " id="nacional1">
                       
                            <strong style="font-weight: bold;color:black;"  class="wrap15">
                                <?php echo $_smarty_tpl->tpl_vars['internacional']->value[0][0]['nombre'];?>
</a>
                           </strong>        
                            </a>
                    </p>
                   
                   
                </div>

            </div>

        </div>
    </div>

     <div class="col-md-3 col-lg-3 col-sm-12 col-12">
        <div class="box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
            <?php if ($_smarty_tpl->tpl_vars['medios2']->value[0][0]['imagen']==''){?>
            <div class="box-default-camara" style="border-bottom: none !important;">
                <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; height: 250px;border-bottom: none !important;" alt="Imagen" id="id_imag_not3">
            </div>
            <?php }else{ ?>
            <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['medios2']->value[0][0]['idcategoria'];?>
<?php $_tmp33=ob_get_clean();?><?php echo $_tmp33;?>
#">
            <div class="img-noticias imgContainer" style="
                 background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['medios2']->value[0][0]['imagen'];?>
')!important;
                 background-size: cover!important;
                 background-repeat: no-repeat!important;
                 background-position: center center!important;
                 width: 100%;
                 height: auto;
                 min-height: 250px;
                 border-bottom: none !important;
                 " id="id_imag_not3">
                <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['medios2']->value[0][0]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['medios2']->value[0][0]['nombre'];?>
" style="border-bottom: none !important;">
                <?php if (@_EN_INGLES!=1){?>
                    <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">Ejército en los medios</div>
                <?php }else{ ?>
                    <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">Army in Social Media</div>
                <?php }?> 
                <!--                            <div class="fecha-noticias">
                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                </div>-->
            </div>
                </a>
            <?php }?>
            <!--<div class="fecha-noticias">
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['items4']['index']]['fecha1'],"%b - %e");?>

                                        </div>-->

            <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; ">
                <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                    
                    <?php if (@_EN_INGLES!=1){?>
                        <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['medios2']->value[0][0]['idcategoria'];?>
<?php $_tmp34=ob_get_clean();?><?php echo $_tmp34;?>
#"> 
                        <p class="wrap15" style="text-align: justify;font-size: 1em; color:black;">
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['medios2']->value[0][0]['fecha1'],"%e de %B %Y");?>


                        </p>
                        </a>
                    <?php }else{ ?>

                        <p style="text-align: justify;font-size: 1em;text-transform: capitalize; color:black;">
                            <i class="calendar wrap15"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['medios2']->value[0][0]['fecha1'],"%m / %e / %Y");?>

                        </p>
                    <?php }?>
                   
                    <p style="text-align: justify;">
                         <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['medios2']->value[0][0]['idcategoria'];?>
<?php $_tmp35=ob_get_clean();?><?php echo $_tmp35;?>
#" class="wrap7" style="font-size: 1.2em; " id="nacional1">
                       
                            <strong style="font-weight: bold;color:black;"  class="wrap15">
                                <?php echo $_smarty_tpl->tpl_vars['medios2']->value[0][0]['nombre'];?>
</a>
                           </strong>        
                            </a>
                    </p>
                   
                   
                </div>

            </div>

        </div>
    </div>

     <div class="col-md-3 col-lg-3 col-sm-12 col-12">
        <div class="box-noticias box-noticias-bicentenario  alto_contraste" style="background-color: transparent !important;margin-bottom:10px;">
            <?php if ($_smarty_tpl->tpl_vars['especiales2']->value[0][0]['imagen']==''){?>
            <div class="box-default-camara" style="border-bottom: none !important;">
                <img src="<?php echo @_DIRIMAGES;?>
contenido/img-default-noticias.jpg" style="width: 100%; height: 250px;border-bottom: none !important;" alt="Imagen" id="id_imag_not3">
            </div>
            <?php }else{ ?>
            <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['especiales2']->value[0][0]['idcategoria'];?>
<?php $_tmp36=ob_get_clean();?><?php echo $_tmp36;?>
#">
            <div class="img-noticias imgContainer" style="
                 background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['especiales2']->value[0][0]['imagen'];?>
')!important;
                 background-size: cover!important;
                 background-repeat: no-repeat!important;
                 background-position: center center!important;
                 width: 100%;
                 height: auto;
                 min-height: 250px;
                 border-bottom: none !important;
                 " id="id_imag_not3">
                <img class="objectCover absolute absolute--right absolute--left absolute--top absolute--bottom full-size" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['especiales2']->value[0][0]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['especiales2']->value[0][0]['nombre'];?>
" style="border-bottom: none !important;">
                <?php if (@_EN_INGLES!=1){?>
                    <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">Informes especiales</div>
                <?php }else{ ?>
                    <div style="position: absolute;bottom: 0px;color: #fff;padding: 1px 10px;opacity: 1;font-weight: bold;background-color:  #90240D; font-size: 1em;">Special Reports</div>
                <?php }?> 
                
            </div>
                </a>
            <?php }?>
            
            <div class="content-noticia wrap10" style="background-color: white!important; margin:0px; ">
                <div class="nombre-noticia alto_contraste" style="padding: 10px 10px 2px 10px;">
                    
                    <?php if (@_EN_INGLES!=1){?>
                        <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['especiales2']->value[0][0]['idcategoria'];?>
<?php $_tmp37=ob_get_clean();?><?php echo $_tmp37;?>
#"> 
                        <p class="wrap15" style="text-align: justify;font-size: 1em; color:black;">
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['especiales2']->value[0][0]['fecha1'],"%e de %B %Y");?>


                        </p>
                        </a>
                    <?php }else{ ?>

                        <p style="text-align: justify;font-size: 1em;text-transform: capitalize; color:black;">
                            <i class="calendar wrap15"></i>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['especiales2']->value[0][0]['fecha1'],"%m / %e / %Y");?>

                        </p>
                    <?php }?>
                   
                    <p style="text-align: justify;">
                         <a href="index.php?idcategoria=<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['especiales2']->value[0][0]['idcategoria'];?>
<?php $_tmp38=ob_get_clean();?><?php echo $_tmp38;?>
#" class="wrap7" style="font-size: 1.2em; " id="nacional1">
                       
                            <strong style="font-weight: bold;color:black;"  class="wrap15">
                                <?php echo $_smarty_tpl->tpl_vars['especiales2']->value[0][0]['nombre'];?>
</a>
                           </strong>        
                            </a>
                    </p>
                    
                   
                </div>

            </div>

        </div>
    </div>

</div>
</div>
</div>

<div class="" style="font-family: 'Fira Sans', sans-serif;"  id="descatados6">
<?php if (@_EN_INGLES!=1){?> 
<div style="font-family: 'Fira Sans', sans-serif;background-color: rgba(0,0,0,1);" >
    <div class="container" style="">
        <div class="col-md-6 col-lg-6 col-sm-12" style="margin-top:30px;">
            <div class="mySlider2 alto_contraste" id="SliderBicentenario" style="margin-top:20px; min-height:300px; margin-bottom:0px;">
                
             

                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 150px; min-width: 220px;">
                <video controls="controls" height="auto" style="width: 100%"><source src="https://ejercito.mil.co/<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['podcast2']->value[0][0]['descripcion'];?>
" type="video/mp4">Your browser does not support the video tag.</video>

                 
                  <div style="min-height:0px;"></div>
                   
                </div>

               <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 150px; min-width: 220px;">
                <video controls="controls" height="auto" style="width: 100%"><source src="https://ejercito.mil.co/<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['podcast2']->value[0][1]['descripcion'];?>
" type="video/mp4">Your browser does not support the video tag.</video>

                 
                  <div style="min-height:0px;"></div>
                   
                </div>


                
                 <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 150px; min-width: 220px;">
                <video controls="controls" height="auto" style="width: 100%"><source src="https://ejercito.mil.co/<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['podcast2']->value[0][2]['descripcion'];?>
" type="video/mp4">Your browser does not support the video tag.</video>

                 
                  <div style="min-height:0px;"></div>
                   
                </div>


                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 150px; min-width: 220px;">
                <video controls="controls" height="auto" style="width: 100%"><source src="https://ejercito.mil.co/<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['podcast2']->value[0][3]['descripcion'];?>
" type="video/mp4">Your browser does not support the video tag.</video>

                 
                  <div style="min-height:0px;"></div>
                   
                </div>

           

                 <!--<div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;" width="100%">
                   <video height="250px" width="100%" style="background-color: black;">
                      <source src="<?php echo @_URL;?>
<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['podcast2']->value[0][0]['descripcion'];?>
#t=2">
                  </video>
                </div>-->


               

            </div>

             <div class="col-md-6" style="padding:0; margin:0; height: 60px; padding-bottom:30px;">
               <div class="col-md-12 col-lg-12 col-sm-12 col-12" id="seccion2"style="text-align: center; padding: 0px 0px 30px 0px;" >
        
                <button type="button" onclick="window.location.href='index.php?idcategoria=497783'" class="btn-danger" style="background:red; padding:10px; border:none; border-radius: 8px;"><?php if (@_EN_INGLES!=1){?>Escuchar todos los Podcast<?php }else{ ?>All Podcast<?php }?></button>
              </div>
              </div>
        </div>

        <div class="col-md-6 col-lg-6 col-sm-12" style="padding:0; margin:0; min-height: 300px; padding-bottom:30px;margin-top:50px;">


                 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" style="padding:0; margin:0; ">
                    
                        <div class="container1">
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['idcategoria'];?>
" data-fancybox="images" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['nombre'];?>
">
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['nombre'];?>
" style="width: 100%;border-left: 5px solid #323232;border-bottom: 5px solid #323232; object-fit: cover;" class="image1 objectCover">
                         </a>
                        <div class="overlay1">
                         <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['idcategoria'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['nombre'];?>
" class="text1">
                          <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['nombre'],40,"...",true);?>
</a>
                         
                        </div>
                        
                      </div>
                    
                   
                      <div class="container2">
                         <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['idcategoria'];?>
" data-fancybox="images" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['nombre'];?>
" class="">
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['nombre'];?>
" class="image2 objectCover" style="width: 100%;border-left: 5px solid #323232; object-fit: cover;">
                        </a>
                        <div class="overlay2">
                          <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['idcategoria'];?>
" data-fancybox="images" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['nombre'];?>
"   class="text2">
                          <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['nombre'],40,"...",true);?>
</a>
                        </div>
                      </div>
                    
                </div>
                 <div class="col-md-6 col-lg-6 col-sm-6  col-xs-6" style="padding:0; margin:0; ">
                    
                      <div class="container3">
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['idcategoria'];?>
" data-fancybox="images" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['nombre'];?>
">
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['nombre'];?>
" class="image3 objectCover"  style="width: 100%;border-left: 5px solid #323232;border-bottom: 5px solid #323232; object-fit: cover;"></a>
                        <div class="overlay3">
                           
                          <a class="text3" href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['idcategoria'];?>
" data-fancybox="images" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['nombre'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['nombre'],40,"...",true);?>
</a>
                        </div>
                        
                      </div>
                    

                    
                      <div class="container4">
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['nombre'];?>
" >
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['nombre'];?>
" class="image4 objectCover" style="width: 100%;border-left: 5px solid #323232; object-fit: cover;"></a>
                        <div class="overlay4">
                         

                          <button type="button" onclick="window.location.href='index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['idcategoria'];?>
'" class="text4" style="background:transparent;border:none;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['nombre'],40,"...",true);?>
</button>
                        </div>
                        
                      </div>
                    
                </div>

                 <button type="button" onclick="window.location.href='index.php?idcategoria=<?php echo @_GALERIA_FOTOGRAFICA;?>
'" class="btn-danger" style="background:red; padding:10px; border:none; border-radius: 8px;margin-top:10px;"><?php if (@_EN_INGLES!=1){?>Ver galeria completa<?php }else{ ?>View all images<?php }?></button>
                
                
                
              </div>

       
    </div>
</div>
<?php }else{ ?>
<div style="font-family: 'Fira Sans', sans-serif;background-color: rgba(0,0,0,1);" >
	<div class="mySlider4 alto_contraste" id="SliderBicentenario" style="padding-top:50px; min-height:200px; margin-bottom:0px; padding-left:5%; padding-right:5%;">
                
             

        <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 150px; min-width: 220px;">
        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['nombre'];?>
" >
            <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['nombre'];?>
" class="image4 objectCover" style="width: 100%;border-left: 5px solid #323232; object-fit: cover;">
       	</a>
           
        </div>

        <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 150px; min-width: 220px;">
        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['nombre'];?>
" >
            <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['nombre'];?>
" class="image4 objectCover" style="width: 100%;border-left: 5px solid #323232; object-fit: cover;">
       	</a>
           
        </div>

        <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 150px; min-width: 220px;">
        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['nombre'];?>
" >
            <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['nombre'];?>
" class="image4 objectCover" style="width: 100%;border-left: 5px solid #323232; object-fit: cover;">
       	</a>
           
        </div>



        <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 150px; min-width: 220px;">
        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['nombre'];?>
" >
            <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['nombre'];?>
" class="image4 objectCover" style="width: 100%;border-left: 5px solid #323232; object-fit: cover;">
       	</a>
           
        </div>
      </div>
</div>
<?php }?>
<div class="container-fluid back-grey margin-noticias" id="descatados23" style="font-family: 'Fira Sans', sans-serif; margin-top:-2px; margin-bottom:0px; padding-bottom:40px;  background: rgba(0,0,0,1);">
    <div class="container" style="">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
           


            <!-- <div class="mySlider2 alto_contraste" id="SliderBicentenario" style="margin-top:20px; min-height:300px;" width="100%">-->

               <!--<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ids'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ids']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['name'] = 'ids';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['podcast2']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ids']['total']);
?>
                 <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;" width="100%">
                  <iframe width="100%" height="215" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['podcast2']->value[0][$_smarty_tpl->getVariable('smarty')->value['section']['ids']['index']]['contenido'];?>
"></iframe>
                </div>
                <?php endfor; endif; ?>-->

               <!-- <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;" width="100%">
                  <iframe width="100%" height="215" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['podcast2']->value[0][0]['contenido'];?>
"></iframe>
                </div>

                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;" width="100%">
                  <iframe width="100%" height="215" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['podcast2']->value[0][1]['contenido'];?>
"></iframe>
                </div>

                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;" width="100%">
                  <iframe width="100%" height="215" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['podcast2']->value[0][2]['contenido'];?>
"></iframe>
                </div>

            </div>-->

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
              <div class="col-md-6"  style="padding:0; margin:0;padding-bottom:30px;">
                <div class="embed-responsive embed-responsive-16by9" style="height:320px;">
                  <!--<?php echo $_smarty_tpl->tpl_vars['videos_home_ppal']->value[0]['descripcion'];?>
-->
                  <iframe width="560" height="320" src="https://www.youtube.com/embed/EUGjx7z9abc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" title ="frameyoutube23" name ="frameyoutube23" id="frameyoutube23"></iframe>
                </div>

                 <button type="button" onclick="window.location.href='https://www.youtube.com/channel/UCcSa3Es-fSXrBWistM6sYRQ'" class="btn-danger" style="background:red; padding:10px; border:none; border-radius: 8px; margin-top:10px;"><?php if (@_EN_INGLES!=1){?>Ver todos los videos<?php }else{ ?> View all videos<?php }?></button>
              </div>
             
              <div class="col-md-6" style="padding:0; margin:0; height: 380px; padding-bottom:30px; overflow: hidden;">
                  <div class="" style="padding:0; margin:0; height: 320px; overflow: hidden;">
                    <iframe src="https://snapwidget.com/embed/928175" class="snapwidget-widget"  style="height:100%; width:100%;border:none; min-height: 320px;" title="Instagram" allowtransparency="true"></iframe>
                  </div>

                     <button type="button" onclick="window.location.href='https://www.instagram.com/ejercitonacionalcolombia/'" class="button" style="width:auto;"><img  src="_templates/DEFAULT2018/recursos/images/redes/instagram.png" style="padding-right:10px;" alt=""><?php if (@_EN_INGLES!=1){?>Seguir a<?php }else{ ?>Follow<?php }?> Ejercitonacionalcolombia</button>
                  
              </div>
              <!--<div class="col-md-6" style="padding:0; margin:0; height: 320px; padding-bottom:30px;">


                 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" style="padding:0; margin:0; ">
                    
                        <div class="container1">
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['idcategoria'];?>
" data-fancybox="images" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['nombre'];?>
">
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['nombre'];?>
" style="width: 100%;border-left: 5px solid #323232;border-bottom: 5px solid #323232;" class="image1">
                         </a>
                        <div class="overlay1">
                         <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['idcategoria'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['nombre'];?>
" class="text1" style="color:white;">
                          <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagenppal']->value[0]['nombre'],40,"...",true);?>
</a>
                         
                        </div>
                        
                      </div>
                    
                   
                      <div class="container2">
                         <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['idcategoria'];?>
" data-fancybox="images" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['nombre'];?>
" class="hidden-xs">
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['nombre'];?>
" class="image2" style="width: 100%;border-left: 5px solid #323232;">
                        </a>
                        <div class="overlay2">
                          <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['idcategoria'];?>
" data-fancybox="images" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['nombre'];?>
"   class="text2" style="color:white;">
                          <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagenppal']->value[2]['nombre'],40,"...",true);?>
</a>
                        </div>
                      </div>
                    
                </div>
                 <div class="col-md-6 col-lg-6 col-sm-6  col-xs-6" style="padding:0; margin:0; ">
                    
                      <div class="container3">
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['idcategoria'];?>
" data-fancybox="images" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['nombre'];?>
">
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['nombre'];?>
" class="image3"  style="width: 100%;border-left: 5px solid #323232;border-bottom: 5px solid #323232;"></a>
                        <div class="overlay3">
                           
                          <a class="text3" href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['idcategoria'];?>
" data-fancybox="images" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['nombre'];?>
"style="color:white;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagenppal']->value[1]['nombre'],40,"...",true);?>
</a>
                        </div>
                        
                      </div>
                    

                    
                      <div class="container4">
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['nombre'];?>
" >
                        <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['nombre'];?>
" class="image4" style="width: 100%;border-left: 5px solid #323232;"></a>
                        <div class="overlay4">
                         

                          <button type="button" onclick="window.location.href='index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['idcategoria'];?>
'" class="text4" style="background:transparent;border:none; color:white;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['galeria_imagenppal']->value[3]['nombre'],40,"...",true);?>
</button>
                        </div>
                        
                      </div>
                    
                </div>

                 <button type="button" onclick="window.location.href='index.php?idcategoria=<?php echo @_GALERIA_FOTOGRAFICA;?>
'" class="btn-danger" style="background:red; padding:10px; border:none; border-radius: 8px;margin-top:10px;"><?php if (@_EN_INGLES!=1){?>Ver galeria completa<?php }else{ ?>View all images<?php }?></button>
                
                
                
              </div>-->
            </div>
            
        </div>
      </div>
    </div>

<h2 class="hidden" style="font-family: 'Fira Sans', sans-serif;">Sección Videos</h2>

<div class="col-md-12 col-lg-12 col-sm-12 col-12 hidden" id="seccion3" >
    <div style="text-align: center;">
        <a href="#seccion3"><img src="_templates/DEFAULT2018/recursos/images/scrolldw_mtr.png" class="hidden-xs"  style="position:absolute; margin-left: -50px; margin-right: auto; z-index: 10;top: -55px;" alt="V" /></a>
        
    </div>
   


</div>



<h2 class="hidden" style="font-family: 'Fira Sans', sans-serif;">Sección Estructura del EjÉrcito</h2>
<div class="container-fluid" style="" hidden>
    <div class="container" style="font-family: 'Fira Sans', sans-serif;">
        <div class="row">
            <div class="title-seccion2 title-seccion-estructura">
            <a  data-toggle="modal" data-target="#EstructuraModal">
                <?php if (@_EN_INGLES!=1){?>
                <img class="img-responsive img-fluid hidden" id="img_estr" src="<?php echo @_DIRIMAGES_USER;?>
Banners/BANNER CONOZCANOS.jpg" alt="Estructura Ejercito show" style="min-height:80px;" >
                 <?php }else{ ?> <img class="img-responsive img-fluid"  id="img_estr" src="<?php echo @_DIRIMAGES_USER;?>
Banners/BANNER CONOZCANOS.jpg" alt="Estructura ejercito mostrar" style="min-height:100px;"> <?php }?>
            </a>
                
            </div>
        </div>
    </div>
</div>

<!-- Modal Estructura-->
<div class="modal fade" id="EstructuraModal" tabindex="-1" role="dialog" aria-labelledby="EstructuraModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Estructura del ejercito</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="text-little">cerrar</span>
        </button>
      </div>
      <div class="modal-body">
       <div id="estructura_ejercito">
            <div class="container">
            <div class="row">
                <div class="col-12 col-xs-12 p-0">
                    <?php echo $_smarty_tpl->tpl_vars['home_jefaturas']->value;?>

                </div>
            </div>
                
            </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!--<div class="container-fluid back-grey margin-noticias" id="descatados24" style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  padding-bottom:50px; margin-bottom: 0px; background: rgba(230,230,230,1);">
    <div class="container" style=" ">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <div class="" style="text-align: left;margin-top:20px;margin-bottom:10px; font-family: 'Roboto-Bold'; font-size: 36px;width: 100%;">
                
                    <?php if (@_EN_INGLES!=1){?>
                    
                    <div class="col-md-5 wrap15" style="font-size: 0.95em;font-weight: bold; color:black;" id="redes_sociales1">
                        Nuestras Redes Sociales
                    </div>
                     <div class="col-md-7 hidden-xs" style="height:2px; min-width: 400px;background: rgba(50,50,50,1); margin-top:40px;margin-left:-50px;"></div>
                    
                    <?php }else{ ?>
                    <div class="col-md-5" id="redes_sociales1" style="font-size: 1.1em;font-weight: bold;">
                        Social Media
                    </div>
                     <div class="col-md-7 hidden-xs" style="height:2px; min-width: 400px;background: rgba(50,50,50,1); margin-top:40px;margin-left:-20px;"></div>
                    
                    <?php }?>

                   
                
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
       
        <br>
                  
                  <div class="col-xs-12 col-12 col-md-4 my-4">
                   


                    <iframe src="https://snapwidget.com/embed/889723" class="snapwidget-widget"  style="height:100%; width:100%;border:none; min-height: 500px;" title="Instagram"></iframe>

                     <button type="button" onclick="window.location.href='https://www.instagram.com/ejercitonacionalcolombia/'" class="button" style=""><img  src="_templates/DEFAULT2018/recursos/images/redes/instagram.png" style="padding-right:10px;" alt=""><?php if (@_EN_INGLES!=1){?>Seguir a<?php }else{ ?>Follow<?php }?> Ejercitonacionalcolombia</button>
                  </div>

                  <div class="col-xs-12 col-12 col-md-4 my-4">
                  
                    <iframe id="facebook-w" title="Facebook del Ejército Nacional de Colombia" src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/ejercitocolombia/&tabs=timeline&width=460&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1302240496568256" data-width="100%" data-height="700" style="border:none;overflow:hidden; min-height:500px;" scrolling="no" frameborder="0" allowtransparency="true" title="Facebook1"></iframe>
                    <style type="text/css">
                        #facebook-w {
                            width: 100% !important;
                            height: 400px!important;
                            display: block!important;
                            visibility: visible!important;
                        }
                    </style>

                     <button type="button" onclick="window.location.href='https://www.facebook.com/ejercitocolombia/'" class="button" style="margin-top: 16px;"><img  src="_templates/DEFAULT2018/recursos/images/redes/face.png" alt="" style="padding-right:10px;"><?php if (@_EN_INGLES!=1){?>Seguir a<?php }else{ ?>Follow<?php }?> Ejercito Nacional de Colombia</button>
                  </div>

                  <div class="col-xs-12 col-12 col-md-4 my-4">
                 
                    <div id="twitter-plugin" class="col-md-12 col-lg-12 col-12 col-xs-12" style="padding:0px;">
                      <div class="embeb_ft">
                          <a class="twitter-timeline" data-height="500" data-theme="light" href="https://twitter.com/COL_EJERCITO?ref_src=twsrc%5Etfw">Tweets by COL_EJERCITO</a>
                          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                      </div>
                    </div>
                     <button type="button" onclick="window.location.href='https://twitter.com/COL_EJERCITO'" class="button" style=""><img  src="_templates/DEFAULT2018/recursos/images/redes/twiter.png" alt="" style="padding-right:10px;"><?php if (@_EN_INGLES!=1){?>Seguir a<?php }else{ ?>Follow<?php }?> @COL_EJERCITO</button>
                  </div>

                 
        </div>
      </div>
    </div>-->

<h2 class="hidden">Sección Destacados</h2>

<div class="container-fluid back-white" style="font-family: 'Fira Sans', sans-serif;background-color: rgba(124,8,8,1);"  id="descatados1">

    <div class="container" style="">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12" style="margin-top:30px;">
            <div class="mySlider1 alto_contraste" id="SliderBicentenario" style="margin-top:20px; min-height:300px;">
                <?php if (@_EN_INGLES!=1){?> 
                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://goo.gl/x7Y1jv" target="_blank" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest1')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest1')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest1')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest1"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 230px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Incorporación</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>


                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://www.ejercito.mil.co/index.php?idcategoria=381779" target="_blank" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest2')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest2')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest2')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest2"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Pedagogía para la Paz</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>



                 <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://www.ejercito.mil.co/index.php?idcategoria=385326" target="_blank" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest3')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest3')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest3')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest3"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">La Voz del Comandante</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>

                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://www.ejercito.mil.co/conozcanos/organigrama/comando_ejercito_nacional/direccion_control_investigaciones_408433" target="_blank" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest7')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest7')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest7')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest7"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Dirección de Asuntos Disciplinarios y Administrativos del Ejército</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>


                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://www.ejercito.mil.co/index.php?idcategoria=357113" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest4')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest4')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest4')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest4"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Notificaciones Judiciales</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>


                
                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://goo.gl/q0IAgl" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest5')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest5')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest5')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest5"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Solicitudes</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>

               

                
                

                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="http://gruposmre.cancilleria.gov.co/sitios/DVAM/DIDHD/Biblioteca/SitePages/Home.aspx" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest9')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest9')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest9')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest9"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Normatividad</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>

                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://www.ejercito.mil.co/recursos_user/Excelencia/tpl_Excelencia.html" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest9')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest10')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest10')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest10"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Excelencia Militar</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>

                <?php }else{ ?> 
                  
                   <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://goo.gl/x7Y1jv" target="_blank" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest1')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest1')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest1')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest1"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Enlistment</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>


                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://www.ejercito.mil.co/index.php?idcategoria=381779" target="_blank" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest2')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest2')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest2')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest2"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Pedagogy for peace</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>



                 <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://www.ejercito.mil.co/index.php?idcategoria=385326" target="_blank" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest3')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest3')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest3')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest3"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">The voice of the commander</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>

                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://www.ejercito.mil.co/conozcanos/organigrama/comando_ejercito_nacional/direccion_control_investigaciones_408433" target="_blank" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest7')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest7')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest7')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest7"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Discipline affairs directorate</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>


                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://www.ejercito.mil.co/index.php?idcategoria=357113" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest4')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest4')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest4')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest4"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Judicial notification's</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>


                
                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://goo.gl/q0IAgl" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest5')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest5')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest5')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest5"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">Submit your request</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>

                <div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif; min-height: 300px;">
                 
                  <a href="https://www.clublancita.mil.co/" 
                    <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest6')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest6')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest6')" <?php }?>>
                    <div class="fonfo_destacado">
                      <div class="img_dest6"></div>

                      <!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
                      <!--<div class="line-red"></div>-->
                      <div style="background: rgba(255,255,255,1); height: 80px;">
                         
                           <div style="background: rgba(115,12,12,1); width: 250px;height: 2.5px;position:fixed;margin-top:20px; margin-left:20px;"></div>
                          <div class="" style="font-weight: bold;color:black; margin-left:25px;  padding-top: 30px;">I'm lancita</div>
                         
                          
                        </div>
                    </div>
                                
                  </a>
                  <div style="min-height:0px;"></div>
                   
                </div>

                <?php }?>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid my-5" id="estr_4ejc">
    <div class="row">
        <div class="container">
            <div class="row">
                 <?php if (@_EN_INGLES!=1){?>
                    
                    <div class="col-md-2 wrap15" style="font-size: 2em;font-weight: bold; color:black; margin-bottom:30px;" id="title_recursos1">
                        Recursos
                    </div>
                    
                    
                    <?php }else{ ?>
                    <div class="col-md-2 wrap15" style="font-size: 2em;font-weight: bold;"  id="title_recursos1">
                        Means
                    </div>

                    
                    <?php }?>

                    <div class="col-md-10 hidden-xs"style="height:2px; min-width: 500px;background: rgba(50,50,50,1); margin-top:20px;width:100%; margin-bottom:30px;"></div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="https://portalapp.mindefensa.gov.co:8444/Iwebsiath/appws_Login/appws_Login.php">
                        <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="_templates/DEFAULT2018/recursos/images/Group 25.png" alt="SIATH">
                    </a>

                    <div style="margin-top: 20px; text-align:center; font-weight:bold;">
                        <a target="_blank" href="https://portalapp.mindefensa.gov.co:8444/Iwebsiath/appws_Login/appws_Login.php"  class="wrap15" style=" color:black;">
                        <?php if (@_EN_INGLES!=1){?>Sistemas de Informacion de talentos humanos (SIATH)<?php }else{ ?>
                        Information System and Administration of Human Talents (SIATH)<?php }?>
                        </a>
                    </div>
                     <a target="_blank" href="https://portalapp.mindefensa.gov.co:8444/Iwebsiath/appws_Login/appws_Login.php">
                        <div style="margin-top: 10px; text-align:center;" hidden>
                            <u><?php if (@_EN_INGLES!=1){?>Ingresar al SIATH<?php }else{ ?>Enter SIATH<?php }?></u>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="http://www.pqr.mil.co">
                         <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="_templates/DEFAULT2018/recursos/images/Group 28.png" alt="PQRS">
                    </a>

                     <div class="wrap15" style="margin-top: 20px; text-align:center; font-weight:bold;">
                        <a target="_blank" href="http://www.pqr.mil.co" style="color:black;" class="wrap15">
                        <?php if (@_EN_INGLES!=1){?>Sistema PQRS (Peticiones, Quejas, Reclamos y Sugerencias)<?php }else{ ?>PQRS System
                        (Requests, Complaints, Claims and Suggestions)<?php }?>
                        </a>
                    </div>
                     <a target="_blank" href="http://www.pqr.mil.co">
                        <div style="margin-top: 10px; text-align:center;" hidden>
                            <u> <?php if (@_EN_INGLES!=1){?>Ir al PQRS<?php }else{ ?>Enter PQRS<?php }?></u>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="https://correo.buzonejercito.mil.co/?loginOp=logout">
                         <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="_templates/DEFAULT2018/recursos/images//Group 29.png" alt="CORREO">
                    </a>

                     <div class="wrap15" style="margin-top: 20px; text-align:center; font-weight:bold;">
                         <a target="_blank" href="https://correo.buzonejercito.mil.co/?loginOp=logout" style="color:black;" class="wrap15">
                         <?php if (@_EN_INGLES!=1){?>Correo electrónico - Ejército Nacional de Colombia<?php }else{ ?>Email - National army of Colombia<?php }?>
                        </a>
                    </div>
                    <br>
                     <a target="_blank" href="https://correo.buzonejercito.mil.co/?loginOp=logout">
                        <div style="margin-top: 10px; text-align:center;" hidden>
                            <u> <?php if (@_EN_INGLES!=1){?>Ingresar al correo<?php }else{ ?>Enter email<?php }?></u>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-12 col-md-3 my-3">
                    <a target="_blank" href="https://fovid.ejercito.mil.co:4443/Fovid-2.0/">
                         <img class="img-responsive img-fluid mx-auto d-block" style="display: block; margin: 0 auto;" src="_templates/DEFAULT2018/recursos/images//Group 30.png" alt="FOVID">
                    </a>


                     <div class="wrap15" style="margin-top: 20px; text-align:center; font-weight:bold;">
                        <a target="_blank" href="https://fovid.ejercito.mil.co:4443/Fovid-2.0/" style="color:black;" class="wrap15">
                        <?php if (@_EN_INGLES!=1){?>Folio de Vida Digital - Ejército Nacional de Colombia<?php }else{ ?>Digital resume - Colombian National Army<?php }?>
                        </a>
                    </div>
                     <a target="_blank" href="https://fovid2.ejercito.mil.co/Fovid-2.0/faces/seg_login.xhtml">
                        <br>
                        <div style="margin-top: 10px; text-align:center;" hidden>
                            <u><?php if (@_EN_INGLES!=1){?>Ingresar al FOVID<?php }else{ ?>Enter FOVID<?php }?></u>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>    
</div>

<h2 class="hidden" style="font-family: 'Fira Sans', sans-serif;">Sección Destacados Banner</h2>
<div>
 <br>      
 </div>

<div class="container-fluid back-grey">
<div class="row">
  <div class="container">
    <div class="row">
        <div class="col-12 col-md-3 px-0">
          <a onclick="playAudio()" style="cursor: pointer;">
                
                      
                        <div  class="memoria_historica2 memoria-historica-bicentenario">
                          <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['banners']->value[1]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[1]['nombre'];?>
" target="_blank">
                            
                              <img class="w-100 h-100 objectCover position-absolute absolute--bottom absolute--top absolute--right absolute--left" src="<?php echo @_DIRIMAGES_USER;?>
Banners/DAMASCO.png" alt="<?php echo $_smarty_tpl->tpl_vars['banners']->value[1]['nombre'];?>
" style="padding: 15px 15px;">
                              <span class="" style="background-color: #862024; height: 3px; position: absolute;bottom: 20%; width: 70%; left: 15%; text-align:center;"></span>
                              <span class="" style="background-color: transparent; left: 15%; bottom: 10%; opacity:0.85; position: absolute;color:rgba(200,200,200,1); font-size:1.2em!important;">Doctrina Militar</span>
                            
                            
                          </a>
                        </div>
                      
                    </a>    
        </div>
        <div class="col-12 col-md-3 px-0">
          <a onclick="playAudio()" style="cursor: pointer;">
            
                  
                    
                      
                        <div  class="memoria_historica2 memoria-historica-bicentenario">
                        <a href="https://bibliotecaejercito.virtualpro.co/" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[2]['nombre'];?>
" target="_blank">
                          <img class="w-100 h-100 objectCover position-absolute absolute--bottom absolute--top absolute--right absolute--left" src="<?php echo @_DIRIMAGES_USER;?>
Banners/BILIOTECA_ENC.png" alt="<?php echo $_smarty_tpl->tpl_vars['banners']->value[2]['nombre'];?>
" style="padding: 15px 15px;">
                          <span class="" style="background-color: #862024; height: 3px; position: absolute;bottom: 20%; width: 70%; left: 15%; text-align:center;"></span>
                              <span class="" style="background-color: transparent; left: 15%; bottom: 10%; opacity:0.85; position: absolute;color:white; font-size:1.2em!important;"><?php if (@_EN_INGLES!=1){?>Biblioteca<?php }else{ ?>Library<?php }?></span>
                          </a>
                        </div>
                      
                    
                 
                </a>
        </div>
        <div class="col-12 col-md-3 px-0">
          <a onclick="playAudio()" style="cursor: pointer;">
            
                  
                    
                      
                        <div  class="memoria_historica2 memoria-historica-bicentenario">
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['banners']->value[0]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[0]['nombre'];?>
" target="_blank">
                          <img class="w-100 h-100 objectCover position-absolute absolute--bottom absolute--top absolute--right absolute--left" src="<?php echo @_DIRIMAGES_USER;?>
Banners/DIRECCIO_ENC.png" alt="<?php echo $_smarty_tpl->tpl_vars['banners']->value[0]['nombre'];?>
" style="padding: 15px 15px;">
                          <span class="" style="background-color: #862024; height: 3px; position: absolute;bottom: 20%; width: 70%; left: 15%; text-align:center;"></span>
                              <span class="" style="background-color: transparent; left: 15%; bottom: 10%; opacity:0.85; position: absolute;color:white; font-size:1.2em!important;"><?php if (@_EN_INGLES!=1){?>Apoyo a transición<?php }else{ ?>Enlistment Support<?php }?></span>
                          
                          </a>
                        </div>
                      
                   
                  
                </a>
        </div>
        <div class="col-12 col-md-3 px-0">
          <a onclick="playAudio()" style="cursor: pointer;">
            
                  
                    <div  class="memoria_historica2 memoria-historica-bicentenario">
                      <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['banners']->value[3]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[3]['nombre'];?>
" target="_blank">
                        
                          <img class="w-100 h-100 objectCover position-absolute absolute--bottom absolute--top absolute--right absolute--left" src="<?php echo @_DIRIMAGES_USER;?>
Banners/JUDICIALES_ENC.png" alt="<?php echo $_smarty_tpl->tpl_vars['banners']->value[3]['nombre'];?>
" style="padding: 15px 15px;">
                          <span class="" style="background-color: #862024; height: 3px; position: absolute;bottom: 20%; width: 70%; left: 15%; text-align:center;"></span>
                              <span class="" style="background-color: transparent; left: 15%; bottom: 10%; opacity:0.85; position: absolute;color:white;font-size:1.2em!important;"><?php if (@_EN_INGLES!=1){?>Notificaciones Judiciales<?php }else{ ?>Judicial Notifications<?php }?></span>
                          </a>
                        </div>
                     
                </a>
        </div>      
    </div>
  </div> 
</div>

</div>


<div class="container-fluid ">
    <div class="row">
        <div class="container" style="margin-top:30px; margin-bottom: 20px">
            <div class="row">
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

<!--
<div class="col-md-12 col-lg-12 col-sm-12 col-12" id="seccion3" >
     <div  style="text-align: center;">
        <a  href="#home-silder1"><img src="_templates/DEFAULT2018/recursos/images/scrollup_mtr.png" class="hidden-xs"  style="position:relative; margin-left: -50px; margin-right: auto; z-index: 10;" alt="UP" /></a>
        
        
    </div>
   


</div>

-->



<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"> 
<script type="text/javascript">
    function showEntidades() {
        if (document.getElementById('estructura_ejercito').style.display == 'none') {
            $('#estructura_ejercito').slideToggle('slow');
        } else {
            $('#estructura_ejercito').slideToggle('hide');
        }
    }
</script>
<script language="JavaScript">
    function Abrir_ventana(pagina) {
        var opciones = "toolbar=false,location=false,directories=false,status=false,menubar=false,scrollbars=false,resizable=false,width=350px,height=130px,top=false,left=false";
        window.open(pagina, "", opciones);
    }
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $("#mygallery").justifiedGallery({
            rowHeight: 200,
            lastRow: 'justify',
            margins: 3,
            sizeRangeSuffixes: {
                500: '_t',
                2000: '_m'
            }
        }).on('jg.complete', function() {
            $(this).find('a').colorbox({
                maxWidth: '80%',
                maxHeight: '80%',
                opacity: 0.8,
                transition: 'elastic',
                current: ''
            });
        });
    });
</script>

<script type="text/javascript">
    // Slide Destacados
    $('.mySlider1').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        arrows: true,
        nextArrow: '<div class="fa fa-chevron-circle-right fa-5x" style="display: inline-block; position: absolute; z-index:6;top:40%; right: -30px; color:white;"> </div>',
        prevArrow: '<div class="fa fa-chevron-circle-left fa-5x" style="display: inline-block; position: absolute; z-index:6;top:40%;color:white; left: -30px;"></div>',
        dots: true,
        speed: 4000,
        autoplaySpeed: 3000,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-4x" style="display: inline-block; position: absolute; z-index:6;top:40%; color:white; right: -30px;"></div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-4x" style="display: inline-block; position: absolute; z-index:6;top:40%; color:white; left: -30px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; right: -30px;"></div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: -30px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; right: -30px;"></div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: -30px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-2x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; right: -30px;"></div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-2x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: -30px;"></div>',
                dots: false
            }
        }]
    });


    $('.mySlider2').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        nextArrow: '<div class="fa fa-chevron-circle-right fa-5x" style="display: inline-block; position: absolute; z-index:6;top:40%; right: -30px; color:white;"> </div>',
        prevArrow: '<div class="fa fa-chevron-circle-left fa-5x" style="display: inline-block; position: absolute; z-index:6;top:40%;color:white; left: -30px;"></div>',
        dots: true,
        speed: 4000,
        autoplaySpeed: 3000,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-4x" style="display: inline-block; position: absolute; z-index:6;top:40%; color:white; right: -30px;"></div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-4x" style="display: inline-block; position: absolute; z-index:6;top:40%; color:white; left: -30px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; right: -30px;"></div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: -30px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; right: -30px;"></div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: -30px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-2x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; right: -30px;"></div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-2x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: -30px;"></div>',
                dots: false
            }
        }]
    });


    $('.mySlider3').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%; right: 10px; color:white;"> </div>',
        prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: 10px;"></div>',
        dots: true,
        speed: 4000,
        autoplaySpeed: 3000,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%; right: 10px; color:white;"> </div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: 10px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%; right: 10px; color:white;"> </div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: 10px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%; right: 10px; color:white;"> </div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: 10px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%; right: 10px; color:white;"> </div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: 10px;"></div>',
                dots: false
            }
        }]
    });


    $('.mySlider4').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:50%; right: 20px; color:white;"> </div>',
        prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:50%;color:white; left: 20px;"></div>',
        dots: true,
        speed: 4000,
        autoplaySpeed: 3000,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%; right: 10px; color:white;"> </div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: 10px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%; right: 10px; color:white;"> </div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: 10px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%; right: 10px; color:white;"> </div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: 10px;"></div>',
                dots: false
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="fa fa-chevron-circle-right fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%; right: 10px; color:white;"> </div>',
                prevArrow: '<div class="fa fa-chevron-circle-left fa-3x" style="display: inline-block; position: absolute; z-index:6;top:30%;color:white; left: 10px;"></div>',
                dots: false
            }
        }]
    });
</script>
 
<!-- <script>
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
</script> -->
<script type="text/javascript">
    $(".item_lista_video").click(function(item) {
        var src = $(this).attr("data-src");
        var type = $(this).attr("data-type");

        if (type == "archivo") {
            var ruta = document.getElementById("ruta_videos").value;
            var tag = '<video class="item_video_home" controls><source src="' + ruta + src + '" type="video/mp4"></video>';
            $("#load_video").html(tag);
        } else {
            var tag = src;
            $("#load_video").html(tag);
        }
    })

    $(".item_lista_audio").click(function(item) {
        var src = $(this).attr("data-src");
        var type = $(this).attr("data-type");

        var ruta = document.getElementById("ruta_audios").value;
        var tag = '<audio controls="true"><source src="' + ruta + src + '" type="audio/ogg"><source src="' + ruta + src + '" type="audio/mpeg"><p>' + type + '</p></audio>';
        $("#load_audio").html(tag);

    })

    function showDiv(nombre) {
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

    function showBox(nombre) {
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
        if (nombre == "audio") {
            $("#videos").css("display", "none");
            $("#galeria").css("display", "none");
            $("#audio").css("display", "block");
            $("#title-audio").addClass("active");
            $("#title-videos").removeClass("active");
            $("#title-galeria").removeClass("active");
        }
    }
</script>
 
<script type="text/javascript">
    //var a = jQuery.noConflict();
    $(window).load(function() { //$(window).load() must be used instead of $(document).ready() because of Webkit compatibility						
        /*---------------------------------
         *	Example #01
         *---------------------------------*/
        $(".delaycaptions-01").sliderkit({
            circular: true,
            mousewheel: false,
            keyboard: true,
            shownavitems: 4,
            navclipcenter: true,
            auto: true,
            panelfxspeed: 500,
            delaycaptions: {
                delay: 500, // must be equal or higher than panelfxspeed
                position: 'bottom',
                transition: 'sliding',
                duration: 300, // must be less equal or higher than panelfxspeed
                easing: 'easeOutExpo'
            }
        });
    });
</script>
 
<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
    $(function() {
        $('.carousel_multimedia').each(function() {
            $(this).carousel({
                interval: 4000
            });
        });
    });
</script>
 
<script type="text/javascript">
    // Wait until the DOM has loaded before querying the document
    $(document).ready(function() {
        $('ul.tabs').each(function() {
            // For each set of tabs, we want to keep track of
            // which tab is active and it's associated content
            var $active, $content, $links = $(this).find('a');
            // Use the first link as the initial active tab
            $active = $links.first().addClass('active');
            $content = $($active.attr('href'));
            // Hide the remaining content
            $links.not(':first').each(function() {
                $($(this).attr('href')).hide();
            });
            // Bind the click event handler
            $(this).on('click', 'a', function(e) {
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
        var url = "../tools/temporizador_popup.php";
        retorno = new Array();
        var ejecutar_ajax = $.ajax({
            async: true,
            url: url,
            type: "POST",
            data: {
                funcion: 1
            },
            cache: false,

            success: function(s) {
                retorno = JSON.parse(s);
                //var resultado = retorno[0];
                /* CONTENEDORES PARA TRAER INFORMACIÓN DE LAS NUEVAS VARIABLES PARA POPUP 17/05/2019 */
                var resultado = 1;
                /* CONTENEDORES PARA TRAER INFORMACIÓN DE LAS NUEVAS VARIABLES PARA POPUP 17/05/2019 */

                if (resultado == 1) {
                    ejecutar_popup();
                     

                }
            },
            error: function(e) {
                ejecutar_ajax.abort();
            }
           
        });
         


    });
   

    function setVariableAudio(theValue) {
        if (theValue != '') {
            document['mp3Custom'].SetVariable('song.text', 'recursos_user' + theValue);
        } else {
            alert("No tiene un archivo de audio asociado.");
        }
    }

    function ejecutar_popup() {

        /* CONTENEDORES PARA TRAER INFORMACIÓN DE LAS NUEVAS VARIABLES PARA POPUP 17/05/2019 */
        var validar_eje_contador = document.getElementById("validar_eje_contador").value;
        var validar_url_contador = document.getElementById("validar_url_contador").value;
        var validar_temp_contador = document.getElementById("validar_temp_contador").value;

        if (validar_eje_contador == 1) {
            $("#url_youtube").val("https://www.ejercito.mil.co/_templates/DEFAULT2018/recursos/contador/tpl_contador.html?url=" + validar_url_contador + "&temp=" + validar_temp_contador);
        }
        /* CONTENEDORES PARA TRAER INFORMACIÓN DE LAS NUEVAS VARIABLES PARA POPUP 17/05/2019 */
        var url = document.getElementById("url_youtube").value;

        if (url != "") {
            /*if (window.innerHeight > 540)
             {
             var margintop = (window.innerHeight - 540) / 2;
             }
             else
             {
             var margintop = 50;
             }
             
             var ventana_ancho = $(window).width();
             
             if (ventana_ancho > 1024)
             {
             
             } */
            //            var ifr = '<iframe src="" class="embed-responsive-item" title="Emisora" width="640" height="480" id="slvj-video-embed" style="border:0;"></iframe>';   /* VARIABLE ORIGINAL */

            /* CONTENEDORES PARA TRAER INFORMACIÓN DE LAS NUEVAS VARIABLES PARA POPUP 17/05/2019 */
            var ventana_ancho = $(window).width();
            if (ventana_ancho > 1024)
             {
            var ifr = '<iframe src="" class="embed-responsive-item" title="Emisora" width="640" height="480" id="slvj-video-embed" style="border:0; width: 640px; height: 480px;"></iframe>';
            /* CONTENEDORES PARA TRAER INFORMACIÓN DE LAS NUEVAS VARIABLES PARA POPUP 17/05/2019 */

            var close = '<div id="slvj-close-icon"></div>';
            var lightbox = '<div class="slvj-lightbox embed-responsive embed-responsive-16by9" style="top: 27%">';
            var back = '<div id="slvj-back-lightbox">';
            var bclo = '<div id="slvj-background-close"></div>';
            var win = '<div id="slvj-window">';
            var end = '</div></div></div>';

            $('body').append(win + bclo + back + lightbox + close + ifr + end);
            $('#slvj-window').hide();

            $('#slvj-window').fadeIn();
            $('#slvj-video-embed').attr('src', url);

            $('#slvj-close-icon').click(function() {
                $('#slvj-window').remove();
                $('#slvj-window').fadeOut($.simpleLightboxVideo, function() {
                    $(this).remove();
                });
               
            });

            $('#slvj-background-close').click(function() {
                $('#slvj-window').remove();
                $('#slvj-window').fadeOut($.simpleLightboxVideo, function() {
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

            var ventana_ancho = $(window).width();
             
            }

            return false;
        }
    }

     //Audio
    

</script>
 
<script type="text/javascript">
    function mostrarSubMenuAyuda(div) {
        $('#' + div).css('display', 'block');
    }

    function ocultarSubMenuAyuda(div) {
        $('#' + div).css('display', 'none');
    }
    $('#SliderBicentenario').multislider({
        duration: 750,
        interval: 3000
    });
</script>
<script type="text/javascript">
    function converDate(timestamp) {
        var date = new Date(timestamp * 1000);
        var _mes = date.getMonth() + 1; //getMonth devuelve el mes empezando por 0
        var _dia = date.getDate(); //getDate devuelve el dia del mes
        var _anyo = date.getFullYear();
        var _hour = date.getHours();
        var _min = date.getMinutes();
        var _seg = date.getSeconds();

        return _anyo + '-' + _mes + '-' + _dia + ' ' + _hour + ':' + _min + ':' + _seg;
    }

    function getCurrentDate() {
        var dt = new Date();

        // Display the month, day, and year. getMonth() returns a 0-based number.
        var month = dt.getMonth() + 1;
        var day = dt.getDate();
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var min = dt.getMinutes();
        var seg = dt.getSeconds();
        return year + '-' + month + '-' + day + ' ' + hour + ':' + min + ':' + seg;
    }
    $.ajax({
            url: 'https://api.instagram.com/v1/users/self/media/recent/?access_token=499169839.bca222f.718414a9873d464bb2694c5f0c6c0a8f',
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {

            $.each(data.data, function(index, val) {

                var fecha1 = moment(converDate(val.created_time));
                var fecha2 = moment(getCurrentDate());

                tiempo = fecha2.diff(fecha1, 'hours');

                if (tiempo < 1) {
                    tiempo = 'HACE ' + fecha2.diff(fecha1, 'minutes') + ' MINUTOS';
                }
                if (tiempo < 23) {

                    tiempo = 'HACE ' + fecha2.diff(fecha1, 'hours') + ' HORAS';

                }
                if (tiempo > 23) {

                    tiempo = 'HACE ' + fecha2.diff(fecha1, 'days') + ' D&iacute;AS';

                }
                $('#instagram-feed').append('<div><a href="https://www.instagram.com/' + val.user.username + '" target="_blank"><img class="img-cuenta" src="' + val.user.profile_picture + '" alt="Usuario" /><div><span class="titulo">' + val.user.username + '</span></div></a></div><div class="div-container"><br><div class="tiempo">' + tiempo + '</div><a href="' + val.link + '" target="_blank"><img class="img-micros" src="' + val.images.standard_resolution.url + '" alt="V" />' +
                    '<div class="redes"><span class="glyphicon glyphicon-heart-empty" style="color:#000;"></span><span class="like-text">' + val.likes.count + '</span><span class="glyphicon glyphicon-comment" style="color:#000;"></span><span class="coments-text">' + val.comments.count + '</span></div>' +
                    '<div class="caption-text">' + val.caption.text + '</div>' +
                    '</div></a>')


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
   


</script>
<?php }} ?>