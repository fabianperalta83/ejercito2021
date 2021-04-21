{literal}
<style>
.lista 
{
font-weight:normal;
font-size:1em;
margin: 3px auto;
}
.lista thead th, .lista thead, .lista thead tr
{
background-color:#A10100;
color:#FFFFFF;
font-weight:bold;
text-align:center;
font-size:1.1em;
}

.lista tbody th
{
background-color:#A10100;
color:#FFFFFF;
}

.lista .fuerte,.fuerte 
{
background-color:#AAAAAA;
}

.lista .suave,.suave 
{
background-color:#CCCCCC;
}

.encontrado
{
font-weight:bold;
}

</style>
{/literal}

<div style="margin:0 auto;text-align:center">
<form id="form_solicitud" name="form_solicitud" action="" method="get">

      <input type="hidden"  name="idcategoria" value="{$idcategoria}" />
      <input type="input"  name="busqueda" value="{$busqueda}" />
      <input type="submit" name="accion" value="Buscar" />
 </form>
</div>

<div style="margin:0 auto;text-align:center">

	<div style="margin:5px 0px;text-align:center">
	
      
     <form id="form_solicitud" name="form_solicitud" action="" method="post">
      <input type="submit" name="accion" value="Nuevo" />
      
	
	</div>
<div style="margin:5px 0px;text-align:center">

<table class="lista" cellspacing="1">
  <thead>
    <tr>
    <th colspan="{$totalColumnas}">Permisos</th>
  </tr>
  </thead>

  {foreach from=$armaPermisos item=permiso name=muestraPermisos}
  
  {if $smarty.foreach.muestraPermisos.first}
  <tr>
    {foreach from=$permiso key=titulo item=valor}
    <th>{$titulo}</th>
    {/foreach}
    {foreach from=$accionesPermiso item=accionP name=accionesC}
    {/foreach}
    <th colspan='{$smarty.foreach.accionesC.total}'>Acciones</th>
  </tr>   
  {/if}
  
  <tr  class="{cycle values="fuerte,suave"}" >    
    {foreach from=$permiso item=campo}
    <td>{$campo}</td>
    {/foreach}
    
    {foreach from=$accionesPermiso item=accionP}
    <td><a href="?idcategoria={$idcategoria}&accion={$accionP}&id={$permiso.id}"><img src="{$smarty.const._DIRIMAGES_ADMIN}btn_{$accionP}.jpg" alt="{$accionP}" title="{$accionP}" {if $accionP == 'eliminar'} onclick="return confirmDelete(this)"{/if}></a></td>
    {/foreach}
    
  </tr> 
  {/foreach}
  
  
</table>
{literal}
<script language="JavaScript" type="text/javascript">
  function confirmDelete(anchor)
  {
    if (confirm('Esta seguro de querer borrar el permiso?'))
    {
      anchor.href += '&confirm=1';
      return true;
    }
    return false;
  }
</script>
{/literal}
</div>
	<!-- Paginacion -->
	<div class="paginacion">
		<input type="hidden" name="pag" value="">
		{if $paginas.previousPage != ''}
			<a href="?idcategoria={$idcategoria}&pag={$paginas.previousPage}{$opciones}">&laquo; Anterior</a>&nbsp;
		{/if}
		{if $paginas.pags}
			{section name=idPag loop=$paginas.pags}
				{if $paginas.actualPage != $paginas.pags[idPag]}
					&nbsp;<a href="?idcategoria={$idcategoria}&pag={$paginas.pags[idPag]}{$opciones}">{$paginas.pags[idPag]}</a>&nbsp;
				{else}
					&nbsp;{$paginas.pags[idPag]}&nbsp;
				{/if}
			{/section}
		{/if}
		{if $paginas.nextPage != ''}
			&nbsp;<a href="?idcategoria={$idcategoria}&pag={$paginas.nextPage}{$opciones}">Siguiente &raquo;</a>
		{/if}
	</div>
</div>