<?php
class CartaoModelo {
    public $toEmail;
    public $toName;
    public $fromEmail;
    public $fromName;
    public $message;
    public $date;
    private $arrayNameVarInter;
    private $arrayValuesVarInter;

    
    public function __construct($arrayPost = array()) {
        $this->setListVars($arrayPost);
        $this->setVariablesInter($arrayPost);
    }
    
    public function save() {
        if($this->verifyIfIsSet() == false){
            return false;
        }else{
            return true;
        }
    }

    
    private function setVariablesInter($array){
        $arrayVarNameInter = $this->arrayNameVarInter;
        for($i=0; $i < sizeof($arrayVarNameInter); $i++){      
            $this->$arrayVarNameInter[$i] = $this->arrayValuesVarInter[$i];
        }
        
    }
    
    private function verifyIfIsSet(){
        $array = $this->arrayNameVarInter;
        $arrayVariableSet = array(true, true);
        
        for($i=0; $i < sizeof($this->arrayNameVarInter); $i++){
            if($this->$array[$i] != "" && $this->$array[$i] != " "){
                $arrayVariableSet[] = true;
            }else{
                $arrayVariableSet[] = false;
            }
        }
        
        if(array_search(false, $arrayVariableSet) == false){
            return true;
        }
        return false;
    }
    
    private function setListVars($array){
        $variableNames = get_defined_vars();
        $this->arrayNameVarInter = array_keys($variableNames["array"]);
        $this->arrayValuesVarInter = array_values($variableNames["array"]);
    }
}