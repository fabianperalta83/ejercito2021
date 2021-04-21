<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:20:37
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_navegacion_institucional.html" */ ?>
<?php /*%%SmartyHeaderCode:1324285687602e5ef30d2548-19235832%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17351c4c706e156ae1258a9c52ffec8af51f8b57' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_navegacion_institucional.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1324285687602e5ef30d2548-19235832',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e5ef3107272_12202269',
  'variables' => 
  array (
    'menuInstitucional' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e5ef3107272_12202269')) {function content_602e5ef3107272_12202269($_smarty_tpl) {?><!-- <nav class="navbar navbar-institucional"> -->
    <!-- <div class="navbar navbar-default navbar-institucional" role="navigation"> -->    <!-- DIV ORIGINAL -->
        <div class="navbar navbar-default navbar-institucional" role="navigation"> <!-- AJUSTE MARGEN COMPLETA DEL NAVBAR INSTITUCIONAL 14/05/2019 -->
        <div id="bs-example-navbar-collapse-2" class="hidden-sm hidden-xs collapse navbar-collapse navinstitucional">
            <ul class="nav navbar-nav navbar-institucional-ul nav-ul-institucional" id="menu2">
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuInstitucional']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <?php if ($_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']=='Utilidades'){?>    
                        <?php if ('false_'){?>
                        <?php }?>
                    <?php }else{ ?>
                        <li class="dropdown text-left">
                            <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
"  class="dropdown-toggle top_link" data-hover="dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>

                            </a>
                    <?php }?>
                        <ul class="sub dropdown-menu dropdown-institucional">
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['name'] = 'myhijos';
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total']);
?>
                                <li <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['last']){?> style="border: 0;" <?php }?>>
                                    <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
" onmouseover="Javascript: menuNivelTres(<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
)" onfocus="Javascript: menuNivelTres(<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
)" onmouseout="Javascript: noNivelTres(<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
)" onblur="Javascript: noNivelTres(<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
)">
                                        <?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['nombre'];?>

                                    </a>
                                </li>
                            <?php endfor; endif; ?>
                        </ul>
                    </li>
                <?php endfor; endif; ?>
            </ul>
        </div>
    </div>
<!-- </nav> -->
<?php }} ?>