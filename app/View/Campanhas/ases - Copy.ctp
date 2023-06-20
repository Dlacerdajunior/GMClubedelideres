    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/ases/ases.css">


  <style>
    .content_3{height: 240px;width: 910px;}
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
                    <!-- fwtable fwsrc="hotsite_ASES.fw.png" fwpage="Page 1" fwbase="hotsite_ASES.jpg" fwstyle="Dreamweaver" fwdocid = "1571954042" fwnested="0" -->
                      <tr>
                       <td colspan="5"><img name="hotsite_ASES_r1_c1" src="<?php echo $this->base;?>/ases/images/hotsite_ASES_r1_c1.jpg" width="1000" height="338" id="hotsite_ASES_r1_c1" alt="" /></td>
                      </tr>
                      <tr>
                       <td rowspan="2"><img name="hotsite_ASES_r2_c1" src="<?php echo $this->base;?>/ases/images/hotsite_ASES_r2_c1.jpg" width="137" height="76" id="hotsite_ASES_r2_c1" alt="" /></td>
                       <td>
                        <?php
                        if($tipo == "descricao"){
                        ?>
                        <img src="<?php echo $this->base;?>/ases/images/home-over.jpg"/>
                        <?php    
                        }else{
                        ?>    
                        <a href="<?php echo $this->base;?>/campanhas/ases/" class="bthome"></a>
                        <?php
                        }
                        ?>
                      </td>
                       <td rowspan="2"><img name="hotsite_ASES_r2_c3" src="<?php echo $this->base;?>/ases/images/hotsite_ASES_r2_c3.jpg" width="422" height="76" id="hotsite_ASES_r2_c3" alt="" /></td>

                       <td>
                        <?php 
                        if($tipo == "ranking"){
                        ?>
                       <img src="<?php echo $this->base;?>/ases/images/ranking-over.jpg">
                        <?php    
                        }else{
                        ?>    
                       <a href="<?php echo $this->base;?>/campanhas/ases/ranking" class="btranking"></a>
                        <?php
                        }
                        ?>
                      </td>
                       
                       <td rowspan="2"><img name="hotsite_ASES_r2_c5" src="<?php echo $this->base;?>/ases/images/hotsite_ASES_r2_c5.jpg" width="133" height="76" id="hotsite_ASES_r2_c5" alt="" /></td>
                      </tr>
                      <tr>
                       <td>
                        <?php 
                        if($tipo == "regulamento"){
                        ?>
                        <img src="<?php echo $this->base;?>/ases/images/regulamento-over.jpg">
                        <?php    
                        }else{
                        ?>    
                        <a href="<?php echo $this->base;?>/campanhas/ases/regulamento" class="btregulamento"></a>
                        <?php
                        }
                        ?>
                      </td>
                       <td>
                        <?php 
                        if($tipo == "premiacao"){
                        ?>
                        <img src="<?php echo $this->base;?>/ases/images/premiacao-over.jpg">
                        <?php    
                        }else{
                        ?>    
                       <a href="<?php echo $this->base;?>/campanhas/ases/premiacao" class="btpremiacao"></a>
                        <?php
                        }
                        ?>
                      </td> 
                      </tr>
                      <tr>
                       <td colspan="5"><img name="hotsite_ASES_r4_c1" src="<?php echo $this->base;?>/ases/images/hotsite_ASES_r4_c1.jpg" width="1000" height="100" id="hotsite_ASES_r4_c1" alt="" /></td>
                      </tr>
                      <tr>
                       <td colspan="5" align="center">
                            <div class="textocamp content_3 content">
                              <center> 
                                <?php
                                    echo $HmltText;
                                ?> 
                              </center>
                            </div>
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