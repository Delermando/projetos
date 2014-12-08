<?php
require_once("/usr/local/www/data-dist/projetos/class/clsValidation.class.php");
require_once("/usr/local/www/data-dist/projetos/model/CartaoModelo.php");

class CartoesControl {
    private $cadastrarCartoes = true;
    private $cartaoModelo;
    
    public function __construct() {
        $this->cartaoModelo = new CartaoModelo();
    }
    
    public function create(){
        
        return $this->testPostCreateCartao();;
    }
        private function testPostCreateCartao(){ 
            if ($this->cadastrarCartoes == true && $this->cartaoModelo->verificarMetodoEnvio() == true) {
                return  true;
            }
            return false;
        }
}
