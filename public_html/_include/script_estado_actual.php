<?php
$cont=0;
			/* Crea la sentencia sql que consulta todas las solicitudes */
			$sql_consulta_solicitud_2	= sprintf(
											"SELECT solicitud_id
											 FROM %s
														",
											_TBL_PQR_SOLICITUD
															);

			$resultado_consulta_solicitud_2	= $db->Execute($sql_consulta_solicitud_2);
			$listaSolicitudes	= "(";
			while(!$resultado_consulta_solicitud_2->EOF)
			{
				$listaSolicitudes .= $resultado_consulta_solicitud_2->fields['solicitud_id'].",";
				$resultado_consulta_solicitud_2->MoveNext();
			}
			$listaSolicitudes .= "-1)";
					$sql_consulta_transaccion_id_2	= sprintf(
													"SELECT solicitud_id, max(transaccion_id) as transaccion_id
													FROM %s
													WHERE solicitud_id in %s
													GROUP BY solicitud_id",
													_TBL_PQR_TRANSACCION,
													$listaSolicitudes);
				$resultado_consulta_transaccion_id_2	= $db->Execute($sql_consulta_transaccion_id_2);


				  $listatransaccion = array();
        while(!$resultado_consulta_transaccion_id_2->EOF)
        {

          $tmp_arreglo['solicitud_id']		= $resultado_consulta_transaccion_id_2->fields['solicitud_id'];
          $tmp_arreglo['transaccion_id']		= $resultado_consulta_transaccion_id_2->fields['transaccion_id'];

          array_push($listatransaccion,$tmp_arreglo);
          $resultado_consulta_transaccion_id_2->MoveNext();
        }
        foreach($listatransaccion as $dato)
        {

          $query5 = sprintf("UPDATE %s SET estado_actual='%s' WHERE solicitud_id='%s'",_TBL_PQR_SOLICITUD,$dato['transaccion_id'],$dato['solicitud_id']);
          $r5 = $db->Execute($query5) or errorQuery(__LINE__, __FILE__);

		$cont++;

        }
       $respuesta	= "registros modificados ";
       $respuesta	.= "<hr>";
       $respuesta	.= $cont;
       return $respuesta;
?>