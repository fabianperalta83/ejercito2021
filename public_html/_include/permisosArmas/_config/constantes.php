<?php

/* Aplicacion permisos armas 
   
*/
global $idcategoria; /** ID de la categoria actual */
global $db; /** @see variables.php -- Conexión ya establecida a la base de datos */

/* Definiciones Constantes Aplicacion */
define("NOMBREAPP","partePersonal");
define('_DIR_ABS_APP',dirname(__FILE__).'/../'); //DIRECTORIO BASE DEL MODULO
define('_DIR_LIB_APP',_DIR_ABS_APP.'_lib/');
//define('_DIR_CONF_APP',_DIR_ABS_APP.'/_conf/');
$dirPlantilla    = _DIR_ABS_APP."_templates/Default/";

//$dircore =_DIR_ABS_APP."_lib/core/";
//$dirconf =_DIR_ABS_APP."_config/";

/* Directorio de las Plantillas*/
require(_DIR_LIB_APP."Smarty_Aplicacion.class.php");
;
$smartyApp       = new Smarty_Aplicacion($dirPlantilla);

/* ------------------------------------- */
define("_TBL_ARMAPERMISO","armaPermiso");

?>