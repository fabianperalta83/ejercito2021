<?php
class iteradorvisibilidad{
	function __construct($dbh){
		echo "</br></br><font color='green'><b>---VALIDACION DE VISIBILIDAD DE LAS CATEGORIAS DEL PORTAL---</b></font></br>";

		$dbh->query(sprintf('UPDATE categoria set marca_visibilidad = 0'));

		$dbh->query(sprintf('UPDATE categoria set marca_visibilidad = 2 where activa = 1 and marca_estructura = 1'));

		for ($i=0; $i < $GLOBALS['iteraciones']; $i++) { 		
			foreach($dbh->query(sprintf('SELECT * from categoria where 
				marca_estructura = 1 and 
				idcategoria between %s and %s 
				order by idcategoria desc', $GLOBALS['tamano_maximo']-(($i+1)*$GLOBALS['tamano_lote']), $GLOBALS['tamano_maximo']-($i*$GLOBALS['tamano_lote']))) as $row)
			{
				$test = new validadorvisibilidad($dbh,$row['idcategoria'] , $control[] = array());
				echo '</br>';
			}
		}

	}
}