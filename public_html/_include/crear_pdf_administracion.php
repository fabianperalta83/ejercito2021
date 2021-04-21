<?php
require_once('../_config/constantes.php');
require_once(_DIRCORE.'Funciones.class.php');
require_once(_RUTABASE.'_config/variables.php');
//require_once(_DIRLIB.'pqr/Transaccion.class.php');
require_once(_DIRLIB.'pqr/Solicitante.class.php');
require_once(_DIRLIB.'pqr/Solicitud.class.php');
require_once(_DIRLIB.'pqr/Tabla.class.php');


global $db; //** SE INCLUYE LA BASE DE DATOS**//

require('fpdf.php'); //** SE LLAMA LA LIBRERIA FPDF PARA LA CREACION DEL ARCHIVO PDF**/

$consulta_solicitud = $_REQUEST['id_enviada'];//** SE OPTIENE LA VARIABLE HASH PARA HACER LA CONSULTA**//
$ubicacion=$_REQUEST['ubicacion'];
							//** SE REALIZAN LAS CONSULTAS NECESARIAS PARA CREAR EL PDF **//
$consulta1 = sprintf("SELECT * FROM %s WHERE  solicitud_id= '%s'",_TBL_PQR_SOLICITUD,$consulta_solicitud);
$dato1 = $db->Execute($consulta1);

$consulta2 = sprintf("SELECT * FROM %s WHERE  solicitante_id= '%s'",_TBL_PQR_SOLICITANTE,$dato1->fields['solicitante_id']);
$dato2 = $db->Execute($consulta2);

$consulta3 = sprintf("SELECT * FROM %s WHERE  tipo_identificacion_id= '%s'",_TBL_PQR_TIPOIDENTIFICACION,$dato2->fields['tipo_identificacion_id']);
$dato3 = $db->Execute($consulta3);

$consulta4 = sprintf("SELECT * FROM %s WHERE  transaccion_id= '%s'",_TBL_PQR_TRANSACCION,$dato1->fields['estado_actual']);
$dato4 = $db->Execute($consulta4);


/*
$consulta_conteo = sprintf("SELECT * FROM %s WHERE  solicitud_id= '%s'",_TBL_PQR_TRANSACCION,$consulta_solicitud);
$dato_conteo = $db->Execute($consulta_conteo);*/

$consulta5 = sprintf("SELECT * FROM %s WHERE  tipo_id= '%s'",_TBL_PQR_TIPO,$dato4->fields['tipo_id']);
$dato5 = $db->Execute($consulta5);

$consulta6 = sprintf("SELECT * FROM %s WHERE  originador_id= '%s'",_TBL_PQR_ORIGINADOR,$dato1->fields['originador_id']);
$dato6 = $db->Execute($consulta6);

$consulta7 = sprintf("SELECT * FROM %s WHERE  medio_id= '%s'",_TBL_PQR_MEDIO,$dato1->fields['medio_id']);
$dato7 = $db->Execute($consulta7);

$consulta8 = sprintf("SELECT * FROM %s WHERE  estado_id= '%s'",_TBL_PQR_ESTADO,$dato4->fields['estado_id']);
$dato8 = $db->Execute($consulta8);

$consulta9 = sprintf("SELECT * FROM %s WHERE  asunto_id= '%s'",_TBL_PQR_ASUNTO,$dato4->fields['asunto_id']);
$dato9 = $db->Execute($consulta9);

$consulta10 = sprintf("SELECT * FROM %s WHERE  dependencia_id= '%s'",_TBL_PQR_DEPENDENCIA,$dato4->fields['dependencia_id']);
$dato10 = $db->Execute($consulta10);

$consulta_nueva = sprintf("SELECT min(transaccion_id) as dato FROM %s WHERE  solicitud_id= '%s'",_TBL_PQR_TRANSACCION,$consulta_solicitud);
$dato_nuevo = $db->Execute($consulta_nueva);


$consulta_documentos = sprintf("SELECT * FROM %s WHERE  transaccion_id= '%s'",_TBL_PQR_DOCUMENTO,$dato_nuevo->fields['dato']);
$dato_doc=$db->Execute($consulta_documentos);



