<?php /* Smarty version Smarty-3.1.8, created on 2021-02-21 04:51:36
         compiled from "/home/ejercitomil/public_html/_include/constantes/_templates/Default/templates/constantes_sitio.html" */ ?>
<?php /*%%SmartyHeaderCode:5985282736031e6d8ef6f76-73044385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bee56a0ce43d038fe4e287df72744192850b2fa5' => 
    array (
      0 => '/home/ejercitomil/public_html/_include/constantes/_templates/Default/templates/constantes_sitio.html',
      1 => 1613609382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5985282736031e6d8ef6f76-73044385',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'info_cajas' => 0,
    'datos' => 0,
    'llave' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_6031e6d9003ea6_99614946',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6031e6d9003ea6_99614946')) {function content_6031e6d9003ea6_99614946($_smarty_tpl) {?><p>Por medio de este formulario ud podra cambiar las constantes de sitio que permiten la configuracion del home.</p><br>


<form method="POST">
	<table>
	<?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_smarty_tpl->tpl_vars['llave'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['info_cajas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
 $_smarty_tpl->tpl_vars['llave']->value = $_smarty_tpl->tpl_vars['datos']->key;
?>
	<tr>	
		<td>
			<?php echo $_smarty_tpl->tpl_vars['datos']->value['constante'];?>

		</td>
		<td>
			<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['valor'];?>
" size="80" name="<?php echo $_smarty_tpl->tpl_vars['datos']->value['constante'];?>
" <?php if ($_smarty_tpl->tpl_vars['datos']->value['activo']=='false'){?>disabled style='background:url(recursos_user/inactiva.gif) no-repeat right'<?php }else{ ?>style='background:url(recursos_user/activa.gif) no-repeat right'<?php }?>>
			<input type="hidden" name="tipo<?php echo $_smarty_tpl->tpl_vars['llave']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['tipo'];?>
">
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="2" align="right">
			<input type="submit" value="Modificar" name="guardar">
		</td>
	</tr>
	</table>
</form><?php }} ?>