    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/descoberta.css">

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
                <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/images/index_01.jpg"></td>
                    </tr>
                    <tr>
                      <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="105">
                                <?php 
                                if($tipo == "descricao"){
                                ?>
                                <img src="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/images/home-over.png">
                                <?php    
                                }else{
                                ?>    
                                <a href="<?php echo $this->base;?>/campanhas/descobertapremiada/" class="bthome"></a>
                                <?php
                                }
                                ?>
                                

                              </td> 

                              <td width="116">

                                <?php 
                                if($tipo == "regulamento"){
                                ?>
                                <img src="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/images/regulamento-over.png">
                                <?php    
                                }else{
                                ?>    
                                <a href="<?php echo $this->base;?>/campanhas/descobertapremiada/regulamento" class="btregulamento"></a>
                                <?php
                                } 
                                ?>
                              </td>

                              <td width="76">
                             

                                <?php 
                                if($tipo == "ranking"){
                                ?>
                               <img src="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/images/ranking-over.png">
                                <?php    
                                }else{
                                ?>    
                               <a href="<?php echo $this->base;?>/campanhas/descobertapremiada/ranking" class="btranking"></a>
                                <?php
                                }
                                ?> 

                              </td>
                              <td width="104">
                                <?php 
                                if($tipo == "premiacao"){
                                ?>
                                <img src="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/images/premiacao-over.png">
                                <?php    
                                }else{
                                ?>    
                               <a href="<?php echo $this->base;?>/campanhas/descobertapremiada/premiacao" class="btpremiacao"></a>
                                <?php
                                }
                                ?> 
                              </td>
                              <td width="599"><img src="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/images/index_06.png"></td>
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
                            <td width="431"><img src="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/images/index_07.png"></td>
                            <?php    
                            }  
                            ?> 
                            <?php 
                            if($tipo == "regulamento"){

                            ?>
                             <td width="431"><img src="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/images/left_regulamento.png"></td>
                            <?php    
                            }
                            ?>
                            <?php 
                            if($tipo == "premiacao"){
                              $scrool ='content_3';
                            ?>
                            <td width="431"><img src="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/images/left_premiacao.png"></td>
                            <?php    
                            }
                            ?> 
                            <?php 
                            if($tipo == "ranking"){
                            ?>
                            <td width="431"><img src="<?php echo $this->base;?>/descoberta_premiada_vendas_novo/images/left_ranking.png"></td>
                            <?php    
                            }
                            ?> 

                              <td width="569" bgcolor="#FFFFFF" valign="top">
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