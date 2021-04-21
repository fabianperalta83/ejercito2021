<?php

// Modifique UNICAMENTE la informacion entre parentesis DESPUES de la coma
// NO modifique la palabra en mayúsculas

// Archivo 
define("_NOMBRE_USUARIO" ,"User");
define("_IMAGEN_TITULO"  ,"Image Title");
define("_FECHA" ,"Date");
define("_DESCRIPCION" ,"Description");
define("_IMAGEN_ARCHIVO" ,"Image File");
define("_ACCION_ENVIAR_IMAGEN" ,"Pubish Image");
define("_ACEPTAR_CONDICIONES" ,"I accept agrement");



/* Mensajes de error validacion */

global $mensajeError;	
$mensajeError = array(
                   "_ERROR_isAlpha"=>" field must have only alphabetic characters",
                   "_ERROR_isEmpty"=>" field cant be empty",
                   "default"       =>" Invalid");

class textoErrorValidacion
{
	
}
/* 
define("" ,"");
*/

?>