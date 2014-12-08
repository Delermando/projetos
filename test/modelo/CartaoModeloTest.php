<?php
require_once("/usr/local/www/data-dist/projetos/modelo/CartaoModelo.php");

class CartaoModeloTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New CartaoModelo(array('toEmail' => 'sdds','toName'=>'dadada','fromEmail'=>'tancman','fromName'=>'dododo','message'=>'dududu','date'=>'dedede'));
    }
    
    
    public function testMakeCartaoModeloComParametro() {
        $this->assertInstanceOf('CartaoModelo', $this->instancia);
    }
    
    public function testSaveData() {
        $this->assertEquals(true, $this->instancia->save());
    }

    
    
//    public function testPostVariablesArray() {
//        $this->assertEquals(7,sizeof($this->instancia->arrayPost));
//    }
    
//    public function testIsSet(){
//        $this->assertEquals(7,sizeof($this->instancia->setVariables()));
//    }
    
}
