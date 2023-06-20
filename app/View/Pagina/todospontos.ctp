        <div class="container" style="margin-top: 54px; min-height: 480px; padding:15px;">
            <h3>Todos os ganhadores</h3> 
            
            <p style='font-family: "Louis-Regular", serif; font-size: 16px;'>

              <?php 
              if(isset($tiporanking) && $tiporanking == 1){
              ?>

              Sem Limites - Apuração (Fevereiro de 2014)

              <?php
              }
              ?>
              

              <?php 
              if(isset($tiporanking) && $tiporanking == 5){
              ?>

              Sem Limites - Apuração (Março  de 2014)
              
              <?php
              }
              ?>              

            </p>
            
            <div style='font-family: "Louis-Regular", serif; font-size: 16px;margin-top: 20px;'>

              <table width="90%" border="1" BORDERCOLOR="#ebebeb">
                <thead> 

              <tr bgcolor="#ebebeb" style="height: 30px;">
                <td style="padding: 10px;">Região </td>
                <td style="padding: 10px;">Cód. Concessionária</td>
                <td style="padding: 10px;">Nome Concessionária</td> 
                <td style="padding: 10px;">Nome Participante</td> 
                <td style="padding: 10px;">Cargo</td>
              </tr>                
              </thead>
              <tbody>

              <?php 

              foreach ($rsPremiados as $premiado) {  

                         
                ?>
                
              <tr style="height: 30px;">
                <td style="padding: 10px;"><?php echo $premiado['premi']['regiao']; ?></td>
                <td style="padding: 10px;"><?php echo $premiado['premi']['cod']; ?></td>
                <td style="padding: 10px;"><?php echo $premiado['premi']['concessionaria']; ?></td>
                <td style="padding: 10px;"><?php echo $premiado['premi']['nome']; ?></td>
                <td style="padding: 10px;"><?php echo $premiado['premi']['funcao']; ?></td>

              </tr>


              <?php }




               ?>


              </tbody>
              </table>

            </div> 



        </div><!-- /container -->