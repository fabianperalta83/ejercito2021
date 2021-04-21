<?php
//ini_set('display_errors','1');
require_once('_config/constantes.php');
//require_once(_DIRLIB.'smarty/libs/Smarty_Compiler.class.php');
//require_once('_include/grafico_encuestas.php');
//print_r("entro3");
require_once (_DIRCORE.'GeneraXml.class.php');


global $db;
$errores	=	array();
$desde		=	'';
$hasta		=	'';
$arratotales = array("BUENO"=>0,"REGULAR"=>0,"MALO"=>0,"SI"=>0,"NO"=>0);
//$preguntasAnteriores = "212567,212568,212582,212603,212614,212615";//._PQRENCUESTAS;
$preguntasAnteriores = _PQRENCUESTANTERIOR.","._PQRENCUESTAS;//;
/*  ANTES EL PORTAL TENIA QUEMADO LAS CATEGORIAS HIJAS CORRESPONDIENTES A CADA PREGUNTA  */

//$pregunta1	=	212567;
//$pregunta2	=	212568;
//$pregunta3	=	212582;
//$pregunta4	=	212603;
//$pregunta5	=	212613;
//$pregunta6	=	212614;
//$pregunta7	=	212615;



        /*   NUEVO PROCEDIMIENTO PARA QUE LAS CATEGORIAS CAMBIEN DE FORMA automatica SEGÚN ID CATEGORIA PADRE DE LA VARIABLE _PQR_ENCUESTA_CIUDADANO */
         /*$consulta_preguntas_encuesta =  sprintf("SELECT idcategoria 
												 FROM categoria
												 WHERE idpadre = '%s'",_PQR_ENCUESTA_CIUDADANO);
									   
         $resultado_id_preguntas = $db->Execute($consulta_preguntas_encuesta);
        */
	 $resultado_id_preguntas = explode(",",$preguntasAnteriores);
         //print_r($resultado_id_preguntas); 
		 $i = 1;
	
//		 foreach($resultado_id_preguntas as $pregunta){
	foreach($resultado_id_preguntas as $d){
 
//		    foreach($pregunta as $d){
						
			   $a = $d;
			     
//			}
			       //Condicionales para determinar en cual pregunta se encuentra.
				   
				   switch ($i) {
				   
				    case 1:
					// echo $a.",";
					  $pregunta1 = $a;
					  break;
					
					case 2:
					  //echo $a.",";
					  $pregunta2 = $a;
					  break;
					  
                    case 3:
					  $pregunta3 = $a;
                      break;
					  
                    case 4:
					  $pregunta4 = $a;
                      break;

                    case 5:
                      $pregunta5 = $a;
                      break;
                     
                    case 6:
					  $pregunta6 = $a;
                      break;
                    
                    case 7:
					  $pregunta7 = $a;
                      break;  					
				   
				   
				   }

		   $i++;
		   
		   
		  
		   
		 }
		 
		 /* FIN CONDICIONALES PARA DETERMINAR PREGUNTAS */
		 




