<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// ini_set('display_errors', '1');
    require_once(_DIRCORE.'Validacion.class.php');
    
   require_once(_DIRCORE.'Autenticacion.class.php');
   require_once(_RUTABASE.'_config/variables.php');
   require_once(_RUTABASE.'_config/constantes.php');
   require_once(_DIRLIB.'smarty/libs/Smarty.class.php');
   require_once(_DIRCORE.'Funciones.class.php');
   require_once(_DIRCORE.'Validacion.class.php'	);
   require_once(_DIRCORE.'Funciones.class.php'		);
   require_once(_DIRLIB.'Micrositios.class.php');
   require_once(_DIRLIB_ADMIN.'ControlGestor.class.php');

global $db;
$Smarty = new Smarty_Plantilla();

if (isset($_POST['export'])){
            $Username           = $_POST["Username"];//dato para filtrar por estado
            $cedulaGestor	= $_POST["cedulaGestor"]; //dato par afiltrar por identifiacion 
            $desde		= $_POST["txtDesde"];// dato para filtrar desde una fecha
            $hasta		= $_POST["txtHasta"];// dato para filtrar hasta una fecha
            $desdeM		= $_POST["txtDesdeM"];// dato para filtrar desde una fecha
            $hastaM		= $_POST["txtHastaM"];// dato para filtrar hasta una fecha
            $inicio1		= $_POST["inicio"];// trae el punto de partida del filtro usado principalmente en la paginacion
            $limite1= $NPAGCREDITOS = $_GET["Nreg"];// dato usado para ver el numero de resgistros que se traen por pagina

            //CONDICIONES DE FILTRADO
                    $strFiltro ='';
            
            if(!empty($idUsuario)){
    
                    $strFiltro .= sprintf(" AND tbu.idusuario = '%s'", $idUsuario);
            }
            
            if(!empty($Username)){
           
                    $strFiltro .= sprintf(" AND tbu.username= '%s'", $Username);
            }
                
            if(!empty($cedulaGestor)){
                    //cedula SCLI_SOLICITANTES
                    $strFiltro .= sprintf(" AND tbu.identificacion = '%s'", $cedulaGestor);
            }
            
            if (!empty($desde) && !empty($hasta)){
                    //desde hasta WF_SOLICITUDES
                    $strFiltro .= sprintf(" AND tbl.creacion BETWEEN '%s' AND '%s'",$desde, $hasta);
            }elseif (!empty($desde) && empty($hasta)){
                    // solo hay desde
                    $strFiltro .= sprintf(" AND tbl.creacion >= '%s'", $desde);
            }elseif (empty($desde) && !empty($hasta)){
                    // solo hay hasta
                    $strFiltro .= sprintf(" AND tbl.creacion <= '%s'", $hasta);
            }
            
            
            if (!empty($desdeM) && !empty($hastaM)){
                    //desde hasta WF_SOLICITUDES
                    $strFiltro .= sprintf(" AND tbl.modificado  BETWEEN '%s' AND '%s'",$desdeM." 00:00:00", $hastaM." 23:59:00");
            }elseif (!empty($desdeM) && empty($hastaM)){
                    // solo hay desde
                    $strFiltro .= sprintf(" AND tbl.modificado >= '%s'", $desdeM." 00:00:00");
            }elseif (empty($desdeM) && !empty($hastaM)){
                    // solo hay hasta
                    $strFiltro .= sprintf(" AND AND tbl.modificado <= '%s'", $hastaM." 23:59:00");
            }
            
          
         $Gestores = ControlGestor::getByGeneral($db, $strFiltro);
         

                    $html ="<table border='1'>";
            if ($Gestores && !$Gestores->EOF ){

                
                $html.="<tr>";    
                 $encabezado = array('ID USUARIO','USERNAME','NOMBRE GESTOR','ESTADO');  
                foreach ($encabezado as $n=>$titulo)
                        {
                            $html .="<th align=\"center\">$titulo</th>";
                        }
                $html.="</tr>";
                $i=0;
                 foreach($Gestores as $Gestor){
                    $nomCompleto= $Gestor['nombres']." ".$Gestor['apellidos'];
                    $html .= "<tr>".
                                "<td>".$Gestor['idusuario']."</td>".
                                "<td>".$Gestor['username']."</td>".
                                "<td width='auto'>".utf8_encode($nomCompleto)."</td>";
                                if($Gestor['eliminado']=='1'){$html .="<td>Eliminado</td>";}
                                else{$html .="<td>Activo</td>";}
                    $html .= "</tr>";
                    $i++;      
                }
                    
                    

            }
            $html .= "</table>";
            header('Content-type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=Reporte_satisfaccion_1.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            echo $html;
            /*die();*/
        }
		

if ($_POST['numero']=='Exportar'){

            $idUsu  = $_POST["idUsuario"];//dato para filtrar por id solicitud
			$desdeM		= $_POST["txtCreDesde"];// dato para filtrar desde una fecha
            $hastaM		= $_POST["txtCreHasta"];// dato para filtrar hasta una fecha
            
			$strFiltro = sprintf(" AND tbu.idusuario = '%s'", $idUsu);
			$infoUsuario = ControlGestor::getByGeneral($db,$strFiltro);
            
			
			$strFiltro2 = sprintf(" AND tbt.usuario_id_2 = '%s'", $idUsu);
			$html = "<table class=\"listado\" width=\"100%\" border\"1\" >";   
			if (!empty($desdeM) && !empty($hastaM)){
                    //desde hasta WF_SOLICITUDES
                    $strFiltro2 .= sprintf(" AND tbt.creacion  BETWEEN '%s' AND '%s'",$desdeM." 00:00:00", $hastaM." 23:59:00");
					$html .= "<tr><td>Fecha Desde</td><td>".$desdeM."</td></tr>";   
					$html .= "<tr><td>Fecha Hasta</td><td>".$hastaM."</td></tr>";   
            }elseif (!empty($desdeM) && empty($hastaM)){
                    // solo hay desde
                    $strFiltro2 .= sprintf(" AND tbt.creacion >= '%s'", $desdeM." 00:00:00");
					$html .= "<tr><td>Fecha Desde</td><td>".$desdeM."</td></tr>";   
					
            }elseif (empty($desdeM) && !empty($hastaM)){
                    // solo hay hasta
                    $strFiltro2 .= sprintf("AND tbt.creacion <= '%s'", $hastaM." 23:59:00");
					$html .= "<tr><td>Fecha Hasta</td><td>".$hastaM."</td></tr>";  
            } 
            
            
            $pqrs               = ControlGestor::getByIdGes($db,$strFiltro2);
            $pqrs_medios        = ControlGestor::getNumMed($db,$strFiltro2);
            $pqrs_dependencias  = ControlGestor::getNumDep($db,$strFiltro2);
             
            
             $encabezado = array('ID SOLICITUD','FECHA CREACIÓN','ESTADO', 'MEDIO DE RECEPCION', 'DEPENDENCIA FINAL');  
              foreach($infoUsuario as $Usuario)
                    {  
                        $html .= "<tr>"."<td colspan=\"2\">Nombre del gestor</td><br><td>".$Usuario['nombres'].$Usuario['apellidos']."</td></tr>";
                        $html .= "<tr>"."<td colspan=\"2\" >Fecha ".'creación'."</td><br><td>".$Usuario['creacion']."</td></tr>";
                        $html .= "<tr>"."<td colspan=\"2\" >Id </td><br><td>".$idUsu."</td></tr>";
                      
                    }
               foreach ($encabezado as $n=>$titulo)
                        {
                            $html .="<th align=\"center\">".$titulo."</th>";
                        }
             $A=0;
			 $T=0;
			 $C=0;
             foreach($pqrs as $pqr)
                    {
							if($pqr['estado_id']==1){$A++;}
							if($pqr['estado_id']==2){$T++;}
							if($pqr['estado_id']==3){$C++;}
							
                            $html .= "<tr>".
                                        "<td>".$pqr['solicitud_id']."</td>".
                                        "<td>".$pqr['creacion']."</td>".
                                        "<td>".$pqr['estado_nombre']."</td>".
                                        "<td>".$pqr['medio_nombre']."</td>".
                                        "<td>".$pqr['dependencia_nombre']."</td>".
                                   "</td>"; 
                            $html .= "</tr>";
                          
                    }
			
			$html .= "</table>";
                        $html .= "<br>";
			$html .= "<table class=\"listado\" width=\"100%\" border\"0\" >"; 
			$html .= "<tr>"."<th>Estado</th><th>No</th></tr>";
                        $html .= "<tr>"."<td>Abierto</td><td>".$A."</td></tr>";
			$html .= "<tr>"."<td>En ".'trámite'."</td><td>".$T."</td></tr>";
			$html .= "<tr>"."<td>Cerrado</td><td>".$C."</td></tr>";
                        $html .= "<tr><td colspan=\"3\" align=\"center\"><input type=\"button\" value=\"Cerrar\" onClick=\"cerrarDiv()\"></td></tr>";
			$html .= "</table>";
                        
                        
                        
                        $html .= "<br>";
			$html .= "<table class=\"listado\" width=\"100%\" border\"0\" >"; 
			$html .= "<tr>"."<th>Medio</th><th>No</th></tr>";
                        
                        foreach ($pqrs_medios as $pqrs_medio) {
                            $html .= "<tr>"."<td>" . $pqrs_medio['medio_nombre'] . "</td><td>" . $pqrs_medio['contador'] . "</td></tr>";
                        }
                        
                        $html .= "<tr><td colspan=\"3\" align=\"center\"><input type=\"button\" value=\"Cerrar\" onClick=\"cerrarDiv()\"></td></tr>";
			$html .= "</table>";
                       
                        
                        $html .= "<br>";
			$html .= "<table class=\"listado\" width=\"100%\" border\"0\" >"; 
			$html .= "<tr>"."<th>Dependencia</th><th>No</th></tr>";
                        
                        foreach ($pqrs_dependencias as $pqrs_dependencia) {
                            $html .= "<tr>"."<td>" . $pqrs_dependencia['dependencia_nombre'] . "</td><td>" . $pqrs_dependencia['contador'] . "</td></tr>";
                        }
                        
                        $html .= "<tr><td colspan=\"3\" align=\"center\"><input type=\"button\" value=\"Cerrar\" onClick=\"cerrarDiv()\"></td></tr>";
			$html .= "</table>";
                        
			//$html .= "<tr><td colspan=\"3\" align=\"center\"><input type=\"button\" value=\"Cerrar\" onClick=\"cerrarDiv()\"></td></tr>";
			/*
			$html .= "<tr>";
			$html .= "<td colspan=\"2\">";
			$html .= "<div class=\"fechas\" style=\"border: 0px solid #CCCCCC;\">";
			$html .= "<div class=\"dvFechaIn\" style=\"display: inline;display:inline; width:50%; float:left\">";
			$html .= "<label>Fecha ".utf8_encode('creción')." Desde</label>";
			$html .= "<input type=\"text\" size=\"10\" name=\"txtCreDesde\" id=\"txtCreDesde\">";
			$html .= "</div>";
			$html .= "<div class=\"dvFechaFn\" style=\"display: inline;display:inline; width:50%;\">";
			$html .= "<label style=\"margin-left:1.9em;\">Fecha ".utf8_encode('creción')." Hasta</label>";
			$html .= "<input type=\"text\" size=\"10\" name=\"txtCreHasta\" id=\"txtCreHasta\">";
			$html .= "</div>";
			$html .= "</td>";
			$html .= "</tr>";
			
			$html .= "<tr>";
			$html .= "<td colspan=\"3\" align=\"center\">";
			$html .= "<img style=\"cursor:pointer\" border=\"0\" alt=\"Resporte Gestor\" src=\"_administracion/recursos/images/btn_auditoria.jpg\" onclick=\"showReporte(".$Gestor['idusuario'].")\">"; 
			$html .= "</td>";
			$html .= "</tr>";*/
			
            
            
            header('Content-type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=Reporte_satisfaccion_1.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            echo $html;
            /*die();*/
        }	

//Micrositios::printArray($Gestores);
 $encabezado = array('ID USUARIO','USERNAME','NOMBRE GESTOR','ESTADO DEL GESTOR','ACCIONES PERMITIDAS');
 $registrosporpag='5';
 $paginas = array();
 
 $Gestores = ControlGestor::getByGeneral($db, '',$registrosporpag,0);
$countGestores = ControlGestor::getCountPag($db);
 
 $mol=$countGestores%$registrosporpag;// saca el residuo de la divicon de registro y numero de registros por pag
     if($mol==0)
         {
            $NumeroPag=$countGestores/$registrosporpag;//
            $countGestores = $countGestores-$registrosporpag;//Este dato  nos da el punto de partida para la ultima pag en caso de que no haya residuo
            
         }else
            {
                $countGestores = $countGestores-$mol;//Este dato  nos da el punto de partida para la ultima pag en caso de que haya residuo.
                $NumeroPag=($countGestores/$registrosporpag)+1;//
            }
 
 
 
 $html="";
foreach($Gestores as $Gestor)
    {
       $nomCompleto= $Gestor['nombres']." ".$Gestor['apellidos'];
        $html .= "<tr>".
                    "<td>".$Gestor['idusuario']."</td>".
                    "<td>".$Gestor['username']."</td>".
                    "<td>".utf8_encode($nomCompleto)."</td>";
                    if($Gestor['eliminado']=='1'){$html .="<td>Eliminado</td>";}
                    else{$html .="<td>Activo</td>";}
                    $html .="<td style='text-align:center' >".
                        //"<a title='Actualizar Datos'  href='index.php?idcategoria=&idCertificado='><img border='0' alt='Actualizar Datos' src='_administracion/recursos/images/btn_modificar.jpg'></a>".  
                        "<img style=\"cursor:pointer\" border='0' alt='Resporte Gestor' src='_administracion/recursos/images/btn_auditoria.jpg' onclick=\"showReporte(".$Gestor['idusuario'].")\">";  
                 if($Gestor['eliminado']=='0')
                                {
                             "<img style=\"cursor:pointer\" border='0' alt='Eliminar Gestor' src='_administracion/recursos/images/btn_eliminar.jpg' onclick=\"eliminarGestor(".$Gestor['idusuario'].")\">".  
                
                                    $html .="<img style=\"cursor:pointer\" border='0' alt='Eliminar Gestor' src='_administracion/recursos/images/btn_eliminar.jpg' onclick=\"eliminarGestor(".$Gestor['idusuario'].")\">";  
                                }else{
                                    $html .="<img style=\"cursor:pointer\" border='0' alt='Eliminar Gestor' src='_administracion/recursos/images/btn_restaurar.jpg' onclick=\"ReintegrarGestor(".$Gestor['idusuario'].")\">";  
                                    }    
                $html .="</td>";// 
        $html .= "</tr>";
      }    

       if($NumeroPag>=6)
           {
                $NumeroPagPre=6;
           }else
               {
                    $NumeroPagPre=$NumeroPag;   
               }
       
       $jx=0;
   for ($i = 1; $i <=$NumeroPagPre ; $i++) 
    {
       
       $inipag=$registrosporpag*$jx;
       if($i==1)
           { 
                array_push($paginas,"<a href='#'   style='text-decoration:none; font-size: 15px; width: 20px' class='pagAct' onclick='filtro(0,$inipag);return false'>&nbsp;$i&nbsp;</a>"); /*class='PaginaN'*/
           }else
               {
                    array_push($paginas,"<a href='#'  style='text-decoration:none; font-size: 15px; width: 20px' class='pagf' onclick='filtro(0,$inipag);return false'>&nbsp;$i&nbsp;</a>"); /*class='PaginaN'*/
               }
        $jx++;
    }  
       
// $smarty->assign('miUsuario'        ,$idUsuario);       
$smarty->assign('count' ,$countGestores);
$smarty->assign('paginas' ,$paginas);
$smarty->assign('Npag' ,$NumeroPag);
$smarty->assign('encabezado' ,$encabezado);
$smarty->assign('miHtml' ,$html);


return $smarty->fetch('tpl_control_gestor.html');

?>
