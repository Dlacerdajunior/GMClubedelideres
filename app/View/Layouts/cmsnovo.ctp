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




<!--Header-->
<header>
    <!--Logo-->
    <div id="logo"><a href="#"><img src="<?php echo $this->base;?>/cmsnovo/images/logo.fw.png" alt="" /></a></div>
    <!--Search-->
    <div class="header_search">

    </div>
</header>
<!--Dreamworks Container-->
<div id="dreamworks_container">
    <!--Primary Navigation-->
    <nav id="primary_nav">
        <ul>

                <li class="nav_dashboard"><a href="<?php echo $this->base;?>/">Acesso ao Portal</a></li>
                
                <li class="nav_dashboard8 <?php echo ($menuShow == "usuario" ? "active" : "") ?>">
                    <a href="<?php echo $this->base;?>/admin/usuarios">Usuários</a>
                </li>

                <?php 
                    if($this->Session->read('User.Administrador.tipo') == "1"){
                ?>


                <li class="nav_dashboard2 <?php echo ($menuShow == "campanhas" ? "active" : "") ?>">
                    <a href="<?php echo $this->base;?>/admin/campanhas">Campanhas</a> 
                </li> 
                

                <li class="nav_dashboard7 <?php echo ($menuShow == "telao" ? "active" : "") ?>">
                    <a href="<?php echo $this->base;?>/admin/telao">Telão</a>
                </li> 

                <li class="nav_dashboard6 <?php echo ($menuShow == "pagina" ? "active" : "") ?>">
                    <a href="<?php echo $this->base;?>/admin/pagina">Página</a>
                </li> 

                
   
                <?php
                    }
                ?> 


                <li class="nav_dashboard4 <?php echo ($menuShow == "loja" ? "active" : "") ?>"> 
                    <a href="<?php echo $this->base;?>/admin/loja/compras">
                    Loja
                    </a>
                </li> 


                <li class="nav_dashboard4 <?php echo ($menuShow == "contemplados" ? "active" : "") ?>"> 
                    <a href="<?php echo $this->base;?>/admin/usuarios/contenplados">
                    Desempenho de Líderes
                    </a>
                </li>


                <li class="nav_dashboard4 <?php echo ($menuShow == "contempladospremiados" ? "active" : "") ?>"> 
                    <a href="<?php echo $this->base;?>/admin/usuarios/contenpladoschevroletpremiados">
                     Chevrolet Premiado
                    </a>
                </li> 


                <li class="nav_dashboard5 <?php echo ($menuShow == "suporte" ? "active" : "") ?>">
                    <a href="<?php echo $this->base;?>/admin/pages/suporte">Suporte</a>
                </li> 
               

            
        </ul>
    </nav>
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<nav id="secondary_nav"> 
<!--UserInfo-->
<dl class="user_info">
	<dt><a href="#"><img src="<?php echo $this->base;?>/cmsnovo/images/avatar.png" alt="" /></a></dt>
    <dd>
    <a class="welcome_user" href="#">Welcome,<strong>
        <?php echo $this->Session->read('User.Administrador.username'); ?>
    </strong></a> 
    <span class="log_data"></span>
    <a class="logout" href="<?php echo $this->base;?>/cms/logout">Sair</a>
    
    </dd>
</dl>

<?php if ($menuShow == "loja") { ?>
    <h2>Loja</h2>
    <ul>
        
        <li><a href="<?php echo $this->base;?>/admin/loja/compras"><span class="iconsweet">}</span>Lista</a></li>
    </ul> 
<?php } ?>

    
<?php if ($menuShow == "telao") { ?>
    <h2>Telão</h2>
    <ul>
        <li class="active"><a href="<?php echo $this->base;?>/admin/telao/edit"><span class="iconsweet">C</span>Adicionar Novo</a></li>
        <li><a href="<?php echo $this->base;?>/admin/telao"><span class="iconsweet">}</span>Lista</a></li>
    </ul> 
<?php } ?>


<?php if ($menuShow == "campanhas") { ?>
    <h2>Campanhas</h2>
    <ul> 
        <li class="active"><a href="<?php echo $this->base;?>/admin/campanhas/edit"><span class="iconsweet">C</span>Adicionar Novo</a></li>
        <li><a href="<?php echo $this->base;?>/admin/campanhas"><span class="iconsweet">}</span>Lista</a></li>
    </ul> 
<?php } ?>


<?php if ($menuShow == "usuario") { ?>
    <h2>Usuários</h2>
    <ul> 

        <li><a href="<?php echo $this->base;?>/admin/usuarios"><span class="iconsweet">}</span>Usuários Pulsar</a></li>

        <li class="active"><a href="<?php echo $this->base;?>/admin/usuarios/buscar"><span class="iconsweet">C</span>Exportações usuários</a></li> 

                <?php if($this->Session->read('User.Administrador.tipo') == "1"){ ?>
                    <li class="active"><a href="<?php echo $this->base;?>/admin/usuarios/importar"><span class="iconsweet">C</span>Importar</a></li>
                
                    <li><a href="<?php echo $this->base;?>/admin/usuarios/admin"><span class="iconsweet">}</span>Usuários de sistema</a></li> 

                    <li class="active"><a href="<?php echo $this->base;?>/admin/usuarios/adminedit"><span class="iconsweet">C</span>Novo usuários de sistema</a></li>
                <?php } ?>
    </ul> 
<?php } ?>
    
    
<?php if ($menuShow == "contemplados") { ?>
    <h2>Desempenho de Líderes</h2>
    <ul> 
        <li><a href="<?php echo $this->base;?>/admin/usuarios/contenplados"><span class="iconsweet">}</span>Lista</a></li>
        <li><a href="<?php echo $this->base;?>/admin/usuarios/contenpladosexport"><span class="iconsweet">}</span>Exportar</a></li>
    </ul>  
<?php } ?>


<?php if ($menuShow == "contempladospremiados") { ?>
    <h2>Descubra Chevrolet Premiado</h2>
    <ul> 
        <li>
            <a href="<?php echo $this->base;?>/admin/usuarios/contenpladoschevroletpremiados"><span class="iconsweet">}</span>Lista
            </a>
        </li>
        <li><a href="<?php echo $this->base;?>/admin/usuarios/contenpladoschevroletpremiadosexport"><span class="iconsweet">}</span>Exportar</a></li>
    </ul>
<?php } ?> 


<?php if ($menuShow == "pagina") { ?>
    <h2>Página</h2>
    <ul> 
        <li> 
            <a href="<?php echo $this->base;?>/admin/pagina/"><span class="iconsweet">}</span>Lista
            </a>
            <li class="active"><a href="<?php echo $this->base;?>/admin/pagina/edit"><span class="iconsweet">C</span>Nova página</a></li>
        </li> 
    </ul>
<?php } ?>


<?php if ($menuShow == "suporte") { ?>
    <h2>Suporte</h2>
    <ul> 

    </ul>  
<?php } ?>


</nav>
<!--Content Wrap-->
<div id="content_wrap">	<!--Activity Stats-->
                  
        <!--Quick Actions-->

<!--One_Wrap-->

            <?php echo $this->fetch('content'); ?>
         


 	<br class="clear" />          
</div>
</section>
</div>


<?php echo $this->element('sql_dump'); ?>

</body>
</html>