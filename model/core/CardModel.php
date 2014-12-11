<?php
require_once ('model/dataManager/Filters.php');
require_once ('model/core/FromEmail.php');
require_once ('model/core/ToEmail.php');
require_once ('model/core/Message.php');
require_once ('model/core/RelationCard.php');

class CardModel extends Filters{
    
    public function save($arrayToSave) {
        $return = $this->setArrayToSave($arrayToSave);
        $sizeArrayToSave = sizeof($return);
        if($sizeArrayToSave == 6){
             return $this->saveInAllEntities($arrayToSave);
        }
        return $return;
    }
    
    public function delete($idFromEmail,$idToEmail, $IdMessage, $IdSchedule) {
        $arrayDelete = array('idFromEmail' => $idFromEmail,'idToEmail'=>$idToEmail, 
                            'idMessage'=>$IdMessage, 'idSchedule'=>$IdSchedule);
        if($this->checkIdsToDelete($arrayDelete)){
            return $this->deleteInAllEntities($arrayDelete);
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
    
    private function saveInAllEntities($arrayDataToInsert) {
        $idFromEmail = $this->instanceSaveFromEmail($arrayDataToInsert['fromName'], $arrayDataToInsert['fromEmail']);
        $idToEmail = $this->instanceSaveToEmail($arrayDataToInsert['toName'], $arrayDataToInsert['toEmail']);
        $idMessage = $this->instanceSaveMessage($arrayDataToInsert['message']);
        return $this->instanceSaveRelationCard($idFromEmail, $idToEmail, $idMessage, $arrayDataToInsert['date']);
    }

    private function deleteInAllEntities($arrayDelete) {
        $return = $this->intanceDeleteRelationCard($arrayDelete['idSchedule']);
        $this->deleteFromEmailIfIsUnic($arrayDelete['idFromEmail']);
        $this->deleteToEmailIfIsUnic($arrayDelete['idToEmail']);
        $this->intanceDeleteMessage($arrayDelete['idMessage']);
        return $return;
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
    
    
    private function instanceSaveToEmail($name, $email) {
        $toEmail = new ToEmail();
        return $toEmail->save($name, $email);
    }
    private function intanceDeleteToEmail($id) {
        $toEmail = new ToEmail();
        return $toEmail->delete($id);
    }
    private function intanceUpdateToEmail($column, $value, $id) {
        $toEmail = new ToEmail();
        return $toEmail->update($column, $value, $id);
    }
    
    
    private function instanceSaveMessage($messageToInsert) {
        $message = new Message();
        return $message->save($messageToInsert);
    }
    private function intanceDeleteMessage($id) {
        $message = new Message();
        return $message->delete($id);
    }
    private function intanceUpdateMessage($column, $value, $id) {
        $message = new Message();
        return $message->update($column, $value, $id);
    }

    
    private function instanceSaveRelationCard($idFromEmail, $idToEmail, $idMessage, $dataEnvio) {
        $relationCard = new RelationCard();
        return $relationCard->save($idFromEmail, $idToEmail, $idMessage, $dataEnvio);
    }
    private function intanceDeleteRelationCard($id) {
        $relationCard = new RelationCard();
        return $relationCard->delete($id);
    }
    
    private function intanceSelecCountIDIsnFromEmail($id) {
        $relationCard = new RelationCard();
        return $relationCard->selecCountIDsInFromEmail($id);
    }
    
    private function intanceSelecCountIDIsnToEmail($id) {
        $relationCard = new RelationCard();
        return $relationCard->selecCountIDsInToEmail($id);
    }
    
    private function deleteFromEmailIfIsUnic($id) {
        $status = $this->intanceSelecCountIDIsnFromEmail($id);
        if($status[0]['repeated'] == 0){
            $this->intanceDeleteFromEmail($id);
        }
    }
    private function deleteToEmailIfIsUnic($id) {
        $status = $this->intanceSelecCountIDIsnToEmail($id);
        if($status[0]['repeated'] == 0){
            $this->intanceDeleteFromEmail($id);
        }
    }

    
    private function chooseInstanceForUpdate($arrayDataForUpdate, $value) {
       switch ($arrayDataForUpdate['table']){
           case "psnFromEmail":
               return $this->intanceUpdateFromEmail($arrayDataForUpdate['column'], $value, $arrayDataForUpdate['id']);
               break;
           case "psnToEmail":
               return $this->intanceUpdateToEmail($arrayDataForUpdate['column'], $value, $arrayDataForUpdate['id']);
               break;
           case "psnMessageToSend":
              return $this->intanceUpdateMessage($arrayDataForUpdate['column'], $value, $arrayDataForUpdate['id']);
               break;
           default :
               return false;
       }
        return true;
    }

}