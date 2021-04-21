<?
/*
*	Archivo que permite la administracion de los cabezotes para la pagina web de ejercito y sus subsitios
*	@AUTHOR Farez Prieto
*/
//INCLUSION DE ARCHIVOS
//incluyo la confuguracion del portal
require_once("_config/constantes.php");

//DECLARACION DE CONSTANTES NECESARIAS
//ruta de los banners en imagen
define("_RUTA_BANNERS_IMG"	,"cabezote/banner/imagen/");
//ruta de los banners en flash
define("_RUTA_BANNERS_FLA"	,"cabezote/banner/flash/");


//DECLARACIÃ“N DE VARIABLES
//traigo la variable declarada global para smarty
global $smarty;
//traigo la variable de conexion a la base de datos
global $db;
//categoria actual
global $idcategoria;
//arreglo que llevara los subsitios para el select
$subsitios		=	array();
//arreglo que traera los banners
$banners		=	array();
//variable de errores
$errores		=	array();
//variable que hace la persistencia dellistado del sitio, valir que guardara es el id categoria del sitio
$lista_sitios	=	'';
//bandera para mostrar la ventana de carga de un nuevo banner
$bandera1		=	false;
//bandera para mostrar los banners asignados
$bandera2		=	false;
//bandera para mostrar el formulario de consulta
$bandera3		=	true;
//ruta banner
$ruta_banner	=	'';
//tipo_banner
$tipo_banner	=	'';
//plantilla que se esta usando
$plantilla		=	'';
//carga la configuracion del banner del sitio
$config			=	'';
//DESARROLLO DEL PROBLEMA
//empiezo realizando la consulta que me traera los subsitios creados en el portal
// Cambio # 1
$query_subsitios				=	$db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE es_root= ? AND activa= ? AND eliminado= ?",);
//obtengo el resultado
$resultado_subsitios			=	$db->Execute($query_subsitios, array(1, 1, 0));
//concateno el resultado de los subsitos en el arreglo
while(!$resultado_subsitios->EOF)
{
	//consulto si el sitio esta en la relacion de banners
	// Cambio # 2
	$consulto		=	$db->prepare("SELECT * FROM rel_banners WHERE idcategoria= ? ");
	$idcategoria = $resultado_subsitios->fields['idcategoria'];
	//resultado_consulta
	$resulto		=	$db->Execute($consulto, array($idcategoria));
	//valido si esta en la relacion
	if($resulto->NumRows() == 0)
	{
		//quiere decir que el sitio no esta relacionado y debo relacionarlo, le pondre una configuracion por defecto la cual sera de la imagen porque es lo minmoque debe tener
		// Cambio # 3
		$inserto			=	$db->prepare("INSERT INTO rel_banners(idcategoria,tipo) VALUES('".$resultado_subsitios->fields['idcategoria']."', ?)");
		//ejecuto la insercion	
		$insercion_result	=	$db->Execute($inserto, array(1));
	}
	array_push($subsitios,$resultado_subsitios->fields);
	$resultado_subsitios->MoveNext();
}





//valido si se presiono el boton de cargar los banners
if(isset($_POST['cargar']) or isset($_GET['nuevo']))
{	
	$bandera2				=	true;
	//esto es para hacer la persistencia del listado de sitios, paso el dato de forma codificada
	$lista_sitios			=	(isset($_POST['lista_subsitios']))?$_POST['lista_subsitios']:$_GET['nuevo'];
	//traigo la configuracion del sitio de la tabla rel_banners
	// Cambio # 4
	$configuracion	=	$db->prepare("SELECT * FROM rel_banners WHERE idcategoria=?");
	//resultado de la configuración
	$result_config	=	$db->Execute($configuracion, array($lista_sitios));

	//asigno la configuracion
	$config			=	$result_config->fields['tipo'];
	//asigno el tipo de banner para pasarlo por GET
	$tipo_banner			=	(isset($_POST['tipo_banner']))?$_POST['tipo_banner']:$_GET['tipo'];
	//realizo la consulta a la tabla banners
	// Cambio # 5
	$banners_query			=	$db->prepare("SELECT b.*,c.template,c.nombre FROM banners as b,categoria as c WHERE b.idcategoria=? and b.idcategoria=c.idcategoria and b.eliminado=0 and tipo=?");
	//realizo una consulta solo para la plantilla
	// Cambio # 6
	$consulta_plantilla		=	$db->prepare("SELECT template FROM categoria WHERE idcategoria= ?");
	//resultado de la plantilla
	$resultado_plantilla	=	$db->Execute($consulta_plantilla, array($lista_sitios));
	//asigno la plantilla
	$plantilla				=	$resultado_plantilla->fields['template'];
	//resultado
	$result_banners			=	$db->Execute($banners_query, array($lista_sitios,$tipo_banner));
	//valido la ruta que debo poner segun el tipo de banner seleccionado
	$ruta_banner			=	($tipo_banner == 1)?"_templates/".$plantilla."/recursos/images/"._RUTA_BANNERS_IMG:"_templates/".$plantilla."/recursos/images/"._RUTA_BANNERS_FLA;
	
	if($result_banners->NumRows() > 0)
	{
		//recorro el resultado
		while(!$result_banners->EOF)
		{
			array_push($banners,$result_banners->fields);
			$result_banners->MoveNext();
		}
	}
	else
	{
		array_push($errores,"Este subsitio no tiene ningun cabezote programado");
	}
	//var_dump($banners);
}







//ASIGNACION A SMARTY
$smarty->assign("lista_subsitios"				,$subsitios);
$smarty->assign("banners"						,$banners);
$smarty->assign("sitios"						,$lista_sitios);
$smarty->assign("idcategoria"					,$idcategoria);
$smarty->assign("errores"						,$errores);
$smarty->assign("tipo_banner"					,$tipo_banner);
$smarty->assign("plantilla"						,$plantilla);
$smarty->assign("config"						,$config);
	


//banderas
$smarty->assign("bandera1"						,$bandera1);
$smarty->assign("bandera2"						,$bandera2);
$smarty->assign("bandera3"						,$bandera3);

//ruta de los banners
$smarty->assign("ruta_banner"					,$ruta_banner);



//asigno la plantilla sobre la que se pintara todo
$resultado_pagina = $smarty->fetch("tpl_admin_cabezotes.html");
//retorna lo que se pintara en la plantilla
return $resultado_pagina;
?>