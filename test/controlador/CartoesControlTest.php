<?php
require_once("/usr/local/www/data-dist/projetos/controlador/CartoesControl.php");



class CartoesControlTest extends PHPUnit_Framework_TestCase {
    protected $instancia;
     
//    public function 
            
  public function testMakeCartaoControl() {
       $this->assertInstanceOf('CartoesControl', New CartoesControl());
  }
  
  public function testSaveCard(){
      $cartao = new CartoesControl();
      $this->assertEquals(true,$cartao->create());
  }
  


}
