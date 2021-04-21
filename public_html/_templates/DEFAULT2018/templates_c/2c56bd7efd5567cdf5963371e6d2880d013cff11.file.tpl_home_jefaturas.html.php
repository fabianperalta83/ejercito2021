<?php /* Smarty version Smarty-3.1.8, created on 2021-02-18 08:06:01
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_home_jefaturas.html" */ ?>
<?php /*%%SmartyHeaderCode:637050322602e1fe9d18833-68206869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c56bd7efd5567cdf5963371e6d2880d013cff11' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_home_jefaturas.html',
      1 => 1613603960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '637050322602e1fe9d18833-68206869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ingles' => 0,
    'array_comando_ejercito_nacional' => 0,
    'array_comando_ejercito_nacional_2' => 0,
    'arrayJefaturas' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e1fe9e40092_02921663',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e1fe9e40092_02921663')) {function content_602e1fe9e40092_02921663($_smarty_tpl) {?>
	<script type="text/javascript">
		function mostrar_comando_1(){
			if(document.getElementById('div_menu_comando_1').style.display=='none'){
				$('#div_menu_comando_1').toggle('slow');
			}else{
				$('#div_menu_comando_1').toggle('hide');
			}
		}
		function mostrar_comando_2(){
			if(document.getElementById('div_menu_comando_2').style.display=='none'){
				$('#div_menu_comando_2').toggle('slow');
			}else{
				$('#div_menu_comando_2').toggle('hide');
			}
		}
		function mostrar_menu_jef(){
			if(document.getElementById('div_menu_jef').style.display=='none'){
				$('#div_menu_jef').toggle('slow');
			}else{
				$('#div_menu_jef').toggle('hide');
			}
		}
		function mostrar_menu_unidades(){
			if(document.getElementById('div_menu_unidades').style.display=='none'){
				$('#div_menu_unidades').toggle('slow');
			}else{
				$('#div_menu_unidades').toggle('hide');
			}
		}
		function mostrar_menu_escuela1(){
			if(document.getElementById('div_menu_escuela1').style.display=='none'){
				$('#div_menu_escuela1').toggle('slow');
			}else{
				$('#div_menu_escuela1').toggle('hide');
			}
		}
	</script>

<div class="row estructura_jefaturas" id="div_jefaturas">
	<div style="position: relative;">
		<a href="#div_redes" style="margin-top: -30px;" class="skip btn btn-default">Saltar la Secci&oacute;n Estructura</a>
	</div>
	<!-- Version web -->
	<div class="seccion-jefaturas col-md-12 col-lg-12 hidden-sm hidden-xs">
		<!-- Sección de Comando Ejércitro nacional -->
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<div class="name_red_box">
				<?php if ($_smarty_tpl->tpl_vars['ingles']->value!=1){?> COMANDO DEL EJ&Eacute;RCITO NACIONAL <?php }else{ ?> COMMAND OF THE NATIONAL ARMY <?php }?>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 " >	
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['id'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['name'] = 'id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['array_comando_ejercito_nacional']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = (int)6;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total']);
?>
				<div class="col-lg-2 col-md-2">
					<div class="col-lg-12 col-md-12" style="text-align:left">
						<div class="row name_jefatura">
							<p style="margin-bottom:1px">
								<?php if ($_smarty_tpl->tpl_vars['array_comando_ejercito_nacional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['antetitulo']==''){?>
									<strong>&nbsp;</strong>
								<?php }else{ ?>
									<strong><?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['antetitulo'];?>
</strong>
								<?php }?>
							</p>
							<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['idcategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['nombre'];?>
</a>
						</div>
					</div>
				</div>
			<?php endfor; endif; ?>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 seccion-estructura"></div>
		</div>
		
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<div class="name_red_box">
				<?php if ($_smarty_tpl->tpl_vars['ingles']->value!=1){?> SEGUNDO COMANDANTE DEL EJ&Eacute;RCITO NACIONAL <?php }else{ ?> SECOND NATIONAL ARMYCOLANDER <?php }?>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">	
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['id'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['name'] = 'id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['array_comando_ejercito_nacional_2']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = (int)6;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total']);
?>
				<div class="col-lg-2 col-md-2">
					<div class="col-lg-12 col-md-12" style="text-align:left">
						<div class="row name_jefatura">
							<p style="margin-bottom:1px"><strong><?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['antetitulo'];?>
</strong></p>
							<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['idcategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['nombre'];?>
</a>
						</div>
					</div>
				</div>
			<?php endfor; endif; ?>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 seccion-estructura"></div>
		</div>
		<!-- Sección de Jefaturas -->
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<div class="name_red_box">
				<?php if ($_smarty_tpl->tpl_vars['ingles']->value!=1){?> JEFATURA DE ESTADO MAYOR DE PLANEACI&Oacute;N Y POL&Iacute;TICAS <?php }else{ ?> PLANNING AND POLICIES CHIEF OF STAFF <?php }?>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">	
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['id'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['name'] = 'id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrayJefaturas']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = (int)6;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total']);
?>
				<div class="col-lg-2 col-md-2">
					<div class="col-lg-12 col-md-12" style="text-align:left">
						<div class="row name_jefatura">
							<p style="margin-bottom:1px"><strong><?php echo $_smarty_tpl->tpl_vars['arrayJefaturas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['antetitulo'];?>
</strong></p>
							<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['arrayJefaturas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['idcategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrayJefaturas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['nombre'];?>
</a>
						</div>
					</div>
				</div>
			<?php endfor; endif; ?>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['id'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['name'] = 'id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrayJefaturas']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = (int)6;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = (int)6;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total']);
?>
				<div class="col-lg-2 col-md-2">
					<div class="col-lg-12 col-md-12" style="text-align:left">
						<div class="row name_jefatura">
							<p style="margin-bottom:1px"><strong><?php echo $_smarty_tpl->tpl_vars['arrayJefaturas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['antetitulo'];?>
</strong></p>
							<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['arrayJefaturas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['idcategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrayJefaturas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['nombre'];?>
</a>
						</div>
					</div>
				</div>
			<?php endfor; endif; ?>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 seccion-estructura"></div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<div class="name_red_box">
				<?php if ($_smarty_tpl->tpl_vars['ingles']->value!=1){?> JEFATURAS DE ESTADO MAYOR GENERADOR DE FUERZA <?php }else{ ?> FORCE GENERATOR OF STAFF <?php }?>
			</div>
		</div>
		<div class="col-lg-12 col-md-12" style="text-align:left">
			<div class="names_jefatura">
				<span>Comando de Educaci&oacute;n y Doctrina</span>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 make-flex" style="display: flex;
		align-content: center;
		align-items: flex-start;
		justify-content: space-around;">
			<div class="iconos">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.cedoe.mil.co/" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/23.png" alt="Centro de Doctrina del Ejercito" title="Centro de Doctrina del Ejercito"></a>
				<span class="tituloIcono"><br><br>Centro de Doctrina del Ejercito<br><br></span>
			</div>
			<div class="iconos">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.cemil.mil.co/" target="_blank" ><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/1.png" alt="Centro de Educaci&oacute;n Militar" title="Centro de Educaci&oacute;n Militar"></a>
				<span class="tituloIcono"><br><br>Centro de Educaci&oacute;n Militar<br><br></span>
			</div>
			<div class="iconos">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.cenae.mil.co/" target="_blank" ><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/20.png" alt="Centro Nacional de Entrenamiento" title="Centro Nacional de Entrenamiento"></a>
				<span class="tituloIcono"><br><br>Centro Nacional de Entrenamiento<br><br></span>
			</div>
			<div class="iconos">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://cedoc.mil.co/" target="_blank" ><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/12.png" alt="Comando de Educaci&oacute;n y Doctrina" title="Comando de Educaci&oacute;n y Doctrina"></a>
				<span class="tituloIcono"><br><br>Comando de Educaci&oacute;n y Doctrina<br><br></span>
			</div>
			<div class="iconos">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.esmic.edu.co/" target="_blank" ><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/3.png" alt="Escuela Militar de Cadetes General Jos&eacute; Mar&iacute: C&oacute;rdoba" title="Escuela Militar de Cadetes General Jos&eacute; Mar&iacute: C&oacute;rdoba"></a>
				<span class="tituloIcono"><br><br>Escuela Militar de Cadetes General Jos&eacute; Mar&iacute;a C&oacute;rdoba</span>
			</div>
			<div class="iconos">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.emsub.mil.co/" target="_blank" ><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/4.png" alt="Escuela Militar de Suboficiales Sargento Inocencio Chinc&aacute;" title="Escuela Militar de Suboficiales Sargento Inocencio Chinc&aacute;"></a>
				<span class="tituloIcono"><br><br>Escuela Militar de Suboficiales Sargento Inocencio Chinc&aacute;</span>
			</div>
			<div class="iconos">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.espro.mil.co/" target="_blank" title="Escuela de Soldados Profesionales Soldado Pedro Pascacio Mart&iacute;nez"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/5.png" alt="Escuela de Soldados Profesionales Soldado Pedro Pascacio Mart&iacute;nez"></a>
				<span class="tituloIcono"><br><br>Escuela de Soldados Profesionales Soldado Pedro Pascacio Mart&iacute;nez</span>
			</div> 
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 seccion-estructura"></div>
		<div class="col-lg-12 col-md-12 " style="text-align:left">
			<div class="names_jefatura">
				<span>Comando de Log&iacute;stico</span>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 make-flex" style="display: flex;
		align-content: center;
		align-items: flex-start;
		justify-content: space-around;" >	
			<div class="iconos2">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://coper.mil.co/" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/16.png" alt="Comando de Personal" title="Comando de Personal"></a>
				<span class="tituloIcono"><br><br>Comando de Personal</span>
			</div>
			<div class="iconos2">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.reclutamiento.mil.co/" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/14.png" alt="Comando de Reclutamiento y Control de Reservas" title="Comando de Reclutamiento y Control de Reservas"></a>
				<span class="tituloIcono"><br><br>Comando de Reclutamiento y Control de Reservas</span>
			</div>
			<div class="iconos2">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ejercito.mil.co/conozcanos/organigrama/jefatura_estado_mayor_generador_406516/comando_logistico" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/15.png" alt="Comando logistico" title="Comando logistico"></a>
				<span class="tituloIcono"><br><br>Comando Log&iacute;stico <br><br></span>
			</div>
			<div class="iconos2">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="javascript:;" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/17.png" alt="Brigada de Apoyo Log&iacute;stico No.1 en Apoyo General" title="Brigada de Apoyo Log&iacute;stico No.1 en Apoyo General"></a>
				<span class="tituloIcono"><br><br>Brigada de <br>Apoyo Log&iacute;stico No.1 en Apoyo General</span>
			</div>
			<div class="iconos2">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="javascript:;" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/18.png" alt="Brigada de Apoyo Log&iacute;stico No.2 en Apoyo Directo" title="Brigada de Apoyo Log&iacute;stico No.2 en Apoyo Directo"></a>
				<span class="tituloIcono"><br><br>Brigada de <br>Apoyo Log&iacute;stico No.2 en Apoyo Directo</span>
			</div>
			<div class="iconos2">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ingenierosmilitares.mil.co/" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/13.png" alt="Comando de Ingenieros" title="Comando de Ingenieros"></a>
				<span class="tituloIcono"><br><br>Comando de Ingenieros <br><br></span>
			</div>
			<div class="iconos2">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ingenierosmilitares.mil.co/ingenieros_militares_colombia/conozcanos/brigadas/brigada_construccion" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/19.png" alt="Brigada de Construcciones" title="Brigada de Construcciones"></a>
				<span class="tituloIcono"><br><br>Brigada de Construcciones <br><br></span>
			</div>
			<div class="iconos2">
				 <a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ejercito.mil.co/el_centro_nacional_artefactos_explosivos_minas_cenam_capacita_comites_explosivos_bating_384124" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/6.png" alt="Centro Nacional contra Artefactos Explosivos Improvisados y Minas" title="Centro Nacional contra Artefactos Explosivos Improvisados y Minas"></a>
				<span class="tituloIcono"><br><br>Centro Nacional Contra Artefactos Explosivos Improvisados y Minas</span>
			</div>
			<div class="iconos2">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ejercito.mil.co/conozcanos/organigrama/unidades_militares/brigadas_especiales/240210" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/9.png" alt="Brigada Especial de Ingenieros Militares" title="Brigada Especial de Ingenieros Militares"></a>
				<span class="tituloIcono"><br><br>Brigada Especial de Ingenieros Militares <br><br></span>
			</div>
			<div class="iconos2">
				<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ejercito.mil.co/brigada_desminado_humanitario" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/24.png" alt="Brigada de Ingenieros de Desminado Humanitario No.1" title="Brigada de Ingenieros de Desminado Humanitario No.1"></a>
				<span class="tituloIcono"><br><br>Brigada de Ingenieros Desminado Humanitario No.1 <br><br></span>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 seccion-estructura"></div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<div class="name_red_box">
				<?php if ($_smarty_tpl->tpl_vars['ingles']->value!=1){?> JEFATURAS DE ESTADO MAYOR DE OPERACIONES <?php }else{ ?> HEAD OF OPERATION STAFF <?php }?>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 make-flex make-flex-2" style="margin-bottom: 30px; display: flex;
		align-content: center;
		align-items: center;
		justify-content: space-around;">
				<div class="iconos">
						<a href="https://www.primeradivision.mil.co/" target="_blank">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/1.png" alt="Primera Divisi&oacute;n">
						</a><div class="name_division">Primera Divisi&oacute;n</div>
				</div>
				<div class="iconos">
						<a href="https://www.segundadivision.mil.co/" target="_blank">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/2.png" alt="Segunda Divisi&oacute;n">
						</a><div class="name_division">Segunda Divisi&oacute;n</div>
				</div>
				<div class="iconos">
						<a href="https://www.terceradivision.mil.co/" target="_blank">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/3.png" alt="Tercera Divisi&oacute;n">
						</a><div class="name_division">Tercera Divisi&oacute;n</div>
				</div>
				<div class="iconos">
						<a href="https://www.cuartadivision.mil.co/" target="_blank">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/4.png" alt="Cuarta Divisi&oacute;n">
						</a>
						<div class="name_division">Cuarta Divisi&oacute;n</div>
				</div>
				<div class="iconos">
						<a href="https://www.quintadivision.mil.co/" target="_blank">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/5.png" alt="Quinta Divisi&oacute;n">
						</a>
						<div class="name_division">Quinta Divisi&oacute;n</div>
				</div>
				<div class="iconos">
						<a href="https://www.sextadivision.mil.co/" target="_blank">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/6.png" alt="Sexta Divisi&oacute;n">
						</a><div class="name_division">Sexta Divisi&oacute;n</div>
				</div>
				<div class="iconos">
						<a href="https://www.septimadivision.mil.co/" target="_blank">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/7.png" alt="Septima Divisi&oacute;n">
							</a><div class="name_division">Septima Divisi&oacute;n</div>
				</div>
				<div class="iconos">
						<a href="https://www.octavadivision.mil.co/" target="_blank">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/8.png" alt="Octava Divisi&oacute;n">
						</a><div class="name_division">Octava Divisi&oacute;n</div>
				</div>
				<div class="iconos">
						<a href="https://www.aviacionejercito.mil.co/" target="_blank">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/9.png" alt="Divisi&oacute;n de Aviaci&oacute;n Asalto &Aacute;ereo - DAVAA">
							
						</a><div class="name_division">Divisi&oacute;n de Aviaci&oacute;n Asalto &Aacute;ereo - DAVAA</div>
				</div>
				<div class="iconos">
						<a href="javascript:;">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/21.png" alt="Divisi&oacute;n de Fuerzas Especiales">
							</a><div class="name_division">Divisi&oacute;n de Fuerzas Especiales</div>
				</div>
			<!--div class="row">
				<ul class="nav nav-tabs nav-justified ul-divisiones" style="margin-top:10px">
					<li>
						<a href="https://www.primeradivision.mil.co/" target="_blank">
							<div class="iconos_division">
								<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/1.png" alt="Primera Divisi&oacute;n">
							</div>
						</a><div class="name_division">Primera Divisi&oacute;n</div>
					</li>
					<li>
						<a href="https://www.segundadivision.mil.co/" target="_blank">
							<div class="iconos_division">
								<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/2.png" alt="Segunda Divisi&oacute;n">
							</div>
						</a><div class="name_division">Segunda Divisi&oacute;n</div>
					</li>
					<li>
						<a href="https://www.terceradivision.mil.co/" target="_blank">
							<div class="iconos_division">
								<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/3.png" alt="Tercera Divisi&oacute;n">
							</div>
						</a><div class="name_division">Tercera Divisi&oacute;n</div>
					</li>
					<li>
						<a href="https://www.cuartadivision.mil.co/" target="_blank"><div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/4.png" alt="Cuarta Divisi&oacute;n">
						</div></a><div class="name_division">Cuarta Divisi&oacute;n</div>
					</li>
					<li>
						<a href="https://www.quintadivision.mil.co/" target="_blank"><div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/5.png" alt="Quinta Divisi&oacute;n">
						</div></a><div class="name_division">Quinta Divisi&oacute;n</div>
					</li>
					<li>
						<a href="https://www.sextadivision.mil.co/" target="_blank"><div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/6.png" alt="Sexta Divisi&oacute;n">
						</div></a><div class="name_division">Sexta Divisi&oacute;n</div>
					</li>
					<li>
						<a href="https://www.septimadivision.mil.co/" target="_blank"><div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/7.png" alt="Septima Divisi&oacute;n">
						</div></a><div class="name_division">Septima Divisi&oacute;n</div>
					</li>
					<li>
						<a href="https://www.octavadivision.mil.co/" target="_blank"><div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/8.png" alt="Octava Divisi&oacute;n">
						</div></a><div class="name_division">Octava Divisi&oacute;n</div>
					</li>
					<li>
						<a href="https://www.aviacionejercito.mil.co/" target="_blank">
							<div class="iconos_division">
								<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/9.png" alt="Divisi&oacute;n de Aviaci&oacute;n Asalto &Aacute;ereo - DAVAA">
							</div>
						</a><div class="name_division">Divisi&oacute;n de Aviaci&oacute;n Asalto &Aacute;ereo - DAVAA</div>
					</li>
					<li>
						<a href="javascript:;">
							<div class="iconos_division">
								<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/21.png" alt="Divisi&oacute;n de Fuerzas Especiales">
							</div>
						</a><div class="name_division">Divisi&oacute;n de Fuerzas Especiales</div>
					</li>
				</ul>
			</div-->
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 seccion-estructura"></div>
	</div>
	<!-- Fin version web -->
	<!-- Version Movil -->
	<div class="hidden-md hidden-lg col-sm-12 col-xs-12">
		<!-- Mostrar menu Comando 1-->
		<div class="col-sm-12 col-xs-12 jefatura">
			<a onclick="mostrar_comando_1()" class="hidden-md hidden-lg">
				<div class="name_red_box" style="margin-top:10px !important">COMANDO DEL EJ&Eacute;RCITO NACIONAL</div>
				<div class="flecha"></div>
			</a>
		</div>
		<div class="col-sm-12 col-xs-12 div_menu_responsive alto_contraste" style="display:none" id="div_menu_comando_1">
			<div class="ul_menu_oculto alto_contraste" style="margin-top:0 !important;">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['id'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['name'] = 'id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['array_comando_ejercito_nacional']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total']);
?>
					<div class="col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-sm-12 col-xs-12" style="text-align:left">
								<div class="row name_jefatura">
									<p style="margin-bottom:1px; color: #000; font-size: 14px;"><strong><?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['antetitulo'];?>
</strong></p>
									<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['idcategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['nombre'];?>
</a>
								</div>
							</div>
						</div>
					</div>
				<?php endfor; endif; ?>
			</div>
		</div>
		<!-- Mostrar menu Comando 2-->
		<div class="col-sm-12 col-xs-12 jefatura">
			<a onclick="mostrar_comando_2()" class="hidden-md hidden-lg">
				<div class="name_red_box" style="margin-top:10px !important">SEGUNDO COMANDANTE DEL EJ&Eacute;RCITO NACIONAL</div>
				<div class="flecha"></div>
			</a>
		</div>
		<div class="col-sm-12 col-xs-12 div_menu_responsive alto_contraste" style="display:none" id="div_menu_comando_2">
			<div class="ul_menu_oculto alto_contraste" style="margin-top:0 !important;">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['id'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['name'] = 'id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['array_comando_ejercito_nacional_2']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total']);
?>
					<div class="col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-sm-12 col-xs-12" style="text-align:left">
								<div class="row name_jefatura">
									<p style="margin-bottom:1px; color: #000; font-size: 14px;"><strong><?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['antetitulo'];?>
</strong></p>
									<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['idcategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['array_comando_ejercito_nacional_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['nombre'];?>
</a>
								</div>
							</div>
						</div>
					</div>
				<?php endfor; endif; ?>
			</div>
		</div>
		<div class="col-sm-12 col-xs-12 jefatura">
			<a onclick="mostrar_menu_jef()" class="hidden-md hidden-lg">
				<div class="name_red_box" style="margin-top:10px !important">JEFATURA DE ESTADO MAYOR DE PLANEACI&Oacute;N  Y POL&Iacute;TICAS</div>
				<div class="flecha"></div>
			</a>
		</div>
		<div class="col-sm-12 col-xs-12 div_menu_responsive alto_contraste" style="display:none" id="div_menu_jef">
			<div class="ul_menu_oculto alto_contraste" style="margin-top:0 !important;">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['id'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['name'] = 'id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrayJefaturas']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['id']['total']);
?>
					<div class="col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-sm-12 col-xs-12" style="text-align:left">
								<div class="row name_jefatura">
									<p style="margin-bottom:1px; color: #000; font-size: 14px;"><strong><?php echo $_smarty_tpl->tpl_vars['arrayJefaturas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['antetitulo'];?>
</strong></p>
									<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['arrayJefaturas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['idcategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrayJefaturas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['id']['index']]['nombre'];?>
</a>
								</div>
							</div>
						</div>
					</div>
				<?php endfor; endif; ?>
			</div>
		</div>
		<div class="col-sm-12 col-xs-12 jefatura">
			<a onclick="mostrar_menu_escuela1()" class="hidden-md hidden-lg">
				<div class="name_red_box" style="margin-top:10px !important">JEFATURA DE ESTADO MAYOR GENERADOR DE FUERZA</div>
				<div class="flecha"></div>
			</a>
		</div>
		<div class="col-sm-12 col-xs-12 div_menu_responsive alto_contraste" style="display:none" id="div_menu_escuela1">
			<div class="col-sm-12 col-xs-12" style="text-align:left">
				<div class="iconos3">
					<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://coper.mil.co/" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/16.png" alt="Comando de Personal" title="Comando de Personal"></a><br>
					<span class="tituloIcono"><br>Comando de Personal</span>
				</div>
			</div>
			<div class="col-sm-12 col-xs-12" style="text-align:left">
				<div class="iconos3">
					<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.reclutamiento.mil.co/" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/14.png" alt="Comando de Reclutamiento y Control de Reservas" title="Comando de Reclutamiento y Control de Reservas"></a><br>
					<span class="tituloIcono"><br>Comando de Reclutamiento y Control de Reservas</span>
				</div>
			</div>
			<div class="col-sm-12 col-xs-12" style="text-align:left">
				<div class="iconos3">
					<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://cedoc.mil.co/" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/12.png" alt="Comando de Educaci&oacute;n y Doctrina" title="Comando de Educaci&oacute;n y Doctrina"></a><br>
					<span class="tituloIcono"><br>Comando de Educaci&oacute;n y Doctrina</span>
				</div>
				<div class="iconos3">
					<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.cedoe.mil.co/" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/23.png" alt="Centro de Doctrina del Ejercito" title="Centro de Doctrina del Ejercito"></a><br>
					<span class="tituloIcono"><br><br>Centro de Doctrina del Ejercito<br><br></span>
				</div>
			</div>
			<div class="col-sm-12 col-xs-12" style="text-align:center !important">
				<div class="col-sm-12 col-xs-12">
					<div class="iconos3">
						<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.cemil.mil.co/" target="_blank" ><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/1.png" alt="Centro de Educaci&oacute;n Militar" title="Centro de Educaci&oacute;n Militar"></a><br>
						<span class="tituloIcono">Centro de Educaci&oacute;n Militar</span>
					</div>
				</div>
				<div class="col-sm-12 col-xs-12">
					<div class="iconos3">
						<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.cenae.mil.co/" target="_blank" ><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/20.png" alt="Centro Nacional de Entrenamiento" title="Centro Nacional de Entrenamiento"></a><br>
						<span class="tituloIcono">Centro Nacional de Entrenamiento</span>
					</div>
				</div>
				<div class="col-sm-12 col-xs-12">
					<div class="iconos3">
						<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.esmic.edu.co/" target="_blank" ><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/3.png" alt="Escuela Militar de Cadetes General Jos&eacute; Mar&iacute: C&oacute;rdoba" title="Escuela Militar de Cadetes General Jos&eacute; Mar&iacute: C&oacute;rdoba"></a><br>
						<span class="tituloIcono">Escuela Militar de Cadetes General Jos&eacute; Mar&iacute;a C&oacute;rdoba</span>
					</div>
				</div>
				<div class="col-sm-12 col-xs-12">
					<div class="iconos3">
						<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.emsub.mil.co/" target="_blank" ><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/4.png" alt="Escuela Militar de Suboficiales Sargento Inocencio Chinc&aacute;" title="Escuela Militar de Suboficiales Sargento Inocencio Chinc&aacute;"></a><br>
						<span class="tituloIcono">Escuela Militar de Suboficiales Sargento Inocencio Chinc&aacute;</span>
					</div>
				</div>
				<div class="col-sm-12 col-xs-12">
					<div class="iconos3">
						<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.espro.mil.co/" target="_blank" title="Escuela de Soldados Profesionales Soldado Pedro Pascacio Mart&iacute;nez"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/5.png" alt="Escuela de Soldados Profesionales Soldado Pedro Pascacio Mart&iacute;nez"></a><br>
						<span class="tituloIcono">Escuela de Soldados Profesionales Soldado Pedro Pascacio Mart&iacute;nez</span>
					</div> 
				</div>
			</div>
			<div class="col-sm-12 col-xs-12" style="text-align:left;">
				<div class="iconos3">
					<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ejercito.mil.co/conozcanos/organigrama/jefatura_estado_mayor_generador_406516/comando_logistico" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/15.png" alt="Comando logistico" title="Comando logistico"></a><br>
					<span class="tituloIcono">Comando Log&iacute;stico</span>
				</div>
				<div class="iconos3">
					<a style="text-decoration: none; color: #333333" class="name_jefatura" href="javascript:;" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/17.png" alt="Brigada de Apoyo Log&iacute;stico No.1 en Apoyo General" title="Brigada de Apoyo Log&iacute;stico No.1 en Apoyo General"></a><br>
					<span class="tituloIcono">Brigada de Apoyo Log&iacute;stico No.1 en Apoyo General</span>
				</div>
				<div class="iconos3">
					<a style="text-decoration: none; color: #333333" class="name_jefatura" href="javascript:;" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/18.png" alt="Brigada de Apoyo Log&iacute;stico No.2 en Apoyo Directo" title="Brigada de Apoyo Log&iacute;stico No.2 en Apoyo Directo"></a><br>
					<span class="tituloIcono">Brigada de Apoyo Log&iacute;stico No.2 en Apoyo Directo</span>
				</div>
			</div>
			<div class="col-sm-12 col-xs-12" style="text-align:center !important">
				<div class="col-sm-12 col-xs-12">
					<div class="iconos3">
						<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ingenierosmilitares.mil.co/" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/13.png" alt="Comando de Ingenieros" title="Comando de Ingenieros"></a><br>
						<span class="tituloIcono">Comando de Ingenieros</span>
					</div>
					<div class="iconos3">
						<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ejercito.mil.co/brigada_desminado_humanitario" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/24.png" alt="Brigada de Ingenieros de Desminado Humanitario No.1" title="Brigada de Ingenieros de Desminado Humanitario No.1"></a><br>
						<span class="tituloIcono">Brigada de Ingenieros de Desminado Humanitario No.1</span>
					</div>
				</div>
				<div class="col-sm-12 col-xs-12">
					<div class="iconos3">
						 <a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ejercito.mil.co/el_centro_nacional_artefactos_explosivos_minas_cenam_capacita_comites_explosivos_bating_384124" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/6.png" alt="Centro Nacional contra Artefactos Explosivos Improvisados y Minas" title="Centro Nacional contra Artefactos Explosivos Improvisados y Minas"></a><br>
						<span class="tituloIcono">Centro Nacional Contra Artefactos Explosivos Improvisados y Minas</span>
					</div>
				</div>
				<div class="iconos3">
					<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ejercito.mil.co/conozcanos/organigrama/unidades_militares/brigadas_especiales/240210" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/9.png" alt="Brigada Especial de Ingenieros Militares" title="Brigada Especial de Ingenieros Militares"></a><br>
					<span class="tituloIcono">Brigada Especial de Ingenieros Militares</span>
				</div>
				<div class="col-sm-12 col-xs-12">
					<div class="iconos4">
					<a style="text-decoration: none; color: #333333" class="name_jefatura" href="https://www.ejercito.mil.co/brigada_desminado_humanitario" target="_blank"><img src="<?php echo @_DIRIMAGES_USER;?>
iconos/8.png" alt="Brigada Desminado Humanitario" title="Brigada Desminado Humanitario"></a><br>
						<span class="tituloIcono">Brigada Desminado Humanitario</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xs-12 jefatura">
			<a onclick="mostrar_menu_unidades()" class="hidden-md hidden-lg">
				<div class="name_red_box" style="margin-top:10px !important">JEFATURA DE ESTADO MAYOR DE OPERACIONES</div>
				<div class="flecha"></div>
			</a>
		</div>
		<div class="col-sm-12 col-xs-12 div_menu_responsive alto_contraste" style="display:none" id="div_menu_unidades">
			<ul class="nav nav-tabs nav-justified ul-divisiones">
				<li>
					<a href="https://www.primeradivision.mil.co/" target="_blank">
						<div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/1.png" alt="Primera Divisi&oacute;n">
						</div>
					</a>
					<div class="name_division2">Primera Divisi&oacute;n</div>
				</li>
				<li>
					<a href="https://www.segundadivision.mil.co/" target="_blank">
						<div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/2.png" alt="Segunda Divisi&oacute;n">
						</div>
					</a>
					<div class="name_division2">Segunda Divisi&oacute;n</div>
				</li>
				<li>
					<a href="https://www.terceradivision.mil.co/" target="_blank">
						<div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/3.png" alt="Tercera Divisi&oacute;n">
						</div>
					</a>
					<div class="name_division2">Tercera Divisi&oacute;n</div>
				</li>
				<li>
					<a href="https://www.cuartadivision.mil.co/" target="_blank">
						<div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/4.png" alt="Cuarta Divisi&oacute;n">
						</div>
					</a>
					<div class="name_division2">Cuarta Divisi&oacute;n</div>
				</li>
				<li>
					<a href="https://www.quintadivision.mil.co/" target="_blank">
						<div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/5.png" alt="Quinta Divisi&oacute;n">
						</div>
					</a>
					<div class="name_division2">Quinta Divisi&oacute;n</div>
				</li>
				<li>
					<a href="https://www.sextadivision.mil.co/" target="_blank">
						<div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/6.png" alt="Sexta Divisi&oacute;n">
						</div>
					</a>
					<div class="name_division2">Sexta Divisi&oacute;n</div>
				</li>
				<li>
					<a href="https://www.septimadivision.mil.co/" target="_blank">
						<div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/7.png" alt="Septima Divisi&oacute;n">
						</div>
					</a>
					<div class="name_division2">Septima Divisi&oacute;n</div>
				</li>
				<li>
					<a href="https://www.octavadivision.mil.co/" target="_blank">
						<div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/8.png" alt="Octava Divisi&oacute;n">
						</div>
					</a>
					<div class="name_division2">Octava Divisi&oacute;n</div>
				</li>
				<li>
					<a href="https://www.aviacionejercito.mil.co/" target="_blank">
						<div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/9.png" alt="Divisi&oacute;n de Aviaci&oacute;n Asalto &Aacute;ereo - DAVAA">
						</div>
					</a>
					<div class="name_division2">Divisi&oacute;n de Aviaci&oacute;n Asalto &Aacute;ereo - DAVAA</div>
				</li>
				<li>
					<a href="javascript:;">
						<div class="iconos_division">
							<img src="<?php echo @_DIRIMAGES_USER;?>
iconos_division/21.png" alt="Divisi&oacute;n de Fuerzas Especiales">
						</div>
					</a><div class="name_division2">Divisi&oacute;n de Fuerzas Especiales</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- Fin version movil -->
</div><?php }} ?>