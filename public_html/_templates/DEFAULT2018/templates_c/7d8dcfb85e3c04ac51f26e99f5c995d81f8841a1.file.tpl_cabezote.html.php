<?php /* Smarty version Smarty-3.1.8, created on 2021-04-13 19:43:29
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_cabezote.html" */ ?>
<?php /*%%SmartyHeaderCode:1837014654605611310b84a0-99610553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d8dcfb85e3c04ac51f26e99f5c995d81f8841a1' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_cabezote.html',
      1 => 1618343004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1837014654605611310b84a0-99610553',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_6056113130d774_12961097',
  'variables' => 
  array (
    'noticias3' => 0,
    'respuesta1' => 0,
    'infoUsuario' => 0,
    'modoEdicion' => 0,
    'idcategoria' => 0,
    'menuInstitucional' => 0,
    'esHome' => 0,
    'banners' => 0,
    'arreglo23' => 0,
    'const' => 0,
    'slider' => 0,
    'rutetoroot' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6056113130d774_12961097')) {function content_6056113130d774_12961097($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.capitalize.php';
?>
<div>

    <style>
                .container1 {
                  
                }

                .container2 {
                  
                }

                .container3 {
                  
                }

                .container4 {
                  
                }

                .image1 {
                  width: 100%; 
                  height:190px;
                  border: 1px solid #323232;
                }

                .image2 {
                  width: 100%; 
                  height:190px;
                  border: 1px solid #323232;
                }

                .image3 {
                  width: 100%; 
                  height:190px;
                  border: 1px solid #323232;
                }

                .image4 {
                  width: 100%; 
                  height:190px;
                  border: 1px solid #323232;
                }

                .overlay1 {
                  position: absolute;
                  top: 0;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  height:190px;
                  width: 100%;
                  opacity: 0;
                  transition: .5s ease;
                  background-color: #7C0808;
                }

                .overlay2 {
                  position: absolute;
                  top: 190px;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  height:190px;
                  width: 100%;
                  opacity: 0;
                  transition: .5s ease;
                  background-color: #7C0808;
                }

                .overlay3 {
                  position: absolute;
                  top: 0;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  height:190px;
                  width: 100%;
                  opacity: 0;
                  transition: .5s ease;
                  background-color: #7C0808;
                }

                .overlay4 {
                  position: absolute;
                  top: 190px;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  height:190px;
                  width: 100%;
                  opacity: 0;
                  transition: .5s ease;
                  background-color: #7C0808;
                }

                .container1:hover .overlay1 {
                  opacity: 0.8;
                }

                .container2:hover .overlay2 {
                  opacity: 0.8;
                }
                .container3:hover .overlay3 {
                  opacity: 0.8;
                }
                .container4:hover .overlay4 {
                  opacity: 0.8;
                }

                

                .text1 {
                  color: white;
                  font-size: 20px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  -ms-transform: translate(-50%, -50%);
                  font-family: 'Roboto';
                }

                .text2 {
                  color: white;
                  font-size: 20px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  -ms-transform: translate(-50%, -50%);
                  font-family: 'Roboto';
                }

                .text3 {
                  color: white;
                  font-size: 20px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  -ms-transform: translate(-50%, -50%);
                  font-family: 'Roboto';
                }

                .text4 {
                  color: white;
                  font-size: 20px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  -ms-transform: translate(-50%, -50%);
                  font-family: 'Roboto';
                }
               
              
              .home-videos-img {
                height: 50%;
                position: relative;
                overflow: hidden;
              }

              .home-videos-img a {
                display: block;
                width: 100%;
                height: 100%;
              }

              .home-videos-img:first-child img {
                object-position: center 24%;
              }

              .home-videos-img:last-child img {
                object-position: center bottom;
              }
         

/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: visible;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: hidden;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */


    
.button {
    background-color:rgba(50,50,50,1); 
    padding:10px; 
    border:none; 
    border-radius: 8px; 
    margin-top:10px; 
    width:100%; 
    color: white;
 
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  background-color: rgba(135,12,12,1);
}

.button:hover {
  background-color: rgba(135,12,12,1);
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}


        body {
            max-width: 100%;
            overflow-x: hidden;
        }
        .skip {
            transition: all ease .5s;
            /* position: absolute; */
            /* top: 10px; */
            left: -9000px;
            height: 1px;
            width: 1px;
            text-align: left;
            overflow: hidden;
            position: absolute;
        }
        
        a.skip:active,
        a.skip:focus,
        a.skip:hover {
            transition: all ease .3s;
            left: 10px;
            /* top: 10px; */
            width: auto;
            height: auto;
            overflow: visible;
        }
        
        @media screen and (max-width: 580px) {
            .navbar .nav-item {
                background-size: 7%;
            }
        }
        
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-item.active .nav-link {
            color: #ff0000;
        }
    
            
            * {
                margin:0px;
                padding:0px;
            }
            
            #header {
                margin:auto;
                width:500px;
                font-family:Arial, Helvetica, sans-serif;
            }

            html, body, head {
              height: 100%;
              margin: 0;
            }
            
            ul, ol {
                list-style:none;
            }
            
            .nav1 > li {
                float:left;
                 border-bottom: 40px;
            }
            
            .nav1 li a {
                background-color: transparent;
                
                text-decoration:none;
                padding:4px 12px;
                display:block;
                font-size: 12px;
                /*font-weight: bold;*/
                
                color:#ffffff;
                
                
                
            }

            

             .nav1 li ul a{
               
               
                color:#000000;
                
                
                
            }


            .nav1 li a:hover {
                
               color: rgba(135,12,12,1);
               text-decoration: underline!important;

            }
            
            .nav1 li ul {
                display:none;
                position:absolute;
                min-width:140px;
                background-color: white;
            }
            
            .nav1 li:hover > ul {
                display:block;
            }
            
            .nav1 li ul li {
                position:relative;
            }
            
            .nav1 li ul li ul {
                right:-140px;
                top:0px;
            }






	    .nav2 > li {
                float:left;
                 border-bottom: 40px;
            }
            
            .nav2 li a {
                background-color: transparent;
                
                text-decoration:none;
                padding:4px 12px;
                display:block;
                font-size: 10px;
                font-weight: bold;
                
                color:#ffffff;
                
                
                
            }
            
            .nav2 li a:hover {
                
                color: red;

            }
            
            .nav2 li ul {
                display:none;
                position:absolute;
                min-width:140px;
                background-color: white;
            }
            
            .nav2 li:hover > ul {
                display:block;
            }
            
            .nav2 li ul li {
                position:relative;
            }
            
            .nav2 li ul li ul {
                right:-140px;
                top:0px;
            }




             .nav3 a {
               
                
                color:#000000;
                
                
                
            }


             .nav4 > li {
                
                 border-bottom: 40px;
            }
            
            .nav4 li a {
                background-color: transparent;
                
                text-decoration:none;
                padding:4px 12px;
                display:block;
                font-size: 12px;
                /*font-weight: bold;*/
                
                color:#ffffff;
                
                
                
            }

            

             .nav4 li ul a{
               
               
                color:#000000;
                
                
                
            }


            .nav4 li a:hover {
                
                color: red;

            }
            
            .nav4 li ul {
                display:none;
                position:absolute;
                min-width:140px;
                background-color: white;
            }
            
            .nav4 li:hover > ul {
                display:block;
            }
            
            .nav4 li ul li {
                position:relative;
            }
            
            .nav4 li ul li ul {
                right:-140px;
                top:0px;
            }

            

            .nav12
            {
                border-left: 6px solid red;
                height: 500px;
            }


            .slide-destacados1 p {
                padding-left: 15px;
                position:  relative;
            }

            .slide-destacados1 p::before {
                content: '';
                width: 2px;
                opacity: 0.7;
                height: 140px;
                display: block;
                left: 5px;
                background: #90240D;
                position:  absolute;
            }


            .slide-destacados2 a {
                padding-left: 15px;
                position:  relative;
            }

            .slide-destacados2 a::before {
                content: '';
                width: 2px;
                opacity: 0.7;
                height: 90px;
                display: block;
                left: 5px;
                background: #90240D;
                position:  absolute;
            }
            
             .slide-destacados3 a {
                padding-left: 15px;
                position:  relative;
            }

            .slide-destacados3 a::before {
                content: '';
                width: 2px;
                opacity: 0.7;
                height: 110px;
                display: block;
                left: 5px;
                background: #90240D;
                position:  absolute;
            }
            

            .slide-destacados4 a {
                padding-left: 15px;
                position:  relative;
            }

            .slide-destacados4 a::before {
                content: '';
                width: 2px;
                opacity: 0.7;
                height: 60px;
                display: block;
                left: 5px;
                background: #90240D;
                position:  absolute;
            }

            .slide-destacados5 a {
                padding-left: 15px;
                position:  relative;
            }

            .slide-destacados5 a::before {
                content: '';
                width: 2px;
                opacity: 0.7;
                height: 80px;
                display: block;
                left: 5px;
                background: #90240D;
                position:  absolute;
            }



            .slide-destacados6 a {
                padding-left: 15px;
                position:  relative;
            }

            .slide-destacados6 a::before {
                content: '';
                width: 2px;
                opacity: 0.7;
                height: 140px;
                display: block;
                left: 5px;
                background: #90240D;
                position:  absolute;
            }


            .slide-destacados7 a {
                padding-left: 15px;
                position:  relative;
            }

            .slide-destacados7 a::before {
                content: '';
                width: 2px;
                opacity: 0.7;
                height: 130px;
                display: block;
                left: 5px;
                background: #90240D;
                position:  absolute;
            }


            .slide-destacados8 a {
                padding-left: 15px;
                position:  relative;
            }

            .slide-destacados8 a::before {
                content: '';
                width: 2px;
                opacity: 0.7;
                height: 110px;
                display: block;
                left: 5px;
                background: #90240D;
                position:  absolute;
            }
        

            .fondo1{
                padding-top: 20px;
                padding-bottom: 20px;
                background: url('_templates/DEFAULT2018/recursos/images/web.png') center center;
                background-size: cover;
                background-color: transparent;
                background-repeat: no-repeat;
            }
            .fondo2{
                
                background:#FFF;
            }

            .visible1{
                visibility: visible;
                height: auto;
                width: auto;
            }

            .visible2{
                visibility: collapse;
                height: 0px;
                width: 0px;
            }

            .wrap {
                width:100%;
                height:357px;
                background-color:transparent;
                overflow:hidden;
                text-align:center;
                transform: scale(1);
            }
            .wrap1{

            }

            .wrap2{

            }

            .wrap3{

            }
            .wrap4{

            }
             .wrap5{
                font-size: 0.65em;
            }

            .wrap6{
                width: 1.2em;
                height: 1.2em;
               /* background: linear-gradient( -45deg, black, black 51%, white 49%, white 51%, white 49% ); */
                border-radius: 50%;
                border: none;
                background:transparent;
                transform: rotate(90deg);
            }
            .wrap7{
                color:black!important;
            }


            .imginfder 
            {
                position: absolute;
                bottom: 0px;
                right: 0px;
            }


            #forolink {
            -moz-transform: rotateZ(-90deg);
            -webkit-transform: rotateZ(-90deg);
            -moz-transform: rotateZ(-90deg);
            -o-transform: rotateZ(-90deg);
            background-color: rgba(124,8,8,1);
            border-radius: 0px 0px 0 0;
            margin: 0;
            padding: 0.8em 0.6em;
            position: fixed;
            right: -40px;
            top: 40%;
            
        

            footer{
                padding-top: 20px;
                padding-bottom: 30px;
                background-size: cover;
                background-color: rgba(50,50,50,1);
            }


            .slide-destacados22 a {
                padding-left: 15px;
                position:  relative;
            }

            .slide-destacados22 a::before {
                content: '';
                width: 1300px;
                opacity: 0.7;
                height: 2px;
                display: block;
                left: 5px;
                background: #9c9c9c;
                position:  absolute;
            }


             .slide-destacados23 a {
                padding-left: 15px;
                position:  relative;
            }

            .slide-destacados23 a::before {
                content: '';
                width: 2px;
                opacity: 0.7;
                height: 350px;
                display: block;
                right: 100px;
                background: #9c9c9c;
                position:  absolute;
            }

            
            .box-noticias1{
                z-index: 1;
                 transition: transform .3s; 
            }

            .box-noticias1:hover{
                -ms-transform: scale(1.3); /* IE 9 */
                -webkit-transform: scale(1.3); /* Safari 3-8 */
                transform: scale(1.3); 
               
                position: relative;
                z-index: 10;
            }

        </style>
