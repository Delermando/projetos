<?php
require_once("/usr/local/www/data-dist/projetos/control/CartaoControl.php");

class CartaoControlTest extends PHPUnit_Framework_TestCase {
    protected $instancia;

     protected function setUp(){
        $this->instancia = New CartaoControl();
    }
            
  public function testMakeCartaoControl() {
       $this->assertInstanceOf('CartaoControl', $this->instancia);
  }
  
//  public function testSaveCard(){
//      $cartao = new CartoesControl();
//      $this->assertEquals(true,$cartao->create());
//  }
  


}
