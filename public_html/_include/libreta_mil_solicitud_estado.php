<?php
/*
CREATE  TABLE `ejercito_aacosta`.`err_soap` (
  `iderr` INT NOT NULL ,
  `uriwsdl` VARCHAR(1024) NOT NULL ,
  `mensaje` VARCHAR(1024) NOT NULL ,
  `fecha` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `idusuario` INT NULL ,
  PRIMARY KEY (`iderr`) )
ENGINE = InnoDB;




 */

return ""; // Se subio este cambio temporalemten para que no muestre la categoria

ini_set("display_erros", "on");

if( isset($_REQUEST['action']) )
{
	// Validacion de peticion AJAX
	
	require_once('../_config/constantes.php'); //CARGA LAS CONSTANTES DEL PORTAL

	session_name(preg_replace('/\s+/', '', strtolower(_DBNAME)));
	session_start();
	
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
	
//	if( session_id() == "" || !isset($_SESSION['info_usuario']) || !isset($_SESSION['info_usuario']['username']) || $_SESSION['info_usuario']['username'] == "" )
//	{
//		headerLocation("index.php?idcategoria=" . _SLOGIN . "&cat_origen=" . $idcategoria . "&archivo_origen=" . basename($_SERVER['PHP_SELF']) . "&msg=5");
//		exit;
//	}	
}

