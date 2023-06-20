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


?>
    
<?php $cakeDescription = '- Clube de Líderes 2013'; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

 <title>
        <?php echo $title_for_layout; ?>
        <?php echo $cakeDescription ?>
 </title> 


         <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo $this->base;?>/css/bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo $this->base;?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $this->base;?>/css/main.css">

        <script src="<?php echo $this->base;?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    
        <?php echo $this->fetch('script'); ?>

    </head>
    <body style="margin-top: -58px;background:#fff;">
    <div id="content">

        <?php echo $this->fetch('content'); ?>


    
        <script src="<?php echo $this->base;?>/js/jquery/js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo $this->base;?>/js/jquery/js/jquery.maskedinput-1.3.min.js"></script>


        <script type="text/javascript">
            $(function(){
                

                $(".cpfmascara").mask("999.999.999-99");
             
            });  
        </script>

        </div>   
        <!-- /#content -->  

        <?php echo $this->element('sql_dump'); ?>

    </body>
</html>
