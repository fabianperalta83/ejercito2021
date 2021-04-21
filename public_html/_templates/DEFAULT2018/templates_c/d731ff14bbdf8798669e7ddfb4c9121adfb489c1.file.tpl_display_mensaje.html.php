<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 02:51:48
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_display_mensaje.html" */ ?>
<?php /*%%SmartyHeaderCode:1418091902602f27c4c499e8-41195696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd731ff14bbdf8798669e7ddfb4c9121adfb489c1' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_display_mensaje.html',
      1 => 1613603958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1418091902602f27c4c499e8-41195696',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tipo' => 0,
    'rotMensaje' => 0,
    'elementoMenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602f27c4c96d84_64929557',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602f27c4c96d84_64929557')) {function content_602f27c4c96d84_64929557($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/function.cycle.php';
?><!-- Mensaje del sistema -->
<table style="width:95%;background:#69C" cellpadding=3 cellspacing=1 align=center summary="Mensaje del sistema">
<tr>
    <td style="background:#F0F7FF;text-align:center">
<?php if ($_smarty_tpl->tpl_vars['tipo']->value=="error"){?>
    <img src="<?php echo @_DIR_IMAGES_EDITOR;?>
msg_error.gif" alt="Error">
<?php }else{ ?>    
    <img src="<?php echo @_DIR_IMAGES_EDITOR;?>
msg_info.gif" alt="Advertencia">
<?php }?>    
    </td>
    <td style="background:#F0F7FF;text-align:left">
		<table width="100%" cellpadding=5 cellspacing=0 summary="Mensajes">
		<tr>
		<th style="background:#F0F7FF"><?php echo $_smarty_tpl->tpl_vars['rotMensaje']->value;?>
</th>
		</tr>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['elementoMenu']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr><td style='background:<?php echo smarty_function_cycle(array('values'=>"#F0F7FF,#FFFFFF"),$_smarty_tpl);?>
'><?php echo $_smarty_tpl->tpl_vars['elementoMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']];?>
</td></tr>
<?php endfor; endif; ?>
	</table>
	</td>
	</tr>  
</table>
<!-- FIN Mensaje del sistema -->
<?php }} ?>