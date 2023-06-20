<?php $this->start('script'); ?>

<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery/js/jquery-1.7.2.min.js"></script> 


<?php
if($pagina['Pagina']['id'] == 73 || $pagina['Pagina']['id'] == 74 || $pagina['Pagina']['id'] == 75){
?>

<style>
#rodape{
    
display: none;

}

</style>

<?php
}
?>

<?php $this->end(); ?>



        <div class="container" style="margin-top: 54px; min-height: 480px; padding:15px;">
            <h3><?php echo $pagina['Pagina']['vc_titulo']; ?></h3>
            
            <p> <?php echo $pagina['Pagina']['txt_conteudo']; ?> </p> 


            


            <div style="position:relative;">   
                <?php                                                  
                if(isset($rsGaleria) && $rsGaleria != ""){
                    foreach ($rsGaleria as $galeria){

                    ?>     

                    <div class="foto" style="width: 100px;float: left;margin-right: 10px;margin-bottom: 12px;height: 70px;overflow: hidden;">
                       
                            <a rel="group" href="<?php echo $galeria['Galeria']['foto']; ?>" class="fancybox thumbnail">
                            <img src='<?php echo $galeria['Galeria']['foto']; ?>' id='imgUploadedImage'  width='100' />
                        </a>   
                    </div>

                    <?php 
                    }
                }   
                ?>  
            </div>
        </div> 