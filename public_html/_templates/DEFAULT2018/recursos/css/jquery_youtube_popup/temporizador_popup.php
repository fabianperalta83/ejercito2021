<?php
	
	class comprobar_temporizador
	{

		function class_validar_temporizador()
		{
				
            $exibirModal = 1;
            // if(!isset($_COOKIE["mostrarModal"]))
            // {
            //     $expirar = 1200; 
            //     setcookie('mostrarModal', 'SI', (time() + $expirar), "/", _URL, TRUE, TRUE); 
            //     $exibirModal = 1;
            // }
			
			$retornar = array($exibirModal);
			return $retornar;
			exit();		
		}
		
	}
	
	switch ($_POST["funcion"]) 
	{
		case 1:		
			$class_validar_temporizador = new comprobar_temporizador();
			$validar = $class_validar_temporizador->class_validar_temporizador();
			echo json_encode($validar);
			break;
	}
?>