<?
include("trasprovi.php");
conectar();
 session_name("loginUsuario");               
 session_start(); 
 if (strcmp($_SESSION["logeado"],"896525")!=0)	
			  {		
			    session_unregister("loginUsuario");
		       header("Location: index.php?errorusuario=si");		
			    exit();
  		   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>..:: Buzon ::..</title>

<style type="text/css">

<!--

body {

	background-color: #006600;

	margin-left: 0px;

	margin-top: 4px;

}

.Estilo3 {font-size: 18px}
.Estilo15 {color: #4F4100}
.Estilo1 {font-family: "Berlin Sans FB"}
.Estilo16 {font-size: 12px}

-->

</style>

<script language="JavaScript" type="text/JavaScript">function mmLoadMenus() {

  if (window.mm_menu_0608114639_0) return;

  window.mm_menu_0608114639_0 = new Menu("root",47,18,"Verdana, Arial, Helvetica, sans-serif",12,"#cc9900","#ffffff","#ffffcc","#cc9900","left","middle",3,0,1000,-5,7,true,true,false,0,true,true);

  mm_menu_0608114639_0.addMenuItem("Video","window.open('videocodigodehonor.html', '_self');");

  mm_menu_0608114639_0.addMenuItem("Texto","window.open('textocodigodehonor.html', '_self');");

   mm_menu_0608114639_0.fontWeight="bold";

   mm_menu_0608114639_0.hideOnMouseOut=true;

   mm_menu_0608114639_0.menuBorder=1;

   mm_menu_0608114639_0.menuLiteBgColor='#ffffff';

   mm_menu_0608114639_0.menuBorderBgColor='#cc9900';

   mm_menu_0608114639_0.bgColor='#ffffff';

  window.mm_menu_0602100746_0 = new Menu("root",173,18,"Verdana, Arial, Helvetica, sans-serif",12,"#cc9900","#ffffff","#ffffcc","#cc9900","left","middle",3,0,1000,-5,7,true,true,false,0,true,true);

  mm_menu_0602100746_0.addMenuItem("Saludo Del Comandante","window.open('saludodelcomandante.html', '_self');");

  mm_menu_0602100746_0.addMenuItem("        Misión y Visión","window.open('misionyvision.html', '_self');");

  mm_menu_0602100746_0.addMenuItem("Línea De Mando","window.open('lineademando.html', '_self');");

  mm_menu_0602100746_0.addMenuItem("Galería De Comandantes","window.open('galeriadecomandantes.html', '_self');");

   mm_menu_0602100746_0.fontWeight="bold";

   mm_menu_0602100746_0.hideOnMouseOut=true;

   mm_menu_0602100746_0.menuBorder=1;

   mm_menu_0602100746_0.menuLiteBgColor='#ffffff';

   mm_menu_0602100746_0.menuBorderBgColor='#cc9900';

   mm_menu_0602100746_0.bgColor='#ffffff';

  window.mm_menu_0602103228_2 = new Menu("root",152,18,"Verdana, Arial, Helvetica, sans-serif",12,"#cc9900","#ffffff","#ffffcc","#cc9900","left","middle",3,0,1000,-5,7,true,true,false,0,true,true);

  mm_menu_0602103228_2.addMenuItem("Organización","window.open('organizacionred.html', '_self');");

  mm_menu_0602103228_2.addMenuItem("Clase De Información","window.open('clasedeinformacionred.html', '_self');");

  mm_menu_0602103228_2.addMenuItem("          Cobertura","window.open('coberturared.html', '_self');");

  mm_menu_0602103228_2.addMenuItem("Comuníquense","window.open('comuniquensered.html', '_self');");

  mm_menu_0602103228_2.addMenuItem("Finalidad De La Red","window.open('finalidadred.html', '_self');");

   mm_menu_0602103228_2.fontWeight="bold";

   mm_menu_0602103228_2.hideOnMouseOut=true;

   mm_menu_0602103228_2.menuBorder=1;

   mm_menu_0602103228_2.menuLiteBgColor='#ffffff';

   mm_menu_0602103228_2.menuBorderBgColor='#cc9900';

   mm_menu_0602103228_2.bgColor='#ffffff';

  window.mm_menu_0602102256_1 = new Menu("root",133,18,"Verdana, Arial, Helvetica, sans-serif",12,"#cc9900","#ffffff","#ffffcc","#cc9900","left","middle",3,0,1000,-5,7,true,true,false,0,true,true);

  mm_menu_0602102256_1.addMenuItem("Misión y Visión","window.open('misionyvisioemisora.html', '_self');");

  mm_menu_0602102256_1.addMenuItem("Aspectos Positivos","window.open('aspectospositivoemisora.html', '_self');");

  mm_menu_0602102256_1.addMenuItem("      Programación","window.open('programacionemisora.html', '_self');");

  mm_menu_0602102256_1.addMenuItem("  Cubrimiento","window.open('cubrimientoemisora.html', '_self');");

  mm_menu_0602102256_1.addMenuItem("Instalaciones","window.open('instalacionesemisora.html', '_self');");

   mm_menu_0602102256_1.fontWeight="bold";

   mm_menu_0602102256_1.hideOnMouseOut=true;

   mm_menu_0602102256_1.menuBorder=1;

   mm_menu_0602102256_1.menuLiteBgColor='#ffffff';

   mm_menu_0602102256_1.menuBorderBgColor='#cc9900';

   mm_menu_0602102256_1.bgColor='#ffffff';

  window.mm_menu_0602104209_3 = new Menu("root",83,18,"Verdana, Arial, Helvetica, sans-serif",12,"#cc9900","#ffffff","#ffffcc","#cc9900","left","middle",3,0,1000,-5,7,true,true,false,0,true,true);

  mm_menu_0602104209_3.addMenuItem("Asesinatos","window.open('asesinatos.html', '_self');");

  mm_menu_0602104209_3.addMenuItem("Secuestros","window.open('ecuestros.html', '_self');");

  mm_menu_0602104209_3.addMenuItem("Masacres","window.open('masacres.html', '_self');");

   mm_menu_0602104209_3.fontWeight="bold";

   mm_menu_0602104209_3.hideOnMouseOut=true;

   mm_menu_0602104209_3.menuBorder=1;

   mm_menu_0602104209_3.menuLiteBgColor='#ffffff';

   mm_menu_0602104209_3.menuBorderBgColor='#cc9900';

   mm_menu_0602104209_3.bgColor='#ffffff';



  mm_menu_0602104209_3.writeMenus();

} // mmLoadMenus()

<!--

function MM_swapImgRestore() { //v3.0

  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}



function MM_displayStatusMsg(msgStr) { //v1.0

  status=msgStr;

  document.MM_returnValue = true;

}



function MM_preloadImages() { //v3.0

  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();

    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)

    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}



function MM_findObj(n, d) { //v4.01

  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {

    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}

  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];

  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);

  if(!x && d.getElementById) x=d.getElementById(n); return x;

}



