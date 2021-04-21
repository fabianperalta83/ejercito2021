<?

if (!isset($_SESSION['PHP_AUTH_USER']) || !isset($_SESSION['PHP_AUTH_PW'])){
	header("Location: ?idcategoria="._SLOGIN."&cat_origen=".$idcategoria."&archivo_origen=".basename($_SERVER['PHP_SELF'])."&msg=".urlencode(_ROT_PAGINA_RESTRINGIDA));
	exit;
} else {
	$usuario = $_SESSION['PHP_AUTH_USER'];
	$query   = sprintf("select * from %s where username='%s'",_TBLUSUARIO,$usuario);
	$result  = $db["ejecutar"]($query);
	$row     = $db["fetch_object"]($result);
	if (!($_SESSION['PHP_AUTH_PW'] != '' && $_SESSION['PHP_AUTH_PW'] == $row->password)){
		$mensaje = urlencode(_ROT_PAGINA_RESTRINGIDA);
		header("Location: ?idcategoria="._SLOGIN."&cat_origen=".$idcategoria."&archivo_origen=".basename($_SERVER['PHP_SELF'])."&msg=".$mensaje);
		exit;
	}elseif($row->activo==0){
		$mensaje = urlencode("Su cuenta no ha sido activada, si no recibió el mensaje de activación junto con su contraseña deberá registrarse nuevamente <a href=index.php?idcategoria="._SREGISTRO."><b>aqui</b></a>");
		header("Location: ?idcategoria="._SLOGIN."&cat_origen=".$idcategoria."&archivo_origen=".basename($_SERVER['PHP_SELF'])."&msg=".$mensaje);
		exit;
	}
}

$smarty = new Smarty_Plantilla;

$pagina = basename($_SERVER['PHP_SELF']);
$pagina .= sprintf("?idcategoria=%s",$idcategoria);

// Titulo de la página
$c_titulo = BuscarNombre($idcategoria);

$smarty->assign('c_titulo',$c_titulo);

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	Preload();
}

$idusuario_form         = (isset($GLOBALS['idusuario_form']))        ?$GLOBALS['idusuario_form']:"";
$username_form          = (isset($GLOBALS['username_form']))         ?$GLOBALS['username_form']:"";
$password1_form         = (isset($GLOBALS['password1_form']))        ?$GLOBALS['password1_form']:"";
$password2_form         = (isset($GLOBALS['password2_form']))        ?$GLOBALS['password2_form']:"";
$nombre_form            = (isset($GLOBALS['nombre_form']))           ?$GLOBALS['nombre_form']:"";
$apellido_form          = (isset($GLOBALS['apellido_form']))         ?$GLOBALS['apellido_form']:"";
$email_form             = (isset($GLOBALS['email_form']))            ?$GLOBALS['email_form']:"";
$telefono_form          = (isset($GLOBALS['telefono_form']))         ?$GLOBALS['telefono_form']:"";
$direccion_form         = (isset($GLOBALS['direccion_form']))        ?$GLOBALS['direccion_form']:"";
$ciudad_form            = (isset($GLOBALS['ciudad_form']))           ?$GLOBALS['ciudad_form']:"";

//$pais_form              = (isset($GLOBALS['pais_form']))             ?$GLOBALS['pais_form']:"";

$profesion_form         = (isset($GLOBALS['profesion_form']))        ?$GLOBALS['profesion_form']:"";
$correo_form            = (isset($GLOBALS['correo_form']))           ?$GLOBALS['correo_form']:"";
$empresa_form           = (isset($GLOBALS['empresa_form']))          ?$GLOBALS['empresa_form']:"";
$comenta_form     		= (isset($GLOBALS['comenta_form']))    		 ?$GLOBALS['comenta_form']:"";
$foto_form 				= (isset($GLOBALS['foto_form']))    		 ?$GLOBALS['foto_form']:"";
//   $telefono_empresa_form  = (isset($GLOBALS['telefono_empresa_form'])) ?$GLOBALS['telefono_empresa_form']:"";
//   $direccion_empresa_form = (isset($GLOBALS['direccion_empresa_form']))?$GLOBALS['direccion_empresa_form']:"";

