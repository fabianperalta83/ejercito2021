<?
/*
* Este archivo permite modificar ciertas constantes de sitio. Esto se realiza por que todo el home las nuevas paginas de ejercito
* se configiran por medio de estas constantes.
* este archivo siempre para que funcione perfectamente debe ir instaldo creando una categoria en el home de cada pagina.
*/
require_once(_DIRINCLUDE."constantes/_config/constantes.php");
//global $smartyApp;
global $idcategoria;
global $db;
//valido si hay session

if(isset($_SESSION['info_usuario']))
{
	if($_SESSION['info_usuario']['idzona'] == 9 || $_SESSION['info_usuario']['idzona'] == 2)
	{
		//traigo el padre de la categoria donde estoy parado
		
		$consulta	=	sprintf("SELECT * FROM categoria WHERE idcategoria=(SELECT idpadre FROM categoria WHERE idcategoria='%s')",$idcategoria);
		$resultado	=	$db->Execute($consulta);
		
		
		//debo buscar las constantes que necesito ´para reemplazarlas
		//$resultado->fields['varsubsitio'] = ereg_replace('(array("n"=>"_FOTONOTICIA","v"=>")+[0-9,]','<b>array("n"=>"_FOTONOTICIA","v"=>"</b>',$resultado->fields['varsubsitio']);
		
		//echo $resultado->fields['varsubsitio'];
		
		
		$arreglo=stringtoarray($resultado->fields['varsubsitio']);
		
		//paso a smarty el resultado capturado
		$arreglo_info	=	array();
		
		$constantes_permitidas['constante']	=	'_FOTONOTICIA';
		$constantes_permitidas['constante']	=	'__EVENTOS';
		$constantes_permitidas['constante']	=	'__HISTORIA';
		$constantes_permitidas['constante']	=	'__DIVISIONES_EJERCITO';
		$constantes_permitidas['constante']	=	'__RECOMENDADOS';
		$constantes_permitidas['constante']	=	'__LATERAL_DERECHO_1';
		$constantes_permitidas['constante']	=	'__IMAGENES';
		$constantes_permitidas['constante']	=	'__ESCUELAS';
		$constantes_permitidas['constante']	=	'__LADOFOTONOTICIA';
		$constantes_permitidas['constante']	=	'__TELEVISOR';
		
		/*
		* 	este arreglo me permite enviar el nombre de la contante, el valor que contendra y si la caja de texto se pintara activa o inactiva
		* 	tambien me dira el comportamiento que usara a la hora de guardar el dato, esto se usara para validar que venga con la sintaxis correcta.
		*	tipo 1 = tipo home separado con  comas (34343434#2#2,34343434#4#5)
		*	tipo 2 = tipo home sin comas	(232333#2#2)
		*	tipo 3 = tipo separado por comas(22323,232323,2332323)
		*	tipo 4 = tipo normal, este tipo no permite ni comas ni ningun simbolo (34343434)
		*/
		
		foreach($arreglo as $datos)
		{
			
			if($datos['n']=='_FOTONOTICIA')
			{
				//echo $datos['v'];
				$arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'true',
									  'tipo'=>'3');
				array_push($arreglo_info,$arreglo_datos);
			}
			if($datos['n']=='__EVENTOS')
			{
				//echo $datos['v'];
				$arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'false',
									  'tipo'=>'2');
				array_push($arreglo_info,$arreglo_datos);
			}
			if($datos['n']=='__HISTORIA')
			{
				//echo $datos['v'];
				$arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'false',
									  'tipo'=>'2');
				array_push($arreglo_info,$arreglo_datos);
			}
			if($datos['n']=='__DIVISIONES_EJERCITO')
			{
				//echo $datos['v'];
				$arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'false',
									  'tipo'=>'2');
				array_push($arreglo_info,$arreglo_datos);
			}
			if($datos['n']=='__RECOMENDADOS')
			{
				//echo $datos['v'];
				$arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'false',
									  'tipo'=>'2');
				array_push($arreglo_info,$arreglo_datos);
			}
			if($datos['n']=='__LATERAL_DERECHO_1')
			{
				//echo $datos['v'];
				$arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'false',
									  'tipo'=>'1');
				array_push($arreglo_info,$arreglo_datos);
			}
			if($datos['n']=='__IMAGENES')
			{
				//echo $datos['v'];
				$arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'false',
									  'tipo'=>'2');
				array_push($arreglo_info,$arreglo_datos);
			}
			if($datos['n']=='__ESCUELAS')
			{
				//echo $datos['v'];
				$arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'false',
									  'tipo'=>'2');
				array_push($arreglo_info,$arreglo_datos);
			}
			if($datos['n']=='__LADOFOTONOTICIA')
			{
				//echo $datos['v'];
				$arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'false',
									  'tipo'=>'2');
				array_push($arreglo_info,$arreglo_datos);
			}
			if($datos['n']=='__TELEVISOR')
			{
				//echo $datos['v'];
				$arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'true',
									  'tipo'=>'4');
				array_push($arreglo_info,$arreglo_datos);
			}
			/** FUNCIONES NUEVAS PAGINA INGENIEROS **/
			
			if($datos['n']=='__TRANSPARENCIA')
			{
			   //echo $datos['v'];
			   $arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'true',
									  'tipo'=>'4');
				array_push($arreglo_info,$arreglo_datos);
			
			}
			
			if($datos['n']=='__OBRAS')
			{
			   
			   //echo $datos['v'];
			   $arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'true',
									  'tipo'=>'4');
			   array_push($arreglo_info,$arreglo_datos);
			
			}
			
			if($datos['n']=='__ATENCIONDESASTRE')
			{
			
			  //echo $datos['v'];
			   $arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'true',
									  'tipo'=>'4');
			   array_push($arreglo_info,$arreglo_datos);
			
			}
			
			if($datos['n']=='__AMBIENTAL')
			{
			  
			  //echo $datos['v'];
			   $arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'true',
									  'tipo'=>'4');
			   array_push($arreglo_info,$arreglo_datos);
			
			}
			if($datos['n']=='__DESMINADO')
			{
			
			  //echo $datos['v'];
			   $arreglo_datos =array('constante'=>$datos['n'],
									  'valor'=>$datos['v'],
									  'activo'=>'true',
									  'tipo'=>'4');
			   array_push($arreglo_info,$arreglo_datos);
			
			}
			
		
		}
		
		
		//valido si se presiono el boton guardar
		if(isset($_POST['guardar']))
		{
			//recorro el post
			foreach($_POST as $llave=>$info)
			{
			//echo $_POST['tipo'][$cont]."<br>";
				if($llave !='guardar')
				{
					if($llave != 'idcategoria')
					{
						$expresion_regular	 =	'array{0,1}[(]{0,1}("){0,1}(n){0,1}("){0,1}(=>")';
						$expresion_regular	.=	'('.$llave.')';
						$expresion_regular	.=	'(","v"=>")[0-9a-zA-Z,#"]+("){0,1}[)]';
						//echo $info."<br>";
						//echo $expresion_regular."<br>";
						$cambio	=	'array("n"=>"'.$llave.'","v"=>"'.$info.'")';
						$resultado->fields['varsubsitio'] = ereg_replace($expresion_regular,$cambio,$resultado->fields['varsubsitio']);
					}
				}
				
			}
			//var_dump($errores);
			//echo $resultado->fields['varsubsitio'];
			//realizo el update del subsitio con la nueva configuracion
			$actualizacion	=	sprintf("UPDATE categoria SET varsubsitio='%s' WHERE idcategoria=%s",$resultado->fields['varsubsitio'],$resultado->fields['idcategoria']);
			$resultado_actualizacion	=	$db->Execute($actualizacion);
		}

	$smartyApp->assign('info_cajas',$arreglo_info);
	}
	else
	{
		header("location:index.php?idcategoria=1");	
	}
	
}
else
{
	header("location:index.php?idcategoria=1");
}
$resultado_pagina=$smartyApp->fetch('constantes_sitio.html');
return $resultado_pagina;
?>