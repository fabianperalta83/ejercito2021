<?php
require ('fpdf.php');
global $db;

$pdf = new FPDF();


/**************************************************************************/
/************* Script que genera un pdf del reporte general ***************/

$p=0;


$encabezado[0]['titulo']='Pend';
$encabezado[1]['titulo']='Res';
$encabezado[2]['titulo']='Inc';
$encabezado[3]['titulo']='Desis';
$encabezado[4]['titulo']='Rec';

$pdf->AddPage('P');
$pdf->SetMargins(0,0);

$pdf->SetFont('Arial','B',16);
$pdf->SetDisplayMode('real');
$pdf->SetTitle('Reporte General');
//$pdf->Cell(70);

$pdf->SetFillColor(255,255,255);
$pdf->image(_RUTABASE.'_templates/Default/recursos/images/logo_izq.jpg', 10,0, 30,30);
$pdf->setxy(50,10);
$pdf->Cell(0,0,'REPORTE GENERAL ATENCIÓN AL CIUDADANO',0,0,'C',1);
$pdf->ln(25);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(0,0,'* Pend: Pendientes.',0,0,'L',1);
$pdf->ln(5);
$pdf->SetX(10);
$pdf->Cell(0,0,'* Res: Resueltas.',0,0,'L',1);
$pdf->ln(50);
$pdf->SetX(10);
$pdf->Cell(0,0,'* Inc: Incompletos.',0,0,'L',1);
$pdf->SetXY(60,25);
$pdf->Cell(0,0,'* Des: Desistimientos.',0,0,'L',1);
$pdf->ln(5);
$pdf->SetX(60);
$pdf->Cell(0,0,'* Rec: Recibidos.',0,0,'L',1);
$pdf->ln(30);

// Hecho por Alex
/*
$pdf->SetFillColor(255,255,255);
$pdf->image('_templates/Default/recursos/images/cabezotes/logo_izq.jpg', 10,2, 57,20);
$pdf->setxy(60,10);
$pdf->Cell(0,0,'REPORTE GENERAL ATENCIÓN AL CIUDADANO',0,0,'C',1);
$pdf->setxy(60,14);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,'ARMADA NACIONAL',0,0,'C',1);
$pdf->setxy(60,18);
$pdf->Cell(0,0,'REPÚBLICA DE COLOMBIA',0,0,'C',1);
$pdf->ln(5);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',8);
$pdf->SetX(8);
$pdf->Cell(0,0,'* Pend: Pendientes.',0,0,'L',1);
$pdf->SetX(50);
$pdf->Cell(0,0,'* Res: Resueltas.',0,0,'L',1);
$pdf->SetX(90);
$pdf->Cell(0,0,'* Inc: Incompletos.',0,0,'L',1);
$pdf->SetX(130);
$pdf->Cell(0,0,'* Desis: Desistimientos.',0,0,'L',1);
$pdf->SetX(178);
$pdf->Cell(0,0,'* Rec: Recibidos.',0,0,'L',1);
$pdf->ln();
*/
$i=0;
	
/******************************************************************************************************/
$sql_tipo = sprintf('SELECT tipo_nombre, tipo_id from %s where eliminado=0', _TBL_PQR_TIPO);

$resultado_tipo = $db->Execute($sql_tipo);
$infotipo = array();

while(!$resultado_tipo->EOF)
{
	$fila_tipo = $resultado_tipo->fields;
	
	array_push($infotipo,$fila_tipo);
	
	$resultado_tipo->MoveNext();
}

$sql_estado = sprintf('SELECT estado_nombre, estado_id from %s where eliminado=0', _TBL_PQR_ESTADO);

$resultado_estado = $db->Execute($sql_estado);
$infoestado = array();

while(!$resultado_estado->EOF)
{
	$fila_estado = $resultado_estado->fields;
	
	array_push($infoestado,$fila_estado);
	
	$resultado_estado->MoveNext();
}

