<?php 
class TraducoesMobileController extends AppController{

    public $components = array('RequestHandler', 'Session');

	public function getTraducoes($language){


		Configure::write('Config.language', $language);

		$data = array();

		//Caso tenha recebido um post
		if($this->request->is('post')){
			foreach ($this->request->data['palavras'] as $key => $value) {
				$data[$value] = __($value);
			}
		}

		$this->set(array(
            'data' => $data,
            '_serialize' => array('data')
        ));
	}

}
