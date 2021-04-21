<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 03:51:08
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_buscar2.html" */ ?>
<?php /*%%SmartyHeaderCode:488026210602f35ac177148-67006088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4732143af6668fec2df8ee537915113d51ccb2ff' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_buscar2.html',
      1 => 1613604142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '488026210602f35ac177148-67006088',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Buscar' => 0,
    'isImages' => 0,
    'subMenuError' => 0,
    'c_action' => 0,
    'c_formulario_titulo' => 0,
    'idcategoria' => 0,
    'cadena_buscar' => 0,
    'c_buscar' => 0,
    'msgDiscriminado' => 0,
    'Keymatch' => 0,
    'isRelated' => 0,
    'rotuloBuscar' => 0,
    'desdeId' => 0,
    'hastaId' => 0,
    'total_time' => 0,
    'resultado' => 0,
    'verMas' => 0,
    'anterior' => 0,
    'paginacion' => 0,
    'paginaActual' => 0,
    'siguiente' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602f35ac339953_05733075',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602f35ac339953_05733075')) {function content_602f35ac339953_05733075($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_function_cycle')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/function.cycle.php';
?><script language="javascript" src="js/misc.js" type="text/javascript"></script>


<?php if ($_smarty_tpl->tpl_vars['Buscar']->value->registrosTotal==0&&$_smarty_tpl->tpl_vars['isImages']->value!==true){?>
	<script src="js/bs.js" type="text/javascript"></script>
	<script type="text/javascript">recuadro('suggest');</script>
<?php }?>

<!--Template Buscar-->
<div id="buscar">

	<?php if ($_smarty_tpl->tpl_vars['subMenuError']->value!=''){?>
	<!--Buscar:Error--><div id="buscar_error"><?php echo $_smarty_tpl->tpl_vars['subMenuError']->value;?>
</div><br><!--Fin Buscar:Error-->
	<?php }?>

	<!--Buscar:Formulario Búsqueda-->
	<div id="buscar_formulario">

		<form method="GET" action="<?php echo $_smarty_tpl->tpl_vars['c_action']->value;?>
" name="busqueda" AUTOCOMPLETE="OFF">
			<p class="buscar_form_info"><?php echo $_smarty_tpl->tpl_vars['c_formulario_titulo']->value;?>
</p>

<!--<a href="#" onclick="this.href='?idcategoria=<?php echo @_SBUSCAR;?>
&cadena_buscar=images:'+document.busqueda.cadena_buscar.value;">Ver sólo imágenes</a><br>-->

			<div class="buttons">
				<div id="btnSearch" class="btnSimple" onclick="behavior('');document.busqueda.submit();" onkeypress="behavior('');document.busqueda.submit();">Búsqueda</div>
				<div id="btnImage" class="btnSimple" onclick="behavior('Imagen');document.busqueda.submit();" onkeypress="behavior('Imagen');document.busqueda.submit();">Imágenes</div>
			</div>
			<div class="division_tabs"></div>

			<div class="forma_busqueda">
				<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>
">
				<input type="hidden" name="sI" id="soloImagenes" value="">
				<input type="hidden" name="idcategoria" value="<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
">
				<!-- <input type="text" id="cadena_buscar" name="cadena_buscar" title="cadena_buscar" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cadena_buscar']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="buscar_input" size="40" onkeypress="document.busqueda.titulo.value='';" <?php if ($_smarty_tpl->tpl_vars['Buscar']->value->registrosTotal==0&&$_smarty_tpl->tpl_vars['isImages']->value!==true){?>onclick="suggest('cadena_buscar', event)"<?php }?>> -->
				<input type="text" id="cadena_buscar" name="cadena_buscar" title="cadena_buscar" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cadena_buscar']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="buscar_input" size="40" <?php if ($_smarty_tpl->tpl_vars['Buscar']->value->registrosTotal==0&&$_smarty_tpl->tpl_vars['isImages']->value!==true){?>onclick="suggest('cadena_buscar', event)"<?php }?>>
				<!--<input type="submit" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['c_buscar']->value;?>
" class="buscar_boton">-->
				<input style="background-position:right;text-aling:right" type="submit" value="buscar" id="buscar" name="buscar" class="btnBuscar"/>
				<!--<div class="btnBuscar" onclick="document.busqueda.submit();">Buscar</div>-->
			</div>
		</form>

		
			<script language="Javascript" type="text/javascript">
				function behavior(tipo) {
					switch (tipo) {
						case 'Imagen':
							/** Verifica que el related no pase a imagenes */
							busca = document.getElementById('cadena_buscar').value;
							if(busca.indexOf('related:') >= 0) document.getElementById('cadena_buscar').value= '';

							document.getElementById("soloImagenes").value = "S";
							document.getElementById("btnImage").className = "btnImageSelect";
							document.getElementById("btnSearch").className = "btnSimple";
							document.getElementById("cadena_buscar").style.backgroundColor = "#E7EAED!important";
							break;
						default:
							document.getElementById("soloImagenes").value = "";
							document.getElementById("btnImage").className = "btnSimple";
							document.getElementById("btnSearch").className = "btnSearchSelect";
							document.getElementById("cadena_buscar").style.backgroundColor = "#F7F8F9!important";
					}
				}
			
			<?php if ($_smarty_tpl->tpl_vars['isImages']->value===true){?>
				behavior('Imagen');
			<?php }else{ ?>
				behavior('');
			<?php }?>
			</script>
		

		<?php if ($_smarty_tpl->tpl_vars['msgDiscriminado']->value!=''){?>
			<div class="discriminados"><?php echo $_smarty_tpl->tpl_vars['msgDiscriminado']->value;?>
</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['Buscar']->value->quisoDecir['label']!=''){?>
			<p class="quisodecir">Quizas quiso decir: <a href="?idcategoria=<?php echo @_SBUSCAR;?>
&amp;cadena_buscar=<?php echo $_smarty_tpl->tpl_vars['Buscar']->value->quisoDecir['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['Buscar']->value->quisoDecir['label'];?>
</a>?</p>
		<?php }?>
	</div>
	<!--Fin Buscar:Formulario Búsqueda-->


	<?php if ($_smarty_tpl->tpl_vars['Keymatch']->value){?>
		<div class="recomendada">
			<span>Secci&oacute;n Recomendada</span>
			<div class="keymatch">
		 		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['name'] = 'idkey';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['Keymatch']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['max'] = (int)2;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idkey']['total']);
?>
			 		<span><a href="<?php echo $_smarty_tpl->tpl_vars['Keymatch']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idkey']['index']]['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['Keymatch']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idkey']['index']]['titulo'];?>
</a></span>
			 		<a href="<?php echo $_smarty_tpl->tpl_vars['Keymatch']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idkey']['index']]['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['Keymatch']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idkey']['index']]['link'];?>
</a>
		 		<?php endfor; endif; ?>
			</div>
		</div>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['Buscar']->value->registrosTotal>0){?>
		<div class="head_results">
			<span style="text-align:left">
				<?php if ($_smarty_tpl->tpl_vars['isRelated']->value===true){?>
					Resultados similares a <br><b><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['rotuloBuscar']->value,65);?>
</b>
				<?php }elseif($_smarty_tpl->tpl_vars['isImages']->value===true){?>
					Imágenes con la búsqueda <br><b><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['rotuloBuscar']->value,65);?>
</b>
				<?php }else{ ?>
					Resultados con la búsqueda <br><b><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['rotuloBuscar']->value,65);?>
