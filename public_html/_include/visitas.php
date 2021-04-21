<?
   $pagina = basename($_SERVER['PHP_SELF']);
   $pagina .= sprintf("?idcategoria=%s",$idcategoria);
   
   /**
    * Validacion de los datos
    **/
   $error = array();
   $info = array();
   $servicios = array(	'0' => "Visita Planetario(Santiago de Cali)",
   						'1' => "Visita Museo Aeroespacial (Bogotá)",
   						'2' => "Banda Sinfonica(Santiago de Cali)",
   						'3' => "Banda Sinfonica(Bogotá)",
   					);
   $emailServicios = array( "Visita Planetario(Santiago de Cali)" => "jhernandez@micrositios.net",
   							"Visita Museo Aeroespacial (Bogotá)" => "jhernandez@micrositios.net",
   							"Banda Sinfonica(Santiago de Cali)" => "jhernandez@micrositios.net",
   							"Banda Sinfonica(Bogotá)" => "jhernandez@micrositios.net"
   						  );
   
   if ($_SERVER['REQUEST_METHOD'] == "POST") {
   	
	   $info["frm_servicio"] = isset($_POST["frm_servicio"]) ? $_POST["frm_servicio"] : "";
	   $info["frm_nombre_institucion"] = isset($_POST["frm_nombre_institucion"]) ? $_POST["frm_nombre_institucion"] : "";
	   $info["frm_nombre_solicitante"] = isset($_POST["frm_nombre_solicitante"]) ? $_POST["frm_nombre_solicitante"] : "";
	   $info["frm_apellidos_solicitante"] = isset($_POST["frm_apellidos_solicitante"]) ? $_POST["frm_apellidos_solicitante"] : "";
	   $info["frm_direccion"] = isset($_POST["frm_direccion"]) ? $_POST["frm_direccion"] : "";
	   $info["frm_telefono"] = isset($_POST["frm_telefono"]) ? $_POST["frm_telefono"] : "";
	   $info["frm_correo"] = isset($_POST["frm_correo"]) ? $_POST["frm_correo"] : "";
	   $info["frm_pais"] = isset($_POST["frm_pais"]) ? $_POST["frm_pais"] : "";
	   $info["frm_ciudad"] = isset($_POST["frm_ciudad"]) ? $_POST["frm_ciudad"] : "";
	   $info["frm_nombre_evento"] = isset($_POST["frm_nombre_evento"]) ? $_POST["frm_nombre_evento"] : "";
	   $info["frm_fecha_evento"] = isset($_POST["frm_fecha_evento"]) ? $_POST["frm_fecha_evento"] : "";
	   $info["frm_observaciones"] = isset($_POST["frm_observaciones"]) ? $_POST["frm_observaciones"] : "";
	   
	   if (empty($info["frm_nombre_institucion"])) {  $error[] = _ROT_SERVICIO_NOMBRE_INSTITUCION_ERROR;  }
	   if (empty($info["frm_nombre_solicitante"])) {  $error[] = _ROT_SERVICIO_NOMBRE_SOLICITANTE_ERROR;  }
	   if (empty($info["frm_apellidos_solicitante"])) {  $error[] = _ROT_SERVICIO_APELLIDO_SOLICITANTE_ERROR;  }
	   if (empty($info["frm_direccion"])) {  $error[] = _ROT_SERVICIO_DIRECCION_ERROR;  }
	   if (empty($info["frm_telefono"]) or !is_numeric($info["frm_telefono"])) {  $error[] = _ROT_SERVICIO_TELEFONO_ERROR;  }
	   if (empty($info["frm_pais"])) {  $error[] = _ROT_SERVICIO_PAIS_ERROR;  }
	   if (empty($info["frm_ciudad"])) {  $error[] = _ROT_SERVICIO_CIUDAD_ERROR;  }
	   if (empty($info["frm_nombre_evento"])) {  $error[] = _ROT_SERVICIO_NOMBRE_EVENTO_ERROR;  }
	   if (empty($info["frm_fecha_evento"])) {  $error[] = _ROT_SERVICIO_FECHA_EVENTO_ERROR;  }

	   if (empty($info["frm_correo"]))  {  
	   		$error[] = _ROT_SERVICIO_CORREO_ERROR; 
	   } elseif (!isEmail($info["frm_correo"])) {
	   		$error[] = _ROT_SERVICIO_CORREO_ERROR2; 
	   }
	}
	
   $smarty = new Smarty_Plantilla;
   /**
    * Aviso de Errores
    **/
   if ($_SERVER['REQUEST_METHOD'] == "POST" && sizeof($error) > 0){
   	
		$smarty1 = new Smarty_Plantilla;
		$smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
		$smarty1->assign('tipo'      ,"error");
		$smarty1->assign('elementoMenu',$error);
		
		$show = $smarty1->fetch('tpl_display_mensaje.html');
		$smarty->assign('subMenuError',$show);
		$smarty->assign('c_action'           , $pagina);
		$smarty->assign('info', $info);
		$smarty->assign('servicios', $servicios);
		
		return $smarty->fetch('tpl_visitas.html');
       
   } elseif($_SERVER['REQUEST_METHOD'] == "POST" && sizeof($error) == 0) {
		
		// Envio del Correo
        $body = "Fecha de Solicitud Visita: ".datetotext(date("Y-m-d", time()))." ".date("H:i:s",time())."\n\n";
        
        $excel = "";
        while(list($kinfo, $vinfo) = each($info)) {
        	$llave = ucwords(str_replace('frm ', '', str_replace('_', ' ', $kinfo)));
        	$body .= $llave.":	".$vinfo."\n";
        	$excel .= $vinfo." |";
        }
        
		$body .= "\nPara importar a excel puede copiar la linea siguiente:\n".$excel;
        $body2 = "Muchas gracias por contactarnos.\nSu solicitud de visita está siendo procesado por el equipo de trabajo de la Fuerza Aérea";

        $from  = sprintf("From: %s", $info['frm_correo']);
        $to = $emailServicios[$info['frm_servicio']]; // depende del servicio se escoge el destino de la peticion
		
        if (microsmail($to, sprintf("Visita solicitada desde la página %s",_NOMBRESITIO), $body, $from, 'suscripcion.php','1') 
        	&& microsmail($info['frm_correo'],"Visita solicitada - ".strip_tags(_NOMBRESITIO),$body2,"From: ".$to,'suscripcion.php','2') ){
		
          $smarty1 = new Smarty_Plantilla;
          $smarty1->assign('rotMensaje',_ROT_CONFIRMACION);
          $smarty1->assign('tipo'      ,"exito");
          $error[] = sprintf(_ROT_SUSCRIPCION_ENVIO_CONFIRMA, $to);
          $smarty1->assign('elementoMenu',$error);
          return $smarty1->fetch('tpl_display_mensaje.html');
		  
        } else {
		
          $smarty1 = new Smarty_Plantilla;
          $smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
          $smarty1->assign('tipo'      ,"error");
          $error[] = sprintf(_ROT_SUSCRIPCION_ENVIO_ERROR, $to);
          $smarty1->assign('elementoMenu',$error);
          return $smarty1->fetch('tpl_display_mensaje.html');
		  
        }
	} else {
		$smarty->assign('c_action', $pagina);
		$smarty->assign('info', $info);
		$smarty->assign('servicios', $servicios);
		return $smarty->fetch('tpl_visitas.html');
	}
?>