/*******************************************************************************************************/
//var_dump($infotipo);
//die();

$sql_dependencia = sprintf('SELECT dependencia_id, dependencia_nombre FROM %s where eliminado=0', _TBL_PQR_DEPENDENCIA);
//echo " hijos de padre ".$id_padre."<br>".$sql_hijos."<br>";

$resultado_dependencia = $db->Execute($sql_dependencia);
$i=0;

//$dependencia = array();
$infodependencia = array();
/****************************************************************************/
while(!$resultado_dependencia->EOF)
{
	
	$nombre_dependencia	= $resultado_dependencia->fields['dependencia_nombre'];
	$id_dependencia		= $resultado_dependencia->fields['dependencia_id'];
	//echo $nombre_dependencia."<br>";
	
	$sql_consulta_solicitudes=sprintf(
				'SELECT s.solicitud_id, t.transaccion_id, t.tipo_id as tipo, t.estado_id as estado ' .
				'FROM %s s, %s t, %s e ' .
				'WHERE t.solicitud_id=s.solicitud_id and dependencia_id=' . $id_dependencia .
				' and t.transaccion_id in (' .
					'SELECT max(t2.transaccion_id) ' .
					'FROM pqr_solicitud s2, pqr_transaccion t2 ' .
					'WHERE t2.solicitud_id=s2.solicitud_id ' .
				'GROUP BY s2.solicitud_id) GROUP BY s.solicitud_id'
				,_TBL_PQR_SOLICITUD,_TBL_PQR_TRANSACCION, _TBL_PQR_ESTADO);
				
				$resultado_consulta = $db->Execute($sql_consulta_solicitudes);
				
				//echo $resultado_consulta->NumRows()."<br>";
	//echo "<br>".$sql_consulta_solicitudes."<br><br>";			
	//$total_recibidos = $resultado_consulta->NumRows();
	$total_recibidos=0;
	while(!$resultado_consulta->EOF)
	{
		for($c=0; $c<count($infotipo);$c++)
		{
			if($infotipo[$c]['tipo_id']==$resultado_consulta->fields['tipo'])
			{
				for ($i=0; $i<count($infoestado);$i++)
				{
					if($infoestado[$i]['estado_id']==$resultado_consulta->fields['estado'])
					{
						$total_recibidos++;
					}
				}								
				//$c=count($infotipo);
			}		
		}
		$resultado_consulta->MoveNext();
	}
	//$dependencia[$nombre_dependencia]['RECIBIDOS']['recibido']=$total_recibidos;
	for($c=0;$c<count($infotipo);$c++)
	{
				//echo $infotipo[$c]['tipo_descripcion']."<br>";
				
		for ($i=0; $i<count($infoestado);$i++)
		{		
				$sql_consulta_solicitudes=sprintf(
				'SELECT s.solicitud_id, t.transaccion_id, t.estado_id as estado ' .
				'FROM %s s, %s t ' .
				'WHERE t.solicitud_id=s.solicitud_id and dependencia_id=' . $id_dependencia .
				' and tipo_id = %s and t.estado_id=%s and t.transaccion_id in (' .
					'SELECT max(t2.transaccion_id) ' .
					'FROM pqr_solicitud s2, pqr_transaccion t2 ' .
					'WHERE t2.solicitud_id=s2.solicitud_id ' .
				'GROUP BY s2.solicitud_id) GROUP BY s.solicitud_id'
				,_TBL_PQR_SOLICITUD,_TBL_PQR_TRANSACCION,$infotipo[$c]['tipo_id'], $infoestado[$i]['estado_id']);
				
				$resultado_consulta = $db->Execute($sql_consulta_solicitudes);
				$tipo = $infotipo[$c]['tipo_nombre'];
				$estado = $infoestado[$i]['estado_nombre'];
				//echo $estado." Estado 1<br>";
				//while(!$resultado_consulta->EOF)
				//{
					
					//echo "- ".$resultado_consulta->fields['estado']." estado <br>";
					//$resultado_consulta->MoveNext();
				
					//echo $sql_consulta_solicitudes."<br>";
					/*echo $resultado_consulta->fields['estado']."<br>";*/
					//echo $nombre_dependencia." ND <br>";
					//echo $tipo." tipo <br>";
					$dependencia[$nombre_dependencia][$tipo][$estado] = $resultado_consulta->NumRows();
				//}
		}
	}	
	
	
	$resultado_dependencia->MoveNext();
}
$numero=0;
$seguir=1;
$totalde = count($dependencia);
$pdf->SetMargins(30,0);

