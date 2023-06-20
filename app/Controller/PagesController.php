<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController { 


	public function beforeFilter() {
        parent::beforeFilter();
        $this->Enviaremail = $this->Components->load('Enviaremail');            
    } 

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

	public $uses = array('Campanha', 'Galeria', 'Telao','Usuario');

	var $helpers = array('Util'); 

/** 
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */



	
	public function desabilitarpop() {


		$idUsuarios = $this->Session->read('Usuario');		
		if($idUsuarios['Usuario']['id'] != null){

			$userID = $idUsuarios['Usuario']['id'];

			//ATENTION!!!!!
			//SE POPUPHOME FOR = 1 O USUARIO JA VIU O POP UP 
			//ENTAO NAO VAI MOSTRAR OUTRA VEZ
			$rsUSUARIO = $this->Usuario->query("UPDATE usuarios SET popuphome = '1' WHERE id ='$userID'");

			$this->redirect(array('controller' => 'pages', 'action' => 'display')); 


        }	
        $this->redirect(array('controller' => 'pages', 'action' => 'display')); 

	}


	public function display() {


		//$IdAdministrador = $this->Session->read('User');
		//if($IdAdministrador['Administrador']['id'] != null){

		$showPOPUP = 0;

		$options = array(
				'order' => array('Telao.id' => 'DESC')
			); 

		$rsTelao = $this->Telao->find('all', $options); 

		$rsCampanha = $this->Campanha->find('all', array(
				'order' => array('Campanha.id' => 'DESC'),
        		'conditions' => array("Campanha.show_lista" => 1)
    				)); 



		$idUsuarios = $this->Session->read('Usuario');		
		if($idUsuarios['Usuario']['id'] != null){

			$userID = $idUsuarios['Usuario']['id'];
			$rsUSUARIO = $this->Usuario->query("SELECT popuphome FROM usuarios USUARIO WHERE id = '$userID'");

			//ATENTION!!!!!
			//SE POPUPHOME FOR = 1 O USUARIO JA VIU O POP UP 
			//ENTAO NAO VAI MOSTRAR OUTRA VEZ
			if($rsUSUARIO[0]['USUARIO']['popuphome'] == 1){

				$showPOPUP = 1;
					
			} 


        }


		//}else{

		//$idUsuario = $this->Session->read('Usuario');
		//codigo usurio cdva
		//
				
		//$usuarioCADV = $idUsuario['Usuario']['codigo_funcao_cadv'];

		//$rsTelao = $this->Telao->query("SELECT * FROM telao Telao
		//								INNER JOIN telao_permisao tp on (Telao.id = tp.id_telao) where tp.cod_funcaoCADV = '$usuarioCADV' ORDER BY Telao.id DESC"); 
 	 

 		//$rsCampanha = $this->Campanha->query("SELECT * FROM campanhas Campanha
		//								INNER JOIN campanhas_permisao tp on (Campanha.id = tp.id_campanha) where tp.cod_funcaoCADV = '$usuarioCADV' and Campanha.show_lista = 1 ORDER BY Campanha.id ASC");

		//}
		
 

		$this->set(compact('rsCampanha','rsTelao', 'showPOPUP'));  

		$this->set('title_for_layout', 'Home');

	}



	public function campanhas() {



		$IdAdministrador = $this->Session->read('User');
		if($IdAdministrador['Administrador']['id'] != null){

		$rsTelao = $this->Telao->find('all');

		$rsCampanha = $this->Campanha->find('all', array(
        		'conditions' => array("Campanha.show_lista" => 1)
    				)); 
			
		}else{

		$idUsuario = $this->Session->read('Usuario');
		//codigo usurio cdva
		//
		
		$usuarioCADV = $idUsuario['Usuario']['codigo_funcao_cadv'];

		$rsTelao = $this->Telao->query("SELECT * FROM telao Telao
										INNER JOIN telao_permisao tp on (Telao.id = tp.id_telao) where tp.cod_funcaoCADV = '$usuarioCADV'");
 

 		$rsCampanha = $this->Campanha->query("SELECT * FROM campanhas Campanha
										INNER JOIN campanhas_permisao tp on (Campanha.id = tp.id_campanha) where tp.cod_funcaoCADV = '$usuarioCADV' and Campanha.show_lista = 1");

		} 


		$this->set(compact('rsCampanha')); 
		$this->set('title_for_layout', 'Campanhas'); 

	}



	public function manifesto() {
		$this->set('title_for_layout', 'Manifesto');
	}

	public function perguntas() {
		$this->set('title_for_layout', 'Perguntas Frequentes'); 

	}

	public function faleconosco() {
		$msg = "";
		$this->set('title_for_layout', 'Fale Conosco');

		
		if($this->request->is('post')){




				$texto = "Contato página Fale Conosco Clube de Líderes"."<br>";
				$texto .= "Nome : ".$this->request->data["nome"]."<br>";
				$texto .= "E-mail : ".$this->request->data["email"]."<br>";
				$texto .= "Assunto : ".$this->request->data["assunto"]."<br>";
				$texto .= "Menssagem : ".$this->request->data["menssagem"]."<br>";

				$html = $texto; 

				$emails['email']['Subject'] = utf8_decode('Contato Fale Conosco Clube de Líderes');

				$emails['email']['AddAddress'] = "callcenter@clubedelideres.com.br"; 
				 
				$emails['email']['MsgHTML'] = $html;


				$this->Enviaremail->enviarEmail($emails);

				$msg = "E-mail enviado com sucesso";	
		}      


		$this->set(compact('msg'));  


	}




		public function admin_suporte() {		

		$this->set('menuShow','suporte'); 	
		$this->layout = 'cmsnovo'; 
	}



	public function video() {

		$this->set('title_for_layout', '1a. Convenção de Líderes Chevrolet');
	}


	public function campanhasencerradas() { 
		

		$rsCampanha = $this->Campanha->find('all', array(
				'order' => array('Campanha.id' => 'DESC'),
        		'conditions' => array("Campanha.show_lista" => 0, 'Campanha.id NOT' => array(25,33,31,32))
    				)); 
 
		$this->set(compact('rsCampanha'));  

		$this->set('title_for_layout', 'Campanhas Encerradas');   	

	}


	public function votacao() {
		$msg = "";
		$this->set('title_for_layout', 'Votação');

		$idUsuarios = $this->Session->read('Usuario');

		$cpf = $idUsuarios['Usuario']['cpf'];


		//VERIFICA C JA VOTO
		$rsvotacao = $this->Campanha->query("SELECT count(*) as 'TOTAL' FROM votacao WHERE cpf = '$cpf'");
		
		if($rsvotacao[0][0]['TOTAL'] != 0){

			$msg = "Obrigado pela sua opinião!";	

		}

				
		if($this->request->is('post')){

				$voto = $this->request->data['nome'];

				//VERIFICA C JA VOTO
				$rsvotacao = $this->Campanha->query("SELECT count(*) as 'TOTAL' FROM votacao WHERE cpf = '$cpf'");
				
				if($rsvotacao[0][0]['TOTAL'] == 0){

					$this->Campanha->query("INSERT INTO votacao (id, cpf, opcao) VALUES (NULL, '$cpf', '$voto')");

				}

				


				$msg = "Obrigado pela sua opinião!";
		}      








		$this->set(compact('msg'));  


	}


	
} 