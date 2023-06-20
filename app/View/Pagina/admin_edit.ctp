<?php $this->start('script'); ?>
<style type="text/css">

#rsalbuns{
margin-top: 14px;
}

#rsalbuns img{
    margin-right: 10px;
}
</style>

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
    var coutfotos = $(".countclass").length;
    $("#rsalbuns").append("<img src='" + imgSrc + "' id='imgUploadedImage'  width='100' />");

    $(".inputshidden").append('<input type="hidden" class="countclass" name="data[Galeria][foto]['+coutfotos+']" value="' + imgSrc + '" />');
}   
 
</script> 


<!-- I: tiny_mce -->
<script type="text/javascript" src="<?php echo $this->base;?>/js/libs/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "advanced"
});
</script>
<!-- F: tiny_mce -->
<?php $this->end(); ?>


    

        <!--Quick Actions-->
        <div id="quick_actions">
            <a class="button_big" href="javascript:{$('.frm-03').submit()}" id="btn-salvar" >
                <span class="iconsweet">20</span> Salvar
            </a>
        </div> 
 
<div class="one_wrap fl_left">
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">r</span><h5>Pagina</h5></div>
            <div class="widget_body">


                <?php echo $this->Form->create('admin_edit', array('class'=>'frm-03','id'=>'frm-editar')); ?> 
                <ul class="form_fields_container">


                                <div class="inputshidden">
                                </div>
                 <?php 
                 if(isset($this->data['Pagina']['id']) && $this->data['Pagina']['id'] != ""){
                ?>
                    <input type="hidden" name="id" value="<?php echo $this->data['Pagina']['id']; ?>" />
                <?php
                 } 
                 ?> 

                <li>
                <label for="titulo">Titulo</label>
                <div class="form_input">
                    <input name="vc_titulo" type="text" class="w05" id="vc_titulo" value="<?php echo $this->data['Pagina']['vc_titulo']; ?>" required />
                </div>
                </li>

                 <li>
                <label for="titulo">Permalink</label>
                <div class="form_input">
                    <input name="vc_permalink" type="text" class="w05" id="vc_permalink" value="<?php echo $this->data['Pagina']['vc_permalink']; ?>" required />
                </div>
                </li>
                
                <li>
                <label for="titulo">Conteudo</label>
                <div class="form_input">
                    <textarea name="txt_conteudo" class="w05 h04" cols="30" rows="6">
                        <?php echo $this->data['Pagina']['txt_conteudo']; ?>
                    </textarea>
                </div>
                </li>


                <li>
                <label for="titulo">Fotos</label>
                <div class="form_input">

                                <div style="margin-left: 116px;">
                                    <button id="btn-alterar-thumb">Adicionar Foto</button></div>
                                    <span class="clear_both"></span>
                                    <div id="rsalbuns" style="margin-bottom: 10px;">
    
                                    </div>

                                    <div>   
                                        <?php                                                  
                                        if(isset($rsGaleria) && $rsGaleria != ""){
                                            foreach ($rsGaleria as $galeria){

                                            ?>     

                                            <div class="foto" style="width: 100px;float: left;margin-right: 10px;margin-bottom: 12px;">
                                                <img src='<?php echo $galeria['Galeria']['foto']; ?>' id='imgUploadedImage'  width='100' />   
                                                
                                                    <a href="<?php echo $this->base; ?>/admin/campanhas/deletegaleria/<?php echo $galeria['Galeria']['id']; ?>/<?php echo $this->data['Pagina']['id']; ?>"/ class="btn-delete" style="position: relative;top: -22px;color: #000;text-decoration: none;">
                                                        <span class="iconsweet">X</span>  Deletar</a> 
                                                    
                                            </div> 
                                            <?php 
                                            }
                                        }   
                                        ?>  
                                    </div>    

                                    

                                </div>

                </div>
                </li> 

                        
                </ul> 

                <?php echo $this->Form->end();?>


</div>

</div>
</div