//si se presiono el boton de descarga del xml
if(isset($_POST['descarga']))
{
	//capturo las variables
	$desde= $_POST['desde'];
	$hasta= $_POST['hasta'];
	
	//valido si la fecha inicial viene vacia
	if($desde == '')
	{
		//si viene vacia muestro el mensaje de error
		array_push($errores,"Debe ingresar una fecha inicial");	
	}
	//valido si la fecha final viene vacia
	elseif($hasta == '')
	{
		//si viene vacia pongo el mensaje de error
		array_push($errores,"Debe ingresar una fecha final");
	}
	//si los datos viene completos
	else
	{
		//creo el arreglo que le pasare a la funcion del XML
		$datos_2=array();
		//traigo las solicitudes existentes en la tabla de las respuestas comparadas con las de la tabla solcitud
		$solicitud_respuestas=sprintf("select r.solicitud_id as sol from pqr_respuestas_encuesta r,pqr_solicitud s where r.creacion BETWEEN '%s' and '%s' and r.solicitud_id=s.solicitud_id group by r.solicitud_id",$desde,$hasta);
		//ejecuto la consulta anterior
		$resultado_solicitud_resp=$db->Execute($solicitud_respuestas);
		//creo un ciclo con la informacion caprurada
		while(!$resultado_solicitud_resp->EOF)
		{
			//creo el sisguiente arreglo para concatenar los datos
			$datos=array();
			//creo la consulta que me traera el valor de la respuesta segun la solicitud que valla en el ciclo
			$valores=sprintf("select valor_respuesta,solicitud_id from pqr_respuestas_encuesta where solicitud_id=%s",$resultado_solicitud_resp->fields['sol']);
			//ejecuto la consulta anterior
			$resultado_valores=$db->Execute($valores);
			//asigno al arreglo el nuemro de lq solicitud para saber a quien le corresponde esos resultados
			array_push($datos,$resultado_valores->fields['solicitud_id']);
			//creo el ciclo con todos los resultados traidos
			while(!$resultado_valores->EOF)
			{
				//los concateno en el arreglo 
				array_push($datos,$resultado_valores->fields['valor_respuesta']);
				//paso al siguiente resultado
				$resultado_valores->MoveNext();
			}
			//agrego esa informacion al segundo arreglo
			array_push($datos_2,$datos);
			//paso a la siguiente solicitud para hacer el mismo proceso
			$resultado_solicitud_resp->MoveNext();
		}
		//Cuando ya esta toda la informacion en el arreglo. creo los encabezados 
		$encabezado=array('Solicitud','pregunta_1','pregunta_2','pregunta_3','pregunta_4','pregunta_5','pregunta_6','pregunta_7');
		//llamo la funcion para que me genere el XML
		$xml = new GeneraXml($encabezado,$datos_2);
		

	}

}
if(isset($_POST['filtrar']) || isset($_POST['export']))
{	
	$desde=$_POST['desde']." 00:00:00";
	$hasta=$_POST['hasta']."  23:59:59";
	if($desde == '')
	{
		array_push($errores,"Debe ingresar una fecha inicial");	
	}
	elseif($hasta == '')
	{
		array_push($errores,"Debe ingresar una fecha final");
	}
	else
	{
		$consulta_pregunta1=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta1);
		$resultado_pregunta1=$db->execute($consulta_pregunta1);
		
		$consulta_hijos_pregunta1=sprintf("select * from %s where idpadre=%s",_TBLCATEGORIA,$pregunta1);
		$resultado_hijos_pregunta1=$db->execute($consulta_hijos_pregunta1);
		$arreglo_hijos_1=array();
		
		$arreglo_total_1=array();
		$suma1=0;
		
			while(!$resultado_hijos_pregunta1->EOF)
			{
				array_push($arreglo_hijos_1,$resultado_hijos_pregunta1->fields);	
			//	echo $resultado_hijos_pregunta1->fields['nombre'],' - ';
				/*select * from pqr_respuestas_encuesta as r,pqr_solicitud as s,pqr_transaccion as t where s.estado_actual=t.transaccion_id and t.estado_id in(3) and r.creacion >='2008-07-18' and r.creacion <= '2008-07-19' and t.solicitud_id=r.solicitud_id*/
				$consulta_total_pregunta1=sprintf("select count(r.valor_respuesta)as cantidad1 from pqr_respuestas_encuesta as r where r.creacion BETWEEN '%s' and '%s'  and r.id_padre=%s and r.valor_respuesta='%s'",$desde,$hasta,$pregunta1,$resultado_hijos_pregunta1->fields['nombre']);
				//echo $consulta_total_pregunta1;
				//var_dump($consulta_total_pregunta1);
				$resultado_total_pregunta1=$db->execute($consulta_total_pregunta1);
			      
				
				while(!$resultado_total_pregunta1->EOF)
				{
					
					array_push($arreglo_total_1,$resultado_total_pregunta1->fields);
			//		echo $resultado_total_pregunta1->fields['cantidad'],'<br>';
					$suma1=$suma1 + $resultado_total_pregunta1->fields['cantidad1'];
					$arratotales[$resultado_hijos_pregunta1->fields['nombre']] = $arratotales[$resultado_hijos_pregunta1->fields['nombre']] + $resultado_total_pregunta1->fields['cantidad1']; 
					$resultado_total_pregunta1->MoveNext();
				}
				
				$resultado_hijos_pregunta1->MoveNext();
			}
			//print_r($arratotales);
			/*******************************************FP*******************************************************
			
			/***********************************************PREGUNTA 2 *************FP**********************/
			$consulta_pregunta2=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta2);
			$resultado_pregunta2=$db->execute($consulta_pregunta2);
			
			$consulta_hijos_pregunta2=sprintf("select * from %s where idpadre=%s order by idcategoria",_TBLCATEGORIA,$pregunta2);
			$resultado_hijos_pregunta2=$db->execute($consulta_hijos_pregunta2);
			$arreglo_hijos_2=array();
		
			$arreglo_total_2=array();
			$suma2=0;
			while(!$resultado_hijos_pregunta2->EOF)
			{
				array_push($arreglo_hijos_2,$resultado_hijos_pregunta2->fields);	
			
				
				$consulta_total_pregunta2=sprintf("select count(r.valor_respuesta)as cantidad2 from pqr_respuestas_encuesta as r where r.creacion BETWEEN '%s' and '%s' and r.id_padre=%s and r.valor_respuesta='%s'",$desde,$hasta,$pregunta2,$resultado_hijos_pregunta2->fields['nombre']);
				//var_dump($consulta_total_pregunta2);
				$resultado_total_pregunta2=$db->execute($consulta_total_pregunta2);
			//	echo $consulta_total_pregunta2;
				
				while(!$resultado_total_pregunta2->EOF)
				{
					
					array_push($arreglo_total_2,$resultado_total_pregunta2->fields);
					$suma2=$suma2 + $resultado_total_pregunta2->fields['cantidad2'];
					$arratotales[$resultado_hijos_pregunta2->fields['nombre']] = $arratotales[$resultado_hijos_pregunta2->fields['nombre']] + $resultado_total_pregunta2->fields['cantidad2'];
					$resultado_total_pregunta2->MoveNext();
				}
				
				$resultado_hijos_pregunta2->MoveNext();
			}
			
			/*******************************************FP*******************************************************
			
			
			/***********************************************PREGUNTA 3 *************FP**********************/
			$consulta_pregunta3=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta3);
			$resultado_pregunta3=$db->execute($consulta_pregunta3);
			
			$consulta_hijos_pregunta3=sprintf("select * from %s where idpadre=%s",_TBLCATEGORIA,$pregunta3);
			$resultado_hijos_pregunta3=$db->execute($consulta_hijos_pregunta3);
			$arreglo_hijos_3=array();
			$arreglo_total_3=array();
			$suma3=0;
			while(!$resultado_hijos_pregunta3->EOF)
			{
				array_push($arreglo_hijos_3,$resultado_hijos_pregunta3->fields);	
			
				
				$consulta_total_pregunta3=sprintf("select count(r.valor_respuesta)as cantidad3 from pqr_respuestas_encuesta as r where r.creacion BETWEEN '%s' and '%s' and r.id_padre=%s and r.valor_respuesta='%s'",$desde,$hasta,$pregunta3,$resultado_hijos_pregunta3->fields['nombre']);
				$resultado_total_pregunta3=$db->execute($consulta_total_pregunta3);
				
				
				while(!$resultado_total_pregunta3->EOF)
				{
					
					array_push($arreglo_total_3,$resultado_total_pregunta3->fields);
					$suma3=$suma3 + $resultado_total_pregunta3->fields['cantidad3'];
					$arratotales[$resultado_hijos_pregunta3->fields['nombre']] = $arratotales[$resultado_hijos_pregunta3->fields['nombre']] + $resultado_total_pregunta3->fields['cantidad3'];
					$resultado_total_pregunta3->MoveNext();
				}
				
				$resultado_hijos_pregunta3->MoveNext();
			}
			
			/*******************************************FP*******************************************************
			
			
			/***********************************************PREGUNTA 4 *************FP**********************/
			$consulta_pregunta4=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta4);
			$resultado_pregunta4=$db->execute($consulta_pregunta4);
			
			$consulta_hijos_pregunta4=sprintf("select * from %s where idpadre=%s order by idcategoria asc",_TBLCATEGORIA,$pregunta4);
			$resultado_hijos_pregunta4=$db->execute($consulta_hijos_pregunta4);
			
			//echo $consulta_hijos_pregunta4;
			//print_r($resultado_hijos_pregunta4);
			$arreglo_hijos_4=array();
			$arreglo_total_4=array();
			$suma4=0;
			while(!$resultado_hijos_pregunta4->EOF)
			{
				array_push($arreglo_hijos_4,$resultado_hijos_pregunta4->fields);	
			
				
				$consulta_total_pregunta4=sprintf("select count(r.valor_respuesta)as cantidad4 from pqr_respuestas_encuesta as r where r.creacion BETWEEN '%s' and '%s' and r.id_padre=%s and r.valor_respuesta='%s'",$desde,$hasta,$pregunta4,$resultado_hijos_pregunta4->fields['nombre']);
				$resultado_total_pregunta4=$db->execute($consulta_total_pregunta4);
				//echo $consulta_total_pregunta4."<br>";
				
				while(!$resultado_total_pregunta4->EOF)
				{
					
					array_push($arreglo_total_4,$resultado_total_pregunta4->fields);
					$suma4=$suma4 + $resultado_total_pregunta4->fields['cantidad4'];
					//echo "valor".$resultado_total_pregunta4->fields['cantidad4'];
					$arratotales[$resultado_hijos_pregunta4->fields['nombre']] = $arratotales[$resultado_hijos_pregunta4->fields['nombre']] + $resultado_total_pregunta4->fields['cantidad4'];
					$resultado_total_pregunta4->MoveNext();
				}
				
				$resultado_hijos_pregunta4->MoveNext();
			}
			
			/*******************************************FP*******************************************************
			
			/***********************************************PREGUNTA 5 *************FP**********************/
			$consulta_pregunta5=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta5);
			$resultado_pregunta5=$db->execute($consulta_pregunta5);
			
			$consulta_hijos_pregunta5=sprintf("select * from %s where idpadre=%s",_TBLCATEGORIA,$pregunta5);
			$resultado_hijos_pregunta5=$db->execute($consulta_hijos_pregunta5);
			$arreglo_hijos_5=array();
			$arreglo_total_5=array();
			$suma5=0;
			while(!$resultado_hijos_pregunta5->EOF)
			{
				array_push($arreglo_hijos_5,$resultado_hijos_pregunta5->fields);	
			
				
				$consulta_total_pregunta5=sprintf("select count(r.valor_respuesta)as cantidad5 from pqr_respuestas_encuesta as r where r.creacion BETWEEN '%s' and '%s'  and r.id_padre=%s and r.valor_respuesta='%s'",$desde,$hasta,$pregunta5,$resultado_hijos_pregunta5->fields['nombre']);
				$resultado_total_pregunta5=$db->execute($consulta_total_pregunta5);
				
				
				while(!$resultado_total_pregunta5->EOF)
				{
					
					array_push($arreglo_total_5,$resultado_total_pregunta5->fields);
					$suma5=$suma5 + $resultado_total_pregunta5->fields['cantidad5'];
					$arratotales[$resultado_hijos_pregunta5->fields['nombre']] = $arratotales[$resultado_hijos_pregunta5->fields['nombre']] + $resultado_total_pregunta5->fields['cantidad5'];
					$resultado_total_pregunta5->MoveNext();
				}
				
				$resultado_hijos_pregunta5->MoveNext();
			}
				
			$smarty->assign('desde',$desde);
			$smarty->assign('hasta',$hasta);
			
			/***********************************PREGUNTA6*************************************/
			
			$consulta_pregunta6=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta6);
			$resultado_pregunta6=$db->execute($consulta_pregunta6);
			
			$consulta_hijos_pregunta6=sprintf("select * from %s where idpadre=%s",_TBLCATEGORIA,$pregunta6);
			$resultado_hijos_pregunta6=$db->execute($consulta_hijos_pregunta6);
			$arreglo_hijos_6=array();
			$arreglo_total_6=array();
			$suma6=0;
			while(!$resultado_hijos_pregunta6->EOF)
			{
				array_push($arreglo_hijos_6,$resultado_hijos_pregunta6->fields);	
			
				
				$consulta_total_pregunta6=sprintf("select count(r.valor_respuesta)as cantidad6 from pqr_respuestas_encuesta as r where r.creacion BETWEEN '%s' and '%s' and r.id_padre=%s and r.valor_respuesta like '%s' ",$desde,$hasta,$pregunta6,$resultado_hijos_pregunta6->fields['nombre']);
				$resultado_total_pregunta6=$db->execute($consulta_total_pregunta6);
				
				
				while(!$resultado_total_pregunta6->EOF)
				{
					
					array_push($arreglo_total_6,$resultado_total_pregunta6->fields);
					$suma6=$suma6 + $resultado_total_pregunta6->fields['cantidad6'];
					$arratotales[$resultado_hijos_pregunta6->fields['nombre']] = $arratotales[$resultado_hijos_pregunta6->fields['nombre']] + $resultado_total_pregunta6->fields['cantidad6'];
					$resultado_total_pregunta6->MoveNext();
				}
				
				$resultado_hijos_pregunta6->MoveNext();
			}

	
