        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $this->base;?>/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="<?php echo $this->base;?>/js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo $this->base;?>/js/main.js"></script>
        <script src="<?php echo $this->base;?>/js/telao.js"></script>

<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery/js/jquery-1.7.2.min.js"></script> 

<link rel="stylesheet" href="<?php echo $this->base;?>/js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

<script type="text/javascript" src="<?php echo $this->base;?>/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>



<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery.floating_popup.1.4.min.js"></script>


        <script type="text/javascript"> 
            $(function(){

                  <?php 
                
                    if(isset($showPOPUP) && $showPOPUP != 1){
                
                  ?>  
                  
                  /*
                  $('#popup_content').popup(
                  {
                          setcookie: false,
                          selfclose: 0,
                          centered: true,
                          top: 100, 
                          popup_div   : 'popup', 
                          fly_in      : false,
                          overlay: true,
                          opacity_level: 0.6,
                          popup_disappear: 'slideUp',
                          popup_disappear_time: 2000
                      }
                  );  
                 */
                <?php

                  }
                
                ?>
                
                  $(".fancybox").fancybox();

                    $('#btn-cadastroconteplado').click(function(){
                       w = window.open('<?php echo $this->base;?>/usuarios/contenplados', 'popimg',"location=0,status=0,scrollbars=1, width=800,height=500");
                       w.focus();
                       return false;
                    });


                    $('#btn-cadastrocontepladochecroletpremiado').click(function(){
                       w = window.open('<?php echo $this->base;?>/usuarios/contenpladoschevroletpremiado', 'popimg',"location=0,status=0,scrollbars=1, width=800,height=500");
                       w.focus();
                       return false; 
                    });
                    
             
            }); 
        </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43966011-1', 'clubedelideres2013.com.br');
  ga('send', 'pageview');

</script> 