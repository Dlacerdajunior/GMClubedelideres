<?php $this->start('script'); ?>

<script type="text/javascript">

$(function(){
    

       $("#frm-editar").validate({
      rules: {
         nome: { required: true }
         },
         messages: {
            nome: "Campo Obrigatorio"
         } 
     }); 
 
}); 
 
</script> 

<?php $this->end(); ?>


<div id="barra-sup">
    <h1 class="ico-calendar-48">Ranking</h1> 
    <div class="toolbar">
        <ul>
            <li><a href="javascript:{$('.frm-03').submit()}" id="btn-salvar" class="ico-save-32">Salvar</a></li>
        </ul>
    </div>     
</div> 


<form class="frm-03" id="frm-editar" method="post"/>

<table class="tbl-conteiner"> 
    <tr>
        <td class="col01">
            
             
             <?php 
             if(isset($this->data['Ranking']['id']) && $this->data['Ranking']['id'] != ""){
            ?>
                <input type="hidden" name="id" value="<?php echo $this->data['Ranking']['id']; ?>" />
                <div class="d-linha clearfix">
                    <label for="id">Id</label>
                   <?php echo $this->data['Ranking']['id']; ?>
                </div> 

            <?php
             }
             ?>

             
                <div class="d-linha clearfix">
                    <label for="titulo">Nome Ranking</label></th>
                    <input name="nome" type="text" class="w05" id="nome" value="<?php echo $this->data['Ranking']['nome']; ?>" required />
                </div>

       


                    <?php 
                    if($this->data['Ranking']['created'] != ""){
                    ?>
                              
                        <div class="d-linha clearfix">
                            <label for="dt_criado">Data de Criação</label></th>
                           <?php echo $this->data['Ranking']['created']; ?>
                        </div>
                    <?php
                    }
                    ?>




        </td>
        <td class="col02"> 
            


        </td>
    </tr>
</table>

</form>