<?php 
/**
 * Usuario
 */
class Usuario extends AppModel
{
	
	var $name = 'Usuario';

	public $useTable   = 'usuarios';


public $validate = array(

        'email' => array(
            'r1' => array(
                'rule' => 'notEmpty',
                'allowEmpty' => false,
                'message' => '*Campo E-mail é obrigatório'
            )
                                       
        ),   
        'nome' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo Nome é obrigatório'            
        )  
    );
    
    
    function validarEmail($field){
            App::import('Model', 'CakeSession');
            $session = new CakeSession(); 
            $idUsuario = 0; 
            $idUsuario = $session->read('Usuario.id');

            $rsUsuario = $this->find('first', array('conditions' => array (
                "Usuario.email" => $field["email"])
                )
            );    

            if(isset($rsUsuario['Usuario']['id'])){
           

                if($idUsuario >= 1){

                    $rsUsuario = $this->find('first', array('conditions' => array (
                    "Usuario.id" => $idUsuario)
                    )
                    );

                        if($rsUsuario['Usuario']['email'] == $field["email"]){

                            return true;
                        }
                } 

                return false;

            }else{              

            
                return true;  

            } 

    }



    function pontosUsuarioTotalMes($tipo = null){ 

            App::import('Model', 'CakeSession');
            $session = new CakeSession(); 
            $idUsuario = 0; 
            $idUsuario = $session->read('Usuario'); 


            $cpf = $idUsuario['Usuario']['cpf']; 
           
            if($tipo != 5){

                $rsPremiados = $this->query("SELECT * FROM premiados premi WHERE cpf = '$cpf' AND mesranking IS NULL");

            }else{

                $rsPremiados = $this->query("SELECT * FROM premiados premi WHERE cpf = '$cpf' AND mesranking = '5'"); 
            }
                
            
            $pontos = 0;



            if(isset($rsPremiados['0']['premi']['pontos']) && $rsPremiados['0']['premi']['pontos'] != ""){

                foreach ($rsPremiados as $premiados) {
                    
                     $pontos = $pontos + $premiados['premi']['pontos'];
                    
                }

            }else{

                $pontos = 0;
            }   

            if($pontos == 0){
                return 0;                
            }
                                    
            return $pontos; 


    }



    function pontosUsuarioTotal(){ 
        
            App::import('Model', 'CakeSession');
            $session = new CakeSession(); 
            $idUsuario = 0; 
            $idUsuario = $session->read('Usuario'); 


            $cpf = $idUsuario['Usuario']['cpf']; 
           
            $rsPremiados = $this->query("SELECT * FROM premiados premi WHERE cpf = '$cpf'");
            
            $pontos = 0;



            if(isset($rsPremiados['0']['premi']['pontos']) && $rsPremiados['0']['premi']['pontos'] != ""){

                foreach ($rsPremiados as $premiados) {
                    
                     $pontos = $pontos + $premiados['premi']['pontos'];
                    
                }

            }else{

                $pontos = 0;
            }   

            if($pontos == 0){
                return 0;                
            }
                                    
            return $pontos; 


    }


    function pontosUsuario(){ 
        
            App::import('Model', 'CakeSession');
            $session = new CakeSession(); 
            $idUsuario = 0; 
            $idUsuario = $session->read('Usuario'); 


            $cpf = $idUsuario['Usuario']['cpf']; 
           
            $rsPremiados = $this->query("SELECT * FROM premiados premi WHERE cpf = '$cpf'");
            
            $pontos = 0;



            if(isset($rsPremiados['0']['premi']['pontos']) && $rsPremiados['0']['premi']['pontos'] != ""){

                foreach ($rsPremiados as $premiados) {
                    
                     $pontos = $pontos + $premiados['premi']['pontos'];
                    
                }

            }else{

                $pontos = 0;
            }   

            if($pontos == 0){

                return 0;

            }

            $rsProdutos = $this->query("SELECT * FROM compras cp WHERE cp.CPFPedido='".$cpf."' GROUP BY cp.PedidoPedido ORDER BY cp.id DESC"); 


            foreach ($rsProdutos as $valorcompra) {
                

                 $pontos = $pontos - $valorcompra['cp']['Valor_MoedaPedido'];

            }

                            
            return $pontos;



    }


    function pontosUsuarioporCPF($cpfusuarios = null){ 
        
            App::import('Model', 'CakeSession');
            $session = new CakeSession(); 
            $idUsuario = 0; 
            $idUsuario = $session->read('Usuario'); 

            $cpf = $cpfusuarios;
            
            $rsPremiados = $this->query("SELECT * FROM premiados premi WHERE cpf = '$cpf'");
            
            $pontos = 0;



            if(isset($rsPremiados['0']['premi']['pontos']) && $rsPremiados['0']['premi']['pontos'] != ""){

                foreach ($rsPremiados as $premiados) {
                    
                     $pontos = $pontos + $premiados['premi']['pontos'];
                    
                }

            }else{

                $pontos = 0;
            }   

            if($pontos == 0){

                return 0;

            }

            $rsProdutos = $this->query("SELECT * FROM compras cp WHERE cp.CPFPedido='".$cpf."' GROUP BY cp.PedidoPedido ORDER BY cp.id DESC"); 


            foreach ($rsProdutos as $valorcompra) {
                

                 $pontos = $pontos - $valorcompra['cp']['Valor_MoedaPedido'];

            }

                            
            return $pontos;



    }



    /* 

    calcula o total de compras que o usuario fez por mes na loga virtal do clube de lidetes  

    */
    function totalComprarsUsuarioPorMes(){ 
        
            App::import('Model', 'CakeSession');
            $session = new CakeSession(); 
            $idUsuario = 0; 
            $idUsuario = $session->read('Usuario'); 

            $cpf = $idUsuario['Usuario']['cpf']; 


            $totalCompra = 0;
            $mes = date("n");
                    

            $rsProdutos = $this->query("SELECT  cp.Valor_ReaisPedido as Valorcomprado FROM compras cp WHERE month(created) = $mes AND cp.CPFPedido='".$cpf."' GROUP BY cp.PedidoPedido ORDER BY cp.id DESC "); 

            

            if(isset($rsProdutos[0]['cp']['Valorcomprado']) && $rsProdutos[0]['cp']['Valorcomprado'] != ""){

                foreach ($rsProdutos as $compra) {
                
                    $totalCompra = $totalCompra + $compra['cp']['Valorcomprado']; 

                }             

        
            } 
                         
            return $totalCompra; 



    }   




} 