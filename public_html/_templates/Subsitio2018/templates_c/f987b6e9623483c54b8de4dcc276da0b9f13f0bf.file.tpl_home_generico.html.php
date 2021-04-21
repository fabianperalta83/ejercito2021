<?php /* Smarty version Smarty-3.1.8, created on 2021-02-25 08:30:33
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_home_generico.html" */ ?>
<?php /*%%SmartyHeaderCode:93919972860376029b7a2d6-67813659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f987b6e9623483c54b8de4dcc276da0b9f13f0bf' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_home_generico.html',
      1 => 1613604144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93919972860376029b7a2d6-67813659',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'resumen' => 0,
    'secciones' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_60376029cfb755_96415055',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60376029cfb755_96415055')) {function content_60376029cfb755_96415055($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?><div class="home">
<h2><a name="cont"><?php echo @_ROT_CONTENT;?>
</a></h2>
<?php if ($_smarty_tpl->tpl_vars['resumen']->value!=''){?><p class="homeEntradilla"><?php echo $_smarty_tpl->tpl_vars['resumen']->value;?>
</p><?php }?>
<ol>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['name'] = 'idseccion';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['secciones']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idseccion']['total']);
?>
    <li>
    <div class="homeH3-aux-1<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['first']){?> homeH3-aux-1First<?php }?>">
    <div class="homeH3-aux-2">
    <h3><a href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['idcategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['nombre'];?>
</a>
    </h3>
    </div>
    </div>
    <ol class="homeSubLista">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['name'] = 'idNoticias';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['max'] = (int)$_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['conresumen'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['total']);
?>
        <li <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['last']){?>class="liResumenLast"<?php }?>>
            <h4>
                <a href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['idcategoria'];?>
" <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['imagen']){?>class="homeH4"<?php }?>>
                    <?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['nombre'];?>

                </a>
            </h4>
            <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['imagen']){?>
                <div class="homeImg-aux-1">
                <div class="homeImg-aux-2">
                <div class="homeImg-aux-3">
                <a href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['nombre'];?>
">
                    <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['imagen'];?>
&amp;w=161" alt="">
                </a>
                </div>
                </div>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['autor']||($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['fecha']&&$_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['fecha']!='0000-00-00')){?>
                <div class="autor-fecha-aux">
                <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['autor']){?>
                    <p class="homeAutor"><?php echo @_ROT_AUTOR;?>
 <?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['autor'];?>
</p>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['fecha']&&$_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['fecha']!='0000-00-00'){?>
                    <p class="homeFecha"><?php echo @_ROT_PUBLICADO;?>
 <?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['fecha'];?>
</p>
                <?php }?>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['resumen']){?>
                <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['resumen'],400);?>
</p>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['contenido']){?>
                <a class="homeVermas" href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['nombre'];?>
">
                    <span><?php echo @_ROT_VERMAS;?>
</span><span class="vermasComplemento">: <?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['nombre'];?>
</span>
                </a>
            <?php }?>
            <?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['last']){?>
                <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['imagen']){?>
                <div class="lineaDivisoria">
                <?php }?>
                    <div class="lineaDivisoria-aux">&nbsp;</div>
                <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['imagen']){?>
                </div>
                <?php }?>
            <?php }?>
        <?php endfor; endif; ?>
        <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['sinresumen']>0){?>
        <div class="lineaDivisoria-aux-2">&nbsp;</div>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['name'] = 'idNoticias';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start'] = (int)$_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['conresumen'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['max'] = (int)$_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['cantidad'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idNoticias']['total']);
?>
        <li class="liSinResumen<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['first']){?> liSinResumenFirst<?php }?>">
            <h4>
                <a href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['idcategoria'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['nombre'];?>

                </a>
            </h4>
            <?php if ($_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['fecha']&&$_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['fecha']!='0000-00-00'){?>
                <p>&#91;<?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['idNoticias']['index']]['fecha'];?>
&#93;</p>
            <?php }?>
        <?php endfor; endif; ?>
        <?php }?>
        <span class="findelista">(<?php echo @_ROT_END_SECTION;?>
:<?php echo $_smarty_tpl->tpl_vars['secciones']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idseccion']['index']]['nombre'];?>
)</span>
    </ol>
    <?php endfor; endif; ?>
</ol>
</div><?php }} ?>