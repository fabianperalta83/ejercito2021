<?php /* Smarty version Smarty-3.1.8, created on 2021-03-09 01:28:28
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_registro.html" */ ?>
<?php /*%%SmartyHeaderCode:1013746216046cf3cd5f9c5-16487465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f972de7ff3ad4216fd3c1627fbbbd27219aea51' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_registro.html',
      1 => 1613603962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1013746216046cf3cd5f9c5-16487465',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subMenuError' => 0,
    'c_formulario_titulo2' => 0,
    'c_action' => 0,
    'campos2' => 0,
    'campos' => 0,
    'c_formulario_titulo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_6046cf3cdee278_50123223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6046cf3cdee278_50123223')) {function content_6046cf3cdee278_50123223($_smarty_tpl) {?>
<!--Template Formulario de Registro-->
<div id="utilidades">

	<?php if ($_smarty_tpl->tpl_vars['subMenuError']->value!=''){?><div class="advertencia"><br><?php echo $_smarty_tpl->tpl_vars['subMenuError']->value;?>
<br></div>
	<?php }?>

	<div><br><?php echo $_smarty_tpl->tpl_vars['c_formulario_titulo2']->value;?>
<br><br></div>

	<form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['c_action']->value;?>
" target="_self">
		<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>
">
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['campos2']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><?php if ($_smarty_tpl->tpl_vars['campos2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']!=''){?><div class="col-md-12 col-xs-12 col-lg-12 col-sm-12"><?php echo $_smarty_tpl->tpl_vars['campos2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
</div><div class="col-md-12 col-xs-12 col-lg-12 col-sm-12"><?php echo $_smarty_tpl->tpl_vars['campos2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['campos2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
<?php }?><?php endfor; endif; ?>

		<?php if ($_smarty_tpl->tpl_vars['campos']->value!=''){?>
			<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="text-align: center;">
				<input type="submit" value="Recordar mis datos" class="btn btn-primary" />
			</div>
		<?php }?>
	</form>

	<div><br><br><br><?php echo $_smarty_tpl->tpl_vars['c_formulario_titulo']->value;?>
<br></div>

	<form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['c_action']->value;?>
" target="_self">
		<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>
">
		
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['campos']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']!=''){?><?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input']!=''){?><div class="col-md-4 col-xs-12 col-lg-4 col-sm-12"><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
</div><div class="col-md-8 col-xs-12 col-lg-8 col-sm-12"><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
</div><?php }else{ ?><div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="text-align: center; margin-bottom: 10px;"><strong><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
</strong></div><?php }?><?php }else{ ?><div class="col-md-6 col-xs-12 col-lg-6 col-sm-12"><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
</div><?php }?>
		<?php endfor; endif; ?>

		<?php if ($_smarty_tpl->tpl_vars['campos']->value!=''){?>
			<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="text-align: center;">
				<div class="titulo_formulario"></div>
				<div class="lb_formulario_centro">
					<div class='form-group'>
						<label for="hash">Confirme el codigo: </label>
						<input type="text" name="hash" id="hash" class="form-control" />
					</div>
				</div>
				<div style="text-align:center">
					<img src="tools/captcha.php" alt="Esto nos ayuda a prevenir los registros automatizados." />
				</div>
			</div>
		   	<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="text-align:center; background-position:center; margin-top:15px;">
				<input type="submit" value="Crear mi Cuenta" class="btn btn-primary" />
			</div>
		<?php }?>
	</form>

	<br><br>

</div>
<!--Fin Template Formulario de Registro-->
<?php }} ?>