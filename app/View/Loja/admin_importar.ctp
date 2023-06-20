<?php $this->start('script'); ?>



    <!-- PLUGINS: modernizr -->
    <script src="<?php echo $this->base;?>/js/libs/modernizr.custom.14288.js"></script>
    <!-- F: modernizr -->




    <!-- ************************** I:ENVIO DE THUMBS ************************** -->
    <?php 
    echo $this->Html->css('/js/libs/jquery/css/vader/jquery-ui-1.8.21.custom.css');

    echo $this->Html->script('/js/libs/jquery/js/jquery-ui-1.8.21.custom.min.js');
    echo $this->Html->script('/js/libs/file_upload/js/jquery.iframe-transport.js');
    echo $this->Html->script('/js/libs/file_upload/js/jquery.fileupload.js');
    ?>
    <!-- I: imgareaselect-->
    <script type="text/javascript" src="<?php echo $this->base;?>/js/libs/jquery/imgareaselect/scripts/jquery.imgareaselect.pack.js"></script>
    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/js/libs/jquery/imgareaselect/css/imgareaselect-animated.css" />
    <!-- F: imgareaselect-->


    <script type="text/javascript">

    $(function(){ 

        var dImgSel;
        $('#fileupload').fileupload({
           acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i, //.sAcceptFileTypes,
           dataType: 'json',
           singleFileUploads: false
            }).bind('fileuploadstart', function (e) {            

            
            }).bind('fileuploaddone', function (e, data) {        

            if(data.textStatus=="success"){

  
             $('.selecionararquivo').html('<b>Aguarde Importando XLS ....</b>');

            $.each(data.result, function (index, file){

                $.ajax({
                  url: '<?php echo $this->base;?>/admin/loja/importxls/'+file.name,
                  success: function(data) {
                    $('#progressbar').html('');
                    $('.selecionararquivo').html('<b><font color="red">' + data + 'XLS Importado com sucesso</font></b>');
                  }  
                }); 

            }); 

            

            $("#progressbar" ).hide();

        }

    }).bind('fileuploadprogressall', function (e, data) { //Status do upload
        $("#progressbar" ).progressbar({
            value: parseInt(data.loaded / data.total * 100, 10)
        });
    }).bind('drop dragover', function (e) { 
        return false;
    }).bind('fileuploadfail', function (e, data) { //Status do upload
        
    }); 

    



    });
    </script>
<!-- ************************** F:ENVIO DE THUMBS ************************** -->

<?php $this->end(); ?>




<div class="one_wrap fl_left">
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">r</span><h5>Importar Pedidos</h5></div>
            <div class="widget_body">


<form class="frm-03" id="frm-editar" method="post"/>
<ul class="form_fields_container">


                <li>
                    <label for="id">Selecione um arquivo .xls</label>
                    <div class="form_input">

                 <input id="fileupload" type="file" name="files[]" data-url="<?php echo $this->base ?>/js/libs/file_upload/server/php/">


                        <div class="selecionararquivo" style="margin-top: 28px;font-weight: bold;font-size: 14px;"></div> 



                        <div id="progressbar" style="margin-top:10px;"></div> 
                    </div>
                </li> 
</ul>
</form>