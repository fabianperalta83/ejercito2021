<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 21:00:52
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_edicion_full.html" */ ?>
<?php /*%%SmartyHeaderCode:64420943460302704ced576-01436352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bd1bf3982aefead3413f7b32b5d234d6225de20' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_edicion_full.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64420943460302704ced576-01436352',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subMenuError' => 0,
    'c_action' => 0,
    'userInfo' => 0,
    'c_titulo' => 0,
    'idcategoria' => 0,
    'c_salvar' => 0,
    'c_submenu' => 0,
    'c_formulario_titulo' => 0,
    'administrador' => 0,
    'idpadre_form' => 0,
    'campos' => 0,
    'c_micrositios' => 0,
    'c_version' => 0,
    'iddisplay_form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_60302704d4ced7_86483163',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60302704d4ced7_86483163')) {function content_60302704d4ced7_86483163($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/function.cycle.php';
?>
	
  <script src="js/tinymce/tinymce.min.js"></script>
	
  <script type="text/javascript" src="js/preview.js"></script>

  <script type="text/javascript" src="_lib/image_manager/assets/dialog.js"></script>
  <script type="text/javascript" src="_lib/image_manager/IMEStandalone.js"></script>

  <!-- Calendario -->
  <script type="text/javascript" src="_lib/jscalendar/calendar.php"></script>
  <!-- language for the calendar -->

  <script type="text/javascript" src="_lib/jscalendar/lang/calendar-es.js"></script>
  <!-- the following script defines the Calendar.setup helper function, which makes
     adding a calendar a matter of 1 or 2 lines of code. -->
  <script type="text/javascript" src="_lib/jscalendar/calendar-setup.js"></script>

  <style type="text/css">
    @import url("_lib/jscalendar/calendar-win2k-1.css");
    @import url("_templates/Default/recursos/css/estilo_secab.css");
  </style>
  
  <script type="text/javascript" src="js/simpleFacebookGraph.js"></script>


  <script type="text/javascript">
    //<![CDATA[

    //Create a new Imanager Manager, needs the directory where the manager is
    //and which language translation to use.
    var manager = new ImageManager('_lib/image_manager','en');

    //Image Manager wrapper. Simply calls the ImageManager
    ImageSelector =
    {
      //This is called when the user has selected a file
      //and clicked OK, see popManager in IMEStandalone to
      //see the parameters returned.
      update : function(params)
      {
        if(this.field && this.field.value != null)
        {
          this.field.value = params.f_file; //params.f_url
        }
      },
      //open the Image Manager, updates the textfield
      //value when user has selected a file.
      select: function(textfieldID)
      {
        this.field = document.getElementById(textfieldID);
        manager.popManager(this);
      }
    };

    /**************************************************************/
    /**
     * Function cargarImagen
     */
    function cargarImagen(img) {
      var objImg = document.getElementById("imgth");
      var val = img.replace(/^\s*(.+)\s*$/, "$1");
      if (val != '') {
        objImg.src = unescape("tools/microsThumb.php?src=recursos_user/imagenes" + img);
        objImg.style.display = 'block';
      } else {
        objImg.style.display = 'none';
      }
    }
    //]]>
    </script>
	
	
	
	<!-- **************** 
	                   JAVASCRIPT PUBLICAR REDES SOCIALES 
	                                        **************************** -->
									   
	<script type="text/javascript">
	    
	// Cuando la pagina carga miramos si ya hay un usuario identificado.
    fb.ready(function(){ 
       if (fb.logged)
       {
          // Cambiamos el link de identificarse por el nombre y la foto del usuario.
          html = "<p style='background-position:center'><strong>Bienvenido:</strong> " + fb.user.name + "</p>";
          html += '<p style=background-position:center><img src="' + fb.user.picture + '"/></p>';
          html += '<p><a href="#" onclick="fb.logout(); return false;">Salir</a></p>';
          document.getElementById("conectar_facebook").innerHTML = html;
       }
    });

    function validar_caracteres(campo_validar)
 	{
 		entradilla_form = document.getElementById(campo_validar).value;
 		numeroCaracteres = entradilla_form.length;
 		inicioBlanco = /^ /
		// El $ indica final de cadena
		finBlanco = / $/
		// El global (g) es para obtener todas las posibles combinaciones
		variosBlancos = /[ ]+/g 

		entradilla_form = entradilla_form.replace(inicioBlanco,"");
		entradilla_form = entradilla_form.replace(finBlanco,"");
		entradilla_form = entradilla_form.replace(variosBlancos," ");

		// Creamos un array con las diferentes palabras. Teniendo en 
		// cuenta que la separación entre palabras es el espacio en blanco.
		textoAreaDividido = entradilla_form.split(" ");
		numeroPalabras = textoAreaDividido.length;

		// Mostramos los datos.
		// Tendremos en cuenta si hay que escribir en plural o en singular.
		tC = (numeroCaracteres==1)?" carácter":" caracteres";
		tP = (numeroPalabras==1)?" palabra":" palabras";
		 
		alert (numeroCaracteres + tC +"\n" + numeroPalabras + tP);
 	}
 
 
   // Funcion para logarse con Facebook.
    function login() {
      fb.login(function(){ 
       if (fb.logged) {
         // Cambiamos el link de identificarse por el nombre y la foto del usuario.
        html = "<p style='background-position:center'><strong>Bienvenido:</strong> " + fb.user.name + "</p>";
        html += "<p style='background-position:center'><img src='" + fb.user.picture + "'/></p>";
		html += '<p><a href="#" onclick="fb.logout(); return false;">Salir</a></p>';//para cerrar sesión
        document.getElementById("conectar_facebook").innerHTML = html;
    } else {
      alert("No se pudo identificar al usuario");
    }
   })
  };
 
