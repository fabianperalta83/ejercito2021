<?

global $sroot; /** @see variables.php */
global $idcategoria;
//Creamos el objeto de smarty
$smarty = new Smarty_Plantilla;

$smarty->assign('idcategoria',$idcategoria);

//Verificamos que venga el hash
if(isset($_GET['restauracion']) && isset($_GET['username']))
{
	if($_GET['restauracion'] != '' && $_GET['username'] != '')
	{
		
		//Consultamos el usuario con el hash que viene y el username
        
        // Cambio # 1
		/*$query = sprintf("SELECT * FROM %s WHERE hash_restauracion = '%s' and username = '%s'", _TBLUSUARIO, $_GET['restauracion'],$_GET['username']);
		$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);*/
        
        $get_restacuracion = $_GET['restauracion'];
        $get_username = $_GET['username'];
        $query = $db->prepare("SELECT * FROM "._TBLUSUARIO." WHERE hash_restauracion = ? and username = ?");
		$result = $db->Execute($query, array($get_restacuracion, $get_username)) /* or errorQuery(__LINE__, __FILE__) */;
        
        /*$get_restauracion = $_GET['restauracion'];
        $get_username = $_GET['username'];
        $query = prepare("SELECT * FROM "._TBLUSUARIO." WHERE hash_restauracion = ? and username = ?");
		$result = $db->Execute($query, array($get_restauracion, $get_username)) or errorQuery(__LINE__, __FILE__);*/
		
		if($result->NumRows() > 0)
		{
			if($result->fields['timestamp_restauracion'] != '')
			{
				//Calculamos que la fecha en la que se solicito la restauracion este dentro de 24 horas
				$fecha_solicitud = explode(' ',$result->fields['timestamp_restauracion']);
				
				//Obtenemos ano, mes y dia
				$fecha_solicitud_dias = explode('-',$fecha_solicitud[0]);
				
				//Obtenenmos ahora la hora, minutos y segundo
				$fecha_solicitud_hora = explode(':',$fecha_solicitud[1]);
				
				//Calculamos diferencia con la fecha y hora actual
				//Este resultado es en segundos
				
				$dif = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y')) - mktime($fecha_solicitud_hora[0],$fecha_solicitud_hora[1],$fecha_solicitud_hora[2],$fecha_solicitud_dias[1],$fecha_solicitud_dias[2],$fecha_solicitud_dias[0]); 
				
				//Si la diferencia es mayor a un dia en segundos no permitimos la restauracion
				if($dif <= 86400)
				{
					$smarty->assign('restauracion','A');
					$smarty->assign('username',$_GET['username']);
					$smarty->assign('hash',$_GET['restauracion']);
					
				}
				else
				{
					$smarty->assign('restauracion','NA');
				}
				
				
			}
			
		}
		else //No coincide hash y username de la base de datos.. puede ser un intento de ataque
		{
			$msg = "Usted no tiene vigente una restauraci&oacute;n de clave";
			$smarty = new Smarty_Plantilla;
			$mensajeExito[] = sprintf("%s",$msg);
			$smarty2 = new Smarty_Plantilla;
			$smarty2->assign('mostrar'   ,"no");
			$smarty2->assign('rotMensaje',_ROT_ADVERTENCIA);
			$smarty2->assign('tipo'      ,"error");
			$smarty2->assign('elementoMenu',$mensajeExito);
			return $smarty2->fetch('tpl_display_mensaje.html');
		}
	}
	
}

//Verificamos si se dio click en el boton enviar

