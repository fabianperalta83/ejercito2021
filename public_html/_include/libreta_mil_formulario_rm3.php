<?php

return ""; // Se subio este cambio temporalemten para que no muestre la categoria

ini_set("display_erros", "on");

$gelPath = "";
if( isset($_REQUEST['action']) )
{
	// Validacion de peticion AJAX

	$gelPath = "..";
	require_once('../_config/constantes.php'); //CARGA LAS CONSTANTES DEL PORTAL

//	session_name(preg_replace('/\s+/', '', strtolower(_DBNAME)));
//	session_start();
//	
//	if( session_id() == "" || !isset($_SESSION['info_usuario']) || !isset($_SESSION['info_usuario']['username']) || $_SESSION['info_usuario']['username'] == "" )
//	{
//		echo '<script type="text/javascript" language="Javascript">alert("El usuario no se encuentra registrado");</script>';
//		exit;
//	}	
}
else
{
	// Validacion de peticion normal
	
	require_once(_RUTABASE.'_config/constantes.php'); //CARGA LAS CONSTANTES DEL PORTAL
	
	global $idcategoria;
	$gelPath = ".";
	
//	if( session_id() == "" || !isset($_SESSION['info_usuario']) || !isset($_SESSION['info_usuario']['username']) || $_SESSION['info_usuario']['username'] == "" )
//	{
//		headerLocation("index.php?idcategoria=" . _SLOGIN . "&cat_origen=" . $idcategoria . "&archivo_origen=" . basename($_SERVER['PHP_SELF']) . "&msg=5");
//		exit;
//	}	
}

//print_r($_REQUEST);

