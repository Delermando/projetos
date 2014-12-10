<?php
require_once ('Filters.php');
require_once ('FromEmail.php');

class CardModel extends Filters{
    public function save($arrayToSave) {
        $return = $this->setArrayToSave($arrayToSave);
        $sizeArrayToSave = sizeof($return);
        if($sizeArrayToSave == 6){
           $return = $this->instanceSaveFromEmail($return['fromName'], $return['fromEmail']);
        }
        return $return;
    }
    
    public function delete($idFromEmail,$idToEmail, $IdMessage, $IdSchedule) {
        if($this->checkIdsToDelete(array($idFromEmail,$idToEmail, $IdMessage, $IdSchedule))){
            return $this->intanceDeleteFromEmail($idFromEmail);
        }
        return false;
    }
    
    public function update($identifier) {
        return $arrayIDColumnAndTable = $this->getIdColumAndTableFromIdetifier($identifier);
        //$this->intanceUpdateFromEmail($column, $value, $id);
        
    }
    
    public function select($param) {
        return $param;
    }
    
    private function instanceSaveFromEmail($name, $email) {
        $FromEmail = new FromEmail();
        return $FromEmail->save($name, $email);
    }
    
    private function intanceDeleteFromEmail($id) {
        $FromEmail = new FromEmail();
        return $FromEmail->delete($id);
    }
    private function intanceUpdateFromEmail($column, $value, $id) {
        $FromEmail = new FromEmail();
        return $FromEmail->update($column, $value, $id);
    }
    
    
}