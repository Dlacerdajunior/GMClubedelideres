<?php 
class CursosMobileController extends AppController{


	public $uses = array('Curso','Categoria', 'Status', 'Cursoepisodio', 'Cursonivel','Transacoes','Acesso','Configuracao', 'Cursocupom','Cursoepisodioitem','Cursosvisualizados');


    public $components = array('RequestHandler');

    /**
     * $tipo =0 - todos
     */
	public function getCursosRecentes($id_tipo = 0, $limit = 8){
            
		//somente ativos
		$conditions = array("Curso.status" => 1);

		//Caso seja especificado o tipo, traz somente esse tipo
		if($id_tipo > 0) $conditions['Curso.id_tipo'] = $id_tipo;
		
		//Obtem os cursos
		$cursos = $this->Curso->find('all', array(
			'order' => array('Curso.id' => 'DESC'),
			'conditions' => $conditions,
			'limit' => $limit
			));


		$cursos = $this->trataCamposCursos($cursos);

		$this->set(array(
			'cursos' => $cursos,
			'_serialize' => array('cursos')
			));
	}

	private function trataCamposCursos($cursos){
		//tratamento de alguns campos
		foreach ($cursos as $key => $curso) {

			//corta título
			if(strlen($curso['Curso']['nome']) > 40){
				$cursos[$key]['Curso']['nome'] = substr($curso['Curso']['nome'], 0, 40) . '...';
			}

			//corta descrição
			if(strlen($curso['Curso']['descricao']) > 150){
				$cursos[$key]['Curso']['descricao'] = substr($curso['Curso']['descricao'], 0, 150) . '...';
			}

		}
		return $cursos;
	}


	public function getCategorias(){
		$categorias = $this->Categoria->find('all');
		$this->set(array(
			'categorias' => $categorias,
			'_serialize' => array('categorias')
		));		
	}

	/**
	 * Obtem os cursos da categoria selecionada
	 */
	public function getCursos($id_categoria = 'todas', $id_tipo = 1, $limit = 6, $page = 1){

		//Traz apenas o tipo selecionado
		$conditions = array(
			'Curso.id_tipo' => $id_tipo,
			'Curso.status' => 1,
		);
		//Caso não seja todas as categorias
		if($id_categoria != 'todas') $conditions['id_categoria'] = $id_categoria;
		
		//Obtem os cursos
		$cursos = $this->Curso->find('all', array(
				'conditions' => $conditions, 
				'order' => array('Curso.id' => 'DESC'),
				'limit' => $limit,
				'page' => $page,
		));
		//Total de itens retornados na consulta acima (paginação)
		$total = $this->Curso->find('count', array('conditions' => $conditions));

		//Total de páginas geradas
		$totalPags = ceil($total/$limit);
			
		//Define o html da paginação		
		$paramsStr = "acao=videos&categoria_id={$id_categoria}&tipo={$id_tipo}&limit={$limit}";
		$paginationHtml = $this->getPaginationHtml($totalPags, $page, $paramsStr);

		//Trata o tamanho dos texto (títulos e descrições)
		$cursos = $this->trataCamposCursos($cursos);

		$this->set(array(
			'cursos' => $cursos,
			'paginationHtml' => $paginationHtml,
			'_serialize' => array('cursos', 'paginationHtml')
		));		
	}

