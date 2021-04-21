<?php

ini_set('display_errors', 'on');

require_once("_config/constantes.php"); //CARGA LAS CONSTANTES DEL PORTAL
require_once(_DIRCORE . "Funciones.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once("_config/variables.php"); // CARGA LAS VARIABLES DEL PORTAL
require_once("_config/autenticacion.php"); // AUTENTICA EL USUARIO EN EL PORTAL
require_once(_DIRLIB_ADMIN . "Smarty.class.php");
require_once(_DIRCORE . 'Validacion.class.php');



global $db;   //Conexion a la bd Portal
global $db2;  //Conexion a Oracle
global $dbSII;
global $idcategoria;


/*if ($_SESSION['info_usuario']['username'] != '') {
	$ced_user = $_SESSION['info_usuario']['identificacion'];
*/
	$smarty = new Smarty_Plantilla; //Creamos la plantilla


	$pagina = basename($_SERVER['PHP_SELF']);
	$pagina .= sprintf("?idcategoria=%s", $idcategoria);

//	$smarty->assign('cadena_meses', $meses);
//	$smarty->assign('cadena_year', $years);

	//$smarty->assign('cadena_nombre', $ced_nombre);
	$smarty->assign('c_continuar', "Continuar");
	$smarty->assign('idcategoria', $idcategoria);
	return $smarty->fetch('tpl_duplicadoLibretaMilitar.html');
/*	$smarty->assign('usuario', $_SESSION['info_usuario']['identificacion']);
	
	
	
} else {
	headerLocation("index.php?idcategoria=" . _SLOGIN . "&cat_origen=" . $idcategoria . "&archivo_origen=" . basename($_SERVER['PHP_SELF']) . "&msg=5");
	exit;
}*/
?>