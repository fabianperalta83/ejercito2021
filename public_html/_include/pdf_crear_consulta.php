<?php

global $db; //** SE INCLUYE LA BASE DE DATOS**//
require(_DIR_INCLUDE.'/fpdf.php'); //** SE LLAMA LA LIBRERIA FPDF PARA LA CREACION DEL ARCHIVO PDF**/

$consulta_hash = getVariable('hash','');//** SE OPTIENE LA VARIABLE HASH PARA HACER LA CONSULTA**//

							//** SE REALIZAN LAS CONSULTAS NECESARIAS PARA CREAR EL PDF **//
$query = sprintf("SELECT solicitud_id, originador_id,solicitud_descripcion, creacion,medio_id FROM %s WHERE solicitud_hash = '%s'",_TBL_PQR_SOLICITUD,$consulta_hash);

$resultado = $db->Execute($query);
$fecha_actual=date('D:m:y');

$query1=sprintf("SELECT transaccion_respuesta,asunto_id,estado_id,tipo_id,dependencia_id,transaccion_id FROM %s WHERE solicitud_id = '%s'",_TBL_PQR_TRANSACCION,$resultado->fields['solicitud_id']);
$resultado2 = $db->Execute($query1);

$query3=sprintf("SELECT asunto_nombre FROM %s WHERE asunto_id = '%s'",_TBL_PQR_ASUNTO,$resultado2->fields['asunto_id']);
$resultado3 = $db->Execute($query3);

$query4=sprintf("SELECT estado_nombre FROM %s WHERE estado_id = '%s'",_TBL_PQR_ESTADO,$resultado2->fields['estado_id']);
$resultado4 = $db->Execute($query4);

$query5=sprintf("SELECT tipo_nombre FROM %s WHERE tipo_id = '%s'",_TBL_PQR_TIPO,$resultado2->fields['tipo_id']);
$resultado5 = $db->Execute($query5);

$query6=sprintf("SELECT dependencia_nombre FROM %s WHERE dependencia_id = '%s'",_TBL_PQR_DEPENDENCIA,$resultado2->fields['dependencia_id']);
$resultado6 = $db->Execute($query6);

$query7=sprintf("SELECT documento_nombre FROM %s WHERE transaccion_id = '%s'",_TBL_PQR_DOCUMENTO,$resultado2->fields['transaccion_id']);
	$resultado7 = $db->Execute($query7);
	

$query8=sprintf("SELECT medio_nombre FROM %s WHERE medio_id = '%s'",_TBL_PQR_MEDIO,$resultado->fields['medio_id']);
$resultado8 = $db->Execute($query8);

$query9=sprintf("SELECT originador_nombre FROM %s WHERE originador_id = '%s'",_TBL_PQR_ORIGINADOR,$resultado->fields['originador_id']);
$resultado9 = $db->Execute($query9);
						
//**---------------------------------- TERMINA LA CREACION DE LAS CONSULTAS -------------------------------------------FP----**//

//**-FP--------- SE CREAN LAS VARIABLES CON LA RUTA DONDE SE GUARDARA EL PDF Y DONDE SE LLAMARA EL ARCHIVO A INCLUIR--------**/

$carpeta_solicitud= $resultado->fields['solicitud_id']; //** SE CREA LA PRIMER CARPETA QUE LLEVA EL ID DE LA SOLICITUD**//
$carpeta_transaccion= $resultado2->fields['transaccion_id']; //* SE CREA LA SEGUNDA CARPETA QUE LLEVA EL ID DE LA TRANSACCION**//
$documento_nombre= $resultado7->fields['documento_nombre']; //* SE LLAMA EL NOMBRE DEL DOCUMENTO GUARDADO**//

						//**  FIN DE LA CREACION DE LAS CARPETAS PARA LA RUTA**//


//**------------------- SE DEFINE EL NOMBRE DEL ARCHIVO PDF QUE SE GUARDARA EN LA CARPETA DEL USUARIO----------------FP-- **//
//$nombre_archivo_pdf= "$carpeta_solicitud-$carpeta_transaccion.pdf";
$nombre_archivo_pdf= "Vista de impresion solicitud $carpeta_solicitud.pdf";

