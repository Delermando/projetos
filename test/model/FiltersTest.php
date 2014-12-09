<?php
require_once("/usr/local/www/data-dist/projetos/model/Filters.php");

class FiltersTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New Filters() ;
    }
    
    public function testMakeFilters () {
        $this->assertInstanceOf('Filters', $this->instancia);
    }
    
    public function testIfArrayToSaveIsInTheFormat () {
        $test = array('toEmail' => 'teste@hotmail.com.br',
                'toName'=>'dadada',
                'fromEmail'=>'tancman@hotmail.com.br',
                'fromName'=>'dododo',
                'message'=>'dududu',
                'date'=>'24/01/1999');
        
        $arraySize = sizeof($this->instancia->setArrayToSave($test));
        $this->assertEquals(6, $arraySize);
    }
    
    public function testIfIsEmail() {
        $this->assertEquals(true,$this->instancia->checkIfIsEmail('test@hotmail.com.br'));
    }
    
    public function testIfIsDate() {
        $this->assertEquals(true, $this->instancia->checkIfIsDate('24/01/1992'));
    }
}