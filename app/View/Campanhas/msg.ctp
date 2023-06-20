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
                       <h2 style="text-align: center;" style="font-size: 18px;"><?php echo $msg; ?></h2> 
                     </td> 
                    </tr>

                    <tr>
                      <td bgcolor="#FFFFFF">

    
                                        <p>&nbsp;</p>

                                        <center>
                                        <a href="<?php echo $this->base;?>/campanhas/semlimitesloja">
                                          <button type="button" class="btn btn-success" style="font-size: 22px;width: 244px;height: 36px;">Voltar</button>
                                        </a> 
                                        </center>

                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>


                     </td>
                    </tr>

                  
                    
                  </table>

              </div>
            </div>


            <?php echo $this->element('/site/bottom'); ?>


    </body>
</html>