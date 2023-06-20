<?php 

App::import('Vendor', 'PhpMailer', array('file' => 'phpmailer' . DS . 'class.phpmailer.php'));
/**
 * Componente compartilhado entre as controller que tratam de inscrições 
 */
class EnviaremailComponent extends Component {

    /**
     * Controller atual
     */
    private $controller;

    /**
     * Metódo chamado na inicialização deste componente
     * @param Controller $controller 
     */
    public function startup(Controller $controller) {
        $this->controller = $controller; 
    }


    /**
     * Função q envia email
     */
    public function enviarEmail($emails){

        $mail             = new PHPMailer();
        $body             = utf8_decode(nl2br($emails['email']['MsgHTML'])); 

        $mail->IsSMTP();
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = "pro.turbo-smtp.com";      // sets GMAIL as the SMTP server
        $mail->Port       = 465;                     // set the SMTP port for the GMAIL server
        
        $mail->Username   = "clubedelideres@campanhaclubedelideres.com.br";  // GMAIL username 
        $mail->Password   = "Pr1sc1l@";            // GMAIL password

        $mail->From       = "clubedelideres@campanhaclubedelideres.com.br";
        $mail->FromName   = utf8_decode("Clube de Líderes");

        $mail->Subject    = $emails['email']['Subject'];

        $mail->WordWrap   = 50; // set word wrap 

        $mail->MsgHTML($body);

        $mail->AddAddress(''.$emails['email']['AddAddress']); 

        $mail->IsHTML(true); // send as HTML

        if(!$mail->Send()) {
            return 0;
        } else {
            return 1;
        } 

    }


    /**
     * Gera uma senha aleatoria entre $min e $max
     *
     * @param int $min Tamanho minimo da senha
     * @param int $max Tamanho maximo da senha
     * @return string Retorna uma senha
     */
    function gerar_senha($min, $max = NULL) {
        $maxNum = ($max) ? rand($min, $max): $min; //SE NAO TIVER TAMANHO MAXIMO ($max) NAO SORTEIA O TAMANHO DA SENHA
        $senha = '';
        for($a=0;$a < $maxNum;$a++) {
            //SE RETORNAR 1,2,3 é letra, se for 0 é numero
            if(rand(0,3)) {
                if(rand(0,1)) //SE RETORAR 1 é letra maiuscula, se nao é minuscula
                    $senha .= chr(rand(ord('A'),ord('Z'))); //SORTEIA UMA LETRA DE A-Z
                    else
                    $senha .= chr(rand(ord('a'),ord('z'))); //SORTEIA UMA LETRA DE a-z
            } else {
                $senha .= rand(0,9); //SORTEIA UM NUMERO DE 0-9
            }
        }
        return $senha;
    }

}