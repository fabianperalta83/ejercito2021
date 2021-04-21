<?php 
require_once(dirname(__FILE__).'/_config/constantes.php'); 
require_once(dirname(__FILE__).'/_lib/permisoArma.class.php');
require_once(_DIRLIB_ADMIN."Pager.class.php");


$tiposDocumento = array('CC'=>'Cedula',
				'CE'=>'Cedula de Extrangeria',
				'PAS'=>'Pasaporte');

global $idcategoria;
global $db;
$plantilla =  "index.tpl.php";
$smartyApp->assign("idcategoria",$idcategoria);
$smartyApp->assign("PHP_SELF",$_SERVER['PHP_SELF']);
$smartyApp->assign("tiposDocumento",$tiposDocumento);
$mensajes= array(
          '0' => 'Se modifico el campo correctamente', 
          '1' => 'Se elimino el permiso correctamente'
         );

$accion = isset($_POST['accion'])?$_POST['accion']:(isset($_GET['accion'])?$_GET['accion']:'');


switch(strtolower($accion))
{
	case 'nuevo':$plantilla =  $plantilla= "crearpermiso.tpl.php";
	break;
	case 'modificar':
		  modificar($smartyApp);$plantilla= "crearpermiso.tpl.php";
	break;

	case 'eliminar':
	      eliminar();
	      header('Location:?idcategoria='.$idcategoria."&mess=1");
	break;
	case 'cancelar':
	      header('Location:?idcategoria='.$idcategoria);
	break;
	case 'adicionar':
		  //$resultado=verificar();
		  
		  $resultado=adicionar();
		  if(!$resultado)
		  {header('Location:?idcategoria='.$idcategoria."&mess=0");}
		  else
		  //{header('Location:?'.$_SERVER);}
		  {$mensaje = $resultado;modificar($smartyApp);$plantilla= "crearpermiso.tpl.php";}
    break;
	
	case 'buscar':
	      
	break;
	
	default:$plantilla  = "index.tpl.php";
	break;
}


//Ejecuta por defecto
$busqueda = isset($_POST['busqueda'])?$_POST['busqueda']:(isset($_GET['busqueda'])?$_GET['busqueda']:'');

if(!empty($busqueda)){
$_GET['busqueda'] = $busqueda;
$smartyApp->assign("busqueda",$busqueda);
$smartyApp->assign("opciones",'&busqueda='.$busqueda);
}

//print_r($_GET);

 
$listado=getPermisos($busqueda);

/* PAGINACION */
$d = new Pager($listado, 5, isset($_GET['pag']) ? $_GET['pag'] : 1);		
$armaPermisos = array();
/**
 * Obtenemos los registros que necesitamos
 */
while(!$d->EOF) {
    $arrayTemp = $d->fields;
    array_walk($arrayTemp, 'resaltar_busqueda',$busqueda);//resalta las palabras de busqueda en el resultado
	array_push($armaPermisos, $arrayTemp);
	$d->MoveNext();
}
/* FIN PAGINACION */

//valores usados en la construccion de la lista de elementos
$accionesPermiso= array("modificar","eliminar");
$camposMostrar = array('id','nombres','tipodoc','documento','nopermiso');
$totalColumnas = count($accionesPermiso)+count($camposMostrar);

$smartyApp->assign("totalColumnas",$totalColumnas);
$smartyApp->assign("accionesPermiso",$accionesPermiso);
$smartyApp->assign("armaPermisos",$armaPermisos);
if ($plantilla=='index.tpl.php')$smartyApp->assign('paginas',$d->values);

$plantilla = $smartyApp->fetch($plantilla);


if (isset($mensaje) or isset($_REQUEST['mess']) )
{   
	$menssage = isset($mensaje)?$mensaje:$mensajes[$_REQUEST['mess']];
	$smartyApp->assign('mensaje',$menssage);
	$plantilla = $smartyApp->fetch('errorSolicitud.tpl.php').$plantilla;
}
return $plantilla;

function resaltar_busqueda(&$item, $key, $busqueda)
{   
    //cho "busqueda: $busqueda <hr/>";
	if (!empty($busqueda))
    {$item = eregi_replace  ($busqueda, "<span class='encontrado'>".$busqueda."</span>"  , $item);}
    //echo "item: $item <hr/>";
	}

function mostrar()
{
	
	//return $smartyApp->fetch("index.tpl.php");
	
}

function modificar(&$smartyApp)
{
    global $db;
    
    $sql = "SELECT * FROM "._TBL_ARMAPERMISO." WHERE id =".getVariable('id');
    $permiso = $db->getRow($sql);
	$campos = array('id','nombres','tipodoc','documento','nopermiso');
	foreach ($campos as $campo)
	{
		if(isset($_POST[$campo]))$permiso[$campo] = $_POST[$campo];
	}  
    //msgError(print_r($permiso,true));
    $smartyApp->assign("permiso",$permiso);
		
}
function eliminar()
{   //msgError("eliminando");
	global $db;
	//$db->debug=true;
	$sql ="DELETE FROM "._TBL_ARMAPERMISO." WHERE id = ".getVariable('id');
	
	$db->Execute($sql); //$db->debug=false; 
	return;
	
}

function adicionar()
{   global $db;

	$permiso      = new permisoArma();
	$permiso->db = &$db;
	$permiso->id        = $_POST['id'];
	$permiso->nombres   = $_POST['nombres'];
	$permiso->tipodoc   = $_POST['tipodoc'];
	$permiso->documento = $_POST['documento'];
	$permiso->nopermiso = $_POST['nopermiso'];
    return $permiso->guardar();
	/*return echo  ($permiso->guardar())?"FUNCIONO":"FALLO";exit;*/

}

function getPermisos($filtro='')
{
	global $db;
	$campos = permisoArma::$defCampos;
	unset($campos['id']);
	$busqueda = array();
	if (!empty($filtro))
	{
		foreach ($campos as $campo=>$infcampo){ $busqueda[] = "  $campo LIKE '%$filtro%' " ;}
		$busqueda = "WHERE ".implode(" OR ", $busqueda);
	}

	$sql = "SELECT * FROM "._TBL_ARMAPERMISO. "  $busqueda";
	return $db->Execute($sql);
	
}
/* SYNTAXIS SQL - MYSQL */
$sql =<<<YHB

CREATE TABLE armaPermiso
(
id int  NOT NULL AUTO_INCREMENT,
nombres varchar(255) NOT NULL,
tipodoc varchar(255) NOT NULL,
documento varchar(255) NOT NULL,
nopermiso varchar(255) NOT NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM;

YHB;


//$db->debug=true;
//$db->Execute($sql);
//$db->debug=false;


?>