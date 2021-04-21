<?php

/* Incluye las librerias basicas */
require_once(_DIRLIB.'pqr/funciones_pqr.php');

/* Guarda la linea de inslusión de la hoja de estilos en una variable */
$hoja_estilos='<link href="'._DIRCSS.'estilo_pqr.css" rel="stylesheet" type="text/css">';

/* Almacena el vínculo de descarga del archivo XML generado en una variable */
$link_descarga=generaXml();

/* Construye el resultado que se devolvera al portal */
$resultado=$hoja_estilos.$link_descarga;

/* Devuelve el resultado */
return $resultado;

?>
