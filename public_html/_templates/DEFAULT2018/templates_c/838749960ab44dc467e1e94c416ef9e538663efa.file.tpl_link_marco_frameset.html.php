<?php /* Smarty version Smarty-3.1.8, created on 2021-02-23 03:47:51
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_link_marco_frameset.html" */ ?>
<?php /*%%SmartyHeaderCode:199873859460347ae7adc228-65406668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '838749960ab44dc467e1e94c416ef9e538663efa' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_link_marco_frameset.html',
      1 => 1613603960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199873859460347ae7adc228-65406668',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idcategoria' => 0,
    'linkExterno' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_60347ae7b2ef22_63892274',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60347ae7b2ef22_63892274')) {function content_60347ae7b2ef22_63892274($_smarty_tpl) {?><html>
<link href="../<?php echo @_DIRCSS;?>
estilo_general.css" rel="stylesheet" type="text/css">
<title><?php echo @_NOMBRESITIO;?>
</title>
<FRAMESET ROWS="280,*" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0">
    <FRAME SRC="marco.php?c&amp;idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
" NAME="marco" FRAMEBORDER="0" BORDER="1" FRAMESPACING="0" MARGINWIDTH="3" MARGINHEIGHT="3" scrolling="NO">
    <FRAME SRC="<?php echo $_smarty_tpl->tpl_vars['linkExterno']->value;?>
" NAME="pagina" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=0 MARGINHEIGHT=0>
</FRAMESET>
</html>
<?php }} ?>