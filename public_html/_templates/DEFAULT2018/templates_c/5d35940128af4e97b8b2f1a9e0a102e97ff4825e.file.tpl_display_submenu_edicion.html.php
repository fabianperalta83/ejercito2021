<?php /* Smarty version Smarty-3.1.8, created on 2021-03-05 13:48:31
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_display_submenu_edicion.html" */ ?>
<?php /*%%SmartyHeaderCode:1168012743604236af15ee33-55105794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d35940128af4e97b8b2f1a9e0a102e97ff4825e' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_display_submenu_edicion.html',
      1 => 1613603958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1168012743604236af15ee33-55105794',
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
  'unifunc' => 'content_604236af1b20a3_20697951',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_604236af1b20a3_20697951')) {function content_604236af1b20a3_20697951($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/function.cycle.php';
?><?php if ($_smarty_tpl->tpl_vars['subMenu']->value!=''){?>

<!--SubMenu Edición -->
	<table style="width:100%;background:#6699CC;border:0" class="text-left" cellpadding=2 cellspacing=0 summary="Submenu">
	<tr>
	<td style="background:#FFF;text-align:center; font-size:20px;" colspan="6">
		<b><?php echo $_smarty_tpl->tpl_vars['rotSubMenu']->value;?>
</b>
	</td>
	</tr>

<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>
	<tr>
	<td colspan="6" style="background:#FFF;text-align:center"><?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>
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
<tr style='background:<?php echo smarty_function_cycle(array('values'=>"#FFFFFF,#FFFFFF"),$_smarty_tpl);?>
'><td width="16" class="" align="">[<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['orden'];?>
]</td><td class="TITULO_CONT1"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['vinculo'];?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['info_candado'];?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['info_home'];?>
</td><td width="37" class="edicion_elemento"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['boton_duplicar'];?>
</td><td width="37" class="edicion_elemento"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['boton_activo'];?>
</td><td width="37" class="edicion_elemento"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['boton_borrar'];?>
</td></tr>
<?php endfor; endif; ?>

<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>
	<tr>
    <td style="background:#FFF;text-align:center" colspan="6"><?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>
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