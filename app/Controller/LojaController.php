<?php
App::import('Lib', 'PHPWord');
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Utility', 'Xml');


App::import('Vendor', 'excel_reader/excel_reader2'); 

	

class LojaController extends AppController {



	public function beforeFilter() {
        parent::beforeFilter();
        $this->Enviaremail = $this->Components->load('Enviaremail');            
    } 

	public $name = 'Loja';

	public $uses = array('Campanha', 'Galeria', 'Campanhaspermisao','Produto','Usuario','Pedido','Compra'); 

	public $paginate = array('limit'=>50); 

	var $helpers = array('Util');

	public function admin_compras() {


		$this->set('menuShow','loja'); 	
		$this->layout = 'cmsnovo'; 

	} 



	public function quemnaocomprou() {

			$rspremiados = $this->Produto->query("SELECT pm.nome, pm.cpf, pm.email FROM premiados pm
			GROUP BY pm.cpf
			ORDER BY pm.id DESC"); 


			foreach ($rspremiados as $premiado) {
					
				$cpf = $premiado['pm']['cpf'];

				$valordecomprar = 0;

				$valorquetem = 0; 

				$rscount = $this->Produto->query("SELECT cp.Valor_ReaisPedido FROM compras cp WHERE CPFPedido = '$cpf' GROUP BY cp.PedidoPedido");
				foreach ($rscount as $valorreais) {
				$valordecomprar = $valordecomprar + $valorreais['cp']['Valor_ReaisPedido'];
				}



				$rsvalorqtem = $this->Produto->query("SELECT pm.pontos FROM premiados pm
				WHERE pm.cpf = '$cpf'"); 



				foreach ($rsvalorqtem as $varlorrsqtem) {
				$valorquetem = $valorquetem + $varlorrsqtem['pm']['pontos'];  
				}


				$rsponto = $valorquetem - $valordecomprar;


				if ($rsponto > 4) {
					
				echo utf8_decode($premiado['pm']['nome']).',';
				echo $premiado['pm']['cpf'].','; 	
				echo $premiado['pm']['email'].',';
				echo $rsponto.'';  	
				echo '<br>';

				}   
		


			}


			exit(); 

	} 



	public function admin_edit($id = null) {
 	

/*
		if($id == 999){

		


			$texto = "
			Olá, ".$idUsuarios['Usuario']['nome'].".

				Sua compra foi efetuada com sucesso.

				Seguem abaixo os dados do pedido:

				$produtosEmail 

				Para verificar o prazo estimado para entrega, acesse o link 'Minhas Compras' no menu da loja.

				Em caso de dúvidas, ligue no SAC (0800-772-2866) ou entre em contato pelo Fale Conosco callcenter@clubedelidereschevrolet.com.br.

				Clube de Líderes - Sem Limites
				Copyright © 2013 Clube de Líderes, All rights reserved.
				Av. Goiás, 1.805 - São Caetano do Sul, SP
				09521-300 - Brazil

			";

			$para = "davidojunior@gmail.com"; 

			//$para = $idUsuarios['Usuario']['email'];
		

			$html = $texto; 

			$emails['email']['Subject'] = utf8_decode('Clube de Líderes - Sem Limites - Loja');

			$emails['email']['AddAddress'] = $para; 
			 
			$emails['email']['MsgHTML'] = $html;


			$this->Enviaremail->enviarEmail($emails); 


	
		


				exit();


<a href="<?php echo $this->base;?>/campanhas/semlimitesloja?S="></a>

		}



*/
		$this->set('menuShow','loja'); 	
		$this->layout = 'cmsnovo'; 


		$rsCompras = $this->Produto->query("SELECT * FROM compras cp 
			INNER JOIN produtos pt ON (cp.codproduto = pt.CODIGO AND cp.modeloproduto = pt.MODELO)
			INNER JOIN usuarios us ON (us.cpf = cp.CPFPedido)
			WHERE cp.id = $id
			ORDER BY cp.id DESC limit 0,1");




		$produtos = $this->Produto->query("SELECT * FROM compras cp 
			INNER JOIN produtos pt ON (cp.codproduto = pt.CODIGO AND cp.modeloproduto = pt.MODELO) WHERE cp.PedidoPedido='".$rsCompras[0]['cp']['PedidoPedido']."' ORDER BY cp.id DESC"); 



		$this->set('produtos',$produtos); 	 

		$this->set('pedido',$rsCompras); 	

 
	} 


	public function admin_jsondata() { 

		
		$rsCompras = $this->Produto->query("SELECT cp.PedidoPedido, cp.CPFPedido, us.nome, cp.Valor_ReaisPedido, cp.id, cp.created FROM compras cp 			
			INNER JOIN usuarios us ON (us.cpf = cp.CPFPedido)
			GROUP BY cp.PedidoPedido
			ORDER BY cp.id DESC");           

		
		 $a = array();

		foreach ($rsCompras as $compras){

			$valorpedido = "";
			
			$valorpedido = $this->Usuario->pontosUsuarioporCPF($compras['cp']['CPFPedido']); 

			//if($valorpedido <= 0){


				$a[] = array(
					$compras['cp']['PedidoPedido'],
					$compras['cp']['CPFPedido'],
					$compras['us']['nome']." : ".$valorpedido,
					//$compras['pt']['DESCRICAO'],
					number_format($compras['cp']['Valor_ReaisPedido'], 2, '.', ''),
					date("d/m/Y", strtotime($compras['cp']['created'])), 
					'<span class="data_actions iconsweet"><a href="'.$this->base.'/admin/loja/edit/'.$compras['cp']['id'].'" class="tip_north">C</a>'				
					);


			//}


			
				

		}
		 
		echo "{\"aaData\":" . json_encode($a) . "}";
		exit(); 

	} 



	public function showme() { 

		
		$rsCompras = $this->Produto->query("SELECT cp.PedidoPedido, cp.CPFPedido, us.nome, cp.Valor_ReaisPedido, cp.id, cp.created FROM compras cp 			
			INNER JOIN usuarios us ON (us.cpf = cp.CPFPedido)
			GROUP BY cp.PedidoPedido
			ORDER BY cp.id DESC");           

		
		 $a = array();

		 $valorpedido = 0;

		foreach ($rsCompras as $compras){
			
			
			
			$valorpedido = $valorpedido + number_format($compras['cp']['Valor_ReaisPedido'], 2, '.', '');		
				

		}
		 
		echo $valorpedido; 
		exit(); 

	}


	public function showmeqtem() { 

		
		$rsCompras = $this->Produto->query("SELECT p.pontos FROM premiados p ORDER BY p.id DESC");           

		
		 $a = array();

		 $valorpedido = 0;

		foreach ($rsCompras as $compras){

	
			$valorpedido = $valorpedido + number_format($compras['p']['pontos'], 2, '.', '');				

		}
		 
		echo $valorpedido; 
		exit();

	} 



	public function admin_importar($id = null) {
	
		
		$this->set('menuShow','usuario'); 	
		$this->layout = 'cmsnovo';

	}



	function limparstring($text){

		$text = utf8_encode($text);

		return $text;
		
	}    




	public function admin_importxls($xml = null) {


		

		if($xml == null){

			exit('erro');

		}   

		$data = new Spreadsheet_Excel_Reader('js/libs/file_upload/server/php/files/'.$xml, true);
			

		$retorno = "";

		foreach ($data->sheets[0]['cells'] as $value){


		$this->Usuario->create();  

		//Região 
		$pedido = 0;
		$pedido = (isset($value[1]) ? $value[1] : "");
		$pedido = $this->limparstring($pedido);

		//Região 
		$valor = 0;
		$valor = (isset($value[2]) ? $value[2] : "");
		$valor = $this->limparstring($valor);


		$rsPedido = $this->Produto->query("SELECT PedidoPedido,Valor_ReaisPedido FROM compras cp WHERE cp.PedidoPedido='".$pedido."' limit 0,1");


				

			if(count($rsPedido) >= 1){


				if(number_format($rsPedido[0]['cp']['Valor_ReaisPedido'], 2, '.', '') != $valor){

					$retorno .= "<p> Pedido : $pedido valor Divergente! Valor pedido site :  ". number_format($rsPedido[0]['cp']['Valor_ReaisPedido'], 2, '.', '') ." Valor ped. planilha Magazine : $valor </p> <br>"; 

				}  
							


			}else{ 

				$retorno .= "<p> Pedido : $pedido nao consta! </p> <br>";


			} 


		}  

		echo $retorno;
		exit(); 
		

	
	}  







}