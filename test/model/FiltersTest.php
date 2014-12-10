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
    
    
    public function testTrueIfIsEmail() {
        $this->assertEquals(true,$this->instancia->checkIfIsEmail('test@hotmail.com.br'));
    }
    public function testFalseIfIsEmail() {
        $this->assertEquals(false,$this->instancia->checkIfIsEmail('testhotmail.com.br'));
    }
    
    
    public function testTruetIfIsDate() {
        $this->assertEquals(true, $this->instancia->checkIfIsDate('24/01/1992'));
    }
    public function testFalseIfIsDate() {
        $this->assertEquals(false, $this->instancia->checkIfIsDate('s24/01/1992'));
    }
    
    
    public function testTrueIfIDsToDeleteIsSet() {
        $this->assertEquals(true, $this->instancia->checkIdsToDelete(array(2, 12, 8,9)));
    }
    public function testFalseIfIDsToDeletePassFalseValue() {
        $this->assertEquals(false, $this->instancia->checkIdsToDelete(array(12, 2, 8,'')));
    }
    
    
    public function testTrueIfIsSet() {
        $this->assertEquals(true,$this->instancia->checkIfIsSet('de'));
    }
    public function testFalseIfIsSet() {
        $this->assertEquals(false,$this->instancia->checkIfIsSet(''));
    }
    
    
    public function testTrueIfIsInt() {
        $this->assertEquals(true,$this->instancia->checkIfIsInt(8));
    }
    public function testFalseIfIsInt() {
        $this->assertEquals(false,$this->instancia->checkIfIsInt('s'));
    }
    
}