</b>
				<?php }?>
			</span>

			Mostrando <?php echo $_smarty_tpl->tpl_vars['desdeId']->value;?>
 al <?php echo $_smarty_tpl->tpl_vars['hastaId']->value;?>
 de <?php echo $_smarty_tpl->tpl_vars['Buscar']->value->registrosTotal;?>
<br/>(<?php echo $_smarty_tpl->tpl_vars['total_time']->value;?>
)
		</div>

		<?php if ($_smarty_tpl->tpl_vars['isImages']->value===true){?>
			<!--Template Galeria de Imágenes--><table summary="Galer&iacute;a de Im&aacute;genes" class="galeriaBuscar" cellspacing="7" id="galeria_foto"><tr><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['resultado']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total']);
?><?php if ((($_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index'])%3==0)&&($_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']!=0)){?></tr><tr><?php }?><td style="width:33%;"><table class="contenido" summary="" cellspacing="0"><tr><td class="tdImg"><!--Cuadro de la Imagen--><a href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idarticulo'];?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['titulo'], ENT_QUOTES, 'UTF-8', true);?>
"><img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
/<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'], ENT_QUOTES, 'UTF-8', true);?>
"></a></td></tr><tr><td class="comentario"><!--Comentario de la imagen--><a class="index_menu_segundo" href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idarticulo'];?>
" title="<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['titulo']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['titulo'],75);?>
</a></td></tr></table></td><?php endfor; endif; ?></tr></table><?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?><div align="center" id="paginacion"><?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>
</div><?php }?><!--Fin Template Galeria de Imágenes-->

		<?php }else{ ?>
			<!--Buscar:Resultados-->

			<div class="results">

				<?php if ($_smarty_tpl->tpl_vars['resultado']->value!=''){?>

						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['resultado']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total']);
?>
							<div class="articulo" style="background:<?php echo smarty_function_cycle(array('values'=>'#F3F5F7,#fff'),$_smarty_tpl);?>
;">
								<p class="migas">
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mg'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['name'] = 'mg';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['migas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['total']);
?>
										<?php if ($_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['migas'][$_smarty_tpl->getVariable('smarty')->value['section']['mg']['index']]['idcategoria']!=@_SINSTITUCIONAL&&$_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['migas'][$_smarty_tpl->getVariable('smarty')->value['section']['mg']['index']]['idcategoria']!=@_SUTILIDADES){?>
											<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['mg']['last']){?>
												<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['migas'][$_smarty_tpl->getVariable('smarty')->value['section']['mg']['index']]['nombre'];?>
<span>&gt;</span>
											<?php }else{ ?>
												<a href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['migas'][$_smarty_tpl->getVariable('smarty')->value['section']['mg']['index']]['idcategoria'];?>
" onclick="Set_Cookie('bc<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['bsitio'];?>
', '<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['bidarticulo'];?>
', 30);Set_Cookie('bq<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['bsitio'];?>
', document.getElementById('cadena_buscar').value, 30);Set_Cookie('bct<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['bsitio'];?>
', <?php echo $_smarty_tpl->tpl_vars['Buscar']->value->registrosTotal;?>
, 30);"><?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['migas'][$_smarty_tpl->getVariable('smarty')->value['section']['mg']['index']]['nombre'];?>
</a>
											<?php }?>
										<?php }?>
									<?php endfor; endif; ?>
								</p>
								<h4 class="titulo"><a href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idarticulo'];?>
