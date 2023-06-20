<?php 
/**
 * Usuario
 */
class Contempladochevroletpremiado extends AppModel
{
	
	var $name = 'Contempladochevroletpremiado';

	public $useTable   = 'contemplado_chevroletpremiado';

 //public $useTable   = 'inscricoes';     
     public $belongsTo = array(
         'Usuario' => array(
            'className'     => 'Usuario',
            'foreignKey'    => 'id_usuario',                        
            'dependent'     => false
         ) 
    );
      
   
public $validate = array(
 
        'nome' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo Nome é obrigatório'            
        ),
        'email' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo E-Mail é obrigatório'            
        ),
        'cpf' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo CPF é obrigatório'            
        ),
        'endereco' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo Endereços é obrigatório'            
        ),
        'numero' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo Número é obrigatório'            
        ),
        'cidade' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo Cidadade é obrigatório'            
        ),
        'estado' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo Estado é obrigatório'            
        ),
        'cep' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo CEP é obrigatório'            
        ),
        'telefone' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo Telefone é obrigatório'            
        )
    );

} 