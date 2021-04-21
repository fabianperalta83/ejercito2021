<?php
//ini_set('display_errors', '1');
require_once("_config/constantes.php"); //CARGA LAS CONSTANTES DEL PORTAL
require_once(_DIRCORE . "Funciones.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once("_config/variables.php"); // CARGA LAS VARIABLES DEL PORTAL
require_once("_config/autenticacion.php"); // AUTENTICA EL USUARIO EN EL PORTAL
require_once(_DIRLIB_ADMIN . "Smarty.class.php");
require_once(_DIRCORE . 'Validacion.class.php');
$smarty = new Smarty_Plantilla;

global $db;
/* traer los puntos para marcar en el mapa */


$idpadre = _SECCION_MAPA_REGIONALES;

$query_get_puntos 		= sprintf("SELECT nombre, antetitulo, entradilla, subtitulo from %s WHERE idpadre = %s AND activa != 0 ", _TBLCATEGORIA, $idpadre);

$result_query_puntos 	= $db->GetAll($query_get_puntos);

$array_obj_puntos = [];
if($result_query_puntos != ""){
	foreach ($result_query_puntos as $obj) {
		$nombre 	= $obj["subtitulo"];
		$url 		= "index.php?idcategoria=".$obj["antetitulo"];
		$exp_coo 	= explode(",", $obj["entradilla"]);
		$lat 		= $exp_coo[0];
		$lon 		= $exp_coo[1];
 		$array_obj_puntos[] = 	array(
									'title' => $nombre
									,'lat' 	=> $lat
									,'lon' 	=> $lon
									,'url' 	=> $url
								);
	}
	$json_puntos = json_encode($array_obj_puntos);

}else{
	$json_puntos = "empty";
}

$smarty->assign('json_puntos'    ,$json_puntos);
$smarty->assign('web_url'    , _URL);
return $smarty->fetch('tpl_unidades.html');

?>