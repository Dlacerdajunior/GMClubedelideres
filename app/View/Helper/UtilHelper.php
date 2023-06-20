<?php
class UtilHelper extends AppHelper {
  var $helpers = array('Html','Session');
 


    
    /**
     * Barra to Date
     * Retira as barras e coloca o ano na frente
     * @return string
     */
    public static function barraToDate($DATA) {
        if (strpos($DATA, '-') !== false) {
            return $DATA;
        }
        if (!empty($DATA)) {
            $d = explode('/', $DATA);
            $nova = $d[2] . '-' . $d[1] . '-' . $d[0];
            return($nova);
        }
    }

    /**
     * Date to Barra
     * Coloca barra e o ano atrás
     * @return string
     */
    public static function dateToBarra($DATA) {
        if (strpos($DATA, '/') !== false) {
            return $DATA;
        }
        if (!empty($DATA)) {
            $d = explode('-', $DATA);
            $nova = $d[2] . '/' . $d[1] . '/' . $d[0];
            return($nova);
        }
    } 


    /**
     * Date Formart
     * Coloca barra e o ano atrás
     * @return string
     */
    public static function dateFormat($DATA){
        $data_comp = date("d/m/Y", strtotime("$DATA"));
        return $data_comp;
    } 


    /**
     * tamanhaString
     * Limita string no tramanha 
     * @return string
     */
    public static function tamanhaString($DATA,$tamanho){

      $DATA = strip_tags($DATA,'');
      $rsString = substr($DATA, 0, $tamanho);

        return $rsString;
    } 

        function lista_regiao() {

            $options=array('Região 01' => 'Região 01',
                        'Região 02' => 'Região 02', 
                        'Região 03' => 'Região 03', 
                        'Região 04' => 'Região 04', 
                        'Região 05' => 'Região 05', 
                        'Região 06' => 'Região 06', 
                        'Região 07' => 'Região 07', 
                        'Região 08' => 'Região 08',               
                        'Região 09' => 'Região 09',               
                        'Região 10' => 'Região 10',               
                        'Região 11' => 'Região 11',               
                        );   
                      
        return $options;

        }


