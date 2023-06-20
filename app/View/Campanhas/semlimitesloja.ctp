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

.texto-destaque{


  margin-bottom: 1px;
}

#contHome{

  font-family: Arial;
}
  </style> 
     


<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery/js/jquery-1.7.2.min.js"></script> 

    <script>


        //When DOM loaded we attach click event to button
        $(document).ready(function() {
            

          $('#ordernar').bind('change', function () { 


            $( "#formordenar" ).submit(); 

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

                                        <?php

                                        //GERAR MENU NOVO 


                                         /*
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">

                                          <?php 
                                          foreach ($menu as $key => $value) {                                        
                                          ?>                                      
                                          <li class="dropdown-submenu">
                                            <a tabindex="-1" href="<?php echo $this->base;?>/campanhas/semlimitesloja?C=<?php echo $value[0][0]; ?>"><?php echo $value[0][1]; ?></a>
                                            <ul class="dropdown-menu">
                                              <?php 
                                                foreach ($value as $value2) {
                                              ?>
                                                <li><a tabindex="-1" href="<?php echo $this->base;?>/campanhas/semlimitesloja?S=<?php echo $value2[2]; ?>"><?php echo $value2[3]; ?> </a></li>              
                                              <?php 
                                              }
                                              ?>

                                            </ul>
                                          </li>
                                          <li class="divider"></li>
                                          <?php
                                          }
                                          ?>
                                        </ul>
                                        

                                        */
                                        ?> 



                                      </div>
                            </td>


                              <td width="800" bgcolor="#FFFFFF" valign="top">   
                                <div id="contHome" style="width: 770px;height: 100%;position: relative; top: 40px; margin-left: 12px;">


      <div class="inner-left-container" style="margin-bottom: -6px;width: 100%;">
        <form type="GET" id="formordenar" action="<?php echo $this->base;?>/campanhas/semlimitesloja">

        <input type="hidden" name="C" value="<?php echo (isset($_GET['C']) ? $_GET['C'] : "");?>">


        <input type="hidden" name="S" value="<?php echo (isset($_GET['S']) ? $_GET['S'] : "");?>"> 
                    

        <span class="label" style="position: relative;top: -6px;">ordenar por:</span>
        <select class="select-box order" id="ordernar" name="ordernar" style="height: 30px;width: 130px;">
          <option <?php echo (isset($_GET['ordernar']) && $_GET['ordernar'] == "menor-preco" ? "selected" : "");?> value="menor-preco">menor preço</option>                          
          <option <?php echo (isset($_GET['ordernar']) && $_GET['ordernar'] == "maior-preco" ? "selected" : "");?> value="maior-preco">maior preço</option>
          <option <?php echo (isset($_GET['ordernar']) && $_GET['ordernar'] == "lancamento" ? "selected" : "");?> value="lancamento">lançamento</option>
        </select>


        </form>
        
      </div>

                                  <?php 
                                  if($breadum != "" && $breaddois != ""){
                                  ?>

                                    <ul class="breadcrumb">
                                      <li><a href="<?php echo $this->base;?>/campanhas/semlimitesloja?C=<?php echo $breadumcat; ?>"><?php echo $breadum;?></a> <span class="divider">/</span></li>
                                      <li class="active"><?php echo $breaddois; ?> </li>
                                    </ul> 

                                  <?php
                                  }
                                  ?>


                                  <?php 

                                  if(count($rsProdutos) == 0){
                                  ?>

                                  <p>
                                   <center>Nenhum produto disponível nessa categoria</center>
                                  </p> 
                                  
                                  <?php
                                  }
                                  ?>


                                  <?php 
                                  foreach ($rsProdutos as $produto) {
                                  ?>


                                  <div class="span4" style="float: left; width: 170px;height: 322px;"> 
                                    <div class="img-destaque" style="margin-bottom: 10px;">
                                        <a href="<?php echo $this->base;?>/campanhas/semlimiteslojaproduto/<?php echo $produto['Produto']['id']; ?>" title="<?php echo $produto['Produto']['DESCRICAO']; ?>">

                                        <img src="<?php echo $produto['Produto']['IMAGEM']; ?>" alt="<?php echo $produto['Produto']['DESCRICAO']; ?>">
                                        
                                        </a> 
                                    </div> 
                                    <span style="
                                        font-size: 14px;
                                        font-weight: bold;                                                                                                                      
                                    ">
                                    <a href="<?php echo $this->base;?>/campanhas/semlimiteslojaproduto/<?php echo $produto['Produto']['id']; ?>" title="<?php echo $produto['Produto']['DESCRICAO']; ?>" style="color: #000;font-weight: 100;">
                                      <?php echo $produto['Produto']['DESCRICAO']; ?>
                                    </a>
                                    </span>                                    
                                  
                                    

                                    <p class="texto-destaque"><?php echo $produto['Produto']['REFERENCIA']; ?> </p>                                    
                                    <p class="texto-destaque">Marca : <?php echo $produto['Produto']['MARCA']; ?> </p>
                                    <p class="texto-destaque">
                                      <a href="<?php echo $this->base;?>/campanhas/semlimiteslojaproduto/<?php echo $produto['Produto']['id']; ?>" style="font-weight: bold;">Pontos : <?php echo $produto['Produto']['VALOR_VENDA']; ?></a>
                                    </p>
                                    


                                </div>  

                                  


                                  <?php
                                  }
                                  ?>




                                </div>

                                <?php 

                                if(count($rsProdutos) >= 20){
                                ?>


                                  <div class="pagination" style="float: right;margin-right: 28px;margin-top: 60px;"> 
                                    <ul>
                                      <?php 
                                        echo $this->Paginator->prev('«', array('tag' => 'li'), null, array('class' => 'prev disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                                        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
                                        echo $this->Paginator->next('»', array('tag' => 'li'), null, array('class' => 'next disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                                        ?>
                                    </ul>
                                  </div> 

                                <?php
                                }
                                ?>


                              </td> 
                            </tr>
                          </table>
                      </td>
                    </tr>


                    
                  </table>

              </div>
            </div>


            <?php echo $this->element('/site/bottom'); ?>

<?php echo $this->element('sql_dump'); ?>

    </body>
</html>