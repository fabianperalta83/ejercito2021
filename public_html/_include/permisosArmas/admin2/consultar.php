<style type="text/css">
<!--
.Estilo1 {font-family: "Berlin Sans FB"}
.Estilo15 {color: #4F4100}
.Estilo18 {font-size: 12px}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="60"><div align="center">
      <form name="fvalida" method="post" action="consultar.php">
        <table width="523" border="1" cellspacing="0" bordercolor="#FFFFFF">
          <tr>
            <td colspan="2"><div align="center">CONTRATACION</div></td>
          </tr>
          <tr>
            <td width="137">Nombres</td>
            <td width="306"><input name="nombres" type="text" id="nombres" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php if (isset($nombres)){ echo $nombres; } ?>" size="50" maxlength="80"></td>
          </tr>
          <tr>
            <?php 
				  $tpoid1[1]='Cedula';
				  $tpoid1[2]='Cedula de Extrangeria';
				  $tpoid1[3]='Pasaport';
				  
  				  $tpoid2[1]='CC';
				  $tpoid2[2]='CE';
				  $tpoid2[3]='PAS';
				  ?>
            <td>Tipo de Identificaci&oacute;n</td>
            <td><select name="tipoid" id="tipoid">
              <?php 
					for ($i=1;$i<4;$i++)
					{
						if (!isset($tipoid))
						{
						?>
              <option value="<?php echo $tpoid2[$i]; ?>"><?php echo $tpoid1[$i]; ?></option>
              <?php   
						}else
						{
						  if ($tipoid==$tpoid2[$i])
						  {
							 ?>
              <option value="<?php echo $tpoid2[$i]; ?>" selected><?php echo $tpoid1[$i]; ?></option>
              <?php  						
						  }else
						  {
						     ?>
              <option value="<?php echo $tpoid2[$i]; ?>"><?php echo $tpoid1[$i]; ?></option>
              <?php
						  }
						}
					}?>
            </select></td>
          </tr>
          <tr>
            <td>Identificaci&oacute;n </td>
            <td><span class="Estilo1">
              <input name="id" type="text" class="Estilo1" id="id"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if (isset($id)){ echo $id; } ?>" size="20" maxlength="20">
              <span class="Estilo15">
                <input type="hidden" name="pagina" value="1">
              </span></span></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center"><strong>Ejecutar Busqueda</strong>
                      <input type="submit" name="Submit" value="Consultar">
            </div></td>
          </tr>
        </table>
      </form>
      <table width="659" height="77" border="1" align="center" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFF7CE">
        <!--DWLayoutTable-->
        <tr>
          <th height="22" colspan="2" scope="col"><div align="center"><a href="crearpermiso.php">Crear Permiso </a></div></th>
          <th height="22" scope="col"><a href="eliminartodos.php">Eliminar todos los  Permiso </a></th>
          <th height="22" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</th>
          <th height="22" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</th>
          <th height="22" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</th>
        </tr>
        <tr>
          <th width="49" height="22" bgcolor="#FEE15C" scope="col"><span class="Estilo18">Tipo de Id </span></th>
          <th width="113" bgcolor="#FEE15C" scope="col"><span class="Estilo18">Identificaci&oacute;n</span></th>
          <th width="250" bgcolor="#FEE15C" scope="col"><span class="Estilo18">Nombres</span></th>
          <th width="88" bgcolor="#FEE15C" scope="col"><span class="Estilo18">Permiso</span></th>
          <th width="61" bgcolor="#FEE15C" scope="col"><span class="Estilo18">Mod</span></th>
          <th width="72" bgcolor="#FEE15C" scope="col"><span class="Estilo18">Eliminar</span></th>
        </tr>
        <?php
			  $TAMANO_PAGINA = 10; 
            if (!isset($pagina))
              { 
              $inicio = 0; 
              $pagina=1; 
              } 
            else { 
                $inicio = ($pagina - 1) * $TAMANO_PAGINA; 
             } 

     
            $consulta = " SELECT * 	FROM  t_permisos WHERE	1=1"; 
			$consulta_total = " select count(*) total FROM  t_permisos WHERE 1=1 ";
							
					if 	(isset($nombres))
					{
					if ((strlen($nombres)>0) && $nombres!=' ')
					{
					$consulta=$consulta." AND nombres like  '%$nombres%' " ;
					$consulta_total=$consulta_total." AND nombres like  '%$nombres%' " ;					
					}
					}
					
					if 	(isset($id))
					{
					if ((strlen($id)>0) && $id!=' ')
					{
					$consulta=$consulta." AND id=$id and tipoid = '$tipoid'" ;
					$consulta_total=$consulta_total." AND id=$id and tipoid='$tipoid' " ;					
					}
					}
					
					
					
							
			$consulta = $consulta." ORDER BY nombres DESC"  . " limit " . $inicio . "," . $TAMANO_PAGINA; 

			$consulta = mysql_query($consulta); 
			$consulta_total = mysql_query($consulta_total);
			$row2 = mysql_fetch_array($consulta_total) ;			
			$num_total_registros = $row2["total"];
            $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
			while($row = mysql_fetch_array($consulta))
			
  	         { 			
				 ?>
        <tr>
          <td bgcolor="#FEE15C"><span class="Estilo11 Estilo18"><strong><?php echo $row["tipoid"] ?></strong></span></td>
          <td bgcolor="#FEE15C"><span class="Estilo18"><strong><?php echo $row["id"] ?></strong></span></td>
          <td bgcolor="#FEE15C"><div align="left" class="Estilo18"><strong><?php echo $row["nombres"] ?></strong></div></td>
          <td bgcolor="#FEE15C"><span class="Estilo18"><strong><?php echo $row["nopermiso"] ?></strong></span></td>
          <td bgcolor="#FEE15C"><div align="center" class="Estilo18"><a href="modificapermiso.php?codpermiso=<?php echo $row["codpermiso"] ?>">F1</a></div></td>
          <td bgcolor="#FEE15C"><div align="center" class="Estilo18"><a href="eliminar.php?codpermiso=<?php echo $row["codpermiso"] ?>">***</a></div></td>
        </tr>
        <?php
				  
				  }
 		if ($num_total_registros==0)
		{
		print '
		<tr>
          <th height="22" colspan="4"  scope="col"><span class="Estilo8"><strong>No Existen Registros</strong></span></th>
        </tr>
		';
        }				  
				  ?>
        <tr>
          <td height="23" colspan="6" bgcolor="#FEE15C"><div align="right" class="Estilo18"><strong>Paginiaci&oacute;n :<a href="JavaScript:goToPage(1)">&lt;</a>
                      <?php
		  for($i=1;$i<=$total_paginas;$i++)
		  {
		  print '<a    href="JavaScript:goToPage('.$i.')">  '.$i.'  </a>';
		  }
		  ?>
                  <a href="JavaScript:goToPage('<?php echo $total_paginas ?>')">&gt;</a></strong></div></td>
        </tr>
      </table>
      <p align="right">&nbsp;</p>
      <p>&nbsp;</p>
    </div></td>
  </tr>
</table>
