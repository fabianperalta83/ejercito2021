<?php
/**
 * Archivo que permite la Activación de los nuevos Usuarios
 *
 * @package MicrositiosCMS
 * @author Manuel Herrera <mherrera@micrositios.net>
 **/

define("_IDIDIOMA",0);
require_once("../config/config_db.php");
require_once("../config/config_global.php");
/** Para los nuevos portales con subsitios **/
@require_once('../templates/Default/config.php');
$db	= $GLOBALS["db"];

/**
	Verificación de que solo se esté enviando un parámetro por GET
	y que este tenga la estructura válida 
**/
$cad	= key($_GET);
$cad	= explode("M2C5MS",$cad);

if(!(isset($_GET["debug"]))){
	count($_GET) > 1 ? header("Location: ../msg=Validacion+Incorrecta+1") : null;
	count($cad) <> 2 ? header("Location: ../msg=Validacion+Incorrecta+2") : null;
}else{
	echo "<pre>";
	print($_GET);
	print($cad);
}
/**
	Verificar que el usuario sea el correcto
**/

$q1	= "select * from "._TBLUSUARIO." where idusuario=".$cad[0];
$r1	= $db["ejecutar"]($q1);
if($db["num_rows"]($r1) == 1){
	$d1	= $db["fetch_array"]($r1);
	$va	= preg_replace("/[^a-zA-Z0-9]+/","",crypt($d1["email"]."|".$d1["password"],"mytdsf8"));
	
	if(isset($_GET["debug"])){
		print($va);
		print($cad[1]);
		echo "</pre>";
		/*exit;*/
	}
	
	if($cad[1] == $va){
		$q1	= "update "._TBLUSUARIO." set activo=1 where idusuario=".$cad[0];
		$db["ejecutar"]($q1);
		header("Location: ../?idcategoria="._SMICUENTA."&msg=Validacion+Exitosa");
	}else{
		header("Location: ../?msg=Validacion+Incorrecta+3");
	}
}else{
	header("Location: ../?msg=Validacion+Incorrecta+4");
}
?>