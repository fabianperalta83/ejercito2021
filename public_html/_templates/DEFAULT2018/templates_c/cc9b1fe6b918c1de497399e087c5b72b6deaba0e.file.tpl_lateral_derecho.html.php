<?php /* Smarty version Smarty-3.1.8, created on 2021-04-08 16:05:59
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_lateral_derecho.html" */ ?>
<?php /*%%SmartyHeaderCode:385957217602e1fe921dbc0-86365438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc9b1fe6b918c1de497399e087c5b72b6deaba0e' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_lateral_derecho.html',
      1 => 1617897949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '385957217602e1fe921dbc0-86365438',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e1fe923b931_60591157',
  'variables' => 
  array (
    'tipoCategoria' => 0,
    'menuSegNivel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e1fe923b931_60591157')) {function content_602e1fe923b931_60591157($_smarty_tpl) {?><script type="text/javascript">
	 $(document).ready(function(){
		/*if(localStorage.getItem("mostrar_Tbl_lateral")=="no")
	    {

	        $(".tabla_lateral1").css("display", "none");
	        localStorage.setItem("mostrar_Tbl_lateral", "si");
	    }*/

	   	var str = window.location.href;
		var n = str.indexOf("administra");
		if(n == -1)
		{
			//document.getElementById("demo").innerHTML ="no";
			$(".tabla_lateral1").css("display", "block");
		}
		else
		{
			
		}

	    
	    
     });
</script>

