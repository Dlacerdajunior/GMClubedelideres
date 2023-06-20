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

          <?php 

          if(isset($_GET['ERROPRODUTO']) && $_GET['ERROPRODUTO'] != ""){
          ?>

          alert('<?php echo $_GET['ERROPRODUTO']; ?> não está disponível para compra.'); 

          <?php
          }
          ?>                

          <?php 

          if(isset($_GET['ERRO']) && $_GET['ERRO'] == "CEP"){
          ?>

          alert(" CEP não encontrado em nossa base de dados ou CEP inválido");

          <?php
          }
          ?> 
        


          $( "#btfinalizapeido" ).click(function() {
              

            if($("#idEndereco").val() == ""){

             alert("Preencher o campo endereço");

            }else if($("#idNumero").val() == ""){

              alert("Preencher o campo numero");

            }else if($("#idBairro").val() == ""){

              alert("Preencher o campo Bairro");

            }else if($("#idCidade").val() == ""){

              alert("Preencher o campo Cidade");

            }else if($("#idEstado").val() == ""){

              alert("Preencher o campo Estado");

            }else{ 
            
            $( "#finalizarpedido" ).submit();  

            }



                   

          });



          $( "#btcalcfrete" ).click(function() {
              
            if($("#cep").val() != ""){

              $( "#calcfrete" ).submit();

            }          

          });



          $( "#finalizarcomprar" ).click(function() {
              
            if($("#idfrete").val() != ""){
              
              $( "#formfinal" ).fadeIn( "slow" );

              $( "#finalizarcomprar" ).fadeOut( "slow" );

              $( "#continuarcomprando" ).fadeOut( "slow" );

              

            }else{


              alert("Calcule o prazo e valor do frete para continuar");

            }          
          });



            $('.inputnumber').keydown(function(event) {
                // Allow special chars + arrows 
                if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 
                    || event.keyCode == 27 || event.keyCode == 13 
                    || (event.keyCode == 65 && event.ctrlKey === true) 
                    || (event.keyCode >= 35 && event.keyCode <= 39)){
                        return;
                }else {
                    // If it's not a number stop the keypress
                    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                        event.preventDefault(); 
                    }   
                }
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
                <table align="center" width="1000" height="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF"> 
                    <tr>
                      <td><img src="<?php echo $this->base;?>/img/hotsite_SemLimites_loja_01.jpg"></td>
                    </tr>




                    <tr>
                      <td bgcolor="#FFFFFF">
                       <h2 style="margin-left: 20px;">Carrinho de resgates</h2> 

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

                        if($rsProdutos != 0){
                        ?> 



                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              
                            <td bgcolor="#FFFFFF">


                              <div style="font-family: &quot;Louis-Regular&quot;, serif; font-size: 14px;margin-top: 20px;margin-bottom: 300px;margin-left: 20px;">

                                  <table width="960px">
                                    <thead> 

                                  <tr bgcolor="#ebebeb" style="height: 30px;">
                                    <td style="padding: 10px;">Produto </td>

                                    <td style="padding: 10px;">Prazo de entrega</td> 
                                    <td style="padding: 10px;">Ponto Unitário</td>  
                                    <td style="padding: 10px;"></td>  
                                    
                                  </tr>                
                                  </thead>
                                  <tbody>

                                  <?php 

                                  $VALOR = 0; 

                                  //print_r($rsProdutos);


                                  foreach ($rsProdutos as $item) {
                                  ?>                                    
                                  

        
                                    <tr style="height: 30px; border-bottom: 1pt solid #ebebeb;">
                                      <td style="padding: 10px;" width="64%">
                                         <img src="<?php echo $item['produtos']['IMAGEM']; ?>" alt="<?php echo $item['produtos']['DESCRICAO']; ?>" width="10%" style="margin-right: 10px;"/>

                                         <a href="<?php echo $this->base;?>/campanhas/semlimiteslojaproduto/<?php echo $item['produtos']['id']; ?>" title="<?php echo $item['produtos']['DESCRICAO']; ?>">
                                          <?php echo $item['produtos']['DESCRICAO']; ?>
                                        </a>
                                      </td>

                                      <td style="padding: 10px;">

                                    <?php 
                                    if(isset($PrazoFrete) && $PrazoFrete !=''){
                                    ?> 
                                    
                                    até <?php echo $PrazoFrete; ?> dias úteis* 

                                    <?php 
                                    }
                                    ?>                                        

                                      </td>
                                      <td style="padding: 10px;"><?php echo $item['produtos']['VALOR_VENDA']; ?> </td>

                                    
                                      <td style="padding: 10px;"><a href="<?php echo $this->base;?>/campanhas/semlimitescarrinho?DELETAR=<?php echo $item['produtos']['id']; ?>">remover</a> </td> 
                                      

                                    </tr>            

                                  <?php

                                  $VALOR = $VALOR + $item['produtos']['VALOR_VENDA'];

                                  }                                  
                                  ?>        




                                    <?php 
                                    if(isset($Valor_FreteFrete) && $Valor_FreteFrete !=''){


                                      $VALOR = $VALOR + $Valor_FreteFrete;

                                    ?> 

                                    <tr style="height: 30px; border-bottom: 1pt solid #ebebeb;">
                                      <td style="padding: 10px;">

                                        Frete:
                                        <input type="hidden" name="idfrete" id="idfrete" value="<?php echo $Valor_FreteFrete;?>">


                                        
                                      </td>
                                      <td style="padding: 10px;"></td>

                                      <td style="padding: 10px;"> </td>
                                      <td style="padding: 10px;"><?php echo number_format($Valor_FreteFrete,2); ?> </td>


                                    </tr>   

                                    <?php
                                    }else{
                                    ?>

                                    <tr style="height: 30px; border-bottom: 1pt solid #ebebeb;">
                                      <td style="padding: 10px;">
                                        <div style="position: relative;">
                                          <input type="hidden" name="idfrete" id="idfrete"/>
                                            Digite o CEP para calcular o prazo e valor do frete deste produto:

                                          <form type="GET" style="position: absolute;top: -5px;right: 20px;" id="calcfrete">

                                            <input type="text" id="cep" name="FRETE" class="inputnumber" maxlength="8" style="width: 74px;">

                                            <button type="button" class="btn btn-small" style="margin-bottom: 12px;" id="btcalcfrete">calcular</button> 

                                          </form>  
                                       </div>

                                      </td>
                                      <td style="padding: 10px;"></td>

                                      <td style="padding: 10px;"> </td>
                                      <td style="padding: 10px;"> </td>


                                    </tr>  
                                    <?php
                                    }
                                    ?>





                                    <tr style="height: 30px; border-bottom: 1pt solid #ebebeb;">
                                      <td style="padding: 10px;">Total:</td>
                                      <td style="padding: 10px;"></td>
                                      <td style="padding: 10px;"> </td>
                                      <td style="padding: 10px;"><?php echo number_format($VALOR,2); ?> </td>



                                    </tr>           


                                  </tbody>
                                  </table>


                                    <p class="texto-destaque" style="float: right;margin-right: 20px;margin-top: 16px;">
                                      
                                        <a href="<?php echo $this->base;?>/campanhas/semlimitesloja">
                                          <button type="button" class="btn btn-success" style="font-size: 18px;width: 210px;height: 36px;" id="continuarcomprando">Continuar Resgatando</button>
                                        </a>

                                        <button type="button" class="btn btn-success" style="font-size:18px;width: 166px;height: 36px; background:#D93600;" id="finalizarcomprar">Finalizar Resgate</button>                                      
                                    </p>



                                    <div style="float: left;margin-right: 20px;margin-top: 32px;margin-bottom: 30px;display: none;" id="formfinal">
                                      
                                      <p style="margin-bottom: 24px;">Preencha os campos abaixo para finalizar o pedido</p>

                                      <form action="<?php echo $this->base;?>/campanhas/semlimitescarrinhofinalizar" id="finalizarpedido" method="POST"> 



                                        <?php 
                                        if(isset($Valor_FreteFrete) && $Valor_FreteFrete !=''){

                                        ?>
                                          
                                        <input type="hidden" name="valorfrete" id="valorfrete" value="<?php echo $Valor_FreteFrete;?>"> 
                                        <?php
                                        }
                                        ?> 

                                        <?php 
                                        if(isset($Chave_sessaoFrete) && $Chave_sessaoFrete != ""){
                                        ?>

                                          <input type="hidden" name="Chave_sessaoFrete" id="Chave_sessaoFrete" value="<?php echo $Chave_sessaoFrete;?>">


                                        <?php
                                        }
                                        ?>



                                        <?php 
                                        if(isset($cepFrete) && $cepFrete != ""){
                                        ?>

                                          <input type="hidden" name="cepFrete" id="cepFrete" value="<?php echo $cepFrete;?>">


                                        <?php
                                        }
                                        ?>                                        




                                        
                                        <table width="100%">
                                            <thead> 

                                          </thead>
                                          <tbody>
                                          <tr>



                                          
                                             <td style="width: 300px;">
                                                <div class="input text required">
                                                  <label for="UsuarioNome">Nome</label>
                                                  <input name="nome" class="m_nome" disabled="disabled" type="text" value="<?php echo $userinfo['nome']; ?>" id="UsuarioNome">
                                                </div> 
                                              </td>

                                            <td>
                                                <div class="input text">
                                                  <label for="UsuarioCpf">CPF</label>
                                                  <input name="showCPF" class="m_nome" type="text" value="<?php echo $userinfo['cpf']; ?>" disabled="">
                                                </div>
                                            </td>

                                          </tr>

                                          <tr> 
                                            <td style="width: 300px;">
                                               <div class="input text">
                                                  <label>CEP</label>

                                                  <?php 
                                                  if(isset($cepFrete) && $cepFrete != ""){
                                                  ?>

                                                    <input name="showbloqfrete" class="m_nome" type="text" value="<?php echo $cepFrete;?>" disabled=""/>


                                                  <?php
                                                  }
                                                  ?>     

                                                 
                                                </div>              
                                             </td> 

                                            <td>
            
                                            </td>

                                          </tr> 

                      

                                          <tr> 
                                            <td style="width: 300px;">
                                               <div class="input text">
                                                  <label for="UsuarioEndereco">Endereço</label>
                                                  <input name="endereco" class="m_nome" type="text" id="idEndereco" value="<?php echo $userinfo['endereco']; ?>">
                                                </div>              
                                             </td> 

                                            <td>
                                               <div class="input text">
                                                  <label for="UsuarioEndereco">Numero</label>
                                                  <input name="numero" class="m_nome" type="text" id="idNumero">
                                                </div>              
                                             </td>

                                          </tr> 

          

                                          <tr> 
                                            <td style="width: 300px;">
                                               <div class="input text">
                                                  <label for="UsuarioEndereco">Complemento</label>
                                                  <input name="complemento" class="m_nome" type="text" id="idComplemento">
                                                </div>              
                                             </td>

                                            <td>
                                               <div class="input text">
                                                  <label for="UsuarioEndereco">Bairro</label>
                                                  <input name="bairro" class="m_nome" type="text" id="idBairro">
                                                </div>              
                                             </td>

                                          </tr>




                                          <tr> 
                                            <td style="width: 300px;">
                                               <div class="input text">
                                                  <label for="UsuarioEndereco">Cidade</label>
                                                  <input name="cidade" class="m_nome" type="text" id="idCidade">
                                                </div>              
                                             </td>

                                            <td>
                                               <div class="input text">
                                                  <label for="UsuarioEndereco">Estado</label>
                                                  <select name="estado" id="idEstado"> 
                                                      <option value=""></option>
                                                      <option value="AC">Acre</option>
                                                      <option value="AL">Alagoas</option>
                                                      <option value="AM">Amazonas</option>
                                                      <option value="AP">Amapá</option>
                                                      <option value="BA">Bahia</option>
                                                      <option value="CE">Ceará</option>
                                                      <option value="DF">Distrito Federal</option>
                                                      <option value="ES">Espirito Santo</option>
                                                      <option value="GO">Goiás</option>
                                                      <option value="MA">Maranhão</option>
                                                      <option value="MG">Minas Gerais</option>
                                                      <option value="MS">Mato Grosso do Sul</option>
                                                      <option value="MT">Mato Grosso</option>
                                                      <option value="PA">Pará</option>
                                                      <option value="PB">Paraíba</option>
                                                      <option value="PE">Pernambuco</option>
                                                      <option value="PI">Piauí</option>
                                                      <option value="PR">Paraná</option>
                                                      <option value="RJ">Rio de Janeiro</option>
                                                      <option value="RN">Rio Grande do Norte</option>
                                                      <option value="RO">Rondônia</option>
                                                      <option value="RR">Roraima</option>
                                                      <option value="RS">Rio Grande do Sul</option>
                                                      <option value="SC">Santa Catarina</option>
                                                      <option value="SE">Sergipe</option>
                                                      <option value="SP">São Paulo</option>
                                                      <option value="TO">Tocantins</option>
                                                  </select>

                                                  
                                                </div>              
                                             </td>

                                          </tr> 




                                          <tr> 
                                            <td>
                                              <div class="submit">
                                                

                                                <button type="button" class="btn btn-success" id="btfinalizapeido">Finalizar resgate</button>

                                              </div>
                                            </td>
                                          </tr>

                                          </tbody> 
                                          </table>

                                      </form>

                                    </div>



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

                                <center>Nenhum item foi adicionado</center>

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