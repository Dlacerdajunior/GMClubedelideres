        <div class="container" style="margin-top: 54px; min-height: 480px; padding:15px;">

            <h3 style="width: 788px; margin: 0 auto;">Campanhas Encerradas</h3> 

            <div id="destaques" class="carousel slide">
                    

                        <?php 
                        if(isset($rsCampanha) && !empty($rsCampanha)){
                        ?>


                 
                            <!-- /.carousel-indicators -->  

                            <div class="carousel-inner">


                        <?php
                            $countraosel = 1;
                            $countactive = "active";
                            foreach ($rsCampanha as $campanha){
                            
                                if($countraosel == 1){
                                    echo '<div class="item '.$countactive.'" style="margin-bottom: 20px;margin-top: 20px;">
                                            <div class="row-fluid">';
                                }
                                //$countactive = "";
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
                                    "><?php echo $campanha['Campanha']['nome']; ?></span>                                    
                                  
                                    

                                    <p class="texto-destaque">
                                        <?php echo $this->Util->tamanhaString(utf8_encode(html_entity_decode($campanha['Campanha']['descricao'])),90); ?>...</p>
                                    

                                    <!--
                                    <p class="saiba-mais"><a href="<?php echo $this->base;?>/campanhas/<?php echo $campanha['Campanha']['campanha_nomeid']; ?>">Saiba mais</a></p>
                                    -->


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



                        <?php
                        }  
                        ?>    


            </div> 
            <!-- /#destaques.carousel slide -->                  

        </div><!-- /container -->