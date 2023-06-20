<?php

App::uses('AppController', 'Controller');

App::import('Vendor', 'excel_reader/excel_reader2'); 
	
class RankingController extends AppController {

	public $name = 'Ranking';

	public $uses = array('Ranking', 'Rankingredevendas', 'Rankingavive','Usuario');

    public function beforeFilter() {

        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 123456); 
    }


    public function admin_exportar($id = null) {		

    	$this->autoRender=false;

    		
 		$rsRanking = $this->Ranking->query("SELECT * FROM ranking_redevendas rr where rr.id_ranking = $id");  

 		if (count($rsRanking) == 0) {
 			exit("Voce precisa importar o arquivo Estudo Vagas XLS!");
 		}


 		$rsRankingAvivec = $this->Ranking->query("SELECT * FROM ranking_avive rr where rr.id_ranking = $id");

 		if (count($rsRankingAvivec) == 0) {
 			exit("Voce precisa importar o arquivo AVIVEN XLS!");
 		}  

 		$header_row = "Cod \t Concessionaria \t Vagas - Opcao 2 \t Peer Group \t Telefone Superio \t Superio \t Superio Email \t Cargo \t Telefone Vendedor \t Nome Vendedor \t Email Vendedor \t CPF Vendedor \t Cargo \t Total de Vendas \t \n";

 		foreach ($rsRanking as $ranking) { 
 			
 			$peergroup = $ranking['rr']['peergroup'];
 			$codigo = $ranking['rr']['cod'];
 			$vagaslimit = $ranking['rr']['vagas'];
 			$concessionaria = $ranking['rr']['concessionaria']; 

 			/*
 			PEGAR USUARIOS COM CPF 0 e VARIO 
 			$rsRankingAvive = $this->Ranking->query("SELECT *, Count(ra.salesmanCPF) as total FROM ranking_avive ra 
 				where ra.salesdealer = '$codigo' 
 				AND ra.id_ranking = $id 
 				AND (ra.salesmanCPF = '0' OR ra.salesmanCPF = '')
 				GROUP BY ra.salesmanCPF ORDER BY total DESC");
 			*/
			/*
			//PRINCIPAL
			$rsRankingAvive = $this->Ranking->query("SELECT *, Count(ra.salesmanCPF) as total FROM ranking_avive ra 
 				INNER JOIN usuarios us ON (ra.salesmanCPF = us.cpf) where ra.salesdealer = '$codigo' 
 				AND ra.salesmanCPF != '0' AND ra.salesmanCPF != '' AND ra.id_ranking = $id 
 				AND us.nome_funcao_cadv LIKE '%VENDEDOR%' GROUP BY ra.salesmanCPF ORDER BY total DESC");
 				//limit 0,$vagaslimit
			*/
 			
			$rsRankingAvive = $this->Ranking->query("SELECT *, Count(ra.salesmanCPF) as total FROM ranking_avive ra 
 				INNER JOIN usuarios us ON (ra.salesmanCPF = us.cpf) where ra.salesdealer = '$codigo' 
 				AND ra.salesmanCPF != '0' AND ra.salesmanCPF != '' AND ra.id_ranking = $id 
 				AND (us.codigo_funcao_cadv = 'VD-VVN-01' OR us.codigo_funcao_cadv = 'VD-VNS-13' OR us.codigo_funcao_cadv = 'VD-VNU-12' OR us.codigo_funcao_cadv = 'VD-VNV-14')
 				GROUP BY ra.salesmanCPF ORDER BY total DESC limit 0,$vagaslimit");  
 						
 				if (count($rsRankingAvive) == 0) {
		 				//$header_row.= $ranking['rr']['cod']."\t".$ranking['rr']['concessionaria']."\t ".$ranking['rr']['vagas']."\t "."0"."\t "."0"."\t "."0"." \t \n"; 
 				}else{

		 			foreach ($rsRankingAvive as $aviven) { 

		 				$rsUsuarios = $this->Usuario->query("SELECT nome, superior_imediato, email, nome_funcao_cadv, celular FROM usuarios Usuario where Usuario.cpf = '".$aviven['ra']['salesmanCPF']."'");

		 				$nome = "";
		 				$email = "";
		 				$nomesuperior = "";
		 				$emailsuperrior = "";
		 				$nome_funcao_cadv = "";
		 				$funcaosupervisor ="";
		 				$celularSuperrior = "";
		 				$celularVendedor = "";


		 				if(isset($rsUsuarios[0]['Usuario']['nome']) && $rsUsuarios[0]['Usuario']['nome'] != ""){

		 					$nome = utf8_decode($rsUsuarios[0]['Usuario']['nome']);
		 					$email = utf8_decode($rsUsuarios[0]['Usuario']['email']); 
		 					$nome_funcao_cadv = utf8_decode($rsUsuarios[0]['Usuario']['nome_funcao_cadv']);
							
							if(isset($rsUsuarios[0]['Usuario']['celular']) && $rsUsuarios[0]['Usuario']['celular'] != ""){
									$celularVendedor = $rsUsuarios[0]['Usuario']['celular'];
							} 

		 					//$celularVendedor = $rsUsuarios[0]['Usuario']['celular'];

							//Pegar Nome do Superior 
							if(isset($rsUsuarios[0]['Usuario']['superior_imediato']) && $rsUsuarios[0]['Usuario']['superior_imediato'] != ""){

								$rsSuperior = $this->Usuario->query('SELECT nome,email,nome_funcao_cadv, celular FROM usuarios Usuario 
								where Usuario.nome = "'.$rsUsuarios[0]['Usuario']['superior_imediato'].'" limit 0,1');

								if(isset($rsSuperior[0]['Usuario']['nome']) && $rsSuperior[0]['Usuario']['nome'] != ""){
									$nomesuperior = utf8_decode($rsSuperior[0]['Usuario']['nome']);
								}
								if(isset($rsSuperior[0]['Usuario']['email']) && $rsSuperior[0]['Usuario']['email'] != ""){
									$emailsuperrior = utf8_decode($rsSuperior[0]['Usuario']['email']);
								}
								if(isset($rsSuperior[0]['Usuario']['nome_funcao_cadv']) && $rsSuperior[0]['Usuario']['nome_funcao_cadv'] != ""){
									$funcaosupervisor = utf8_decode($rsSuperior[0]['Usuario']['nome_funcao_cadv']);
								}

								if(isset($rsSuperior[0]['Usuario']['celular']) && $rsSuperior[0]['Usuario']['celular'] != ""){
									$celularSuperrior = $rsSuperior[0]['Usuario']['celular'];
								} 
		 					}   
		 					
		 					$header_row.= $ranking['rr']['cod']."\t".utf8_decode($ranking['rr']['concessionaria'])."\t ".$ranking['rr']['vagas']." \t ".$ranking['rr']['peergroup']." \t ".$celularSuperrior." \t ".$nomesuperior."\t ".$emailsuperrior."\t ".$funcaosupervisor."\t ". $celularVendedor ." \t ".$nome."\t ".$email."\t ".$aviven['ra']['salesmanCPF']."\t ".$nome_funcao_cadv."\t ".$aviven[0]['total']." \t \n";
		 				}
		 				//else{

		 					//$header_row.= $ranking['rr']['cod']."\t".$ranking['rr']['concessionaria']."\t ".$ranking['rr']['vagas']." \t ".$ranking['rr']['peergroup']." \t ".$nomesuperior."\t ".$emailsuperrior."\t ".$nome."\t ".$email."\t ".$aviven['ra']['salesmanCPF']."\t ".$nome_funcao_cadv."\t ".$aviven[0]['total']." \t \n";

		 				//}

					}



					//LISTAR GERENTES/OPERTADOR DA CONCESSIONARIA
					$rsGETENTESOPERADOR = $this->Ranking->query("SELECT nome,email,nome_funcao_cadv, celular FROM usuarios GR 
 					where GR.codigo_dominio LIKE '%$codigo%' 
 					AND (GR.codigo_funcao_cadv = 'GR-CTT-88' OR GR.codigo_funcao_cadv = 'VD-CGV-90'
 						OR GR.codigo_funcao_cadv = 'VD-GNS-10' OR GR.codigo_funcao_cadv = 'VD-GNU-15'
 						OR GR.codigo_funcao_cadv = 'VD-GNV-11' OR GR.codigo_funcao_cadv = 'VD-GVN-06'
 						OR GR.codigo_funcao_cadv = 'GR-DIR-18') GROUP BY GR.cpf");

					foreach ($rsGETENTESOPERADOR as $gerenteoperador) { 
						$celular = "";
						if(isset($gerenteoperador['GR']['celular']) && $gerenteoperador['GR']['celular'] != ""){
									$celular = $gerenteoperador['GR']['celular'];
						} 

						//VErifica se o se o superviso ja foi cadastrado
						if(isset($emailsuperrior) && $emailsuperrior != utf8_decode($gerenteoperador['GR']['email'])){
						$header_row.= $ranking['rr']['cod']."\t".utf8_decode($ranking['rr']['concessionaria'])."\t ".$ranking['rr']['vagas']." \t ".$ranking['rr']['peergroup']." \t ".$celular." \t ".utf8_decode($gerenteoperador['GR']['nome'])."\t ".utf8_decode($gerenteoperador['GR']['email'])."\t ".utf8_decode($gerenteoperador['GR']['nome_funcao_cadv'])." \t \n";
						} 

					}


		 			$header_row.= ""."\t".""."\t ".""."\t ".""."\t ".""."\t ".""." \t \n";

	 			}



 		}


		$filename = "export_".date("Y.m.d").".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		echo($header_row);


		exit();
	} 

	public function admin_index() {		

		$this->layout = 'cms';
	} 

	public function admin_delete($id = null)
	{	

		$rsRankingavive = $this->Rankingavive->query("DELETE FROM ranking_avive WHERE id_ranking = $id");

		$rsRankingredevendas = $this->Rankingredevendas->query("DELETE FROM ranking_redevendas WHERE id_ranking = $id"); 

		$this->Ranking->id = $id; 
		$this->Ranking->delete($id);
		$this->redirect(array('controller' => 'ranking', 'action' => 'admin_index')); 
	}

	public function admin_jsondata() {

		$options = array(
				'order' => array('Ranking.id' => 'DESC')
			); 
		$rsRanking = $this->Ranking->find('all',$options);         

			
		$a = array();

		foreach ($rsRanking as $ranking){

			$a[] = array(
				$ranking['Ranking']['id'],
				$ranking['Ranking']['nome'],
				$ranking['Ranking']['created'],
				'<a href="'.$this->base.'/admin/ranking/importarranking/'.$ranking['Ranking']['id'].'" >[Importar Estudo Vagas XLS]</a> &nbsp;&nbsp;'.
				'<a href="'.$this->base.'/admin/ranking/importarrankingavive/'.$ranking['Ranking']['id'].'" >[Importar AVIVEN XLS]</a> &nbsp;&nbsp;'.
				'<a href="'.$this->base.'/admin/ranking/edit/'.$ranking['Ranking']['id'].'">[Editar]</a>  &nbsp;&nbsp;'.	
				'<a href="'.$this->base.'/admin/ranking/delete/'.$ranking['Ranking']['id'].'" >[Excluir]</a>  &nbsp;&nbsp;'.
				'<a href="'.$this->base.'/admin/ranking/exportar/'.$ranking['Ranking']['id'].'" target="_blank" >[Exportar Ranking]</a>  &nbsp;&nbsp;'
				); 
		}

		echo "{\"aaData\":" . json_encode($a) . "}";
		exit();

	}

	public function admin_edit($id = null) {

		$this->Ranking->id = $id; 


		if (empty($this->data)) { 
     		$this->data = $this->Ranking->read(); 
    	}  

		if ($this->request->is('post')) {


			 $this->Ranking->save($this->request->data, array('validate' => false));

			 $idRanking = $this->Ranking->id;
		 

			 $this->Session->setFlash('Registro Salvo com sucesso.'); 

			 $this->redirect(array('controller' => 'ranking', 'action' => 'admin_edit/'.$idRanking));

		}


		$this->layout = 'cms';

	} 



	public function admin_importarranking($id = null) {
		
		$this->set('id_ranking', $id); 
		$this->layout = 'cms';
	}


	public function admin_importarrankingavive($id = null) {
	
		$this->set('id_ranking', $id); 
		$this->layout = 'cms';
	}


	function limparstring($text){

		$text = utf8_encode($text);

		return $text;
		
	}    

	//IMPORT ESTUDO VAGAS XLS
	public function admin_importestudovagasxls($id_ranking = null, $xml = null) {

		if($xml == null){

			exit('erro');
		}   

		$data = new Spreadsheet_Excel_Reader('js/libs/file_upload/server/php/files/'.$xml, true);
			
		$countRanking = 1;
		foreach ($data->sheets[0]['cells'] as $value){

		if($countRanking > 1){


				
			$this->Rankingredevendas->create();  

			$rsRankingredevendas['Rankingredevendas']['id_ranking'] = $id_ranking;			

			//cod
			$cod = (isset($value[1]) ? $value[1] : "");
			$rsRankingredevendas['Rankingredevendas']['cod'] = $this->limparstring($cod);

			//concessionaria 
			$concessionaria  = (isset($value[2]) ? $value[2] : "");
			$rsRankingredevendas['Rankingredevendas']['concessionaria'] = $this->limparstring($concessionaria);

			//peergroup
			$peergroup = (isset($value[3]) ? $value[3] : "");
			$rsRankingredevendas['Rankingredevendas']['peergroup'] = $this->limparstring($peergroup);

			//vagas
			$vagas = (isset($value[4]) ? $value[4] : "");
			$rsRankingredevendas['Rankingredevendas']['vagas'] = $this->limparstring($vagas);

			$this->Rankingredevendas->save($rsRankingredevendas);
		} 

			$countRanking++;
		}    

		echo 1;
		exit();
	
	}  

	// IMPORT AVIVE XLS
	public function admin_importavivesxls($id_ranking = null, $xml = null) {

		if($xml == null){
			exit('erro');
		}   

		$data = new Spreadsheet_Excel_Reader('js/libs/file_upload/server/php/files/'.$xml, true);
			
		$countRanking = 1;
		foreach ($data->sheets[0]['cells'] as $value){

			if($countRanking > 1){

				$this->Rankingavive->create();  

				$rsAVIVE['Rankingavive']['id_ranking'] = $id_ranking; 				

				//cod
				$salesdealer = (isset($value[1]) ? $value[1] : "");
				$rsAVIVE['Rankingavive']['salesdealer'] = $this->limparstring($salesdealer);

				//concessionaria 
				$salesmanCPF  = (isset($value[2]) ? $value[2] : "");
				$rsAVIVE['Rankingavive']['salesmanCPF'] = $this->limparstring($salesmanCPF);


				$this->Rankingavive->save($rsAVIVE);
			} 

			$countRanking++;
		}

		echo 1;
		exit(); 
	}

	
}