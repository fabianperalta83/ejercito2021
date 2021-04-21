<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 20:34:44
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuGaleriaAudio.html" */ ?>
<?php /*%%SmartyHeaderCode:937440534602fe62d1dba11-42372135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e05a87c50fe4e8867782de8828a09534a0055ec9' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuGaleriaAudio.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '937440534602fe62d1dba11-42372135',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602fe62d24b134_46178411',
  'variables' => 
  array (
    'subMenu' => 0,
    'verMas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602fe62d24b134_46178411')) {function content_602fe62d24b134_46178411($_smarty_tpl) {?>
    <script type="text/javascript">
    	function thisMovie(movieName) {
    	  if (navigator.appName.indexOf ("Microsoft") !=-1) {
    	    return window[movieName]
    	  }	else {
    	    return document[movieName]
    	  }
    	}
    	function setVariable(theValue) {
    		if (theValue != '') {
    			thisMovie('mp3Custom').SetVariable('song.text', 'recursos_user' + theValue);
    		} else {
    			alert("No tiene un archivo de audio asociado.");
    		}
    	}
    </script>
    <noscript></noscript>

<!-- Objeto Player-->
<!--<div class="object">
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" width="158" height="77" id="mp3Custom">
        <param name="allowScriptAccess" value="sameDomain">
        <param name="movie" value="tools/player.swf">
        <param name="quality" value="high">
        <param name="bgcolor" value="#ffffff">
        <embed src="tools/player.swf" name="mp3Custom" id="mp3Custom" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
    </object>
</div>-->
<!--Template Galeria de Im�genes-->

<ol id="lista_resumen_contenidos">
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
        <li>
            <div class="encabezados">
                <h5 class="s_titulo wrap8"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
</h5>
            </div>
            <div class="contenido">
                <?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen']!=''){?>
                    <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
/<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
&amp;w=160" alt="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
">
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['entradilla']!=''){?>
                    <p class="listaEntradilla wrap8"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['entradilla'];?>
</p>
                <?php }?>
                <br>
                <audio controls="" style="width: 100%;">
                    <source src="recursos_user/<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['descripcion'];?>
" type="audio/mpeg">
                </audio> <!-- NUEVO PLUGIN PARA REPRODUCTOR DE AUDIO 29/05/2019 -->
<!--                <a class="linkEscuchar dVermas" onkeypress="window.status = 'Ejecutar Archivo';"  onClick="window.status = 'Ejecutar Archivo';" href="javascript:setVariable('<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['descripcion'];?>
')"><?php echo @_ROT_ESCUCHAR;?>
</a>
                <a class="linkEscuchar dVermas" onkeypress="window.status = 'Descargar Archivo';"  onClick="window.status = 'Descargar Archivo';" href="recursos_user/<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['descripcion'];?>
">Descargar Audio</a>--> <!-- CONTENEDOR ORIGINAL -->
            </div>
        </li>
    <?php endfor; endif; ?>
</ol>
<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>
	<?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>

<?php }?>
<!--Fin Template Galeria de Im�genes-->


<?php }} ?>