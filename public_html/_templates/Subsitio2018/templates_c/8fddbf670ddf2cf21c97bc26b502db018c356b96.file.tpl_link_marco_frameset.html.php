<?php /* Smarty version Smarty-3.1.8, created on 2021-02-22 13:35:06
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_link_marco_frameset.html" */ ?>
<?php /*%%SmartyHeaderCode:10491241146033b30aec4245-12615187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fddbf670ddf2cf21c97bc26b502db018c356b96' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_link_marco_frameset.html',
      1 => 1613604144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10491241146033b30aec4245-12615187',
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
  'unifunc' => 'content_6033b30aeffd51_57189466',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6033b30aeffd51_57189466')) {function content_6033b30aeffd51_57189466($_smarty_tpl) {?><html>
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