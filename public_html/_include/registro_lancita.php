<?
global $sroot; /** @see variables.php */

require_once(_DIRCORE.'Validacion.class.php');
$smarty = new Smarty_Plantilla;

$pagina = basename($_SERVER['PHP_SELF']);
$pagina .= sprintf("?idcategoria=%s",$idcategoria);

// Titulo de la p�gina

$archivo = sprintf("%s/categoria_%s.png",_DIRRECURSOS,$idcategoria);

if (file_exists($archivo)){
	$c_titulo = sprintf("<img src=%s border=0 width=405 height=63 border=0>",$archivo);
}else{
	$c_titulo = Funciones::BuscarNombre($idcategoria);
}

$smarty->assign('c_titulo',$c_titulo);

$emailregistro = (_EMAILREGISTRO)?_EMAILREGISTRO:_EMAIL;

$registro      = basename($_SERVER['PHP_SELF']);
$registro     .= sprintf("?idcategoria=%s",$idcategoria);

$nombre_form      = getVariable('nombre_form');
$apellido_form    = getVariable('apellido_form');
$email_form       = getVariable('email_form');
$preregistro      = getVariable('preregistro');
$eventos_form     = getVariable('eventos_form', array($preregistro));

/**
$empresa_form     = isset($_POST['empresa_form'])    ?$_POST['empresa_form']:"";
$telefono_empresa_form    = isset($_POST['telefono_empresa_form'])   ?$_POST['telefono_empresa_form']:"";
$direccion_empresa_form    = isset($_POST['direccion_empresa_form'])   ?$_POST['direccion_empresa_form']:"";
$ciudad_form      = isset($_POST['ciudad_form'])     ?$_POST['ciudad_form']:"";
$pais_form        = isset($_POST['pais_form'])       ?$_POST['pais_form']:"";
*/
$telefono_form    = getVariable('telefono_form');
$direccion_form   = getVariable('direccion_form');
$cargo_form       = getVariable('cargo_form');


$correo_form      = getVariable('correo_form');
$validacion       = getVariable('validacion');
$valor            = getVariable('valor');

$email2_form      = getVariable('email2_form');
$recordar         = getVariable('recordar');
$captcha         = getVariable('frm_captcha');

global $db;	/** @see variables.php */


if(!$recordar){

	//    if (!$nombre_form)            {  $error[] =  _ROT_REGISTRO_NOMBRE_ERROR;  }
	if (!$nombre_form)            {  $nombre_form = $email_form;  }
	//    if (!$apellido_form)          {  $error[] =  _ROT_REGISTRO_APELLIDO_ERROR;  }
	if (Validacion::isEmpty($email_form))             {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR1;  }
	/**
if (!$empresa_form)           {  $error[] =  _ROT_REGISTRO_EMPRESA_ERROR;  }
if (!$telefono_empresa_form)  {  $error[] =  _ROT_REGISTRO_TELEFONO_ERROR;  }
if (!$direccion_empresa_form) {  $error[] =  _ROT_REGISTRO_DIRECCION_ERROR;  }
if (!$ciudad_form)            {  $error[] =  _ROT_REGISTRO_CIUDAD_ERROR;  }
if (!$pais_form)              {  $error[] =  _ROT_REGISTRO_PAIS_ERROR;  }
*/
	if (!Validacion::isEmpty($email_form) && !Validacion::isEmail($email_form)) {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR2;  }
	if (!Validacion::isCadena($nombre_form, TRUE))    {  $error[] =  _ROT_REGISTRO_NOMBRE_ERROR;  }
	if (!Validacion::isCadena($apellido_form, TRUE))  {  $error[] =  _ROT_REGISTRO_APELLIDO_ERROR;  }
	if (!VerificaUsuario($email_form))        {  $error[] =  _ROT_REGISTRO_EXISTENTE;  }
	if (isset($_SESSION['captcha'])) {
			if ($_SESSION['captcha'] != $captcha) {
				$error[] =  _ROT_REGISTRO_CAPTCHA_ERROR;
				unset($_SESSION['captcha']);
			}}


} else {
	if (Validacion::isEmpty($email2_form))  {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR1;  }
	if (!Validacion::isEmpty($email2_form) && !Validacion::isEmail($email2_form)) {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR2;  }
}

