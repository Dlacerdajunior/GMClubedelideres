        <div id="menu-sup" class="navbar navbar-fixed-top">
        
            <div class="container">
                <a class="logo ir" href="#">Chevrolet</a>

 

                <?php
                if($this->Session->read('User.Administrador.username')){
                ?>
                 <div class="bem-vindo">
                    Olá Administrador, bem-vindo! Se você não é o Administrador, <a href="<?php echo $this->base;?>/cms/logout">clique aqui</a>.
                </div>

                <?php
                }
                ?>  
                

                <ul class="nav">
                    <li><a href="<?php echo $this->base;?>/">Home</a></li>
                    <li class="divider-vertical ir"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu</a>
                        <ul class="dropdown-menu">

                            

                            <li><a href="<?php echo $this->base;?>/usuarios/informederendimento">Informe de Rendimento</a></li> 

                            <li><a href="<?php echo $this->base;?>/Pages/campanhasencerradas">Campanhas Encerradas</a></li>                             
                            
                            <li><a href="<?php echo $this->base;?>/pagina/v/galeriafotos">Galeria Fotos</a></li>
                            
                            <li><a href="<?php echo $this->base;?>/Pages/perguntas">Perguntas Frequentes</a></li>
                            
                            <li><a href="<?php echo $this->base;?>/usuarios/perfil">Perfil</a></li>
                            
                            <li><a href="<?php echo $this->base;?>/Pages/faleconosco">Fale Conosco</a></li>
                            
                                                  

                        </ul> 
                    </li>
                    <li class="divider-vertical ir"></li>
                    <li><a href="<?php echo $this->base;?>/Pages/perguntas">Perguntas Frequentes</a></li>
                    <li class="divider-vertical ir"></li>
                    <li><a href="<?php echo $this->base;?>/Pages/faleconosco">Fale Conosco</a></li>
                    <li class="divider-vertical ir"></li>
                    <li><a href="<?php echo $this->base;?>/usuarios/perfil">Perfil</a></li>
                    <li class="divider-vertical ir"></li>
                    <li><a href="<?php echo $this->base;?>/usuarios/sair">Sair</a></li>
                </ul> 
                <!-- /.nav -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.navbar -->