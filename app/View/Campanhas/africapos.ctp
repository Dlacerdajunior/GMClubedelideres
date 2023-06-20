    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/Africa_pos/africa.css">

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
      height: 220px;
      margin-top: 34px;
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
                <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF"> 
                    <tr>
                      <td><img src="<?php echo $this->base;?>/Africa_pos/images/hotsite_Africa_pos_01.jpg"></td>
                    </tr>
                    <tr>
                      <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <?php 
                                if($tipo == "descricao"){
                                ?>
                                <img src="<?php echo $this->base;?>/Africa_pos/images/home-over.png">
                                <?php    
                                }else{
                                ?>    
                                <a href="<?php echo $this->base;?>/campanhas/africapos/" class="bthome"></a>
                                <?php
                                }
                                ?> 
                                

                              </td> 

                              <td>

                                <?php 
                                if($tipo == "regulamento"){
                                ?>
                                <img src="<?php echo $this->base;?>/Africa_pos/images/regulamento-over.png">
                                <?php    
                                }else{
                                ?>    
                                <a href="<?php echo $this->base;?>/campanhas/africapos/regulamento" class="btregulamento"></a>
                                <?php
                                } 
                                ?>
                              </td>

                              <td>                             
                                <?php 
                                if($tipo == "ranking"){
                                ?>
                               <img src="<?php echo $this->base;?>/Africa_pos/images/ranking-over.png">
                                <?php    
                                }else{
                                ?>    
                               <a href="<?php echo $this->base;?>/campanhas/africapos/ranking" class="btranking"></a>
                                <?php
                                }
                                ?> 

                              </td>
                              <td>
                                <?php 
                                if($tipo == "premiacao"){
                                ?>
                                <img src="<?php echo $this->base;?>/Africa_pos/images/premiacao-over.png">
                                <?php    
                                }else{
                                ?>    
                                <a href="<?php echo $this->base;?>/campanhas/africapos/premiacao" class="btpremiacao"></a>
                                <?php
                                }
                                ?> 
                              </td>
                              <td><img src="<?php echo $this->base;?>/Africa_pos/images/hotsite_Africa_pos_06.jpg"></td>
                              <td><img src="<?php echo $this->base;?>/Africa_pos/images/hotsite_Africa_pos_07.jpg"></td>
                            </tr> 
                          </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                            


                            <?php 
                            if($tipo == "descricao"){

                            ?>
                            <td><img src="<?php echo $this->base;?>/Africa_pos/images/left-home.png"></td>
                            <?php    
                            }
                            ?> 
                            <?php 
                            if($tipo == "regulamento"){

                            ?>
                             <td width="431"><img src="<?php echo $this->base;?>/Africa_pos/images/left-regulamento.png"></td> 
                            <?php    
                            }
                            ?>
                            <?php 
                            if($tipo == "premiacao"){
                              $scrool ='content_3';
                            ?>
                            <td width="431"><img src="<?php echo $this->base;?>/Africa_pos/images/left-home.png"></td>
                            <?php    
                            }
                            ?>  
                            <?php 
                            if($tipo == "ranking"){
                            ?>
                            <td width="431"><img src="<?php echo $this->base;?>/Africa_pos/images/left-ranking.png"></td>
                            <?php    
                            }
                            ?> 

                              <td width="568" bgcolor="#FFFFFF"> 
                                <div id="contHome" class="content_3"> 

                                  <?php
                                      echo $HmltText;
                                  ?>

                                </div>
                              </td> 
                            </tr>
                          </table>
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