require_once(_DIRCORE  . "Funciones.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once(_DIRCORE  . "Autenticacion.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once(_DIRCORE  . "Validacion.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once(_RUTABASE . "_config/variables.php"); // CARGA LAS VARIABLES DEL PORTAL
require_once(_RUTABASE . "_lib/Micrositios.class.php"); // Funciones para manejo de Ajax y conversiones
require_once(_DIRLIB   . 'wf/classes.inc.php');
require_once(_DIRLIB.'smarty/libs/Smarty.class.php');
require_once("libreta_mil_validaciones.php");

global $db;      //Conexion a MySQL

$idUsuario   = $_SESSION['info_usuario']['idusuario'];

//Micrositios::printArray($_REQUEST);

////////////////////////// CODIGO DE PRUEBAS ////////////////////////
//$idUsuario   = 2999; // AGENCIA
if( !defined("_CATEGORIA_SOLICITUD_ESTADO_MIL") )
{
	trigger_error("La variable de subsitio _CATEGORIA_SOLICITUD_ESTADO_MIL no ha sido definida", E_USER_WARNING);
	define("_CATEGORIA_SOLICITUD_ESTADO_MIL", 333242);
}
if( !defined("_GRUPOADMINDGA") )
{
//	trigger_error("La variable de subsitio _GRUPOADMINDGA no ha sido definida", E_USER_WARNING);
	define("_GRUPOADMINDGA", 100000000);
}
//$idUsuario   = 29; // CAR
$idEstadoSolicitud = 1;
//$idSol = 1;
////////////////////////// CODIGO DE PRUEBAS ////////////////////////

$esAdministradorDGA = consulta_grupos::idUsuarioPerteneceALista($db, $idUsuario, _GRUPOADMINDGA);

$grupoNumIdentificInternacional = array(
	'RE' => "REGISTRO CIVIL"
	, 'TI' => "TARJETA IDENTIDAD"
	, 'CC' => "C&Eacute;DULA CIUDADAN&Iacute;A"
	, 'CE' => "C&Eacute;DULA EXTRANJER&Iacute;A"
);

$gelDom = new GELDomXML('1.0', 'ISO-8859-1');
$gelDom->load("$gelPath/wsejercito/Esquemas/Comun/Personal/enumCodSexoAlf1.xsd");
$gelDom->getGELElements();
$grupoTipoSexo = $gelDom->getSimpleArray();

$gelDom->load("$gelPath/wsejercito/Esquemas/Comun/Ubicacion/enumCodNumPais.xsd");
$gelDom->getGELElements();
$grupoPaises = $gelDom->getSimpleArray();

$gelDom->load("$gelPath/wsejercito/Esquemas/Local/Ubicacion/enumCodDepartamentoAlf2.xsd");
$gelDom->getGELElements();
$gelDepartamentos = $gelDom->getSimpleArray();
// $gelDepartamentos = GelUbicacion::getDepartamentos($db);

$gelDomMunicipios = new GELDomXML('1.0', 'ISO-8859-1');
$gelDomMunicipios->load("$gelPath/wsejercito/Esquemas/Local/Ubicacion/enumCodMunicipioAlf5.xsd");
//$gelDomMunicipios->getGELElementsByXquery("/xsd:schema/xsd:simpleType/xsd:restriction/xsd:enumeration[starts-with(@value, '05')]", true);

$gelDom->load("$gelPath/wsejercito/Esquemas/Local/Personal/enumCodPertenenciaEtnica.xsd");
$gelDom->getGELElements();
$grupoPertenenciaEtnica = $gelDom->getSimpleArray();

$gelDom->load("$gelPath/wsejercito/Esquemas/Local/Personal/enumCodTipoEstadoConyugal.xsd");
$gelDom->getGELElements();
$grupoEstadoConyugal = $gelDom->getSimpleArray();

$gelDom->load("$gelPath/wsejercito/Esquemas/Local/Personal/enumCodNivelEducativo.xsd");
$gelDom->getGELElements();
$grupoNivelEducativo = $gelDom->getSimpleArray();

//$gelDom->load("$gelPath/wsejercito/Esquemas/Local/Organizacion/enumCodInstitucionEducativa.xsd");
//$gelDom->getGELElements();
//$grupoCodInstitucionEducativa = $gelDom->getSimpleArray();

$gelDom->load("$gelPath/wsejercito/Esquemas/Comun/Personal/enumCodProfesion.xsd");
$gelDom->getGELElements();
$grupoCodProfesion = $gelDom->getSimpleArray();

$gelDom->load("$gelPath/wsejercito/Esquemas/Local/Organizacion/enumCodEmpleo.xsd");
$gelDom->getGELElements();
$grupoCodEmpleo = $gelDom->getSimpleArray();

$gelDom->load("$gelPath/wsejercito/Esquemas/Local/Personal/enumCodTipoNacionalidad.xsd");
$gelDom->getGELElements();
$grupoNacionalidad = $gelDom->getSimpleArray();

$grupoTipoVivienda = array(
	'01' => "Propia"
	, '02' => "Arrendada"
);

$grupoSanguineo = array(
	'O' => "O"
	, 'A' => "A"
	, 'B' => "B"
	, 'AB' => "AB"
);

//$grupoSexo = array(
//	'M' => "Masculino"
//	, 'F' => "Femenino"
//);
//print_r($grupoSexo);
//print_r($grupoTipoSexo);

$grupoModalidadAcademica = array(
	"TC" => "TÉCNICA"
	, "TL" => "TECNOLÓGICA"
	, "TE" => "TECNOLÓGICA ESPECIALIZADA"
	, "UN" => "UNIVERSITARIA"
	, "ES" => "ESPECIALIZACIÓN"
	, "MG" => "MAESTRÍA O MAGISTER"
	, "DC" => "DOCTORADO O PHD"
);

$grupoEstudioAprobado = array(
	'No' => "No"
	, 'Si' => "Si"
);

$grupoSiNo = array(
	'Si' => "Si"
	, 'No' => "No"
);

$grupoNoSi = array(
	'No' => "No"
	, 'Si' => "Si"
);

$grupoRh = array(
	'NEGATIVO' => "-"
	, 'POSITIVO' => "+"
);

$grupoNumHijos = array();
for ($ii = 0; $ii <=20; $ii++)
	$grupoNumHijos[$ii] = $ii;

$grupoEstrato = array();
for ($ii = 1; $ii <=6; $ii++)
	$grupoEstrato[$ii] = $ii;

$valoresAnnosCertificacion = array();
for ($ii = date("Y"); $ii >= 1980; $ii--)
	$valoresAnnosCertificacion[$ii] = $ii;

$js = "";

$validarSoloTipos = false; // Util para que el formulario se almacene sin los campos obligatorios pero q la informacion se valida
$persona = false;

$requestSeguro = libretaMilValidaciones::validarXArreglos( $_REQUEST, $arregloValidaciones, $errores, $validarSoloTipos );

$solicitud_id = "";
$password = "";
if( isset($requestSeguro['uid']) && $requestSeguro['uid'] != "" && isset($requestSeguro['pid']) && $requestSeguro['pid'] != "" )
{
	// Viene la solicitud de carga de formulario rm3 con contraseña
	$solicitud_id = $requestSeguro['uid'];
	$password = $requestSeguro['pid'];
	$persona = LibMilPersona::loadByUPID($db, $solicitud_id, $password);
}

if( !isset($_REQUEST['action']) && $persona === false )
{
	$smarty = new Smarty_Plantilla;
	$smarty->caching = false;
	$smarty->force_compile = true;
	$smarty->assign("__CATEGORIA_SOLICITUD_ESTADO_MIL", _CATEGORIA_SOLICITUD_ESTADO_MIL);
	return $smarty->fetch('tpl_mod_libreta_mil_error_clave_rm3.html');
}else
{
	// print_r($persona);
}

if(!isset($_REQUEST['action']) && !is_null($persona) && is_object($persona) && ($persona->getEstadoAceptarRM3() != "Si"))
{
	// No ha decidido nunca
	$smarty = new Smarty_Plantilla;
	$smarty->caching = false;
	$smarty->force_compile = true;
	$smarty->assign("__CATEGORIA_SOLICITUD_ESTADO_MIL", _CATEGORIA_SOLICITUD_ESTADO_MIL);
	$smarty->assign('grupoNumIdentificInternacional', $grupoNumIdentificInternacional);
	$smarty->assign('idTipoDocumento', $persona->getIdTipoDocumento());
	$smarty->assign('numDocumento', $persona->getNumDocumento());
	$smarty->assign('direccionCorreoElectronico', $persona->getDireccionCorreoElectronico());
	return $smarty->fetch('tpl_mod_libreta_mil_preinscripcion.html');
}

if(!is_null($persona) && is_object($persona) && $persona->getEstado_id() == "2")
{
	// Ya esta generado el tramite, reimprimir
	// Si entra en estado 2 ejecutamos el WS de solicitud de locacion
	$uriwsdl = "http://www.micrositios.us/~aacosta/ejercito/wsejercito/testServer2.php?wsdl";
	try { 
			$soapClient = @new SoapClient(
					$uriwsdl
					, array(
							"exceptions" => true
							, "trace" => true
							, "encoding" => 'ISO-8859-1'
					)
			); 
			$resp = $soapClient->verificarSolicitudLocacionExamenMedico($persona->getIdTipoDocumento(), $persona->getNumDocumento());
//			print_r($resp);
			if(is_array($resp) )
			{
					if( isset($resp['unidadMilitar']) )
					{
//														if( $resp['estadoMilitar'] == "DEFINIDO" )
//														{
//																$js .= "mostrarMensajeNormal('Su situaci&oacute;n militar es: <b style=\"color:green;\">". str_replace("'", "\'", $resp['estadoMilitar'])."</b>');";
//														}else
							{
									$smarty = new Smarty_Plantilla;
									$smarty->caching = false;
									$smarty->force_compile = true;

									echo $apellidosYNombres = $persona->getPrimerApellido()." ".$persona->getSegundoApellido()
											." ".$persona->getPrimerNombre()." ".$persona->getSegundoNombre();

									list($anoCitaMedica, $mesTextoCitaMedica, $diaCitaMedica) = explode("-", $resp['fechaCitaMedica']);
									list($horaCitaMedica, $minutosCitaMedica, $segundosCitaMedica) = explode(":", $resp['horaCitaMedica']);
									$smarty->assign('diaCitaMedica', "$diaCitaMedica");
									$smarty->assign('mesTextoCitaMedica', "$mesTextoCitaMedica");
									$smarty->assign('anoCitaMedica', "$anoCitaMedica");
									$smarty->assign('horaCitaMedica', "$horaCitaMedica");
									$smarty->assign('minutosCitaMedica', "$minutosCitaMedica");
									$smarty->assign('distritoMilitar', "{$resp['distritoMilitar']}");
									$smarty->assign('unidadMilitar', "{$resp['unidadMilitar']}");
									$smarty->assign('apellidosYNombres', "$apellidosYNombres");
									$smarty->assign('idTipoDocumento', $persona->getIdTipoDocumento());
									$smarty->assign('numDocumento', $persona->getNumDocumento());

//									$smarty->display("tpl_mod_libreta_mil_cita_medica.html");
									return $smarty->fetch("tpl_mod_libreta_mil_cita_medica.html");
							}
					}else
					{
						// Ocurrio un erro determinado la unidad militar
						echo "Servidor ocuapdo<br>";
					}
			}
	} catch (SoapFault $E) { 
			// Guardar en la BD el error
			$mensaje = str_replace(array("'", '"', chr(13)), array("", "", ", "), trim($E->faultstring));
			libretaMilValidaciones::guardarErrorSoap( $db, $uriwsdl, $mensaje, $idusuario );
			$js .= "mostrarMensajeError('Error2: ".$mensaje."');";
	}
	return "";
}

if( isset($_REQUEST['action']) )
{
	$arregloValidaciones = array(
		'idTipoDocumento' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo tipo de identificaci&oacute;n tiene un formato inv&aacute;lido", 'msgO' => "El tipo de identificaci&oacute;n es obligatorio" ),
		'numDocumento' => array( 'tv' => 'NUMERIC', 'o' => true, 'msgT' => "El campo n&uacute;mero de identificaci&oacute;n tiene un formato inv&aacute;lido", 'msgO' => "El n&uacute;mero de identificaci&oacute;n es obligatorio" ),
		'primerNombre' => array( 'tv' => 'GEL_primerNombre', 'o' => true, 'msgT' => "El campo primer nombre tiene un formato inv&aacute;lido", 'msgO' => "El primer nombre es obligatorio" ),
		'segundoNombre' => array( 'tv' => 'GEL_segundoNombre', 'o' => false, 'msgT' => "El campo segundo nombre tiene un formato inv&aacute;lido", 'msgO' => "El segundo nombre es obligatorio" ),
		'primerApellido' => array( 'tv' => 'GEL_primerApellido', 'o' => true, 'msgT' => "El campo primer apellido tiene un formato inv&aacute;lido", 'msgO' => "El primer apellido es obligatorio" ),
		'segundoApellido' => array( 'tv' => 'GEL_segundoApellido', 'o' => false, 'msgT' => "El campo segundo apellido tiene un formato inv&aacute;lido", 'msgO' => "El segundo apellido es obligatorio" ),
		'departamentoNacimiento' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo departamento de nacimiento tiene un formato inv&aacute;lido", 'msgO' => "El departamento de nacimiento es obligatorio" ),
		'municipioNacimiento' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo departamento de nacimiento tiene un formato inv&aacute;lido", 'msgO' => "El departamento de nacimiento es obligatorio" ),
		'direccionCorreoElectronico' => array( 'tv' => 'EMAIL', 'o' => true, 'msgT' => "El campo correo electronico tiene un formato inv&aacute;lido", 'msgO' => "El correo electronico es obligatorio" ),
		'sexo' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo sexo tiene un formato inv&aacute;lido", 'msgO' => "El campo sexo es obligatorio" ),
		'estadoConyugal' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo estado conyugal tiene un formato inv&aacute;lido", 'msgO' => "El campo estado conyugal es obligatorio" ),
		'nacionalidad' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo nacionalidad tiene un formato inv&aacute;lido", 'msgO' => "El campo nacionalidad es obligatorio" ),
		'direccionResidencia' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo direcci&oacute;n de residencia tiene un formato inv&aacute;lido", 'msgO' => "La direcci&oacute;n de residencia es obligatoria" ),
		'estrato' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo estrato tiene un formato inv&aacute;lido", 'msgO' => "El estrato es obligatorio" ),
		'telefonoFijo' => array( 'tv' => 'TEXT', 'o' => false, 'msgT' => "El campo tel&eacute;fono fijo tiene un formato inv&aacute;lido", 'msgO' => "El tel&eacute;fono fijo es obligatorio" ),
		'telefonoMovil' => array( 'tv' => 'TEXT', 'o' => false, 'msgT' => "El campo tel&eacute;fono movil tiene un formato inv&aacute;lido", 'msgO' => "El tel&eacute;fono movil es obligatorio" ),
		// profesio 'telefonoMovil' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo tel&acute;fono movil tiene un formato inv&aacute;lido", 'msgO' => "El tel&acute;fono movil es obligatoria" ),
		'codGrupoSanguineo' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo grupo sanguineo tiene un formato inv&aacute;lido", 'msgO' => "El grupo sanguineo es obligatorio" ),
		'rh' => array( 'tv' => 'RH', 'o' => true, 'msgT' => "El campo RH tiene un formato inv&aacute;lido", 'msgO' => "El RH es obligatoria" ),
		'etnica' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo pertenencia &eacute;tnica tiene un formato inv&aacute;lido", 'msgO' => "La pertenencia &eacute;tnica es obligatoria" ),
		'numHijos' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo n&uacute;mero de hijos tiene un formato inv&aacute;lido", 'msgO' => "El n&uacute;mero de hijos es obligatorio" ),
		'tallaCorporal' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo talla corporal (estatura) tiene un formato inv&aacute;lido", 'msgO' => "La talla corporal (estatura) es obligatoria" ),
		
//		'coordenadaX' => array( 'tv' => 'NUMERIC', 'o' => true, 'msgT' => "El campo coordenada X tiene un formato inv&aacute;lido", 'msgO' => "La coordenada X es obligatoria" ),
//		'paginaWeb' => array( 'tv' => 'URL', 'o' => false, 'msgT' => "El campo p&aacute;gina web tiene un formato inv&aacute;lido", 'msgO' => "La p&aacute;gina web es obligatoria" ),
//		'esDelSectorGalvanico' => array( 'td' => 'CHECKBOX' ),
//		'fechaConfirmacionDGA' => array( 'tv' => 'DATE', 'o' => true, 'msgT' => "El campo fecha de confirmaci&oacute;n del DGA tiene un formato inv&aacute;lido", 'msgO' => "La fecha de confirmaci&oacute;n del DGA es obligatoria" ),
//		'tienePermisoDeEmisiones' => array( 'td' => 'RADIO_SI_NO' ),
	);

	switch ($_REQUEST['action'])
	{
		case "aceptar_preinscripcion":
		{
//			Micrositios::printArray($_REQUEST);
			$persona = LibMilPersona::loadByMail($db, $requestSeguro);
			if( is_object($persona) && $persona->updateEstadoAceptacionRM3($db, "Si") )
			{
				$js .= "location.reload(true);";
			}
		}break;
	
		case "denegar_preinscripcion":
		{
//			Micrositios::printArray($_REQUEST);
			$persona = LibMilPersona::loadByMail($db, $requestSeguro);
			if( is_object($persona) && $persona->updateEstadoAceptacionRM3($db, "No") )
			{
				$js .= "location.reload(true);";
			}
		}break;
	
		case "cargar_municipios_nacimiento_x_depto":
		{
			$html_depto_id = Autenticacion::secureSQL($_REQUEST['html_depto_id']); // ID HTML del select depto
			$html_muncip_id = Autenticacion::secureSQL($_REQUEST['html_muncip_id']); // ID HTML del select muni
			$depto_id = Autenticacion::secureSQL($_REQUEST['depto_id']); // ID del departamento gel
			
			$gelDomMunicipios->getGELElements("/xsd:schema/xsd:simpleType/xsd:restriction/xsd:enumeration[starts-with(@value, '".$depto_id."')]", false);
			$gelMunicipios = $gelDomMunicipios->getSimpleArray();
			
			$js .= "document.getElementById(\"$html_muncip_id\").options.length = 0;";
			foreach ($gelMunicipios as $codMunicipio => $municipio) {
//				$js .= "objOption = document.createElement(\"option\");";
//				$js .= "objOption.text = \"". utf8_encode($municipio)."\";"; // En desarrollo
//				$js .= "objOption.value = \"".$codMunicipio."\";";
//				$js .= "document.getElementById(\"$html_muncip_id\").appendChild(objOption);";
				// El metodo anterior no funciona correcamten en IE 7 o 8
				$js .= "document.getElementById(\"$html_muncip_id\").options[document.getElementById(\"$html_muncip_id\").options.length] = new Option('".utf8_encode($municipio)."', '{$codMunicipio}');";
			}
			
		}break;
		
		case 'registro_solicitud':
		{
			if( isset($_REQUEST['estado_id_inicial']) && $_REQUEST['estado_id_inicial'] == "1"
				&& isset($_REQUEST['estado_id_final']) && $_REQUEST['estado_id_final'] == "1" )
			{
				$validarSoloTipos = true;
			}
			
//			Micrositios::printArray($requestSeguro);
			
			// Validamos los tipos de cedula dependiendo su formato:
			
			// Se aplican los modificadores del arreglo de validacion para poner o quitar las validaciones opcionales
			$modif = (isset($_REQUEST['telefonoFijo']) && $_REQUEST['telefonoFijo']=="");
			$arregloValidaciones['telefonoMovil']['o'] = $modif;
			$arregloValidaciones['telefonoFijo']['o'] = !$modif;
			
			$modif = (isset($_REQUEST['telefonoMovil']) && $_REQUEST['telefonoMovil']=="");
			$arregloValidaciones['telefonoFijo']['o'] = $modif;
			$arregloValidaciones['telefonoMovil']['o'] = !$modif;
			
			if( isset($_REQUEST['telefonoFijo']) && $_REQUEST['telefonoFijo']=="" && isset($_REQUEST['telefonoMovil']) && $_REQUEST['telefonoMovil']=="" )
			{
				$arregloValidaciones['telefonoFijo']['o'] = true;
				$arregloValidaciones['telefonoMovil']['o'] = false;
			}
			
			// pais y lugar de nacimiento
			
//			// generaVertimientos
//			$modif = (isset($_REQUEST['generaVertimientos']) && $_REQUEST['generaVertimientos']=="1");
//			$arregloValidaciones['numRegistroVertimientos']['o'] = 
//			$arregloValidaciones['numExpConcesionAguas']['o'] = 
//			$arregloValidaciones['numResolucionVertimientos']['o'] = 
//			$arregloValidaciones['fechaVertimientos']['o'] = 
//			$arregloValidaciones['vigenciaVertimientos']['o'] = $modif;
			
			$errores = array();
			
			if( $esAdministradorDGA )
			{
				/// Por solicitud del cliente, el administrador es capaz de guardar sin realizar validacion de campos obligatorios
				$validarSoloTipos = true;
			}
			
//			Micrositios::printArray($_REQUEST);
			$requestSeguro = libretaMilValidaciones::validarXArreglos( $_REQUEST, $arregloValidaciones, $errores, $validarSoloTipos );
//			Micrositios::printArray($requestSeguro);
//			Micrositios::printArray($errores);

			if( is_array($errores) && count($errores)>0 )
			{
				echo "Para continuar se deben corregir los siguientes problemas: <br>";
				$htmlErrores = "<table style=\"width:95%;background:#69C;text-align:center;background-position:center\">"
					."<tr>"
					."<td style=\"background:#F0F7FF;text-align:center\">"
	    			."<img src=\"./_templates/Default/recursos/images/auxiliares/msg_error.gif\" alt=\"Error\"/>"
					."<td style=\"background:#F0F7FF;text-align:left\">"
					."<ul>"
				;
				foreach ($errores as $errMsg) {
					$htmlErrores .= "<li>{$errMsg}</li>";
				}
				$htmlErrores .= "</ul>"
					."</td>"
					."</tr>"
					."</table>";
				echo $htmlErrores;
				break;
			}
			
			$requestSeguro['usuario_idusuario'] = $idUsuario;
			$requestSeguro['estado_id'] = Autenticacion::secureSQL( $_REQUEST['estado_id_final'] );

//			Micrositios::printArray($requestSeguro);
			
			$estado_por_defecto = "1";
			$solicitud_id = "".$requestSeguro['solicitud_id'];
			
			// Si El c&oacute;digo de la solicitud esta vacio es una crecion de solicitud
			if( $solicitud_id === "" )
			{
				/*die("Error, este caso no exite en RM3");*/
////				if( $requestSeguro['estado_id'] != $estado_por_defecto )
////				{
////					$js .= "alert('No es posible cambiar de estado en una solicitud que no se ha guardado al menos una vez');";
////					$js .= "location.reload(true);";
////					break;
////				}
//				
////				echo "Creando nueva solicitud<br>";
////				Micrositios::printArray($requestSeguro);
//				
//				// Aqui ya estamos listos para insertar en la base de datos
//				$requestSeguro['solicitudFechaCreado'] = date("Y-m-d");
//				
//				$db->BeginTrans();
//				
//				// Solicitud
//				if(!wf_solicitud::save( $db, $requestSeguro ))
//				{
//					echo "Error insertando la solicitud en la base de datos<br>";
//					$db->RollbackTrans();
//				}
//				else
//				{
//					$solicitud_id = $db->Insert_ID();
//					if( $solicitud_id === false )
//					{
//						$db->RollbackTrans();
//					}else
//					{
////						echo "ID Solicitud Generado: ".$solicitud_id."<br>";
//						$requestSeguro['solicitud_id'] = $solicitud_id;
//						$requestSeguro['auditoria_fechaModificacion'] = date("Y-m-d H:i:s");
//						
//						// Auditoria
//						if(!wf_auditoria::save( $db, $requestSeguro ))
//						{
//							echo "Error insertando la auditoria en la base de datos<br>";
//							$db->RollbackTrans();
//						}
//						else
//						{
//							$auditoria_id = $db->Insert_ID();
//							if( $auditoria_id === false )
//							{
//								$db->RollbackTrans();
//							}else
//							{
////								echo "ID Auditoria Generado: ".$auditoria_id."<br>";
//								$db->CommitTrans();
//								$js .= "$('#solicitud_id_ID').val('$solicitud_id');";
//								$js .= "$('#b_info_solicitud_id_ID').html('REGISTRO # $solicitud_id');";
//								$js .= "alert('La solicitud se creo satisfactoriamente');";
//								// Bugfix 20120525: es necesario modifcar los parametros del GET, de tal forma q con F5 no se pierda la referencia al acutal formulario creado
//								$js .= "toogleRotulos(false);"; // Deshabilitamos mientras se redirecciona
//								$js .= "location.href = location.href+'&solicitud_id=$solicitud_id';";
////								echo "Registro auditoria insertado correctamente<br>";
//								// En caso de que el usuario realizo radicacion sin haber guardado nunca.
////								$estado_por_defecto = "1";
////								if( $requestSeguro['estado_id'] != $estado_por_defecto )
////								{
////									$js .= "location.href = location.href+'&solicitud_id=$solicitud_id';";
////								}
//							}
//						}
//					}
//				}
//				
			}else // Cambio de estado en solicitud exitente
			{
				echo "Actualizando solicitud [$solicitud_id] existente<br>";
//				$solicitud = wf_solicitud::loadById( $db, $persona->getSolicitud_id() );
//				if( $solicitud === false )
//				{
//					$js .= "alert('Error: el formulario que se desea actualizar no existe.');";
//					break;
//				}
				
//				if( !$esAdministradorDGA )
//				{
////					if( $solicitud->getEstaActivoElRegistro() != $_REQUEST['estaActivoElRegistro'] )
////					{
////						echo "Error de acceso de seguridad, intento de modificacion del estado de un registro sin los privilegios para hacerlo.<br>";
////						break;
////					}
//				}

				$estado_id_antes_de_update = $persona->getEstado_id();
				
				// Si y solo si se se esta enviando de cualquier estado al primer estado estamos regresando la solicutd
				// por lo que es necesario guardar el detalle del cambio.
				if( $requestSeguro['estado_id'] != "1" ) // Estado al que se quiere cambiar
				{
					$requestSeguro['detalleModificacion'] = ""; // Reseteamos el comentario el cual solo quedara cuando se cancele
				}
				
				// Se valida que el usuario actual pueda realizar la accion seleccionada sobre el formulario solicitado
				$db->BeginTrans();
				
//				if(!wf_solicitud::update( $db, $requestSeguro ))
				
				if(!$persona->updateDataFromRequest( $db, $requestSeguro ))
				{
					echo "Error actualizando el registro (".$persona->getSolicitud_id().") en la base de datos<br>";
					$db->RollbackTrans();
				}else
				{
					// Actualizar estudios\
					if( !$persona->saveEstudios($db) )
					{
						echo "Error actualizando los estudios de la solicitud (".$persona->getSolicitud_id().") en la base de datos<br>";
						$db->RollbackTrans();
						break;
					}
					// Actualizar hermanos
					if( !$persona->saveHermanos($db) )
					{
						echo "Error actualizando los hermanos de la solicitud (".$persona->getSolicitud_id().") en la base de datos<br>";
						$db->RollbackTrans();
						break;
					}
					
//					$solicitud = wf_solicitud::loadById( $db, $solicitud_id ); // Solicitud actualizada
//					
					$requestSeguro['solicitud_id'] = $solicitud_id;
					$requestSeguro['auditoria_fechaModificacion'] = date("Y-m-d H:i:s");
//					$requestSeguro['estaActivoElRegistro'] = $persona->getEstaActivoElRegistro();
//					$requestSeguro['razonDeInactividadDelRegistro'] = $persona->getRazonDeInactividadDelRegistro();
//					if(!wf_auditoria::save( $db, $requestSeguro ))
//					{
//						echo "Error insertando la auditoria en la base de datos<br>";
//						$db->RollbackTrans();
//					}
//					else
					{
//						$auditoria_id = $db->Insert_ID();
//						if( $auditoria_id === false )
//						{
//							$db->RollbackTrans();
//						}else
						{
//							echo "ID Auditoria Generado: ".$auditoria_id."<br>";
							$db->CommitTrans();
//							$js .= "$('#solicitud_id_ID').val('$solicitud_id');";
//							$js .= "alert('".$solicitud->getEstado_id()." <-- ".$estado_id_antes_de_update."');";
//							echo "Registro auditoria insertado correctamente<br>";
//							$js .= "alert('La solicitud se modifico satisfactoriamente: {$persona->getEstado_id()} != $estado_id_antes_de_update');";
							$js .= "alert('La solicitud se modifico satisfactoriamente');";
							if( $persona->getEstado_id() != $estado_id_antes_de_update )
							{
								
								$js .= "toogleRotulos(false);"; // Deshabilitamos mientras se redirecciona
								$js .= "location.reload(true);";
							}
						}
					}
				}
			}
		}
		break;

		default:
			$bad_request = true;
			break;
	}

	if( $bad_request )
		return "";

	Micrositios::jsAction($js);
	
	/*exit();*/
}


//$solicitud = null;

// Miramos si el usuario ya tiene una solicitud en la base de datos

//$solicitud_id = $persona->getLib_mil_formulario_id();
//if( !is_null($solicitud_id) && is_numeric($solicitud_id) )
//{
//	$solicitud = wf_solicitud::loadById( $db, $solicitud_id );
//	if( $solicitud === false )
//	{
//		// Formulario solicitado no existe, creamos un objeto vacio para compatibilidad
//		$solicitud = new wf_solicitud();
//		$solicitud->setEstado_id("1");
//	}else
//	{
////		echo "solicitud: $solicitud_id encontrada<br>";
//		// Se valida que la solicitud encontrada sea del usuario actual y si puede hacer cambios o no
////		if( $esAdministradorDGA )
////		{
////			// Si es grupodga no hay validacion
////		}else
////		{
//			// No es un admin, si la solicitud no es del usuario logueado error
////			echo "Comparando $idUsuario != {$solicitud->getUsuario_idusuario()}<br>";
//			if( "$idUsuario" != $solicitud->getUsuario_idusuario() )
//			{
//				echo '<script type="text/javascript" language="Javascript">alert("El usuario no se encuentra registrado");</script>';
//				headerLocation("index.php?idcategoria=" . _SLOGIN . "&cat_origen=" . $idcategoria . "&archivo_origen=" . basename($_SERVER['PHP_SELF']) . "&msg=5");
//				die("Error, no estas autorizado a ver esta pagina");
//			}
////		}
//	}
//}else
//{
//	$solicitud_id = null;
//	$solicitud = new wf_solicitud();
//	$solicitud->setEstado_id("1");
//	$solicitud->setUsuario_idusuario($persona->getSolicitud_id());
//}

// Generacion de nuevo formulario vacio
$idEstadoSolicitud = $persona->getEstado_id();

$roll = false;
if( $esAdministradorDGA )
{
	$roll = _GRUPOADMINDGA;
}else
{
	$roll = '0'; // Sin grupo
}

$rotulos = wf_workflow::loadByInicialxLista($db, $idEstadoSolicitud, $roll);
//Micrositios::printArray($rotulos);
$htmlRotulos = "";
foreach($rotulos as $rotulo)
{
	$htmlRotulos .=
		"<input type='button'  class='rotulo' onclick='wf_action( this, \"$idSolicitud\", \"".$rotulo->getEstado_id_inicial()."\", \"".$rotulo->getEstado_id_final()."\" );' value='".$rotulo->getWorkFlow_rotulo()."' name='".str_replace(" ", "_",strtolower($rotulo->getWorkFlow_rotulo()))."' />"
		;
}

$smarty = new Smarty_Plantilla;

$smarty->caching = false;
// $smarty->debugging  = true;
$smarty->force_compile = true;

if( !is_null($persona->getDepartamentoNacimiento()) && !is_null($persona->getMunicipioNacimiento())
		&& $persona->getDepartamentoNacimiento() != "" && $persona->getMunicipioNacimiento() != "" )
{
	$gelDomMunicipios->getGELElements("/xsd:schema/xsd:simpleType/xsd:restriction/xsd:enumeration[starts-with(@value, '".$persona->getDepartamentoNacimiento()."')]");
	$smarty->assign('gelMunicipiosNacimiento', $gelDomMunicipios->getSimpleArray());
}

if( !is_null($persona->getDepartamentoResidencia()) && !is_null($persona->getMunicipioResidencia())
		&& $persona->getDepartamentoResidencia() != "" && $persona->getMunicipioResidencia() != "" )
{
	$gelDomMunicipios->getGELElements("/xsd:schema/xsd:simpleType/xsd:restriction/xsd:enumeration[starts-with(@value, '".$persona->getDepartamentoResidencia()."')]");
	$smarty->assign('gelMunicipiosResidencia', $gelDomMunicipios->getSimpleArray());
}

if( !is_null($persona->getDepartamentoEstudio()) && !is_null($persona->getMunicipioEstudio())
		&& $persona->getDepartamentoEstudio() != "" && $persona->getMunicipioEstudio() != "" )
{
	$gelDomMunicipios->getGELElements("/xsd:schema/xsd:simpleType/xsd:restriction/xsd:enumeration[starts-with(@value, '".$persona->getDepartamentoEstudio()."')]");
	$smarty->assign('gelMunicipiosEstudio', $gelDomMunicipios->getSimpleArray());
}

if( !is_null($persona->getDepartamentoEmpresa()) && !is_null($persona->getMunicipioEmpresa())
		&& $persona->getDepartamentoEmpresa() != "" && $persona->getMunicipioEmpresa() != "" )
{
	$gelDomMunicipios->getGELElements("/xsd:schema/xsd:simpleType/xsd:restriction/xsd:enumeration[starts-with(@value, '".$persona->getDepartamentoEmpresa()."')]");
	$smarty->assign('gelMunicipiosEmpresa', $gelDomMunicipios->getSimpleArray());
}

if( !is_null($persona->getDepartamentoResidenciaPadre()) && !is_null($persona->getMunicipioResidenciaPadre())
		&& $persona->getDepartamentoResidenciaPadre() != "" && $persona->getMunicipioResidenciaPadre() != "" )
{
	$gelDomMunicipios->getGELElements("/xsd:schema/xsd:simpleType/xsd:restriction/xsd:enumeration[starts-with(@value, '".$persona->getDepartamentoResidenciaPadre()."')]");
	$smarty->assign('gelMunicipiosResidenciaPadre', $gelDomMunicipios->getSimpleArray());
}

if( !is_null($persona->getDepartamentoEmpresaPadre()) && !is_null($persona->getMunicipioEmpresaPadre())
		&& $persona->getDepartamentoEmpresaPadre() != "" && $persona->getMunicipioEmpresaPadre() != "" )
{
	$gelDomMunicipios->getGELElements("/xsd:schema/xsd:simpleType/xsd:restriction/xsd:enumeration[starts-with(@value, '".$persona->getDepartamentoEmpresaPadre()."')]");
	$smarty->assign('gelMunicipiosEmpresaPadre', $gelDomMunicipios->getSimpleArray());
}

if( !is_null($persona->getDepartamentoResidenciaMadre()) && !is_null($persona->getMunicipioResidenciaMadre())
		&& $persona->getDepartamentoResidenciaMadre() != "" && $persona->getMunicipioResidenciaMadre() != "" )
{
	$gelDomMunicipios->getGELElements("/xsd:schema/xsd:simpleType/xsd:restriction/xsd:enumeration[starts-with(@value, '".$persona->getDepartamentoResidenciaMadre()."')]");
	$smarty->assign('gelMunicipiosResidenciaMadre', $gelDomMunicipios->getSimpleArray());
}

if( !is_null($persona->getDepartamentoEmpresaMadre()) && !is_null($persona->getMunicipioEmpresaMadre())
		&& $persona->getDepartamentoEmpresaMadre() != "" && $persona->getMunicipioEmpresaMadre() != "" )
{
	$gelDomMunicipios->getGELElements("/xsd:schema/xsd:simpleType/xsd:restriction/xsd:enumeration[starts-with(@value, '".$persona->getDepartamentoEmpresaMadre()."')]");
	$smarty->assign('gelMunicipiosEmpresaMadre', $gelDomMunicipios->getSimpleArray());
}

$smarty->assign('solicitud_id', $persona->getSolicitud_id() );
$smarty->assign('uid', $solicitud_id );
$smarty->assign('pid', $password );

$smarty->assign('esAdministradorDGA', $esAdministradorDGA);
//$smarty->assign('detalleModificacion', $solicitud->getDetalleModificacion());

$smarty->assign('idTipoDocumento', $persona->getIdTipoDocumento());
$smarty->assign('numDocumento', $persona->getNumDocumento());
$smarty->assign('grupoNumIdentificInternacional', $grupoNumIdentificInternacional);
$smarty->assign('grupoPaises', $grupoPaises);
$smarty->assign('gelDepartamentos', $gelDepartamentos);
$smarty->assign('grupoSexo', $grupoTipoSexo);
$smarty->assign('grupoNacionalidad', $grupoNacionalidad);
$smarty->assign('grupoPertenenciaEtnica', $grupoPertenenciaEtnica);
$smarty->assign('grupoEstadoConyugal', $grupoEstadoConyugal);
$smarty->assign('grupoTipoVivienda', $grupoTipoVivienda);
$smarty->assign('grupoSanguineo', $grupoSanguineo);
$smarty->assign('grupoNumHijos', $grupoNumHijos);
$smarty->assign('grupoEstrato', $grupoEstrato);
$smarty->assign('grupoRh', $grupoRh);
$smarty->assign('grupoNivelEducativo', $grupoNivelEducativo);
$smarty->assign('grupoModalidadAcademica', $grupoModalidadAcademica);
$smarty->assign('grupoEstudioAprobado', $grupoEstudioAprobado);
$smarty->assign('grupoCodProfesion', $grupoCodProfesion);
$smarty->assign('grupoCodEmpleo', $grupoCodEmpleo);
$smarty->assign('grupoSiNo', $grupoSiNo);
$smarty->assign('grupoNoSi', $grupoNoSi);

$smarty2 = new Smarty_Plantilla;
$smarty2->caching = false;
$smarty2->assign('grupoModalidadAcademica', $grupoModalidadAcademica);
$smarty2->assign('grupoEstudioAprobado', $grupoEstudioAprobado);
$smarty2->assign('grupoCodProfesion', $grupoCodProfesion);
$pos = 1;
if(is_array($persona->getEstudios())) foreach ($persona->getEstudios() as $estudio) {
	$smarty2->assign('numEdu', $pos);
	$smarty2->assign('modalidadAcademica', $estudio->getModalidadAcademica());
	$smarty2->assign('semestresAprobados', $estudio->getsemestresAprobados());
	$smarty2->assign('estudioAprobado', $estudio->getestudioAprobado());
	$smarty2->assign('nombreEstudios', $estudio->getnombreEstudios());
	$smarty2->assign('nombreEstablecimientoEstudios', $estudio->getnombreEstablecimientoEstudios());
	$smarty->assign('plantillaEstudios'.$pos, $smarty2->fetch("tpl_mod_libreta_mil_estudio.html"));
	$pos++;
}
if($pos <= 3)
{
	for($i=$pos; $i<=3; $i++)
	{
//		echo "agragando estudio $i<br>";
		$smarty2->assign('numEdu', $i);
		$smarty2->assign('modalidadAcademica', "");
		$smarty2->assign('semestresAprobados', "");
		$smarty2->assign('estudioAprobado', "");
		$smarty2->assign('nombreEstudios', "");
		$smarty2->assign('nombreEstablecimientoEstudios', "");
		$smarty->assign('plantillaEstudios'.$i, $smarty2->fetch("tpl_mod_libreta_mil_estudio.html"));
	}
}

$smarty3 = new Smarty_Plantilla;
$smarty3->caching = false;
$smarty3->assign('grupoCodEmpleo', $grupoCodEmpleo);
$pos = 1;
if(is_array($persona->getHermanos())) foreach ($persona->getHermanos() as $hermano) {
	$smarty3->assign('numHermano', $pos);
	$smarty3->assign('nombreHermano', $hermano->getnombreHermano());
	$smarty3->assign('fechaNacimientoHermano', $hermano->getfechaNacimientoHermano());
	$smarty3->assign('codEmpleoHermano', $hermano->getcodEmpleoHermano());
	$smarty3->assign('direccionResidenciaHermano', $hermano->getdireccionResidenciaHermano());
	$smarty->assign('plantillaHermano'.$pos, $smarty3->fetch("tpl_mod_libreta_mil_hermanos.html"));
	$pos++;
}
if($pos <= 3)
{
	for($i=$pos; $i<=3; $i++)
	{
//		echo "agragando hermano $i<br>";
		$smarty3->assign('numHermano', $i);
		$smarty3->assign('nombreHermano', "");
		$smarty3->assign('fechaNacimientoHermano', "");
		$smarty3->assign('codEmpleoHermano', "");
		$smarty3->assign('direccionResidenciaHermano', "");
		$smarty->assign('plantillaHermano'.$i, $smarty3->fetch("tpl_mod_libreta_mil_hermanos.html"));
	}
}

$smarty->assign('solicitud_id', $solicitud_id);
$smarty->assign('password', $password);

// print_r($persona);

$smarty->assign('primerNombre', $persona->getPrimerNombre());
$smarty->assign('segundoNombre', $persona->getSegundoNombre());
$smarty->assign('primerApellido', $persona->getPrimerApellido());
$smarty->assign('segundoApellido', $persona->getSegundoApellido());
$smarty->assign('direccionCorreoElectronico', $persona->getDireccionCorreoElectronico());
$smarty->assign('sexo', $persona->getSexo());
$smarty->assign('nacionalidad', $persona->getNacionalidad());
$smarty->assign('fechaNacimiento', $persona->getFechaNacimiento());
$smarty->assign('paisNacimiento', $persona->getPaisNacimiento());
$smarty->assign('otroLugarNacimiento', $persona->getOtroLugarNacimiento());
$smarty->assign('departamentoNacimiento', $persona->getDepartamentoNacimiento());
$smarty->assign('municipioNacimiento', $persona->getMunicipioNacimiento());
$smarty->assign('etnica', $persona->getEtnica());
$smarty->assign('direccionResidencia', $persona->getDireccionResidencia());
$smarty->assign('nomBarrioVereda', $persona->getNomBarrioVereda());

//^private \$([\w\d]+) = null;.*$
//\$smarty->assign\('$1', \$persona->get$1\(\)\);
//<!-- ^\s*private \$([\w\d]+) = null;.*$
//<part name='$1' type='xsd:string'/> -->
	
$smarty->assign('paisResidencia', $persona->getpaisResidencia());
$smarty->assign('otroLugarResidencia', $persona->getotroLugarResidencia());
$smarty->assign('departamentoResidencia', $persona->getdepartamentoResidencia());
$smarty->assign('municipioResidencia', $persona->getmunicipioResidencia());
$smarty->assign('tallaCorporal', $persona->gettallaCorporal());
$smarty->assign('pesoCorporal', $persona->getpesoCorporal());
$smarty->assign('codGrupoSanguineo', $persona->getcodGrupoSanguineo());
$smarty->assign('rh', $persona->getrh());
$smarty->assign('estrato', $persona->getestrato());
$smarty->assign('telefonoFijo', $persona->gettelefonoFijo());
$smarty->assign('telefonoMovil', $persona->gettelefonoMovil());
$smarty->assign('tieneSisben', $persona->gettieneSisben());
$smarty->assign('puntajeSisben', $persona->getpuntajeSisben());
$smarty->assign('estadoConyugal', $persona->getestadoConyugal());
$smarty->assign('nombreCompletoEsposa', $persona->getnombreCompletoEsposa());
$smarty->assign('numHijos', $persona->getnumHijos());
$smarty->assign('tipoVivienda', $persona->gettipoVivienda());

$smarty->assign('esEstudianteColegioMilitar', $persona->getEsEstudianteColegioMilitar());
$smarty->assign('nivelEducativo', $persona->getnivelEducativo());
$smarty->assign('institucionEducativa', $persona->getinstitucionEducativa());
$smarty->assign('departamentoEstudio', $persona->getdepartamentoEstudio());
$smarty->assign('municipioEstudio', $persona->getmunicipioEstudio());
$smarty->assign('fechaTerminacionEstudio', $persona->getfechaTerminacionEstudio());

$smarty->assign('codProfesion', $persona->getcodProfesion());
$smarty->assign('nombreEmpresa', $persona->getnombreEmpresa());
$smarty->assign('cargoEnEmpresa', $persona->getcargoEnEmpresa());
$smarty->assign('departamentoEmpresa', $persona->getdepartamentoEmpresa());
$smarty->assign('municipioEmpresa', $persona->getmunicipioEmpresa());
$smarty->assign('salario', $persona->getsalario());
$smarty->assign('nombrePadre', $persona->getnombrePadre());
$smarty->assign('codProfesionPadre', $persona->getcodProfesionPadre());
$smarty->assign('vivePadre', $persona->getvivePadre());
$smarty->assign('separadoPadre', $persona->getseparadoPadre());
$smarty->assign('direccionResidenciaPadre', $persona->getdireccionResidenciaPadre());
$smarty->assign('departamentoResidenciaPadre', $persona->getdepartamentoResidenciaPadre());
$smarty->assign('municipioResidenciaPadre', $persona->getmunicipioResidenciaPadre());
$smarty->assign('telefonoFijoPadre', $persona->gettelefonoFijoPadre());
$smarty->assign('nombreEmpresaPadre', $persona->getnombreEmpresaPadre());
$smarty->assign('fechaIngresoEmpresaPadre', $persona->getfechaIngresoEmpresaPadre());
$smarty->assign('direccionEmpresaPadre', $persona->getdireccionEmpresaPadre());
$smarty->assign('departamentoEmpresaPadre', $persona->getdepartamentoEmpresaPadre());
$smarty->assign('municipioEmpresaPadre', $persona->getmunicipioEmpresaPadre());
$smarty->assign('cargoEnEmpresaPadre', $persona->getcargoEnEmpresaPadre());
$smarty->assign('salarioPadre', $persona->getsalarioPadre());
$smarty->assign('nombreMadre', $persona->getnombreMadre());
$smarty->assign('codProfesionMadre', $persona->getcodProfesionMadre());
$smarty->assign('viveMadre', $persona->getviveMadre());
$smarty->assign('separadoMadre', $persona->getseparadoMadre());
$smarty->assign('direccionResidenciaMadre', $persona->getdireccionResidenciaMadre());
$smarty->assign('departamentoResidenciaMadre', $persona->getdepartamentoResidenciaMadre());
$smarty->assign('municipioResidenciaMadre', $persona->getmunicipioResidenciaMadre());
$smarty->assign('telefonoFijoMadre', $persona->gettelefonoFijoMadre());
$smarty->assign('nombreEmpresaMadre', $persona->getnombreEmpresaMadre());
$smarty->assign('fechaIngresoEmpresaMadre', $persona->getfechaIngresoEmpresaMadre());
$smarty->assign('direccionEmpresaMadre', $persona->getdireccionEmpresaMadre());
$smarty->assign('departamentoEmpresaMadre', $persona->getdepartamentoEmpresaMadre());
$smarty->assign('municipioEmpresaMadre', $persona->getmunicipioEmpresaMadre());
$smarty->assign('cargoEnEmpresaMadre', $persona->getcargoEnEmpresaMadre());
$smarty->assign('salarioMadre', $persona->getsalarioMadre());

$smarty->assign('estado_id', $persona->getestado_id());
$smarty->assign('detalleModificacion', $persona->getdetalleModificacion());

$smarty->assign('htmlRotulos'        ,$htmlRotulos);

return $smarty->fetch('tpl_mod_libreta_mil_formulario_rm3.html');

?>