" title="Ir a '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['tituloSinTags'], ENT_QUOTES, 'UTF-8', true);?>
'" onclick="Set_Cookie('bc<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['bsitio'];?>
', '<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['bidarticulo'];?>
', 30);Set_Cookie('bq<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['bsitio'];?>
', document.getElementById('cadena_buscar').value, 30);Set_Cookie('bct<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['bsitio'];?>
', <?php echo $_smarty_tpl->tpl_vars['Buscar']->value->registrosTotal;?>
, 30);"><?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['titulo'];?>
</a> - <a href="?idcategoria=<?php echo @_SBUSCAR;?>
&amp;cadena_buscar=related:<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idarticulo'];?>
" class="paginasimilar" title="Ver páginas similares a '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['tituloSinTags'], ENT_QUOTES, 'UTF-8', true);?>
'">Paginas Similares</a></h4>
								<?php if ($_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen']!=''){?>
									<img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
/<?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
&amp;w=70" alt="">
								<?php }?>
								<p class="contenido"><?php echo $_smarty_tpl->tpl_vars['resultado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['contenido'];?>
</p>
					    	</div>
					    	<div class="clearer" style="clear: left; line-height: 0; height: 0; font-size:0;">&nbsp;</div>
						<?php endfor; endif; ?>
				<?php }?>
			</div>
		<?php }?>

        <map title="<?php echo @_ROT_NAV_PAGER;?>
