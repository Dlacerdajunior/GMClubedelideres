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
    
    <?php echo $this->element('/site/top'); ?>
    
        <?php echo $this->fetch('script'); ?>

    </head>
    <body>
    <div id="content">

        <?php echo $this->element('/site/menu'); ?>


        <?php echo $this->fetch('content'); ?>




        <!-- <a id="logo-clube-de-lideres" href="<?php echo $this->base;?>/" class="ir">Clube de Líderes 2013</a> -->
        <!--<div class="ferro-inf"></div>-->

        <footer id="rodape">
            <div class="container">
                
                <!-- <div class="txt-mov-con ir">Movidos por Conquistas</div> -->
                <!-- <div class="fale-com">Fale com a Central de Relacionamento: <strong>0800 772 28 66</strong></div> -->
                <!-- <a id="logo-chevrolet-rodape" href="#" class="ir">Chevrolet</a> -->
            </div>
            <!-- /.container -->
        </footer>


        <?php echo $this->element('/site/bottom'); ?>

        </div>  
        <!-- /#content -->  

        <?php echo $this->element('sql_dump'); ?>

    </body>
</html>
