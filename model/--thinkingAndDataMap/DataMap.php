<?php

class DataMap {
    public $querie;
    public $table;
    public $column;
    
    public function addQuerie($array){
        $this->addToArray('querie', $array);
    }
    
    public function addTable($array){
       $this->addToArray('table', $array);
    }
    
    public function addColumn($array){
        $this->addToArray('column', $array);
    }
    
    private function isArray($array) {
        if(is_array($array)){
            return true;
        }
        return false;
    }
    
    private function addToArray($arrayNameMain, $arrayToAdd) {
        if($this->isArray($arrayToAdd)){
            $this->$arrayNameMain = $arrayToAdd;
        }else{
          $this->$arrayNameMain = false;
        }
    }

}