<?php
require_once ('Filters.php');
require_once ('FromEmail.php');

class CardModel extends Filters{
    
    public function save($arrayToSave) {
        $arrayChecked = $this->setArrayToSave($arrayToSave);
        $sizeArrayToSave = sizeof($arrayChecked);
        if($sizeArrayToSave == 6){
            $FromEmail = new FromEmail();
            $return = $FromEmail->save($arrayChecked['fromName'], $arrayChecked['fromEmail']);
        }
        return $return;
    }
    
    public function delete($param) {
        return $param;
    }
    
    public function update($param) {
        return $param;
    }
    
    public function select($param) {
        return $param;
    }

}