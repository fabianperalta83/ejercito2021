<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:27:52
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuGaleria.html" */ ?>
<?php /*%%SmartyHeaderCode:1234877203602f2f43f054e9-77869481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '231353b9220193807cfc5673b45ddde4a98ecda0' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuGaleria.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1234877203602f2f43f054e9-77869481',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602f2f44036603_22764931',
  'variables' => 
  array (
    'subMenu' => 0,
    'verMas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602f2f44036603_22764931')) {function content_602f2f44036603_22764931($_smarty_tpl) {?><link href="<?php echo @_DIRCSS;?>
assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />
<link href="<?php echo @_DIRCSS;?>
assets/pages/css/portfolio.min.css" rel="stylesheet" type="text/css" />


<style>
    .cbp-caption,.cbp-caption-defaultWrap{
        height: 200px;
    }
    .cbp-caption-defaultWrap{
        background-repeat: no-repeat!important;
        background-position: center center!important;
        background-size: cover!important;
    }
    
</style>


<div id="js-grid-juicy-projects" class="cbp">
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['subMenu']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <div class="cbp-item graphic logos">
        <div class="cbp-caption">
            <div class="cbp-caption-defaultWrap" style="
            background: url('tools/microsThumb.php?w=300&src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
');
            ">
                <!-- <img src="tools/microsThumb.php?w=300&src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
" alt="<?php if (strlen($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['texto_alternativo'])>0){?><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['texto_alternativo'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
<?php }?>">  -->
            </div>
            <div class="cbp-caption-activeWrap">
                <div class="cbp-l-caption-alignCenter">
                    <div class="cbp-l-caption-body">
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
" class="cbp-l-caption-buttonLeft btn red uppercase btn red uppercase wrap8" >Informaci&oacute;n</a>
                        <a href="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase wrap8" data-title="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
<br><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['resumen'];?>
">Ver Imagen</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center wrap8"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
</div>
        <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center wrap8"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['antetitulo'];?>
</div>
    </div>
    <?php endfor; endif; ?>
</div>
<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>
    <?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>

<?php }?>
<!--Fin Template Galeria de Imagenes -->
<script src="<?php echo @_DIRCSS;?>
assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
<script src="<?php echo @_DIRCSS;?>
assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script><?php }} ?>