//	print_r($arratotales);


	$arreglo_hijos=array();
	$arreglo_total=array();
	 if (isset($_POST['export'])){
	
             
            $desde		= $_POST["desde"];// dato para filtrar desde una fecha
            $hasta		= $_POST["hasta"];// dato para filtrar hasta una fecha
           
            //CONDICIONES DE FILTRADO
            $strFiltro ='';
            if (!empty($desde) && !empty($hasta)){
                    //desde hasta 
                    $strFiltro .= sprintf(" AND r.creacion  BETWEEN '%s' AND '%s'",$desde."", $hasta."");
            }elseif (!empty($desde) && empty($hasta)){
                    // solo hay desde
                    $strFiltro .= sprintf(" AND r.creacion >= '%s'", $desde." 00:00:00");
            }elseif (empty($desde) && !empty($hasta)){
                    // solo hay hasta
                    $strFiltro .= sprintf(" AND r.creacion <= '%s'", $hasta." 23:59:00");
            }
            
			$html ="<table border='1'>";
			 $html .= "<tr><td> Desde:  ".$desde."</td><td> Hasta:  ".$hasta."</td></tr>";
			for($i=1;$i<=6;$i++)
			{
			 switch ($i) {
				   
				    case 1:
					
					  $id_pregunta=$pregunta1;
					  $html .= "<tr><td>".$resultado_pregunta1->fields['nombre']."</td><td style='text-align:center'>".$suma1."</td></tr>";
					  $arreglo_hijos=$arreglo_hijos_1;
					  $arreglo_total=$arreglo_total_1;
							
					  break;
					
					case 2:
					  
					    $id_pregunta=$pregunta2;
					  $html .= "<tr><td>".$resultado_pregunta2->fields['nombre']."</td><td style='text-align:center'>".$suma2."</td></tr>";
					  $arreglo_hijos=$arreglo_hijos_2;
					  $arreglo_total=$arreglo_total_2;
					
					  break;
					  
                    case 3:

					    $id_pregunta=$pregunta3;
					  $html .= "<tr><td>".$resultado_pregunta3->fields['nombre']."</td><td style='text-align:center'>".$suma3."</td></tr>";
					  $arreglo_hijos=$arreglo_hijos_3;
					  $arreglo_total=$arreglo_total_3;
					
                      break;
					  
                    case 4:

					    $id_pregunta=$pregunta4;
					  $html .= "<tr><td>".$resultado_pregunta4->fields['nombre']."</td><td style='text-align:center'>".$suma4."</td></tr>";
					  $arreglo_hijos=$arreglo_hijos_4;
					  $arreglo_total=$arreglo_total_4;
					
                      break;

                    case 5:
 
                        $id_pregunta=$pregunta5;
					  $html .= "<tr><td>".$resultado_pregunta5->fields['nombre']."</td><td style='text-align:center'>".$suma5."</td></tr>";
					  $arreglo_hijos=$arreglo_hijos_5;
					  $arreglo_total=$arreglo_total_5;
					
                      break;
                     
                    case 6:

					    $id_pregunta=$pregunta6;
					  $html .= "<tr><td>".$resultado_pregunta6->fields['nombre']."</td><td style='text-align:center'>".$suma6."</td></tr>";
					  $arreglo_hijos=$arreglo_hijos_6;
					  $arreglo_total=$arreglo_total_6;
					
                      break;
                    
                    case 7:

					    $id_pregunta=$pregunta7;
					  $html .= "<tr><td>".$resultado_pregunta7->fields['nombre']."</td><td>".$suma7."</td></tr>";
					  $arreglo_hijos=$arreglo_hijos_7;
					  $arreglo_total=$arreglo_total_7;
					
                      break;  					
				   
				   
			 }
	
			$html .= "<tr>";
			foreach($arreglo_hijos as $arreglo_hijo)
                    {
						$html .="<td>".$arreglo_hijo['nombre']."</td>";
					} 
			$html .= "</tr>";	
			
			$html .= "<tr>";
			foreach($arreglo_total as $arreglo)
                    	{
						$html .="<td style='text-align:center'>".$arreglo['cantidad'.$i.'']."</td>";
					} 
			$html .= "</tr>";	
			
			$sql = "SELECT * FROM pqr_respuestas_encuesta AS r,pqr_solicitud AS s WHERE r.id_padre='" . $id_pregunta . "'";
			$sql.="AND r.solicitud_id=s.solicitud_id";
			$sql.= $strFiltro;
			
			$Respuestas = $db->GetAll($sql)or errorQuery(__LINE__, __FILE__);
			
			// Micrositios::printArray($Respuestas);
         // $Respuestas = ControlGestor::Respuestas($db, $strFiltro);
				
					
			
                
				
				$html .= "<tr><th>Id Solicitud</th><th>Respuesta</th></tr>";
                 foreach($Respuestas as $Respuesta)
                    {
                            $html .= "<tr>".
                                        "<td>".$Respuesta['solicitud_id']."</td>".
                                        "<td>".$Respuesta['valor_respuesta']."</td>";
							$html .= "</tr>";
					}   
						

			}
$html .="</table>";
// die($html);			
            header('Content-type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=Reporte_satisfaccion_1.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            echo $html;
            /*die();*/
         }
	
	}
	
	
	}



