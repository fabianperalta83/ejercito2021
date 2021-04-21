<?
ini_set('display_errors',0);
global $sroot; /** @see variables.php */

require_once(_DIRCORE.'Validacion.class.php');
require_once (_DIRCORE. 'Autenticacion.class.php');
require_once(_DIRLIB_ADMIN.'Grupo.class.php');

$smarty = new Smarty_Plantilla;

$pagina = basename($_SERVER['PHP_SELF']);
$pagina .= sprintf("?idcategoria=%s",$idcategoria);

// Titulo de la página

$archivo = sprintf("%s/categoria_%s.png",_DIRRECURSOS,$idcategoria);

if (file_exists($archivo)){
	$c_titulo = sprintf("<img src=%s border=0 width=405 height=63 />",$archivo);
}else{
	$c_titulo = Funciones::BuscarNombre($idcategoria);
}

$smarty->assign('c_titulo',$c_titulo);

$emailregistro = (_EMAILREGISTRO)?_EMAILREGISTRO:_EMAIL;

$registro      = basename($_SERVER['PHP_SELF']);
$registro     .= sprintf("?idcategoria=%s",$idcategoria);

$nombre_form      		= Autenticacion::secureSQL(getVariable('nombre_form'),'');
$apellido_form    		= Autenticacion::secureSQL(getVariable('apellido_form'),'');
$email_form       		= Autenticacion::secureSQL(getVariable('email_form'),'');
$recibir_sms      		= Autenticacion::secureSQL(getVariable('recibir_sms'),'');
$verifica_pin     		= Autenticacion::secureSQL(getVariable('pin_form'),'');
$preregistro      		= Autenticacion::secureSQL(getVariable('preregistro'),'');
$email_verificacion     = Autenticacion::secureSQL(getVariable('email'),'');
$celular_form     		= Autenticacion::secureSQL(getVariable('celular_form'),'');
$eventos_form     		= Autenticacion::secureSQL(getVariable('eventos_form', array($preregistro)),'');

/**
$empresa_form     = isset($_POST['empresa_form'])    ?$_POST['empresa_form']:"";
$telefono_empresa_form    = isset($_POST['telefono_empresa_form'])   ?$_POST['telefono_empresa_form']:"";
$direccion_empresa_form    = isset($_POST['direccion_empresa_form'])   ?$_POST['direccion_empresa_form']:"";
$ciudad_form      = isset($_POST['ciudad_form'])     ?$_POST['ciudad_form']:"";
$pais_form        = isset($_POST['pais_form'])       ?$_POST['pais_form']:"";
*/
$telefono_form    =  Autenticacion::secureSQL(getVariable('telefono_form'),'');
$direccion_form   =  Autenticacion::secureSQL(getVariable('direccion_form'),'');
$cargo_form       =  Autenticacion::secureSQL(getVariable('cargo_form'),'');


$correo_form      = Autenticacion::secureSQL(getVariable('correo_form'),'');
$validacion       =  Autenticacion::secureSQL(getVariable('validacion'),'');
$valor            =  Autenticacion::secureSQL(getVariable('valor'),'');

$email2_form      = getVariable('email2_form');
$recordar         = getVariable('recordar');

if($recibir_sms == '')
	{
		$smarty->assign('pin',$recibir_sms);
	}

global $db;	/** @see variables.php */


// Verifying the CSRF Token
$is_secure_form=false;
if (!empty($_REQUEST['token'])) {
    $is_secure_form=Funciones::hash_equals($_SESSION['token'], $_REQUEST['token']);
}
if(!$is_secure_form){
	$error[] = "Acceso incorrecto detectado.";
}



