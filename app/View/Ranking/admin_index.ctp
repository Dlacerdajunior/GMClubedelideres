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
            "sAjaxSource": "<?php echo $this->base;?>/admin/ranking/jsondata",
            "fnInitComplete": function () {
                acaoBotaoDelete();
            } 
        });   
        
    }); 
     
    </script>  
    

<div id="barra-sup">
    <h1 class="ico-content-48">Ranking</h1>   
    <div class="toolbar">
        <ul>
            <li>
                <a href="<?php echo $this->base;?>/admin/ranking/edit" class="ico-new-32">Adicionar</a>
            </li>
        </ul>
    </div>    
</div> 


<table class="display" id="grid-registros">
    <thead>
        <tr>
            <th style="width: 30px;">Id</th>
            <th style="width: 160px;">Nome</th>
            <th style="width: 140px;">Data</th>
            <th style="width: 200px;">Ação</th>
        </tr>
    </thead>
    <tbody>
    </tbody> 
</table> 