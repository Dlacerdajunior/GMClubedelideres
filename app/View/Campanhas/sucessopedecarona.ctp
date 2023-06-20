    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 


    <link rel="stylesheet" href="<?php echo $this->base;?>/sucessopedecarona/carona.css">

  <style>
    .content_3{height: 154px;width: 890px;}

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

    #contHome{
      height: 150px;

      width: 516px;
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
                <table id="Table_01" align="center" width="1000" height="714" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="8">
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/index_01.jpg" width="1000" height="430" alt=""></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/index_02.png" width="289" height="35" alt=""></td>



                        <td>

                          <?php
                          if($tipo == "descricao"){
                          ?>
                           <img src="<?php echo $this->base;?>/sucessopedecarona/images/home-over.png" width="70" height="35" alt="">
                           
                          <?php    
                          }else{
                          ?>
                          <a href="<?php echo $this->base;?>/campanhas/sucessopedecarona/" class="bthome"></a>                      
                          <?php
                          }
                          ?> 

                          </td> 

                        <td colspan="2">                      

                          <?php
                          if($tipo == "regulamento"){
                          ?>
                          <img src="<?php echo $this->base;?>/sucessopedecarona/images/regulamento-over.png">
                           
                          <?php    
                          }else{
                          ?>    
                          <a href="<?php echo $this->base;?>/campanhas/sucessopedecarona/regulamento" class="btregulamento"></a>
                          <?php
                          }
                          ?> 

                        </td>


                        <td>

                           
                            <?php 
                            if($tipo == "ranking"){
                            ?>
                           
                           <img src="<?php echo $this->base;?>/sucessopedecarona/images/ranking-over.png">
                            <?php    
                            }else{
                            ?>    
                           <a href="<?php echo $this->base;?>/campanhas/sucessopedecarona/ranking" class="btranking"></a>
                            <?php
                            }
                            ?> 

                          </td>

                        <td>
                            <?php 
                            if($tipo == "premiacao"){
                            ?>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/premiacao-over.png">
                          
                            <?php    
                            }else{
                            ?>    
                           <a href="<?php echo $this->base;?>/campanhas/sucessopedecarona/premiacao" class="btpremiacao"></a>
                            <?php
                            }
                            ?> 
                           

                        </td> 

                        <td colspan="2">
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/index_07.png" width="337" height="35" alt=""></td>
                    </tr>
                    <tr>
                        <td colspan="3">

                          <?php
                          if($tipo == "descricao"){
                          ?>
                          <img src="<?php echo $this->base;?>/sucessopedecarona/images/index_08.png" width="444" height="208" alt="">

                          <?php    
                          }else{
                          ?>  
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/left_regulamento_08.png" width="444" height="208" alt="">                   
                          <?php
                          }
                          ?> 

                        
                          </td>
                        <td colspan="4" bgcolor="#FFFFFF">
                            <div id="contHome" class="content_3 mCustomScrollbar _mCS_1">

                                  <?php
                                      echo $HmltText; 
                                  ?>

                            </div>
                            </td>
                        <td>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/index_10.png" width="34" height="208" alt=""></td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/index_11.png" width="1000" height="40" alt=""></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/spacer.gif" width="289" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/spacer.gif" width="70" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/spacer.gif" width="85" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/spacer.gif" width="28" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/spacer.gif" width="84" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/spacer.gif" width="107" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/spacer.gif" width="303" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/sucessopedecarona/images/spacer.gif" width="34" height="1" alt=""></td>
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