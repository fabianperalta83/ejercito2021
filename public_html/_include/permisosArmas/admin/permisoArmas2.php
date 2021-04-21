<style type="text/css">
	<!--
	.Estilo2 {font-family: "Berlin Sans FB"}
	.Estilo4 {color: #FF0000;
		font-weight: bold;
	}
	.Estilo5 {color: #996600;
		font-size: 14px;
	}
	-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<!--DWLayoutTable-->
  	<tr>
    	<td width="30" height="30" valign="top"><script type="text/javascript">
			AC_FL_RunContent( 'codebase',												 											'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','30','height','30','src','../flas2/estrella','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flas2/estrella' ); //end AC code
</script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="30" height="30">
          <param name="movie" value="../flas2/estrella.swf">
          <param name="quality" value="high">
          <embed src="../flas2/estrella.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="30" height="30"></embed>
        </object>
        </noscript></td>
    <td width="493" align="center" valign="middle" bgcolor="#996600"><img src="../imagenes/titulos/permiso_armas.png" width="450" height="30"></td>
    <td width="30" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','30','height','30','src','../flas2/estrella','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flas2/estrella' ); //end AC code
</script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="30" height="30">
          <param name="movie" value="../flas2/estrella.swf">
          <param name="quality" value="high">
          <embed src="../flas2/estrella.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="30" height="30"></embed>
        </object>
        </noscript></td>
  </tr>
  <tr>
    <td height="59">&nbsp;</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="453" colspan="3" align="center" valign="top"><form name="form1" method="post" action="">
      <p>&nbsp;</p>
      <table width="80%" border="1" align="center" cellspacing="0" bordercolor="#006600">
        <tr>
          <td bordercolor="#996600" bgcolor="#F0F0DB">Tipo de Identificacion </td>
          <td bordercolor="#996600" bgcolor="#F0F0DB"><div align="center">
            <select name="tipoid" id="tipoid">
              <option value="CC">Cedula</option>
              <option value="CE">Cedula de Extrangeria</option>
              <option value="PAS">Pasaporte</option>
            </select>
          </div></td>
        </tr>
        <tr>
          <td width="39%" bordercolor="#996600" bgcolor="#F0F0DB">Identificacion </td>
          <td width="61%" bordercolor="#996600" bgcolor="#F0F0DB"><div align="center"><span class="Estilo2">
            <input name="id" type="text" class="Estilo2" id="id"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" size="20" maxlength="20">
          </span></div></td>
        </tr>
        <tr>
          <td colspan="2" bordercolor="#996600" bgcolor="#F0F0DB"><div align="center">
            <input type="submit" name="Submit" value="Consultar">
          </div></td>
        </tr>
      </table>
      <p align="center">
        <?php 
				if (isset($id))
				{
				
				  $sql1="select * from t_permisos
				         where tipoid='$tipoid' and id='$id'";
				  $m_sql1 = mysql_query($sql1);	 
				  $total_t=mysql_num_rows($m_sql1);
				  
				  if ($total_t > 0)
				  {
				  $r_sql1 = mysql_fetch_array($m_sql1)
				?>
        &nbsp;</p>
      <hr>
      <table width="80%" border="1" align="center" cellspacing="0" bordercolor="#006600">
        <tr>
          <td colspan="2"><div align="center" class="Estilo5"><?php echo $r_sql1["tipoid"].' '.$r_sql1["id"].':'.$r_sql1["nombres"]; ?></div>
                <div align="center"></div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">Permisos</div></td>
        </tr>
        <?php
				    $sql2="select * from t_permisos
				         where tipoid='$tipoid' and id='$id'";
				    $m_sql2 = mysql_query($sql2);	
				  	while($r_sql2 = mysql_fetch_array($m_sql2))				   
				  {
				   ?>
        <tr>
          <td width="39%">Numero:</td>
          <td width="61%"><?php echo $r_sql2["nopermiso"]; ?></td>
        </tr>
        <?php }?>
      </table>
      <p align="center">&nbsp;</p>
      <p>&nbsp;</p>
      <hr>
      <p align="center">
        <?php 
				}else
				{
				?>
        <span class="Estilo4">No hay permisos registrados con esta Identificaci&oacute;n</span>
        <?php
				}
				} 
				?>
        &nbsp;</p>
      <p align="center">&nbsp;</p>
      <p>&nbsp;</p>
    </form></td>
  </tr>
</table>
