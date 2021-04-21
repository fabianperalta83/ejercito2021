<?php
	require_once("_config/constantes.php");
	require_once(_DIRLIB_ADMIN."Comprobante.class.php");
	require_once(_DIRLIB_ADMIN."Smarty.class.php");

	define('MICRO_WORKDIR',_RUTABASE._DIRRECURSOS_USER.'unzip/');
	
	set_time_limit(0);
	
	$unComprobante=new Comprobante();	

	if(isset($_REQUEST['hash'])){
		$hash_proc=explode('@',$_REQUEST['hash']);
		if(count($hash_proc)==2){
			return $unComprobante->verificarComprobante($hash_proc[0],$hash_proc[1]);
		}
		else{
			return $unComprobante->errorCmp('No se encontro el comprobante indicado');
		}
	}
	elseif(isset($_SESSION['info_usuario'])){
		return $unComprobante->procesarConsulta($_SESSION['info_usuario']['identificacion']);
	}
	else{
		return $unComprobante->errorCmp('Debe logearse en el sistema para obtener su comprobante');
	}

?>