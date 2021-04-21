<?php /* Smarty version Smarty-3.1.8, created on 2021-02-24 21:16:18
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_home_videos.html" */ ?>
<?php /*%%SmartyHeaderCode:403203984602e1fe9ccf0f3-03505876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7664baee2b521fe6efcfe2d2e6790bbaddb4cdfb' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_home_videos.html',
      1 => 1614201374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '403203984602e1fe9ccf0f3-03505876',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e1fe9cde5b4_41437245',
  'variables' => 
  array (
    'videos_home_ppal' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e1fe9cde5b4_41437245')) {function content_602e1fe9cde5b4_41437245($_smarty_tpl) {?><div class="row" id="load_video">
  <div class="col-md-6"  style="padding:0; margin:0;">
    <div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 75.7%!important;">
      <!--<?php echo $_smarty_tpl->tpl_vars['videos_home_ppal']->value[0]['descripcion'];?>
-->
      <iframe width="560" height="315" src="https://www.youtube.com/embed/FyVquIsYrYw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" title ="frameyoutube23" name ="frameyoutube23" id="frameyoutube23"></iframe>
    </div>
  </div>
  <div class="col-md-6" style="padding:0; margin:0; min-height: 300px">
    <div class="col-xs-12 px-0 home-videos-img">
     
      <a id="link">
      <img id="imag_stream" class="" width="100%" height="100%" src="recursos_user/imagenes/Banners/imag_video_enc_play1.png" alt="Emisora">
      </a>
      <audio id="myAudio">
       
        <source id="myAudio2" src="https://cast.miradio.in:9288/stream?type=.mp3" type="audio/mpeg">
        
      </audio>
      <!--<h3  id="tit_escuchanos1" style="position:absolute; top:77%; left:33%; color:white; font-family: 'Lucida Console'">ESCUCHANOS EN VIVO</h3>
      <button onclick="playAudio()" id="play_emisora" type="button" style="position:absolute; top:72%; left:80%; border: none;  background: url(_templates/DEFAULT2018/recursos/images/play1.png) no-repeat; height: 85px; width: 85px;" class=""></button>
      <button onclick="pauseAudio()" id="pause_emisora" type="button" style="position:absolute; top:72%; left:80%; border: none; display: none; background: url(_templates/DEFAULT2018/recursos/images/pause1.png) no-repeat; height: 85px; width: 85px;" class=""></button> 
-->
      <script>
        var x = document.getElementById("myAudio"); 


        function playAudio() { 
          x.play(); 
           //document.getElementById("play_emisora").onclick ="pauseAudio()";
           //document.getElementById("play_emisora").class ="pauseAudio()";
           
           document.getElementById("play_emisora").style ="position:absolute; top:72%; left:80%; border: none;  background: url(_templates/DEFAULT2018/recursos/images/play1.png) no-repeat; height: 85px; width: 85px; display:none;";
           document.getElementById("pause_emisora").style ="position:absolute; top:72%; left:80%; border: none; background: url(_templates/DEFAULT2018/recursos/images/pause1.png) no-repeat; height: 85px; width: 85px;";

        } 

        function pauseAudio() { 
          x.pause(); 
          document.getElementById("pause_emisora").style ="position:absolute; top:72%; left:80%; border: none; display: none; background: url(_templates/DEFAULT2018/recursos/images/pause1.png) no-repeat; height: 85px; width: 85px;";
           document.getElementById("play_emisora").style ="position:absolute; top:72%; left:80%; border: none;  background: url(_templates/DEFAULT2018/recursos/images/play1.png) no-repeat; height: 85px; width: 85px;";
        } 
      </script>
    </div>
    <div class="col-xs-12 px-0 home-videos-img">
        <a href="index.php?idcategoria=<?php echo @_GALERIA_FOTOGRAFICA;?>
">
       
        <img class="objectCover w-100 h-100 position-absolute absolute--left absolute--bottom absolute--top absolute--right" src="<?php echo @_DIRIMAGES_USER;?>
Banners/Galeria.png" alt="Emisora">
      </a>
    </div>
    
    <script type="text/javascript">
      var playing_stream = true;

      function script() {
        if (playing_stream){
                       //alert("play");
                        playing_stream = false;
                        document.getElementById("imag_stream").src ="recursos_user/imagenes/Banners/imag_video_enc_pause1.png";
                        //$('#imag_stream').attr('src','pause');
                        x.play(); 

                        
                }else{
                        //alert("pause");
                        playing_stream = true;
                        document.getElementById("imag_stream").src ="recursos_user/imagenes/Banners/imag_video_enc_play1.png";
                        x.pause();

                        
                }
         
      };

      document.getElementById('link').onclick = function () {
          script();
      };
    </script>
  </div>
</div>
<style type="text/css">
  
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
</style><?php }} ?>