<?php
require_once("/usr/local/www/data-dist/projetos/model/fileManager/HTML.php");

class HTMLTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New HTML() ;
    }
    
    /**
     * @group testMakeHTML
     */
    public function testMakeHTML () {
        $this->assertInstanceOf('HTML', $this->instancia);
    }
    
    /**
    * @group testgroupName
    * @dataProvider dataForgroupName
    */
//    public function testgroupName($expected, $data) {
//        $this->assertEquals($expected, $this->instancia->functionNameToTest($data));
//    }
//    public function dataForgroupName() {
//         return array(
//            array(true, 'valueToInsertInFuncion'), 
//            array(false, 'valueToInsertInFuncion'), 
//        );
//    }
       
}
