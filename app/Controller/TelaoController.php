<?php

App::uses('AppController', 'Controller');

class TelaoController extends AppController {


	public $name = 'Telao';

	public $uses = array('Telao','Teloespermissao');

	var $helpers = array('Util'); 


	public function admin_index() {

		$this->set('menuShow','telao'); 	
		$this->layout = 'cmsnovo';
	}     

	public function admin_jsondata() {

		$options = array(
				'order' => array('Telao.id' => 'DESC')
			); 

		$rsCampanhas = $this->Telao->find('all',$options);         
		
		$a = array();

		foreach ($rsCampanhas as $campanha){

			$a[] = array(
				$campanha['Telao']['id'],
				$campanha['Telao']['titulo'],
				'<img src="'.$campanha['Telao']['foto'].'" width="150"/>',
				$campanha['Telao']['created'],
				'<span class="data_actions iconsweet"><a class="tip_north" original-title="Edit" href="'.$this->base.'/admin/telao/edit/'.$campanha['Telao']['id'].'">C</a>'.	
				'<a class="tip_north btn-delete" original-title="Edit" href="'.$this->base.'/admin/telao/delete/'.$campanha['Telao']['id'].'">X</a></span>'
				);    
		}   

		echo "{\"aaData\":" . json_encode($a) . "}";
		exit();
	} 


	public function admin_edit($id = null) {
	
		$rsGaleria = "";
		$this->Telao->id = $id; 


		if($this->Telao->id != ""){

			
			$Telaopermissao = $this->Teloespermissao->find('all', array(
        		'conditions' => array("Teloespermissao.id_telao" => $this->Telao->id)
    				)); 

				$rsTelaopermissao = array();
				foreach ($Telaopermissao as $key => $valuec){
				 	 $rsTelaopermissao[$valuec['Teloespermissao']['id']]['cod_funcaoCADV'] =$valuec['Teloespermissao']['cod_funcaoCADV'];
				 	 $rsTelaopermissao[$valuec['Teloespermissao']['id']]['id'] = $valuec['Teloespermissao']['id'];
				 }

		} 


		if (empty($this->data)) { 
     		$this->data = $this->Telao->read(); 
    	}  

		if ($this->request->is('post')) {


			 $this->Telao->save($this->request->data, array('validate' => false));

			 $idTelao = $this->Telao->id;
 

			 if(isset($this->request->data['Teloespermissao']['cod_funcaoCADV'])){


			 	 $coutpermisao = 0;
				 $valuesCampanhaspermisao = array();
				 foreach ($this->request->data['Teloespermissao']['cod_funcaoCADV'] as $key => $value){
				 	 $valuesCampanhaspermisao[$coutpermisao]['Teloespermissao']['id'] = $key;
				 	 $valuesCampanhaspermisao[$coutpermisao]['Teloespermissao']['cod_funcaoCADV'] = $value;
				 	 $valuesCampanhaspermisao[$coutpermisao]['Teloespermissao']['id_telao'] = $idTelao;

				 	$coutpermisao++; 
				 } 

				 $this->Teloespermissao->saveAll($valuesCampanhaspermisao); 
			} 



			 $this->Session->setFlash('Registro Salvo com sucesso.'); 

			 $this->redirect(array('controller' => 'telao', 'action' => 'admin_edit/'.$idTelao));

		}

		$this->set('menuShow','telao');
		
		$this->set(compact('rsTelaopermissao')); 
		$this->layout = 'cmsnovo';  
	} 

	public function admin_delete($id = null)
	{

		$this->Telao->id = $id; 

		$this->Telao->delete($id);

		$this->redirect(array('controller' => 'telao', 'action' => 'admin_index')); 
	}


	
}