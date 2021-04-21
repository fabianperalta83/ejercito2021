<?php
require_once (_DIRCORE. 'Autenticacion.class.php');
$smarty = new Smarty_Plantilla;
$smarty->assign('rutaRecursos', _DIRRECURSOS);
$smarty->assign('c_action', "?". $_SERVER["QUERY_STRING"]);

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$db = $GLOBALS["db"];

// Verifying the CSRF Token
$is_secure_form=false;
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["frm_pregunta"]) 
	and isset($_SESSION['info_usuario']['username']) and $_SESSION['info_usuario']['username'] != "") {
	if (!empty($_REQUEST['token'])) {
	    $is_secure_form=Funciones::hash_equals($_SESSION['token'], $_REQUEST['token']);
	}
	if(!$is_secure_form){
	  	$smarty->assign("subMenuError", "Acceso incorrecto detectado");
	}
}else{
	$is_secure_form=true;
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["frm_pregunta"]) && $is_secure_form
	and isset($_SESSION['info_usuario']['username']) and $_SESSION['info_usuario']['username'] != "") {

	/**
	 * Revision de las variables que llegan por POST
	 **/
	$info["frm_pregunta"] = isset($_POST["frm_pregunta"]) ? $_POST["frm_pregunta"] : "";

	/**
	 * Carga de la info del usuario
	 **/
	$autenticacion = Autenticacion::secureSQL($_SESSION['info_usuario']['username'],'');
	$q1 = $db->prepare("SELECT * FROM "._TBLUSUARIO." WHERE username = ? ");
	
	$r1 = $db->Execute($q1, array($autenticacion)) or errorQuery(__LINE__, __FILE__);
	
	$infoUsuario=array();
	
	
	while (!$r1->EOF) {
	array_push($infoUsuario, $r1->fields);
	$r1->MoveNext();
}

	
	/**
	 * Insercion de la pregunta en los FAQ pero apagada
	 **/
	$problemaQuery = FALSE;
	
	$qInsercion = $db->prepare("INSERT INTO "._TBLCATEGORIA."(idpadre, nombre, activa, validacion) values (?, ?, 0, ?)");
	$autenticacion_ii = Autenticacion::secureSQL(htmlentities($_POST['frm_pregunta']),'');
	$md5 = md5($_GET['idcategoria']);
	
	if ($rInsercion = $db->Execute($qInsercion, array($_GET['idcategoria'], $autenticacion_ii, $md5) ) or errorQuery(__LINE__, __FILE__)) {
		$idCategoriaNueva = $rInsercion->fields['ultimoid'];
	} else {
		$problemaQuery = TRUE;
	}
	
	
	/**
	 * Envio del Correo al administrador de los FAQS y la usuario que envio la peticion
	 **/
	$body =  "Fecha de Solicitud de Pregunta Frecuente: ".(date("Y-m-d", time()))." ".date("H:i:s",time())."\n\n"
			."Datos de la persona que preguntó\n"
			."Nombre Usuario:".$_SESSION['info_usuario']['username']." \n"
			."Nombre:	".$infoUsuario.'nombres'." ".$infoUsuario.'apellidos'." \n"
			."Correo:	".$infoUsuario.'email'." \n"
			."Pregunta: ".trim($_POST["frm_pregunta"])." \n\n";
			
	if ($problemaQuery == FALSE) {
		$body .= "Para poner la respuesta haga clic en la dirección: "._URL."/edicion.php?idcategoria=".$idCategoriaNueva." \n";
	}

	$body2 = "Muchas gracias por contactarnos.\n"
			."Su pregunta está siendo procesada por el equipo de trabajo de la Fuerza Aérea\n\n"
			."Su Pregunta fue: ". trim($_POST["frm_pregunta"]) ."\n\n"
			."Por favor no conteste este e-mail, el mismo es un mensaje automático."
			;

    $from  = sprintf("From: %s", $infoUsuario.'email');
	$to = _EMAIL_ADMINISTRADOR_FAQ;
	
    if (Funciones::microsmail($to, sprintf("Pregunta solicitada desde la página %s",_NOMBRESITIO), $body, $from, 'faq.php','1') 
    	&& Funciones::microsmail($infoUsuario.'email',"Pregunta solicitada - ".strip_tags(_NOMBRESITIO),$body2,"From: ".$to,'faq.php','2') ){
	
      $smarty1 = new Smarty_Plantilla;
      $smarty1->assign('rotMensaje',_ROT_CONFIRMACION);
      $smarty1->assign('tipo'      ,"exito");
      $error[] = sprintf(_ROT_SUSCRIPCION_ENVIO_CONFIRMA, $to);
      $smarty1->assign('elementoMenu',$error);
      $smarty->assign("subMenuError", $smarty1->fetch('tpl_display_mensaje.html'));
	  
    } else {
	
      $smarty1 = new Smarty_Plantilla;
      $smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
      $smarty1->assign('tipo'      ,"error");
      $error[] = sprintf(_ROT_SUSCRIPCION_ENVIO_ERROR, $to);
      $smarty1->assign('elementoMenu',$error);
      $smarty->assign("subMenuError", $smarty1->fetch('tpl_display_mensaje.html'));
	  
    }
} 

