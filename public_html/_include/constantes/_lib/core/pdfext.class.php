<?
class PDF extends FPDF
{
//Cabecera de página
function Header()
{
	$db2=conectarseaOracle();
	$q=	sprintf("	SELECT d.descripcion_dependencia as DESCRIPCION
					FROM %s d,%s e 
					WHERE e.unde_consecutivo_laborando=d.consecutivo AND 
							e.consecutivo=%s AND
							e.unde_consecutivo=%s AND
							e.unde_fuerza=%s AND 
							e.activo='SI'",
					_TBL_UNIDADES_DEPENDENCIA,
					_TBL_EMPLEADOS,
					$_SESSION['info_usuario']['consecutivo'],
					$_SESSION['info_usuario']['unde_consecutivo'],
					$_SESSION['info_usuario']['unde_fuerza']);
					
	$rs_dep=$db2->Execute($q) or errorQuery(__LINE__,__FILE__,$db2);
	
	if ( $this->DefOrientation == 'L' ){
		$ancho = '260';
	}
	else{
		$ancho = '190';
	}
	
	$dia = substr($_SESSION['info_usuario']['fecha_parte'],8,2);
	$mes = substr($_SESSION['info_usuario']['fecha_parte'],5,2);
	$ano = substr($_SESSION['info_usuario']['fecha_parte'],0,4);
	$fecha = $dia."-".$mes."-".$ano;
    //Logo
 //   $this->Image('../_templates/Subsitio1/recursos/images/escudo_001.png',10,8,15);
    //Arial bold 8
    $this->SetFont('Arial','B',8);
    //Movernos a la derecha y Título
    $this->Cell($ancho,4,'FUERZAS MILITARES DE COLOMBIA ',0,0,'C');
    $this->ln(3);
    //Movernos a la derecha y Título2
    $this->Cell($ancho,4,'EJERCITO NACIONAL',0,0,'C');
    $this->ln(3);
    //Movernos a la derecha y Título3
    $this->Cell($ancho,4,$rs_dep->fields['DESCRIPCION'],0,0,'C');
   	$this->ln(4);
   	$this->SetFont('Arial','',8);
    $this->Cell($ancho,4,'Fecha: '.$fecha,0,0,'R');
   	$this->ln(4);
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-10);
    //Arial italic 8
   $this->SetFont('Arial','I',6);
    //Número de página
    $this->Cell(0,3,$this->PageNo().'/{nb}',0,0,'C');
}
}
?>