<?php

/**
 * Activacion de PIN de usuario
 * 
 * Cambiar el campo sms_validado = 1, si cumple con el pin registrado para el email enviado
 * Solo funciona por formulario tipo POST
 * 
 * @author Ricardo PG
 * @since Dic03-09
 * @copyright Micrositios Ltda (www.micrositios.net)
 */

global $sroot; /** @see variables.php */
global $db;	/** @see variables.php */

require_once(_DIRCORE.'Validacion.class.php');

//Variable de errores
$error = '';

$smarty = new Smarty_Plantilla; // Plantilla ppal
$smarty2 = new Smarty_Plantilla; //Plantilla aux

//Variables del formulario
$validar= getVariable('accion');
$pin	= getVariable('pin');
$email 	= getVariable('email');

//Verificar si validar parametros
if ($validar == 'Verificar')
{
	//Verificar parametros
	if (!Validacion::isNum($pin) || Validacion::isEmpty($pin) || 
		Validacion::isEmpty($email) || !Validacion::isEmail($email) 
		|| $_SERVER['REQUEST_METHOD'] != "POST"
		)
	{
		$error = _SMS_PARAMETROS_ERROR;
		print($_POST);
	}
	else
	{
		$query = sprintf("SELECT idusuario, sms_numero_pin FROM %s WHERE email = '%s'", _TBLUSUARIO, $email);
		$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);
		
		//verificar si existe el usuario
		if($result->fields['idusuario'] == '')
		{
			$error = _SMS_PARAMETROS_ERROR;
		}
		//Validar si son correctos
		elseif ($result->fields['sms_numero_pin'] != $pin)
		{
			$error = _SMS_PARAMETROS_ERROR;
		}
		else
		{
			$valida = sprintf("update %s set sms_validado = '1' where idusuario = '%s'",_TBLUSUARIO,$result->fields['idusuario']);
			$result1 = $db->Execute($valida) or errorQuery(__LINE__, __FILE__);
			
			if($result1)
			{
				$smarty2->assign('tipo'      	,"exito");
				$smarty2->assign('mostrar'   	,"no");
				$smarty2->assign('elementoMenu'	,array("PIN validado con exito"));
				$smarty2->assign('rotMensaje'	,_ROT_CONFIRMACION);
				$show = $smarty2->fetch('tpl_display_mensaje.html');
				$smarty->assign('subMenuError'	,$show);
			}
		}
	}
	
	//Configuracion de mensajes de error
	if (!empty($error))
	{
		$smarty2->assign('rotMensaje', $error);
		$smarty2->assign('tipo'      ,"error");
		$show = $smarty2->fetch('tpl_display_mensaje.html');
		$smarty->assign('subMenuError',$show);
	}
}

//Mostrar la plantilla
$smarty->assign('email',$email);
return $smarty->fetch('tpl_verificar_pin.html');

?>