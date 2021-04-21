<?php /* Smarty version Smarty-3.1.8, created on 2021-02-18 12:34:59
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_personalizar.html" */ ?>
<?php /*%%SmartyHeaderCode:1662328301602e5ef303e3e6-56086244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7043bb629a4f691fa5e05c33b83e52808604aaed' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_personalizar.html',
      1 => 1613604145,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1662328301602e5ef303e3e6-56086244',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'letra' => 0,
    'tamano' => 0,
    'zona' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e5ef30ca3c7_56794766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e5ef30ca3c7_56794766')) {function content_602e5ef30ca3c7_56794766($_smarty_tpl) {?><div class="personalizar-contenido">
	<p class="personalizar-intro">
		Las combinaciones presentadas fueron seleccionadas para favorecer a personas con discapacidad visual. Seleccione las combinaciones más adecuadas para mejorar su legibilidad y acceso a la información del Portal.
	</p>
    <form method="post" action="" name="personalizacion">
        <fieldset>
			<legend>Tipo de<br> Fuente</legend>
			<ul>
				<li>
					<label for="letra1">
						<input type="radio" name="letra" id="letra1" title="letra1" value="1" onclick="javascript:familyFont('1');" onkeypress="javascript:familyFont('1');" <?php if ($_smarty_tpl->tpl_vars['letra']->value=="1"){?> checked="checked" <?php }?>>
						<span class="labelHidden">Arial</span>
					</label>
					<img alt="Arial" src="<?php echo @_DIRIMAGES;?>
personalizacion/letra_1.jpg">
				</li>
				<li><label for="letra2"><input type="radio" name="letra" id="letra2" title="letra2" value="2" onclick="javascript:familyFont('2');" onkeypress="javascript:familyFont('2');" <?php if ($_smarty_tpl->tpl_vars['letra']->value=="2"){?> checked="checked" <?php }?>><span class="labelHidden">Georgia</span></label><img alt="Georgia" src="<?php echo @_DIRIMAGES;?>
personalizacion/letra_2.jpg"></li>
				<li><label for="letra3"><input type="radio" name="letra" id="letra3" title="letra3" value="3" onclick="javascript:familyFont('3');" onkeypress="javascript:familyFont('3');" <?php if ($_smarty_tpl->tpl_vars['letra']->value=="3"){?> checked="checked" <?php }?>><span class="labelHidden">Tahoma</span></label><img alt="Tahoma" src="<?php echo @_DIRIMAGES;?>
personalizacion/letra_3.jpg"></li>
				<li><label for="letra4"><input type="radio" name="letra" id="letra4" title="letra4" value="4" onclick="javascript:familyFont('4');" onkeypress="javascript:familyFont('4');" <?php if ($_smarty_tpl->tpl_vars['letra']->value=="4"){?> checked="checked" <?php }?>><span class="labelHidden">Verdana</span></label><img alt="Verdana" src="<?php echo @_DIRIMAGES;?>
personalizacion/letra_4.jpg"></li>
				<li><label for="letra5"><input type="radio" name="letra" id="letra5" title="letra5" value="5" onclick="javascript:familyFont('5');" onkeypress="javascript:familyFont('5');" <?php if ($_smarty_tpl->tpl_vars['letra']->value=="5"){?> checked="checked" <?php }?>><span class="labelHidden">Trebuchet MS</span></label><img alt="Trebuchet MS" src="<?php echo @_DIRIMAGES;?>
personalizacion/letra_5.jpg"></li>
			</ul>
		</fieldset>
		<fieldset>
			<legend>Tamaño de<br>la fuente</legend>
			<ul>
				<li><label for="tamano1"><input type="radio" name="tamano" id="tamano1" title="Tamaño1" value="1" onclick="javascript:sizeFont(1);" onkeypress="javascript:sizeFont(1);" <?php if ($_smarty_tpl->tpl_vars['tamano']->value=="1"){?> checked="checked" <?php }?>><span class="labelHidden">X-small</span></label><img alt="x-small" src="<?php echo @_DIRIMAGES;?>
personalizacion/a_1.jpg"></li>
				<li><label for="tamano2"><input type="radio" name="tamano" id="tamano2" title="Tamaño2" value="2" onclick="javascript:sizeFont(2);" onkeypress="javascript:sizeFont(2);" <?php if ($_smarty_tpl->tpl_vars['tamano']->value=="2"){?> checked="checked" <?php }?>><span class="labelHidden">Small</span></label><img alt="small" src="<?php echo @_DIRIMAGES;?>
personalizacion/a_2.jpg"></li>
				<li><label for="tamano3"><input type="radio" name="tamano" id="tamano3" title="Tamaño3" value="3" onclick="javascript:sizeFont(3);" onkeypress="javascript:sizeFont(3);" <?php if ($_smarty_tpl->tpl_vars['tamano']->value=="3"){?> checked="checked" <?php }?>><span class="labelHidden">Medium</span></label><img alt="medium" src="<?php echo @_DIRIMAGES;?>
personalizacion/a_3.jpg"></li>
				<li><label for="tamano4"><input type="radio" name="tamano" id="tamano4" title="Tamaño4" value="4" onclick="javascript:sizeFont(4);" onkeypress="javascript:sizeFont(4);" <?php if ($_smarty_tpl->tpl_vars['tamano']->value=="4"){?> checked="checked" <?php }?>><span class="labelHidden">Large</span></label><img alt="large" src="<?php echo @_DIRIMAGES;?>
personalizacion/a_4.jpg"></li>
			</ul>
        </fieldset>
		<fieldset>
			<legend>Zonas<br>Interactivas</legend>
			<ul>
				<li><label for="zona1"><input type="radio" name="zona" id="zona" title="Zona1" value="1" onclick="javascript:sizeFont(1);" onkeypress="javascript:sizeFont(1);" <?php if ($_smarty_tpl->tpl_vars['zona']->value=="1"){?> checked="checked" <?php }?>><span class="labelHidden">Zona1</span></label><img alt="Zona1" src="<?php echo @_DIRIMAGES;?>
personalizacion/zona_1.jpg"></li>
				<li><label for="zona2"><input type="radio" name="zona" id="zona" title="Zona2" value="2" onclick="javascript:sizeFont(2);" onkeypress="javascript:sizeFont(2);" <?php if ($_smarty_tpl->tpl_vars['zona']->value=="2"){?> checked="checked" <?php }?>><span class="labelHidden">Zona2</span></label><img alt="Zona2" src="<?php echo @_DIRIMAGES;?>
personalizacion/zona_2.jpg"></li>
			</ul>
		</fieldset>
		<p class="button"><input type ="submit" id="enviar" name="enviar" value="Aceptar"></p><br>
	</form>
</div><?php }} ?>