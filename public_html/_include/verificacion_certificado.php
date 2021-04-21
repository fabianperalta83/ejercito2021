<?
/*
* Archivo de verificación del certificado de 50 años
* @author Farez Prieto
*/
global $db;
$error		=	'';
$codigo		=	'';
$mensaje	=	'';
//valido si se presiono el boton de consultar

if(isset($_POST['enviar']))
{
	$codigo	=	$_POST['codigo'];
	//valido que la cajita no este vacia
	if(empty($codigo))
	{
		$error	=	"Debe Ingresar Un codigo de Verificaci&oacute;n";
	}
	else
	{
		//procedo a consultar el estado del personaje
		$query_datos	=	sprintf("SELECT * FROM pqr_solicitud as s, pqr_transaccion as t, pqr_solicitante as sol WHERE s.solicitud_hash='%s' AND s.estado_actual=t.transaccion_id AND t.estado_id=3 AND t.dependencia_id=191 AND s.solicitud_id=t.solicitud_id AND s.solicitante_id=sol.solicitante_id GROUP BY t.transaccion_id",$codigo);
		//ejecuto la consulta
		$result_datos	=	$db->Execute($query_datos);
		//si me trajo datos retorno el mensaje de exito
		if($result_datos->NumRows() > 0)
		{
			$mensaje  = sprintf("Este certificado es autentico y esta a nombre del Señor <b>%s</b> identificado con cedula <b>%s</b>",$result_datos->fields['solicitante_nombre'],$result_datos->fields['solicitante_identificacion']);
		}
		else
		{
			$mensaje  = sprintf("No se ha generado ningun certificado con este codigo. Por favor verifique de nuevo y vuelva aconsultar");
		}
	}
}

$smarty->assign("error"		,$error);
$smarty->assign("codigo"	,$codigo);
$smarty->assign("mensaje"	,$mensaje);
return $smarty->fetch("verificacion_certificado.html");

?>