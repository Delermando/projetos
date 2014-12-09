<?php
require_once("/usr/local/www/data-dist/projetos/model/CartaoModel.php");

class CartaoModelTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New CartaoModel(array('toEmail' => 'sdds',
                                                'toName'=>'dadada',
                                                'fromEmail'=>'tancman',
                                                'fromName'=>'dododo',
                                                'message'=>'dududu',
                                                'date'=>'dedede'));
    }
    
    
    public function testMakeCartaoModelComParametro() {
        $this->assertInstanceOf('CartaoModel', $this->instancia);
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
