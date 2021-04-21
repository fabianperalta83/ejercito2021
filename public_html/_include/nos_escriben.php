<?
	define('_NOSESCRIBEN_NOMBRE', 'nombre_form');
	define('_NOSESCRIBEN_EMAIL', 'email_form');
	define('_NOSESCRIBEN_COMENTARIOS', 'comenta_form');
	
	
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

   $nombre_form    = isset($_POST[_NOSESCRIBEN_NOMBRE])   ?$_POST[_NOSESCRIBEN_NOMBRE]:"";
   $email_form     = isset($_POST[_NOSESCRIBEN_EMAIL])    ?$_POST[_NOSESCRIBEN_EMAIL]:"";
   $comenta_form   = isset($_POST[_NOSESCRIBEN_COMENTARIOS])  ?$_POST[_NOSESCRIBEN_COMENTARIOS]:"";
   $msg            = isset($GLOBALS['msg'])?$GLOBALS['msg']:"";    

   if (!$nombre_form) {  $error[] = _ROT_CONTACTO_NOMBRE_ERROR;  }
   if (!$email_form)  {  $error[] = _ROT_CONTACTO_EMAIL_ERROR1;  }
   if ($email_form && !isEmail($email_form)) {  $error[] = _ROT_CONTACTO_EMAIL_ERROR2;  }
   if (!$comenta_form){  $error[] = _ROT_CONTACTO_COMENTA_ERROR;  }
   
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
	   $smarty->assign('c_formulario_titulo',_ROT_CONTACTO);
	
	   $campo['nombre'] = _ROT_CONTACTO_NOMBRE;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<input type=text name=nombre_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$nombre_form);
	   $campos[] = $campo;
	
	   $campo['nombre'] = _ROT_CONTACTO_EMAIL;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<input type=text name=email_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$email_form);
	   $campos[] = $campo;
	
	   $campo['nombre'] = _ROT_CONTACTO_COMENTA;
	   $campo['clase']  = "requerido";
	   $campo['input']  = sprintf("<textarea name=comenta_form rows=6 cols=40 align=center class='tpl_input_edicion_requerido'>%s</textarea>",$comenta_form);
	   $campos[] = $campo;
	
	   $smarty->assign('campos',$campos);
	
	   return $smarty->fetch('tpl_contacto.html');

	} else {
		$mensajeEstadoInsercion = "";
		if ($_SERVER['REQUEST_METHOD']=="POST") {
		    $db = $GLOBALS["db"];
			$q1 = sprintf("INSERT INTO %s(idpadre, nombre_0, entradilla_0, autor, fecha1, activa, validacion)"
        								." VALUES(%s, '%s', '%s', '%s', now(), 0, '%s')"
                        				,_TBLCATEGORIA
        								, _SNOSESCRIBEN
        								, $nombre_form
        								, $comenta_form
        								, $email_form
        								, md5($nombre_form)
                        		 );
			if ($db["ejecutar"]($q1) === TRUE) {
				$mensajeEstadoInsercion = "<br><br>Se Insertó Correctamente el Comentario, el administrador lo revizará para publicarlo o no.";
			} else {
				$mensajeEstadoInsercion = "<br><br>No se Insertó Correctamente, por favor reporta este problema al webmaster.";
			}
		}
		
		// Envio del Correo
        $body = sprintf("\n\t\tNombre: %s",$nombre_form);
        $body .= sprintf("\n\t\tEmail: %s",$email_form);
        $body .= sprintf("\n\t\tComentario:\n\n%s",$comenta_form);

        $body2 = sprintf("Muchas gracias por escribirnos.\nSu mensaje esta siendo procesado por el equipo de trabajo de %s (%s).",strip_tags(_NOMBRESITIO),_URL);

        $from  = sprintf("From: %s",$email_form);
		
        if (Funciones::microsmail(_EMAIL,sprintf("Contacto desde la página %s",_NOMBRESITIO),$body,$from,'nos_escriben.php','1') && Funciones::microsmail($email_form,strip_tags(_NOMBRESITIO),$body2,"From: "._EMAIL,'nos_escriben.php','2') ){
		
          $smarty1 = new Smarty_Plantilla;
          $smarty1->assign('rotMensaje',_ROT_CONFIRMACION.$mensajeEstadoInsercion);
          $smarty1->assign('tipo'      ,"exito");
          $error[] = sprintf(_ROT_CONTACTO_ENVIO_CONFIRMA,_EMAIL);
          $smarty1->assign('elementoMenu',$error);
          return $smarty1->fetch('tpl_display_mensaje.html');
		  
        } else {
		
          $smarty1 = new Smarty_Plantilla;
          $smarty1->assign('rotMensaje',_ROT_ADVERTENCIA.$mensajeEstadoInsercion);
          $smarty1->assign('tipo'      ,"error");
          $error[] = sprintf(_ROT_CONTACTO_ENVIO_ERROR,_EMAIL);;
          $smarty1->assign('elementoMenu',$error);
          return $smarty1->fetch('tpl_display_mensaje.html');
		  
        }
	}
?>