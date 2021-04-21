<?

// for mailing
require(_DIRLIB."PHPMailer_v5.1/class.phpmailer.php");
require(_DIRLIB."PHPMailer_v5.1/class.smtp.php");

global $db;

if( !isset($_REQUEST['submit']) ){
	$smarty = new Smarty_Plantilla;
	$smarty->assign('idcategoria',$idcategoria);
	return $smarty->fetch('tpl_amigos_enviar_correo.html');
} else {
	//Este script va a correr hasta que termine de enviar todos los correos (no tiene limites de tiempo)
	set_time_limit(0);

	$smarty = new Smarty_Plantilla;	
	$query = "SELECT * FROM amigos ORDER BY id";
	$resultado = $db->Execute($query);
	$errores="";
	while(!$resultado->EOF){			
		$mail = new PHPMailer();
		$mail->From = 'contactenos@ejercito.mil.co';
		$mail->FromName = "Contactenos";
		$mail->AddAddress($resultado->fields['email']);

		if ($_FILES['adjunto']['error'] === UPLOAD_ERR_OK)
		  $mail->AddAttachment($_FILES['adjunto']['tmp_name'], $_FILES['adjunto']['name']);

		$mail->IsHTML(true);

		$mail->Subject = $_REQUEST['asunto'];
		
		$smarty->assign('mensaje',$_REQUEST['mensaje']);
		$mail->Body = $smarty->fetch('tpl_amigos_enviar_correo_diseno.html');

		if(!$mail->Send()){
			$errores=$errores."Ocurrio un error al enviar el correo a ".$resultado->fields['email']." ".$mail->ErrorInfo."<br>";
		}
		$resultado->MoveNext();
	}
	
	if($errores=="")
		$html="Todos los correos se enviaron exitosamente";
	else
		$html=$errores;
	
	$smarty2 = new Smarty_Plantilla;
	$smarty2->assign('html',$html);
	return $smarty2->fetch('tpl_amigos_enviar_correo2.html');
}

?>