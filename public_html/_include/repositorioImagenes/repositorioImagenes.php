<?php
// Désactiver le rapport d'erreurs
error_reporting(0);
require_once(_DIRINCLUDE."repositorioImagenes/_config/"."constantes.php");
require_once($dircore."uploadImagen.class.php");
require_once($dircore."categoria.class.php");
require_once(_DIRCORE."Validacion.class.php");
$salida = "";
$salida = flujoComportamiento($smartyApp);
return $salida;


/*** Verificamos que si haya aceptado terminos y condiciones */
if (!isset($_SESSION['condiciones']) or  $_SESSION['condiciones'] != true)
{
	header("Location:index.php?idcategoria=$CAT_ADVERTENCIA");
}



/* *****************************************************************
               * COMPORTAMIENTO  DE LA APLICACION  *              */

function flujoComportamiento(&$smartyApp)
{ global $CAT_PUBLICACIONCORRECTA;
  $quien = $_SESSION['info_usuario']['nombres'] ." ".$_SESSION['info_usuario']['apellidos'];
  $smartyApp->assign("nombreUsuario",$quien);
  
  if ((!isset($_POST['enviar'])))
  {
	//Mostrar formulario - recien entramos a la aplicacion
	
	return $smartyApp->fetch("tpl_nuevaImagen.html");
  }
  else  //Usuario Envio formulario - procesar formulario
  {
  	 $resultado = AlmacenarCategoriaConImagen($smartyApp);
  
  	 if ($resultado)
  	 {
  	   //Procesamiento correcto - Mostrar template de todo correcto (convertir esto a una categor         ia común del portal.
  	   header("Location:index.php?idcategoria=$CAT_PUBLICACIONCORRECTA");
  	   /*exit(0);*/
  	   //return $smartyApp->fetch("tpl_adicionCorrecta.html");
  	 }
  	 else
  	 { 
  	   //Mostrar formulario - ahi errores;
  	   return $smartyApp->fetch("tpl_nuevaImagen.html");
  	 }
  }
  
  
}

/*                FIN COMPORTAMIENTO DE LA APLICACION
 ***************************************************************** */



	



	/*------------------------- 
	       FUNCIONES
	*/

function AlmacenarCategoriaConImagen(&$smartyApp)

{
	
	//msgError("iniciando procesamiento");
	$errores =array();
	
	
	$imagen = new uploadImagen();
	//Defimos la ruta donde se almacenara la imagen
	$imagen->rutaRelativa = 'aporteUsuarios/';//(defined("_DIR_IMG_APORTADAS"))?_DIR_IMG_APORTADAS:"";
	$imagen->ruta         = _RUTABASE._DIRIMAGES_USER.$imagen->rutaRelativa;
    
    //cargamos la info del archivo enviado por POST
	if      (!$imagen->cargarImgTemporal("archivo")){$errores[] = $imagen->error;}
	elseif  (!$imagen->chequearExtensionImagen())   {$errores[] = $imagen->error;}
	elseif  (!$imagen->chequearNombre())            {$errores[] = $imagen->error;}
	elseif  (!$imagen->almacenarImagen())           {$errores[] = $imagen->error;}
	
	

	$campos = definirCampos(); //Se definen los campos a almacenar 
	$categoriaImagen = new categoria($campos);
	$catImg = &$categoriaImagen; //un ALIAS
	
   
    //Verificamos que la imagen se haya almacenado correctamente
    $imagenBien = (empty($imagen->error)  && $imagen->estado == "almacenada");
	
	/** PROVENIENTES DEL USUARIO */
	$catImg->fechaImagen   = $_POST['fechaImagen'];
	$catImg->autor         = $_POST['autor'];
	$catImg->nombre        = $_POST['nombre'];
	$catImg->descripcion   = $_POST['descripcion'];
    $catImg->imagen        = ($imagenBien)?"/".$imagen->rutaRelativa.$imagen->nombreImagen:"";

    /* VALORES DEFINIDOS FIJOS */	
	$catImg->idpadre       = _CATEGORIA_PADREUPLOAD;
	$catImg->fechaCreacion = date("Y-m-d");
	$catImg->activa      = 0;
	//$catImg->iddisplay   = 12;

	// TODO :: refactoring 
	
	// Verificamos // Validamos que todos los campos sean correctos y si hay errores con la imagen
    $errores = array_merge($errores, validarCampos($catImg));
	 
    //msgError(print_r($_FILES,true)); 
	//asignamos el array de campos a la plantilla para poder reimprimirlos si existe error
	$smartyApp->assign("categoria",$catImg->campos);
	
	
	if (!empty($errores)) // Si hay errores 
	{
		// Mostrar Error;
		$showError = DecorarErrorConPlantilla($errores);
	    $smartyApp->assign('mensaje',$showError);
	    return false;	
	}
    // FIN  :: refactoring
	
    msgError("intentando almacenar");
	$resultado = $catImg->almacenar();
	if ( !$resultado )
    
	{ 

    }
    return true;
	
}

