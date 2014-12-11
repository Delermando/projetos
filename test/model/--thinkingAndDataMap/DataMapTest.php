<?php
require_once("/usr/local/www/data-dist/projetos/model/--thinkingAndDataMap/DataMap.php");


class DataMapTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New DataMap();
    }
    
    public function testMakeDataMap () {
        $this->assertInstanceOf('DataMap', $this->instancia);
    }
       
    public function testAddQuerie() {
        $this->assertEquals(false, $this->instancia->addQuerie('test'));
    }
    public function testAddTable() {
        $this->assertEquals(false, $this->instancia->addTable('test'));
    }
    public function testAddColumn() {
        $this->assertEquals(false, $this->instancia->addColumn('test'));
    }
}
