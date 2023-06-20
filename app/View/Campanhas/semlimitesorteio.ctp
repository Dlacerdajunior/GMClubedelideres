    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/semlimitesorteio/semlimites.css">


  <style>
    .content_3{height: 487px;width: 910px;}

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

    #contHome {


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

                    <table align="center" width="1000" height="713" border="0" cellpadding="0" cellspacing="0">



                                <?php
                                if($tipo != "descricao"){
                                ?>

                                    <tr>
                                        <td colspan="4">
                                            <img src="<?php echo $this->base;?>/semlimitesorteio/images/hotsite_SemLimites_interna_01.jpg" width="1000" height="226" alt=""></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3">

                                        <?php
                                        if($tipo == "mecanica"){
                                        ?>                                            
                                        <img src="<?php echo $this->base;?>/semlimitesorteio/images/hotsite_SemLimites_interna_02.jpg" width="370" height="158" alt="">

                                        <?php 
                                        }
                                        ?>

                                        <?php
                                        if($tipo == "ranking"){
                                        ?>                                            
                                        <img src="<?php echo $this->base;?>/semlimitesorteio/images/hotsite_SemLimites_interna_02-ranking.jpg" width="370" height="158" alt="">

                                        <?php 
                                        }
                                        ?>
                                        <?php
                                        if($tipo == "regulamento"){
                                        ?>                                            
                                        <img src="<?php echo $this->base;?>/semlimitesorteio/images/hotsite_SemLimites_interna_02-regulamento.jpg" width="370" height="158" alt="">

                                        <?php 
                                        }
                                        ?> 

                                        <?php
                                        if($tipo == "sorteio"){
                                        ?>                                            
                                        <img src="<?php echo $this->base;?>/semlimitesorteio/images/hotsite_SemLimites_interna_02-sorteio.jpg" width="370" height="158" alt="">

                                        <?php 
                                        }
                                        ?> 


                                        </td>
                                        <td rowspan="6" width="630" height="487" style="background:url(<?php echo $this->base;?>/semlimitesorteio/images/hotsite_SemLimites_interna_03.jpg)">
                                            <div id="contInt" class="content_3">

                                        <?php 
                                          if(isset($_GET['ganhadores'])){
                                        ?>

                                            <p style="font-size: 18px;">Ganhadores</p>
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif; color: #222222;">&nbsp;</p>
                                            <table style="color: #222222; font-family: arial, sans-serif; font-size: 13px; border-collapse: collapse;" width="400" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr style="height: 15pt;">
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border: 1pt solid windowtext; padding: 0cm 5.4pt; height: 15pt;" valign="top" width="173">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;"><strong>CARGO</strong></p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: solid solid solid none; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="173">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;"><strong>CONCESSION&Aacute;RIA</strong></p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 60pt; border-style: solid solid solid none; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="80">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;"><strong>C&Oacute;D</strong></p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 52pt; border-style: solid solid solid none; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="69">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;"><strong>REGI&Atilde;O</strong></p>
                                            </td>

                                                                                                                                                                <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: solid solid solid none; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="173">
                                           <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;"><strong>NOME</strong></p>
                                            </td>
                                            
                          
                                            </tr>
                                            <tr style="height: 15pt;">
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" width="173">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">Vendedor</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="173">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">CONCORDE</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 60pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="80">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">C47</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 52pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="69">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">Regi&atilde;o 04</p>
                                            </td>

                                                                                                                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="173">
                                           <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">NOEMIA REIS DE M SOUZA</p>
                                            </td>

                        
                                            </tr>
                                            <tr style="height: 15pt;">
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" width="173">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">Gestor de OPV</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="173">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">MOCOVEL</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 60pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="80">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">X12001</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 52pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="69">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">Regi&atilde;o 05</p>
                                            </td>

                                                                                                                  <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="173">
                                           <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">LUCIANA JORENTI BANDEIRA</p>
                                            </td>


                                            </tr>
                                            <tr style="height: 15pt;">
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" width="173">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">Titular</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="173">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">ARTVEL</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 60pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="80">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">P53001</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 52pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="69">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">Regi&atilde;o 09</p>
                                            </td>

                                                                                      <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="173">
                                           <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">Jo&atilde;o Batista Sim&atilde;o</p>
                                            </td>

                                            </tr>
                                            <tr style="height: 15pt;">
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" width="173">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">Gerente</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="173">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">SIMPALA</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 60pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="80">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">S55001</p>
                                            </td>
                                            <td style="font-family: arial, sans-serif; margin: 0px; width: 52pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="69">
                                            <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">Regi&atilde;o 03</p>
                                            </td>

                                          <td style="font-family: arial, sans-serif; margin: 0px; width: 130pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0cm 5.4pt; height: 15pt;" valign="top" nowrap="nowrap" width="173">
                                           <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt; font-size: 11pt; font-family: Calibri, sans-serif;">Rog&eacute;rio Dias de Castro</p>
                                            </td>


                                            </tr>
                                            </tbody>
                                            </table>                                     

                                        <?php
                                        }else{

                                            echo $HmltText;

                                        }
                                        ?> 








                                            </div>
                                        
                                        </td>
                                    </tr>

                                    <tr>
                                        <td rowspan="5">
                                            <img src="<?php echo $this->base;?>/semlimitesorteio/images/hotsite_SemLimites_interna_04.jpg" width="31" height="329" alt=""></td>
                                        <td style="background:#FFF;">
                                            <div class="bthome"></div> </td>
                                                
                                        <td rowspan="5">
                                            <img src="<?php echo $this->base;?>/semlimitesorteio/images/hotsite_SemLimites_interna_06.jpg" width="163" height="329" alt=""></td>
                                    </tr>


                                <?php
                                }else{
                                ?>

                                    <tr>
                                        <td colspan="3">
                                            <img src="<?php echo $this->base;?>/semlimitesorteio/images/index_01.jpg" width="1000" height="431" alt=""></td>
                                    </tr>


                                    <tr>
                                        <td colspan="2">
                                            <img src="<?php echo $this->base;?>/semlimitesorteio/images/index_02.jpg" width="420" height="131" alt=""></td>
                                        <td rowspan="6" width="580" height="282" style="background:url(<?php echo $this->base;?>/semlimitesorteio/images/index_03.jpg) no-repeat;">
                                            <div id="contHome">
                                                

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
                                            
                                            <img src="<?php echo $this->base;?>/semlimitesorteio/images/home-over.png" width="173" height="28" alt="">

                                            <?php    
                                            }else{
                                            ?>
                                            <div class="bthome"></div>                                
                                            <?php
                                            }
                                            ?> 

                                            </td>

                                        
                                        <td rowspan="5">
                                            <img src="<?php echo $this->base;?>/semlimitesorteio/images/index_05.jpg" width="247" height="151" alt="">
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>




                        <tr>
                            <td style="background:#FFF;">

                                <?php
                                if($tipo == "mecanica"){
                                ?>
                                
                                    <img src="<?php echo $this->base;?>/semlimitesorteio/images/mecanica-over.png" width="176" height="25" alt="">

                                <?php    
                                }else{
                                ?>
                                <div class="btmecanica"></div>
                                <?php
                                }
                                ?> 
 
                                
                            </td>
                        </tr>

                        <tr>
                            <td style="background:#FFF;">

                                <?php
                                if($tipo == "ranking"){
                                ?>
                                                                    
                                    <img src="<?php echo $this->base;?>/semlimitesorteio/images/ranking-over.png">
                                <?php    
                                }else{
                                ?>
                                <div class="btranking"></div>
                                <?php
                                }
                                ?> 

                                
                            </td>
                        </tr>

                        <tr>
                            <td style="background:#FFF;">

                                <?php
                                if($tipo == "regulamento"){
                                ?>
                                                                                                        
                                    <img src="<?php echo $this->base;?>/semlimitesorteio/images/regulamento-over.png">
                                <?php    
                                }else{
                                ?> 
                                <div class="btregulamento"></div>
                                <?php
                                }
                                ?> 


                                
                            </td>
                        </tr>


                        <tr>
                            <td style="background:#FFF;">

                                <?php
                                if($tipo == "sorteio"){
                                ?>
                                                                                                        
                                    <img src="<?php echo $this->base;?>/semlimitesorteio/images/hotsite_SemLimites_interna_10-over.jpg">
                                <?php    
                                }else{
                                ?>
                                
                                        <?php
                                        if($tipo != "descricao"){
                                        ?>


                                            <div class="btsorteio"></div>
                                        
                                        <?php 
                                        }else{
                                        ?>

                                            <div class="btsorteiohome"></div>

                                        <?php
                                        }
                                        ?> 
                                

                                <?php
                                }
                                ?> 


                                
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