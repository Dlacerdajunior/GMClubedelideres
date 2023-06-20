

        <!--Quick Actions-->
        <div id="quick_actions">
            <a class="button_big" href="<?php echo $this->base;?>/admin/loja/compras" id="btn-salvar" >
            Voltar
            </a>
        </div>
        
        <div class="one_wrap fl_left">
                <div class="widget">
                    <div class="widget_title"><span class="iconsweet">r</span><h5>Detalhe do Pedido</h5></div>
                    <div class="widget_body">      

                        <form class="frm-03" id="frm-editar" method="post">
                        <ul class="form_fields_container"> 


                                            <li>
                                            <label for="titulo">Informação do Pedido : </label>
                                            <div class="form_input">
                                               
                                                <label style="font-weight: bold;">Chave Sessao : </label> <?php echo $pedido[0]['cp']['Chave_sessaoPedido']; ?> 
                                                <br/>
                                                <label style="font-weight: bold;">ID Pedido :</label> <?php echo $pedido[0]['cp']['PedidoPedido']; ?>
                                                <br/>
                                                <label style="font-weight: bold;">Valor Pedido :</label> <?php echo number_format($pedido[0]['cp']['Valor_ReaisPedido'], 2, '.', ''); ?> 
                                                <br/>
                                                <label style="font-weight: bold;">CEP : </label> <?php echo $pedido[0]['cp']['CEPPedido']; ?> 
                                                <br/>

                                                <label style="font-weight: bold;">Endereço : </label> <?php echo $pedido[0]['cp']['EnderecoPedido']; ?>
                                                <br/>

                                                <label style="font-weight: bold;">Número : </label> <?php echo $pedido[0]['cp']['NumeroPedido']; ?> 
                                                <br/>
                                                <label style="font-weight: bold;">Complemento : </label> <?php echo $pedido[0]['cp']['ComplementoPedido']; ?>  
                                                <br/>
                                                <label style="font-weight: bold;">Bairro : </label> <?php echo $pedido[0]['cp']['BairroPedido']; ?> 
                                                <br/>
                                                <label style="font-weight: bold;">Cidade : </label> <?php echo $pedido[0]['cp']['CidadePedido']; ?>  
                                                <br/>
                                                <label style="font-weight: bold;">Estado : </label> <?php echo $pedido[0]['cp']['EstadoPedido']; ?>   
                                                <br/>

                                                <label style="font-weight: bold;">Valor Frete : </label> <?php echo number_format($pedido[0]['cp']['Valor_Frete_MoedaPedido'], 2, '.', ''); ?>
                                                <br/> 


                                                <label style="font-weight: bold;">Data Compra : </label> <?php echo date("d/m/Y", strtotime($pedido[0]['cp']['created'])); ?> 
                                                <br/>



                                                <label style="font-weight: bold;">Mensagem retorno pedido : </label> <?php echo $pedido[0]['cp']['MensagemPedido']; ?>   
                                                <br/>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                                            </div>
                                            </li> 



                                            <li>
                                            <label for="titulo">Produtos do Pedido: </label> 
                                            <div class="form_input">
                                               

                                              <table>
                                                <thead> 

                                              <tr bgcolor="#ebebeb" style="height: 30px;">
                                                <td style="padding: 10px;">Produto </td>

                                                <td style="padding: 10px;"></td> 
                                                <td style="padding: 10px;">Preço Unitário</td>  
                                                <td style="padding: 10px;">Data da compra</td>  
                                                
                                              </tr>                
                                              </thead>
                                              <tbody>
                                                
                                              <?php 
                                              foreach ($produtos as $item) {                                   
                                              ?>                                    
                                              
                    
                                                <tr style="height: 30px; border-bottom: 1pt solid #ebebeb;">
                                                  <td style="padding: 10px;" width="64%">
                                                    <img src="<?php echo $item['pt']['IMAGEM']; ?>" alt="<?php echo $item['pt']['DESCRICAO']; ?>" width="10%" style="margin-right: 10px;"/>                                    
                                                      <?php echo $item['pt']['DESCRICAO']; ?>
                                                  </td>
             
                                                  <td style="padding: 10px;"> 

                                                                  

                                                  </td>
                                                  <td style="padding: 10px;"><?php echo $item['cp']['valor_moeda_produtoproduto']; ?> </td> 

                                                  
                                                  <td style="padding: 10px;">
                                                    <?php echo date("d/m/Y", strtotime($item['cp']['created'])); ?>
                                                  </td> 
                                                  

                                                </tr>    





                                              <?php

                                              }                                  
                                              ?>    

                                              </tbody>
                                              </table>



                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                                            </div>
                                            </li> 



                                        <li>
                                            <label for="titulo">Informação do Comprador : </label>
                                            <div class="form_input">
                                               
                                                <label style="font-weight: bold;">Nome : </label> <?php echo $pedido[0]['us']['nome']; ?> 
                                                <br/>


                                                <label style="font-weight: bold;">CPF : </label> <?php echo $pedido[0]['us']['cpf']; ?> 
                                                <br/>

                                                <label style="font-weight: bold;">RG : </label> <?php echo $pedido[0]['us']['rg']; ?> 
                                                <br/>


                                                <label style="font-weight: bold;">Região : </label> <?php echo $pedido[0]['us']['regiao']; ?> 
                                                <br/>

                                                <label style="font-weight: bold;">Código Dominio : </label> <?php echo $pedido[0]['us']['codigo_dominio']; ?> 
                                                <br/>                                                

                                                <label style="font-weight: bold;">Nome Dominio : </label> <?php echo $pedido[0]['us']['nome_dominio']; ?> 
                                                <br/>  
                                                              
                                                <label style="font-weight: bold;">E-mail : </label> <?php echo $pedido[0]['us']['email']; ?> 
                                                <br/>  

                                                <label style="font-weight: bold;">Data Nascimento : </label> <?php echo $pedido[0]['us']['data_nascimento']; ?> 
                                                <br/>  

                                                <label style="font-weight: bold;">Código Função cadv : </label> <?php echo $pedido[0]['us']['codigo_funcao_cadv']; ?> 
                                                <br/>  

                                                <label style="font-weight: bold;">Nome Função Cadv: </label> <?php echo $pedido[0]['us']['nome_funcao_cadv']; ?>  
                                                <br/>  


                                            </div>
                                            </li> 





                        </ul>
                        </form>

                    </div>

                </div>
        </div>