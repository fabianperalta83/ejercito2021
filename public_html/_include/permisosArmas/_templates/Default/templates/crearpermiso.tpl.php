{literal}
<style type="text/css">
<!--
.Estilo1 {font-family: "Berlin Sans FB"}
-->
</style>
{/literal}
 

<form name="form1" method="post" action="">
<input type="hidden" name="id" value='{$permiso.id}'/>
<table>
  <thead>
    <tr>
    <th colspan="2">Nuevo Permiso</th>
  </tr>
  </thead>

  <tr>
    <td>Nombres</td>
    <td><input name="nombres" type="text" id="nombres" onChange="" size="50" maxlength="100" value="{$permiso.nombres}"></td>
  </tr>
  <tr>
    <td>Tipo Identificación</td>
    <td>    
    <select name="tipodoc" id="tipodoc">
    {foreach name=tipodoc key=tipo item=tipoDoc from=$tiposDocumento}
        <option value='{$tipo}' {if $permiso.tipodoc == $tipo}selected='selected'{/if}>{$tipoDoc}</option> 
    {/foreach}
     </select>
   </td>
  </tr>
  <tr>
    <td>Identificación</td>
    <td><input name="documento" type="text" class="Estilo1" id="id"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" size="20" maxlength="20" value="{$permiso.documento}"></td>
  </tr>
  <tr>
    <td>No Permiso</td>
    <td>
    <input name="nopermiso" type="text" id="nopermiso" onChange="javascript:this.value=this.value.toUpperCase();" maxlength="20" value="{$permiso.nopermiso}"/>
    </td>
  </tr>
  <tr>
    <td><input type="submit" name="accion" value="Adicionar"/>
        <input type="submit" name="accion" value="Cancelar" />
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>