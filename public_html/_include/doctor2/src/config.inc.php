<?php
$user = 'ejercito';
$pass = '3J3rc1t0&2013';
$base = 'ejercito';
$tamano_maximo 	= 225113;
$tamano_lote 	= 1000;
$iteraciones    = ceil($tamano_maximo/$tamano_lote);


   //$dbh = new PDO(sprintf('mysql:host=ejc2.theportalbuilder.com;dbname=%s',$base), $user, $pass);
   
	$mysqli = new mysqli("ejc2.theportalbuilder.com", "ejercito", "3J3rc1t0&2013", "ejercito");
	if ($mysqli->connect_error) {
		echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
	}


function my_autoloader($class) {
    include '/home/ejercito/public_html/_include/doctor2/src/lib/micros/class_' . $class . '.php';
}

spl_autoload_register('my_autoloader');