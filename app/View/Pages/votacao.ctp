        <div class="container" style="margin-top: 54px; min-height: 480px; padding:15px;">
            <h3>Votação</h3>
              
            <!-- <p>Lorem ipsum </p> -->

            <img src="<?php echo $this->base;?>/img/chamada_votacao.jpg"> 



            <?php 
            if($msg != ""){
            ?>
              <p>
                &nbsp;
              </p>
              
              <p>
              <font color="#518DED" style="font-size: 16px;"><?php echo $msg;?></font>
              </p>

            <?php
            }else{
            ?> 

            <?php echo $this->Form->create('votacao'); ?>
            <table width="40%">
              <thead> 
            </thead>
            <tbody>

            <tr height="38px">

              <td><input type="radio" name="nome" value="1" style="margin-top: -2px;margin-right: 4px;"/> <b>Barcelona + Marrakesh</b></td>
            </tr>

            <tr height="38px">

              <td><input type="radio" name="nome" value="2" style="margin-top: -2px;margin-right: 4px;"/> <b>Moscou + São Petersburgo</b></td>
            </tr>

            <tr height="38px">

              <td><input type="radio" name="nome" value="3" style="margin-top: -2px;margin-right: 4px;"/> <b>Milão + Turim</b></td>
            </tr>


             <tr height="38px">
            
              <td><?php echo $this->Form->submit('enviar'); ?></td>
            </tr>
            </tbody>
            </table>   
            <?php echo $this->Form->end();?>
            
            <?php
            }
            ?>



        </div><!-- /container -->