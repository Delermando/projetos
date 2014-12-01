<?php
class Mensages {
    public static function show($message) {
        if (isset($message)) {
            $messageFinal = $message; 
        }else{
            $messageFinal = "A mensagem não esta setada!";
        }
        $msgInformativo = sprintf("<div class='message'>%s</div>", $messageFinal);
        $mensagemRetorno = array(
            'msgInformativo' => $msgInformativo
        );
        return $mensagemRetorno;
    }
}
