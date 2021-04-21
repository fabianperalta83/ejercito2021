<?
	set_time_limit ( 120 ) ;
	$nivel_mapa = 1;           // Definimos el nivel de indentacion inicial del mapa
	$smarty = new Smarty_Plantilla;
	$pagina = basename($_SERVER['PHP_SELF']);
	$pagina .= sprintf("?idcategoria=%s",$idcategoria);

	// Titulo de la página
	$c_titulo = Funciones::BuscarNombre($idcategoria);

	$smarty->assign('c_titulo',$c_titulo);

	// Pedimos el nivel de detalle del mapa (3 nivel por default)
	$submenu_buscar = array();
	array_push($submenu_buscar, array('vinculo' => sprintf("<a href=\"%s&amp;detalle=3\">%s</a>",$pagina,_ROT_MAPA_GENERAL)));
	array_push($submenu_buscar, array('vinculo' => sprintf("<a href=\"%s&amp;detalle=4\">%s</a>",$pagina,_ROT_MAPA_DETALLADO)));
	array_push($submenu_buscar, array('vinculo' => sprintf("<a href=\"%s&amp;detalle=6\">%s</a>",$pagina,_ROT_MAPA_COMPLETO)));
	
	$smarty->assign('arr_submenu',$submenu_buscar);

	// LLamamos la funcion con la categoria padre=0, y el nivel de indentacion predefinido
	$idCategoriaRoot = Funciones::BuscarRoot($idcategoria);
	if ($idCategoriaRoot == 1) {
		tree(0, $nivel_mapa, $showMapa);
	} else {
		tree($idCategoriaRoot, $nivel_mapa, $showMapa);
	}

	$smarty->assign('show_mapa', $showMapa);
	$smarty->assign('rutaRecursos', _DIRRECURSOS);
	return $smarty->fetch('tpl_mapa.html');

/**
 * Función que genera el Mapa del Sitio
 **/
function tree($idcategoria, &$nivel_mapa, &$show_mapa) {
	global $db;
	
	$idCategoriaR = $idcategoria;
	$displayExluidas = "2,3,4,5,8,9,12";
	
	// Variable para controlar el nivel de detalle del mapa, por default muestra hasta el nivel 3
	$detalle	= (isset($_GET['detalle'])) ? $_GET['detalle'] : "";
	$db			= $GLOBALS['db'];
	$detalle	= (!$detalle) ? 3 : $detalle;
	$detalle	= ($detalle > 7) ? 6 : $detalle;

	
	// Buscamos todos los registros con ese padre
	$select = sprintf("SELECT idcategoria,idpadre,iddisplay,nombre,activa,es_prototipo,en_mapa FROM %s WHERE idpadre = '%s' AND en_mapa IN (1,2) AND activa='1' ORDER BY orden"
						,_TBLCATEGORIA
						,$idcategoria
					);
	
	$query = $db->Execute($select) or errorQuery(__LINE__, __FILE__);
	
	if($query->NumRows() > 0) {
		
		isset($show_mapa) ? $show_mapa .= sprintf("<ul>") : $show_mapa = sprintf("<ul>");
		
		while (!$query->EOF) {
			$row = $query->fields;
			settype($row, 'object');
			
			$idcategoria= $row->idcategoria;
			$idpadre	= $row->idpadre;
			$nombre		= $row->nombre;
			$activa		= $row->activa;
			
			// Obtener los resultados y mostrarlos
			if ($nivel_mapa <= $detalle && $activa && $row->es_prototipo != 1){
				if ($nivel_mapa <> 2){
					$show_mapa .= sprintf("<li><a href=\"?idcategoria=%s\">%s</a>",$idcategoria,$nombre);
				} else {
					if ($idCategoriaR <> 1) {
						$show_mapa .= sprintf("<li><a href=\"?idcategoria=%s\">%s</a>",$idcategoria,$nombre);	 
					} else {
						$show_mapa .= sprintf("<li>%s",$nombre);
					}
				}
				if($nivel_mapa < $detalle && $row->iddisplay <> 8 && $row->iddisplay <> 10){
					// Verificamos si la categoría tiene hijos
					$select2 = sprintf("SELECT idcategoria, en_mapa FROM %s WHERE idpadre = '%s' AND iddisplay NOT IN (%s) AND en_mapa IN (1,2) AND activa='1' ORDER BY orden"
											,_TBLCATEGORIA
											,$idcategoria
											,$displayExluidas
										);
					$query2	= $db->Execute($select2) or errorQuery(__LINE__, __FILE__);
					$row2 = $query2->NumRows();
					// Si tiene hijos llamamos nuevamente la funcion arbol
					if ($row2 > 0 && $activa && $row->es_prototipo != 1 && $row->en_mapa != 2) {
						tree($idcategoria, ++$nivel_mapa, $show_mapa);
					}
				}
				$show_mapa .= "</li>";
			}
			$query->MoveNext();
		}
		
		$show_mapa .= "</ul>";
		--$nivel_mapa;
		
	}
}
?>