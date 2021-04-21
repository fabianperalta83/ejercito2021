<?
include("trasprovi.php");
conectar();
 session_name("loginUsuario");               
 session_start(); 
 if (strcmp($_SESSION["logeado"],"896525")!=0)	
			  {		
			    session_unregister("loginUsuario");
		       header("Location: index.php?errorusuario=si");		
			    exit();
  		   }		   
		   $sql_insert="insert into t_permisos(nombres,tipoid,id,nopermiso)
				values('$nombres','$tipoid','$id','$nopermiso')";	  
		    mysql_query($sql_insert);
			header("Location: consultar.php");
			exit();
?>