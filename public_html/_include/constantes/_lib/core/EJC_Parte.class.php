<?php
	class EJC_Parte{
		var $idparte;
		var $fecha;
		var $fecha_actualizacion;
		var $consecutivo_dependencia;
		
		function EJC_Parte($rs=false){
			if($rs){
				$this->idparte=$rs->fields['IDPARTE'];
				$this->fecha=$rs->fields['FECHA'];
				$this->fecha_actualizacion=$rs->fields['FECHA_ACTUALIZACION'];
				$this->consecutivo_dependencia=$rs->fields['CONSECUTIVO_DEPENDENCIA'];
			}
			else{
				$this->idparte=false;
			}
		}
		
		function toArray(){
			return array(	'idparte'=>$this->idparte,
							'fecha'=>$this->fecha,
							'consecutivo_dependencia'=>$this->consecutivo_dependencia,
							'fecha_actualizacion'=>$this->fecha_actualizacion);
		}
		
		function semanaAnterior(){
			$partes=explode('-',$this->fecha);
			return date('Y-m-d',mktime(0,0,0,$partes[1],$partes[2]-7,$partes[0]));
		}
		
		function semanaSiguiente(){
			$partes=explode('-',$this->fecha);
			return date('Y-m-d',mktime(0,0,0,$partes[1],$partes[2]+7,$partes[0]));
		}
		
		function obtenerParte($idparte=false,$consecutivo_dependencia=false,$fecha){
			global $db2;
			$sql="	SELECT idparte as IDPARTE,".$db2->SQLDate('Y-m-d','fecha')." AS FECHA,
									".$db2->SQLDate('Y-m-d','fecha_actualizacion')." AS FECHA_ACTUALIZACION,
									consecutivo_dependencia AS CONSECUTIVO_DEPENDENCIA 
							FROM "._TBL_PARTE;
			if($idparte){
				$sql.="	WHERE idparte=".$idparte;
			}
			else{
				$sql.="	WHERE consecutivo_dependencia=".$consecutivo_dependencia." AND ".
								$db2->SQLDate('Y-m-d','fecha')."='$fecha' ";
			}
			$rs=$db2->Execute($sql) or errorQuery(__LINE__,__FILE__,$db2);
			if($rs->RecordCount()>0){
				return new EJC_Parte($rs);
			}			
			else {
				return false;
			}
		}
		
		function obtenerDetalles($tipo,$forma,$orderby,$order='DESC',$print){
			global $db2;
			
			if($this->idparte<>''){
				
				$sql="	SELECT INITCAP(e.nombres) AS NOMBRES,INITCAP(e.apellidos) AS APELLIDOS,e.consecutivo AS CONSECUTIVO,
								e.unde_fuerza as UNDE_FUERZA,e.unde_consecutivo AS UNDE_CONSECUTIVO,
								e.grad_alfabetico AS GRAD_ALFABETICO,
								".$db2->IfNull('d.forma',"'---'")." AS FORMA,d.observaciones as OBSERVACIONES,
								".$db2->SQLDate('Y-m-d','desde')." AS DESDE,
								".$db2->SQLDate('Y-m-d','hasta')." AS HASTA 
						FROM "._TBL_GRADOS." g,"._TBL_EMPLEADOS." e LEFT OUTER JOIN "._TBL_DETALLE_PARTE." d ON 
									( 
										e.consecutivo=d.empl_consecutivo AND 
										e.unde_consecutivo=d.empl_unde_consecutivo AND 
						 				e.unde_fuerza=d.empl_unde_fuerza AND 
						 				d.idparte=$this->idparte
							 		),"._TBL_CATEGORIAS." c  
						 WHERE e.UNDE_CONSECUTIVO_LABORANDO=$this->consecutivo_dependencia AND 
						 		e.grad_alfabetico=g.alfabetico AND g.fuerza='3' AND e.activo='SI' AND 
								c.id_categoria=g.id_categoria ";
				if($forma<>'false'){
					if($forma=='No forman'){
						$sql.="	AND d.forma<>'Forma' ";
					}
					elseif($forma=='---'){
						$sql.="AND (d.forma='---' OR d.forma IS NULL ) ";
					}
					else{
						$sql.="	AND upper(d.forma) = upper('$forma') ";
					}
				}
				
				if($tipo<>'false'){
					if($tipo=='civil'){
						$sql.=" AND c.DESCRIPCION='CIVIL' ";
					}
					else{
						$sql.=" AND c.DESCRIPCION<>'CIVIL' ";
					}
				}
			}
			else{
				$sql="	SELECT TIEMPO_REAL_GRADO(e.consecutivo,e.unde_consecutivo,e.unde_fuerza,SYSDATE) as ANTIGUEDAD, INITCAP(e.nombres) AS NOMBRES,INITCAP(e.apellidos) AS APELLIDOS,e.consecutivo AS CONSECUTIVO,
								e.unde_fuerza as UNDE_FUERZA,e.unde_consecutivo AS UNDE_CONSECUTIVO,
								e.grad_alfabetico AS GRAD_ALFABETICO,'Forma' AS FORMA,'' as OBSERVACIONES,
								'' AS DESDE,
								'' AS HASTA 
						FROM "._TBL_GRADOS." g,"._TBL_EMPLEADOS." e, "._TBL_CATEGORIAS." c  
						WHERE e.UNDE_CONSECUTIVO_LABORANDO=$this->consecutivo_dependencia AND 
						 		e.grad_alfabetico=g.alfabetico AND g.fuerza = '3' AND
						 		e.activo='SI' AND c.id_categoria=g.id_categoria ";
				if($tipo<>'false'){
					if($tipo=='civil'){
						$sql.=" AND c.DESCRIPCION='CIVIL' ";
					}
					else{
						$sql.=" AND c.DESCRIPCION<>'CIVIL' ";
					}
				}								
			}
			$sql.="		ORDER BY  ";
			
			$sentidoOrden = (trim(strtolower($order)) == 'asc')?" ASC ":" DESC ";
			
			if($orderby=='grad_alfabetico'){
				//por alguna razon el orden esta invertido si se selecciona ASC regresa los resultados DESC
				$sentidoOrdenInv = (trim(strtolower($order)) == 'asc')?" DESC ":" ASC ";
				$sql.=" g.numerico $sentidoOrdenInv, TIEMPO_REAL_GRADO(e.consecutivo,e.unde_consecutivo,e.unde_fuerza,SYSDATE) $sentidoOrden ";
			}
			else{
				$sql.=" $orderby "; 
				$sql.= $sentidoOrden;
			}
			
			$r = $db2->Execute($sql) or errorQuery(__LINE__,__FILE__,$db2);
			
			if ($r->RecordCount() > 0) {
				while(!$r->EOF) {
					$resultados[]=$r->fields;
					$r->MoveNext();
				}
				return $resultados;
			}
			else return false;
		}
		
		function grabar($registrar_detalles=true){
			global $db2;
			if($this->idparte==''){	//Debemos grabar el parte antes de guardar los detalles
				$sql_inicio="	INSERT INTO "._TBL_PARTE." (idparte,fecha,fecha_actualizacion,consecutivo_dependencia)
								VALUES (ejc_parte_sec.NEXTVAL,".$db2->DBDate($this->fecha).",
									".$db2->DBDate(date('Y-m-d')).",$this->consecutivo_dependencia)";
				
				$rs=$db2->Execute($sql_inicio) or errorQuery(__LINE__,__FILE__,$db2);
				$sql_id="	SELECT MAX(idparte) FROM "._TBL_PARTE." ";
				$rs_id=$db2->getone($sql_id) or errorQuery(__LINE__,__FILE__,$db2);
				$this->idparte=$rs_id;
				$this->fecha_actualizacion=date('Y-m-d');
			}
			else{
				$sql_upd="	UPDATE "._TBL_PARTE." SET fecha_actualizacion=".$db2->DBDate(date('Y-m-d'))."
							WHERE idparte=$this->idparte ";
				$rs=$db2->Execute($sql_upd) or errorQuery(__LINE__,__FILE__,$db2);				
			}
			if($registrar_detalles){
				if(!isset($_REQUEST['codigos'])){
					return false;
				}
				$llaves=$_REQUEST['codigos'];
				if(!is_array($llaves)){
					return false;
				}
				
				foreach ($llaves as $llave){
					$partes=explode('!',$llave);
					$consecutivo=$partes[0];
					$unde_consecutivo=$partes[1];
					$unde_fuerza=$partes[2];
					if ($this->existeDetalle($consecutivo,$unde_consecutivo,$unde_fuerza)) {
						$rs_dato=$this->actualizarDetalle($consecutivo,$unde_consecutivo,$unde_fuerza,$llave);
					}
					else{
						$rs_dato=$this->ingresarDetalle($consecutivo,$unde_consecutivo,$unde_fuerza,$llave);
					}
				}
			}
			return "La informaci&oacute;n del parte fue actualizada satisfactoriamente";
		}
		
		function existeDetalle($consecutivo,$unde_consecutivo,$unde_fuerza){
			global $db2;
			$sql="	SELECT 'x' FROM "._TBL_DETALLE_PARTE." 
					WHERE EMPL_CONSECUTIVO = $consecutivo AND EMPL_UNDE_CONSECUTIVO=$unde_consecutivo AND 
						EMPL_UNDE_FUERZA =$unde_fuerza AND IDPARTE=$this->idparte ";
			$rs=$db2->Execute($sql) or errorQuery(__LINE__,__FILE__,$db2);
			if($rs->RecordCount()>0)
				return true;
			else return false;
		}
		
		function ingresarDetalle($consecutivo,$unde_consecutivo,$unde_fuerza,$llave){
			global $db2;
			$forma=$_REQUEST['forma_'.$llave];
			$desde=$_REQUEST['desde_'.$llave];
			$hasta=$_REQUEST['hasta_'.$llave];
			$observaciones=$_REQUEST['observaciones_'.$llave];
			$sql="	INSERT INTO "._TBL_DETALLE_PARTE." (IDPARTE,EMPL_CONSECUTIVO,EMPL_UNDE_CONSECUTIVO,EMPL_UNDE_FUERZA,forma,desde,hasta,observaciones)
					VALUES ($this->idparte,$consecutivo,$unde_consecutivo,$unde_fuerza,'$forma',
							".$db2->DBDate($desde).",
							".$db2->DBDate($hasta).",
							'$observaciones')";
			$rs=$db2->Execute($sql) or errorQuery(__LINE__,__FILE__,$db2);
			return $rs;
		}
		
		function actualizarDetalle($consecutivo,$unde_consecutivo,$unde_fuerza,$llave){
			global $db2;
			$forma=$_REQUEST['forma_'.$llave];
			$desde=$_REQUEST['desde_'.$llave];
			$hasta=$_REQUEST['hasta_'.$llave];
			$observaciones=$_REQUEST['observaciones_'.$llave];
			$sql="	UPDATE "._TBL_DETALLE_PARTE." SET forma='$forma',desde=
							".$db2->DBDate($desde).",hasta=
							".$db2->DBDate($hasta).",observaciones='$observaciones'
					WHERE idparte=$this->idparte AND empl_consecutivo=$consecutivo AND 
							empl_unde_consecutivo=$unde_consecutivo AND empl_unde_fuerza=$unde_fuerza ";
			$rs=$db2->Execute($sql) or errorQuery(__LINE__,__FILE__,$db2);
			return $rs;
		}
		
	}
?>