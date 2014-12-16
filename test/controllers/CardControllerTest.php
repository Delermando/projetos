<?php
require_once("/usr/local/www/data-dist/projetos/control/CardControl.php");

class CardControlTest extends PHPUnit_Framework_TestCase {
    protected $instancia;

     protected function setUp(){
        $this->instancia = New CardControl();
    }
            
  public function testMakeCardControl() {
       $this->assertInstanceOf('CardControl', $this->instancia);
  }
  
//  public function testSaveCard(){
//      $cartao = new CartoesControl();
//      $this->assertEquals(true,$cartao->create());
//  }
  


}
