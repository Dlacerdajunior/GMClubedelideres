 
<style type="text/css">
#popup { display: none; position:absolute; z-index:1002;  border: 1px solid #000;}
#baner_close { color: #000;
position: absolute;
top: 290px;
right: 27px; }
</style>



<div id="popup_content" style="display:none;">
    <a href="<?php echo $this->base;?>/Pages/desabilitarpop" id="baner_closeold" style="top:254px; right: 52px; color: #000; position: absolute;">
        <img src="<?php echo $this->base;?>/img/fechar.png"/>
    </a> 
    <center>
    <a href="#">
    <img src="<?php echo $this->base;?>/img/popup_convecao2014-op2.jpg"/> 
    </a> 
    </center>  
</div> 


  <div class="container">
    <div id="telao" class="carousel2 slide"> 


            

                <ol class="carousel2-indicators"></ol>
                <!-- /.carousel2-indicators -->  

                <!-- <div class="carousel2-caption"></div> -->
                <div class="carousel2-inner">

                    <?php 
                        $countTelao = 0;

                        foreach ($rsTelao as $telao){
                    ?>                          
                    <div class="item">
                        <a href="<?php echo $telao['Telao']['linksite']; ?>">
                            <img src="<?php echo $telao['Telao']['foto']; ?>" alt="<?php echo $telao['Telao']['titulo']; ?>"/>
                        </a>
                    </div>
                    <?php 
                    $countTelao++;
                        } 

                        if($countTelao == 0){
                            $showtelao = 3;
                        }elseif($countTelao == 1){
                            $showtelao = 2;
                        }elseif($countTelao == 2){
                            $showtelao = 1;
                        }else{
                            $showtelao = 1;
                        }
                    ?>

                    <?php 
                    for ($i=0; $i < $showtelao ; $i++) { 
                    ?> 
                    
                    <div class="item">
                        <a href="<?php echo $this->base;?>/Pages/manifesto">
                            <img src="<?php echo $this->base;?>/js/libs/file_upload/server/php/files/banner_manifesto_2014.png"/>
                        </a>
                    </div>
                    
                    <?php    
                    }
                    ?>

                    
                </div>
                <!-- /.carousel2-inner -->  

                <a class="carousel2-control left" href="#telao" data-slide="prev">&lsaquo;</a>
                <a class="carousel2-control right" href="#telao" data-slide="next">&rsaquo;</a>

            
            <!-- /#telao.carousel2 slide -->  

            </div>
        </div>
        <!-- /.container --> 

       <!--  DELETADO <div class="ferro-sup"></div> -->

        <div class="container" style="margin-top: 34px;"> 

        <!-- DELETADO
        <div style="font-family:'louis-regular' serif; font-size: 13px; text-transform: uppercase; margin-left:54px; margin-bottom:10px;">
            CAMPANHAS EM ANDAMENTO
        </div> 
        -->
            <div id="destaques" class="carousel slide">
                     

                        <?php 
                        if(isset($rsCampanha) && !empty($rsCampanha)){
                        ?>


                            <ol class="carousel-indicators">
                                <li data-target="#destaques" data-slide-to="0" class="active"></li>
                                <li data-target="#destaques" data-slide-to="1"></li>
                                <li data-target="#destaques" data-slide-to="2"></li>
                            </ol>
                            <!-- /.carousel-indicators -->  

                            <div class="carousel-inner">


                        <?php
                            $countraosel = 1;
                            $countactive = "active";
                            foreach ($rsCampanha as $campanha){
                            
                                if($countraosel == 1){
                                    echo '<div class="item '.$countactive.'">
                                            <div class="row-fluid">';
                                }
                                $countactive = "";
                            ?>
                                <div class="span4">
                                    <div class="img-destaque">
                                        <a href="<?php echo $this->base;?>/campanhas/<?php echo $campanha['Campanha']['campanha_nomeid']; ?>">

                                        <img src="<?php echo $campanha['Campanha']['thumb']; ?>" alt="<?php echo $campanha['Campanha']['nome']; ?>">                                        
                                        </a>  
                                    </div> 
                                    <span style="
                                        font-size: 14px;
                                        font-weight: bold;
                                        top: -8px;
                                        position: relative;
                                        font-style: italic;
                                    "><?php echo $campanha['Campanha']['nome']; ?></span>
                                    

                                    <p class="texto-destaque" style="font-style: italic;">
                                        <?php echo $this->Util->tamanhaString(utf8_encode(html_entity_decode($campanha['Campanha']['descricao'])),90); ?>...</p>
                                    <p class="saiba-mais"><a href="<?php echo $this->base;?>/campanhas/<?php echo $campanha['Campanha']['campanha_nomeid']; ?>">Saiba mais</a></p>
                                </div>


                                <?php
                                    $countraosel++;

                                    if($countraosel == 4){
                                        $countraosel = 1;
                                        echo '</div>
                                                <!-- /.row-fluid -->
                                            </div>
                                            <!-- /.item -->';
                                    } 

                                    
                                }


                            //SOLUCAO RAPIDA DEPOIS MUDAR !!!!
                            if (count($rsCampanha) != 6) {


                                if($countraosel <= 3){
                                    $countraosel = 1;
                                    echo '</div>
                                            <!-- /.row-fluid -->
                                        </div>
                                        <!-- /.item -->';
                                } 

                            }
                            ?>


                                </div>
                                <!-- /.carousel-inner -->  

                                <?php if (count($rsCampanha) > 3) { ?>

                                <a class="carousel-control left" href="#destaques" data-slide="prev">&lsaquo;</a>
                                <a class="carousel-control right" href="#destaques" data-slide="next">&rsaquo;</a>

                                <?php } ?>

                        <?php
                        }  
                        ?>    


            </div> 
            <!-- /#destaques.carousel slide -->                  

        </div><!-- /container -->