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


        $('#btn-alterar-thumb').click(function(){
           w = window.open('<?php echo $this->base;?>/thumb/upload', 'popimg',"location=0,status=0,scrollbars=1, width=800,height=500");
           w.focus();
           return false;
        }); 
}); 
 

function atualizaThumb(imgSrc){
    $('input[name=foto]').val(imgSrc);
    var dDate = new Date();
    $('#prw_thumb').attr('src', imgSrc + '?rand=' + dDate.getTime());
    $('#prw_thumb').fadeIn('slow');
} 
 
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
            <div class="widget_title"><span class="iconsweet">r</span><h5>Telão</h5></div>
            <div class="widget_body">

<form class="frm-03" id="frm-editar" method="post"/>
<ul class="form_fields_container">

<input type="hidden" name="foto" value="<?php echo $this->data['Telao']['foto']; ?>" />
                
                <div class="inputshidden">
                </div>

                
             <?php 
             if(isset($this->data['Telao']['id']) && $this->data['Telao']['id'] != ""){
            ?>
                <input type="hidden" name="id" value="<?php echo $this->data['Telao']['id']; ?>" />

                <li>
                    <label for="id">Id</label>
                    <div class="form_input">
                        
                       <?php echo $this->data['Telao']['id']; ?> 
                    </div>

                </li>

                <!--
                <li>
                    <label >Permissão Função CADV </label>
                    <div class="form_input">
                    
                    <div>

                    <?php 
                    foreach ($this->Util->lista_cadv() as $keycadv => $cadvvalue) {

                    $idcampanhapermissao = $this->data['Telao']['id']."".$keycadv;
                    ?> 
                            <div style="float: left;margin-right: 23px;margin-top: 12px;">

                            <input type="hidden" name="data[Teloespermissao][cod_funcaoCADV][<?php echo $this->data['Telao']['id']; ?><?php echo $keycadv; ?>]" value="0" /> 

                            <input type="checkbox" style="box-shadow: none; width:20px;" name="data[Teloespermissao][cod_funcaoCADV][<?php echo $this->data['Telao']['id']; ?><?php echo $keycadv; ?>]" 
                            value="<?php echo $keycadv; ?>" 
                            <?php echo (isset($rsTelaopermissao[$idcampanhapermissao]['cod_funcaoCADV']) && $keycadv == $rsTelaopermissao[$idcampanhapermissao]['cod_funcaoCADV'] ? 'checked="checked"' : '') ?>
                             />
                            <?php echo $cadvvalue; ?>
                            </div>
                    <?php
                    }
                    ?> 


                        </div>
                    </div>
                </li>
                -->

            <?php
             }
             ?>
                
                <li>
                <label for="titulo">Titulo</label>
                <div class="form_input">
                    <input name="titulo" type="text" class="w05" id="titulo" value="<?php echo $this->data['Telao']['titulo']; ?>" required />
                </div>
                </li>

                <li>
                    <label for="lblregulamento">Subtítulo</label>
                <div class="form_input">
                    <input name="subtitulo" type="text" class="w05" id="subtitulo" value="<?php echo $this->data['Telao']['subtitulo']; ?>" required />
                </div> 

                </li>
                
                <li>
                <label for="lblregulamento">Link</label>
                <div class="form_input">
                    <input name="linksite" type="text" class="w05" id="linksite" value="<?php echo $this->data['Telao']['linksite']; ?>" required />
                </div>  
                </li>
                
                <li>
                <label>Imagem:</label>
                <div class="form_input">
                   
                    <div>
                    <?php 
                    if($this->data['Telao']['foto'] != ""){
                    ?>
                     <img id="prw_thumb" class="borda_img" src="<?php echo $this->data['Telao']['foto']; ?>" width="300" />
                    <?php
                    }else{ 
                    ?>
                     <img id="prw_thumb" class="borda_img" style="display: none;"  width="300" />
                    <?php
                    }
                    ?>
                                       
                    
                    </div>
                    <div style="margin-left: 116px;"><button id="btn-alterar-thumb">Adicionar Foto</button></div>
                    <span class="clear_both"></span> 
                </div>   
                </li>

                    <?php 
                    if($this->data['Telao']['created'] != ""){
                    ?>
                       <li>          
                            <label for="dt_criado">Data de Criação</label>
                            <div class="form_input">
                               <?php echo $this->data['Telao']['created']; ?>
                            </div>
                        </li>
                    <?php
                    }
                    ?>


             



</ul>
</form>


</div>

</div>
</div>