<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" media="screen" href="http://ajax.googleapis.com/ajax/libs/yui/2.9.0/build/reset/reset-min.css" />
    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/css/cms.css?v=1" /> 
     
    <!-- I: JQUERY CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/js/libs/jquery/ui/css/overcast/jquery-ui-1.8.16.custom.css" />
    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/js/libs/jquery/superfish/css/superfish.css" />
    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/js/libs/jquery/data_tables/css/demo_page.css" />
    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/js/libs/jquery/data_tables/css/demo_table_jui.css" />
    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/js/libs/jquery/qtip/jquery.qtip.min.css" />
    <!-- F: JQUERY CSS -->
    
    <script type="text/javascript">
        var base_url = '<?php echo $this->base;?>';
    </script>

    <link rel="stylesheet" media="screen" href="<?php echo $this->base;?>/js/libs/jquery/ui/css/overcast/jquery-ui-1.8.16.custom.css" />
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
	
    <?php echo $this->fetch('script'); ?>

	
</head>
<body>
	
	
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

	
	<div id="conteiner">
    <header>
        
        <div class="logo">
            <h1 style="text-indent: 18px;padding: 10px;color:#FFF;">CMS</h1>
        </div> 


        
        <nav>
            <ul class="sf-menu">
                 <li><a href="<?php echo $this->base;?>/">Acesso ao Portal</a></li>
                
                <li><a href="<?php echo $this->base;?>/admin/usuarios">Usuarios</a></li>

                <?php 
               if($this->Session->read('User.Administrador.username') != "atendente"){
                ?>


                <li><a href="<?php echo $this->base;?>/admin/campanhas">Campanhas</a></li>
                <li><a href="<?php echo $this->base;?>/admin/telao">Telão</a></li>
                <li> 
                    <a href="<?php echo $this->base;?>/admin/usuarios/contenplados">
                    Desempenho de Líderes
                    </a>
                </li>

                <li> 
                    <a href="<?php echo $this->base;?>/admin/usuarios/contenpladoschevroletpremiados">
                     Chevrolet Premiado
                    </a>
                </li>

                <?php
                }
                ?>
                
                
                <li><a href="<?php echo $this->base;?>/admin/loja">Loja</a></li>



                <li><a href="<?php echo $this->base;?>/admin/pages/suporte">Suporte</a></li>
                <li><a href="<?php echo $this->base;?>/cms/logout">Sair</a></li>
            </ul> 
        </nav>
        
        
    </header>
    <section id="content">
	
	
	<?php echo $this->fetch('content'); ?>
	
	
	    </section>
    <footer>
       
    </footer>
</div>

<?php echo $this->element('sql_dump'); ?>
</body>
</html>