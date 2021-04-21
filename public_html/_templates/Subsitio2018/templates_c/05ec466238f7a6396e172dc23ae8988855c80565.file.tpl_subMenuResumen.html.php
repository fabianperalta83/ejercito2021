<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:25:08
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuResumen.html" */ ?>
<?php /*%%SmartyHeaderCode:4911542196030109415df24-99680248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05ec466238f7a6396e172dc23ae8988855c80565' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuResumen.html',
      1 => 1613762437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4911542196030109415df24-99680248',
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
  'unifunc' => 'content_603010942175d6_20239939',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_603010942175d6_20239939')) {function content_603010942175d6_20239939($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?><!--Lista con Resumen:Contenidos-->
<ol id="lista_resumen_contenidos">
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
    <li class="liFirst">
        

    	 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px; padding-bottom: 10px;">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" style="padding-left:0px;padding-right:0px; background-color:white;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['vinculo'];?>
"><p class="hidden">texto de contenido</p>
                    <?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen']==''){?>
                         <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
escudo1.jpg&amp;w=400" alt="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
" class="objectCover" style="width:100%; height:186px;">
                    <?php }else{ ?>
                    <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
&amp;w=400" alt="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
" class="objectCover" style="width:100%; height:186px;">
                    <?php }?>
                </a>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 wrap10" style="padding-left:10px;padding-right:10px;background-color:white; height:186px;overflow: hidden;">
                <div class="col-md-10 col-lg-10 col-sm-10 col-xs-8 wrap8" style="padding-left:0px;padding-right:0px;padding-top:5px; max-width:150px;">
                    <?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['fecha1']!="0000-00-00 00:00:00"&&$_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['fecha1']!=''){?>
                        <p class="s_fecha wrap8"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['fecha1'],"%e de %B %Y");?>
</p>

                    <?php }?>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-4" style="max-width:50px;">
                	<div id="share_social_network">
						<div onmouseover="mostrar_segunda_listado(<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
)" onfocus="mostrar_segunda_listado(<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
)" onmouseout="ocultar_segunda_listado(<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
)" onblur="ocultar_segunda_listado(<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
)">
							<div id="redessociales" class="ocultar_icono_listado<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
 col-md-12 col-lg-12 col-sm-12 col-xs-12"></div>
							<div class="redes_segunda_listado<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
 col-md-12 col-lg-12 col-sm-12 col-xs-12" style="display: none; width: 250px; transform: rotate(90deg); left: -20px; margin-top: -40px; position: absolute;" >
								<div class="caja-redes" style="margin-top: -30px;">
									<div class="social-likes"  data-url="<?php echo @_URL;?>
index.php<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['vinculo'];?>
" data-title="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
">
										<span class="facebook" style="border: #fff"><a href="#" class="icon-button facebook2"  title="Share link on Facebook"><p class="hidden">Boton Facebook</p><span class="icon-facebook" style="transform: rotate(-90deg);"></span><span class="boton_hover"></span></a></span>
										<span class="twitter" style="border: #fff"><a href="#" class="icon-button twitter2" title="Share link on Twitter"><p class="hidden">Boton Twitter</p><span class="icon-twitter" style="transform: rotate(-90deg);"></span><span class="boton_hover"></span></a></span>
										<span class="plusone" style="border: #fff"><a href="#" class="icon-button google-plus2" title="Share link on Google+"><p class="hidden">Boton Google+</p><span class="icon-google-plus" style="transform: rotate(-90deg);"></span><span class="boton_hover"></span></a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding:0px;">
                <?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']!=''){?>
                    <h5 class="s_titulo wrap8"><a href="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['vinculo'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'],70,"...",true);?>
</a></h5>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['entradilla']!=''){?>
						<p class="listaEntradilla wrap8"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['entradilla'],70,"...",true);?>
</p>
					<?php }?>
                </div>
            </div>

        </div>

        <?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['subtitulo']!=''){?>
			<p class="text-left ubicacion_noticias titulo_ubicacion"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['subtitulo'];?>
</p>
        <?php }?>

    <?php endfor; endif; ?>
</ol>
<!--Paginacion -->
<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?> <?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>
 <?php }?><?php }} ?>