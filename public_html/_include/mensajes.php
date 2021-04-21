<?
require_once(_DIRCORE."Validacion.class.php");
require_once(_DIRCORE. 'Autenticacion.class.php');
$smarty = new Smarty_Plantilla;

$pagina = basename($_SERVER['PHP_SELF']);
$pagina .= sprintf("?idcategoria=%s",$idcategoria);

// Titulo de la página

$archivo = sprintf("%s/categoria_%s.png",_DIRRECURSOS,$idcategoria);
if (file_exists($archivo)){
	$c_titulo = sprintf("<img src=%s border=0 width=405 height=63 border=0>",$archivo);
}else{
	$c_titulo = Funciones::BuscarNombre($idcategoria);
}
$smarty->assign('c_titulo',$c_titulo);

/* $nombre_form    = isset($_POST['nombre_form'])   ?$_POST['nombre_form']:"";
$email_form     = isset($_POST['email_form'])    ?$_POST['email_form']:"";
$comenta_form   = isset($_POST['comenta_form'])  ?$_POST['comenta_form']:"";
$telefono_form  = isset($_POST['telefono_form']) ?$_POST['telefono_form']:"";
$direccion_form = isset($_POST['direccion_form'])?$_POST['direccion_form']:"";
$empresa_form   = isset($_POST['empresa_form'])  ?$_POST['empresa_form']:"";
$msg            = isset($GLOBALS['msg'])?$GLOBALS['msg']:"";
 */
$nom 	= isset($_POST['nombre_form'])   ?$_POST['nombre_form']:"";
$mail 	= isset($_POST['email_form'])    ?$_POST['email_form']:"";
$coment = isset($_POST['comenta_form'])  ?$_POST['comenta_form']:"";
$tel 	= isset($_POST['telefono_form']) ?$_POST['telefono_form']:"";
$dir 	= isset($_POST['direccion_form'])?$_POST['direccion_form']:"";
$job 	= isset($_POST['empresa_form'])  ?$_POST['empresa_form']:"";

$nombre_form    = Autenticacion::secureSQL($nom,'');
$email_form     = Autenticacion::secureSQL($mail,'');
$comenta_form   = Autenticacion::secureSQL($coment,'');
$telefono_form  = Autenticacion::secureSQL($tel,'');
$direccion_form = Autenticacion::secureSQL($dir,'');
$empresa_form   = Autenticacion::secureSQL($job,'');
$msg            = isset($GLOBALS['msg'])?$GLOBALS['msg']:"";

if (!$nombre_form) {  $error[] = _ROT_CONTACTO_NOMBRE_ERROR;  }
if (!$email_form)  {  $error[] = _ROT_CONTACTO_EMAIL_ERROR1;  }
if ($email_form && !Validacion::isEmail($email_form)) {  $error[] = _ROT_CONTACTO_EMAIL_ERROR2;  }
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

	$smarty->assign('c_action',$pagina);
	$smarty->assign('c_formulario_titulo',_ROT_CONTACTO);

	$campo['nombre'] = _ROT_CONTACTO_NOMBRE;
	$campo['clase']  = "requerido";
	$campo['input']  = sprintf("<input type=text name=nombre_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$nombre_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_CONTACTO_EMAIL;
	$campo['clase']  = "requerido";
	$campo['input']  = sprintf("<input type=text name=email_form size=35 value='%s' class='tpl_input_edicion_requerido'>",$email_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_CONTACTO_DIRECCION;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<input type=text name=direccion_form size=35 value='%s' class='input1'>",$direccion_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_CONTACTO_EMPRESA;
	$campo['clase']  = "";
	$campo['input']  = sprintf("<input type=text name=empresa_form size=35 value='%s' class='input1'>",$empresa_form);
	$campos[] = $campo;

	$campo['nombre'] = _ROT_CONTACTO_COMENTA;
	$campo['clase']  = "requerido";
	$campo['input']  = sprintf("<textarea name=comenta_form rows=6 cols=40 align=center class='tpl_input_edicion_requerido'>%s</textarea>",$comenta_form);
	$campos[] = $campo;

	$smarty->assign('campos',$campos);

	return $smarty->fetch('tpl_contacto.html');

} else {
	srand((double)microtime()*1000000);
	$validacion = md5(rand(0,9999999));

	$body = sprintf("\n\t\tNombre: %s",$nombre_form);
	$body .= sprintf("\n\t\tEmail: %s",$email_form);
	$body .= sprintf("\n\t\tTeléfono: %s",$telefono_form);
	$body .= sprintf("\n\t\tCiudad / País: %s",$direccion_form);
	$body .= sprintf("\n\t\tActividad/Oficio/Profesión: %s",$empresa_form);
	$body .= sprintf("\n\t\tComentario:\n\n%s",$comenta_form);

	$body2 = sprintf("Muchas gracias por escribirnos.\nSu mensaje esta siendo procesado por el equipo de trabajo de %s (%s).",strip_tags(_NOMBRESITIO),_URL);

	$from  = sprintf("From: %s",$email_form);

	if (Funciones::microsmail(_EMAIL,sprintf("Nos escriben %s",' '),$body,$from,'contacto.php','1')
		&& Funciones::microsmail($email_form,strip_tags(_NOMBRESITIO),$body2,"From: "._EMAIL,'contacto.php','2') ){

		global $db;
		$idpadre = 34258;
		$query = "INSERT INTO "._TBLCATEGORIA." (idpadre,nombre,descripcion,activa,iddisplay,iddisplay_sub,fecha1,validacion) ";
		$query .= "VALUES (".$idpadre.",'".$nombre_form."','".$comenta_form."',0,0,0,'".date("Y-m-d 00:00:00")."','".$validacion."')";
		$db->Execute($query) or errorQuery(__LINE__, __FILE__);

		$smarty1 = new Smarty_Plantilla;
		$smarty1->assign('rotMensaje',_ROT_CONFIRMACION);
		$smarty1->assign('tipo'      ,"exito");
		$error[] = sprintf(_ROT_CONTACTO_ENVIO_CONFIRMA,_EMAIL);
		$smarty1->assign('elementoMenu',$error);
		return $smarty1->fetch('tpl_display_mensaje.html');
	} else {
		$smarty1 = new Smarty_Plantilla;
		$smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
		$smarty1->assign('tipo'      ,"error");
		$error[] = sprintf(_ROT_CONTACTO_ENVIO_ERROR,_EMAIL);
		$smarty1->assign('elementoMenu',$error);
		return $smarty1->fetch('tpl_display_mensaje.html');
	}
}
?>