	/**
	 * Obtem os cursos/videoconferências a partir da busca (recebe post)
	 */
	public function getCursosBusca($limit = 6, $page = 1){


		//BUSCA 
		$busca = '%'. urldecode($this->request->data['q']).'%';
				
		$conditions = array(
			"Curso.status !=" => 2,
			array(
				'OR' => array(
					'Curso.nome LIKE' => $busca,
            		'Curso.descricao LIKE' => $busca,
				)
			) 
        );

		
		//Obtem os cursos
		$cursos = $this->Curso->find('all', array(
			'conditions' => $conditions,
			'order' => array('Curso.id' => 'DESC'),
			'limit' => $limit,
			'page' => $page,
		));

		//Total de itens retornados na consulta acima (paginação)
		$total = $this->Curso->find('count', array('conditions' => $conditions));

		//Total de páginas geradas
		$totalPags = ceil($total/$limit);
			
		//Define o html da paginação		
		$paramsStr = "acao=videos&q={$this->request->data['q']}&limit={$limit}";
		$paginationHtml = $this->getPaginationHtml($totalPags, $page, $paramsStr);

		//Trata o tamanho dos texto (títulos e descrições)
		$cursos = $this->trataCamposCursos($cursos);

		$this->set(array(
			'cursos' => $cursos,
			'paginationHtml' => $paginationHtml,
			'_serialize' => array('cursos', 'paginationHtml')
		));		
	}

	/**
	 * Obtem o resultado da paginacao
	 */ 
	private function getPaginationHtml($totalPags, $pagAtual, $paramsStr){


		$paginationHtml = '';

		//Caso exista mais de uma página
		if($totalPags > 1){

			//Define os itens da paginação		
			$paginationLis = '';
			for($a=1; $a <= $totalPags; $a++){
				$class = '';
				//Se for a página atual, marca como ativa
				if($a==$pagAtual) $class = ' class="active"';
				$paginationLis .= "<li{$class}><a href=\"interna.html?{$paramsStr}&page={$a}\">{$a}</a></li>";
			}

			//Paginação Anterior
			$paginationLiAnterior = "<li><a href=\"interna.html?{$paramsStr}&page=" . ($pagAtual-1) . "\">&laquo;</a></li>";
			if($pagAtual == 1) $paginationLiAnterior = "<li class=\"disabled\"><a href=\"javascript:void(0)\">&laquo;</a></li>";

			//Paginação proximo
			$paginationLiProximo = "<li><a href=\"interna.html?{$paramsStr}&page=" . ($pagAtual+1) . "\">&raquo;</a></li>";
			if($pagAtual == $totalPags) $paginationLiProximo = "<li class=\"disabled\"><a href=\"javascript:void(0)\">&raquo;</a></li>";


			//Define o html da paginação
			$paginationHtml = "
			<ul>
				{$paginationLiAnterior}
				{$paginationLis}
				{$paginationLiProximo}
			</ul>
			";
		}

		return $paginationHtml;
	}