        function lista_cadv() {
 
        $options=array('GM-GRE-29' => 'FORNECEDOR', //Região 11
                        'SA-AGA-96' => 'ANALISTA DE GARANTIA', //Região 01
                        'GR-AAF-26' => 'ASSISTENTE ADMINISTRATIVO/FINANCEIRO', //Região 01
                        'GR-DIR-18' => 'OPERADOR/DIRETOR', //Região 01
                        'GR-ENC-78' => 'ENCARREGADO DE PÁTIO', //Região 01
                        'GR-GCO-43' => 'Gestor de Conteúdo', //Região 03
                        'GR-GCS-67' => 'CONSULTOR / SUPERVISOR CONSORCIO', //Região 03
                        'GR-CTT-88' => 'COORDENADOR DE TREINAMENTO/ATENDIMENTO', //Região 01                        
                        'GR-TEC-20' => 'COORDENADOR DE ATENDIMENTO', //Região 01
                        'GR-TEH-21' => 'COORDENADOR DE ATENDIMENTO/RH', //Região 01
                        'GR-TRE-59' => 'COORDENADOR DE TREINAMENTO', //Região 01
                        'GR-TRH-60' => 'COORDENADOR DE TREINAMENTO/RH', //Região 01
                        'GR-WEB-85' => 'WEBMASTER', //Região 01
                        'PC-EOG-63' => 'ESTOQUISTA/OPERADOR DE GARANTIA DE PEÇAS', //Região 01
                        'PC-EST-51' => 'ESTOQUISTA', //Região 01
                        'PC-OGP-86' => 'OPERADOR DE GARANTIA DE PECAS', //Região 01
                        'PC-SPC-52' => 'SUPERVISOR DE PEÇAS', //Região 01
                        'SA-CSE-44' => 'FACILITADOR', //Região 01
                        'SA-OAG-61' => 'OP. GARANTIA DE PEÇAS/ANALISTA GARANTIA', //Região 01
                        'SA-OAG-62' => 'OPERADOR CENTRAL AGENDAMENTO SERVIÇOS', //Região 01
                        'SA-STE-94' => 'CHEFE DE OFICINA', //Região 01
                        'ST-FUN-83' => 'FUNILEIRO', //Região 01
                        'ST-IAC-80' => 'INSTALADOR DE ACESSÓRIOS', //Região 01
                        'ST-MEC-45' => 'TÉCNICO PREMIUM', //Região 01
                        'ST-PIN-84' => 'PINTOR', //Região 02
                        'VD-AVS-74' => 'ASSISTENTE DE VENDAS', //Região 01
                        'VD-AVU-77' => 'AVALIADOR DE VEÍCULOS USADOS', //Região 01
                        'GR-GFI-24' => 'GERENTE NEGOCIOS F&I', //Região 01
                        'GR-GRH-22' => 'GERENTE/SUPERVISOR/COORD/ANALISTA RH', //Região 01                        
                        'GR-GAF-27' => 'GERENTE ADMINISTRATIVO/FINANCEIRO', //Região 01
                        'PC-GPC-08' => 'GERENTE DE PECAS', //Região 01
                        'PC-GPC-91' => 'GERENTE DE PEÇAS/COORD TREINAMENTO', //Região 05
                        'SA-CGS-92' => 'GERENTE SERVIÇO/COORD TREINAMENTO', //Região 02
                        'SA-CPV-93' => 'GERENTE PÓS-VENDAS/COORD TREINAMENTO', //Região 01                        
                        'GM-GRE-289' => 'GERENTE REGIONAL DA GMB',                        
                        'GR-ATE-30' => 'GERENTE DE ATENCAO AO CLIENTE', //Região 01                        
                        'SA-GPV-89' => 'GERENTE DE PÓS-VENDAS', //Região 01
                        'SA-GSE-09' => 'GERENTE DE SERVICO', //Região 01                        
                        'VD-CGV-90' => 'GERENTE DE VENDAS/COORD TREINAMENTO', //Região 01
                        'VD-GCV-97' => 'GERENTE/SUPERV VD CORPORATE/VAREJO VD', //Região 01
                        'VD-GNS-10' => 'GERENTE VENDAS VEÍC NOVOS/SIGA', //Região 01
                        'VD-GNU-15' => 'GERENTE VENDAS VEÍC NOVOS/USADOS', //Região 01
                        'VD-GNV-11' => 'GERENTE/SUPERVISOR VD NOVOS/VAREJO VD', //Região 01
                        'VD-GVC-68' => 'GERENTE/SUPERVISOR VD DIRETAS CORPORATE', //Região 01
                        'VD-GVD-70' => 'GERENTE/SUPERVISOR DE VENDAS VAREJO VD', //Região 01
                        'VD-GVN-06' => 'GERENTE/SUPERVISOR VD VEÍCULOS NOVOS', //Região 01
                        'VD-GVS-71' => 'GERENTE/SUPERVISOR DE VENDAS SIGA/USADOS', //Região 01
                        'VD-GVU-07' => 'GERENTE/SUPERVISOR VD VEICULOS USADOS', //Região 01
                        'VD-PEV-76' => 'PROMOTOR DE ENTREGA DE VEÍCULOS NOVOS', //Região 01
                        'VD-SVS-72' => 'SUPERVISOR DE VENDAS SIGA\USADOS', //Região 01
                        'VD-TRV-95' => 'TRAINEE DE VENDAS', //Região 01
                        'GR-VCS-05' => 'VENDEDOR CONSORCIO', //Região 02
                        'PC-VES-87' => 'VENDEDOR PEÇAS/ESTOQUISTA', //Região 01
                        'PC-VPC-03' => 'VENDEDOR PEÇAS', //Região 01                        
                        'VD-VAC-75' => 'VENDEDOR DE ACESSORIOS', //Região 01
                        'VD-VNS-13' => 'VENDEDOR VEÍCULOS NOVOS/SIGA', //Região 01
                        'VD-VNU-12' => 'VENDEDOR VEÍCULOS NOVOS/USADOS', //Região 01
                        'VD-VNV-14' => 'VENDEDOR VEÍCULOS NOVOS/VAREJO VD', //Região 01
                        'VD-VVC-65' => 'VENDEDOR DE VENDAS DIRETAS CORPORATE', //Região 01
                        'VD-VVD-69' => 'VENDEDOR VAREJO VD', //Região 01
                        'VD-VVN-01' => 'VENDEDOR VEICULOS NOVOS', //Região 01
                        'VD-VVS-73' => 'VENDEDOR DE VEICULOS SIGA/USADOS', //Região 01
                        'VD-VVU-02' => 'VENDEDOR VEICULOS USADOS', //Região 01
                        'VD-INTERNO' => 'Internos GM'
                        );  
            
        //sort( $options, SORT_REGULAR );  

        return $options;
    }

