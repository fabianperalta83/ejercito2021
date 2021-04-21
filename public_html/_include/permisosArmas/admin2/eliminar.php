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
  		   } else
		if (!isset($codpermiso))
		 {
		 header("Location: consultar.php");
		 }	   
		   		   $sql_insert="delete from t_permisos				
				where codpermiso=$codpermiso";	  
		    mysql_query($sql_insert);
			header("Location: consultar.php");
			exit();
?>



