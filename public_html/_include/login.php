<?


require_once (_DIRCORE. 'Autenticacion.class.php');
$smarty = new Smarty_Plantilla;

$pagina = basename($_SERVER['PHP_SELF']);
$pagina .= sprintf("?idcategoria=%s",$idcategoria);
$msg = '';


if (isset($_GET['msg'])) {
	switch ($_GET['msg']) {
		case '1':
			$msg = _ROT_PAGINA_RESTRINGIDA;
			break;
		case '2':
			$msg = 'Para editar tiene que estar AUTENTICADO.';
			break;
		case '3':
			$msg = 'NO tiene permitido editar en esta categoria.';
			break;
		case '4':
			$msg = 'NO tiene permitido ingresar a esta categoria.';
			break;
		case '5':
			$msg = 'Para entrar a esta zona tiene que estar AUTENTICADO<br><br>' .
					'Si no se encuentra registrado en el sistema, puede diligenciar el <br>' .
					'formulario gratuitamente <a href="'._URL.'/index.php?idcategoria='._SREGISTRO.'">aqui</a>';
			break;
	}
}




if(!empty($msg)) {
	$error[] = $msg;
	$smarty1 = new Smarty_Plantilla;
	$smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
	$smarty1->assign('tipo'      ,"error");
	$smarty1->assign('elementoMenu',$error);
	$show = $smarty1->fetch('tpl_display_mensaje.html');
	$smarty->assign('subMenuError',$show);
}

// Titulo de la página
$archivo = sprintf("%s/categoria_%s.png", _DIRRECURSOS, $idcategoria);



if (file_exists($archivo)) {
	$c_titulo = sprintf("<img src='%s' width='405' height='63' />", $archivo);
} else {
	$c_titulo = Funciones::BuscarNombre($idcategoria);

}



$smarty->assign('c_titulo',$c_titulo);

$idcategoriaGet 	= (isset($_GET['idcategoria'])) ? $_GET['idcategoria'] : ((isset($_POST['idcategoria'])) ? $_POST['idcategoria'] : '');
$archivoOrigenGet 	= (isset($_GET['archivo_origen'])) ? $_GET['archivo_origen'] : ((isset($_POST['archivo_origen'])) ? $_POST['archivo_origen'] : '');
$categoriaOrigenGet = (isset($_GET['cat_origen'])) ? $_GET['cat_origen'] : ((isset($_POST['cat_origen'])) ? $_POST['cat_origen'] : '');

$solicitud_idGet 	= (isset($_GET['solicitud_id'])) ? $_GET['solicitud_id'] : ((isset($_POST['solicitud_id'])) ? $_POST['solicitud_id'] : '');

//echo "<script type='text/javascript'>alert('$usu');</script>";

if (!isset($_POST['usuario']) || !isset($_POST['password']) || $_POST['usuario'] == "" || $_POST['password'] == "" || !isset($_POST['hash']) || $_POST['hash'] == "" || !isset($_SESSION["info_usuario"])) {
	$usu = Autenticacion::secureSQL($_POST['usuario'],'');
	$usuario  = $usu;
	$password = (isset($_POST['password']))?$_POST['password']:"";
	$hash     = (isset($_POST['hash']))?$_POST['hash']:"";


	$smarty->assign('c_action'           ,$pagina);
	$smarty->assign('c_formulario_titulo',_ROT_LOGIN);

	

	$campo['nombre'] = _ROT_LOGIN_USUARIO;
	$campo['clase']  = "requerido";
	$campo['input']  = sprintf("<div class='form-group'><label for='usuario'><input type='text' placeholder='Usuario' name='usuario' size='35' value='' id='usuario' class='form-control required' /></label></div>", $usuario);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_LOGIN_PASSWORD;
	$campo['clase']  = "requerido";
	$campo['input']  = "<div class='form-group'><label for='password'><input type='password' name='password' placeholder='Contrase&ntilde;a' size='35' value='' class='form-control required' id='password'  autocomplete='off'/></label></div>";
	$campos[] = $campo;
	
	$campo['nombre'] = "";
	$campo['clase']  = "";
	$campo['input']  = "<div class='g-recaptcha' data-sitekey='6LeM8uMUAAAAAJ06qF_dEP2PsKgPJ4U2eYv4wNfJ' style='margin-left:20px;'></div>";
	$campos[] = $campo;
	
	
	

	$campo['nombre'] = "";
	$campo['clase']  = "";
	$campo['input']  = sprintf("<label for='idcategoria'><input type='hidden' id='idcategoria' name='idcategoria' value='%s' /></label>", $idcategoriaGet);
	$campos[] = $campo;

	$campo['nombre'] = "";
	$campo['clase']  = "";
	$campo['input']  = sprintf("<label for='archivo_origen'><input type='hidden' name='archivo_origen' value='%s' id='archivo_origen' /></label>", $archivoOrigenGet);
	$campos[] = $campo;

	$campo['nombre'] = "";
	$campo['clase']  = "";
	$campo['input']  = sprintf("<label for='cat_origen'><input type='hidden' name='cat_origen' value='%s' id='cat_origen' /></label>", $categoriaOrigenGet);
	$campos[] = $campo;

	$campo['nombre'] = "";
	$campo['clase']  = "";
	$campo['input']  = sprintf("<label for='solicitud_id'><input type='hidden' id='solicitud_id' name='solicitud_id' value='%s' /></label>", $solicitud_idGet);
	$campos[] = $campo;

	

	//<div class="g-recaptcha" data-sitekey="6LeM8uMUAAAAAJ06qF_dEP2PsKgPJ4U2eYv4wNfJ"></div>

	$smarty->assign('campos',$campos);

	return $smarty->fetch('tpl_login.html');

} else {
	if (!empty($categoriaOrigenGet)) {
		if($solicitud_idGet==''){
		headerLocation($archivoOrigenGet."?idcategoria=".$categoriaOrigenGet);
		}
		else{
			headerLocation($archivoOrigenGet."?idcategoria=".$categoriaOrigenGet."&solicitud_id=".$solicitud_idGet);
		}
	} else {
		
		//die(_URL);
		headerLocation(_URL."?idcategoria="._SINICIO);
	}
	exit(0);
}
?>
