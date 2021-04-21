<?php
class permisoArma
{
	public  $db;
	protected  $nombreTabla = _TBL_ARMAPERMISO;
	static     $defCampos =  array('id'=>'',
	'nombres'=>'' ,
	'tipodoc'=>'' ,
	'documento'=>'' ,
	'nopermiso'=>'');
	
	public  $campos = array();
    
    function __construct()
	{
	$this->campos= self::$defCampos;
	}
	
	public function __get($var)
	{
    return $this->campos[$var];}

	public function __set($var, $val)
	{$this->campos[$var] = $val;}

	public function guardar()
	{   
	    $id = (empty($this->campos['id']))?-1:$this->campos['id'];
		$sql = 'select * from '.$this->nombreTabla." where id=".$id;
		$rs = $this->db->Execute($sql);
		

		$sql = ($id == -1)?$this->db->GetInsertSQL($rs, $this->campos):$this->db->GetUpdateSQL($rs, $this->campos);
        
		if (empty($sql)){return "No se realizo ningun cambio";}
		
		$resultado = $this->db->Execute($sql);
		//$this->db->debug=false;
		$this->campos['id'] = ($id == -1)?$this->db->Insert_ID():$this->campos['id'];
		if(!$resultado){return "Error de Base de datos: ".$this->db->MsgError();}
		return false;
	    
	}   



}
	
/*
//borrar todos los permisos		
$sql_insert="truncate table t_permisos";	ami

//eliminar permiso
$sql_insert="delete from t_permisos				
				where codpermiso=$codpermiso";

//modificar permiso				
		   $sql_insert="update t_permisos
				set nombres='$nombres',tipoid='$tipoid',id='$id',nopermiso='$nopermiso'
				where codpermiso=$codpermiso";
*/
?>