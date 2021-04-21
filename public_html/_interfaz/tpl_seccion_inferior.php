<?php
header("Content-Type: text/html;charset=utf-8");
function tpl_seccion_inferior(){
    // escogo el template que necesito
    return tpl_seccion_inferior_contenido();
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
function tpl_seccion_inferior_contenido() {

    global $db;

    $smarty = new Smarty_Plantilla;
    $smarty->assign('dirroot'		,_DOCUMENT_ROOT);
    $smarty->assign('dirrecursos'	,_DIRRECURSOS);
    $smarty->assign('dirmages'		,_DIRIMAGES);


    if(defined('_SECCION_MIPAIS') and _SECCION_MIPAIS !='')
    {
        // Cambio # 1
        $SECCION_MIPAIS = trim(_SECCION_MIPAIS);
        $queryRotulo	 = $db->prepare("select * from "._TBLCATEGORIA." where activa != ? and idcategoria = ?");
        $resultRotulo = $db->Execute($queryRotulo, array(0, $SECCION_MIPAIS)) /* or errorQuery(__LINE__, __FILE__)*/;
        if ($resultRotulo !== FALSE and $resultRotulo->NumRows() > 0)
        {
            $smarty->assign('rotulo', $resultRotulo->fields["nombre"]);
        }
        
        // Cambio # 2
        $SECCION_MIPAIS = trim(_SECCION_MIPAIS);
        $queryPais	 = $db->prepare("select * from "._TBLCATEGORIA." where activa != ? and idpadre = ?");
        $resultPais = $db->Execute($queryPais, array(0, $SECCION_MIPAIS)) /* or errorQuery(__LINE__, __FILE__)*/;
        if ($resultPais !== FALSE and $resultPais->NumRows() > 0)
        {
            while (!$resultPais->EOF){

                $rowPais = $resultPais->fields;
                $categoria['idcategoria'] = $rowPais["idcategoria"];
                $categoria['nombre'] = $rowPais["nombre"];
                $categoria['antetitulo'] = $rowPais["antetitulo"];
                $categoria['imagen'] = $rowPais["imagen"];
                $categorias[] = $categoria;
                $categoria = "";
                $resultPais->MoveNext();
            }
            $smarty->assign('Pais', $categorias);
        }
        $smarty->assign('categoria_pais',_SECCION_MIPAIS);
    }

    /*******************************************
	 Pestanas
	 *******************************************/

    if (defined("_DESTACADOS") && _DESTACADOS != '')
    {
        $catsDestacados = explode(',', _DESTACADOS);
        $i = 0;
        foreach ($catsDestacados as $categoria)
        {
            if (trim($categoria) != '')
            {
                $categoria1 = trim($categoria);
                $queryDestacadosHijo = sprintf("SELECT nombre, imagen, idcategoria FROM %s WHERE activa != 0 AND idpadre = '%s' and fecha2 != '%s' ORDER BY fecha2 DESC" , _TBLCATEGORIA , $categoria1, '0000-00-00 00:00:00');
                $resultDestacadosHijo = $db->SelectLimit($queryDestacadosHijo, 3) /* or errorQuery(__LINE__, __FILE__)*/;

                if ($resultDestacadosHijo->NumRows() > 0)
                {
                    // Cambio # 3
                    $categoria1 = trim($categoria);
                    $queryDestacados = $db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria= ?");
                    $resultDestacados = $db->Execute($queryDestacados, array(0, $categoria1)) /* or errorQuery(__LINE__, __FILE__)*/;
                    $resultadoDestacados[$i] = $resultDestacados->fields;

                    for (;!$resultDestacadosHijo->EOF;$resultDestacadosHijo->MoveNext())
                    {
                        $dato = $resultDestacadosHijo->fields;
                        $resultadoDestacados[$i]['hijos'][]=$dato;
                    }
                    $smarty->assign('destacados',$resultadoDestacados);
                }
            }
            $i++;
        }
    }

    return $smarty->fetch('tpl_seccion_inferior.html');
}

?>