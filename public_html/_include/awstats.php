<?php
/*
*	Creacion de archivos .conf para Awstats
*	@AUTHOR: Farez Jair Prieto Castro
*   @DATE:	 10 Marzo 2009
*	Este codigo permite generar el archivo de configuración de las estadisticas de awstats para
*	cada subsitio del portal. Las variables usadas	para configurar este archivo son:
*	$ruta: esta variable contiene la ruta desde donde se lee el archivo modelo de awstats.
*	$ruta2: variable que lleva la ruta dopnde se crearan los archivos de configuración.
*	$prefijo: esta variable lleva la primer parte del nombre del archivo de configuración
*	$extension: contiene el tipo de archivo que se creara en este caso sera .conf
*	$expresion: esta variable lleva la expresion regular que busca dentro del archivo modelo el texto SiteDomain=""
*/
//funcion que limpia el dominio del subsitios de catarteres especiales y espacios
function reemplazoCaracteres($texto_reemplazo)
{
	//reemplazo caracteres extraños y espacios en el texto que recibe la funcion
	$dominio	=	html_entity_decode($texto_reemplazo);
	$dominio	=	str_replace(' ','',$dominio);
	$dominio	=	str_replace('á','',$dominio);
	$dominio	=	str_replace('é','',$dominio);
	$dominio	=	str_replace('í','',$dominio);
	$dominio	=	str_replace('ó','',$dominio);
	$dominio	=	str_replace('ú','',$dominio);
	$dominio	=	str_replace('ä','',$dominio);
	$dominio	=	str_replace('ë','',$dominio);
	$dominio	=	str_replace('ï','',$dominio);
	$dominio	=	str_replace('ö','',$dominio);
	$dominio	=	str_replace('ü','',$dominio);
	$dominio	=	str_replace('à','',$dominio);
	$dominio	=	str_replace('è','',$dominio);
	$dominio	=	str_replace('ì','',$dominio);
	$dominio	=	str_replace('ò','',$dominio);
	$dominio	=	str_replace('ù','',$dominio);
	$dominio	=	str_replace('ñ','n',$dominio);
	$dominio	=	str_replace('Ñ','N',$dominio);
	//retorno el texto transformado
	return $dominio;
}
//hago visible la variable de la conexion a al base de datos


ini_set('display_errors','Off');

global $db;
//ruta del archivo modelo de awstats
$ruta		=	"/app/tools/awstats/awstats.model.conf";
//ruta donde se guardaran los nuevos archivos
$ruta2		=	"/etc/awstats/";
//prefijo del nombre del archivo
$prefijo	=	'awstats.';
//extencion del archivo
$extension	=	'.conf';
//expresion reular del texto a buscar
$expresion	=	'[ ]*(SiteDomain="){1}[a-zA-Z0-9.:/_?&-]+("){1}[ ]*';
//creo la consulta que me traera que categorias son subsitios, que esten activas, que no esten eliminadas y que traigan texto en el campo autor
$consulta	=	sprintf("SELECT * FROM categoria WHERE es_root=1 and eliminado=0 and activa=1 and autor!=''");
//ejecuto la consulta
$resultado	=	$db->Execute($consulta);
//asigno el contador de la catidad de archivos
$cantidad	=	0;
//variable de los mensajes
$mensaje	=	array();

//valida si existe el archivo modelo de awstats
if(!file_exists($ruta))
{
	//si no existe retorna mensaje de error
	return "No se encontro el archivo modelo de Awstarts";
}
//leo el contenido del archivo modelo de awstats y lo asigno a la variable $texto
$texto_plantilla = file_get_contents($ruta);
$mensaje[]='Se leyo correctamente el archivo plantilla <b>'.$ruta.'</b>';


//valido si la ruta2 existe, si no existe crea la carpeta en esa ruta
if(!file_exists($ruta2))
{
	if(!mkdir($ruta2,0777))
	{	
		$mensaje[]='No se pudo crear la carpeta <b>'.$ruta2.'</b>';
		return implode("<br>",$mensaje);
	}
}
$mensaje[]='La carpeta de destino es <b>'.$ruta2.'</b>';
//nueva carpeta la hago igual a la nueva ruta
$nueva_carpeta = $ruta2;
//recorro el resultado
while(!$resultado->EOF)
{
	//variable que lleva el texto de la plantilla 
	$texto	=	$texto_plantilla;
	//le aplico los saltos de linea, esto solo aplica para mostrarlo en pantalla
	//$texto = nl2br($texto); 
	//uso una expresion regular paera buscar la cadena de texto SiteDomain="y cualquier cadena de texto"
	$texto	=	ereg_replace($expresion,'SiteDomain="'.$resultado->fields['autor'].'"',$texto);
	//elimino espacios y caracteres raros del dominio del sitio para que el nombre del archivo no quede mal estructurado
	$dominio	=	reemplazoCaracteres($resultado->fields['autor']);
	//creo el archivo .conf en la ruta acabada de crear
	$nuevo_archivo	=	fopen($nueva_carpeta.$prefijo.$dominio.$extension,'w');
	//escribo la información del nuevo archivo
	fwrite($nuevo_archivo,$texto);
	//incremento el contador;
	$cantidad++;
	//cierro el archivo
	fclose($nuevo_archivo);
	$mensaje[]=sprintf("se creo el archivo <b>%s</b>",$prefijo.$dominio.$extension);
	//paso al siguiente registro de la consulta
	$resultado->MoveNext();
}
//muestro un mensaje en pantalla de cuantos archivos se generaron
$mensaje[]=sprintf("se crearon en total %s archivos",$cantidad);
ini_set('display_errors','Off');
return implode("<br>",$mensaje);
?>