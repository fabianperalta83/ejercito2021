<?php

$esquema_Aplicacion = "";

$nombreAplicacion    = "partePersonal";
$ubicacion           = "_include/$nombreAplicacion";
$puntodeinstalacion  = 165462475;
$categorias["inicio"] = array
              ("nombre"=>"Parte Pruebas",
               "descripcion"=>"partePersonal.php",
               "activa"=>"1",
               "iddisplay"=>"3",
               "fecha1"=>"'".date("Y-m-d")."'"
              );
              
$categorias["administracion"] = array
              ("nombre"=>"Administración Parte Pruebas",
               "descripcion"=>"ayudantia_general.php",
               "activa"=>"1",
               "iddisplay"=>"3",
               "fecha1"=>"'".date("Y-m-d")."'",
               "idpadre"=>"inicio"
              );
            
$categorias["reporte"] = array
              ("nombre"=>"Reporte Parte Pruebas",
               "descripcion"=>"reportePartePersonalDependencia.php",
               "activa"=>"1",
               "iddisplay"=>"3",
               "fecha1"=>"'".date("Y-m-d")."'",
               "idpadre"=>"inicio"
              );



?>