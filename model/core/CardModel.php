<?php
require_once ('../model/dataManager/Filters.php');
require_once ('../model/core/FromEmail.php');

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
    
    public function update($identifier, $value) {
        $arrayIDColumnAndTable = $this->getIdColumAndTableFromIdetifier($identifier);
        return $this->chooseInstanceForUpdate($arrayIDColumnAndTable, $value);
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
    
    private function chooseInstanceForUpdate($arrayDataForUpdate, $value) {
       switch ($arrayDataForUpdate['table']){
           case "psnFromEmail":
               return $this->intanceUpdateFromEmail($arrayDataForUpdate['column'], $value, $arrayDataForUpdate['id']);
               break;
           case "psnToEmail":
               echo "falta instanciar";
               break;
           case "psnMessageToSend":
               echo "falta instanciar";
               break;
           default :
               return false;
       }
        return true;
    }

}