require_once(_DIRCORE  . "Funciones.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once(_DIRCORE  . "Autenticacion.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once(_DIRCORE  . "Validacion.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once(_RUTABASE . "_config/variables.php"); // CARGA LAS VARIABLES DEL PORTAL
require_once(_RUTABASE . "_lib/Micrositios.class.php"); // Funciones para manejo de Ajax y conversiones
require_once(_DIRLIB   . 'wf/classes.inc.php');
require_once(_DIRLIB.'smarty/libs/Smarty.class.php');
require_once("libreta_mil_validaciones.php");
//require_once(_DIRLIB   . 'wf/LibMilPersona.class.php');

global $db;      //Conexion a MySQL

$idusuario = null;
if( isset($_SESSION['info_usuario']) && isset($_SESSION['info_usuario']['idusuario']) )
	$idusuario   = $_SESSION['info_usuario']['idusuario'];

/*************************** TEST CODE ****************************************/
// define("_CATEGORIA_FORMULARIO_RM3", 333243);
if( !defined("_CATEGORIA_FORMULARIO_RM3") )
{
	trigger_error("La variable de subsitio _CATEGORIA_FORMULARIO_RM3 no ha sido definida", E_USER_WARNING);
	define("_CATEGORIA_FORMULARIO_RM3", 333243);
}
/*************************** TEST CODE ****************************************/

//Micrositios::printArray($_REQUEST);

$grupoNumIdentificInternacional = array(
	'RE' => "REGISTRO CIVIL"
	, 'TI' => "TARJETA IDENTIDAD"
	, 'CC' => "C&Eacute;DULA CIUDADAN&Iacute;A"
	, 'CE' => "C&Eacute;DULA EXTRANJER&Iacute;A"
);

$valoresAnnosCertificacion = array();
for ($ii = date("Y"); $ii >= 1980; $ii--)
	$valoresAnnosCertificacion[$ii] = $ii;

$js = "";

if( isset($_REQUEST['action']) )
{
	$arregloValidaciones = array(
		'idTipoDocumento' => array( 'tv' => 'TEXT', 'o' => true, 'msgT' => "El campo tipo de identificaci&oacute;n tiene un formato inv&aacute;lido", 'msgO' => "El tipo de identificaci&oacute;n es obligatorio" ),
		'numDocumento' => array( 'tv' => 'NUMERIC', 'o' => true, 'msgT' => "El campo n&uacute;mero de identificaci&oacute;n tiene un formato inv&aacute;lido", 'msgO' => "El n&uacute;mero de identificaci&oacute;n es obligatorio" ),
		'direccionCorreoElectronico' => array( 'tv' => 'EMAIL', 'o' => false, 'msgT' => "El campo correo electronico es inv&aacute;lido", 'msgO' => "El correo electronico es obligatorio" ),
	);
	
	$validarSoloTipos = false; // Util para que el formulario se almacene sin los campos obligatorios pero q la informacion se valida

	$errores = array();
	
//	Micrositios::printArray($_REQUEST);
        
	switch ($_REQUEST['action'])
	{
		case "reenviar_email_password":
		{
			$persona = LibMilPersona::load($db, $requestSeguro);
			if( $persona === false )
			{
				echo "Los datos ingresados son invalidos<br>";
				break;
			}
			
			if( $persona->enviarEmailPassword() )
			{
				echo "El correo electronico se env&iacute;o correctamente<br>";
			}else
			{
				echo "Hubo un error enviando el correo electronico<br>";
			}
			
		}break;
		
            case "enviar_solicitud_password":
            {
				$requestSeguro = libretaMilValidaciones::validarXArreglos( $_REQUEST, $arregloValidaciones, $errores, $validarSoloTipos );

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

				$persona = LibMilPersona::load($db, $requestSeguro);
				if( $persona === false )
				{
					$personaXMail = LibMilPersona::loadByMail($db, $requestSeguro);
					if( $personaXMail === false )
					{
						if( !isset($requestSeguro['direccionCorreoElectronico']) || $requestSeguro['direccionCorreoElectronico'] == "" )
						{
							echo "El campo correo electronico es obligatorio<br>";
							break;
						}
						
//						if( !isset($requestSeguro['idTipoDocumento']) || $requestSeguro['idTipoDocumento'] == "" )
//						{
//							echo "El campo tipo de documento es obligatorio<br>";
//							break;
//						}
//						
//						if( !isset($requestSeguro['numDocumento']) || $requestSeguro['numDocumento'] == "" )
//						{
//							echo "El campo numero de documento es obligatorio<br>";
//							break;
//						}
//						
//						if( !Validacion::isEmail($requestSeguro['direccionCorreoElectronico']) )
//						{
//							echo "El campo correo electronico tiene un formato invalido<br>";
//							break;
//						}
						
						$persona = LibMilPersona::guardarYGenerarPassword($db, $requestSeguro);
						if( $persona === false )
						{
								echo "Ocurrio un error generando la contrase&ntilde;a<br>";
						}else
						{
							if( $persona->enviarEmailPassword() )
							{
								echo "El correo electronico se env&iacute;o correctamente<br>";
							}else
							{
								echo "Hubo un error enviando el correo electronico<br>";
							}
							die();
						}
					}else
					{
						echo "La direcci&oacute;n de correo electronico ya existe para un usuario diferente<br>";
						break;
					}
				}else
				{
					echo "La solicitud de contrase&ntilde;a ya existe para este documento de identidad<br/>";
					echo "<a href='#' onclick='reenviarSolicitudDePassword(this); return false;'>Reenviar correo electronico</a><br/>";
					break;
				}
            }break;

            case "enviar_solicitud_estado":
            {
				$arregloValidaciones['direccionCorreoElectronico']['o'] = true;
				$requestSeguro = libretaMilValidaciones::validarXArreglos( $_REQUEST, $arregloValidaciones, $errores, $validarSoloTipos );

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

				$persona = LibMilPersona::load($db, $requestSeguro);
				// if( $persona === false )
				{
					if( $persona !== false && $persona->getEstado_id() == "1" )
					{
						echo "La solicitud de contrase&ntilde;a ya existe para este documento de identidad<br/>";
						echo "<a href='#' onclick='reenviarSolicitudDePassword(this); return false;'>Reenviar correo electronico</a><br/>";
						break;
					}
					// OTROS ESTADOS
					else
					{
//						if( !isset($requestSeguro['idTipoDocumento']) || $requestSeguro['idTipoDocumento'] == "" )
//						{
//							echo "El campo tipo de documento es obligatorio<br>";
//							break;
//						}
//						
//						if( !isset($requestSeguro['numDocumento']) || $requestSeguro['numDocumento'] == "" )
//						{
//							echo "El campo numero de documento es obligatorio<br>";
//							break;
//						}
						
						// Creacion del ws cliente para verificar estado
//						$soapClient = null;
						$uriwsdl = "http://www.micrositios.us/~aacosta/ejercito/wsejercito/testServer.php?wsdl";
						try { 
								$soapClient = @new SoapClient(
										$uriwsdl
										, array(
												"exceptions" => true
												, "trace" => true
												, "encoding" => 'ISO-8859-1'
										)
								); 
								$resp = $soapClient->verificarSolicitudEstadoMilitar($requestSeguro['idTipoDocumento'], $requestSeguro['numDocumento']);
								if(is_array($resp) )
								{
										if( isset($resp['estadoMilitar']) )
										{
												if( $resp['estadoMilitar'] == "DEFINIDO" )
												{
														$js .= "mostrarMensajeNormal('Su situaci&oacute;n militar es: <b style=\"color:green;\">". str_replace("'", "\'", $resp['estadoMilitar'])."</b>');";
												}else
												{
														$smarty = new Smarty_Plantilla;

														$smarty->caching = false;
	//							$smarty->debugging  = true;
														$smarty->force_compile = true;

														$smarty->display("tpl_mod_libreta_mil_formulario_clave_rm3.html");

														break;
												}
										}
								}
						} catch (SoapFault $E) { 
								// Guardar en la BD el error
								$mensaje = str_replace(array("'", '"', chr(13)), array("", "", ", "), trim($E->faultstring));
								libretaMilValidaciones::guardarErrorSoap( $db, $uriwsdl, $mensaje, $idusuario );
								$js .= "mostrarMensajeError('Error2: ".$mensaje."');";
						}
					}
				}

            }
	}

	Micrositios::jsAction($js);
	
	exit();
}

$smarty = new Smarty_Plantilla;

$smarty->caching = false;
$smarty->debugging  = true;
$smarty->force_compile = true;

$smarty->assign('grupoNumIdentificInternacional', $grupoNumIdentificInternacional);

return $smarty->fetch('tpl_mod_libreta_mil_solicitud_estado.html');

?>