<?php 
require_once (_DIRCORE. 'Autenticacion.class.php');
$salida = <<<YZU

<script>
function valida_envia(){ 
    var s = document.fvalida.email.value;
    var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/;
    //valido el nombre 
    if (document.fvalida.nombres.value.length==0){ 
       alert("Tiene que escribir el NOMBRE") 
       document.fvalida.nombres.focus() 
       return 0; 
    }
		if (document.fvalida.id.value.length==0){ 
       alert("Escriba la itentificación.") 
       document.fvalida.id.focus() 
       return 0; 
    } 
		if (document.fvalida.edad.value.length==0){ 
       alert("escriba la edad.") 
       document.fvalida.edad.focus() 
       return 0; 
    } 

		if (document.fvalida.telefono.value.length==0){ 
       alert("escriba un telefono.") 
       document.fvalida.telefono.focus() 
       return 0; 
    } 
	
		
	
if (!filter.test(s))
  {
       alert("El campo E-mail debe ser una dirección electrónica válida") 
       document.fvalida.email.focus() 
       return 0; 
  }	

    document.fvalida.submit();
	} 

</script>


YZU;
if ((!isset($_POST['tipocita']) )):

$salida .= <<<KBY

<style type="text/css">
<!--
.Estilo1 {color: #996600;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo10 {font-size: 18px}
.Estilo14 {	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
	color: #FF0000;
	font-weight: bold;
}
-->
</style>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="688" align="center" valign="top">
        <form action="" method="post" name="fvalida" id="fvalida">
          <table width="363" border="10
	" align="center" bordercolor="#FFFFFF" bgcolor="#B40300">
            <tr>
              <th colspan="2" scope="col"><strong><font color="#FFFFFF" size="3" face="Verdana, Arial, Helvetica, sans-serif">Solicitar Cita Medica</font></strong></th>
            </tr>
            <tr>
              <td width="104"><span class="Estilo10"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre y Apellidos</strong></font></span></td>
              <td width="243"><input name="nombres" type="text" id="nombres" size="50" /></td>
            </tr>
            <tr>
              <td><span class="Estilo10"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Tipo de Afiliado </strong></font></span></td>
              <td><select name="afiliado" id="afiliado">
                  <option selected="selected">BENEFICIARIO</option>
                  <option>COTIZANTE</option>
              </select></td>
            </tr>
            <tr>
              <td><span class="Estilo10"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">No de Identicaci&oacute;n </font></strong></span></td>
              <td><input name="id" type="text" id="id" /></td>
            </tr>
            <tr>
              <td><span class="Estilo10"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tipo de Identificaci&oacute;n</font></strong></span></td>
              <td><select name="tipoid" id="tipoid">
                  <option selected="selected">Cedula</option>
                  <option>Tarjeta de Identidad</option>
                  <option>Registro Civil</option>
              </select></td>
            </tr>
            <tr>
              <td><span class="Estilo10"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Edad</font></strong></span></td>
              <td><input name="edad" type="text" id="edad" size="10" maxlength="2" /></td>
            </tr>
            <tr>
              <td><span class="Estilo10"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Telefono</font></strong></span></td>
              <td><input name="telefono" type="text" id="telefono" /></td>
            </tr>
            <tr>
              <td><span class="Estilo1"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>E-mail</strong></font></span></td>
              <td><input name="email" type="text" id="email" size="50" /></td>
            </tr>
            <tr>
              <td><span class="Estilo10"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Motivo</font></strong></span></td>
              <td><select name="motivo" id="motivo">
                  <option selected="selected">Control</option>
                  <option>Por Primera Vez</option>
              </select></td>
            </tr>
            <tr>
              <td><span class="Estilo10"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Sexo</font></strong></span></td>
              <td><select name="sexo" id="sexo">
                  <option selected="selected">Masculino</option>
                  <option>Femenino</option>
              </select></td>
            </tr>
            <tr>
              <td><span class="Estilo10"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre del Medico </font></strong></span></td>
              <td><input name="medico" type="text" id="medico"size="50" /></td>
            </tr>
            <tr>
              <td><span class="Estilo10"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre de la Unidad a la que pertenece </font> </strong></span></td>
              <td><input name="unidad" type="text" id="unidad"size="50" /></td>
            </tr>
            <tr>
              <td><span class="Estilo10"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tipo de Cita </font></strong></span></td>
              <td><select name="tipocita" id="tipocita">
                  <option selected="selected">MEDICA</option>
                  <option>ODONTOLOGICA</option>
                  <option>ESPECIALISTA</option>
              </select></td>
            </tr>
            <tr>
              <td><span class="Estilo1"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Observac&oacute;n</strong></font></span></td>
              <td><span class="Estilo1">
                <textarea name="observa" cols="32" rows="6" id="observa"></textarea>
              </span></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center"><span class="Estilo1"></span><span class="Estilo1">
                  <input name="button" type="button" onclick="valida_envia()" value="Enviar &gt;&gt;&gt;" />
              </span></div></td>
            </tr>
          </table>
        </form>
		
</td>
  </tr>
  <tr>
    <td height="3"></td>
  </tr>
  <tr>
    <td height="30" valign="top"><div align="justify"><span class="Estilo14">Favor
      verificar que el correo electr&oacute;nico este bien escrito
      y activo ya que por este medio se le confirmara la cita</span></div></td>
  </tr>
  <tr>
    <td height="18"></td>
  </tr>
  <tr>
    <td height="20" valign="top"><p class="Estilo14">Las citas&nbsp; solicitadas despu&eacute;s de las 11:30 AM&nbsp; ser&aacute;n contestadas el d&iacute;a siguiente h&aacute;bil.</p></td>
  </tr>
  <tr>
    <td height="81">&nbsp;</td>
  </tr>
</table>

KBY;


else:
    
    //Estoy recibiendo el formulario, compongo el cuerpo 
    $cuerpo = "Formulario enviado\n"; 
	$_POST["nombres"]= Autenticacion::secureSQL($_POST["nombres"],'');
    $cuerpo .= "Nombre: " . $_POST["nombres"] . "\n"; 
    $_POST["afiliado"]= Autenticacion::secureSQL($_POST["afiliado"],'');
    $cuerpo .= "Tipo de afiliado: " . $_POST["afiliado"] . "\n"; 
    $cuerpo .= "Numero de itentificaci&oacute;n: " . $_POST["id"] . "\n"; 
	$cuerpo .= "Tipo de itentificaci&oacute;n: " . $_POST["tipoid"] . "\n"; 
	$_POST["edad"]= Autenticacion::secureSQL($_POST["edad"],'');
	$cuerpo .= "Edad: " . $_POST["edad"] . "\n"; 
	$cuerpo .= "Motivo: " . $_POST["motivo"] . "\n"; 
	$cuerpo .= "Email: " . $_POST["email"] . "\n"; 
    $_POST["telefono"]= Autenticacion::secureSQL($_POST["telefono"],'');
	$cuerpo .= "Telefono: " . $_POST["telefono"] . "\n"; 		
	$cuerpo .= "Sexo: " . $_POST["sexo"] . "\n"; 
	$_POST["medico"]= Autenticacion::secureSQL($_POST["medico"],'');
	$cuerpo .= "Nombre del Medico : " . $_POST["medico"] . "\n"; 
	$_POST["unidad"]= Autenticacion::secureSQL($_POST["unidad"],'');
	$cuerpo .= "Nombre de la Unidad a la que pertenece: " . $_POST["unidad"] . "\n"; 
    $cuerpo .= "Tipo de Cita: " . $_POST["tipocita"] . "\n"; 
	$_POST["observa"]= Autenticacion::secureSQL($_POST["observa"],'');
	$cuerpo .= "Observaciones: " . $_POST["observa"] . "\n"; 
				   

    //mando el correo... 
    mail("dispensario@decimaprimerabrigada.mil.co","Formulario recibido",$cuerpo); 

    //doy las gracias por el env&iacute;o 
$salida = "<p>Gracias por rellenar el formulario. Se ha enviado correctamente.</p>"; 
endif; 

return $salida;
?>
