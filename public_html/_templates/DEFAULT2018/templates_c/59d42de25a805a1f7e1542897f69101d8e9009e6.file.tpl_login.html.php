<?php /* Smarty version Smarty-3.1.8, created on 2021-02-26 19:12:47
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_login.html" */ ?>
<?php /*%%SmartyHeaderCode:12672814486039482f3733e7-62217958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59d42de25a805a1f7e1542897f69101d8e9009e6' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_login.html',
      1 => 1614366714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12672814486039482f3733e7-62217958',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subMenuError' => 0,
    'c_formulario_titulo' => 0,
    'c_action' => 0,
    'campos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_6039482f3ec027_20236503',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6039482f3ec027_20236503')) {function content_6039482f3ec027_20236503($_smarty_tpl) {?><!--Template Formulario de Login-->
 <head>
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
            		//swal("Favor llenar Usuario o password.","error");
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

					    //alert('Error, favor llenar recaptcha !');
					    //swal("Error, favor llenar recaptcha !");
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
    	<script>
			var ALERT_TITLE = "Error!";
			var ALERT_BUTTON_TEXT = "Ok";

			if(document.getElementById) {
			    window.alert = function(txt) {
			        createCustomAlert(txt);
			    }
			}

			function createCustomAlert(txt) {
			    d = document;

			    if(d.getElementById("modalContainer")) return;

			    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
			    mObj.id = "modalContainer";
			    mObj.style.height = d.documentElement.scrollHeight + "px";

			    alertObj = mObj.appendChild(d.createElement("div"));
			    alertObj.id = "alertBox";
			    //if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
			    //alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
			    alertObj.style.top = "25%";
			    alertObj.style.left = "35%";

			    alertObj.style.visiblity="visible";

			    h1 = alertObj.appendChild(d.createElement("h1"));
			    h1.appendChild(d.createTextNode(" "));

			    msg = alertObj.appendChild(d.createElement("p"));
			    //msg.appendChild(d.createTextNode(txt));
			    msg.style="font-size: 1.2em; margin:0px;"
			    msg.innerHTML = txt;

			    btn = alertObj.appendChild(d.createElement("a"));
			    btn.id = "closeBtn";
			    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
			    btn.href = "#";
			    btn.focus();
			    btn.onclick = function() { removeCustomAlert();return false; }

			    alertObj.style.display = "block";

			}

			function removeCustomAlert() {
			    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
			}
		</script>
    	<style>
			#modalContainer {
			    background-color:rgba(0, 0, 0, 0.3);
			    position:absolute;
			    width:100%;
			    height:100%;
			    top:0px;
			    left:0px;
			    z-index:10000;
			    background-image:url(tp.png); /* required by MSIE to prevent actions on lower z-index elements */
			}

			#alertBox {
			    position:relative;
			    width:300px;
			    min-height:100px;
			    margin-top:50px;
			    border:1px solid #666;
			    background-color:#fff;
			    background-repeat:no-repeat;
			    background-position:20px 30px;
			}

			#modalContainer > #alertBox {
			    position:fixed;
			}

			#alertBox h1 {
			    margin:0;
			    font:bold 0.9em verdana,arial;
			    background-color:#7C0808;
			    color:#FFF;
			    border-bottom:1px solid #000;
			    padding:2px 0 2px 5px;
			}

			#alertBox p {
			    font:0.7em verdana,arial;
			    height:50px;
			    padding-left:5px;
			    margin-left:55px;
			}

			#alertBox #closeBtn {
			    display:block;
			    position:relative;
			    margin:5px auto;
			    padding:7px;
			    border:0 none;
			    width:70px;
			    font:0.7em verdana,arial;
			    text-transform:uppercase;
			    text-align:center;
			    color:#FFF;
			    background-color:#7C0808;
			    border-radius: 3px;
			    text-decoration:none;
			}

			/* unrelated styles */

			#mContainer {
			    position:relative;
			    width:600px;
			    margin:auto;
			    padding:5px;
			    border-top:2px solid #000;
			    border-bottom:2px solid #000;
			    font:0.7em verdana,arial;
			}

			h1,h2 {
			    margin:0;
			    padding:4px;
			    font:bold 1.5em verdana;
			    border-bottom:1px solid #000;
			}

			code {
			    font-size:1.2em;
			    color:#069;
			}

			#credits {
			    position:relative;
			    margin:25px auto 0px auto;
			    width:350px; 
			    font:0.7em verdana;
			    border-top:1px solid #000;
			    border-bottom:1px solid #000;
			    height:90px;
			    padding-top:4px;
			}

			#credits img {
			    float:left;
			    margin:5px 10px 5px 0px;
			    border:1px solid #000000;
			    width:80px;
			    height:79px;
			}

			.important {
			    background-color:#F5FCC8;
			    padding:2px;
			}

			code span {
			    color:green;
			}
		</style>
	</head>
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
		
		
	</form>
	<input type="button" onclick="myfunction4()" value="Ingresar" class="btn" title="login" style="background: rgb(235,235,235); max-width:200px;" />
</div>
<!--Fin Template Formulario de Login-->
 
<?php }} ?>