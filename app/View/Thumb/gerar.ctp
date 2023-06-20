<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" media="screen" href="http://ajax.googleapis.com/ajax/libs/yui/2.9.0/build/reset/reset-min.css" />
    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/js/libs/jquery/ui/css/overcast/jquery-ui-1.8.16.custom.css" />
    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/js/libs/jquery/qtip/jquery.qtip.min.css" />
    <!-- PLUGINS: modernizr -->
    <script src="<?php echo $this->base;?>/js/libs/modernizr.custom.14288.js"></script>
    <!-- F: modernizr -->
    
    <style type="text/css">

        /* I: clearfix */
        /* This needs to be first because FF3 is now supporting this */
        .clearfix {display: inline-block;}

        .clearfix:after {
            content: " ";
            display: block;
            height: 0;
            clear: both;
            font-size: 0;
            visibility: hidden;
        }

        /* Hides from IE-mac \*/
        * html .clearfix { height: 1%; }
        .clearfix { display: block; }
        /* End hide from IE-mac */
        /* F: clearfix */



        root { 
            display: block;
        }

        /**** padrões ****/
        body,td,th,input,select,option {
            font-family: Verdana, Helvetica, Arial, sans-serif;
            font-size: 11px;
        }

        strong,th,h1,h2,h3,h4,h5,h6{
            font-weight: bold;
        }

        h1{
            font-size: 24px;
            margin-bottom: 20px;
            color: #174369;
        }

        h2{
            font-size: 20px;
            margin-bottom: 18px;
            color: #174369;
        }


        h3{
            font-size: 18px;
            margin-bottom: 16px;
            color: #174369;
        }

        p{
            margin-bottom: 22px;
            line-height: 18px;
        }


        ul {
            margin-bottom: 25px;
        }

        ul li{
            list-style-position: inside;
            list-style-type: disc;
            margin-top: 6px;
            margin-bottom: 6px;
        }

        ul li ul li{
            margin-left: 20px;
        }

        a{
            color:#700000;
        }

        .clear_both{ 
            clear: both;
            display: block;
            width: 0px;
            height: 0px;
            overflow: hidden;
        }
        
        body{
            margin: 10px;
        }
        /**** /padrões ****/
        
        #etapa-2, #etapa-3{
            display: none;
        }
        .etapa{
            margin-bottom: 30px;
        }
    </style>

 
    <!-- ************************** I:ENVIO DE THUMBS ************************** -->
    <?php 
    echo $this->Html->css('/js/libs/jquery/css/vader/jquery-ui-1.8.21.custom.css');
    echo $this->Html->script('/js/libs/jquery/js/jquery-1.7.2.min.js');
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


            $('#btn-concluir').show();
            $('#btn-concluir').attr('disabled', 'disabled');
            sConcluidoTexto = $('#btn-concluir').text();
            $('#btn-concluir').text('Aguarde....');

            
            }).bind('fileuploaddone', function (e, data) {        

            if(data.textStatus=="success"){

  
            $.each(data.result, function (index, file){

                $("#nomefoto").val(file.name);
                $('#prw_image').attr('src', "<?php echo $this->base;?>/js/libs/file_upload/server/php/files/"+file.name);
                var ias = $('#prw_image').imgAreaSelect({ 
                    minWidth: <?php echo $w;?>, 
                    minHeight: <?php echo $h;?>, 
                    aspectRatio: '<?php echo $w;?>:<?php echo $h;?>', 
                    handles: true,
                    'onSelectEnd': function (img, selection) {
                        dImgSel = selection;
                    } 
                });
                $('#etapa-2, #etapa-3').fadeIn('slow');

            });

            $('#btn-concluir').removeAttr('disabled');
            $('#btn-concluir').text(sConcluidoTexto);
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

    
        $('.btn-gerar-thumb').click(function(){        

            var d = '';

            d += "nomefoto=" + $('#nomefoto').val();
            d += "&filepath=" + $('#prw_image').attr('src');
            d += "&left=" + dImgSel.x1;
            d += "&top=" + dImgSel.y1;
            d += "&crop_width=" + (dImgSel.x2-dImgSel.x1);
            d += "&crop_height=" + (dImgSel.y2-dImgSel.y1);
            d += "&thumb_w=<?php echo $w;?>";
            d += "&thumb_h=<?php echo $h;?>";
 
             $.ajax({
               type: "POST",
               url: "<?php echo $this->base;?>/thumb/gerar",
               data:  d ,
               success: function(imgSrc){ 
                 
                 <?php
                 if(isset($slider) && $slider == 'slider'){
                   ?>                   
                   opener.atualizaSlider(imgSrc);
                <?php
                 }else{
                ?>
                    opener.atualizaThumb(imgSrc);

                <?php
                 }
                 ?> 

                 
                 opener.focus();
                 self.close();
               }
             }); 


             return false;

        });



    });
    </script>
<!-- ************************** F:ENVIO DE THUMBS ************************** -->

</head>
<body>





<div id="conteiner">

    <section id="content">
    	<form id="frm-editar" method="post" enctype="multipart/form-data">

    		<input type="hidden" name="nomefoto" id="nomefoto" value="" />
    		<input type="hidden" name="thumb_w" value="250" />
    		<input type="hidden" name="thumb_h" value="250" />

            <h1>Thumb</h1>

            <div id="thumb-conteiner">
            <!-- ETAPA 1 -->
            <div id="etapa-1" class="etapa">
             <p><strong>1) Selecione um arquivo</strong>
             	

                <button id="btn-concluir" class="btn-gerar-thumb" style="display:none;">Gerar Thumb</button>

                 <input id="fileupload" type="file" name="files[]" data-url="<?php echo $this->base ?>/js/libs/file_upload/server/php/">

                    <div id="progressbar"></div>            


              </p> 
            </div>

            <!-- ETAPA 2 -->
            <div id="etapa-2"  class="etapa">
                <p><strong>2) Crie uma seleção clicando e arrastando o mouse sobre a imagem abaixo.</strong></p>
                <div><img src="" id="prw_image" /></div>
            </div>

            <!-- ETAPA 3 -->
            <div id="etapa-3"  class="etapa">
                <p><strong>3)</strong>
                	<button class="btn-gerar-thumb">Gerar Thumb</button>
				</p>
            </div>

        </div>   
        
        </form>
    </section>
    <footer>
       
    </footer>
</div>
</body>
</html>