<?php 
/**
 * Mural
 */
class Mural extends AppModel
{   
	
	var $name = 'Mural';

	public $useTable   = 'mural';

    //public $useTable   = 'inscricoes';     
     public $belongsTo = array(
         'Usuario' => array(
            'className'     => 'Usuario',
            'foreignKey'    => 'id_usuario',                        
            'dependent'     => false
         ) 
    );

   
public $validate = array(
 
        'conteudo' => array(
            'rule' => 'notEmpty',
            'message' => '*Campo conteudo é obrigatório'            
        )
    );
 
} 