</div>



<script type="text/javascript">
    function mostrar_menu() {
        if (document.getElementById('div_menu_oculto').style.display == 'none') {
            $('#div_menu_oculto').toggle('slow');
        } else {
            $('#div_menu_oculto').toggle('hide');
        }
    }
</script>




<link href="_templates/DEFAULT2018/recursos/Bicentenario/bicentenario.css" rel="stylesheet" type="text/css" />
<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="_templates/DEFAULT2018/recursos/Bicentenario/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="_templates/DEFAULT2018/recursos/Bicentenario/css/mdb.min.css" rel="stylesheet">
<!-- Your custom styles (optional) -->
<link href="_templates/DEFAULT2018/recursos/Bicentenario/css/style.css" rel="stylesheet">

 

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  


<script type="text/javascript">
    function mostrar_menu_otro() {
        if (document.getElementById('div_menu_oculto_otro').style.display == 'none') {
            $('#div_meyoutubenu_oculto_otro').toggle('slow');
        } else {
            $('#div_menu_oculto_otro').toggle('hide');
        }
    }
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.padding = "5px 10px";
            document.getElementById("logo").style.fontSize = "25px";
            
            document.getElementById("menuhome1").style.color = "#ffffff";
            document.getElementById("conozco1").style.color = "#ffffff";
            
            $('#conozco1').removeClass('nav2');
            $('#conozco1').addClass('nav1');
           
        } else {
            document.getElementById("navbar").style.padding = "10px 10px";
            document.getElementById("logo").style.fontSize = "35px";

            document.getElementById("menuhome1").style.color = "#000000";
            document.getElementById("conozco1").style.color = "#000000";
            
            $('#conozco1').removeClass('nav2');
            $('#conozco1').addClass('nav1');
        }
    }
</script>





<script>



window.onscroll = function() 
{
    var VarraDes = window.scrollY;

    
    if (VarraDes > 30) {
        
        //alert("aaa");
        /*
        //parte desabilitada 14-6-20
        document.getElementById("imagen-logo1").src ="_templates/DEFAULT2018/recursos/Bicentenario/img/LOGO-EJC-ROJO.png";
        $(".color_menu1").css("color", "#000");

         var element = document.getElementById("menu_sup32");
         element.classList.add("fondo2");
         element.classList.remove("fondo1");

         var x = $(window).width();
        if( x < 700)
        {
            $(".color_menu1").css("background-color", "#FFF");
        }*/



       /*document.getElementById("imagen-logo1").left="0px";
        document.getElementById("imagen-logo1").width="0px";*/
        
        // $(".color_menu1").css("background-color", "#FFF");


       

          //$(".fondo1").css("background", "#FFF");
    } else {
        //alert("bbb");
        /*document.getElementById("imagen-logo1").src ="_templates/DEFAULT2018/recursos/Bicentenario/img/Logo EJC.png";
         $(".color_menu1").css("color", "#FFF");

        var element = document.getElementById("menu_sup32");
         element.classList.add("fondo1");
         element.classList.remove("fondo2");

         var x = $(window).width();
        if( x < 700)
        {
            $(".color_menu1").css("background-color", "#000");
        }*/
        /*document.getElementById("imagen-logo1").left="0px";
        document.getElementById("imagen-logo1").width="43px";*/
       
        //$(".color_menu1").css("background-color", "#000");
      
         //$(".fondo1").css("background", "url('_templates/DEFAULT2018/recursos/images/web.png') center center");
    }
};

function myFunction_resize1()
{
   var x = $(window).width();
    if( x < 700)
    {
         var element = document.getElementById("menuhome1");
         element.classList.add("nav4");
         element.classList.remove("nav1");
    } 
    else
    {
        var element = document.getElementById("menuhome1");
         element.classList.add("nav1");
         element.classList.remove("nav4");
    }  
   // alert("terminno");
};

function pasarVariables(pagina, nombres) {
  pagina +="?";
  nomVec = nombres.split(",");
  for (i=0; i<nomVec.length; i++)
    pagina += nomVec[i] + "=" + escape(eval(nomVec[i]))+"&";
  pagina = pagina.substring(0,pagina.length-1);
  location.href=pagina;
}


</script>



<input type="hidden" name="url_video_youtube1" id="url_video_youtube1" value="<?php echo @VIDEO_BANNER_YOUTUBE;?>
">
<input type="hidden" name="time_video_youtube1" id="time_video_youtube1" value="<?php echo @_TIEMPO_VIDEO_BANNER;?>
">

