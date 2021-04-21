<?php

/* Incluye los archivos requeridos para conectarse a la base de datos */
/*
require_once('../_config/constantes.php');
require_once(_DIRCORE.'Funciones.class.php');
require_once(_RUTABASE.'_config/variables.php');
*/
//capturo los datos que se van a pintar
$nombre		=	$_GET['nombre'];
$cedula		=	$_GET['cedula'];
$captcha	=	$_GET['codigo'];

function traduce_mes($mes)
{
	$fecha	=	'';
	switch($mes)
	{
		case '01':
		$fecha	=	"Enero";
		break;
		case '02':
		$fecha	=	"Febrero";
		break;
		case '03':
		$fecha	=	"Marzo";
		break;
		case '04':
		$fecha	=	"Abril";
		break;
		case '05':
		$fecha	=	"Mayo";
		break;
		case '06':
		$fecha	=	"Junio";
		break;
		case '07':
		$fecha	=	"Julio";
		break;
		case '08':
		$fecha	=	"Agosto";
		break;
		case '09':
		$fecha	=	"Septiembre";
		break;
		case '10':
		$fecha	=	"Octubre";
		break;
		case '11':
		$fecha	=	"Noviembre";
		break;
		case '12':
		$fecha	=	"Diciembre";
		break;
	}
	return $fecha;
}
$fecha_salida	=	"Bogot&aacute;, ".date("d")." de ". traduce_mes(date("m")). " de ". date("Y");

$mensaje	=	$fecha_salida."
                                                            
EL SUSCRITO JEFE DE LA JEFATURA DE RECLUTAMIENTO, CONVOCATORIAS Y POTENCIALES DEL EJÉRCITO (e )
<center><b>C E R T I F I C A</b></center>
Que el señor ".$nombre."  identificado con la cédula de ciudadanía No ".$cedula."  en CUMPLIMIENTO DE LA OBLIGACIÓN  DE DEFINIR LA SITUACIÓN  MILITAR  y de acuerdo a lo establecido en el Decreto 2150 / 95 artículo 111 le aplica lo siguiente:

“Los colombianos  hasta los 50 años de edad, están obligados a definir su situación militar. No obstante, las entidades públicas o privadas no podrán exigir a los particulares la presentación de la Libreta Militar, correspondiéndoles a esta la verificación el cumplimiento de esta obligación en coordinación con  la autoridad militar correspondiente únicamente para los siguientes efectos:

a)	Celebrar contratos con cualquier entidad pública.
b)	Ingresar a la carrera  administrativa.
c)	Tomar posesión de cargos públicos.
d)	Obtener grado profesional en cualquier centro docente de educación superior.”

Se expide la presente certificación a solicitud del interesado, no es válida para demostrar tiempo de servicio ni  el tiempo de  derecho a pensión  en ninguna institución.

Atentamente,";
//ahora se pintara el formato
?>
<table width="631px" style="background:url(../recursos_user/tramite/fondo.jpg) no-repeat 70px 200px">
	<tr>
		<td>
			<img src="../recursos_user/tramite/cabezote.jpg">
		</td>
	</tr>
	<tr>
		<td>
			<?
				echo nl2br($mensaje);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<img src="../recursos_user/tramite/firma.gif">
		</td>
	</tr>
	<tr>
		<td>
			Para verificar la autenticidad del certificado dirijase a la pagina web www.ejercito.mil.co y en la seccion se tramites y servicios encontrara la opci&oacute;n de verificaci&oacute;n certificado donde lo podra verificar con el siguente codigo <b><?echo $captcha?></b>
		</td>
	</tr>
	<tr>
		<td>
			<img src="../recursos_user/tramite/pie.jpg">
		</td>
	</tr>
</table>
<script>
	window.onload=print();
</script>