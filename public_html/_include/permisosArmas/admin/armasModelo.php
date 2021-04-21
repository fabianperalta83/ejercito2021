<?php
	class permisoArma
	{
		public  $db;
		static  $nombreTabla = "armaPermiso";
		private $campos = array('id' ,
		'nombres' ,
		'tipodoc' ,
		'documento' ,
		'nopermiso');

		function guardar()
		{
			//Consulta guardar		   
			$sql ="insert into t_permisos(nombres,tipodoc,documento,nopermiso)
			values('$nombres','$tipoid','$id','$nopermiso')";
		}
	
		function vaciar()
		{
			//borrar todos los permisos		
			$sql_insert="truncate table t_permisos";	
		}
		
		function eliminar()
		{
			//eliminar permiso
			$sql_insert="delete from t_permisos				
			where codpermiso=$codpermiso";
		}
		
		function actualizar()
		{
			//modificar permiso				
			$sql_insert="update t_permisos
			set nombres='$nombres',tipoid='$tipoid',id='$id',nopermiso='$nopermiso'
			where codpermiso=$codpermiso";
		}
	}
?>