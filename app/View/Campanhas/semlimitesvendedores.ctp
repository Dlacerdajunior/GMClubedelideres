    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/semlimites_vendedores/semlimites.css">


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
                                            <img src="<?php echo $this->base;?>/semlimites_vendedores/images/hotsite_SemLimites_interna_01.jpg" width="1000" height="226" alt=""></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3">

                                        <?php
                                        if($tipo == "mecanica"){
                                        ?>                                            
                                        <img src="<?php echo $this->base;?>/semlimites_vendedores/images/hotsite_SemLimites_interna_02.jpg" width="370" height="158" alt="">

                                        <?php 
                                        }
                                        ?>

                                        <?php
                                        if($tipo == "ranking"){
                                        ?>                                            
                                        <img src="<?php echo $this->base;?>/semlimites_vendedores/images/hotsite_SemLimites_interna_02-ranking.jpg" width="370" height="158" alt="">

                                        <?php 
                                        }
                                        ?>
                                        <?php
                                        if($tipo == "regulamento"){
                                        ?>                                            
                                        <img src="<?php echo $this->base;?>/semlimites_vendedores/images/hotsite_SemLimites_interna_02-regulamento.jpg" width="370" height="158" alt="">

                                        <?php 
                                        }
                                        ?> 
                                        <?php
                                        if($tipo == "sorteio"){
                                        ?>                                            
                                        <img src="<?php echo $this->base;?>/semlimites_gerentes/images/hotsite_SemLimites_interna_02-sorteio.jpg" width="370" height="158" alt="">

                                        <?php 
                                        }
                                        ?> 


                                        </td>
                                        <td rowspan="6" width="630" height="487" style="background:url(<?php echo $this->base;?>/semlimites_vendedores/images/hotsite_SemLimites_interna_03.jpg)">
                                            



                                            <div id="contInt" class="content_3">
                                              
                                                <?php
                                                if($tipo == "ranking"){ 

                                                    
                                                ?>                                            
                                                
                                            <!--
                                            <div style="width:546px; border:1px solid #e3e3e3; padding: 10px; font-size:16px; text-align:center;">
                                                 <a href="<?php echo $this->base;?>/campanhas/semlimitesloja" target="_blank" style="font-size: 16px;">
                                                TROQUE SEUS PONTOS
                                                </a>
                                            </div>                                                
                                            -->
                                            
                                                            <div class="container" style="margin-top: 54px; min-height: 480px; padding:15px;width: 614px;">
                                                                <h3>Meus Pontos</h3>                                                                                                                                
                                                                <a href="<?php echo $this->base;?>/pagina/todospontos/10" target="_blank" style="font-size: 16px;float: right;position: relative;top: -36px;margin-right: 76px;">ver todos ganhadores</a>
                                                                

                                                                <b>Apuração de pontos encerrada. Pontuação final.</b>

                                                                <?php 

                                                                 if($MOSTRA == "1"){

                                                                ?>
                                                                <div style='font-family: "Louis-Regular", serif; font-size: 16px;margin-top: 20px;'>

                                                                  <table width="90%" border="1" BORDERCOLOR="#ebebeb">
                                                                    <thead> 

                                                                  <tr bgcolor="#ebebeb" style="height: 30px;">
                                                                    <td style="padding: 10px;font-size: 18px;">Campanha: Sem Limites </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                  </tr>                
                                                                  </thead>
                                                                  <tbody>
                                                                  <tr style="height: 30px;">
                                                                    <td style="padding: 10px;">Apuração (Fevereiro de 2014)</td>
                                                                    <td style="padding: 10px;"><?php if($pontosFev != 0){ echo number_format($pontosFev, 2, '.', '')." pontos"; }else{ echo 0;  } ?> </td>
                                                                    <td style="padding: 10px;"><a href="<?php echo $this->base;?>/pagina/todospontos/10/1" target="_blank">ver outros ganhadores</a></td>
                                                                  </tr> 

                                                                  <tr style="height: 30px;">
                                                                    <td style="padding: 10px;">Apuração (Março de 2014)</td>
                                                                    <td style="padding: 10px;"><?php if($pontosMarc != 0){ echo number_format($pontosMarc, 2, '.', '')." pontos"; }else{ echo 0;  } ?> </td> 
                                                                    <td style="padding: 10px;"><a href="<?php echo $this->base;?>/pagina/todospontos/10/5" target="_blank">ver outros ganhadores</a></td>
                                                                  </tr>


                                                                  </tbody>
                                                                  </table>

                                                                </div>



                                                                <div style='font-family: "Louis-Regular", serif; font-size: 16px;margin-top: 50px;'>
                                                                  <table width="90%" >
                                                                    <thead> 

                                                                  <tr style="height: 30px;" >
                                                                    <td style="padding: 10px;font-size: 18px;" border="0">Extrato de Pontos </td>
                                                                  </tr> 

                                                                  <tr  style="height: 30px; border-bottom: 1pt solid #ebebeb;">
                                                                    <td width="40%"  style="padding: 10px;">Total de Pontos - Pontuação final</td>
                                                                    <td style="padding: 10px;"><?php echo number_format($pontos, 2, '.', '');  ?></td>
                                                                  </tr>

                                                                  <tr style="height: 30px;  border-bottom: 1pt solid #ebebeb;">
                                                                    <td  style="padding: 10px;">Utilizados</td>
                                                                     <td style="padding: 10px;">


                                                                        <?php 
                                                                        if($pontos > 0){

                                                                            if(number_format($pontos, 2, '.', '') == number_format($pontosUsuario, 2, '.', '')){


                                                                                echo number_format(0, 2, '.', ''); 

                                                                            }else{

                                                                            echo number_format($pontos, 2, '.', '') - number_format($pontosUsuario, 2, '.', '');

                                                                            } 


                                                                            

                                                                        }else{

                                                                            echo number_format($pontos, 2, '.', ''); 
                                                                        }
                                                                        

                                                                         ?>

                                                                    </td>
                                                                  </tr>

                                                                  <tr style="height: 30px;  border-bottom: 1pt solid #ebebeb;">
                                                                    <td  style="padding: 10px;color:#00b359;">Saldo</td>      
                                                                    <td style="padding: 10px;color:#00b359;">

                                                                        <?php 
                                                                        if($pontos > 0){

                                                                            echo number_format($pontosUsuario, 2, '.', '');                                                                         

                                                                        }else{

                                                                            echo number_format($pontos, 2, '.', ''); 
                                                                        }
                                                                        

                                                                         ?>

                                                                    </td>           
                                                                  </tr>            

                                                                  </thead>
                                                                  <tbody>


                                                                  </tbody>
                                                                  </table> 

                                                                </div>


                                                    <?php 
                                                    }else{

                                                            //echo '<p>Exclusivo para vendedores.</p>';

                                                        } 
                                                    ?>

                                                            </div><!-- /container --> 
                                                                                                                



                                                <?php 
                                                }
                                                ?>

                                            <?php
                                                echo $HmltText;
                                            ?> 

                                            </div>
                                        
                                        </td>
                                    </tr>

                                    <tr>
                                        <td rowspan="5">
                                            <img src="<?php echo $this->base;?>/semlimites_vendedores/images/hotsite_SemLimites_interna_04.jpg" width="31" height="329" alt=""></td>
                                        <td style="background:#FFF;">
                                            <a href="<?php echo $this->base;?>/campanhas/semlimitesvendedores/" class="bthome"></a> </td>
                                            
                                        <td rowspan="5">
                                            <img src="<?php echo $this->base;?>/semlimites_vendedores/images/hotsite_SemLimites_interna_06.jpg" width="163" height="329" alt=""></td>
                                    </tr>

                                    
                                <?php
                                }else{
                                ?>

                                    <tr>
                                        <td colspan="3">
                                            <img src="<?php echo $this->base;?>/semlimites_vendedores/images/index_01.jpg" width="1000" height="431" alt=""></td>
                                    </tr>


                                    <tr>
                                        <td colspan="2">
                                            <img src="<?php echo $this->base;?>/semlimites_vendedores/images/index_02.jpg" width="420" height="131" alt=""></td>
                                        <td rowspan="6" width="580" height="282" style="background:url(<?php echo $this->base;?>/semlimites_vendedores/images/index_03.jpg) no-repeat;">
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
                                            
                                            <img src="<?php echo $this->base;?>/semlimites_vendedores/images/home-over.png" width="173" height="28" alt="">

                                            <?php    
                                            }else{
                                            ?>
                                            <a href="<?php echo $this->base;?>/campanhas/semlimitesvendedores/" class="bthome"></a>                                
                                            <?php
                                            }
                                            ?> 

                                            </td>

                                        
                                        <td rowspan="5">
                                            <img src="<?php echo $this->base;?>/semlimites_vendedores/images/index_05.jpg" width="247" height="151" alt="">
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
                                
                                    <img src="<?php echo $this->base;?>/semlimites_vendedores/images/mecanica-over.png" width="176" height="25" alt="">

                                <?php    
                                }else{
                                ?>
                                <a href="<?php echo $this->base;?>/campanhas/semlimitesvendedores/mecanica" class="btmecanica"></a>
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
                                                                    
                                    <img src="<?php echo $this->base;?>/semlimites_vendedores/images/ranking-over.png">
                                <?php    
                                }else{
                                ?>
                                <a href="<?php echo $this->base;?>/campanhas/semlimitesvendedores/ranking" class="btranking"></a>
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
                                                                                                        
                                    <img src="<?php echo $this->base;?>/semlimites_vendedores/images/regulamento-over.png">
                                <?php    
                                }else{
                                ?>
                                <a href="<?php echo $this->base;?>/campanhas/semlimitesvendedores/regulamento" class="btregulamento"></a>
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
                                                                                                        
                                    <img src="<?php echo $this->base;?>/semlimites_gerentes/images/hotsite_SemLimites_interna_10-over.jpg">
                                <?php    
                                }else{
                                ?>
                                
                                    
                                        <?php
                                        if($tipo != "descricao"){
                                        ?>


                                             <a href="<?php echo $this->base;?>/campanhas/semlimitesloja" target="_blank" class="btsorteio"></a>
                                        
                                        <?php 
                                        }else{
                                        ?>

                                            <a href="<?php echo $this->base;?>/campanhas/semlimitesloja" target="_blank" class="btsorteiohome"></a> 

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