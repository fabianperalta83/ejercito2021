<?php /* Smarty version Smarty-3.1.8, created on 2021-04-14 14:53:05
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_cabezote.html" */ ?>
<?php /*%%SmartyHeaderCode:2090057151602e5ef311a7b6-79057272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c0831a39ba5e87f708211e6495068f6c0882e2c' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_cabezote.html',
      1 => 1618411975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2090057151602e5ef311a7b6-79057272',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e5ef3462181_92992126',
  'variables' => 
  array (
    'noticias' => 0,
    'infoUsuario' => 0,
    'modoEdicion' => 0,
    'idcategoria' => 0,
    'menuHerramientas' => 0,
    'logo_subsitio' => 0,
    'logo_default' => 0,
    'menuInstitucional' => 0,
    'esHome' => 0,
    '_video_banner1' => 0,
    'slide_home' => 0,
    'arreglo234' => 0,
    'slide_home1' => 0,
    'entro' => 0,
    'rutetoroot' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e5ef3462181_92992126')) {function content_602e5ef3462181_92992126($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.capitalize.php';
if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?>
<div>
    <style type="text/css">
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
        background-color: #326A94;
        border-radius: 25px 25px 0 0;
        margin: 0;
        padding: 15px 20px;
        position: fixed;
        right: -55px;
        top: 80%;
    }
    </style>

    <style>

        footer{
            padding-top: 20px;
            padding-bottom: 30px;
            /*background: url('_templates/DEFAULT2018/recursos/images/footer.jpg') center center;*/
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


    </style>
    <style>
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


        .fondo1{
                /*padding-top: 20px;
                padding-bottom: 20px;
                background: url('_templates/Subsitio2018/recursos/images/web.png') center center;
                background-size: cover;
                background-color: transparent;
                background-repeat: no-repeat;*/
                 background:#FFF;
            }
         .fondo2{
                
                background:#FFF;
            }
    </style>



</div>


<link href="_templates/Subsitio2018/recursos/Bicentenario/bicentenario.css" rel="stylesheet" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="_templates/DEFAULT2018/recursos/Bicentenario/css/bootstrap.min.css" rel="stylesheet">

