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
                  url: '<?php echo $this->base;?>/admin/ranking/importavivesxls/<?php echo $id_ranking; ?>/'+file.name,
                  success: function(data) {
                    $('#progressbar').html('');
                    $('.selecionararquivo').html('<b><font color="green">XLS Importado com sucesso</font></b>'); 
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


<div id="barra-sup">
    <h1 class="ico-calendar-48">Raking</h1> 
    <div class="toolbar">

    </div>    
</div> 


<form class="frm-03" id="frm-editar" method="post"/>

                <div class="inputshidden">
                </div>

<table class="tbl-conteiner"> 
    <tr>
        <td class="col01">
                
                   
                    <div style="font-weight: bold;margin-left: 62px;">

                        <p><font color="red"> *Atenção : </font></p>
                        <p>*Arquivo selecionado precisa ser .xls</p>
                        <p>*As colunas no XLS deve ser : |Sales Dealer | Salesman CPF | </p>
                        
                    </div>
                

                <div class="d-linha clearfix selecionararquivo">

                <label for="id" style="width: 212px;">Selecione um arquivo</label>

                 <input id="fileupload" type="file" name="files[]" data-url="<?php echo $this->base ?>/js/libs/file_upload/server/php/">

                    <div id="progressbar" style="margin-top:10px;"></div> 
                </div>

            

        </td>
        <td class="col02"> 
            


        </td>
    </tr>
</table>

</form>