$consulta11 = sprintf("SELECT * FROM %s WHERE  tipo_documento_id= '%s'",_TBL_PQR_TIPODOCUMENTO,$dato_doc->fields['tipo_documento_id']);
$dato11 = $db->Execute($consulta11);


$tipo=$dato3->fields['tipo_identificacion_nombre'];//**
$doc=$dato2->fields['solicitante_identificacion'];//**
$tipo_y_doc="$tipo $doc";///****

//**----------------------------------------------RUTA DEL ARCHIVO ADJUNTO-----------------------FP-------------------------**//
$ruta_carpeta_solicitud=$dato1->fields['solicitud_id'];
$ruta_carpeta_transaccion=$dato4->fields['transaccion_id'];
$nombre_archivo=$dato_doc->fields['documento_nombre'];


$diseno=_RUTABASE.'_templates/Default/recursos/images/back_2.png';
$ruta_logo_entidad=_RUTABASE.'_templates/Default/recursos/images/logo.jpg';


$pdf=new Tabla();
$pdf->AddPage();
$pdf->SetDisplayMode(100);
$pdf->SetMargins(20,10,20);
$pdf->ln(0);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor('200','100','80');
$pdf->Cell(150,10,'');
//$pdf->Image($diseno,0,0,20,300,'','');
$pdf->Image($ruta_logo_entidad,16,5,30,30,'','');
$pdf->Cell(1,10,'GESTION DE SOLICITUDES',0,0,'R',0,'');
$pdf->ln(25);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor('999','999','999');
$pdf->Cell(0,5,'Solicitante',0,0,'C',1,'');
//$pdf->Line(180,48,30,48);
$pdf->ln(6);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Nombre:',0,0,'',0);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato2->fields['solicitante_nombre']);//** NOMBRE
$pdf->Cell(40,5);
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Identificacion:',0,0,'',0);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$tipo_y_doc);//** TIPO Y DOCUMENTO DE IDENTIDAD
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Correo Electrónico:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato2->fields['solicitante_email']);//** EMAIL
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Telefono:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato2->fields['solicitante_telefono_1']);//** TELEFONO
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Celular:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato2->fields['solicitante_telefono_2']);//**CELULAR

$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Ubicación:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$ubicacion,0,'','','','');

$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Dirección:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato2->fields['solicitante_direccion']);//**DIRECCION
$pdf->ln(7);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor('999','999','999');
$pdf->Cell(0,5,'Solicitud',0,0,'C',1,'');
//$pdf->Line(180,88,30,88);
$pdf->ln(6);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Consecutivo');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$consulta_solicitud);
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Tipo de Solicitud:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato6->fields['originador_nombre']);//** ORIGINADOR
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Medio de Recepción:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato7->fields['medio_nombre']);//** MEDIO DE RECEPCION
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Fecha:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato1->fields['creacion']);//** FECHA DE CREACION
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Solicitud:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->SetWidths(array(120));
$pdf->SetAligns(array('J'));
$pdf->Row(array($dato1->fields['solicitud_descripcion']));//** SOLICITUD
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Hash:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->SetWidths(array(15));
$pdf->SetAligns(array('J'));
$pdf->Row(array($dato1->fields['solicitud_hash']));//** SOLICITUD
$pdf->ln(7);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor('999','999','999');
$pdf->Cell(0,5,'Estado Actual',0,0,'C',1,'');
$pdf->ln(6);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Estado:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato8->fields['estado_nombre']);//** ESTADO
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Tipo de Solicitud:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato5->fields['tipo_nombre']);//** TIPO DE SOLICITUD
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Asunto:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato9->fields['asunto_nombre']);//** ASUNTO
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Responsable:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato10->fields['dependencia_nombre']);//**RESPONSABLE
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Resumen:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->SetWidths(array(120));
$pdf->SetAligns('J');
$pdf->Row(array($dato4->fields['transaccion_resumen']));//** RESUMEN
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Respuesta:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->SetWidths(array(120));
$pdf->SetAligns('J');
$pdf->Row(array($dato4->fields['transaccion_respuesta']));//** RESPUESTA
$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor('0','0','0');
$pdf->Cell(40,5,'Plazo en días:');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor('000','000','000');
$pdf->Cell(40,5,$dato4->fields['tipo_plazo_total']);//** plazo total
$pdf->ln(7);
//$pdf->Line(180,123,30,123);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor('999','999','999');
$pdf->Cell(0,5,'Documentos',0,0,'C',1,'');
//$pdf->Line(180,167,30,167);


