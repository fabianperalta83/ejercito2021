<?php /* Smarty version Smarty-3.1.8, created on 2021-02-23 19:56:17
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_contratacion.html" */ ?>
<?php /*%%SmartyHeaderCode:88508650460355de1d22e47-97747407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a78f89f8a1c9186cd7ef1f080a5c75c01c4bc64' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_contratacion.html',
      1 => 1613603958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88508650460355de1d22e47-97747407',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'anios' => 0,
    'ano' => 0,
    'estados' => 0,
    'estado_id' => 0,
    'orden' => 0,
    'tipoorden' => 0,
    'estado' => 0,
    'anio' => 0,
    'listado' => 0,
    'paginas' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_60355de1e08c71_98479607',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60355de1e08c71_98479607')) {function content_60355de1e08c71_98479607($_smarty_tpl) {?><link href="<?php echo @_DIRCSS;?>
estilo_contratacion.css" rel="stylesheet" type="text/css"><form action="" method="POST" name="listado"><input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>
"><!--FILTRO--><table style="width:99%" summary="" class="filtroContratacion"><!----><tr><td><label for="anio">A&ntilde;o:</label><br><select name="anio" id="anio" title="anio"><option value="">-- Todos --</option><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ident'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['name'] = 'ident';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['anios']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['total']);
?><option value='<?php echo $_smarty_tpl->tpl_vars['anios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ident']['index']]['ano_id'];?>
' <?php if ($_smarty_tpl->tpl_vars['ano']->value==$_smarty_tpl->tpl_vars['anios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ident']['index']]['ano_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['anios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ident']['index']]['ano_nombre'];?>
</option><?php endfor; endif; ?></select></td><td><label for="estado">Estado:</label><br><select name="estado" id="estado" title="estado"><option value="">-- Ver Todos --</option><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ident'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['name'] = 'ident';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['estados']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ident']['total']);
?><option class="estado<?php echo $_smarty_tpl->tpl_vars['estados']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ident']['index']]['id'];?>
" value='<?php echo $_smarty_tpl->tpl_vars['estados']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ident']['index']]['id'];?>
' <?php if ($_smarty_tpl->tpl_vars['estado_id']->value==$_smarty_tpl->tpl_vars['estados']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ident']['index']]['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['estados']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ident']['index']]['nombre'];?>
</option><?php endfor; endif; ?></select></td><td><label for="orden">Ordenar por:</label><br><select name="orden" id="orden" title="orden"><option value="fecha3">Fecha de creación</option><option value="fecha1">Fecha de apertura</option><option value="fecha2">Fecha de cierre</option><option value="nombre">C&oacute;digo del Proceso</option><option value="subtitulo">Cuant&iacute;a</option><option value="antetitulo">Estado</option></select><br>								<fieldset><legend></legend><input type="radio" name="tipoorden" id="tipoordenASC" value="ASC"/><label for="tipoordenASC">ASC &nbsp;</label><input type="radio" name="tipoorden" id="tipoordenDESC" value="DESC"><label for="tipoordenDESC">DESC</label></fieldset><script type="text/javascript">document.listado.orden.value = '<?php echo $_smarty_tpl->tpl_vars['orden']->value;?>
';<?php if ($_smarty_tpl->tpl_vars['tipoorden']->value=="ASC"){?>document.getElementById("tipoorden<?php echo $_smarty_tpl->tpl_vars['tipoorden']->value;?>
").checked = true;<?php }else{ ?>document.getElementById("tipoorden<?php echo $_smarty_tpl->tpl_vars['tipoorden']->value;?>
").checked = true;<?php }?>document.listado.estado.value = '<?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
';document.listado.anio.value = '<?php echo $_smarty_tpl->tpl_vars['anio']->value;?>
';</script></td><td style="background-position:center;text-aling:center"><input type="submit" name="Submit" value="Filtrar"/></td></tr></table><table class="lstcontrato" style="width:99%" summary=""><!--cellpadding="0" cellspacing="0"  summary=""--><tr><th style="border-left:1px solid #4D6CBA">C&oacute;digo del Proceso</th><th>Fecha Apertura / Cierre</th><th>Cuantia</th><th>Objeto</th><!--<th>Estado</th>--></tr><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idcont'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['name'] = 'idcont';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['listado']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idcont']['total']);
?><tr><td style="border-left:1px solid #4D6CBA"><a href="http://<?php echo $_smarty_tpl->tpl_vars['listado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idcont']['index']]['autor'];?>
" target="_blanck" title="Ir al Contrato"><?php echo $_smarty_tpl->tpl_vars['listado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idcont']['index']]['nombre'];?>
</a></td><td style="background-position:center;text-aling:center"><?php echo $_smarty_tpl->tpl_vars['listado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idcont']['index']]['fecha1'];?>
 - <?php echo $_smarty_tpl->tpl_vars['listado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idcont']['index']]['fecha2'];?>
</td><td style="background-position:center;text-aling:center;white-space:nowrap;">$ <?php echo $_smarty_tpl->tpl_vars['listado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idcont']['index']]['subtitulo'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['listado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idcont']['index']]['entradilla'];?>
</td><!-- ESTADO CONTRATACIÓN --><!--<td style="background-position:center;text-aling:center" class="estado<?php echo $_smarty_tpl->tpl_vars['listado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idcont']['index']]['antetitulo'];?>
"><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ident2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['name'] = 'ident2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['estados']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ident2']['total']);
?><?php if ($_smarty_tpl->tpl_vars['listado']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idcont']['index']]['antetitulo']==$_smarty_tpl->tpl_vars['estados']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ident2']['index']]['id']){?><?php echo $_smarty_tpl->tpl_vars['estados']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ident2']['index']]['nombre'];?>
<?php }?><?php endfor; endif; ?></td>--></tr><?php endfor; endif; ?></table><!-- Paginacion --><div class="paginacion"><input type="hidden" name="pag" value=""/><?php if ($_smarty_tpl->tpl_vars['paginas']->value['previousPage']!=''){?><a href="#" onclick="document.listado.pag.value='<?php echo $_smarty_tpl->tpl_vars['paginas']->value['previousPage'];?>
';document.listado.submit()">&laquo; Anterior</a>&nbsp;<?php }?><?php if ($_smarty_tpl->tpl_vars['paginas']->value['pags']){?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['name'] = 'idPag';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['paginas']->value['pags']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idPag']['total']);
?><?php if ($_smarty_tpl->tpl_vars['paginas']->value['actualPage']!=$_smarty_tpl->tpl_vars['paginas']->value['pags'][$_smarty_tpl->getVariable('smarty')->value['section']['idPag']['index']]){?>&nbsp;<a href="#" onclick="document.listado.pag.value='<?php echo $_smarty_tpl->tpl_vars['paginas']->value['pags'][$_smarty_tpl->getVariable('smarty')->value['section']['idPag']['index']];?>
';document.listado.submit()"><?php echo $_smarty_tpl->tpl_vars['paginas']->value['pags'][$_smarty_tpl->getVariable('smarty')->value['section']['idPag']['index']];?>
</a>&nbsp;<?php }else{ ?>&nbsp;<span class="actual"><?php echo $_smarty_tpl->tpl_vars['paginas']->value['pags'][$_smarty_tpl->getVariable('smarty')->value['section']['idPag']['index']];?>
</span>&nbsp;<?php }?><?php endfor; endif; ?><?php }?><?php if ($_smarty_tpl->tpl_vars['paginas']->value['nextPage']!=''){?>&nbsp;<a href="#" onclick="document.listado.pag.value='<?php echo $_smarty_tpl->tpl_vars['paginas']->value['nextPage'];?>
';document.listado.submit()">Siguiente &raquo;</a><?php }?></div></form>

<?php }} ?>