// Funcion para publicar un mensaje en tu muro
    var publish = function () {
 
 
     //capturamos variables del formulario
 
 
    //var mensaje = wEditor.entradilla_form.value;  IE
    var mensaje = "";
    	
    // var imagen  = wEditor.imagen_form.value;  IE
	var imagen  = document.getElementById('imagen_form').value;
	
    //var linkpag = wEditor.link.value;  IE
	var linkpag =  document.getElementById('link').value;
	
    //var titulo  = wEditor.nombre_form.value;  IE
	var titulo  = document.getElementById('nombre_form').value;
	
    
	//var resumen = wEditor.Text1.value;    IE
	var resumen = document.getElementById('entradilla_form').value;
	
 
 
    fb.publish({
	
 
	//Mensaje que va a aparecer debajo del nombre de perfil
    //  message : "'Humbert’ era el encargado de reclutar y entrenar jóvenes para las bandas criminales en el Meta y Vichada",
	  message : mensaje,
	//Imagen que va a tener la publicacion  
    //  picture : "http://www.ejercito.mil.co/recursos_user/imagenes/2011/Febrero/tehumbert.jpg",
	  picture : "http://www.ejercito.mil.co/recursos_user/imagenes"+imagen,
	//link que referencia a la pagina donde se encuentra la publicación  
    //  link : "http://www.ejercito.mil.co/?idcategoria=276994",
	  link : "http://www.ejercito.mil.co/index.php?idcategoria="+linkpag,
	//titulo que va a tener la publicación en el facebook  
    //  name : "Capturado por el Ejército cabecilla de la banda criminal de ‘Cuchillo’",
      name : titulo,	 
	  
	//Descripción que va a tener la publicación  
    //  description : "Villavicencio. Tropas del Batallón de Ingenieros 7 ´General Carlos Albán´, unidad orgánica de la Séptima Brigada, capturaron al sujeto Carlos Humberto Correa conocido con el alias de ´Teniente Humbert´, importante cabecilla de la banda criminal ´ERPAC´ que lideraba el extinto Pedro Oliveiro Guerrero Castillo, alias ´Cuchillo´. La operación que contó con el apoyo de la Sijin Meta, tuvo lugar en el barrio Suba de la capital de la República, donde gracias a labores de inteligencia militar se logra la captura de este sujeto."
	  description : resumen
	  
    },function(published){ 
      if (published)
       alert("publicado en muro!");
      else
       alert("No ha sido publicado,seguramente porque no esta identificado o no diste permisos");
    }); 
	
   }
 

	</script>
	
	


<!--Template Edición-->
<div id="edicion">

	<?php if ($_smarty_tpl->tpl_vars['subMenuError']->value!=''){?>
		<?php echo $_smarty_tpl->tpl_vars['subMenuError']->value;?>
<br>
	<?php }?>

	<form action="<?php echo $_smarty_tpl->tpl_vars['c_action']->value;?>
" method="POST" enctype="multipart/form-data" name="wEditor" target="_self">
		<table class="mainTable" cellspacing="0" summary="Formulario de Edición">
			<tr>
				<td class="edicion_elemento userInfo">
					<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['nombres'];?>
 <?php echo $_smarty_tpl->tpl_vars['userInfo']->value['apellidos'];?>
 &lt; <?php echo $_smarty_tpl->tpl_vars['userInfo']->value['username'];?>
 &gt;
				</td>
			</tr>
		    <tr>
		    	<td class="edicion_titulo titulo">
		    		<?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>
 [<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
]
		    	</td>
		    </tr>
		    <tr>
		    	<td class="edicion_elemento salvar">
		    		<?php echo $_smarty_tpl->tpl_vars['c_salvar']->value;?>

		    	</td>
		    </tr>
		    <?php if ($_smarty_tpl->tpl_vars['c_submenu']->value!=''){?>
		    <tr>
		    	<td class="edicion_elemento submenu">
		    		<?php echo $_smarty_tpl->tpl_vars['c_submenu']->value;?>

		    	</td>
		    </tr>
			<?php }?>

			<tr>
				<td class="edicion_elemento resaltados">
					<?php echo $_smarty_tpl->tpl_vars['c_formulario_titulo']->value;?>

				</td>
			</tr>

			
			<?php if ($_smarty_tpl->tpl_vars['idcategoria']->value!=232841||$_smarty_tpl->tpl_vars['administrador']->value==true||$_smarty_tpl->tpl_vars['idpadre_form']->value!=''){?>       			
			<tr>
				<td>
					<table class="secondaryTable text-left" cellspacing="0" summary="">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['campos']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']!=''){?><tr style='background:<?php echo smarty_function_cycle(array('values'=>"#FFFFFF,#F0F7FF"),$_smarty_tpl);?>
'><td class="edicion_elemento nombreCampo"><?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['clase']=="requerido"){?><strong style="color:blue;"><?php }?><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
<?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['clase']=="requerido"){?></strong><?php }?></td><td class="edicion_elemento"><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
</td></tr><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
<?php }?>
						<?php endfor; endif; ?>
					</table>
				</td>
			</tr>
			<?php }?>
					
			<tr>
				<td class="edicion_elemento salvar">
					<?php echo $_smarty_tpl->tpl_vars['c_salvar']->value;?>

				</td>
			</tr>
			<tr>
				<td class="edicion_elemento salvar">
					<?php echo $_smarty_tpl->tpl_vars['c_micrositios']->value;?>

				</td>
			</tr>
		</table>
	</form>
	<div><?php echo $_smarty_tpl->tpl_vars['c_version']->value;?>
</div>
</div>
<?php if ($_smarty_tpl->tpl_vars['iddisplay_form']->value!=22){?>

</div>
</div>
<?php }?>

<!--Fin Template Edición-->

<?php }} ?>