//si no se presiono ningun boton entra por aca
else
{
/***********************************************PREGUNTA 1 *************FP**********************/
//$consulta_principal=sprintf();
//echo "empiezo aqui segun Farez";
$consulta_pregunta1=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta1);

//$db->debug = true;
$resultado_pregunta1=$db->execute($consulta_pregunta1) or errorQuery(__LINE__, __FILE__);

$consulta_hijos_pregunta1=sprintf("select * from %s where idpadre=%s",_TBLCATEGORIA,$pregunta1);
$resultado_hijos_pregunta1=$db->execute($consulta_hijos_pregunta1) or errorQuery(__LINE__, __FILE__);
$arreglo_hijos_1=array();

$arreglo_total_1=array();
$suma1=0;


	while(!$resultado_hijos_pregunta1->EOF)
	{
		array_push($arreglo_hijos_1,$resultado_hijos_pregunta1->fields);	
	//	echo $resultado_hijos_pregunta1->fields['nombre'],' - ';
		
		$consulta_total_pregunta1=sprintf("select count(valor_respuesta)as cantidad1 from %s where id_padre=%s and valor_respuesta='%s'",_TBL_PQR_ENCUESTA,$pregunta1,$resultado_hijos_pregunta1->fields['nombre']);
		//var_dump($consulta_total_pregunta1);
		$resultado_total_pregunta1=$db->execute($consulta_total_pregunta1);
		
		
		while(!$resultado_total_pregunta1->EOF)
		{
			
			array_push($arreglo_total_1,$resultado_total_pregunta1->fields);
	//		echo $resultado_total_pregunta1->fields['cantidad'],'<br>';
			$suma1=$suma1 + $resultado_total_pregunta1->fields['cantidad'];
			$resultado_total_pregunta1->MoveNext();
		}
		
		$resultado_hijos_pregunta1->MoveNext();
	}
	
	/*******************************************FP*******************************************************
	
	/***********************************************PREGUNTA 2 *************FP**********************/
	$consulta_pregunta2=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta2);
	$resultado_pregunta2=$db->execute($consulta_pregunta2);
	
	$consulta_hijos_pregunta2=sprintf("select * from %s where idpadre=%s order by idcategoria",_TBLCATEGORIA,$pregunta2);
	$resultado_hijos_pregunta2=$db->execute($consulta_hijos_pregunta2);
	$arreglo_hijos_2=array();
	
	$arreglo_total_2=array();
	$suma2=0;
	while(!$resultado_hijos_pregunta2->EOF)
	{
		array_push($arreglo_hijos_2,$resultado_hijos_pregunta2->fields);	
	
		
		$consulta_total_pregunta2=sprintf("select count(valor_respuesta)as cantidad2 from %s where id_padre=%s and valor_respuesta='%s'",_TBL_PQR_ENCUESTA,$pregunta2,$resultado_hijos_pregunta2->fields['nombre']);
		$resultado_total_pregunta2=$db->execute($consulta_total_pregunta2);
		
		
		while(!$resultado_total_pregunta2->EOF)
		{
			
			array_push($arreglo_total_2,$resultado_total_pregunta2->fields);
			$suma2=$suma2 + $resultado_total_pregunta2->fields['cantidad2'];
			$resultado_total_pregunta2->MoveNext();
		}
		
		$resultado_hijos_pregunta2->MoveNext();
	}
	
	/*******************************************FP*******************************************************
	
	
	/***********************************************PREGUNTA 3 *************FP**********************/
	$consulta_pregunta3=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta3);
	$resultado_pregunta3=$db->execute($consulta_pregunta3);
	
	$consulta_hijos_pregunta3=sprintf("select * from %s where idpadre=%s",_TBLCATEGORIA,$pregunta3);
	$resultado_hijos_pregunta3=$db->execute($consulta_hijos_pregunta3);
	$arreglo_hijos_3=array();
	$arreglo_total_3=array();
	$suma3=0;
	while(!$resultado_hijos_pregunta3->EOF)
	{
		array_push($arreglo_hijos_3,$resultado_hijos_pregunta3->fields);	
	
		
		$consulta_total_pregunta3=sprintf("select count(valor_respuesta)as cantidad3 from %s where id_padre=%s and valor_respuesta='%s'",_TBL_PQR_ENCUESTA,$pregunta3,$resultado_hijos_pregunta3->fields['nombre']);
		$resultado_total_pregunta3=$db->execute($consulta_total_pregunta3);
		
		
		while(!$resultado_total_pregunta3->EOF)
		{
			
			array_push($arreglo_total_3,$resultado_total_pregunta3->fields);
			$suma3=$suma3 + $resultado_total_pregunta3->fields['cantidad3'];
			$resultado_total_pregunta3->MoveNext();
		}
		
		$resultado_hijos_pregunta3->MoveNext();
	}
	
	/*******************************************FP*******************************************************
	
	
	/***********************************************PREGUNTA 4 *************FP**********************/
	$consulta_pregunta4=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta4);
	$resultado_pregunta4=$db->execute($consulta_pregunta4);
	
	$consulta_hijos_pregunta4=sprintf("select * from %s where idpadre=%s",_TBLCATEGORIA,$pregunta4);
	$resultado_hijos_pregunta4=$db->execute($consulta_hijos_pregunta4);
	$arreglo_hijos_4=array();
	$arreglo_total_4=array();
	$suma4=0;
	while(!$resultado_hijos_pregunta4->EOF)
	{
		array_push($arreglo_hijos_4,$resultado_hijos_pregunta4->fields);	
	
		
		$consulta_total_pregunta4=sprintf("select count(valor_respuesta)as cantidad4 from %s where id_padre=%s and valor_respuesta='%s'",_TBL_PQR_ENCUESTA,$pregunta4,$resultado_hijos_pregunta4->fields['nombre']);
		$resultado_total_pregunta4=$db->execute($consulta_total_pregunta4);
		
		
		while(!$resultado_total_pregunta4->EOF)
		{
			
			array_push($arreglo_total_4,$resultado_total_pregunta4->fields);
			$suma4=$suma4 + $resultado_total_pregunta4->fields['cantidad4'];
			$resultado_total_pregunta4->MoveNext();
		}
		
		$resultado_hijos_pregunta4->MoveNext();
	}
	
	/*******************************************FP*******************************************************
	
	/***********************************************PREGUNTA 5 *************FP**********************/
	$consulta_pregunta5=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta5);
	$resultado_pregunta5=$db->execute($consulta_pregunta5);
	
	$consulta_hijos_pregunta5=sprintf("select * from %s where idpadre=%s",_TBLCATEGORIA,$pregunta5);
	$resultado_hijos_pregunta5=$db->execute($consulta_hijos_pregunta5);
	$arreglo_hijos_5=array();
	$arreglo_total_5=array();
	$suma5=0;
	while(!$resultado_hijos_pregunta5->EOF)
	{
		array_push($arreglo_hijos_5,$resultado_hijos_pregunta5->fields);	
	
		
		$consulta_total_pregunta5=sprintf("select count(valor_respuesta)as cantidad5 from %s where id_padre=%s and valor_respuesta='%s'",_TBL_PQR_ENCUESTA,$pregunta5,$resultado_hijos_pregunta5->fields['nombre']);
		$resultado_total_pregunta5=$db->execute($consulta_total_pregunta5);
		
		
		while(!$resultado_total_pregunta5->EOF)
		{
			
			array_push($arreglo_total_5,$resultado_total_pregunta5->fields);
			$suma5=$suma5 + $resultado_total_pregunta5->fields['cantidad5'];
			$resultado_total_pregunta5->MoveNext();
		}
		
		$resultado_hijos_pregunta5->MoveNext();
	}	
	/*******************************************PREGUNTA 6****************************************/
	$consulta_pregunta6=sprintf("select * from %s where idcategoria=%s",_TBLCATEGORIA,$pregunta6);
	$resultado_pregunta6=$db->execute($consulta_pregunta6);
	
	$consulta_hijos_pregunta6=sprintf("select * from %s where idpadre=%s",_TBLCATEGORIA,$pregunta6);
	$resultado_hijos_pregunta6=$db->execute($consulta_hijos_pregunta6);
	$arreglo_hijos_6=array();
	$arreglo_total_6=array();
	$suma6=0;
	while(!$resultado_hijos_pregunta6->EOF)
	{
		array_push($arreglo_hijos_6,$resultado_hijos_pregunta6->fields);	
	
		
		$consulta_total_pregunta6=sprintf("select count(valor_respuesta)as cantidad6 from %s where id_padre=%s and valor_respuesta like '%s'",_TBL_PQR_ENCUESTA,$pregunta6,$resultado_hijos_pregunta6->fields['nombre']);
		$resultado_total_pregunta6=$db->execute($consulta_total_pregunta6);
		
		
		while(!$resultado_total_pregunta6->EOF)
		{
			
			array_push($arreglo_total_6,$resultado_total_pregunta6->fields);
			$suma6=$suma6 + $resultado_total_pregunta6->fields['cantidad6'];
			$resultado_total_pregunta6->MoveNext();
		}
		
		$resultado_hijos_pregunta6->MoveNext();
	}
}
	/*******************************************FP********************************************************/
