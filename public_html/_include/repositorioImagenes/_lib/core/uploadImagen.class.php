<?php

/**
 * @author  CLOPEZ Septiembre 2008
 * Clase imagen que emcapsula algunas tareas comunes cuando se envia una imagen
 * por medio de un formulario desde la página web.
 */
class uploadImagen
{
	public $nombreImagen;
	public $nombreSinExtension;
	public $ruta;
	public $rutaRelativa;
	public $_FILES_FILE;
	public $extension;
	public $estado;
	public $condicionDecorarNombre = true;
	public $extensionesValidas     = array('jpg','gif','png'); //Definimos las extensiones validas
	
	public $error;
	public $errores; //Lista de errores se definen en el constructor
	public $uploadErrors;
	
	function __construct()
	{
		$this->errores = array(
		                        0                       => "Formato Imagen Invalido",
		                        "ErrorFormatoInvalido"  => "Formato Imagen Invalido",
		                        1                       => "No se pudo Almacenar la Imagen, Reintente aportar la imagen o comunicquese con nuestro webmaster",
		                        "ErrorAlmacenamiento"   => "No se pudo Almacenar la Imagen, Reintente aportar la imagen o comunicquese con nuestro webmaster",
		                        2                       => "La Imagen contiene caracteres no permitidos.",
		                        "ErrorNombreCaracteres" => "La Imagen contiene caracteres no permitidos.",
		                        3                       => "Nombre de imagen no valido",
		                        "ErrorNombreInvalido"   => "Nombre de imagen no valido",
		                        4                       => "No se envio la imagen",
		                        "ErrorNombreInvalido"   => "No se envio la imagen"
		                        );
	
    $this->uploadErrors = array(
    UPLOAD_ERR_INI_SIZE   => 'El archivo excede el tamaño maximo  permitido por el servidor',
    UPLOAD_ERR_FORM_SIZE  => 'El archivo excede el tamaño maximo permitido por la forma de envio',
    UPLOAD_ERR_PARTIAL    => 'El archivo solo fue parcialmente transmitido',
    UPLOAD_ERR_NO_FILE    => 'No se transmitio ningun archivo, verifique que selecciono algun archivo para enviar',
    UPLOAD_ERR_NO_TMP_DIR => 'No se encontro directorio temporal para almacenar la imagen',
    UPLOAD_ERR_CANT_WRITE => 'No se pudo almacenar la imagen en el servidor',
    UPLOAD_ERR_EXTENSION  => 'Tipo de archivo no permitido',
);
	}
	
	
    function cargarImgTemporal($nombre = "archivo", $nuevoNombre ="")
    {
    	//Verificamos que la imagen haya llegado al servidor correctamente
    	$errorCod = $_FILES[$nombre]['error'];
    	if ( $errorCod !=  UPLOAD_ERR_OK) 
    	{   $this->error =(isset($this->uploadErrors[$errorCod]))?$this->uploadErrors[$errorCod]: _ERROR_DESCONOCIDO;
    		return false;
    	}
    	
    	$this->_FILES_FILE = $_FILES[$nombre]; //cargamos la info del archivo temporal creado por el envio POST

    	// cambiamos el nombre al  valor del parametro $nuevoNombre si no queda el mismo nombre del archivo que tenia el usuario
    	$nombre = (!empty($nuevoNombre))?$nuevoNombre:$this->_FILES_FILE['name'];
    	// Si la propiedad $nombreImagen tiene un valor lo colocamos como el nuevo nombre de la imagen
    	$this->nombreImagen = (!empty($this->nombreImagen))?$this->nombreImagen:$nombre;
        
    	$this->extraerSoloExtension();
    	$this->extraerSoloNombre(); //extraemos solo el nombre sin la extension.
    	 
    	
    	//Intentamos decorar el nombre de la imagen con el fin de hacerlo unico
    	if ($this->condicionDecorarNombre) { 
    	  
    	  $nombre = $this->decorarNombreImagen();
    	  if ($nombre == false) {return false;}
    	  $this->nombreImagen = $nombre;
    	  
    	}
     	
    	return true;
    }
    
    function extraerSoloExtension()
    {   
    	$extension_imagen = "";
		$extension = explode(".",$this->nombreImagen);
		if (!empty($extension))
		{
		    $num       = count($extension)-1;
		    if ($num>0)
		    $extension_imagen = $extension[$num];
		}
        $this->extension  = $extension_imagen;
        return $this->extension;
    }
    
    function extraerSoloNombre($extensionImagen = "")
    {   
    	if (empty($extensionImagen))
    	{
    		$this->extraerSoloExtension();
    	    $extensionImagen = $this->extension;
    	}
    	
    	// sin extension el nombre sin extension es el mismo nombre
    	if (empty($this->extension)){$this->nombreSinExtension = $this->nombreImagen;}
    	
    	$pattern = "\.$extensionImagen$";
    	$this->nombreSinExtension = eregi_replace ( $pattern,"", $this->nombreImagen);
    	
    	return $this->nombreSinExtension;
    }
    
	function chequearExtensionImagen()
    {     
    	// Se verifica que la extensión de los archivos sean los correctos, JPG - GIF.
        if (empty($this->extension)) {$this->extraerSoloExtension();}
        
        $this->error = (!in_array(strtolower($this->extension),$this->extensionesValidas))?$this->errores[0]:"";
		
	return (empty($this->error));
    }

    function decorarNombreImagen()
    {   	
    	//Decoracion por defecto: Agregamos la fecha
    	
    	// Intentamos cargan el nombre sin extension
    	$this->nombreSinExtension = (!empty($this->nombreSinExtension))?$this->nombreSinExtension:$this->extraerSoloNombre($this->extension);
    	
    	//sin el nombre no se puede hacer nada
    	if (empty($this->nombreSinExtension)){$this->error = $this->errores[3];return false;} 
    	
    	$extension = (!empty($this->extension))?".".$this->extension:$this->extension;
    	$this->nombreImagen = $this->nombreSinExtension." F".date("YmdHis")."$extension";
    	return 	 $this->nombreImagen;
    }
    
    function chequearNombre()
    {
        $patternImage = "^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ .&_()/,;#-]+$";
        
        $esValido     = !eregi($this->nombreImagen, $patternImage);
        
        return $esValido; 
		
		
    }
    
    function almacenarImagen()
    {
        //Intentamos copiar la imagen del directorio temporal donde la almacena el navegador
        //a un directorio permanente en el servidor.
        
		if ($this->_FILES_FILE['name'] != '' )
		{	
			$destino = $this->ruta.$this->nombreImagen;
			//msgError("origen:".$this->_FILES_FILE['tmp_name'] );
		    //msgError("destino:".$destino );
		
			$copio = move_uploaded_file($this->_FILES_FILE['tmp_name'], $destino);
		}
		if (!isset($copio) or $copio == FALSE){$this->error = $this->errores[1];}
		else                                  {$this->estado = 'almacenada';$this->error ="";}
		
		return (empty($this->error));
    }  
    	
}
?>