if(isset($error)){
	$total_errores = count($error);
} else {
	$total_errores = 0;
}

if ($_SERVER['REQUEST_METHOD']=="POST" && $total_errores){
	$smarty1 = new Smarty_Plantilla;
	$smarty1->assign('rotMensaje',_ROT_CONTACTO_ADVERTENCIA);
	$smarty1->assign('tipo'      ,"error");
	$smarty1->assign('elementoMenu',$error);
	$show = $smarty1->fetch('tpl_display_mensaje.html');
	$smarty->assign('subMenuError',$show);
}

if ($total_errores) {

	$smarty->assign('c_action'           ,$pagina);
	$smarty->assign('c_formulario_titulo',_ROT_REGISTRO);


	/*************************
	INFORMACION PERSONAL
	*************************/

	$campo['nombre'] = "Informacion Personal";
	$campo['clase']  = "";
	$campo['input']  = "";
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_NOMBRE;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<input type=text name=nombre_form size=35 value='%s' class='input1'>",$nombre_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_APELLIDO;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<input type=text name=apellido_form size=35 value='%s' class='input1'>",$apellido_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_EMAIL;
	$campo['clase']  = "requerido";
	$campo['input']  = sprintf("<input type=text name=email_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$email_form);
	$campos[] = $campo;

	/*$campo['nombre'] = _ROT_REGISTRO_EVENTOS;
	$campo['clase']  = "";
	$campo['input']  = CrearCheckEventos($preregistro,$eventos_form);
	$campos[] = $campo;*/


	/*************************
	INFORMACION EMPRESARIAL
	*************************/
	/**
$campo['nombre'] = "Informaci�n Empresarial";
$campo['clase']  = "requerido";
$campo['input']  = "";
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_EMPRESA;
$campo['clase']  = "requerido";
$campo['input']  = sprintf("<input type=text name=empresa_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$empresa_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_TELEFONO_EMPRESA;
$campo['clase']  = "requerido";
$campo['input']  = sprintf("<input type=text name=telefono_empresa_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$telefono_empresa_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_DIRECCION;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=direccion_empresa_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$direccion_empresa_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_CIUDAD;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=text name=ciudad_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$ciudad_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_PAIS;
$campo['clase']  = "";

if ($pais_form == ""){$pais_form = "Colombia";}
$campo['input']  = sprintf("<input type=text name=pais_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$pais_form);
$campos[] = $campo;

$campo['nombre'] = _ROT_REGISTRO_CORREO;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type=checkbox name=correo_form value=1 %s>",sprintf(($correo_form)?"checked":""));
$campos[] = $campo;
*/

	$smarty->assign('campos',$campos);

	$smarty->assign('c_formulario_titulo2',_ROT_REGISTRO_RECORDAR);

	$campo2['nombre'] = _ROT_REGISTRO_EMAIL;
	$campo2['clase']  = "requerido";
	$campo2['input']  = sprintf("<input type=text name=email2_form size=35 value='%s' class='input1'>",$email2_form);
	$campos2[] = $campo2;

	$campo2['nombre'] = "";
	$campo2['clase']  = "";
	$campo2['input']  = sprintf("<input type=hidden name=recordar value=1>");
	$campos2[] = $campo2;

	$smarty->assign('campos2',$campos2);

	return $smarty->fetch('tpl_registro.html');

} elseif (!$recordar) {

	$current=time();
	$random=$email_form . $current;
	$validacion=md5($random);

	srand((double)microtime()*1000000);
	$password = _PASS . RandomPassword(3);

	// Hash es un md5 realizado por el username, nombres, apellidos, email
	$hash = md5($email_form.$nombre_form.$apellido_form.$email_form.time());

	$query  = sprintf("INSERT INTO %s ",_TBLUSUARIO);
	$query .= sprintf("(username, password, idzona, nombres, apellidos, email, hash, sitio_registro, activo)");
	//      $query .= sprintf("email, telefono, direccion, ciudad, pais, cargo, correo, validacion, empresa,empresaTelefono,empresaDireccion)");
	$query .= sprintf(" VALUES ");
	$query .= sprintf("('%s','%s','%s','%s','%s','%s','%s', %s, %s)",
						$email_form,
						$password,
						"1",
						$nombre_form,
						$apellido_form,
						$email_form,
						$hash,
						$sroot,
						1
					);
	$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);

	$idUsuario = $db->Insert_ID();
	
	//Ahora lo insertamos en el grupo Lancita (idgrupo=25)
	$query2  = sprintf("INSERT INTO %s (idlista,idusuario) VALUES (%s,%s)", _TBLDETALLELISTA, 25, $idUsuario);
			$result2 = $db->Execute($query2) or errorQuery(__LINE__, __FILE__);

	if (isset($eventos_form) && count($eventos_form) > 0 && trim($eventos_form[0]) <> '') {
		$query1  = sprintf("SELECT idusuario FROM %s WHERE username = '%s'",_TBLUSUARIO,$email_form);
		$result1 = $db->Execute($query1) or errorQuery(__LINE__, __FILE__);
		$row1    = $result1->fields;
		settype($row1, 'object');

		for ($i = 0 ; $i < count($eventos_form) ; $i++)
		{
			$query2  = sprintf("INSERT INTO %s (idlista,idusuario) VALUES (%s,%s)", _TBLDETALLELISTA, $eventos_form[$i], $row1->idusuario);
			$result2 = $db->Execute($query2) or errorQuery(__LINE__, __FILE__);
		}

	}

	$llaveactivar	= $idUsuario ."M2C5MS". preg_replace("/[^a-zA-Z0-9]+/","",crypt($email_form."|".$password,"mytdsf8"));

	$body  = sprintf("Muchas gracias por su registro a la p�gina de\n%s (%s)\n",_NOMBRESITIO,_URL);
	$body .= sprintf("Los datos para ingresar a las seccion de USUARIOS REGISTRADOS y modificar sus datos de registro son:\n\n");
	$body .= sprintf("\t\tUsuario : %s\n\n",$email_form);
	$body .= sprintf("\t\tPassword : %s\n\n",$password);
	//$body .= sprintf("Para poder hacer uso de todas las ventajas de los usuarios registrados en nuestro Portal, deber� primero activar su cuenta haciendo click en el siguiente enlace:\n\n"._URL."tools/activar.php?".$llaveactivar."\n\nSi desea modificar su informaci�n de registro, por favor visite la siguiente direcci�n\n");
	//$body .= sprintf("%sindex.php?idcategoria=%s\n",_URL,_SMICUENTA);

	$body2  = sprintf("Se ha registrado un nuevo usuario a la p�gina de<br>%s (%s)<br>\n",_NOMBRESITIO,_URL);
	$body2 .= sprintf("Los datos son:<br><br>\n\n");
	$body2 .= sprintf("\t\t<tt>Nombres : <b>%s</b><br>\n\n",$nombre_form);
	$body2 .= sprintf("\t\tApellidos : <b>%s</b><br>\n\n",$apellido_form);
	$body2 .= sprintf("\t\tEmail : <b>%s</b><br>\n\n",$email_form);
/**
	$body2 .= sprintf("\t\tTel�fono : <b>%s</b><br>\n\n",$telefono_form);
	$body2 .= sprintf("\t\tCiudad : <b>%s</b><br>\n\n",$ciudad_form);
	$body2 .= sprintf("\t\tPa�s : <b>%s</b><br>\n\n",$pais_form);
	$body2 .= sprintf("\t\t<br>\n\n");
	$body2 .= sprintf("\t\tEmpresa : <b>%s</b><br>\n\n",$empresa_form);
	$body2 .= sprintf("\t\tTelefono Empresa : <b>%s</b><br>\n\n",$telefono_empresa_form);
	$body2 .= sprintf("\t\tDireccion Empresa : <b>%s</b><br>\n\n",$direccion_empresa_form);
	$body2 .= sprintf("\t\tCargo : <b>%s</b><br>\n\n",$cargo_form);
	$body2 .= sprintf("\t\tDesea recibir emails : <b>%s</b><br>\n\n",($correo_form)?"Si":"No");
*/
	$body2 .= sprintf("\t\tPassword : <b>%s</b></tt><br><br>\n\n",$password);
//	$body2 .= sprintf("\t\tPara cambiar de USUARIO REGISTRADO a FUNCIONARIO haga click en <a href=%s><b>AUTORIZAR COMO FUNCIONARIO</b></a><br>\n\n", _URLBASE ."/". $registro . "&validacion=" . $validacion . "&valor=2");

	$from  = "From:".$emailregistro;
	$from2 = "From:".$email_form."\r\nContent-Type:text/html";

	if (Funciones::microsmail($email_form,sprintf("Mensaje enviado desde la p�gina web %s",_NOMBRESITIO),$body,$from,'registro.php','1')){
		Funciones::microsmail(_EMAILREGISTRO, "Nuevo usuario registrado en " . _NOMBRESITIO." al boletin",$body2,$from2,'registro.php','2');
		$mensajeExito[] = sprintf("Su username y password fueron enviados al email <b>%s</b><br><br>Muchas gracias por su inter�s.",$email_form,_NOMBRESITIO);
		$smarty2 = new Smarty_Plantilla;
		$smarty2->assign('tipo'      ,"exito");
		$smarty2->assign('mostrar'   ,"no");
		$smarty2->assign('elementoMenu',$mensajeExito);
		$smarty2->assign('rotMensaje',_ROT_CONFIRMACION);
		$show = $smarty2->fetch('tpl_display_mensaje.html');
		$smarty->assign('subMenuError',$show);
		return $smarty->fetch('tpl_registro.html');

	} else {
		$body = "No se pudo enviar una confirmaci�n a su email<br>".$body;

		$mensajeExito[] = sprintf("%s",nl2br($body));
		$smarty2 = new Smarty_Plantilla;
		$smarty2->assign('mostrar'   ,"no");
		$smarty2->assign('rotMensaje',_ROT_ADVERTENCIA);
		$smarty2->assign('tipo'      ,"error");
		$smarty2->assign('elementoMenu',$mensajeExito);
		$show = $smarty2->fetch('tpl_display_mensaje.html');
		$smarty->assign('subMenuError',$show);
		return $smarty->fetch('tpl_registro.html');
	}
} else {
	$show = Recordar($email2_form);
	$smarty->assign('subMenuError',$show);
	return $smarty->fetch('tpl_registro.html');
}
/**
 * VerificaUsuario
 * @return
 */
