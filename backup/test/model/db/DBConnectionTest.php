<?php
require_once("/usr/local/www/data-dist/projetos/model/db/DBConnection.php");

class DBConnectionTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New DBConnection();
    }
    
    /**
     * @group testMakeDBConnection
     */
    public function testMakeclassNameToTest () {
        $this->assertInstanceOf('DBConnection', $this->instancia);
    }

}
