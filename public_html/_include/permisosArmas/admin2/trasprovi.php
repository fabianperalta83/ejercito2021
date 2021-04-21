<?
function conectar()
{
mysql_connect("localhost","decima_dbuser","96101243") or die("Error al conectar...");
mysql_select_db('decima_dbejer') or die("Error al escoger la base de datos...");
}


?>