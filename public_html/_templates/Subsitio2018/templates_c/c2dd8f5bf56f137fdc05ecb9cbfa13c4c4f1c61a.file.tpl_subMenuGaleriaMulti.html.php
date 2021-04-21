<?php /* Smarty version Smarty-3.1.8, created on 2021-02-19 23:13:54
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuGaleriaMulti.html" */ ?>
<?php /*%%SmartyHeaderCode:457202604602ff5962f8184-76519243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2dd8f5bf56f137fdc05ecb9cbfa13c4c4f1c61a' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_subMenuGaleriaMulti.html',
      1 => 1613762436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '457202604602ff5962f8184-76519243',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602ff5963b2578_38511115',
  'variables' => 
  array (
    'flgimage' => 0,
    'flgvideo' => 0,
    'flgaudio' => 0,
    'subMenu' => 0,
    'linea' => 0,
    'sub' => 0,
    'verMas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602ff5963b2578_38511115')) {function content_602ff5963b2578_38511115($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?>
	<style>
		.center{text-align: center;}
		.center table{margin-left:auto;margin-right:auto; text-align: left;}
		.framem{border: 1px solid #CCCCCC;}
		.enlacem{color: #4682B4; font-size: 95%; text-decoration: none; font-weight: 600;}
		.enlacem:visited{color: #4682B4;}
		.enlacem:link{color: #4682B4;}
		.enlacem:hover{color: #4682B4;text-decoration: underline;}
		.enlacem:active{color: #4682B4;text-decoration: underline;}
		.titulom{font-size: 85%; padding: 0 5px 0 5px;}
		.textom{font-size: 80%; padding: 0 5px 0 5px;}
		.imagenm{padding: 3px; background-color: #F2F2F2;}
	</style>


<?php if ($_smarty_tpl->tpl_vars['flgimage']->value==1){?>
<script type="text/javascript" src="js/prototype.js"></script>
<noscript>
<p><?php echo @_ROT_NOSCRIPT;?>
. Lightbox uses the Prototype Framework</p>
</noscript>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<noscript>
<p>Lightbox uses the Scriptaculous Effects Library</p>
</noscript>
<script type="text/javascript" src="js/lightbox.js"></script>
<noscript>
<p>Lightbox is a simple, unobtrusive script used to overlay images on the current page.</p>
</noscript>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['flgvideo']->value==1){?>
<script type="text/javascript" src="js/flowplayer-3.0.6.min.js"></script>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['flgaudio']->value==1){?>

<script type="text/javascript">

	function thisMovie(movieName) {
	  if (navigator.appName.indexOf ("Microsoft") !=-1) {
	    return window[movieName]
	  }	else {
	    return document[movieName]
	  }
	}

	function displayAudioPlayer(theValue) {
		if (theValue != '') {			
			document.getElementById('audioContenedor').innerHTML= ''+
				'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" '+
					'codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" '+
					'width="158" height="77" id="mp3Custom"> '+
					'<param name="allowScriptAccess" value="sameDomain"> '+
					'<param name="movie" value="tools/player.swf"> '+
					'<param name="quality" value="high"> '+
					'<param name="bgcolor" value="#ffffff"> '+
					'<embed src="tools/player.swf" name="mp3Custom" id="mp3Custom" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed> '+
				'</object> ';
					
			/*
			Hay que esperar un tiempo para poder llamar a:
			thisMovie('mp3Custom').SetVariable('song.text', 'recursos_user' + theValue); 
			y que funcione, y  setTimeout fue la mejor forma que encontre de hacerlo.
			*/
			setTimeout("playAudio('"+theValue+"')", 500);
		} else {
			alert("No tiene un archivo de audio asociado.");
		}
	}

	function playAudio(theValue) {
		if (theValue != '') {			
			thisMovie('mp3Custom').SetVariable('song.text', 'recursos_user' + theValue);	
		} else {
			alert("No tiene un archivo de audio asociado.");
		}
	}

	function playVideo(url,theValue){
		if (theValue != '') {
		    
			document.getElementById('videoContenedor').style.width="380px";
			document.getElementById('videoContenedor').style.height="330px";
		
			flowplayer("videoContenedor", "tools/flowplayer-3.1.5.swf", url+'/recursos_user/'+theValue);
		} else {
			alert("No tiene un archivo de video asociado.");
		}
	}
	
</script>

<?php }?>



 <script type="text/javascript">
 
   function thisMovie(movieName) {
	  if (navigator.appName.indexOf ("Microsoft") !=-1) {
	    return window[movieName]

	  }	else {
	    return document[movieName]
		}
	} 
   
   function playVideo(url,theValue){
		if (theValue != '') {
		    
			document.getElementById('videoContenedor').style.width="380px";
			document.getElementById('videoContenedor').style.height="330px";
		
			flowplayer("videoContenedor", "tools/flowplayer-3.1.5.swf", url+theValue);
		} else {
			alert("No tiene un archivo de video asociado.");
		}
	}
   
 </script>


