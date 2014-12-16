<?php
class CardModelTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New \Cartao\model\core\CardModel();
    }
      
    public function testMakeCardModelComParametro() {
        $this->assertInstanceOf('CardModel', $this->instancia);
    }
}
