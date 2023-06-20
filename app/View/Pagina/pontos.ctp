        <div class="container" style="margin-top: 54px; min-height: 480px; padding:15px;">
            <h3>Meus Pontos</h3>
            

            <div style='font-family: "Louis-Regular", serif; font-size: 16px;margin-top: 20px;'>

              <table width="90%" border="1" BORDERCOLOR="#ebebeb">
                <thead> 

              <tr bgcolor="#ebebeb" style="height: 30px;">
                <td style="padding: 10px;font-size: 18px;">Campanha: Sem Limites </td>
                <td></td>
                <td></td>
              </tr>                
              </thead>
              <tbody>
              <tr style="height: 30px;">
                <td style="padding: 10px;">Apuração (Fevereiro de 2014)</td>
                <td style="padding: 10px;"><?php if($pontos != 0){ echo number_format($pontos,0)." pontos"; }else{ echo 0;  } ?> </td>
                <td style="padding: 10px;"><a href="<?php echo $this->base;?>/pagina/todospontos">ver todos os ganhadores</a></td>
              </tr>

              </tbody>
              </table>

            </div>



            <div style='font-family: "Louis-Regular", serif; font-size: 16px;margin-top: 50px;'>
              <table width="90%" >
                <thead> 

              <tr style="height: 30px;" >
                <td style="padding: 10px;font-size: 18px;" border="0">Extrato de Pontos </td>
              </tr> 

              <tr  style="height: 30px; border-bottom: 1pt solid #ebebeb;">
                <td width="24%"  style="padding: 10px;">Total de Pontos</td>
                <td style="padding: 10px;"><?php echo number_format($pontos,0); ?></td>
              </tr>

              <tr style="height: 30px;  border-bottom: 1pt solid #ebebeb;">
                <td  style="padding: 10px;">Utilizados</td>
                 <td style="padding: 10px;">0</td>  
              </tr>

              <tr style="height: 30px;  border-bottom: 1pt solid #ebebeb;">
                <td  style="padding: 10px;color:#00b359;">Saldo</td>      
                <td style="padding: 10px;color:#00b359;"><?php echo number_format($pontos,0); ?></td>           
              </tr>           

              </thead>
              <tbody>


              </tbody>
              </table> 

            </div>


        </div><!-- /container -->