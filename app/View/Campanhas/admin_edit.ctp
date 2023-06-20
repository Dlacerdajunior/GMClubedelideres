<?php $this->start('script'); ?>

<!-- I: tiny_mce -->
<script type="text/javascript" src="<?php echo $this->base;?>/js/libs/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "advanced"
});
</script>
<!-- F: tiny_mce -->

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
           w = window.open('<?php echo $this->base;?>/thumb/gerar/248/120', 'popimg',"location=0,status=0,scrollbars=1, width=800,height=500");
           w.focus();
           return false;
        });  

        $('#btn-alterar-slide').click(function(){
           w = window.open('<?php echo $this->base;?>/thumb/gerar/400/400/slider', 'popimg',"location=0,status=0,scrollbars=1, width=800,height=500");
           w.focus();
           return false;
        }); 
 
}); 
 

function atualizaThumb(imgSrc){
    $('input[name=thumb]').val(imgSrc);
    var dDate = new Date();
    $('#prw_thumb').attr('src', imgSrc + '?rand=' + dDate.getTime());
    $('#prw_thumb').fadeIn('slow');
}

function atualizaSlider(imgSrc){

    var coutfotos = $(".countclass").length;
    $("#rsalbuns").append("<img src='" + imgSrc + "' id='imgUploadedImage'  width='100' />");

    $(".inputshidden").append('<input type="hidden" class="countclass" name="data[Galeria][foto]['+coutfotos+']" value="' + imgSrc + '" />');

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
            <div class="widget_title"><span class="iconsweet">r</span><h5>Campanhas</h5></div>
            <div class="widget_body">


                <form class="frm-03" id="frm-editar" method="post"/>
                <ul class="form_fields_container">

                <input type="hidden" name="thumb" value="<?php echo $this->data['Campanha']['thumb']; ?>" />


                                <div class="inputshidden">
                                </div>


                             
                             <?php 
                             if(isset($this->data['Campanha']['id']) && $this->data['Campanha']['id'] != ""){
                            ?>
                                <input type="hidden" name="id" value="<?php echo $this->data['Campanha']['id']; ?>" />


                                <li>
                                    <label for="id">Id</label>
                                    <div class="form_input">
                                        <?php echo $this->data['Campanha']['id']; ?>
                                    </div>
                                </li> 



                                

                                <li>
                                    <label for="id">Permissão Função CADV</label>
                                    <div class="form_input">

                                        <?php 
                                        foreach ($this->Util->lista_cadv() as $keycadv => $cadvvalue) {
                                        $idcampanhapermissao = $this->data['Campanha']['id']."".$keycadv;
                                        ?>
                                        
                                        
                                                <div style="float: left;margin-right: 23px;margin-top: 12px;">
                                                    
                                                <input type="hidden" name="data[Campanhaspermisao][cod_funcaoCADV][<?php echo $this->data['Campanha']['id']; ?><?php echo $keycadv; ?>]" value="0" /> 
                                                
                                                <input type="checkbox" style="box-shadow: none; width:20px;" class="countclass" name="data[Campanhaspermisao][cod_funcaoCADV][<?php echo $this->data['Campanha']['id']; ?><?php echo $keycadv; ?>]" 
                                                value="<?php echo $keycadv; ?>" 
                                                <?php echo (isset($rsCampanhaspermisao[$idcampanhapermissao]['cod_funcaoCADV']) && $keycadv == $rsCampanhaspermisao[$idcampanhapermissao]['cod_funcaoCADV'] ? 'checked="checked"' : '') ?>
                                                 />
                                                <?php echo $cadvvalue; ?>
                                                </div> 
                                        <?php
                                        }
                                        ?> 


                                    </div>

                                </li>
                            

                            <?php
                             }
                             ?>



                                <li>
                                    <label>Nome Campanha</label>
                                    <div class="form_input">                    
                                    <input name="nome" type="text" class="w05" id="nome" value="<?php echo $this->data['Campanha']['nome']; ?>" required />
                                    </div>
                                </li>    


                                <li>
                                    <label>Nome Campanha ID</label>
                                    <div class="form_input"> 
                                    <input name="campanha_nomeid" type="text" class="w05" id="campanha_nomeid" value="<?php echo $this->data['Campanha']['campanha_nomeid']; ?>" required />
                                    </div>
                                </li>
                                
                                <li>
                                    <label>Imagem</label>
                                    <div class="form_input"> 

                                    <?php 
                                    if($this->data['Campanha']['thumb'] != ""){
                                    ?>
                                     <img id="prw_thumb" class="borda_img" src="<?php echo $this->data['Campanha']['thumb']; ?>" />
                                    <?php
                                    }else{ 
                                    ?>
                                     <img id="prw_thumb" class="borda_img" style="display: none;" />
                                    <?php
                                    }
                                    ?>
                                                       
                                    
                                    </div>
                                    <div style="margin-left: 116px;"><button id="btn-alterar-thumb">Adicionar Foto</button></div>
                                    
                                </li>   


                                <li>
                                    <label>Regulamento</label>
                                    <div class="form_input"> 

                                     <textarea name="regulamento" class="w05 h04" required><?php echo $this->data['Campanha']['regulamento']; ?></textarea>
                                    </div>
                                </li>


                                <li>
                                    <label>Premiação</label>
                                    <div class="form_input"> 
                                     <textarea name="premiacao" class="w05 h04" id="premiacao" required ><?php echo $this->data['Campanha']['premiacao']; ?></textarea>
                                    </div> 
                                </li>

                                <li>
                                    <label>Ranking</label>
                                    <div class="form_input"> 
                                     <textarea name="ranking" class="w05 h04" id="ranking" required ><?php echo $this->data['Campanha']['ranking']; ?></textarea> 
                                    </div> 
                                </li>
                 

                                <li>
                                    <label>Descrição</label>
                                    <div class="form_input">

                                    <textarea name="descricao" class="w05 h04" id="descricao" required><?php echo $this->data['Campanha']['descricao']; ?></textarea>
                                    </div>
                                </li>

                                <li>
                                    <label>Contato</label>
                                    <div class="form_input">

                                    <input name="contato" type="text" class="w05" id="contato" value="<?php echo $this->data['Campanha']['contato']; ?>" required />
                                    </div>
                                </li>

                                    
                                <li>
                                    <label>Mostra no Slider</label>
                                    <div class="form_input">
                                    <input type="hidden" name="show_slider" value="0" /> 
                                    <input type="checkbox" style="box-shadow: none; width:20px;" value="1" name="show_slider" <?php echo ($this->data['Campanha']['show_slider'] == '1' ? 'checked="checked"' : '') ?> />
                                    </div>
                                </li>


                                <li>
                                    <label>Mostra na Lista</label>
                                    <div class="form_input">

                                    <input type="hidden" name="show_lista" value="0" /> 
                                    <input type="checkbox" style="box-shadow: none; width:20px;" value="1" name="show_lista" <?php echo ($this->data['Campanha']['show_lista'] == '1' ? 'checked="checked"' : '') ?> />
                                    </div>
                                </li>


                    			<!--                 			
                                <div class="d-linha">
                                    <label>Slide:</label>
                                    <div>

                                    <img id="prw_thumb" class="borda_img" style="display: none;" />                    

                                    </div>
                                    <div style="margin-left: 116px;"><button id="btn-alterar-slide">Adicionar Foto</button></div>
                                    <span class="clear_both"></span> 

                                    <div id="rsalbuns">

                                        <?php 
                                        if(isset($rsGaleria) && $rsGaleria != ""){
                                            foreach ($rsGaleria as $galeria){

                                            ?>    

                                            <div class="foto">
                                                <img src='<?php echo $galeria['Galeria']['foto']; ?>' id='imgUploadedImage'  width='100' />   
                                                <a href="<?php echo $this->base; ?>/admin/campanhas/deletegaleria/<?php echo $galeria['Galeria']['id']; ?>/<?php echo $this->data['Campanha']['id']; ?>"/ class="btn-delete">Excluir</a>
                                            </div>
                                            <?php
                                            }
                                        }  
                                        ?>  
                                        

                                    </div>

                                </div>              
                                -->

                                    <?php 
                                    if($this->data['Campanha']['created'] != ""){
                                    ?>
                                            
                                    <li>
                                        <label>Data de Criação</label>
                                        <div class="form_input">

                                               <?php echo $this->data['Campanha']['created']; ?>
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