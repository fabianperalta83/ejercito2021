<?php
ini_set('display_errors',0);
require_once (_DIRCORE . 'Validacion.class.php');
require_once (_DIRCORE . 'Funciones.class.php');
require_once (_DIRCORE . 'Autenticacion.class.php');
require_once (_DIRLIB . 'smarty/libs/Smarty.class.php');
require_once(_DIRLIB.'Excel_2017/PHPExcel/PHPExcel.php');

if($_SESSION["info_usuario"]["idzona"] == 2 || $_SESSION["info_usuario"]["idzona"] == 9)
{


global $db;
//Hacemos la consulta para mostrar los datos de la tabla en la sección de administración
$query1 = "SELECT usuario_dante.*, 
 (select descripcion from Unidad where id = usuario_dante.Unidad1 ) as 'Unidad1', 
 (select descripcion from Unidad where id = usuario_dante.Unidad2 ) as 'Unidad2', 
 (select descripcion from Unidad where id = usuario_dante.Unidad3 ) as 'Unidad3' 
from usuario_dante";
//Obtenemos los resultados
$result = $db->getAll($query1);

//Declaramos las variables que obtendran las fechas 
$fecha1 = $_POST['Fecha1'];

$fecha2 = $_POST['Fecha2'];

//Esta función valida que la fecha sea correcta
function validar_fecha($fecha)
{
	$valores = explode('-',$fecha);
	trim($fecha);
	$año = $valores[0];
	$mes = $valores[1];
	$dia = $valores[2];

	if (checkdate($valores[1], $valores[2], $valores[0])) 
	{
		return true;
	}
	else
	{
		return false;
	}
}
//Verificamos que las variables esten definidas
if (isset($fecha1) and isset($fecha2)) 
{	
//Se verifica que la fecha 1 sea menor a la fecha 2
	if ($fecha1 < $fecha2) 
	{
		//Usamos la funcion para validar las fechas y proseguir a hacer la consulta
		if(validar_fecha($fecha1) == true and validar_fecha($fecha2) == true)
		{
			//$query2 = sprintf("SELECT * FROM usuario_dante WHERE fecha BETWEEN '%s' AND '%s' ",$fecha1,$fecha2);
			
			$query2= sprintf ("SELECT usuario_dante.*, 
			 (select descripcion from Unidad where id = usuario_dante.Unidad1 ) as 'Unidad1', 
			 (select descripcion from Unidad where id = usuario_dante.Unidad2 ) as 'Unidad2', 
			 (select descripcion from Unidad where id = usuario_dante.Unidad3 ) as 'Unidad3' 
			 from usuario_dante WHERE fecha BETWEEN '%s' AND '%s' ",$fecha1,$fecha2);

			$result = $db->getAll($query2);

			//die($query2);
			
			//Verificamos que hayan resultados
			if(count($result) == 0)
			{
				$mensaje = "No hay resultados";
			}
			else
			{

				$objPHPExcel = new PHPExcel();

				$objPHPExcel
				->getProperties()
				->setCreator("Micrositios") // Nombre del autor
			    ->setLastModifiedBy("EJERCITO") //Ultimo usuario que lo modificó
			    ->setTitle("Reporte Excel DANTE") // Titulo
			    ->setSubject("Reporte Excel DANTE") //Asunto
			    ->setDescription("Reporte de Formularios registrados") //Descripción
			    ->setKeywords("reportes formularios ") //Etiquetas
			    ->setCategory("Reporte excel"); //Categorias

			    $tituloreporte = 'REPORTE DE FORMULARIOS DILIGENCIADOS';

			    $columnas = array('ID','NOMBRE','APELLIDO','IDENTIFICACIÓN','GRADO','UNIDAD1','UNIDAD2','UNIDAD3','FECHA DE REGISTRO');
			    //Agregamos los titulos para el reporte
			    $objPHPExcel->setActiveSheetIndex(0)
			    //->setCellValue('A1', $tituloreporte) // Titulo del reporte
			    ->setCellValue('A1',  $columnas[0])  //Titulo de las columnas
			    ->setCellValue('B1',  $columnas[1])
			    ->setCellValue('C1',  $columnas[2])
			    ->setCellValue('D1',  $columnas[3])
			    ->setCellValue('E1',  $columnas[4])
			    ->setCellValue('F1',  $columnas[5])
			    ->setCellValue('G1',  $columnas[6])
			    ->setCellValue('H1',  $columnas[7])
			    ->setCellValue('I1',  $columnas[8]);
				
			     $i = 1;
				 foreach ($result as $row ) 
				 { 
				 	$i = $i + 1;

				 	$objPHPExcel->setActiveSheetIndex(0)
				         ->setCellValue('A'.$i, $row['id'])
				         ->setCellValue('B'.$i, $row['Nombre'])
				         ->setCellValue('C'.$i, $row['Apellido'])
				         ->setCellValue('D'.$i, $row['identificacion'])
				         ->setCellValue('E'.$i, $row['Grado'])
				         ->setCellValue('F'.$i, $row['Unidad1'])
				         ->setCellValue('G'.$i, $row['Unidad2'])
				         ->setCellValue('H'.$i, $row['Unidad3'])
				         ->setCellValue('I'.$i, $row['fecha']);
				 }

				 for($i = 'A'; $i <= 'H'; $i++)
				 {
    				$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
				 }

				// Se asigna el nombre a la hoja
				$objPHPExcel->getActiveSheet()->setTitle('Reporte Formularios');
				 
				// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
				$objPHPExcel->setActiveSheetIndex(0);
				 
				// Inmovilizar paneles
				//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
				$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,2);

				// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Cache-Control: max-age=0');
				 
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

				ob_end_clean();
				header('Content-Disposition: attachment;filename="ReporteFormularios.xlsx"');

				$objWriter->save('php://output');

				exit;
			}
		}
		else
		{
				$mensaje = "Formato de fecha no valido";
		}
		
	}
	else
	{
		$mensaje = "La fecha 1 debe ser menor a la fecha 2";
	}
	
}



$smarty->assign('mensaje',$mensaje);
$smarty->assign('datos',$result);
return $smarty->fetch('tpl_datos_dante.html');
}
else
{
	echo '<script>alert("Debe de ser editor para acceder a esta secci&oacute;n")
			location.href="https://www.ejercito.mil.co";
		  </script>';


}



?>