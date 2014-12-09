<?php

class Filters {

    private $arrayBaseToInsert = array('toEmail' => '', 'toName' => '', 'fromEmail' => '', 'fromName' => '', 'message' => '', 'date' => '');
    private $arrayToSave;

    public function setArrayToSave($array) {
        $return = $this->checkIfAllVerificationsIsToSaveIsTrue($array);
        if($return === true){
            return $this->arrayToSave = $array;
        }
        return $return;
    }

    private function checkIfAllVerificationsIsToSaveIsTrue($array) {
       $return = true;
       $status['keysCompare'] = $this->compareArrayKeysExternWithIntern($array);
       if($status['keysCompare']){
            $status['valuesIsSet'] = $this->testArrayIfAllIsSet($array);
            $status['toEmail'] = $this->checkIfIsEmail($array['toEmail']);
            $status['fromEmail'] = $this->checkIfIsEmail($array['fromEmail']);
            $status['date'] = $this->checkIfIsDate($array['date']);
            $searchErro = array_search(false, $status);
            if(!$searchErro == false){
                $return = array($searchErro => false);
            }
       }else{
           $return = $status;
       }
       return $return;
    }

    private function testArrayIfAllIsSet($array) {
        $keysExter = array_keys($array);
        for($i=0; sizeof($array) > $i; $i++){
            if(!$this->checkIfIsSet($array[$keysExter[$i]])){
                return false;       
            }
        }
        return true;
    }

    private function compareArrayKeysExternWithIntern($array) {
        $keysExter = array_keys($array);
        $keysIntern = array_keys($this->arrayBaseToInsert);
        for($i=0; sizeof($keysIntern) > $i; $i++){
            if(!$this->checkIfIsEqual($keysIntern[$i], $keysExter[$i])){
                return false;       
            }
        }
        return true;
    }
    
    private function checkIfIsEqual($var1, $var2) {
        if ($var1 == $var2) {
            return true;
        }
        return false;
    }

    private function checkIfIsSet($var) {
        if ($var != "" && $var != "") {
            return true;
        }
        return false;
    }

    public function checkIfIsEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }else{
            return false;
        }
        return true;
    }

    public function checkIfIsDate($date) {
        $regexTesteDate = "~^\d{2}/\d{2}/\d{4}$~";
        $testRegex = filter_var($date,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=> $regexTesteDate)));
        if($testRegex !== false){
            return true;
        }
        return false;      
    }

}
