<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 20:01:08
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuGaleriaVideo.html" */ ?>
<?php /*%%SmartyHeaderCode:1963678093602f3ea237c015-83015209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebe659a317d8247141d360dda09af2c936aad8ae' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuGaleriaVideo.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1963678093602f3ea237c015-83015209',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602f3ea24223c8_65815258',
  'variables' => 
  array (
    'subMenu' => 0,
    'verMas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602f3ea24223c8_65815258')) {function content_602f3ea24223c8_65815258($_smarty_tpl) {?>


<link href="<?php echo @_DIRJS;?>
cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />
<link href="<?php echo @_DIRJS;?>
cubeportfolio/css/portfolio.min.css" rel="stylesheet" type="text/css" />


<div id="js-grid-juicy-projects" class="cbp" style="height: 300px!important;">
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
	 <?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['tipo']=='youtube'){?>
	    <div class="cbp-item web-design graphic">
	        <div class="cbp-caption" style="height: 250px">
	            <div class="cbp-caption-defaultWrap">
               		<div style="background: url('<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
'); height:250px;"></div>
            	</div>
	            <div class="cbp-caption-activeWrap">
	                <div class="cbp-l-caption-alignCenter">
	                    <div class="cbp-l-caption-body">

                        	<a data-image="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
" href="<?php if ($_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['tipo']=='mp4'||$_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['tipo']=='flv'){?><?php echo @_URL;?>
<?php echo @_DIRRECURSOS_USER;?>
<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['descripcion'];?>
<?php }else{ ?>https://www.youtube.com/watch?v=<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idvideo'];?>
<?php }?>" class="cbp-lightbox btn btn-default text-uppercase wrap8" data-title="<?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
">Ver video</a>

	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="cbp-l-grid-projects-title uppercase text-center wrap8"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
</div>
	        <div class="cbp-l-grid-projects-desc uppercase text-center wrap8"><?php echo $_smarty_tpl->tpl_vars['subMenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['entradilla'];?>
</div>
	    </div>
	    <?php }?>
	<?php endfor; endif; ?>
</div>
<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>
    <?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>

<?php }?>

<!-- plugins gallery -->
<script src="<?php echo @_DIRJS;?>
cubeportfolio/js/jquery.cubeportfolio.js" type="text/javascript"></script>
<script src="<?php echo @_DIRJS;?>
cubeportfolio/js/portfolio-1.min.js" type="text/javascript"></script>

<!-- add on flv videos -->
<link rel="stylesheet" href="<?php echo @_DIRJS;?>
jPlayer-2.9.2/dist/skin/pink.flag/css/jplayer.pink.flag.min.css"/>
<script src="<?php echo @_DIRJS;?>
jPlayer-2.9.2/dist/jplayer/jquery.jplayer.min.js"></script>


<style>
	.fecha_titulo{
		font-size: 10px;
	}
	.col-md-3.prueba {
	    padding: 10px 0px 20px 0px;
	    margin-bottom: 20px;
	    text-align: center;
	    font-family: Roboto-Light;
	    color: #333;
	    border-bottom: 1px solid #706f2c;
	}

	.pie-foto{
		margin-top: 20px;
	}

	.pie-foto > a{
	    color: #000000;
	    margin-top:10px;
	}
</style>

	<style type="text/css">
		.pie-foto a {
		    color: #211f1f;
		    border-bottom: 1px solid #333;
		}

		.item_lista_video:hover p {
		     text-decoration: none; 
		}

		.pie-foto a:hover {
		    color: #c71521;
		}
		.pie-foto a strong{
		    color: #c71521;;
		}
	</style>

<?php }} ?>