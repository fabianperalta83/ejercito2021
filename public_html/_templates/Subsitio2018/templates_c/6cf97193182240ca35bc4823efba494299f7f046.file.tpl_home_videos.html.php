<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:20:41
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_home_videos.html" */ ?>
<?php /*%%SmartyHeaderCode:415084533602e7f874e4184-23300500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cf97193182240ca35bc4823efba494299f7f046' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_home_videos.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '415084533602e7f874e4184-23300500',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e7f875673f8_56187948',
  'variables' => 
  array (
    'videos_home_ppal' => 0,
    'galeria_imagenppal' => 0,
    'galeria_imagen' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e7f875673f8_56187948')) {function content_602e7f875673f8_56187948($_smarty_tpl) {?><div id="dv_cont_multimedia" class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
	<div id="videos">
		<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12" id="video_multi" >
			<div id="pantalla_videos" class="pantalla_dv">
			 	<div class="slider-videos-for">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['name'] = 'idMultiVideo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['videos_home_ppal']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['max'] = (int)4;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idMultiVideo']['total']);
?>
						<div class="item_multi_video" id="itemMultiVideo_<?php echo $_smarty_tpl->tpl_vars['videos_home_ppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idMultiVideo']['index']]['idcategoria'];?>
">
							<?php if ($_smarty_tpl->tpl_vars['videos_home_ppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idMultiVideo']['index']]['tipo_video']=='flv'||$_smarty_tpl->tpl_vars['videos_home_ppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idMultiVideo']['index']]['tipo_video']=='mp4'){?> 
								<video loop="true" muted="muted">
		                            <source src="<?php echo @_URL;?>
/<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['videos_home_ppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idMultiVideo']['index']]['descripcion'];?>
" type="video/mp4">
		                                Your browser does not support the video tag.
		                        </video>
							<?php }else{ ?>
								<?php echo $_smarty_tpl->tpl_vars['videos_home_ppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idMultiVideo']['index']]['descripcion'];?>

							<?php }?>
						</div>
					<?php endfor; endif; ?>
				</div>
			</div>
		</div>
		
	</div>
	<div id="galeria" style="display: none;">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="flexbox hidden-sm hidden-xs">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['name'] = 'idImgs';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['galeria_imagenppal']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idImgs']['total']);
?>
						<div class="itema">
							<a href="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']]['imagen'];?>
" class="fancybox" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']]['nombre'];?>
">
								<img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']]['imagen'];?>
&w=1000" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagenppal']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']]['nombre'];?>
" style="width: 100%;">
							</a>
						</div>
					<?php endfor; endif; ?>
				<!-- 	<div class="col-md-3 col-lg-3 <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']==1||$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']==3||$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']==4||$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']==6){?> img-large <?php }else{ ?> img-short <?php }?>">
					    	<div class="row">
						    	<a href="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']]['imagen'];?>
" class="fancybox" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']]['nombre'];?>
">
							      	<img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']]['imagen'];?>
&w=250" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']]['nombre'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']==4||$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']==6){?> style="margin-top: -40px;" <?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']==3||$_smarty_tpl->getVariable('smarty')->value['section']['idImgs']['index']==7){?> style="width: 100%;" <?php }?>>
						      	</a>
						    </div>
					    </div> -->
				</div>
				<div id="slider-galeria" class="col-sm-12 col-xs-12 hidden-md hidden-lg carousel slide carousel-fade" data-ride="carousel">
                	<div class="carousel-inner" role="listbox">
                    	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['imag'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['imag']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['name'] = 'imag';
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['galeria_imagen']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['imag']['total']);
?>
                           <div class="col-sm-12 col-xs-12 alto_contraste item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['imag']['index']==0){?>active<?php }?>">
		                        <a href="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[$_smarty_tpl->getVariable('smarty')->value['section']['imag']['index']]['imagen'];?>
" class="fancybox" rel="gallery1" title="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[$_smarty_tpl->getVariable('smarty')->value['section']['imag']['index']]['nombre'];?>
">
							      	<img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[$_smarty_tpl->getVariable('smarty')->value['section']['imag']['index']]['imagen'];?>
&w=300" alt="<?php echo $_smarty_tpl->tpl_vars['galeria_imagen']->value[$_smarty_tpl->getVariable('smarty')->value['section']['imag']['index']]['nombre'];?>
" style="margin: 0 auto;">
						      	</a>
                            </div>
                        <?php endfor; endif; ?>
                   	</div>
                </div>
			</div>
		</div>
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<div class="btn_vm_multi">
				<a href="index.php?idcategoria=<?php echo @_GALERIA_FOTOGRAFICA;?>
">
					<?php if (@_EN_INGLES!=1){?>
						Ver todas las imagenes
					<?php }else{ ?>
						Listen to all audios
					<?php }?>
				</a>
			</div>
		</div>
	</div>
	<div class="clear_b"></div>
</div>

<?php }} ?>