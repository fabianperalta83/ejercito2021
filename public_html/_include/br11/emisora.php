<?php
require_once (_DIRCORE. 'Autenticacion.class.php');
$salida = <<<ZCK

<script>
function valida_envia(){ 
     var s = document.fvalida.email.value;
    var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/;

	if (document.fvalida.nombre.value.length==0){ 
       alert("Falta el Nombre") 
       document.fvalida.nombre.focus() 
       return 0; 
    } 
	if (!filter.test(s))
  {
       alert("El campo E-mail debe ser una dirección electrónica válida") 
       document.fvalida.email.focus() 
       return 0; 
  }	
  	if (document.fvalida.coment.value.length==0){ 
       alert("Falta el Comentario") 
       document.fvalida.coment.focus() 
       return 0; 
    }
    document.fvalida.submit();
	} 
</script>

ZCK;

if (!isset($_POST['emisorabr11'])):
$salida .= <<<YZB

<style type="text/css">
<!--
.Estilo13 {color: #FFFFFF; font-weight: bold; }
.Estilo5 {color: #FFFFFF}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="476" height="20">&nbsp;</td>
  </tr>
  <tr>
    <td height="380" align="center" valign="top">


        <form action="" method="post" name="fvalida" id="fvalida">
		<input type='hidden' name='emisorabr11' value ='emisorabr11'>
          <table width="339" border="10" align="center" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#B40300">
            <tr>
              <th colspan="2" scope="col"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Redacte su Mensaje </font></strong></th>
            </tr>
            <tr>
              <td><span class="Estilo13">Nombre</span></td>
              <td><input name="nombre" type="text" size="40" /></td>
            </tr>
            <tr>
              <td><span class="Estilo13">Email</span></td>
              <td><span class="Estilo5">
                <input type="text" name="email" size="40" />
              </span></td>
            </tr>
            <tr>
              <td><span class="Estilo13">Comentario</span></td>
              <td><span class="Estilo5">
                <textarea name="coment" cols="40" rows="10"></textarea>
              </span></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center"><span class="Estilo5"></span><span class="Estilo5">
                  <input name="button" type="button" onclick="valida_envia()" value="Enviar" />
              </span></div></td>
            </tr>
          </table>
        </form>
</td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
  </tr>
</table>


YZB;

else:
    //Estoy recibiendo el formulario, compongo el cuerpo 
    $cuerpo = "Formulario enviado\n"; 
	$_POST["nombre"]= Autenticacion::secureSQL($_POST["nombre"],'');
    $cuerpo .= "Nombre: " . $_POST["nombre"] . "\n"; 
    $cuerpo .= "Email: " . $_POST["email"] . "\n"; 
    $_POST["coment"]= Autenticacion::secureSQL($_POST["coment"],'');
    $cuerpo .= "Comentarios: " . $_POST["coment"] . "\n"; 

    //mando el correo... 
    mail("emisora@decimaprimerabrigada.mil.co","Formulario recibido",$cuerpo); 

    //doy las gracias por el env&iacute;o 
$salida = "<p>Gracias por rellenar el formulario. Se ha enviado correctamente.</p>"; 
endif;
return $salida;
?>