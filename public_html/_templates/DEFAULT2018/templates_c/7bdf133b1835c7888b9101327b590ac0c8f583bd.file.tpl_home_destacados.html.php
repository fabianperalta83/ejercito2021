<?php /* Smarty version Smarty-3.1.8, created on 2021-02-18 08:06:01
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_home_destacados.html" */ ?>
<?php /*%%SmartyHeaderCode:743347085602e1fe98222e4-73433310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bdf133b1835c7888b9101327b590ac0c8f583bd' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_home_destacados.html',
      1 => 1613603959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '743347085602e1fe98222e4-73433310',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'imagen_accesibilidad' => 0,
    'imagen_pedagogia' => 0,
    'imagen_voz' => 0,
    'imagen_notificaciones' => 0,
    'imagen_solicitudes' => 0,
    'imagen_lancita' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e1fe9869351_69803732',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e1fe9869351_69803732')) {function content_602e1fe9869351_69803732($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["imagen_accesibilidad"] = new Smarty_variable((@_DIRIMAGES_USER).(@_AYUDA_ACCESIBILIDAD)."/incorporacion.gif", null, 0);?> 
<?php $_smarty_tpl->tpl_vars["imagen_pedagogia"] = new Smarty_variable((@_DIRIMAGES_USER).(@_AYUDA_ACCESIBILIDAD)."/pedagogia.gif", null, 0);?> 
<?php $_smarty_tpl->tpl_vars["imagen_voz"] = new Smarty_variable((@_DIRIMAGES_USER).(@_AYUDA_ACCESIBILIDAD)."/voz.gif", null, 0);?> 
<?php $_smarty_tpl->tpl_vars["imagen_notificaciones"] = new Smarty_variable((@_DIRIMAGES_USER).(@_AYUDA_ACCESIBILIDAD)."/notificaciones.gif", null, 0);?> 
<?php $_smarty_tpl->tpl_vars["imagen_solicitudes"] = new Smarty_variable((@_DIRIMAGES_USER).(@_AYUDA_ACCESIBILIDAD)."/solicitudes.gif", null, 0);?> 
<?php $_smarty_tpl->tpl_vars["imagen_lancita"] = new Smarty_variable((@_DIRIMAGES_USER).(@_AYUDA_ACCESIBILIDAD)."/lancita.gif", null, 0);?> 

<div class="slide slide-destacados alto_contraste col-sm-12 m360_mod" style="font-family: 'Fira Sans', sans-serif;">
	<div id="img-ayuda-dest1" style="display: none;">
		<img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['imagen_accesibilidad']->value;?>
"  alt="">
	</div>
	<a href="https://goo.gl/x7Y1jv" target="_blank" 
		<?php if (file_exists($_smarty_tpl->tpl_vars['imagen_accesibilidad']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest1')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest1')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest1')" <?php }?>>
		<div class="fonfo_destacado">
			<div class="img_dest1"></div>

			<!--<div class="title_destacados">INCORPORACI&Oacute;N</div>-->
			<!--<div class="line-red"></div>-->
		</div>
                
	</a>
    <br>
    <br>
    <div class="line-red" style="background-color: red;margin-left: -21px;"></div>
    <p style="font-weight: bold;text-transform: full-width;font-size: 0.9em;">INCORPORACIÓN</p>
    <br>
            <div class="line-red" style="background-color: black;margin-left: -21px;"></div>
</div>
<div class="slide slide-destacados alto_contraste col-sm-12 m360_mod">
	<div id="img-ayuda-dest2" style="display: none;">
		<img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['imagen_pedagogia']->value;?>
"  alt="">
	</div>
	<a href="https://www.ejercito.mil.co/index.php?idcategoria=381779" <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_pedagogia']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest2')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest2')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest2')" <?php }?>>
		<div class="fonfo_destacado">
			<div class="img_dest2"></div>
<!--			<div class="title_destacados">PEDAGOG&Iacute;A PARA LA PAZ</div>
			<div class="line-red"></div>-->
		</div>
	</a>
    <br>
    <p style="text-transform: full-width;font-size: 0.9em;">PEDAGOGÍA <br><font style="font-weight: bold;">PARA LA PAZ</font></p><br>
            <div class="line-red" style="background-color: black;margin-left: -21px;"></div>
</div>
<!--			<div class="title_destacados">LA VOZ DEL COMANDANTE</div>
			<div class="line-red"></div>-->
<div class="slide slide-destacados alto_contraste col-sm-12 m360_mod">
	<div id="img-ayuda-dest3" style="display: none;">
		<img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['imagen_voz']->value;?>
"  alt="">
	</div>
	<a href="https://www.ejercito.mil.co/index.php?idcategoria=385326" <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_voz']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest3')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest3')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest3')" <?php }?>>
		<div class="fonfo_destacado">
			<div class="img_dest3"></div>

		</div>
	</a>
    <br>
    <p style="text-transform: full-width;font-size: 0.9em;">LA VOZ <br><font style="font-weight: bold;">DEL COMANDANTE</font></p><br>
            <div class="line-red" style="background-color: black;margin-left: -21px;"></div>
</div>
<div class="slide slide-destacados alto_contraste col-sm-12 m360_mod">
	<div id="img-ayuda-dest4" style="display: none;">
		<img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['imagen_notificaciones']->value;?>
"  alt="">
	</div>
	<a href="https://www.ejercito.mil.co/index.php?idcategoria=357113" <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_notificaciones']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest4')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest4')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest4')" <?php }?>>
		<div class="fonfo_destacado">
			<div class="img_dest4"></div>
<!--			<div class="title_destacados">NOTIFICACIONES JUDICIALES</div>
			<div class="line-red"></div>-->
		</div>
	</a>
    <br>
    <p style="text-transform: full-width;font-size: 0.9em;">NOTIFICACIONES <br><font style="font-weight: bold;">JUDICIALES</font></p><br>
            <div class="line-red" style="background-color: black;margin-left: -21px;"></div>
</div>
<div class="slide slide-destacados alto_contraste col-sm-12 m360_mod">
	<div id="img-ayuda-dest5" style="display: none;">
		<img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['imagen_solicitudes']->value;?>
"  alt="">
	</div>
	<a href=" https://goo.gl/q0IAgl" <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_solicitudes']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest5')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest5')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest5')" <?php }?>>
		<div class="fonfo_destacado">
			<div class="img_dest5"></div>
<!--			<div class="title_destacados">REGISTRE SUS SOLICITUDES</div>
			<div class="line-red"></div>-->
		</div>
	</a>
    <br>
    <p style="text-transform: full-width;font-size: 0.9em;">REGISTRE SUS <br><font style="font-weight: bold;">SOLICITUDES</font></p><br>
            <div class="line-red" style="background-color: black;margin-left: -21px;"></div>
</div>
<div class="slide slide-destacados alto_contraste col-sm-12 m360_mod">
	<div id="img-ayuda-dest6" style="display: none;">
		<img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['imagen_lancita']->value;?>
"  alt="">
	</div>
	<a href="https://www.clublancita.mil.co/" target="_blank" <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_lancita']->value)){?> onmouseover="mostrarSubMenuAyuda('img-ayuda-dest6')" onkeyup="mostrarSubMenuAyuda('img-ayuda-dest6')" onmouseleave="ocultarSubMenuAyuda('img-ayuda-dest6')" <?php }?>>
		<div class="fonfo_destacado">
			<div class="img_dest6"></div>
<!--			<div class="title_destacados">SOY LANCITA</div>
			<div class="line-red"></div>-->
		</div>
	</a>
    <br>
    <p style="text-transform: full-width;font-size: 0.9em;">SOY <br><font style="font-weight: bold;">LANCITA</font></p><br>
            <div class="line-red" style="background-color: black;margin-left: -21px;"></div>
</div><?php }} ?>