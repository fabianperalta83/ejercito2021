<?php

ini_set('display_errors',0);
//Llamamos los archivos necesarios 
require_once (_DIRCORE . 'Validacion.class.php');
require_once (_DIRCORE . 'Funciones.class.php');
require_once (_DIRCORE . 'Autenticacion.class.php');
require_once (_DIRLIB . 'smarty/libs/Smarty.class.php');

global $db;

//Declaramos los grados en un array para mostrarlos en un select
$grados = array("GR","MG","BG","CR","TC","MY","CT","TE","ST","SM","SP","SV","SS","CP","CS","C3","CIVIL");

$smarty = new Smarty_Plantilla();
//Esta es la consulta para traer las unidades
$sql = "SELECT * FROM Unidad where idpadre = 0";
$result = $db->getAll($sql);

//Recolectamos todos los datos
$nombre = $_POST['nombre_usuario'];

$apellido = $_POST['apellido_usuario'];

$identificacion = $_POST['identificacion_usuario'];

$grado = $_POST['sel_1'];

$grado2 = $_POST['sel_2'];

$grado3 = $_POST['sel_3'];

$grado4 = $_POST['sel_4'];


$fecha = date("Y-m-d");


//Validamos que los datos no vengan vacios , a exepción del último select 
if($nombre != '' && $apellido != ''  && $identificacion != '' && $grado != -1 && $grado2 != -1 && $grado3 != -1)
{	

	if($grado4 = '')$grado4 = 0;$grado4 = (int) $grado4;

	//Verificamos que el mismo usuario no se pueda registrar a menos que tenga otra unidad
	$q = sprintf("SELECT * FROM usuario_dante WHERE identificacion = '%s' and Unidad1 = %s and Unidad2 = %s",$identificacion,$grado2,$grado3);
	//echo $q.'<br>';
	$resultado = $db->getAll($q);

	if(count($resultado) == 0)
	{	

		$q1 = sprintf("SELECT * FROM usuario_dante WHERE identificacion = '%s' and Unidad1 = %s and Unidad2 = %s and Unidad3 = %s",$identificacion,$grado2,$grado3,$grado4);
		//echo $q1.'<br>';
		$resultado1 = $db->getAll($q1);

		if(count($resultado1) == 0)
		{
			//Realizamos la consulta para insertar los datos
			$query1 = sprintf("INSERT INTO usuario_dante (Nombre,Apellido,identificacion,Grado,Unidad1,Unidad2,Unidad3,fecha) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')",$nombre,$apellido,$identificacion,$grado,$grado2,$grado3,$grado4,$fecha);
			$query1 = $db->Execute($query1);
			//Verificamos si los registros se alteraron para enviarle una alerta al usuario de que el formulario se diligencio 
			if (mysql_affected_rows()) 
			{
				echo "<script>alert('El Formulario se ha diligenciado correctamente!')</script>"; 
				//echo "<script>location.href='https://www.ejercito.mil.co'</script>";
			}
			else
			{
				echo "<script>alert('Ah ocurrido un error al diligenciar el formulario!')</script>"; 
			}
		}
		else
		{
			$mensaje = "El usuario ya se encuentra registrado";
		}
	}
	else
	{
		$mensaje = "El usuario ya se encuentra registrado";
	}

	
}

//Verificamos que el usuario haya seleccioando un grado 
if($grado == -1)
{
	$mensaje = "* Debe seleccionar un grado.";
	
}
//Verificamos que el usuario haya seleccionado la unidad correspondiente, no se agrega el tercer select debido a que no siempre se puede seleccionar.
if (  $grado2 == -1 || $grado3 == -1) {
	
	$mensaje = "* Debe seleecionar una unidad.";
}
/** Miramos si la variable existe para volver a mostrar los datos cuando se muestre un error **/
if(isset($nombre))
{
	$smarty->assign('nombre',$nombre);
}
if(isset($apellido))
{
	$smarty->assign('apellido',$apellido);
}
if(isset($identificacion))
{
	$smarty->assign('identificacion',$identificacion);
}
if(isset($grado))
{
	$smarty->assign('grado',$grado);
}

//Enviamos las variables al HTML
$smarty->assign('alerta',$mensaje);
$smarty->assign('unidades',$result);
$smarty->assign('grados',$grados);


return $smarty->fetch('tpl_formulario_dante.html');

?>