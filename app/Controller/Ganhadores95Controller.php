<?php

App::uses('AppController', 'Controller');

App::import('Vendor', 'excel_reader/excel_reader2'); 
	
class Ganhadores95Controller extends AppController {

	public $name = '95ganhadores';

	public $uses = array('Ranking', 'Rankingredevendas', 'Rankingavive','Usuario');

    public function beforeFilter() {

        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 123456); 
    }



    public function exportar($id = null) {		

    	$this->autoRender=false;

		$header_row = "Cod \t Concessionaria \t Titular \t Regiao  \t  Peergroup \t \n";

    		
		$rsGAnhadores = $this->Ranking->query("SELECT * FROM 95ganhadores GANHADORES");  
 		//limit 0, $vagaslimit

		foreach ($rsGAnhadores as $ranking) {  
 			
 			$grupoc = $ranking['GANHADORES']['grupo'];
 			$titulo = $ranking['GANHADORES']['performace']; 
 			$grupo = $grupoc.'001';
 			$regiao = "";
 			$peegroup = "";
 			$Concessionaria = "";



			$rsUsuarios = $this->Ranking->query("SELECT * FROM usuarios Usuario WHERE
			Usuario.codigo_dominio ='$grupo' LIMIT 0,1
 			 ");

			
 			
			$rsRevendas = $this->Ranking->query("SELECT * FROM ranking_redevendas Redevendas WHERE
			Redevendas.cod ='$grupoc' LIMIT 0,1
 			 "); 

			if(isset($rsUsuarios[0]['Usuario']['regiao']) && $rsUsuarios[0]['Usuario']['regiao'] != ""){
				$regiao = $rsUsuarios[0]['Usuario']['regiao']; 
			}
			

			if(isset($rsUsuarios[0]['Usuario']['nome_dominio']) && $rsUsuarios[0]['Usuario']['nome_dominio'] != ""){
				$Concessionaria = $rsUsuarios[0]['Usuario']['nome_dominio'];
			}
				

			if(isset($rsRevendas[0]['Redevendas']['peergroup']) && $rsRevendas[0]['Redevendas']['peergroup'] != ""){
				$peegroup = $rsRevendas[0]['Redevendas']['peergroup'];
			}

			
 			


			
			$header_row .= utf8_decode("$grupoc \t $Concessionaria \t $titulo \t $regiao  \t  $peegroup \t \n"); 
		
 		}





		$filename = "export_".date("Y.m.d").".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		echo($header_row);
		

		exit();
	} 
	



    public function exportar_concessionaria($id = null) {		

    	$this->autoRender=false;

$header_row = "regiao \t codigo_dominio \t nome_dominio \t \n";

    		
		$rsGAnhadores = $this->Ranking->query("SELECT * FROM usuarios Concessi GROUP BY codigo_dominio ORDER BY regiao");  
 		//limit 0, $vagaslimit 

		foreach ($rsGAnhadores as $ranking) {  

 			


 			//PEGAR INFO DAS CONCESSIONARIAS NA TABELA CADCLIC
 			$rsConcessionaria = $this->Ranking->query("SELECT * FROM usuarios CONCESSIONARIAS WHERE codigo_dominio = '".$ranking['Concessi']['codigo_dominio']."' 
 				AND (codigo_funcao_cadv = 'VD-CGV-90' OR /* GERENTE DE VENDAS/COORD TREINAMENTO */
				codigo_funcao_cadv = 'VD-GCV-97' OR /* GERENTE/SUPERV VD CORPORATE/VAREJO VD */
				codigo_funcao_cadv = 'VD-GNS-10' OR /* GERENTE VENDAS VEÍC NOVOS/SIGA */
				codigo_funcao_cadv = 'VD-GNU-15' OR /* GERENTE VENDAS VEÍC NOVOS/USADOS */
				codigo_funcao_cadv = 'VD-GNV-11' OR /* GERENTE/SUPERVISOR VD NOVOS/VAREJO VD */
				codigo_funcao_cadv = 'VD-GVC-68' OR /* GERENTE/SUPERVISOR VD DIRETAS CORPORATE */
				codigo_funcao_cadv = 'VD-GVD-70' OR /* GERENTE/SUPERVISOR DE VENDAS VAREJO VD */
				codigo_funcao_cadv = 'VD-GVN-06' OR /* GERENTE/SUPERVISOR VD VEÍCULOS NOVOS */
				codigo_funcao_cadv = 'VD-GVS-71' OR /* GERENTE/SUPERVISOR DE VENDAS SIGA/USADOS */
				codigo_funcao_cadv = 'VD-GVU-07' OR /* GERENTE/SUPERVISOR VD VEICULOS USADOS */
				codigo_funcao_cadv = 'GR-TRE-59' OR /* COORDENADOR DE TREINAMENTO */
				codigo_funcao_cadv = 'GR-DIR-18' /* OPERADOR/DIRETOR */
				)"); 
 			
			


			$regiao ="";
			$codigo_dominio = "";
			$nome_dominio ="";
 			if(count($rsConcessionaria) == 0){

 				$regiao = utf8_decode($ranking['Concessi']['regiao']);
 				$codigo_dominio = utf8_decode($ranking['Concessi']['codigo_dominio']);
 				$nome_dominio = utf8_decode($ranking['Concessi']['nome_dominio']);

 				$header_row .= "$regiao \t $codigo_dominio \t $nome_dominio \t \n";

 			}

 		}





		$filename = "export_".date("Y.m.d").".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		echo($header_row);
		

		exit();
	} 





    public function exportar_concessionariaporregiao($id = null) {		

    	$this->autoRender=false;

$header_row = "regiao \t codigo_dominio \t nome_dominio \t \n";

    		
		$rsGAnhadores = $this->Ranking->query("SELECT * FROM 95ganhadores Concessi GROUP BY codigo_dominio ORDER BY regiao");  
 		//limit 0, $vagaslimit 

		foreach ($rsGAnhadores as $ranking) {  

 			


 			//PEGAR INFO DAS CONCESSIONARIAS NA TABELA CADCLIC
 			$rsConcessionaria = $this->Ranking->query("SELECT * FROM usuarios CONCESSIONARIAS WHERE codigo_dominio = '".$ranking['Concessi']['codigo_dominio']."' 
 				AND (codigo_funcao_cadv = 'VD-CGV-90' OR /* GERENTE DE VENDAS/COORD TREINAMENTO */
				codigo_funcao_cadv = 'VD-GCV-97' OR /* GERENTE/SUPERV VD CORPORATE/VAREJO VD */
				codigo_funcao_cadv = 'VD-GNS-10' OR /* GERENTE VENDAS VEÍC NOVOS/SIGA */
				codigo_funcao_cadv = 'VD-GNU-15' OR /* GERENTE VENDAS VEÍC NOVOS/USADOS */
				codigo_funcao_cadv = 'VD-GNV-11' OR /* GERENTE/SUPERVISOR VD NOVOS/VAREJO VD */
				codigo_funcao_cadv = 'VD-GVC-68' OR /* GERENTE/SUPERVISOR VD DIRETAS CORPORATE */
				codigo_funcao_cadv = 'VD-GVD-70' OR /* GERENTE/SUPERVISOR DE VENDAS VAREJO VD */
				codigo_funcao_cadv = 'VD-GVN-06' OR /* GERENTE/SUPERVISOR VD VEÍCULOS NOVOS */
				codigo_funcao_cadv = 'VD-GVS-71' OR /* GERENTE/SUPERVISOR DE VENDAS SIGA/USADOS */
				codigo_funcao_cadv = 'VD-GVU-07' OR /* GERENTE/SUPERVISOR VD VEICULOS USADOS */
				codigo_funcao_cadv = 'GR-TRE-59' OR /* COORDENADOR DE TREINAMENTO */
				codigo_funcao_cadv = 'GR-DIR-18' /* OPERADOR/DIRETOR */
				)"); 
 			
			


			$regiao ="";
			$codigo_dominio = "";
			$nome_dominio ="";
 			if(count($rsConcessionaria) == 0){

 				$regiao = utf8_decode($ranking['Concessi']['regiao']);
 				$codigo_dominio = utf8_decode($ranking['Concessi']['codigo_dominio']);
 				$nome_dominio = utf8_decode($ranking['Concessi']['nome_dominio']);

 				$header_row .= "$regiao \t $codigo_dominio \t $nome_dominio \t \n";

 			}

 		}





		$filename = "export_".date("Y.m.d").".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		echo($header_row);
		

		exit();
	} 


}