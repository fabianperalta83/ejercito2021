<?

     /*
	  error_reporting(E_ALL);
      ini_set("display_errors", 1);  
	 */
	 
	 global $sroot; /** @see variables.php **/

	 require_once(_DIRCORE.'Validacion.class.php');
	 require_once(_DIRCORE. 'Autenticacion.class.php');
   
   
     $smarty = new Smarty_Plantilla;
	 
	
	 
	 $pagina = basename($_SERVER['PHP_SELF']);
     $pagina .= sprintf("?idcategoria=%s",$idcategoria);
	 
	 
	
	 /*** Campos del formulario ***/
	 
	 $nombre_form      		= Autenticacion::secureSQL(getVariable('nombre_form'),'');
	 $apellido_form    		= Autenticacion::secureSQL(getVariable('apellido_form'),'');
	 $identificacion_form   = Autenticacion::secureSQL(getVariable('identificacion_form'),'');
	 $email_form            = Autenticacion::secureSQL(getVariable('email_form'),'');
	 $mensaje_form     		= Autenticacion::secureSQL(getVariable('mensaje_form'),'');
	 $recordar              = getVariable('recordar');
	 $arma_form             = Autenticacion::secureSQL(getVariable('arma'),'');
	 
	 
	 
	if(!$recordar){

			if (Validacion::isEmpty($nombre_form))            {  $error[] =  _ROT_REGISTRO_NOMBRE_ERROR;  }
			if (Validacion::isEmpty($apellido_form))          {  $error[] =  _ROT_REGISTRO_APELLIDO_ERROR;  }
			if (Validacion::isEmpty($email_form))             {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR1;  }
			if (Validacion::isEmpty($identificacion_form))    {  $error[] =  "Falta el  numero de identificación.";  }
			if (Validacion::isEmpty($arma_form))             {  $error[] =  "Falta diligenciar campo de arma a solicitar.";  }
			if (Validacion::isEmpty($mensaje_form))             {  $error[] =  "Falta diligenciar campo de sustentación.";  }
			if (!Validacion::isEmpty($email_form) && !Validacion::isEmail($email_form)) {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR2;  }
		

	} else {
	
		if (Validacion::isEmpty($email2_form))  {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR1;  }
		if (!Validacion::isEmpty($email2_form) && !Validacion::isEmail($email2_form)) {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR2;  }
		
	}


    if(isset($error)){
	
	   $total_errores = count($error);
	   

	  
    }else{
	
	     $total_errores = 0;
	     
	   
    }	
	
	
	
	
	if ($_SERVER['REQUEST_METHOD']=="POST" && $total_errores != 0){
	
		$smarty1 = new Smarty_Plantilla;
		$smarty1->assign('rotMensaje',_ROT_CONTACTO_ADVERTENCIA);
		$smarty1->assign('tipo'      ,"error");
		$smarty1->assign('elementoMenu',$error);
		
		$show = $smarty1->fetch('tpl_display_mensaje.html');
		$smarty->assign('subMenuError',$show);
		
	
    }

	 
	 /*** Campos formularios ***/
	 
	if ($total_errores) {
	 
	 $smarty->assign('c_action'           ,$pagina);
	 $smarty->assign('c_formulario_titulo',_ROT_REGISTRO);
	 
	 $campo['nombre'] = "";
	 $campo['clase']  = ""; 
	 $campo['input']  = "Formulario selección de arma </br></br> Por favor diligencie toda la información requerida</br></br>";
	 $campos[] = $campo;
	 
	 
	 $campo['nombre'] = _ROT_REGISTRO_NOMBRE;
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='nombre_form'><input type='text' name='nombre_form' size='35' id='nombre_form' value='%s' class='input1' /></label>",$nombre_form);
	 $campos[] = $campo;
	 
	 $campo['nombre'] = _ROT_REGISTRO_APELLIDO;
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='apellido_form'><input type='text' name='apellido_form' id='apellido_form' size='35' value='%s' class='input1' /></label>",$apellido_form);
	 $campos[] = $campo;
	 
	
	 
	 $campo['nombre'] = "Numero de Identificación:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='identificacion_form'><input type='text' name='identificacion_form' id='identificacion_form' size='35' value='%s' class='input1' /></label>",$identificacion_form);
	 $campos[] = $campo;
	 
	 
	 $campo['nombre'] = "Para:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='para'><input type='text' name='para' id='para' size='35' value='seleccionarmas@emsub.edu.co' disabled class='input1'/></label>",$para_form);
	 $campos[] = $campo;
	 

	 
     $campo['nombre'] = "Email:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='email_form'><input type='text' name='email_form' id='email_form' size='35' value='%s' class='input1' /></label>",$email_form);
	 $campos[] = $campo;
	 
	 
	 $campo['nombre'] = "Arma a solicitar:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='arma'><input type='text' name='arma' id='arma' size='35' value='%s' class='input1'/></label>",$arma_form);
	 $campos[] = $campo;
	 
	 $campo['nombre'] = "Sustentación de la solicitud:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<textarea name='mensaje_form' id='mensaje_form' cols='50' rows='5' value='%s' class='input1'> </textarea>",$mensaje_form);
	 $campos[] = $campo;
	 
	 
	 $campo2['nombre'] = "";
	 $campo2['clase']  = "";
	 $campo2['input']  = sprintf("<label for='recordar'><input type='hidden' id='recordar' name='recordar' value='1'/></label>");
	 $campos2[] = $campo2;
	 
	 
	 $campo['nombre'] = "";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<input type='submit' id='boton' name='boton' value='Enviar' class='tpl_boton' />",$boton);
	 $campos[] = $campo;
	 
	 $smarty->assign('campos',$campos);
	 

      return $smarty->fetch('tpl_registro_curso_emsub.html');
   
     
	 
	}else{
	    
	   $mensaje_confirmacion = "<div style='color:#333333;font-size:1.05em'>
	                            SU SOLICITUD A SIDO REGISTRADA EN EL SISTEMA DE FORMA EXITOSA.
								</div>
								<br/><br/><br/><br/><br/><br/><br/><br/><br/>
	                            <br/><br/><br/><br/><br/><br/><br/><br/><br/>";
								
	   $smarty->assign('verificacion',$mensaje_confirmacion);
	   
	   /* Envio de email */
	   //add From: header
       $headers = "From: webejercito@gmail.com\r\n";   
		
		
	   $mensaje  = "Formulario selección de arma:\r\r\n\n";
	   
	   $mensaje .= "NOMBRES: ";
	   $mensaje .= $nombre_form."\r\n";
	   $mensaje .= "APELLIDOS: ";
	   $mensaje .= $apellido_form."\r\n";
       $mensaje .= "No IDENTIFICACIÓN: ";
	   $mensaje .= $identificacion_form."\r\n";
	   $mensaje .= "EMAIL: ";
	   $mensaje .= $email_form."\r\n";
	   $mensaje .= "ARMA A SOLICITAR: ";
	   $mensaje .= $arma_form."\r\n";
	   $mensaje .= "SUSTENTACIÓN DE LA SOLICITUD:";
	   $mensaje .= $mensaje_form."\r\n";
				 
			 
	    mail('seleccionarmas@emsub.edu.co','Formulario selección de arma',$mensaje,$headers);
		mail('mirleyr@ejercito.mil.co','Formulario selección de arma',$mensaje,$headers);
		mail('mirleydeya@hotmail.com','Formulario selección de arma',$mensaje,$headers);
	    mail('jbecerra@micrositios.net','Formulario selección de arma',$mensaje,$headers);
	   
	   

	   return $smarty->fetch('tpl_registro_curso_emsub.html');
	
	} 
	
	


?>