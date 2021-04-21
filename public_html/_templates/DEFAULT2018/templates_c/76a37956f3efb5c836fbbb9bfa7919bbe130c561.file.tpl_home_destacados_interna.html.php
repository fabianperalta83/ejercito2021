<?php /* Smarty version Smarty-3.1.8, created on 2021-02-24 21:16:18
         compiled from "/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_home_destacados_interna.html" */ ?>
<?php /*%%SmartyHeaderCode:309624310602e1fe9ce4201-05086733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76a37956f3efb5c836fbbb9bfa7919bbe130c561' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/DEFAULT2018/templates/tpl_home_destacados_interna.html',
      1 => 1614201375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309624310602e1fe9ce4201-05086733',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e1fe9d109d9_30231453',
  'variables' => 
  array (
    'banners' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e1fe9d109d9_30231453')) {function content_602e1fe9d109d9_30231453($_smarty_tpl) {?><div class="container-fluid back-grey">
<div class="row">
  <div class="container">
    <div class="row">
        <div class="col-12 col-md-6 px-0">
          <a onclick="playAudio()" style="cursor: pointer;">
                
                      
                        <div  class="memoria_historica2 memoria-historica-bicentenario">
                          <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['banners']->value[1]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[1]['nombre'];?>
" target="_blank">
                            
                              <img class="w-100 h-100 objectCover position-absolute absolute--bottom absolute--top absolute--right absolute--left" src="<?php echo @_DIRIMAGES_USER;?>
Banners/DAMASCO.png" alt="<?php echo $_smarty_tpl->tpl_vars['banners']->value[1]['nombre'];?>
"/>
                              <span class="red-label-historica">DAMASCO</span>
                            
                            
                          </a>
                        </div>
                      
                    </a>    
        </div>
        <div class="col-12 col-md-6 px-0">
          <a onclick="playAudio()" style="cursor: pointer;">
            
                  
                    
                      
                        <div  class="memoria_historica2 memoria-historica-bicentenario">
                        <a href="https://bibliotecaejercito.virtualpro.co/" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[2]['nombre'];?>
" target="_blank">
                          <img class="w-100 h-100 objectCover position-absolute absolute--bottom absolute--top absolute--right absolute--left" src="<?php echo @_DIRIMAGES_USER;?>
Banners/BILIOTECA_ENC.png" alt="<?php echo $_smarty_tpl->tpl_vars['banners']->value[2]['nombre'];?>
"/>
                          <span class="red-label-historica" style="">Biblioteca</span>
                          
                          </a>
                        </div>
                      
                    
                 
                </a>
        </div>
        <div class="col-12 col-md-6 px-0">
          <a onclick="playAudio()" style="cursor: pointer;">
            
                  
                    
                      
                        <div  class="memoria_historica2 memoria-historica-bicentenario">
                        <a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['banners']->value[0]['idcategoria'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[0]['nombre'];?>
" target="_blank">
                          <img class="w-100 h-100 objectCover position-absolute absolute--bottom absolute--top absolute--right absolute--left" src="<?php echo @_DIRIMAGES_USER;?>
Banners/DIRECCIO_ENC.png" alt="<?php echo $_smarty_tpl->tpl_vars['banners']->value[0]['nombre'];?>
"/>
                          <span class="red-label-historica">APOYO a transicion</span>
                          </a>
                        </div>
                      
                   
                  
                </a>
        </div>
        <div class="col-12 col-md-6 px-0">
          <a onclick="playAudio()" style="cursor: pointer;">
            
                  
                    <div  class="memoria_historica2 memoria-historica-bicentenario">
                      <a href="https://www.ejercito.mil.co/index.php?idcategoria=357113" title="<?php echo $_smarty_tpl->tpl_vars['banners']->value[3]['nombre'];?>
" target="_blank">
                        
                          <img class="w-100 h-100 objectCover position-absolute absolute--bottom absolute--top absolute--right absolute--left" src="<?php echo @_DIRIMAGES_USER;?>
Banners/JUDICIALES_ENC.png" alt="<?php echo $_smarty_tpl->tpl_vars['banners']->value[3]['nombre'];?>
"/>
                          <span class="red-label-historica" >Notificaciones judiciales</span>
                          </a>
                        </div>
                        
                      
                    
                  
                </a>
        </div>      
    </div>
  </div> 
</div>

</div>

<!--
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" >


	<script type="text/javascript">
		// Slide Destacados Banners
        $('.mySlider2').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: false,
          arrows: true,
          nextArrow: '<div class="slick-next right-minislide-arrow-pie"></div>',
          prevArrow: '<div class="slick-prev left-minislide-arrow-pie"></div>',
          dots: false,
          speed: 2000,
          autoplaySpeed: 3000,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="slick-next right-minislide-arrow-pie"></div>',
                prevArrow: '<div class="slick-prev left-minislide-arrow-pie"></div>',
                dots: false
              }
            },
            {
              breakpoint: 900,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="slick-next right-minislide-arrow-pie"></div>',
                prevArrow: '<div class="slick-prev left-minislide-arrow-pie"></div>',
                dots: false
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="slick-next right-minislide-arrow-pie"></div>',
                prevArrow: '<div class="slick-prev left-minislide-arrow-pie"></div>',
                dots: false
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                nextArrow: '<div class="slick-next right-minislide-arrow-pie"></div>',
                prevArrow: '<div class="slick-prev left-minislide-arrow-pie"></div>',
                dots: false
              }
            }
          ]
        });
    function Abrir_ventana(pagina) {
      var opciones = "toolbar=false,location=false,directories=false,status=false,menubar=false,scrollbars=false,resizable=false,width=350px,height=130px,top=false,left=false";
      window.open(pagina,"",opciones);
    }
	</script>


--><?php }} ?>