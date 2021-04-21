<?
require_once('../_config/constantes.php');
require_once(_DIRCORE.'Funciones.class.php');
require_once(_RUTABASE.'_config/variables.php');
//llavo la variable de conexion a la base de datos
global $db;
$status = "";
$action	=(isset($_POST["action"]))?$_POST["action"] :'';
if ($action == "upload") {
    // obtenemos los datos del archivo 
    $tamano 		= $_FILES["archivo"]['size'];// tamaño
    $tipo 			= $_FILES["archivo"]['type'];//tipo
    $archivo		= $_FILES["archivo"]['name'];//nombre
    $nuevo_nombre	="imgBanner".date("YmdHis");
	$tipo_banner	=	$_POST['tipo_banner'];
	$sitio			=	$_POST['sitio'];
	$idcategoria	=	$_POST['idcategoria'];
	
	$extencion		=	'';
    switch ($tipo )
    {
    	case 'image/jpeg':
    		$extencion	='jpg';
    		break;
    	case 'image/png':
    		$extencion	='png';
    		break;
    	case 'image/gif':
    		$extencion	='gif';
    		break;
		case 'application/x-shockwave-flash':
    		$extencion	='swf';
    		break;	
    }

    if($nuevo_nombre == '')
    {
    	$prefijo	=  $archivo	= $_FILES["archivo"]['name'];//nombre
    }
    else
    {
    	$prefijo	=	$nuevo_nombre.".".$extencion;
    }

	//capturo el directorio a examinar
	$dir	=	"../".$_POST['plantilla'];
	//asigno la ruta donde se subira la imagen
	$destino =  $dir.$prefijo; 
	if ($archivo != "")
	{
		//valido si el directorio existe, si es asi procedenormalmente
		if(is_dir($dir))
		{
			if(copy($_FILES['archivo']['tmp_name'],$destino))
			{ 
				//realizo la insercion a la base de datos del cabezote nuevo
				$insercion		=	sprintf("INSERT INTO banners (idcategoria,tipo,banner) VALUES ('%s','%s','%s')",$sitio,$tipo_banner,$prefijo);
				//resultado insercion	
				$resultado		=	$db->Execute($insercion);
				echo "<table align='center' style='background:#F3F1F2;border:1px solid #000'>
						<tr>
							<td>
								<div style='color:#000'>
									La imagen <b>".$prefijo." </b>ha sido cargada con exito
								</div>
							</td>
						</tr>
					</table>";
					//header("location:index.php?idcategoria=$sitio&nuevo=$sitio&tipo=$tipo_banner");
					
	        }
	        else
	        {
	           
				echo "<table align='center' style='background:#fff;border:1px solid #000'>
						<tr>							
							<td>
								<div style='color:#000' valign='middle'>
									 Error al subir el archivo <b>".$prefijo.". </b>
								</div>
							</td>
						</tr>
					</table>";
	        }
		}//crea el directorio
		else
		{
			if(mkdir($dir,'0775',true))
			{
				chmod($dir, 0777); 
				if(copy($_FILES['archivo']['tmp_name'],$destino))
				{ 
					//realizo la insercion a la base de datos del cabezote nuevo
					$insercion		=	sprintf("INSERT INTO banners (idcategoria,tipo,banner) VALUES ('%s','%s','%s')",$sitio,$tipo_banner,$prefijo);
					//resultado insercion	
					$resultado		=	$db->Execute($insercion);
					echo "<table align='center' style='background:#F3F1F2;border:1px solid #000'>
							<tr>
								<td>
									<div style='color:#000'>
										La imagen <b>".$prefijo." </b>ha sido cargada con exito
									</div>
								</td>
							</tr>
						</table>";
						//header("location:index.php?idcategoria=$sitio&nuevo=$sitio&tipo=$tipo_banner");
						
				}
				else
				{
				   
					echo "<table align='center' style='background:#fff;border:1px solid #000'>
							<tr>							
								<td>
									<div style='color:#000' valign='middle'>
										 Error al subir el archivo <b>".$prefijo." </b>
									</div>
								</td>
							</tr>
						</table>";
				}
			}
			else
			{
				echo "<table align='center' style='background:#fff;border:1px solid #000'>
							<tr>							
								<td>
									<div style='color:#000' valign='middle'>
										 No se pudo crear el directorio <b>".$dir.". </b>
									</div>
								</td>
							</tr>
						</table>";
			}
		}
    }
    else
    {
        echo "<table align='center'>
				<tr>
					<td>
						<div style='color:#000' valign='left'>
							Debe seleccionar un archivo!!
						</div>
					</td>
				</tr>
				<tr>
			</table>";
    }
} 
?>

