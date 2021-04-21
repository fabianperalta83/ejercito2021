<?php
/**
 * @micuenta.php
 *
 * @Realiza los cambios de los datos de un usuario. Utiliza SHA1 para el password
 * @SHA1 implementado desde el PHP 4.3.0
 *
 */

if (!isset($_SESSION['info_usuario'])) {
	$mensaje = urlencode(_ROT_PAGINA_RESTRINGIDA);
	headerLocation("index.php?idcategoria="._SLOGIN."&cat_origen=".$idcategoria."&archivo_origen=".basename($_SERVER['PHP_SELF'])."&msg=".urlencode(_ROT_PAGINA_RESTRINGIDA));
	/*exit;*/

} elseif ($_SESSION['info_usuario']["activo"] == 0) {
	$mensaje = urlencode("Su cuenta no ha sido activada, si no recibió el mensaje de activación junto con su contraseña deberá registrarse nuevamente <a href=index.php?idcategoria="._SREGISTRO."><b>aqui</b></a>");
	headerLocation("index.php?idcategoria="._SLOGIN."&cat_origen=".$idcategoria."&archivo_origen=".basename($_SERVER['PHP_SELF'])."&msg=".$mensaje);
	/*exit;*/
}
require_once(_DIRLIB_ADMIN.'Grupo.class.php');
require_once(_DIRCORE.'Validacion.class.php');
require_once(_DIRCORE. 'Autenticacion.class.php');

$smarty = new Smarty_Plantilla;

$pagina = basename($_SERVER['PHP_SELF']);
$pagina .= sprintf("?idcategoria=%s",$idcategoria);

// Titulo de la página
$c_titulo = Funciones::BuscarNombre($idcategoria);

//verifica si es gestor 
if(esGestorPqr($_SESSION['info_usuario']['idusuario']))
{
	$gestor_pqr	= 'ok';
}

$smarty->assign('c_titulo',$c_titulo);

if(isset($_SESSION['revista_digital'])){
	$insertGrupo  = sprintf("INSERT INTO detallelista values (%s, 53)", $_SESSION['info_usuario']['idusuario']);
    $resultIGrupo = $db->Execute($insertGrupo);
}

