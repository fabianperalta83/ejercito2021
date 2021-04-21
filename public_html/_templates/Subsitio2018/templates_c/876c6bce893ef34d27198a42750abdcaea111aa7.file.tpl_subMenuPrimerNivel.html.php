<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:26:41
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuPrimerNivel.html" */ ?>
<?php /*%%SmartyHeaderCode:1719884672602fded36142d7-77583680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '876c6bce893ef34d27198a42750abdcaea111aa7' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuPrimerNivel.html',
      1 => 1613762437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1719884672602fded36142d7-77583680',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602fded3c48938_30092132',
  'variables' => 
  array (
    'subMenu' => 0,
    'verMas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602fded3c48938_30092132')) {function content_602fded3c48938_30092132($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?><!-- Template Menu Primer Nivel --><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
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
?>		<?php if ((($_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index'])%2==0)&&$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']!=0){?><?php }?>		<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 listaCuadro">			<div id="titulo_actualidad" style="margin-top:15px;margin-bottom:25px;">				<a style="text-decoration:none;" href="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['vinculo'];?>
">					<strong style="color:#000000;font-size:0.813em;" class="wrap8"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
</strong>				</a>						</div>			<?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['entradilla']!=''){?>				<div class="textarea_slider wrap8" style="height: auto;">					<p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['entradilla'],200);?>
</p>				</div>			<?php }?>			<div class="vermasTitle">				<a class="dVermas wrap8" href="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['vinculo'];?>
" style="border-bottom: 1px solid #333;">					<span class="wrap8">VER MAS</span> <strong style="color: #333; font-size:15px"> > </strong>				</a>			</div>		</div>    <?php endfor; endif; ?></div><!-- Paginación de la catwegoria-->	<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>		<?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>
	<?php }?><!-- Fin Template Menu Primer Nivel --><style type="text/css">	.dVermas{		color: #000000;	}	@media (min-width: 1200px){		.col-lg-4 {		    width: 31%;		}	}</style><script>	$(document).ready(function(){		Actualizar_Tamano();	});		jQuery(window).resize(function(e) {		Actualizar_Tamano();	});		function Actualizar_Tamano(){		var width = window.innerWidth;				if(width <= 1024){			$('.textarea_slider').attr('cols', "9");		}else{			$('.textarea_slider').attr('cols', "22");		}  	}</script><?php }} ?>