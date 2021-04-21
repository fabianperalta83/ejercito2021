<?
session_start();
$pagina = basename($_SERVER['PHP_SELF']);
$pagina .= sprintf("?idcategoria=%s",$idcategoria);

$msg    = isset($GLOBALS['msg'])?$GLOBALS['msg']:"";

if($msg){
	$error[] = $msg;
}

if (!isset($_POST['usuario']) || !isset($_POST['password']) || $_POST['usuario'] == "" || $_POST['password'] == ""){
	header('Location:' . $_POST['archivo_origen'] . "?idcategoria=" . $_POST['cat_origen']);
} else {
	$_SESSION['PHP_AUTH_USER'] = $_POST['usuario'];
	$_SESSION['PHP_AUTH_PW']   = $_POST['password'];
	var_dump(session_name());
	var_dump($sessId = session_id());
	var_dump($_SESSION);
	
	if($GLOBALS['archivo_origen'] == "indexadmin.php"){
		header("Location: administracion/indexadmin.php");
	} else {
		header("Location: ".$_POST['archivo_origen']."?idcategoria=".$_POST['cat_origen'] . '&' . session_name() . '=' . $sessId);
	}
}
?>