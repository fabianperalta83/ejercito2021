<?php
class validadorestructura{

	public function marcar($mysqli, $marca = 0,$control){
		$msg = "";
		$listaid = "";
		foreach ($control as $id) {
			$msg .= sprintf('<b>%s (%s)... </b>',$id,$marca);
			$listaid .= sprintf(" idcategoria = %s or ",$id);	
		}
		$mysqli->query(sprintf('UPDATE categoria set marca_estructura = %s where %s',$marca,rtrim($listaid, " or ") ));
		echo $msg;
	}

	function __construct($mysqli, $idpadre = 0,$control){

		try {
		    $query = "SELECT idcategoria, idpadre, nombre, marca_estructura from categoria where idcategoria = ?";
			//$x = $mysqli->prepare(sprintf('',$idpadre));
			$x = $mysqli->prepare($query);
			$x->bind_param("s", $idpadre);
			$x->execute();
			if ($x->rowCount() <> 0) {
				foreach ($x as $row){
					$control[] = (int) $idpadre;
					if ($row['idpadre'] <> 0 && !in_array($row['idpadre'], $control) && $row['marca_estructura'] <> 1 && $row['marca_estructura'] <> 2){
						$test = new validadorestructura($mysqli, $row['idpadre'],$control);

					} elseif ($row['idpadre'] == 0 || $row['marca_estructura'] == 1) {
						// var_dump($control);
						$this->marcar($mysqli,1,$control);
						break;

					} elseif (in_array($row['idpadre'], $control) || $row['marca_estructura'] == 2) {
						echo "<font color='red'><b>Referencia circular!</b></font></br>";
						// var_dump($control);
						$this->marcar($mysqli,2,$control);
						break;
					}

				}
				$mysqli = null;
			} else {
				echo "<font color='red'><b>Nodos huerfanos!</b></font></br>";
				// var_dump($control);
				$this->marcar($mysqli,3,$control);
			}
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}