<header>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script >
         $(window).load(
            function(){
               
            var x = $(window).width();

            
            if( x < 1024)
            {
                 
                 var element = document.getElementById("menuhome1");
                 element.classList.add("nav4");
                 element.classList.remove("nav1");
                 
                
                document.getElementById("img_estr").style="min-height:80px; margin-top:30px;";
                element = document.getElementById("estr_4ejc");
                element.classList.remove("my-5");
               
                if( x < 615)
                {
                    document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:166px;";
                }
                else
                {
                    if( x < 967)
                    {
                    document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:125px;";
                    }
                    else
                    {
                        document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:185px;";
                    }

                }
                

                 

            } 
            else
            {
                                
                var element = document.getElementById("menuhome1");
                 element.classList.add("nav1");
                 element.classList.remove("nav4");
                 
                
                 document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:185px;";

            }   

          

             

            var video_banner1 = document.getElementById("hay_video_banner").value;

            if (video_banner1 == "no")
            {
                if( x < 615)
                {
                    document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:166px;";
                }
                else
                {
                    if( x < 967)
                    {
                    document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:125px;";
                    }
                    else
                    {
                        document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:185px;";
                    }

                }
                        
               
                if( x < 700)
                {
                    
                   
                     document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias3']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;";
                      document.getElementById("facebook-w").style="";
                     document.getElementById("pauseButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
                    document.getElementById("playButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
                }
                else
                {
                    /*$(".rightbottom2").css("top", "92%");
                    $(".rightbottom1").css("top", "92%");*/
                   
                    document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias3']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 460px; border-bottom: none !important;";
                     document.getElementById("facebook-w").style="border:none;overflow:hidden; min-height:500px;";
                     document.getElementById("pauseButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
                    document.getElementById("playButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
                }

               
                
               if( x < 1024)
                {
                    document.getElementById("noticias_sociales1").style="font-size: 0.75em;font-weight: bold; color:black;";
                }
                else
                {
                    document.getElementById("noticias_sociales1").style="font-size: 1.3em;font-weight: bold; color:black;";
                
                }

            }
            else
            {
                if( x < 900)
                {
                    
                    document.getElementById("ytplayer").style="transform: scale(1.8, 2.1);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms;";   

                    document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias3']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;";
                      document.getElementById("facebook-w").style="";
                      document.getElementById("descatados23").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px; margin-bottom:0px; padding-bottom:80px;  background: rgba(50,50,50,1);";


                }
                else
                {
                    document.getElementById("ytplayer").style="transform: scale(1.6, 1.5);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms;";   
                }

               


                
               

                if( x < 1000)
                {
                    

                   
                   
                    // $(".wrap4").css("font-size", 30);
                     document.getElementById("texto_banner23").style="font-size: 30px; font-weight: bold; margin-top: 50%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";
                     
                     document.getElementById("noticias_sociales1").style="font-size: 0.75em;font-weight: bold; color:black;";

                     //document.getElementById("BOTON_BANNER2").style="background-color:rgba(125,125,125,1)!important;text-align:center;color:white; ";

                }
                else
                {
                    
                    /*document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/
                    
                    document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 20%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";
                    //$(".wrap4").css("font-size", 50);
                     
                     document.getElementById("noticias_sociales1").style="font-size: 1.3em;font-weight: bold; color:black;";
                     //document.getElementById("BOTON_BANNER2").style="background-color:rgba(125,125,125,1)!important;text-align:center;color:white; ";
                }

            }
            $("#fondo_negro").fadeOut(3000); 
        });
        
        
        $(document).ready(function(){
            
            var x = $(window).width();

            if( x < 700)
            {
                 var element = document.getElementById("menuhome1");
                 element.classList.add("nav4");
                 element.classList.remove("nav1");
                 
                 //$(".color_menu1").css("background-color", "#464646");

                 //document.getElementById("iframe23").style="width: 100%; height: auto; min-height: 350px;";

                 
                 
                 document.getElementById("img_estr").style="min-height:80px; margin-top:30px;";
                 //$(".rightbottom2").css("top", "77%");
                 //$(".rightbottom1").css("top", "77%");
                 element = document.getElementById("estr_4ejc");
                 element.classList.remove("my-5");

                 //document.getElementById("socialFooter").style="text-align: center;margin-top:6px";


                 //document.getElementById("heroes_bicentenarios").style="font-size: 1.6em;font-weight: bold; margin: 30px 0;";

                 //document.getElementById("EJERCITO_REDES1").style="font-size: 1.5em; font-weight: bold; margin-top: 30px; margin-bottom: 25px; color:black;";


            } 
            else
            {
                var element = document.getElementById("menuhome1");
                 element.classList.add("nav1");
                 element.classList.remove("nav4");
    
            }  
          

          if(localStorage.getItem("invertirse1")=="si")
          {
            invertir();
          }
            

          $(window).resize(function(){
            /*var elmnt = document.getElementById("home-silder");
            var ye = elmnt.scrollHeight;
            var x = elmnt.scrollWidth;*/
            
            //alert(<?php echo @esHome;?>
);


             
            var x = $(window).width();

            
            if( x < 1024)
            {
                 
                 var element = document.getElementById("menuhome1");
                 element.classList.add("nav4");
                 element.classList.remove("nav1");
                 
                 //$(".color_menu1").css("background-color", "#464646");

                 //document.getElementById("iframe23").style="width: 100%; height: auto; min-height: 350px;";
                 

                 
                 //$(".rightbottom2").css("top", "77%");
                 //$(".rightbottom1").css("top", "77%");
                document.getElementById("img_estr").style="min-height:80px; margin-top:30px;";
                element = document.getElementById("estr_4ejc");
                element.classList.remove("my-5");
                //document.getElementById("socialFooter").style="text-align: center;margin-top:6px;";

                 //document.getElementById("heroes_bicentenarios").style="font-size: 1.6em;font-weight: bold; margin: 30px 0;";

                 
                 //document.getElementById("EJERCITO_REDES1").style="font-size: 1.5em; font-weight: bold; margin-top: 30px; margin-bottom: 25px; color:black;";
                if( x < 615)
                {
                    document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:166px;";
                }
                else
                {
                    if( x < 967)
                    {
                    document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:125px;";
                    }
                    else
                    {
                        document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:185px;";
                    }

                }
                

                 

            } 
            else
            {
                                
                var element = document.getElementById("menuhome1");
                 element.classList.add("nav1");
                 element.classList.remove("nav4");
                 
                 //$(".color_menu1").css("background-color", "transparent");
                 
                 //document.getElementById("iframe23").style="width: 100%; height: auto; min-height: 350px; padding-left: 40px; ";
                 
                 //document.getElementById("socialFooter").style="text-align: right;";                
                 

                 //document.getElementById("heroes_bicentenarios").style="font-size: 2.3em;font-weight: bold; margin: 30px 0;";

                 //document.getElementById("EJERCITO_REDES1").style="font-size: 2.6em; font-weight: bold; margin-top: 30px; margin-bottom: 25px; color:black;";


                 document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:185px;";

            }   

           /* var element = document.getElementById("imagen_banner");
            x = element.width();
            ye= element.height();*/
            /*var constante1 = 1152/864;
            var constante2= x/ye;
            var constante3 =constante2 - constante1;

            if(constante3 > 0)
            {
                respuesta1= 1 + constante3;
            }
            else
            {
                respuesta1= 1 - constante3;
            }
           // alert(x);
            //alert(ye);

            
            

             $(".wrap").css("height", ye);*/

             

            var video_banner1 = document.getElementById("hay_video_banner").value;

            if (video_banner1 == "no")
            {
                if( x < 615)
                {
                    document.getElentById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:166px;";
                }
                else
                {
                    if( x < 967)
                    {
                    document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:125px;";
                    }
                    else
                    {
                        document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:185px;";
                    }

                }
                        
               
                if( x < 700)
                {
                    
                   
                     document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias3']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;";
                      document.getElementById("facebook-w").style="";
                     document.getElementById("pauseButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
                    document.getElementById("playButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
                }
                else
                {
                    /*$(".rightbottom2").css("top", "92%");
                    $(".rightbottom1").css("top", "92%");*/
                   
                    document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias3']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 460px; border-bottom: none !important;";
                     document.getElementById("facebook-w").style="border:none;overflow:hidden; min-height:500px;";
                     document.getElementById("pauseButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
                    document.getElementById("playButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
                }

               
                
               if( x < 1024)
                {
                    document.getElementById("noticias_sociales1").style="font-size: 0.75em;font-weight: bold; color:black;";
                }
                else
                {
                    document.getElementById("noticias_sociales1").style="font-size: 1.3em;font-weight: bold; color:black;";
                
                }

            }
            else
            {
                if( x < 900)
                {
                    
                    document.getElementById("ytplayer").style="transform: scale(1.8, 2.1);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms;";   

                    document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias3']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;";
                      document.getElementById("facebook-w").style="";
                      document.getElementById("descatados23").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px; margin-bottom:0px; padding-bottom:80px;  background: rgba(50,50,50,1);";


                }
                else
                {
                    document.getElementById("ytplayer").style="transform: scale(1.4, 1);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms;";   
                }

                

                
               

                if( x < 1000)
                {
                    

                   
                   
                    // $(".wrap4").css("font-size", 30);
                     document.getElementById("texto_banner23").style="font-size: 30px; font-weight: bold; margin-top: 50%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";
                     
                     document.getElementById("noticias_sociales1").style="font-size: 0.75em;font-weight: bold; color:black;";

                     //document.getElementById("BOTON_BANNER2").style="background-color:rgba(125,125,125,1)!important;text-align:center;color:white; ";

                }
                else
                {
                    
                    /*document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/
                    
                    document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 20%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";
                    //$(".wrap4").css("font-size", 50);
                     
                     document.getElementById("noticias_sociales1").style="font-size: 1.3em;font-weight: bold; color:black;";
                     //document.getElementById("BOTON_BANNER2").style="background-color:rgba(125,125,125,1)!important;text-align:center;color:white; ";
                }

            }
            

 
             

           
             //$(".wrap").css("transform", "scale(" + respuesta1 + ", 1.5)");

            
            //document.getElementById("imagen_banner").style="min-height:250px; height:100%;width:100%;transform: scale(" + respuesta1 + ");";

            //document.getElementsByClassName("wrap").style="min-height:250px; height:100%;width:100%;transform: scale(" + respuesta1 + ");";

           
           //document.getElementById("home-silder").style="border-bottom: none !important; height:100%; width:100%;transform: scale(" + respuesta1 + ");";

          

           /* alert(constante1);
            alert(constante2);
            alert(constante3);
            alert(respuesta1);*/

            

           // $(".wrap").css("transform", "scale(<?php echo $_smarty_tpl->tpl_vars['respuesta1']->value;?>
)");
            //$("span").text(x += 1);
          });

        


        

        //if(window.location.href == "https://www.ejercito.mil.co/")
       
         var video_banner1 = document.getElementById("hay_video_banner").value;


        if (video_banner1 == "no")
        { 
            if( x < 1024)
            {
                
                document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias3']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;";
                
                 document.getElementById("pauseButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
                    document.getElementById("playButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
                document.getElementById("facebook-w").style="";
                
                 if( x < 615)
                {
                    document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:166px;";
                }
                else
                {
                    if( x < 967)
                    {
                    document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:125px;";
                    }
                    else
                    {
                        document.getElementById("row_banner").style="font-family: 'Fira Sans', sans-serif; margin-top:185px;";
                    }

                }
            }
            else
            {
                /*$(".rightbottom2").css("top", "92%");
                $(".rightbottom1").css("top", "92%");*/
                document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias3']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 460px; border-bottom: none !important;";

                 document.getElementById("pauseButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
                    document.getElementById("playButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
            }

            
        }
                
        else
        {
             
            
            if( x < 900)
            {
                document.getElementById("ytplayer").style="transform: scale(1.8, 2.1);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms;";  
                document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias3']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;"; 
                document.getElementById("facebook-w").style="";
                document.getElementById("descatados23").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px; margin-bottom:0px; padding-bottom:80px;  background: rgba(50,50,50,1);";
            }
            else
            {
                document.getElementById("ytplayer").style="transform: scale(1.4, 1);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms;";   
                document.getElementById("descatados23").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px; margin-bottom:0px; padding-bottom:40px;  background: rgba(50,50,50,1);";
            }

             

            
           
           
            
            //alert(window.location.href);
            
                 
            if( x < 700)
            {
                /*document.getElementById("BOTON_BANNER2").style="background-color:rgba(96,5,12,1); width:30%; height:100px; border-radius: 50%; margin-top: 43%;text-align:center;margin-left:35%;color:white; font-size:30px;";*/

                /*document.getElementById("texto_banner23").style="font-size: 30px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/


               // $(".wrap4").css("font-size", 30);
                document.getElementById("texto_banner23").style="font-size: 30px; font-weight: bold; margin-top: 50%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";


                //$(".wrap3").css("margin-top", 500);

                //document.getElementById("BOTON_BANNER2").style="background-color:rgba(125,125,125,1)!important;text-align:center;color:white;";
              
            }
            else
            {
                /*document.getElementById("BOTON_BANNER2").style="background-color:rgba(96,5,12,1); width:30%; height:100px; border-radius: 50%; margin-top: 35%;text-align:center;margin-left:35%;color:white; font-size:30px;";*/
                /*document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/

                //$(".wrap4").css("font-size", 50);

                document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 20%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";

                 //$(".wrap3").css("margin-top", 650);

                 //document.getElementById("BOTON_BANNER2").style="background-color:rgba(125,125,125,1)!important;text-align:center;color:white; ";
            }
        }

        if( x < 1024)
        {


        }
       
      
    });



     var fontSize = 1;
     var invertirse = false;
 
        // funcion para aumentar la fuente
        function zoomIn() {
            
            fontSize += 0.1;

           if(fontSize < 2)
            {
                var fontSize2= fontSize - 0.5 ;

                var fontSize4= fontSize + 1.5 ;

                document.body.style.fontSize = fontSize + "em";
                

                
                $(".wrap5").css("font-size", fontSize + "em");


              

                if(document.getElementById("es_home_principal").value == "no")
                {
                    $(".wrap9").css("font-size", fontSize + "em");

                    var fontSize3= fontSize + 0.5 ;
                    $(".titulo-interna").css("font-size", fontSize3 + "em");
                    $(".wrap8").css("font-size", fontSize + "em");     
                }
                else
                {
                      document.getElementById("noticias_interes1").style="font-weight: bold;color:black;font-size: "+ fontSize +"em";

                      document.getElementById("canal_galeria1").style="font-weight: bold;color:white;font-size: "+ fontSize4 +"em";

                       document.getElementById("title_recursos1").style="font-weight: bold; color:black; margin-bottom:30px;font-size: "+ fontSize4 +"em";

                        document.getElementById("redes_sociales1").style="font-weight: bold; color:black;font-size: "+ fontSize +"em";
                       

                }
            }
           
        }
 
        // funcion para disminuir la fuente
        function zoomOut() {
            fontSize -= 0.1;

            if(fontSize > 0.7)
            {
             
                var fontSize2= fontSize - 0.5 ;

                var fontSize4= fontSize + 1.5 ;

                document.body.style.fontSize = fontSize + "em";
                $(".wrap5").css("font-size", fontSize + "em");

                if(document.getElementById("es_home_principal").value == "no")
                {
                     $(".wrap9").css("font-size", fontSize + "em");  

                     var fontSize3= fontSize + 0.5 ;
                    $(".titulo-interna").css("font-size", fontSize3 + "em");
                     $(".wrap8").css("font-size", fontSize + "em"); 
                }
                else
                {
                      document.getElementById("noticias_interes1").style="font-weight: bold;color:black;font-size: "+ fontSize +"em";

                       document.getElementById("canal_galeria1").style="font-weight: bold;color:white;font-size: "+ fontSize4 +"em";

                        document.getElementById("title_recursos1").style="font-weight: bold; color:black; margin-bottom:30px;font-size: "+ fontSize4 +"em";
                      
                      document.getElementById("redes_sociales1").style="font-weight: bold; color:black;font-size: "+ fontSize +"em";


                }
            }
        }

        function invertir(){
            if(invertirse)
            {

                localStorage.setItem("invertirse1", "no");

                document.getElementById("cuerpo_contenido").style="";
                invertirse=false;

                document.getElementById("menu_sup32").style="background-repeat: no-repeat; z-index:12;";

                document.getElementById("imagen-logo1").style="padding-top: 15px;";



                

                //document.getElementById("iframe23").style="width: 100%; height: auto; min-height: 350px; padding-left: 40px;";  

                if(document.getElementById("es_home_principal").value == "no")
                {
                    $(".titulo-interna").css("color", "black");
                    $(".wrap8").css("color", "black");
                    /*document.getElementById("entradilla_row1").style="";
                    document.getElementById("default_descripcion").style="";*/
                    $(".secondaryBody").css("background", "white");


                    document.getElementById("cabezote-internas").style="border-bottom: none !important;background: url(<?php echo @_DIRIMAGES;?>
cabezote/banner/DSC_0024.JPG) no-repeat; background-position: center center; height: 400px;opacity: .9;";


                    $(".menuSegNivel").css("background", "#862024");
                    $(".wrap9").css("color", "black");

                    $(".entradilla").css("color", "black");
                    $(".default_descripcion").css("color", "black");

                    $(".s_fecha").css("color", "black");
                    $(".listaEntradilla").css("color", "black");

                    document.getElementById("cuerp_int").style="background: rgba(230,230,230,1);";

                }
                else
                {   

                    document.getElementById("home-silder3").style="";

                    document.getElementById("descatados1").style="font-family: 'Fira Sans', sans-serif;background-color: rgba(124,8,8,1);"

                    document.getElementById("descatados2").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  margin-bottom:0; background: rgba(230,230,230,1);";

                     document.getElementById("descatados24").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  padding-bottom:50px; margin-bottom: 0px; background: rgba(230,230,230,1);";

                     document.getElementById("SliderBicentenario").style="margin-top:20px;";


                    //document.getElementById("internacional1").style="";
                    //document.getElementById("nacional1").style="";
                    //document.getElementById("actualidad1").style="";

                    //$(".wrap7").css("color", "black");
                    //document.getElementById("noticias_interes1").style="font-size: 1.25em;font-weight: bold;";
                    //document.getElementById("EJERCITO_REDES1").style="font-size: 2.6em; font-weight: bold; margin-top: 30px; margin-bottom: 25px; color:black;";

                    //document.getElementById("heroes_bicentenarios").style="font-size: 2.3em;font-weight: bold; margin: 30px 0;";  

                    $(".wrap10").css("background", "white");  

                     document.getElementById("noticias_interes1").style="font-size: 1.2em;font-weight: bold; color:black;";        
                     $(".wrap15").css("color", "black");  
                }

            }
            else
            {
                localStorage.setItem("invertirse1", "si");

                document.getElementById("cuerpo_contenido").style=" background:black!important;";
                invertirse = true;

                document.getElementById("menu_sup32").style="-webkit-filter: invert(100%);filter: invert(100%);";

                document.getElementById("imagen-logo1").style="padding-top: 15px;-webkit-filter: grayscale(100%);filter: grayscale(100%);";

                

                


                if(document.getElementById("es_home_principal").value == "no")
                {
                    $(".titulo-interna").css("color", "white");
                    $(".wrap8").css("color", "white");
                    $(".secondaryBody").css("background", "black");
                    document.getElementById("cabezote-internas").style="border-bottom: none !important;background: url(<?php echo @_DIRIMAGES;?>
cabezote/banner/DSC_0024.JPG) no-repeat; background-position: center center; height: 400px;opacity: .9; z-index:1;";
                    $(".menuSegNivel").css("background", "black");
                    $(".wrap9").css("color", "white");

                    $(".entradilla").css("color", "white");
                    $(".default_descripcion").css("color", "white");

                     $(".s_fecha").css("color", "white");
                    $(".listaEntradilla").css("color", "white");

                    document.getElementById("cuerp_int").style="background: black;";

                }
                else
                {  
                    document.getElementById("descatados1").style="font-family: 'Fira Sans', sans-serif;  background:rgba(50,50,50,1);";

                    document.getElementById("descatados2").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px; background:black!important; color:white";

                    document.getElementById("descatados24").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  padding-bottom:50px; margin-bottom: 0px; background: rgba(0,0,0,1);";

                     document.getElementById("SliderBicentenario").style="margin-top:20px; color:white;";

                      //document.getElementById("internacional1").style="color: white!important;";
                   // document.getElementById("nacional1").style="color: white!important;";
                    //document.getElementById("actualidad1").style="color: white!important;";

                   // document.getElementById("EJERCITO_REDES1").style="font-size: 2.6em; font-weight: bold; margin-top: 30px; margin-bottom: 25px; color:white;";

                    //document.getElementById("heroes_bicentenarios").style="font-size: 2.3em;font-weight: bold; margin: 30px 0;  color:white;";

                    $(".wrap10").css("background", "black");

                     document.getElementById("noticias_interes1").style="font-size: 1.2em;font-weight: bold; color:white;";

                     $(".wrap15").css("color", "white");
                }
                // document.getElementById("iframe23").style="width: 100%; height: auto; min-height: 350px; padding-left: 40px; -webkit-filter: grayscale(100%);filter: grayscale(100%);"; 


                
               // document.getElementById("noticias_interes1").style="font-size: 1.25em;font-weight: bold; color:white;";

                //$(".wrap7").css("color", "white");
            }

        }

        function invertir1(){
            if(invertirse)
            {

                document.getElementById("cuerpo_contenido").style="";
                invertirse=false;

                document.getElementById("menu_sup32").style="background-repeat: no-repeat; z-index:12;";
                document.getElementById("home-silder3").style="";

                
            }
            else
            {
                document.getElementById("cuerpo_contenido").style="-webkit-filter: hue-rotate(180deg);filter: hue-rotate(180deg); background:white!important;";
                invertirse = true;

                document.getElementById("menu_sup32").style="background-repeat: no-repeat; z-index:12; -webkit-filter: hue-rotate(180deg);filter: hue-rotate(180deg);";

                document.getElementById("home-silder3").style="-webkit-filter: hue-rotate(180deg);filter: hue-rotate(180deg);";

               
            }

        }

        function cargar12()
        {
            $(".wrap").css("height", "auto");

        var elmnt3 = document.getElementById("home-silder");
        var ye1 = elmnt3.scrollHeight;
        var x1 = elmnt3.scrollWidth;

        var ye = $(window).height();
        

        var constante1 =1;
        var constante2 =1;

         $(".wrap").css("height", ye);

        if(ye1 < ye)
        {
            constante1 = ye/ye1;
            //$(".wrap").css("transform", "scale(" + constante1 + ", 1)");
        }
        else
        {
            constante2 = ye1/ye;
            //$(".wrap").css("transform", "scale(1, " + constante2 + ")");
        }


        $(".wrap").css("height", ye);


        

        //if(window.location.href == "https://www.ejercito.mil.co/")
       
         var video_banner1 = document.getElementById("hay_video_banner").value;


        if (video_banner1 == "no")
        { 
            if( x < 700)
            {
               
                /*document.getElementById("pauseButton1").style="top: 92% !important;";
                document.getElementById("playButton1").style="top: 92% !important;";*/
            }
            else
            {
                /*$(".rightbottom2").css("top", "92%");
                $(".rightbottom1").css("top", "92%");*/
            }

            $(".wrap").css("transform", "scale(" + constante1 + ", " + constante2 + ")");
        }
                
        else
        {
             
            
            if( x < 900)
            {
                document.getElementById("ytplayer").style="transform: scale(1.8, 2.1);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms;";   
            }
            else
            {
                document.getElementById("ytplayer").style="transform: scale(1.4, 1);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms;";   
            }

             

            
            $(".wrap").css("height", ye);
            $(".wrap1").css("height", ye - 6);
            $(".wrap2").css("height", ye);
           
            
            //alert(window.location.href);
            
                 
            if( x < 700)
            {
                /*document.getElementById("BOTON_BANNER2").style="background-color:rgba(96,5,12,1); width:30%; height:100px; border-radius: 50%; margin-top: 43%;text-align:center;margin-left:35%;color:white; font-size:30px;";*/

                /*document.getElementById("texto_banner23").style="font-size: 30px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/


               // $(".wrap4").css("font-size", 30);
                document.getElementById("texto_banner23").style="font-size: 30px; font-weight: bold; margin-top: 110%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";


                //$(".wrap3").css("margin-top", 500);

                //document.getElementById("BOTON_BANNER2").style="background-color:rgba(125,125,125,1)!important;text-align:center;color:white;";
              
            }
            else
            {
                /*document.getElementById("BOTON_BANNER2").style="background-color:rgba(96,5,12,1); width:30%; height:100px; border-radius: 50%; margin-top: 35%;text-align:center;margin-left:35%;color:white; font-size:30px;";*/
                /*document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/

                //$(".wrap4").css("font-size", 50);

                document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";

                 //$(".wrap3").css("margin-top", 650);

                 //document.getElementById("BOTON_BANNER2").style="background-color:rgba(125,125,125,1)!important;text-align:center;color:white; ";
            }
        }
        }
        
    </script>
    
    <nav class="fixed-top navbar-expand-lg navbar-dark scrolling-navbar fondo2" style="background-repeat: no-repeat; z-index:12; padding-top:0px;padding-right: 0px; padding-left: 0px; padding-bottom: 0px;" id="menu_sup32">
      
        <div class="" style="">
            <div class="col-md-12 col-sm-12 col-xs-12" style="height: 23px; width: 100%; background-color: #36c; padding-left: 13%; padding-right:13%; ">
                <div class="col-md-3 col-sm-12 col-xs-12">

                    <a  href="https://www.gov.co/home" id="logo_gov">

                        <img class="img img-responsive img-cabezotes" id="imagen-gov" style="padding-top: 0px; max-height:20px; max-width:100px;" alt="Logo-gov" src="_templates/DEFAULT2018/recursos/Bicentenario/img/logo_gov.png"></a>

                    </a>
                </div>


                 <div class="col-md-9 col-sm-12 col-xs-12 hidden-md hidden-sm hidden-xs" style="background-color: #DCE3FF; height: 17px;" >

                    <div class="col-md-7 col-sm-12 col-xs-12" style="text-align: left;background-color: #DCE3FF; font-size: x-small;" >
                    <a  href="https://www.gov.co/ficha-tramites-y-servicios/"  style="">

                        El Estado no tiene porqué ser tan aburrido !conoce a GOV.CO!

                    </a>

                    </div>
                    
                    <div class="col-md-5 col-sm-12 col-xs-12" style="text-align: right;margin-top:-3px; " >

                    <a  href="https://www.gov.co/ficha-tramites-y-servicios/" style="text-align: right;  font-size: x-small; margin-right:20px;" >

                        TRÁMITES Y SERVICIOS

                    </a>
                   
                     <a  href="https://www.gov.co/tu-opinion-cuenta/" style="text-align: right; font-size: x-small; margin-right:20px;">

                        
                        PARTICIPACIÓN

                    </a>
                    
                     <a  href="https://www.gov.co/entidades/" style="text-align: right; font-size: x-small; margin-right:20px;">

                        ENTIDADES

                    </a>
                    </div>
                </div>
            </div>


             <div class="col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs" style="height: 36px; width: 100%; background-color: rgba(124,8,8,1); padding-left: 13%; padding-right:13%;padding-top:5px;">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="">
                       
                       <a href="<?php echo @__FACEBOOK;?>
" title="Facebook" target="_blank" class="">
                            <img  src="_templates/DEFAULT2018/recursos/images/redes/face.png" alt="" style="padding: 5px;">
                            <p class="hidden"><?php echo @__FACEBOOK;?>
</p>
                        </a>
                        <a href="<?php echo @__TWITTER;?>
" title="Twitter" target="_blank" class="" >
                                <img  src="_templates/DEFAULT2018/recursos/images/redes/twiter.png" alt="" style="padding: 5px;">
                                <p class="hidden"><?php echo @__TWITTER;?>
</p>
                            </a>
                        <a href="<?php echo @__YOUTUBE;?>
" title="Youtube" target="_blank" class="" style="padding: 5px;">
                            <img  src="_templates/DEFAULT2018/recursos/images/redes/youtube.png" alt="" style="padding: 5px;">
                            <p class="hidden"><?php echo @__YOUTUBE;?>
</p>
                        </a>
                        <a href="<?php echo @__INSTAGRAM;?>
" title="Instagram" target="_blank" class="">
                            <img  src="_templates/DEFAULT2018/recursos/images/redes/instagram.png" alt="" style="padding: 5px;">
                            <p class="hidden"><?php echo @__INSTAGRAM;?>
</p>
                        </a>
                        
                    </div>
                </div>

                <div class="col-md-9 col-sm-12 col-xs-12">
                    <?php if ($_smarty_tpl->tpl_vars['infoUsuario']->value){?>
                    <div class="row hidden-xs" style="margin-top: -6px;">
                        
                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                            <div style="float: right; padding: 10px 0px 10px 10px;" >
                                <ul class="nav1 ml-auto hidden-xs">
                                   
                                    <li class="nav-item">
                                        <a class="color_menu1" href="index.php?idcategoria=<?php echo @_SMICUENTA;?>
" title="Usuario Autenticado" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"><i class="fa fa-user"></i>&nbsp;<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['infoUsuario']->value['nombres']);?>
 <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['infoUsuario']->value['apellidos']);?>
</a>
                                    </li>
                                    <?php if ($_smarty_tpl->tpl_vars['infoUsuario']->value['idzona']==@_ZONAADMIN){?>
                                        <li class="nav-item" style="margin-top:-8px;"><a href="index.php?idcategoria=<?php echo @_SADMIN;?>
&amp;ne" class="color_menu1" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"><span style="color:white;">| </span><?php echo @_ROT_ADMIN;?>
</a></li>
                                        <script>
                                            localStorage.setItem("mostrar_Tbl_lateral", "no");
                                         </script>
                                    <?php }?> 
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['infoUsuario']->value['acceso_pqr']==true){?>
                                    <li class="nav-item">
                                        <a href="index.php?idcategoria=<?php echo @_PQR_ADMINISTRACION;?>
&amp;ne" class="color_menu1" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"><span style="color:white;">| </span>Administrar Solicitudes</a>
                                    </li>
                                    <?php }?> 
                                    <?php if ($_smarty_tpl->tpl_vars['infoUsuario']->value['es_editor']>0||$_smarty_tpl->tpl_vars['infoUsuario']->value['idzona']==@_ZONAADMIN){?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['modoEdicion']->value===true){?><?php }?> class="nav-item">
                                        <?php if ($_smarty_tpl->tpl_vars['modoEdicion']->value===true){?>
                                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
&amp;ne" class="color_menu1" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"><span style="color:white;">| </span><?php echo @_ROT_VER_PAGINA;?>
</a>                                        <?php }else{ ?>
                                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['idcategoria']->value;?>
&amp;e" class="color_menu1" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"><span style="color:white;">| </span><?php echo @_ROT_EDITAR_PAGINA;?>
</a>                                        <?php if ($_smarty_tpl->tpl_vars['infoUsuario']->value['idzona']==@_ZONAADMIN){?>
                                    </li>
                                    <li <?php if ($_smarty_tpl->tpl_vars['modoEdicion']->value===true){?><?php }?> class="nav-item">
                                        <!-- <a href="?idcategoria=226051">Administrar Página Inicial</a> -->
                                    </li>
                                    <?php }?> <?php }?>
                                    </li>
                                    <?php }?>

                                    <li class="nav-item">
                                            <a href="index.php?idcategoria=<?php echo @_SINICIO;?>
&amp;logout=1" title="<?php echo @_ROT_TERMINAR_SESION;?>
" class="color_menu1" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"><span style="color:white;">| </span><i class="fa fa-sign-out">
                                                    </i>&nbsp;
                                                 <?php echo @_ROT_TERMINAR_SESION;?>

                                             </a>
                                    </li>
                                     <li class="nav-item">
                                        <?php if (@_EN_INGLES!=1){?>
                                            <a class="color_menu1" href="english" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"><i style="height: 18px; width: 18px; border-radius: 2px; background-color: #FFFFFF;color: #000000; font-family: Roboto;font-size:0.83em;padding: 1px;font-weight: bold;font-style: normal;">En</i>&nbsp;English versión</a>

                                        <?php }else{ ?>

                                       
                                            <a class="color_menu1" href="https://www.ejercito.mil.co" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;text-transform: full-width;"><i style="height: 18px; width: 18px; border-radius: 2px; background-color: #FFFFFF;color: #000000; font-family: Roboto;font-size:0.83em;padding: 1px;font-weight: bold;font-style: normal;">Es</i>&nbsp;Español</a>

                                        <?php }?>
                                    </li>
                                    </li>
                                </ul>
                            </div>

                          
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="row hidden-md hidden-sm hidden-xs" style="margin-top: -6px;">
                        <div class="col-md-1 col-sm-12 col-xs-12">
                            <!--                <a class="navbar-brand" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank"></a>-->
                        </div>
                        <div class="col-md-11 col-sm-12 col-xs-12">
                            <div style="float: right; padding: 10px;" >

                                <ul class="nav1 ml-auto hidden-xs">
                                    <!--                            <li class="nav-item" style="padding-left: 20px;
                                                             background-size: 20%;
                                                             background-image: url('_templates/DEFAULT2018/recursos/Bicentenario/img/espana.svg');
                                                             background-repeat: no-repeat;
                                                             background-position: center left;">-->

                                    <?php if (@_EN_INGLES!=1){?>
                                    
                                   

                                    <li class="nav-item">
                                    <a class="color_menu1" href="login" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;text-transform: full-width;"><i class="fa fa-user"></i>&nbsp;Inicio Sesión</a>
                                    </li>

                                    <li class="nav-item">
                                         <a class="color_menu1" href="english" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"><i style="height: 18px; width: 18px; border-radius: 2px; background-color: #FFFFFF;color: #000000; font-family: Roboto;font-size:0.83em;padding: 1px;font-weight: bold;font-style: normal;">En</i>&nbsp;English versión</a>
                                    </li>

                                    <?php }else{ ?>
                                    
                                   
                                    
                                    <li class="nav-item">
                                        <a class="color_menu1" href="https://www.army.mil.co/index.php?idcategoria=113889" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;text-transform: full-width;"><span style="color:white;">| </span><i class="fa fa-user"></i>&nbsp;LOGIN</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="color_menu1" href="https://www.ejercito.mil.co" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;text-transform: full-width;"><i style="height: 18px; width: 18px; border-radius: 2px; background-color: #FFFFFF;color: #000000; font-family: Roboto;font-size:0.83em;padding: 1px;font-weight: bold;font-style: normal;">Es</i>&nbsp;Español</a>


                                    </li>
                                    <?php }?>

                                </ul>
                            </div>
                        </div>
                        <!-- Right -->

                    </div>
                    <?php }?>
                    </div>

            </div>

            <div class="row" style="font-family: 'Fira Sans', sans-serif; padding-left: 13%; padding-right:13%; padding-bottom: 16px; ">
                <!-- Brand -->
                <div class="col-md-3 col-sm-12 col-xs-12 hidden-xs">

                    <a  href="https://www.mindefensa.gov.co/" id="mindefensa_pag">

                        <img class="img img-responsive img-cabezotes" style="padding-top: 15px;" alt="Logo-Eje" src="_templates/DEFAULT2018/recursos/Bicentenario/img/mindefensa.png" alt=""></a>

                    </a>

                    <!--</div>-->
                    <!-- Collapse -->
                   
                </div>
                <!-- Links -->
                 <div class="col-md-3 col-sm-12 col-xs-12">

                    <a  href="/" id="logo">

                        <img class="img img-responsive img-cabezotes" id="imagen-logo1" style="padding-top: 15px; max-height: 70px;" alt="Logo-Eje" src="_templates/DEFAULT2018/recursos/Bicentenario/img/LOGO-EJC-ROJO.png" alt=""></a>

                    </a>

                </div>

                 <div class="col-md-1 col-sm-12 col-xs-12">

                   
                </div>
                    
                    <div class="col-md-5 col-sm-12 col-xs-12">
                         <div class="row hidden-xs" style="padding:0;padding-top:20px">
                            

                            <script>
                                function myFunction67() {
                                    var cadena123 = document.getElementById("texto_buscar34").value;
                                    var cadena1234 = "https://www.google.com/search?q=" + cadena123 + "&sitesearch=ejercito.mil.co";
                                    //location.replace(cadena1234);
                                    window.open(cadena1234);
                                }
                            </script>
                            <?php if (@_EN_INGLES!=1){?>
                                <button onclick="myFunction67()" style="background-color:  rgba(135,12,12,1);border-radius: 5px 0px 0px 5px;border: 1px solid rgba(135,12,12,1); color:white;padding:3px;">buscar</button>
                                <input class="" type="text" placeholder="Buscador..." aria-label="Search" style="border-radius: 0px 10px 10px 0px;border: 1px solid rgba(135,12,12,1); min-width: 250px;"  name="q" id="texto_buscar34" title="Type search">
                            <?php }else{ ?>
                                 <button onclick="myFunction67()" style="background-color:  rgba(135,12,12,1);border-radius: 5px 0px 0px 5px;border: 1px solid rgba(135,12,12,1); color:white;padding:3px;">find</button>
                                <input class="" type="text" placeholder="find..." aria-label="Search" style="border-radius: 0px 10px 10px 0px;border: 1px solid rgba(135,12,12,1); min-width: 250px;"  name="q" id="texto_buscar34" title="Type search">
                            <?php }?>
                           
                            
                        </div>
                    </div>
                <!--<div class="col-md-5 col-sm-12 col-xs-12">
                     <div class="row hidden-xs" style="padding:0;">
                        <?php if (@_EN_INGLES!=1){?>
                            

                             <div class="col-md-12 col-sm-12 col-xs-12">
                            <form id="searchform" target="_blank" method="get" action="https://www.google.com/search" style="width:100%;height: 10px;">
                            <div class="input-group md-form form-sm form-1 pl-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text  lighten-3" id="basic-text1" onclick="document.getElementById('searchform').submit()"  style="background-color:  rgba(135,12,12,1);border-radius: 5px 0px 0px 5px;border: 1px solid rgba(135,12,12,1);"><i class="fa fa-search text-white" aria-hidden="true"></i></span>
                              </div>
                              <input class="form-control my-0 py-1" type="text" placeholder="Buscador..." aria-label="Search" style="border-radius: 0px 10px 10px 0px;border: 1px solid rgba(135,12,12,1);"  name="q">
                               <input value="ejercito.mil.co" type="hidden" name="sitesearch">
                              
                            </div>
                            </form>
                        </div>
                        <?php }else{ ?>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <form id="searchform" target="_blank" method="get" action="https://www.google.com/search" style="width:100%;height: 10px;">
                            <div class="input-group md-form form-sm form-1 pl-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text  lighten-3" id="basic-text1" onclick="document.getElementById('searchform').submit()"  style="background-color:  rgba(135,12,12,1);border-radius: 5px 0px 0px 5px;border: 1px solid rgba(135,12,12,1);"><i class="fa fa-search text-white" aria-hidden="true"></i></span>

                              </div>
                              <input class="form-control my-0 py-1" type="text" placeholder="Búsqueda..." aria-label="Search" style="border-radius: 0px 10px 10px 0px;border: 1px solid rgba(135,12,12,1);"  name="q">
                               <input value="intranetejercito.mil.co" type="hidden" name="sitesearch">
                              
                            </div>
                            </form>
                        </div>

                        <?php }?>
                    </div>
                    

                </div>-->
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12" style=" background-color: rgba(70,70,70,1); padding-left: 5%;">
                 <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>-->

                 
                 <a id="link2" class="">
                 <button class="navbar-toggler" type="button" style="position:absolute">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                  </a>
                  
                  <div class="hidden-lg hidden-md" style="text-align:right;margin-bottom: 10px;margin-top:5px;margin-right:20%;">
                       
                       <a href="<?php echo @__FACEBOOK;?>
" title="Facebook" target="_blank" class="">
                            <img  src="_templates/DEFAULT2018/recursos/images/redes/face.png" alt="" style="padding: 5px;">
                            <p class="hidden"><?php echo @__FACEBOOK;?>
</p>
                        </a>
                        <a href="<?php echo @__TWITTER;?>
" title="Twitter" target="_blank" class="" >
                                <img  src="_templates/DEFAULT2018/recursos/images/redes/twiter.png" alt="" style="padding: 5px;">
                                <p class="hidden"><?php echo @__TWITTER;?>
</p>
                            </a>
                        <a href="<?php echo @__YOUTUBE;?>
" title="Youtube" target="_blank" class="" style="padding: 5px;">
                            <img  src="_templates/DEFAULT2018/recursos/images/redes/youtube.png" alt="" style="padding: 5px;">
                            <p class="hidden"><?php echo @__YOUTUBE;?>
</p>
                        </a>
                        <a href="<?php echo @__INSTAGRAM;?>
" title="Instagram" target="_blank" class="">
                            <img  src="_templates/DEFAULT2018/recursos/images/redes/instagram.png" alt="" style="padding: 5px;">
                            <p class="hidden"><?php echo @__INSTAGRAM;?>
</p>
                        </a>
                        
                    </div>
                  <script type="text/javascript">
                  
                  var playing_stream = true;

                  function script3() {
                    if (playing_stream){
                          
                            playing_stream = false;
                            var element = document.getElementById("navbarSupportedContent");
                            element.classList.add("collapse");
                            element.classList.remove("collapsing");

                            
                           

                            
                    }else{
                            
                            playing_stream = true;
                            var element = document.getElementById("navbarSupportedContent");
                            element.classList.add("collapsing");
                            element.classList.remove("collapse");
                            

                            
                    }
                     
                  };

                  document.getElementById('link2').onclick = function () {
                      script3();
                  };
                </script>


                <div class="row" style="">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="height:auto">

                                <ul class="navbar-nav nav1 color_menu1" id="menuhome1">
                                    
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

                                    <!--<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!=''){?><?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
<?php }?>-->

                                    <li class="nav-item" >
                                        
                                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=="Utilidades"){?>
                                            
                                        <?php }else{ ?>
                                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3!=''){?>
                                            <i class="material-icons" style="color:white;font-size: 1.4em;position: absolute; padding:0px; margin-top: 20px; margin-left:10px; color:white;"><?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
</i>
                                            <?php }?>
                                           <!-- <a class="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4!=''){?><?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['imagen'];?>
<?php }?>"  style="font-size: 1.4em;position: absolute; padding:0px; margin-top: 20px; margin-left:10px; color:white;"></a>-->
                                             <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
" class=" nav-link color_menu1 " data-hover="dropdown"   style="font-size: 1em; padding: 20px 15px 10px 20px; margin-left: 20px; text-decoration: none !important;font-family:'Roboto';" >
                                                    <?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
 
                                                </a>
                                                <ul class="nav4 dropdown-menu hidden-xs" style="padding: 0px;margin-top: -2px; box-shadow: 2px 2px 5px #999;   <?php if ($_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']!='Inicio'){?>padding-bottom:10px;<?php }?>" >
                                                    <div style="height:4px; width: 100%;background: #90240D;" ></div>

                                                     <table style=" width:1150px; overflow:hidden"  ><!--WIDTH="500px"-->
                                                      
                                                   
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <th></th>
                                                        </td>
                                                        <td>
                                                            <th></th>
                                                        </td>
                                                        <td>
                                                            <th></th>
                                                        </td>
                                                        <td>
                                                            <th></th>
                                                        </td>
                                                        <td>
                                                            <th></th>
                                                        </td>
                                                    </tr>

                                                        <tr>
                                                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['name'] = 'myhijos';
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] = ((int)5) == 0 ? 1 : (int)5;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max']);
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
                                                             <li>
                                                                <td class="">

                                                                        
                                                                        <a  href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
" style="float: left; padding:20px 10px 0px 20px; font-size: 0.95em; " class="wrap5">

                                                                            <?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['nombre'];?>

                                                                        </a>
                                                                    

                                                                </td>
                                                            </li>
                                                            <?php endfor; endif; ?>
                                                        </tr>

                                                        <tr>
                                                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['name'] = 'myhijos';
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] = ((int)5) == 0 ? 1 : (int)5;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max']);
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
                                                                 <li>
                                                                <td class="">
                                                                    
                                                                       
                                                                        <a  href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
" style="float: left; padding:20px 10px 0px 20px; font-size: 0.95em; " class="wrap5">
                                                                            <?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['nombre'];?>

                                                                        </a>
                                                                    
                                                                        
                                                                </td>
                                                                </li>
                                                            <?php endfor; endif; ?>
                                                        </tr>
                                                         <tr>
                                                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['name'] = 'myhijos';
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = (int)2;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] = ((int)5) == 0 ? 1 : (int)5;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max']);
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
                                                                <li>
                                                                <td class="">
                                                                    
                                                                        
                                                                         
                                                                        <a  href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
" style="float: left; padding:20px 10px 0px 20px; font-size: 0.95em; " class="wrap5">
                                                                            <?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['nombre'];?>

                                                                        </a>
                                                                   

                                                                </td>
                                                                </li>
                                                            <?php endfor; endif; ?>
                                                        </tr>
                                                         <tr>
                                                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['name'] = 'myhijos';
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = (int)3;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] = ((int)5) == 0 ? 1 : (int)5;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max']);
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
                                                                <li>
                                                                <td class="">
                                                                    
                                                                       
                                                                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
" style="float: left; padding:20px 10px 0px 20px; font-size: 0.95em; " class="wrap5">
                                                                            <?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['nombre'];?>

                                                                        </a>
                                                                       
                                                                   

                                                                </td>
                                                                </li>
                                                            <?php endfor; endif; ?>
                                                        </tr>
                                                         <tr>

                                                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['name'] = 'myhijos';
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = (int)4;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] = ((int)5) == 0 ? 1 : (int)5;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['myhijos']['max']);
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
                                                                <li>
                                                                <td class="">
                                                                    
                                                                       
                                                                        <a  href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['idcategoria'];?>
" style="float: left; padding:20px 10px 0px 20px; font-size: 0.95em; " class="wrap5">
                                                                            <?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['hijos'][$_smarty_tpl->getVariable('smarty')->value['section']['myhijos']['index']]['nombre'];?>

                                                                        </a>
                                                                       

                                                                </td>
                                                                </li>
                                                            <?php endfor; endif; ?>
                                                        </tr>
                                                         

                                                       
                                                    </table>
                                                </ul>
                                            
                                        <?php }?>
                                    </li>
                                    <?php endfor; endif; ?>


                                </ul>
                                
                            
                            </div>
                        </div>
                        <!-- Right -->

                    </div>

            </div>
        </div>
            
        
    </nav>



    <?php if ($_smarty_tpl->tpl_vars['esHome']->value){?>
    
     <input type="hidden" name="es_home_principal" id="es_home_principal" value="si">
    <div id="home-silder1"></div>
    <div class="container-fluid" id="home-silder3" style="" onload="cargar12()" >
        <div class="row" style="font-family: 'Fira Sans', sans-serif; margin-top:185px;" id="row_banner">
            
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <div class="row">
                    <div class="carousel slide carousel-fade"    data-ride="carousel" id="home-silder" style="border-bottom: none !important; height:100%; width:100%;">
                    


                    <?php if (@VIDEO_BANNER_YOUTUBE!=''){?>

                    <input type="hidden" name="hay_video_banner" id="hay_video_banner" value="si">

                    <div   id="fondo_gris1" class="" style="background-color: rgba(0, 0, 0, 0.5); width: 100%; height: 1000px; position: absolute; z-index: 11;margin-top:-100px;">
                       
                       <div class="col-12 col-xs-12 px-0 wrap4" id="texto_banner23" style="font-size: 2.5em; font-weight: bold; margin-top: 20%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);" hidden>
                              <?php echo @TEXTO_VIDEO_BANNER;?>

                        </div>
                         
                        <?php if (@URL_BOTON_BANNER!=''){?> 
                         <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <div class="col-md-12 " style="text-align:center">
                        <a href="<?php echo @URL_BOTON_BANNER;?>
" >
                            
                            <button type="button" id="BOTON_BANNER2"  class="btn-secondary" style="text-align: center center; color: white; background-color: rgb(125, 125, 125) !important;height:50px; padding:10px;border: none; border-radius: 10px;" hidden> <?php echo @BOTON_BANNER;?>
</button>
                            
                            </a>
                          
                         </div>
                         </div>
                        <?php }?>
                        
                    </div>
                      

                       <div id="ytplayer" class="wrap wrap1" style="height:600px; width:100%; transform: scale(1.4, 1);"></div>

                      
                    <?php }else{ ?>
                    <input type="hidden" name="hay_video_banner" id="hay_video_banner" value="no">
                     
                        <div id="fondo_negro" style="height:700px; width:100%; background: rgba(0,0,0,1); position:absolute; z-index:1" hidden></div>
                        <div class="carousel-inner" role="listbox">

                            <ol class="carousel-indicators" style="left: 20%; margin: 0px;">
                    
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ban'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['name'] = 'ban';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['banners']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total']);
?> 

                                 <li data-target="#home-silder" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['arreglo23']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']];?>
"  class="<?php if ($_smarty_tpl->tpl_vars['arreglo23']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]=='0'){?> active <?php }?>" ></li>
                               

                                <?php endfor; endif; ?>
                            </ol>

                            <?php if ($_smarty_tpl->tpl_vars['const']->value&&$_smarty_tpl->tpl_vars['idcategoria']->value!=113867){?> 
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ban'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['name'] = 'ban';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['banners']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total']);
?> 

                                <?php if ($_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['subsitio_grafico_link']==''){?>
                                    <div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['ban']['first']){?>active<?php }?>" style="height:100%">
                                        <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['subsitio_grafico_descripcion'];?>
</span>
                                        <img   class="wrap" style=" width:100% " src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['subsitio_grafico_ruta'];?>
&w=1900" alt="" />

                                       
                                    </div>
                                <?php }else{ ?>
                                    <div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['ban']['first']){?>active<?php }?>" style="height:100%">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['subsitio_grafico_link'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['subsitio_grafico_descripcion'];?>
" >
                                            <img  class="wrap" style=" min-height:300px;width:100% " src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['banners']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['subsitio_grafico_ruta'];?>
&w=1900" alt="" />

                                            
                                        </a>
                                    </div>
                                <?php }?> 
                            <?php endfor; endif; ?> 
                            <?php }?> 


                            <?php if ($_smarty_tpl->tpl_vars['idcategoria']->value==113867){?>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ban'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['name'] = 'ban';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['slider']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ban']['total']);
?> 
                                    <?php if ($_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['autor']==''){?>
                                        <div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['ban']['first']){?>active<?php }?>" style="height:100%">
                                            <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['nombre'];?>
</span>
                                            <img  class="wrap" style=" height:auto;width:100% " src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
/<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['imagen'];?>
&w=1900" alt="" >

                                             
                                        </div>
                                    <?php }else{ ?>
                                        <div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['ban']['first']){?>active<?php }?>" style="height:100%">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['autor'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['nombre'];?>
"> <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['nombre'];?>
</span>
                                                <img   class="wrap" style=" height:auto;width:100%" src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
/<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ban']['index']]['imagen'];?>
&w=1900" alt="" >
                                                
                                            </a>
                                        </div>
                                    <?php }?> 
                                <?php endfor; endif; ?> 
                            <?php }?>
                        </div>
                    <?php }?>
                    </div>
                    <!--						<div id="carouselButtons">
                                                                        <button id="pauseButton" type="button" class="btn btn-default btn-xs fa fa-pause"></button>
                                                                    </div>-->
                    <?php if (@VIDEO_BANNER_YOUTUBE==''){?>
                        <a class="left carousel-control hidden-xs " href="#home-silder" role="button" data-slide="prev" style="left:14%; top:30%;  background: transparent;">
                            

                             <img class="" style="" alt="" src="_templates/DEFAULT2018/recursos/images/anterior.png" alt="">

                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control hidden-xs " href="#home-silder" role="button" data-slide="next" style="right:14%; top:30%;  background: transparent;">
                            

                            <img class="" style="" alt="" src="_templates/DEFAULT2018/recursos/images/siguiente.png">

                            <span class="sr-only">Next</span>
                        </a>
                        <div class="col-lg-12 col-xs-12 col-sm-12 wrap10">
                        


                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <!--  id="pauseButton1"-->
                        <a  id="playButton1" class="rightbottom1 carousel-control title_destacados" href="#home-silder" role="button" data-slide="cycle" style="margin-top: -30px !important;left:55%; z-index: 2;">
                            <div class="play1-banner">
                                <p class="hidden">Play</p>
                            </div>
                            <span class="sr-only">Play</span>
                        </a>

                         <a   id="pauseButton1" class="rightbottom2 carousel-control title_destacados" href="#home-silder" role="button" data-slide="pause" style="margin-top: -30px !important;left:55%; z-index: 2;">
                            <div class="pause1-banner">
                                <p class="hidden">pause</p>
                            </div>
                            <span class="sr-only">Pause</span>
                        </a>
                        </div>
                        </div>

                    

                    
                   <!--

                    <ol class="carousel-indicators">
                        <li data-target="#home-silder" data-slide-to="0" class="active"></li>
                        <li data-target="#home-silder" data-slide-to="1"></li>
                        <li data-target="#home-silder" data-slide-to="2"></li>
                        <li data-target="#home-silder" data-slide-to="3"></li>
                    </ol>    -->

                     <?php }?>
                    <!--<a onmouseup="mouseUp1()" id="pauseButton1" class="rightbottom2 carousel-control" href="#home-silder" role="button" data-slide="pause">
                        <div  id="pauseButton2" class="pause1-banner">
                            <p class="hidden">Right</p>
                        </div>
                        <span class="sr-only">Next</span>
                    </a>-->

                </div>
            </div>
        
        </div>
    </div>
    <?php if (@_EN_INGLES!=1){?>
        
        <div class="col-12 col-xs-12 px-0 wrap4 hidden-xs" id="texto_banner23" style="font-size: 2em; font-weight: bold; margin-bottom: 0px;color:rgba(255,255,255,1);position:absolute; bottom:20%; left: 15%; background-color:rgba(0,0,0,0.9); max-width: 360px; ">
          <p style="padding:10px;margin:0px;">   EJÉRCITO NACIONAL <br>
             DE COLOMBIA</p>
        </div>
        
    <?php }?>
    <?php }else{ ?>
    <input type="hidden" name="hay_video_banner" id="hay_video_banner" value="no">
    <div id="home-silder" hidden></div>
    <div id="home-silder1" hidden></div>
    
    </div>
    <input type="hidden" name="es_home_principal" id="es_home_principal" value="no">
    <div class="container-fluid" style="font-family: 'Fira Sans', sans-serif;">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <!--<div class="row">-->
                <div class="row" id="cabezote-internas" style="border-bottom: none !important;background: url(<?php echo @_DIRIMAGES;?>
cabezote/banner/DSC_0024.JPG) no-repeat; background-position: center center; height: 400px;opacity: .9; margin-top: 20px;">
                    <div class="mascara-cabezote"></div>
                    <div class="alto_contraste">
                    </div>
                </div>
                <div class="container container-cabezote">
                    <div class="nombre-slide-interna hidden-xs" id="slide-internas" style="margin:18% 0 0 0; "><?php echo $_smarty_tpl->tpl_vars['rutetoroot']->value[3]['nombre'];?>
</div>
                    <div class="nombre-slide-interna hidden-lg hidden-sm hidden-md" id="slide-internas" style="margin:60% 0 0 0; "><?php echo $_smarty_tpl->tpl_vars['rutetoroot']->value[3]['nombre'];?>
</div>
                    <!--<div class="line-cabezote"></div>-->
                </div>
                <!--</div>-->
            </div>
        </div>
    </div>
    <?php }?>

    <div id="forolink" style="z-index: 1100;">
  
    <button class="wrap6" onclick="invertir()"> <img  src="_templates/DEFAULT2018/recursos/images/redes/invert_colors.png" alt="" style="padding: 5px;width:30px; left:-20px;position:absolute; top:-5px;"></button>
    <button onclick="zoomOut()" style="font-family: 'Roboto'; font-weight: 700;background: transparent; color:white;border:0px; transform: rotate(90deg); font-size: 1.3em;">A- &nbsp</button>
    <button onclick="zoomIn()" style="font-family: 'Roboto'; font-weight: 700;background:transparent; color:white;border:0px; transform: rotate(90deg); font-size: 1.3em;">A+ &nbsp</button>
     
</div>


</header>


<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

<!--<div class="popup col-md-12 col-lg-12 col-sm-12 col-12" onclick="myFunction()" >
  <span class="popuptext" id="myPopup" style="height: 350px; width: 350px;text-align: center;">CERRAR<div class="col-md-12 col-lg-12 col-sm-12 col-12" style="height: 300px; width: 300px;">
<iframe id="85F57E947FBC4A648B8BE9DA1A772FA2023" width="320" height="300" allow="autoplay;fullscreen" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true" msallowfullscreen="true" frameborder="0" marginheight="0px" marginwidth="0px" style="text-align: center;float: center;" onclick="myFunction()"></iframe>
<script style="text-align: center;float: center;">
document.getElementById('85F57E947FBC4A648B8BE9DA1A772FA2023').src='https://shares.enetres.net/live.php?source=CoreV1&v=85F57E947FBC4A648B8BE9DA1A772FA2023&view=embed&rnd='+Math.random();
</script>
</div></span>
</div>-->




<script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>
    
<script type="text/javascript">
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '390',
            width: '640',
            videoId: 'HJ8nP7nvhh4',
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }
    function onPlayerReady(event) {

        loopStart();
        player.playVideo();
        player.mute();
    }
    function loopStart() {
        player.seekTo(27);   // Start at 7 seconds
    }
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {
            setTimeout(loopStart, 15000); // After 5 seconds, restart the loop
        }
    }
</script>

<script>
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var url_video_youtube2 = document.getElementById("url_video_youtube1").value;
var time_video_youtube2 = document.getElementById("time_video_youtube1").value;
//alert(document.getElementById("url_video_youtube1").value);


var videoId = url_video_youtube2;
var startSeconds = 1;
var endSeconds =  time_video_youtube2;

// Replace the 'ytplayer' element with an <iframe> and
// YouTube player after the API code downloads.
var player;

var playerConfig = {
  height: '100%',
  width: '100%',
  videoId: videoId,
  playerVars: {
    autoplay: 1, // Auto-play the video on load
    controls: 0, // Show pause/play buttons in player
    showinfo: 0, // Hide the video title
    modestbranding: 1, // Hide the Youtube Logo
    fs: 1, // Hide the full screen button
    cc_load_policy: 0, // Hide closed captions
    iv_load_policy: 3, // Hide the Video Annotations
    start: startSeconds,
    end: endSeconds,
    autohide: 0, // Hide video controls when playing
  },
  /*events: {
    'onStateChange': onStateChange
  }*/
  events: {
                'onReady': onPlayerReady,
                'onStateChange': onStateChange
            }


};

function onYouTubePlayerAPIReady() {
  player = new YT.Player('ytplayer', playerConfig);
  
}

function onStateChange(state) {
  if (state.data === YT.PlayerState.ENDED) {
    player.loadVideoById({
      videoId: videoId,
      startSeconds: startSeconds,
      endSeconds: endSeconds
    });
  }
}
 function onPlayerReady(event) {

        
        player.playVideo();
        player.mute();
    }


    </script>
<?php }} ?>