$cargo_form             = (isset($GLOBALS['cargo_form']))            ?$GLOBALS['cargo_form']:"";
$eventos_form           = (isset($GLOBALS['eventos_form']))          ?$GLOBALS['eventos_form']:"";

//   $actividad_empresa_form = (isset($GLOBALS['actividad_empresa_form']))?$GLOBALS['actividad_empresa_form']:"";

$validacion = (isset($GLOBALS['validacion']))?$GLOBALS['validacion']:"";

if (!$username_form)  {  $error[] =  _ROT_REGISTRO_USERNAME_ERROR;  }
if (!$password1_form) {  $error[] =  _ROT_REGISTRO_PASSWORD_ERROR1;  }
if (!$password2_form) {  $error[] =  _ROT_REGISTRO_PASSWORD_ERROR2;  }
if ($password1_form != $password2_form) {  $error[] =  _ROT_REGISTRO_PASSWORD_ERROR3;  }

if (!$nombre_form)    {  $error[] =  _ROT_REGISTRO_NOMBRE_ERROR;  }
//     if (!$apellido_form)  {  $error[] =  _ROT_REGISTRO_APELLIDO_ERROR;  }
if (!$email_form)     {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR1;  }
if (!$ciudad_form)            {  $error[] =  _ROT_REGISTRO_CIUDAD_ERROR;  }
/**
if (!$empresa_form)   {  $error[] =  _ROT_REGISTRO_EMPRESA_ERROR;  }
if (!$telefono_empresa_form)   {  $error[] =  _ROT_REGISTRO_TELEFONO_ERROR;  }     

if (!$direccion_empresa_form) {  $error[] =  _ROT_REGISTRO_DIRECCION_ERROR;  }
if (!$pais_form)              {  $error[] =  _ROT_REGISTRO_PAIS_ERROR;  }
*/
if ($email_form && !isEmail($email_form)) {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR2;  }

if (!VerificaUsuario($username_form,$idusuario_form))  {  $error[] =  _ROT_REGISTRO_EXISTENTE2;  }

if(isset($error)){
	$total_errores = count($error);
} else {
	$total_errores = 0;
}

if ($_SERVER['REQUEST_METHOD']=="POST" && $total_errores){
	$smarty1 = new Smarty_Plantilla;
	$smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
	$smarty1->assign('tipo'      ,"error");
	$smarty1->assign('elementoMenu',$error);
	$show = $smarty1->fetch('tpl_display_mensaje.html');
	$smarty->assign('subMenuError',$show);
}

