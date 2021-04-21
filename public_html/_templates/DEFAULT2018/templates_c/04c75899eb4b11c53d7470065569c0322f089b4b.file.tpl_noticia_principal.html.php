<?php /* Smarty version Smarty-3.1.8, created on 2021-02-25 12:39:02
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_noticia_principal.html" */ ?>
<?php /*%%SmartyHeaderCode:10352852856032089bd07d16-89989026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04c75899eb4b11c53d7470065569c0322f089b4b' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_noticia_principal.html',
      1 => 1614201374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10352852856032089bd07d16-89989026',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_6032089bdae155_93621727',
  'variables' => 
  array (
    'c_titulo' => 0,
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
<?php if ($_valid && !is_callable('content_6032089bdae155_93621727')) {function content_6032089bdae155_93621727($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?><script src="<?php echo @_DIRJS;?>
cabezote.js"></script>
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
galleriffic/galleriffic-2.css" type="text/css">

<!-- ImplermentaciÃ³n de Librerias para Redes Sociales -->
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/social-likes_birman.css" type="text/css">
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/font-awesome.css" type="text/css">
<link rel="stylesheet" href="<?php echo @_DIRCSS;?>
redes_sociales/style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="<?php echo @_DIRCSS;?>
redes_sociales/social-likes.min.js"></script>

<style>
	.imagen_buscador
	{
		padding-left: 48px;
		width: 56px;
		height: 47px;
		line-height: 32px;
		background-image: url("_templates/DEFAULT2016/recursos/images/sprite_botones_ejercito.png");
		background-repeat: no-repeat;
		background-position: -481px -40px;
	}
</style>

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
	<div class="row">
		<div class="titulo-interna"><?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
</div>
		<div class="line-interna"></div>	
	</div>

</div>

<!-- Listado de Todas las Noticias -->
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div id="default" class="row">	
		<!-- Formulario de Busqueda -->
		<form action="?" name="frm_filtro">
			<input type="hidden" name="idcategoria" value="<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
						<table>
							<tr>
								<td>
									<input type="text" name="filtro_buscar" value="<?php echo $_smarty_tpl->tpl_vars['valor_filtro_busqueda']->value;?>
" id="filtro_buscar" class="form-control" placeholder="Encontrar">
								</td>
								<td>
									<div id="imagen_buscador" class="">
										<input type="submit" value="" class="buscar_filtro imagen_buscador" title="<?php echo @_ROT_FILTRO_BUSCAR;?>
" style="border: none; background: #eaeaea; background-image: url('_templates/DEFAULT2016/recursos/images/sprite_botones_ejercito.png'); background-repeat: no-repeat;background-position: -481px -40px;">
									</div>
								</td>
							<tr>
						</table>
						<br>
					</div>
				</div>
			</div>
			<div id="avanzada" class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="row">
					<center>
						<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
							<select id="filtro_fecha" name="filtro_fecha" title="filtro_fecha" class="form-control">
								<?php echo $_smarty_tpl->tpl_vars['selectFecha']->value;?>

							</select>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
							<select name="filtro_antetitulo" class="form-control filtro_antetitulo" id="filtro_antetitulo" title="filtro_antetitulo">
								<option value="" <?php if (!$_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAntetitulo']['index']]){?>selected<?php }?>>-- Todas las Categorias --</option>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']);
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
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAntetitulo']['index']][1];?>
"<?php if ($_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAntetitulo']['index']][1]==$_smarty_tpl->tpl_vars['valor_filtro_antetitulo']->value){?> selected<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAntetitulo']['index']][0],50,"...",false);?>
</option>
								<?php endfor; endif; ?>
							</select>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
							<select name="filtro_autor" class="form-control filtro_autor" id="filtro_autor" title="filtro_autor">
								<option value="" <?php if (!$_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAutor']['index']]){?>selected<?php }?>>-- Todos los Autores --</option>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']);
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
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['filtro_autor']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAutor']['index']];?>
"<?php if ($_smarty_tpl->tpl_vars['filtro_autor']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAutor']['index']]==$_smarty_tpl->tpl_vars['valor_filtro_autor']->value){?> selected<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['filtro_autor']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAutor']['index']],50,"...",false);?>
</option>
								<?php endfor; endif; ?>
							</select><br><br>
						</div>
					</center>	
				</div>
				
			</div>
		</form>

		<?php if ($_smarty_tpl->tpl_vars['c_submenu']->value!=''){?>
			<div class="default_submenu">
				<p class="hidden"><?php echo @_ROT_SUBCATEGORIAS;?>
</p class="hidden">
				<?php echo $_smarty_tpl->tpl_vars['c_submenu']->value;?>

			</div>
		<?php }?>
	</div>
</div>

<!-- Botones de Redes Sociales -->
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="caja-redes-2" style="text-align: right">
		<div class="social-likes" data-url="<?php echo @_URL;?>
index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
" data-title="<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
"><br>				
			<span class="facebook" style="border: #fff"><a href="#" class="icon-button facebook2"  title="Share link on Facebook"><span class="icon-facebook"></span><p class="hidden">Facebook</p><span class="boton_hover"></span></a></span>
			<span class="twitter" style="border: #fff"><a href="#" class="icon-button twitter2" title="Share link on Twitter"><span class="icon-twitter"></span><p class="hidden">Twitter</p><span class="boton_hover"></span></a></span>
			<span class="plusone" style="border: #fff"><a href="#" class="icon-button google-plus2" title="Share link on Google+"><span class="icon-google-plus"></span><p class="hidden">Google Plus</p><span class="boton_hover"></span></a></span>						
		</div>
	</div>
	<br><br><br>
</div>
<?php }} ?>