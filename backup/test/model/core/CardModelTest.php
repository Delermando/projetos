<?php
require_once("/usr/local/www/data-dist/projetos/model/core/CardModel.php");

class CardModelTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New CardModel();
    }
      
    public function testMakeCardModelComParametro() {
        $this->assertInstanceOf('CardModel', $this->instancia);
    }
}
