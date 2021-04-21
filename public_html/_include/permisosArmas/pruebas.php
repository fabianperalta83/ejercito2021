<?php
echo realpath(getcwd());
echo realpath(getcwd());
require_once('./../../_config/constantes.php');
require_once(_DIRCORE.'Funciones.class.php');
require_once('./../../_config/variables.php');
//require_once(dirname(__FILE__).'/_config/constantes.php'); 
//require_once(dirname(__FILE__).'/_lib/permisoArma.class.php');
//require_once(_DIRLIB_ADMIN."Pager.class.php");


	global $db;
	//$campos = permisoArma::$defCampos;
	//print_r($campos);
	
	//$permiso = new permisoArma();
	//print_r($permiso->campos);
	//$sql = "SELECT * FROM "._TBL_ARMAPERMISO;	//return $db->Execute($sql);

/* SYNTAXIS SQL - MYSQL */
$sql =<<<YHB

CREATE TABLE armaPermiso
(
id int  NOT NULL AUTO_INCREMENT,
nombres varchar(255) NOT NULL,
tipodoc varchar(255) NOT NULL,
documento varchar(255) NOT NULL,
nopermiso varchar(255) NOT NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM;

YHB;
$db->debug=false;
$db->Execute($sql);
$db->debug=true;
?>