//**-------------------------------MPRESION DE LOS ARCHIVOS ADJUNTOS DE LA CARPETA DEL USUARIO------------------------FP---**/

//var_dump($consulta_documentos);
//var_dump($dato_doc);
foreach ($dato_doc as $doc )
{
		//$ruta_archivo_adjunto=_DIRRECURSOS_USER_PQR. '/'. $ruta_carpeta_solicitud . '/' . $ruta_carpeta_transaccion . '/' .$doc['documento_nombre'];
		$pdf->ln(6);
		$pdf->SetFont('Arial','B',8);
		$pdf->SetTextColor('0','0','0');
		$pdf->Cell(40,5,'Documentos Adjuntos:');
		$pdf->SetFont('Arial','U',8);
		$pdf->SetTextColor('000','52','255');
		$pdf->Cell(45,5,$doc['documento_nombre'],0,0,'',0,'');//** ARCHIVO ADJUNTO
		$pdf->SetFont('Arial','B',8);
		$pdf->SetTextColor('0','0','0');
		$pdf->Cell(30,5,'Tipo de Documento:');
		$pdf->SetFont('Arial','',8);
		$pdf->SetTextColor('000','000','000');
		$pdf->Cell(30,5,$dato11->fields['tipo_documento_nombre'],0,0,'',0,'');//** ARCHIVO ADJUNTO

}

//**------------------------------------------FIN DE LA GENERACION DE LOS ARCHIVOS-----------------------------FP--------- **//


//** EMPIEZA EL HISTORICO DE CAMBIOS **//

$pdf->ln(15);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor('999','999','999');
$pdf->Cell(0,5,'Historico de Cambios',0,0,'C',1,'');



$consulta_prueba = sprintf("SELECT * FROM %s WHERE  solicitud_id= '%s' ORDER BY creacion",_TBL_PQR_TRANSACCION,$dato4->fields['solicitud_id']);
$dato_prueba = $db->Execute($consulta_prueba);

$consulta_usuario = sprintf("SELECT * FROM %s WHERE  idusuario= '%s'",_TBLUSUARIO,$dato2->fields['idusuario']);
$dato_usuario = $db->Execute($consulta_usuario);

//$cantidad = $dato_prueba->NumRows();

$numeroTransacciones=count($dato_prueba);

if($dato_prueba)
	{
			
	$variable1 = $dato_prueba->GetRows();
	
	}
	
	$pdf->ln(10);
		$pdf->SetFont('Arial','B',7);
		$pdf->SetTextColor('999','999','999');
		$pdf->AliasNbPages('');
		//$pdf->Cell(10,4,'Nro',1,0,'C',1);
		$pdf->Cell(30,4,'Campo Modificado',1,0,'C',1);
		$pdf->Cell(47.5,4,'Valor Inicial',1,0,'C',1);
		$pdf->Cell(47.5,4,'Valor Final',1,0,'C',1);
		$pdf->Cell(25,4,'Funcionario',1,0,'C',1);
		$pdf->Cell(20,4,'Fecha',1,0,'C',1);
	$pdf->ln();




	//$id1=new Transaccion($consulta_solicitud);
		$respuesta_anterior = '';
		$resumen_anterior='';
		$dependencia_anterior='';
		$asunto_anterior='';
		$estado_anterior='';
		$tipo_solicitud_anterior='';
		$tipo_plazo_anterior='';
		$responsable_anterior='';
		$usuario_id='';
		$cont=0;
	
