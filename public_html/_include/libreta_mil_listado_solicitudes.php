<?php
if( isset($_REQUEST['action']) )
{
	// Validacion de peticion AJAX
	
	require_once('../_config/constantes.php'); //CARGA LAS CONSTANTES DEL PORTAL

	session_name(preg_replace('/\s+/', '', strtolower(_DBNAME)));
	session_start();
	
	if( session_id() == "" || !isset($_SESSION['info_usuario']) || !isset($_SESSION['info_usuario']['username']) || $_SESSION['info_usuario']['username'] == "" )
	{
		echo '<script type="text/javascript" language="Javascript">alert("El usuario no se encuentra registrado");</script>';
		exit;
	}	
}
else
{
	// Validacion de peticion normal
	
	require_once(_RUTABASE.'_config/constantes.php'); //CARGA LAS CONSTANTES DEL PORTAL
	
	global $idcategoria;
	
	if( session_id() == "" || !isset($_SESSION['info_usuario']) || !isset($_SESSION['info_usuario']['username']) || $_SESSION['info_usuario']['username'] == "" )
	{
		headerLocation("index.php?idcategoria=" . _SLOGIN . "&cat_origen=" . $idcategoria . "&archivo_origen=" . basename($_SERVER['PHP_SELF']) . "&msg=5");
		exit;
	}	
}

