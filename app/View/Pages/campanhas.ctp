        <div class="container" style="margin-top: 54px; min-height: 480px; padding-right:15px; padding-left:48px; padding-bottom:15px; padding-top:58px;">
            <h3>Campanhas</h3>
            <div style="width:600px;">



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
                            

                            ?>
                                <div class="span4">
                                    <div class="img-destaque">
                                        <img src="<?php echo $campanha['Campanha']['thumb']; ?>" alt="<?php echo $campanha['Campanha']['nome']; ?>">
                                        <span><?php echo $campanha['Campanha']['nome']; ?></span>
                                    </div>

                                    

                                    <p class="texto-destaque">
                                        <?php echo $this->Util->tamanhaString(utf8_encode(html_entity_decode($campanha['Campanha']['descricao'])),90); ?>...</p>
                                    <p class="saiba-mais"><a href="<?php echo $this->base;?>/campanhas/<?php echo $campanha['Campanha']['campanha_nomeid']; ?>">Saiba mais</a></p>
                                </div>


                                <?php
                                    $countraosel++;
                                    
                                }

                            ?>


                                </div>


                        <?php
                        }  
                        ?>    

          </div>
            <!-- /.row-fluid -->

          <div class="row-fluid"></div>
            <!-- /.row-fluid -->
        </div><!-- /container -->