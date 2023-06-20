<!DOCTYPE html>
<html>
<head>


<title>Clube de Líderes 2012</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->base;?>/cmsnovo/images/favicon.ico">
<!--Stylesheets-->
<link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/css/reset.css" />
<link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/css/typography.css" />
<link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/css/tipsy.css" />
<link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/js/cl_editor/jquery.cleditor.css" />
<link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/uploadify/uploadify.css" />
<link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/css/jquery.ui.all.css" />
<link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/js/fancybox/jquery.fancybox-1.3.4.css" />
<link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/css/highlight.css" />
<!--[if lt IE 9]>
    <script src="<?php echo $this->base;?>/cmsnovo/js/html5.js"></script>
    <![endif]-->
<!--Javascript--> 




    <script type="text/javascript">
        var base_url = '<?php echo $this->base;?>';
    </script>


    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/js/libs/jquery/ui/css/overcast/jquery-ui-1.8.16.custom.css" />
    <link rel="stylesheet" href="<?php echo $this->base;?>/cmsnovo/css/main.css" />
    
    <script src="<?php echo $this->base;?>/js/jquery/js/jquery-1.7.2.min.js"></script>
    <script src="<?php echo $this->base;?>/js/jquery/js/jquery-ui-1.8.21.custom.min.js"></script>
    
    <script src="<?php echo $this->base;?>/js/libs/jquery/ui/i18n/jquery.ui.datepicker-pt-BR.js"></script>
    <script src="<?php echo $this->base;?>/js/libs/jquery/superfish/js/superfish.js"></script>
    <script src="<?php echo $this->base;?>/js/libs/jquery/data_tables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $this->base;?>/js/libs/jquery/jquery.maskedinput-1.2.2.min.js"></script>
    <script src="<?php echo $this->base;?>/js/libs/jquery/jquery.maskMoney.0.2.js"></script>
    <script src="<?php echo $this->base;?>/js/libs/jquery/jquery.validate.min.js"></script>
    <script src="<?php echo $this->base;?>/js/libs/jquery/localization/messages_ptbr.js"></script>
    <script src="<?php echo $this->base;?>/js/libs/jquery/jquery-ui-timepicker-addon.js"></script>
    <script src="<?php echo $this->base;?>/js/libs/jquery/qtip/jquery.qtip.min.js"></script>
    <!-- F: JQUERY JS -->
    
    <!-- PLUGINS: modernizr -->
    <script src="<?php echo $this->base;?>/js/libs/modernizr.custom.14288.js"></script>
    <!-- F: modernizr -->


    <script src="<?php echo $this->base;?>/js/cms_commons.js"></script>



<script type="text/javascript" src="<?php echo $this->base;?>/cmsnovo/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="<?php echo $this->base;?>/cmsnovo/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo $this->base;?>/cmsnovo/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
 
<meta charset="UTF-8">

<?php echo $this->fetch('script'); ?>


</head>
<body id="login_container">

<!--Dreamworks Container-->
<div id="dreamworks_container">

    <div id="login">

    <?php 
    $rsFLASH = $this->Session->flash();

    if($rsFLASH != null){
    ?>
        <div id="dialog-message" title="Alerta">
            <?php echo $rsFLASH; ?>
        </div>
    <?php
    }
    ?>


<img src="<?php echo $this->base;?>/cmsnovo/images/logo.fw.png" /> 
        <?php
        echo $this->Form->create('cms', array('action' => 'login','class' => 'frm-01' )); 
        ?>


        <div class="input_box"> <span class="iconsweet"></span>
                <input name="data[cms][username]" type="text" placeholder="Seu Login" id="cmsUsername">
        </div>
        
        <div class="input_box"> <span class="iconsweet"></span>
            <input name="data[cms][password]" type="password" placeholder="Sua Senha" id="cmsUsername">       
               
        </div>


            <div>
                <?php echo $this->Form->submit('Login'); ?>
            </div>
        

        <?php echo $this->Form->end(); ?>

        </form>

        </div>
    </div>

</body>
</html>