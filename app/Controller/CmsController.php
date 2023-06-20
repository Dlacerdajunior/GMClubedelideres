<?php

App::uses('AppController', 'Controller');


class CmsController extends AppController {


	public $name = 'Cms';

	public $uses = array('Administrador', 'Produto');

    public function beforeFilter() {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 9234561); 
    }


function index() {

	 $this->redirect(array('controller' => 'cms', 'action' => 'login'));

}


function login() {

	$showmenu = 0;

	if(!empty($this->data)) {
		
		$dbuser = $this->Administrador->find('first', array('conditions' => array (
			"Administrador.username" => $this->data['cms']['username'],
			"Administrador.password" => md5($this->data['cms']['password']))
		)
		);

		if(!empty($dbuser)) {
			
			$this->Session->write('User', $dbuser);
			
			$dbuser['Administrador']['last_login'] = date("Y-m-d H:i:s");
			$this->Administrador->save($dbuser);
			
			
			$this->redirect(array('controller' => 'admin', 'action' => 'usuarios'));
                
		} else {
			$this->Session->setFlash('Nome de usuário ou senha está incorreta.');
		
		} 
	}



	$this->layout = 'ajax';
} 
 
	function logout() {
		$this->Session->delete('User');
		$this->Session->setFlash('Você se conectou com sucesso.');
		$this->redirect('/Cms/login');
	}

		


	public function importProdutosMagazine($id = null) {
	

	//$xml = "http://corporativo.magazineluiza.com.br/xmlCatalogo.asp?idResgatecampanha=654&DataInicio=30/05/2014";  

		
	$xml = "http://corporativo.magazineluiza.com.br/xmlCatalogo.asp?idResgatecampanha=654";


	$response_xml_data = file_get_contents($xml); 

	$xml  = simplexml_load_string($response_xml_data);

	$a = array();

	$rows = $xml->children('rs', TRUE)->data->children('z', TRUE)->row;
		foreach ($rows as $row) {

		    $attributes = $row->attributes();
				    
		$this->Produto->create(); 

		    $CODIGO = (string) $attributes->CODIGO;
		    $MODELO = (string) $attributes->MODELO;		    
		    $CATEGORIA = (string) $attributes->CATEGORIA;
		    $DESC_CATEGORIA = (string) $attributes->DESC_CATEGORIA;
		    $SUBCATEGORIA = (string) $attributes->SUBCATEGORIA;
		    $DESC_SUBCATEGORIA = (string) $attributes->DESC_SUBCATEGORIA;
		    $REFERENCIA = (string) $attributes->REFERENCIA;
		    $DESCRICAO = (string) $attributes->DESCRICAO;
		    $VOLTAGEM = (string) $attributes->VOLTAGEM;
		    $MARCA = (string) $attributes->MARCA;
		    $IMAGEM = (string) $attributes->IMAGEM;
		    $IMAGEM_VITRINE = (string) $attributes->IMAGEM_VITRINE;
		    $IMAGEM_VITRINE_GRANDE = (string) $attributes->IMAGEM_VITRINE_GRANDE;
		    $IMAGEM_CATEGORIA = (string) $attributes->IMAGEM_CATEGORIA;
		    $IMAGEM_PRODUTO_PPI = (string) $attributes->IMAGEM_PRODUTO_PPI;
		    $IMAGEM_PRODUTO_DETALHE = (string) $attributes->IMAGEM_PRODUTO_DETALHE; 
		    $IMAGEM_PRODUTO_GRANDE = (string) $attributes->IMAGEM_PRODUTO_GRANDE; 
		    $QTDE_DETALHES = (string) $attributes->QTDE_DETALHES; 
		    $VALOR = (string) $attributes->VALOR; 
		    $VALOR_VENDA = (string) $attributes->VALOR_VENDA; 
		    $ATIVO = (string) $attributes->ATIVO; 
		    $CLASSIFICACAO_FISCAL = (string) $attributes->CLASSIFICACAO_FISCAL; 
		    $ACAO = (string) $attributes->ACAO;
		    $DATA_ALTERACAO = (string) $attributes->DATA_ALTERACAO;
		    $TEM_MONTAGEM = (string) $attributes->TEM_MONTAGEM;


		$CODIGO = (isset($CODIGO) ? $CODIGO : "");
		$rsProduto['Produto']['CODIGO'] = $CODIGO;

		$MODELO = (isset($MODELO) ? $MODELO : "");
		$rsProduto['Produto']['MODELO'] = $MODELO;

		$CATEGORIA = (isset($CATEGORIA) ? $CATEGORIA : "");
		$rsProduto['Produto']['CATEGORIA'] = $CATEGORIA;

		$DESC_CATEGORIA = (isset($DESC_CATEGORIA) ? $DESC_CATEGORIA : "");
		$rsProduto['Produto']['DESC_CATEGORIA'] = $DESC_CATEGORIA;

		$SUBCATEGORIA = (isset($SUBCATEGORIA) ? $SUBCATEGORIA : "");
		$rsProduto['Produto']['SUBCATEGORIA'] = $SUBCATEGORIA;

		$DESC_SUBCATEGORIA = (isset($DESC_SUBCATEGORIA) ? $DESC_SUBCATEGORIA : "");
		$rsProduto['Produto']['DESC_SUBCATEGORIA'] = $DESC_SUBCATEGORIA;

		$REFERENCIA = (isset($REFERENCIA) ? $REFERENCIA : "");
		$rsProduto['Produto']['REFERENCIA'] = $REFERENCIA;

		$DESCRICAO = (isset($DESCRICAO) ? $DESCRICAO : "");
		$rsProduto['Produto']['DESCRICAO'] = $DESCRICAO;

		$VOLTAGEM = (isset($VOLTAGEM) ? $VOLTAGEM : "");
		$rsProduto['Produto']['VOLTAGEM'] = $VOLTAGEM;

		$MARCA = (isset($MARCA) ? $MARCA : "");
		$rsProduto['Produto']['MARCA'] = $MARCA;

		$IMAGEM = (isset($IMAGEM) ? $IMAGEM : "");
		$rsProduto['Produto']['IMAGEM'] = $IMAGEM;

		$IMAGEM_VITRINE = (isset($IMAGEM_VITRINE) ? $IMAGEM_VITRINE : "");
		$rsProduto['Produto']['IMAGEM_VITRINE'] = $IMAGEM_VITRINE;

		$IMAGEM_VITRINE_GRANDE = (isset($IMAGEM_VITRINE_GRANDE) ? $IMAGEM_VITRINE_GRANDE : "");
		$rsProduto['Produto']['IMAGEM_VITRINE_GRANDE'] = $IMAGEM_VITRINE_GRANDE;

		$IMAGEM_CATEGORIA = (isset($IMAGEM_CATEGORIA) ? $IMAGEM_CATEGORIA : "");
		$rsProduto['Produto']['IMAGEM_CATEGORIA'] = $IMAGEM_CATEGORIA;

		$IMAGEM_PRODUTO_PPI = (isset($IMAGEM_PRODUTO_PPI) ? $IMAGEM_PRODUTO_PPI : "");
		$rsProduto['Produto']['IMAGEM_PRODUTO_PPI'] = $IMAGEM_PRODUTO_PPI;

		$IMAGEM_PRODUTO_DETALHE = (isset($IMAGEM_PRODUTO_DETALHE) ? $IMAGEM_PRODUTO_DETALHE : "");
		$rsProduto['Produto']['IMAGEM_PRODUTO_DETALHE'] = $IMAGEM_PRODUTO_DETALHE;

		$IMAGEM_PRODUTO_GRANDE = (isset($IMAGEM_PRODUTO_GRANDE) ? $IMAGEM_PRODUTO_GRANDE : "");
		$rsProduto['Produto']['IMAGEM_PRODUTO_GRANDE'] = $IMAGEM_PRODUTO_GRANDE;

		$QTDE_DETALHES = (isset($QTDE_DETALHES) ? $QTDE_DETALHES : "");
		$rsProduto['Produto']['QTDE_DETALHES'] = $QTDE_DETALHES;

		$VALOR = (isset($VALOR) ? $VALOR : "");
		$rsProduto['Produto']['VALOR'] = $VALOR;

		$VALOR_VENDA = (isset($VALOR_VENDA) ? $VALOR_VENDA : "");
		$rsProduto['Produto']['VALOR_VENDA'] = $VALOR_VENDA;

		$ATIVO = (isset($ATIVO) ? $ATIVO : "");
		$rsProduto['Produto']['ATIVO'] = $ATIVO;

		$CLASSIFICACAO_FISCAL = (isset($CLASSIFICACAO_FISCAL) ? $CLASSIFICACAO_FISCAL : "");
		$rsProduto['Produto']['CLASSIFICACAO_FISCAL'] = $CLASSIFICACAO_FISCAL;

		$ACAO = (isset($ACAO) ? $ACAO : "");
		$rsProduto['Produto']['ACAO'] = $ACAO;

		$DATA_ALTERACAO = (isset($DATA_ALTERACAO) ? $DATA_ALTERACAO : "");
		$rsProduto['Produto']['DATA_ALTERACAO'] = $DATA_ALTERACAO;

		$TEM_MONTAGEM = (isset($TEM_MONTAGEM) ? $TEM_MONTAGEM : "");
		$rsProduto['Produto']['TEM_MONTAGEM'] = $TEM_MONTAGEM;	

		
		$checkproduto = $this->Produto->find('first', array(
        'conditions' => array("Produto.CODIGO" => $CODIGO,"Produto.MODELO" => $MODELO)));
				
			if(count($checkproduto) >= 1){
				
				$this->Produto->id = $checkproduto['Produto']['id'];
			} 
		
		
		$this->Produto->save($rsProduto);

		} 

		echo "Atualização feita com Sucesso !";

		exit();  

	}







}
