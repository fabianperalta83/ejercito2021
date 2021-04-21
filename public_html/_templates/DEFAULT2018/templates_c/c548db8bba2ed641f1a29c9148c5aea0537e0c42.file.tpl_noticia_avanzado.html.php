<?php /* Smarty version Smarty-3.1.8, created on 2021-02-24 21:41:34
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_noticia_avanzado.html" */ ?>
<?php /*%%SmartyHeaderCode:45633528602e7b0f91e202-83871066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c548db8bba2ed641f1a29c9148c5aea0537e0c42' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_noticia_avanzado.html',
      1 => 1614201374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45633528602e7b0f91e202-83871066',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e7b0f9cf3c6_09307633',
  'variables' => 
  array (
    'c_titulo' => 0,
    'c_subtitulo' => 0,
    'c_fecha' => 0,
    'l_imagen' => 0,
    'c_entradilla' => 0,
    'c_descripcion' => 0,
    'width' => 0,
    'c_alt' => 0,
    'c_autor' => 0,
    'idcategoria' => 0,
    'valor_filtro_busqueda' => 0,
    'selectFecha' => 0,
    'filtro_antetitulo' => 0,
    'valor_filtro_antetitulo' => 0,
    'filtro_autor' => 0,
    'valor_filtro_autor' => 0,
    'c_submenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e7b0f9cf3c6_09307633')) {function content_602e7b0f9cf3c6_09307633($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?><!-- ADD THIS REDES SOCIALES--><!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-547357e86ed99dc7"></script>  -->   <!-- Go to www.addthis.com/dashboard to customize your tools --><!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-547357e86ed99dc7" async="async"></script> --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.css"><script type="text/javascript" src="<?php echo @_DIRJS;?>
lightbox/bootstrap-lightbox.js"></script><script src="<?php echo @_DIRJS;?>
cabezote.js"></script><link rel="stylesheet" href="<?php echo @_DIRCSS;?>
galleriffic/galleriffic-2.css" type="text/css"><!-- Implermentación de Librerias para Redes Sociales --><link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/social-likes_birman.css" type="text/css"><link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/font-awesome.css" type="text/css"><link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/style.css" type="text/css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script><script src="<?php echo @_DIRCSS;?>
redes_sociales/social-likes.min.js"></script><style>	.imagen_buscador	{		padding-left: 48px;		width: 56px;		height: 47px;		line-height: 32px;		background-image: url("_templates/DEFAULT2016/recursos/images/sprite_botones_ejercito.png");		background-repeat: no-repeat;		background-position: -481px -40px;	}</style><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">		<!-- Titulo de Categoria Principal  -->	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">		<div class="titulo-interna"><?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
<br><br></div>	</div>		<!-- Antetitulo  -->	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">		<?php if ($_smarty_tpl->tpl_vars['c_subtitulo']->value!=''){?>			<div class="titulo_actualidad"><center><?php echo $_smarty_tpl->tpl_vars['c_subtitulo']->value;?>
</center><br><br></div>		<?php }?>	</div>				<!-- Fecha  -->	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">		<?php if ($_smarty_tpl->tpl_vars['c_fecha']->value!=''&&$_smarty_tpl->tpl_vars['c_fecha']->value!="0000-00-00"){?>			<!-- <div class="fecha"><?php echo $_smarty_tpl->tpl_vars['c_fecha']->value;?>
<br><br></div> -->		<?php }?>	</div>		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">		<?php if ($_smarty_tpl->tpl_vars['l_imagen']->value||$_smarty_tpl->tpl_vars['c_entradilla']->value||$_smarty_tpl->tpl_vars['c_descripcion']->value){?>			<div class="default_entradilla" id="default_entradilla">				<div id="demoLightbox2" class="lightbox fade"  tabindex="-1" role="dialog" aria-hidden="true">                    <div class='lightbox-dialog'>                        <!--<span class="close cursor" onclick="closeModal()">&times;</span>-->                        <div class='lightbox-content'>                           <span class="close cursor" onclick="closeModal()" onkeypress="closeModal()">&times;</span>                            <img src="<?php echo $_smarty_tpl->tpl_vars['l_imagen']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
">                        </div>                        <span></span>                    </div>                </div>				<?php if ($_smarty_tpl->tpl_vars['l_imagen']->value!=''){?>                    <div class="contenedor_img_default">                        <?php if ($_smarty_tpl->tpl_vars['width']->value>=@_IMGANCHOMAXIMO+100){?>                            <a data-toggle="lightbox" href="#demoLightbox2" width="" onclick="abrirModal()" onkeypress="abrirModal()" title="<?php echo @_ROT_AMPLIAR_IMAGEN;?>
">                                <img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['l_imagen']->value;?>
&amp;w=500" alt="<?php echo $_smarty_tpl->tpl_vars['c_alt']->value;?>
" class="img-responsive">                            </a>                        <?php }else{ ?>                            <img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['l_imagen']->value;?>
&amp;w=500" alt="<?php echo $_smarty_tpl->tpl_vars['c_alt']->value;?>
" class="img-responsive">                        <?php }?>                    </div>                <?php }?>				<?php if ($_smarty_tpl->tpl_vars['c_entradilla']->value!=''){?>					<div class="entradilla"><?php echo $_smarty_tpl->tpl_vars['c_entradilla']->value;?>
</div>				<?php }?>								<?php if ($_smarty_tpl->tpl_vars['c_descripcion']->value!=''){?>					<div class="default_descripcion" id="default_descripcion"><?php echo $_smarty_tpl->tpl_vars['c_descripcion']->value;?>
</div>				<?php }?>								<?php if ($_smarty_tpl->tpl_vars['c_autor']->value!=''){?>					<p class="default_autor"><?php echo $_smarty_tpl->tpl_vars['c_autor']->value;?>
</p>				<?php }?>			</div>		<?php }?>	</div>		<br><br>		<form action="?" name="frm_filtro">		<input type="hidden" name="token" value=<?php echo $_SESSION['token'];?>
>		<input type="hidden" name="idcategoria" value="<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
">		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">				<!-- <table> --> <!-- ORIGINAL -->                <table class="form-group" style="width: 100%;"> <!-- NUEVO ORDEN DE DISEÑO PARA FORMULARIO DE BUSQUEDA 30/05/2019 -->					<tr>						<td>							<input type="text" name="filtro_buscar" value="<?php echo $_smarty_tpl->tpl_vars['valor_filtro_busqueda']->value;?>
" id="filtro_buscar" class="form-control" placeholder="Encontrar" style="width: 100%;">						</td>											<tr>				</table>							</div>		</div>		<div id="avanzada" class="col-md-12 col-lg-12 col-sm-12 col-xs-12">			<center>				<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="margin-bottom:10px;">					<select id="filtro_fecha" name="filtro_fecha" title="filtro_fecha" class="form-control" style="height:30px;">						<?php echo $_smarty_tpl->tpl_vars['selectFecha']->value;?>
					</select>				</div>				<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="margin-bottom:10px;">					<select name="filtro_antetitulo" class="form-control filtro_antetitulo" id="filtro_antetitulo" title="filtro_antetitulo" style="height:30px;">						<option value="" <?php if (!$_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAntetitulo']['index']]){?>selected<?php }?>>-- Todas las Categorias --</option>						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['name'] = 'idAntetitulo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['filtro_antetitulo']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['total']);
?>							<option value="<?php echo $_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAntetitulo']['index']][1];?>
"<?php if ($_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAntetitulo']['index']][1]==$_smarty_tpl->tpl_vars['valor_filtro_antetitulo']->value){?> selected<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAntetitulo']['index']][0],50,"...",false);?>
</option>						<?php endfor; endif; ?>					</select>				</div>				<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" >					<select name="filtro_autor" class="form-control filtro_autor" id="filtro_autor" title="filtro_autor" style="height:30px;">						<option value="" <?php if (!$_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAutor']['index']]){?>selected<?php }?>>-- Todos los Autores --</option>						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['name'] = 'idAutor';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['filtro_autor']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['total']);
?>							<option value="<?php echo $_smarty_tpl->tpl_vars['filtro_autor']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAutor']['index']];?>
"<?php if ($_smarty_tpl->tpl_vars['filtro_autor']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAutor']['index']]==$_smarty_tpl->tpl_vars['valor_filtro_autor']->value){?> selected<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['filtro_autor']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAutor']['index']],50,"...",false);?>
</option>						<?php endfor; endif; ?>					</select><br><br>				</div>				<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">					<div id="imagen_buscador" class="">						 <button type="submit" class="btn-danger" style="background:red; padding:10px; border:none; border-radius: 8px;float:left; min-width:100px;">Buscar</button>					</div>				</div>			</center>		</div>	</form></div><div id="openLight" class="openLightbox"></div><br><br><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">	<?php if ($_smarty_tpl->tpl_vars['c_submenu']->value!=''){?>		<div class="default_submenu">			<h4 class="wrap8"><?php echo @_ROT_SUBCATEGORIAS;?>
</h4><br><br>			<?php echo $_smarty_tpl->tpl_vars['c_submenu']->value;?>
		</div>	<?php }?></div><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">	<div class="contador row">		<!-- Redes Sociales nuevas -->		<div class="caja-redes-2" style="text-align: right">			<div class="social-likes" data-url="<?php echo @_URL;?>
index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
" data-title="<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
"><br>								<span class="facebook" style="border: #fff"><a href="#" class="icon-button facebook2"  title="Share link on Facebook"><i class="icon-facebook"></i><span></span></a></span>				<span class="twitter" style="border: #fff"><a href="#" class="icon-button twitter2" title="Share link on Twitter"><i class="icon-twitter"></i><span></span></a></span>				<span class="plusone" style="border: #fff"><a href="#" class="icon-button google-plus2" title="Share link on Google+"><i class="icon-google-plus"></i><span></span></a></span>									</div>		</div>		 			</div>	<br><br><br></div></div></div><script>	$(document).ready(function()	{		Actualizar_Tamano();	}); 	function mostrar_segunda_listado(id_categoria)	{				$(".ocultar_icono_listado"+id_categoria).css("display", "none");		$(".redes_segunda_listado"+id_categoria).css("display", "block");	}		function ocultar_segunda_listado(id_categoria)	{		$(".ocultar_icono_listado"+id_categoria).css("display", "block");		$(".redes_segunda_listado"+id_categoria).css("display", "none"); 	} 		jQuery(window).resize(function(e) 	{		Actualizar_Tamano();	});		function Actualizar_Tamano()	{		var width = window.innerWidth;				if(width <= 1024)		{			$("#filtro_buscar").css("width", "");					}		else		{			//			$("#filtro_buscar").css("width", "350px");      //* TAMAÑO ORIGINAL *//                        $("#filtro_buscar").css("width", "100%");       //* NUEVO TAMAÑO PARA EL INPUT DE BUSQUEDA FORMULARIO 30/05/2019 *//			}  	}</script>    <style type="text/css">        .lightbox{z-index: 1041;}        .close {color: black; position: absolute; top: 10px; right: 25px; font-size: 35px;font-weight: bold;}        .close:hover, .close:focus { color: #999; text-decoration: none; cursor: pointer;}        .openLightbox{opacity: .5;}    </style>    <script type="text/javascript">        function abrirModal(){            $('#modal-imagen').addClass('modal-backdrop fade in');            $('.lightbox').show();        }        function closeModal() {            $('.lightbox').hide();            $('body').removeClass('lightbox-open');            $('div').removeClass('modal-backdrop fade in');        }    </script><?php }} ?>