//**-------------------------------------------INICIO DE LAS COMPARACIONES Y IMPRESION DEL HISTORIAL----------FP------------**//
foreach ($variable1 as $var )
{
	
	if($respuesta_anterior =='')
	{
		$respuesta_anterior= $var['transaccion_respuesta'];
	}
	elseif($respuesta_anterior!= $var['transaccion_respuesta'])
	
		{
			$pdf->SetFont('Arial','B',5);
			$pdf->SetTextColor('000','000','000');
			$pdf->SetWidths(array(30,47.5,47.5,25,20));
			$pdf->SetAligns(array('J','J','J','J','C'));
			$pdf->Row(array('RESPUESTA',$respuesta_anterior,$var['transaccion_respuesta'],$var['usuario_id_2'],$var['creacion']));
			
		}
		
			$respuesta_anterior = $var['transaccion_respuesta'];
				
	if($resumen_anterior=='')
	{
		$resumen_anterior= $var['transaccion_resumen'];
	}
			
	elseif($resumen_anterior!= $var['transaccion_resumen'])
		{
			$pdf->SetFont('Arial','B',5);
			$pdf->SetTextColor('000','000','000');
			$pdf->SetAligns(array('J','J','J','J','C'));
			$pdf->SetWidths(array(30,47.5,47.5,25,20));
			$pdf->Row(array('RESUMEN',$resumen_anterior,$var['transaccion_resumen'],$var['usuario_id_2'],$var['creacion']));
		}
		
		$resumen_anterior = $var['transaccion_resumen'];
		
		
	if($dependencia_anterior=='')
	{
		$dependencia_anterior!= $var['dependencia_id']; 
	}
			
	elseif($dependencia_anterior!= $var['dependencia_id'])
		{
			$consulta_depend= sprintf("SELECT * FROM %s WHERE  dependencia_id= '%s'",_TBL_PQR_DEPENDENCIA,$dependencia_anterior);
			$consulta_depend1= sprintf("SELECT * FROM %s WHERE  dependencia_id= '%s'",_TBL_PQR_DEPENDENCIA,$var['dependencia_id']);
			
			
			$dato_depend = $db->Execute($consulta_depend);
			$dato2_depend = $db->Execute($consulta_depend1);
			$pdf->SetFont('Arial','B',5);
			$pdf->SetTextColor('000','000','000');
			$pdf->SetWidths(array(30,47.5,47.5,25,20));
			$pdf->SetAligns(array('J','J','J','J','C'));
			$pdf->Row(array('DEPENDENCIA',$dato_depend->fields('dependencia_nombre'),$dato2_depend->fields('dependencia_nombre'),$var['usuario_id_2'],$var['creacion']));		
		
		}
		
		$dependencia_anterior = $var['dependencia_id'];	
			$consulta_depenid= sprintf("SELECT * FROM %s WHERE  dependencia_id= '%s'",_TBL_PQR_REL_DEPENDENCIA_USUARIO,$var['dependencia_id']);
		
		$dato_id = $db->Execute($consulta_depenid);
	
	if($usuario_id=='')
	{
		$usuario_id=$dato_id->fields('idusuario');
	}
	elseif($usuario_id!=$dato_id->fields('idusuario'))
	{
			$consulta_user= sprintf("SELECT * FROM %s WHERE  idusuario= '%s'",_TBLUSUARIO,$usuario_id);
			$consulta_user1= sprintf("SELECT * FROM %s WHERE  idusuario= '%s'",_TBLUSUARIO,$dato_id->fields('idusuario'));
			$dato_user=$db->Execute($consulta_user);
			$dato_user1=$db->Execute($consulta_user1);
			$pdf->SetFont('Arial','B',5);
			$pdf->SetTextColor('000','000','000');
			$pdf->SetWidths(array(30,47.5,47.5,25,20));
			$pdf->SetAligns(array('J','J','J','J','C'));
			$pdf->Row(array('RESPONSABLE',$dato_user->fields('username'),$dato_user1->fields('username'),$var['usuario_id_2'],$var['creacion']));
			
		
	}
	
			$usuario_id=$dato_id->fields('idusuario');
			
				
		//** comparacion del asunto **//
	if($asunto_anterior=='')
	{
			$asunto_anterior= $var['asunto_id'];
	}
	elseif($asunto_anterior!= $var['asunto_id'])
	{
			$consulta_asunto= sprintf("SELECT * FROM %s WHERE  asunto_id= '%s'",_TBL_PQR_ASUNTO,$asunto_anterior);
			$consulta_asunto1= sprintf("SELECT * FROM %s WHERE  asunto_id= '%s'",_TBL_PQR_ASUNTO,$var['asunto_id']);
			
			$dato_asunto = $db->Execute($consulta_asunto);
			$dato2_asunto = $db->Execute($consulta_asunto1);
			$pdf->SetFont('Arial','B',5);
			$pdf->SetTextColor('000','000','000');
			$pdf->SetWidths(array(30,47.5,47.5,25,20));
			$pdf->SetAligns(array('J','J','J','J','C'));
			$pdf->Row(array('ASUNTO',$dato_asunto->fields('asunto_nombre'),$dato2_asunto->fields('asunto_nombre'),$var['usuario_id_2'],$var['creacion']));
	}
		
			$asunto_anterior = $var['asunto_id'];
			
	if($estado_anterior=='')
	{
		$estado_anterior= $var['estado_id'];
	}
	elseif($estado_anterior!= $var['estado_id'])
		{
			$consulta_estado= sprintf("SELECT * FROM %s WHERE  estado_id= '%s'",_TBL_PQR_ESTADO,$estado_anterior);
			$consulta_estado1= sprintf("SELECT * FROM %s WHERE  estado_id= '%s'",_TBL_PQR_ESTADO,$var['estado_id']);
			
			$dato_estado = $db->Execute($consulta_estado);
			$dato2_estado = $db->Execute($consulta_estado1);
			$pdf->SetFont('Arial','B',5);
			$pdf->SetTextColor('000','000','000');
			$pdf->SetWidths(array(30,47.5,47.5,25,20));
			$pdf->SetAligns(array('J','J','J','J','C'));
			$pdf->Row(array('ESTADO',$dato_estado->fields('estado_nombre'),$dato2_estado->fields('estado_nombre'),$var['usuario_id_2'],$var['creacion']));
		}
		
		$estado_anterior = $var['estado_id'];
		
		
		//** comparacion tipo de solicitud *//
	if($tipo_solicitud_anterior=='')
	{
		$tipo_solicitud_anterior= $var['tipo_id'];
	}
	elseif($tipo_solicitud_anterior!= $var['tipo_id'])
		{
			$consulta_tiposol= sprintf("SELECT * FROM %s WHERE  tipo_id= '%s'",_TBL_PQR_TIPO,$tipo_solicitud_anterior);
			$consulta_tiposol1= sprintf("SELECT * FROM %s WHERE tipo_id= '%s'",_TBL_PQR_TIPO,$var['tipo_id']);
			
			$dato_tiposol = $db->Execute($consulta_tiposol);
			$dato2_tiposol = $db->Execute($consulta_tiposol1);
			$pdf->SetFont('Arial','B',5);
			$pdf->SetTextColor('000','000','000');
			$pdf->SetWidths(array(30,47.5,47.5,25,20));
			$pdf->SetAligns(array('J','J','J','J','C'));
			$pdf->Row(array('TIPO SOLICITUD',$dato_tiposol->fields('tipo_nombre'),$dato2_tiposol->fields('tipo_nombre'),$var['usuario_id_2'],$var['creacion']));
		}
		
		$tipo_solicitud_anterior = $var['tipo_id'];
		
	if($tipo_plazo_anterior=='')
	{
		$tipo_plazo_anterior=$var['tipo_plazo_total'];
	}
	
	elseif($tipo_plazo_anterior!=$var['tipo_plazo_total'])
		{
						
			$pdf->SetFont('Arial','B',5);
			$pdf->SetTextColor('000','000','000');
			$pdf->SetWidths(array(30,47.5,47.5,25,20));
			$pdf->SetAligns(array('J','J','J','J','C'));
			$pdf->Row(array('PLAZO TOTAL',$tipo_plazo_anterior,$var['tipo_plazo_total'],$var['usuario_id_2'],$var['creacion']));
		}
		
		$tipo_plazo_anterior=$var['tipo_plazo_total'];
		
}
	
//**--------------------------------------FIN DE LAS COMPARACIONES Y DEL HISTORIAL---------------------------FP----------- **//

$pdf->Output("Gestion_de_solicitud.pdf",'I');

					
?>