function definirCampos()
{
	$campos[] = array(
	         'nombre'     => "nombre",
	         'tipo'       => "isTexto",
	         'requerido'  => true,
	         'pordefecto' => "",
	         'nombreDB'   => "nombre",
	         'display'    => _IMAGEN_TITULO
	              );
	              
	$campos[] = array(
	         'nombre'     => "fechaCreacion",
	         'tipo'       => "",
	         'requerido'  => true,
	         'pordefecto' => "",
	         'nombreDB'   => "fecha1"
	              );
	              
	$campos[] = array(
	         'nombre'     => "fechaImagen",
	         'tipo'       => "",
	         'requerido'  => true,
	         'pordefecto' => "",
	         'nombreDB'   => "fecha2",
	         'display'    => _FECHA
	              );
	              
	$campos[] = array(
	         'nombre'     => "autor",
	         'tipo'       => "isTexto",
	         'requerido'  => true,
	         'pordefecto' => "",
	         'nombreDB'   => "autor",
	         'display'    => _NOMBRE_USUARIO
	              );
	              
	$campos[] = array(
	         'nombre'     => "descripcion",
	         'tipo'       => "isTexto",
	         'requerido'  => true,
	         'pordefecto' => "",
	         'nombreDB'   => "descripcion",
	         'display'    => _DESCRIPCION
	              );
	              
	$campos[] = array(
	         'nombre'     => "imagen",
	         'tipo'       => "",
	         'requerido'  => false,
	         'pordefecto' => "",
	         'nombreDB'   => "imagen"
	              );
	              
	$campos[] = array(
	         'nombre'     => "idcategoria",
	         'tipo'       => "",
	         'requerido'  => false,
	         'pordefecto' => "",
	         'nombreDB'   => "idcategoria"
	              );

	$campos[] = array(
	         'nombre'     => "idpadre",
	         'tipo'       => "",
	         'requerido'  => false,
	         'pordefecto' => "",
	         'nombreDB'   => "idpadre"
	              );
	              
$camposDefinitivos = array();	              
// Para que el indice del array no sea numerico sino corresponda al nombre del campo
foreach($campos as $campo)
$camposDefinitivos[$campo['nombre']] = $campo;

return $camposDefinitivos;
}				
		
/**
 * Recibe un mensaje de Error y lo decora con la plantilla html  predefinida devuelve el Error decorado con formato HTML para mostrar en pantalla. El resultado suele insertarse en otra página HTML.
 *
 * @param unknown_type $error
 * @return unknown
 */

function DecorarErrorConPlantilla($errores = array(), $plantilla = 'tpl_display_mensaje.html')
{   
	$smarty1 = new Smarty_Plantilla;
	$smarty1->assign('rotMensaje',_ROT_ADVERTENCIA);
	$smarty1->assign('tipo'      ,"error");
	$smarty1->assign('elementoMenu',$errores);
	$show = $smarty1->fetch($plantilla);
	return $show;
}

function validarCampos(&$categoria)
{
    $camposInvalidos = array();
    $errores = array();
    $metodosValidadores = get_class_methods('Validacion');
    
	foreach ($categoria->definicionCampos  as $key=>$defCampo)
	{   
		$errores = array();
        
		/* REVISAR SI EL CAMPO ES VALIDO */
        $resultadoValidacion = true;
        $tipoValidacion = (isset($defCampo['tipo']))?$defCampo['tipo']:"";
        
        if(!empty($tipoValidacion) && !Validacion::isEmpty($categoria->campos[$key]) )
            {   
            	/* si la funcion validadora no existe devuelve false como resultado de la validacion por seguridad*/
            	//msgError("validando");
            	if (in_array($tipoValidacion, $metodosValidadores))
            	    { $resultadoValidacion  =  Validacion::$tipoValidacion($categoria->campos[$key]);}
            	else{ $resultadoValidacion = false; }
            }
         
        /* CHEQUEAR SI EL CAMPO ESTA VACIO */
        $resultadoRequerido = true;
        // miramos si hay que chequear si el campo esta vacio
		$requerido = !(!isset($defCampo['requerido']) or ($defCampo['requerido'] == false) or empty($defCampo['requerido']) );
		
		if ($requerido){
			//msgError("requerido: {$categoria->campos[$key]}");
			$resultadoRequerido = !(Validacion::isEmpty($categoria->campos[$key]));}	
        
		
		// UNIMOS  el resultado de ambas validaciones 
		$esValido = ($resultadoValidacion and $resultadoRequerido); 
		
		//REVISAMOS si el campo paso la validacion o si empezamos a tener dolores de cabeza
		if ($esValido == false){ 
			
			if     ($resultadoValidacion == false){$error = buscarErrorPorValidacion($tipoValidacion);}
			elseif ($resultadoRequerido  == false){$error = buscarErrorPorValidacion("isEmpty");}
		    
			
		    $camposInvalidos[] = buscarMensajeError($error, $defCampo);
		    //$errores = 
		}		
		//msgError("$key   V:$resultadoValidacion  -- R: $resultadoRequerido","#77AAFF");       		
		        		
	}
	
	
	
	return $camposInvalidos;
/*$patternImage = "^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ .&_()/,;#-]+$";
		if (!empty($imagen_form) and !Validacion::isCustom($imagen_form, $patternImage)) {
			array_push($error, "La Imagen contiene caracteres no permitidos.");*/
}

function buscarErrorPorValidacion($tipoValidacion, $campoNombre = "")
{
	//$metodosValidadores = get_class_methods('Validacion');
	$prefijo = "_ERROR_";
	$nombreError = $prefijo.$tipoValidacion;
	return $nombreError;
}

function buscarMensajeError($error, $defCampo)
{   global $mensajeError;
    $campos = isset($defCampo['display'])?$defCampo['display']:$defCampo['nombre'];//implode(" ",$campos);
	
	return (isset($mensajeError[$error]))?$campos." ".$mensajeError[$error]:$campos." ".$mensajeError['default'];
}


?>