<?php $this->start('script'); ?>


<script type="text/javascript">


$(function() {


    $( "#senha" ).click(function() {

          $( "#senha" ).val("");
          $( "#trocarsenha" ).val("1");

    });

});
 
</script> 

<?php $this->end(); ?>




        <!--Quick Actions-->
        <div id="quick_actions">
            <a class="button_big" href="javascript:{$('.frm-03').submit()}" id="btn-salvar" >
                <span class="iconsweet">20</span> Salvar
            </a>
            
        </div> 

<div class="one_wrap fl_left">
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">r</span><h5>Administrador</h5></div>
            <div class="widget_body">

<form class="frm-03" id="frm-editar" method="post"/>
<ul class="form_fields_container">

                
                <div class="inputshidden">
                </div>

             <input type="hidden" id="trocarsenha" name="trocarsenha" value="0" />

             <?php 
             if(isset($this->data['Administrador']['id']) && $this->data['Administrador']['id'] != ""){
            ?>
                <input type="hidden" name="id" value="<?php echo $this->data['Administrador']['id']; ?>" />

                <li>
                    <label for="id">Id</label>
                    <div class="form_input"> 
                       <?php echo $this->data['Administrador']['id']; ?> 
                    </div>

                </li>

             <?php
             } 
             ?>   
                
                <li>
                <label for="titulo">Login</label>
                <div class="form_input">
                    <input name="username" type="text" class="w05" id="titulo" value="<?php echo $this->data['Administrador']['username']; ?>" required />
                </div>
                </li>

                <li>
                <label for="titulo">Senha</label>
                <div class="form_input"> 
                    <input name="password" type="password" class="w05" id="senha" value="<?php echo $this->data['Administrador']['password']; ?>" required /> 
                </div>  
                </li>  


                <li>
                <label for="titulo">Tipo</label>
                <div class="form_input"> 
                <?php 
                    echo $this->Form->input('Administrador.tipo', array(
                        'before' => '<!--',
                        'after' => '',
                        'between' => '-->',
                        'separator' => '--separator--',
                        'options' => array('1'=>'Administrador', '2'=>'Atendimento')
                    ));
                ?> 
                </div>  
                </li> 





</ul>
</form>


</div>

</div>
</div>