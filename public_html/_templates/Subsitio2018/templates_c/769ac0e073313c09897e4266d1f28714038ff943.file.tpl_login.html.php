<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 19:27:04
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_login.html" */ ?>
<?php /*%%SmartyHeaderCode:2033836989602f2502151b21-13833941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '769ac0e073313c09897e4266d1f28714038ff943' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_login.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2033836989602f2502151b21-13833941',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602f2502296379_65717719',
  'variables' => 
  array (
    'subMenuError' => 0,
    'c_formulario_titulo' => 0,
    'c_action' => 0,
    'campos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602f2502296379_65717719')) {function content_602f2502296379_65717719($_smarty_tpl) {?><head>
    	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    	<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
    	
    	<script type="text/javascript">
    		

    		/* $(window).load(
            function(){
    		 	alert("hola234");
    		 	var element = document.getElementById("usuario");
    		 	alert(document.getElementById("usuario").text);
    		 	//document.getElementById("usuario").value="";
    		 	//document.getElementById("password").value="";
    		  });*/

    		  function myfunction4(){
    		  	 //document.forma1.target.value = "_self";
            	//document.forma1.accion.value = "/login";
            	if(document.getElementById("usuario").value == "" || document.getElementById("password").value == "")
            	{
            		//alert("Favor llenar Usuario o password");
            		//swal("ADVERTENCIA", "Favor llenar Usuario o password !", "warning");
            		swal({
					  title: "ADVERTENCIA",
					  text: "Favor llenar Usuario o password.",
					  icon: "warning",
					  button: "Aceptar",
					});
            	}
            	else
            	{
            		if(grecaptcha && grecaptcha.getResponse().length > 0)
					{
					     //the recaptcha is checked
					     // Do what you want here
					     document.forma1.submit();
					}
					else
					{
					    //The recaptcha is not cheched
					    //You can display an error message here
					    //alert('Oops, favor llenar recaptcha !');
					    //swal("ADVERTENCIA", "Favor llenar recaptcha !", "warning");
					    swal({
						  title: "ADVERTENCIA",
						  text: "Por favor recuerde validar el reCatcha.",
						  icon: "warning",
						  button: "Aceptar",
						});
					}


            		
            	}
            	
    		  }
    	</script>
	</head>

<!--Template Formulario de Login-->
<div id="utilidades" class="row">
	<?php if ($_smarty_tpl->tpl_vars['subMenuError']->value!=''){?>
		<div class="advertencia"><br><?php echo $_smarty_tpl->tpl_vars['subMenuError']->value;?>
<br></div>
	<?php }?>

	<div><br><?php echo $_smarty_tpl->tpl_vars['c_formulario_titulo']->value;?>
<br></div>

	<form method="POST" name="forma1" action="<?php echo $_smarty_tpl->tpl_vars['c_action']->value;?>
" target="_self" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" autocomplete="off" style="padding: 15px 0;">
		<div class="row">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['campos']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']!=''){?><div class="col-md-12 col-xs-12 col-lg-12 col-sm-12"><?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['clase']=="requerido"){?><strong><?php }?><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
<?php if ($_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['clase']=="requerido"){?></strong><?php }?></div><div class="col-md-12 col-xs-12 col-lg-12 col-sm-12"><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['campos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['input'];?>
<?php }?>
			<?php endfor; endif; ?>	
		</div>
		<!--<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
			<input type="submit" value="Ingresar" class="btn" title="login" />
		</div>-->

	</form>
	<input type="button" onclick="myfunction4()" value="Ingresar" class="btn" title="login" style="background: rgb(235,235,235); max-width:200px;" />
</div>
<!--Fin Template Formulario de Login-->

<?php }} ?>