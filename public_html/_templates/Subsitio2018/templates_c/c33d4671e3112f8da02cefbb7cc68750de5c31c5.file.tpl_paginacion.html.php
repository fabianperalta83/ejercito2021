<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:20:39
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_paginacion.html" */ ?>
<?php /*%%SmartyHeaderCode:101555886602e5ef37b74f3-50133922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c33d4671e3112f8da02cefbb7cc68750de5c31c5' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_paginacion.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101555886602e5ef37b74f3-50133922',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e5ef38017f4_99722223',
  'variables' => 
  array (
    'numPaginas' => 0,
    'paginas' => 0,
    'idcategoria' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e5ef38017f4_99722223')) {function content_602e5ef38017f4_99722223($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['numPaginas']->value>1){?>
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<div id="titulo_actualidad">
			<h3 class="pagerH5"><?php echo @_ROT_PAGER;?>
</h3>
			<map title="<?php echo @_ROT_NAV_PAGER;?>
" name="nav_paginacion" class="container">
				<div class="row">
					<center>
						<p class="paginacion-aux-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
							<?php if ($_smarty_tpl->tpl_vars['numPaginas']->value>6&&$_smarty_tpl->tpl_vars['paginas']->value['actualPage']!=1){?>
								<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
&amp;pag=1" class="boton wrap8">&lsaquo;&lsaquo;<?php echo @_ROT_PRIMERO;?>
</a>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['paginas']->value['previousPage']!=''){?>
								<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
&amp;pag=<?php echo $_smarty_tpl->tpl_vars['paginas']->value['previousPage'];?>
" class="boton wrap8">&lsaquo;<?php echo @_ROT_ANTERIOR;?>
</a>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['paginas']->value['pags']){?>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['name'] = 'idPag';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['paginas']->value['pags']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['paginas']->value['actualPage']!=$_smarty_tpl->tpl_vars['paginas']->value['pags'][$_smarty_tpl->getVariable('smarty')->value['section']['idPag']['index']]){?>
										<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
&amp;pag=<?php echo $_smarty_tpl->tpl_vars['paginas']->value['pags'][$_smarty_tpl->getVariable('smarty')->value['section']['idPag']['index']];?>
" class="wrap8"><?php echo $_smarty_tpl->tpl_vars['paginas']->value['pags'][$_smarty_tpl->getVariable('smarty')->value['section']['idPag']['index']];?>
</a>
									<?php }else{ ?>
										<span class="actual wrap8"><?php echo $_smarty_tpl->tpl_vars['paginas']->value['pags'][$_smarty_tpl->getVariable('smarty')->value['section']['idPag']['index']];?>
</span>
									<?php }?>
								<?php endfor; endif; ?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['paginas']->value['nextPage']!=''){?>
								<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
&amp;pag=<?php echo $_smarty_tpl->tpl_vars['paginas']->value['nextPage'];?>
" class="boton wrap8"><?php echo @_ROT_SIGUIENTE;?>
&rsaquo;</a>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['numPaginas']->value>6&&$_smarty_tpl->tpl_vars['numPaginas']->value!=$_smarty_tpl->tpl_vars['paginas']->value['actualPage']){?>
								<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
&amp;pag=<?php echo $_smarty_tpl->tpl_vars['numPaginas']->value;?>
" class="boton wrap8"><?php echo @_ROT_ULTIMO;?>
&rsaquo;&rsaquo;</a>
							<?php }?>
							
						</p>
					</center>
				</div>
			</map>
		</div>
	</div>
<?php }?><?php }} ?>