if (!$total_errores && $_SERVER['REQUEST_METHOD']=="POST") {

	$query  = sprintf("update %s ",_TBLUSUARIO);
	$query .= sprintf("set username='%s', password='%s', nombres='%s', apellidos='%s' ",
	$username_form,
	$password1_form,
	$nombre_form,
	$apellido_form
	);
	
	$query .= sprintf(",email='%s',telefono='%s',direccion='%s',correo='%s',profesion='%s',comentario='%s',ciudad='%s',cargo='%s' ",
	$email_form,
	$telefono_form,
	$direccion_form,
	$correo_form,
	$profesion_form,
	$comenta_form,
	$ciudad_form,
	$cargo_form
	);
	
	/*        $query .= sprintf(",email='%s', telefono='%s', direccion='%s', ciudad='%s', pais='%s', correo='%s', empresa='%s' ",
	$email_form,
	$telefono_form,
	$direccion_form,
	$ciudad_form,
	$pais_form,
	$correo_form,
	$empresa_form
	);*/
	/*        $query .= sprintf(",empresaTelefono='%s',empresaDireccion='%s',cargo='%s',profesion='%s',empresaActividad='%s' ",
	$telefono_empresa_form,
	$direccion_empresa_form,
	$cargo_form,
	$profesion_form,
	$actividad_empresa_form
	);
	*/
	
	$query .= sprintf("where idusuario='%s'",$idusuario_form);
	$result = $db["ejecutar"]($query);
	
	// Buscamos los registros a los eventos actuales
	$query_prev   = sprintf("select * from %s ", _TBLDETALLELISTA);
	$query_prev  .= sprintf("where idusuario = %s",$idusuario_form);
	$result_prev  = $db["ejecutar"]($query_prev);

	// Creamos un array con esos eventos
	$result_prev_original[] = '';           // Inicializamos la variable por si acaso no encontramos ningun registro
	while($row_or = $db['fetch_object']($result_prev)){
		$result_prev_original[] = $row_or->idlista;
	}

	// Actualizacion de los accesos
	$query0   = sprintf("delete from %s ", _TBLDETALLELISTA);
	$query0  .= sprintf("where idusuario = %s",$idusuario_form);
	$result0  = $db["ejecutar"]($query0);

	if(is_array($eventos_form) && count($eventos_form) > 0){

		$nuevo_registro = array_diff($eventos_form,$result_prev_original);
		rsort($nuevo_registro);
		sort($nuevo_registro);
		if(count($nuevo_registro)){
			$para   = _EMAIL;
			//            $para   = "gerente@cable.net.co";
			$de     = $email_form;
			$asunto = "Notificación pre-registro a evento";
			$msg    = sprintf("El usuario con los siguientes datos:\n\nNombres: %s\n\nApellidos: %s\n\nCódigo: %s\n\nEmail: %s\n\nTeléfono: %s\n\nCiudad: %s\n\nSe preregistro al(los) siguiente(s) evento(s):\n"
			,$nombre_form
			,$apellido_form
			,$idusuario_form
			,$email_form
			,$telefono_form
			,$ciudad_form
			);

		}

		//          print_r($nuevo_registro);

		for($j = 0 ; $j < count($nuevo_registro) ; $j++){
			$nombre_evento = BuscarNombreEvento($nuevo_registro[$j]);
			$msg .= "\n\t\t".$nombre_evento;
		}

		if(isset($msg)){
			//             printf("Para: %s<br>De: %s<br>Asunto: %s<br> Msg:%s<br>",$para,$de,$asunto,$msg);
			microsmail($para,$asunto,$msg,sprintf("From:%s",$de),'micuenta.php','1');
		}
		for($i = 0 ; $i < count($eventos_form) ; $i++){
			$query1   = sprintf("insert into %s ", _TBLDETALLELISTA);
			$query1  .= sprintf("(idlista,idusuario) values ");
			$query1  .= sprintf("(%s,%s)",$eventos_form[$i],$idusuario_form);
			$result1  = $db["ejecutar"]($query1);
		}
	}
	
	//Si viene foto, la procesamos...
	if (isset($_FILES['fotoChino']['name']) and !empty($_FILES['fotoChino']['name'])) {
		
		/**
		 * Verificamos las extension del archivo para permitir o no la carga
		 */
		$partsFile = pathinfo($_FILES['fotoChino']['name']);
		
		$extAllowed = array('jpg', 'png', 'gif');
		$nombresChino = explode(' ', $nombre_form);
		
		if (in_array(strtolower($partsFile['extension']), $extAllowed)) {
			$dirImages = 'recursos_user/imagenes/lancitas/ninos';
			
			/**
			 * Vemos que el directorio de imágenes de chinos exista
			 */
			if (!is_dir($dirImages)) { 
				mkdir($dirImages, 0755);
			}
			
			/**
			 * Vemos que el directorio para el chino exista
			 */
			$dirChino = $dirImages . '/' . strtolower($nombresChino[0]{0}) . strtolower($nombresChino[0]{1});
			if (!is_dir($dirChino)) {
				mkdir($dirChino, 0755);
			}
			
			$nombreArchivo = str_replace(" ", "_", Removeaccents($nombresChino[0])) . '_' . $idusuario_form . "." . $partsFile['extension'];
			
			if (!copy($_FILES['fotoChino']['tmp_name'], $dirChino . "/" . $nombreArchivo)) {
				$error[] = "No se pudo subir debido a problemas de Permisos. ";
			} else {
				/**
				 * Le cambiamos los permisos al archivo
				 */
				chmod($dirChino . "/" . $nombreArchivo, 0755);
				updateUserFoto($idusuario_form, $dirChino . "/" . $nombreArchivo);
				$foto_form = $dirChino . "/" . $nombreArchivo;
			}
		} else {
			array_push($error, "No tiene permitido subir archivos con extension '".$partsFile['extension']."'. ");
		}
	} 
	

	$_SESSION['PHP_AUTH_USER'] = $username_form;
	$_SESSION['PHP_AUTH_PW']   = $password1_form;

	$mensaje[] = _ROT_REGISTRO_EXITO;
	$smarty2 = new Smarty_Plantilla;
	$smarty2->assign('rotMensaje',_ROT_MICUENTA_ACTUALIZACION);
	$smarty2->assign('tipo'      ,"exito");
	$smarty2->assign('elementoMenu',$mensaje);
	$show = $smarty2->fetch('tpl_display_mensaje.html');
	$smarty->assign('subMenuError',$show);

}