" name="nav_paginacion">
		<div class="paginacion">
        <p class="paginacion-aux-1">
			<?php if ($_smarty_tpl->tpl_vars['anterior']->value!=''){?>
				<a class="boton" href="?idcategoria=<?php echo @_SBUSCAR;?>
&amp;<?php if ($_smarty_tpl->tpl_vars['isImages']->value===true){?>sI=S&amp;<?php }?>pags=<?php echo $_smarty_tpl->tpl_vars['anterior']->value['id'];?>
&amp;<?php echo $_smarty_tpl->tpl_vars['anterior']->value['link'];?>
">&lsaquo;<?php echo @_ROT_ANTERIOR;?>
</a>
			<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idpag'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['name'] = 'idpag';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['paginacion']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idpag']['total']);
?>
					<?php if ($_smarty_tpl->tpl_vars['paginacion']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idpag']['index']]['id']==$_smarty_tpl->tpl_vars['paginaActual']->value){?>
						<span class="actual"><?php echo $_smarty_tpl->tpl_vars['paginacion']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idpag']['index']]['id'];?>
</span>&nbsp;
					<?php }else{ ?>
						<a href="?idcategoria=<?php echo @_SBUSCAR;?>
&amp;<?php if ($_smarty_tpl->tpl_vars['isImages']->value===true){?>sI=S&amp;<?php }?>pags=<?php echo $_smarty_tpl->tpl_vars['paginacion']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idpag']['index']]['id'];?>
&amp;<?php echo $_smarty_tpl->tpl_vars['paginacion']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idpag']['index']]['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['paginacion']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idpag']['index']]['id'];?>
</a>&nbsp;
					<?php }?>
				<?php endfor; endif; ?>
			<?php if ($_smarty_tpl->tpl_vars['siguiente']->value!=''){?>
				<a class="boton" href="?idcategoria=<?php echo @_SBUSCAR;?>
&amp;<?php if ($_smarty_tpl->tpl_vars['isImages']->value===true){?>sI=S&amp;<?php }?>pags=<?php echo $_smarty_tpl->tpl_vars['siguiente']->value['id'];?>
&amp;<?php echo $_smarty_tpl->tpl_vars['siguiente']->value['link'];?>
"><?php echo @_ROT_SIGUIENTE;?>
&rsaquo;</a>
			<?php }?>
        </p>
		</div>
        </map>
		<!--Fin Buscar:Resultados-->

	<?php }else{ ?>

		<?php if ($_smarty_tpl->tpl_vars['rotuloBuscar']->value!=''){?>
			<?php if ($_smarty_tpl->tpl_vars['isRelated']->value===true){?>
				<p style="padding:10px;background:#eee;font:bold 16px tahoma;">No se encontró contenido similares a <i>"<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['rotuloBuscar']->value,50);?>
"</i></p>
			<?php }elseif($_smarty_tpl->tpl_vars['isImages']->value===true){?>
				<p style="padding:10px;background:#eee;font:bold 16px tahoma;">No se encontró imágenes con la cadena <i>"<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['rotuloBuscar']->value,50);?>
"</i></p>
			<?php }else{ ?>
				<p style="padding:10px;background:#eee;font:bold 16px tahoma;">No se encontró contenido con la cadena <i>"<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['rotuloBuscar']->value,50);?>
"</i></p>
			<?php }?>
		<?php }?>

	<?php }?>

</div>
<!--Fin Template Buscar-->
<!-- Fin Template Buscar [tpl_buscar.html] -->
<?php }} ?>