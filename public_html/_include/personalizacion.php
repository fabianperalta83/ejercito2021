<?php

	global $sroot;

	/**** Manejo de la Autorizacion ****/
	if (!isset($_SESSION['info_usuario'])){
		printf("<SCRIPT LANGUAGE='JavaScript'>location.replace('index.php?idcategoria=%s&cat_origen=%s&archivo_origen=%s&msg=%s');</SCRIPT>",_SLOGIN,$idcategoria,basename($_SERVER['PHP_SELF']),urlencode(sprintf("%s",_ROT_PAGINA_RESTRINGIDA)));
		/*exit;*/
	}
	
	/**** Manejo de la personalizacion del home ****/
	$secciones = array();
	$mensajeAlerta = '';
	$error = array();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST["seccion"])) {
			foreach ($_POST["seccion"] as $valor) {
				if (isset($_POST["num_noticias_".$valor])) {
					$cantidad = empty($_POST["num_noticias_".$valor]) ? 3 : $_POST["num_noticias_".$valor];
					array_push($secciones, array('idSeccion' => $valor, 'cantidad' => $cantidad, 'padre' => $_POST["padre_".$valor]));
				}
			}
		}
		$secciones = serialize($secciones);
		
		/**** Guardar la informacion de personalizacion ****/
		$q = sprintf("UPDATE %s SET personalizacion = '%s' WHERE idusuario = '%s'", 
					_TBLUSUARIO,
					$secciones,
					$_SESSION['info_usuario']['idusuario']
					);
		
		if ($r = $db->Execute($q) or errorQuery(__LINE__, __FILE__)) {
			$mensajeAlerta = 'Se guardo correctamente la personalización.';
		} else {
			$mensajeAlerta = 'Ha ocurrido un error. Por favor pruebe más tarde.';
		}
		
	} else {
		
		$q = sprintf("SELECT personalizacion FROM %s WHERE idusuario = '%s'", 
						_TBLUSUARIO, 
						$_SESSION['info_usuario']['idusuario']
					);
		$r = $db->Execute($q) or errorQuery(__LINE__, __FILE__);
		
		/**** Capturamos la personalizacion del usuario loggeado ****/
		if ($r !== FALSE) {
			$d = $r->fields;
			$secciones = $d['personalizacion'];
		}
	}
	
	$smarty = new Smarty_Plantilla;
	
	/**** Mensaje de Alerta ****/
	if(!empty($mensajeAlerta)){
	   $error[] = $mensajeAlerta;
	   $smarty1 = new Smarty_Plantilla;
	   $smarty1->assign('rotMensaje',_ROT_CONFIRMACION);
	   $smarty1->assign('tipo'      ,"error");
	   $smarty1->assign('elementoMenu',$error);
	   $show = $smarty1->fetch('tpl_display_mensaje.html');
	   $smarty->assign('mensajeAlerta',$show);
	}
	
	$smenu = $sroot == 1 ? 3 : $sroot;
	$menuInstitucional = FuncionesInterfaz::EnlacesSubMenu($smenu, 0, TRUE);
	
	if (is_string($secciones)) {
		$smarty->assign('infoSecciones', unserialize($secciones));
	} elseif(is_array($secciones)) {
		$smarty->assign('infoSecciones', $secciones);
	}
	
	$smarty->assign('menuInstitucional', $menuInstitucional);
	
	return $smarty->fetch('tpl_personalizacion.html');
?>