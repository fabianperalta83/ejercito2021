<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 21:00:52
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_display_submenu_edicion.html" */ ?>
<?php /*%%SmartyHeaderCode:63771900560302704a791d7-77964028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '178d9244fd7a17cc834f9f065d9aeced62c3b1e7' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_display_submenu_edicion.html',
      1 => 1613604143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63771900560302704a791d7-77964028',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subMenu' => 0,
    'rotSubMenu' => 0,
    'verMas' => 0,
    'rotSubMenuConvenciones' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_60302704b3bcb6_35718461',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60302704b3bcb6_35718461')) {function content_60302704b3bcb6_35718461($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/function.cycle.php';
?><?php if ($_smarty_tpl->tpl_vars['subMenu']->value!=''){?>

<!--SubMenu Edición -->
	<table style="width:100%;background:#6699CC;border:0" class="text-left" cellpadding=2 cellspacing=0 summary="Submenu">
	<tr>
	<td style="background:#F0F7FF;text-align:center" colspan="6">
		<b><?php echo $_smarty_tpl->tpl_vars['rotSubMenu']->value;?>
</b>
	</td>
	</tr>

<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>
	<tr>
	<td colspan="6" style="background:#F0F7FF;text-align:center"><?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>
</td>
	</tr>
<?php }?>

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
?>
<tr style='background:<?php echo smarty_function_cycle(array('values'=>"#F0F7FF,#FFFFFF"),$_smarty_tpl);?>
'><td width="37" class="edicion_elemento"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['boton_borrar'];?>
</td><td width="37" class="edicion_elemento"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['boton_duplicar'];?>
</td><td width="37" class="edicion_elemento"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['boton_activo'];?>
</td><td width="16" class="edicion_elemento"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['boton_mini_subir'];?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['boton_mini_bajar'];?>
</td><td width="16" class="edicion_elemento" align="center"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['orden'];?>
</td><td class="edicion_elemento"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['vinculo'];?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['info_candado'];?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['info_home'];?>
</td></tr>
<?php endfor; endif; ?>

<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>
	<tr>
    <td style="background:#F0F7FF;text-align:center" colspan="6"><?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>
</td>
	</tr>
<?php }?>

	<tr>
    <td style="background:#fff;text-align:right" colspan="6">
		<?php echo $_smarty_tpl->tpl_vars['rotSubMenuConvenciones']->value;?>

    </td>
	</tr>
</table>
<!--FIN SubMenu Edición -->

<?php }?><?php }} ?>