<!-- Material Design Bootstrap -->
<link href="_templates/DEFAULT2018/recursos/Bicentenario/css/mdb.min.css" rel="stylesheet">
<!-- Your custom styles (optional) -->
<link href="_templates/Subsitio2018/recursos/Bicentenario/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    function mostrar_menu_otro() {
        if (document.getElementById('div_menu_oculto_otro').style.display == 'none') {
            $('#div_menu_oculto_otro').toggle('slow');
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
        } else {
            document.getElementById("navbar").style.padding = "10px 10px";
            document.getElementById("logo").style.fontSize = "35px";
        }
    }


    window.onscroll = function() 
    {
        var VarraDes = window.scrollY;
        var x = $(window).width();
        
        if( x < 700)
        {
            if (VarraDes > 80) {
                //$(".color_menu2").css("background-color", "#FFF");
            }
            else
            {
                //$(".color_menu2").css("background-color", "#000");
            }
        }
        else
        {
             //$(".color_menu2").css("background-color", "transparent");
        }
        
        if (VarraDes > 80) {
            //alert("aaa");
            
            /*document.getElementById("imagen-logo1").left="0px";
            document.getElementById("imagen-logo1").width="0px";*/
             //$(".color_menu1").css("color", "#000");
             //$(".color_menu2").css("color", "#000");
           

             //var element = document.getElementById("menu_sup32");
             //element.classList.add("fondo2");
             //element.classList.remove("fondo1");
             
             //$(".fondo1").css("background", "#FFF");
        } else {
            //alert("bbb");
            
            /*document.getElementById("imagen-logo1").left="0px";
            document.getElementById("imagen-logo1").width="43px";*/
             //$(".color_menu1").css("color", "#FFF");
             //$(".color_menu2").css("color", "#FFF");
             

            
             //var element = document.getElementById("menu_sup32");
             //element.classList.add("fondo1");
             //element.classList.remove("fondo2");
             
             //$(".fondo1").css("background", "url('_templates/Subsitio2018/recursos/images/web.png') center center");
             
             //$(".fondo1").css("background-repeat", "no-repeat");

        }
    };

    window.onload=function(){
        var x = $(window).width();
        if( x < 1024)
        {
            
           
           
           // document.getElementById("acorta_rezise").style="height:100%;width:100%;";
            

           // document.getElementById("iframe23").style="width: 100%; height: auto; min-height: 350px;";

           // document.getElementById("image23").style= "left:42%";
           document.getElementById("imagen-logo2").style="float: right; margin-top: -70px; max-height: 70px; margin-right:-20px;";

            $(".color_menu2").css("background-color", "#000");
            document.getElementById("cambia_pos_titulo").style="position:absolute; left:70px;";
            
        }
        else
        {
            document.getElementById("imagen-logo2").style="max-height:70px;";
            //document.getElementById("acorta_rezise").style="";
            document.getElementById("cambia_pos_titulo").style="position:relative; left:10px;";
            $(".color_menu2").css("background-color", "transparent");
            
            //document.getElementById("image23").style= "left: 44%;";

            
        }


        
        
        var video_banner1 = document.getElementById("hay_video_banner").value;

        if (video_banner1 == "no")
        {
           if( x < 1024)
            {
                 document.getElementById("carrusel1").style="height:100%;margin-top: 0px;";
                if( x < 435)
                {
                    document.getElementById("carrusel1").style="height:100%;margin-top:0px;";
                }
                 document.getElementById("id_imag_not3").style="background: url('{$smarty.const._DIRIMAGES_USER}{$noticias[0][0].imagen}')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;";

                 document.getElementById("pauseButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
                 document.getElementById("playButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
            }
             else
            {
                 document.getElementById("carrusel1").style="height:100%;";
                 document.getElementById("id_imag_not3").style="background: url('{$smarty.const._DIRIMAGES_USER}{$noticias[0][0].imagen}')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 460px; border-bottom: none !important;";
                 document.getElementById("pauseButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
                 document.getElementById("playButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
            }   

        }
        else
        {
        
           

           if( x < 900)
            {
                document.getElementById("ytplayer").style="transform: scale(1.8, 2.1);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms; height:350px;";   
                document.getElementById("id_imag_not3").style="background: url('{$smarty.const._DIRIMAGES_USER}{$noticias[0][0].imagen}')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;";
               
            }
            else
            {
                document.getElementById("ytplayer").style="transform: scale(2, 1.8);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms; height:350px;";  
                document.getElementById("id_imag_not3").style="background: url('{$smarty.const._DIRIMAGES_USER}{$noticias[0][0].imagen}')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 460px; border-bottom: none !important;";
              
            }

            

            if( x < 1024)
                {
                

               
                /*document.getElementById("texto_banner23").style="font-size: 30px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/
                document.getElementById("texto_banner23").style="font-size: 30px;font-weight: bold; margin-top: 90%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);"; 
                 //$(".wrap4").css("font-size", 30);


                 $(".wrap3").css("margin-top", 500);

                 //document.getElementById("BOTON_BANNER2").style="background-color:rgba(96,5,12,1); width:30%; height:100px; border-radius: 50%; margin-top: 41%;text-align:center;margin-left:35%;color:white; font-size:30px;";
                

            }
            else
            {
                
                /*document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/
               
                document.getElementById("texto_banner23").style="font-size: 50px;font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";
               // $(".wrap4").css("font-size", 50);
                 $(".wrap3").css("margin-top", 650);

                 //document.getElementById("BOTON_BANNER2").style="background-color:rgba(96,5,12,1); width:8%; height:100px; border-radius: 50%; margin-top: 34%;text-align:center;margin-left:46%;color:white; font-size:30px;";
                 
            }
        }
         //$("#fondo_negro").fadeOut(3000);
    };
</script>



<style type="text/css">
    * {
                margin:0px;
                padding:0px;
            }
            
            #header {
                margin:auto;
                width:500px;
                font-family:Arial, Helvetica, sans-serif;
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



            
            .nav4 > li {
                float:left;
                 border-bottom: 40px;
            }
            
            .nav4 li a {
                background-color: transparent;
                
                text-decoration:none;
                padding:4px 12px;
                display:block;
                font-size: 12px;
                font-weight: bold;
                
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
     

    .slide-destacados10 a {
        padding-left: 15px;
        position:  relative;

    }

    .slide-destacados10 a::before {
        content: '';
        width: 2px;
       /* opacity: 0.7;*/
        height: 220%;
        /*top: -8px;*/
        left: 5px;
        background: #90240D;
        position:  absolute;
    }

    .slide-destacados11 a {
        padding-left: 15px;
        position:  relative;

    }

    .slide-destacados11 a::before {
        content: '';
        width: 2px;
        /*opacity: 0.7;*/
        height: 160%;
        /*top: -8px;*/
        left: 5px;
        background: #90240D;
        position:  absolute;
    }
     

    .slide-destacados12 a {
        padding-left: 15px;
        position:  relative;

    }

    .slide-destacados12 a::before {
        content: '';
        width: 2px;
       /* opacity: 0.7;*/
        height: 140%;
        /*top: -8px;*/
        left: 5px;
        background: #90240D;
        position:  absolute;
    }    


    .slide-destacados13 a {
        padding-left: 15px;
        position:  relative;

    }

    .slide-destacados13 a::before {
        content: '';
        width: 2px;
        /*opacity: 0.7;*/
        height: 50%;
        /*top: -8px;*/
        left: 5px;
        background: #90240D;
        position:  absolute;
    }   

    .color_menu1 a{
        color: #FFF;
    } 

    .color_menu2 a{
        color: #FFF;
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
    .wrap8{

    }
    .wrap9{

    }

    .wrap10{

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

<style type="text/css">
    .imginfder 
    {
        position: absolute;
        bottom: 0px;
        right: 0px;
    }


    #forolink1 {
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
}
</style>


<header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        
        
        
        $(document).ready(function(){
             var x = $(window).width();
             

             //cambia_pos_titulo
            if( x < 1024)
            {
                document.getElementById("imagen-logo2").style="float: right; margin-top: -70px; max-height: 70px; margin-right:-20px;";
                document.getElementById("cambia_pos_titulo").style="position:absolute; left:70px;";
                $(".color_menu2").css("background-color", "#000");

                //document.getElementById("iframe23").style="width: 100%; height: auto; min-height: 350px;";
                //style=""
                //document.getElementById("image23").style= "left:42%";

                //document.getElementById("acorta_rezise").style="height:100%;width:100%;";

                
                
            }
            else
            {
                //document.getElementById("cambia_pos_titulo").style="position:relative; left:10px;";
                
            }


             if(localStorage.getItem("invertirse1")=="si")
              {
                invertir();
              }


            $(window).resize(function(){
                var x = $(window).width();
                if( x < 1024)
                {
                    
                   
                   
                   // document.getElementById("acorta_rezise").style="height:100%;width:100%;";
                    

                   // document.getElementById("iframe23").style="width: 100%; height: auto; min-height: 350px;";

                   // document.getElementById("image23").style= "left:42%";
                   document.getElementById("imagen-logo2").style="float: right; margin-top: -70px; max-height: 70px; margin-right:-20px;";

                    $(".color_menu2").css("background-color", "#000");
                    document.getElementById("cambia_pos_titulo").style="position:absolute; left:70px;";
                    
                }
                else
                {
                    document.getElementById("imagen-logo2").style="max-height:70px;";
                    //document.getElementById("acorta_rezise").style="";
                    document.getElementById("cambia_pos_titulo").style="position:relative; left:10px;";
                    $(".color_menu2").css("background-color", "transparent");
                    
                    //document.getElementById("image23").style= "left: 44%;";

                    
                }

                
                var video_banner1 = document.getElementById("hay_video_banner").value;

                if (video_banner1 == "no")
                {
                   if( x < 1024)
                    {
                         document.getElementById("carrusel1").style="height:100%;margin-top: 0px;";
                        if( x < 435)
                        {
                            document.getElementById("carrusel1").style="height:100%;margin-top:0px;";
                        }
                         document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;";

                         document.getElementById("pauseButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
                         document.getElementById("playButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
                    }
                     else
                    {
                         document.getElementById("carrusel1").style="height:100%;";
                         document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 460px; border-bottom: none !important;";
                         document.getElementById("pauseButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
                         document.getElementById("playButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
                    }   

                }
                else
                {
                
                   

                   if( x < 900)
                    {
                        document.getElementById("ytplayer").style="transform: scale(1.8, 2.1);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms; height:350px;";   
                        document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;";
                       
                    }
                    else
                    {
                        document.getElementById("ytplayer").style="transform: scale(2, 1.8);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms; height:350px;";  
                        document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 460px; border-bottom: none !important;";
                      
                    }

                   


                    
                   

                    if( x < 1024)
                        {
                        

                       
                        /*document.getElementById("texto_banner23").style="font-size: 30px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/
                        document.getElementById("texto_banner23").style="font-size: 30px;font-weight: bold; margin-top: 90%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);"; 
                         //$(".wrap4").css("font-size", 30);


                         $(".wrap3").css("margin-top", 500);

                         //document.getElementById("BOTON_BANNER2").style="background-color:rgba(96,5,12,1); width:30%; height:100px; border-radius: 50%; margin-top: 41%;text-align:center;margin-left:35%;color:white; font-size:30px;";
                        

                    }
                    else
                    {
                        
                        /*document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/
                       
                        document.getElementById("texto_banner23").style="font-size: 50px;font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";
                       // $(".wrap4").css("font-size", 50);
                         $(".wrap3").css("margin-top", 650);

                         //document.getElementById("BOTON_BANNER2").style="background-color:rgba(96,5,12,1); width:8%; height:100px; border-radius: 50%; margin-top: 34%;text-align:center;margin-left:46%;color:white; font-size:30px;";
                         
                    }
                }
            });
            

                var x = $(window).width();
                if( x < 1024)
                {
                    document.getElementById("cambia_pos_titulo").style="position:absolute; left:70px;";
                    $(".color_menu2").css("background-color", "#000");
                   
                   // document.getElementById("acorta_rezise").style="height:100%;width:100%;";
                    

                   // document.getElementById("iframe23").style="width: 100%; height: auto; min-height: 350px;";

                   // document.getElementById("image23").style= "left:42%";
                  
                    
                }
                else
                {
                    //document.getElementById("acorta_rezise").style="";
                    document.getElementById("cambia_pos_titulo").style="position:relative; left:10px;";
                    $(".color_menu2").css("background-color", "transparent");
                     
                   

                    //document.getElementById("image23").style= "left: 44%;";
  
                }


                var video_banner1 = document.getElementById("hay_video_banner").value;

                if (video_banner1 == "no")
                {
                    if( x < 1024)
                    {
                         document.getElementById("carrusel1").style="height:100%;margin-top: 0px;";
                         if( x < 435)
                        {
                            document.getElementById("carrusel1").style="height:100%;margin-top:0px;";
                        }
                        document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;";

                         document.getElementById("pauseButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";
                         document.getElementById("playButton1").style="margin-top: -30px !important;left:60%; z-index: 2;";

                    }
                     else
                    {
                         document.getElementById("pauseButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";
                         document.getElementById("playButton1").style="margin-top: -30px !important;left:54%; z-index: 2;";

                    }   

                }
                else
                {
                
                   

                   if( x < 1024)
                    {
                        document.getElementById("ytplayer").style="transform: scale(1.8, 2.1);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms;height:350px;";  
                        document.getElementById("id_imag_not3").style="background: url('<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value[0][0]['imagen'];?>
')!important; background-size: cover!important; background-repeat: no-repeat!important; background-position: center center!important; width: 100%; height: 260px; border-bottom: none !important;"; 
                       
                    }
                    else
                    {
                        document.getElementById("ytplayer").style="transform: scale(2, 1.8);position: relative; z-index: 10; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none;  transition-property: opacity; transition-duration: 1000ms; height:350px;";  
                      
                    }

                   

                    if( x < 1024)
                        {
                        

                       
                        /*document.getElementById("texto_banner23").style="font-size: 30px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/
                        document.getElementById("texto_banner23").style="font-size: 30px;font-weight: bold; margin-top: 90%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);"; 
                         //$(".wrap4").css("font-size", 30);


                         $(".wrap3").css("margin-top", 500);

                         //document.getElementById("BOTON_BANNER2").style="background-color:rgba(96,5,12,1); width:30%; height:100px; border-radius: 50%; margin-top: 41%;text-align:center;margin-left:35%;color:white; font-size:30px;";
                         

                    }
                    else
                    {
                        
                        /*document.getElementById("texto_banner23").style="font-size: 50px; font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";*/
                       
                        document.getElementById("texto_banner23").style="font-size: 50px;font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);";
                       // $(".wrap4").css("font-size", 50);
                         $(".wrap3").css("margin-top", 650);

                         //document.getElementById("BOTON_BANNER2").style="background-color:rgba(96,5,12,1); width:8%; height:100px; border-radius: 50%; margin-top: 34%;text-align:center;margin-left:46%;color:white; font-size:30px;";
                    }




                }

            

             
           

           
        });
        var fontSize = 1;
         var invertirse = false;
 
        // funcion para aumentar la fuente
        function zoomIn() {
            if(fontSize < 2)
            {
            
                fontSize += 0.1;

                var fontSize2= fontSize - 0.5 ;

                document.body.style.fontSize = fontSize + "em";
                

                
                $(".wrap5").css("font-size", fontSize + "em");


              

                if(document.getElementById("es_home_principal").value == "no")
                {
                    $(".wrap9").css("font-size", fontSize + "em");

                    var fontSize3= fontSize + 0.5 ;
                    $(".titulo-interna").css("font-size", fontSize3 + "em");
                    $(".wrap8").css("font-size", fontSize + "em");   
                    $(".wrap10").css("font-size", fontSize + "em");     
                }
                else
                {
                   var fontSize3= fontSize + 0.5 ;
                   var fontSize4= fontSize + 1.5 ;
                   document.getElementById("noticias_interes1").style="font-weight: bold;color:black;font-size: "+ fontSize +"em";

                   document.getElementById("title-galeria").style="font-weight: bold;color: white;font-size: "+ fontSize +"em";
                   document.getElementById("title_recurso").style="font-weight: bold; color:black; margin-bottom:30px;font-size: "+ fontSize4 +"em";

                }
            }
        }
 
        // funcion para disminuir la fuente
        function zoomOut() {
             if(fontSize > 0.8)
            {
                fontSize -= 0.1;

                var fontSize2= fontSize - 0.5 ;
                
                var fontSize3= fontSize + 0.5 ;
                   var fontSize4= fontSize + 1.5 ;

                document.body.style.fontSize = fontSize + "em";
                $(".wrap5").css("font-size", fontSize + "em");

                if(document.getElementById("es_home_principal").value == "no")
                {
                     $(".wrap9").css("font-size", fontSize + "em");  

                     
                    $(".titulo-interna").css("font-size", fontSize3 + "em");
                     $(".wrap8").css("font-size", fontSize + "em"); 
                }
                else
                {
                   
                   document.getElementById("noticias_interes1").style="font-weight: bold;color:black;font-size: "+ fontSize +"em";
                  

                   document.getElementById("title-galeria").style="font-weight: bold;color: white;font-size: "+ fontSize +"em";
                  
                    document.getElementById("title_recurso").style="font-weight: bold; color:black; margin-bottom:30px;font-size: "+ fontSize4 +"em";

                }   
            }
        }

        function invertir(){
            //alert(document.getElementById("es_home_principal").value);
            if(invertirse)
            {

                localStorage.setItem("invertirse1", "no");

                document.getElementById("cuerpo_contenido").style="";
                invertirse=false;

                document.getElementById("menu_sup32").style="background-repeat: no-repeat; z-index: 13; padding: 0px; border:none;";

                document.getElementById("imagen-logo1").style="padding-top: 10px; max-height: 80px;margin-left:80px";



                

                //document.getElementById("iframe23").style="width: 100%; height: auto; min-height: 350px; padding-left: 40px;";  

                if(document.getElementById("es_home_principal").value == "no")
                {
                    /*$(".titulo-interna").css("color", "black");
                    $(".wrap8").css("color", "black");
                    
                    $(".secondaryBody").css("background", "transparent");


                    document.getElementById("cabezote-internas").style="border-bottom: none !important;background: url(<?php echo @_DIRIMAGES;?>
cabezote/banner/DSC_0024.JPG) no-repeat; background-position: center center; height: 400px;opacity: .9;";


                    $(".menuSegNivel").css("background", "transparent");
                    $(".wrap9").css("color", "black");

                    $(".entradilla").css("color", "black");
                    $(".default_descripcion").css("color", "black");

                    $(".s_fecha").css("color", "black");
                    $(".listaEntradilla").css("color", "black");*/

                     $(".secondaryBody").css("background", "transparent");
                     document.getElementById("cabezote-internas").style="border-bottom: none !important;background: url(<?php echo @_DIRIMAGES;?>
cabezote/banner/DSC_0024.JPG) no-repeat; background-position: center center; height: 400px;opacity: .9;";
                     $(".titulo-interna").css("color", "black");
                     $(".menuSegNivel").css("background", "#7C0808");
                     $(".wrap8").css("color", "black");
                     $(".wrap9").css("background", "#A5A291");
                     $(".wrap10").css("background", "white");
                }
                else
                {   

                   /* document.getElementById("home-silder3").style="";

                    document.getElementById("descatados1").style="font-family: 'Fira Sans', sans-serif; ";

                    document.getElementById("descatados2").style="font-family: 'Fira Sans', sans-serif; background: white; margin-top:-2px; color:black;";

                     document.getElementById("SliderBicentenario").style="margin-top:20px;";


                     document.getElementById("internacional1").style="";
                    document.getElementById("nacional1").style="";
                    document.getElementById("actualidad1").style="";
                    //$(".wrap7").css("color", "black");
                    //document.getElementById("noticias_interes1").style="font-size: 1.25em;font-weight: bold;";
                    document.getElementById("EJERCITO_REDES1").style="font-size: 2.6em; font-weight: bold; margin-top: 30px; margin-bottom: 25px;";

                    document.getElementById("heroes_bicentenarios").style="font-size: 2.3em;font-weight: bold; margin: 30px 0;";*/
                   // $(".margin-noticias").css("background", "rgba(50,50,50,1)");    
                    $(".height-multi").css("background", "white");  
                    $(".wrap8").css("color", "black");
                    $(".wrap9").css("background", "white");
                    document.getElementById("descatados2").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  margin-bottom:0; background: rgba(230,230,230,1);z-index:12;";
                }

            }
            else
            {
                
                 localStorage.setItem("invertirse1", "si");
                    
                document.getElementById("cuerpo_contenido").style=" background:black!important;";
                invertirse = true;

                document.getElementById("menu_sup32").style="-webkit-filter: invert(100%);filter: invert(100%);background-repeat: no-repeat; z-index: 13; padding: 0px; border:none;";

                document.getElementById("imagen-logo1").style="padding-top: 15px;-webkit-filter: grayscale(100%);filter: grayscale(100%);";

                

                


                if(document.getElementById("es_home_principal").value == "no")
                {
                    /*$(".titulo-interna").css("color", "white");
                    $(".wrap8").css("color", "white");
                    $(".secondaryBody").css("background", "black");
                    document.getElementById("cabezote-internas").style="border-bottom: none !important;background: url(<?php echo @_DIRIMAGES;?>
cabezote/banner/DSC_0024.JPG) no-repeat; background-position: center center; height: 400px;opacity: .9; z-index:1;";
                    $(".menuSegNivel").css("background", "black");
                    $(".wrap9").css("color", "white");

                    $(".entradilla").css("color", "white");
                    $(".default_descripcion").css("color", "white");

                     $(".s_fecha").css("color", "white");
                    $(".listaEntradilla").css("color", "white");*/
                     $(".secondaryBody").css("background", "black");
                     document.getElementById("cabezote-internas").style="border-bottom: none !important;background: url(<?php echo @_DIRIMAGES;?>
cabezote/banner/DSC_0024.JPG) no-repeat; background-position: center center; height: 400px;opacity: .9; z-index:1;";
                     $(".titulo-interna").css("color", "white");
                     $(".menuSegNivel").css("background", "black");
                      $(".wrap8").css("color", "white");
                       $(".wrap9").css("background", "transparent");
                       $(".wrap10").css("background", "black");
                }
                else
                {  
                    /*document.getElementById("descatados1").style="font-family: 'Fira Sans', sans-serif;  background:black!important;";

                    document.getElementById("descatados2").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px; background:black!important; color:white";

                     document.getElementById("SliderBicentenario").style="margin-top:20px; color:white;";

                      document.getElementById("internacional1").style="color: white!important;";
                    document.getElementById("nacional1").style="color: white!important;";
                    document.getElementById("actualidad1").style="color: white!important;";

                    document.getElementById("EJERCITO_REDES1").style="font-size: 2.6em; font-weight: bold; margin-top: 30px; margin-bottom: 25px; color:white;";

                    document.getElementById("heroes_bicentenarios").style="font-size: 2.3em;font-weight: bold; margin: 30px 0;  color:white;";*/
                    //$(".margin-noticias").css("background", "black"); 
                     $(".height-multi").css("background", "black"); 
                     $(".wrap8").css("color", "white");
                      $(".wrap9").css("background", "black");  
                      document.getElementById("descatados2").style="font-family: 'Fira Sans', sans-serif; margin-top:-2px;  margin-bottom:0; background: rgba(0,0,0,1);z-index:12;";

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
        
    </script>



     <!-- fixed-top la vuelve mobible  y crolling-navbar la vuelve fija-->
     <!-- <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar fondo1" style="background-repeat: no-repeat; z-index: 13; padding: 0px; border:none;" id="menu_sup32">
        <div class="container-fluid" id="acorta_rezise" style="padding: 0px;">
            <div class="" style="">
            <div class="col-md-12 col-sm-12 col-xs-12 " style="height: 23px; width: 100%; background-color: #36c; padding-left: 13%; padding-right:13%; ">
                <div class="col-md-2 col-sm-12 col-xs-12">

                    <a  href="https://www.gov.co/home" id="logo_gov">

                        <img class="img img-responsive img-cabezotes" id="imagen-gov" style="padding-top: 0px; max-height:20px; max-width:100px;" alt="Logo-gov" src="_templates/DEFAULT2018/recursos/Bicentenario/img/logo_gov.png"></a>

                    </a>
                </div>


                 <div class="col-md-10 col-sm-12 col-xs-12 hidden-md hidden-sm hidden-xs" style="background-color: #DCE3FF; height: 17px;" >

                    <div class="col-md-5 col-sm-12 col-xs-12" style="text-align: left;background-color: #DCE3FF; font-size: x-small;" >
                    <a  href="https://www.gov.co/ficha-tramites-y-servicios/"  style="">

                        El Estado no tiene porqué ser tan aburrido !conoce a GOV.CO!

                    </a>

                    </div>
                    <div class="col-md-1 col-sm-12 col-xs-12" style="" >
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12" style="text-align: right;margin-top:-3px; " >

                    <a  href="https://www.gov.co/ficha-tramites-y-servicios/" style="text-align: right;  font-size: x-small; margin-right:20px;" >

                        TRÁMITES Y SERVICIOS

                    </a>
                   
                     <a  href="https://www.gov.co/tu-opinion-cuenta/" style="text-align: right; font-size: x-small; margin-right:20px;">

                        
                        PARTICIPACÍON

                    </a>
                    
                     <a  href="https://www.gov.co/entidades/" style="text-align: right; font-size: x-small; margin-right:20px;">

                        ENTIDADES

                    </a>
                    </div>
                </div>
            </div>


             <div class="col-md-12 col-sm-12 col-xs-12 hidden-md hidden-sm hidden-xs" style="height: 26px; width: 100%; background-color: rgba(124,8,8,1); padding-left: 13%; padding-right:13%; min-height:35px;">
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
                    <div class="row hidden-xs" style="margin-top: 8px; float:right">
                        <div class="col-md-1 col-sm-12 col-xs-12">
                            <a class="navbar-brand" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank"></a>
                        </div>
                        <div class="col-md-11 col-sm-12 col-xs-12">
                            <div style="float: right; padding: 10px;" >
                                <ul class="nav1 ml-auto hidden-xs">
                                   
                                    <li class="nav-item">
                                        <a class="color_menu1" href="index.php?idcategoria=<?php echo @_SMICUENTA;?>
" title="Usuario Autenticado" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"><i class="fa fa-user"></i>&nbsp;<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['infoUsuario']->value['nombres']);?>
 <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['infoUsuario']->value['apellidos']);?>
</a>
                                    </li>
                                    <?php if ($_smarty_tpl->tpl_vars['infoUsuario']->value['idzona']==@_ZONAADMIN){?>
                                        <li class="nav-item"><a href="index.php?idcategoria=<?php echo @_SADMIN;?>
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
" class="nav-link color_menu1" style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"><span style="color:white;">| </span><i class="fa fa-sign-out"></i>&nbsp;
                                     <?php echo @_ROT_TERMINAR_SESION;?>

                                             </a>
                                    </li>
                                     
                                </ul>
                            </div>

                          
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="row hidden-md hidden-sm hidden-xs" style="margin-top: 8px; float:right">
                        <div class="col-md-1 col-sm-12 col-xs-12">
                            <!--                <a class="navbar-brand" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank"></a>-->
                        </div>
                       

                        <div class="col-md-11 col-sm-12 col-xs-12">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                <ul class="nav1 ml-auto hidden-xs" style="">
                                  
                                  
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['name'] = 'mysec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mysec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuHerramientas']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                        <li class="nav-item">
                                            <a class="nav-link color_menu1" href="<?php echo $_smarty_tpl->tpl_vars['menuHerramientas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['vinculo'];?>
" title="home" <?php if ($_smarty_tpl->tpl_vars['idcategoria']->value==$_smarty_tpl->tpl_vars['menuHerramientas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['id']){?>class="seleccionado color_menu1"<?php }?> style="background-color: transparent;font-family: Roboto; font-size: 0.85em; margin-top:-5px; color:white;"> <?php if ($_smarty_tpl->tpl_vars['menuHerramientas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre']=="Login"){?><i class="fa fa-user"></i>&nbsp;Inicio Sesión<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['menuHerramientas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'];?>
<?php }?></a>
                                        </li>
                                    <?php endfor; endif; ?>







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
                <div class="col-md-3 col-sm-12 col-xs-12 hidden-xs" style="padding-right:0px;">

                    <a  href="https://www.mindefensa.gov.co/" id="mindefensa_pag">

                        <img class="img img-responsive img-cabezotes" style="padding-top: 15px;" alt="Logo-Eje" src="_templates/DEFAULT2018/recursos/Bicentenario/img/mindefensa.png" alt=""></a>

                    </a>

                    <!--</div>-->
                    <!-- Collapse -->
                   
                </div>
                <!-- Links -->
                 <div class="col-md-3 col-sm-12 col-xs-12" style="padding:0px;">

                    <a  href="/" id="logo">

                        <img class="img img-responsive img-cabezotes" id="imagen-logo1" style="padding-top: 10px; max-height: 80px;margin-left:30px" alt="Logo-Eje" src="_templates/DEFAULT2018/recursos/Bicentenario/img/LOGO-EJC-ROJO.png" alt=""></a>

                    </a>

                </div>

                 <div class="col-md-1 col-sm-12 col-xs-12" style="margin-top:5px;">

                   <?php if ($_smarty_tpl->tpl_vars['logo_subsitio']->value!=''){?>
                        <a href="<?php echo @_WEB;?>
" title="<?php echo @_NOMBRESITIO;?>
">
                            <img id="imagen-logo2" src="<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['logo_subsitio']->value;?>
" alt="<?php echo @_NOMBRESITIO;?>
" style="max-height:70px;">
                        </a>
                    <?php }else{ ?>
                        <a href="<?php echo @_WEB;?>
" title="<?php echo @_NOMBRESITIO;?>
">
                            <img id="imagen-logo2" src="<?php echo $_smarty_tpl->tpl_vars['logo_default']->value;?>
" alt="<?php echo @_NOMBRESITIO;?>
" style="max-height:70px;">
                        </a>
                    <?php }?>
                </div>
                
                <div class="col-md-5 col-sm-12 col-xs-12">
                         <div class="row hidden-xs" style="padding:0;padding-top:20px; padding-left: 20px;">
                    <script>
                        function myFunction67() {
                            var cadena123 = document.getElementById("texto_buscar34").value;
                            var cadena124 = document.getElementById("sitesearch1").value;
                            var cadena1234 = "https://www.google.com/search?q=" + cadena123 + "&sitesearch="  + cadena124;

                            //location.replace(cadena1234);
                            window.open(cadena1234);
                        }
                    </script>
                    
                     <button onclick="myFunction67()" style="background-color:  rgba(135,12,12,1);border-radius: 5px 0px 0px 5px;border: 1px solid rgba(135,12,12,1); color:white;padding:3px;">buscar</button>
                                <input class="" type="text" placeholder="Buscador..." aria-label="Search" style="border-radius: 0px 10px 10px 0px;border: 1px solid rgba(135,12,12,1); min-width: 250px;"  name="q" id="texto_buscar34">
                                <input value="<?php echo @_WEB;?>
" type="hidden" name="sitesearch1" id="sitesearch1">

                     <!--<div class="row hidden-sm hidden-xs" style="margin-top: 20px;" style="padding:0;">
                        <?php if (@_EN_INGLES!=1){?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form id="searchform" target="_blank" method="get" action="https://www.google.com/search" style="width:100%;height: 10px;">
                            <div class="input-group md-form form-sm form-1 pl-0" style="margin-top:7px;">
                              <div class="input-group-prepend">
                                <span class="input-group-text  lighten-3" id="basic-text1" onclick="document.getElementById('searchform').submit()"  style="background-color:  rgba(135,12,12,1);border-radius: 5px 0px 0px 5px;border: 1px solid rgba(135,12,12,1);"><i class="fa fa-search text-white" aria-hidden="true"></i></span>
                              </div>
                              <input class=" my-0 py-1" type="text" placeholder="Buscador..." aria-label="Search" style="border-radius: 0px 10px 10px 0px;border: 1px solid rgba(135,12,12,1);color: black;width:80%; margin-left:0px;"  name="q">
                               <input value="<?php echo @_WEB;?>
" type="hidden" name="sitesearch">
                              
                            </div>
                            </form>
                        </div>


                        <?php }else{ ?>
                            
                            <div class="col-md-11 col-sm-12 col-xs-12">
                            <div id="search">
                                <div class="search-content">
                                    <form id="searchform" target="_blank" method="get" action="https://www.google.com/search">
                                        <input name="q" type="text" class="form-control search-input" placeholder="Buscador ...">
                                        <input value="ejercito.mil.co" type="hidden" name="sitesearch">
                                        
                                    </form>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12">
                            <a onclick="document.getElementById('searchform').submit()" class="search-submit" title="Search"><i class="fa fa-search" style="color:black;"></i></a>
                            </div>
                        <?php }?>
                    </div>-->
                    
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: rgba(70,70,70,1); padding-left: 13%; padding-right:13%; ">
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                <div class="row" style="">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

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

                                            
                                             <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['idcategoria'];?>
" class=" nav-link color_menu1 " data-hover="dropdown"   style="font-size: 1em; padding: 20px 15px 10px 20px; margin-left: 20px; text-decoration: none !important;font-family:'Roboto';color:white;" >
                                                    <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['menuInstitucional']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mysec']['index']]['nombre'],30,"..",true);?>


                                                </a>
                                                <ul class="nav4 dropdown-menu hidden-xs" style="padding: 10px;margin-top: -2px;overflow:hidden; margin-left:-100px;" >
                                                    <div style="height:4px; width: 105%;background: #90240D; margin-top:-10px;margin-left:-10px;" ></div>

                                                     <table style="width:1150px; overflow:hidden"  ><!--WIDTH="500px"-->
                                                      
                                                    <caption style="padding:0px"></caption>
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
" style="float: left;" class="wrap5">

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
" style="float: left;" class="wrap5">
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
" style="float: left;" class="wrap5">
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
" style="float: left;" class="wrap5">
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
" style="float: left;" class="wrap5">
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
        
            
        </div>
    </nav>
    <div>
    <?php if ($_smarty_tpl->tpl_vars['esHome']->value){?>
     <!--<div id="fondo_negro" style="height:1000px; width:100%; background: rgba(0,0,0,1); position:absolute; z-index:1"></div>-->
    <input type="hidden" name="es_home_principal" id="es_home_principal" value="si">
        <div id="home-silder1"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <div class="row">
                        <div class="carousel slide carousel-fade" data-ride="carousel" id="home-silder" style="border-bottom: none !important; height:100%; width:100%;">
                            

                            <?php if ($_smarty_tpl->tpl_vars['_video_banner1']->value!=''){?>

                                <input type="hidden" name="hay_video_banner" id="hay_video_banner" value="si">  

                                <input type="hidden" name="hay_video_banner" id="cod_vid_banner" value="<?php echo $_smarty_tpl->tpl_vars['_video_banner1']->value;?>
">    

                                <div   id="fondo_gris1" class="" style="background-color:rgba(0,0,0,0.5); width:100%; height:100%;position:absolute; z-index:11;">
                                <div class="col-12 col-xs-12 px-0 wrap4" id="texto_banner23" style="font-size: 50px;
                                font-weight: bold; margin-top: 30%;text-align:center; margin-bottom: 25px;color:rgba(255,255,255,0.7);" hidden>
                                      <?php echo @TEXTO_VIDEO_BANNER;?>

                                </div>
                                 
                               <?php if (@URL_BOTON_BANNER!=''){?> 
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <div class="col-md-12 " style="text-align:center">
                                    <a href="<?php echo @URL_BOTON_BANNER;?>
" >
                                        
                                        <button type="button" id="BOTON_BANNER2" class="btn-secondary" style="text-align: center center; color: white; background-color: rgb(125, 125, 125) !important;height:50px; padding:10px;border: none;" hidden> <?php echo @BOTON_BANNER;?>
</button>

                                       <!--  <?php if (@URL_BOTON_BANNER!=''){?> 
                                                <a href="<?php echo @URL_BOTON_BANNER;?>
" >
                                                <div id="BOTON_BANNER2" class="wrap3" style="background-color:rgba(96,5,12,1); width:30%; height:100px; border-radius: 50%; margin-top: 34%;text-align:center;margin-left:35%;color:white; font-size:30px;">

                                                    <div class="" style="font-size: 30px;font-weight: bold;">
                                                        <?php echo @BOTON_BANNER;?>

                                                    </div> 

                                                 </div>

                                            <?php }?>-->
                                     </div>
                                     </div>
                                    </a>
                                <?php }?>



                                <div class="col-md-2 col-lg-12 col-xs-12 col-sm-12 " id="texto_banner23" style="font-size: 2em; font-weight: bold; margin-bottom: 25px;color:rgba(255,255,255,1);position:absolute; top:70%; left: 15%; background-color:rgba(0,0,0,0.9); max-width: 200px; ">
                                  <p style="padding:10px;margin:0px;">  <?php echo @_NOMBRESITIO;?>
</p>
                                </div>

                                </div>



                              <!-- <iframe class="wrap wrap1"  id="iframe24"  width="1920" height="1080" allowfullscreen="1" allow="accelerometer; autoplay;" src="<?php echo @VIDEO_BANNER_YOUTUBE;?>
?start=10&end=200&autoplay=1&playlist=<?php echo @PLAY_CONTENT_YOUTUBE;?>
&loop=1&mute=1&allowfullscreen=true" style="height:1080px; width:100%; transform: scale(4.5, 4.5);">

                               </iframe>-->
                               <div id="carrusel1" style="margin-top: 0px;"></div>
                               <div id="ytplayer" class="" style="height:800px; width:100%; transform: scale(2, 2);"></div>

                                <!--<div id="player" class="wrap wrap1" style="height:1080px; width:100%; transform: scale(4.5, 4.5);"></div>-->
                                <div class="" id="cambia_pos_titulo" hidden></div>

                            <?php }else{ ?>
                            <input type="hidden" name="hay_video_banner" id="hay_video_banner" value="no">
                            <div class="carousel-inner" role="listbox" style="height:100%;" id="carrusel1">

                                <ol class="carousel-indicators" style="left: 20%; margin: 0px; z-index: 1;">
                    
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['baner'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['name'] = 'baner';
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['slide_home']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total']);
?> 

                                        <li data-target="#home-silder" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['arreglo234']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']];?>
"  class="<?php if ($_smarty_tpl->tpl_vars['arreglo234']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]=='0'){?> active <?php }?>" ></li>
                                   

                                    <?php endfor; endif; ?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['name'] = 'baner1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['slide_home1']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['total']);
?>
                                        <li data-target="#home-silder" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['arreglo234']->value['baner'+'baner1'];?>
"  class="" ></li>
                                    <?php endfor; endif; ?>
                                </ol>

                                <?php $_smarty_tpl->tpl_vars['entro'] = new Smarty_variable("NO", null, 0);?>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['name'] = 'baner1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['slide_home1']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['baner1']['total']);
?>
                                    <?php if ($_smarty_tpl->tpl_vars['slide_home1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner1']['index']]['subsitio_grafico_link']!=''){?>
                                    <div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['baner1']['first']){?>active<?php }?>" style="height:100%; margin:0px;">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['slide_home1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner1']['index']]['subsitio_grafico_link'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['slide_home1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner1']['index']]['subsitio_grafico_descripcion'];?>
">
                                            <img class="wrap" src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['slide_home1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner1']['index']]['subsitio_grafico_ruta'];?>
&w=2000" alt="" style="min-height:100px; width:100%;" longdesc="Esto es una prueba del funcionamiento de la etique longdesc">

                                            
                                        </a>
                                    </div>
                                    <?php $_smarty_tpl->tpl_vars['entro'] = new Smarty_variable("SI", null, 0);?>
                                    <?php }else{ ?>
                                        <div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['baner1']['first']){?>active<?php }?>" style="height:100% ;margin:0px;">
                                            <img class="wrap" src="tools/microsThumb.php?src=<?php echo $_smarty_tpl->tpl_vars['slide_home1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner1']['index']]['subsitio_grafico_ruta'];?>
&w=2000" alt="" style=" min-height:100px; width:100%;" longdesc="Esto es una prueba del funcionamiento de la etique longdesc">
                                            
                                        </div>  
                                    <?php $_smarty_tpl->tpl_vars['entro'] = new Smarty_variable("SI", null, 0);?>                                      
                                    <?php }?>
                                    
                                <?php endfor; endif; ?>

                                <?php if ($_smarty_tpl->tpl_vars['entro']->value=="SI"){?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['baner'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['name'] = 'baner';
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['slide_home']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total']);
?>
                                        <?php if ($_smarty_tpl->tpl_vars['slide_home']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]['autor']!=''){?>
                                        <div class="item " style="height:100%; margin:0px;">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['slide_home']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]['autor'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['slide_home']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]['nombre'];?>
">
                                                <img class="wrap" src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['slide_home']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]['imagen'];?>
&w=2000" alt="" style="min-height:100px;width:100%;" longdesc="Esto es una prueba del funcionamiento de la etique longdesc">

                                                
                                            </a>
                                        </div>
                                        <?php }else{ ?>
                                            <div class="item" style="height:100% ;margin:0px;">
                                                <img class="wrap" src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['slide_home']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]['imagen'];?>
&w=2000" alt="" style="min-height:100px; width:100%;" longdesc="Esto es una prueba del funcionamiento de la etique longdesc">
                                                
                                            </div>                                          
                                        <?php }?>
                                    <?php endfor; endif; ?>
                                <?php }else{ ?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['baner'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['name'] = 'baner';
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['slide_home']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['baner']['total']);
?>
                                        <?php if ($_smarty_tpl->tpl_vars['slide_home']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]['autor']!=''){?>
                                        <div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['baner']['first']){?>active<?php }?>" style="height:100%; margin:0px;">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['slide_home']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]['autor'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['slide_home']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]['nombre'];?>
">
                                                <img class="wrap" src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['slide_home']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]['imagen'];?>
&w=2000" alt="" style="min-height:100px; width:100%;" longdesc="Esto es una prueba del funcionamiento de la etique longdesc">

                                                
                                            </a>
                                        </div>
                                        <?php }else{ ?>
                                            <div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['baner']['first']){?>active<?php }?>" style="height:100% ;margin:0px;">
                                                <img class="wrap" src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['slide_home']->value[$_smarty_tpl->getVariable('smarty')->value['section']['baner']['index']]['imagen'];?>
&w=2000" alt="" style="min-height:200px; width:100%;" longdesc="Esto es una prueba del funcionamiento de la etique longdesc">
                                                
                                            </div>                                          
                                        <?php }?>
                                    <?php endfor; endif; ?>
                                <?php }?>
                                
                        <a class="left carousel-control hidden-xs " href="#home-silder" role="button" data-slide="prev" style="left:14%; background-image: none;">
                            

                             <img class="" style="" alt="" src="_templates/DEFAULT2018/recursos/images/anterior.png" alt="">

                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control hidden-xs " href="#home-silder" role="button" data-slide="next" style="right:14%; background-image: none;">
                            

                            <img class="" style="" alt="" src="_templates/DEFAULT2018/recursos/images/siguiente.png">

                            <span class="sr-only">Next</span>
                        </a>

                       <div class="col-md-2 col-lg-12 col-xs-12 col-sm-12 " id="texto_banner23" style="font-size: 2em; font-weight: bold; margin-bottom: 25px;color:rgba(255,255,255,1);position:absolute; top:70%; left: 15%; background-color:rgba(0,0,0,0.9); max-width: 200px; ">
                          <p style="padding:10px;margin:0px;">  <?php echo @_NOMBRESITIO;?>
</p>
                        </div>

                        <div class="col-lg-12 col-xs-12 col-sm-12 wrap9">
                        <div class="col-md-10 col-lg-12 col-xs-12 col-sm-12">
                            <div class="title_destacados">
                                <div style="font-size: 0.9em;background-color: transparent;text-transform: full-width;color:white; font-family: 'Roboto-Regular';">
                                    
                                    <div class="" id="cambia_pos_titulo">
                                        <div class=" nombre-subsitio alto_contraste" style="">
                                            <a href="<?php echo @_WEB;?>
">
                                                <div class="color_menu1" id="abv-subsitio"><p style=""></p></div>
                                                
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         

                        <div class="col-md-2 col-lg-12 col-xs-12 col-sm-12">
                            <a  id="playButton1" class="rightbottom1 carousel-control" href="#home-silder" role="button" data-slide="cycle" style="margin-top: -30px !important; left:54%; z-index: 2;">
                                <div class="play1-banner">
                                    <p class="hidden">Play</p>
                                </div>
                                <span class="sr-only">Play</span>
                            </a>

                             <a   id="pauseButton1" class="rightbottom2 carousel-control" href="#home-silder" role="button" data-slide="pause" style="margin-top: -30px !important; left:54%; z-index: 2;">
                                <div class="pause1-banner">
                                    <p class="hidden">pause</p>
                                </div>
                                <span class="sr-only">Pause</span>
                            </a>
                        </div>    
                        </div>
                        
                        
                            </div>
                            <?php }?>
                        </div>
                        
                    </div>


                </div>


            </div>
        </div>


    <?php }else{ ?>
    <input type="hidden" name="es_home_principal" id="es_home_principal" value="no">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="margin-top: 40px;">
                    <div class="row" id="cabezote-internas">
                        <div class="mascara-cabezote" style="border-bottom: none !important;background: url(<?php echo @_DIRIMAGES;?>
cabezote/banner/DSC_0024.JPG) no-repeat; background-position: center center; height: 400px;margin-top: 20px;"></div>
                        
                        
                    </div>
                    <div class="container container-cabezote">
                        <!-- <div class="nombre-slide-interna"><?php echo $_smarty_tpl->tpl_vars['rutetoroot']->value[3]['nombre'];?>
