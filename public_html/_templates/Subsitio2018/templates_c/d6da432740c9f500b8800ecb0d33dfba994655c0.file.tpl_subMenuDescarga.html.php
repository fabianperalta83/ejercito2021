<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:22:17
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuDescarga.html" */ ?>
<?php /*%%SmartyHeaderCode:1979894581602f2810e65477-77813067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6da432740c9f500b8800ecb0d33dfba994655c0' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuDescarga.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1979894581602f2810e65477-77813067',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602f2810eadfe6_81043650',
  'variables' => 
  array (
    'subMenu' => 0,
    'verMas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602f2810eadfe6_81043650')) {function content_602f2810eadfe6_81043650($_smarty_tpl) {?><style>		.imagen_default	{		padding-left: 51px;		width: 53px;		height: 70px;		line-height: 32px;		background-image: url("_templates/DEFAULT2016/recursos/images/sprite_botones_ejercito.png");		background-repeat: no-repeat;		background-position: -460px -111px;	}</style><!--Lista Sencilla--><div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">	<center>		<img alt="" class="imagen_default">	</center></div><div class="col-md-10 col-lg-10 col-sm-12 col-xs-12">	<ul>		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
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
?>			<li>				<?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']!=''){?>					<div id="titulo_actualidad">						<div class="name_red_box">							<a href="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['vinculo'];?>
&download=Y" class="wrap8"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
</a>						</div>					</div>				<?php }?>			</li>		<?php endfor; endif; ?>	</ul></div><!--Fin Lista Sencilla--><!-- Paginacion --><?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>    <?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>
<?php }?><!--Fin Lista Sencilla--><?php }} ?>