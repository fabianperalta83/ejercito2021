<?php
//actualizacion de las fechas de las encuestas del PQR de Ejercito.
global $db;

//consulto las solicitudes que no tengan fecha valida, solo las que tengan la fecha 0000-00-00 00:00:00 
$pqr_respuestas_encuesta = "pqr_respuestas_encuesta";
// Cambio # 1
$query	=	$db->prepare("SELECT DISTINCT(solicitud_id) as solicitud_id FROM ? WHERE creacion in('0000-00-00 00:00:00')");
$result	=	$db->Execute($query, array($nombre_tabla));

//realizo el recorrido de las solicitudes
while(!$result->EOF)
{
	//ahora debo consultar las fechas enb las cuales se creo cada una de las solicitudes
	// Cambio # 2
	$consulta_fechas	=	$db->prepare("SELECT creacion FROM pqr_solicitud WHERE solicitud_id= ? ");
	//capturo la fecha
	$solicitud_id = $result->fields['solicitud_id'];
	$resultado			=	$db->Execute($consulta_fechas, array($solicitud_id));
	//ahora debo hacer la insercion de la fecha en la tabla de las encuestas
	// Cambio # 3
	$update_fechas		=	$db->prepare("UPDATE pqr_respuestas_encuesta SET creacion= '".$resultado->fields['creacion']."' WHERE solicitud_id= ?");
	//ejecuto la consulta
	$result_update		=	$db->Execute($update_fechas, array($solicitud_id));
	
	if($result_update)
	{
		echo "La solicitud ".$result->fields['solicitud_id']." ha sido actualizada con la fecha ".$resultado->fields['creacion'];
	}
	else
	{
		echo "La solicitud ".$result->fields['solicitud_id']."  no pudo ser actualizada con la fecha ".$resultado->fields['creacion'];
	}
	$result->MoveNext();	
}

?>