</div> -->
                        <div class="nombre-slide-interna hidden-xs" style="margin: 18% 0 10px 0px;"><?php echo $_smarty_tpl->tpl_vars['rutetoroot']->value['nombre'];?>
</div>
                        <div class="nombre-slide-interna hidden-lg hidden-sm hidden-md" style="margin: 35% 0 10px 0px;"><?php echo $_smarty_tpl->tpl_vars['rutetoroot']->value['nombre'];?>
</div>
                        <div class="line-cabezote"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    </div>
           
        <script type="text/javascript">
            $(document).ready(function(){
               //$(".inline").colorbox({inline:true, width:"65%"});
            });
        </script>

        <script type="text/javascript"> 
            $(document).ready(main);
             
            var contador = 1;
            var contador2 = 1;
             
            function main(){
            
                // MEN� 1  Utilidades
                $('.menu_bar').click(function(){
                    // $('nav').toggle(); 
                    if(contador == 1){
                        $('nav').animate({
                            left: '0'
                        });
                        contador = 0;
                    } else {
                        contador = 1;
                        $('nav').animate({
                            left: '-100%'
                        });
                    }
                });
                //MEN� 2 Institucional
                $('.menu_bar2').click(function(){
                    // $('nav').toggle(); 
                    if(contador2 == 1){
                        $('nav').animate({
                            left: '0'
                        });
                        contador2 = 0;
                    } else {
                        contador2 = 1;
                        $('nav').animate({
                            right: '-100%'
                        });
                    }
                });

            };
        </script>
     

    
