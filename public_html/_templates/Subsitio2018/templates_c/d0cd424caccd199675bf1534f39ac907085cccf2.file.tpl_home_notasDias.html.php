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
?>
Banners/1.png" alt="Emisora">
button_play.png" alt="boton reproducir">
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
?>
" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'];?>
" target="_blank">
<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'];?>
"/>
"><div id="title_noticias4"><?php if ($_smarty_tpl->tpl_vars['ingles']->value!=1){?>NOTICIAS DEL D&Iacute;A<?php }else{ ?>DAILY NEWS<?php }?></div></a>
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
?>
</div>
</div>
">	
<?php echo $_smarty_tpl->tpl_vars['arrayNotasDia']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['imagen'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['arrayNotasDia']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['arrayNotasDia']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'];?>
" height="95px" width="100%" style="margin-top:10px;">
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
?>
">
</p></div>
"><div id="title_noticias9"><?php if ($_smarty_tpl->tpl_vars['ingles']->value!=1){?>EJ&Eacute;RCITO EN MEDIOS<?php }else{ ?>ARMY IN THE MEDIA<?php }?></div></a>
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
?>
" width="70px" height="50px" class="imagen_medios" alt="<?php echo $_smarty_tpl->tpl_vars['ejercito_medios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nombre'];?>
">
#">

