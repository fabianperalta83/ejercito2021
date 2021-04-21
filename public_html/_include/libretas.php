<?php
	if(isset($_GET['me']))
	{
		ini_set("display_errors",1);
	}
	/*
	* Archivo que permite la consulta del tramite de la libreta de los ciudadanos.
	* @author: Farez Prieto
	* @date: 13 noviembre de 2009
	*/
	//llamo la variable de smarty
	global $smarty;
	//valido si presionaron consultar
	require_once(_DIRLIB.'ws/lib/nusoap.php');
	
	$errores	=	array();
	$mensaje	=	'';

	if(isset($_POST['enviar']))
	{
		try
		{
			// $soapClient = new SoapClient("http://172.23.224.5/ServiciosDirRec/OperacionesReclutamiento.asmx?wsdl");
			$soapClient = new SoapClient("http://216.38.50.202/ServiciosDirRec/OperacionesReclutamiento.asmx?wsdl");

			// Prepare SoapHeader parameters
			$sh_param = array(
			'Username'    =>    'MicrositiosSIIR',
			'Password'    =>    'XoLuRk678H');
			// $headers = new SoapHeader('http://172.23.224.5/ServiciosDirRec/OperacionesReclutamiento.asmx?wsdl', 'UserCredentials', $sh_param);
			$headers = new SoapHeader('http://216.38.50.202/ServiciosDirRec/OperacionesReclutamiento.asmx?wsdl', 'UserCredentials', $sh_param);

			// Prepare Soap Client

			$soapClient->__setSoapHeaders(array($headers));

			// if(!$soapClient)
			// {
				// array_push($errores,'No se pudo conectar al webservice');
			// }
			// else
			// {
			//capturo las variables para hacer persistencia
			$cedula		=	$_POST['cedula'];
			//$tipo		=	$_POST['tipo_doc'];
			//$fecha		=	$_POST['fecha'];
			//$nombres	=	$_POST['nombres'];
			//$apellidos	=	$_POST['apellidos'];

			//realizo las validaciones respectivas
			if(empty($cedula))
			{
				array_push($errores,'Debe escribir el numero de documento');
			}
			if(!empty($cedula) and !is_numeric($cedula))
			{
				array_push($errores,'Debe escribir el numero de documento');
			}
			/*if(empty($fecha))
			{
			array_push($errores,'Debe seleccionar la fecha de naciemiento');
			}*/
			if(count($errores) == 0)
			{
				/*$parametros = array('NumeroDocumento' => $cedula,
				'TipoDocumento' => $tipo,
				'FechaNacimiento'=>$fecha,
				'Nombre'=>$nombres,
				'Apellido'=>$apellidos);*/

				$parametros = array('NumeroDocumento' => $cedula);

				//llamo la funcion que me consulta el tramite de la libreta.
				$datos 	= $SoapClient->ConsultarEstadoCiudadanoPorIdentificacion($parametros);
				//recibo el codigo del mensaje que me arroja el webservice
				$codigo	=	utf8_decode($datos->ConsultarEstadoCiudadanoPorIdentificacionResult);
				//ahora debo consultar el mensaje correspondiente al codigo que me retorno el webservice, esto esta dentro de la categoria de mensajes tramite _MENSAJES_TRAMITES
				$query_mensaje	=	sprintf("SELECT * FROM categoria WHERE idpadre=%s AND antetitulo=%s",_MENSAJES_TRAMITES,$codigo);
				//ejecuto la consulta
				$result_mensaje	=	$db->Execute($query_mensaje);
				//armo el mensaje que se va a mostrar
				$mensaje	 =	"<b>".$result_mensaje->fields['nombre']."</b><br><br>";
				$mensaje	.=	$result_mensaje->fields['entradilla'];
			}
			//paso las variables a smarty.
			$smarty->assign("cedula"		,$cedula);
			//$smarty->assign("tipo"			,$tipo);
			//$smarty->assign("fecha"			,$fecha);
			//$smarty->assign("nombres"		,$nombres);
			//$smarty->assign("apellidos"		,$apellidos);
		// }
		}
		catch(SoapFault $exception)
		{
			array_push($errores,'El servicio no se encuentra disponible.');
		}
	}

	$smarty->assign("errores"		,$errores);
	$smarty->assign("mensaje"		,nl2br($mensaje));

	return	$smarty->fetch("libretas.html");

	/*
	if(isset($_POST['enviar']))
	{
	$oSoapClient = new SoapClient('http://190.254.8.134:19000/WS_Micrositios.asmx?wsdl', array(
	"style" => SOAP_RPC,
	"use" => SOAP_ENCODED,
	"soap_version" => SOAP_1_1,
	"uri"=>"urn:myWS"
	));
	if(!$oSoapClient)
	{
	array_push($errores,'No se pudo conectar al webservice');
	}
	else
	{
	//capturo las variables para hacer persistencia
	$cedula		=	$_POST['cedula'];
	$tipo		=	$_POST['tipo_doc'];
	$fecha		=	$_POST['fecha'];
	$nombres	=	$_POST['nombres'];
	$apellidos	=	$_POST['apellidos'];
	$errores	=	array();
	$mensaje	=	'';
	//realizo las validaciones respectivas
	if(empty($cedula))
	{
	array_push($errores,'Debe escribir el numero de documento');
	}
	if(!empty($cedula) and !is_numeric($cedula))
	{
	array_push($errores,'Debe escribir el numero de documento');
	}
	if(empty($fecha))
	{
	array_push($errores,'Debe seleccionar la fecha de naciemiento');
	}
	if(count($errores) == 0)
	{
	$parametros = array('NumeroDocumento' => $cedula,
	'TipoDocumento' => $tipo,
	'FechaNacimiento'=>$fecha,
	'Nombre'=>$nombres,
	'Apellido'=>$apellidos);

	//llamo la funcion que me consulta el tramite de la libreta.
	$datos 	= $oSoapClient->ConsultarEstadoCiudadano1($parametros);
	//recibo el codigo del mensaje que me arroja el webservice
	$codigo	=	utf8_decode($datos->ConsultarEstadoCiudadano1Result);
	//ahora debo consultar el mensaje correspondiente al codigo que me retorno el webservice, esto esta dentro de la categoria de mensajes tramite _MENSAJES_TRAMITES
	$query_mensaje	=	sprintf("SELECT * FROM categoria WHERE idpadre=%s AND antetitulo=%s",_MENSAJES_TRAMITES,$codigo);
	//ejecuto la consulta
	$result_mensaje	=	$db->Execute($query_mensaje);
	//armo el mensaje que se va a mostrar
	$mensaje	 =	"<b>".$result_mensaje->fields['nombre']."</b><br><br>";
	$mensaje	.=	$result_mensaje->fields['entradilla'];
	}
	//paso las variables a smarty.
	$smarty->assign("cedula"		,$cedula);
	$smarty->assign("tipo"			,$tipo);
	$smarty->assign("fecha"			,$fecha);
	$smarty->assign("nombres"		,$nombres);
	$smarty->assign("apellidos"		,$apellidos);
	$smarty->assign("errores"		,$errores);
	$smarty->assign("mensaje"		,nl2br($mensaje));
	}
	}


	return	$smarty->fetch("libretas.html");
	*/
?>