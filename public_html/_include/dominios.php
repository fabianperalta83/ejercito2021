<?php
ini_set('display_errors','on');
require_once("../_config/constantes.php");      //CARGA LAS CONSTANTES DEL PORTAL
require_once(_DIRCORE."Funciones.class.php");   // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once("../_config/variables.php");       // CARGA LAS VARIABLES DEL PORTAL
global $db;

$query1="SELECT autor FROM categoria WHERE autor LIKE '%www%' AND activa = 1 AND template <> ''";
$respuesta=$db->GetAll($query1);

foreach($respuesta as $key => $data){
	echo $data['autor'];
}

?>

