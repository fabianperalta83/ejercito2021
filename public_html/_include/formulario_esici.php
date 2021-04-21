<?

     /*
	  error_reporting(E_ALL);
      ini_set("display_errors", 1);  
	 */
	 
	 global $sroot; /** @see variables.php **/

	 require_once(_DIRCORE.'Validacion.class.php');
	 require_once (_DIRCORE. 'Autenticacion.class.php');
   
   
     $smarty = new Smarty_Plantilla;
	 
	 $smarty->assign('c_formulario_titulo2',"PREINSCRIPCIÓN CURSO INTELIGENCIA DE COMBATE A DISTANCIA </br></br> Por favor diligencie toda la información requerida</br></br>");
	 
	 $pagina = basename($_SERVER['PHP_SELF']);
     $pagina .= sprintf("?idcategoria=%s",$idcategoria);
	 
	 
	
	 /*** Campos del formulario ***/
	 
	 $nombre_form      		= Autenticacion::secureSQL(getVariable('nombre_form'),'');
	 $apellido_form    		= Autenticacion::secureSQL(getVariable('apellido_form'),'');
	 $grado_form            = Autenticacion::secureSQL(getVariable('grado_form'));
	 $identificacion_form   = Autenticacion::secureSQL(getVariable('identificacion_form'),'');
     $unidad_form      		= Autenticacion::secureSQL(getVariable('unidad_form'),'');
	 $fuerza_form           = Autenticacion::secureSQL(getVariable('fuerza_form'),'');
	 $email_form            = Autenticacion::secureSQL(getVariable('email_form'),'');
	 $mensaje_form     		= Autenticacion::secureSQL(getVariable('mensaje_form'),'');
	 $recordar              = getVariable('recordar');
	 
	 
	 
	if(!$recordar){

			if (Validacion::isEmpty($nombre_form))            {  $error[] =  _ROT_REGISTRO_NOMBRE_ERROR;  }
			if (Validacion::isEmpty($apellido_form))          {  $error[] =  _ROT_REGISTRO_APELLIDO_ERROR;  }
			if (Validacion::isEmpty($email_form))             {  $error[] =  _ROT_REGISTRO_EMAIL_ERROR1;  }
			if (Validacion::isEmpty($grado_form))             {  $error[] =  "Falta el grado.";  }
			if (Validacion::isEmpty($identificacion_form))    {  $error[] =  "Falta el  numero de identificación.";  }
			if (Validacion::isEmpty($unidad_form))            {  $error[] =  "Falta nombre de la unidad."; }
			if (Validacion::isEmpty($fuerza_form))            {  $error[] =  "Falta el nombre de la fuerza."; }
			/*if (Validacion::isAlpha($nombre_form))            {  $error[] =  "El nombre solo debe contener letras";}
			if (Validacion::isAlpha($apellido_form))          {  $error[] =  "El apellido solo debe contener letras";  }
			*/
			
			
			

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
	 
	 $campo['nombre'] = _ROT_REGISTRO_NOMBRE;
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='nombre_form'><input type='text' name='nombre_form' size='35' id='nombre_form' value='%s' class='input1' /></label>",$nombre_form);
	 $campos[] = $campo;
	 
	 $campo['nombre'] = _ROT_REGISTRO_APELLIDO;
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='apellido_form'><input type='text' name='apellido_form' id='apellido_form' size='35' value='%s' class='input1' /></label>",$apellido_form);
	 $campos[] = $campo;
	 
	 $campo['nombre'] = "Grado:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='grado_form'><input type='text' name='grado_form' id='grado_form' size='35' value='%s' class='input1' /></label>",$grado_form);
	 $campos[] = $campo;
	 
	 $campo['nombre'] = "Numero de Identificación:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='identificacion_form'><input type='text' name='identificacion_form' id='identificacion_form' size='35' value='%s' class='input1' /></label>",$identificacion_form);
	 $campos[] = $campo;
	 
	 
	 $campo['nombre'] = "Unidad:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='unidad_form'><input type='text' name='unidad_form' id='unidad_form' size='35' value='%s' class='input1' /></label>",$unidad_form);
	 $campos[] = $campo;
	 
	 
	 $campo['nombre'] = "Fuerza:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='fuerza_form'><input type='text' name='fuerza_form' id='fuerza_form' size='35' value='%s' class='input1' /></label>",$fuerza_form);
	 $campos[] = $campo;
	 

	 
     $campo['nombre'] = "Email:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<label for='email_form'><input type='text' name='email_form' id='email_form' size='35' value='%s' class='input1' /></label>",$email_form);
	 $campos[] = $campo;
	 
	 
	 $campo['nombre'] = "Mensaje:";
	 $campo['clase']  = "";
	 $campo['input']  = sprintf("<textarea name='mensaje_form' id='mensaje_form' cols='50' rows='5' value='%s' class='input1'> </textarea>",$mensaje_form);
	 $campos[] = $campo;
	 
	 
	 $campo2['nombre'] = "";
	 $campo2['clase']  = "";
	 $campo2['input']  = sprintf("<label for='recordar'><input type='hidden' id='recordar' name='recordar' value='1'/></label>");
	 $campos2[] = $campo2;

	 
	 
	 $smarty->assign('campos',$campos);
	 

      return $smarty->fetch('tpl_registro_curso_esici.html');
   
     
	 
	}else{
	
	        $mensaje_confirmacion = "<div style='color:#333333;font-size:1.05em'>
	                            SU SOLICITUD A SIDO REGISTRADA EN EL SISTEMA DE FORMA EXITOSA.
								</div>
								<br/><br/><br/><br/><br/><br/><br/><br/><br/>
	                            <br/><br/><br/><br/><br/><br/><br/><br/><br/>";
								
	        $smarty->assign('verificacion',$mensaje_confirmacion);
		   
		  
	       //add From: header
		   $headers = "From: webejercito@gmail.com\r\n";   
			
			
		   $mensaje  = "Datos de preinscripción curso inteligencia de combate a distancia:\r\r\n\n";
		   
		   $mensaje .= "NOMBRE: ";
		   $mensaje .= $nombre_form."\r\n";
		   $mensaje .= "APELLIDO: ";
		   $mensaje .= $apellido_form."\r\n";
		   $mensaje	.= "GRADO: ";
		   $mensaje .= $grado_form."\r\n";
		   $mensaje .= "No IDENTIFICACIÓN: ";
		   $mensaje .= $identificacion_form."\r\n";
		   $mensaje .= "Unidad: ";
		   $mensaje .= $unidad_form."\r\n";
		   $mensaje	.= "Fuerza: ";
		   $mensaje .= $fuerza_form."\r\n";
		   $mensaje .= "Email: ";
		   $mensaje .= $email_form."\r\n";
		   $mensaje .= "Mensaje: ";
		   $mensaje .= $mensaje_form."\r\n";
					 
				 
			mail('virtual@esici.edu.co','Formulario inscripción curso inteligencia de combate a distancia',$mensaje,$headers);
			mail('jbecerra@micrositios.net', 'Formulario inscripción curso inteligencia de combate a distancia', $mensaje,$headers);
			
		  
	
	} 


?>