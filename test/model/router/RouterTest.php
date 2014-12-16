<?php

class RouterTest extends PHPUnit_Framework_TestCase {
    protected $instancia;

    protected function setUp(){
        $this->instancia = New \Cartao\model\router\Router();
    }
    
    /**
     * @group testMakeRouter
     */
    public function testMakeRouter() {
        $this->assertInstanceOf('Router', $this->instancia);
    }
}
