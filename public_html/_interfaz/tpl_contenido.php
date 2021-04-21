<?php
header("Content-Type: text/html;charset=utf-8");

function tpl_contenido($idcategoria,$seccion, $smenu) 
{		
    $smarty = new Smarty_Plantilla;    
    $rutetoroot = array();
    FuncionesInterfaz::Migas($idcategoria,$smenu, $rutetoroot);
    if(count($rutetoroot) > 1)
    {
        $rutetoroot = array_reverse($rutetoroot);
        $smarty->assign('rutetoroot',$rutetoroot);
    }

    /**
     ** Se necesita comprobar si se está en modo de edición para ocultar los div's con imágenes
     **/
    if (isset($_SESSION['info_usuario']) and $_SESSION['info_usuario']["activo"] == 1) 
    {
        $smarty->assign('modoEdicion', $_SESSION['modo_edicion'] && $_SESSION['modo_edicion_aprovado']);
    }

    //Revisa si el usuario puede editar la categoria actual y si es hija de la categoria noticias(32) o Actualidad(413)
    $categorias=array_keys(Funciones::obtenerInfoCategoria($idcategoria));
    if( $_SESSION["modo_edicion_aprovado"]===true && (array_search(32, $categorias)!==false || array_search(413, $categorias)!==false))	
    $smarty->assign('twitter', "<a href='index.php?idcategoria=248385&categoriatweet=".$_REQUEST['idcategoria']."'>Enviar al twitter del ejercito</a>");
    $smarty->assign('contenido', Funciones::DisplayCategoria($idcategoria));

    //  Si es home
    if (Funciones::BuscarRoot($idcategoria) == $idcategoria)
    {
        $smarty->assign('esHome' , TRUE);
    }

    /*
     * Subsitio: ingenieros militares
     * */
    try
    {
        $smarty->assign('carrusel_vertical' , $smarty->fetch('tpl_carrusel_vertical.html'));
    }
    catch(Exception $e)
    {}

    if (isset($_SESSION["alto_contraste"])) {
        $smarty->assign('alto_contraste', 'alto');
    }

    return $smarty->fetch('tpl_contenido.html');
}

?>
