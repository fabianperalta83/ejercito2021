<style type="text/css">
<!--
.Estilo1 {font-family: "Berlin Sans FB"}
-->
</style>
<div align="center">
  <form name="form1" method="post" action="consultar.php">
    <input type="submit" name="Submit22" value="Volver">
  </form>
  <form action="guardar.php" method=post name="fvalida" id="fvalida">
    <table width="90%" border="1" cellspacing="0" bordercolor="#006600">
      <tr>
        <td colspan="2" bordercolor="#996600" bgcolor="#FFF8E8"><div align="center">Ingresar Permisos </div></td>
      </tr>
      <tr>
        <td width="33%" bordercolor="#996600" bgcolor="#FFF8E8"><div align="left">Nombres</div></td>
        <td width="67%" bordercolor="#996600" bgcolor="#FFF8E8"><div align="left">
          <input name="nombres" type="text" id="nombres" onChange="javascript:this.value=this.value.toUpperCase();" size="50" maxlength="100">
        </div></td>
      </tr>
      <?php
				  $tpoid1[1]='Cedula';
				  $tpoid1[2]='Cedula de Extrangeria';
				  $tpoid1[3]='Pasaport';
  				$tpoid2[1]='CC';
				  $tpoid2[2]='CE';
				  $tpoid2[3]='PAS';
				  ?>
      <tr>
        <td bordercolor="#996600" bgcolor="#FFF8E8"><div align="left">Tipo de Identificaci&oacute;n</div></td>
        <td bordercolor="#996600" bgcolor="#FFF8E8"><div align="left">
          <select name="tipoid" id="tipoid">
            <?php
						for ($i=1;$i<4;$i++)
						{
              printf("<option value=%s>%s</option>",$tpoid2[$i],$tpoid1[$i]);
						}
						?>
          </select>
        </div></td>
      </tr>
      <tr>
        <td bordercolor="#996600" bgcolor="#FFF8E8"><div align="left">Identificaci&oacute;n </div></td>
        <td bordercolor="#996600" bgcolor="#FFF8E8"><div align="left"><span class="Estilo1">
          <input name="id" type="text" class="Estilo1" id="id"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" size="20" maxlength="20">
        </span></div></td>
      </tr>
      <tr>
        <td bordercolor="#996600" bgcolor="#FFF8E8"><div align="left">No Permiso </div></td>
        <td bordercolor="#996600" bgcolor="#FFF8E8"><div align="left">
          <input name="nopermiso" type="text" id="nopermiso" onChange="javascript:this.value=this.value.toUpperCase();" maxlength="20">
        </div></td>
      </tr>
      <tr>
        <td colspan="2" bordercolor="#996600" bgcolor="#FFF8E8"><div align="center"><span class="Estilo1">
          <input name="button" type="button" onclick="valida_envia()" value="Enviar &gt;&gt;&gt;">
        </span></div>
            <div align="center"></div></td>
      </tr>
    </table>
  </form>
  <form name="form1" method="post" action="consultar.php">
    <input type="submit" name="Submit2" value="Volver">
  </form>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
</div>
