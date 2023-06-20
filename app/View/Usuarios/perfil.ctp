        <?php echo $this->Form->create('perfil'); ?>
        <div class="container" style="margin-top: 54px; min-height: 480px; padding:15px;">
            <h3>Perfil</h3>
           

            <?php if(isset($erro)){ ?> 
            <p>
              <?php echo $erro; ?>
            </p>
            <?php } ?>

            <table width="30%">
              <thead> 

            </thead>
            <tbody>
            <tr>
              <?php 
                echo $this->Form->hidden('Usuario.id');
              ?>
              <td>
                <?php echo $this->Form->input("Usuario.nome", array('type'=>'text', 'label' => 'Nome', 'class'=>'m_nome','disabled' =>true)); ?>
              </td>
            </tr>

            <tr>
              <td>
                  <?php echo $this->Form->input("Usuario.email", array('type'=>'text', 'label' => 'E-Mail', 'class'=>'m_nome"')); ?>
              </td>
            </tr> 

            <tr>
              <td>
                  <div class="input text">
                    <label for="UsuarioCpf">CPF</label>
                    <input name="showCPF" class="m_nome" type="text" value="<?php echo (isset($this->data['Usuario']['cpf']) ? $this->data['Usuario']['cpf'] : '' ) ?>" disabled >
                  </div>
              </td>
            </tr>

            <tr>
              <td>
                  <?php echo $this->Form->input("Usuario.nome_funcao_cadv", array('type'=>'text', 'label' => 'Cargo', 'class'=>'m_nome', 'disabled' =>true)); ?> 
              </td> 
            </tr> 

            <tr>
              <td>
                  <?php echo $this->Form->input("Usuario.rg", array('type'=>'text', 'label' => 'RG', 'class'=>'m_nome', 'disabled' =>true)); ?>
              </td> 
            </tr>  


            <tr> 
              <td>
                 <?php echo $this->Form->input("Usuario.nome_dominio", array('type'=>'text', 'label' => 'Concessionária', 'class'=>'m_nome','disabled' => true)); ?>
              </td>
            </tr> 

            <tr> 
              <td>
                 <?php echo $this->Form->input("Usuario.celular", array('type'=>'text', 'label' => 'Telefone', 'class'=>'m_nome')); ?>
              </td> 
            </tr> 

            <tr> 
              <td>
                 <?php echo $this->Form->input("Usuario.endereco", array('type'=>'text', 'label' => 'Endereços', 'class'=>'m_nome')); ?>
              </td>
            </tr>  

            <tr> 
              <td>
                <?php echo $this->Form->submit('salvar'); ?>
              </td>
            </tr>  
            </tbody> 
            </table>   


        </div><!-- /container -->

        

<?php echo $this->Form->end();?> 