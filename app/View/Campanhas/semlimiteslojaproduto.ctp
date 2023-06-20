    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/Africa_pos/africa.css">

  <style> 
    .content_3{height: 536px;width: 770px; margin-bottom: 100px;}

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
     



<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery/js/jquery-1.7.2.min.js"></script> 

    <script>

        //When DOM loaded we attach click event to button
        $(document).ready(function() {



          $(".comprarblock" ).click(function() {
              
           

            var rsradio = $('input[name=inpModel]:checked').val();

            if(!rsradio){
               alert("Selecione a voltagem");
                return false
            }
            ;                 

          });  





          

            
        });

    </script>


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
                      <td><img src="<?php echo $this->base;?>/img/hotsite_SemLimites_loja_01.jpg"></td>
                    </tr>


                    <tr>
                      <td bgcolor="#FFFFFF"></td>
                    </tr>

                    <tr>
                      <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              
                            <td bgcolor="#FFFFFF" valign="top">


                          <div class="dropdown clearfix" style="margin-left: 12px;">  

                                        <div style="font-size: 14px;position: absolute;left: 200px;width: 512px;top: 0px;line-height: 14px;;"> 
                                          Olá <?php echo $idUsuarios['Usuario']['nome']; ?>, <br>
                                          você possui 
                                          <span style="color:#00b359;font-weight: bold;"><?php echo number_format($pontos, 2, '.', ''); ?> pontos</span>
                                        </div> 

                                        <div style="font-size: 14px;position: absolute;left: 742px; width: 232px;top: -4px; font-family: Louis-Regular, serif;">   
                                         <!--<img src="<?php echo $this->base;?>/img/checkout.png"/>-->                                      
                                          <a href="<?php echo $this->base;?>/campanhas/semlimitesloja" title="Início">Início</a>
                                          |
                                          <a href="<?php echo $this->base;?>/campanhas/semlimitescarrinho" title="Carrinho">Carrinho</a>
                                          |
                                          <a href="<?php echo $this->base;?>/campanhas/semlimitescomprarfeitas" title="Carrinho">Meus Resgates</a>

                                        </div> 

                                        
                                        <p style="width: 181px;">
                                          <b>Apuração de pontos encerrada. Os pontos das vendas de fevereiro/2014 e março/2014 já estão computados e disponibilizados.</b>
                                        </p>

                                        <form type="GET" action="<?php echo $this->base;?>/campanhas/semlimitesloja" style="margin-bottom: 6px;">
                                          <input type="text" name="q" value="Buscar" onfocus="if(this.value=='Buscar')this.value='';"  onblur="if(this.value=='')this.value='Buscar';" style="width: 172px;">                                          
                                        </form>

                                        <?php echo $this->element('/loja/menu'); ?>



                                      </div>
                            </td>

                              <td width="800" bgcolor="#FFFFFF" valign="top">  
                                <div id="contHome" style="width: 770px;height: 100%;position: relative; top: 40px; margin-left: 12px;">                                                     
                                  <ul class="breadcrumb">
                                    <li><a href="<?php echo $this->base;?>/campanhas/semlimitesloja?C=<?php echo $produto['Produto']['CATEGORIA']; ?>"><?php echo $breadum;?></a> <span class="divider">/</span></li>
                                    <li class="active"><?php echo $breaddois; ?> </li> 
                                  </ul>

                                    <span style="
                                        font-size: 18px;
                                        font-weight: bold;                                                                                                                      
                                    "> 
                                    <?php echo $produto['Produto']['DESCRICAO']; ?>
                                  </span> 

                                    <div class="img-destaque" style="margin-bottom: 10px;margin-top: 10px;"> 
                                        <a href="#" title="<?php echo $produto['Produto']['DESCRICAO']; ?>">

                                        <img src="<?php echo $produto['Produto']['IMAGEM_VITRINE_GRANDE']; ?> " alt="<?php echo $produto['Produto']['DESCRICAO']; ?>">
                                        
                                        </a> 
                                    </div> 


                                    
                                    <?php 

                                   // echo $webVALOR_REAIS;
                                   // if($produto['Produto']['VALOR_VENDA'] == $webVALOR_REAIS){
                                    ?>                                                                              
                                      
                                      <?php 
                                        //echo $LIBERADO;
                                      if($LIBERADO != 1){ 
                                      ?>
                                      <p class="texto-destaque" style="text-align: center;margin-top: 26px;margin-bottom: 26px;">
                                        <a href="#">
                                          <button type="button" class="btn btn-danger" style="font-size: 22px;width: 380px;height: 36px;">Produto indisponível para resgatar </button>
                                        </a>
                                      </p>

                                      <?php 

                                      }else if($webVALOR_REAIS <= 0){
                                      ?>

                                        <p class="texto-destaque" style="text-align: center;margin-top: 26px;margin-bottom: 26px;">
                                        <a href="#">
                                          <button type="button" class="btn btn-danger" style="font-size: 22px;width: 380px;height: 36px;">Produto indisponível para resgatar </button>
                                        </a>
                                      </p>                                  
                                      
                                      <?php
                                      }else{

                                        $bockcomprar = "";

                                        if($voltamtipo != ""){

                                          $bockcomprar = "comprarblock";

                                        }

                                      ?>

                                      <p class="texto-destaque" style="float: right;">
                                        <a href="<?php echo $this->base;?>/campanhas/semlimitescarrinho/<?php echo $produto['Produto']['id']; ?>"> 


                                          <button type="button" class="btn btn-success <?php echo $bockcomprar; ?>" style="font-size: 22px;width: 116px;height: 36px;">Resgatar</button>
                                        </a> 
                                      </p>
                                      
                                      <?php
                                      }                                      
                                      ?> 


                                    <?php
                                   // }else{
                                    ?>
                                            <!--
                                      <p class="texto-destaque" style="text-align: center;margin-top: 26px;margin-bottom: 26px;">
                                        <a href="#">
                                          <button type="button" class="btn btn-danger" style="font-size: 22px;width: 380px;height: 36px;">Produto indisponível para compra </button>
                                        </a>
                                      </p>
                                    -->
                                      

                                    <?php 
                                    //}                                                                        
                                    ?>

                                    
                                    <?php 
                                    if($produto['Produto']['VOLTAGEM'] != 3){

                                      $checkdvt = "";

                                      if(isset($_GET['vt']) && $_GET['vt'] != ""){

                                        
                                        $checkdvt = $_GET['vt'];


                                      }
                                    ?>



                                      <!--
                                      <p class="texto-destaque" style="font-weight: bold;">Voltagem :

                                        <?php 
                                        if($produto['Produto']['VOLTAGEM'] == 1){
                                        
                                          $checkdfor = "";

                                          if($checkdvt == 1){

                                             $checkdfor = "checked"; 

                                          }

                                        ?>


                                            <span class="btn-default">
                                                

                                                  <input name="inpModel" type="radio" class="buy-option" value="1" <?php echo $checkdfor; ?>><span class="">110 Volts</span>
                                                
                                            </span>
     
                                            <?php 

                                            if(isset($voltamtipo) && $voltamtipo != ""){
                                            
                                            ?>
                                                 <span class="btn-default">                                           
                                                      <input name="inpModel" type="radio" class="buy-option" value="2" onclick="window.location = '<?php echo $this->base;?>/campanhas/semlimiteslojaproduto/<?php echo $voltamtipo;?>?vt=2'"><span class="">220 Volts</span>                                          
                                                </span> 
                                            <?php
                                            }
                                            ?>                        

                                        <?php
                                        }
                                        ?>


                                        <?php 
                                        if($produto['Produto']['VOLTAGEM'] == 2){
                                       

                                            $checkdfor = "";

                                            if($checkdvt == 2){

                                               $checkdfor = "checked"; 

                                            }

                                          ?>


                                            <?php 

                                            if(isset($voltamtipo) && $voltamtipo != ""){
                                            
                                            ?>

                                          <span class="btn-default">                                              
                                                <input name="inpModel" type="radio" class="buy-option" value="1" onclick="window.location = '<?php echo $this->base;?>/campanhas/semlimiteslojaproduto/<?php echo $voltamtipo;?>?vt=1'"><span class="">110 Volts</span>
                                              
                                          </span>
                                            <?php
                                            }
                                            ?>


                                          <span class="btn-default">
                                              
                                                <input name="inpModel" type="radio" class="buy-option" value="2" <?php echo $checkdfor; ?>><span class="">220 Volts</span>
                                              
                                          </span>  
                            

                                        <?php
                                        }
                                        ?>


                                      </p>
-->





                                    <?php
                                    }
                                    ?>

                                    <p class="texto-destaque"><?php echo $produto['Produto']['REFERENCIA']; ?> </p>                                    
                                    <p class="texto-destaque">Marca : <?php echo $produto['Produto']['MARCA']; ?> </p>


                                      <?php 

                                      if($statusdoproduto != 0){
                                      ?>
                                      <p class="texto-destaque">Pontos : <?php echo $produto['Produto']['VALOR_VENDA']; ?> </p>
                                      <?php
                                      }else{
                                      ?>
                                      <p class="texto-destaque">Pontos : <?php echo $webVALOR_REAIS; ?> </p>                                                                          
                                        

                                      <?php
                                      }                                      
                                      ?> 


                                    
                                    <?php 
                                    if($produto['Produto']['VOLTAGEM'] != 3){
                                    ?>

                                      <p class="texto-destaque">Voltagem :
                                        <?php 
                                        if($produto['Produto']['VOLTAGEM'] == 0){
                                        ?>

                                        <?php echo "Bivolt"; ?>

                                        <?php
                                        }
                                        ?>

                                        <?php 
                                        if($produto['Produto']['VOLTAGEM'] == 1){
                                        ?>

                                        <?php echo "110 Volts"; ?>

                                        <?php
                                        }
                                        ?>
                                        <?php 
                                        if($produto['Produto']['VOLTAGEM'] == 2){
                                        ?>

                                        <?php echo "220 Volts"; ?>

                                        <?php
                                        }
                                        ?>

                                        <?php 
                                        if($produto['Produto']['VOLTAGEM'] == 4){
                                        ?>

                                        <?php echo "380 Volts"; ?>

                                        <?php
                                        }
                                        ?>
                                        
                                        <?php 
                                        if($produto['Produto']['VOLTAGEM'] == 5){
                                        ?>

                                        <?php echo "Bateria Recarregável"; ?>

                                        <?php
                                        }
                                        ?>

                                        <?php 
                                        if($produto['Produto']['VOLTAGEM'] == 6){
                                        ?>

                                        <?php echo "Pilha"; ?>

                                        <?php
                                        }
                                        ?>

                                        <?php 
                                        if($produto['Produto']['VOLTAGEM'] == 7){
                                        ?>

                                        <?php echo "Energia Solar"; ?> 

                                        <?php
                                        }
                                        ?>

                                      </p>

                                    <?php
                                    }
                                    ?>




                                    
                                                                          
                                      <div class="content_3">
                                      <?php echo $detalheProduto; ?>
                                      </div>

                               


                            




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