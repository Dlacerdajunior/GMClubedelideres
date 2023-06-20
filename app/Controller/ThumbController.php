<?php
App::import('Vendor', 'SimpleImage', array('file' => 'SimpleImage' . DS . 'simpleimage.php'));
App::uses('AppController', 'Controller');

class ThumbController extends AppController { 


	public $name = 'Thumb';

	public $uses = array();

      public function upload($w=null, $h =null, $slider=null) {

            $this->layout = 'ajax'; 
      }

	public function gerar($w=null, $h =null, $slider=null) {

		
		
	     if ($this->request->is('post')) {


	     $dinaName = str_replace("Controller", "", dirname(__FILE__) ."webroot/");

			 

	      $nomefoto = $this->data['nomefoto'];
            $filepath = $this->data['filepath'];
            $left = $this->data['left'];
            $top = $this->data['top'];
            $crop_width = $this->data['crop_width'];
            $crop_height = $this->data['crop_height'];



            $resFilePath = $dinaName.Configure::read('UploadArquivos.provisorioDir').$nomefoto;

            $destFileName =  strtotime(date('Y-m-d H:i:s')) . ".jpg";
            $destFileDiscPath =  $dinaName .Configure::read('UploadArquivos.definitiveDir').$destFileName; 
                  	


            $simpleImage = new SimpleImage();
         	$simpleImage->load($resFilePath);
            $simpleImage->crop($left, $top, $crop_width, $crop_height);
            $simpleImage->resize($this->data['thumb_w'], $this->data['thumb_h']);
            $simpleImage->save($destFileDiscPath); 

            echo $this->base."/".Configure::read('UploadArquivos.definitiveDir').$destFileName;   

            exit(); 
		}  


            $this->set(compact('w', 'h','slider')); 

		$this->layout = 'ajax'; 
	}  


}