function VerificaUsuario($email_form){
	global $db;
	$query  = sprintf("SELECT * FROM %s WHERE (username = '%s' OR email = '%s') AND activo = 1",_TBLUSUARIO,$email_form,$email_form);
	$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);

	if ($result->NumRows() > 0) {
		return 0;
	} else {
		return 1;
	}

}
/**
 * RandomPassword
 * @return
 */
function RandomPassword($longitud) {
	$posibles = '0123456789';
	$str = "";
	while (strlen($str) < $longitud) {
		$str .= substr($posibles,(rand() % strlen($posibles)),1);
	}
	return ($str);
}

function Validacion($validacion,$valor) {
	global $db;
	$query  = sprintf("UPDATE %s SET idzona = '%s' WHERE validacion = '%s'",_TBLUSUARIO,$valor,$validacion);
	$query2 = sprintf("SELECT * FROM %s WHERE validacion = '%s'",_TBLUSUARIO,$validacion);

	$r = $db->Execute($query) or errorQuery(__LINE__, __FILE__);

	if ($r !== FALSE) {

		$result = $db->Execute($query2) or errorQuery(__LINE__, __FILE__);
		$row = $result->fields;
		settype($row, 'object');

		print("<table align=center width=80%><tr><td><div class=advertenciaok>");

		$mensaje  = sprintf("Usted ha AUTORIZADO un nuevo usuario para entrar a la secci�n restringida de la p�gina %s (%s)<br>\n",_NOMBRESITIO,_URL);
		$mensaje .= sprintf("Los datos son:<br>\n\n");
		$mensaje .= sprintf("\t\tNombres : %s<br>\n\n",$row->nombres);
		$mensaje .= sprintf("\t\tApellidos : %s<br>\n\n",$row->apellidos);
		$mensaje .= sprintf("\t\tEmail : %s<br>\n\n",$row->email);
		$mensaje .= sprintf("\t\tTel�fono : %s<br>\n\n",$row->telefono);
		$mensaje .= sprintf("\t\tCiudad : %s<br>\n\n",$row->ciudad);
		$mensaje .= sprintf("\t\tPa�s : %s<br>\n\n",$row->pais);
		$mensaje .= sprintf("\t\tProfesi�n/Cargo : %s<br>\n\n",$row->profesion);
		$mensaje .= sprintf("\t\tEmpresa : %s<br>\n\n",$row->empresa);
		$mensaje .= sprintf("\t\tDesea recibir emails : %s<br>\n\n",($row->correo)?"Si":"No");
		$mensaje .= sprintf("\t\tPassword : %s<br>\n\n",$row->password);
		$mensaje .= sprintf("\t\tCategoria : %s<br>\n\n",($valor==2)?"CLIENTE":"CANAL");
		printf($mensaje);

		print("</div></td></tr></table>");

		$from  = "From:".$emailregistro;
		$body  = sprintf("Usted ha sido AUTORIZADO para usar las secciones restringidas de la p�gina de\n%s (%s)\n",_NOMBRESITIO,_URL);
		$body .= sprintf("Los datos para ingresar a las seccion de usuarios registrados son:\n\n");
		$body .= sprintf("\t\tusuario : %s\n\n",$row->email);
		$body .= sprintf("\t\tpassword : %s\n\n",$row->password);
		Funciones::microsmail($row->email,"Autorizaci�n acceso a la p�gina web " . _NOMBRESITIO,$body,$from,'registro.php','3');

	} else {
		print("<table align=center width=80%><tr><td><div class=advertenciaok>");
		$mensaje  = sprintf("El usuario NO pudo ser AUTORIZADO");
		print("</div></td></tr></table>");
	}
}

