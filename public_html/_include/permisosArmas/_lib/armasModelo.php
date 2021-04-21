<?php
class permisoArma
{
	public  $db;
	static  $nombreTabla = "armaPermiso";
	protected $campos = array('id'=>'',
	'nombres'=>'' ,
	'tipodoc'=>'' ,
	'documento'=>'' ,
	'nopermiso'=>'');

	public function __get($var)
	{return $this->campos[$var];}

	public function _set($var, $val)
	{$this->campos['$var'] = $val;}

	function guardar()
	{
	    if(!empty($this->campos['id']))
		{
	    $sql = $this->db->AutoExecute($rs, $this->campos, 'INSERT');
		}
		else
		{
		$sql = $this->db->AutoExecute($rs, $this->campos, 'UPDATE', 'id='.$this->campos['id']);
		}
		return $this->db->Execute($sql);	
	}   



}
	

//borrar todos los permisos		
$sql_insert="truncate table t_permisos";	

//eliminar permiso
$sql_insert="delete from t_permisos				
				where codpermiso=$codpermiso";

//modificar permiso				
		   $sql_insert="update t_permisos
				set nombres='$nombres',tipoid='$tipoid',id='$id',nopermiso='$nopermiso'
				where codpermiso=$codpermiso";

?>