    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 


    <link rel="stylesheet" href="<?php echo $this->base;?>/carona/carona.css">

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
                            <img src="<?php echo $this->base;?>/sucessopedecaronagenebra/images/index_01.jpg" width="1000" height="430" alt=""></td>
                    </tr>


                    <tr>
                        <td>
                            <img src="<?php echo $this->base;?>/carona/images/index_02.png" width="289" height="35" alt=""></td>
                        <td>
                            <a href="<?php echo $this->base;?>/campanhas/sucessopedecaronagenebra/" class="bthome"></a></td>
                        <td colspan="2">
                            <a href="<?php echo $this->base;?>/campanhas/sucessopedecaronagenebra/regulamento" class="btregulamento"></a></td>
                        
                        <td>
                            <a href="<?php echo $this->base;?>/campanhas/sucessopedecaronagenebra/ranking" class="btranking"></a>
                        </td>
                        
                        <td>
                            <img src="<?php echo $this->base;?>/carona/images/premiacao-over.png">
                            </td>
                        <td colspan="2">
                            <img src="<?php echo $this->base;?>/carona/images/index_07.png" width="337" height="35" alt=""></td>
                    </tr>

                    <tr>
                        <td colspan="3" bgcolor="#FFFFFF">
                        
                        <table id="Table_02" width="444" height="208" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">
      <img src="<?php echo $this->base;?>/carona/images/menu_premiacao_01.png" width="444" height="40" alt=""></td>
  </tr>
  <tr>
    <td rowspan="5">
      <img src="<?php echo $this->base;?>/carona/images/menu_premiacao_02.png" width="242" height="168" alt=""></td>
    
    <td>
                          <?php
                          if($tipo == "regulamento"){
                          ?>

                           <img src="<?php echo $this->base;?>/carona/images/destino-over.png" alt="">
                         
                          <?php    
                          }else{
                          ?>
                          <a href="<?php echo $this->base;?>/campanhas/sucessopedecaronapremiacaogenebra/regulamento" class="btdestino"></a>   
                          
                          <?php
                          }
                          ?> 

     
    </td>


    <td rowspan="5">
      <img src="<?php echo $this->base;?>/carona/images/menu_premiacao_04.png" width="101" height="168" alt=""></td>
  </tr>
  <tr>
    <td>

                            <?php 
                            if($tipo == "premiacao"){
                            ?>
                            
                            <img src="<?php echo $this->base;?>/carona/images/dicas-over.png" alt="">
                            <?php    
                            }else{
                            ?>    
                           <a href="<?php echo $this->base;?>/campanhas/sucessopedecaronapremiacaogenebra/premiacao" class="btdicas"></a>
                            <?php
                            }
                            ?> 

      
    </td>
  </tr>
  <tr>
    <td>

     

                            <?php 
                            if($tipo == "ranking"){
                            ?>
                           
                           <img src="<?php echo $this->base;?>/carona/images/hoteis-over.png" width="101" height="29" alt="">
                            <?php    
                            }else{
                            ?>    
                              <a href="<?php echo $this->base;?>/campanhas/sucessopedecaronapremiacaogenebra/ranking" class="bthoteis"></a>
                            <?php
                            }
                            ?> 

    </td>
  </tr>
  <tr>
    <td>


      
                          <?php
                          if($tipo == "descricao"){
                          ?>
                            
                          <img src="<?php echo $this->base;?>/carona/images/roteiro-over.png" alt="">
                          
                          <?php    
                          }else{
                          ?>  
                          
                            <a href="<?php echo $this->base;?>/campanhas/sucessopedecaronapremiacaogenebra/descricao" class="btroteiro"></a>                
                          
                          <?php
                          }
                          ?> 

    </td>
  </tr>
  <tr>
    <td>
      <img src="<?php echo $this->base;?>/carona/images/menu_premiacao_08.png" width="101" height="49" alt=""></td>
  </tr>
</table>
                        
                        </td>
                        <td colspan="4" bgcolor="#FFFFFF">
                             <div id="contInt" class="content_3 mCustomScrollbar _mCS_1">
                                      

                                  <?php   
                                      echo $HmltText; 
                                  ?>

                             </div>
                            </td>
                        <td>    
                            <img src="<?php echo $this->base;?>/carona/images/index_10.png" width="34" height="208" alt=""></td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <img src="<?php echo $this->base;?>/carona/images/index_11.png" width="1000" height="40" alt=""></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?php echo $this->base;?>/carona/images/spacer.gif" width="289" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/carona/images/spacer.gif" width="70" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/carona/images/spacer.gif" width="85" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/carona/images/spacer.gif" width="28" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/carona/images/spacer.gif" width="84" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/carona/images/spacer.gif" width="107" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/carona/images/spacer.gif" width="303" height="1" alt=""></td>
                        <td>
                            <img src="<?php echo $this->base;?>/carona/images/spacer.gif" width="34" height="1" alt=""></td>
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