 	//PEGAR o Curso pelo id 
    function curso($id = null, $idcapitulo = null) {
    
    	
        	$rsCursoepisodio = array();
    	$usuarioAuthentication = 1;
    	$videoInicial = 0;
    	//Pegar Valor do Dollar
        $valorDollar = $this->Configuracao->GetConfigValor(5);

		//PEGA ID DO USUARIO LOGADO NO SISTEMA
		$idUsuario = $this->Session->read('Usuario.id');


    	//ESSA VARIAVEL QUE VAI DIZER C ESSE CURSO PRECISA SER PAGO OU PRECISA DE UMA ASSINATUA
    	$msgERROTipo = 0;


    	//PEGA INFO DO CURSO
        $options = array(
                'conditions' => array(array("Curso.status !=" => 0, "Curso.id =" => $id))
            );
        $curso = $this->Curso->find('all',$options);

    	//FUNCAO PARA INCREMENTAR VISUALIZACAO 
        $this->Curso->incrementeVisualicao($curso[0]['Curso']['id'], $curso[0]['Curso']['visualizacao']);
       
        if(isset($idUsuario)){
        	$this->Curso->incrementeHistorico($curso[0]['Curso']['id'], $this->Session->read('Usuario.id'));
        }

        	
        //PEGA CAPTLOSS E SUB ITENS
        $options = array(
        		'order' => array('Cursoepisodio.ordenacao' => 'ASC'),
                'conditions' => array(array("Cursoepisodio.curso_id =" => $id))
            ); 
        $listaEpisodio = $this->Cursoepisodio->find('all',$options); 





    	if($idcapitulo == 'SUCESSO'){

			//SE O USUARIO JA TEM UM PLANO , ELE QUISER VER ESSE CURSO O CURSO
	    	//SERA INSERIDO UM REGISTRO NA TABELA CURSOVISUALIZADOS
	    	//SENDO ASSIM A VALIDACAO SE ELE PODE VER ESSE CURSO E NESSA TABELA TAMBEM
	    	$cursoVisalizar['Cursosvisualizados']['id_usuario'] = $idUsuario;
	    	$cursoVisalizar['Cursosvisualizados']['id_curso'] = $id;
		  	$rsCursoVisualidaos = $this->Cursosvisualizados->find('first', array(
	                    'conditions' => array("Cursosvisualizados.id_usuario" => $idUsuario, "Cursosvisualizados.id_curso" => $id)));    
		     
		     if(count($rsCursoVisualidaos) == 0){
		     	$this->Cursosvisualizados->save($cursoVisalizar, array('validate' => false));
		     }

    	}
	

        //SE O CURSO TIVER PRECO CAI NA VALIDACA DA MODEL PARA VER C O USUARIO COMPROU OU NAO SE ELE 
    	//COMPROU VAI RETORNAR 1
   		if($curso[0]['Curso']['preco'] != ""){

   			$usuarioAuthentication = $this->Curso->validarUsuarioCurso($curso[0]['Curso']['id']);
   			$msgERROTipo = 1; 		
   		}
   		

     	//SE O CURSO FOR SOMENTE PARA ASINANDTES valida na MODEL PARA VER C O USUARIO 
     	//tem ou nao a assinatura do sabixao
   		if($curso[0]['Curso']['id_acesso'] == 1){ 

   			$usuarioAuthentication = $this->Curso->validarUsuarioAssinatura($curso[0]['Curso']['id']);
   			$msgERROTipo = 2;

   			//RETRONO 2 SIGUINIFICA QUE O USUARIO 
   			//ELE JA TEM UM PLANO 
   			//MAS PRECISA DA CONFIMARCAO 
   			//PARA SABE C ELE REALMENTE QUE ASSISTEIR ESSE CURSO
   			if($usuarioAuthentication == 2){
   				$usuarioAuthentication = 0;
   				$msgERROTipo = 3;
   			}

   			//RETORNO 3 SIGUINIFICA QUE O USUARIO JA atingiu SEU LIMIT DE 
   			//VISUALIZAR OS CURSOS
   			if($usuarioAuthentication == 3){
   				$usuarioAuthentication = 0;
   				$msgERROTipo = 4;
   			}

   			 			
   		}

   		//SE O ID DO USUARIO FOR IGUAL A DO CRIADOR DO CURDO 
   		//ELE VAI PODER VISUALIZAR O CURSO MESMO ASSIM 
   		if($curso[0]['Curso']['id_usuario'] == $idUsuario){ 

   			$usuarioAuthentication = 1;
   		} 


       	if(!isset($idcapitulo)){

       		$videoInicial = 1; 
       	}


        if (isset($curso[0]['Cursoepisodio']['0']['id'])) {    			


        		
	    	if(isset($idcapitulo) && $idcapitulo != ""){

	    		$idpisodio = $idcapitulo;
	    		  	$options = array(
                	'conditions' => array(array("Cursoepisodioitem.id =" => $idpisodio))
            	);

        		$rsCursoepisodio = $this->Cursoepisodioitem->find('first', $options);

	    	}else{

	    		$rsCursoepisodio['Cursoepisodioitem']['foto'] = $curso[0]['Curso']['foto'];
	    		$rsCursoepisodio['Cursoepisodioitem']['video'] = $curso[0]['Curso']['video'];
	    		$rsCursoepisodio['Cursoepisodioitem']['nome'] = "";
	    		$rsCursoepisodio['Cursoepisodioitem']['descricao'] = ""; 
	    		
	    		
	    	
	    	}

          
    	
    	}

    	
       	$_serialize = array('curso','rsCursoepisodio','usuarioAuthentication','msgERROTipo','valorDollar','listaEpisodio','idcapitulo','videoInicial');
        $this->set(compact('curso','rsCursoepisodio','usuarioAuthentication','msgERROTipo','valorDollar','listaEpisodio','idcapitulo','videoInicial', '_serialize'));
        
    } 