if($verifica_pin != '' && $email_verificacion != '')
{
	// Cambio # 1
	/*$query = sprintf("SELECT * FROM "._TBLUSUARIO." WHERE email = '%s' and sms_numero_pin = '%s'", $email_verificacion, $verifica_pin);
	$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);*/
    
    $query = $db->prepare("SELECT * FROM "._TBLUSUARIO." WHERE email = ? and sms_numero_pin = ?");
	$result = $db->Execute($query, array($email_verificacion, $verifica_pin)) /* or errorQuery(__LINE__, __FILE__) */;
	
	if($result->fields['idusuario'] != '')
	{
		// Cambio # 2
		/*$valida = sprintf("update "._TBLUSUARIO." set sms_validado = '%s' where idusuario = '%s'", 1, $result->fields['idusuario']);
		$result1 = $db->Execute($valida) or errorQuery(__LINE__, __FILE__);*/
        
        $valida = $db->prepare("update "._TBLUSUARIO." set sms_validado = ? where idusuario = ?");
		$result1 = $db->Execute($valida, array(1, $result->fields['idusuario'])) /* or errorQuery(__LINE__, __FILE__) */;
		
		if($result1)
		{
			$body = "PIN validado con exito<br>".$body;
			$mensajeExito[] = sprintf("%s",nl2br($body));
			$smarty2 = new Smarty_Plantilla;
			$smarty2->assign('tipo'      ,"exito");
			$smarty2->assign('mostrar'   ,"no");
			$smarty2->assign('elementoMenu',$mensajeExito);
			$smarty2->assign('rotMensaje',_ROT_CONFIRMACION);
			$show = $smarty2->fetch('tpl_display_mensaje.html');
			$smarty->assign('subMenuError',$show);
			return $smarty->fetch('tpl_registro.html');
		}
		
	}
	
}

