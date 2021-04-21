<?
include("trasprovi.php");  
conectar(); 
$ssql = "SELECT * FROM t_usuarios WHERE nombre_usuario='$usuario' and clave_usuario='$password'"; 
$rs = mysql_query($ssql); 
if (mysql_num_rows($rs)!=0)
  { 
  session_name("loginUsuario");               
			  session_start(); 
			   $_SESSION["usuario"]=$usuario;
 			   $_SESSION["password"]=$password;
 			   $_SESSION["logeado"]="896525";			   
    header ("Location: consultar.php"); 
}else { 
    //si no existe le mando otra vez a la portada 
    header("Location: index.php?errorusuario=si"); 
} 
?>