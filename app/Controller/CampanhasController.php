<?php
App::import('Lib', 'PHPWord');
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Utility', 'Xml');


	

class CampanhasController extends AppController {


	public function beforeFilter() {
        parent::beforeFilter();
        $this->Enviaremail = $this->Components->load('Enviaremail');            
    } 

	public $name = 'Campanhas';

	public $uses = array('Campanha', 'Galeria', 'Campanhaspermisao','Produto','Usuario','Pedido','Compra'); 

	public $paginate = array('limit'=>50); 

	var $helpers = array('Util'); 




	public function descubrachevroletpremiado($id = null) {
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'descubrachevroletpremiado'))); 
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}

		$this->set('menuversion', 1); 
		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Descubra seu Chevrolet Premiado'); 
		$this->layout = 'ajax'; 
	}  


	public function ases($id = null) {
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'ases')));
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Descoberta Premiada');

		$this->layout = 'ajax'; 
	}

	public function descobertapremiadacomandatuba($id = null) {
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'descobertapremiadacomandatuba')));
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Descoberta Premiada');

		$this->layout = 'ajax'; 
	} 


	public function desempenholideres($id = null) {
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'desempenholideres')));
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Descoberta Premiada');

		$this->layout = 'ajax'; 
	} 

	public function descobertapremiada($id = null) {
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'descobertapremiada')));
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			} 

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Descoberta Premiada');

		$this->layout = 'ajax'; 
	}


	public function descobertapremiadavendas($id = null) {
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'descobertapremiadavendas')));
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Descoberta Premiada');

		$this->layout = 'ajax'; 
	}   



	public function conquiste_seu_caminho($id = null) {
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'conquiste_seu_caminho')));
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Conquiste seu caminho');

		$this->layout = 'ajax'; 
	}
	
	
	
	public function admin_index() {

		$this->set('menuShow','campanhas'); 	
		$this->layout = 'cmsnovo'; 
 
	}   

	public function admin_jsondata() {

		$options = array(
				'order' => array('Campanha.id' => 'DESC')
			); 
		$rsCampanhas = $this->Campanha->find('all',$options);         

		
		 $a = array();

		foreach ($rsCampanhas as $campanha){

			$a[] = array(
				$campanha['Campanha']['id'],
				$campanha['Campanha']['nome'],
				'<img src="'.$campanha['Campanha']['thumb'].'" width="150"/>',
				$campanha['Campanha']['created'],
				'<span class="data_actions iconsweet"><a href="'.$this->base.'/admin/campanhas/edit/'.$campanha['Campanha']['id'].'" class="tip_north">C</a>'.	
				'<!--<a href="'.$this->base.'/admin/campanhas/delete/'.$campanha['Campanha']['id'].'" class="btn-delete tip_north">X</a>--></span>'
				);
		}
		 
		echo "{\"aaData\":" . json_encode($a) . "}";
		exit();

	}


	public function admin_edit($id = null) {


		$rsGaleria = "";
		$this->Campanha->id = $id; 


		if($this->Campanha->id != ""){

			$rsGaleria = $this->Galeria->find('all', array(
        		'conditions' => array("Galeria.id_campanha" => $this->Campanha->id)
    				));

			
			$Campanhaspermisao = $this->Campanhaspermisao->find('all', array(
        		'conditions' => array("Campanhaspermisao.id_campanha" => $this->Campanha->id)
    				));

				$rsCampanhaspermisao = array();
				foreach ($Campanhaspermisao as $key => $valuec){
				 	 $rsCampanhaspermisao[$valuec['Campanhaspermisao']['id']]['cod_funcaoCADV'] =$valuec['Campanhaspermisao']['cod_funcaoCADV'];
				 	 $rsCampanhaspermisao[$valuec['Campanhaspermisao']['id']]['id'] = $valuec['Campanhaspermisao']['id'];
				 } 

		} 

		if (empty($this->data)) { 
     		$this->data = $this->Campanha->read(); 
    	}  

		if ($this->request->is('post')) {


			 $this->Campanha->save($this->request->data, array('validate' => false));

			 $idCampanha = $this->Campanha->id;

			 if(isset($this->request->data['Galeria']['foto'])){

				 $valuesGaleria = array();
				 foreach ($this->request->data['Galeria']['foto'] as $key => $value){
				 	 $valuesGaleria[$key]['Galeria']['foto'] = $value;
				 	 $valuesGaleria[$key]['Galeria']['id_campanha'] = $idCampanha;
				 } 

				 $this->Galeria->saveAll($valuesGaleria);
			} 


			 if(isset($this->request->data['Campanhaspermisao']['cod_funcaoCADV'])){


			 	 $coutpermisao = 0;
				 $valuesCampanhaspermisao = array();
				 foreach ($this->request->data['Campanhaspermisao']['cod_funcaoCADV'] as $key => $value){
				 	 $valuesCampanhaspermisao[$coutpermisao]['Campanhaspermisao']['id'] = $key;
				 	 $valuesCampanhaspermisao[$coutpermisao]['Campanhaspermisao']['cod_funcaoCADV'] = $value;
				 	 $valuesCampanhaspermisao[$coutpermisao]['Campanhaspermisao']['id_campanha'] = $idCampanha;

	

				 	$coutpermisao++; 
				 }

				 $this->Campanhaspermisao->saveAll($valuesCampanhaspermisao); 
			}
			 
			 

			 $this->Session->setFlash('Registro Salvo com sucesso.'); 

			 $this->redirect(array('controller' => 'campanhas', 'action' => 'admin_edit/'.$idCampanha));

		}


		$this->set(compact('rsGaleria','rsCampanhaspermisao')); 

		$this->set('menuShow','campanhas'); 	
		$this->layout = 'cmsnovo'; 

	}

	public function admin_delete($id = null)
	{

		$this->Campanha->id = $id; 

		$this->Campanha->delete($id);

		$this->redirect(array('controller' => 'campanhas', 'action' => 'admin_index')); 
		
	}

	public function admin_deletegaleria($id = null, $idcampanha = null) {

		$this->Galeria->id = $id; 

		$this->Galeria->delete($id);

		$this->Session->setFlash('Registro Excluido com sucesso.'); 

		$this->redirect(array('controller' => 'pagina', 'action' => 'admin_edit/'.$idcampanha));
	} 


	public function africavendas($id = null) { 
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'africavendas')));

			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			} 

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Africa Vendas');

		$this->layout = 'ajax'; 
	} 

	public function africapos($id = null) {
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'africapos')));

			$tipo = ""; 
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			} 

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Africa Pos');

		$this->layout = 'ajax'; 
	}

	public function africaacessorios($id = null) { 
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'africaacessorios'))); 

			$tipo = ""; 
			$HmltText = ""; 
			if($id == "regulamento"){ 
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}  

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Africa Pos');

		$this->layout = 'ajax'; 
	}


	public function conquistarpreciso($id = null) {
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'conquistarpreciso'))); 
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Conquistar é Preciso');

		$this->layout = 'ajax';  
	} 


	public function conquistadoresabordo($id = null) {
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'conquistadoresabordo')));
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "participantes"){
				$tipo = "participantes";

				$HmltText = '<p style="text-align: center;">
				Se você é um dos participantes da convenção preencha seu
				<a style="text-decoration: none;" href="http://201.76.181.43/GI/matriz.asp?brif=5029&idpax=0&paxcod=" target="_blank"> cadastro aqui.
				</a>
				</p>

				<br>
				<br>
				<p style="text-align: center;">
				
				<a style="text-decoration: none;" href="http://clubedelideres2013.com.br/files/pdfs/conquistadoresabordo/concessionarias_contempladas.pdf" target="_blank">
				Clique aqui 
				</a>
				para conhecer as concessionárias que terão vendedores na convenção.				
				</p>


				';

			}elseif($id == "cruzeiro"){
				$tipo = "cruzeiro";
				
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}elseif($id == "agenda"){
				$tipo = "agenda";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'Conquistadores a bordo');

		$this->layout = 'ajax'; 
	}


	public function semlimitesgerentes($id = null) {

		$idUsuarios = $this->Session->read('Usuario');
		$pontos = 0;


		$pontosUsuario =  $this->Usuario->pontosUsuario();
		$this->set(compact('pontosUsuario')); 


		$pontos =  $this->Usuario->pontosUsuarioTotal();

		$pontosFev =  $this->Usuario->pontosUsuarioTotalMes(1);
		
		$pontosMarc =  $this->Usuario->pontosUsuarioTotalMes(5);

		
		$this->set(compact('pontos', 'pontosFev', 'pontosMarc'));
		
		$MOSTRA = 0;

		if (strpos($idUsuarios['Usuario']['nome_funcao_cadv'], "GERENTE") === FALSE) {
		
		}else{
			$MOSTRA = 1;	

		}
	
		

		$this->set(compact('MOSTRA')); 
	
 


			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'semlimitesgerentes')));
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento']; 

			}elseif($id == "mecanica"){
				$tipo = "mecanica";
				
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "sorteio"){
				$tipo = "sorteio";

				

				$HmltText = file_get_contents('semlimites_gerentes/TEXTO/sorteio.html', FILE_USE_INCLUDE_PATH);  


				if(isset($this->params['url']['v']) && $this->params['url']['v'] != ""){


					if($this->params['url']['v'] == "vendedor"){

						$HmltText = file_get_contents('semlimites_gerentes/TEXTO/vendedor.html', FILE_USE_INCLUDE_PATH);  

					}
					if($this->params['url']['v'] == "gerente"){

						$HmltText = file_get_contents('semlimites_gerentes/TEXTO/gerente.html', FILE_USE_INCLUDE_PATH);  

					}			
					if($this->params['url']['v'] == "titular"){

						$HmltText = file_get_contents('semlimites_gerentes/TEXTO/titular.html', FILE_USE_INCLUDE_PATH);  

					}	
					if($this->params['url']['v'] == "gestor"){

						$HmltText = file_get_contents('semlimites_gerentes/TEXTO/gestor.html', FILE_USE_INCLUDE_PATH);  

					} 					
					
				}



				//$HmltText = $rsCampanhas['Campanha']['ranking'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			} 



		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText); 	
		$this->set('title_for_layout', 'Sem Limites Gerentes');

		$this->layout = 'ajax'; 
	}

	public function semlimitesvendedores($id = null) {


		$idUsuarios = $this->Session->read('Usuario');
		$pontos = 0;


		$pontosUsuario =  $this->Usuario->pontosUsuario();
		$this->set(compact('pontosUsuario')); 


		$pontos =  $this->Usuario->pontosUsuarioTotal();

		$pontosFev =  $this->Usuario->pontosUsuarioTotalMes(1);
		
		$pontosMarc =  $this->Usuario->pontosUsuarioTotalMes(5);


		$this->set(compact('pontos', 'pontosFev', 'pontosMarc'));
		
		$MOSTRA = 0;

		if (strpos($idUsuarios['Usuario']['nome_funcao_cadv'], "VENDEDOR") === FALSE) {
		
		}else{
			$MOSTRA = 1;	

		}
		

		$this->set(compact('MOSTRA')); 


			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'semlimitesvendedores')));
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento']; 

			}elseif($id == "mecanica"){
				$tipo = "mecanica";
				
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "sorteio"){
				$tipo = "sorteio";

				

				$HmltText = file_get_contents('semlimites_gerentes/TEXTO/sorteio.html', FILE_USE_INCLUDE_PATH);  


				if(isset($this->params['url']['v']) && $this->params['url']['v'] != ""){


					if($this->params['url']['v'] == "vendedor"){

						$HmltText = file_get_contents('semlimites_gerentes/TEXTO/vendedor.html', FILE_USE_INCLUDE_PATH);  

					}
					if($this->params['url']['v'] == "gerente"){

						$HmltText = file_get_contents('semlimites_gerentes/TEXTO/gerente.html', FILE_USE_INCLUDE_PATH);  

					}			
					if($this->params['url']['v'] == "titular"){

						$HmltText = file_get_contents('semlimites_gerentes/TEXTO/titular.html', FILE_USE_INCLUDE_PATH);  

					}	
					if($this->params['url']['v'] == "gestor"){

						$HmltText = file_get_contents('semlimites_gerentes/TEXTO/gestor.html', FILE_USE_INCLUDE_PATH);  

					} 					
					
				}



				//$HmltText = $rsCampanhas['Campanha']['ranking'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			} 

		$this->set('tipo', $tipo);
		
		$this->set('HmltText', $HmltText);

		$this->set('title_for_layout', 'Sem Limites Vendedores');

		$this->layout = 'ajax';  
	}

	

	public function semlimitesorteio($id = null) {


			$idUsuarios = $this->Session->read('Usuario');

			$cpf = $idUsuarios['Usuario']['cpf']; 


			$rsNumerodaSorte = $this->Campanha->query("SELECT * FROM numero_sorte ns WHERE CPF = '$cpf' ORDER BY ns.SERIE,ns.NUMERO"); 

			$rsNumero = "<p style='font-size: 18px;'>Números da sorte :</p>";

			foreach ($rsNumerodaSorte as $numero) {
				
				$rsNumero .=  $numero['ns']['Letra']." ".$numero['ns']['SERIE']." ".$numero['ns']['NUMERO']."<br>"; 

			}

			//print_r($rsNumerodaSorte);

			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'semlimitesorteio')));
			$tipo = "";
			$HmltText = ""; 
			if($id == "regulamento"){
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento']; 

			}elseif($id == "mecanica"){
				$tipo = "mecanica";
				
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "sorteio"){
				$tipo = "sorteio";

				

				$HmltText = file_get_contents('semlimitesorteio/TEXTO/sorteio.html', FILE_USE_INCLUDE_PATH);  


				if(isset($this->params['url']['v']) && $this->params['url']['v'] != ""){


					if($this->params['url']['v'] == "vendedor"){

						$HmltText = file_get_contents('semlimitesorteio/TEXTO/vendedor.html', FILE_USE_INCLUDE_PATH);  

					}
					if($this->params['url']['v'] == "gerente"){

						$HmltText = file_get_contents('semlimitesorteio/TEXTO/gerente.html', FILE_USE_INCLUDE_PATH);  

					}			
					if($this->params['url']['v'] == "titular"){

						$HmltText = file_get_contents('semlimitesorteio/TEXTO/titular.html', FILE_USE_INCLUDE_PATH);  

					}	
					if($this->params['url']['v'] == "gestor"){

						$HmltText = file_get_contents('semlimitesorteio/TEXTO/gestor.html', FILE_USE_INCLUDE_PATH);  

					} 	 				





				}



				//$HmltText = $rsCampanhas['Campanha']['ranking'];
			}else{
				$tipo = "sorteio";

				

				$HmltText = file_get_contents('semlimitesorteio/TEXTO/sorteio.html', FILE_USE_INCLUDE_PATH);  


				if(isset($this->params['url']['v']) && $this->params['url']['v'] != ""){


					if($this->params['url']['v'] == "vendedor"){

						$HmltText = file_get_contents('semlimitesorteio/TEXTO/vendedor.html', FILE_USE_INCLUDE_PATH);  

					}
					if($this->params['url']['v'] == "gerente"){

						$HmltText = file_get_contents('semlimitesorteio/TEXTO/gerente.html', FILE_USE_INCLUDE_PATH);  

					}			
					if($this->params['url']['v'] == "titular"){

						$HmltText = file_get_contents('semlimitesorteio/TEXTO/titular.html', FILE_USE_INCLUDE_PATH);  

					}	
					if($this->params['url']['v'] == "gestor"){

						$HmltText = file_get_contents('semlimitesorteio/TEXTO/gestor.html', FILE_USE_INCLUDE_PATH);  

					}

					if($this->params['url']['v'] == "numero"){

						$HmltText = $rsNumero;

					} 

					
				}
			} 


			

		$this->set('rsNumero', $rsNumero);


		$this->set('tipo', $tipo);
		
		$this->set('HmltText', $HmltText);

		$this->set('title_for_layout', 'Sem Limites Sorteio'); 

		$this->layout = 'ajax';  
	}


	public function semlimitesloja() {

$idUsuarios = $this->Session->read('Usuario'); 




	if($idUsuarios['Usuario']['cpf'] != "58174451234"){

		$this->redirect(array('controller' => 'campanhas', 'action' => 'encerrado'));  
		exit();


	}		


		$breadum = "";
		$breaddois = "";

		

		$pontos =  $this->Usuario->pontosUsuario();
 

        if(isset($this->request->query['C'])){
                      
            $Cmenu = $this->request->query['C'];

            $this->set('Cmenu', $Cmenu);  

        } 


        if(isset($this->request->query['Cmenu'])){
                      
            $Cmenu = $this->request->query['Cmenu'];

            $this->set('Cmenu', $Cmenu);  

        } 


        if(isset($this->request->query['q'])){
            $this->request->query['q'] = trim($this->request->query['q']);
            $q = $this->request->query['q'];

            $this->paginate['conditions']['OR'] = array(
                'Produto.DESCRICAO LIKE' => "%{$q}%",
                'Produto.REFERENCIA LIKE' => "%{$q}%"

            );            

        } 


        //FILTRA POR CATEGORIA
        if(isset($this->request->query['C']) && $this->request->query['C'] != ""){ 

            $this->request->query['C'] = trim($this->request->query['C']);
            $q = $this->request->query['C']; 
            $q_n = ereg_replace("[^0-9]", '', $q);
            $this->paginate['conditions'][] = array(
                'Produto.CATEGORIA' => "$q"
            );  
        }  
        //FILTRA POR CATEGORIA


        //FILTRA POR SUBCATEGORIA
        if(isset($this->request->query['S']) && $this->request->query['S'] != ""){ 

            $this->request->query['S'] = trim($this->request->query['S']);
            $q = $this->request->query['S']; 
            $q_n = ereg_replace("[^0-9]", '', $q);
            $this->paginate['conditions'][] = array(
                'Produto.SUBCATEGORIA' => "$q"
            );   
        }  
        //FILTRA POR SUBCATEGORIA 


            $this->paginate['conditions'][] = array(
                'Produto.ACAO' => "add",
                'Produto.ATIVO' => "True",
                'Produto.CATEGORIA !=' => "AU",
                "`Produto`.`VALOR_VENDA` * 1 <=" => '1787.00',
                'Produto.MARCA !=' => "Ford"
            ); 

		//'Produto.CODIGO !=' => array("0209800","0209801")                          

        $this->paginate['limit'] = 20; 

        //ORDENACAO
        if(isset($this->request->query['ordernar']) && $this->request->query['ordernar'] != ""){ 

			if($this->request->query['ordernar'] == "maior-preco"){ 

				$this->paginate['order'] = 'Produto.VALOR_VENDA + 0 DESC'; 

			}else if($this->request->query['ordernar'] == "lancamento"){

				$this->paginate['order'] = 'Produto.CODIGO + 0 DESC'; 

			}else{

				$this->paginate['order'] = 'Produto.VALOR_VENDA + 0';				
			
			} 
        	

        }else{

        	$this->paginate['order'] = 'Produto.VALOR_VENDA + 0 ';

        }
        //ORDENACAO





		//$this->paginate['group'] = 'Produto.CODIGO';

	  	$rsProdutos = $this->paginate('Produto');  

 			  	
		/*MENU */ 
		$xml = "http://corporativo.magazineluiza.com.br/xmlCategorias.asp?idResgateCampanha=654";


		$response_xml_data = file_get_contents($xml);


		$xml  = simplexml_load_string($response_xml_data);

		$a = array(); 



		if(isset($xml) && $xml != ""){


			
			$rows = $xml->children('rs', TRUE)->data->children('z', TRUE)->row;
			foreach ($rows as $row) {

			    $attributes = $row->attributes();

			    $strLinha = (string) $attributes->strLinha;
			    $Descricaolinha    = (string) $attributes->Descricaolinha;
			    $strSetor    = (string) $attributes->strSetor;
			    $strDescricao    = (string) $attributes->strDescricao; 


			//$options = array(
			//	'conditions' => array("Produto.SUBCATEGORIA =" => $strSetor, "Produto.ACAO" => "add", "Produto.ATIVO" => "True")
			//); 
					
			//$countCat = $this->Produto->find("count",$options);	

				//if($countCat > 0 && $strSetor != ""){

						$a["$strLinha"][] = array(
							$strLinha,
							$Descricaolinha,
							$strSetor,
							$strDescricao
							); 
				//} 		 	 
							

					$breadumcat = "";

					if(isset($this->request->query['C']) && $this->request->query['C'] != ""){ 
					

						if($this->request->query['C'] == $strLinha){

							$breadumcat = $strLinha;
							$breadum = $Descricaolinha;					


						}

					}


					if(isset($this->request->query['S']) && $this->request->query['S'] != ""){ 


						if($this->request->query['S'] == $strSetor){

						$breaddois = $strDescricao; 
						
						$breadum = $Descricaolinha;

						$breadumcat = $strLinha; 

						}  


					}




				

				//print_r($produto['Produto']['SUBCATEGORIA']);
				//exit();
			}


		}



		$this->set('menu', $a);

		/*MENU */



		$this->set('breadumcat', $breadumcat);  

		$this->set('breadum', $breadum); 

		$this->set('breaddois', $breaddois); 	

		$this->set('title_for_layout', 'Sem Limites');

		$this->set('menu', $a); 
		$this->set('rsProdutos', $rsProdutos); 

	
		$this->set('pontos', $pontos); 		
		$this->set('idUsuarios', $idUsuarios); 	

		$this->layout = 'ajax';  

	}  




	public function semlimiteslojaproduto($codigo = null) {

$idUsuarios = $this->Session->read('Usuario');

	if($idUsuarios['Usuario']['cpf'] != "58174451234"){

		$this->redirect(array('controller' => 'campanhas', 'action' => 'encerrado'));  
		exit();


	}		

		

		$pontos =  $this->Usuario->pontosUsuario();

		$breadum = "";
		$breaddois = "";
		

		$options = array(
			'conditions' => array("Produto.id =" => $codigo)
		); 
				
		$produto = $this->Produto->find("first",$options);	


		$codigo = $produto['Produto']['CODIGO'];


/* PRODUTO DETALHES */


		$xmlDetalhe = "http://corporativo.magazineluiza.com.br/Produto/FichaTecnicaCorp.asp?idResgateCampanha=654&Codigo=$codigo&myCSS=http://dominiodoparceiro/folhadeestilodoparceiro.css";


		$response_detalher = file_get_contents($xmlDetalhe);

		$this->set('detalheProduto', utf8_encode($response_detalher));


/* PRODUTO DETALHES */ 



		/* Consulta de Estoque Online */

		$client = new SoapClient('http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx?WSDL');
		 
		$function = 'ConsultaProduto';
		 	


		$strXML ="
		<xml>
		<MagazineLuiza>
		<ConsultaProduto>
			<Codigo>".$produto['Produto']['CODIGO']."</Codigo>
			<Modelo>".$produto['Produto']['MODELO']."</Modelo>
			<Quantidade>1</Quantidade>
			<IdResgateCampanha>654</IdResgateCampanha>
		</ConsultaProduto>
		</MagazineLuiza> 
		</xml>"; 

		$arguments= array('ConsultaProduto' => array(
		                        'strXML'   => $strXML                      
		                )); 
		$options = array('location' => 'http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx');
		 
		$result = $client->__soapCall($function, $arguments, $options);

		$result = $result->ConsultaProdutoResult->any;		
		
		$rsResult  = simplexml_load_string($result); 


		$idStatus = (string)$rsResult->XML->MagazineLuiza->ConsultaProduto->idStatus;

		if($idStatus == '0'){

		$LIBERADO = (string)$rsResult->XML->MagazineLuiza->ConsultaProduto->Liberado;

		}else{

			$LIBERADO = 0; 

		} 



		/* Consulta de Estoque Online */




		/* Consulta de Preco Online */

		$client = new SoapClient('http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx?WSDL');
		 
		$function = 'ConsultaPrecoProduto';
		 	

		$strXML ="
		<xml>
		<MagazineLuiza>
		<ConsultaPrecoProduto>
			<Codigo>".$produto['Produto']['CODIGO']."</Codigo>
			<Modelo>".$produto['Produto']['MODELO']."</Modelo>			
			<IdResgateCampanha>654</IdResgateCampanha>
		</ConsultaPrecoProduto>
		</MagazineLuiza> 
		</xml>";

		$arguments= array('ConsultaPrecoProduto' => array(
		                        'strXML'   => $strXML                      
		                )); 
		$options = array('location' => 'http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx');
		 
		$result = $client->__soapCall($function, $arguments, $options);


		$result = $result->ConsultaPrecoProdutoResult->any;		
		
		$rsResult  = simplexml_load_string($result); 

		$VALOR_REAIS = (string)$rsResult->XML->MagazineLuiza->ConsultaPrecoProduto->Valor_Reais; 


		/* Consulta de Preco Online */




		
		/*MENU */ 
		$xml = "http://corporativo.magazineluiza.com.br/xmlCategorias.asp?idResgateCampanha=654";


		$response_xml_data = file_get_contents($xml);


		$xml  = simplexml_load_string($response_xml_data);

		$a = array();

		$rows = $xml->children('rs', TRUE)->data->children('z', TRUE)->row;
		foreach ($rows as $row) {

		    $attributes = $row->attributes();

		    $strLinha = (string) $attributes->strLinha;
		    $Descricaolinha    = (string) $attributes->Descricaolinha;
		    $strSetor    = (string) $attributes->strSetor;
		    $strDescricao    = (string) $attributes->strDescricao;



		//$options = array(
		//	'conditions' => array("Produto.SUBCATEGORIA =" => $strSetor)
		//);  
				
		//$countCat = $this->Produto->find("count",$options);	

			//if($countCat > 0 && $strSetor != ""){

				$a["$strLinha"][] = array(
					$strLinha,
					$Descricaolinha,
					$strSetor,
					$strDescricao
					); 
			//}




				if($produto['Produto']['CATEGORIA'] == $strLinha){

				$breadum = $Descricaolinha; 
				


				}

				if($produto['Produto']['SUBCATEGORIA'] == $strSetor){

				$breaddois = $strDescricao; 
				


				}  


			$voltamtipo = 0;
 
        /*

        	
            if($produto['Produto']['VOLTAGEM'] == 1){
            	
            	$nomeproduto = $produto['Produto']['DESCRICAO'];
            	$nomereferencia = $produto['Produto']['REFERENCIA'];


            	$rsProdutoVoltagem = $this->Produto->query("SELECT id FROM produtos WHERE ACAO = 'add' AND ATIVO = 'True' AND DESCRICAO = '$nomeproduto' AND REFERENCIA = '$nomereferencia' AND VOLTAGEM = '2' LIMIT 0,1"); 
            	          	
				if(isset($rsProdutoVoltagem[0]['produtos']['id']) && $rsProdutoVoltagem[0]['produtos']['id'] != ""){
					
					$voltamtipo = $rsProdutoVoltagem[0]['produtos']['id'];

				}
            	
            
            }  
            

            
            if($produto['Produto']['VOLTAGEM'] == 2){
				            
            	$nomeproduto = $produto['Produto']['DESCRICAO'];
            	$nomereferencia = $produto['Produto']['REFERENCIA'];
            	
            	$rsProdutoVoltagem = $this->Produto->query("SELECT id FROM produtos WHERE ACAO ='add' AND ATIVO = 'True' AND DESCRICAO = '$nomeproduto' AND REFERENCIA = '$nomereferencia' AND VOLTAGEM = '1' LIMIT 0,1");  

				if(isset($rsProdutoVoltagem[0]['produtos']['id']) && $rsProdutoVoltagem[0]['produtos']['id'] != ""){
					
					$voltamtipo = $rsProdutoVoltagem[0]['produtos']['id'];

				}            	
            
            } 
            
            */
            
            $this->set('voltamtipo', $voltamtipo);            


			

			//print_r($produto['Produto']['SUBCATEGORIA']);
			//exit();
		}  

		$this->set('menu', $a);

		/*MENU */



        
                      


        $this->set('Cmenu', $produto['Produto']['CATEGORIA']); 

        


		$this->set('webVALOR_REAIS', $VALOR_REAIS); 
		

		$this->set('LIBERADO', $LIBERADO); 

	

		$this->set('statusdoproduto', $idStatus); 

		$this->set('produto', $produto);   
		$this->set('title_for_layout', 'Sem Limites');


		
		$this->set('breadum', $breadum); 

		$this->set('breaddois', $breaddois); 	


		$this->set('idUsuarios', $idUsuarios); 	

		$this->set('pontos', $pontos); 	

		$this->layout = 'ajax';  

	} 




	public function semlimitescarrinho($codigo = null) {

		$idUsuarios = $this->Session->read('Usuario');

	if($idUsuarios['Usuario']['cpf'] != "58174451234"){

		$this->redirect(array('controller' => 'campanhas', 'action' => 'encerrado'));  
		exit();


	}		




		

		


        //CALCULAR O FRETE
        if(isset($this->request->query['FRETE']) && $this->request->query['FRETE'] != ""){ 

        	$CEP = $this->request->query['FRETE']; 

        	$cpf = $idUsuarios['Usuario']['cpf'];



		/* CONSULTAR CEP*/
		$client = new SoapClient('http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx?WSDL');
		 
		$function = 'ConsultaCEP';
		 	


		$strXML ="
		<xml>
		<MagazineLuiza>
		<ConsultaCEP>
			<CEP>".$CEP."</CEP>					
			<IdResgateCampanha>654</IdResgateCampanha>
		</ConsultaCEP>
		</MagazineLuiza> 
		</xml>"; 

		$arguments= array('ConsultaCEP' => array(
		                        'strXML'   => $strXML                      
		                )); 
		$options = array('location' => 'http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx');		
		$result = $client->__soapCall($function, $arguments, $options);
		$result = $result->ConsultaCEPResult->any;	 


		$rsResult  = simplexml_load_string($result); 


		$idCepStatus = (string)$rsResult->XML->MagazineLuiza->ConsultaCEP->idStatus; 
		$MsgCepMensagem = (string)$rsResult->XML->MagazineLuiza->ConsultaCEP->idStatus;


		if($idCepStatus != 0){

			$this->redirect(array('controller' => 'campanhas', 'action' => 'semlimitescarrinho?ERRO=CEP')); 			
			exit(); 

		}


		/* CONSULTAR CEP*/	 	



		/*PEGAR PRODUTOS DO CARRINHO*/
		$listaItens = $this->Session->read('carrinho6');		
		$listaItens = substr($listaItens, 0, -1);
		$rsProdutos = 0;		
		if(isset($listaItens) && $listaItens != ""){
			$rsProdutos = $this->Produto->query("SELECT * FROM produtos WHERE id IN($listaItens);"); 

			$produtos = "";
			foreach ($rsProdutos as $produto) {
			
			$produtos .= "<Produto>
						<Codigo>".$produto['produtos']['CODIGO']."</Codigo>
						<Modelo>".$produto['produtos']['MODELO']."</Modelo>
						<Quantidade>1</Quantidade>
						</Produto>"; 			
			}   
		}
		/*PEGAR PRODUTOS DO CARRINHO*/
       	
							

		/* SOAP PARA CALCULAR O FRETE */

		$client = new SoapClient('http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx?WSDL');
		 			

		$strXML ="
	<xml>
	<MagazineLuiza>
	<Carrinho>
	<Chave_sessao>0</Chave_sessao>
	<CPF>".$cpf."</CPF>
	<IdResgateCampanha>654</IdResgateCampanha>
	<CEP>".$CEP."</CEP>
		<ListaProdutos>
			".$produtos."
		</ListaProdutos>
	</Carrinho>
	</MagazineLuiza>
	</xml>";
		 


		$function = 'CalculaFrete';
		$arguments= array('CalculaFrete' => array(
		                        'strXML'   => $strXML                      
		                )); 
		$options = array('location' => 'http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx');
		 
		$result = $client->__soapCall($function, $arguments, $options);



		$result = $result->CalculaFreteResult->any;		
			
		$rsResult  = simplexml_load_string($result); 

		$idStatusFrete = (string)$rsResult->XML->MagazineLuiza->Carrinho->idStatus; 
		$Valor_FreteFrete = (string)$rsResult->XML->MagazineLuiza->Carrinho->Valor_Frete; 
		$PrazoFrete = (string)$rsResult->XML->MagazineLuiza->Carrinho->Prazo; 
		$Data_EntregaFrete = (string)$rsResult->XML->MagazineLuiza->Carrinho->Data_Entrega;
		$Chave_sessaoFrete = (string)$rsResult->XML->MagazineLuiza->Carrinho->Chave_sessao;

		$cepFrete = (string)$rsResult->XML->MagazineLuiza->Carrinho->CEP;



		$this->set(compact('idStatusFrete','Valor_FreteFrete','PrazoFrete','Chave_sessaoFrete','cepFrete'));


		$this->Session->write('ChaveSessao', $Chave_sessaoFrete); 
		

        }
        //CALCULAR O FRETE



		if($codigo != null){
		

			$rsCarrinho = $this->Session->read('carrinho6');

			$rsSave = $rsCarrinho."'".$codigo."',";

			//$rsCarrinho = substr($rsCarrinho, 0, -1); 

			$this->Session->write('carrinho6', $rsSave);

			$this->redirect(array('controller' => 'campanhas', 'action' => 'semlimitescarrinho')); 


		} 


        //DELETAR CARRINHO
        if(isset($this->request->query['DELETAR']) && $this->request->query['DELETAR'] != ""){ 

        	$paradetela = $this->request->query['DELETAR'];



			$rsCarrinho = $this->Session->read('carrinho6');

			if($rsCarrinho != ""){

			$itemcarrinho = explode(",", $rsCarrinho);

			$rsCarrinho = "";

			foreach ($itemcarrinho as $item) {
				

				if($item != ''){

					if($item != "'$paradetela'"){
						
						$rsCarrinho .= $rsCarrinho."".$item.","; 

					} 

				}

				

			}


			$this->Session->write('carrinho6', $rsCarrinho); 


			}




        }  
        //DELETAR CARRINHO





			
		$listaItens = $this->Session->read('carrinho6');
		
		$listaItens = substr($listaItens, 0, -1);

		$rsProdutos = 0;
		
		if(isset($listaItens) && $listaItens != ""){

			$rsProdutos = $this->Produto->query("SELECT * FROM produtos WHERE id IN($listaItens);");    

		}		


		$this->set(compact('rsProdutos','cpf'));  


		

		$this->set('userinfo', $idUsuarios['Usuario']);

		$this->set('title_for_layout', 'Sem Limites');

		$this->layout = 'ajax'; 

	}




	public function semlimitescomprarfeitas($codigo = null) {



		$idUsuarios = $this->Session->read('Usuario');
		$this->set('userinfo', $idUsuarios['Usuario']);
						

		$rsProdutos = $this->Produto->query("SELECT * FROM compras cp 
			INNER JOIN produtos pt ON (cp.codproduto = pt.CODIGO AND cp.modeloproduto = pt.MODELO) WHERE cp.CPFPedido='".$idUsuarios['Usuario']['cpf']."' ORDER BY cp.id DESC");    
				


		$rsProdutosFRETE = $this->Produto->query("SELECT * FROM compras cp 
			INNER JOIN produtos pt ON (cp.codproduto = pt.CODIGO) WHERE cp.CPFPedido='".$idUsuarios['Usuario']['cpf']."' GROUP BY cp.PedidoPedido ORDER BY cp.id DESC");   


		$this->set(compact('rsProdutos', 'rsProdutosFRETE'));  
				



		$this->set('title_for_layout', 'Sem Limites');

		$this->layout = 'ajax'; 



	} 





	public function semlimitescarrinhofinalizar() {

		$idUsuarios = $this->Session->read('Usuario');

	if($idUsuarios['Usuario']['cpf'] != "58174451234"){

		$this->redirect(array('controller' => 'campanhas', 'action' => 'encerrado'));  
		exit();


	}

		

		$produtosEmail = "";

		if ($this->request->is('post')) {
			

        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 123456);  


			/*VALIDA C USUARIO TEM PONTO*/
			$pontos = 0;

			$listaItens = $this->Session->read('carrinho6');

			if($listaItens != ""){

				$listaItens = substr($listaItens, 0, -1);

				$rsProdutos = 0;
				
				if(isset($listaItens) && $listaItens != ""){

					$rsProdutos = $this->Produto->query("SELECT * FROM produtos WHERE id IN($listaItens);");

					$VALOR = 0;

					foreach ($rsProdutos as $produto) {



						/* Consulta de Estoque Online */

						$client = new SoapClient('http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx?WSDL');
						 
						$function = 'ConsultaProduto';
						 	

						$strXML ="
						<xml>
						<MagazineLuiza>
						<ConsultaProduto>
							<Codigo>".$produto['produtos']['CODIGO']."</Codigo>
							<Modelo>".$produto['produtos']['MODELO']."</Modelo>
							<Quantidade>1</Quantidade>
							<IdResgateCampanha>654</IdResgateCampanha>
						</ConsultaProduto>
						</MagazineLuiza> 
						</xml>"; 

						$arguments= array('ConsultaProduto' => array(
						                        'strXML'   => $strXML                      
						                )); 
						$options = array('location' => 'http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx');
						 
						$result = $client->__soapCall($function, $arguments, $options);

						$result = $result->ConsultaProdutoResult->any;		
						
						$rsResult  = simplexml_load_string($result); 


						$statusdoproduto = (string)$rsResult->XML->MagazineLuiza->ConsultaProduto->idStatus;
                                      

                        if($statusdoproduto != 0){

							$this->redirect(array('controller' => 'campanhas', 'action' => 'semlimitescarrinho?ERROPRODUTO='.$produto['Produto']['DESCRICAO'])); 			
							exit();

                        }
                                      

                 		$compraLIBERADO = (string)$rsResult->XML->MagazineLuiza->ConsultaProduto->Liberado; 

							if($compraLIBERADO != 1){

							$this->redirect(array('controller' => 'campanhas', 'action' => 'semlimitescarrinho?ERROPRODUTO='.$produto['Produto']['DESCRICAO'])); 			
							exit();
							
							} 


						/* Consulta de Estoque Online */



						/* Consulta de Preco Online */

						$client = new SoapClient('http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx?WSDL');
						 
						$function = 'ConsultaPrecoProduto';
						 	

						$strXML ="
						<xml>
						<MagazineLuiza>
						<ConsultaPrecoProduto>
							<Codigo>".$produto['produtos']['CODIGO']."</Codigo>
							<Modelo>".$produto['produtos']['MODELO']."</Modelo>			
							<IdResgateCampanha>654</IdResgateCampanha>
						</ConsultaPrecoProduto>
						</MagazineLuiza> 
						</xml>"; 

						$arguments= array('ConsultaPrecoProduto' => array(
						                        'strXML'   => $strXML                      
						                )); 
						$options = array('location' => 'http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx');
						 
						$result = $client->__soapCall($function, $arguments, $options);


						$result = $result->ConsultaPrecoProdutoResult->any;		
						
						$rsResult  = simplexml_load_string($result);

						$VALOR_REAIS = (string)$rsResult->XML->MagazineLuiza->ConsultaPrecoProduto->Valor_Reais; 


						/* Consulta de Preco Online */ 


						$VALOR = $VALOR + $VALOR_REAIS; 

						$produtosEmail .= "- ".$produto['produtos']['DESCRICAO']." : ".$VALOR_REAIS."<br>";

					}

					$produtosEmail .= "- Frete : ".$this->request->data['valorfrete']."<br>"; 

					$VALOR = $VALOR + $this->request->data['valorfrete'];					

				} 

			}else{
				echo "ERRO 01";
				exit(); 
			}


			$pontos =  $this->Usuario->pontosUsuario(); 



			if($VALOR >= number_format($pontos, 2, '.', '')){

				$this->Session->write('msgTela', "Você não possui pontos suficientes para efetuar a compra");  

				$this->redirect(array('controller' => 'campanhas', 'action' => 'msg')); 
				exit();


			}    


			if($VALOR > 1787.00){

				$this->Session->write('msgTela', "O valor máximo de pontos permitidos para a troca por produtos é de 1.787 pontos");  

				$this->redirect(array('controller' => 'campanhas', 'action' => 'msg')); 
				exit();

			}		


			if(number_format($this->Usuario->totalComprarsUsuarioPorMes() + $VALOR, 2, '.', '') > 1787.00){

				$this->Session->write('msgTela', "O valor máximo de pontos permitidos para a troca por mês produtos é de 1.787 pontos");  

				$this->redirect(array('controller' => 'campanhas', 'action' => 'msg'));
				exit();				
			}  


 			
			/*VALIDA C USUARIO TEM PONTO*/


			$rsPedido['Pedido']['sessionid'] = $this->request->data['Chave_sessaoFrete'];

			$this->Pedido->save($rsPedido); 


			$IDDOPEDIDO = $this->Pedido->id;


			/* SOAP PARA FINALIZAR O PEDIDO  */

			$client = new SoapClient('http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx?WSDL');
			 			

			$cpf = $this->analisa($idUsuarios['Usuario']['cpf']);      

 
			$strXML ="
		<xml>
		<MagazineLuiza>
		<Carrinho>
		<Chave_sessao>".$this->request->data['Chave_sessaoFrete']."</Chave_sessao>
		<CPF>". $cpf ."</CPF>
		<IdResgateCampanha>654</IdResgateCampanha>
		<CEP>".$this->request->data['cepFrete']."</CEP>
		<Endereco>".$this->request->data['endereco']."</Endereco>
		<Numero>".$this->request->data['numero']."</Numero>
		<Complemento>".$this->request->data['complemento']."</Complemento>
		<Bairro>".$this->request->data['bairro']."</Bairro>
		<Cidade>".$this->request->data['cidade']."</Cidade>
		<Estado>".$this->request->data['estado']."</Estado>
		<DDD></DDD>
		<Telefone></Telefone>	
		<Nome_Premiado>". $idUsuarios['Usuario']['nome']."</Nome_Premiado>
		<Inscricao></Inscricao>
		<PedidoParceiro>".$IDDOPEDIDO."</PedidoParceiro>
		</Carrinho>
		</MagazineLuiza>
		</xml>"; 
		 			

		$function = 'FinalizaPedido';
		$arguments= array('FinalizaPedido' => array(
		                        'strXML'   => $strXML                      
		                )); 
		$options = array('location' => 'http://corporativo.magazineluiza.com.br/MLCorpPlataformaWS/WSCorpPlataforma.asmx');
		 
		$result = $client->__soapCall($function, $arguments, $options);

		$result = $result->FinalizaPedidoResult->any;


		$cpf = $idUsuarios['Usuario']['cpf'];

		$rsResult  = simplexml_load_string($result); 
				
		$idStatusPedido = (string)$rsResult->XML->MagazineLuiza->Pedidos->idStatus;

		$rsCompra['Compra']['idStatusPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->idStatus;

		$rsCompra['Compra']['Chave_sessaoPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Chave_sessao;

		$rsCompra['Compra']['CPFPedido'] = $cpf; 

		$rsCompra['Compra']['PedidoPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Pedido; 
		
		$rsCompra['Compra']['Quantidade_itensPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Quantidade_itens;
		$rsCompra['Compra']['Valor_ReaisPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Valor_Reais;

		$rsCompra['Compra']['Valor_MoedaPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Valor_Moeda;

		$rsCompra['Compra']['CEPPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->CEP;
		$rsCompra['Compra']['EnderecoPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Endereco;

		$rsCompra['Compra']['NumeroPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Numero;

		//$rsCompra['Compra']['prazoPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Prazo;
			

		$rsCompra['Compra']['ComplementoPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Complemento;
		$rsCompra['Compra']['BairroPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Bairro;
		$rsCompra['Compra']['CidadePedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Cidade;
		$rsCompra['Compra']['EstadoPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Estado;
		$rsCompra['Compra']['PrevisaoPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Previsao;
		$rsCompra['Compra']['Valor_Tot_ProdutoPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Valor_Tot_Produto;
		$rsCompra['Compra']['Valor_Tot_Produto_MoedaPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Valor_Tot_Produto_Moeda;
		$rsCompra['Compra']['Valor_FretePedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Valor_Frete;
		$rsCompra['Compra']['Valor_Frete_MoedaPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Valor_Frete_Moeda;
		$rsCompra['Compra']['MensagemPedido'] = (string)$rsResult->XML->MagazineLuiza->Pedidos->Mensagem;

		$rsCompra['Compra']['idpedidoInterno'] = $IDDOPEDIDO; 




		//print_r($rsResult->XML->MagazineLuiza->Pedidos->ListaProdutos); 
		//SE PEDIDO FOR IGUAL A 0 SALVA COMPRA NO BANCO DE DADOS
		if($idStatusPedido == "0"){

		

			foreach ($rsResult->XML->MagazineLuiza->Pedidos->ListaProdutos->Produto as $mlproduto) {
				
				$this->Compra->create(); 
				

				$rsCompra['Compra']['codproduto'] = $mlproduto->Codigo;

				$rsCompra['Compra']['modeloproduto'] = $mlproduto->Modelo;
				$rsCompra['Compra']['quantidadeproduto'] = $mlproduto->Quantidade;
				$rsCompra['Compra']['valor_reais_produtoproduto'] = $mlproduto->valor_reais_produto;
				$rsCompra['Compra']['valor_moeda_produtoproduto'] = $mlproduto->valor_moeda_produto;
				$rsCompra['Compra']['Liberadoproduto'] =$mlproduto->Liberado;
				$rsCompra['Compra']['Estoqueproduto'] = $mlproduto->Estoque;
			
				$this->Compra->save($rsCompra); 
				
			}




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

			//$para = "loja@campanhaclubedelideres.com.br";

			$para = $idUsuarios['Usuario']['email']; 
			

			$html = $texto; 

			$emails['email']['Subject'] = utf8_decode('Clube de Líderes - Sem Limites - Loja');

			$emails['email']['AddAddress'] = $para; 
			 
			$emails['email']['MsgHTML'] = $html;

			
			$this->Enviaremail->enviarEmail($emails);

	
				
				
				//ZERAR CARRRINHO
				$this->Session->write('carrinho6', "");

				$this->Session->write('msgTela', "Compra efetuada com sucesso");

				$this->redirect(array('controller' => 'campanhas', 'action' => 'msg')); 

			//idpedidoInterno


		}else{

			$this->Session->write('msgTela', "Erro ao efetuar compra ".$rsCompra['Compra']['MensagemPedido']);  

			$this->redirect(array('controller' => 'campanhas', 'action' => 'msg')); 

		}  
		   
		    /* SOAP PARA FINALIZAR O PEDIDO */  

						  

			exit();
		} 




		

		exit();

	}


	public function analisa($val)
	{


		$maskared = "";

			if(strlen($val) == 10){

				$maskared = "0".$val;
			}else if(strlen($val) == 9){

				$maskared = "00".$val;
			}else if(strlen($val) == 8){

				$maskared = "000".$val;
			}else if(strlen($val) == 7){

				$maskared = "0000".$val;
			}else if(strlen($val) == 6){

				$maskared = "00000".$val;
			}else if(strlen($val) == 5){

				$maskared = "000000".$val;
			}else{

				$maskared = $val; 
			}


		 return $maskared;


	}


	public function msg() {
 

		$msg = $this->Session->read('msgTela');

		$this->set(compact('msg')); 


		$this->Session->write('msgTela', ""); 


		$this->set('title_for_layout', 'Sem Limites');

		$this->layout = 'ajax'; 



	} 


	public function encerrado() {
 

		$msg = $this->Session->read('msgTela');

		$this->set(compact('msg')); 


		$this->Session->write('msgTela', ""); 


		$this->set('title_for_layout', 'Sem Limites');

		$this->layout = 'ajax'; 



	} 




	public function sucessopedecarona($id = null) { 
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'sucessopedecarona'))); 

			$tipo = ""; 
			$HmltText = ""; 
			if($id == "regulamento"){ 
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}  

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'O Sucesso Pede Carona');

		$this->layout = 'ajax'; 
	}


	public function sucessopedecaronapremiacao($id = null) { 
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'sucessopedecaronapremiacao'))); 

			$tipo = "";
			$HmltText = ""; 
			
			if($id == "regulamento"){ 
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			
			}  


		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'O Sucesso Pede Carona');

		$this->layout = 'ajax'; 
	}





	public function sucessopedecaronagenebra($id = null) { 
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'sucessopedecaronagenebra'))); 

			$tipo = ""; 
			$HmltText = ""; 
			if($id == "regulamento"){ 
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			}  

		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'O Sucesso Pede Carona Genebra');

		$this->layout = 'ajax'; 
	}
	
	
	public function sucessopedecaronapremiacaogenebra($id = null) { 
			$rsCampanhas = $this->Campanha->find('first', array('conditions' => array (
			"Campanha.campanha_nomeid" => 'sucessopedecaronapremiacaogenebra'))); 

			$tipo = "";
			$HmltText = ""; 
			
			if($id == "regulamento"){ 
				$tipo = "regulamento";
				$HmltText = $rsCampanhas['Campanha']['regulamento'];
			
			}elseif($id == "ranking"){
				$tipo = "ranking";
				$HmltText = $rsCampanhas['Campanha']['ranking'];
			
			}elseif($id == "premiacao"){
				$tipo = "premiacao";
				$HmltText = $rsCampanhas['Campanha']['premiacao'];
			
			}else{
				$tipo = "descricao";
				$HmltText = $rsCampanhas['Campanha']['descricao']; 
			
			}  


		$this->set('tipo', $tipo); 	
		$this->set('HmltText', $HmltText);	
		$this->set('title_for_layout', 'O Sucesso Pede Carona Genebra');

		$this->layout = 'ajax'; 
	}




}