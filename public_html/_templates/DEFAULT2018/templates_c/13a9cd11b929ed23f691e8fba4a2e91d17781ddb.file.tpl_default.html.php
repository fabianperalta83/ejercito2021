<?php /* Smarty version Smarty-3.1.8, created on 2021-02-24 21:16:29
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_default.html" */ ?>
<?php /*%%SmartyHeaderCode:254368671602e3062cefea6-27729969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13a9cd11b929ed23f691e8fba4a2e91d17781ddb' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_default.html',
      1 => 1614201375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '254368671602e3062cefea6-27729969',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e3062d8a551_60591430',
  'variables' => 
  array (
    'l_imagen' => 0,
    'alinea' => 0,
    'c_entradilla' => 0,
    'c_descripcion' => 0,
    'fwidth' => 0,
    'anchomedio' => 0,
    'width' => 0,
    'c_titulo' => 0,
    'c_alt' => 0,
    'subMenu' => 0,
    'pie_imagen' => 0,
    'imagen' => 0,
    'c_iddisplay_sub' => 0,
    'c_fecha' => 0,
    'c_submenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e3062d8a551_60591430')) {function content_602e3062d8a551_60591430($_smarty_tpl) {?><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.css"><script type="text/javascript" src="<?php echo @_DIRJS;?>
lightbox/bootstrap-lightbox.js"></script><script src="<?php echo @_DIRJS;?>
cabezote.js"></script><link rel="stylesheet" href="<?php echo @_DIRCSS;?>
galleriffic/galleriffic-2.css" type="text/css"><!-- Implermentación de Librerias para Redes Sociales --><link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/social-likes_birman.css" type="text/css"><link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/font-awesome.css" type="text/css"><link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/style.css" type="text/css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script><script src="<?php echo @_DIRCSS;?>
redes_sociales/social-likes.min.js"></script><noscript>	<p><?php echo @_ROT_NOSCRIPT;?>
. Lightbox uses the Prototype Framework</p></noscript><script type="text/javascript" src="js/scriptaculous.js?load=effects"></script><noscript>	<p>Lightbox uses the Scriptaculous Effects Library</p></noscript><script type="text/javascript" src="js/lightbox.js"></script><noscript>	<p>Lightbox is a simple, unobtrusive script used to overlay images on the current page.</p></noscript><!-- <div class="gif hidden-xs">	<img class="confeti" src="<?php echo @_DIRIMAGES;?>
cabezote/gif-confeti-9.gif"></div> --><div id="default" class="row">	<!-- Titulo de Categoria Principal  -->	<?php if ($_smarty_tpl->tpl_vars['l_imagen']->value!=''){?>		<div class="default_entradilla col-lg-12 col-md-12 col-sm-12 col-xs-12">			<div style="text-align:<?php echo $_smarty_tpl->tpl_vars['alinea']->value;?>
;<?php if ($_smarty_tpl->tpl_vars['c_entradilla']->value||$_smarty_tpl->tpl_vars['c_descripcion']->value){?>margin:<?php if ($_smarty_tpl->tpl_vars['fwidth']->value<=$_smarty_tpl->tpl_vars['anchomedio']->value){?>0 15px 5px 0;float:<?php echo $_smarty_tpl->tpl_vars['alinea']->value;?>
;<?php }else{ ?>0 0 20px 0;<?php }?>;<?php }else{ ?>text-align:center;margin:0em;<?php }?><?php if ($_smarty_tpl->tpl_vars['width']->value>=@_IMGANCHOMAXIMO+100){?> margin:0 auto 20px auto;text-align:right;<?php }?>">				<div id="demoLightbox2" class="lightbox fade"  tabindex="-1" role="dialog" aria-hidden="true">                    <div class='lightbox-dialog'>                        <!--<span class="close cursor" onclick="closeModal()">&times;</span>-->                        <div class='lightbox-content'>                           <span class="close cursor" onclick="closeModal()" onkeypress="closeModal()">&times;</span>                            <img src="<?php echo $_smarty_tpl->tpl_vars['l_imagen']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
">                        </div>                        <span></span>                    </div>                </div>                <?php if ($_smarty_tpl->tpl_vars['l_imagen']->value!=''){?>                    <div class="contenedor_img_default">                        <?php if ($_smarty_tpl->tpl_vars['width']->value>=@_IMGANCHOMAXIMO+100){?>                            <a data-toggle="lightbox" href="#demoLightbox2" width="" onclick="abrirModal()" onkeypress="abrirModal()" title="<?php echo @_ROT_AMPLIAR_IMAGEN;?>
">                                <img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['l_imagen']->value;?>
&amp;w=500" alt="<?php echo $_smarty_tpl->tpl_vars['c_alt']->value;?>
" class="img-responsive">                            </a>                        <?php }else{ ?>                            <img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['l_imagen']->value;?>
&amp;w=500" alt="<?php echo $_smarty_tpl->tpl_vars['c_alt']->value;?>
" class="img-responsive">                        <?php }?>                    </div>                <?php }?>				<!-- <a href="<?php echo $_smarty_tpl->tpl_vars['l_imagen']->value;?>
" rel="lightbox[roadtrip]" class="linkInfo" style="text-decoration:none" title="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
">					<img class="img-responsive imgDefault img-responsive center-block" src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['l_imagen']->value;?>
&amp;w=800" alt="<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
" />				</a>	 -->				<?php if ($_smarty_tpl->tpl_vars['pie_imagen']->value!=''){?>					<span class="pie_foto col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $_smarty_tpl->tpl_vars['pie_imagen']->value;?>
</span>				<?php }?>				<br>				<!-- <?php if ($_smarty_tpl->tpl_vars['width']->value>=@_IMGANCHOMAXIMO+100){?>					<a class="ampliar" href="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" width="" title="<?php echo @_ROT_AMPLIAR_IMAGEN;?>
"><?php echo @_ROT_IMAGEN;?>
 [+]</a>				<?php }?> -->			</div>		</div>	<?php }?>	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">		<div class="titulo-interna"><?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
</div>		<div class="line-interna"></div>	</div>	<?php if ($_smarty_tpl->tpl_vars['c_iddisplay_sub']->value==19){?>		<div class="default-aux-1 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-right:80px">	<?php }else{ ?>		<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">	<?php }?>			<!--<?php if ($_smarty_tpl->tpl_vars['c_fecha']->value!=''&&$_smarty_tpl->tpl_vars['c_fecha']->value!="0000-00-00"){?><p class="fecha alto_contraste wrap8"><?php echo $_smarty_tpl->tpl_vars['c_fecha']->value;?>
</p><?php }?>-->			        <?php if ($_smarty_tpl->tpl_vars['c_entradilla']->value||$_smarty_tpl->tpl_vars['c_descripcion']->value){?>				<div class="default_entradilla col-lg-12 col-md-12 col-sm-12 col-xs-12" id="default_entradilla">					<?php if ($_smarty_tpl->tpl_vars['c_entradilla']->value!=''){?>						<div class="entradilla row" id="entradilla_row1"><?php echo $_smarty_tpl->tpl_vars['c_entradilla']->value;?>
</div>					<?php }?>										<?php if ($_smarty_tpl->tpl_vars['c_descripcion']->value!=''){?>						<div class="default_descripcion row" id="default_descripcion"><?php echo $_smarty_tpl->tpl_vars['c_descripcion']->value;?>
</div>					<?php }?>				</div>	        <?php }?>							<?php if ($_smarty_tpl->tpl_vars['c_submenu']->value!=''){?>				<div class="default_submenu<?php if (!($_smarty_tpl->tpl_vars['l_imagen']->value||$_smarty_tpl->tpl_vars['c_entradilla']->value||$_smarty_tpl->tpl_vars['c_descripcion']->value)){?> sinBorde<?php }?>">					<p class="hidden"><?php echo @_ROT_SUBCATEGORIAS;?>
</p>					<?php echo $_smarty_tpl->tpl_vars['c_submenu']->value;?>
				</div>	        <?php }?>					<!-- Redes Sociales -->			<div class="contador row">				<!-- Redes Sociales nuevas -->						 					</div>        </div>	</div>          </div>	 </div><div id="openLight" class="openLightbox"></div><script>	function mostrar_segunda_listado(id_categoria){				//$(".ocultar_icono_listado"+id_categoria).css("display", "none");		$(".redes_segunda_listado"+id_categoria).css("display", "block");	}		function ocultar_segunda_listado(id_categoria){		//$(".ocultar_icono_listado"+id_categoria).css("display", "block");		$(".redes_segunda_listado"+id_categoria).css("display", "none"); 	} </script>    <style type="text/css">        .lightbox{z-index: 1041;}        .close {color: black; position: absolute; top: 10px; right: 25px; font-size: 35px;font-weight: bold;}        .close:hover, .close:focus { color: #999; text-decoration: none; cursor: pointer;}        .openLightbox{opacity: .5;}    </style>    <script type="text/javascript">        function abrirModal(){            $('#modal-imagen').addClass('modal-backdrop fade in');            $('.lightbox').show();        }        function closeModal() {            $('.lightbox').hide();            $('body').removeClass('lightbox-open');            $('div').removeClass('modal-backdrop fade in');        }    </script><?php }} ?>