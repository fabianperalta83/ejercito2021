<?php

// Modifique UNICAMENTE la informacion entre parentesis DESPUES de la coma
// NO modifique la palabra en mayúsculas

// Archivo 
define("_NOMBRE_USUARIO" ,"Usuario");
define("_IMAGEN_TITULO"  ,"Titulo Imagen");
define("_FECHA" ,"Fecha");
define("_DESCRIPCION" ,"Descripcion");
define("_IMAGEN_ARCHIVO" ,"Archivo Imagen");
define("_ACCION_ENVIAR_IMAGEN" ,"Publicar Imagen");
define("_ACEPTAR_CONDICIONES" ,"los terminos y  condiciones");

/* revision imagenes por el editor apropiado*/
define("_ACEPTAR_IMAGEN" ,"Aceptar imagen");
define("_RECHAZAR_IMAGEN" ,"Rechazar imagen");


/* Mensajes de error validacion */

global $mensajeError;	
$mensajeError = array(
                   "_ERROR_isAlpha"=>" debe tener solo caracteres Alfabeticos",
                   "_ERROR_isEmpty"=>" es obligatorio no puede estar vacio",
                   "_ERROR_isTexto"=>" invalido tiene caracteres no permitidos",
                   "default"       =>" Invalido");
                   
?>