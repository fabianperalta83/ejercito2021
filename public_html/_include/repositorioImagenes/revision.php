<?php
require_once(_DIRINCLUDE."repositorioImagenes/_config/"."constantes.php");
require_once(_DIRLIB_ADMIN."Pager.class.php");
$idimagen = definirIdcategoria($CAT_GALERIAREVISION);
if (empty($idimagen)){return "<p>No hay imagenes por aprobar</p>";}
if(isset($_POST['acepta']) or isset($_POST['noacepta']))
{
	if     (isset($_POST['acepta'])){ aceptar($idimagen, $CAT_GALERIAREAL);}
	elseif (isset($_POST['noacepta'])){ noaceptar($idimagen);}
}

return $smartyApp->fetch("tpl_revision.html");



function aceptar($idimagen, $catgaleria)
{
	/* La imagen es aceptada y se publica en la galeria de acceso publico */
	global $db;
	$query = "UPDATE "._TBLCATEGORIA." SET idpadre = $catgaleria WHERE IDCATEGORIA = $idimagen";
	$db->Execute($query) or errorQuery(__LINE__, __FILE__);
	return true;
	
}

function noaceptar($idimagen)
{
	global $db;
	$query   = "SELECT * from "._TBLCATEGORIA." WHERE idcategoria = $idimagen";
	$infocat = $db->getRow($query);
	$archivo = _RUTABASE._DIRIMAGES_USER.$infocat['imagen'];
	unlink($archivo);
	
	$query = "UPDATE "._TBLCATEGORIA." SET eliminado = 1, activa = 0 WHERE idcategoria = $idimagen";
	$db->Execute($query) or errorQuery(__LINE__, __FILE__);
	return true;
}


function definirIdcategoria($idpadre)
{
	global $db;
	$numPagina = isset($_GET['inf'])?$_GET['inf']:0;

    $consulta = sprintf("SELECT * 
								 FROM 	%s 
								 WHERE 	idpadre = %s
								 AND activa != 0 "
								,_TBLCATEGORIA
								,$idpadre
								);	
					
	$rsImagen = $db->SelectLimit($consulta, 1, $numPagina) or errorQuery(__LINE__, __FILE__);
	$rsCategorias = new Pager($rsImagen, 1, $numPagina);
	while (!$rsCategorias->EOF) {					
					   $row = $rsCategorias->fields;
	                   $rsCategorias->MoveNext();
                      
	}
	return $row['idcategoria'];
}

?>