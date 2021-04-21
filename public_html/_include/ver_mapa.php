<?

require_once (_DIRBUSCAR."funciones.php");
require_once(_DIRBUSCAR."Buscar.class.php");
require_once(_DIRBUSCAR."Transform.class.php");
include_once(_DIRBUSCAR."Keymatch.class.php");
require_once(_DIRCORE."FuncionesInterfaz.class.php"); /**Para la creacion dinamica de select*/

$smarty = new Smarty_Plantilla;
$pagina = basename($_SERVER['PHP_SELF']);
$pagina .= sprintf("?idcategoria=%s",$idcategoria);


/**************************************************************************************/
/*** Imprimimos template **/
return $smarty->fetch('tpl_ver_mapa.html');

/**************************************************************************************/
?>