        function lista_GM() {

        $options=array('GM-AAN-148'=>'ANALISTA ADMINISTRATIVO NEGÓCIOS',
                        'GM-ADV-135'=>'ANALISTA DE DISTRIBUIÇÃO DE VEICULO',
                        'GM-ADV-136'=>'ANALISTA JR DISTRIBUIÇÃO DE VEICULO',
                        'GM-AJM-150'=>'ANALISTA JR MERCADO',
                        'GM-AJP-151'=>'ANALISTA JR PLANEJAMENTO ESTRAT. REDE',
                        'GM-AJV-131'=>'ANALISTA JR VENDAS DIRETAS',
                        'GM-AMJ-134'=>'ANALISTA DE MARKETING JR',
                        'GM-AMS-144'=>'ANALISTA SR MERCADO',
                        'GM-ANM-104'=>'ANALISTA DE MARKETING',
                        'GM-APE-138'=>'ANALISTA PLANEJAMENTO ESTRATEGICO REDE',
                        'GM-APP-146'=>'ANALISTA SR PLANEJAMENTO PRODUTO',
                        'GM-APS-145'=>'ANALISTA SR PLANEJAMENTO ESTRAT. REDE',
                        'GM-APV-139'=>'ANALISTA PLANEJAMENTO POS VENDAS',
                        'GM-ASD-141'=>'ANALISTA SR DISTRIBUIÇÃO VEÍCULOS',
                        'GM-ASP-108'=>'ANALISTA DE SISTEMAS DE PREÇOS',
                        'GM-ASP-143'=>'ANALISTA SR MARKETING DE PRODUTO',
                        'GM-ASR-152'=>'ANALISTA SERVIÇO',
                        'GM-AST-153'=>'ANALISTA SR TREINAMENTO',
                        'GM-CAC-156'=>'COORDENADOR ATENDIMENTO AO CLIENTE',
                        'GM-CDN-157'=>'COORDENADOR DISTRIB. NACIONAL VEICULOS',
                        'GM-COP-01'=>'COPV',
                        'GM-COS-160'=>'COORDENADOR OPERAÇÕES SERVIÇO',
                        'GM-CPR-161'=>'COORDENADOR PLANEJAMENTO DO PRODUTO',
                        'GM-ECV-170'=>'ESPECIALISTA CALL CENTER VENDAS',
                        'GM-EJS-167'=>'ENGENHEIRO JR SERVIÇO',
                        'GM-EMC-172'=>'ESPECIALISTA DE MERCADO',
                        'GM-ESC-171'=>'ESPECIALISTA SERVIÇO',
                        'GM-ESS-169'=>'ENGENHEIRO SR DE SERVIÇO',
                        'GM-ESV-168'=>'ENGENHEIRO DE SERVIÇO',
                        'GM-GCO-174'=>'GERENTE COMERCIAL',
                        'GM-GDV-01'=>'GDV',
                        'GM-GMR-124'=>'GERENTE DE MARKETING REGIONAL',
                        'GM-GNA-182'=>'GNA',
                        'GM-GNP-01'=>'GNPV',
                        'GM-GNV-01'=>'GNV',
                        'GM-GRE-28'=>'GRO',
                        'GM-GRE-29'=>'FORNECEDOR',
                        'GM-GRM-175'=>'GERENTE DE MARCA',
                        'GM-GRV-01'=>'GRVD',
                        'GM-GSC-01'=>'GSC',
                        'GM-GSS-183'=>'GERENTE SR ADMINISTRAÇÃO SUPORTE VENDAS',
                        'GM-INS-129'=>'INSTRUTOR DE CAPACITAÇÃO TÉCNICA',
                        'GM-INT-98'=>'GMB - INTERNO',
                        'GM-MKT-01'=>'GMKT',
                        'GM-OPD-185'=>'OPERADOR DE DISTRIBUIÇÃO',
                        'GM-OPR-186'=>'OPERADOR PRODUÇÃO',
                        'GM-SCT-189'=>'SUPERVISOR CENTRO ATENDIMENTO TECNICO',
                        'GM-SDP-190'=>'SUPERVISOR DESENVOLVIMENTO DO PRODUTO',
                        'GM-SMI-188'=>'SUPERVISOR CONTR MATERIAL INVENTARIO',
                        'GM-SSV-191'=>'SUPERVISOR DE SERVIÇO',
                        'GM-TJS-192'=>'TECNICO JR SERVIÇO',
                        'GM-TSS-194'=>'TECNICO SR SERVIÇO',
                        'GM-TSV-193'=>'TECNICO SERVIÇO',
                        'GR-AAD-26'=>'ASSISTENTE ADMINISTRATIVO',
                        'GR-AFN-26'=>'ASSISTENTE FINANCEIRO',
                        'GR-ARH-22'=>'ANALISTA DE RH',
                        'GR-ATE-30'=>'GESTOR DE ATENCAO AO CLIENTE',
                        'GR-CPV-02'=>'CONSULTORES PÓS VENDAS',
                        'GR-CVD-01'=>'CONSULTORES VENDAS',
                        'GR-GFN-27'=>'GERENTE FINANCEIRO',
                        'GR-TEC-20'=>'COORDENADOR DE ATENDIMENTO',
                        'GR-TIT-22'=>'TITULAR',
                        'GR-TRE-59'=>'COORDENADOR DE CAPACITAÇÃO',
                        'GR-WEB-11'=>'WEBMASTER',
                        'PC-GPC-52'=>'GERENTE DE PEÇAS',
                        'PC-SPC-52'=>'SUPERVISOR DE PEÇAS',
                        'PC-VPC-03'=>'CONSULTOR DE VENDAS - PEÇAS',
                        'SA-CSE-09'=>'FACILITADOR',
                        'SA-GAR-01'=>'GARANTISTA SERVIÇOS',
                        'SA-GSE-09'=>'GERENTE DE SERVIÇO',
                        'SA-OAG-62'=>'OPERADOR CENTRAL DE AGENDAMENTO',
                        'ST-TEC-01'=>'TÉCNICO SÊNIOR',
                        'ST-TEC-02'=>'TÉCNICO PLENO',
                        'ST-TEC-05'=>'TÉCNICO JUNIOR',
                        'VD-AVS-74'=>'ASSISTENTE DE VENDAS - VEÍCULOS NOVOS',
                        'VD-GVN-06'=>'GERENTE DE VENDAS - VEÍCULOS NOVOS',
                        'VD-GVS-07'=>'GERENTE DE VENDAS - VEÍCULOS SEMINOVOS',
                        'VD-SVS-07'=>'SUPERVISOR DE VENDAS - VEÍC. SEMINOVOS',
                        'VD-VVN-01'=>'CONSULTOR DE VENDAS - VEÍCULOS NOVOS',
                        'VD-VVS-73'=>'CONSULTOR DE VENDAS - VEÍCULOS SEMINOVOS',
                        'VD-VVV-01'=>'CONSULTOR DE VENDAS SR - VEÍCULOS NOVOS'


                        );  
                        
        return $options;
    } 
    
