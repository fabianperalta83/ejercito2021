<?php
/*
 * Milton Gonzalez
 *
 * Clase que pinta el Calendario
 */


 class calendario
 {

	//Atributos
	public $fecha;
	public $mes;
	public $dia;
	public $ano;
	var $ano_anterior;
	var $mes_anterior;
	var $ano_siguiente;
	var $mes_siguiente;
	var $ultimo_dia;
	var $dia_comienzo;
	var $matriz_mes;
	var $eventos;
	var $array_meses = Array( Array( 1 => 'ene', 'feb', 'mar', 'abr', 'may', 'jun'),
				  Array( 7 => 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'));

	function __construct()
	{
		$this->fecha = date('Y-m-d');
		if ( isset($_GET['ano'])) $this->set_ano($_GET['ano']);
		if ( isset($_GET['mes'])) $this->set_mes($_GET['mes']);
	}

	function obtener_valores()
	{
		if ( isset($this->fecha) && !preg_match( "/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $this->fecha ))
		{//Primero comprobamos que el formato de la fecha sea valido
			echo '<h2>'._('Formato de fecha ('.$this->fecha.') no válido, se detiene el proceso.').'</h2>';
			/*exit;*/
		}

		//Si esta vacia ponemos la fecha del dia de hoy
		if ( empty($this->fecha) )
		{
			$this->fecha = date('Y-m-d');
		}

		$fecha = explode( '-', $this->fecha );

		//Pasamos los datos a los atributos de la clase respectivos
		$this->ano = (empty($this->ano)) ? (int)$fecha[0] : (int)$this->ano;
		$this->mes = (empty($this->mes)) ? (int)$fecha[1] : (int)$this->mes;
		$this->dia = (empty($this->dia)) ? (int)$fecha[2] : (int)$this->dia;

		$this->ano_anterior  = (int)$this->ano - 1;
		$this->ano_siguiente = (int)$this->ano + 1;
		$this->mes_anterior  = (int)$this->mes - 1;
		$this->mes_siguiente = (int)$this->mes + 1;


		if ( $this->mes_anterior == 0 )
		{
			$this->mes_anterior = 12; //Indica si estamos en Enero
		}

		if ( $this->mes_siguiente == 13 )
		{
			$this->mes_siguiente  = 1; //Indica si estamos en Diciembre
		}

		//Calculamos el ultimo dia del mes, el dia de la semana que comienza el mes
		$this->ultimo_dia = $this->ultimo_dia();
		$this->dia_comienzo = $this->dia_comienzo();

		//Creamos la matriz
		$this->matriz_mes = $this->matriz_mes();
	}

	function set_dia( $dia )
	{
		$this->dia = (int)$dia;
		$matriz_fecha = explode( '-', $this->fecha );
		return $this->fecha = $matriz_fecha[0].'-'.str_pad( $this->mes, 2, 0, STR_PAD_LEFT).'-'.$matriz_fecha[2];
	}

	function set_mes( $mes )
	{
		$this->mes = (int)$mes;
		$matriz_fecha = explode( '-', $this->fecha );
		return $this->fecha = $matriz_fecha[0].'-'.str_pad( $this->mes, 2, 0, STR_PAD_LEFT).'-'.$matriz_fecha[2];
	}

	function set_ano( $ano )
	{
		if ( empty($ano) && !preg_match( "/[0-9]{4}", $ano ))
		{//Primero comprobamos que el formato del año sea valido
			echo '<h2>'._('Formato de a&#241;o ('.$ano.') no válido, se detiene el proceso.').'</h2>';
			/*exit;*/
		}

		$this->ano = (int)$ano;
		$matriz_fecha = explode( '-', $this->fecha );
		return $this->fecha = $this->ano.'-'.$matriz_fecha[1].'-'.$matriz_fecha[2];
	}

	function matriz_mes()
	{

		global $db;
		global $idcategoria;

		$j = 1;
		//hallamos la semana en la cual comienza el mes
		$n = (int)date( 'W', mktime(0,0,0,$this->mes, 1, $this->ano) );


		//En cada dia de la semana va metiendo vacio hasta que llegue al dia en el cual comienza el mes
		for ( $i = 0; $i <=($this->dia_comienzo() - 1 ); $i++)
		{
			$days[( $j % 7 == 0 ? $n++ : $n)][] = '';
			++$j;
		}


		for ( $i = 1; $i <= $this->ultimo_dia(); $i++)
		{


			//Verificamos si el dia tiene evento y ponemos la bandera en caso afirmativo
			$query_eventos = sprintf("SELECT idcategoria FROM %s WHERE activa = 1 AND eliminado = 0 AND idpadre = %s and year(fecha2) = '%s' and month(fecha2) = '%s' and day(fecha2) = '%s'",_TBLCATEGORIA,$idcategoria,$this->ano,$this->mes,$i);
			$result_eventos = $db->Execute($query_eventos) or errorQuery(__LINE__, __FILE__);

			//Si tiene evento el dia respectivo lo marcamos con una bandera
			if($result_eventos->NumRows() > 0)
			{
				$days[( $j % 7 == 0 ? $n++ : $n)][] = array('dia'=>$i,'evento'=>1);
			}
			else
			{
				$days[( $j % 7 == 0 ? $n++ : $n)][] = array('dia'=>$i,'evento'=>0);
			}

			++$j;

		}

		return $days;
	}

	function dia_comienzo()
	{
		//A pertir de la versión 5.1.0 de PHP se puede emplear N en lugar de w que simplificaría el desarrollo, pero de esta manera lo dejamos preparado para PHP4
		$numero_de_dia = date('w', mktime(0,0,0,$this->mes, 1, $this->ano));//Falla si el mes comienza en domingo
		return ( empty($numero_de_dia) ) ? 7 : $numero_de_dia;
	}

	function ultimo_dia()
	{
		$ultimo = 28;
		while (checkdate( $this->mes, $ultimo, $this->ano))
		{
			$ultimo++;
		}
		return --$ultimo;
	}

	function obtener_eventos($dia)
	{
		global $db;
		global $idcategoria;

		//Traemos la info del evento del dia respectivo
		$query_eventos = sprintf("SELECT * FROM %s WHERE activa = 1 AND eliminado = 0 AND idpadre = %s and year(fecha2) = '%s' and month(fecha2) = '%s' and day(fecha2) = '%s'",_TBLCATEGORIA,$idcategoria,$this->ano,$this->mes,$dia);
		$result_eventos = $db->Execute($query_eventos) or errorQuery(__LINE__, __FILE__);

		$eventos_dia = array();
		while(!$result_eventos->EOF)
		{
			array_push($eventos_dia,$result_eventos->fields);
			$result_eventos->MoveNext();
		}

		$this->eventos = $eventos_dia;

	}

}//Final de calendario

//Creamos el objeto
$calendar = new calendario();

//Creamos el calnedario
$calendar->obtener_valores();

//Si viene un dia por get traemos los eventos de ese dia
if(isset($_GET['dia']))
{
	if($_GET['dia'] != '')
	{
		$calendar->obtener_eventos($_GET['dia']);
	}
}



$smarty = new Smarty_Plantilla;

setlocale( LC_ALL, "es_ES.UTF-8" );
$smarty->assign( 'calendar', $calendar );
$smarty->assign( 'idcategoria', $idcategoria );

//$smarty->clear_cache();
return $smarty->fetch('tpl_calendario.html');

?>