if(!$recordar){

	//    if (!$nombre_form)            {  $error[] =  _ROT_REGISTRO_NOMBRE_ERROR;  }
	if (!$nombre_form)            {  $nombre_form = $email_form;  }
	//    if (!$apellido_form)          {  $error[] =  _ROT_REGISTRO_APELLIDO_ERROR;  }
	if (Validacion::isEmpty($email_form))             {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR1;  }
	
	if ($recibir_sms == '1')
	{
		if (!$celular_form)       	 {  $error[] =  _ROT_REGISTRO_CEL_ERROR4;  }
	}
	if($celular_form != '')
	{
		if (!VerificaCelular($celular_form))        {  $error[] =  _ROT_REGISTRO_EXISTENTE4;  }
	}	
	
	/**
if (!$empresa_form)           {  $error[] =  _ROT_REGISTRO_EMPRESA_ERROR;  }
if (!$telefono_empresa_form)  {  $error[] =  _ROT_REGISTRO_TELEFONO_ERROR;  }
if (!$direccion_empresa_form) {  $error[] =  _ROT_REGISTRO_DIRECCION_ERROR;  }
if (!$ciudad_form)            {  $error[] =  _ROT_REGISTRO_CIUDAD_ERROR;  }
if (!$pais_form)              {  $error[] =  _ROT_REGISTRO_PAIS_ERROR;  }
*/
	if (!Validacion::isEmpty($email_form) && !Validacion::isEmail($email_form)) {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR2;  }
	if (!VerificaUsuario($email_form))        {  $error[] =  _ROT_REGISTRO_EXISTENTE;  }
	if (!Validacion::isEmpty($celular_form) && !Validacion::isCel($celular_form)) {  $error[] =  _ROT_REGISTRO_CEL_ERROR2;  }
	
	$valor_eventos = count(eventos_form);
	for($i=0; $i<$valor_eventos; $i++) {
		if (!Validacion::isEmpty($eventos_form[$i]) && !Validacion::isNum($eventos_form[$i])) {  $error[] =  _ROT_REGISTRO_EVENTO;  }
	}
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
	$smarty1->assign('rotMensaje',utf8_decode(_ROT_CONTACTO_ADVERTENCIA));
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

	$campo['nombre'] = "Informaci&oacute;n Personal";
	$campo['clase']  = "";
	$campo['input']  = "";
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_NOMBRE;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<div class='form-group'><label for='nombre_form'><input type='text' name='nombre_form' id='nombre_form' value='%s' class='form-control' /></label></div>",$nombre_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_APELLIDO;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<div class='form-group'><label for='apellido_form'><input type='text' name='apellido_form' id='apellido_form' value='%s' class='form-control' /></label></div>",$apellido_form);
	$campos[] = $campo;

	$campo['nombre'] = "Email (*)";
	$campo['clase']  = "requerido";
	$campo['input']  = sprintf("<div class='form-group'><label for='email_form'><input type='text' name='email_form' id='email_form' value='%s' class='form-control tpl_input_edicion_requerido' /></label></div>
	                            <script type='text/javascript'>
                                  var email = new LiveValidation('email_form');
                                  email.add(Validate.Presence);
								  email.add(Validate.Email);
                                </script>",$email_form);
	$campos[] = $campo;
	
	$campo['nombre'] = _ROT_REGISTRO_CEL;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<div class='form-group'><label for='celular_form'><input type='text' name='celular_form' value='%s' id='celular_form' class='form-control' /></label></div>
	                           ",$celular_form);
	$campos[] = $campo;
	
	/**
	$campo['nombre'] = _ROT_REGISTRO_SMS;
	$campo['clase']  = "requerido";
	$campo['input']  = sprintf("<label for='recibir_sms'><input type='checkbox' name='recibir_sms' id='recibir_sms' value='1' %s /></label>",sprintf(($recibir_sms)?"checked":""));
	$campo['link'] 	 = sprintf("<a href='?idcategoria=%s'>Terminos de USO</a>",_TERMINOS_DE_USO);
	$campos[] = $campo;
	**/

	$campo['nombre'] = _ROT_REGISTRO_EVENTOS;
	$campo['clase']  = "";
	$campo['input']  = CrearCheckEventos($preregistro,$eventos_form);
	$campo['link'] 	 = "";
	$campos[] = $campo;


	/*************************
	INFORMACION EMPRESARIAL
	*************************/
	/**
$campo['nombre'] = "Información Empresarial";
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

	$smarty->assign('c_formulario_titulo2',utf8_decode(_ROT_REGISTRO_RECORDAR));

	$campo2['nombre'] = _ROT_REGISTRO_EMAIL;
	$campo2['clase']  = "requerido";
	$campo2['input']  = sprintf("<div class='form-group'><label for='email2_form'><input type='text' name='email2_form' value='%s' id='email2_form' class='form-control'/></label></div>",$email2_form);
	$campos2[] = $campo2;

	$campo2['nombre'] = "";
	$campo2['clase']  = "";
	$campo2['input']  = sprintf("<label for='recordar'><input type='hidden' id='recordar' name='recordar' value='1'/></label>");
	$campos2[] = $campo2;

	$smarty->assign('campos2',$campos2);

	return $smarty->fetch('tpl_registro.html');

} elseif (!$recordar && $is_secure_form) { // para crear un nuevo usuairo

	$pin_sms = rand(0,50000);
	
	$current=time();
	$random=$email_form . $current;
	$validacion=md5($random);

	srand((double)microtime()*1000000);
	$password = _PASS . RandomPassword(3);
	$confirma=''; 
    while ( $confirma != "seguro") {
    	$caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#&_-=:.";
    	$password = substr(str_shuffle( $caracteres ), 0, 10 );
    	if(preg_match("/^.*(?=.{10,})(?=.*\d)(?=.*\W+)(?=.*[a-z])(?=.*[A-Z]).*$/", $password)){
    		$confirma='seguro';
    	}
    }


	// Hash es un md5 realizado por el username, nombres, apellidos, email
	$hash = md5($email_form.$nombre_form.$apellido_form.$email_form.time());



	//Se realiza el SHA1 con salt del password
	$password_sha1 = sha1($email_form.$password);
	if($recibir_sms != '1')
	{
		$recibir_sms = 0;
	}
	
	$query  = sprintf("INSERT INTO %s ",_TBLUSUARIO);	
	$query .= sprintf("(username, password, idzona, nombres, apellidos, email, hash, sitio_registro,telefono_movil,sms_autoriza,sms_numero_pin,sms_validado, fecha_insercion");
	
	//si trae date es por que viene del formulario de amigos del ejercito
	if(!isset($_REQUEST["date"])){
		$query .= sprintf(") VALUES  ('%s','%s','%s','%s','%s','%s','%s', %s, '%s','%s','%s','0', now())",
							$email_form,
							$password_sha1,
							"1",
							$nombre_form,
							$apellido_form,
							$email_form,
							$hash,
							$sroot,
							$celular_form,
							$recibir_sms,
							$pin_sms
						);//SE CAMBIO EL PASSWORD porrr el nombre $password
	} else {
		$query .= sprintf(", cumpleanos) VALUES  ('%s','%s','%s','%s','%s','%s','%s', %s, '%s','%s','%s','0', now(), '%s')",
							$email_form,
							$password,
							"1",
							$nombre_form,
							$apellido_form,
							$email_form,
							$hash,
							$sroot,
							$celular_form,
							$recibir_sms,
							$pin_sms,
				                        $_REQUEST["date"]			                        
						);
	}
	
	$result = $db->Execute($query) /* or errorQuery(__LINE__, __FILE__) */;

	$idUsuario = $db->Insert_ID();

	/** MANEJO DE GRUPOS PARA EL USUARIO NUEVO **/

    /* Si no existe se crea un objeto de la clase grupo para hacer
     * el manejo del grupo 'todos' al cual pertenecen todos
     * los usuarios del sistema */

    /* Crea el objeto de la clase grupo */
    $objGrupo = new Grupo();

    /* Define los atributos del grupo 'todos' */
    $objGrupo->asignar('todos',0,'');

    /* Si el grupo no existe es creado y se le asignan todos los usuarios del sistema */
    if($objGrupo->insertar()){
        /* Se actualizan los atributos del objeto que representa el nuevo grupo */
        $objGrupo->cargarId();

        /* Si se creo el grupo se le asignan todos los usuarios del sistema */
        
        // Cambio # 3
        /*$query_usuarios_todos = sprintf("SELECT idusuario FROM %s ", $TBLUSUARIO);
        $allUsers=$db->Execute($query_usuarios_todos);*/
        
		$TBLUSUARIO = _TBLUSUARIO;
        $query_usuarios_todos = $db->prepare("SELECT idusuario FROM ? ");
        $allUsers=$db->Execute($query_usuarios_todos, array($TBLUSUARIO));    
        
        while(!$allUsers->EOF){
            $query_actualiza_todos=sprintf("INSERT INTO %s (idusuario,idlista) values (%s,%s)",_TBLDETALLELISTA,$allUsers->fields['idusuario'],$objGrupo->idlista);
            $db->Execute($query_actualiza_todos);
            $allUsers->MoveNext();
        }
    }
    /* Si el grupo ya existe solo se adiciona el usuario actual */
    else{

        /* Se actualizan los atributos del objeto que representa el grupo 'todos'*/
        $objGrupo->cargarId();

        /* Si el arreglo que almacena los grupos a los que debe inscribirse al
         * usuario esta vacio se adiciona el grupo todos en la posicion 0 en
         * caso contrario se asigna el identificador en la siguiente posición
         * disponible */
        if(trim($eventos_form[0] <> '')){
        array_push($eventos_form,$objGrupo->idlista);
        }
        else{
            $eventos_form[0]=$objGrupo->idlista;
        }
    }

	if (isset($eventos_form) && count($eventos_form) > 0 && trim($eventos_form[0]) <> '') {
        
		// Cambio # 4        
        $query1  = sprintf("SELECT idusuario FROM "._TBLUSUARIO." WHERE username = '%s' ", $email_form);
		$result1 = $db->Execute($query1) /* or errorQuery(__LINE__, __FILE__) */;
        
        /*$query1  = $db->prepare("SELECT idusuario FROM "._TBLUSUARIO." WHERE username = ? ");
		$result1 = $db->Execute($query1, array($email_form)) or errorQuery(__LINE__, __FILE__);*/
        
		$row1    = $result1->fields;
		settype($row1, 'object');

		for ($i = 0 ; $i < count($eventos_form) ; $i++)
		{
			$query2  = sprintf("INSERT INTO %s (idlista,idusuario) VALUES (%s,%s)", _TBLDETALLELISTA, $eventos_form[$i], $row1->idusuario);
			$result2 = $db->Execute($query2) /* or errorQuery(__LINE__, __FILE__) */;
		}

	}

	$llaveactivar	= $idUsuario ."M2C5MS". preg_replace("/[^a-zA-Z0-9]+/","",crypt($email_form."|".$password,"mytdsf8"));

	$body  = sprintf(utf8_decode("Muchas gracias por su registro a la página de\n%s (%s)\n"),_NOMBRESITIO,_URL);
	$body .= sprintf("Los datos para ingresar a las seccion de USUARIOS REGISTRADOS y modificar sus datos de registro son:\n\n");
	$body .= sprintf("\t\t<strong>Usuario</strong> : %s\n\n",$email_form);
	$body .= sprintf("\t\tPassword : %s\n\n",$password);
	$body .= sprintf("Para poder hacer uso de todas las ventajas de los usuarios registrados en nuestro Portal, deberá primero activar su cuenta haciendo click en el siguiente enlace:\n\n"._URL."tools/activar.php?".$llaveactivar);
        //$body .= sprintf("\n\n\Si desea modificar su iformación de registro, por favor visite la siguiente dirección\n");
	//$body .= sprintf("%sindex.php?idcategoria=%s\n",_URL,_SMICUENTA);

	$body2  = sprintf("Se ha registrado un nuevo usuario a la página de <br>%s (%s)<br>\n",_NOMBRESITIO,_URL);
	$body2 .= sprintf("Los datos son:<br><br>\n\n");
	$body2 .= sprintf("\t\t<tt>Nombres : <strong>%s</strong><br>\n\n",$nombre_form);
	$body2 .= sprintf("\t\tApellidos : <strong>%s</strong><br>\n\n",$apellido_form);
	$body2 .= sprintf("\t\tEmail : <strong>%s</strong><br>\n\n",$email_form);
	
	$body3  = sprintf("Registro exitoso en la página de %s (%s)",_NOMBRESITIO,_URL);
	$body3 .= sprintf("Numero PIN %s",$pin_sms);
//	$body3 .= sprintf("Favor digitarlo en el formulario de registro");
		
	
/**
	$body2 .= sprintf("\t\tTeléfono : <b>%s</b><br>\n\n",$telefono_form);
	$body2 .= sprintf("\t\tCiudad : <b>%s</b><br>\n\n",$ciudad_form);
	$body2 .= sprintf("\t\tPaís : <b>%s</b><br>\n\n",$pais_form);
	$body2 .= sprintf("\t\t<br>\n\n");
	$body2 .= sprintf("\t\tEmpresa : <b>%s</b><br>\n\n",$empresa_form);
	$body2 .= sprintf("\t\tTelefono Empresa : <b>%s</b><br>\n\n",$telefono_empresa_form);
	$body2 .= sprintf("\t\tDireccion Empresa : <b>%s</b><br>\n\n",$direccion_empresa_form);
	$body2 .= sprintf("\t\tCargo : <b>%s</b><br>\n\n",$cargo_form);
	$body2 .= sprintf("\t\tDesea recibir emails : <b>%s</b><br>\n\n",($correo_form)?"Si":"No");
*/
	$body2 .= sprintf("\t\tPassword : <strong>%s</strong></tt><br><br>\n\n",$password);
//	$body2 .= sprintf("\t\tPara cambiar de USUARIO REGISTRADO a FUNCIONARIO haga click en <a href=%s><b>AUTORIZAR COMO FUNCIONARIO</b></a><br>\n\n", _URLBASE ."/". $registro . "&validacion=" . $validacion . "&valor=2");

	$from  = "From:".$emailregistro;
	$from2 = "From:".$email_form."\r\nContent-Type:text/html";

	if (Funciones::microsmail($email_form,sprintf("Mensaje enviado desde la página web %s",_NOMBRESITIO),$body,$from,'registro.php','1')){
		Funciones::microsmail(_EMAILREGISTRO, "Nuevo usuario registrado en " . _NOMBRESITIO." al boletin",$body2,$from2,'registro.php','2');
		//$mensajeExito[] = sprintf("Su username y password fueron enviados al email <b>%s</b><br><br>Muchas gracias por su interés.",$email_form,_NOMBRESITIO);
		$mensajeExito[] = sprintf(utf8_decode("Se le envio un email a <strong>%s</strong><br><br>Muchas gracias por su interés."),$email_form,_NOMBRESITIO);
		$smarty2 = new Smarty_Plantilla;
		if($recibir_sms == '1')
		{
			Funciones::microsms($celular_form,$body3,'registro.php');
			$smarty->assign('pin',$recibir_sms);
			$smarty->assign('email',$email_form);
			
			$mensaje = sprintf('<br>Se envio un pin de validacion a su numero de celular Nº  <strong>%s</>', $celular_form);
		}
		
		
		$smarty2->assign('tipo'      ,"exito");
		$smarty2->assign('mostrar'   ,"no");
		$smarty2->assign('elementoMenu',$mensajeExito);
		$smarty2->assign('rotMensaje',_ROT_CONFIRMACION);
		$show = $smarty2->fetch('tpl_display_mensaje.html');
		$smarty->assign('subMenuError',$show);
		return $smarty->fetch('tpl_registro.html');

	} else {
		$body = "No se pudo enviar una confirmación a su email<br>".$body;

		$mensajeExito[] = sprintf("%s",nl2br($body));
		$smarty2 = new Smarty_Plantilla;
		if($recibir_sms == '1')
		{
			//Funciones::microsms($celular_form,$body3,'registro.php');
			$smarty->assign('pin',$recibir_sms);
			$smarty->assign('email',$email_form);
			
			$mensaje = sprintf('<br>Se envio un pin de validacion a su numero de celular Nº  <strong>%s</>', $celular_form);
		}
		$smarty2->assign('mostrar'   ,"no");
		$smarty2->assign('rotMensaje',_ROT_ADVERTENCIA);
		$smarty2->assign('tipo'      ,"error");
		$smarty2->assign('elementoMenu',$mensajeExito);
		$show = $smarty2->fetch('tpl_display_mensaje.html');
		$smarty->assign('subMenuError',$show);
		return $smarty->fetch('tpl_registro.html');
	}
} else {
	// es recordar clave
	if($is_secure_form){
		$show = Recordar($email2_form);
	}else{
		$msg[]="Acceso incorrecto detectado.";
		$smarty2 = new Smarty_Plantilla;
		$smarty2->assign('mostrar'   ,"no");
		$smarty2->assign('rotMensaje',_ROT_ERROR);
		$smarty2->assign('tipo'      ,"error");
		$smarty2->assign('elementoMenu',$msg);
		$show = $smarty2->fetch('tpl_display_mensaje.html');
	}
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
	$result = $db->Execute($query) /* or errorQuery(__LINE__, __FILE__) */;

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
	// Cambio # 5
	$query  = $db->prepare("UPDATE "._TBLUSUARIO." SET idzona = ? WHERE validacion = ?");
    /*$query  = sprintf("UPDATE "._TBLUSUARIO." SET idzona = '%s' WHERE validacion = '%s'", $valor,$validacion);*/
    
	// Cambio # 6
	$query2 = $db->prepare("SELECT * FROM "._TBLUSUARIO." WHERE validacion = ?");
    /*$query2 = sprintf("SELECT * FROM "._TBLUSUARIO." WHERE validacion = '%s'", $validacion);*/
    
	$r = $db->Execute($query, array($valor,$validacion)) /* or errorQuery(__LINE__, __FILE__) */;
    /*$r = $db->Execute($query) or errorQuery(__LINE__, __FILE__);*/

	if ($r !== FALSE) {

		$result = $db->Execute($query2, array($validacion)) /* or errorQuery(__LINE__, __FILE__) */;
        /*$result = $db->Execute($query2) or errorQuery(__LINE__, __FILE__);*/
        
		$row = $result->fields;
		settype($row, 'object');

		print("<table align=center width=80%><tr><td><div class=advertenciaok>");

		$mensaje  = sprintf("Usted ha AUTORIZADO un nuevo usuario para entrar a la sección restringida de la página %s (%s)<br>\n",_NOMBRESITIO,_URL);
		$mensaje .= sprintf("Los datos son:<br>\n\n");
		$mensaje .= sprintf("\t\tNombres : %s<br>\n\n",$row->nombres);
		$mensaje .= sprintf("\t\tApellidos : %s<br>\n\n",$row->apellidos);
		$mensaje .= sprintf("\t\tEmail: %s<br>\n\n",$row->email);
		$mensaje .= sprintf("\t\tTeléfono : %s<br>\n\n",$row->telefono);
		$mensaje .= sprintf("\t\tCiudad : %s<br>\n\n",$row->ciudad);
		$mensaje .= sprintf("\t\tPaís : %s<br>\n\n",$row->pais);
		$mensaje .= sprintf("\t\tProfesión/Cargo : %s<br>\n\n",$row->profesion);
		$mensaje .= sprintf("\t\tEmpresa : %s<br>\n\n",$row->empresa);
		$mensaje .= sprintf("\t\tDesea recibir emails : %s<br>\n\n",($row->correo)?"Si":"No");
		$mensaje .= sprintf("\t\tPassword : %s<br>\n\n",$row->password);
		$mensaje .= sprintf("\t\tCategoria : %s<br>\n\n",($valor==2)?"CLIENTE":"CANAL");
		printf($mensaje);

		print("</div></td></tr></table>");

		$from  = "From:".$emailregistro;
		$body  = sprintf("Usted ha sido AUTORIZADO para usar las secciones restringidas de la página de\n%s (%s)\n",_NOMBRESITIO,_URL);
		$body .= sprintf("Los datos para ingresar a las seccion de usuarios registrados son:\n\n");
		$body .= sprintf("\t\tusuario : %s\n\n",$row->email);
		$body .= sprintf("\t\tpassword : %s\n\n",$row->password);
		Funciones::microsmail($row->email,"Autorización acceso a la página web " . _NOMBRESITIO,$body,$from,'registro.php','3');

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

	// Cambio # 7
	$query = $db->prepare("SELECT * FROM "._TBLUSUARIO." WHERE email = ? ");
	$result = $db->Execute($query, array($email2_form)) /* or errorQuery(__LINE__, __FILE__) */;
     
    /*$query = sprintf("SELECT * FROM "._TBLUSUARIO." WHERE email = '%s' ", $email2_form);
	$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);*/

	if ($result->NumRows() > 0){

		$row = $result->fields;
		settype($row, 'object');

		//Establecemos un hash de recuperación para cuando se realice el enlace
		$hash_recuperacion = sha1($email2_form.$row->username.date('Y-m-d H:i:s'));
		
		//Escribimos el hash de recuperacion del password en la base de datos y la hora en la que se solicito
		//Damos un plazo de 48 horas para recuperar ese password
		
		// Cambio # 8
        $fecha_actual = date('Y-m-d H:i:s');
		$row_username = $row->username;
		$query_hash = $db->prepare("UPDATE "._TBLUSUARIO." SET timestamp_restauracion = '".$fecha_actual."', hash_restauracion = '".$hash_recuperacion."' where username = ?");
		$result_hash = $db->Execute($query_hash, array($row_username)) /* or errorQuery(__LINE__, __FILE__) */;
        
        /*$query_hash = sprintf("UPDATE "._TBLUSUARIO." SET hash_restauracion = '".$fecha_actual."', timestamp_restauracion = '".$hash_recuperacion."' where username = '%s'", $row_username);
		$result_hash = $db->Execute($query_hash) or errorQuery(__LINE__, __FILE__);*/
		
		//Construimos el mensaje de correo
		$mensaje  = sprintf("Por favor, para restablecer su contraseña dé click en el siguiente enlace \n %s/index.php?idcategoria=%s&restauracion=%s&username=%s",_URL,_SRESTAURACION,$hash_recuperacion,$row->username);
		
		$from  = "From:"._EMAILREGISTRO;

		if(Funciones::microsmail($row->email,"Información de acceso a la página web " . _NOMBRESITIO,$mensaje,$from,'registro.php','4')) {
			if($result_hash){   //Se verifica si se pudo escribir en la base de datos
				$msg = sprintf("Su informaci&oacute;n de acceso fu&eacute; enviada a <b>%s</b>",$row->email);
				$smarty = new Smarty_Plantilla;
				$mensajeExito[] = sprintf("%s",$msg);
				$smarty2 = new Smarty_Plantilla;
				$smarty2->assign('mostrar'   ,"no");
				$smarty2->assign('rotMensaje',_ROT_CONFIRMACION);
				$smarty2->assign('tipo'      ,"exito");
				$smarty2->assign('elementoMenu',$mensajeExito);
				return $smarty2->fetch('tpl_display_mensaje.html');
			}else{
				//No se pudo guardar la informacion en la base de datos
				$msg = sprintf("Un nuevo password fue enviado a su correo PERO NO FUE POSIBLE GUARDARLO en nuestra base de datos. " .
						"Por favor haga caso omiso del correo enviado e intente m&aacute;s tarde o comunique de esto al Webmaster");
				$smarty = new Smarty_Plantilla;
				$mensajeExito[] = sprintf("%s",$msg);
				$smarty2 = new Smarty_Plantilla;
				$smarty2->assign('mostrar'   ,"no");
				$smarty2->assign('rotMensaje',_ROT_ADVERTENCIA);
				$smarty2->assign('tipo'      ,"error");
				$smarty2->assign('elementoMenu',$mensajeExito);
				return $smarty2->fetch('tpl_display_mensaje.html');
			}
		}
	} else {

		$msg = sprintf("No existe ninguna cuenta asociada con el email <strong>%s</strong><br>Por favor intente con otro o vuelva a registrarse.",$email2_form);
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
	$result    = $db->Execute($query) /* or errorQuery(__LINE__, __FILE__) */;

		if ($result->NumRows() > 0) {

		$checks   = "<fieldset style='border:none'><legend></legend>";//<table border=0 cellpadding=0 cellspacing=0 align=left class='index_entradilla'>

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
			$checks  .= sprintf("<input id='eventos_form[]' type='checkbox' name='eventos_form[]' value=%s %s><label for='eventos_form[]'>%s</label><br />",$row->idlista,$tmp_check,$row->nombre);//<tr><td>   </td></tr>
			$result->MoveNext();
		}
		$checks  .= "</fieldset>";//</table>
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
	// Cambio # 9
	$query     = $db->prepare("SELECT * FROM "._TBLLISTAS." WHERE idlista = ? ");
	$result    = $db->Execute($query, array($idlista)) /* or errorQuery(__LINE__, __FILE__) */;
    
    /*$query     = sprintf("SELECT * FROM "._TBLLISTAS." WHERE idlista = '%s' ", $idlista);
	$result    = $db->Execute($query) or errorQuery(__LINE__, __FILE__);*/
    
	return $result->fields["nombre"];
}

/**
 * VerificaUsuario
 * @return
 */
function VerificaCelular($celular_form){
	global $db;
	// Cambio # 10
    $TBLUSUARIO = _TBLUSUARIO;
	/*$query  = $db->prepare("SELECT * FROM ? WHERE telefono_movil = '".$celular_form."' ");
	$result = $db->Execute($query, array($TBLUSUARIO)) or errorQuery(__LINE__, __FILE__);*/
    
    $query  = sprintf("SELECT * FROM "._TBLUSUARIO." WHERE telefono_movil = '%s' ", $celular_form);
	$result = $db->Execute($query) /* or errorQuery(__LINE__, __FILE__) */;

	if ($result->NumRows() > 0) {
		return 0;
	} else {
		return 1;
	}

}

?>