function MM_swapImage() { //v3.0

  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)

   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}

//-->

</script>

<script language="JavaScript1.2" src="../../Menu_secundario/cabezera2/mm_menu.js"></script>

<script language="javascript">
			
			function goToPage(pPage)
			{	 	
			    document.fvalida.pagina.value = pPage;	
				document.fvalida.submit();
			}
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>



<body onLoad="MM_preloadImages('../../Menu_secundario/cabezera1/camuflado1724_r2_c2_f2.gif','../../Menu_secundario/cabezera1/camuflado1724_r2_c4_f2.gif','../../Menu_secundario/cabezera1/camuflado1724_r2_c6_f2.gif','../../Menu_secundario/cabezera1/camuflado1724_r2_c8_f2.gif','../../Menu_secundario/cabezera2/cabezera2_r1_c10_f2.gif','../../Menu_secundario/cabezera2/cabezera2_r2_c2_f2.gif','../../Menu_secundario/cabezera2/cabezera2_r2_c4_f2.gif','../../Menu_secundario/cabezera2/cabezera2_r2_c6_f2.gif','../../Menu_secundario/cabezera2/cabezera2_r2_c8_f2.gif','../../Menu_secundario/botones_2/nuestras_unidades_f2.gif','../../Menu_secundario/botones_2/citas2_r2_c1_f2.gif','../../Menu_secundario/botones_2/colombia2_f2.gif','../../Menu_secundario/botones_2/escribale_al_comandante_f2.gif','../../Menu_secundario/botones_2/contrataciones_f2.gif','../../Menu_secundario/botones_2/licitaciones_r1_c1_f2.gif')">