</header>
<div id="forolink1" style="z-index: 1100;">
  
     <button class="wrap6" onclick="invertir()"> <img  src="_templates/DEFAULT2018/recursos/images/redes/invert_colors.png" alt="" style="padding: 5px;width:30px; left:-10px;position:absolute; top:-5px;"></button>
     <button onclick="zoomOut()" style="font-family: 'Times New Roman'; font-weight: 700;background: transparent; color:white;border:0px; transform: rotate(90deg); font-size: 1.3em;">A- &nbsp</button>
      <button onclick="zoomIn()" style="font-family: 'Times New Roman'; font-weight: 700;background:transparent; color:white;border:0px; transform: rotate(90deg); font-size: 1.3em;">A+ &nbsp</button>
     
</div>
<script>
        var playing = true;
        var pauseButton = document.getElementById('pauseButton');

        function pauseHomeslider(){
                $('#pauseButton2').removeClass('pause1-banner');
                $('#pauseButton2').toggleClass('play1-banner');
                playing  = false;
                /*$('#pauseButton1').attr('data-slide','pause');
                 $('#homeCarousel').carousel('pause');
                 $('#home-silder').carousel('pause');
                 $('#home-silder1').carousel('pause');
                 $('#home-silder2').carousel('pause');*/
                
                //$('#pauseButton1').data-slide('pause');
        }

        function playHomeslider(){  
                $('#pauseButton2').removeClass('play1-banner');
                $('#pauseButton2').toggleClass('pause1-banner');
                playing = true;
                /* $('#pauseButton1').attr('data-slide','cycle');
                 $('#homeCarousel').carousel('cycle');
                 $('#home-silder').carousel('cycle');
                 $('#home-silder1').carousel('cycle');
                 $('#home-silder2').carousel('cycle');*/
                 
                //$('#pauseButton1').data-slide('cycle');
                
        }

        pauseButton1.onclick = function(){

            $('#pauseButton1').removeClass('rightbottom2');
            $('#pauseButton1').toggleClass('rightbottom1');

            $('#playButton1').removeClass('rightbottom1');
            $('#playButton1').toggleClass('rightbottom2');
        }

         playButton1.onclick = function(){
             
            $('#playButton1').removeClass('rightbottom2');
            $('#playButton1').toggleClass('rightbottom1');

            $('#pauseButton1').removeClass('rightbottom1');
            $('#pauseButton1').toggleClass('rightbottom2');
        }

        function mouseUp1()
        {
             if (playing){
                        pauseHomeslider();
                }else{
                        playHomeslider();
                }
        }
</script> 

<script type="text/javascript" src="_templates/DEFAULT2018/recursos/Bicentenario/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="_templates/DEFAULT2018/recursos/Bicentenario/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="_templates/DEFAULT2018/recursos/Bicentenario/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="_templates/DEFAULT2018/recursos/Bicentenario/js/mdb.min.js"></script>

<script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>
    
<!--<script type="text/javascript">
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
</script>-->

<script>
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var cod_vid_banner1 = document.getElementById('cod_vid_banner').value;
var videoId = cod_vid_banner1;
var startSeconds = 1;
var endSeconds = 120;

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