/**
 * La página de FAQ
 **/
if(isset($_SESSION['info_usuario']['username']) and $_SESSION['info_usuario']['username'] != "") {
	$smarty ->assign('UsuarioRegistrado', TRUE);
		
} else {
	$smarty ->assign('UsuarioRegistrado', FALSE);
}

/**
 * Generacion del fltro
 **/
$filtro = array();
/* Queda por verificar Prepare, ya que no esta funcionando bien */
$qFiltro = sprintf("SELECT DISTINCT(antetitulo) FROM %s WHERE idpadre = %s", _TBLCATEGORIA, $_GET['idcategoria']);
$rFiltro = $db->Execute($qFiltro) or errorQuery(__LINE__, __FILE__);

while(!$rFiltro->EOF) {
	
			array_push($filtro, $rFiltro->fields['antetitulo']);
			$rFiltro->MoveNext();
		
	
	}
$smarty->assign('filtro', $filtro);




/**
 * Listado del Faq organizados por el parametros de conteo
 **/
$faqs = array();

// Verifying the CSRF Token
$is_secure_form=false;
if (isset($_POST["filtro_antetitulo"]) && !empty($_POST["filtro_antetitulo"])) {
	if (!empty($_REQUEST['token'])) {
	    $is_secure_form=Funciones::hash_equals($_SESSION['token'], $_REQUEST['token']);
	}
	if(!$is_secure_form){
	  	$smarty->assign("subMenuError", "Acceso incorrecto detectado");
	}
}else{
	$is_secure_form=true;
}

if (isset($_POST["filtro_antetitulo"]) && !empty($_POST["filtro_antetitulo"]) && $is_secure_form) {

	$q1 = sprintf("SELECT * FROM %s WHERE idpadre = '%s' and activa != 0 and antetitulo LIKE('%s') ORDER BY cuenta DESC", _TBLCATEGORIA, $_GET["idcategoria"], Autenticacion::secureSQL($_POST["filtro_antetitulo"],''));
	
} else {
	$q1 = sprintf("SELECT * FROM %s WHERE idpadre = '%s' and activa != 0 ORDER BY cuenta DESC LIMIT 10", _TBLCATEGORIA, $_GET["idcategoria"]);
}

$r1 = $db->Execute($q1);
while (!$r1->EOF) {
	array_push($faqs, $r1->fields);
	$r1->MoveNext();
}

$smarty->assign('filtro_antetitulo', isset($_POST["filtro_antetitulo"]) ? $_POST["filtro_antetitulo"] : "");
$smarty->assign('faq', $faqs);
$smarty->assign('idcategoria', $_GET["idcategoria"]);


return $smarty->fetch('tpl_faq.html');
?>