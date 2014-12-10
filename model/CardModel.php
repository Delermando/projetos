<?php
require_once ('Filters.php');
require_once ('FromEmail.php');

class CardModel extends Filters{
    
    public function save($arrayToSave) {
        $return = $this->setArrayToSave($arrayToSave);
        $sizeArrayToSave = sizeof($return);
        if($sizeArrayToSave == 6){
            $FromEmail = new FromEmail();
            $return = $FromEmail->save($return['fromName'], $return['fromEmail']);
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