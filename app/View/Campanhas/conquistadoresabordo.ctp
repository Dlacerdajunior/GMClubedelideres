    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/conquistadoresabordo/conquistadores.css">


  <style>
    .content_3{height: 154px;width: 910px;}

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
      height: 170px;
      margin-top: 0px;
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
                <table id="Table_01" width="1000" height="713" border="0" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td colspan="3">
                            <img src="<?php echo $this->base;?>/conquistadoresabordo/images/hotsite_navio_01.jpg" width="1000" height="366" alt=""></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                                                  <?php
                        if($tipo == "descricao"){
                        ?>
                        <img src="<?php echo $this->base;?>/conquistadoresabordo/images/hotsite_navio_02.jpg" width="432" height="190" alt="">
                         
                        <?php    
                        }
                        ?>

                        <?php
                        if($tipo == "regulamento"){
                        ?>
                        <img src="<?php echo $this->base;?>/conquistadoresabordo/images/hotsite_navio_02_regulamento.jpg" width="432" height="190" alt="">
                         
                        <?php    
                        }
                        ?>
          
                        <?php
                        if($tipo == "participantes"){
                        ?>        
                        <img src="<?php echo $this->base;?>/conquistadoresabordo/images/hotsite_navio_02_participantes.jpg" width="432" height="190" alt="">
                         
                        <?php    
                        }
                        ?>

                        <?php
                        if($tipo == "cruzeiro"){
                        ?>  
                          <img src="<?php echo $this->base;?>/conquistadoresabordo/images/hotsite_navio_02_ocruzeiro.jpg" width="432" height="190" alt="">
                                                 
                        <?php    
                        }
                        ?>
            
                        <?php
                        if($tipo == "agenda"){
                        ?>  
                          
                          <img src="<?php echo $this->base;?>/conquistadoresabordo/images/hotsite_navio_02_agenda.jpg" width="432" height="190" alt="">
                                                 
                        <?php      
                        }
                        ?>
     </td>
                        <td rowspan="7" style="width:568px; height:347px; background:url(<?php echo $this->base;?>/conquistadoresabordo/images/hotsite_navio_03.jpg) no-repeat;">
                            <div id="contHome" class="content_3">

                    <?php
                        echo $HmltText;
                    ?>                               

                           </div>
                      </td>
                    </tr>
          
                    <tr>
                        <td>
                        
                        <?php
                        if($tipo == "descricao"){
                        ?>
                        <img src="<?php echo $this->base;?>/conquistadoresabordo/images/home-over.jpg" width="187" height="24" alt="">
                         
                        <?php    
                        }else{
                        ?>
                        <a href="<?php echo $this->base;?>/campanhas/conquistadoresabordo/" class="bthome"></a>                        
                        <?php
                        }
                        ?> 

                            

                      </td>
                        <td rowspan="6">
                            <img src="<?php echo $this->base;?>/conquistadoresabordo/images/hotsite_navio_05.jpg" width="245" height="157" alt="">
              </td>
                    </tr>
                    <tr>


                        <td>
                          

                        <?php
                        if($tipo == "regulamento"){
                        ?>
                        <img src="<?php echo $this->base;?>/conquistadoresabordo/images/regulamento-over.jpg" width="187" height="25" alt="">
                         
                        <?php    
                        }else{
                        ?>    
                        <a href="<?php echo $this->base;?>/campanhas/conquistadoresabordo/regulamento" class="btregulamento"></a>
                        <?php
                        }
                        ?> 

                        </td>
                    </tr>
                    <tr>
                        <td>
                        <?php
                        if($tipo == "participantes"){
                        ?>                        
                         <img src="<?php echo $this->base;?>/conquistadoresabordo/images/participantes-over.jpg" width="187" height="24" alt="">
                        <?php    
                        }else{
                        ?>
                        <a href="<?php echo $this->base;?>/campanhas/conquistadoresabordo/participantes" class="btparticipantes"></a>
                        
                        <?php
                        }
                        ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                        <?php
                        if($tipo == "cruzeiro"){
                        ?>  
                          <img src="<?php echo $this->base;?>/conquistadoresabordo/images/ocruzeiro-over.jpg" width="187" height="25" alt="">
                                                 
                        <?php    
                        }else{
                        ?>
                        <a href="<?php echo $this->base;?>/campanhas/conquistadoresabordo/cruzeiro" class="btocruzeiro"></a>
                        
                        <?php
                        }
                        ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                        <?php
                        if($tipo == "agenda"){
                        ?>  
                          
                          <img src="<?php echo $this->base;?>/conquistadoresabordo/images/agenda-over.jpg" width="187" height="23" alt="">
                                                 
                        <?php     
                        }else{
                        ?>
                        <a href="<?php echo $this->base;?>/campanhas/conquistadoresabordo/agenda" class="btagenda"></a>
                        
                        <?php
                        }
                        ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?php echo $this->base;?>/conquistadoresabordo/images/hotsite_navio_10.jpg" width="187" height="36" alt=""></td>
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