<?

global $db;

if( !isset($_REQUEST['submit']) ){
  $smarty = new Smarty_Plantilla;
  $smarty->assign('idcategoria',$idcategoria);
  return $smarty->fetch('tpl_amigos_cumpleanos.html');
} else {

  switch ($_REQUEST['month']) {
  case "Enero":
    $month=1;
    break;
  case "Febrero":
    $month=2;
    break;
  case "Marzo":
    $month=3;
    break;
  case "Abril":
    $month=4;
    break;
  case "Mayo":
    $month=5;
    break;
  case "Junio":
    $month=6;
    break;
  case "Julio":
    $month=7;
    break;
  case "Agosto":
    $month=8;
    break;
  case "Septiembre":
    $month=9;
    break;
  case "Octubre":
    $month=10;
    break;
  case "Noviembre":
    $month=11;
    break;
  case "Diciembre":
    $month=12;
    break;
  }

  //Averigua la cantidad de personas que cumplen anos este dia y hacen parte del boletin electronico
  $query = sprintf("SELECT COUNT(usuario.idusuario) AS filas FROM detallelista, usuario WHERE detallelista.idusuario=usuario.idusuario AND idlista=23 AND MONTH(cumpleanos)=%s ".
                   "AND DAY(cumpleanos)=%s",
                   $month,
                   mysql_real_escape_string($_REQUEST['day']));

  $resultado = $db->Execute($query);
  $filas=$resultado->fields['filas'];
  $filas_pagina=200;
  $paginas=ceil($filas/$filas_pagina)+1;
  
  if( isset($_REQUEST['pagina']) )
    $pagina=(int)$_REQUEST['pagina']-1;
  else
    $pagina=0;
  
  $fila_inicio=$pagina*$filas_pagina;
  $query = sprintf("SELECT nombres, apellidos, DATE_FORMAT(cumpleanos, '%%d/%%m') AS cumpleanos, email, telefono_movil, ".
		   "DATE_FORMAT(fecha_insercion, '%%d/%%m/%%Y %%k:%%i:%%s') AS fecha_insercion_format ".
		   "FROM detallelista, usuario ".
		   "WHERE detallelista.idusuario=usuario.idusuario AND idlista=23 AND MONTH(cumpleanos)=%s AND DAY(cumpleanos)=%s ".
		   "ORDER BY fecha_insercion LIMIT $fila_inicio, $filas_pagina",
                   $month,
                   mysql_real_escape_string($_REQUEST['day']));

  $resultado = $db->Execute($query);
  
  $amigos=array();
  while(!$resultado->EOF){
    array_push($amigos,$resultado->fields);
    $resultado->MoveNext();
  }
  
  $smarty = new Smarty_Plantilla;
  $smarty->assign('amigos', $amigos);		
  $smarty->assign('num_amigos',$filas);
  $smarty->assign('month', htmlspecialchars($_REQUEST['month']));
  $smarty->assign('day', htmlspecialchars($_REQUEST['day']));
  $smarty->assign('pagina',$pagina+1);
  $smarty->assign('paginas',$paginas);
  $smarty->assign('idcategoria',$idcategoria);
  return $smarty->fetch('tpl_amigos_cumpleanos2.html'); 
}

?>