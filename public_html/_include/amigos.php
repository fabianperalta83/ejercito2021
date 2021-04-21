<?

global $db;

$smarty = new Smarty_Plantilla;
if( $_REQUEST['Nombres']!="" && $_REQUEST['Apellidos']!="" && $_REQUEST['email']!="" ){
  if($_REQUEST['Celular']==""){
    $query = sprintf("INSERT INTO amigos (nombres, apellidos, email, cumpleanos, fecha_insercion) VALUES ('%s', '%s', '%s', '%s', now())",
                     mysql_real_escape_string($_REQUEST['Nombres']),
                     mysql_real_escape_string($_REQUEST['Apellidos']),
                     mysql_real_escape_string($_REQUEST['email']),
                     mysql_real_escape_string($_REQUEST['date']));
  
  } else {
    $query = sprintf("INSERT INTO amigos (nombres, apellidos, email, telefono_movil, cumpleanos, fecha_insercion) VALUES ('%s', '%s', '%s', '%s', '%s', now())",
                     mysql_real_escape_string($_REQUEST['Nombres']),
                     mysql_real_escape_string($_REQUEST['Apellidos']),
                     mysql_real_escape_string($_REQUEST['email']),
                     mysql_real_escape_string($_REQUEST['Celular']),
                     mysql_real_escape_string($_REQUEST['date']));
  }

  $resultado = $db->Execute($query);

  if($resultado==false) {
    $errorMsg=split(" ", $db->ErrorMsg());	
    if($errorMsg[0]=="Duplicate" && $errorMsg[1]=="entry"){
      if($errorMsg[5]=="'uniqueTelefono_movil'")
	$mensaje=": el celular $errorMsg[2] ya se encontraba en la base de datos";			
      else if($errorMsg[5]=="'uniqueEmail'")
	$mensaje=": el e-mail $errorMsg[2] ya se encontraba en la base de datos";
    }
	
    $smarty->assign('mensaje',"Se produjo un error y sus datos no pudieron ser ingresados$mensaje");	
  } else
    $smarty->assign('mensaje',"Sus datos fueron exitosamente ingresados");
  
} else {
        $smarty->assign('mensaje',"Error: su navegador no soporta JavaScript!");
}
return $smarty->fetch('tpl_amigos.html');

?>[