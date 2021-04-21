<?php
global $db;
$tabla = _TBLCATEGORIA;
$retorno = print_r($db->MetaColumnNames($tabla),true);
$resumen = "Tiene una foto relacionada con el ejercito que siempre ha deseado compartir <a href=\"?idcategoria=208610\"> Ahora tiene la posibilidad de compartirla públicandola en la  página del ejercito siguiendo este enlace </a>";
$query = "update "._TBLCATEGORIA." SET ENTRADILLA = '$resumen'
          WHERE idcategoria = 209071";
$db->debug=true;
$db->Execute($query) /*or die("fallo")*/;
$db->debug=false;
return $retorno;
?>
