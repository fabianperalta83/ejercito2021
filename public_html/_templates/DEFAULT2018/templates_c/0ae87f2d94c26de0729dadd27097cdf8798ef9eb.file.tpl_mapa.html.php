<?php /* Smarty version Smarty-3.1.8, created on 2021-02-23 11:25:06
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_mapa.html" */ ?>
<?php /*%%SmartyHeaderCode:74941486034e6126c3223-89309947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ae87f2d94c26de0729dadd27097cdf8798ef9eb' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_mapa.html',
      1 => 1613603960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74941486034e6126c3223-89309947',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subMenuError' => 0,
    'arr_submenu' => 0,
    'show_mapa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_6034e61270abb7_49638939',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6034e61270abb7_49638939')) {function content_6034e61270abb7_49638939($_smarty_tpl) {?><!---Template Mapa-->
<div id="utilidades">
	<?php if ($_smarty_tpl->tpl_vars['subMenuError']->value!=''){?>
		<div class="advertencia">
			<strong><?php echo $_smarty_tpl->tpl_vars['subMenuError']->value;?>
<strong>
		</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['arr_submenu']->value!=''){?>
		<!--Mapa:SubMenu-->
		<ul id="menu_mapa">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arr_submenu']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<li><?php echo $_smarty_tpl->tpl_vars['arr_submenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['vinculo'];?>
</li>
			<?php endfor; endif; ?>
		</ul>
		<!--Fin Mapa:SubMenu-->
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['show_mapa']->value!=''){?>
		<!--Mapa:Contenido-->
		<div id="contenido_mapa">
			<?php echo $_smarty_tpl->tpl_vars['show_mapa']->value;?>

		</div>
		<!--Fin Mapa:Contenido-->
	<?php }?>
</div>
<!--Fin Template Mapa-->

<?php }} ?>