   function formatarCPF_CNPJ($campo){


        $parte_um     = substr($campo, 0, 3);
        $parte_dois   = substr($campo, 3, 3);
        $parte_tres   = substr($campo, 6, 3);
        $parte_quatro = substr($campo, 9, 2);

        $retorno = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
            

        return $retorno;
     
    }

    function removerCaracter($string){
    $newstring = preg_replace("/[^a-zA-Z0-9_.]/", "", strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
    return $newstring;
    }

    function downloadpdf() {

        $idUsuarios = $this->Session->read('Usuario');
        

        if (isset($idUsuarios["Usuario"]["regiao"])) {
        
            $file = "DescobertaPremiadaVendas".$idUsuarios["Usuario"]["regiao"];

            $file = $this->removerCaracter($file); 

            $filename = $this->base."/files/pdfs/".$file.".pdf?v=7"; 
        
            return $filename; 
        }else{

            return "#";
        }

 
    } 




    function downloadpdfranking() {

        $idUsuarios = $this->Session->read('Usuario');
        

        if (isset($idUsuarios["Usuario"]["regiao"])) {
        
            $file = "Ranking_".$idUsuarios["Usuario"]["regiao"];

            $file = $this->removerCaracter($file); 

            $filename = $this->base."/files/pdfs/".$file.".pdf?v=7"; 
            
            return $filename;
        }else{
 
            return "#";
        }

            
    } 

    function conquiste_seu_caminho_raking() {

        $idUsuarios = $this->Session->read('Usuario');
        

        if (isset($idUsuarios["Usuario"]["regiao"])) {
        
            $file = $idUsuarios["Usuario"]["regiao"];

            $file = $this->removerCaracter($file); 

            $filename = $this->base."/files/pdfs/conquiste_seu_caminho/ranking/".$file.".pdf?v=42"; 
                
            return $filename;
        }else{
 
            return "#"; 
        }
             
    } 



    function rota_dourada_regulamento() {

        $idUsuarios = $this->Session->read('Usuario');
        

        if (isset($idUsuarios["Usuario"]["regiao"])) {
        
            $file = $idUsuarios["Usuario"]["regiao"];

            $file = $this->removerCaracter($file); 

            $filename = $this->base."/files/pdfs/rota_douradavendas/regulamento/".$file.".pdf?v=18";  
                
            return $filename;
        }else{
 
            return "#"; 
        } 
             
    } 
    
    
    function rota_dourada_ranking() {

        $idUsuarios = $this->Session->read('Usuario');
        

        if (isset($idUsuarios["Usuario"]["regiao"])) {
        
            $file = $idUsuarios["Usuario"]["regiao"];

            $file = $this->removerCaracter($file); 

            $filename = $this->base."/files/pdfs/rota_douradavendas/ranking/".$file.".pdf?v=14";    
                
            return $filename; 
        }else{ 
 
            return "#"; 
        }  
             
    }  



 } 