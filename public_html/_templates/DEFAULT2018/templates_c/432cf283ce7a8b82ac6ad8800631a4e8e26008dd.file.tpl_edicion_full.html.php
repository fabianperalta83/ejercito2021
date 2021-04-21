<?php /* Smarty version Smarty-3.1.8, created on 2021-03-05 13:48:34
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_edicion_full.html" */ ?>
<?php /*%%SmartyHeaderCode:337199298604236b2261397-01721421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '432cf283ce7a8b82ac6ad8800631a4e8e26008dd' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_edicion_full.html',
      1 => 1614201375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '337199298604236b2261397-01721421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subMenuError' => 0,
    'c_action' => 0,
    'userInfo' => 0,
    'idcategoria' => 0,
    'c_titulo' => 0,
    'c_salvar' => 0,
    'campos' => 0,
    'c_formulario_titulo' => 0,
    'administrador' => 0,
    'idpadre_form' => 0,
    'c_submenu' => 0,
    'path' => 0,
    'iddisplay_form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_604236b22c2f02_71764530',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_604236b22c2f02_71764530')) {function content_604236b22c2f02_71764530($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/function.cycle.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>

<style>
	.progress-bar {
	    text-indent: 0!important;
	}
	.file-thumb-progress.kv-hidden div.progress, .file-thumb-progress.kv-hidden div.progress-bar{
		height: 15px!important;
	}
	.file-upload-indicator{
		margin-bottom: 5px!important;
	}
	.krajee-default .file-footer-caption {
	    margin-bottom: 25px!important;
	}
	div.kv-fileinput-error.file-error-message ul{
		list-style: initial;
		padding-left: 10px;
	}
</style>
	
	<script src="js/tinymce/tinymce.min.js"></script>

	<script type="text/javascript" src="js/preview.js"></script>

	<script type="text/javascript" src="_lib/image_manager/assets/dialog.js"></script>
	<script type="text/javascript" src="_lib/image_manager/IMEStandalone.js"></script>

	<!-- Calendario -->
	<script type="text/javascript" src="_lib/jscalendar/calendar.js"></script>

	<!-- language for the calendar -->
	<script type="text/javascript" src="_lib/jscalendar/lang/calendar-es.js"></script>
	<!-- the following script defines the Calendar.setup helper function, which makes adding a calendar a matter of 1 or 2 lines of code. -->
	<script type="text/javascript" src="_lib/jscalendar/calendar-setup.js"></script>

	<style type="text/css">
		@import url("_lib/jscalendar/calendar-win2k-1.css");        
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
	
	<!-- **************** JAVASCRIPT PUBLICAR REDES SOCIALES **************************** -->
									   
	<script type="text/javascript">
		// Cuando la pagina carga miramos si ya hay un usuario identificado.
	    fb.ready(function(){ 
	       if (fb.logged)
	       {
	          // Cambiamos el link de identificarse por el nombre y la foto del usuario.
	          html = "<p style='background-position:center'><strong>Bienvenido:</strong> " + fb.user.name + "</p>";
	          html += '<p style=background-position:center><img src="' + fb.user.picture + '"  alt="" /></p>';
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
	        html += "<p style='background-position:center'><img src='" + fb.user.picture + "'  alt=""/></p>";
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


	<!-- carga masiva -->
	<link href="js/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	<script src="js/bootstrap-fileinput/js/plugins/piexif.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-fileinput/js/fileinput.min.js"></script>
	<!-- <script src="js/bootstrap-fileinput/themes/fa/theme.min.js"></script> -->
	<script src="js/bootstrap-fileinput/js/locales/es.js"></script>
	<!-- soporte a objetos promise IE -->
	<script src="js/bootstrap-fileinput/js/plugins/polyfill.min.js"></script>




<!--Template Edición-->
<div id="edicion" style="z-index:9">

	<!--<div class="tab">
	  <button class="tablinks" onclick="openCity(event, 'London')">London</button>
	  <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
	  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
	</div>

	<div id="London" class="tabcontent">
	  <h3>London</h3>
	  <p>London is the capital city of England.</p>
	</div>

	<div id="Paris" class="tabcontent">
	  <h3>Paris</h3>
	  <p>Paris is the capital of France.</p> 
	</div>

	<div id="Tokyo" class="tabcontent">
	  <h3>Tokyo</h3>
	  <p>Tokyo is the capital of Japan.</p>
	</div>-->

	<?php if ($_smarty_tpl->tpl_vars['subMenuError']->value!=''){?>
		<?php echo $_smarty_tpl->tpl_vars['subMenuError']->value;?>
<br>
	<?php }?>

	<form action="<?php echo $_smarty_tpl->tpl_vars['c_action']->value;?>
" method="POST" enctype="multipart/form-data" name="wEditor" target="_self">
		<table class="mainTable" cellspacing="0" summary="Formulario de Edición" style="width:100%;margin-top: -20px;">
			<tr style="background: white; ">
				<td>
				<div class="" style="background: white; position:absolute;">
					NOMBRE: <?php echo $_smarty_tpl->tpl_vars['userInfo']->value['nombres'];?>
 <?php echo $_smarty_tpl->tpl_vars['userInfo']->value['apellidos'];?>

				</div>

				<div class="" style="background: white; text-align:right;border-right:1px solid #69c;">
					 USUARIO: <?php echo $_smarty_tpl->tpl_vars['userInfo']->value['username'];?>

				</div>
				</td>
			</tr>
		    <tr style="background: white;">
		    	<td class=""  style="background: white; text-align:center;font-size:30px;border-right:1px solid #69c;">
		    		[<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
] <?php echo $_smarty_tpl->tpl_vars['c_titulo']->value;?>

		    	</td>
		    	
		    	

		    </tr>
		    <tr style="background: white;">
		    	<td class="edicion_elemento salvar" style=" text-align:center;border-right:1px solid #69c;">
		    		<?php echo $_smarty_tpl->tpl_vars['c_salvar']->value;?>

		    	</td>
		    </tr>
		    
		    <tr>
		    	<td style=" text-align:center;border-right:1px solid #69c;" >
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
						<?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']!=''){?><?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']!="Restringir a todos los usuarios excepto a:"){?><tr style='background:<?php echo smarty_function_cycle(array('values'=>"#FFFF,#FFFF"),$_smarty_tpl);?>
'><td class="" style="background: white;text-align:right;"><?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['clase']=="requerido"){?><strong><?php }?><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
<?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['clase']=="requerido"){?></strong><?php }?></td><td class="edicion_elemento" ><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
</td></tr><?php }?><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
<?php }?>
						<?php endfor; endif; ?>
					</table>
				</td>

				
		    </tr>
			

			<tr>
				<td class="" style="text-align:center; border-right:1px solid #69c;" colspan="2">
					<?php echo $_smarty_tpl->tpl_vars['c_formulario_titulo']->value;?>

				</td>
			</tr>

			
			<?php if ($_smarty_tpl->tpl_vars['idcategoria']->value!=232841||$_smarty_tpl->tpl_vars['administrador']->value==true||$_smarty_tpl->tpl_vars['idpadre_form']->value!=''){?>








			<tr>
				<?php if ($_smarty_tpl->tpl_vars['c_submenu']->value!=''){?>
		    		<td rowspan="1" class="  submenu" style="background: white; border-right:1px solid #69c;">
		    		<?php echo $_smarty_tpl->tpl_vars['c_submenu']->value;?>

		    		</td>

		    	<?php }else{ ?>
		    		<td rowspan="1" class=" submenu" style="background: white; border-right:1px solid #69c;">
		    		
		    		</td>
		    	<?php }?>
			</tr>





	        <div class="clearfix"></div>


			<div style="padding: 10px;" onload="myFunction7()">
				<div class="panel-group" id="accordion_carga" role="tablist" aria-multiselectable="true">

					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="head_load">
					      <h4 class="panel-title">
					        <a role="button" data-toggle="collapse" data-parent="#accordion_carga" href="#upload_origin" aria-expanded="false" aria-controls="upload_origin">
					          <i class="fa fa-upload"></i>  Carga y creación masiva de contenido
					        </a>
					      </h4>
					    </div>
					    <div id="upload_origin" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head_load">
					      <div class="panel-body">


							<div style="padding: 10px;">
				                <div class="file-loading">
				                    <input placeholder="Seleccione los archivos..." id="input-file" name="anexos[]" type="file" multiple accept="image/*,.pdf,.doc,.docx,.xls,.xlsx,.mp3,.mp4,.flv,.ppt,.pptx">
				                </div>
				                <div id="errorBlock" class="help-block"></div>
				            </div>


					      </div>
					    </div>
					  </div>

					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="head_setup">
					      <h4 class="panel-title">
					        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#upload_setup" aria-expanded="false" aria-controls="upload_setup">
					          <i class="fa fa-cog"></i>  Opciones avanzadas carga masiva
					        </a>
					      </h4>
					    </div>
					    <div id="upload_setup" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head_setup">
					      <div class="panel-body">


							<form>
								<!-- <div class="form-group">
								    <label for="up_separator">Caracter separador</label>
								    <select name="up_separator" id="up_separator" class="form-control">
								    	<option value="_" selected>_ (Guión_bajo)</option>
								    	<option value="-">- (Guión-medio)</option>
								    </select>
								  </div> -->

								<div class="form-group">
								    <label for="up_path">Sus archivos se guardarán en:</label>
								    <div id="up_preview_path" class="well well-sm"><?php echo $_smarty_tpl->tpl_vars['path']->value;?>
</div>
								    <input type="hidden" class="form-control" id="up_path" name="up_path" placeholder="Carpeta destino" value="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
" readonly="readonly">
								  </div>

								<!-- <label for="up_path_user">Cambiar carpeta destino</label>
								<div class="input-group">
							      <input type="text" class="form-control" id="up_path_user" name="up_path_user" placeholder="Carpeta destino" value="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
">
							      <span class="input-group-btn">
							        <button class="btn btn-default" id="up_btn_change" type="button">Cambiar</button>
							      </span>
							    </div>
							    <div class="clearfix">&nbsp;</div> -->

							  <p>Proceso con archivos existentes:</p>
							  <div class="checkbox">
							    <label>
							      <input type="radio" name="up_rewrite" value="stop" checked> Informar sobre existentes (no sobreescribir)
							    </label>
							  </div>
						    	<div class="checkbox">
							    <label>
							      <input type="radio" name="up_rewrite" value="rewrite"> Sobre-escribir archivos repetidos
							    </label>
							  </div>
						    	<div class="checkbox">
							    <label>
							      <input type="radio" name="up_rewrite" value="rename"> Renombrar nuevos (+1 al nombre)
							    </label>
							  </div>
							  <p>Limitar contenido dependiendo del "Tipo de las subcategorías":</p>
							  <div class="checkbox">
							    <label>
							      <input type="radio" name="up_force_type" value="all" checked> Admitir todos los tipos de archivo posibles
							    </label>
							  </div>
							  <div class="checkbox">
							    <label>
							      <input type="radio" name="up_force_type" value="force" > Admitir únicamente los tipos del campo "Tipo de Subcategorías"
							    </label>
							  </div>
						    	
							  <!-- <div class="checkbox">
							    <label>
							      <input type="checkbox" name="up_rename" id="up_rename" checked="checked"> Ajustar nombres de archivos
							    </label>
							  </div> -->
							</form>


					      </div>
					    </div>
					  </div>
					  



					</div>


			</div>

	        <div class="clearfix"></div>





			<?php }?>
				



			<tr>
				<td class="edicion_elemento salvar" colspan="6" style="border-bottom:1px solid #69c">
					<?php echo $_smarty_tpl->tpl_vars['c_salvar']->value;?>

				</td>
			</tr>
			


			

			

			
		</table>
	</form>
	<div></div>
</div>
<?php if ($_smarty_tpl->tpl_vars['iddisplay_form']->value!=22){?>

</div>
</div>
<?php }?>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>






<script>
		

	// carga y creacion masiva
	$(document).ready(function($) {
		// var krajeeGetCount = function(id) {
	 //        var cnt = $('#' + id).fileinput('getFilesCount');
	 //        console.log(cnt);
	 //        return cnt === 0 ? 'No hay archivos para adjuntar.' :
	 //            'Hay ' +  cnt + ' archivo' + (cnt > 1 ? 's' : '') + ' para adjuntar.';
	 //    };
		$("#input-file")
			.fileinput({
				hideThumbnailContent: true,
				// allowedPreviewTypes: ['image'],
				previewFileIcon: '<i class="fa fa-file"></i>',
				previewFileIconSettings: { // configure your icon file extensions
			        'mp4': '<i class="fa fa-file-video-o text-primary"></i>',
			        'mp3': '<i class="fa fa-file-audio-o text-primary"></i>',
			        'doc': '<i class="fa fa-file-word-o text-primary"></i>',
			        'docx': '<i class="fa fa-file-word-o text-primary"></i>',
			        'xls': '<i class="fa fa-file-excel-o text-success"></i>',
			        'xlsx': '<i class="fa fa-file-excel-o text-success"></i>',
			        'ppt': '<i class="fa fa-file-powerpoint-o text-success"></i>',
			        'pptx': '<i class="fa fa-file-powerpoint-o text-success"></i>',
			        'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
			        'jpg': '<i class="fa fa-file-photo-o text-danger"></i>', 
			        'jpeg': '<i class="fa fa-file-photo-o text-info"></i>', 
			        'gif': '<i class="fa fa-file-photo-o text-warning"></i>', 
			        'png': '<i class="fa fa-file-photo-o text-primary"></i>'    
			    },
				autoOrientImage: false,
				showClose: false,
				previewFileType: false,
				msgPlaceholder: "Seleccione o arrastre los archivos...",
				// showCaption: false, 
				// dropZoneEnabled: false,
			    // showPreview: false,
			    // showUpload: true,
			    // required: false,
			    language: "es",
			    // theme: "fa",
			    // msgSizeTooLarge: "File {name} ("+parseInt("{size}")+" Mb) exceeds maximum allowed upload size of "+parseInt("{maxSize}")+" Mb. Please retry your upload!",
			    uploadUrl: "tools/upload.php?add",
			    // deleteUrl: "tools/helpdesk/upload.php?del",
			    // deleteExtraData: {
			    //             'test': 'testingvar',
			    //         },
		        uploadExtraData: function(previewId, index) {
		            return {
		            	manual_key: index,
						idCat: <?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
,
		            	up_path: $("#up_path").val(),
						up_separator: $("#up_separator").val(),
						display_sub: $("select[name=iddisplay_sub_form]").val(),
						up_rewrite: $("input[name=up_rewrite]:checked").val(),
						up_force_type: $("input[name=up_force_type]:checked").val()
		            };
		        },
		        // layoutTemplates: {
			        // actionDrag: '',
			        // preview: ''
			    // },
			    // fileactionsettings: {
			    // 	showDrag: false
			    // },
			    
				// uploadAsync: false,
				
				fileActionSettings: {
                        // showRemove: false,
                        // showUpload: false,
                        showZoom: false,
                        // showDrag: false,
                    },
				
		        overwriteInitial: true,
	        	// initialPreviewAsData: true,
			    // showUpload: false, // hide upload button
			    // showRemove: false // hide remove button
		        // uploadExtraData: {session: <?php echo time();?>
},
			 //    uploadExtraData: function(previewId, index) {
				//     return {key: index};
				// },
				
				// validations
			 //    allowedFileExtensions: ["pdf","doc","docx","xls","xlsx","jpg", "jpeg", "png"],
				// maxFilePreviewSize: 1024,
			    maxFileSize: 10240

			    // elErrorContainer: "#errorBlock"
			    // mainClass: "input-group-lg"
			})
			.on('fileerror', function(event, data, msg) {
			   console.log("fileerror");
			   console.log(data.id);
			   console.log(data.index);
			   console.log(data.file);
			   console.log(data.reader);
			   console.log(data.files);
			   // get message
			   console.log(msg);
			})
			// .on('fileuploaderror', function(event, data, msg) {
			//     var form = data.form, files = data.files, extra = data.extra,
			//         response = data.response, reader = data.reader;
			//     console.log('fileuploaderror');
			//     // var li = '<ul><li>'+msg+'</li></ul>';
			//     // console.log(li);
			//     // $("#errorBlock").show().html(li);
			//    // get message
			//    console.log(msg);
			// })
			// .on('filebatchuploaderror', function(event, data, msg) {
			//     var form = data.form, files = data.files, extra = data.extra,
			//         response = data.response, reader = data.reader;
			//     console.log('filebatchuploaderror');
			//    // get message
			//    console.log(msg);
			// })
			.on('filecustomerror', function(event, params, msg) {
			   console.log("filecustomerror");
			   console.log(params.id);
			   console.log(params.index);
			   console.log(params.data);
			   // get message
			   alert(msg);
			})
			.on('fileloaded', function(event, file, previewId, index, reader) {
			    console.log("fileloaded");
			})
			.on('filebatchuploadcomplete', function(event, files, extra) {
			    console.log("filebatchuploadcomplete");
			    console.log(event);
			    console.log(files);
			    console.log(extra);
			})
			.on('filebatchuploadsuccess', function(event, data, previewId, index) {

	            console.log("filebatchuploadsuccess");
	            console.log(event, data, previewId, index);

	        })
			.on("filebatchselected", function(event, files) {
				console.log("filebatchselected");
				console.log(event, files);


			    // $("#input-file").fileinput("upload");
			})
	        .on("filepredelete", function(jqXHR) {
		    	console.log("filepredelete");
		    	console.log(jqXHR);
		        // var abort = true;
		        // if (confirm("Are you sure you want to delete this image?")) {
		        //     abort = false;
		        // }
		        // return abort; // you can also send any data/object that you can receive on `filecustomerror` event
	        })
	        .on('filebeforedelete', function() {
	        	console.log("filebeforedelete");
		        // return new Promise(function(resolve, reject) {
		        //     $.confirm({
		        //         title: 'Confirmación:',
		        //         content: '¿Realmente desea eliminar este archivo?',
		        //         type: 'red',
		        //         buttons: {   
		        //             eliminar: {
		        //                 btnClass: 'btn-danger text-white',
		        //                 keys: ['enter'],
		        //                 action: function(){
		        //                     resolve();
		        //                 }
		        //             }
		        //             ,
		        //             cancelar: function(){
		        //                 // $.alert('No se ha borrado el archivo! ' + krajeeGetCount('input-file'));
		        //             }
		        //         }
		        //     });
		        // });
		    })
	        .on('filedeleted', function(event, key, jqXHR, data) {
	        	// console.log(event, key, jqXHR, data);
		        // setTimeout(function() {
		        //     $.alert('Archivo eliminado! ' + krajeeGetCount('input-file'));
		        // }, 900);
		    });
	});

	function getNormalizedString(string,delimiter){
		$.ajax({
			url: 'tools/upload.php',
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {normalize: string, delimiter: delimiter},
		})
		.done(function(d,e) {
			console.log("success");
			console.log(d);
			console.log(e);
			$("#up_path").val(d);
			$("#up_preview_path").html(d);
			$("#up_path_user").val(d);
		})
		.fail(function(d,e) {
			console.log("error");
			console.log(d);
			console.log(e);
		})
		.always(function(d,e) {
			// console.log("complete");
		});

	}

	$(document).ready(function($) {
		$(document).on('change', '#up_separator', function(event) {
			getNormalizedString($("#up_path_user").val(), $("#up_separator").val());
		});	
		$(document).on('click', '#up_btn_change', function(event) {
			getNormalizedString($("#up_path_user").val(), $("#up_separator").val());
		});	
	});

</script>


<script>
	function myFunction7() {
  alert("Page is loaded");
}

</script>

<?php }} ?>