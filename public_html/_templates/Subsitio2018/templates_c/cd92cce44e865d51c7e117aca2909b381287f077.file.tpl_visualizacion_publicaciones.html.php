<?php /* Smarty version Smarty-3.1.8, created on 2021-02-22 12:16:03
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_visualizacion_publicaciones.html" */ ?>
<?php /*%%SmartyHeaderCode:16710747976033a08368e9d8-71261935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd92cce44e865d51c7e117aca2909b381287f077' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_visualizacion_publicaciones.html',
      1 => 1613604147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16710747976033a08368e9d8-71261935',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subMenu' => 0,
    'verMas' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_6033a083736768_33522412',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6033a083736768_33522412')) {function content_6033a083736768_33522412($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?><script type="text/javascript" src="js/prototype.js"></script>
<noscript>
<p><?php echo @_ROT_NOSCRIPT;?>
. Lightbox uses the Prototype Framework</p>
</noscript>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<noscript>
<p>Lightbox uses the Scriptaculous Effects Library</p>
</noscript>
<script type="text/javascript" src="js/lightbox.js"></script>
<noscript>
<p>Lightbox is a simple, unobtrusive script used to overlay images on
the current page.</p>
</noscript>

<!--Template visualización publicaciones-->

    <div style="padding-left:0px">

    <!-- <img src="<?php echo @_DIRIMAGES;?>
Cabeza.png" alt="Cabezotet" style="width:679px;margin-left:2px"/>-->

     

    <div style="background:url('_templates/DEFAULT2012/recursos/images/centro.png') repeat-y scroll 0 0 transparent;margin-left: 22px;width:638px">
	<table id="galeria_foto" style="margin-left: 58px;width:80%;border:none">
		<tr style="height: 317px;width: 783px;border:none">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['subMenu']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?> <?php if ((($_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index'])%3==0)&&($_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']!=0)){?>
		<tr style="height: 285px;width: 783px;border:none">
			<?php }?>
			<td style="width:25%;vertical-align:top;border:none">
			<table class="contenido" summary="<?php echo @_ROT_SUMMARY;?>
" style="background:transparent;border:none">
				<tr>
					<td class="tdImg" colspan="2" style="height: 165px;border:none"><!--Cuadro de la Imagen-->
					<a href="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['entradilla'];?>
"
						target="_blank" style="text-decoration:none"
						title="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
">
						<img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
/<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
&amp;w=140;h=88" alt="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
"  style="padding-top:10px;"/>
					</a>
					</td>
				</tr>
				<tr>
					<td class="comentario" colspan="2">
						<a class="index_menu_segundo"
							href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
" style="color:#FFF;text-shadow: black 0.1em 0.1em 0.2em"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'],75);?>

						</a>
					</td>
				</tr>
			</table>
			</td>
			<?php endfor; endif; ?>
		</tr>
	</table>
	</div>
	
	<!--<img src="<?php echo @_DIRIMAGES;?>
pie.png" alt="Cabezotet" style="width:638px;margin-left: 24px;"/>-->
	
	</div>

<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>
    <?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>

<?php }?>

<!--Fin Template visualizar publicaciones--><?php }} ?>