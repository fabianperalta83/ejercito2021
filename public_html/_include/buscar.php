<?
define("_max_num_res"	, 30);

/* Motor de Búsqueda */
$smarty = new Smarty_Plantilla;
$pagina = basename($_SERVER['PHP_SELF']);
$pagina .= sprintf("?idcategoria=%s",$idcategoria);

// Titulo de la página
	$archivo = sprintf("%s/categoria_%s.png",_DIRRECURSOS,$idcategoria);
	$c_titulo = BuscarNombre($idcategoria);
	$smarty->assign('c_titulo',$c_titulo);
//Fin Título Página

if(isset($_GET['cadena_buscar'])){
	$cadena_buscar = Autenticacion::secureSQL($_GET['cadena_buscar'],'');
}elseif(isset($_POST['cadena_buscar'])) {
	$cadena_buscar = Autenticacion::secureSQL($_POST['cadena_buscar'],'');
} else {
	$cadena_buscar = "";
}

$pags = isset($_GET["pags"]) ? $_GET["pags"] : 0;

if (!$cadena_buscar || !(strlen($cadena_buscar)>2)) {
	$error[] = _ROT_BUSCAR_ADVERTENCIA_MENSAJE;
}

$total_errores = isset($error) ? count($error) : $total_errores = 0;

if($cadena_buscar <> "" && $total_errores){
	$smarty1 = new Smarty_Plantilla;
    $smarty1->assign('rotMensaje',_ROT_BUSCAR_ADVERTENCIA);
    $smarty1->assign('tipo'      ,"error");
    $smarty1->assign('elementoMenu',$error);
    $show = $smarty1->fetch('tpl_display_mensaje.html');
    $smarty->assign('subMenuError',$show);
}

//Constantes para el Formulario
$smarty->assign('c_action'           	,$pagina);
$smarty->assign('c_formulario_titulo'	,_ROT_BUSCAR_TXT);
$smarty->assign('c_buscar'				,_ROT_BUSCAR);
$smarty->assign('cadena_buscar'			,$cadena_buscar);
$smarty->assign('idcategoria'			,$idcategoria);

$campo['nombre'] = _ROT_BUSCAR_PALABRA;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type='text' name='cadena_buscar' size='35' value='%s' class='input1'>",$cadena_buscar);
$campos[] = $campo;
$campo['nombre'] = "";
$campo['clase']  = "";
$campo['input']  = sprintf("<input type='hidden' name='idcategoria' value='%s'>",_SBUSCAR);
$campos[] = $campo;
$smarty->assign('campos',$campos);

if ($cadena_buscar && strlen($cadena_buscar)>2){
	$set = Buscar($cadena_buscar,$pags);
	$cantidad = $set[2];
	$resultado_busqueda = sprintf(_ROT_BUSCAR_RESULTADOS,$cantidad,$cadena_buscar);
	$smarty->assign('resultado_busqueda',$resultado_busqueda);
}

if(isset($set[0])){
	$smarty->assign('set',$set[0]);
	$smarty->assign('paginas',$set[1]);
}

return $smarty->fetch('tpl_buscar.html');

/**
 * Buscar
 *
 * @return
 **/
function Buscar($cadena_buscar,$pags){
	$excluir = "2,3,4,5,6,7,8,9";
	$pagina = basename($_SERVER['PHP_SELF']);
	$db = $GLOBALS['db'];
	$cadena_buscar = strtolower($cadena_buscar);
	$select  = sprintf("SELECT * FROM %s WHERE (%s LIKE '%s' OR %s LIKE '%s' or %s LIKE '%s') AND idcategoria NOT IN(%s) AND activa >0"
		,_TBLCATEGORIA
		,$GLOBALS['_nombre']
		,"%".$cadena_buscar."%"
		,$GLOBALS['_descripcion']
		,"%".$cadena_buscar."%"
		,$GLOBALS['_entradilla']
		,"%".$cadena_buscar."%"
		,$excluir
	);
	//Consultar cuantos resultados en total se encontraron para la búsqueda
	$select2 = str_replace("*", "count(*)", $select);
	$query2 = $db["ejecutar"]($select2);
	$d2	= $db["fetch_array"]($query2);
	$total = $d2[0];
	$exeed = _max_num_res * $pags;
	$total_pag = floor($total / _max_num_res);
	$paginas = "";
	for ($i =0 ; $i <= $total_pag; $i++){
		$j	= $i+1;
		if($pags <> $i){
			$paginas	.= "<a href='?idcategoria=4&amp;cadena_buscar=$cadena_buscar&amp;pags=$i'>".$j."</a>";
		}else{
			$paginas	.= "<strong style='color:#d54'>".$j."</strong>";
		}
		$paginas .= $i < $total_pag ? " - " : "";
	}

	$select .= limite($exeed,_max_num_res);
	$query = $db["ejecutar"]($select);
	$registrar = sprintf("INSERT INTO %s (dato1, ip, dato2,usuario,accion,useragent,querystring) values ('%s','%s','%s','%s','%s','%s','%s')"
		,_TBLREGISTRO
		,$cadena_buscar
		,$_SERVER['REMOTE_ADDR']
		,$total
		,(isset($_SERVER['PHP_AUTH_USER']))?BuscarUser($_SERVER['PHP_AUTH_USER']):""
		,2
		,($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:""
		,($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:""
	);
	while($row = $db["fetch_object"]($query)){
		if(ValidarActiva($row->idcategoria)){
			$idcategoria= $row->idcategoria;
			$descripcion= $row->$GLOBALS["_entradilla"]." ".$row->$GLOBALS["_descripcion"];
			$activa     = $row->activa;
			$entradilla = $row->$GLOBALS["_entradilla"];
			$descripcion= strip_tags($descripcion);
			if ($descripcion){
				$arreglo = explode(strtolower($cadena_buscar),strtolower($descripcion));
			}
			$nombre_buscar="";
			DisplayMigasBuscar($idcategoria);
			$buscar['titulo'] = $GLOBALS['migas_buscar'];

			/*$buscar['titulo'] = sprintf("<a href='?idcategoria=%s'>%s</a>"
				,$row->idcategoria
				,$row->$GLOBALS['_nombre']
			);*/

			if (isset($arreglo) && count($arreglo)>1){
				$centro = 0;
				$cant = (count($arreglo) > 10)?10:count($arreglo);
				for ($idx=0;$idx<$cant-1;$idx++){
					$centro  = $centro + strlen($arreglo[$idx]) + floor(strlen($cadena_buscar));
					$centro1 = ($centro<50)?50:$centro;
					$inicio  = $centro1 - 50;
					$temporal =substr(trim($descripcion),$inicio,100);
					if(isset($buscar['contenido'])){
						$buscar['contenido'] .= sprintf("...%s...<br>",Resaltar($temporal,$cadena_buscar));
					} else {
						$buscar['contenido'] = sprintf("...%s...<br>",Resaltar($temporal,$cadena_buscar));
					}
				}
			} else {
				$descripcion = substr(strip_tags($descripcion),0,100);
				$buscar['contenido'] = sprintf("%s<br>",Resaltar($descripcion,$cadena_buscar));
			}
			$set[] = $buscar;
			unset($buscar);
		}
	}
	$set = (isset($set)) ? $set : "";
	return array($set,$paginas,$total);
}
?>