if(isset($_POST['Enviar']))
{
	if($_POST['Enviar'] == 'Enviar')
	{
		
		//Verificamos si vienen los datos por POST
		if(isset($_POST['hash']) && isset($_POST['username']))
		{
			if($_POST['hash'] != '' && $_POST['username'] != '')
			{
				//Verificamos que hayan viajado las contrasenas
				if(isset($_POST['contrasena']) && isset($_POST['contrasena_confirmada']))
				{
					if($_POST['contrasena'] != '' && $_POST['contrasena_confirmada'] != '')
					{
						if(preg_match("/^.*(?=.{10,})(?=.*\d)(?=.*\W+)(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST['contrasena']))

						{
							if($_POST['contrasena'] == $_POST['contrasena_confirmada'] )
							{
								$username = $_POST['username'];
								$password = $_POST['contrasena'];
															
								//Realizamos el hash del password
								$password_sha1 = sha1($username.$password);
								//Realizamos el proceso de actualizacion de la contrasena
                                
                                // Cambio # 2                                
								/*$query = sprintf("UPDATE %s set password = '%s',hash_restauracion = '' WHERE hash_restauracion = '%s' and username = '%s'", _TBLUSUARIO, $password_sha1,$_POST['hash'],$_POST['username']);
								$result = $db->Execute($query) or errorQuery(__LINE__, __FILE__);*/
                                
                                $post_hash = $_POST['hash'];
                                $post_username = $_POST['username'];
                                $query = $db->prepare("UPDATE "._TBLUSUARIO." set password = ?, hash_restauracion = '' WHERE hash_restauracion = ? and username = ?");
								$result = $db->Execute($query, array($password_sha1, $post_hash, $post_username)) /* or errorQuery(__LINE__, __FILE__) */;
                                
                                /*$hash_restauracion = $_POST['hash'];
                                $post_username = $_POST['username'];
                                $query = prepare("UPDATE "._TBLUSUARIO." set password = ?, hash_restauracion = '' WHERE hash_restauracion = ? and username = ?");
								$result = $db->Execute($query, array($password_sha1, $hash_restauracion, $post_username)) or errorQuery(__LINE__, __FILE__);*/
								
								if($result)
								{
									//$smarty->assign('exito','Su contrase&ntilde;a fue restaurada exitosamente!!!');
									$msg = "Su contrase&ntilde;a fue restaurada exitosamente!!!";
									$smarty = new Smarty_Plantilla;
									$mensajeExito[] = sprintf("%s",$msg);
									$smarty2 = new Smarty_Plantilla;
									$smarty2->assign('mostrar'   ,"no");
									$smarty2->assign('rotMensaje',_ROT_CONFIRMACION);
									$smarty2->assign('tipo'      ,"exito");
									$smarty2->assign('elementoMenu',$mensajeExito);
									return $smarty2->fetch('tpl_display_mensaje.html');
								}
								
							}
							else
							{
								$msg = "Las claves no coinciden. Verifique por favor!!!";
								$smarty = new Smarty_Plantilla;
								$mensajeExito[] = sprintf("%s",$msg);
								$smarty2 = new Smarty_Plantilla;
								$smarty2->assign('mostrar'   ,"no");
								$smarty2->assign('rotMensaje',_ROT_ADVERTENCIA);
								$smarty2->assign('tipo'      ,"error");
								$smarty2->assign('elementoMenu',$mensajeExito);
								return $smarty2->fetch('tpl_display_mensaje.html');
							}
						}else{
						//echo $_POST['contrasena'];
							$msg = "La clave no cumple con el nivel de seguridad necesario<br />La clave debe tener:<br />
							M&iacute;nimo un n&uacute;mero.<br />
							Letras mayusculas y minusculas.<br />
							M&iacute;nimo un caracter especial (#@.&-:_=)<br />
							Y una longitud m&iacute;nima de 10 caracteres.";
							$smarty = new Smarty_Plantilla;
							$mensajeExito[] = sprintf("%s",$msg);
							$smarty2 = new Smarty_Plantilla;
							$smarty2->assign('mostrar'   ,"no");
							$smarty2->assign('rotMensaje',_ROT_ADVERTENCIA);
							$smarty2->assign('tipo'      ,"error");
							$smarty2->assign('elementoMenu',$mensajeExito);
							return $smarty2->fetch('tpl_display_mensaje.html');
						}
					}
					else
					{
						$msg = "Las claves no pueden estar vac&iacute;as. Verifique por favor!!!";
						$smarty = new Smarty_Plantilla;
						$mensajeExito[] = sprintf("%s",$msg);
						$smarty2 = new Smarty_Plantilla;
						$smarty2->assign('mostrar'   ,"no");
						$smarty2->assign('rotMensaje',_ROT_ADVERTENCIA);
						$smarty2->assign('tipo'      ,"error");
						$smarty2->assign('elementoMenu',$mensajeExito);
						return $smarty2->fetch('tpl_display_mensaje.html');
					}
				}
			}
		}	
	}
	
}
	
return $smarty->fetch('tpl_restauracion.html');


?>
