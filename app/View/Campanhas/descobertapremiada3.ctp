    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/descoberta-premiada/descoberta.css">


  <style>
    .content_3{height: 240px;width: 100%;}
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
                <table border="0" cellpadding="0" cellspacing="0">
                  <tr>
                   <td colspan="5">
                    <img name="hotsite_DescPortugal_alterado_r1_c1" src="<?php echo $this->base;?>/descoberta-premiada/images/hotsite_DescPortugal_alterado_r1_c1.jpg" width="1000" height="359" id="hotsite_DescPortugal_alterado_r1_c1" alt="" />
                    </td>
                  </tr>
                  <tr>
                   <td width="97">
                    <?php 
                    if($tipo == "descricao"){
                    ?>
                    <img src="<?php echo $this->base;?>/descoberta-premiada/images/home-over.jpg"/>
                    <?php    
                    }else{
                    ?>    
                    <a href="<?php echo $this->base;?>/campanhas/descobertapremiada3/" class="bthome"></a>
                    <?php
                    }
                    ?>
                    </td>
                   <td width="126">

                    <?php 
                    if($tipo == "regulamento"){
                    ?>
                    <img src="<?php echo $this->base;?>/descoberta-premiada/images/regulamento-over.jpg">
                    <?php    
                    }else{
                    ?>    
                    <a href="<?php echo $this->base;?>/campanhas/descobertapremiada3/regulamento" class="btregulamento"></a>
                    <?php
                    }
                    ?>
                    </td>
                   <td>
                    <img name="hotsite_DescPortugal_alterado_r2_c3" src="<?php echo $this->base;?>/descoberta-premiada/images/hotsite_DescPortugal_alterado_r2_c3.jpg" width="566" height="50" id="hotsite_DescPortugal_alterado_r2_c3" alt="" />
                    </td>
                   <td>
                    <?php 
                    if($tipo == "ranking"){
                    ?>
                   <img src="<?php echo $this->base;?>/descoberta-premiada/images/ranking-over.jpg">
                    <?php    
                    }else{
                    ?>    
                   <a href="<?php echo $this->base;?>/campanhas/descobertapremiada3/ranking" class="btranking"></a>
                    <?php
                    }
                    ?>
                    </td>
                   <td>
                    

                    <?php 
                    if($tipo == "premiacao"){
                    ?>
                    <img src="<?php echo $this->base;?>/descoberta-premiada/images/premiacao-over.jpg">
                    <?php    
                    }else{
                    ?>    
                   <a href="<?php echo $this->base;?>/campanhas/descobertapremiada3/premiacao" class="btpremiacao"></a>
                    <?php
                    }
                    ?>
                    </td>
                  </tr>
                  <tr>
                   <td colspan="5"><img name="hotsite_DescPortugal_alterado_r3_c1" src="<?php echo $this->base;?>/descoberta-premiada/images/hotsite_DescPortugal_alterado_r3_c1.jpg" width="1000" height="43" id="hotsite_DescPortugal_alterado_r3_c1" alt="" /></td>
                  </tr>
                  <tr>
                   <td colspan="5"> 
                    <div class="textocamp content_3 content"> 
                    <center> 
                    <?php
                        echo $HmltText;
                    ?>
                    </center>
                    <br>&nbsp;
                    
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