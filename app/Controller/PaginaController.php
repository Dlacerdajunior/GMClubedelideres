<?php

App::uses('AppController', 'Controller');


class PaginaController extends AppController {




	public $name = 'Pagina';

	public $uses = array('Pagina','Galeria','Usuario');


	function gm_lasvegas($id = null) {


		$this->layout = 'ajax'; 
		
	} 

	function v($id = null) {


			$options = array(
				'order' => array('Pagina.id' => 'DESC'),
				'conditions' => array("Pagina.vc_permalink =" => $id),
			); 
			
		$pagina = $this->Pagina->find("first",$options);


 		$this->Pagina->id = $pagina["Pagina"]["id"]; 
		if($this->Pagina->id != ""){
			$rsGaleria = $this->Galeria->find('all', array(
        		'conditions' => array("Galeria.id_campanha" => $this->Pagina->id)
    				));
		}

                  
        $titulo = $pagina['Pagina']['vc_titulo'];
                                     
    	$this->set('title_for_layout', $titulo); 	
    	$this->set(compact('pagina','rsGaleria'));

		
	}  




	function todospontos($tipo = null, $rankingtipo = null) {


		$idUsuarios = $this->Session->read('Usuario');

		$tiporanking = $rankingtipo;

		if($idUsuarios['Usuario']['cpf'] != null){

			$cpf = $idUsuarios['Usuario']['cpf'];

            if($tipo == 1){

            	if(isset($rankingtipo) && $rankingtipo == "1"){

            	$rsPremiados = $this->Usuario->query("SELECT * FROM premiados premi WHERE totalvendas = '0' AND mesranking IS NULL GROUP BY cpf ORDER BY regiao,cod,nome DESC");

            	}else if(isset($rankingtipo) && $rankingtipo == "5"){

            	$rsPremiados = $this->Usuario->query("SELECT * FROM premiados premi WHERE totalvendas = '0' AND mesranking = '5' GROUP BY cpf ORDER BY regiao,cod,nome DESC");

            	}else{

            	$rsPremiados = $this->Usuario->query("SELECT * FROM premiados premi WHERE totalvendas = '0' GROUP BY cpf ORDER BY regiao,cod,nome DESC");	
            	
            	}
            	



            }else if($tipo == 10){

            	if(isset($rankingtipo) && $rankingtipo == "1"){

            	$rsPremiados = $this->Usuario->query("SELECT * FROM premiados premi WHERE totalvendas != '0' AND mesranking IS NULL GROUP BY cpf ORDER BY regiao,cod,nome DESC");

            	}else if(isset($rankingtipo) && $rankingtipo == "5"){

            	$rsPremiados = $this->Usuario->query("SELECT * FROM premiados premi WHERE totalvendas != '0' AND mesranking = '5' GROUP BY cpf ORDER BY regiao,cod,nome DESC");

            	}else{

            	$rsPremiados = $this->Usuario->query("SELECT * FROM premiados premi WHERE totalvendas != '0' GROUP BY cpf ORDER BY regiao,cod,nome DESC");	
            	
            	}

            }else{  

            	$rsPremiados = $this->Usuario->query("SELECT * FROM premiados premi WHERE totalvendas != '0' GROUP BY cpf ORDER BY regiao,cod,nome DESC");

            } 
			
			

			$this->set(compact('rsPremiados','tiporanking'));  

		}   

		
	}    



	function pontos($id = null) {


		$idUsuarios = $this->Session->read('Usuario');
		$erro = "";




		if($idUsuarios['Usuario']['cpf'] != null){


			$cpf = $idUsuarios['Usuario']['cpf'];

            
			$rsPremiados = $this->Usuario->query("SELECT * FROM premiados premi WHERE cpf = '$cpf' limit 0,1");


			if(isset($rsPremiados['0']['premi']['pontos']) && $rsPremiados['0']['premi']['pontos'] != ""){

				$pontos = $rsPremiados['0']['premi']['pontos'];

			}else{

				$pontos = 0;

			}			


			$this->set(compact('pontos')); 

		}

		
	}  


	public function admin_index() {

		$this->set('menuShow','pagina'); 	
		$this->layout = 'cmsnovo'; 
	}    

	public function admin_jsondata($id = null) {

			$options = array(
				'order' => array('Pagina.id' => 'DESC')
			);   

		$rsPaginas = $this->Pagina->find('all',$options);         

		
		 $a = array();

		foreach ($rsPaginas as $pagina){

			$a[] = array(
				$pagina['Pagina']['id'],
				$pagina['Pagina']['vc_titulo'],
				$pagina['Pagina']['vc_permalink'],
				'<a href="'.$this->base.'/pagina/v/'.$pagina['Pagina']['vc_permalink'].'">'.$this->base.'/pagina/v/'.$pagina['Pagina']['vc_permalink'].'</a>',
				'<span class="data_actions iconsweet"><a href="'.$this->base.'/admin/pagina/edit/'.$pagina['Pagina']['id'].'" class="btn-edit">C</a>'.	
				'<a href="'.$this->base.'/admin/pagina/delete/'.$pagina['Pagina']['id'].'" class="btn-delete">X</a></span>'
				); 
		}  

		echo "{\"aaData\":" . json_encode($a) . "}";
		exit();

	} 

	public function admin_edit($id = null) {


		$this->Pagina->id = $id; 


		if($this->Pagina->id != ""){
			$rsGaleria = $this->Galeria->find('all', array(
        		'conditions' => array("Galeria.id_campanha" => $this->Pagina->id)
    				));
		} 


		$idPagina = $this->Pagina->id;

		if (empty($this->data)) { 
     		$this->data = $this->Pagina->read(); 
    	} 
    	

		if($this->request->is('post')){
			 $this->Pagina->save($this->request->data, array('validate' => false));

			 	$idPagina = $this->Pagina->id;

				 if(isset($this->request->data['Galeria']['foto'])){

					 $valuesGaleria = array();
					 foreach ($this->request->data['Galeria']['foto'] as $key => $value){
					 	 $valuesGaleria[$key]['Galeria']['foto'] = $value;
					 	 $valuesGaleria[$key]['Galeria']['id_campanha'] = $idPagina;
					 } 

					 $this->Galeria->saveAll($valuesGaleria);
				} 

			 $this->Session->setFlash('Registro Salvo com sucesso.'); 

			 $this->redirect(array('controller' => 'Pagina', 'action' => 'admin_edit/'.$this->Pagina->id));
		}


		if(isset($rsGaleria)){
			$this->set('rsGaleria',$rsGaleria);  
		}
		
		
		$this->set('menuShow','pagina');  	
		$this->layout = 'cmsnovo'; 
	}

	public function admin_delete($id = null)
	{

		$this->Pagina->id = $id; 

		$this->Pagina->delete($id);

		$this->redirect(array('controller' => 'pagina', 'action' => 'admin_index')); 
		
	} 
	

}