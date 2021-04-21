<?php
class elemento
{
	function getDB()
	{
		global $db;
		return $db;
	}
}


class categoria extends elemento
{
  
  public $tabla;
  public $definicionCampos;
  public $campos;
  
  function __construct($campos=array())
  {
  	$this->tabla = _TBLCATEGORIA;
  	$this->definirEsquema($campos);
  }
 
  function definirEsquema($campos = array())
  { 
  	if (!empty($campos))
  	{
  	    $this->definicionCampos = $campos;	
  	}
  	else
  	{
  	    $this->definicionCampos          = $this->getDB()->MetaColumnNames($this->tabla);
  	}
  	//$this->LlavesPrimarias = "";
  }
  
  function almacenar()
  {    $paraAlmacenar = array();
  	   foreach ($this->definicionCampos as $nombre => $campo)
  	   {
  	   	  if (isset($this->campos[$campo['nombre']]) && !empty($this->campos[$campo['nombre']]) )
  	   	  {$paraAlmacenar[$campo['nombreDB']] = $this->campos[$campo['nombre']];}
  	   }
  	   /*echo "<pre>";
  	   print_r($paraAlmacenar);
  	   echo "campos";
  	   print_r($this->campos);
  	   echo "</pre>";
  	   exit;*/
	   //$this->getDB()->debug=true; 
       $resultado = $this->getDB()->AutoExecute($this->tabla, $paraAlmacenar, 'INSERT');
       //$this->getDB()->debug=false;
       if ($resultado)
       {
       $this->idcategoria = $this->getDB()->insert_ID();
       return $this->idcategoria;
       }
       return false; 

		//Si tenemos un archivo valido de imagen agregamos la ruta a los campos 
		//a almacenar
		if ($empty($errores))
		{$nuevaCategoria["imagen"] = $rutaRelativa.$archivoImagen;}
		
               
	    $result = $db->AutoExecute(_TBLCATEGORIA,$nuevaCategoria,  "INSERT") or errorQuery(__LINE__, __FILE__);
}


  /* Funciones Magicas para atender las propiedades virtuales de la clase */
  function __set($name , $value )
  {
  	if (key_exists($name, $this->definicionCampos))
  	{
  	 $this->campos[$name] = $value;
  	 return true;
  	}
  	return false;
  	
  }	

  function __get($name)
  {
  	 
  	if (isset  ($this->campos[$name]) && key_exists($name, $this->definicionCampos))
  	{
  		return $this->campos[$name];
  	}
  	//msgError("no existe el campo $name");

  }	
}				

?>