// Verifico si se desea cambiar o guardar la contraseña
if(isset($_POST['contrasena']) or isset($_POST['guardar_contrasena']))
{
	$smarty->assign('cambiar_contrasena',true);


	if(isset($_POST['guardar_contrasena']))
	{
		//Capturamos contraseñas

		//Solicitamos la contraseña actual para verificacion
		$password_actual		= getVariable('passwordactual_form');
		$password1_form         = getVariable('password1_form');
		$password2_form         = getVariable('password2_form');

		//Verificamos la contraseña actual para evitar que cambien la contraseña por un robo
		//de sesion

		if (sha1($_SESSION['info_usuario']['username'].$password_actual) != $_SESSION['info_usuario']['password']) {  $error[] =  _ROT_REGISTRO_PASSWORD_ERROR5;  }
		//if ($password_actual != $_SESSION['info_usuario']['password']) {  $error[] =  _ROT_REGISTRO_PASSWORD_ERROR5;  }

		//validamos la integridad
		if(!preg_match("/^.*(?=.{10,})(?=.*\d)(?=.*\W+)(?=.*[a-z])(?=.*[A-Z]).*$/", $password1_form)) { $error[] =  _ROT_REGISTRO_PASSWORD_ERROR6;  }


		//Validamos contraseña nueva

		if (!$password1_form) {  $error[] =  _ROT_REGISTRO_PASSWORD_ERROR1;  }
		if (!$password2_form) {  $error[] =  _ROT_REGISTRO_PASSWORD_ERROR2;  }
		if ($password1_form != $password2_form) {  $error[] =  _ROT_REGISTRO_PASSWORD_ERROR3;  }

		//Aqui va la rutina de hash y de insercion

		if(isset($error)) //Se verifica si hay errores
		{
			$smarty1 = new Smarty_Plantilla;
			$smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
			$smarty1->assign('tipo'      ,"error");
			$smarty1->assign('elementoMenu',$error);
			$show = $smarty1->fetch('tpl_display_mensaje.html');
			$smarty->assign('subMenuError',$show);
			$smarty->assign('error_contrasena',true);

			//Vuelvo y creo los campos

			$campo['nombre'] = _ROT_REGISTRO_PASSWORD_ACTUAL;
			$campo['clase']  = "requerido";
			$campo['input']  = sprintf("<input type=\"password\" name=\"passwordactual_form\" size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",'');
			$campos[] = $campo;

			$campo['nombre'] = _ROT_REGISTRO_PASSWORD1;
			$campo['clase']  = "requerido";
			$campo['input']  = sprintf("<input type=\"password\" name=\"password1_form\" id=\"password1_form\" size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",'');
			$campos[] = $campo;

			$campo['nombre'] = _ROT_REGISTRO_PASSWORD2;
			$campo['clase']  = "requerido";
			$campo['input']  = sprintf("<input type=\"password\" name=\"password2_form\" size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",'');
			$campos[] = $campo;

			$smarty->assign('campos',$campos);

		}
		else //Sino hay errores aplico el algoritmo de hashing SHA1 con un salt
		{
			$username_form          = $_SESSION['info_usuario']['username'];
			$idusuario_form         = $_SESSION['info_usuario']['idusuario'];
			$password_sha1 			= sha1($username_form.$password1_form);

			//Se realiza la actualizacion en la tabla de usuarios

			$query_password  = sprintf("UPDATE %s ",_TBLUSUARIO);
			$query_password .= sprintf("SET password='%s' WHERE idusuario = %s",
								$password_sha1,
								$idusuario_form
							);

			$result_password = $db->Execute($query_password) or errorQuery(__LINE__, __FILE__);

			if($result_password) //Fue exitosa la actualizacion del password
			{
				//Subo el password a Sesion
				$_SESSION['info_usuario']['password'] = $password_sha1;
				headerLocation("index.php?idcategoria=".$idcategoria."&msg=".urlencode(_ROT_REGISTRO_PASSWORD_EXITO));
			}
			else //Si no es posible escribir en la tabla
			{
				$error[] =  _ROT_REGISTRO_PASSWORD_ERROR4;

				$smarty1 = new Smarty_Plantilla;
				$smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
				$smarty1->assign('tipo'      ,"error");
				$smarty1->assign('elementoMenu',$error);
				$show = $smarty1->fetch('tpl_display_mensaje.html');
				$smarty->assign('subMenuError',$show);
				$smarty->assign('error_contrasena',true);
			}
		}
	}
	else
	{
		$campo['nombre'] = _ROT_REGISTRO_PASSWORD_ACTUAL;
		$campo['clase']  = "requerido";
		$campo['input']  = sprintf("<input type=\"password\" name=\"passwordactual_form\" id=\"passwordactual_form\" size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",'');
		$campos[] = $campo;

		$campo['nombre'] = _ROT_REGISTRO_PASSWORD1;
		$campo['clase']  = "requerido";
		$campo['input']  = sprintf("<input type=\"password\" name=\"password1_form\" id=\"password1_form\" size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",'');
		$campos[] = $campo;

		$campo['nombre'] = _ROT_REGISTRO_PASSWORD2;
		$campo['clase']  = "requerido";
		$campo['input']  = sprintf("<input type=\"password\" name=\"password2_form\" size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",'');
		$campos[] = $campo;

		$smarty->assign('campos',$campos);
	}

}
else
{		
		//Se verifica si no se ha enviado informacion de Actualizar
		if (!isset($_POST['Actualizar']) && !isset($_POST['reenviar_pin']))
		{

			$idusuario_form         = $_SESSION['info_usuario']['idusuario'];
			$username_form          = $_SESSION['info_usuario']['username'];
			$password1_form         = $_SESSION['info_usuario']['password'];
			$password2_form         = $_SESSION['info_usuario']['password'];
			$nombre_form            = $_SESSION['info_usuario']['nombres'];
			$apellido_form          = $_SESSION['info_usuario']['apellidos'];
			$email_form             = $_SESSION['info_usuario']['email'];
			$celular_form           = $_SESSION['info_usuario']['telefono_movil'];
			$celular_anterior_form  = $_SESSION['info_usuario']['telefono_movil'];
			$telefono_form          = $_SESSION['info_usuario']['telefono'];
			$recibir_sms  	        = $_SESSION['info_usuario']['sms_autoriza'];
			$recibir_anterior_sms  	= $_SESSION['info_usuario']['sms_autoriza'];
			$direccion_form         = $_SESSION['info_usuario']['direccion'];
			$ciudad_form            = $_SESSION['info_usuario']['ciudad'];
			$pais_form              = $_SESSION['info_usuario']['pais'];
			$profesion_form         = $_SESSION['info_usuario']['profesion'];
			$empresa_form           = $_SESSION['info_usuario']['empresa'];
			$cargo_form             = $_SESSION['info_usuario']['cargo'];
			$validacion 			= $_SESSION['info_usuario']['validacion'];

		} else { //En caso que se haya presionado el boton de actualizar se capturan los datos
				/* 
				//Se trae el idusuario de la sesion para evitar hacking por POST
				$idusuario_form         = $_SESSION['info_usuario']['idusuario'];
				$username_form          = getVariable('username_form');
				//$password1_form         = getVariable('password1_form');
				//$password2_form         = getVariable('password2_form');
				$nombre_form            = getVariable('nombre_form');
				$apellido_form          = getVariable('apellido_form');
				$email_form             = getVariable('email_form');
				$telefono_form          = getVariable('telefono_form');
				$direccion_form         = getVariable('direccion_form');
				$celular_form   	    = getVariable('celular_form');
				$celular_anterior_form  = getVariable('celular_anterior_form');
				$ciudad_form            = getVariable('ciudad_form');
				$recibir_sms            = getVariable('recibir_sms');
				$recibir_anterior_sms   = getVariable('recibir_anterior_sms');
				$pais_form              = getVariable('pais_form');
				$profesion_form         = getVariable('profesion_form');
				$empresa_form           = getVariable('empresa_form');
				$telefono_empresa_form  = getVariable('telefono_empresa_form');
				$direccion_empresa_form = getVariable('direccion_empresa_form');
				$cargo_form             = getVariable('cargo_form');
				$eventos_form           = getVariable('eventos_form');
				$actividad_empresa_form = getVariable('actividad_empresa_form');
				$validacion 			= getVariable('validacion'); */
				
				$idusuario_form         = $_SESSION['info_usuario']['idusuario'];
				$username_form          = getVariable('username_form');
				//$password1_form         = getVariable('password1_form');
				//$password2_form         = getVariable('password2_form');
				$nombre_form            = Autenticacion::secureSQL(getVariable('nombre_form'),'');
				$apellido_form          = Autenticacion::secureSQL(getVariable('apellido_form'),'');
				$email_form             = getVariable('email_form');
				$telefono_form          = Autenticacion::secureSQL(getVariable('telefono_form'),'');
				$direccion_form         = Autenticacion::secureSQL(getVariable('direccion_form'),'');
				$celular_form   	    = Autenticacion::secureSQL(getVariable('celular_form'),'');
				$celular_anterior_form  = Autenticacion::secureSQL(getVariable('celular_anterior_form'),'');
				$ciudad_form            = Autenticacion::secureSQL(getVariable('ciudad_form'),'');
				$recibir_sms            = getVariable('recibir_sms');
				$recibir_anterior_sms   = getVariable('recibir_anterior_sms');
				$pais_form              = getVariable('pais_form');
				$profesion_form         = Autenticacion::secureSQL(getVariable('profesion_form'),'');
				$empresa_form           = Autenticacion::secureSQL(getVariable('empresa_form'),'');
				$telefono_empresa_form  = Autenticacion::secureSQL(getVariable('telefono_empresa_form'),'');
				$direccion_empresa_form = Autenticacion::secureSQL(getVariable('direccion_empresa_form'),'');
				$cargo_form             = Autenticacion::secureSQL(getVariable('cargo_form'),'');
				$eventos_form           = getVariable('eventos_form');
				$actividad_empresa_form = getVariable('actividad_empresa_form');
				$validacion 			= getVariable('validacion');
	}

	//Verificar si no envio celular, desactivar el envio sms
	if(Validacion::isEmpty($celular_form))
	{
		//Si habia habilitado la casilla de sms, informar error
		if ($recibir_sms == '1') { $error[] =  _ROT_REGISTRO_CEL_ERROR4;  }
		$recibir_sms == '0';
	}
	else 
	{
		//Verificar si es valido el formato
		if (!Validacion::isCel($celular_form)) {  $error[] =  _ROT_REGISTRO_CEL_ERROR2;  }
		//Verificar si el celular enviado no esta registrado a otro usuario
		if (!VerificaCelular($celular_form, $username_form))        {  $error[] =  _ROT_REGISTRO_EXISTENTE4;  }
		
	}
	
	if (Validacion::isEmpty($username_form, TRUE))  {  $error[] =  _ROT_REGISTRO_USERNAME_ERROR;  }
	if (!Validacion::isCadena($nombre_form, TRUE))    {  $error[] =  _ROT_REGISTRO_NOMBRE_ERROR;  }
	if (!Validacion::isCadena($apellido_form, TRUE))  {  $error[] =  _ROT_REGISTRO_APELLIDO_ERROR;  }
	if (Validacion::isEmpty($email_form))     {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR1;  }
	if (!empty($telefono_form) and !Validacion::isNumTelephone($telefono_form))   {  $error[] =  _ROT_REGISTRO_TELEFONO_ERROR;  }
	if (!empty($direccion_form) and !Validacion::isTexto($direccion_form)) {  $error[] =  _ROT_REGISTRO_DIRECCION_ERROR;  }
	//if (!Validacion::isCadena($cargo_form))  {  $error[] =  _ROT_REGISTRO_CARGO_ERROR;  }


	/**
	if (!$empresa_form)   {  $error[] =  _ROT_REGISTRO_EMPRESA_ERROR;  }
	if (!$telefono_empresa_form)   {  $error[] =  _ROT_REGISTRO_TELEFONO_ERROR;  }

	if (!$direccion_empresa_form) {  $error[] =  _ROT_REGISTRO_DIRECCION_ERROR;  }
	if (!$ciudad_form)            {  $error[] =  _ROT_REGISTRO_CIUDAD_ERROR;  }
	if (!$pais_form)              {  $error[] =  _ROT_REGISTRO_PAIS_ERROR;  }
	*/
	if ($email_form && !Validacion::isEmail($email_form)) {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR2;  }

	//Verificamos si el username existe, solo si el usuario no esta logeado
	if (!isset($_SESSION['info_usuario']))
	{
		if (!VerificaUsuario($username_form,$idusuario_form))  {$error[] =  _ROT_REGISTRO_EXISTENTE2;}
	}


	if(isset($_GET["msg"]) && $_GET["msg"] <> "") {
		$smarty3 = new Smarty_Plantilla;
		$smarty3->assign('rotMensaje',_ROT_MICUENTA_ACTUALIZACION);
		$smarty3->assign('tipo'      ,"advertencia");
		$mens[]	=urldecode($_GET["msg"]);
		$smarty3->assign('elementoMenu',$mens);
		$show = $smarty3->fetch('tpl_display_mensaje.html');
		$smarty->assign('subMenuError',$show);
	}

	if(isset($error)){
		$total_errores = count($error);
	} else {
		$total_errores = 0;
	}

	if ((isset($_POST['Actualizar']) || isset($_POST['reenviar_pin'])) && $total_errores){
		$smarty1 = new Smarty_Plantilla;
		$smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
		$smarty1->assign('tipo'      ,"error");
		$smarty1->assign('elementoMenu',$error);
		$show = $smarty1->fetch('tpl_display_mensaje.html');
		$smarty->assign('subMenuError',$show);
	}

	//No hubo errores y se desea actualizar 
	if (!$total_errores && (isset($_POST['Actualizar']) || isset($_POST['reenviar_pin']))) {
		//Inicializar PIN
		$pin_sms = 0;
		
		if($recibir_sms == '')
		{
			$recibir_sms = 0;
		}

		$query  = sprintf("UPDATE %s ",_TBLUSUARIO);
		$query .= sprintf("SET username='%s', nombres='%s', apellidos='%s', email='%s', telefono='%s', direccion='%s', ciudad='%s', 
							pais='%s', empresa='%s', profesion='%s' , telefono_movil='%s' , sms_autoriza = '%s'",
							$username_form,
							$nombre_form,
							$apellido_form,
							$email_form,
							$telefono_form,
							$direccion_form,
							$ciudad_form,
							$pais_form,
							$empresa_form,
							$profesion_form,
							$celular_form,
							$recibir_sms
						);

		/** 
		 * Verificar si es necesario confirmar PIN
		 * En este momento sabemos que el celular esta validado
		 * porque es un campo obligatorio
		 */
		if (isset($_POST['reenviar_pin']) && $recibir_sms != '1')
		{
			$mensaje[] = _SMS_PIN_NO_ENVIADO;
		}
		elseif ($recibir_sms == '1') 
		{
			//Porque activa el recibir sms o estaba activo y cambio el numero
			if ($recibir_anterior_sms != '1' || ($celular_form != $celular_anterior_form) || isset($_POST['reenviar_pin']))
			{
				$pin_sms = rand(0,50000);
				$query .= sprintf(", sms_numero_pin = '%s'", $pin_sms);
			}
		}
		
		$query .= sprintf("WHERE idusuario='%s'",$idusuario_form);
		$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);

		if ($pin_sms > 0)
		{
			$body_sms  = sprintf("Actualizacion exitosa en la pagina de %s (%s). ",_NOMBRESITIO,_URL);
			$body_sms .= sprintf("Numero PIN %s",$pin_sms);
			Funciones::microsms($celular_form,$body_sms,'micuenta.php');
			$mensaje[] = _SMS_PIN_ENVIADO.$celular_form; 
		}
		
		/**
		 * Actualizamos la informacion del usuario en la session
		 */
		$q = sprintf("SELECT * FROM %s WHERE idusuario = %s AND activo = 1", _TBLUSUARIO, $_SESSION['info_usuario']['idusuario']);
		$r = $db->Execute($q) or errorQuery(__LINE__, __FILE__);

		if ($r !== FALSE and $r->NumRows() > 0) {
			$_SESSION['info_usuario'] = $r->fields;
		}
		
		
		// Buscamos los registros a los eventos actuales
		$query_prev   = sprintf("SELECT * FROM %s WHERE idusuario = %s", _TBLDETALLELISTA, $idusuario_form);
		$result_prev  = $db->Execute($query_prev) or errorQuery(__LINE__, __FILE__);

		// Creamos un array con esos eventos
		$result_prev_original[] = '';           // Inicializamos la variable por si acaso no encontramos ningun registro

		while(!$result_prev->EOF) {
			$result_prev_original[] = $result_prev->fields["idlista"];
			$result_prev->MoveNext();
		}

		// Borra los grupos autoregistro a los que pertenece el usuario. Milton G
		$query0   = sprintf("DELETE FROM %s WHERE idusuario = %s and idlista in (SELECT idlista from %s where autoregistro = 1)", _TBLDETALLELISTA, $idusuario_form, _TBLLISTAS);
		$result0  = $db->Execute($query0) or errorQuery(__LINE__, __FILE__);

		/**
	     * MANEJO DEL GRUPO "TODOS"
	    ***/

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
	        $query_usuarios_todos = sprintf("SELECT idusuario FROM %s ", _TBLUSUARIO);
	        $allUsers=$db->Execute($query_usuarios_todos);
	        while(!$allUsers->EOF){
	            $query_actualiza_todos=sprintf("INSERT INTO %s (idusuario,idlista) values (%s,%s)",_TBLDETALLELISTA,$allUsers->fields['idusuario'],$objGrupo->idlista);
	            $db->Execute($query_actualiza_todos);
	            $allUsers->MoveNext();
	        }
	    }

		if(is_array($eventos_form) && count($eventos_form) > 0){
			$nuevo_registro = array_diff($eventos_form,$result_prev_original);
			rsort($nuevo_registro);
			sort($nuevo_registro);
			if(count($nuevo_registro)){
				$para   = _EMAIL;
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
			for($j = 0 ; $j < count($nuevo_registro) ; $j++){
				$nombre_evento = BuscarNombreEvento($nuevo_registro[$j]);
				$msg .= "\n\t\t".$nombre_evento;
			}
			if(isset($msg)){
				Funciones::microsmail($para,$asunto,$msg,sprintf("From:%s",$de),'micuenta.php','1');
			}
			for($i = 0 ; $i < count($eventos_form) ; $i++){
				$query1   = sprintf("INSERT INTO %s ", _TBLDETALLELISTA);
				$query1  .= sprintf("(idlista,idusuario) VALUES ");
				$query1  .= sprintf("(%s,%s)",$eventos_form[$i],$idusuario_form);
				$result1  = $db->Execute($query1) or errorQuery(__LINE__, __FILE__);
			}
		}

		$_SESSION['info_usuario']['username'] = $username_form;
		

		//headerLocation("index.php?idcategoria=".$idcategoria."&msg=".urlencode(_ROT_REGISTRO_EXITO));
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

	/**
	 * Comentado el campo hidden del idusuario ya que es una brecha de seguridad. Se toma
	 * ahora de la sesion
	 *
	 * Adicionalmente se adiciona la ecnriptacion del password con SHA1, por lo que no se
	 * muestran los campos de Password
	 *
	 * @author Milton Gonzalez
	 * @date 15-08-2007
	 */
	/*$campo['nombre'] = "";
	$campo['clase']  = "";
	$campo['input']  = sprintf("<input type=\"hidden\" name=\"idusuario_form\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",$idusuario_form);
	$campos[] = $campo;*/
	

	$campo['nombre'] = _ROT_REGISTRO_USERNAME;
	if($gestor_pqr == 'ok')
	{
		$campo['input']  = sprintf('<input type="text" disabled name="username_form" size="35" value="%s" class="tpl_input_edicion" readonly="readonly" >', htmlentities($username_form, ENT_QUOTES));
	}
	else
	{
		$campo['input']  = sprintf('<input type="text" name="username_form" size="35" value="%s" class="tpl_input_edicion" readonly="readonly" >', htmlentities($username_form, ENT_QUOTES));
	
	}
	$campo['clase']  = "";
	$campos[] = $campo;

	/*$campo['nombre'] = _ROT_REGISTRO_PASSWORD1;
	$campo['clase']  = "requerido";
	$campo['input']  = sprintf("<input type=\"password\" name=\"password1_form\" size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",$password1_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_PASSWORD2;
	$campo['clase']  = "requerido";
	$campo['input']  = sprintf("<input type=\"password\" name=\"password2_form\" size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",$password2_form);
	$campos[] = $campo;*/

	$campo['nombre'] = _ROT_REGISTRO_NOMBRE;
	
	if($gestor_pqr == 'ok')
	{
		$campo['input']  = sprintf("<input type=\"text\" name=\"nombre_form\"  disabled size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">", htmlentities($nombre_form, ENT_QUOTES));
	}
	else
	{
		$campo['input']  = sprintf("<input type=\"text\" name=\"nombre_form\" size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">", htmlentities($nombre_form, ENT_QUOTES));
	}
	$campo['clase']  = "requerido";
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_APELLIDO;
	if($gestor_pqr == 'ok')
	{
		$campo['input']  = sprintf("<input type=\"text\" name=\"apellido_form\" disabled size=\"35\" value=\"%s\" class='tpl_input_edicion'>", htmlentities($apellido_form, ENT_QUOTES));
	
	}
	else
	{
		$campo['input']  = sprintf("<input type=\"text\" name=\"apellido_form\" size=\"35\" value=\"%s\" class='tpl_input_edicion'>", htmlentities($apellido_form, ENT_QUOTES));
	
	}
	$campo['clase']  = "";
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_EMAIL;
	if($gestor_pqr == 'ok')
	{
		$campo['input']  = sprintf("<input type=\"text\" name=\"email_form\" disabled size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",  htmlentities($email_form, ENT_QUOTES));
	
	}
	else
	{
		$campo['input']  = sprintf("<input type=\"text\" name=\"email_form\" size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",  htmlentities($email_form, ENT_QUOTES));
	
	}
	$campo['clase']  = "requerido";
	$campos[] = $campo;
	
	$campo['nombre'] = _ROT_REGISTRO_TELEFONO;
	if($gestor_pqr == 'ok')
	{
		$campo['input']  = sprintf("<input type=\"text\" name=\"telefono_form\" disabled size=\"35\" value=\"%s\" class='input1'>",$telefono_form);
	}
	else
	{
		$campo['input']  = sprintf("<input type=\"text\" name=\"telefono_form\" size=\"35\" value=\"%s\" class='input1'>",$telefono_form);
	}

	$campo['clase']  = "";
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_DIRECCION;
	if($gestor_pqr == 'ok')
	{
		$campo['input']  = sprintf("<input type=\"text\" disabled name=\"direccion_form\" size=\"35\" value=\"%s\" class='input1'>",$direccion_form);
	
	}
	else
	{
		$campo['input']  = sprintf("<input type=\"text\" name=\"direccion_form\" size=\"35\" value=\"%s\" class='input1'>",$direccion_form);
	
	}
	$campo['clase']  = "";
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_PROFESION;
	if($gestor_pqr == 'ok')
	{
		$campo['input']  = sprintf("<input type=\"text\"  disabled name=\"profesion_form\" size=\"35\" value=\"%s\" class='input1'>",$profesion_form);
	}
	else
	{
		$campo['input']  = sprintf("<input type=\"text\"  name=\"profesion_form\" size=\"35\" value=\"%s\" class='input1'>",$profesion_form);
	}
	$campo['clase']  = "";
	$campos[] = $campo;
	
	$campo['nombre'] = _ROT_REGISTRO_CEL;
	if($gestor_pqr == 'ok')
	{
		$campo['input']  = sprintf("<input type=text disabled name=celular_form size=35 value='%s' class='tpl_input_edicion_requerido'><input type='hidden' name='celular_anterior_form' value='%s' >",$celular_form,$celular_form);
	}
	else
	{
		$campo['input']  = sprintf("<input type=text name=celular_form size=35 value='%s' class='tpl_input_edicion_requerido'><input type='hidden' name='celular_anterior_form' value='%s' >",$celular_form,$celular_form);
	}
	$campo['clase']  = "requerido";
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_SMS;
	if($gestor_pqr == 'ok')
	{
		$campo['input']  = sprintf("<input type=checkbox disabled name='recibir_sms' value='1' %s><input type=hidden name='recibir_anterior_sms' value='%s'>",sprintf(($recibir_sms)?"checked":""),$recibir_sms);
		$campo['link'] 	 = sprintf("<a href='?idcategoria=%s'>Terminos de USO</a>",_TERMINOS_DE_USO);
	}
	else
	{
		$campo['input']  = sprintf("<input type=checkbox name='recibir_sms' value='1' %s><input type=hidden name='recibir_anterior_sms' value='%s'>",sprintf(($recibir_sms)?"checked":""),$recibir_sms);
		$campo['link'] 	 = sprintf("<a href='?idcategoria=%s'>Terminos de USO</a>",_TERMINOS_DE_USO);
	}
	$campo['clase']  = "requerido";
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
	$campo['input']  = sprintf("<input type=\"text\" name=empresa_form size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",$empresa_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_EMPRESA_ACTIVIDAD;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<input type=\"text\" name=actividad_empresa_form size=\"35\" value=\"%s\" class='input1'>",$actividad_empresa_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_TELEFONO_EMPRESA;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<input type=\"text\" name=telefono_empresa_form size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",$telefono_empresa_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_DIRECCION;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<input type=\"text\" name=direccion_empresa_form size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",$direccion_empresa_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_CIUDAD;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<input type=\"text\" name=ciudad_form size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",$ciudad_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_REGISTRO_PAIS;
	$campo['clase']  = "";
	if ($pais_form == "") $pais_form = "Colombia";
	$campo['input']  = sprintf("<input type=\"text\" name=pais_form size=\"35\" value=\"%s\" class=\"tpl_input_edicion_requerido\">",$pais_form);
	$campos[] = $campo;


	$campo['nombre'] = _ROT_REGISTRO_CARGO;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<input type=\"text\" name=cargo_form size=\"35\" value=\"%s\" class='input1'>",$cargo_form);
	$campos[] = $campo;

	$campo['nombre'] = "Información Adicional";
	$campo['clase']  = "";
	$campo['input']  = "";
	$campos[] = $campo;
	*/
	$campo['nombre'] = _ROT_REGISTRO_EVENTOS;
	$campo['clase']  = "";
	$campo['input']  = CrearCheckEventos($idusuario_form);
	$campo['link'] 	 = "";
	$campos[] = $campo;

	//Asignar parametros para botones SMS
	$smarty->assign('email',$email_form);
	$smarty->assign('pagina_validacion', 'index.php?idcategoria='._SMS_VALIDAR_PIN);
	$smarty->assign('campos',$campos);
}

return $smarty->fetch('tpl_micuenta.html');


/**
 * VerificaUsuario
 * @param
 * @return
 */
function VerificaUsuario($username_form,$idusuario_form){

	global $db;
	$query  = sprintf("SELECT * FROM %s WHERE (username = '%s' OR idusuario != %s) AND activo = 1 "
						,_TBLUSUARIO
						,$username_form
						,$idusuario_form);
	$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);
	if ($result->NumRows() > 0) {
		return 0;
	} else {
		return 1;
	}
}
/**
 * CrearCheckEventos
 * @param
 * @return
 */
function CrearCheckEventos($idusuario_form){
	global $db;
	$query     = sprintf("SELECT * FROM %s WHERE autoregistro = 1 ORDER BY nombre", _TBLLISTAS);
	$result    = $db->Execute($query) or errorQuery(__LINE__, __FILE__);

	$query1     = sprintf("SELECT * FROM %s WHERE idusuario = %s", _TBLDETALLELISTA, $idusuario_form);
	$result1    = $db->Execute($query1) or errorQuery(__LINE__, __FILE__);
	$checks = '';

	$arrayResult1 = array();
	if ($result1->NumRows() > 0){
		while (!$result1->EOF) {
			array_push($arrayResult1, $result1->fields);
			$result1->MoveNext();
		}
	}

	if ($result->NumRows() > 0) {

		$checks   = "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\"  class=\"index_entradilla\">";

		while (!$result->EOF) {
			$row = $result->fields;

			$tmp_check = '';

			if (count($arrayResult1) > 0){
				while (list(, $row1) = each($arrayResult1)) {
					if($row['idlista'] == $row1['idlista']){
						$tmp_check = 'checked';
					}
				}
				reset($arrayResult1);
			}

			$checks  .= sprintf("<tr><td><input type=\"checkbox\" name=\"eventos_form[]\" value=\"%s\" %s></td><td class=\"tpl_migas\">%s</td></tr>",$row['idlista'],$tmp_check,$row['nombre']);
			$result->MoveNext();
		}
		$checks  .= "</table>";
	}
	return $checks;
}
/**
 * BuscarNombreEvento
 * @param integer $idlista
 * @return
 */
function BuscarNombreEvento($idlista) {
	global $db;
	$query     = sprintf("SELECT * FROM %s WHERE idlista = %s", _TBLLISTAS, $idlista);
	$result    = $db->Execute($query) or errorQuery(__LINE__, __FILE__);
	return $result->fields["nombre"];
}

/**
 * VerificaCelular
 * 
 * @param $celular_form numero de celular a verificar
 * @param $usuario el usuario actual, para verificar un usuario diferente a ese.
 * 
 * @return
 */
function VerificaCelular($celular_form, $usuario){
	global $db;
	$query  = sprintf("SELECT * FROM %s WHERE telefono_movil = '%s' AND username <> '%s'",_TBLUSUARIO,$celular_form, $usuario);
	
	$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);

	if ($result->NumRows() > 0) {
		return 0;
	} else {
		return 1;
	}

}

?>
