<?php
require_once ('DataMap.php');
class FromEmail{
    private $instancia;
    
    public function __construct($dataMap) {
        $this->instancia = $dataMap;
    }
    
    public function save($name, $email){
        return $this->instancia->querie['select'];
    }
    
    public function get() {
        
    }
    
    public function update(){
        
    }
}
