<?php /* Smarty version Smarty-3.1.8, created on 2021-02-18 08:06:00
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_navegacion_institucional.html" */ ?>
<?php /*%%SmartyHeaderCode:1543968246602e1fe8d87758-96050255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d790bee12318755be282a7c7bf44f5ca873cd2e' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_navegacion_institucional.html',
      1 => 1613603961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1543968246602e1fe8d87758-96050255',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'countmenuInstitucional' => 0,
    'idsmenu' => 0,
    'menuInstitucional' => 0,
    'imagen_ayuda' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e1fe8dea316_89199246',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e1fe8dea316_89199246')) {function content_602e1fe8dea316_89199246($_smarty_tpl) {?><!--<nav class="navbar navbar-institucional" style="margin-left: -400px;margin-right: -384px;">-->     <!-- NAVBAR ORIGINAL -->
<nav class="navbar navbar-institucional">
<!--    <nav class="navbar navbar-institucional" style="margin-left: -400px;margin-right: -381px;">  AJUSTE ANCHO NAVBAR 14/05/2019 -->
    <div class="hidden-sm hidden-xs collapse navbar-collapse" id="bs-example-navbar-collapse-2">
        <input type="hidden" id="maxMenuIns" name="maxMenuIns" value="<?php echo $_smarty_tpl->tpl_vars['countmenuInstitucional']->value;?>
">
        <input type="hidden" id="idsmenu" value="<?php echo $_smarty_tpl->tpl_vars['idsmenu']->value;?>
">
        <ul class="nav nav-pills nav-justified nav-ul-institucional" id="menu2">
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuInstitucional']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['total']);
?>
                <?php if ($_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria']!=@_SUTILIDADES){?>
                    <!-- <li class="dropdown text-left"> --> <!-- LI CLAS ORIGINAL -->
                        <li class="dropdown text-left">     <!-- AJUSTE CENTRADO DE MENU 14/05/2019 -->
                        <div id="div<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
" class="dropdown-menu-hijos" style="display: none;" onmouseleave="ocultarSubMenu('div'+<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
)">
                            <div style="min-height: 200px;">
                                <img class="img-dropdown" src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo @_AYUDA_ACCESIBILIDAD;?>
/<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
.gif&w=140" alt="<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
">
                            </div>
                        </div>
                        <?php $_smarty_tpl->tpl_vars["imagen_ayuda"] = new Smarty_variable((@_DIRIMAGES_USER).(@_AYUDA_ACCESIBILIDAD)."/".($_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria']).".gif", null, 0);?> 
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
" class="dropdown-toggle top_link" data-hover="dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" 
                        <?php if (file_exists($_smarty_tpl->tpl_vars['imagen_ayuda']->value)){?> onmouseover="mostrarSubMenu('div'+<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
)" onkeyup="mostrarSubMenu('div'+<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
)" <?php }?> onmouseleave="ocultarSubMenu('div'+<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
)">
                            <?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>

                        </a>
                        <ul class="sub dropdown-menu dropdown-institucional">
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['name'] = 'myhijos';
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total']);
?>
                                <li <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['last']){?> style="border: 0;" <?php }?>>
                                    <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['nombre'];?>

                                    </a>
                                </li>
                            <?php endfor; endif; ?>
                        </ul>
                    </li>
                <?php }?>
            <?php endfor; endif; ?>
        </ul>
    </div>
</nav>

    <script type="text/javascript">
        function mostrarSubMenu(idcategoria){
            var str = document.getElementById("idsmenu").value;
            var arreglo = str.split("-");

            for (var i = 0; i < arreglo.length; i+=1) {
                if(idcategoria == "div"+arreglo[i]){
                    $('#div'+arreglo[i]).css('display','block');
                }else{
                    $('#div'+arreglo[i]).css('display','none');
                }
            }
        }
        function ocultarSubMenu(idcategoria){
            $('#'+idcategoria).css('display','none');
        }
    </script>
<?php }} ?>