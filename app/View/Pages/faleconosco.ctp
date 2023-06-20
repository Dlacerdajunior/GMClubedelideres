        <div class="container" style="margin-top: 54px; min-height: 480px; padding:15px;">
            <h3>Fale Conosco</h3>
              
            <p>Para tirar suas dúvidas, você pode entrar em contato através do telefone 0800 772-2866.</p>

            <p>
              Caso não tenha sanado suas dúvidas na seção “Perguntas Frequentes”, preencha o formulário abaixo que teremos prazer em ajudá-lo.
            </p> 
            <p>&nbsp;</p>


          <p style="float: right;margin-right: 46px;">
            <!-- mibew button -->
            <a href="http://clubedelideres2013.mc1.com.br/chatclube/client.php?locale=pt-br" target="_blank" onclick="if(navigator.userAgent.toLowerCase().indexOf('opera') != -1 &amp;&amp; window.event.preventDefault) window.event.preventDefault();this.newWindow = window.open('http://clubedelideres2013.mc1.com.br/chatclube/client.php?locale=pt-br&amp;name=<?php echo $this->Session->read('Usuario.Usuario.nome'); ?>&amp;email=<?php echo $this->Session->read('Usuario.Usuario.email'); ?>&amp;url='+escape(document.location.href)+'&amp;referrer='+escape(document.referrer), 'webim', 'toolbar=0,scrollbars=0,location=0,status=1,menubar=0,width=640,height=480,resizable=1');this.newWindow.focus();this.newWindow.opener=window;return false;"><img src="http://clubedelideres2013.mc1.com.br/chatclube/b.php?i=webim&amp;lang=pt-br" border="0" width="163" height="61" alt=""/></a><!-- / mibew button -->
          </p>    
            

            <?php 
            if($msg != ""){
            ?>
              <font color="green"><?php echo $msg;?></font>
            <?php
            }else{
            ?>

            <?php echo $this->Form->create('faleconosco'); ?>
            <table width="40%">
              <thead> 
            </thead>
            <tbody>
            <tr>
              <td><b>Nome : </b></td>
              <td><input type="text" name="nome" value="<?php echo $this->Session->read('Usuario.Usuario.nome'); ?>"/></td>
            </tr>
            <tr>
              <td><b>E-mail : </b></td>
              <td><input type="text" name="email" value="<?php echo $this->Session->read('Usuario.Usuario.email'); ?>"/></td>
            </tr>

            <tr>
              <td><b>Assunto : </b></td>
              <td>
                <select name="assunto">
                  <option value="Dúvidas Gerais">Dúvidas Gerais</option>
                  <option value="Dúvidas sobre Campanhas">Dúvidas sobre Campanhas</option>
                  <option value="Ranking">Ranking</option>
                </select>
              </td>
            </tr>

            <tr>
              <td><b>Menssagem : </b></td>
              <td><textarea name="menssagem"></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td><?php echo $this->Form->submit('enviar'); ?></td>
            </tr>
            </tbody>
            </table>   
            <?php echo $this->Form->end();?>
            
            <?php
            }
            ?>



        </div><!-- /container -->