//$pdf->Cell(23,4,count($dependencia),1,0,'C',1);
//$pdf->ln();
$numdep = 0;
$y=0;

			
	foreach ($dependencia as $indice => $valor)
	{
		
		if(($numero % 12)==0 and $numero!=0)
		{
			$pdf->AddPage('P');
			//$pdf->SetMargins(10,0);
			$pdf->SetY(10);
			$y=0;
			//$pdf->ln(20);			
		}
		
		if(($numero%2)==0)
		{
			$y+=40;
			$pdf->SetLeftMargin(10);
			$pdf->SetY($y);
			//$pdf->SetX(105);
		}
		else 
		{
			$pdf->SetLeftMargin(110);
			$pdf->SetY($y);
			
		}
			//$pdf->ln(10);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(23,4,'Tipo/Jefatura',1,0,'C',0);
			
		//}
		
		//echo "<br>".$indice." <br> ";
		$largo=70;//strlen($indice)+30;
		
		if($largo<40)
		{
			$largo=40;			
		}
		$pdf->Cell($largo,4,$indice,1,0,'C',1);
		$encab[$numdep]['tamano']=$largo;
		$numero++;
		
		
		/*if(($numero % 3)==0 or $numero==$totalde)
		{*/
			
			$pdf->ln();
			$pdf->Cell(23,4,'',1,0,'C',1);
			
			for($t=0; $t<=$numdep;$t++)
			{
				for($e=0;$e<5;$e++)
				{
					$pdf->Cell($encab[$t]['tamano']/5,4,$encabezado[$e]['titulo'],1,0,'C',1);			
				}
			}
			$pdf->ln();
			//$numdep=0;	
			$seguir = 1;
		/*}
		else 
		{
			$seguir=0;*/
		
			$numdep++;			
		//}
	

		/*if($seguir==1)
		{*/
			$totalt=0;	
			foreach ($valor as $tipo => $value)
			{
				$pdf->SetFont('Arial','B',8);					
				$pdf->Cell(23,4,$tipo,1,0,'C',1);
					//$pdf->ln();
				
				
				//echo $tipo." <br> ";
				//$pdf->ln(10);
//$pdf->Cell(23,4,count($dependencia)." este",1,0,'C',1);
				
				for($t=0;$t<$numdep;$t++)
				{
					$total=0;
					$pendientes = 0;
					foreach ($value as $estado => $vestado)
					{
							//echo " ".$estado." - ";
							//$pdf->Cell(23,4,$numdep,1,0,'C',1);	
						$pendientes;
						if($estado=='Abierto' or $estado=='En trámite')
						{
							$pendientes+=$vestado;
						}
							
						if($estado!='Abierto' and $estado!='En trámite')
						{	
							$pdf->SetFont('Arial','',8);					
							$pdf->Cell($encab[$t]['tamano']/5,4,$vestado,1,0,'C',1);											
							$total+=$vestado;
						}
						elseif($estado=='En trámite')
						{
							$pdf->SetFont('Arial','B',8);
							$pdf->Cell($encab[$t]['tamano']/5,4,$pendientes,1,0,'C',1);
							$tamano = $encab[$t]['tamano'];											
							$total+=$pendientes;						
						}
					}
							//echo $vestado."<br/>";
				$totalt+=$total;						
				$pdf->Cell($encab[$t]['tamano']/5,4,$total,1,0,'C',1);			
				}
					$pdf->ln();
					
			}
				$pdf->SetFont('Arial','B',8);			
				$pdf->Cell(23,4,"Total Recibidas",1,0,'C',1);	
				$pdf->Cell($tamano,4,$totalt,1,0,'C',1);	
				$totalt=0;		
				$numdep=0;
				
				//echo " Total ".$total."<br>";							
		//}
			//$numdep=0;
	//$pdf->ln(10);
	}
	
	