$smarty= new Smarty_Plantilla();
$smarty->assign('errores',$errores);
/**************** VARIABLES PREGUNTA 1 ********FP************/
$smarty->assign('pregunta1',$resultado_pregunta1->fields);
$smarty->assign('hijos_pregunta1',$arreglo_hijos_1);
$smarty->assign('total_hijos',$arreglo_total_1);
$smarty->assign('suma1',$suma1);
/***********************************************************/

/**************** VARIABLES PREGUNTA 2 ********FP************/
$smarty->assign('pregunta2',$resultado_pregunta2->fields);
$smarty->assign('hijos_pregunta2',$arreglo_hijos_2);
$smarty->assign('total_hijos2',$arreglo_total_2);
$smarty->assign('suma2',$suma2);
/***********************************************************/
/**************** VARIABLES PREGUNTA 3 ********FP************/
$smarty->assign('pregunta3',$resultado_pregunta3->fields);
$smarty->assign('hijos_pregunta3',$arreglo_hijos_3);
$smarty->assign('total_hijos3',$arreglo_total_3);
$smarty->assign('suma3',$suma3);
/***********************************************************/
/**************** VARIABLES PREGUNTA 4 ********FP************/
$smarty->assign('pregunta4',$resultado_pregunta4->fields);
$smarty->assign('hijos_pregunta4',$arreglo_hijos_4);
$smarty->assign('total_hijos4',$arreglo_total_4);
$smarty->assign('suma4',$suma4);
/***********************************************************/
/**************** VARIABLES PREGUNTA 4 ********FP************/
$smarty->assign('pregunta5',$resultado_pregunta5->fields);
$smarty->assign('hijos_pregunta5',$arreglo_hijos_5);
$smarty->assign('total_hijos5',$arreglo_total_5);
$smarty->assign('suma5',$suma5);
/**************** VARIABLES PREGUNTA 4 ********FP************/
$smarty->assign('pregunta6',$resultado_pregunta6->fields);
$smarty->assign('hijos_pregunta6',$arreglo_hijos_6);
$smarty->assign('total_hijos6',$arreglo_total_6);
$smarty->assign('suma6',$suma6);
$smarty->assign('totalB',$arratotales['BUENO']+$arratotales['SI']);
$smarty->assign('totalRM',$arratotales['REGULAR']+$arratotales['MALO']+$arratotales['NO']);

$esfiltro=false;
if(($arratotales['BUENO']+$arratotales['SI'])>0)
	$esfiltro = true;

$smarty->assign('esfiltro',$esfiltro);

$smarty->assign('desde',$desde);
$smarty->assign('hasta',$hasta);


$smarty->assign('ruta',_RUTABASE);
/***********************************************************/

$smarty->assign('lbl_titulo','Resultado de las Encuestas de Atención al Ciudadano <b>'._NOMBRESITIO.'</b>');

$resultado_pagina=$smarty->fetch('tpl_respuesta_encuesta.html');

return $resultado_pagina;
?>
