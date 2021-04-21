<?php

//Se puede usar la restriccion en el portal a solo usuarios mientras tanto
 require_once(_DIRINCLUDE."repositorioImagenes/_config/"."constantes.php");
  
 // Si el usuario no esta logeado en el sistema se le envia a logearse
 if (!isset($_SESSION['info_usuario']['username']))
 {
 	$location="index.php?idcategoria=11&msg=5&cat_origen={$_GET['idcategoria']}";
 }
 else 
 {
 	$location="index.php?idcategoria=";
 }

?>