/****************************************************************************/



//var_dump($infodependencia);
//die();

/*while(!$resultado_dependencia->EOF)
{
	
	$largo=strlen($resultado_dependencia->fields['dependencia_nombre'])+20;
	$pdf->Cell(63,4,$resultado_dependencia->fields['dependencia_nombre'],1,0,'C',1);
	
	if($i==2)
	{
		$descripcion_tipo = sprintf('SELECT tipo_nombre, tipo_id FROM %s', _TBL_PQR_TIPO);
		$resultado_descripcion = $db->Execute($descripcion_tipo);
		$pdf->ln();
		$pdf->Cell(23,4,'',1,0,'C',1);
		for($c1=0;$c1<=2;$c1++)
		{
			for($c=0;$c<=4;$c++)
			{
				$sub = 63/5;
				$pdf->Cell($sub,4,$encabezado[$c],1,0,'C',1);
			}	
		
					
		}
		$pdf->ln();
		while(!$resultado_descripcion->EOF)
		{
			$pdf->SetFillColor(255,255,255);
			//$pdf->ln();
			
			$pdf->Cell(23,4,$resultado_descripcion->fields['tipo_nombre'],1,0,'C',1);
			
			$selecciona_maxima = sprintf('select max(transaccion_id) 
			from %s where dependencia_id=%s and tipo_id = %s
			group by solicitud_id', _TBL_PQR_TRANSACCION, $resultado_dependencia->fields['dependencia_id'],
			$resultado_descripcion->fields['tipo_id']);
			
			//echo $selecciona_maxima."<br>";
			$numero_solicitudes = $db->Execute($selecciona_maxima);
			
			$sub = 63/5;
			$pdf->Cell($sub,4,$numero_solicitudes->NumRows(),1,0,'C',1);
			
			//$busca_hijos = buscaHijos($resultado_descripcion->fields['tipo_id']);
			$resultado_descripcion->MoveNext();
			$pdf->ln();
		}
		
		if($p==8)
			{
				$pdf->AddPage('L');
				$pdf->SetMargins(30,30);
				$pdf->Cell(0,30,'',0,0,'C',0);
				$p=0;		
			}
		$pdf->ln();
		$pdf->Cell(23,4,'Tipo / Jefatura',1,0,'C',1);
		$i=0;
	}
	else 
	{
		$i++;
					
	}
		
		
	$resultado_dependencia->MoveNext();
$p++;

	
}
$i--;
$pdf->ln();
$pdf->Cell(23,4,'',1,0,'C',1);
for($c1=0;$c1<=$i;$c1++)
		{
			for($c=0;$c<=4;$c++)
			{
				$sub = 63/5;
				$pdf->Cell($sub,4,$encabezado[$c],1,0,'C',1);
			}	
		
					
		}
$descripcion_tipo = sprintf('SELECT tipo_nombre, tipo_id FROM %s', _TBL_PQR_TIPO);
$resultado_descripcion = $db->Execute($descripcion_tipo);
$pdf->ln();

while(!$resultado_descripcion->EOF)
{
	$pdf->SetFillColor(255,255,255);
	//$pdf->ln();
	$pdf->Cell(23,4,$resultado_descripcion->fields['tipo_nombre'],1,0,'C',1);
	$busca_hijos = buscaHijos($resultado_descripcion->fields['tipo_id']);
	$resultado_descripcion->MoveNext();
	$pdf->ln();
}	
*/

