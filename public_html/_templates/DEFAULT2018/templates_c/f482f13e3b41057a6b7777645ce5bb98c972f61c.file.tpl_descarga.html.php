<?php /* Smarty version Smarty-3.1.8, created on 2021-02-18 16:02:40
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_descarga.html" */ ?>
<?php /*%%SmartyHeaderCode:695112625602e8fa07b00f1-14239571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f482f13e3b41057a6b7777645ce5bb98c972f61c' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_descarga.html',
      1 => 1613603958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '695112625602e8fa07b00f1-14239571',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'seccion' => 0,
    'indexacion' => 0,
    'archivo' => 0,
    'idcategoria' => 0,
    'extension_archivo' => 0,
    'tamano' => 0,
    'c_titulo' => 0,
    'archivo_scribd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e8fa08290a8_85147152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e8fa08290a8_85147152')) {function content_602e8fa08290a8_85147152($_smarty_tpl) {?><!-- ADD THIS REDES SOCIALES-->
<!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-547357e86ed99dc7"></script>  -->
   
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-547357e86ed99dc7" async="async"></script> -->
<script src="<?php echo @_DIRJS;?>
cabezote.js"></script>
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
galleriffic/galleriffic-2.css" type="text/css">

<!-- Implermentación de Librerias para Redes Sociales -->
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/social-likes_birman.css" type="text/css">
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/font-awesome.css" type="text/css">
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/style.css" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="<?php echo @_DIRCSS;?>
redes_sociales/social-likes.min.js"></script>

<style>
	.imagen_pdf
	{
		padding-left: 48px;
		width: 56px;
		height: 47px;
		line-height: 32px;
		background-image: url("_templates/DEFAULT2016/recursos/images/sprite_botones_ejercito.png");
		background-repeat: no-repeat;
		background-position: -299px -40px;
	}
	
	.imagen_doc
	{
		padding-left: 48px;
		width: 56px;
		height: 47px;
		line-height: 32px;
		background-image: url("_templates/DEFAULT2016/recursos/images/sprite_botones_ejercito.png");
		background-repeat: no-repeat;
		background-position: -353px -40px;
	}
	
	.imagen_xls
	{
		padding-left: 48px;
		width: 56px;
		height: 47px;
		line-height: 32px;
		background-image: url("_templates/DEFAULT2016/recursos/images/sprite_botones_ejercito.png");
		background-repeat: no-repeat;
		background-position: -406px -40px;
	}
	
	.imagen_default
	{
		padding-left: 51px;
		width: 53px;
		height: 70px;
		line-height: 32px;
		background-image: url("_templates/DEFAULT2016/recursos/images/sprite_botones_ejercito.png");
		background-repeat: no-repeat;
		background-position: -460px -111px;
	}
	
	.imagen_descargar
	{
		padding-left: 1px;
		width: 13px;
		height: 11px;
		line-height: 32px;
		background-image: url("_templates/DEFAULT2016/recursos/images/sprite_botones_ejercito.png");
		background-repeat: no-repeat;
		background-position: -17px -40px;
	}
</style>

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

	<!-- Titulo de Categoria Principal  -->
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<div class="titulo-interna"><?php echo $_smarty_tpl->tpl_vars['seccion']->value['nombre'];?>
<br><br></div>
	</div>
	
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<?php if ($_smarty_tpl->tpl_vars['seccion']->value['entradilla']!=''){?>
        <div id="default_entradilla">
        	<div class="default_descripcion">
        		<?php if ($_smarty_tpl->tpl_vars['indexacion']->value==0){?>
        			<?php echo $_smarty_tpl->tpl_vars['seccion']->value['entradilla'];?>

        		<?php }?>
				<br><br>
        	</div>
        </div>
        <?php }?>
	</div>
		<?php if ($_smarty_tpl->tpl_vars['archivo']->value){?>
			<form action="?" id="frm_descarga">
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<center>
						<input type="hidden" name="idcategoria" value="<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
">
						<input type="hidden" name="download" value="Y">
						<?php if ($_smarty_tpl->tpl_vars['extension_archivo']->value=="pdf"){?>
							<!-- <div alt="" class="imagen_pdf">&nbsp;</div> --> <!-- CONTENEDOR ORIGINAL -->
							<div alt="" class="imagen_pdf" hidden>&nbsp;</div> <!-- SE OCULTA CONTENEDOR PARA QUE NO GENERE UNA IMAGEN EN BLANCO 29/05/2019 -->
						<?php }elseif($_smarty_tpl->tpl_vars['extension_archivo']->value=="doc"||$_smarty_tpl->tpl_vars['extension_archivo']->value=="docx"){?>
							<div alt="" class="imagen_doc">&nbsp;</div>
						<?php }elseif($_smarty_tpl->tpl_vars['extension_archivo']->value=="xls"||$_smarty_tpl->tpl_vars['extension_archivo']->value=="xlsx"){?>
							<div alt="" class="imagen_xls">&nbsp;</div>
						<?php }else{ ?>
							<!-- <div alt="" class="imagen_default">&nbsp;</div> --> <!-- CONTENEDOR ORIGINAL -->
						<?php }?>
						<!-- <a  onclick="document.getElementById('frm_descarga').submit();" class="name_red_box"><?php echo $_smarty_tpl->tpl_vars['archivo']->value;?>
</a> <span class="name_red_box">(<?php echo $_smarty_tpl->tpl_vars['tamano']->value;?>
)</span> --> <!-- CONTENEDOR ORIGINAL, SE OCULTA CONTENEDOR PARA QUE NO GENERE LAS ESPECIFICACIONES DEL ARCHIVO 29/05/2019 -->
					</center>
				</div>
						
				<!-- Botón de descarga de archivo -->
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<center>
						<!-- <div class="name_red_box">
							<a  onclick="document.getElementById('frm_descarga').submit();"><b>Descargar<b></a>							
						</div>
						<div class="name_red_box imagen_descargar"></div> --> <!-- CONTENEDOR ORIGINAL DE LINK DE DESCARGAR -->
						<div class="name_red_box">
                                                    <a  onclick="document.getElementById('frm_descarga').submit();"><img src="_templates/DEFAULT2018/recursos/images/Downloader_btn.png" alt="" style="width: 50%;"/></a>	<!-- SE MODIFICA DISEÑO DE LINK DE DESCARGA DE ARCHIVOS 29/05/2019 -->						
                                                </div>
						
					</center>
				</div>
			</form>
		<?php }else{ ?>
			El Archivo no esta disponible para su descarga, por favor intentelo m&aacute;s tarde o comunique este imprevisto <a href="?idcategoria=6">aqu&iacute;</a> .
		<?php }?>
</div>
<div id='embedded_doc'>
</div>

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="contador row">
		<!-- Redes Sociales nuevas -->
		<div class="caja-redes-2" style="text-align: right">
			<div class="social-likes" data-url="<?php echo @_URL;?>
index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
" data-title="<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
"><br>				
				<span class="facebook" style="border: #fff"><a href="#" class="icon-button facebook2"  title="Share link on Facebook"><i class="icon-facebook"></i><span></span></a></span>
				<span class="twitter" style="border: #fff"><a href="#" class="icon-button twitter2" title="Share link on Twitter"><i class="icon-twitter"></i><span></span></a></span>
				<span class="plusone" style="border: #fff"><a href="#" class="icon-button google-plus2" title="Share link on Google+"><i class="icon-google-plus"></i><span></span></a></span>						
			</div>
		</div>		 		
	</div>
	<br><br><br>
</div>
</div>
</div>
<script type="text/javascript">
	var scribd_doc = scribd.Document.getDocFromUrl('<?php echo @_URL;?>
/recursos_user/<?php echo $_smarty_tpl->tpl_vars['archivo_scribd']->value;?>
', 'pub-17395155373481803133');
	scribd_doc.addParam("height", 600);
	scribd_doc.addParam("width", 500);
	scribd_doc.addParam("public", false);
	scribd_doc.write('embedded_doc');
</script><?php }} ?>