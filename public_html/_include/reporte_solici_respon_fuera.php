<?php
/**********************************************************/
/* Listado de reporte de Alertas */
/**********************************************************/

/** SOLICITUD DE ARCHIVOS REQUERIDOS **/

require_once(_DIRLIB.'pqr/FuncionesPQR.php');
require_once(_DIRLIB.'smarty/libs/Smarty.class.php');
require_once(_DIRCORE.'Validacion.class.php');
require_once(_DIRCORE.'Funciones.class.php');
require_once(_DIRLIB.'pqr/Solicitante.class.php');
require_once(_DIRLIB.'pqr/Solicitud.class.php');
require_once(_DIRLIB.'pqr/Transaccion.class.php');
require_once(_DIRCORE.'GeneraXml.class.php');

ini_set("display_errors", "on");

/** VARIABLES GLOBALES **/
/* Hace disponible la conexi�n a la base de datos */
global $db;

if(isset($_POST['exportarXml']) || isset($_GET['exportarXml']))
    $ExportarXML = true;

/* Variable que almacena los datos para el reporte de alertas */
$datosreporte 	= array();

/* Variable que almacena los errores que se presenten durante la ejecucion de la aplicacion */
$errores		= array();

/* Verificamos que sea el administrador del sistema */
if(esAdministradorPqr($_SESSION['info_usuario']['idusuario']))
{
	$sql_dependencias = sprintf('SELECT dependencia_id FROM %s', _TBL_PQR_DEPENDENCIA);
}
else
{
	/* Consultamos el id de la dependencia de un usuario registrado */
	$sql_dependencias = sprintf('SELECT dependencia_id FROM %s WHERE idusuario=%s',
	_TBL_PQR_REL_DEPENDENCIA_USUARIO, $_SESSION['info_usuario']['idusuario']);
}
/* Ejecutamos la consulta */
$dependencias	= $db->Execute($sql_dependencias) or errorQuery(__LINE__, __FILE__);

/* Verificamos que la consulta no sea vacia */
if($dependencias->NumRows()>0)
{
	// while(!$dependencias->EOF)
	// {
		// $dependencia_id = isset($dependencias->fields['dependencia_id'])?$dependencias->fields['dependencia_id']:0;

		// $detalles = sprintf('
						// SELECT 	d.dependencia_nombre as dependencia_nombre, 
								// t.dependencia_id as dependencia_id, 
								// t.solicitud_id as solicitud_id, 
								// t.tipo_plazo_total as plazo, 
								// s.creacion as fecha_creacion, 
								// e.estado_nombre as estado_nombre
						// FROM 	pqr_transaccion t, 
								// pqr_dependencia d,
								// pqr_solicitud s, 
								// pqr_estado e
						// WHERE 	t.solicitud_id=s.solicitud_id and
								// t.estado_id=e.estado_id and
								// transaccion_id=s.estado_actual and 
								// t.dependencia_id=d.dependencia_id and 
								// t.dependencia_id=%s and  
								// e.estado_id!=3 and 
								// e.estado_id!=4 and 
								// e.estado_id!=5', 
						// $dependencia_id);
		
		
		// $rdetalles = $db->Execute($detalles) or errorQuery(__LINE__, __FILE__);
		
		// while(!$rdetalles->EOF)
		// {
			// $row1 			= $rdetalles->fields;
			// $fecha_creacion = $row1['fecha_creacion'];
			// $plazo 			= $row1['plazo'];
			// $fecha_limite 	= CalculaFechaLimite($fecha_creacion, $plazo);

			// $fecha_actual = mktime(0,0,0,date('m'),date('d'),date('y'));
			// $hoy = date("Y-m-d", $fecha_actual);

			// if($hoy < $fecha_limite)//Esta dentro del tiempo
			// {
				// $tiempo_restante = CalculaDiasHabiles($hoy, $fecha_limite);
			// }
			// elseif($hoy > $fecha_limite) //Ya se pas� del tiempo
			// {
				// $tiempo_restante = CalculaDiasHabiles($fecha_limite, $hoy);
				// if($tiempo_restante != 0)
				// $tiempo_restante = "-".$tiempo_restante;
				// else
				// $tiempo_restante = "-1";

			// }
			// else //Hoy es el d�a que se vence
			// {
				// $tiempo_restante = 0;
			// }
			
			// $row1['fecha_limite'] = $fecha_limite;
			// $row1['tiempo_restante'] = $tiempo_restante;
			
			// array_push($datosreporte, $row1);

			// $rdetalles->MoveNext();
		// }
		// $dependencias->MoveNext();
	// }
	
	$arrdepen = $dependencias->GetRows();
	$depenlist = array();
	foreach($arrdepen as $arr)
	{
		array_push($depenlist, $arr['dependencia_id']);
	}
	
	$query1 = sprintf("
                SELECT  d.dependencia_nombre, 
                        t.dependencia_id, 
                        s.solicitud_id, 
                        t.tipo_plazo_total as plazo, 
                        s.creacion as fecha_creacion, 
                        e.estado_nombre, 
                        t.tipo_id as tipo

                    FROM pqr_solicitud s
                        INNER JOIN pqr_transaccion t ON s.estado_actual = transaccion_id  
                        INNER JOIN pqr_estado e ON t.estado_id = e.estado_id
                        INNER JOIN pqr_dependencia d ON t.dependencia_id = d.dependencia_id

                WHERE (t.dependencia_id IN (%s) or d.eliminado is null) AND year(s.creacion) > 2012 "
		, implode(",", $depenlist));
        
        echo $query1;
	
	$datosreporte = $db->GetAll($query1);
        
        
        echo '<pre>';
        print($datosreporte);
        echo '</pre>';die();
       
	$drlen = count($datosreporte);
	
	for($i = 0; $i < $drlen; $i++)
	{
		
		$fecha_creacion = $datosreporte[$i]['fecha_creacion'];
		$plazo 			= $datosreporte[$i]['plazo'];
		$fecha_limite 	= CalculaFechaLimite($fecha_creacion, $plazo);
                
                
                //echo 'Fecha de creacion ' . $fecha_creacion . '<br>';
                //echo 'Plazo  ' . $plazo . '<br>';
                //echo 'Fecha limite  ' . $fecha_limite . '<br>';die();
		$fecha_actual = mktime(0,0,0,date('m'),date('d'),date('y'));
		$hoy = date("Y-m-d", $fecha_actual);

		if($hoy < $fecha_limite)//Esta dentro del tiempo
		{
			$tiempo_restante = CalculaDiasHabiles($hoy, $fecha_limite);
		}
		elseif($hoy > $fecha_limite) //Ya se pas� del tiempo
		{
			$tiempo_restante = CalculaDiasHabiles($fecha_limite, $hoy);
			if($tiempo_restante != 0)
			$tiempo_restante = "-".$tiempo_restante;
			else
			$tiempo_restante = "-1";

		}
		else //Hoy es el d�a que se vence
		{
			$tiempo_restante = 0;
		}
		
		$datosreporte[$i]['fecha_limite'] = $fecha_limite;
		$datosreporte[$i]['tiempo_restante'] = $tiempo_restante;
                
                

	}
	
	if(count($datosreporte) > 0)
	{
		usort($datosreporte, "cmp");
	}
}
else
{
	array_push($errores, 'Este usuario no pertenece a ninguna dependencia.');
}


