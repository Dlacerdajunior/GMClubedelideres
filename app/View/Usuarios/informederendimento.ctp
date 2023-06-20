        <div class="container" style="margin-top: 54px; min-height: 480px; padding:15px;">
            <h3>Informe de Rendimento</h3>
            
            <p>&nbsp;</p>



              <?php 

              if($link == 1){
              ?>


              <p>
                Informe de rendimento não encontrado.
              </p> 

              <?php
              }else{
              ?>

                <table style="border: 1px solid #ABAFB4; background: #EDEDED;" width="40%" border="0" cellspacing="0" cellpadding="10" align="center">
                <tbody>
                <tr>
                <td> 
                  
                  <p style="text-align: center;">
                    <a style="text-decoration: none;" href="<?php echo $link; ?>" target="_blank">
                      Clique para ver o informe de rendimento
                    </a> 
                  </p>
                </td>
                </tr>
                </tbody>
                </table>


              <?php
              }
              ?>

        </div><!-- /container -->