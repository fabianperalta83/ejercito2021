<?php /* Smarty version Smarty-3.1.8, created on 2021-02-24 21:16:17
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_lateral.html" */ ?>
<?php /*%%SmartyHeaderCode:1881287330602e1fe9206344-24029638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd39a735e705be427b702ddb811f055cc103aec2' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_lateral.html',
      1 => 1614201374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1881287330602e1fe9206344-24029638',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e1fe921a326_61122277',
  'variables' => 
  array (
    'menuSegNivel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e1fe921a326_61122277')) {function content_602e1fe921a326_61122277($_smarty_tpl) {?><div class="col-md-12 col-lg-12">
    <div class="row div_left">
        <div class="menuSegNivel"  style=" background-color: #862024;">
            <h2><?php echo @_ROT_MENU_USER;?>
</h2>
            <div class="red_line"></div>
            <ul class="lista_sencilla_menu">
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['link'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['link']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['name'] = 'link';
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuSegNivel']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['total']);
?>       
                    <li class="item<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['link']['index'];?>
" style="border-bottom: 0;" >
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuSegNivel']->value[$_smarty_tpl->getVariable('smarty')->value['section']['link']['index']]['idcategoria'];?>
" class="" style="color:white!important;">
                            <?php echo $_smarty_tpl->tpl_vars['menuSegNivel']->value[$_smarty_tpl->getVariable('smarty')->value['section']['link']['index']]['nombre'];?>

                        </a>
                    </li>
                <?php endfor; endif; ?>
            </ul>       
        </div>
    </div>
</div><?php }} ?>