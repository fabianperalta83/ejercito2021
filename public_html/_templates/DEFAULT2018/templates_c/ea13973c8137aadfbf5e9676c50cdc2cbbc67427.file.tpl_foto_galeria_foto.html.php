<?php /* Smarty version Smarty-3.1.8, created on 2021-03-09 07:22:10
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_foto_galeria_foto.html" */ ?>
<?php /*%%SmartyHeaderCode:64586283604722228dcd15-16468230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea13973c8137aadfbf5e9676c50cdc2cbbc67427' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_foto_galeria_foto.html',
      1 => 1613603959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64586283604722228dcd15-16468230',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'imagen' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_60472222935a79_78456030',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60472222935a79_78456030')) {function content_60472222935a79_78456030($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title><?php echo @_NOMBRESITIO;?>
 :: Galer&iacute;a de Im&aacute;genes</title>
		
<style type="text/css">
body{margin:0;padding:0;text-align:center;background:#FAFAFA}
#content{margin:auto;height:100%}
</style>

<script type="text/javascript">
var imagen_w = <?php echo $_smarty_tpl->tpl_vars['imagen']->value['ancho'];?>
;var imagen_h = <?php echo $_smarty_tpl->tpl_vars['imagen']->value['alto'];?>
;var sh=screen.availHeight;var sw=screen.availWidth;var xw =0;var xh =0;var plus = 10;
var minw = 400;var minh = 50;
navig = navigator.userAgent.toLowerCase();is_ie	= ((navig.indexOf("msie") != -1) && (navig.indexOf("opera") == -1));
if(is_ie){plus =-10;}
if(imagen_w < sw -20){if(imagen_w > minw){xw = imagen_w+6;}else{xw = minw;}}else{xw = sw;}
if(imagen_h < sh){if(imagen_h > minh){xh = imagen_h+150+plus;}else{xh = minh+58+plus;}}else{xh = sh;}
parent.window.resizeTo(xw, xh);
//parent.window.moveTo(0,0);

</script>
	</head>
	<body>
		<div id="content">
			<img src="../<?php echo $_smarty_tpl->tpl_vars['imagen']->value['cimagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['imagen']->value['nombre'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['imagen']->value['nombre'];?>
">
		</div>
	</body>
</html><?php }} ?>