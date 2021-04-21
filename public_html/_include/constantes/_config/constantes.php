<?php

/* Aplicacion centroVacacional 
   
*/
global $idcategoria;
global $db;

/* Definiciones genericas todas las aplicaciones */
define("NOMBREAPP","constantes");
define('_DIR_ABS_APP',_DIRINCLUDE.NOMBREAPP."/");

$dircore =_DIR_ABS_APP."_lib/core/";
$dirconf =_DIR_ABS_APP."_config/";

/* Directorio de las Plantillas*/
require($dircore."Smarty_Aplicacion.class.php");
$dirPlantilla    = _DIR_ABS_APP."_templates/Default/";
$smartyApp       = new Smarty_Aplicacion($dirPlantilla);

/* ------------------------------------- */


?>