require_once(_DIRCORE  . "Funciones.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once(_DIRCORE  . "Autenticacion.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once(_DIRCORE  . "Validacion.class.php"); // CARGA LAS FUNCIONES IMPORTANTES DEL PORTAL
require_once(_RUTABASE . "_config/variables.php"); // CARGA LAS VARIABLES DEL PORTAL
require_once(_RUTABASE . "_lib/Micrositios.class.php"); // Funciones para manejo de Ajax y conversiones
require_once(_DIRLIB   . 'wf/classes.inc.php');
require_once(_DIRLIB.'smarty/libs/Smarty.class.php');

global $db;      //Conexion a MySQL

if( !defined("_WEBFORMULARIODGA") )
{
	trigger_error("La variable de subsitio _WEBFORMULARIODGA no ha sido definida", E_USER_WARNING);
	define("_WEBFORMULARIODGA", 18279);
}

$idUsuario   = $_SESSION['info_usuario']['idusuario'];

//Micrositios::printArray($_SESSION['info_usuario']);

////////////////////////// CODIGO DE PRUEBAS ////////////////////////
//if( !defined("_GRUPOADMINDGA") ) define("_GRUPOADMINDGA", 16); // 16 para agencia
//$idUsuario   = 2999; // AGENCIA
if( !defined("_GRUPOADMINDGA") )
{
	trigger_error("La variable de subsitio _GRUPOADMINDGA no ha sido definida", E_USER_WARNING);
	define("_GRUPOADMINDGA", 32);
}
//$idUsuario   = 29; // CAR
$idEstadoSolicitud = 1;
//$idSol = 1;
////////////////////////// CODIGO DE PRUEBAS ////////////////////////




///////////////////////// INIT MODULO //////////////////////////

$encabezado = array('SOLICITUD #','FECHA SOLICITUD','ESTADO SOLICITUD','NOMBRE USUARIO','ACCIONES PERMITIDAS');
$resulset= array();

$esAdministradorDGA = consulta_grupos::idUsuarioPerteneceALista($db, $idUsuario, _GRUPOADMINDGA);
$roll = false;
if( $esAdministradorDGA )
{
	$roll = _GRUPOADMINDGA;
}else
{
	$roll = '0'; // Sin grupo
}

$js = "";

if( isset($_REQUEST['action']) )
{
//	print_r($_REQUEST);
	
	/*
	 *  Array
(
    [action] => filtrar
    [visible] => 1
    [orienta] => DESC
    [orden] => 0
    [inicio] => 2
    [tipo] => 0
    [idSolicitud] => 
    [idEstado] => 0
    [identificacion] => 
    [txtDesde] => 
    [txtHasta] => 
    [txtUsuario] => 29
    [txtRoll] => 0
    [vNpag] => 2
)
	 */
	
	switch ($_REQUEST['action']) {
		case "filtrar":
		{
			/// Filtros:
			$idSolicitud    = $_REQUEST["idSolicitud"];//dato para filtrar por id solicitud
			$idEstado		= $_REQUEST["idEstado"];//dato para filtrar por estado
			$cedPersona		= $_REQUEST["identificacion"]; //dato par afiltrar por identifiacion 
			$desde			= $_REQUEST["txtDesde"];// dato para filtrar desde una fecha
			$hasta			= $_REQUEST["txtHasta"];// dato para filtrar hasta una fecha
			
			/// Data
			$rol			= $roll; // dato identifica el tipo de usuario que genera el filtro(administrador filtra todos las solicitudes)(usuario filtra enlas solicitudes que le corresponda)
			$usuario		= $idUsuario;//dato que trae el codigo de ususario para filtrar en sus solicitudes
			
			/// Display y orden
			$visible1		= $_REQUEST["visible"];//dato para filtrar en las visibles o no visibles
			$orienta1		= $_REQUEST["orienta"]; //trae la orientacion del ordenamiento puede ser (DESC o ASC)
			$orden1                 = $_REQUEST["orden"];//trae el orden escogido desde la seleccion (lo que trae es un numero que respresenta la posisicon del arreglo $ordenes)
//          $limite1		= $_REQUEST["limite"];
			$inicio1		= $_REQUEST["inicio"];// trae el punto de partida del filtro usado principalmente en la paginacion
			$tipo1			= $_REQUEST["tipo"];//dato usado para saber si el filtro se realizo por ordenamiento o no
			$limite1		= $NPAGCREDITOS = $_REQUEST["vNpag"];// dato usado para ver el numero de resgistros que se traen por pagina

			//Arreglo que contiene los datos por los que se puede ordenar 
			$ordenes = array('tb.solicitud_id','tb.solicitudFechaCreado','tb.estado_id','tbu.nombres');

			//CONDICIONES DE FILTRADO
			$strFiltro = '';
			if ($rol != _GRUPOADMINDGA){
				$strFiltro .= sprintf(" AND tb.usuario_idusuario = '%s'", $usuario);
				$visible1 = null;
			}
			if(!empty($idSolicitud)){
				//solicitud WF_SOLICITUDES
				$strFiltro .= sprintf(" AND tb.solicitud_id = '%s'", $idSolicitud);
			}
			if(!empty($idEstado)){
				//estado WF_SOLICITUDES
				$strFiltro .= sprintf(" AND tb.estado_id = '%s'", $idEstado);
			}
			if(!empty($cedPersona)){
				//cedula SCLI_SOLICITANTES
				$strFiltro .= sprintf(" AND tb.numIdentificacion = '%s'", $cedPersona);
			}
			if (!empty($desde) && !empty($hasta)){
				//desde hasta WF_SOLICITUDES
				$strFiltro .= sprintf(" AND tb.solicitudFechaCreado BETWEEN '%s 00:00:00' AND '%s 23:59:59'",$desde, $hasta);
			}elseif (!empty($desde) && empty($hasta)){
				// solo hay desde
				$strFiltro .= sprintf(" AND tb.solicitudFechaCreado >= '%s 00:00:00'", $desde);
			}elseif (empty($desde) && !empty($hasta)){
				// solo hay hasta
				$strFiltro .= sprintf(" AND tb.solicitudFechaCreado <= '%s 23:59:59'", $hasta);
			}

			$s = '';
			$solicitudesUsuario = wf_solicitud::getByGeneral($db,$visible1,$strFiltro,'ORDER BY '.$ordenes[$orden1].' '.$orienta1,$limite1,$inicio1,$s);  
			$countsolicitudesUsuario = wf_solicitud::getCountPag($db,$visible1,$strFiltro);
			$mol = $countsolicitudesUsuario%$NPAGCREDITOS;// saca el residuo de la divicon de registro y numero de registros por pag
			if($mol==0)
			{
				$NumeroPag = $countsolicitudesUsuario/$NPAGCREDITOS;//
				$countsolicitudesUsuario = $countsolicitudesUsuario-$NPAGCREDITOS;//Este dato  nos da el punto de partida para la ultima pag en caso de que no haya residuo
			}else
			{
				$countsolicitudesUsuario = $countsolicitudesUsuario-$mol;//Este dato  nos da el punto de partida para la ultima pag en caso de que haya residuo.
				$NumeroPag = ($countsolicitudesUsuario/$NPAGCREDITOS)+1;//
			}

			//empezar a pintar
			//print_r($solicitudesUsuario);
			if ($solicitudesUsuario && !$solicitudesUsuario->EOF )
			{
//				$html="<tr align=\"center\"><td align=\"center\"><input type=\"button\"  name=\"exportarExcel\" value=\"Exportar A Excel\"  onClick=\"filtro(1)\"/></td></tr>";
				$html.="<tr>";    
				foreach ($encabezado as $n=>$titulo)
				{
					if($tipo1=='1')
					{
						$orienta2='ASC';
						if($n==$orden1 && $orienta1=='ASC')
						{
							$orienta2='DESC';
						}
					}else
					{
						$orienta2=$orienta1;
					}
					if($n!=7)
					{
							$html .="<th><a href=\"#\" style=\"text-decoration:none;font-size: 15px; width: 20px\" onclick=\"filtro(0,1,$n,\\'$orienta2\\',".$NPAGCREDITOS.",$inicio1);return false\">$titulo</a></th>";
					}else
					{
						$html .="<th style=\"text-decoration:none;font-size: 15px; width: 20px\">$titulo</th>";
					}
				}
				$html.="</tr>";
				$i=0;
				foreach($solicitudesUsuario as $solicitudUsuario)
				{
//					echo "Solicitud $i {$solicitudUsuario["solicitudFechaCreado"]}<br>";
//					print_r($solicitudUsuario);
					$estadoSolicitud = wf_estado::loadById($db, $solicitudUsuario['estado_id']);
					$estadoSolicitud->getEstado_color();
//					$usuarioXsolicitud = wf_consulta_usuario::loadById($db, $solicitudUsuario['usuario_idusuario']);

//                  $creditoSolicitud = scli_credito::loadById($db, $solicitudUsuario['credito_id']);
//                  $cantidadCuotas = $creditoSolicitud->getNomPlazoCredito();
//                  $valorCredito = $creditoSolicitud->getValorCredito();
//					$cantidadCuotas = $solicitudUsuario['nomPlazoCredito'];
//					$valorCredito = $solicitudUsuario['valorCredito'];

					//$idSimulacion1= $solicitudUsuario->getSimuladorId();    
//                  $simuladorx			= scli_simulador::loadById($db, $solicitudUsuario['simulador_id']);
//					$valorCuota                 = $solicitudUsuario['simulador_valorCuota'];
//					if($solicitudUsuario['solicitud_visible']=='0')
//					{
//						$botnOculto=  "<a title=\"Mostrar\"  href=\"#\"><img border=\"0\" alt=\"Mostrar\" onClick=\"Mostrar(".$solicitudUsuario['solicitud_id'].");return false\" src=\"_administracion/recursos/images/btn_mostrar.png\"></a>";
//					}else
//					{
//						$botnOculto=  "<a title=\"Ocultar\"  href=\"#\"><img border=\"0\" alt=\"Ocultar\" onClick=\"Ocultar(".$solicitudUsuario['solicitud_id'].");return false\" src=\"_administracion/recursos/images/btn_ocultar.png\"></a>"; 
//					}

					$nomCompleto = $solicitudUsuario['nombres']." ".$solicitudUsuario['apellidos'];
					$fechaSolicitud1 = substr(trim($solicitudUsuario['solicitudFechaCreado']), 0, 10);
					$html .= "<tr>".
						"<td>".$solicitudUsuario['solicitud_id']."</td>".
							"<td>".$fechaSolicitud1."</td>".
							"<td bgcolor=\"".$solicitudUsuario['estado_color']."\">".$solicitudUsuario['estado_nom']."</td>".
							"<td>".$nomCompleto."</td>".
							"<td style=\\'text-align:center\\' >"
								."<a title=\\'Modificar\\'  href=\\'?idcategoria="._WEBFORMULARIODGA."&solicitud_id=".$solicitudUsuario['solicitud_id']."\\'>"
								."<img border=\\'0\\' alt=\\'Modificar\\' src=\\'_administracion/recursos/images/btn_modificar.jpg\\' />"
								."</a>".
							"</td>";// 
					$html .= "</tr>";

					array_push($resulset
						, array(
							'Fecha_Solicitud'=>$fechaSolicitud1
							,'Cedula'=>$solicitudUsuario['numIdentificacion']
//							,'Grado'=>$solicitudUsuario['grado']
							,'Primer_Nombre'=>$solicitudUsuario['primerNombreRepLegal']
							,'Segundo_Nombre'=>$solicitudUsuario['segundoNombreRepLegal']
							,'Primer_Apellido'=>$solicitudUsuario['primerApellidoRepLegal']
							,'Segundo_Apellido'=>$solicitudUsuario['segundoApellidoRepLegal']
//							,'Nomina'=>$solicitudUsuario['nomina']
							,'Estado_Solicitud'=>$solicitudUsuario['estado_nom']
						)
					);
	//                      $hey=Micrositios::printArray($resulset);         
					$i++;
				}
					
				$inicioAnterior=$inicio1-$NPAGCREDITOS;
				$inicioSiguiente=$inicio1+$NPAGCREDITOS;

				// if(($countsolicitudesUsuario + $mol)>$NPAGCREDITOS)
				{    
//						$html2 ="<tr align=\"center\">";
					$html2 ="";

					//Botones anterior y primero                                                
					if($inicioAnterior>=0)
					{
							$html2 .="<td width=\"25%\" align=\"right\" >";
							$html2 .="<a href=\"#\" style=\"text-decoration:none;font-size: 15px; width: 20px\" onclick=\"filtro(0,0,$orden1,\\'$orienta2\\',".$NPAGCREDITOS.",0);return false\"><img border=\"0\" alt=\"Primero\" src=\"_administracion/recursos/images/primero.png\"></a>";
							$html2 .="&nbsp;<a href=\"#\" style=\"text-decoration:none;font-size: 15px; width: 20px\" onclick=\"filtro(0,0,$orden1,\\'$orienta2\\',".$NPAGCREDITOS.",".$inicioAnterior.");return false\">&nbsp;&nbsp;&nbsp;&nbsp;<img border=\"0\" alt=\"Anterior\" src=\"_administracion/recursos/images/anterior.png\"></a>&nbsp;";
							$html2 .="</td>";
					}else
					{
						$html2 .="<td width=\"25%\"  align=\"right\">";
						$html2 .="</td>";
					}

					$html2 .="<td  width=\"50%\" align=\"center\" >";
					$pagActual=($inicio1+$NPAGCREDITOS)/$NPAGCREDITOS; 

					if($pagActual<=5 && $NumeroPag<=10)
					{
						$MinPag=1;
						$jx=0;
						$MaxPag=$NumeroPag;
					}elseif($pagActual<=5 && $NumeroPag>10) 
					{
						$MinPag=1;
						$jx=0;
						$MaxPag=$pagActual+5;
					}elseif($pagActual>5 && $NumeroPag<=10) 
					{
						$MinPag=$pagActual-5;
						$jx=$MinPag-1;
						$MaxPag=$NumeroPag;
					}elseif($pagActual>5 && $NumeroPag>10 && ($NumeroPag-$pagActual)>5) 
					{
						$MinPag=$pagActual-5;
						$jx=$MinPag-1;
						$MaxPag=$pagActual+5;
					}elseif(($NumeroPag-$pagActual)<=5) 
					{
						$MinPag=$pagActual-5;
						$jx=$MinPag-1;
						$MaxPag=$NumeroPag;
					}

					//if($NumeroPag>10)
					//	{
					//		$NumeroPagPre=$NumeroPag-10;
					//		$jx=$NumeroPagPre-1;
					//	}else
					//		{
					//			$NumeroPagPre=1; 
					//			$jx=0;
					//		}

					for ($i = $MinPag; $i <=$MaxPag ; $i++) 
					{
						$inipag=$NPAGCREDITOS*$jx;
						if($inicio1==$inipag)
						{
							$html2 .="<a href=\"#\" class=\"pagAct\" onclick=\"filtro(0,0,$orden1,\\'$orienta2\\',".$NPAGCREDITOS.",$inipag);return false\">&nbsp;$i&nbsp;</a>"; /*class='PaginaN'*/
						}else
						{
							$html2 .="<a href=\"#\" class=\"pagf\" onclick=\"filtro(0,0,$orden1,\\'$orienta2\\',".$NPAGCREDITOS.",$inipag);return false\">&nbsp;$i&nbsp;</a>"; /*class='PaginaN'*/
						}
						$jx++;
					}
					$html2 .="</td>";

					//Botones siguiente y ultimo
					if($inicioSiguiente<=$countsolicitudesUsuario)
					{
						$html2 .="<td  width=\"25%\" align=\"left\" >";
						$html2 .="&nbsp;<a href=\"#\" style=\"text-decoration:none;font-size: 15px; width: 20px\" onclick=\"filtro(0,0,$orden1,\\'$orienta2\\',".$NPAGCREDITOS.",".$inicioSiguiente.");return false\">&nbsp;&nbsp;&nbsp;&nbsp;<img border=\"0\" alt=\"Siguiente\" src=\"_administracion/recursos/images/siguiente.png\"></a>";
						$html2 .="&nbsp;<a href=\"#\"  style=\"text-decoration:none;font-size: 15px; width: 20px\" onclick=\"filtro(0,0,$orden1,\\'$orienta2\\',".$NPAGCREDITOS.",$countsolicitudesUsuario);return false\">&nbsp;&nbsp;&nbsp;&nbsp;<img border=\"0\" alt=\"Ultimo\" src=\"_administracion/recursos/images/ultimo.png\"></a>&nbsp;";    
						$html2 .="</td>";
					}else
					{
						$html2 .="<td width=\"25%\"  align=\"left\">";
						$html2 .="</td>";
					}

					//$html2 .="</tr> ";
					$html3 ="<td width=\"50%\" align=\"center\"  colspan=\"3\" >";
					$html3 .="<input type=\"hidden\" size=\"1\" name=\"npag\" id=\"npag\" value=\"$NumeroPag\"> ";
					$html3 .="Pagina No: <input type=\"text\" size=\"1\" name=\"irPag\" id=\"irPag\"> &nbsp; <input type=\"button\" value=\"Ir\" onClick=\"filtro(2,0,$orden1,\\'$orienta2\\',".$NPAGCREDITOS.",$countsolicitudesUsuario)\"/> &nbsp; &nbsp;Total Paginas:$NumeroPag";
					$html3 .="</td>";
				}

				$js .= "$(\"#miTabla\").html('".$html."');";
				$js .= "$(\"#miTabla\").show('slow');";
				$js .= "$(\"#pagina\").html('".$html2."');";
				$js .= "$(\"#pagina\").show('slow');";
				$js .= "$(\"#parametri\").html('".$html3."');";
				$js .= "$(\"#parametri\").show('slow');";

			}else
			{
//				$html1="<center><div style=\"color:#F61717\">NO SE ENCUENTRAR SOLICITUDES BAJO LAS CONDICIONES QUE ESTA FILTRANDO ".  str_replace("'", "", str_replace('"', "", $db->ErrorMsg())).".<div></center>";
				$html1="<center><div style=\"color:#F61717\">NO SE ENCUENTRAR SOLICITUDES BAJO LAS CONDICIONES QUE ESTA FILTRANDO.<div></center>";
				$html2="<center><div style=\"color:#F61717\"><div></center>";
				// $html1.=str_replace("'", "","($s)");
				$js .= "$(\"#miTabla\").html('".$html1."');";
				$js .= "$(\"#miTabla\").show('slow');";
				$js .= "$(\"#pagina\").html('".$html2."');";
				$js .= "$(\"#pagina\").show('slow');";
			}
			
			
			break;
			
//			Micrositios::printArray($_REQUEST);
//			$depto_id = Validacion::secureSQL($_REQUEST['depto_id']);
			$muncip_id = Validacion::secureSQL($_REQUEST['muncip_id']);
			$region_id = Validacion::secureSQL($_REQUEST['region_id']);
			
			// Cargamos los municipios del departamento seleccionado
			
			$rsMunicipios = PQRRegion::getAllRegionesXPadre( $db, $region_id );
			
			$js .= "document.getElementById(\"$muncip_id\").options.length = 0;";
			foreach ($rsMunicipios as $arreglo) {
//				$js .= "alert(\"creando option\");";
				$js .= "objOption = document.createElement(\"option\");";
				$js .= "objOption.text = \"".$arreglo['region_nombre']."\";";
				$js .= "objOption.value = \"".$arreglo['region_id']."\";";
				$js .= "document.getElementById(\"$muncip_id\").appendChild(objOption);";
			}
			
		}break;
		
		default:
			break;
	}

	Micrositios::jsAction($js);
	
	exit();
}

$estados     = array();
$idestados   = array();
$estadosf    = array("Todos");
$idestadosf  = array(0);
//$tipos       = array();  
//$id_tipos    = array();
//$tiposf       = array("Todos");
//$id_tiposf    = array(0);
$idEstados   = array(0);
$nomEstados   = array("Todos");
$colEstados   = array();
$paginas = array();
$solicitudUsuario = array();
$_NPAGCREDITOS = 2;

//$listas = consulta_grupos::loadById($db, $idUsuario);
//$tmp = false;
$accion=$_POST['accion'];  
$IDSOL        = $_POST['numero'];
$ocultar="";
$enProceso = false;
//$todasUsuario = wf_solicitud::loadByIdUsuario($db, $idUsuario);
//foreach($todasUsuario as $unaUsuario)
//{
//	$estadoSolicitud = $unaUsuario->getEstadoId();
//	$fechaAprobacion    = $unaUsuario->getSolicitudFechaAprobacion();
//
//	if($fechaAprobacion)
//	{
//		$mess= generales::getMeses($fechaAprobacion);
//		if($mess>=_TIEMPONEWCREDITO)
//		{
//			$enProceso = true;
//		}
//	}    
//
//	if ($estadoSolicitud != 5 && $estadoSolicitud != 6)
//	{
//		$enProceso = true;
//	}
//}
        
//recorrer todos las listas a las que pertenece el usuario
//foreach($listas as $lista){
//	$idLista = $lista->getIdLista();
//	if ($idLista ==_GRUPOADMINDGA){//si el usuario pertenece al grupo 'creditos' 
//		$tmp = true;
//	}
//}
       
$mensajeAdvertencia = "";

if( $esAdministradorDGA )
{
	$solicitudesUsuario = wf_solicitud::getByGeneral($db, '1', '', '', $_NPAGCREDITOS, '0');// consulta para la primera pagina
	$countsolicitudesUsuario = wf_solicitud::getCountPag($db, '1', '');// cuenta el numero de registros en total

	$mol = $countsolicitudesUsuario%$_NPAGCREDITOS;// saca el residuo de la divicon de registro y numero de registros por pag
}else
{
	//si no es administrador mostrar unicamente las solicitudes del usuario
	$strFiltro = sprintf(" AND tb.usuario_idusuario = '%s'", $idUsuario);
	$solicitudesUsuario = wf_solicitud::getByGeneral($db, null, $strFiltro, '', $_NPAGCREDITOS, '0');
	$countsolicitudesUsuario = wf_solicitud::getCountPag($db, null, $strFiltro);
	
	$mol=$countsolicitudesUsuario%$_NPAGCREDITOS;
}

if($mol==0)
{
	$NumeroPag=$countsolicitudesUsuario/$_NPAGCREDITOS;//
	$countsolicitudesUsuario = $countsolicitudesUsuario-$_NPAGCREDITOS;//Este dato  nos da el punto de partida para la ultima pag en caso de que no haya residuo
}else
{
	$countsolicitudesUsuario = $countsolicitudesUsuario-$mol;//Este dato  nos da el punto de partida para la ultima pag en caso de que haya residuo.
	$NumeroPag=($countsolicitudesUsuario/$_NPAGCREDITOS)+1;//
}

if ($solicitudesUsuario){
	/*
	* pintar la tabla solicitudes, tanto para administrador de creditos como para usuarios 
	*/
	$html=""; 

	foreach($solicitudesUsuario as $solicitudUsuario){

//		print_r($solicitudUsuario);
		$fechaSolicitud1= substr(trim($solicitudUsuario['solicitudFechaCreado']), 0, 10);
//		if($roll==_GRUPOADMINDGA)
//		{
//			$ocultar= "<a title='Ocultar'  href='#'><img border='0' alt='Ocultar' onClick='Ocultar(".$solicitudUsuario['solicitud_id'].");return false' src='_administracion/recursos/images/btn_ocultar.png'></a>";
//		}          
		$nomCompleto = $solicitudUsuario['nombres']." ".$solicitudUsuario['apellidos'];
		$html .= "<tr>".
				"<td>".$solicitudUsuario['solicitud_id']."</td>".
				"<td>".$fechaSolicitud1."</td>".
				"<td bgcolor='".$solicitudUsuario['estado_color']."'>".$solicitudUsuario['estado_nom']."</td>".
				"<td>".$nomCompleto."</td>".
				"<td style='text-align:center' >"
					."<a title='Modificar'  href='?idcategoria="._WEBFORMULARIODGA."&solicitud_id=".$solicitudUsuario['solicitud_id']."'>"
					."<img border='0' alt='Modificar' src='_administracion/recursos/images/btn_modificar.jpg' />"
					."</a>".
//				$ocultar.
				"</td>";// 
		$html .= "</tr>";

		
		//consultas para exporta a excel
		array_push($resulset
				, array(
					'Fecha_Solicitud'=>$fechaSolicitud1
					,'Cedula'=>$solicitudUsuario['numIdentificacion']
//					,'Grado'=>$solicitudUsuario['grado']
					,'Primer_Nombre'=>$solicitudUsuario['primerNombreRepLegal']
					,'Segundo_Nombre'=>$solicitudUsuario['segundoNombreRepLegal']
					,'Primer_Apellido'=>$solicitudUsuario['primerApellidoRepLegal']
					,'Segundo_Apellido'=>$solicitudUsuario['segundoApellidoRepLegal']
					,'Estado_Solicitud'=>$solicitudUsuario['estado_nom']
		));
	}
}
   
    
//consultar los tipos de estados
$estados = wf_estado::getAll($db);

foreach($estados as $estado){
	array_push($idEstados,   $estado->getEstado_id());
	array_push($nomEstados,  $estado->getEstado_nom());
	array_push($colEstados,  $estado->getEstado_color());
}

//$strTipoCredito = sprintf("SELECT * FROM %s WHERE idpadre='%s' and activa=1",_TBLCATEGORIA, _TIPOSDECREDITOS);
//$qryTipoCredito = $db->Execute($strTipoCredito);
//while (!$qryTipoCredito->EOF)
//{
//	array_push($tipos,      $qryTipoCredito -> fields['nombre']);
//	array_push($id_tipos,   $qryTipoCredito -> fields['idcategoria']);
//	array_push($tiposf,     $qryTipoCredito -> fields['nombre']);
//	array_push($id_tiposf,  $qryTipoCredito -> fields['idcategoria']);
//	$qryTipoCredito->MoveNext();
//}

if (isset($_POST['exportarExcel']))
{ 
//	$encabezados = array("Fecha_Solicitud","Cedula","Grado","Primer_Nombre", "Segundo_Nombre",
//		"Primer_Apellido", "Segundo_Apellido", "Nomina", "Estado_Solicitud", "Valor_Credito", 
//		"Plazo"
////		, "Primer_Nombre_Codeudor", "Segundo_Nombre_Codeudor", "Primer_Apellido_Codeudor", "Segundo_Apellido_Codeudor", "Nomina_Codeudor", "Grado_Codeudor"
//	);
//
//	$a = new GeneraExcel;
//	$a->ExceSCLI($encabezados, $resulset);
	die("excel");
}

//$smarty->assign('miTabla'        ,$solicitudesUsuario);
if( $mensajeAdvertencia != "" )
	$smarty->assign('mensajeAdvertencia'        ,$mensajeAdvertencia);
$smarty->assign('miHtml'        ,$html);
   
//PAGINACION PRIMERA ENTRADA Y ORDENACION

$areeglob=Array();
foreach ($encabezado as $n=>$titulo)
{
	if($n!=7)
	{
		$areeglob[]="<a href='#' style='text-decoration:none; font-size: 15px; width: 20px' onclick='filtro(0,1,$n,\"ASC\",2,0);return false'>$titulo</a>";
	}else
	{
		$areeglob[]="$titulo";
	}
}

if($NumeroPag>=6)
{
	$NumeroPagPre=6;
}else
{
	$NumeroPagPre=$NumeroPag;   
}
       

for ($i = 1, $jx = 0; $i <=$NumeroPagPre ; $i++) 
{
	$inipag=$_NPAGCREDITOS*$jx;
	if($i==1)
	{ 
		array_push($paginas,"<a href='#' class='pagAct' onclick='filtro(0,0,0,\"DESC\",2,$inipag);return false'>&nbsp;$i&nbsp;</a>"); /*class='PaginaN'*/
	}else
	{
		array_push($paginas,"<a href='#' class='pagf' onclick='filtro(0,0,0,\"DESC\",2,$inipag);return false'>&nbsp;$i&nbsp;</a>"); /*class='PaginaN'*/
	}
	$jx++;
}
   
$smarty->assign('paginas' ,$paginas);
$smarty->assign('mol' ,$mol);
$smarty->assign('encabezado' ,$areeglob);

$smarty->assign('Npag' ,$NumeroPag);
$smarty->assign('count' ,$countsolicitudesUsuario);
//$smarty->assign('roll'        ,$roll);
//$smarty->assign('miUsuario'        ,$idUsuario);

$smarty->assign('idEstados'      ,$idEstados);
$smarty->assign('nomEstados'     ,$nomEstados);
$smarty->assign('colEstados'     ,$colEstados);

$smarty->assign('idEstados'      ,$idEstados);
$smarty->assign('nomEstados'     ,$nomEstados);
$smarty->assign('colEstados'     ,$colEstados);
//    $smarty->assign('DIRTOOLS',);
   
$smarty->assign('estados'     ,$estados);
$smarty->assign('id_estados'  ,$idestados);
$smarty->assign('estadosf'    ,$estadosf);
$smarty->assign('id_estadosf' ,$idestadosf);
//$smarty->assign('tabla'       ,$tabla);
//$smarty->assign('tipos'       ,$tipos);
//$smarty->assign('id_tipos'    ,$id_tipos);
//$smarty->assign('valfiltro'   ,$filtro_estado);
//$smarty->assign('tiposf'       ,$tiposf);
//$smarty->assign('id_tiposf'    ,$id_tiposf);
//$smarty->assign('valfiltrot'   ,$filtro_tipo);
//$smarty->assign('valor12'     ,$filtro_cc);
//$smarty->assign('input12'     ,'filtrocc');
//$smarty->assign('fecha'       ,$fecha_inicial);
//$smarty->assign('fecha2'      ,$fecha_final);
$smarty->assign('DIRCSS'      , _DIRCSS);
//$smarty->assign('variable' ,$variable);

return $smarty->fetch('tpl_mod_dga_solicitudes.html');
?>