<?php if ($_smarty_tpl->tpl_vars['tipoCategoria']->value==22||$_smarty_tpl->tpl_vars['tipoCategoria']->value==21||$_smarty_tpl->tpl_vars['tipoCategoria']->value==20){?>
	<div class="col-md-12 col-lg-12" >
	    <div class="row div_left">
	        <div class="menuSegNivel">
	            <h2><?php echo @_ROT_MENU_USER;?>
</h2>
	            <div class="red_line"></div>
	            <ul class="lista_sencilla_menu">
	                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['link'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['link']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['name'] = 'link';
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuSegNivel']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['link']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['link']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['link']['total']);
?>       
	                    <li class="item<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['link']['index'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['link']['last']){?> style="border-bottom: 0;" <?php }?>>
	                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuSegNivel']->value[$_smarty_tpl->getVariable('smarty')->value['section']['link']['index']]['idcategoria'];?>
" class="wrap9">
	                            <?php echo $_smarty_tpl->tpl_vars['menuSegNivel']->value[$_smarty_tpl->getVariable('smarty')->value['section']['link']['index']]['nombre'];?>

	                        </a>
	                    </li>
	                <?php endfor; endif; ?>
	            </ul>       
	        </div>
	    </div>
	</div>
<?php }?>
<div class="row tabla_lateral1" style="display: none">
	
	<div class="col-md-12 col-lg-12" id="destacados-lateral">
		<div class="slide slide-destacados alto_contraste col-sm-12" >
			<div class="row" >
				<a href="https://www.reclutamiento.mil.co/" target="_blank">
					<div class="fonfo_destacado-lateral">
						<div class="" style="width:100%;"></div>
						<div class="img_dest1" style="height: 190px; width:250px;"></div>
						<div style="background-color: white;margin-top:-10px;padding-top:10px;">
						<div class="" style="background-color: #862024;height: 3px;width: 200px;margin-top:10px;margin-left: 20px;"></div>
						<?php if (@_EN_INGLES!=1){?>
	                        <div class="" style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">Incorporaci&oacute;n</div>
						
	                    
	                    <?php }else{ ?>
	                        <div class="" style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">Enlistment</div>
						
	                    <?php }?>


	                    </div>
					</div>
				</a>
			</div>
		</div>
		<div class="slide slide-destacados alto_contraste col-sm-12">
			<div class="row">
				<a href="https://www.ejercito.mil.co/informes_noticias/enterese_proceso_paz">
					<div class="fonfo_destacado-lateral">
						<div class="" style="width:100%;"></div>
						<div class="img_dest2" style="height: 190px; width:250px;"></div>
						<div style="background-color: white;margin-top:-10px;padding-top:10px;">
						<div class="" style="background-color: #862024;height: 3px;width: 200px;margin-top:10px;margin-left: 20px;"></div>
						
						<?php if (@_EN_INGLES!=1){?>
	                        <div  style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">Pedagog&iacute;a para la paz</div>
						
	                    
	                    <?php }else{ ?>
	                        <div  style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">Pedagogy for Peace</div>
						
	                    <?php }?>

						
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="slide slide-destacados alto_contraste col-sm-12">
			<div class="row">
				<a href="https://www.ejercito.mil.co/informes_noticias/habla_comandante">
					<div class="fonfo_destacado-lateral">
						<div class="" style="width:100%;"></div>
						<div class="img_dest3" style="height: 190px; width:250px;"></div>
						<div style="background-color: white;margin-top:-10px;padding-top:10px;">
						<div class="" style="background-color: #862024;height: 3px;width: 200px;margin-top:10px;margin-left: 20px;"></div>

						<?php if (@_EN_INGLES!=1){?>
	                        <div  style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">La voz del comandante</div>
						
	                    
	                    <?php }else{ ?>
	                        <div  style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">The Voice of the Comander</div>
						
	                    <?php }?>

						
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="slide slide-destacados alto_contraste col-sm-12">
			<div class="row">
				<a href="https://www.ejercito.mil.co/servicio_ciudadano/cumplimiento_sentencias">
					<div class="fonfo_destacado-lateral">
						<div class="" style="width:100%;"></div>
						<div class="img_dest4" style="height: 190px; width:250px;"></div>
						<div style="background-color: white;margin-top:-10px;padding-top:10px;">
						<div class="" style="background-color: #862024;height: 3px;width: 200px;margin-top:10px;margin-left: 20px;"></div>
						
						<?php if (@_EN_INGLES!=1){?>
	                        <div style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">Notificaciones judiciales</div>
						
	                    
	                    <?php }else{ ?>
	                       <div style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">Judical Notification's</div>
						
	                    <?php }?>


						
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="slide slide-destacados alto_contraste col-sm-12">
			<div class="row">
				<a href="http://www.pqr.mil.co/">
					<div class="fonfo_destacado-lateral">
						<div class="" style="width:100%;"></div>
						<div class="img_dest5" style="height: 190px; width:250px;"></div>
						<div style="background-color: white;margin-top:-10px;padding-top:10px;">
						<div class="" style="background-color: #862024;height: 3px;width: 200px;margin-top:10px;margin-left: 20px;"></div>

						<?php if (@_EN_INGLES!=1){?>
	                        <div  style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">Registre sus solicitudes</div>
						
	                    
	                    <?php }else{ ?>
	                       <div  style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">Submit your Request</div>
						
	                    <?php }?>
						
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="slide slide-destacados alto_contraste col-sm-12">
			<div class="row">
				<a href="https://www.clublancita.mil.co/" target="_blank">
					<div class="fonfo_destacado-lateral">
						<div class="" style="width:100%;"></div>
						<div class="img_dest6" style="height: 190px; width:250px;"></div>
						<div style="background-color: white;margin-top:-10px;padding-top:10px;">
						<div class="" style="background-color: #862024;height: 3px;width: 200px;margin-top:10px;margin-left: 20px;"></div>
						<?php if (@_EN_INGLES!=1){?>
	                        <div  style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">Soy lancita</div>
						
	                    
	                    <?php }else{ ?>
	                      <div  style="color:black;font-family: Roboto; margin-top: 7px; font-size: 1.2em; font-weight: bold;margin-left:20px;">Im Lancita</div>
						
	                    <?php }?>


						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>



	<script type="text/javascript">
		$(document).ready(function() {
		  // slick carousel
		  $('#destacados-lateral').slick({
		    autoplay: true,
		    speed: 4000,
        	autoplaySpeed: 3000,
		    dots: false,
		    vertical: true,
		    slidesToShow: 3,
		    slidesToScroll: 1,
		    verticalSwiping: true,
		    nextArrow: '<div class="slick-next right-slide-lateral"></div>',
          	prevArrow: '<div class="slick-prev left-slide-lateral"></div>',
		  });
		});
	</script>


<?php }} ?>