<div align="center">

  <table width="755" border="0" cellpadding="0" cellspacing="0" bgcolor="f0f0db">

    <!--DWLayoutTable-->

    <tr>

      <td height="73" colspan="11" align="center" valign="top" bgcolor="#006600"><table border="0" cellpadding="0" cellspacing="0" width="750">

        <!-- fwtable fwsrc="camuflado1724.png" fwbase="camuflado1724.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->

        <tr>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="330" height="1" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="36" height="1" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="19" height="1" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="90" height="1" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="19" height="1" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="49" height="1" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="20" height="1" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="167" height="1" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="20" height="1" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="1" height="1" border="0" alt=""></td>

        </tr>

        <tr>

          <td colspan="9"><img name="camuflado1724_r1_c1" src="../../Menu_secundario/cabezera1/camuflado1724_r1_c1.gif" width="750" height="52" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="1" height="52" border="0" alt=""></td>

        </tr>

        <tr>

          <td rowspan="2"><img name="camuflado1724_r2_c1" src="../../Menu_secundario/cabezera1/camuflado1724_r2_c1.gif" width="330" height="20" border="0" alt=""></td>

          <td><a href="../../index.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_displayStatusMsg('WWW.DECIMAPRIMERABRIGADA.MIL.CO');MM_swapImage('camuflado1724_r2_c2','','../../Menu_secundario/cabezera1/camuflado1724_r2_c2_f2.gif',1);return document.MM_returnValue"><img name="camuflado1724_r2_c2" src="../../Menu_secundario/cabezera1/camuflado1724_r2_c2.gif" width="36" height="13" border="0" alt=""></a></td>

          <td rowspan="2"><img name="camuflado1724_r2_c3" src="../../Menu_secundario/cabezera1/camuflado1724_r2_c3.gif" width="19" height="20" border="0" alt=""></td>

          <td><a href="dependencias.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_displayStatusMsg('WWW.DECIMAPRIMERABRIGADA.MIL.CO');MM_swapImage('camuflado1724_r2_c4','','../../Menu_secundario/cabezera1/camuflado1724_r2_c4_f2.gif',1);return document.MM_returnValue"><img name="camuflado1724_r2_c4" src="../../Menu_secundario/cabezera1/camuflado1724_r2_c4.gif" width="90" height="13" border="0" alt=""></a></td>

          <td rowspan="2"><img name="camuflado1724_r2_c5" src="../../Menu_secundario/cabezera1/camuflado1724_r2_c5.gif" width="19" height="20" border="0" alt=""></td>

          <td><a href="enlaces.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_displayStatusMsg('WWW.DECIMAPRIMERABRIGADA.MIL.CO');MM_swapImage('camuflado1724_r2_c6','','../../Menu_secundario/cabezera1/camuflado1724_r2_c6_f2.gif',1);return document.MM_returnValue"><img name="camuflado1724_r2_c6" src="../../Menu_secundario/cabezera1/camuflado1724_r2_c6.gif" width="49" height="13" border="0" alt=""></a></td>

          <td rowspan="2"><img name="camuflado1724_r2_c7" src="../../Menu_secundario/cabezera1/camuflado1724_r2_c7.gif" width="20" height="20" border="0" alt=""></td>

          <td><a href="resultadosoperacionales.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_displayStatusMsg('WWW.DECIMAPRIMERABRIGADA.MIL.CO');MM_swapImage('camuflado1724_r2_c8','','../../Menu_secundario/cabezera1/camuflado1724_r2_c8_f2.gif',1);return document.MM_returnValue"><img name="camuflado1724_r2_c8" src="../../Menu_secundario/cabezera1/camuflado1724_r2_c8.gif" width="167" height="13" border="0" alt=""></a></td>

          <td rowspan="2"><img name="camuflado1724_r2_c9" src="../../Menu_secundario/cabezera1/camuflado1724_r2_c9.gif" width="20" height="20" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="1" height="13" border="0" alt=""></td>

        </tr>

        <tr>

          <td><img name="camuflado1724_r3_c2" src="../../Menu_secundario/cabezera1/camuflado1724_r3_c2.gif" width="36" height="7" border="0" alt=""></td>

          <td><img name="camuflado1724_r3_c4" src="../../Menu_secundario/cabezera1/camuflado1724_r3_c4.gif" width="90" height="7" border="0" alt=""></td>

          <td><img name="camuflado1724_r3_c6" src="../../Menu_secundario/cabezera1/camuflado1724_r3_c6.gif" width="49" height="7" border="0" alt=""></td>

          <td><img name="camuflado1724_r3_c8" src="../../Menu_secundario/cabezera1/camuflado1724_r3_c8.gif" width="167" height="7" border="0" alt=""></td>

          <td><img src="../../Menu_secundario/cabezera1/spacer.gif" width="1" height="7" border="0" alt=""></td>

        </tr>

      </table></td>

    </tr>

    <tr>

      <td height="121" colspan="11" valign="top" bgcolor="#006600"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','750','height','121','src','../../flash/entrada/entrada_principal','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../../flash/entrada/entrada_principal' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="750" height="121">

          <param name="movie" value="../../flash/entrada/entrada_principal.swf">

          <param name="quality" value="high">

          <embed src="../../flash/entrada/entrada_principal.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="750" height="121"></embed>

      </object></noscript></td>

    </tr>

    <tr>

      <td height="41" colspan="11" align="center" valign="top"><script language="JavaScript1.2">mmLoadMenus();</script>

        <table border="0" cellpadding="0" cellspacing="0" width="750">

          <!-- fwtable fwsrc="cabezera2.png" fwbase="cabezera2.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->

          <tr>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="6" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="62" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="48" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="154" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="39" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="71" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="48" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="147" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="37" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="132" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="6" height="1" border="0"></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="1" height="1" border="0"></td>

          </tr>

          <tr>

            <td colspan="9"><img name="cabezera2_r1_c1" src="../../Menu_secundario/cabezera2/cabezera2_r1_c1.gif" width="612" height="3" border="0" alt=""></td>

            <td rowspan="2"><a href="Enlaces/codigodehonor.html" onMouseOut="MM_swapImgRestore();MM_startTimeout()" onMouseOver="MM_showMenu(window.mm_menu_0608114639_0,0,18,null,'cabezera2_r1_c10');MM_swapImage('cabezera2_r1_c10','','../../Menu_secundario/cabezera2/cabezera2_r1_c10_f2.gif',1);"><img name="cabezera2_r1_c10" src="../../Menu_secundario/cabezera2/cabezera2_r1_c10.gif" width="132" height="13" border="0" alt=""></a></td>

            <td rowspan="3"><img name="cabezera2_r1_c11" src="../../Menu_secundario/cabezera2/cabezera2_r1_c11.gif" width="6" height="30" border="0" alt=""></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="1" height="3" border="0"></td>

          </tr>

          <tr>

            <td rowspan="2"><img name="cabezera2_r2_c1" src="../../Menu_secundario/cabezera2/cabezera2_r2_c1.gif" width="6" height="27" border="0" alt=""></td>

            <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout()" onMouseOver="MM_showMenu(window.mm_menu_0602100746_0,1,15,null,'cabezera2_r2_c2');MM_swapImage('cabezera2_r2_c2','','../../Menu_secundario/cabezera2/cabezera2_r2_c2_f2.gif',1);"><img name="cabezera2_r2_c2" src="../../Menu_secundario/cabezera2/cabezera2_r2_c2.gif" width="62" height="10" border="0" alt=""></a></td>

            <td rowspan="2"><img name="cabezera2_r2_c3" src="../../Menu_secundario/cabezera2/cabezera2_r2_c3.gif" width="48" height="27" border="0" alt=""></td>

            <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout()" onMouseOver="MM_showMenu(window.mm_menu_0602103228_2,-94,16,null,'cabezera2_r2_c4');MM_swapImage('cabezera2_r2_c4','','../../Menu_secundario/cabezera2/cabezera2_r2_c4_f2.gif',1);"><img name="cabezera2_r2_c4" src="../../Menu_secundario/cabezera2/cabezera2_r2_c4.gif" width="154" height="10" border="0" alt=""></a></td>

            <td rowspan="2"><img name="cabezera2_r2_c5" src="../../Menu_secundario/cabezera2/cabezera2_r2_c5.gif" width="39" height="27" border="0" alt=""></td>

            <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout()" onMouseOver="MM_showMenu(window.mm_menu_0602102256_1,-230,16,null,'cabezera2_r2_c6');MM_swapImage('cabezera2_r2_c6','','../../Menu_secundario/cabezera2/cabezera2_r2_c6_f2.gif',1);"><img name="cabezera2_r2_c6" src="../../Menu_secundario/cabezera2/cabezera2_r2_c6.gif" width="71" height="10" border="0" alt=""></a></td>

            <td rowspan="2"><img name="cabezera2_r2_c7" src="../../Menu_secundario/cabezera2/cabezera2_r2_c7.gif" width="48" height="27" border="0" alt=""></td>

            <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout()" onMouseOver="MM_showMenu(window.mm_menu_0602104209_3,-1,15,null,'cabezera2_r2_c8');MM_swapImage('cabezera2_r2_c8','','../../Menu_secundario/cabezera2/cabezera2_r2_c8_f2.gif',1);"><img name="cabezera2_r2_c8" src="../../Menu_secundario/cabezera2/cabezera2_r2_c8.gif" width="147" height="10" border="0" alt=""></a></td>

            <td rowspan="2"><img name="cabezera2_r2_c9" src="../../Menu_secundario/cabezera2/cabezera2_r2_c9.gif" width="37" height="27" border="0" alt=""></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="1" height="10" border="0"></td>

          </tr>

          <tr>

            <td><img name="cabezera2_r3_c2" src="../../Menu_secundario/cabezera2/cabezera2_r3_c2.gif" width="62" height="17" border="0" alt=""></td>

            <td><img name="cabezera2_r3_c4" src="../../Menu_secundario/cabezera2/cabezera2_r3_c4.gif" width="154" height="17" border="0" alt=""></td>

            <td><img name="cabezera2_r3_c6" src="../../Menu_secundario/cabezera2/cabezera2_r3_c6.gif" width="71" height="17" border="0" alt=""></td>

            <td><img name="cabezera2_r3_c8" src="../../Menu_secundario/cabezera2/cabezera2_r3_c8.gif" width="147" height="17" border="0" alt=""></td>

            <td><img name="cabezera2_r3_c10" src="../../Menu_secundario/cabezera2/cabezera2_r3_c10.gif" width="132" height="17" border="0" alt=""></td>

            <td><img src="../../Menu_secundario/cabezera2/spacer.gif" alt="" name="undefined_2" width="1" height="17" border="0"></td>

          </tr>

        </table></td>

    </tr>

    <tr>

      <td width="10" height="3"></td>

      <td width="171"></td>

      <td width="4"></td>
      <td width="12"></td>
      <td width="14"></td>
      <td width="77"></td>
      <td width="185"></td>

      <td width="87"></td>

      <td width="179"></td>
      <td width="6"></td>
      <td width="13"></td>

    </tr>

    <tr>

      <td height="72"></td>

      <td colspan="3" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','184','height','72','src','../../flash/anticorrupcion/anticorrupcionç','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../../flash/anticorrupcion/anticorrupcionç' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="184" height="72">

          <param name="movie" value="../../flash/anticorrupcion/anticorrupcion&#231;.swf">

          <param name="quality" value="high">

          <embed src="../../flash/anticorrupcion/anticorrupcion&#231;.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="184" height="72"></embed>

      </object></noscript></td>

      <td></td>
      <td></td>
      <td valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','184','height','72','src','../../flash/antisecuestro/antisecuestro','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../../flash/antisecuestro/antisecuestro' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="184" height="72">

          <param name="movie" value="../../flash/antisecuestro/antisecuestro.swf">

          <param name="quality" value="high">

          <embed src="../../flash/antisecuestro/antisecuestro.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="184" height="72"></embed>

      </object></noscript></td>

      <td>&nbsp;</td>

      <td colspan="2" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','184','height','72','src','../../flash/denuncie/denuncie','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../../flash/denuncie/denuncie' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="184" height="72">

          <param name="movie" value="../../flash/denuncie/denuncie.swf">

          <param name="quality" value="high">

          <embed src="../../flash/denuncie/denuncie.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="184" height="72"></embed>

      </object></noscript></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td height="19"></td>

      <td>&nbsp;</td>

      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>

      <td></td>

      <td></td>
      <td></td>
      <td></td>

    </tr>

    <tr>

      <td height="16"></td>

      <td valign="top"><img src="../../Menu_principal/marco_flash_superior/marco2.png" width="170" height="16"></td>

      <td></td>
      <td></td>
      <td></td>

      <td colspan="4" rowspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">

          <!--DWLayoutTable-->

          <tr>

            <td width="528" height="30" align="center" valign="middle" bgcolor="#996600"><span class="Estilo3"><strong><font color="#FFFFFF">:::...</font></strong> <strong><font color="#FFFFFF" face="Arial, Helvetica, sans-serif">Consulta</font></strong> <font color="#FFFFFF"><strong>...:::</strong></font><font color="#FFFFFF"><strong></strong></font></span></td>
          </tr>

          <tr>

            <td height="60"><div align="center">
              <p align="right">&nbsp;</p>
              <p>&nbsp;</p>
            </div></td>
          </tr>
          <tr>
            <td height="524">&nbsp;</td>
          </tr>
          

            </table></td>

      <td></td>
      <td></td>

    </tr>

    <tr>

      <td height="34"></td>

      <td>&nbsp;</td>

      <td></td>
      <td></td>
      <td></td>

      <td>&nbsp;</td>
      <td>&nbsp;</td>

    </tr>
    <tr>
      <td height="564"></td>
      <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">

          <!--DWLayoutTable-->

          <tr>

            <td height="51" colspan="2" align="center" valign="top"><a href="nuestrasunidades.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('nuestras_unidades','','../../Menu_secundario/botones_2/nuestras_unidades_f2.gif',1);"><img name="nuestras_unidades" src="../../Menu_secundario/botones_2/nuestras_unidades.gif" width="170" height="51" border="0" alt=""></a></td>

          </tr>

          <tr>

            <td width="174" height="10"></td>

            <td width="4"></td>

          </tr>

          <tr>

            <td height="52" colspan="2" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="171">

              <!-- fwtable fwsrc="citas2.png" fwbase="citas2.gif" fwstyle="Dreamweaver" fwdocid = "1562034138" fwnested="0" -->

              <tr>

                <td><img src="../../Menu_secundario/botones_2/spacer.gif" alt="" name="undefined_3" width="170" height="1" border="0"></td>

                <td><img src="../../Menu_secundario/botones_2/spacer.gif" alt="" name="undefined_3" width="1" height="1" border="0"></td>

                <td><img src="../../Menu_secundario/botones_2/spacer.gif" alt="" name="undefined_3" width="1" height="1" border="0"></td>

              </tr>

              <tr>

                <td colspan="2"><img name="citas2_r1_c1" src="../../Menu_secundario/botones_2/citas2_r1_c1.gif" width="171" height="1" border="0" alt=""></td>

                <td><img src="../../Menu_secundario/botones_2/spacer.gif" alt="" name="undefined_3" width="1" height="1" border="0"></td>

              </tr>

              <tr>

                <td><a href="pedircita.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('citas2_r2_c1','','../../Menu_secundario/botones_2/citas2_r2_c1_f2.gif',1);"><img name="citas2_r2_c1" src="../../Menu_secundario/botones_2/citas2_r2_c1.gif" width="170" height="50" border="0" alt=""></a></td>

                <td><img name="citas2_r2_c2" src="../../Menu_secundario/botones_2/citas2_r2_c2.gif" width="1" height="50" border="0" alt=""></td>

                <td><img src="../../Menu_secundario/botones_2/spacer.gif" alt="" name="undefined_3" width="1" height="50" border="0"></td>

              </tr>

            </table></td>

          </tr>

          <tr>

            <td height="10"></td>

            <td></td>

          </tr>

          <tr>

            <td height="49" colspan="2" valign="top"><a href="emisora.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('colombia2','','../../Menu_secundario/botones_2/colombia2_f2.gif',1);"><img name="colombia2" src="../../Menu_secundario/botones_2/colombia2.gif" width="170" height="49" border="0" alt=""></a></td>

          </tr>

          <tr>

            <td height="10"></td>

            <td></td>

          </tr>

          <tr>

            <td height="50" colspan="2" valign="top"><a href="buzon.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('escribale_al_comandante','','../../Menu_secundario/botones_2/escribale_al_comandante_f2.gif',1);"><img name="escribale_al_comandante" src="../../Menu_secundario/botones_2/escribale_al_comandante.gif" width="170" height="50" border="0" alt=""></a></td>

          </tr>

          <tr>

            <td height="10"></td>

            <td></td>

          </tr>

          <tr>

            <td height="50" colspan="2" valign="top"><a href="contrataciones.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('contrataciones','','../../Menu_secundario/botones_2/contrataciones_f2.gif',1);"><img name="contrataciones" src="../../Menu_secundario/botones_2/contrataciones.gif" width="170" height="50" border="0" alt=""></a></td>

          </tr>

          <tr>

            <td height="10"></td>

            <td></td>

          </tr>

          <tr>

            <td height="51" colspan="2" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="170">

              <!-- fwtable fwsrc="licitaciones.png" fwbase="licitaciones.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->

              <tr>

                <td><img src="../../Menu_secundario/botones_2/spacer.gif" alt="" name="undefined_4" width="169" height="1" border="0"></td>

                <td><img src="../../Menu_secundario/botones_2/spacer.gif" alt="" name="undefined_4" width="1" height="1" border="0"></td>

                <td><img src="../../Menu_secundario/botones_2/spacer.gif" alt="" name="undefined_4" width="1" height="1" border="0"></td>

              </tr>

              <tr>

                <td><a href="licitaciones.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('licitaciones_r1_c1','','../../Menu_secundario/botones_2/licitaciones_r1_c1_f2.gif',1);"><img name="licitaciones_r1_c1" src="../../Menu_secundario/botones_2/licitaciones_r1_c1.gif" width="169" height="49" border="0" alt=""></a></td>

                <td rowspan="2"><img name="licitaciones_r1_c2" src="../../Menu_secundario/botones_2/licitaciones_r1_c2.gif" width="1" height="50" border="0" alt=""></td>

                <td><img src="../../Menu_secundario/botones_2/spacer.gif" alt="" name="undefined_4" width="1" height="49" border="0"></td>

              </tr>

              <tr>

                <td><img name="licitaciones_r2_c1" src="../../Menu_secundario/botones_2/licitaciones_r2_c1.gif" width="169" height="1" border="0" alt=""></td>

                <td><img src="../../Menu_secundario/botones_2/spacer.gif" alt="" name="undefined_4" width="1" height="1" border="0"></td>

              </tr>

            </table></td>

          </tr>

          <tr>

            <td height="10"></td>

            <td></td>

          </tr>

          <tr>

            <td height="180" align="center" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','158','height','180','src','../../flash/red_de_cooperantes/red','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../../flash/red_de_cooperantes/red' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="158" height="180">

              <param name="movie" value="../../flash/red_de_cooperantes/red.swf">

              <param name="quality" value="high">

              <embed src="../../flash/red_de_cooperantes/red.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="158" height="180"></embed>

            </object></noscript></td>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td height="21">&nbsp;</td>

            <td></td>

          </tr>

      </table></td>

      <td>&nbsp;</td>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="197" colspan="11" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">

          <!--DWLayoutTable-->

          <tr>

            <td width="4" height="14"></td>

            <td width="750" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','750','height','14','src','../../flash/entrada/Oracion','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../../flash/entrada/Oracion' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="750" height="14">

                <param name="movie" value="../../flash/entrada/Oracion.swf">

                <param name="quality" value="high">

                <embed src="../../flash/entrada/Oracion.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="750" height="14"></embed>

            </object></noscript></td>

          <td width="4"></td>

          </tr>

          <tr align="center">

            <td height="81" colspan="3" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="749">

              <!-- fwtable fwsrc="pie4.png" fwbase="pie4.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->

              <tr>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="17" height="1" border="0"></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="114" height="1" border="0"></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="47" height="1" border="0"></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="161" height="1" border="0"></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="49" height="1" border="0"></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="138" height="1" border="0"></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="47" height="1" border="0"></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="156" height="1" border="0"></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="20" height="1" border="0"></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="1" height="1" border="0"></td>

              </tr>

              <tr>

                <td colspan="9"><img name="pie4_r1_c1" src="../../Menu_principal/pie_de_pagina/pie4_r1_c1.gif" width="749" height="11" border="0" alt=""></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="1" height="11" border="0"></td>

              </tr>

              <tr>

                <td rowspan="2"><img name="pie4_r2_c1" src="../../Menu_principal/pie_de_pagina/pie4_r2_c1.gif" width="17" height="69" border="0" alt=""></td>

                <td><a href="http://presidencia.gov.co"><img name="pie4_r2_c2" src="../../Menu_principal/pie_de_pagina/pie4_r2_c2.gif" width="114" height="58" border="0" alt=""></a></td>

                <td rowspan="2"><img name="pie4_r2_c3" src="../../Menu_principal/pie_de_pagina/pie4_r2_c3.gif" width="47" height="69" border="0" alt=""></td>

                <td><a href="http://mindefensa.gov.co"><img name="pie4_r2_c4" src="../../Menu_principal/pie_de_pagina/pie4_r2_c4.gif" width="161" height="58" border="0" alt=""></a></td>

                <td rowspan="2"><img name="pie4_r2_c5" src="../../Menu_principal/pie_de_pagina/pie4_r2_c5.gif" width="49" height="69" border="0" alt=""></td>

                <td><a href="http://gobiernoenlinea.gov.co"><img name="pie4_r2_c6" src="../../Menu_principal/pie_de_pagina/pie4_r2_c6.gif" width="138" height="58" border="0" alt=""></a></td>

                <td rowspan="2"><img name="pie4_r2_c7" src="../../Menu_principal/pie_de_pagina/pie4_r2_c7.gif" width="47" height="69" border="0" alt=""></td>

                <td><a href="http://cgfm.mil.co"><img name="pie4_r2_c8" src="../../Menu_principal/pie_de_pagina/pie4_r2_c8.gif" width="156" height="58" border="0" alt=""></a></td>

                <td rowspan="2"><img name="pie4_r2_c9" src="../../Menu_principal/pie_de_pagina/pie4_r2_c9.gif" width="20" height="69" border="0" alt=""></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="1" height="58" border="0"></td>

              </tr>

              <tr>

                <td><img name="pie4_r3_c2" src="../../Menu_principal/pie_de_pagina/pie4_r3_c2.gif" width="114" height="11" border="0" alt=""></td>

                <td><img name="pie4_r3_c4" src="../../Menu_principal/pie_de_pagina/pie4_r3_c4.gif" width="161" height="11" border="0" alt=""></td>

                <td><img name="pie4_r3_c6" src="../../Menu_principal/pie_de_pagina/pie4_r3_c6.gif" width="138" height="11" border="0" alt=""></td>

                <td><img name="pie4_r3_c8" src="../../Menu_principal/pie_de_pagina/pie4_r3_c8.gif" width="156" height="11" border="0" alt=""></td>

                <td><img src="../../Menu_principal/pie_de_pagina/spacer.gif" alt="" name="undefined_5" width="1" height="11" border="0"></td>

              </tr>

            </table></td>

          </tr>

          <tr align="center">

            <td height="87" colspan="3" valign="top"><font color="#996600" size="1"><font face="Arial, Helvetica, sans-serif">FUERZAS

                  MILITARES DE COLOMBIA<br>

EJERCITO NACIONAL<br>

DECIMA PRIMERA BRIGADA </font></font><font face="Arial, Helvetica, sans-serif"><br>

<font color="#996600" size="1">V&iacute;a sierra chichita Monter&iacute;a &#8211; C&oacute;rdoba <br>

TEL: 7833066<br>

E-mail br11b2@ejercito.mil.co<br>

Decima primera brigada todo los Derechos Reservados @ Ejercito nacional <br>

2006</font></font><font color="#996600" size="1">&nbsp; </font></td>

          </tr>

      </table></td>

    </tr>

  </table>

</div>

</body>

</html>