if(isset($ExportarXML))
{
	$arreglo_XML = array();
	foreach ($datosreporte as $registro)
	{
	    /* Condici�n para filtrar los datos y solo visualizar las solicitudes vencidas */
	    if($registro['tiempo_restante'] <= 0){
			$a['solicitud_id'] 		 = $registro['solicitud_id'];
			$a['dependencia_nombre'] = $registro['dependencia_nombre'];
			$a['fecha_creacion'] 	 = $registro['fecha_creacion'];
			$a['plazo'] 			 = $registro['plazo'];
			$a['fecha_limite'] 	 	 = $registro['fecha_limite'];
			$a['tiempo_restante'] 	 = $registro['tiempo_restante'];
			$a['tipo'] 	             = $registro['tipo'];
			$a['estado_nombre'] 	 = $registro['estado_nombre'];
			//$a['tipo_id'] 	         = $registro['tipo_id'];

			array_push($arreglo_XML, $a);
	    }
	}

	$encabezado = array("Solicitud_ID", "Dependencia", "Fecha_Creaci&oacute;n", "Plazo_D&acute;as", "Fecha_Limite", "Tiempo_Respuesta", "Tipo_Solicitud","Estado");
	$xml = new GeneraXml($encabezado,$arreglo_XML);
}

			/** PASO DE VARIABLES A LA PLANTILLA DE SMARTY **/
		/* Se crea una nueva instancia de Smarty */
$smarty = new Smarty_Plantilla();

$smarty->assign('reportedatos'		, $datosreporte);
$smarty->assign('url_gestion'		,_URL.'?idcategoria='._PQR_GESTION);
$smarty->assign('dir_admin_images'	,_URL.'_administracion/recursos/images/');
$smarty->assign('esta_pagina'		,_URL.'index.php?idcategoria='.$idcategoria);

return $smarty->fetch('tpl_pqr_reporte_alertas.html');

function cmp($a, $b)
{
	if($a['tiempo_restante'] == $b['tiempo_restante'])
	{
		return 0;
	}
	elseif($a['tiempo_restante'] > $b['tiempo_restante'])
	{
		return 1;
	}
	elseif($a['tiempo_restante'] < $b['tiempo_restante'])
	{
		return -1;
	}
}
?>