$smarty->assign('c_action'           ,$pagina);
$smarty->assign('c_formulario_titulo',_ROT_MICUENTA);

$campo['nombre'] = "<b>Información Personal</b>";
$campo['clase']  = "requerido";
$campo['input']  = "";
$campos[] = $campo;

$campo['nombre'] = "";
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=hidden name=idusuario_form value='%s' class='tpl_input_edicion_requerido'>",$idusuario_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_USERNAME;
$campo['clase']  = "requerido";
$campo['input']  = sprintf("<input type=text name=username_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$username_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_PASSWORD1;
$campo['clase']  = "requerido";
$campo['input']  = sprintf("<input type=password name=password1_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$password1_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_PASSWORD2;
$campo['clase']  = "requerido";
$campo['input']  = sprintf("<input type=password name=password2_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$password2_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_NOMBRE;
$campo['clase']  = "requerido";
$campo['input']  = sprintf("<input type=text name=nombre_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$nombre_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_APELLIDO;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=apellido_form size=35 value='%s' class='tpl_input_edicion'>",$apellido_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_EMAIL;
$campo['clase']  = "requerido";
$campo['input']  = sprintf("<input type=text name=email_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$email_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_TELEFONO;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=telefono_form size=35 value='%s' class='input1'>",$telefono_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_DIRECCION;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=direccion_form size=35 value='%s' class='input1'>",$direccion_form);
$campos[] = $campo;

$campo['nombre'] = 'Colegio / Profesión: ';
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=profesion_form size=35 value='%s' class='input1'>",$profesion_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_CIUDAD;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=ciudad_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$ciudad_form);
$campos[] = $campo;

$campo['nombre'] = 'Foto: ';
$campo['clase']  = "opcional";
$campo['input']  = "<input type=file name=fotoChino size=35 class='input1'>";
$campos[] = $campo;

$campo['nombre'] = 'Comentarios: ';
$campo['clase']  = "opcional";
$campo['input']  = "<textarea name=comenta_form cols=\"30\" rows=\"8\" class='input1'>" . $comenta_form . "</textarea>";
$campos[] = $campo;

/**
$campo['nombre'] = _ROT_REGISTRO_CORREO;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=checkbox name=correo_form value=1 %s>",sprintf(($correo_form)?"checked":""));   
$campos[] = $campo;

$campo['nombre'] = "<b>Información de la Empresa</b>";
$campo['clase']  = "requerido";
$campo['input']  = "";
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_EMPRESA;
$campo['clase']  = "requerido";
$campo['input']  = sprintf("<input type=text name=empresa_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$empresa_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_EMPRESA_ACTIVIDAD;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=actividad_empresa_form size=35 value='%s' class='input1'>",$actividad_empresa_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_TELEFONO_EMPRESA;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=telefono_empresa_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$telefono_empresa_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_DIRECCION;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=direccion_empresa_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$direccion_empresa_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_PAIS;
$campo['clase']  = "";
if ($pais_form == "") $pais_form = "Colombia";
$campo['input']  = sprintf("<input type=text name=pais_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$pais_form);
$campos[] = $campo;


$campo['nombre'] = _ROT_REGISTRO_CARGO;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=cargo_form size=35 value='%s' class='input1'>",$cargo_form);
$campos[] = $campo;

$campo['nombre'] = "Información Adicional";
$campo['clase']  = "";
$campo['input']  = "";
$campos[] = $campo;
*/

$campo['nombre'] = 'Esta es la foto que nos mandaste:';
$campo['clase']  = "";
$campo['input']  = CrearCheckEventos($idusuario_form);



if (!empty($foto_form)) {
	$campo['input']  .= '<img src="' . $foto_form . '" border=0>';
} else {
	$campo['input']  .= '¡No has enviado la foto!';
}

$campos[] = $campo;

$smarty->assign('campos',$campos);

return $smarty->fetch('tpl_micuenta.html');

function VerificaUsuario($username_form,$idusuario_form){

	$db = $GLOBALS['db'];
	$query  = sprintf("select * from %s where username = '%s' and idusuario != %s"
	,_TBLUSUARIO
	,$username_form
	,$idusuario_form);
	$result = $db["ejecutar"]($query);
	if ($db["num_rows"]($result)) {
		return 0;
	} else {
		return 1;
	}
}

function updateUserFoto($user, $picture) {
	if ($user && $picture) {
		$db = $GLOBALS['db'];
		$query  = 'UPDATE ejercito_usuario SET foto = \'' . $picture . '\'  WHERE idusuario = ' . $user;
		$result = $db["ejecutar"]($query);
	}
}


function Preload(){

	$db = $GLOBALS['db'];

	//      $_SESSION['PHP_AUTH_USER'] = $_POST['usuario'];
	//      $_SESSION['PHP_AUTH_PW']   = $_POST['password'];

	$query  = sprintf("select * from %s where username = '%s' and password = '%s'"
	,_TBLUSUARIO
	,$_SESSION['PHP_AUTH_USER']
	,$_SESSION['PHP_AUTH_PW']);

	$result = $db["ejecutar"]($query);

	if ($db["num_rows"]($result)) {
		$row  = $db["fetch_object"]($result);
		$idusuario_form =$row->idusuario;
		$username_form  =$row->username;
		$password1_form =$row->password;
		$password2_form =$row->password;
		$nombre_form    =$row->nombres;
		$apellido_form  =$row->apellidos;
		$email_form     =$row->email;
		$telefono_form  =$row->telefono;
		$direccion_form =$row->direccion;
		$ciudad_form    =$row->ciudad;
		$pais_form      =$row->pais;
		$profesion_form =$row->profesion;
		$correo_form    =$row->correo;
		$empresa_form   =$row->empresa;
		$comenta_form   =$row->comentario;
		$foto_form   	=$row->foto;
		//                  $telefono_empresa_form = $row->empresaTelefono;
		//                  $direccion_empresa_form = $row->empresaDireccion;
		$cargo_form     = $row-> cargo;
		//                  $actividad_empresa_form = $row->empresaActividad;

		//                  $nombre_pago_form    =$row->pagoNombres;
		//                  $apellido_pago_form  =$row->pagoApellidos;
		//                  $cargo_pago_form     =$row->pagoCargo;
		//                  $email_pago_form     =$row->pagoEmail;
		//                  $telefono_pago_form  =$row->pagoTelefono;
		//                  $fax_pago_form       =$row->pagoFax;
		//                  $direccion_pago_form =$row->pagoDireccion;
		//                  $ciudad_pago_form    =$row->pagoCiudad;

	}

	$GLOBALS['idusuario_form'] = $idusuario_form;
	$GLOBALS['username_form']  = $username_form;
	$GLOBALS['password1_form'] = $password1_form;
	$GLOBALS['password2_form'] = $password2_form;
	$GLOBALS['nombre_form']    = $nombre_form;
	$GLOBALS['apellido_form']  = $apellido_form;
	$GLOBALS['email_form']     = $email_form;
	$GLOBALS['telefono_form']  = $telefono_form;
	$GLOBALS['direccion_form'] = $direccion_form;
	$GLOBALS['ciudad_form']    = $ciudad_form;
	$GLOBALS['pais_form']      = $pais_form;
	$GLOBALS['profesion_form'] = $profesion_form;
	$GLOBALS['correo_form']    = $correo_form;
	$GLOBALS['empresa_form']   = $empresa_form;
	$GLOBALS['comenta_form']   = $comenta_form;
	$GLOBALS['foto_form']      = $foto_form;
	//   $GLOBALS['telefono_empresa_form']   = $telefono_empresa_form;
	//   $GLOBALS['direccion_empresa_form']  = $direccion_empresa_form;
	$GLOBALS['cargo_form']     = $cargo_form;
	//   $GLOBALS['actividad_empresa_form']   = $actividad_empresa_form;

	/*   $GLOBALS['nombre_pago_form']   = $nombre_pago_form;
	$GLOBALS['apellido_pago_form'] = $apellido_pago_form;
	$GLOBALS['cargo_pago_form']    = $cargo_pago_form;
	$GLOBALS['email_pago_form']    = $email_pago_form;
	$GLOBALS['telefono_pago_form'] = $telefono_pago_form;
	$GLOBALS['fax_pago_form']      = $fax_pago_form;
	$GLOBALS['direccion_pago_form']= $direccion_pago_form;
	$GLOBALS['ciudad_pago_form']   = $ciudad_pago_form;
	*/
}
function CrearCheckEventos($idusuario_form){
	//Fix para Lancita
	return '<input type=hidden name=eventos_form[] value=25>';
	//Fin fix Lancita

	$db        = $GLOBALS['db'];
	$query     = sprintf("select * from %s where autoregistro = 1 order by nombre", _TBLLISTAS);
	$result    = $db["ejecutar"]($query);

	$query1     = sprintf("select * from %s where idusuario = %s", _TBLDETALLELISTA, $idusuario_form);
	$result1    = $db["ejecutar"]($query1);
	$checks = '';
	if (0     != $db["num_rows"]($result)){
		$checks   = "<table border=0 cellpadding=0 cellspacing=0 align=left  class='index_entradilla'>";
		while (($row = $db["fetch_object"]($result))){
			$tmp_check = '';
			if (0 != $db["num_rows"]($result1)){
				while (($row1 = $db["fetch_object"]($result1))){
					if($row->idlista == $row1->idlista){
						$tmp_check = 'checked';
					}
				}
				$db['data_seek']($result1,0);
			}
			$checks  .= sprintf("<tr><td><input type=checkbox name=eventos_form[] value=%s %s></td><td class='tpl_migas'>%s</td></tr>",$row->idlista,$tmp_check,$row->nombre);
		}
		$checks  .= "</table>";
	}
	return $checks;
}
function BuscarNombreEvento($idlista){
	$db        = $GLOBALS['db'];
	$query     = sprintf("select * from %s where idlista = %s", _TBLLISTAS,$idlista);
	$result    = $db["ejecutar"]($query);
	$row       = $db["fetch_object"]($result);
	return $row->nombre;
}
?>
