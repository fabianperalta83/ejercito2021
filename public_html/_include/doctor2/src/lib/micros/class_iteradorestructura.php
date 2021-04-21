<?php
class iteradorestructura{
	function __construct($mysqli){
		echo "<b><font color='green'>---VALIDACION ESTRUCTURAL DEL PORTAL---</b></font></br>";
		
		$mysqli->query(sprintf('UPDATE categoria set marca_estructura = %s',0));
		for ($i=0; $i < $GLOBALS['iteraciones']; $i++) { 		
			foreach($mysqli->query(sprintf('SELECT * from categoria where 
				marca_estructura = 0
				and idcategoria not in (select idpadre from categoria group by idpadre)
				order by idcategoria desc limit 0,%s',$GLOBALS['tamano_lote'])) as $row)

			{
				$test = new validadorestructura($mysqli,$row['idcategoria'] , $control[] = array());
				echo '</br>';
			}
		}

	}
}