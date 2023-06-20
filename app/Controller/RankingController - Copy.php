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

    		
 		$rsRanking = $this->Ranking->query("SELECT * FROM cadcli2014v3 rr WHERE vagas = 1 Group by rr.cod 
 			INNER JOIN vendas ON (ra.salesmanCPF = us.cpf)");


 		//Cód.  |  Filial  | Região  | Peer Group  | Nome Vendedor  |  CFP Vendedor  |  RG Vendedor  | Função |  Endereço Vendedor  |  Email Vendedor  |  Fone Vendedor  |  Endereço Concessionária  | Fone Concessionária  |  Operador Diretor  |  Responsável  |  Cargo Responsável  | Salesman	

 				$header_row = " \t";
                $header_row .= "Cód \t";                
                $header_row .= "Região \t";
                $header_row .= "Peer Group \t";
                //$header_row .= "Vagas \t";
                $header_row .= "Nome Vendedor \t";
                $header_row .= "Email Vendedor \t";
                $header_row .= "Status Vendedor \t";
                $header_row .= "CPF Vendedor \t";
                $header_row .= "RG Vendedor \t";
                $header_row .= "Função \t";                
                $header_row .= "Fone Vendedor \t";
                
                $header_row .= "Grupo \t";
                $header_row .= "Concessionária \t";
                $header_row .= "Email Concessionária \t";
                $header_row .= "Endereço Concessionária \t";
                $header_row .= "Fone Concessionária \t";
                $header_row .= "Operador Concessionária \t";
                $header_row .= "Email Operador Concessionária \t";                                 
                $header_row .= "Responsável \t";
                $header_row .= "Cargo Responsável \t";                       
                $header_row .= "Total Vendas \t";

                $header_row .= "PONTOS \t"; 

                //$header_row .= "Target Campaign  \t"; 



                $header_row .= "\n";                    



 		foreach ($rsRanking as $ranking) {

 			$rspeergroupr = $ranking['rr']['perrgroup'];
 			$codigo = $ranking['rr']['cod'];

 			//se for 1 ele esta participando 
 			$vagaslimit = $ranking['rr']['vagas']; 			
 				

 			$filialSQL = "";
 			$codigoSQL = "";
 			$totalvendasANTIGO = "";

 			//PEGAR FILIAL
 			$rsFilial = $this->Ranking->query("SELECT * FROM cadcli2014v3 filial WHERE filial.cod = '$codigo'"); 



 			//echo "SELECT * FROM cadcli2014v3 filial WHERE filial.cod = '$codigo'   <br><br>"; 
 	
 			

 			foreach ($rsFilial as $filial) {

 				if($filial['filial']['filial'] != ""){ 

 					$filialSQL .= ",' ".$filial['filial']['filial']."'";
 				}
 				 		
 			}
			
			$codigoSQL = "'".$codigo."'".$filialSQL;

			$codigoSQL = str_replace(" ", "", $codigoSQL);
			
			//echo $codigoSQL."<br><br>";

			//PRINCIPAL 
			//BASE ORIGINAL DO AVIVEN TABLE 23 
			//BASE TABLE 30 E O ORIGINAL 
			$rsRankingAvive = $this->Ranking->query("SELECT *, Count(ra.SALESMANCPF) as total FROM `table 32` ra 
 				INNER JOIN usuarios us ON (ra.SALESMANCPF = us.cpf) where ra.SalesDealer IN($codigoSQL) 
 				AND ra.SALESMANCPF != '0' AND ra.SALESMANCPF != '' AND ra.`SalesTypeLevel2` =  'Dealer' AND us.codigo_funcao_cadv IN('VD-VNS-13','VD-VNU-12','VD-VNV-14','VD-VVD-69','VD-VVN-01')
 				GROUP BY us.cpf ORDER BY total DESC");
 					

				//AND us.codigo_funcao_cadv IN('VD-VNS-13','VD-VNU-12','VD-VNV-14','VD-VVD-69','VD-VVN-01')   
 				
		 				if (count($rsRankingAvive) == 0) { 
				 				$header_row.= "Nenhum registro encontrado no AVIVEN : $codigoSQL   \t "."0"."\t "."0"."\t "."0"." \t \n";
		 				}else{

							foreach ($rsRankingAvive as $aviven) { 

					                $Filial = "";
					                $cod = "";					                
					                $regiao = "";
					                $peergroup = "";
					               //$vagas = "";
					                $nomevendedor = "";
					                $emailvendedor = "";
					                $statusvendedor = "";
					                $cpfvendedor = "";
					                $rgvendedor = "";
					                $funcao = "";                
					                $fonevendedor = "";
					                $congrupo = "";
					                $concessionaria = "";
					                $concessionariaemail = "";
					                $enderecoconcessionaria = "";
					                $fonceconcessionaria = "";
					                $coordenadorconcessi = "";
					                $emailcoordenador = "";                               
					                $responsavel = "";
					                $cargoresponsavel = "";                       
					                $totalvendas = "";




					 				$rsUsuarios = $this->Usuario->query("SELECT * FROM usuarios Usuario where Usuario.cpf = '".$aviven['ra']['SalesmanCPF']."' limit 0,1");

									if(isset($rsUsuarios[0]['Usuario']['superior_imediato']) && $rsUsuarios[0]['Usuario']['superior_imediato'] != ""){

										$rsSuperior = $this->Usuario->query('SELECT nome,email,nome_funcao_cadv, celular FROM usuarios Usuario 
										where Usuario.nome = "'.$rsUsuarios[0]['Usuario']['superior_imediato'].'" limit 0,1');

										$responsavel = utf8_encode($rsSuperior[0]['Usuario']['nome']);
					                	$cargoresponsavel = utf8_encode($rsSuperior[0]['Usuario']['nome_funcao_cadv']);

				 					}     


					 				$codigoSALESDEAL = str_replace(" ", "", $aviven['ra']['SalesDealer']); 


					 				$rsConcessionaria = $this->Usuario->query("SELECT * FROM concessionarias Concessionarias where Concessionarias.codigodominio = '".$codigoSALESDEAL."' limit 0,1");


					 				$rspeergroupr = "";
					 				$rspeergroupprimeiro = $this->Usuario->query("SELECT * FROM cadcli2014v3 cadcli where cadcli.cod = '".$codigoSALESDEAL."' limit 0,1"); 					 								 				

					 				if(isset($rspeergroupprimeiro[0]['cadcli']['perrgroup']) && $rspeergroupprimeiro[0]['cadcli']['perrgroup'] != ""){

					 					$rspeergroupr = $rspeergroupprimeiro[0]['cadcli']['perrgroup']; 
					 					
					 				}else{  

					 					$rspeergroupsegundo = $this->Usuario->query("SELECT * FROM cadcli2014v3 cadcli where cadcli.filial = '".$codigoSALESDEAL."' limit 0,1");

					 					$rspeergroupr = $rspeergroupsegundo[0]['cadcli']['perrgroup']; 
					 					
					 				} 



					 				$Filial = ""; 
					                $cod = $aviven['ra']['SalesDealer'];	 				                
					                $regiao = utf8_encode($rsConcessionaria[0]['Concessionarias']['regiao']);
					                $peergroup = $rspeergroupr;
					                //$vagas = $vagaslimit;
					                $nomevendedor = utf8_encode($rsUsuarios[0]['Usuario']['nome']); 
					                $emailvendedor = $rsUsuarios[0]['Usuario']['email'];
					                $statusvendedor = $rsUsuarios[0]['Usuario']['status'];
					                $cpfvendedor = $aviven['ra']['SalesmanCPF']; 
					                $rgvendedor = $rsUsuarios[0]['Usuario']['rg'];
					                $funcao = utf8_encode($rsUsuarios[0]['Usuario']['nome_funcao_cadv']); 
					                $fonevendedor = $rsUsuarios[0]['Usuario']['celular'];
					                $congrupo = utf8_encode($rsConcessionaria[0]['Concessionarias']['congrupo']);
					                $concessionaria = utf8_encode($rsConcessionaria[0]['Concessionarias']['nomefantasia']);
					                $concessionariaemail = utf8_encode($rsConcessionaria[0]['Concessionarias']['email']);
					                $enderecoconcessionaria = utf8_encode($rsConcessionaria[0]['Concessionarias']['endereco']);
					                $fonceconcessionaria = utf8_encode($rsConcessionaria[0]['Concessionarias']['telefone']);
					                $coordenadorconcessi = utf8_encode($rsConcessionaria[0]['Concessionarias']['nomecoordenador']);
					                $emailcoordenador = utf8_encode($rsConcessionaria[0]['Concessionarias']['emailcoordenador']); 
					                //$responsavel = "";
					                //$cargoresponsavel = "";                       
					                $totalvendas = $aviven[0]['total'];  

					                //this pe of code are the busness rules 
									$pontos = $totalvendas * 50;


									//if($totalvendas >= 5){  
										
						                $header_row .= $this->limparstringexport($Filial)." \t";
										$header_row .= $this->limparstringexport($cod)." \t";									
										$header_row .= $this->limparstringexport($regiao)." \t";
										$header_row .= $this->limparstringexport($peergroup)." \t";
										//$header_row .= $this->limparstringexport($vagas)." \t";
										$header_row .= $this->limparstringexport($nomevendedor)." \t";
										$header_row .= $this->limparstringexport($emailvendedor)." \t";
										$header_row .= $this->limparstringexport($statusvendedor)." \t";
										$header_row .= $this->limparstringexport($cpfvendedor)." \t";
										$header_row .= $this->limparstringexport($rgvendedor)." \t";
										$header_row .= $this->limparstringexport($funcao)." \t";
										$header_row .= $this->limparstringexport($fonevendedor)." \t";
										$header_row .= $this->limparstringexport($congrupo)." \t";
										$header_row .= $this->limparstringexport($concessionaria)." \t";
										$header_row .= $this->limparstringexport($concessionariaemail)." \t"; 
										

										$header_row .= $this->limparstringexport($enderecoconcessionaria)." \t";
										$header_row .= $this->limparstringexport($fonceconcessionaria)." \t";
										$header_row .= $this->limparstringexport($coordenadorconcessi)." \t";
										$header_row .= $this->limparstringexport($emailcoordenador)." \t";
										$header_row .= $this->limparstringexport($responsavel)." \t";
										$header_row .= $this->limparstringexport($cargoresponsavel)." \t";
										$header_row .= $this->limparstringexport($totalvendas)." \t"; 
										$header_row .= $this->limparstringexport($pontos)." \t";  
										$header_row .= "\n"; 


									//}

								}    	

				 		}   
		 							 			
		 				

				 		$header_row.= ""."\t".""."\t ".""."\t ".""."\t ".""."\t ".""." \t \n";
					}



		 			

	 			


		$header_row = utf8_decode($header_row);	

		$filename = "export_".date("Y.m.d").".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		echo($header_row);
	

		exit(); 

 		}








    public function admin_exportargerente($id = null) {	

    	$this->autoRender=false; 

    		
 		$rsRanking = $this->Ranking->query("SELECT * FROM cadcli2014v3 rr WHERE vagas = 1 Group by rr.cod"); 



 		//Cód.  |  Filial  | Região  | Peer Group  | Nome Vendedor  |  CFP Vendedor  |  RG Vendedor  | Função |  Endereço Vendedor  |  Email Vendedor  |  Fone Vendedor  |  Endereço Concessionária  | Fone Concessionária  |  Operador Diretor  |  Responsável  |  Cargo Responsável  | Salesman	

 				$header_row = "Matriz \t";
                $header_row .= "Cód \t";                
                $header_row .= "Região \t";
                $header_row .= "Peer Group \t";
                //$header_row .= "Vagas \t";
                $header_row .= "Nome Gerente \t";
                $header_row .= "Email Gerente \t";
                $header_row .= "Status Gerente \t";
                $header_row .= "CPF Gerente \t";
                $header_row .= "RG Gerente \t";
                $header_row .= "Função \t";                
                $header_row .= "Fone Gerente \t";
                
                $header_row .= "Grupo \t";
                $header_row .= "Concessionária \t";
                $header_row .= "Email Concessionária \t";
                $header_row .= "Endereço Concessionária \t";
                $header_row .= "Fone Concessionária \t";
                $header_row .= "Operador Concessionária \t";
                $header_row .= "Email Operador Concessionária \t";                                 
                $header_row .= "Responsável \t";
                $header_row .= "Cargo Responsável \t";                                       

                $header_row .= "PONTOS \t"; 

                //$header_row .= "Target Campaign  \t"; 



                $header_row .= "\n";                    



 		foreach ($rsRanking as $ranking) {

 			$rspeergroupr = "";

 			$codigo = $ranking['rr']['cod'];

 			//se for 1 ele esta participando 
 			$vagaslimit = $ranking['rr']['vagas']; 			
 			

 			$filialSQL = "";
 			$codigoSQL = "";
 			$totalvendasANTIGO = "";

 			//PEGAR FILIAL
 			$rsFilial = $this->Ranking->query("SELECT * FROM cadcli2014v3 filial WHERE filial.cod = '$codigo'"); 

 			foreach ($rsFilial as $filial) {

 				if($filial['filial']['filial'] != ""){

 					$filialSQL .= ",' ".$filial['filial']['filial']."001'"; 
 				}
 				 		
 			}
			
			$codigoSQL = "'".$codigo."001'".$filialSQL; 

			$codigoSQL = str_replace(" ", "", $codigoSQL);
			
			
			echo $codigoSQL."<br><br>";


			
			$rsRankingAvive = $this->Ranking->query("SELECT * FROM `usuarios` us where us.codigo_dominio IN($codigoSQL) AND 
				us.codigo_funcao_cadv IN('VD-GNS-10','VD-GNU-15','VD-GNV-11','VD-GVN-06')
 				GROUP BY us.cpf ORDER BY us.id DESC");
 							 							 
		 				if (count($rsRankingAvive) == 0) { 
				 				$header_row.= "Nenhum GERENTE FOI ENCONTRADO EM $codigoSQL   \t "."0"."\t "."0"."\t "."0"." \t \n";  
		 				}else{  


							foreach ($rsRankingAvive as $aviven) { 

					                $Filial = "";
					                $cod = "";					                
					                $regiao = "";
					                $peergroup = "";
					               //$vagas = "";
					                $nomevendedor = "";
					                $emailvendedor = "";
					                $statusvendedor = "";
					                $cpfvendedor = "";
					                $rgvendedor = "";
					                $funcao = "";                
					                $fonevendedor = "";
					                $congrupo = "";
					                $concessionaria = "";
					                $concessionariaemail = "";
					                $enderecoconcessionaria = "";
					                $fonceconcessionaria = "";
					                $coordenadorconcessi = "";
					                $emailcoordenador = "";                               
					                $responsavel = "";
					                $cargoresponsavel = "";                        					                

					                		
					                

					 				$rsUsuarios = $this->Usuario->query("SELECT * FROM usuarios Usuario where Usuario.cpf = '".$aviven['us']['cpf']."' limit 0,1");

									if(isset($rsUsuarios[0]['Usuario']['superior_imediato']) && $rsUsuarios[0]['Usuario']['superior_imediato'] != ""){

										$rsSuperior = $this->Usuario->query('SELECT nome,email,nome_funcao_cadv, celular FROM usuarios Usuario 
										where Usuario.nome = "'.$rsUsuarios[0]['Usuario']['superior_imediato'].'" limit 0,1');

										$responsavel = utf8_encode($rsSuperior[0]['Usuario']['nome']);
					                	$cargoresponsavel = utf8_encode($rsSuperior[0]['Usuario']['nome_funcao_cadv']);

				 					}      

				 					//acho q aki vai ter problema
					 				$codigoSALESDEAL = str_replace(" ", "", substr($aviven['us']['codigo_dominio'], 0, -3)); 


					 				//PEGAR PEERGROUP 

					 				$rspeergroupprimeiro = $this->Usuario->query("SELECT * FROM cadcli2014v3 cadcli where cadcli.cod = '".$codigoSALESDEAL."' limit 0,1"); 
					 			

					 				$rspeergroupr = "";

					 				if(isset($rspeergroupprimeiro[0]['cadcli']['perrgroup']) && $rspeergroupprimeiro[0]['cadcli']['perrgroup'] != ""){

					 					$rspeergroupr = $rspeergroupprimeiro[0]['cadcli']['perrgroup']; 
					 					
					 				}else{  

					 					$rspeergroupsegundo = $this->Usuario->query("SELECT * FROM cadcli2014v3 cadcli where cadcli.filial = '".$codigoSALESDEAL."' limit 0,1");

					 					$rspeergroupr = $rspeergroupsegundo[0]['cadcli']['perrgroup']; 
					 					
					 				}  

					 				$rspontos = "";

					 				//SETA OS PONTOS EN RELAXCAO AO PEERGRUOP
					 				if($rspeergroupr == 1){

					 					$rspontos = "500";

					 				}else if($rspeergroupr == 2){

					 					$rspontos = "500";

					 				}else if($rspeergroupr == 3){

					 					$rspontos = "500";

					 				}else if($rspeergroupr == 4){

					 					$rspontos = "1000";

					 				}else if($rspeergroupr == 5){

					 					$rspontos = "1000";

					 				}else if($rspeergroupr == 6){

					 					$rspontos = "1000";

					 				}else if($rspeergroupr == 7){

					 					$rspontos = "1500";

					 				}else if($rspeergroupr == 8){

					 					$rspontos = "1500";

					 				} 




					 				$rsConcessionaria = $this->Usuario->query("SELECT * FROM concessionarias Concessionarias where Concessionarias.codigodominio = '".$codigoSALESDEAL."' limit 0,1");

					 				$Filial ="";
					                $cod = $aviven['us']['codigo_dominio'];  				                
					                $regiao = utf8_encode($rsConcessionaria[0]['Concessionarias']['regiao']); 
					                $peergroup = $rspeergroupr; 
					                //$vagas = $vagaslimit;
					                $nomevendedor = utf8_encode($rsUsuarios[0]['Usuario']['nome']); 
					                $emailvendedor = $rsUsuarios[0]['Usuario']['email'];
					                $statusvendedor = $rsUsuarios[0]['Usuario']['status'];
					                $cpfvendedor = $aviven['us']['cpf']; 
					                $rgvendedor = $rsUsuarios[0]['Usuario']['rg'];
					                $funcao = utf8_encode($rsUsuarios[0]['Usuario']['nome_funcao_cadv']); 
					                $fonevendedor = $rsUsuarios[0]['Usuario']['celular'];
					                $congrupo = utf8_encode($rsConcessionaria[0]['Concessionarias']['congrupo']);
					                $concessionaria = utf8_encode($rsConcessionaria[0]['Concessionarias']['nomefantasia']);
					                $concessionariaemail = utf8_encode($rsConcessionaria[0]['Concessionarias']['email']);
					                $enderecoconcessionaria = utf8_encode($rsConcessionaria[0]['Concessionarias']['endereco']);
					                $fonceconcessionaria = utf8_encode($rsConcessionaria[0]['Concessionarias']['telefone']);
					                $coordenadorconcessi = utf8_encode($rsConcessionaria[0]['Concessionarias']['nomecoordenador']);
					                $emailcoordenador = utf8_encode($rsConcessionaria[0]['Concessionarias']['emailcoordenador']); 
					                //$responsavel = "";
					                //$cargoresponsavel = "";                      
					                //this pe of code are the busness rules 
									$pontos = $rspontos;   


					                $header_row .= $this->limparstringexport($Filial)." \t";
									$header_row .= $this->limparstringexport($cod)." \t";									
									$header_row .= $this->limparstringexport($regiao)." \t";
									$header_row .= $this->limparstringexport($peergroup)." \t";
									//$header_row .= $this->limparstringexport($vagas)." \t";
									$header_row .= $this->limparstringexport($nomevendedor)." \t";
									$header_row .= $this->limparstringexport($emailvendedor)." \t";
									$header_row .= $this->limparstringexport($statusvendedor)." \t";
									$header_row .= $this->limparstringexport($cpfvendedor)." \t";
									$header_row .= $this->limparstringexport($rgvendedor)." \t";
									$header_row .= $this->limparstringexport($funcao)." \t";
									$header_row .= $this->limparstringexport($fonevendedor)." \t";
									$header_row .= $this->limparstringexport($congrupo)." \t";
									$header_row .= $this->limparstringexport($concessionaria)." \t";
									$header_row .= $this->limparstringexport($concessionariaemail)." \t"; 
									

									$header_row .= $this->limparstringexport($enderecoconcessionaria)." \t";
									$header_row .= $this->limparstringexport($fonceconcessionaria)." \t";
									$header_row .= $this->limparstringexport($coordenadorconcessi)." \t";
									$header_row .= $this->limparstringexport($emailcoordenador)." \t";
									$header_row .= $this->limparstringexport($responsavel)." \t";
									$header_row .= $this->limparstringexport($cargoresponsavel)." \t";									
									$header_row .= $this->limparstringexport($pontos)." \t";  
									$header_row .= "\n"; 


								}  	

				 		}   
		 							 			
		 				

				 		$header_row.= ""."\t".""."\t ".""."\t ".""."\t ".""."\t ".""." \t \n";
					}



		 			

	 			
/*

		$header_row = utf8_decode($header_row);	

		$filename = "export_".date("Y.m.d").".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		echo($header_row);
*/	

		exit();
 
 		}  




 	//FUNCAO PARA PEGAR GERENTE QUE NAO ESTA NO EXECEL
    public function admin_exportargerenteteste($id = null) {	



    	$this->autoRender=false;  

    		
 		$rsRanking = $this->Ranking->query("SELECT * FROM cadcli2014v3 rr WHERE vagas = 1 Group by rr.cod"); 



                $header_row .= "\n";                    



 		foreach ($rsRanking as $ranking) {

 			$rspeergroupr = "";

 			$codigo = $ranking['rr']['cod'];
 			$codigo2 = $ranking['rr']['cod']."001";

 			//se for 1 ele esta participando 
 			$vagaslimit = $ranking['rr']['vagas']; 			
 			

			$rsRankingAvive = $this->Ranking->query("SELECT * FROM `usuarios` us where us.codigo_dominio IN('$codigo2') 
 				AND us.codigo_funcao_cadv IN('VD-GNS-10','VD-GNU-15','VD-GNV-11','VD-GVN-06')
 				GROUP BY us.cpf ORDER BY us.id DESC");    

			
 			if($rsRankingAvive[0]['us']['id'] == ""){

 				echo $codigo2."<br>";

 			} 


 			$filialSQL = "";
 			$codigoSQL = "";
 			$totalvendasANTIGO = "";

 			//PEGAR FILIAL
 			$rsFilial = $this->Ranking->query("SELECT * FROM cadcli2014v3 filial WHERE filial.cod = '$codigo'"); 

 			foreach ($rsFilial as $filial) {

 				if($filial['filial']['filial'] != ""){

 					$filialSQL = $filial['filial']['filial']."001"; 

	 				$rsRankingAvive = $this->Ranking->query("SELECT * FROM `usuarios` us where us.codigo_dominio IN('$filialSQL') 
	 				AND us.codigo_funcao_cadv IN('VD-GNS-10','VD-GNU-15','VD-GNV-11','VD-GVN-06')
	 				GROUP BY us.cpf ORDER BY us.id DESC");     


	 				 if($rsRankingAvive[0]['us']['id'] == ""){

		 				echo $filialSQL."<br>";

		 			}


 				} 
 				 		
 			}
			
		 				
		 								 	

	} 



		 			

	

		exit();

 		}





 	//FUNCAO PARA PEGAR GERENTE QUE NAO ESTA NO EXECEL
    public function admin_exportarvendedorteste($id = null) {	



    	$this->autoRender=false;  

    			
 		$rsRanking = $this->Ranking->query("SELECT * FROM cadcli2014v3 rr WHERE vagas = 1 Group by rr.cod"); 



                   

 		foreach ($rsRanking as $ranking) {

 			$rspeergroupr = "";

 			$codigo = $ranking['rr']['cod'];
 			$codigo2 = $ranking['rr']['cod'];

 			//se for 1 ele esta participando 
 			$vagaslimit = $ranking['rr']['vagas'];  			
 			


			$rsRankingAvive = $this->Ranking->query("SELECT *, Count(ra.SALESMANCPF) as total FROM `table 32` ra 
 				INNER JOIN usuarios us ON (ra.SALESMANCPF = us.cpf) where ra.SalesDealer IN('$codigo2') 
 				AND ra.SALESMANCPF != '0' AND ra.SALESMANCPF != '' AND ra.`SalesTypeLevel2` =  'Dealer' AND us.codigo_funcao_cadv IN('VD-VNS-13','VD-VNU-12','VD-VNV-14','VD-VVD-69','VD-VVN-01')
 				GROUP BY us.cpf ORDER BY total DESC"); 


 			if($rsRankingAvive[0]['ra']['SalesDealer'] == ""){

 				echo $codigo2."<br>"; 

 			}


 			$filialSQL = "";
 			$codigoSQL = "";
 			$totalvendasANTIGO = "";

 			//PEGAR FILIAL
 			$rsFilial = $this->Ranking->query("SELECT * FROM cadcli2014v3 filial WHERE filial.cod = '$codigo'"); 

 			foreach ($rsFilial as $filial) {

 				if($filial['filial']['filial'] != ""){

 					$filialSQL = $filial['filial']['filial']; 



			$rsRankingAvive = $this->Ranking->query("SELECT *, Count(ra.SALESMANCPF) as total FROM `table 32` ra 
 				INNER JOIN usuarios us ON (ra.SALESMANCPF = us.cpf) where ra.SalesDealer IN('$filialSQL') 
 				AND ra.SALESMANCPF != '0' AND ra.SALESMANCPF != '' AND ra.`SalesTypeLevel2` =  'Dealer' AND us.codigo_funcao_cadv IN('VD-VNS-13','VD-VNU-12','VD-VNV-14','VD-VVD-69','VD-VVN-01')
 				GROUP BY us.cpf ORDER BY total DESC"); 
 

	 				 if($rsRankingAvive[0]['ra']['SalesDealer'] == ""){

	 				 echo $filialSQL."<br>";


		 			}


 				} 
 				 		
 			}
			
		 				
		 								 	

	} 



		 			

	

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



    function limparstringexport($text){
        $text = utf8_decode($text);

        $text = preg_replace("/\r\n|\n\r|\n|\r/", " ", $text);
        return $text;
        
    } 
       public function admin_enderecos($id = null) {     


                //Monta o SQL com os campo selecionados pelo usuarios
                $montSQL = "SELECT * FROM gerentes as Gerentes";                   
                $rsUsuario = $this->Usuario->query($montSQL);




                $header_row = "Código Domínio \t";
                $header_row .= "Nome Domínio \t";
                $header_row .= "Nome       \t";
                $header_row .= "CPF \t";
                $header_row .= "Nome Função CADV     \t";

                $header_row .= "Endereço   \t";
                $header_row .= "Cidade   \t";
                $header_row .= "Bairro   \t";
                $header_row .= "Estado   \t";
                $header_row .= "CEP   \t";
                $header_row .= "Telefone   \t";
                $header_row .= "Fax   \t";
                $header_row .= "e-Mail   \t"; 

                

                $header_row .= "\n"; 
                $header_row = utf8_decode($header_row);

                foreach ($rsUsuario as $usuario) {


                //PEGAR ENDERECOS
                $codigodominioend = $usuario['Gerentes']['Codigo_dominio'].'001';
                $codigodominioend = str_replace(" ", "", $codigodominioend);
                $montSQLEnd = "SELECT * FROM enderecos as Enderecos WHERE codigo_dominio = '$codigodominioend' limit 0,1";                   
                $rsEnderesos = $this->Usuario->query($montSQLEnd);  
                //PEGAR ENDERECOS


                $header_row .= $this->limparstringexport($usuario['Gerentes']['Codigo_dominio'])." \t";
                $header_row .= $this->limparstringexport($usuario['Gerentes']['Nome_Dominio'])." \t";
                $header_row .= $this->limparstringexport($usuario['Gerentes']['Nome'])." \t";
                $header_row .= $this->limparstringexport($usuario['Gerentes']['CPF'])." \t";
                $header_row .= $this->limparstringexport($usuario['Gerentes']['Nome_Funcao CADV'])." \t"; 

                if(isset($rsEnderesos[0]['Enderecos']['endereco'])){

	                $header_row .= $this->limparstringexport($rsEnderesos[0]['Enderecos']['endereco'])." \t"; 
	                $header_row .= $this->limparstringexport($rsEnderesos[0]['Enderecos']['Cidade'])." \t"; 
	                $header_row .= $this->limparstringexport($rsEnderesos[0]['Enderecos']['Bairro'])." \t"; 
	                $header_row .= $this->limparstringexport($rsEnderesos[0]['Enderecos']['Estado'])." \t"; 
	                $header_row .= $this->limparstringexport($rsEnderesos[0]['Enderecos']['CEP'])." \t"; 
	                $header_row .= $this->limparstringexport($rsEnderesos[0]['Enderecos']['Telefone'])." \t"; 
	                $header_row .= $this->limparstringexport($rsEnderesos[0]['Enderecos']['Fax'])." \t"; 
	                $header_row .= $this->limparstringexport($rsEnderesos[0]['Enderecos']['eMail'])." \t"; 

                }else{

	                $header_row .= "ZERO \t"; 
	                $header_row .= "ZERO \t"; 
	                $header_row .= "ZERO \t"; 
	                $header_row .= "ZERO \t"; 
	                $header_row .= "ZERO \t"; 
	                $header_row .= "ZERO \t"; 
	                $header_row .= "ZERO \t"; 
	                $header_row .= "ZERO \t";
                 }


                $header_row .= "\n";  


                }     


                $filename = "EXPORT_".date("Y.m.d").".xls";
                            
                header('Content-type: application/ms-excel');
                header('Content-Disposition: attachment; filename="'.$filename.'"');
                echo($header_row);  
                exit();                     


    }




    public function admin_emailexportar($id = null) {		

    	$this->autoRender=false;

    		
 		$rsRanking = $this->Ranking->query("SELECT * FROM campiao rr");
		
 		
		$header_row = "EMAIL \t";
		$header_row = "NOME \t";
	    $header_row .= "CPF \t";
	    $header_row .= "\n";               

 		foreach ($rsRanking as $ranking) {

		
        $nomeTXT = "";

        $nomeCPF = "";



        $nomeTXT = $ranking['rr']['NOME'];

        $nomeCPF = $ranking['rr']['CPF'];



		 					
							$rsSuperior = $this->Usuario->query('SELECT nome,email,nome_funcao_cadv, celular FROM usuarios Usuario 
							where Usuario.cpf = "'.$ranking['rr']['CPF'].'" limit 0,1');

							

							$emailresponsavel = $rsSuperior[0]['Usuario']['email'];   
					                										
							
								if(trim($emailresponsavel) != ""){ 
																		
					                $header_row .= $this->limparstringexport(utf8_encode($emailresponsavel))." \t";
									$header_row .= $this->limparstringexport(utf8_encode($nomeTXT))." \t";								
									$header_row .= $this->limparstringexport(utf8_encode($nomeCPF))." \t";
									$header_row .= "\n";  
												 

								}else{
									
									
									$header_row .= $this->limparstringexport(utf8_encode("Não possui"))." \t"; 					                
									$header_row .= $this->limparstringexport(utf8_encode($nomeTXT))." \t";									
									$header_row .= $this->limparstringexport(utf8_encode($nomeCPF))." \t";
									$header_row .= "\n"; 
																		
								}     


				 		//$header_row.= ""."\t".""."\t ".""."\t ".""."\t ".""."\t ".""." \t \n";
						
		}



		 			

	 			


		$header_row = utf8_decode($header_row);	

		$filename = "export_".date("Y.m.d").".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		echo($header_row);
	

		exit();

 		}



    


	
}