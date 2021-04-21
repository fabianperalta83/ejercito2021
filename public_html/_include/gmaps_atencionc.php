<?php
/**********************************************************/
/* Listado de reporte de Alertas */
/**********************************************************/

/** SOLICITUD DE ARCHIVOS REQUERIDOS **/

require_once(_DIRLIB.'pqr/FuncionesPQR.php');
require_once(_DIRLIB.'smarty/libs/Smarty.class.php');
require_once(_DIRCORE.'Validacion.class.php');
require_once(_DIRCORE.'Funciones.class.php');
require_once(_DIRLIB.'pqr/Solicitante.class.php');
require_once(_DIRLIB.'pqr/Solicitud.class.php');
require_once(_DIRLIB.'pqr/Transaccion.class.php');
require_once(_DIRCORE.'GeneraXml.class.php');

/** PASO DE VARIABLES A LA PLANTILLA DE SMARTY **/
/* Se crea una nueva instancia de Smarty */
$smarty = new Smarty_Plantilla();

return $smarty->fetch('tpl_gmaps_atencionc.html');

?>

