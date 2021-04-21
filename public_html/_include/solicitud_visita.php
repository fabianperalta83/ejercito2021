<?
   $smarty = new Smarty_Plantilla;

   $pagina = basename($_SERVER['PHP_SELF']);
   $pagina .= sprintf("?idcategoria=%s",$idcategoria);

   // Titulo de la página
   $archivo = sprintf("%s/categoria_%s.png",_DIRRECURSOS,$idcategoria);
   
   if (file_exists($archivo)){
      $c_titulo = sprintf("<img src=%s border=0 width=405 height=63 border=0>",$archivo);
   }else{
      $c_titulo = BuscarNombre($idcategoria);
   }
   
   $smarty->assign('c_titulo',$c_titulo);

   $nombre_form = isset($_POST["nombre_form"]) ? $_POST["nombre_form"] : "";
   $apellido_form = isset($_POST["apellido_form"]) ? $_POST["apellido_form"] : "";
   $identificacion_form = isset($_POST["identificacion_form"]) ? $_POST["identificacion_form"] : "";
   $tipo_identificacion_form = isset($_POST["tipo_identificacion_form"]) ? $_POST["tipo_identificacion_form"] : "";
   $direccion_form = isset($_POST["direccion_form"]) ? $_POST["direccion_form"] : "";
   $telefono_form = isset($_POST["telefono_form"]) ? $_POST["telefono_form"] : "";
   $correo_form = isset($_POST["correo_form"]) ? $_POST["correo_form"] : "";
   $pais_form = isset($_POST["pais_form"]) ? $_POST["pais_form"] : "";
   $ciudad_form = isset($_POST["ciudad_form"]) ? $_POST["ciudad_form"] : "";
   $queja_form = isset($_POST["queja_form"]) ? $_POST["queja_form"] : "";
   $msg = isset($GLOBALS['msg']) ? $GLOBALS['msg'] : "";    

   if (!$nombre_form) {  $error[] = _ROT_VISITA_NOMBRE_ERROR;  }
   if (!$apellido_form) {  $error[] = _ROT_VISITA_APELLIDO_ERROR;  }
   if (!$identificacion_form || !is_numeric($identificacion_form)) {  $error[] = _ROT_VISITA_IDENTIFICACION_ERROR;  }
   if (!$correo_form)  {  $error[] = _ROT_VISITA_CORREO_ERROR1;  }
   if ($correo_form && !isEmail($correo_form)) {  $error[] = _ROT_VISITA_CORREO_ERROR2;  }
   if (!$queja_form){  $error[] = _ROT_VISITA_LABEL_ERROR;  }
   
   if (isset($error)) 
   {
        $total_errores = count($error);   
   }


   if ($_SERVER['REQUEST_METHOD']=="POST" && isset($total_errores)){
   	
       $smarty1 = new Smarty_Plantilla;
       $smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
       $smarty1->assign('tipo'      ,"error");
       $smarty1->assign('elementoMenu',$error);
       $show = $smarty1->fetch('tpl_display_mensaje.html');
       $smarty->assign('subMenuError',$show);
       
   } elseif($msg){
   	
       unset($error);
       $error[] = $msg;
       $smarty1 = new Smarty_Plantilla;
       $smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
       $smarty1->assign('tipo'      ,"error");
       $smarty1->assign('elementoMenu',$error);
       $show = $smarty1->fetch('tpl_display_mensaje.html');
       $smarty->assign('subMenuError',$show);
       
   }

	if (isset($total_errores)) {

	   $smarty->assign('c_action'           ,$pagina);
	   $smarty->assign('c_formulario_titulo', _ROT_VISITA);
	
	   $campo['nombre'] = _ROT_VISITA_NOMBRE_INSTITUCION;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<input type=text name=nombre_institucion_form size=35 value='%s' class=\"tpl_input_edicion_requerido\">",$nombre_form);
	   $campos[] = $campo;
	   
	    $campo['nombre'] = _ROT_VISITA_NOMBRE;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<input type=text name=nombre_institucion_form size=35 value='%s' class=\"tpl_input_edicion_requerido\">",$nombre_form);
	   $campos[] = $campo;
	   
	   $campo['nombre'] = _ROT_VISITA_APELLIDO;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<input type=text name=apellido_form size=35 value='%s' class=\"tpl_input_edicion_requerido\">",$apellido_form);
	   $campos[] = $campo;
	   
	   $arrayIdentificacion = array("T.I.", "C.C.", "C.E.", "Otro");
	   $htmlIdentificacion = "";
	   while(list($k, $v) = each($arrayIdentificacion)) {
	   		if ($v == $tipo_identificacion_form){
	   			$htmlIdentificacion .= "<option value=\"".$v."\" selected>".$v."</option>";
	   		} else {
	   			$htmlIdentificacion .= "<option value=\"".$v."\">".$v."</option>";
	   		}
	   }
	   $campo['nombre'] = _ROT_VISITA_IDENTIFICACION;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<select name=tipo_identificacion_form class=\"tpl_input_edicion_requerido\">%s</select><input type=text name=identificacion_form size=25 value='%s' class=\"tpl_input_edicion_requerido\">",$htmlIdentificacion, $identificacion_form);
	   $campos[] = $campo;
	   
	   $campo['nombre'] = _ROT_VISITA_DIRECCION;
	   $campo['clase']  = "";
	   $campo['input']  = sprintf("<input type=text name=direccion_form size=35 value='%s' class=\"tpl_input_edicion\">",$direccion_form);
	   $campos[] = $campo;
	   
	   $campo['nombre'] = _ROT_VISITA_TELEFONO;
	   $campo['clase']  = "";
	   $campo['input']  = sprintf("<input type=text name=telefono_form size=35 value='%s' class=\"tpl_input_edicion\">",$telefono_form);
	   $campos[] = $campo;
	   
	   $campo['nombre'] = _ROT_VISITA_CORREO;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<input type=text name=correo_form size=35 value='%s' class=\"tpl_input_edicion_requerido\">",$correo_form);
	   $campos[] = $campo;
	   
	   $campo['nombre'] = _ROT_VISITA_PAIS;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<input type=text name=pais_form size=35 value='%s' class=\"tpl_input_edicion_requerido\">",$pais_form);
	   $campos[] = $campo;
	   
	   $campo['nombre'] = _ROT_VISITA_CIUDAD;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<input type=text name=ciudad_form size=35 value='%s' class=\"tpl_input_edicion_requerido\">",$ciudad_form);
	   $campos[] = $campo;
	
	   $campo['nombre'] = _ROT_VISITA_LABEL;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<textarea name=queja_form rows=6 cols=35 class=\"tpl_input_edicion_requerido\">%s</textarea>",$queja_form);
	   $campos[] = $campo;
	
	   $smarty->assign('campos',$campos);
	
	   return $smarty->fetch('tpl_contacto.html');

	} else {
		
		// Envio del Correo
        $body = sprintf("\n\t\tNombre: %s", $nombre_form);
        $body .= sprintf("\n\t\tApellido: %s", $apellido_form);
        $body .= sprintf("\n\t\tIdentificacion:%s %s", $tipo_identificacion_form, $identificacion_form);
        $body .= sprintf("\n\t\tDirección: %s", $direccion_form);
        $body .= sprintf("\n\t\tTeléfono: %s", $telefono_form);
        $body .= sprintf("\n\t\tCorreo: %s", $correo_form);
        $body .= sprintf("\n\t\tPaís: %s", $pais_form);
        $body .= sprintf("\n\t\tCiudad: %s", $ciudad_form);
        $body .= sprintf("\n\t\tQueja o Reclamo: %s", $queja_form);

        $body2 = sprintf("Muchas gracias por escribirnos.\nSu mensaje esta siendo procesado por el equipo de trabajo de %s (%s).",strip_tags(_NOMBRESITIO),_URL);

        $from  = sprintf("From: %s",$correo_form);
		
        if (microsmail(_EMAIL,sprintf("Contacto desde la página %s",_NOMBRESITIO),$body,$from,'queja_reclamos.php','1') && microsmail($correo_form,strip_tags(_NOMBRESITIO),$body2,"From: "._EMAIL,'queja_reclamos.php','2') ){
		
          $smarty1 = new Smarty_Plantilla;
          $smarty1->assign('rotMensaje',_ROT_CONFIRMACION);
          $smarty1->assign('tipo'      ,"exito");
          $error[] = sprintf(_ROT_VISITA_ENVIO_CONFIRMA,_EMAIL);
          $smarty1->assign('elementoMenu',$error);
          return $smarty1->fetch('tpl_display_mensaje.html');
		  
        } else {
		
          $smarty1 = new Smarty_Plantilla;
          $smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
          $smarty1->assign('tipo'      ,"error");
          $error[] = sprintf(_ROT_VISITA_ENVIO_ERROR,_EMAIL);;
          $smarty1->assign('elementoMenu',$error);
          return $smarty1->fetch('tpl_display_mensaje.html');
		  
        }
	}
?>