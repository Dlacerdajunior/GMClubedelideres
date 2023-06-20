<script type="text/javascript">
    $(function(){
        
        oTable = $('#grid-registros').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "sUrl": base_url + "/js/libs/jquery/data_tables/language/pt-br.txt"
            },
            "aaSorting": [[0, "desc"]],            
            "bAutoWidth": false,
            "bProcessing": true,
            "sAjaxSource": "<?php echo $this->base;?>/admin/usuarios/jsondatacontenpladoschevroletpremiados",
            "fnInitComplete": function () {
                acaoBotaoDelete();
            }
        });    
            
    });
     
    </script> 
     


    <div class="one_wrap fl_left">
        <div class="widget">

                <div class="widget_title"><span class="iconsweet">}</span><h5>Descubra Chevrolet Premiado</h5></div>

                <div class="widget_body">
                    <table class="activity_datatable" id="grid-registros" width="100%" border="0" cellspacing="0" cellpadding="8"> 
                        <thead>
                            <tr>
                                <th style="width: 60px;">Nome</th>
                                <th style="width: 60px;">Cod Domínio</th>
                                <th style="width: 130px;">Domínio</th>
                                <th style="width: 150px;">E-Mail</th>
                                <th style="width: 150px;">CPF</th>
                                <th style="width: 150px;">Endereços</th> 
                               <!-- <th style="width: 150px;">Complemento</th>
                                <th style="width: 50px;">Número</th>
                                <th style="width: 150px;">Cidadade</th>
                                <th style="width: 100px;">Estado</th>
                                <th style="width: 150px;">CEP</th> -->
                                <th style="width: 150px;">Telefone</th>
                                <!-- <th style="width: 150px;">Cadastrante Nome</th>
                                <th style="width: 30px;">Cadastrante Domínio</th> -->
                            </tr> 
                        </thead>
                        <tbody>      
                        </tbody>
                    </table>
                </div>
            
        </div> 
    </div> 