<?php $this->start('script'); ?>



<?php $this->end(); ?>






<div class="one_wrap fl_left">
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">r</span><h5>Exportar</h5></div>
            <div class="widget_body">

<form class="frm-03" id="frm-editar" method="post"/>
<ul class="form_fields_container">

                
                <div class="inputshidden">
                </div>

                <li>
                <label for="titulo">Nome</label>
                <div class="form_input">
                    <input name="nome" type="text" class="w05" id="titulo" value=""  />
                </div>
                </li>

                <li>
                <label for="titulo">E-mail</label>
                <div class="form_input">
                    <input name="email" type="text" class="w05" id="titulo" value=""  />
                </div>
                </li>         

                

                <li>
                <label for="titulo">Codigo Dominio</label>
                <div class="form_input">
                    <select name="codigodominio[]" multiple style="height: 200px;">
                     
                    <?php 
                    foreach ($listaDominio as $valor) {                                        
                    ?> 
                     <option value="<?php echo $valor['Usuario']['codigo_dominio']; ?>">
                        <?php echo $valor['Usuario']['codigo_dominio']; ?>
                    </option>
                    <?php
                    }
                    ?>  
                    </select>
                </div>
                </li>


                <li>
                <label for="titulo">Região</label>
                <div class="form_input">
                    <select name="regiao[]" multiple style="height: 200px;">
                     
                    <?php 
                    foreach ($this->Util->lista_regiao() as $keycadv => $cadvvalue) {                    
                    ?> 
                     <option value="<?php echo $keycadv; ?>"><?php echo $cadvvalue; ?></option>
                    <?php
                    }
                    ?>  
                    </select> 
                </div>
                </li>

                <li>
                <label for="titulo">Função CADV</label>
                <div class="form_input">
                    <select name="funcaoCADV[]" multiple style="height: 200px;">
                     
                    <?php 
                    foreach ($this->Util->lista_cadv() as $keycadv => $cadvvalue) {                    
                    ?> 
                     <option value="<?php echo $keycadv; ?>"><?php echo $cadvvalue; ?></option>
                    <?php
                    }
                    ?> 
                    </select>
                </div>
                </li>

</ul>

        <center>
            <a class="button_big" href="javascript:{$('.frm-03').submit()}" id="btn-salvar" >
            Buscar
            </a>
            <br/>
        </center>

</form>


</div>

</div>
</div>