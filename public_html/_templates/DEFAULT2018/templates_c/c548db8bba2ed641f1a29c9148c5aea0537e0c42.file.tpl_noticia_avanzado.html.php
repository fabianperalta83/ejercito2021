<?php /* Smarty version Smarty-3.1.8, created on 2021-02-24 21:41:34
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_noticia_avanzado.html" */ ?>
<?php /*%%SmartyHeaderCode:45633528602e7b0f91e202-83871066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c548db8bba2ed641f1a29c9148c5aea0537e0c42' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_noticia_avanzado.html',
      1 => 1614201374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45633528602e7b0f91e202-83871066',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e7b0f9cf3c6_09307633',
  'variables' => 
  array (
    'c_titulo' => 0,
    'c_subtitulo' => 0,
    'c_fecha' => 0,
    'l_imagen' => 0,
    'c_entradilla' => 0,
    'c_descripcion' => 0,
    'width' => 0,
    'c_alt' => 0,
    'c_autor' => 0,
    'idcategoria' => 0,
    'valor_filtro_busqueda' => 0,
    'selectFecha' => 0,
    'filtro_antetitulo' => 0,
    'valor_filtro_antetitulo' => 0,
    'filtro_autor' => 0,
    'valor_filtro_autor' => 0,
    'c_submenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e7b0f9cf3c6_09307633')) {function content_602e7b0f9cf3c6_09307633($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?><!-- ADD THIS REDES SOCIALES-->
lightbox/bootstrap-lightbox.js"></script>
cabezote.js"></script>
galleriffic/galleriffic-2.css" type="text/css">
redes_sociales/social-likes_birman.css" type="text/css">
redes_sociales/font-awesome.css" type="text/css">
redes_sociales/style.css" type="text/css">
redes_sociales/social-likes.min.js"></script>
<br><br></div>
</center><br><br></div>
<br><br></div> -->
" alt="<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
">
">
&amp;w=500" alt="<?php echo $_smarty_tpl->tpl_vars['c_alt']->value;?>
" class="img-responsive">
&amp;w=500" alt="<?php echo $_smarty_tpl->tpl_vars['c_alt']->value;?>
" class="img-responsive">
</div>
</div>
</p>
>
">
" id="filtro_buscar" class="form-control" placeholder="Encontrar" style="width: 100%;">

$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['name'] = 'idAntetitulo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['filtro_antetitulo']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idAntetitulo']['total']);
?>
"<?php if ($_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAntetitulo']['index']][1]==$_smarty_tpl->tpl_vars['valor_filtro_antetitulo']->value){?> selected<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['filtro_antetitulo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAntetitulo']['index']][0],50,"...",false);?>
</option>
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['name'] = 'idAutor';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['filtro_autor']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idAutor']['total']);
?>
"<?php if ($_smarty_tpl->tpl_vars['filtro_autor']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAutor']['index']]==$_smarty_tpl->tpl_vars['valor_filtro_autor']->value){?> selected<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['filtro_autor']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idAutor']['index']],50,"...",false);?>
</option>
</h4><br><br>

index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
" data-title="<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
"><br>				