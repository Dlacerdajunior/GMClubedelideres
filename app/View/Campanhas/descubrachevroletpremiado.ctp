    <?php echo $this->element('/site/top'); ?>



    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/descubraseuchevrolet/descubra.css">


  <style>
    .content_3{

      height: 158px;
      width: 469px;
    }

    #menu-sup {
    background-color: transparent;
    height: 54px;
    -webkit-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.6);
    box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.6);
    width: 903px;
    margin: 0 auto;
    }

    .navbar-fixed-top, .navbar-fixed-bottom{
      position: absolute;
    }
    
  </style>

   
    </head> 
    <body>
        <div id="content"> 
            <?php echo $this->element('/site/menu'); ?>
            <!-- /.navbar -->
        </div>  
            <!-- /#content --> 
  

            <div id="tudocamp">
              <div id="campanhaDesc">

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="1000">
              <tr>
               <td colspan="4"><img name="index_r1_c1" src="<?php echo $this->base;?>/descubraseuchevrolet/images/index_r1_c1.jpg" width="1000" height="405" id="index_r1_c1" alt="" /></td>
              </tr>
              <tr>
               <td>
                        <?php
                        if($tipo == "descricao"){
                        ?>
                        <img name="home" src="<?php echo $this->base;?>/descubraseuchevrolet/images/home-over.jpg" width="102" height="46" id="home" alt="" />
                        <?php    
                        }else{
                        ?>    
                        <a href="<?php echo $this->base;?>/campanhas/descubrachevroletpremiado/" class="bthome"></a>
                        <?php
                        }
                        ?>                 
                

              </td>
               <td>
                        <?php
                        if($tipo == "regulamento"){
                        ?>
                        <img src="<?php echo $this->base;?>/descubraseuchevrolet/images/regulamentos-over.jpg">
                        <?php    
                        }else{
                        ?>    
                         <a href="<?php echo $this->base;?>/campanhas/descubrachevroletpremiado/regulamento" class="btregulamento"></a>
                        <?php
                        } 
                        ?>

              </td>
               <td>
               
                        <?php 
                        if($tipo == "premiacao"){
                        ?>
                        <img name="premiacao" src="<?php echo $this->base;?>/descubraseuchevrolet/images/premiacao-over.jpg" alt="" />
                        <?php    
                        }else{
                        ?>    
                        <a href="<?php echo $this->base;?>/campanhas/descubrachevroletpremiado/premiacao" class="btpremiacao"></a>
                        <?php
                        }
                        ?>
              </td>

               <td><img name="index_r2_c4" src="<?php echo $this->base;?>/descubraseuchevrolet/images/index_r2_c4.jpg" width="705" height="46" id="index_r2_c4" alt="" /></td>
              </tr>
              <tr>
               <td colspan="4"><img name="index_r3_c1" src="<?php echo $this->base;?>/descubraseuchevrolet/images/index_r3_c1.jpg" width="1000" height="38" id="index_r3_c1" alt="" /></td>
              </tr>
              <tr>



                    <?php 
                    if($tipo == "descricao"){
                      $scrool ='';
                    ?>
                    <td colspan="4" style="width:100px; height:224px; background:url(<?php echo $this->base;?>/descubraseuchevrolet/images/bgc_home.jpg);">
                    <?php    
                    } 
                    ?> 
                    <?php 
                    if($tipo == "regulamento"){
                      $scrool ='';
                    ?>
                     <td colspan="4" style="width:100px; height:224px; background:url(<?php echo $this->base;?>/descubraseuchevrolet/images/bgc_regulamento.jpg);">
                    <?php    
                    }
                    ?>
                    <?php 
                    if($tipo == "premiacao"){
                      $scrool ='content_3';
                    ?>
                   <td colspan="4" style="width:100px; height:224px; background:url(<?php echo $this->base;?>/descubraseuchevrolet/images/bgc_premiacao.jpg);">
                    <?php    
                    }
                    ?> 

              
               <div id="contDescubra">

                  <div class="textocamp <?php echo $scrool; ?> content"> 

                    <?php
                        echo $HmltText;
                    ?> 
                  </div>

               </div> 
               </td>

              </tr>
            </table>
            </div>
        </div> 



            <?php echo $this->element('/site/bottom'); ?>


            <script src="<?php echo $this->base;?>/js/jquery.mCustomScrollbar.concat.min.js"></script>


              <script>
              (function($){
                $(window).load(function(){
                  $(".content_3").mCustomScrollbar({
                    scrollInertia:600,
                    autoDraggerLength:false
                  });
                });
              })(jQuery);
            </script>

    </body>
</html>