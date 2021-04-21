<?php
header("Content-Type: text/html;charset=utf-8");
function tpl_links($rutaRecursos)
{
    $smarty = new Smarty_Plantilla;
    $smarty->assign('rutaRecursos',$rutaRecursos);
    return $smarty->fetch('tpl_links.html');
}
?>
