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
            "sAjaxSource": "<?php echo $this->base;?>/admin/campanhas/jsondata",
            "fnInitComplete": function () {
                acaoBotaoDelete();
            }
        });   
        
    }); 
     
    </script> 
    



    <div class="one_wrap fl_left">
        <div class="widget">

                <div class="widget_title"><span class="iconsweet">}</span><h5>Campanhas</h5></div>

                <div class="widget_body">



                    <table class="activity_datatable" id="grid-registros" width="100%" border="0" cellspacing="0" cellpadding="8">
                        <thead>
                            <tr>
                                <th style="width: 30px;">Id</th>
                                <th style="width: 160px;">Nome</th>
                                <th style="width: 150px;">Imagem</th>
                                <th>Data</th>
                                <th style="width: 62px;">Ação</th>
                            </tr>
                        </thead>
                        <tbody>      
                        </tbody>
                    </table>                    
                </div>
            
        </div> 
    </div> 


