<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:20:37
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_contenido.html" */ ?>
<?php /*%%SmartyHeaderCode:546620017602e5ef390a6e2-96660273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd721b26008f9474599a93b282a8ebc327560ba1' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_contenido.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '546620017602e5ef390a6e2-96660273',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e5ef393a0d8_31566669',
  'variables' => 
  array (
    'rutetoroot' => 0,
    'contenido' => 0,
    'esHome' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e5ef393a0d8_31566669')) {function content_602e5ef393a0d8_31566669($_smarty_tpl) {?><div id="datos">
	<?php if ($_smarty_tpl->tpl_vars['rutetoroot']->value!=''){?>
		<map title="<?php echo @_ROT_NAV_BREAD_CRUMBS;?>
" name="nav_migas">
	        <div id="migas">
				<p>
					<span class="wrap8"><?php echo @_ROT_BREAD_CRUMBS_HERE;?>
</span>
					<a href="#fin6" class="saltarnavegacion wrap8"><?php echo @_ROT_SKIP_BREAD_CRUMBS;?>
</a>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mg'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['name'] = 'mg';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['rutetoroot']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['mg']['total']);
?>
						<?php if ($_smarty_tpl->tpl_vars['rutetoroot']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mg']['index']]['idcategoria']!=@_SINSTITUCIONAL&&$_smarty_tpl->tpl_vars['rutetoroot']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mg']['index']]['idcategoria']!=@_SUTILIDADES){?>
							<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['mg']['last']){?>
								<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['rutetoroot']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mg']['index']]['idcategoria'];?>
" class="wrap8"><?php echo $_smarty_tpl->tpl_vars['rutetoroot']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mg']['index']]['nombre'];?>
</a> /
							<?php }else{ ?>
								<strong style="color:blue;"><?php echo $_smarty_tpl->tpl_vars['rutetoroot']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mg']['index']]['nombre'];?>
</strong>
							<?php }?>
						<?php }?>
					<?php endfor; endif; ?>		
				</p>
	        </div>
			<p><a name="fin6" class="findelista wrap8"><?php echo @_ROT_END_BREAD_CRUMBS;?>
</a></p>
		</map>
		<hr>     
	<?php }?>
</div>
<!--Cuerpo Contenido-->
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div id="cuerpo_contenido" class="row">
		<?php echo $_smarty_tpl->tpl_vars['contenido']->value;?>
	
		<?php if ($_smarty_tpl->tpl_vars['esHome']->value){?>
			</div>
			</div>
		<?php }?>
	<hr>
<!-- Redes Sociales nuevas -->
<!--Fin Cuerpo Contenido--><?php }} ?>