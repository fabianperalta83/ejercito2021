<?php /* Smarty version Smarty-3.1.8, created on 2021-02-20 11:31:40
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_contacto.html" */ ?>
<?php /*%%SmartyHeaderCode:17802243756030f31c625617-31573248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fa85f79eede948072a7ef4d884101347bb8dddd' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_contacto.html',
      1 => 1613604142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17802243756030f31c625617-31573248',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subMenuError' => 0,
    'c_formulario_titulo' => 0,
    'c_action' => 0,
    'campos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_6030f31c68a134_60096266',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6030f31c68a134_60096266')) {function content_6030f31c68a134_60096266($_smarty_tpl) {?><!--Template Formulario de Contacto-->
<div id="utilidades">

	<?php if ($_smarty_tpl->tpl_vars['subMenuError']->value!=''){?>
		<div class="advertencia"><br><?php echo $_smarty_tpl->tpl_vars['subMenuError']->value;?>
<br></div>
	<?php }?>

	<div><br /><?php echo $_smarty_tpl->tpl_vars['c_formulario_titulo']->value;?>
<br /></div>

	<form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['c_action']->value;?>
" target="_self">
		<div>
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
?>
			<?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']!=''){?><div class="col-md-4 col-xs-10 col-lg-6 col-sm-12"><div class="row"><?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['clase']=="requerido"){?><b><?php }?><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
<?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['clase']=="requerido"){?></b><?php }?></div></div><div class="col-md-8 col-xs-10 col-lg-6 col-sm-12"><div class="row"><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
</div></div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
<?php }?>
		<?php endfor; endif; ?>
			<div>
				<div class="col-md-12 col-xs-10 col-lg-12 col-sm-12" style="text-align:center; background-position:center; margin-top:15px;">
					<input type="submit" value="Enviar" class="btn btn-default tpl_boton">
				</div>
			</div>
		</div>
	</form>
</div>
<!--Fin Template Formulario de Contacto--><?php }} ?>