<?php 

/**
 *
 * <code>
 *     $file_src = dirname(__FILE__) . '/../../../resources/Lighthouse.jpg';
 *     $file_dst = dirname(__FILE__) . '/../../../resources/Lighthouse_teste.jpg';
 *     $this->simpleimage->load($file_src);
 *     $this->simpleimage->resize(200, 200);
 *     $this->simpleimage->crop(100,100,200,200);
 *     $this->simpleimage->save($file_dst);
 * </code>
 */
class SimpleImage {


    var $image;
    var $image_type;

    /**
     *
     * @param string $filename
     */
    function load($filename) {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if( $this->image_type == IMAGETYPE_JPEG ) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif( $this->image_type == IMAGETYPE_GIF ) {
            $this->image = imagecreatefromgif($filename);
        } elseif( $this->image_type == IMAGETYPE_PNG ) {
            $this->image = imagecreatefrompng($filename);
        }
    }
 
    /**
     *
     * @param string $filename
     * @param int $image_type Usar constantes: IMAGETYPE_JPEG | IMAGETYPE_GIF | IMAGETYPE_PNG
     * @param int $compression
     * @param int $permissions
     */ 
    function save($filename, $image_type=IMAGETYPE_JPEG, $compression=250, $permissions=null) {  
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image,$filename,$compression);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image,$filename);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image,$filename);
        }
        if( $permissions != null) {
            chmod($filename,$permissions);
        }
    }
    function output($image_type=IMAGETYPE_JPEG) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image);
        }
    }

    /**
     * Obtem a largura atual
     * 
     * @return int
     */
    function getWidth() {
        return imagesx($this->image);
    }

    /**
     * Obtem a altura atual
     * @return int
     */
    function getHeight() {
        return imagesy($this->image);
    }

    
    function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width,$height);
    }
    function resizeToWidth($width) {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width,$height);
    }
    function scale($scale) {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getheight() * $scale/100;
        $this->resize($width,$height);
    }
    function resize($width, $height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }

   function crop($left, $top, $crop_width, $crop_height){
       $canvas = imagecreatetruecolor($crop_width, $crop_height);
       imagecopy($canvas, $this->image, 0, 0, $left, $top, $this->getWidth(), $this->getHeight());
       $this->image = $canvas;
   }

    /**
     * Redimensiona e corta proporcionalmente
     */
    function resizeCrop($w_new, $h_new){

        //Se a imagem for horizontal
        if($w_new >= $h_new){

            //Redimensiona para a nova largura (se horizontal)
            $this->resizeToWidth($w_new);

            //Obtem a altura atual
            $h_cur = $this->getHeight();

            //Corta a altura para ficar de acordo com a nova dimensão
            $this->crop(0, ceil(($h_cur-$h_new)/2), $w_new, $h_new);

        } else {

            //Redimensiona para a nova largura
            $this->resizeToHeight($h_new);

            //Obtem a altura atual
            $w_cur = $this->getWidth();

            //Corta a altura para ficar de acordo com a nova dimensão
            $this->crop(ceil(($w_cur-$w_new)/2), 0, $w_new, $h_new);
        }
    }

}


?>
