<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 04:22:31
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_home_notasDias.html" */ ?>
<?php /*%%SmartyHeaderCode:143269305602f3d07b11851-56164981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0cd424caccd199675bf1534f39ac907085cccf2' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_home_notasDias.html',
      1 => 1613604144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143269305602f3d07b11851-56164981',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'banners' => 0,
    'ingles' => 0,
    'arrayNotasDia' => 0,
    'diaNotas' => 0,
    'mesNotas' => 0,
    'ejercito_medios' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602f3d07bd6113_76498483',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602f3d07bd6113_76498483')) {function content_602f3d07bd6113_76498483($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?>	<script language="JavaScript">		function Abrir_ventana(pagina) 		{			var opciones="toolbar=false,location=false,directories=false,status=false,menubar=false,scrollbars=false,resizable=false,width=350px,height=130px,top=false,left=false";			window.open(pagina,"",opciones);		}	</script><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">	<div class="row" style="text-align:center">		<a onclick="playAudio()">			<div id ="memoria_historica1">				<a target="_blank" onclick="Abrir_ventana('https://ejercito.mil.co/tools/audio_emisora_vivo/audio_emisora_vivo.html')">					<img class="" width="100%" height="100" src="<?php echo @_DIRIMAGES_USER;?>
Banners/1.png" alt="Emisora">					<img class="img_radio" id="radio_play" src="<?php echo @_DIRIMAGES;?>
button_play.png" alt="boton reproducir">				</a>			</div>		</a>	</div></div><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['banners']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = (int)4;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">		<div class="row" style="text-align:center">			<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'];?>
" target="_blank">				<div  class="memoria_historica2">					<img class="" width="100%" height="100" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'];?>
"/>				</div>			</a>		</div>	</div><?php endfor; endif; ?><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" id="box-noticias-dia1">	<div class="box_notas_dias">		<div class="notas">			<div class="fondo_title_home">				<a href="index.php?idcategoria=<?php echo @_SECCIONES_RSS_2;?>
"><div id="title_noticias4"><?php if ($_smarty_tpl->tpl_vars['ingles']->value!=1){?>NOTICIAS DEL D&Iacute;A<?php }else{ ?>DAILY NEWS<?php }?></div></a>			</div>			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrayNotasDia']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">					<div class="row dia_notas" style="margin-top:7px">						<div class="diaNota"><?php echo $_smarty_tpl->tpl_vars['diaNotas']->value;?>
</div>						<div class="mesNota"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['mesNotas']->value, 'UTF-8');?>
</div>					</div>				</div>				<div class="col-md-8 col-lg-8 col-sm-8 col-xs-8" style="padding:0;height:100px">  						<a href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['arrayNotasDia']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['idcategoria'];?>
">								<img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['arrayNotasDia']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['imagen'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['arrayNotasDia']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['arrayNotasDia']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'];?>
" height="95px" width="100%" style="margin-top:10px;">													</a>				</div>			<?php endfor; endif; ?>			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrayNotasDia']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = (int)2;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>				<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" style="margin-top:15px">					<div class="row">						<div class="line_black_noticias" style="margin-top:10px"></div>						<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['arrayNotasDia']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['idcategoria'];?>
">							<div class="title_notas_dia"><p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['arrayNotasDia']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'],70,"...",true);?>
</p></div>						</a>					</div>				</div>			<?php endfor; endif; ?>		</div>	</div></div><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" id="box-noticias-dia">	<div class="box_notas_medios">		<div class="notas">			<div class="fondo_title_home">				<a href="index.php?idcategoria=<?php echo @_EJERCITO_MEDIOS_URL;?>
"><div id="title_noticias9"><?php if ($_smarty_tpl->tpl_vars['ingles']->value!=1){?>EJ&Eacute;RCITO EN MEDIOS<?php }else{ ?>ARMY IN THE MEDIA<?php }?></div></a>			</div>							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ejercito_medios']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = (int)2;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>				<div class="ejercito_medios_box" style="margin-top:15px">					<div class="row">						<div class="linea_negra_div"></div>						<img src="recursos_user/imagenes/<?php echo $_smarty_tpl->tpl_vars['ejercito_medios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['imagen'];?>
" width="70px" height="50px" class="imagen_medios" alt="<?php echo $_smarty_tpl->tpl_vars['ejercito_medios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'];?>
">						<div class="text-left titulo_internacional">							<a href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['ejercito_medios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['idcategoria'];?>
#">								<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['ejercito_medios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'],100,"...",true);?>
							</a>						</div>	 					<div class="resumen_internacional_home" style="margin-left:12px; margin-top: 22px;">										<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['ejercito_medios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['entradilla'],110,"...",true);?>
						</div>					</div>				</div>			<?php endfor; endif; ?>		</div>	</div></div><!-- <style>.titulo_internacional{margin-left: 86px;}	.ejercito_medios_box{		padding: 0px 15px;	}	.imagen_medios	{		float: left;		margin-top: 0px;		margin-left: 10px;	}</style> --><?php }} ?>