<div class="center">
<table>
	<?php  $_smarty_tpl->tpl_vars['linea'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['linea']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['linea']->key => $_smarty_tpl->tpl_vars['linea']->value){
$_smarty_tpl->tpl_vars['linea']->_loop = true;
?>
	<tr>
	<?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['linea']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value){
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
		<td class="center framem" >
			<?php if ($_smarty_tpl->tpl_vars['sub']->value['selector']==3){?>
				<table>
					<tr style="background-position:center;text-aling:center"><!--align="center"-->
						<td class="titulom wrap8"><strong><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['sub']->value['nombre'],64,"...",true);?>
</strong></td>
					</tr>
					<?php if ($_smarty_tpl->tpl_vars['sub']->value['entradilla']!=''){?>
						<tr style="background-position:center;text-aling:center">
							<td class="textom wrap8" ><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['sub']->value['entradilla'],128,"...",true);?>
</td>
						</tr>
					<?php }?>
					<tr style="background-position:center;text-aling:center">
						<td class="textom">
							<!--<a class="enlacem" href="javascript:playVideo('<?php echo @_URL;?>
','<?php echo $_smarty_tpl->tpl_vars['sub']->value['archivo'];?>
')"><?php echo @_ROT_VER_VIDEO;?>
</a> <img src="http://www.ejercito.mil.co/recursos_user/img_home/video.png"/>-->
							
							<a class="enlacem wrap8" onkeypress="window.status = 'Ejecutar Archivo';" onClick="window.status = 'Ejecutar Archivo';" href="javascript:playVideo('<?php echo @_URL;?>
','<?php echo $_smarty_tpl->tpl_vars['sub']->value['archivo'];?>
')"><img src="http://www.ejercito.mil.co/recursos_user/img_home/video.png" alt="Ver video"/><?php echo @_ROT_VER_VIDEO;?>
</a><!-- onMouseOut="window.status=''" onMouseMove="window.status = 'Ejecutar Archivo';" -->
							
							
						</td>
					</tr>
					<tr style="background-position:center;text-aling:center">
						<td class="textom">
							<a class="enlacem" href="<?php echo @_URL;?>
<?php echo $_smarty_tpl->tpl_vars['sub']->value['archivo'];?>
">Descargar Video</a>
						</td>
					</tr>
				</table>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['sub']->value['selector']==1){?>
				<table class="contenido"><!--cellspacing="0" summary="<?php echo @_ROT_SUMMARY;?>
" -->
					<!--Utilidades de la Imagen-->
					<tr>
						<td class="center imagenm"><!--Cuadro de la Imagen-->
							<a href="<?php echo $_smarty_tpl->tpl_vars['sub']->value['archivo'];?>
" rel="lightbox[roadtrip]" title="<?php echo $_smarty_tpl->tpl_vars['sub']->value['nombre'];?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub']->value['resumen'], ENT_QUOTES, 'UTF-8', true);?>
">
								<img src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['sub']->value['archivo'];?>
" alt="archivo"/>
							</a>
						</td>
					</tr>
					<tr>
						<td class="textom" ><!--Comentario de la imagen-->
							<a class="enlacem wrap8" href="?idcategoria=<?php echo $_smarty_tpl->tpl_vars['sub']->value['idcategoria'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['sub']->value['nombre'],64,"...",true);?>
</a>
						</td>
					</tr>
				</table>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['sub']->value['selector']==2){?>
				<table>
					<tr style="background-position:center;text-aling:center"><!--align="center"-->
						<td class="titulom wrap8"><strong><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['sub']->value['nombre'],64,"...",true);?>
</strong></td><!-- <th></th> -->
					</tr>
					<?php if ($_smarty_tpl->tpl_vars['sub']->value['entradilla']!=''){?>
						<tr style="background-position:center;text-aling:center"><!-- align="center" -->
							<td class="textom wrap8" ><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['sub']->value['entradilla'],128,"...",true);?>
</td>
						</tr>
					<?php }?>
					<tr style="background-position:center;text-aling:center"><!--align="center"-->
						<td class="textom" >
							<a class="enlacem wrap8"  onClick="window.status = 'Ejecutar Archivo';" onkeypress="window.status = 'Ejecutar Archivo';"
							href="javascript:displayAudioPlayer('<?php echo $_smarty_tpl->tpl_vars['sub']->value['descripcion'];?>
')"							
							><?php echo @_ROT_ESCUCHAR;?>
</a><!--onMouseOut="window.status=''" onMouseMove="window.status = 'Ejecutar Archivo';"--> <img src="http://www.ejercito.mil.co/recursos_user/img_home/audio.png" alt="audio"/>
						</td>
					</tr>
					<tr style="background-position:center;text-aling:center"><!--align="center"-->
						<td class="textom" >
							<a class="enlacem wrap8" onkeypress="window.status = 'Descargar Archivo';" onClick="window.status = 'Descargar Archivo';" href="<?php echo $_smarty_tpl->tpl_vars['sub']->value['archivo'];?>
">Descargar Audio</a><!--onMouseOut="window.status=''" onMouseMove="window.status = 'Descargar Archivo';" -->
						</td>
					</tr>
				</table>
			<?php }?>
		</td>
	<?php } ?>
	</tr>
	<?php } ?>
</table>
<br><br>
<table>
	<?php if ($_smarty_tpl->tpl_vars['flgvideo']->value==1){?>
		<tr>
			<td>
				<div id="videoContenedor" style="margin-left: auto;margin-right: auto;"></div><!--display:block;width:380px;height:330px;-->
			</td>
		</tr>
	<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['flgaudio']->value==1){?>
		<tr>
			<td>
				<!-- Objeto Player-->
				<div class="object" id="audioContenedor"></div>
			</td>
		</tr>
	<?php }?>
</table>
</div>
<?php if ($_smarty_tpl->tpl_vars['verMas']->value!=''){?>
	<?php echo $_smarty_tpl->tpl_vars['verMas']->value;?>

<?php }?><?php }} ?>