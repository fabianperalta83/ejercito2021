<?

global $db;


$query = "SELECT COUNT(idusuario) as filas FROM detallelista WHERE idlista=23";
$resultado = $db->Execute($query);
$filas=$resultado->fields['filas'];
$filas_pagina=200;
$paginas=ceil($filas/$filas_pagina)+1;

if(isset($_REQUEST['pagina']))
	$pagina=(int)$_REQUEST['pagina']-1;
else
	$pagina=0;

$fila_inicio=$pagina*$filas_pagina;
$query = "SELECT nombres, apellidos, DATE_FORMAT(cumpleanos, '%d/%m') AS cumpleanos, email, telefono_movil, ".
         "DATE_FORMAT(fecha_insercion, '%d/%m/%Y %k:%i:%s') AS fecha_insercion_format ".
         "FROM detallelista, usuario ".
         "WHERE detallelista.idusuario=usuario.idusuario AND idlista=23 ORDER BY fecha_insercion DESC LIMIT $fila_inicio, $filas_pagina";
$resultado = $db->Execute($query);

$amigos=array();


while(!$resultado->EOF){

	 array_push($amigos,$resultado->fields);

	 $resultado->MoveNext();
}
		
	 /* CREACIÓN DE XML CON AMIGOS */	
	 $operacion  = $_POST["operacion"];
	 
	 
	 if($operacion == 1){
	    
		 $query = "SELECT nombres, apellidos, email, telefono_movil, ".
                          "DATE_FORMAT(fecha_insercion, '%d/%m/%Y %k:%i:%s') AS fecha_insercion_format ".
                          "FROM detallelista,usuario ".
                          "WHERE detallelista.idusuario=usuario.idusuario AND idlista=23 ORDER BY fecha_insercion";
        
		$resultado = $db->Execute($query);
		
		
	    //GENERACIÓN ARCHIVO
		//cabecera xml
		
		//$eof="\n";
		$csv = '<?xml version="1.0" encoding="ISO-8859-1"?>'.$eof;		
		$csv .= '<solicitud>';
		
		while(!$resultado->EOF){
		
		   $csv .= "<usuario>"
		       //.$eof."<nombres>".$resultado->fields['nombres']."</nombres>"
		       //.$eof."<apellidos>".$resultado->fields['apellidos']."</apellidos>"
			   .$eof."<celular>".$resultado->fields['telefono_movil']."</celular>"
			   .$eof."<email>".$resultado->fields['email']."</email>"
			   .$eof."<fecha_insercion>".$resultado->fields['fecha_insercion_format']."</fecha_insercion>"
			 .$eof."</usuario>";
		   
	       $resultado->MoveNext();
		
		}
		
		$csv .= "</solicitud>";
			header('Pragma: private');
			header('Cache-control: private, must-revalidate');
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="Amigos_Ejercito'.date("Ymd").'.xml"');
			echo $csv;
			exit(0);
	 
	 }
     //FIN CREACIÓN DE XML  

		$smarty = new Smarty_Plantilla;
		$smarty->assign('amigos', $amigos);		
		$smarty->assign('num_amigos',$filas);
		$smarty->assign('pagina',$pagina+1);
		$smarty->assign('paginas',$paginas);
		$smarty->assign('idcategoria',$idcategoria);
		return $smarty->fetch('tpl_amigos_consultar.html');


?>