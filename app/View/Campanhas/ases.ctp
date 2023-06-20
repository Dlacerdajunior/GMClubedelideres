    <?php echo $this->element('/site/top'); ?>

    <link href="<?php echo $this->base;?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo $this->base;?>/asesnovo/ases.css">


  <style>
    .content_3{height: 154px;width: 910px;}

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

    #contHome{
      height: 170px;
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
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="1000">

                  <tr>
                   <td colspan="4"><img name="index_r1_c1" src="<?php echo $this->base;?>/asesnovo/images/index_r1_c1.jpg" width="1000" height="361" id="index_r1_c1" alt="" /></td>
                  </tr>
                  <tr>
                   <td colspan="2"><img name="index_r2_c1" src="<?php echo $this->base;?>/asesnovo/images/index_r2_c1.jpg" width="429" height="190" id="index_r2_c1" alt="" /></td>
                   <td rowspan="6" style="width:558px; height:352px; background:url(<?php echo $this->base;?>/asesnovo/images/index_r2_c3.jpg);">
                   <div id="contHome" class="content_3">
                    <?php
                        echo $HmltText;
                    ?> 
                   </div>
                   </td>
                   <td rowspan="6"><img name="index_r2_c4" src="<?php echo $this->base;?>/asesnovo/images/index_r2_c4.jpg" width="13" height="352" id="index_r2_c4" alt="" /></td>
                  </tr>
                  <tr>
                   <td>
                        <?php
                        if($tipo == "descricao"){
                        ?>
                         <img name="home" src="<?php echo $this->base;?>/asesnovo/images/home-over.jpg" width="205" height="34" id="home" alt="" />
                        <?php    
                        }else{
                        ?>    
                        <a href="<?php echo $this->base;?>/campanhas/ases/" class="bthome"></a>
                        <?php
                        }
                        ?> 


                   </td>

                   <td rowspan="5">
                    <img name="index_r3_c2" src="<?php echo $this->base;?>/asesnovo/images/index_r3_c2.jpg" width="224" height="162" id="index_r3_c2" alt="" />
                  </td>
                  </tr>
                  <tr>
                   <td>
                        <?php 
                        if($tipo == "regulamento"){
                        ?>
                        <img src="<?php echo $this->base;?>/asesnovo/images/regulamento-over.jpg" width="205" height="31"alt="" />
                        
                        
                        <?php    
                        }else{
                        ?>    
                        <a href="<?php echo $this->base;?>/campanhas/ases/regulamento" class="btregulamento"></a>
                        <?php
                        }
                        ?>
                  </td>
                  </tr>
                  <tr>
                   <td>
                    
                        <?php 
                        if($tipo == "ranking"){
                        ?>
                        <img src="<?php echo $this->base;?>/asesnovo/images/ranking-over.jpg" width="205" height="34"alt="" />
                       
                        <?php    
                        }else{
                        ?>    
                       <a href="<?php echo $this->base;?>/campanhas/ases/ranking" class="btranking"></a>
                        <?php
                        }
                        ?> 
                  </td>
                  </tr>
                  <tr>
                   <td>

                        <?php 
                        if($tipo == "premiacao"){
                        ?>
                        <img src="<?php echo $this->base;?>/asesnovo/images/premiacao-over.jpg" width="205" height="33"alt="" />
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
                   <td>
                    <img name="index_r7_c1" src="<?php echo $this->base;?>/asesnovo/images/index_r7_c1.jpg" width="205" height="30" id="index_r7_c1" alt="" />

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