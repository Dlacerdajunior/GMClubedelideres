<?php

App::uses('AppController', 'Controller');

App::import('Vendor', 'excel_reader/excel_reader2'); 

class UsuariosController extends AppController {


	public $name = 'Usuarios';

	public $uses = array('Usuario', 'Galeria','Contemplado','Contempladochevroletpremiado', 'Administrador'); 

    public function beforeFilter() {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 123456);  
    }
    
    
	public function login($cpf = null) {	

		if(isset($this->params['url']['cpf']) && $this->params['url']['cpf'] != ""){
			
			$cpf = $this->params['url']['cpf'];
			
			$dbuser = $this->Usuario->find('first', array('conditions' => array (
			"Usuario.cpf" => $cpf))); 

				if(!empty($dbuser)) {
					
					
					//if($dbuser['Usuario']['status'] == 'Ativo'){
					
						$this->Session->write('Usuario', $dbuser);
						//exit('http://clubedelideres2013.com.br/'); 

						exit('http://clubedelideres2013.com.br/usuarios/userredirect?cpf='.$cpf);
						 
					//}else{
							// usuario inativo na base de dados do Clube false03
							//exit('false'); 
					//}

				} else {  
					// usuario nao existe na base de dados do Clube false02
					exit('false'); 
				} 

		}else{

			// parametro GET CPF NAO ENVIADO false01
			exit('false');
		}

	}



	public function votacao($cpf = null) {

		if(isset($this->params['url']['cpf']) && $this->params['url']['cpf'] != ""){
			
			$cpf = $this->params['url']['cpf'];
			
			$dbuser = $this->Usuario->find('first', array('conditions' => array (
			"Usuario.cpf" => $cpf))); 

				if(!empty($dbuser)) {
					
					
					//if($dbuser['Usuario']['status'] == 'Ativo'){
					
					$this->Session->write('Usuario', $dbuser);
					
					header("Location: http://clubedelideres2013.com.br/pagina/v/dicasdeviagem"); /* Redirect browser */
					exit(); 

					//}else{
							// usuario inativo na base de dados do Clube false03
							//exit('false'); 
					//}

				} else {  
					// usuario nao existe na base de dados do Clube false02
					exit('false'); 
				} 

		}else{

			// parametro GET CPF NAO ENVIADO false01
			exit('false');
		}

	}



		public function userredirect($cpf = null) {	

		if(isset($this->params['url']['cpf']) && $this->params['url']['cpf'] != ""){

			$cpf = $this->params['url']['cpf'];

			$dbuser = $this->Usuario->find('first', array('conditions' => array (
			"Usuario.cpf" => $cpf))); 

				if(!empty($dbuser)) {
										
						$this->Session->write('Usuario', $dbuser);
						$this->redirect('/'); 

				} else { 

					exit('false'); 
				}  

		}else{

			// parametro GET CPF NAO ENVIADO false01
			exit('false');
		} 

	} 

	public function sair($id = null)
	{

	$this->Session->delete('Usuario');
	$this->redirect(array('controller' => 'pages', 'action' => 'display'));
		
	}

	public function perfil($cpf = null) {	


        $view = new View($this);
        $html = $view->loadHelper('Util');


		$idUsuarios = $this->Session->read('Usuario');
		$erro = "";

		if($idUsuarios['Usuario']['id'] != null){

			$this->Usuario->id = $idUsuarios['Usuario']['id'];
			
		    if (empty($this->data)) { 

                $rsusuario = $this->Usuario->read(); 
                $rsusuario['Usuario']['cpf'] = $html->formatarCPF_CNPJ($rsusuario['Usuario']['cpf']);
                $this->data = $rsusuario; 
            } 



	        if ($this->request->is('post')) {

	            $this->Usuario->set($this->request->data);

	            if ($this->Usuario->validates()) {  

	               
	                if ($this->Usuario->save($this->request->data)) {

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


	public function informederendimento($cpf = null) {	


        $view = new View($this);
        $html = $view->loadHelper('Util');
		$idUsuarios = $this->Session->read('Usuario');
		$link = 1;

		if($idUsuarios['Usuario']['id'] != null){

			$this->Usuario->id = $idUsuarios['Usuario']['id'];
			
		    if (empty($this->data)) { 

                $rsusuario = $this->Usuario->read(); 
                             

                if (file_exists("/var/www/clubedelideres2013/public_html/app/webroot/files/pdfs/informederendimento/".$rsusuario['Usuario']['cpf'].".pdf")) {
				    
				     $link = $this->base."/files/pdfs/informederendimento/".$rsusuario['Usuario']['cpf'].".pdf";
				    
				    
				}
               	
            } 	

		}


		$this->set(compact('link')); 
 
	}


	function limparstringexport($text){
		$text = utf8_decode($text);

 		$text = preg_replace("/\r\n|\n\r|\n|\r/", " ", $text);
		return $text;
		
	} 
 

	
public function admin_contenpladosexport() {

		$options = array(
				'order' => array('Usuario.id' => 'DESC')
			); 
		$rsUsuarios = $this->Contemplado->find('all',$options);         

		
		 $a = array();

		 $header_row = "nome \t codigo_dominio \t nome_dominio \t email \t cpf \t endereco \t numero \t cidade \t estado \t cep \t telefone \t nome \t nome_dominio\t \n";


		foreach ($rsUsuarios as $usuario){

				$nome = "";
				$codigo_dominio = "";
				$nome_dominio = "";
				$email = "";
				$cpf = "";
				$endereco = "";
				$numero = "";
				$cidade = "";
				$estado = "";
				$cep = "";
				$telefone = "";
				$usuarionome = "";
				$usuarionome_dominio = ""; 


				$nome = $this->limparstringexport($usuario['Contemplado']['nome']);
				$codigo_dominio = $this->limparstringexport($usuario['Contemplado']['codigo_dominio']);
				$nome_dominio = $this->limparstringexport($usuario['Contemplado']['nome_dominio']);
				$email =  $this->limparstringexport($usuario['Contemplado']['email']);
				$cpf = $this->limparstringexport($usuario['Contemplado']['cpf']);
				$endereco = $this->limparstringexport($usuario['Contemplado']['endereco']);
				$numero = $this->limparstringexport($usuario['Contemplado']['numero']);
				$cidade = $this->limparstringexport($usuario['Contemplado']['cidade']);
				$estado = $this->limparstringexport($usuario['Contemplado']['estado']);
				$cep = $this->limparstringexport($usuario['Contemplado']['cep']);
				$telefone = $this->limparstringexport($usuario['Contemplado']['telefone']);
				$usuarionome = $this->limparstringexport($usuario['Usuario']['nome']);
				$usuarionome_dominio = $this->limparstringexport($usuario['Usuario']['nome_dominio']);

				$header_row.= $nome."\t".$codigo_dominio."\t ".$nome_dominio." \t ".$email." \t ".$cpf." \t ".$endereco."\t ".$numero."\t ".$cidade."\t ". $estado ." \t ".$cep."\t ".$telefone."\t ".$usuarionome."\t ".$usuarionome_dominio." \t \n";
						

		} 

		$filename = "DESEMPENHODELIDERES_".date("Y.m.d").".xls";
				
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		echo($header_row);  
		exit(); 
	} 

	public function admin_contenplados() {		

		$this->set('menuShow','contemplados'); 	
		$this->layout = 'cmsnovo';
	}


public function admin_jsondatacontenplados() {

		$options = array(
				'order' => array('Usuario.id' => 'DESC')
			); 
		$rsUsuarios = $this->Contemplado->find('all',$options);         

		
		 $a = array();

		foreach ($rsUsuarios as $usuario){
			$a[] = array(
				$usuario['Contemplado']['nome'],
				$usuario['Contemplado']['codigo_dominio'],
				$usuario['Contemplado']['nome_dominio'],
				$usuario['Contemplado']['email'],
				$usuario['Contemplado']['cpf'],
				$usuario['Contemplado']['endereco'],
				//$usuario['Contemplado']['numero'],
				//$usuario['Contemplado']['cidade'],
				//$usuario['Contemplado']['estado'],
				//$usuario['Contemplado']['cep'],
				$usuario['Contemplado']['telefone'],
				//$usuario['Usuario']['nome'],
				//$usuario['Usuario']['nome_dominio']
				);    
		}   

		echo "{\"aaData\":" . json_encode($a) . "}";
		exit(); 

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



public function admin_contenpladoschevroletpremiadosexport() { 

		$options = array(
				'order' => array('Usuario.id' => 'DESC')
			); 
		$rsUsuarios = $this->Contempladochevroletpremiado->find('all',$options);         

				
		$a = array(); 

		 $header_row = "nome \t codigo_dominio \t nome_dominio \t email \t cpf \t endereco \t complemento \t numero \t cidade \t estado \t cep \t telefone \t nome \t nome_dominio\t \n";


		foreach ($rsUsuarios as $usuario){

				$nome = "";
				$codigo_dominio = "";
				$nome_dominio = "";
				$email = "";
				$cpf = "";
				$endereco = "";
				$complemento = "";
				$numero = "";
				$cidade = "";
				$estado = "";
				$cep = "";
				$telefone = "";
				$usuarionome = "";
				$usuarionome_dominio = ""; 



				$nome = $this->limparstringexport($usuario['Contempladochevroletpremiado']['nome']);
				$codigo_dominio = $this->limparstringexport($usuario['Contempladochevroletpremiado']['codigo_dominio']);
				$nome_dominio = $this->limparstringexport($usuario['Contempladochevroletpremiado']['nome_dominio']);
				$email =  $this->limparstringexport($usuario['Contempladochevroletpremiado']['email']);
				$cpf = $this->limparstringexport($usuario['Contempladochevroletpremiado']['cpf']);
				$endereco = $this->limparstringexport($usuario['Contempladochevroletpremiado']['endereco']);
				$complemento = $this->limparstringexport($usuario['Contempladochevroletpremiado']['complemento']);
				$numero = $this->limparstringexport($usuario['Contempladochevroletpremiado']['numero']);
				$cidade = $this->limparstringexport($usuario['Contempladochevroletpremiado']['cidade']);
				$estado = $this->limparstringexport($usuario['Contempladochevroletpremiado']['estado']);
				$cep = $this->limparstringexport($usuario['Contempladochevroletpremiado']['cep']);
				$telefone = $this->limparstringexport($usuario['Contempladochevroletpremiado']['telefone']);
				$usuarionome = $this->limparstringexport($usuario['Usuario']['nome']);
				$usuarionome_dominio = $this->limparstringexport($usuario['Usuario']['nome_dominio']);
 				 

				$header_row.= $nome."\t".$codigo_dominio."\t ".$nome_dominio." \t ".$email." \t ".$cpf." \t ".$endereco."\t ".$complemento."\t ".$numero."\t ".$cidade."\t ". $estado ." \t ".$cep."\t ".$telefone."\t ".$usuarionome."\t ".$usuarionome_dominio." \t \n";
						

		}

		$filename = "DESCUBRASEUCHEVROLETPREMIADO".date("Y.m.d").".xls";
				
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		echo($header_row); 
		exit();
	} 


	public function admin_contenpladoschevroletpremiados() {
		$this->set('menuShow','contempladospremiados');	
		$this->layout = 'cmsnovo';
	}

public function admin_jsondatacontenpladoschevroletpremiados() { 

		$options = array(
				'order' => array('Usuario.id' => 'DESC')
			); 
		$rsUsuarios = $this->Contempladochevroletpremiado->find('all',$options);         

				
		$a = array(); 

		foreach ($rsUsuarios as $usuario){
			$a[] = array(
				$usuario['Contempladochevroletpremiado']['nome'],
				$usuario['Contempladochevroletpremiado']['codigo_dominio'],
				$usuario['Contempladochevroletpremiado']['nome_dominio'],
				$usuario['Contempladochevroletpremiado']['email'],
				$usuario['Contempladochevroletpremiado']['cpf'],
				$usuario['Contempladochevroletpremiado']['endereco'], 
				//$usuario['Contempladochevroletpremiado']['complemento'],
				//$usuario['Contempladochevroletpremiado']['numero'],
				//$usuario['Contempladochevroletpremiado']['cidade'],
				//$usuario['Contempladochevroletpremiado']['estado'],
				//$usuario['Contempladochevroletpremiado']['cep'],
				$usuario['Contempladochevroletpremiado']['telefone'],
				//$usuario['Usuario']['nome'],
				//$usuario['Usuario']['nome_dominio']
				);    
		}    

		echo "{\"aaData\":" . json_encode($a) . "}";
		exit(); 

	}


	public function contenpladoschevroletpremiado($cpf = null) {	


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

	            $this->Contempladochevroletpremiado->set($this->request->data);

	            if ($this->Contempladochevroletpremiado->validates()) {  

	              	

	                if ($this->Contempladochevroletpremiado->save($this->request->data)) {


	                	echo "<script>
	                		alert('Contemplado cadastrado com sucesso.');
			                 opener.focus();
			                 self.close();
	                		</script> 
	                	";

	                }   

	            }else {	 
	                    $erro = "<ul>";
	                    foreach ($this->Contempladochevroletpremiado->validationErrors as $field) {
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

		$this->set('menuShow','usuario'); 	
		$this->layout = 'cmsnovo';
	} 

	public function admin_jsondata() {

		$options = array(
				'order' => array('Usuario.id' => 'DESC')
			); 
		$rsUsuarios = $this->Usuario->find('all',$options);         

		
		 $a = array();

		foreach ($rsUsuarios as $usuario){
			$a[] = array(
				$usuario['Usuario']['regiao'],
				$usuario['Usuario']['nome_dominio'],
				$usuario['Usuario']['cpf'],
				$usuario['Usuario']['nome'],
				$usuario['Usuario']['email'],
				'<span class="data_actions iconsweet"><a href="'.$this->base.'/admin/usuarios/edit/'.$usuario['Usuario']['id'].'" target="_blank" class="tip_north">C</a></span>'
				);
		}
			 		
		echo "{\"aaData\":" . json_encode($a) . "}";
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
			

		foreach ($data->sheets[0]['cells'] as $value){


		$this->Usuario->create();  

		//Região 

		$regiao = (isset($value[1]) ? $value[1] : "");
		$rsUsuario['Usuario']['regiao'] = $this->limparstring($regiao);


		//Distrito 
		$distrito  = (isset($value[2]) ? $value[2] : "");
		$rsUsuario['Usuario']['distrito'] = $this->limparstring($distrito);

		//Código Domínio
		$codigodominio = (isset($value[3]) ? $value[3] : "");
		$rsUsuario['Usuario']['codigo_dominio'] = $this->limparstring($codigodominio);


		//Nome Domínio
		$nomedominio = (isset($value[4]) ? $value[4] : "");

		$rsUsuario['Usuario']['nome_dominio'] = $this->limparstring($nomedominio);

		

		//Código Vendedor
		$codigovendedor = (isset($value[5]) ? $value[5] : "");
		$rsUsuario['Usuario']['codigo_vendedor'] = $this->limparstring($codigovendedor);

		//CPF 
		$CPF = (isset($value[6]) ? $value[6] : "");
		$rsUsuario['Usuario']['cpf'] = $this->limparstring($CPF);

		//Nome 
		$nome = (isset($value[7]) ? $value[7] : "");
		$rsUsuario['Usuario']['nome'] = $this->limparstring($nome);

		//Status
		$status  = (isset($value[8]) ? $value[8] : "");
		$rsUsuario['Usuario']['status'] = $this->limparstring($status);

		//e-Mail
		$eMail  = (isset($value[9]) ? $value[9] : "");
		$rsUsuario['Usuario']['email'] = $this->limparstring($eMail);


		//Superior Imediato
		$superiorimediato  = (isset($value[10]) ? $value[10] : "");
		$rsUsuario['Usuario']['superior_imediato'] = $this->limparstring($superiorimediato);

		//Data Nascimento
		$datanascimento  = (isset($value[11]) ? $value[11] : "");
		$rsUsuario['Usuario']['data_nascimento'] = $this->limparstring($datanascimento);


		//RG 
		$RG = (isset($value[12]) ? $value[12] : "");
		$rsUsuario['Usuario']['rg'] = $this->limparstring($RG);

		//Órgão Expedidor 
		$orgaoexpedidor =(isset($value[13]) ? $value[13] : "");
		$rsUsuario['Usuario']['orgao_expedidor'] = $this->limparstring($orgaoexpedidor);

		//Celular 
		$celular = (isset($value[14]) ? $value[14] : "");
		$rsUsuario['Usuario']['celular'] = $this->limparstring($celular);

		//Aceita SMS?
		$aceitaSMS  = (isset($value[15]) ? $value[15] : "");
		$rsUsuario['Usuario']['aceita_sms'] = $this->limparstring($aceitaSMS);


		//Código Função CADV
		$codigofuncaoCADV  = (isset($value[16]) ? $value[16] : "");
		$rsUsuario['Usuario']['codigo_funcao_cadv'] = $this->limparstring($codigofuncaoCADV);


		// Nome Função CADV
		$nomefuncaoCADV  = (isset($value[17]) ? $value[17] : "");
		$rsUsuario['Usuario']['nome_funcao_cadv'] = $this->limparstring($nomefuncaoCADV); 

		//Categoria CADV
		$categoriaCADV  = (isset($value[18]) ? $value[18] : "");
		$rsUsuario['Usuario']['categoria_cadv'] = $this->limparstring($categoriaCADV);

		// Data Inativação
		$datainativacao  = (isset($value[19]) ? $value[19] : "");
		$rsUsuario['Usuario']['data_inativacao'] = $this->limparstring($datainativacao);

		//Tipo Inativação
		$tipoinativacao  = (isset($value[20]) ? $value[20] : "");
		$rsUsuario['Usuario']['tipo_inativacao'] = $this->limparstring($tipoinativacao); 

		//Data Reativação
		$datareativacao  = (isset($value[21]) ? $value[21] : "");
		$rsUsuario['Usuario']['data_reativacao'] = $this->limparstring($datareativacao);

		//Data Cadastro no Performa
		$datacadastroperforma  = (isset($value[22]) ? $value[22] : "");
		$rsUsuario['Usuario']['data_cadastro_performa'] = $this->limparstring($datacadastroperforma);


		$rsGaleria = $this->Usuario->find('first', array(
        'conditions' => array("Usuario.cpf" => $CPF)));

		

			if(count($rsGaleria) >= 1){

				//$rsUsuario['Usuario']['id'] = 
				$this->Usuario->id = $rsGaleria['Usuario']['id'];
			}




			if($CPF != 0){

				$this->Usuario->save($rsUsuario);
				
			}

		}  

		echo 1;
		exit(); 
		

	
	}  


	public function admin_edit($id = null) {
	
		$this->Usuario->id = $id;

		if (empty($this->data)) { 
     		$this->data = $this->Usuario->read(); 
    	}  



    	$userCod = $this->data['Usuario']['codigo_dominio']; 

    	$rsEnderecosInf = $this->Usuario->query("SELECT * FROM enderecos WHERE codigo_dominio = '$userCod' LIMIT 0, 1");


    	if(isset($rsEnderecosInf)){
    		
    		$this->set('rsEnderecosInf', $rsEnderecosInf);  	
    	}	 






		$this->set('menuShow','usuario'); 	
		$this->layout = 'cmsnovo';

	}

	public function admin_delete($id = null)
	{


		
	}




    function formatarCPF_CNPJ($campo, $formatado = true){
        //retira formato
        $codigoLimpo = ereg_replace("[' '-./ t]",'',$campo);
        // pega o tamanho da string menos os digitos verificadores
        $tamanho = (strlen($codigoLimpo) -2);
        //verifica se o tamanho do código informado é válido
        if ($tamanho != 9 && $tamanho != 12){
            return false; 
        }
     
        if ($formatado){ 
            // seleciona a máscara para cpf ou cnpj
            $mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##'; 
     
            $indice = -1;
            for ($i=0; $i < strlen($mascara); $i++) {
                if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
            }
            //retorna o campo formatado
            $retorno = $mascara;
     
        }else{
            //se não quer formatado, retorna o campo limpo
            $retorno = $codigoLimpo;
        }
     
        return $retorno;
     
    }



    public function admin_adminedit($id = null) {		

		$this->Administrador->id = $id;

		if (empty($this->data)) { 
     		$this->data = $this->Administrador->read(); 
    	}  


		if ($this->request->is('post')) { 


			if($this->request->data["trocarsenha"] == 1 && $this->request->data["password"] != ""){

				$this->request->data["Administrador"]["password"] = md5($this->request->data["password"]);
			}
			
			if($id == ""){

				$this->request->data["Administrador"]["password"] = md5($this->request->data["password"]);
			}

			$this->request->data["Administrador"]["username"] = $this->request->data["username"];
			//$this->request->data["Administrador"]["tipo"] = $this->request->data["tipo"]; 


			$this->Administrador->save($this->request->data, array('validate' => false));
			$idADM = $this->Administrador->id; 

			$this->Session->setFlash('Registro Salvo com sucesso.');

			$this->redirect(array('controller' => 'usuarios', 'action' => 'admin_adminedit/'.$idADM));
 	
		}


		$this->set('menuShow','usuario'); 	
		$this->layout = 'cmsnovo';
	} 


	public function admin_admin() {		

		$this->set('menuShow','usuario'); 	
		$this->layout = 'cmsnovo';
	} 

	public function admin_jsondataadmin() {

		$options = array(
				'order' => array('Administrador.id' => 'DESC')
			);

		$rsUsuarios = $this->Administrador->find('all',$options);         

		
		 $a = array();

		foreach ($rsUsuarios as $usuario){

			if($usuario['Administrador']['tipo'] == 1){
				$tipotxt = "Administrador";
			}else{
				$tipotxt = "Atendimento";
			}
			

			$a[] = array(
				$usuario['Administrador']['id'],
				$usuario['Administrador']['username'],
				$usuario['Administrador']['last_login'],
				$tipotxt,
				'<span class="data_actions iconsweet"><a href="'.$this->base.'/admin/usuarios/adminedit/'.$usuario['Administrador']['id'].'" class="tip_north">C</a>'.	
				'</span>' 
				); 
		}

		echo "{\"aaData\":" . json_encode($a) . "}";
		exit(); 

	}


   public function admin_buscar($id = null) {		

	        if ($this->request->is('post')) {

				$nomeIN ="";
				$emailIN ="";
				$codigodominioIN ="";
				$regiaoIN ="";
				$funcaoCADVIN ="";


	        	if(isset($this->request->data['nome']) AND $this->request->data['nome'] != ""){
	        		
	        		$nomeIN = " AND nome LIKE  '%".$this->request->data['nome']."%'";
	        		
	        	} 

	        	if(isset($this->request->data['email']) AND $this->request->data['email'] != ""){

	        		$emailIN = " AND email LIKE  '%".$this->request->data['email']."%'";
	        	} 

	        	if(isset($this->request->data['codigodominio'])){

	        		foreach ($this->request->data['codigodominio'] as $key => $value) {

	        		$codigodominioIN .= "'$value',";	

	        		}  
	        		
	        		$codigodominioIN  = substr($codigodominioIN , 0, -1);

	        		$codigodominioIN = " AND codigo_dominio IN($codigodominioIN)";	        			        	

	        	} 

	        	if(isset($this->request->data['regiao'])){ 

	        		foreach ($this->request->data['regiao'] as $key => $value) {

	        		//$regiaoIN .= "'$value',";	
	        		$regiaoIN .= " regiao = '$value' OR";

	        		}   
	        		
	        		$regiaoIN  = substr($regiaoIN , 0, -2);

	        		$regiaoIN = " AND ($regiaoIN) ";	        			        	
 					
	        	} 	          	


	        	if(isset($this->request->data['funcaoCADV'])){

	        		foreach ($this->request->data['funcaoCADV'] as $key => $value) {

	        		$funcaoCADVIN .= "'$value',";	

	        		}
	        		
	        		$funcaoCADVIN  = substr($funcaoCADVIN , 0, -1);
	        		$funcaoCADVIN = " AND codigo_funcao_cadv IN($funcaoCADVIN)";	        			        	
	        	
	        	}  	    


	        	//Monta o SQL com os campo selecionados pelo usuarios
	        	$montSQL = "SELECT * FROM usuarios as Usuario WHERE 1 $nomeIN $emailIN $codigodominioIN $regiaoIN $funcaoCADVIN ORDER BY codigo_dominio, regiao DESC";
	        	

	        	//echo $montSQL;
	        	//exit();  

	        	$rsUsuario = $this->Usuario->query($montSQL);


	        	$header_row = "id \t";
	        	$header_row .= "Região \t";
	        	$header_row .= "Distrito       \t";
	        	$header_row .= "Código Domínio \t";
	        	$header_row .= "Nome Domínio     \t";
	        	$header_row .= "Código Vendedor   \t";
	        	$header_row .= "CPF          \t";
	        	$header_row .= "Nome \t";
	        	$header_row .= "Status \t";
				$header_row .= "e-Mail \t";
				$header_row .= "Superior Imediato \t";
				$header_row .= "Data Nascimento  \t";
				$header_row .= "RG  \t";
				$header_row .= "Órgão Expedidor \t";
				$header_row .= "Celular  \t";
				$header_row .= "Aceita SMS? \t";
				$header_row .= "Código Função \t";
				$header_row .= "Nome Função  \t";
				$header_row .= "Categoria CADV \t";
				$header_row .= "Data Inativação \t";
				$header_row .= "Tipo Inativação \t";
				$header_row .= "Data Reativação \t";
				$header_row .= "Data Cadastro no Pulsar \t";
				$header_row .= "Endereços \t"; 
				$header_row .= "\n"; 
				$header_row = utf8_decode($header_row);

	        	foreach ($rsUsuario as $usuario) {
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['id'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['regiao'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['distrito'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['codigo_dominio'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['nome_dominio'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['codigo_vendedor'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['cpf'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['nome'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['status'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['email'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['superior_imediato'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['data_nascimento'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['rg'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['orgao_expedidor'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['celular'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['aceita_sms'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['codigo_funcao_cadv'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['nome_funcao_cadv'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['categoria_cadv'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['data_inativacao'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['tipo_inativacao'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['data_reativacao'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['data_cadastro_performa'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['endereco'])." \t";
	        	$header_row .= "\n"; 


	        	}	


				$filename = "EXPORT_USUARIOS_".date("Y.m.d").".xls";
							
				header('Content-type: application/ms-excel');
				header('Content-Disposition: attachment; filename="'.$filename.'"');
				echo($header_row);  
				exit(); 					

	        }

	    $rsListaDominio = $this->Usuario->query("SELECT codigo_dominio FROM usuarios Usuario GROUP BY codigo_dominio");


	    $this->set('listaDominio',$rsListaDominio);

		$this->set('menuShow','usuario'); 	
		$this->layout = 'cmsnovo'; 
	}

	


	 public function admin_exportcerto($id = null) {		

	   

				$nomeIN ="";
				$emailIN ="";
				$codigodominioIN ="";
				$regiaoIN ="";
				$funcaoCADVIN ="";


	        
	        	//Monta o SQL com os campo selecionados pelo usuarios 
	        	$montSQL = "SELECT * FROM usuarios as Usuario WHERE codigo_dominio IN (
'A20001',
'A24001',
'A94001',
'B06001',
'B65001',
'B66001',
'B75001',
'B95001',
'C08001',
'C35001',
'C52001',
'C75001',
'D73001',
'F72001',
'F76001',
'F95001',
'G42001',
'H18001',
'J18001',
'J65001',
'J76001',
'M37001',
'M50001',
'M83001',
'N11001',
'N71001',
'N84001',
'N87001',
'P94001',
'T25001',
'T45001',
'A05001',
'A68001',
'B86001',
'C06001',
'C11001',
'C40001',
'D65001',
'E15001',
'F38001',
'F91001',
'G06001',
'G16001',
'G63001',
'I62001',
'J98001',
'O10001',
'O11001',
'P09001',
'Q53001',
'Q54001',
'Q56001',
'T31001',
'T64001',
'T77001',
'T81001',
'V53001',
'X26001',
'X61001',
'X85001',
'Y63001',
'A33001',
'A42001',
'B10001',
'B41001',
'B42001',
'B54001',
'C22001',
'D91001',
'E03001',
'F04001',
'F35001',
'F36001',
'F37001',
'F87001',
'G47001',
'G64001',
'H57001',
'H69001',
'J15001',
'K17001',
'K77001',
'M62001',
'M87001',
'O56001',
'P25001',
'Q02001',
'Q03001',
'Q04001',
'Q05001',
'Q09001',
'Q11001',
'Q14001',
'Q16001',
'Q18001',
'Q22001',
'Q23001',
'Q24001',
'Q28001',
'Q29001',
'Q30001',
'Q32001',
'Q34001',
'Q35001',
'Q36001',
'Q40001',
'Q42001',
'Q43001',
'Q44001',
'Q45001',
'Q46001',
'Q47001',
'Q48001',
'Q58001',
'Q60001',
'Q61001',
'Q62001',
'Q63001',
'Q64001',
'Q66001',
'Q67001',
'Q69001',
'Q70001',
'Q72001',
'Q73001',
'Q74001',
'Q77001',
'Q78001',
'Q84001',
'Q87001',
'Q89001',
'Q90001',
'Q91001',
'Q92001',
'Q94001',
'Q97001',
'Q98001',
'Q99001',
'R21001',
'R57001',
'R77001',
'R83001',
'S29001',
'S53001',
'T37001',
'T83001',
'U16001',
'V23001',
'V81001',
'W05001',
'W07001',
'W98001',
'X37001',
'X63001',
'X64001',
'X68001',
'X81001',
'Y27001') AND (codigo_funcao_cadv = 'GM-GRE-289' OR /* GERENTE REGIONAL DA GMB*/
					codigo_funcao_cadv = 'GR-GAF-27' OR /*GERENTE ADMINISTRATIVO/FINANCEIRO  */
					codigo_funcao_cadv = 'GR-GFI-24' OR /*GERENTE NEGOCIOS F&I    */
					codigo_funcao_cadv = 'GR-GRH-22' OR /*GERENTE/SUPERVISOR/COORD/ANALISTA RH*/
					codigo_funcao_cadv = 'PC-GPC-08' OR /*GERENTE DE PECAS */
					codigo_funcao_cadv = 'PC-GPC-91' OR /*GERENTE DE PEÇAS/COORD TREINAMENTO*/
					codigo_funcao_cadv = 'SA-CGS-92' OR /*GERENTE SERVIÇO/COORD TREINAMENTO*/
					codigo_funcao_cadv = 'SA-CPV-93' OR /*GERENTE PÓS-VENDAS/COORD TREINAMENTO*/
					codigo_funcao_cadv = 'SA-GPV-89' OR /*GERENTE DE PÓS-VENDAS */
					codigo_funcao_cadv = 'SA-GSE-09' OR /*GERENTE DE SERVIÇO*/
					codigo_funcao_cadv = 'VD-CGV-90' OR /*GERENTE DE VENDAS/COORD TREINAMENTO */
					codigo_funcao_cadv = 'VD-GCV-97' OR /*GERENTE/SUPERV VD CORPORATE/VAREJO VD */
					codigo_funcao_cadv = 'VD-GNS-10' OR /*GERENTE VENDAS VEÍC NOVOS/SIGA*/
					codigo_funcao_cadv = 'VD-GNU-15' OR /*GERENTE VENDAS VEÍC NOVOS/USADOS */
					codigo_funcao_cadv = 'VD-GNV-11' OR /*GERENTE/SUPERVISOR VD NOVOS/VAREJO VD */
					codigo_funcao_cadv = 'VD-GVC-68' OR /*GERENTE/SUPERVISOR VD DIRETAS CORPORATE*/
					codigo_funcao_cadv = 'VD-GVD-70' OR /*GERENTE/SUPERVISOR DE VENDAS VAREJO VD*/
					codigo_funcao_cadv = 'VD-GVN-06' OR /*GERENTE DE VENDAS - VEÍCULOS NOVOS*/
					codigo_funcao_cadv = 'VD-GVS-71' OR /*GERENTE/SUPERVISOR DE VENDAS SIGA/USADOS*/
					codigo_funcao_cadv = 'VD-GVU-07' OR /*GERENTE/SUPERVISOR VD VEICULOS USADOS */
					codigo_funcao_cadv = 'PC-SPC-52' OR /*SUPERVISOR DE PEÇAS */
					codigo_funcao_cadv = 'SA-GPV-89' /*GERENTE DE ATENCAO AO CLIENTE*/
				) LIMIT 0,9999";
	        	

	        	//echo $montSQL;
	        	//exit();  

	        	$rsUsuario = $this->Usuario->query($montSQL);


	        	$header_row = "id \t";
	        	$header_row .= "Região \t";
	        	$header_row .= "Distrito       \t";
	        	$header_row .= "Código Domínio \t";
	        	$header_row .= "Nome Domínio     \t";
	        	$header_row .= "Código Vendedor   \t";
	        	$header_row .= "CPF          \t";
	        	$header_row .= "Nome \t";
	        	$header_row .= "Status \t";
				$header_row .= "e-Mail \t";
				$header_row .= "Superior Imediato \t";
				$header_row .= "Data Nascimento  \t";
				$header_row .= "RG  \t";
				$header_row .= "Órgão Expedidor \t";
				$header_row .= "Celular  \t";
				$header_row .= "Aceita SMS? \t";
				$header_row .= "Código Função \t";
				$header_row .= "Nome Função  \t";
				$header_row .= "Categoria CADV \t";
				$header_row .= "Data Inativação \t";
				$header_row .= "Tipo Inativação \t";
				$header_row .= "Data Reativação \t";
				$header_row .= "Data Cadastro no Pulsar \t";
				$header_row .= "Endereços \t"; 
				$header_row .= "\n"; 
				$header_row = utf8_decode($header_row);

	        	foreach ($rsUsuario as $usuario) {
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['id'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['regiao'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['distrito'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['codigo_dominio'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['nome_dominio'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['codigo_vendedor'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['cpf'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['nome'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['status'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['email'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['superior_imediato'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['data_nascimento'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['rg'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['orgao_expedidor'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['celular'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['aceita_sms'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['codigo_funcao_cadv'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['nome_funcao_cadv'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['categoria_cadv'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['data_inativacao'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['tipo_inativacao'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['data_reativacao'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['data_cadastro_performa'])." \t";
	        	$header_row .= $this->limparstringexport($usuario['Usuario']['endereco'])." \t";
	        	$header_row .= "\n"; 


	        	}	


				$filename = "EXPORT_USUARIOS_".date("Y.m.d").".xls";
							
				header('Content-type: application/ms-excel');
				header('Content-Disposition: attachment; filename="'.$filename.'"');
				echo($header_row);  
				exit(); 					


	}

}