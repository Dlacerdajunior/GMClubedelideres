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


  </style> 
     
<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery/js/jquery-1.7.2.min.js"></script> 

    <script>

        //When DOM loaded we attach click event to button
        $(document).ready(function() {
            

            

            
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
                <table align="center" width="1000" height="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF"> 
                    <tr>
                      <td><img src="<?php echo $this->base;?>/img/hotsite_SemLimites_loja_01.jpg"></td>
                    </tr>

                    <tr>
                      <td bgcolor="#FFFFFF">
                       <h2 style="margin-left: 20px;">Histórico de resgates</h2> 

                        <div style="font-size: 14px;position: relative;left: 742px; width: 232px;top:-39px; font-family: Louis-Regular, serif;">   
                         <!--<img src="<?php echo $this->base;?>/img/checkout.png"/>-->                                      
                          <a href="<?php echo $this->base;?>/campanhas/semlimitesloja" title="Início">Início</a>
                          |
                          <a href="<?php echo $this->base;?>/campanhas/semlimitescarrinho" title="Carrinho">Carrinho</a>
                          |
                          <a href="<?php echo $this->base;?>/campanhas/semlimitescomprarfeitas" title="Carrinho">Meus Resgates</a>

                        </div>  

                     </td>
                    </tr> 

                    <tr>
                      <td>
                        <?php 
                        if(count($rsProdutos) != 0){                          
                        ?> 




                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              
                            <td bgcolor="#FFFFFF">


                              <div style="font-family: &quot;Louis-Regular&quot;, serif; font-size: 14px;margin-top: 20px;margin-bottom: 300px;margin-left: 20px;">

                                  <table width="960px">
                                    <thead> 

                                  <tr bgcolor="#ebebeb" style="height: 30px;">
                                    <td style="padding: 10px;">Produto </td>

                                    <td style="padding: 10px;"></td> 
                                    <td style="padding: 10px;">Ponto Unitário</td>  
                                    <td style="padding: 10px;">Data da compra</td>  
                                    
                                  </tr>                
                                  </thead>
                                  <tbody>

                                  <?php 

                                  $VALOR = 0; 


                                  foreach ($rsProdutos as $item) { 
                                  

                                  ?>                                    
                                  

        
                                    <tr style="height: 30px; border-bottom: 1pt solid #ebebeb;">
                                      <td style="padding: 10px;" width="64%">
                                         <img src="<?php echo $item['pt']['IMAGEM']; ?>" alt="<?php echo $item['pt']['DESCRICAO']; ?>" width="10%" style="margin-right: 10px;"/>

                                         <a href="<?php echo $this->base;?>/campanhas/semlimiteslojaproduto/<?php echo $item['pt']['id']; ?>" title="<?php echo $item['pt']['DESCRICAO']; ?>">
                                          <?php echo $item['pt']['DESCRICAO']; ?>
                                        </a> 
                                      </td>
 
                                      <td style="padding: 10px;"> 

                                                      

                                      </td>
                                      <td style="padding: 10px;"><?php echo $item['cp']['valor_moeda_produtoproduto']; ?> </td> 

                                      
                                      <td style="padding: 10px;">
                                        <?php echo date("d/m/Y", strtotime($item['cp']['created'])); ?>
                                      </td> 
                                      

                                    </tr>    





                                  <?php

                                  


                                  $VALOR = $VALOR + $item['cp']['valor_moeda_produtoproduto']; 

                                  }                                  
                                  ?>    


                                  <?php 
                                  $VALORFRETE = 0;

                                   foreach ($rsProdutosFRETE as $item) {                                   
                              
                                    $VALORFRETE = $VALORFRETE + $item['cp']['Valor_Frete_MoedaPedido'];


                                  }

                                  $VALOR = $VALOR + $VALORFRETE;
                                  ?>  

                                    <tr style="height: 30px; border-bottom: 1pt solid #ebebeb;">
                                      <td style="padding: 10px;" width="64%">
                                       
                                      </td>
 
                                      <td style="padding: 10px;"> 
                                        Frete:
                                                      
                                      </td>
                                      <td style="padding: 10px;">
                                         <?php echo number_format($VALORFRETE, 2, '.', ''); ?>  
                                      </td> 
                                     
                                      
                                      <td style="padding: 10px;">
                                       
                                      </td> 
                                      

                                    </tr>     






                                    <tr style="height: 30px; border-bottom: 1pt solid #ebebeb;">
                                      <td style="padding: 10px;">Total:</td>
                                      <td style="padding: 10px;"></td>
                                      
                                      <td style="padding: 10px;"><?php echo number_format($VALOR,2); ?> </td>

                                      <td style="padding: 10px;"> </td>


                                    </tr>           


                                  </tbody>
                                  </table>




                                </div>

                              </td> 
                            </tr>
                          </table>
                        <?php
                        }else{
                        ?>



                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              
                            <td bgcolor="#FFFFFF">


                              <div style="font-family: &quot;Louis-Regular&quot;, serif; font-size: 14px;margin-top: 20px;margin-bottom: 300px;margin-left: 20px;">

                                <center>Nenhum item foi comprado</center>

                               </div>

                              </td> 
                            </tr>
                          </table>

                        

                        <?php
                        }
                        ?>



                      </td>
                    </tr>


                    
                  </table>

              </div>
            </div>


            <?php echo $this->element('/site/bottom'); ?>


    </body>
</html>