$pdf->Output();


function buscaHijos($tipo_id,$id_padre='0')
{
	global $db;
	$dependencia = array();
	$datos = array();
	//echo "idpadre ".$id_padre."<br>";
	$sql_hijos = sprintf('SELECT dependencia_id, dependencia_nombre FROM %s WHERE dependencia_id_padre=%s', _TBL_PQR_DEPENDENCIA, $id_padre);
	//echo " hijos de padre ".$id_padre."<br>".$sql_hijos."<br>";
	
	$resultado_hijos = $db->Execute($sql_hijos);
	$dependencia['dependencia_nombre'] = $resultado_hijos->fields['dependencia_nombre'];
	//echo "numero de hijos ".$resultado_hijos->NumRows()."<br>";
	if($resultado_hijos->NumRows()>0)
	{
		//echo $resultado_hijos->NumRows()."<br>";
		while(!$resultado_hijos->EOF)
		{
			$select_estado = sprintf('SELECT estado_id, estado_nombre FROM %s', _TBL_PQR_ESTADO);
			$estado = $db->Execute($select_estado);
			while(!$estado->EOF)
			{
				$transaccion_max = sprintf('SELECT max(transaccion_id) as ultima, estado_id FROM %s WHERE dependencia_id=%s and tipo_id=%s and estado_id=%s GROUP BY solicitud_id', _TBL_PQR_TRANSACCION, $id_padre, $tipo_id, $estado->fields['estado_id']);
				$rtransaccion = $db->Execute($transaccion_max);
				//$dependencia['dependencia_nombre'] = $resultado_hijos->fields['dependencia_nombre'];
				$dependencia['estado'] = $estado->fields['estado_nombre'];
				$dependencia['cantidad'] = $rtransaccion->NumRows();		
				array_push($datos, $dependencia);
				//echo $transaccion_max." - ".$rtransaccion->NumRows()."<br>";
				$estado->MoveNext();
			}
			buscaHijos($tipo_id,$resultado_hijos->fields['dependencia_id']);
			$resultado_hijos->MoveNext();
		}
		
	}
	else 
	{
		//echo "aqui";
		$sql_hijos = sprintf('SELECT dependencia_id, dependencia_nombre FROM %s WHERE dependencia_id_padre=%s', _TBL_PQR_DEPENDENCIA, $id_padre);
	//echo " hijos de padre ".$id_padre."<br>".$sql_hijos."<br>";
	$resultado_hijos = $db->Execute($sql_hijos);
		while(!$resultado_hijos->EOF)
		{
				$select_estado = sprintf ('SELECT estado_id, estado_nombre FROM %s', _TBL_PQR_ESTADO);
				$estado = $db->Execute($select_estado);
					while(!$estado->EOF)
				{
					$transaccion_max = sprintf('SELECT max(transaccion_id) as ultima, estado_id FROM %s WHERE dependencia_id=%s and tipo_id=%s and estado_id=%s GROUP BY solicitud_id', _TBL_PQR_TRANSACCION, $id_padre, $tipo_id, $estado->fields['estado_id']);
					$rtransaccion = $db->Execute($transaccion_max);
					$dependencia['dependencia_nombre'] = $resultado_hijos->fields['dependencia_nombre'];
					$dependencia['estado'] = $estado->fields['estado_nombre'];
					$dependencia['cantidad'] = $rtransaccion->NumRows();	
					array_push($datos, $dependencia);
					//echo $transaccion_max." - ".$rtransaccion->NumRows()."fin<br>";
					
					$estado->MoveNext();
				}
			$resultado_hijos->MoveNext();		
		}	
	}
	//var_dump($datos);
	return $datos;
	
}

?>