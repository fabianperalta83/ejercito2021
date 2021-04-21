<?php

require_once(_DIRLIB.'Twitter.class.php');

if( isset($_REQUEST['categoriatweet']) ){				
	$categoria = Funciones::obtenerInfoCategoria($_REQUEST['categoriatweet']); //Extre los datos de la categoria a tuitear
	$titulo=$categoria[$_REQUEST['categoriatweet']]['nombre'];
	$tweet=$titulo." http://www.ejercito.mil.co/index.php?idcategoria=".$_REQUEST['categoriatweet'];		
			
	return 
	"<form>
		<input type='text' name='tweet' size=140 maxlength=140 value='$tweet'>
		<br/><br/>
                <center>
		<input type=submit name='enviar' value='Enviar a twitter'>
		<input type='hidden' name='idcategoria' value='".$_REQUEST['idcategoria']."'>
		<input type='hidden' name='categoriaback' value='".$_REQUEST['categoriatweet']."'>
                </center>
	</form>";
}
	
if( isset($_REQUEST['enviar']) ){	
        $tweet = new Twitter("ejercito_col", "colombia2010."); //hay que mirar la forma de no guardar esta clave en texto plano
		
	$success = $tweet->update($_REQUEST["tweet"]);
	
	if ($success)
		$message="El tweet se envio con exito";
	else
		$message="Hubo un error en el envio del tweet: ".$tweet->error;	
		
	return $message." <center><a href='http://www.ejercito.mil.co/index.php?idcategoria=".$_REQUEST['categoriaback']."'>Volver</a></center>";		
}

?>