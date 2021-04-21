<?php
//ini_set('display_errors', '1');
require_once("_config/constantes.php"); //CARGA LAS CONSTANTES DEL PORTAL
require_once(_DIRCORE . "Funciones.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once("_config/variables.php"); // CARGA LAS VARIABLES DEL PORTAL
require_once("_config/autenticacion.php"); // AUTENTICA EL USUARIO EN EL PORTAL
require_once(_DIRLIB_ADMIN . "Smarty.class.php");
require_once(_DIRCORE . 'Validacion.class.php');
$smarty = new Smarty_Plantilla;

global $db;
/* traer los puntos para marcar en el mapa */


$idpadre = _SECCION_DIRECTORIO_TELEFONICO;
$query_get_puntos 		= sprintf("SELECT nombre, antetitulo, entradilla, subtitulo, imagen from %s WHERE idpadre = %s AND activa != 0 ", _TBLCATEGORIA, $idpadre);
$result_query_puntos 	= $db->GetAll($query_get_puntos);

$array_obj_puntos = [];

if($result_query_puntos != "")
{
	foreach ($result_query_puntos as $obj) 
	{
		$nombre 			= 		$obj["nombre"];
		$antetitulo 		= 		$obj["antetitulo"];
		$imagen	 		= 		$obj["imagen"];
		
		if  ($imagen == "")
		{
			$imagen	 		= 		"https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTSAEZ5wP5Om4yyTPam1M0yJVTHXRJ6Z5IgqYg_iA1UlEQYjMRx0A";
		}
		else
		{
			$imagen	 		= 		"recursos_user/imagenes//".$obj["imagen"];
		}
		
		$contenido		=		explode(",", $obj["entradilla"]);
		$direccion 		= 		$contenido[0];
		$correo			= 		$contenido[1];
		$telefono			= 		$contenido[2];
		$celular			= 		$contenido[3];
		$otros				= 		$contenido[4];
				
 		$array_obj_puntos[] = 	array
		(
			'nombre' 		=> $nombre,
			'antetitulo' 	=> $antetitulo,
			'direccion' 	=> $direccion,
			'correo' 		=> $correo,
			'telefono' 	=> $telefono,
			'celular'		=> $celular,
			'otros' 			=> $otros,
			'imagen' 		=> $imagen
		);
	}
}
else
{
	$json_puntos = "empty";
}

for ($i = 0; $i < count($array_obj_puntos); $i++) 
{  
	if ($i == 0)
	{
		$retornar = 
		'
			<div class="class_segun_tamano col-md-4 col-lg-4 col-sm-4 col-xs-4">
				<div class="contact-box">
					<div class="col-sm-4">
						<div class="text-center">
							<center><img alt="image" class="m-t-xs img-responsive" src="'.$array_obj_puntos[$i]["imagen"].'"><br>
							<div class="m-t-xs font-bold">'.$array_obj_puntos[$i]["antetitulo"].'<center></div>
						</div>
					</div>
					<div class="col-sm-8">
						<h3><strong>'.$array_obj_puntos[$i]["nombre"].'</strong></h3>
						<p><i class="fa fa-map-marker">'.$array_obj_puntos[$i]["direccion"].'</i></p>
						<address>
							<strong>'.$array_obj_puntos[$i]["correo"].'</strong><br>
							<abbr title="Phone"></abbr>'.$array_obj_puntos[$i]["telefono"].'<br>
							<abbr title="Phone"></abbr>'.$array_obj_puntos[$i]["celular"].'<br>
							'.$array_obj_puntos[$i]["otros"].'
						</address>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		';
	}
	else
	{
		$retornar .= 
		'
			<div class="class_segun_tamano col-md-4 col-lg-4 col-sm-4 col-xs-4">
				<div class="contact-box">
					<div class="col-sm-4">
						<div class="text-center">
							<center><img alt="image" class="m-t-xs img-responsive" src="'.$array_obj_puntos[$i]["imagen"].'"><br>
							<div class="m-t-xs font-bold">'.$array_obj_puntos[$i]["antetitulo"].'<center></div>
						</div>
					</div>
					<div class="col-sm-8">
						<h3><strong>'.$array_obj_puntos[$i]["nombre"].'</strong></h3>
						<p><i class="fa fa-map-marker">'.$array_obj_puntos[$i]["direccion"].'</i></p>
						<address>
							<strong>'.$array_obj_puntos[$i]["correo"].'</strong><br>
							<abbr title="Phone"></abbr>'.$array_obj_puntos[$i]["telefono"].'<br>
							<abbr title="Phone"></abbr>'.$array_obj_puntos[$i]["celular"].'<br>
							'.$array_obj_puntos[$i]["otros"].'
						</address>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		';
	}
}

$json_puntos = $retornar;
$smarty->assign('json_puntos'    ,$json_puntos);
return $smarty->fetch('tpl_directorio_telefonico.html');

?>