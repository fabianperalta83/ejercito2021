<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:55:11
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuResumenNoticias.html" */ ?>
<?php /*%%SmartyHeaderCode:21365805806030179f5f0ab9-42306403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f80508952dd5f25de415063a53db8903885272f' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuResumenNoticias.html',
      1 => 1613762437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21365805806030179f5f0ab9-42306403',
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
  'unifunc' => 'content_6030179f668b56_48594805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6030179f668b56_48594805')) {function content_6030179f668b56_48594805($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?><!-- Template Menu Primer Nivel Noticias -->
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="row">
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
			<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="height: 420px;">
				<?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen']!=''){?>
					<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
" target="_blank">
						<p class="hidden">lista con cuadrado</p>
						<div style="background: url('tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
&h=200')!important;
                                    background-size: cover!important;
                                    background-repeat: no-repeat!important;
                                    background-position: center center!important;
                                    width: 100%;
                                    height: 200px;
                                    margin-top: 15px;">
							
						</div>
						<!-- <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
&h=200" class="center-block img-resposive img-rounded" alt="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
" style="border-radius: 0;"> -->
					</a>
				<?php }?>
				<div id="titulo_actualidad" style="margin-top: 15px; margin-bottom:10px; height: 60px;">
					<a style="text-decoration:none;" href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
">
						<strong style="color:#000000;font-size:0.813em;" class="wrap8"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
</strong>
					</a>		
				</div>
				<div class="line-interna" style="margin-bottom: 15px;"></div>
				<div class="textarea_slider wrap8" style="height: 50px;">
					<p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['entradilla'],150,"...","true");?>
</p>
				</div>
				
				<div class="vermasTitle" style="text-align: right;">
					<a class="dVermas" href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
">
						<span class="wrap8">VER MAS</span> <strong style="color: #333; font-size:15px"> > </strong>
					</a>
				</div>
				<div class="line-noticias-cuadro"></div>
			</div>
	    <?php endfor; endif; ?>
	</div>
</div>

<!-- Paginación de la categoria-->
<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>
	<?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>

<?php }?>

<!-- Fin Template Menu Primer Nivel -->
<style type="text/css">
	.dVermas{
		color: #000000;
	}

	@media (min-width: 1200px){
		.col-lg-4 {
		    width: 31%;
		}
	}
</style>
<script>
	$(document).ready(function(){
		Actualizar_Tamano();
	});
	
	jQuery(window).resize(function(e) {
		Actualizar_Tamano();
	});
	
	function Actualizar_Tamano(){
		var width = window.innerWidth;
		
		if(width <= 1024){
			$('.textarea_slider').attr('cols', "9");
		}else{
			$('.textarea_slider').attr('cols', "22");
		}  
	}
</script>
<?php }} ?>