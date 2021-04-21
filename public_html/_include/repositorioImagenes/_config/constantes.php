<?php

/* Aplicacion repositorioImagenes 
   
*/
global $idcategoria;

/* Definiciones genericas todas las aplicaciones */
define("NOMBREAPP","repositorioImagenes");
/*************************************************/



define('_DIR_ABS_APP',_DIRINCLUDE.NOMBREAPP."/");

$dircore       =_DIR_ABS_APP."_lib/core/";
$dirconf       =_DIR_ABS_APP."_config/";
$_dirinterfaz  =_DIR_ABS_APP."_interfaz/"; 

/* Directorio de las Plantillas*/
require($dircore."Smarty_Aplicacion.class.php");
$dirPlantilla  = _DIR_ABS_APP."_templates/Default/";
$smartyApp     = new Smarty_Aplicacion($dirPlantilla);

/* ------------------------------------- */
//La categoria que se designa como padre de las imagenes que se suben al servidor
define("_CATEGORIA_PADREUPLOAD",208613);
//Define un subdirectorio relativo dentro del directorio de imagenes
define("_DIR_IMG_APORTADAS","");

/* ---------------------------------------------------------------
constantes temporales de las categorias que componen la aplicacion
TODO: realizar una busqueda por nombre para adquirir el idautomaticamente
asi se evita tanta configuradera manual de esta aplicacion
*/
global $CAT_PUBLICACIONCORRECTA;
$CAT_ADVERTENCIA         = 208610;
$CAT_REPOSITORIOIMG      = 208611;
$CAT_PUBLICACIONCORRECTA = 208612;
$CAT_GALERIAREVISION     = 208613;
$CAT_GALERIAREAL         = 209071;

/**
 * ***************************************************
 * ****************CARGAMOS EL ARCHIVO DE IDIOMA******
 * *****************                      ************
 *   
 */
//msgError("idioma:".$_dirinterfaz.'idiomas/lang_'._IDIOMA.'.php');
if (file_exists($_dirinterfaz.'idiomas/lang_'._IDIOMA.'.php')){
require_once($_dirinterfaz.'idiomas/lang_'._IDIOMA.'.php');
}


/**
 * ***************************************************
 * ****************DEFINICION ERRORES           ******
 * *****************                      ************
 *   
 */



?>