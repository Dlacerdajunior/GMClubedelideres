        <?php echo $this->Form->create('contenplados'); ?>
        <div class="container" style="margin-top: 54px; min-height: 480px; padding:15px;">

            <h5>Se você foi contemplado na campanha Desempenho de Líderes preencha aqui os dados para entrega do Ipad.</h5>
            
            <h3>Cadastrante</h3>
           

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
                  <?php echo $this->Form->input("Usuario.nome_funcao_cadv", array('type'=>'text', 'label' => 'Cargo', 'class'=>'m_nome', 'disabled' =>true)); ?> 
              </td> 
            </tr> 

            <tr>
              <td>
                  <?php echo $this->Form->input("Usuario.codigo_dominio", array('type'=>'text', 'label' => 'Código Concessionária', 'class'=>'m_nome', 'disabled' =>true)); ?> 
              </td> 
            </tr>   

            <tr> 
              <td>
                 <?php echo $this->Form->input("Usuario.nome_dominio", array('type'=>'text', 'label' => 'Concessionária', 'class'=>'m_nome','disabled' => true)); ?>
              </td>
            </tr> 
    
            </tbody> 
            </table>   






            <h3>Contemplado</h3>
            <!-- CONTENPLADO -->

            <table width="30%">
              <thead> 

            </thead>
            <tbody>
            <tr>
              <?php 
                echo $this->Form->hidden('Contemplado.id_usuario', array('value'=>$this->data['Usuario']['id']));
              ?>
              <?php 
                echo $this->Form->hidden('Contemplado.codigo_dominio', array('value'=>$this->data['Usuario']['codigo_dominio']));
              ?>
              <?php 
                echo $this->Form->hidden('Contemplado.nome_dominio', array('value'=>$this->data['Usuario']['nome_dominio']));
              ?> 
              

              <td>
                <?php echo $this->Form->input("Contemplado.nome", array('type'=>'text', 'label' => 'Nome', 'class'=>'m_nome')); ?>
              </td>
            </tr>

            <tr>
              <td>
                  <?php echo $this->Form->input("Contemplado.codigo_dominio", array('type'=>'text', 'label' => 'Código Concessionária', 'class'=>'m_nome', 'disabled' =>true, 'value'=>$this->data['Usuario']['codigo_dominio'])); ?> 
              </td> 
            </tr>

            <tr>
              <td>
                  <?php echo $this->Form->input("Contemplado.nome_dominio", array('type'=>'text', 'label' => 'Concessionária', 'class'=>'m_nome', 'disabled' =>true, 'value'=>$this->data['Usuario']['nome_dominio'])); ?> 
              </td> 
            </tr>



            <tr>
              <td>
                  <?php echo $this->Form->input("Contemplado.email", array('type'=>'text', 'label' => 'E-Mail', 'class'=>'m_nome"')); ?>
              </td>  
            </tr> 


            <tr>
              <td>
                  <?php echo $this->Form->input("Contemplado.cpf", array('type'=>'text', 'label' => 'CPF', 'class'=>'m_nome cpfmascara')); ?> 
              </td>    
            </tr> 


            <tr>
              <td>
                  <?php echo $this->Form->input("Contemplado.endereco", array('type'=>'text', 'label' => 'Endereços', 'class'=>'m_nome"')); ?>
              </td>  
            </tr>
            <tr>
              <td>
                  <?php echo $this->Form->input("Contemplado.numero", array('type'=>'text', 'label' => 'Número', 'class'=>'m_nome"')); ?>
              </td>  
            </tr>

            <tr>
              <td>
                  <?php echo $this->Form->input("Contemplado.cidade", array('type'=>'text', 'label' => 'Cidadade', 'class'=>'m_nome"')); ?>
              </td>  
            </tr>

            <tr>
              <td>
                  <?php echo $this->Form->input("Contemplado.estado", array('type'=>'text', 'label' => 'Estado', 'class'=>'m_nome"')); ?>
              </td>  
            </tr>         

            <tr>
              <td>
                  <?php echo $this->Form->input("Contemplado.cep", array('type'=>'text', 'label' => 'CEP', 'class'=>'m_nome"')); ?>
              </td>  
            </tr> 

            <tr>
              <td>
                  <?php echo $this->Form->input("Contemplado.telefone", array('type'=>'text', 'label' => 'Telefone', 'class'=>'m_nome"')); ?>
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