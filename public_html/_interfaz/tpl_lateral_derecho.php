<?php
header("Content-Type: text/html;charset=utf-8");
function tpl_lateral_derecho($idcategoria){
	// escogo el template que necesito
    global $idcategoria;
	return tpl_lateral_default_derecho($idcategoria);
}
/**
 * tpl_lateral_default()
 * 
 * @param $rutaRecursos
 * @param $seccion
 * @param $menuInstitucional
 * @param $idcategoria
 * @return 
 **/
function tpl_lateral_default_derecho($idcategoria) {

	global $db;
    global $trazaCategoria;
	
	$smarty = new Smarty_Plantilla;   
	$smarty->assign('dirroot'		,_DOCUMENT_ROOT);
	$smarty->assign('dirrecursos'	,_DIRRECURSOS);
	$smarty->assign('dirmages'		,_DIRIMAGES);

    if (defined('_PLANTILLA') && _PLANTILLA == "Subsitio2018") {
        if(defined("_MEDIOS_COMUNICACION") && _MEDIOS_COMUNICACION != ''){
            $consulta2  = sprintf("SELECT idcategoria, nombre, imagen, antetitulo FROM categoria WHERE idpadre = '%s' AND activa = 1 AND eliminado = 0 ORDER BY orden ASC",_MEDIOS_COMUNICACION);          
            $resultado2 = $db->GetAll($consulta2);

            $smarty->assign('arrayMedios', $resultado2);
        }

        if(defined("_IMAGEN_REVISTA") && _IMAGEN_REVISTA != '')
        {
            $consulta_imagen = sprintf("SELECT idcategoria, nombre, imagen, antetitulo FROM categoria WHERE idcategoria = '%s' AND eliminado = 0",_IMAGEN_REVISTA);
            $resultado_imagen = $db->GetAll($consulta_imagen);

            $smarty->assign('imagen_revista', $resultado_imagen);
        }

        if (defined("_ID_REVISTADIGITAL") && isset($_SESSION['info_usuario']['idusuario']) and _ID_REVISTADIGITAL != "") {
            $selectGrupo = sprintf("SELECT * FROM detallelista WHERE idlista = %s AND idusuario = %s", _ID_REVISTADIGITAL, $_SESSION['info_usuario']['idusuario']);
            $resultGrupo = $db->Execute($selectGrupo);

            if ($resultGrupo->NumRows() > 0) {
                $mensajeRevista = "Ud ya se encuentra suscrito a la Revista Digital";
                $smarty->assign('mensajeRevista', $mensajeRevista);
            }

            if (isset($_POST["suscribase"])) {
                if(isset($_SESSION['info_usuario']['idusuario'])){
                    $insertGrupo  = sprintf("INSERT INTO detallelista values (%s, %s)", $_SESSION['info_usuario']['idusuario'], _ID_REVISTADIGITAL);
                    $resultIGrupo = $db->Execute($insertGrupo);
                }
            }
        }elseif(!isset($_SESSION['info_usuario']['idusuario']) and isset($_POST["suscribase"])){
            $mensaje = "5";
            $_SESSION['revista_digital'] = "ok";
            headerLocation("index.php?idcategoria="._SLOGIN."&cat_origen=10&archivo_origen=".basename($_SERVER['PHP_SELF'])."&msg=".$mensaje);
            exit;
        }
    }
    if (_PLANTILLA == "Default_Subsitio") {
        if(defined("_SECCION_NOTASDIA") && _SECCION_NOTASDIA != ''){
            $consulta  = sprintf("SELECT idcategoria, nombre, imagen FROM categoria WHERE idpadre='%s' AND activa = 1 AND eliminado = 0 ORDER BY fecha2 DESC",_SECCION_NOTASDIA);          
            $resultado = $db->GetAll($consulta);

            setlocale(LC_TIME,"es_ES");
            $smarty->assign('arrayNotasDia', $resultado);
            $smarty->assign('diaNotas'     , date("d"));
            $smarty->assign('mesNotas'     , substr(date("F"),0,3));
        }

        if(defined("_IMAGEN_REVISTA") && _IMAGEN_REVISTA != '')
        {
            $consulta_imagen = sprintf("SELECT idcategoria, nombre, imagen, antetitulo FROM categoria WHERE idcategoria = '%s' AND eliminado = 0",_IMAGEN_REVISTA);
            $resultado_imagen = $db->GetAll($consulta_imagen);

            $smarty->assign('imagen_revista', $resultado_imagen);
        }

        if(defined("_MEDIOS_COMUNICACION") && _MEDIOS_COMUNICACION != ''){
            $consulta2  = sprintf("SELECT idcategoria, nombre, imagen, antetitulo FROM categoria WHERE idpadre = '%s' AND activa = 1 AND eliminado = 0 ORDER BY orden ASC",_MEDIOS_COMUNICACION);          
            $resultado2 = $db->GetAll($consulta2);

            $smarty->assign('arrayMedios', $resultado2);
        }

        if (defined("_ID_REVISTADIGITAL") && isset($_SESSION['info_usuario']['idusuario']) and _ID_REVISTADIGITAL != "") {
            $selectGrupo = sprintf("SELECT * FROM detallelista WHERE idlista = %s AND idusuario = %s", _ID_REVISTADIGITAL, $_SESSION['info_usuario']['idusuario']);
            $resultGrupo = $db->Execute($selectGrupo);

            if ($resultGrupo->NumRows() > 0) {
                $mensajeRevista = "Ud ya se encuentra suscrito a la Revista Digital";
                $smarty->assign('mensajeRevista', $mensajeRevista);
            }

            if (isset($_POST["suscribase"])) {
                if(isset($_SESSION['info_usuario']['idusuario'])){
                    $insertGrupo  = sprintf("INSERT INTO detallelista values (%s, %s)", $_SESSION['info_usuario']['idusuario'], _ID_REVISTADIGITAL);
                    $resultIGrupo = $db->Execute($insertGrupo);
                }
            }
        }elseif(!isset($_SESSION['info_usuario']['idusuario']) and isset($_POST["suscribase"])){
            $mensaje = "5";
            $_SESSION['revista_digital'] = "ok";
            headerLocation("index.php?idcategoria="._SLOGIN."&cat_origen=10&archivo_origen=".basename($_SERVER['PHP_SELF'])."&msg=".$mensaje);
            exit;
        }
    }

    $infoCategoria = $trazaCategoria[$idcategoria];
    //comprueba que no sea pagina principal y genera el arreglo para el submenu de 2 nivel
    if ($infoCategoria["iddisplay"] != 1 && $idcategoria != _SINSTITUCIONAL && $idcategoria!= _SUTILIDADES && $idcategoria != _SINICIO){
        $smarty->assign('esTemplateHome'  ,FALSE);
        
        $resulmenu = SegundoNivel($db,$idcategoria);
        $smarty->assign('menuSegNivel',$resulmenu);

        $queryhijo = $db->prepare("SELECT idpadre,iddisplay_sub FROM "._TBLCATEGORIA." WHERE idcategoria = ? and activa != ?");
        $resulthijos = $db->Execute($queryhijo, array($idcategoria, 0));

        $smarty->assign('padre',$resulthijos->fields['idpadre']);    
        $smarty->assign('sub_display', $resulthijos->fields['iddisplay_sub']);
    }

    $smarty->assign('tipoCategoria',$infoCategoria['iddisplay']);

	
    define("_EN_INGLES");

    $es_ingles = _EN_INGLES;

    $smarty->assign('ingles',$es_ingles);

	return $smarty->fetch('tpl_lateral_derecho.html');

    function SegundoNivel($db, $id){
        $query = $db->prepare("SELECT idpadre,iddisplay_sub FROM "._TBLCATEGORIA." WHERE idcategoria = ? and activa != ?");
        $result = $db->Execute($query, array($id, 0)) /* or errorQuery(__LINE__, __FILE__) */;
    
        if($result->fields['idpadre']==_SINSTITUCIONAL || $result->fields['idpadre'] ==_SINICIO)
        {
            $orden_tmp = Funciones::BusquedaRecursiva(Funciones::BuscarPadre($id),"orden_sub");
            $tmp = Funciones::BusquedaRecursiva($id,"asc_sub");

            switch ($tmp) 
            {
                case 1: $asc_tmp = "desc"; break;
                case 2: $asc_tmp = "asc"; break;
            }
            
            $queryhermanos = $db->prepare("SELECT nombre, idcategoria FROM "._TBLCATEGORIA." WHERE idpadre = ? and activa != ? ORDER BY ".$orden_tmp." ".$asc_tmp."");
            $resulth = $db->Execute($queryhermanos, array($id, 0)) /* or errorQuery(__LINE__, __FILE__) */;
            $MenuSeg= $resulth?$resulth->GetRows():array();

        }else{
            $MenuSeg= SegundoNivel($db,$result->fields['idpadre'],_TBLCATEGORIA, $id);
        }
     
        return $MenuSeg;   
    }

}



?>