/**
 * Recordar
 * Funcion que hace la recordacion del correo.
 * @param string $email2_form
 * @return
 */
function Recordar($email2_form){

	global $db;

	$query = sprintf("SELECT * FROM %s WHERE email = '%s'", _TBLUSUARIO, $email2_form);
	$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);

	if ($result->NumRows() > 0){

		$row = $result->fields;
		settype($row, 'object');

		$mensaje  = sprintf("Datos para entrar a la secci�n restringida de la p�gina %s (%s)\n",_NOMBRESITIO,_URL);
		$mensaje .= sprintf("\t\tUsername : %s\n\n",$row->username);
		$mensaje .= sprintf("\t\tPassword : %s\n\n",$row->password);

		$from  = "From:"._EMAILREGISTRO;

		if(Funciones::microsmail($row->email,"Informaci�n de acceso a la p�gina web " . _NOMBRESITIO,$mensaje,$from,'registro.php','4')) {

			$msg = sprintf("Su informaci�n de acceso fu� enviada a <b>%s</b>",$row->email);
			$smarty = new Smarty_Plantilla;
			$mensajeExito[] = sprintf("%s",$msg);
			$smarty2 = new Smarty_Plantilla;
			$smarty2->assign('mostrar'   ,"no");
			$smarty2->assign('rotMensaje',_ROT_CONFIRMACION);
			$smarty2->assign('tipo'      ,"exito");
			$smarty2->assign('elementoMenu',$mensajeExito);
			return $smarty2->fetch('tpl_display_mensaje.html');

		} else {

			$msg = sprintf("Su informaci�n de acceso existe en nuestra base de datos
							pero experimentamos problemas con nuestro servidor de correo.<br>Por favor intente mas tarde");
			$smarty = new Smarty_Plantilla;
			$mensajeExito[] = sprintf("%s",$msg);
			$smarty2 = new Smarty_Plantilla;
			$smarty2->assign('mostrar'   ,"no");
			$smarty2->assign('rotMensaje',_ROT_ADVERTENCIA);
			$smarty2->assign('tipo'      ,"error");
			$smarty2->assign('elementoMenu',$mensajeExito);
			return $smarty2->fetch('tpl_display_mensaje.html');
		}

	} else {

		$msg = sprintf("No existe ninguna cuenta asociada con el email <b>%s</b><br>Por favor intente con otro o vuelva a registrarse.",$email2_form);
		$smarty = new Smarty_Plantilla;
		$mensajeExito[] = sprintf("%s",$msg);
		$smarty2 = new Smarty_Plantilla;
		$smarty2->assign('mostrar'   ,"no");
		$smarty2->assign('rotMensaje',_ROT_ERROR);
		$smarty2->assign('tipo'      ,"error");
		$smarty2->assign('elementoMenu',$mensajeExito);
		return $smarty2->fetch('tpl_display_mensaje.html');

	}
}
/**
 * CrearCheckEventos
 * Crea los checkboxes de los grupos existentes en el portal
 * @return
 */
