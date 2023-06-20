<?php

App::uses('AppController', 'Controller');

App::import('Vendor', 'excel_reader/excel_reader2'); 

class MuralController extends AppController {


	public $name = 'Mural';

	public $uses = array('Mural');

	 



	public function index($cpf = null) {	


		$idUsuarios = $this->Session->read('Usuario');
		$erro = "";



	        if ($this->request->is('post')) {

	            $this->Mural->set($this->request->data);

	            if ($this->Usuario->validates()) {  

	               
	                if ($this->Mural->save($this->request->data)) {

	                    $this->redirect(array('controller' => 'usuarios', 'action' => 'perfil'));
	                    exit(); 
	                }   

	            }else { 
	                    $erro = "<ul>";
	                    foreach ($this->Usuario->validationErrors as $field) {
	                        $erro .=  "<li>*".$field[0]."</li><br>";
	                    }
	                    $erro .="</ul>";

	                    $this->data = $this->Usuario->read(); 
	                    
	            }

	        }




		$this->set(compact('dbuser' , 'erro')); 

		}
 
	}


		public function contenplados($cpf = null) {	


        $view = new View($this);
        $html = $view->loadHelper('Util');


		$idUsuarios = $this->Session->read('Usuario');
		$erro = "";

		if($idUsuarios['Usuario']['id'] != null){

		
			$this->Usuario->id = $idUsuarios['Usuario']['id'];

		    if (empty($this->data)) { 

                $rsusuario = $this->Usuario->read(); 
                
                $this->data = $rsusuario; 
            }
			


	        if ($this->request->is('post')) { 	

	            $this->Contemplado->set($this->request->data);

	            if ($this->Contemplado->validates()) {  

	              	

	                if ($this->Contemplado->save($this->request->data)) {


	                	echo "<script>
	                		alert('Contemplado cadastrado com sucesso.');
			                 opener.focus();
			                 self.close();
	                		</script> 
	                	";

	                }   

	            }else {	 
	                    $erro = "<ul>";
	                    foreach ($this->Contemplado->validationErrors as $field) {
	                        $erro .=  "<li>*".$field[0]."</li><br>";
	                    }
	                    $erro .="</ul>";

	                    $this->data = $this->Usuario->read(); 
	                    	 
	            }

	        }




		$this->set(compact('dbuser' , 'erro')); 

		}else{

            echo "<script>
    		alert('Voc\u00ea precisa estar logado.');
             opener.focus();
             self.close();
    		</script> 
    		"; 
    		exit();
		}




		$this->layout = 'formulario';
 
	}



	public function admin_index() {		

		$this->layout = 'cms';
	}  

	public function admin_jsondata() {

		$options = array(
				'order' => array('Usuario.id' => 'DESC')
			); 
		$rsUsuarios = $this->Usuario->find('all',$options);         

		
		 $a = array();

		foreach ($rsUsuarios as $usuario){
			$a[] = array(
				$usuario['Usuario']['id'],
				$usuario['Usuario']['regiao'],
				$usuario['Usuario']['distrito'],
				$usuario['Usuario']['codigo_dominio'],
				$usuario['Usuario']['nome_dominio'],
				$usuario['Usuario']['codigo_vendedor'],
				$usuario['Usuario']['cpf'],
				$usuario['Usuario']['nome'],
				$usuario['Usuario']['status'],
				$usuario['Usuario']['email'],
				$usuario['Usuario']['rg'],
				$usuario['Usuario']['codigo_funcao_cadv'],
				$usuario['Usuario']['nome_funcao_cadv']
				);   
		} 

		echo "{\"aaData\":" . json_encode($a) . "}";
		exit(); 

	}
  


	public function admin_edit($id = null) {
	
		
		$this->layout = 'cms';

	}

	public function admin_delete($id = null)
	{


		
	}




	
}