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
            "sAjaxSource": "<?php echo $this->base;?>/admin/loja/jsondata",
            "fnInitComplete": function () {
                acaoBotaoDelete();
            }
        });   
        
    }); 
     
    </script>



    <div class="one_wrap fl_left">
        <div class="widget">

                <div class="widget_title"><span class="iconsweet">}</span><h5>Compras</h5></div>

                <div class="widget_body">



                    <table class="activity_datatable" id="grid-registros" width="100%" border="0" cellspacing="0" cellpadding="8">
                        <thead>
                            <tr>
                                <th style="width: 30px;">Id Pedido</th>
                                <th style="width: 160px;">CPF</th>
                                <th style="width: 150px;">Nome</th>
                                <!--<th>Nome Produto</th> -->
                                <th>Valor Pedido</th>
                                <th>Data compra</th>
                                <th style="width: 62px;">Ação</th> 
                            </tr>
                        </thead>
                        <tbody>      
                        </tbody>
                    </table>                    
                </div>
            
        </div> 
    </div> 


