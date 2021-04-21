<?php /* Smarty version Smarty-3.1.8, created on 2021-03-09 06:45:43
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_foto_galeria_thumbs.html" */ ?>
<?php /*%%SmartyHeaderCode:120141251460471997246556-53423319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a487365ffc041139e54e2ddc124101a34c612847' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_foto_galeria_thumbs.html',
      1 => 1613604143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120141251460471997246556-53423319',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subMenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_6047199729c101_07477496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6047199729c101_07477496')) {function content_6047199729c101_07477496($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title><?php echo @_NOMBRESITIO;?>
 :: Galer&iacute;a de Im&aacute;genes</title>
			<style type="text/css">
				
				    body{margin:0;padding:0;text-align:center;background:#fff;}
				    table{padding:10px 0 0 0}
				    th {padding:5px;background:#fff;}
				    th a {display:block;margin:0 5px;}
				
			</style>
	</head>
	<body>
		<div align="center">
		
			<!--Template Galeria de Imágenes-->
				<table summary="Galer&iacute;a de Im&aacute;genes" cellpadding="0" cellspacing="0">
					<tr> 
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
					<?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen']!=''){?>
						<th style="<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['last']){?>border-right:2px solid #CCD1D7;<?php }?>" onmousemove="this.style.backgroundColor='#F3F5F7';" onmouseout="this.style.backgroundColor='#fff';">
							<a href="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['mlink'];?>
&amp;verfoto=1" target="foto"><img src="microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['limagen'];?>
&amp;w=<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['ancho'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
" style="border:0"></a>
						</th>
					<?php }?>
				<?php endfor; endif; ?>
				</table>
			
			<!--Fin Template Galeria de Imágenes-->
		</div>
	</body>
</html><?php }} ?>