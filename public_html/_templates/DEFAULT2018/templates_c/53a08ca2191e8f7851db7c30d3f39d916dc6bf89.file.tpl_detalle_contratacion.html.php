<?php /* Smarty version Smarty-3.1.8, created on 2021-02-23 14:01:49
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_detalle_contratacion.html" */ ?>
<?php /*%%SmartyHeaderCode:152858082060350acd514846-50506852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53a08ca2191e8f7851db7c30d3f39d916dc6bf89' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_detalle_contratacion.html',
      1 => 1613603958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152858082060350acd514846-50506852',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'info' => 0,
    'infoComp' => 0,
    'infoEtapas' => 0,
    'archivo' => 0,
    'imgPlan' => 0,
    'c_subir' => 0,
    'c_imprimir' => 0,
    'c_cuentele' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_60350acd5c85b0_40407420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60350acd5c85b0_40407420')) {function content_60350acd5c85b0_40407420($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/function.cycle.php';
?><link href="<?php echo @_DIRCSS;?>
estilo_contratacion.css" rel="stylesheet" type="text/css">
<br />
<br />
<div class="contratacion">
<!--TITULO DE CONTRATACION-->
<h2><?php echo $_smarty_tpl->tpl_vars['info']->value['titulo'];?>
</h2>

<h3>Objeto:</h3>
<p><?php echo $_smarty_tpl->tpl_vars['info']->value['objeto'];?>
</p>

<!--INFORMACION DEL CONTRATO-->
<table summary="">
	<tr class="troscuro">
		<td>Fecha de Creación</td>
		<td><?php echo $_smarty_tpl->tpl_vars['info']->value['fecha_creacion'];?>
</td>
	</tr>
	<tr>
		<td>Fecha de Apertura</td>
		<td><?php echo $_smarty_tpl->tpl_vars['info']->value['fecha_apertura'];?>
</td>
	</tr>
	<tr class="troscuro">
		<td>Fecha y Hora de Cierre</td>
		<td><?php echo $_smarty_tpl->tpl_vars['info']->value['fecha_cierre'];?>
</td>
	</tr>
	<tr>
		<td>Cuantía</td>
		<td> <?php echo $_smarty_tpl->tpl_vars['info']->value['cuantia'];?>
</td>
	</tr>
	<!-- ESTADO -->
	<!--
	<tr class="troscuro">
		<td>Estado</td>
		<td class="estado<?php echo $_smarty_tpl->tpl_vars['info']->value['estadoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['info']->value['estado'];?>
</td>
	</tr>
	-->
</table>

<!--INFORMACION COMPLEMENTARIA-->
<!--<h3>Información Complementaria</h3>-->
<h3>Archivos adjuntos</h3>


<table summary="" style="width:99%">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['name'] = 'idinfoComp';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['infoComp']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoComp']['total']);
?>
	<tr <?php echo smarty_function_cycle(array('values'=>",class=\"troscuro\""),$_smarty_tpl);?>
>
		<td><?php echo $_smarty_tpl->tpl_vars['infoComp']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idinfoComp']['index']]['nombre'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['infoComp']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idinfoComp']['index']]['valor'];?>
</td>
	</tr>
	<?php endfor; endif; ?>
</table>


<!--INFORMACION DE LAS ETAPAS-->
<!-- FECHAS ESTADOS  -->
<!--
<h3>Etapas</h3>
<table summary="" cellpadding="0" cellspacing="5" style="width:99%">
	<tr>
		<td style="width:20px;padding:0;background:#FFFF00">&nbsp;</td>
		<td>Fecha Proyectada</td>
		<td style="width:20px;padding:0;background:#ff7b00">&nbsp;</td>
		<td>Fecha Pasada</td>
		<td style="width:20px;padding:0;background:#00CC00">&nbsp;</td>
		<td>Fecha en Curso</td>
	</tr>
</table>
-->
<br/>
<table summary="" class="tablaEtapas" style="width:99%">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['name'] = 'idinfoEtapa';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['infoEtapas']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idinfoEtapa']['total']);
?>
	<tr <?php echo smarty_function_cycle(array('name'=>'idcycle','values'=>",class=\"troscuro\""),$_smarty_tpl);?>
>
	<!-- NOMBTRE ETAPAS -->
	<!--
		<td><?php echo $_smarty_tpl->tpl_vars['infoEtapas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idinfoEtapa']['index']]['titulo'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['infoEtapas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idinfoEtapa']['index']]['paso'];?>
</td>
	-->	
		<td>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idfile'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['name'] = 'idfile';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['infoEtapas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idinfoEtapa']['index']]['archivos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idfile']['total']);
?>
				<?php $_smarty_tpl->tpl_vars['archivo'] = new Smarty_variable($_smarty_tpl->tpl_vars['infoEtapas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idinfoEtapa']['index']]['archivos'][$_smarty_tpl->getVariable('smarty')->value['section']['idfile']['index']], null, 0);?>
				<div style="padding:5px;display:block;<?php echo smarty_function_cycle(array('name'=>'idcycle2','values'=>",background:#C6EBFF"),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['archivo']->value['img_extension'];?>
" alt="">&nbsp;&nbsp;<a href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['archivo']->value['idcategoria'];?>
&amp;download=Y" title="Publicado el dia <?php echo $_smarty_tpl->tpl_vars['archivo']->value['fecha'];?>
"><?php echo $_smarty_tpl->tpl_vars['archivo']->value['nombre'];?>
</a>&nbsp;<span style="font-size:0.8em;color:#555;">[<?php echo $_smarty_tpl->tpl_vars['archivo']->value['fecha'];?>
]</span></div>
			<?php endfor; endif; ?>
		</td>
		
		<!--  FECHA APERTURA CONTRATACIÓN -->
		<!--
		<td style="text-align:center;background:<?php echo $_smarty_tpl->tpl_vars['infoEtapas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idinfoEtapa']['index']]['color_fecha_apertura'];?>
"><?php echo $_smarty_tpl->tpl_vars['infoEtapas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idinfoEtapa']['index']]['fecha_apertura'];?>
</td>
		-->
	</tr>
	<?php endfor; endif; ?>
</table>

<!-- GRAFICO CONTRATACIÓN -->
<!--
<?php if ($_smarty_tpl->tpl_vars['imgPlan']->value){?>
	<h3>Gr&aacute;fico de Planeaci&oacute;n</h3>
	<div id="containerImgPlan" style="text-align:center;overflow:auto;width:99%">
		<img id="imgPlan" src="<?php echo $_smarty_tpl->tpl_vars['imgPlan']->value;?>
" align="middle" alt="Cronograma del Proceso <?php echo $_smarty_tpl->tpl_vars['info']->value['titulo'];?>
" title="Cronograma del Proceso <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['titulo'], ENT_QUOTES, 'UTF-8', true);?>
">
	</div>
<?php }?>
-->
<!--Fin Default:Cuerpo-->
	
	<?php if (($_smarty_tpl->tpl_vars['c_subir']->value!=''||$_smarty_tpl->tpl_vars['c_imprimir']->value!=''||$_smarty_tpl->tpl_vars['c_cuentele']->value!='')){?>
	        <!--Default:Utilitarios-->
		<div id="default_utilitarios">
			<?php if ($_smarty_tpl->tpl_vars['c_subir']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['c_subir']->value;?>
<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['c_imprimir']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['c_imprimir']->value;?>
<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['c_cuentele']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['c_cuentele']->value;?>
<?php }?>
		</div>
        <!--Fin Default:Utilitarios-->
	<?php }?>
</div>

<?php }} ?>