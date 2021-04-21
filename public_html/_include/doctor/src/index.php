<?php

ini_set('display_errors', 1); 


require_once '/home/ejercito/public_html/_include/doctor/src/config.inc.php';

$start3 = microtime(true);

	$start1 = microtime(true);

		$itera1 = new iteradorestructura($dbh);


	$total1 = microtime(true) - $start1;
	echo "<br><br><font color='red'><b>---Tiempo total de calculo: ".$total1." ---</b></font></br>";
	$start2 = microtime(true);

		//$itera2 = new iteradorvisibilidad($dbh);

	$total2 = microtime(true) - $start2;

$total3 = microtime(true) - $start3;
echo "<br><br><font color='red'><b>---Tiempo total de calculo: ".$total2." ---</b></font></br>";
echo "<br><br><font color='red'><b>---Tiempo total de calculo: ".$total3." ---</b></font></br>";
