<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:20:37
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_default.html" */ ?>
<?php /*%%SmartyHeaderCode:1056361889602e5ef3889f21-42443859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '565f0e1ff9eb1edc3e44191c8d860238f25f1bfc' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_default.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1056361889602e5ef3889f21-42443859',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e5ef38fda26_95490771',
  'variables' => 
  array (
    'l_imagen' => 0,
    'alinea' => 0,
    'c_entradilla' => 0,
    'c_descripcion' => 0,
    'fwidth' => 0,
    'anchomedio' => 0,
    'width' => 0,
    'subMenu' => 0,
    'c_titulo' => 0,
    'pie_imagen' => 0,
    'imagen' => 0,
    'c_iddisplay_sub' => 0,
    'c_submenu' => 0,
    'idcategoria' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e5ef38fda26_95490771')) {function content_602e5ef38fda26_95490771($_smarty_tpl) {?><script src="<?php echo @_DIRJS;?>
cabezote.js"></script>
galleriffic/galleriffic-2.css" type="text/css">
redes_sociales/social-likes_birman.css" type="text/css">
redes_sociales/font-awesome.css" type="text/css">
redes_sociales/style.css" type="text/css">
redes_sociales/social-likes.min.js"></script>
. Lightbox uses the Prototype Framework</p>
cabezote/gif-confeti-9.gif">
;<?php if ($_smarty_tpl->tpl_vars['c_entradilla']->value||$_smarty_tpl->tpl_vars['c_descripcion']->value){?>margin:<?php if ($_smarty_tpl->tpl_vars['fwidth']->value<=$_smarty_tpl->tpl_vars['anchomedio']->value){?>0 15px 5px 0;float:<?php echo $_smarty_tpl->tpl_vars['alinea']->value;?>
;<?php }else{ ?>0 0 20px 0;<?php }?>;<?php }else{ ?>text-align:center;margin:0em;<?php }?><?php if ($_smarty_tpl->tpl_vars['width']->value>=@_IMGANCHOMAXIMO+100){?> margin:0 auto 20px auto;text-align:right;<?php }?>">
" rel="lightbox[roadtrip]" class="linkInfo" style="text-decoration:none" title="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
">
&amp;w=800" alt="<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
" />
</span>
<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" width="" title="<?php echo @_ROT_AMPLIAR_IMAGEN;?>
"><?php echo @_ROT_IMAGEN;?>
 [+]</a>
</div>
</div>
</div>
</p>

index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
" data-title="<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
"><br>				