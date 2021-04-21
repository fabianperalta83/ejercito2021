<?
	extract($_REQUEST);
	$ejercito_correo = "webejercito@gmail.com";
	$cabeceras = "From: contactenos@ejercito.mil.co\r\nContent-type: text/html\r\n";
	$contenido_mensaje = "<fieldset><legend>Información del mensaje</legend><table align='center'><tr><td>Para: </td><td>".$para."</td></tr><tr><td>Unidad: </td><td>".$unidad."</td></tr><tr><td>Mensaje: </td><td>".$mensaje."</td></tr><tr><td>Remitente: </td><td>".$remitente."</td></tr><tr><td>Email: </td><td>".$email."</td></tr><tr><td>Ciudad: </td><td>".$ciudad."</td></tr></table></fieldset>";
	mail($ejercito_correo, "Sección escríbele a un soldado", $contenido_mensaje, $cabeceras);
	echo utf8_encode("El correo fué enviado correctamente!");
?>