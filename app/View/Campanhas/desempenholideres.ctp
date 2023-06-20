    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/desempenho-lideres/desempenho.css">


  <style> 
    .content_3{height: 240px;width: 100%;}
    .content_3 .mCSB_scrollTools .mCSB_draggerRail {
    width: 0;
    border-right: 1px solid #fff;
    }

    .content_3 .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
    background: #FFF;
    }

    .mCSB_scrollTools .mCSB_draggerRail{

      background: none;
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
                    <table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="1000">
                    <!-- fwtable fwsrc="desempenho.png" fwpage="Page 1" fwbase="desempenho.jpg" fwstyle="Dreamweaver" fwdocid = "1821077415" fwnested="0" -->
                      <tr>
                       <td colspan="6"><img name="desempenho_r1_c1" src="<?php echo $this->base;?>/desempenho-lideres/images/desempenho_r1_c1.jpg" width="1000" height="310" id="desempenho_r1_c1" alt="" /></td>
                      </tr>
                      <tr>
                       <td rowspan="3"><img name="desempenho_r2_c1" src="<?php echo $this->base;?>/desempenho-lideres/images/desempenho_r2_c1.jpg" width="208" height="403" id="desempenho_r2_c1" alt="" /></td>
                       <td colspan="4" valign="top" style="background:url(<?php echo $this->base;?>/desempenho-lideres/images/desempenho_r2_c2.jpg) no-repeat; width:590px; height:246px;">
                        
                        <div id="conteudodesempenho" class="content_3 content">
                          <?php echo $HmltText; ?>
                        </div>

                       </td>
                       <td rowspan="3"><img name="desempenho_r2_c6" src="<?php echo $this->base;?>/desempenho-lideres/images/desempenho_r2_c6.jpg" width="202" height="403" id="desempenho_r2_c6" alt="" /></td>
                      </tr> 

                      <tr>
                       <td>
                       
                        <?php 
                        if($tipo == "descricao"){
                        ?>
                         <img src="<?php echo $this->base;?>/desempenho-lideres/images/home-over.jpg">
                        <?php    
                        }else{
                        ?>
                        <a href="<?php echo $this->base;?>/campanhas/desempenholideres" class="bthome">    
                        <?php
                        }
                        ?>
                      </td>
                       <td>
                        <?php 
                        if($tipo == "regulamento"){
                        ?>
                        <img src="<?php echo $this->base;?>/desempenho-lideres/images/regulamento-over.jpg">
                        <?php    
                        }else{
                        ?>    
                        <a href="<?php echo $this->base;?>/campanhas/desempenholideres/regulamento" class="btregulamento"></a>
                        <?php
                        }
                        ?>
                      </td>
                       <td>
                      <?php 
                      if($tipo == "premiacao"){
                      ?>
                      <img src="<?php echo $this->base;?>/desempenho-lideres/images/premiacao-over.jpg" >
                      <?php    
                      }else{
                      ?>    
                      <a href="<?php echo $this->base;?>/campanhas/desempenholideres/premiacao" class="btpremiacao"></a>
                      <?php
                      }
                      ?> 
                        
                      </td>
                       <td rowspan="2"><img name="desempenho_r3_c5" src="<?php echo $this->base;?>/desempenho-lideres/images/desempenho_r3_c5.jpg" width="315" height="157" id="desempenho_r3_c5" alt="" /></td>
                      </tr>
                      
                      <tr>
                       <td colspan="3"><img name="desempenho_r4_c2" src="<?php echo $this->base;?>/desempenho-lideres/images/desempenho_r4_c2.jpg" width="275" height="108" id="desempenho_r4_c2" alt="" /></td>
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