//**-------------------  SE CREA LA RUTA DONDE SE LLAMARAN LOS ARCHIVOS Y DONDE SE GUARDARA EL PDF --------------------FP--**//
$ruta=_URL. $carpeta_solicitud . '/' . $carpeta_transaccion . '/' . $documento_nombre;
$ruta2=_DIRRECURSOS_USER_PQR. '/'. $carpeta_solicitud . '/' . $carpeta_transaccion . '/' .$nombre_archivo_pdf;


//**---------------------------- SE CREA EL ARCHIVO PDF CON LOS DATOS QUE EL USUARIO PUEDE VER -------------------------FP-**/


$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetMargins(30,10,20);
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor('200','100','80');
$pdf->Cell(150,10,'');
$pdf->Cell(40,10,'CONSULTA DE UNA SOLICITUD',0,0,'R',0,'');
$pdf->ln();
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor('80','100','200');
$pdf->Cell(40,10,'Solicitud:');
$pdf->Line(180,27,30,27);
$pdf->ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Consecutivo:',0,0,'',0);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('200','200','200');
//$pdf->Cell(40,5,'pqr_solicitud / solicitud_id');
$pdf->Cell(40,5,$resultado->fields['solicitud_id']);
$pdf->Cell(40,5);
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Origen:',0,0,'',0);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('200','200','200');
$pdf->Cell(40,5,$resultado9->fields['originador_nombre']);
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Medio de Recepción:');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('200','200','200');
$pdf->Cell(40,5,$resultado8->fields['medio_nombre']);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Fecha de Creación:');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('200','200','200');
$pdf->Cell(40,5,$resultado->fields['creacion']);
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Solicitud:');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('200','200','200');
$pdf->Cell(40,5,$resultado->fields['solicitud_descripcion']);
$pdf->ln(5);
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor('80','100','200');
$pdf->Cell(40,10,'Estado Actual:');
$pdf->Line(180,62,30,62);
$pdf->ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Estado');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('200','200','200');
$pdf->Cell(40,5,$resultado4->fields['estado_nombre']);
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Tipo de Solicitud:');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('200','200','200');
$pdf->Cell(40,5,$resultado5->fields['tipo_nombre']);
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Asunto:');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('200','200','200');
$pdf->Cell(40,5,$resultado3->fields['asunto_nombre']);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Responsable:');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('200','200','200');
$pdf->Cell(40,5,$resultado6->fields['dependencia_nombre']);
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Respuesta:');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('200','200','200');
$pdf->Cell(40,5,$resultado2->fields['transaccion_respuesta']);
$pdf->ln(7);
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor('80','100','200');
$pdf->Cell(40,5,'Documentos:');
$pdf->Line(180,97,30,97);
$pdf->ln(7);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor('0','0','300');
$pdf->Cell(40,5,$resultado7->fields['documento_nombre'],0,0,'',0,$ruta); //** SE GUARDA EL ARCHIVO PDF EN LA RUTA ESPECIFICADA **//
$pdf->Output($ruta2,'F');

								/** FIN DE LA CREACION DEL ARCHIVO PDF*/

//** ------------------------ SE INSERTA EL DOCUMENTO EN LA BASE DE DATOS TENIENDO EN CUENTA LA TRANSACCION--------------FP--*//
$doc_id="";
$tipo_doc=1;
$elim=0;
$coment="";
				
$date=date('y-m-d M:i:s');
$envio_datos_pdf = 'insert into pqr_documento (' .
	'documento_id,' .
	'tipo_documento_id,' .
	'transaccion_id,' .
	'documento_nombre,' .
	'creacion,' .
	'modificacion,' .
	'eliminado,' .
	'comentario) ' .
	'values ("' . $doc_id . '",
		' . $tipo_doc . ',
		"' . $carpeta_transaccion . '",
		"' . $nombre_archivo_pdf . '",
		"' . $date . '",
		"' . $date . '",
		"' . $elim . '",
		"' . $coment . '")';
	$envio=$db->Execute($envio_datos_pdf);


								
//** ----------------------------FINALIZA LA FUNCION DE CREACION DEL ARCHIVO PDF DEL PQR DE ARMADA--------------------FP--- **//	

?>