function CrearCheckEventos($preregistro = 0,$eventos_form = 0){
	global $db;

	$query     = sprintf("SELECT * FROM %s WHERE autoregistro = 1 ORDER BY nombre", _TBLLISTAS);
	$result    = $db->Execute($query) or errorQuery(__LINE__, __FILE__);

	if ($result->NumRows() > 0) {

		$checks   = "<table border=0 cellpadding=0 cellspacing=0 align=left class='index_entradilla'>";

		while (!$result->EOF) {
			$row = $result->fields;
			settype($row, 'object');

			$tmp_check = '';

			if($row->idlista == $preregistro) {
				$tmp_check = 'checked';
			}

			if (isset($eventos_form) && is_array($eventos_form)) {
				for ($i = 0 ; $i < count($eventos_form) ; $i++)	{
					if ($row->idlista == $eventos_form[$i])	{
						$tmp_check = 'checked';
					}
				}
			}
			$checks  .= sprintf("<tr><td><input type=checkbox name=eventos_form[] value=%s %s></td><td class='tpl_migas'>%s</td></tr>",$row->idlista,$tmp_check,$row->nombre);
			$result->MoveNext();
		}
		$checks  .= "</table>";
	}
	$checks = (isset($checks))?$checks:'';
	return $checks;
}
/**
 * BuscarNombreEvento
 * @param integer $idlista
 * @return
 */
function BuscarNombreEvento($idlista) {
	global $db;
	$query     = sprintf("SELECT * FROM %s WHERE idlista = %s", _TBLLISTAS,$idlista);
	$result    = $db->Execute($query) or errorQuery(__LINE__, __FILE__);
	return $result->fields["nombre"];
}

?>
