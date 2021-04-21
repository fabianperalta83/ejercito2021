<?php
$smarty = new Smarty_Plantilla;

$smarty->assign('c_buscar', "Buscar");
$smarty->assign('c_action', "?". $_SERVER["QUERY_STRING"]);

//Filtro por letra
$letras = array();
for ($i = 65 ; $i < 91 ; $i++) {
	$letras[] = chr($i);
}

global $idcategoria;

$cadena_buscar = getVariable('cadena_buscar');
$smarty->assign('cadena_buscar', $cadena_buscar);
$smarty->assign('idcategoria', $idcategoria);
$smarty->assign('letras', $letras);
$smarty->assign('envio_consulta', TRUE);
$numeroFilas = 0;

$set = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" or isset($_GET["filtroLetra"])) {
		
	if (!empty($_POST["cadena_buscar"])) { // busqueda por una cadena definida por el usuario
		$query = "SELECT * FROM "._TBLCATEGORIA." WHERE activa != 0 and UPPER(nombre) LIKE UPPER('%".$cadena_buscar."%') and idpadre = ".$_GET["idcategoria"]."";
		$recordset = $db->Execute($query) or errorQuery(__LINE__, __FILE__);
		$numeroFilas = $recordset->NumRows();
		$smarty->assign('resultado_busqueda', 'Encontrados '.$numeroFilas.' secciones por la frase "'.$cadena_buscar.'".');
		
	} elseif (!empty($_GET["filtroLetra"])) { // filtro por una letra
		
		$query = "SELECT * FROM "._TBLCATEGORIA." WHERE activa != 0 and UPPER(nombre) LIKE UPPER('".$_GET['filtroLetra']."%') and idpadre = ".$_GET["idcategoria"]."";
		$recordset = $db->Execute($query) or errorQuery(__LINE__, __FILE__);
		$numeroFilas = $recordset->NumRows();
		$smarty->assign('resultado_busqueda', 'Encontrados '.$numeroFilas.' secciones por la letra '.$_GET["filtroLetra"].'.');

	}

} else {
	
	$query = "SELECT * FROM "._TBLCATEGORIA." WHERE activa != 0 and UPPER(nombre) LIKE UPPER('A%') and idpadre = ".$_GET["idcategoria"]."";
	$recordset = $db->Execute($query) or errorQuery(__LINE__, __FILE__);
	$numeroFilas = $recordset->NumRows();
	$smarty->assign('resultado_busqueda', ' ');
}

	// Saco el resultado
if ($recordset !== FALSE and $numeroFilas > 0) {
	$contador = 0;
	
	while(!$recordset->EOF){
		$dataset = $recordset->fields;
		$set[] = array("contenido" => $dataset["nombre"], "idcategoria" => $dataset["idcategoria"]);
		$recordset->MoveNext();
	} // while	
	$smarty->assign('set', $set);
}

return $smarty->fetch('tpl_buscar_alfabetico.html');
?>