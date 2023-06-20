<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {


	function checkAdminSession() {
		if (!$this->Session->check('User')) {
			$this->Session->setFlash('Você precisa estar logado para acessar esta área');
			$this->redirect('/Cms/login/');
			exit();
		}
	}

function beforeFilter() {
	

		if(strstr($_SERVER['HTTP_HOST'],'www.'))
		{
			header('HTTP/1.1 301 Moved Permanently');
			header('Location: http://'.substr($_SERVER['HTTP_HOST'],4).$_SERVER['REQUEST_URI']);
			exit();
		}


		if(isset($this->params['admin'])) {
			$this->checkAdminSession();
		}

		if($this->name != 'Cms' && $this->action != 'login' && $this->action != 'userredirect'){ 
			if (!$this->Session->check('User')) {

				if (!$this->Session->check('Usuario')) {
					echo "Voc&ecirc; precisa estar logado para acessar esta &aacute;rea";
					exit();
				}  
			}  

		}
	
	}


}