<?php

ini_set('display_errors', 1); 

set_time_limit(0);


$user = 'ejercol-p';
$pass = 'Lg2*zHLa&V!AHg5NF%+smRJ';
$base = 'ejercito';
$tamano_maximo 	= 229600;
$tamano_lote 	= 3000;
$iteraciones    = ceil($tamano_maximo/$tamano_lote);

$dbh = new PDO(sprintf('mysql:charset=utf8mb4;host=207.58.130.131;dbname=%s',$base), $user, $pass);

function my_autoloader($class) {
    include '/home/ejercito/public_html/_include/doctor/src/lib/micros/class_' . $class . '.php';
}

spl_autoload_register('my_autoloader');