<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of libreta_mil_validaciones
 *
 * @author ajacosta
 */
class libretaMilValidaciones {

	public static function guardarErrorSoap( &$db, $uriwsdl, $mensaje, $idusuario = null )
	{
		$t = time();
		$strInsert = "INSERT INTO err_soap (uriwsdl, mensaje, fecha, hora".(!is_null($idusuario)?", idusuario":"").")"
				." VALUES ('$uriwsdl', '$mensaje', '".date("Y-m-d", $t)."', '".date("H:i:s", $t)."'".(!is_null($idusuario)?", '$idusuario'":"").")";
		
		if ($db->Execute($strInsert) === false) {
			// echo $strInsert."<br>";
			print 'error al insertar: '.$db->ErrorMsg().'<br/>';
			return false;
		}

		return true;
	}
	
	public static function validarXArreglos( $arregloDatos, $arregloValidaciones, &$errores, $validarSoloTipos = false )
	{
		$arregloValidado = array();

	//		foreach ($arregloValidaciones as $key => $arregloValidacion) {
		foreach ($arregloDatos as $key => $value) {
			$arregloValidacion = array();
//			echo "KEY[$key]<br>";
			$value = utf8_decode($value);
			$valorRequest = Autenticacion::secureSQL( $value );
			$arregloValidado[$key] = $valorRequest;
			if( isset($arregloValidaciones[$key]) && is_array($arregloValidaciones[$key]) && count($arregloValidaciones[$key])>0 )
			{
				$arregloValidacion = $arregloValidaciones[$key];

				if( isset($arregloValidacion['td']) && $arregloValidacion['td'] == 'CHECKBOX' )
				{
					if( isset($arregloDatos[$key]) )
						$arregloValidado[$key] = "1"; // true
					else
						$arregloValidado[$key] = "0"; // false
				}

	//				if( isset($arregloValidacion['td']) && $arregloValidacion['td'] == 'RADIO_SI_NO' )
	//				{
	//					if( isset($arregloDatos[$key]) && $arregloDatos[$key] != "" )
	//						$arregloValidado[$key] = "1"; // true
	//					else
	//						$arregloValidado[$key] = "0"; // false
	//				}

				if( !$validarSoloTipos && isset($arregloValidacion['o']) && $arregloValidacion['o'] === true )
				{
					// Obligatorio
					if( $valorRequest === "" )
					{
						$errores[] = $arregloValidacion['msgO'];
					}
					elseif( isset ($arregloValidacion['tv']) )
					{
						switch ($arregloValidacion['tv']) {
							case "TEXT":
									if( !Validacion::isTexto($valorRequest) )
										$errores[] = $arregloValidacion['msgT'];
								break;
							case "GEL_primerNombre":
									$reg = "^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ]{2,20}$";
									if( !Validacion::isCustom($valorRequest, $reg) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "GEL_segundoNombre":
									$reg = "^[a-zA-ZáéíóúÁÉÍÓÚñÑ\süÜ]{2,30}$";
									if( !Validacion::isCustom($valorRequest, $reg) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "GEL_primerApellido":
									$reg = "^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ]{2,30}$";
									if( !Validacion::isCustom($valorRequest, $reg) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "GEL_segundoApellido":
									$reg = "^[a-zA-ZáéíóúÁÉÍÓÚñÑ\süÜ]{2,30}$";
									if( !Validacion::isCustom($valorRequest, $reg) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "RH":
									if( trim($valorRequest)!="POSITIVO" && trim($valorRequest)!="NEGATIVO" )
										$errores[] = $arregloValidacion['msgT'];
								break;
							case "NUMERIC":
									if( !Validacion::isNum($valorRequest) )
										$errores[] = $arregloValidacion['msgT'];
								break;
							case "EMAIL":
									if( !Validacion::isEmail($valorRequest) )
										$errores[] = $arregloValidacion['msgT'];
								break;
							case "URL":
									if( !Validacion::isURL($valorRequest) )
										$errores[] = $arregloValidacion['msgT'];
								break;
							case "DATE":
									if( !Validacion::isDate($valorRequest) )
										$errores[] = $arregloValidacion['msgT'];
								break;
							default:
								break;
						}
					}
				}else
				{
					// Opcional
					if( $valorRequest !== "" && isset ($arregloValidacion['tv']) )
					{
						switch ($arregloValidacion['tv']) {
							case "TEXT":
									if( !Validacion::isTexto($valorRequest) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "GEL_primerNombre":
									$reg = "^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ]{2,20}$";
									if( !Validacion::isCustom($valorRequest, $reg) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "GEL_segundoNombre":
									$reg = "^[a-zA-ZáéíóúÁÉÍÓÚñÑ\süÜ]{2,30}$";
									if( !Validacion::isCustom($valorRequest, $reg) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "GEL_primerApellido":
									$reg = "^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ]{2,30}$";
									if( !Validacion::isCustom($valorRequest, $reg) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "GEL_segundoApellido":
									$reg = "^[a-zA-ZáéíóúÁÉÍÓÚñÑ\süÜ]{2,30}$";
									if( !Validacion::isCustom($valorRequest, $reg) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "RH":
									if( trim($valorRequest)!="POSITIVO" && trim($valorRequest)!="NEGATIVO" )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "NUMERIC":
									if( !Validacion::isNum($valorRequest) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "EMAIL":
									if( !Validacion::isEmail($valorRequest) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "URL":
									if( !Validacion::isURL($valorRequest) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							case "DATE":
									if( !Validacion::isDate($valorRequest) )
									{
										$errores[] = $arregloValidacion['msgT'];
									}
								break;
							default:
								break;
						}
					}
				}
			}
		}
		return $arregloValidado;
	}
	
}

?>