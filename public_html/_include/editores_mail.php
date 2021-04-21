<?php
$editores 	= array();
$idzona 	= 2;
$cont		= 0;
//consulto los editores que existan
$sql_editor 	= sprintf("SELECT * FROM %s WHERE idzona = %s",_TBLUSUARIO,$idzona);
$info_sql	   	= $db->Execute($sql_editor) or errorQuery(__LINE__, __FILE__) ;

if($info_sql->NumRows() > 0)
{
	//recorro los datos y los guardo en un array
	while(!$info_sql->EOF)
	{
		array_push($editores,$info_sql->fields);
		$info_sql->MoveNext();
	}

}
//recorro el array de editores
foreach($editores as $dato)
{


	
	//armo el correo
	$para = $dato['email'];
	$asunto= "Procedimiento para la restauración de la contraseña de acceso al portal del Ejército Nacional de Colombia ";
	$mensaje  = "El Portal Web del Ej&eacute;rcito Nacional de Colombia cuenta con un mecanismo de restauraci&oacute;n de contrase&ntilde;a que le permite definir
				 de nuevo su contraseña cuando esta ha sido olvidada. El procedimiento para hacer uso de esta funcionalidad es el siguiente.
				 <br><br>";
	$mensaje .= "1. Ingresar a la opci&oacute;n <b>registro</b> que se encuentra ubicado en la parte superior de la p&aacute;gina. <br>";
	$mensaje .= "2. Digitar su correo electr&oacute;nico (el que tiene registrado en su cuenta de usuario) en el campo <b>e-mail</b>.<br>";
	$mensaje .= "3. Hacer clic sobre el bot&oacute;n Recordar mis datos. <br>";
	$mensaje .= "En este momento el sistema le enviar&aacute; a su correo electr&oacute;nico un v&iacute;nculo con el cual podr&aacute; definir una nueva contrase&ntilde;a para su cuenta
				y de esta forma podr&aacute; acceder de nuevo con su cuenta de usuario del portal.
				 <br>";
	$p4 = "From:"."noresponder@ejercito.mil.co"."\r\nContent-Type:text/html";
	$p6 = "migracion.php";
	//echo $para;
	//echo "<hr>";
	$cont ++;
	Funciones :: microsmail($para,$asunto,$mensaje,$p4,$p6,$p7='');

}

$registro=count($editores);
echo $cont;
echo "<hr>";
echo $registro;

?>