	/**
	 * Obtem o curso selecionado
	 */
	public function getCurso($curso_id){

		$curso = $this->Curso->find('first', array('conditions' => array("Curso.status !=" => 0, "Curso.id =" => $curso_id)));
	
        $usuarioAuthentication = $msgERROTipo  = $rsCursoepisodio = null;
        if($this->Session->check('Usuario.id')){
        	$this->Curso->incrementeHistorico($curso['Curso']['id'], $this->Session->read('Usuario.id'));
        } 

        //FUNCAO PARA INCREMENTAR VISUALIZACAO 
        $this->Curso->incrementeVisualicao($curso['Curso']['id'], $curso['Curso']['visualizacao']);
       
        if (isset($curso['Cursoepisodio']['0']['id'])) {
       		    		

        	//SE O CURSO TIVER PRECO CAI NA VALIDACA DA MODEL PARA VER C O USUARIO COMPROU OU NAO SE ELE 
        	//COMPROU VAI RETORNAR 1
       		if($curso['Curso']['preco'] != ""){

       			$usuarioAuthentication = $this->Curso->validarUsuarioCurso($curso['Curso']['id']);
       			$msgERROTipo = 1; 		
       		}


         	//SE O CURSO FOR SOMENTE PARA ASINANDTES valida na MODEL PARA VER C O USUARIO 
         	//tem ou nao a assinatura do sabixao
       		if($curso['Curso']['id_acesso'] == 1){ 

       			$usuarioAuthentication = $this->Curso->validarUsuarioAssinatura($curso['Curso']['id']);
       			$msgERROTipo = 2; 			
       		}	
       		
	        	
		    	if(isset($idcapitulo) && $idcapitulo != ""){

		    		$idpisodio = $idcapitulo;
		    		  $options = array(
	                'conditions' => array(array("Cursoepisodio.id =" => $idpisodio))
	            	);

	        	$rsCursoepisodio = $this->Cursoepisodio->find('first',$options);

		    	}else{
		    		$rsCursoepisodio['Cursoepisodio']['video'] = $curso['Curso']['video'];

		    		$rsCursoepisodio['Cursoepisodio']['nome'] = "";
		    		$rsCursoepisodio['Cursoepisodio']['descricao'] = "";
		    		
		    	
		    	}

          
        	
        	}
    	

		$this->set(array(
			'curso' => $curso,
			'rsCursoepisodio' => $rsCursoepisodio,
			'usuarioAuthentication' => $usuarioAuthentication,
			'msgERROTipo' => $msgERROTipo,
			'_serialize' => array('curso', 'rsCursoepisodio', 'usuarioAuthentication', 'msgERROTipo')
		));		
	}

	/**
	 * Obtem o episodio selecionado
	 */
	public function getCursoEpisodio($cursoepisodio_id){

		$this->Curso->Cursoepisodio->id = $cursoepisodio_id;
		$cursoEpisodio = $this->Curso->Cursoepisodio->read();
		$this->set(array(
			'cursoEpisodio' => $cursoEpisodio,
			'_serialize' => array('cursoEpisodio')
		));		
	}

	/**
	 * Obtem o curso selecionado
	 */
	public function getCategoria($categoria_id){

		$this->Categoria->id = $categoria_id;
		$categoria = $this->Categoria->read();
		$this->set(array(
			'categoria' => $categoria,
			'_serialize' => array('categoria')
		));		
	}

}