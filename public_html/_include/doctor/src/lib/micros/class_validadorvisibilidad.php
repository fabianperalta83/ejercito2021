<?php
class validadorvisibilidad{

	public function marcar($dbh, $marca = 0,$control){
		$msg = "";
		$listaid = "";
		foreach ($control as $id) {
			$msg .= sprintf('<b>%s (%s)... </b>',$id,$marca);
			$listaid .= sprintf(" idcategoria = %s or ",$id);	
		}
		$dbh->query(sprintf('UPDATE categoria set marca_visibilidad = %s where %s',$marca,rtrim($listaid, " or ") ));
		echo $msg;
	}

	function __construct($dbh, $idpadre = 0,$control){

		try {
			$x = $dbh->prepare(sprintf('SELECT idcategoria, idpadre, nombre, marca_visibilidad from categoria where idcategoria = %s',$idpadre));
			$x->execute();
			if ($x->rowCount() <> 0) {
				foreach ($x as $row){
					$control[] = (int) $idpadre;

					if ($row['idpadre'] <> 0 && $row['marca_visibilidad'] == 2){

						$test = new validadorvisibilidad($dbh, $row['idpadre'],$control);

					} elseif ($row['idpadre'] <> 0 && $row['marca_visibilidad'] == 0) {
						// var_dump($control);
						echo "<font color='red'><b>Invisibles!</b></font></br>";						
						$this->marcar($dbh,0,$control);
						break;

					} elseif ($row['idpadre'] == 0 && $row['marca_visibilidad'] == 2) {
						// var_dump($control);
						$this->marcar($dbh,1,$control);
						break;
							
					} elseif ($row['marca_visibilidad'] == 1) {
						// var_dump($control);
						$this->marcar($dbh,1,$control);
						break;

					}

				}
				$dbh = null;
			} else {
				echo "Nodos huerfanos! OJO No deberia suceder en la iteracion de visibilidad</br>";
				// var_dump($control);
				$this->marcar($dbh,3,$control);
			}
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}