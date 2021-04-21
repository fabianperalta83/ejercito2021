<?php 
/* El texto de advertencia se puede colocar en el resumen de la categoria donde 
se adicione este archivo asi es facilmente configurable */
require_once(_DIRINCLUDE."repositorioImagenes/_config/"."constantes.php");
$respuesta = "";
//$respuesta .=" dir1 ".$smartyApp->template_dir;
//$respuesta .=" dir2 ".$smartyApp->cache_dir;
$smartyApp->assign("catrevision",$CAT_GALERIAREVISION);
if ($_SESSION['info_usuario']['idzona'] == 9 or $_SESSION['info_usuario']['es_editor'] !=0)
{
	$smartyApp->assign("zona_edicion",true);
}
if (isset($_POST) and (isset($_POST['acepta']) or isset($_POST['noacepta'])) )
{   $idcat = 1;
	if (isset($_POST['acepta'])){ 
		$_SESSION['condiciones'] = true; 
		$idcat = $CAT_REPOSITORIOIMG;	
    }
    header("Location:index.php?idcategoria=".$idcat);
}

$respuesta .= $smartyApp->fetch("tpl_advertencia.html");
return $respuesta;

?>