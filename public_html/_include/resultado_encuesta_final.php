<?php
//ini_set('display_errors','1');
require_once('_config/constantes.php');
require_once(_DIRLIB.'smarty/libs/Smarty.class.php');
require_once (_DIRCORE.'GeneraXml.class.php');

global $db;

$errores	=	array();
$desde		=	'';
$hasta		=	'';
$arratotales = array();
//$preguntas = _PQR_ENCUESTA_CIUDADANO;

$html_tablas = '';

if(isset($_POST['filtrar']) || isset($_POST['export']))
{
	$desde= $_POST['desde'] . " 00:00:00";
	$hasta= $_POST['hasta'] . "  23:59:59";
	if($desde == '')
	{
		array_push($errores,"Debe ingresar una fecha inicial");
	}
	elseif($hasta == '')
	{
		array_push($errores,"Debe ingresar una fecha final");
	}
	else
	{


                $encuestas_realizadas_query = "
                    SELECT
                        distinct(solicitud_id) solicitud_id
                    FROM
                        pqr_respuestas_encuesta
                    WHERE
                        creacion > '" . $desde . "' AND
                        creacion < '" . $hasta . "'

                ";

                $encuestas_realizadas = $db->GetAll($encuestas_realizadas_query);
                $conteo_encuestas_malas = 0;
                $numero_encuestas = count($encuestas_realizadas);



                foreach ($encuestas_realizadas as $encuesta) {
                    $respuestas_encuesta_query = "
                        SELECT
                            *
                        FROM
                            pqr_respuestas_encuesta
                        WHERE
                            solicitud_id = " . $encuesta['solicitud_id'] . "

                    ";



                    $respuestas_encuesta = $db->GetAll($respuestas_encuesta_query);
                    $count_res_buenas = 0;


                    foreach ($respuestas_encuesta as $respuesta) {
                        if(trim(strtoupper($respuesta['valor_respuesta'])) == 'BUENO')
                            $count_res_buenas++;


                    }

                    if($count_res_buenas < 3){
                        $conteo_encuestas_malas++;
                    }
                }




                $sql1 = "
                    SELECT
                        distinct(id_padre) idcategoria
                    FROM
                        pqr_respuestas_encuesta
                    WHERE
                        creacion > '" . $desde . "' AND
                        creacion < '" . $hasta . "'

                ";


                $query1 = $db->GetAll($sql1);
		//Consultamos por nombre y por idpadre




                foreach($query1 as $reg){


                    $sql_pregunta = "
                        select * from categoria where idcategoria = " . $reg['idcategoria'] . "
                    ";

                    $pregunta = $db->GetAll($sql_pregunta);
                    $pregunta = $pregunta[0];

                    $sql_respestas_pos = "
                        select
                            descripcion
                        from
                            categoria
                        where   idpadre = " . $reg['idcategoria'] . "
                        and     entradilla != 'TEXTO'
                    ";

                    $respuestas_pos = $db->GetAll($sql_respestas_pos);

                    $in = '';

                    foreach($respuestas_pos as $res_pos){

                        if($in != '')
                            $in = $in . ',';

                        $in = $in . "'" . trim($res_pos['valor_respuesta']) . "'";
                    }

                    $html_tablas .= '
                        <table width="100%" cellspacing="0" cellpadding="10" border="1" class="tabla_result">
                        <tbody>
                    ';

                    $html_tablas .= '
                        <tr>
                                    <td colspan="' . (count($respuestas_pos) + 1) . '">
                                            <b>Pregunta: </b><br>
                                            <br>
                                            <b>
                                                    <a style="text-decoration:none; font-size: 15px; width: 20px" href="javascript:void(0);">
                                                            ' . $pregunta['nombre'] . '
                                                    </a>
                                            </b>
                                    </td>
                            </tr>
                    ';

                    $cabecera_opciones = '
                        <td>
                                <a style="text-decoration:none; font-size: 15px; width: 20px" href="javascript:void(0);">
                                        <b>Opcion</b>
                                </a>
                        </td>
                    ';

                    $cabecera_respuestas = '
                        <td>
                                <a style="text-decoration:none; font-size: 15px; width: 20px" onclick="" href="javascript:void(0);">
                                        <b> N Respuestas</b>
                                </a>
                        </td>

                    ';

                    foreach ($respuestas_pos as $respuesta) {


                        $sql_respuestas = "
                            SELECT
                                count(*) nrespuestas
                            FROM
                                pqr_respuestas_encuesta
                            WHERE
                                creacion > '" . $desde . "' AND
                                creacion < '" . $hasta . "'

                            and id_padre = " . $reg['idcategoria'] . "
                            and trim(valor_respuesta) = trim('" . $respuesta['descripcion'] . "')
                        ";


                        $numero_respuestas = $db->GetAll($sql_respuestas);
                        $numero_respuestas = $numero_respuestas[0]['nrespuestas'];

                        $cabecera_opciones .= '
                            <td>
                                    <font size="3"><b>' . $respuesta['descripcion'] . '</b>
                                    </font>
                            </td>
                        ';

                        $cabecera_respuestas .= '
                            <td>
                                    <font size="3"><b>' . $numero_respuestas . '</b>
                                    </font>
                            </td>
                        ';

                    }

                    $cabecera_opciones      = '
                           <tr>
                                ' . $cabecera_opciones . '
                           </tr>';


                    $cabecera_respuestas    = '
                            <tr>
                                ' . $cabecera_respuestas . '
                            </tr>';

                    $html_tablas .= $cabecera_opciones . $cabecera_respuestas;

		}



                $html_tablas .= '
                    </tbody>
                    </table>
                    </br>
                ';

                $html_tablas = '<strong>Total encuestas: ' . $numero_encuestas . '<br>Numero de encuestas bien calificadas: ' . ($numero_encuestas - $conteo_encuestas_malas) . '<br> Numero de encuestas mal calificadas: ' . $conteo_encuestas_malas . '<strong></br>' . $html_tablas;
        }




}




/*******************************************FP********************************************************/
$smarty= new Smarty_Plantilla();
//$smarty->assign('errores',$errores);
//$smarty->assign('preguntas',$htmlpregunta);
//$smarty->assign('esfiltro',$esfiltro);

$smarty->assign('desde',$_POST['desde']);
$smarty->assign('hasta',$_POST['hasta']);
$smarty->assign('html_tablas',$html_tablas);


$smarty->assign('ruta',_RUTABASE);
/***********************************************************/

$smarty->assign('lbl_titulo','Resultado de las Encuestas de Atenci&oacute;n al Ciudadano <b>'._NOMBRESITIO.'</b>');

$resultado_pagina=$smarty->fetch('tpl_respuesta_encuesta_final.html');

return $resultado_pagina;
