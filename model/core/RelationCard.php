<?php namespace Cartao\model\core;

class RelationCard{
    private $DB;

    public function __construct() {
        $this->DB = new \Cartao\model\db\DBConnection();
    }
    
    public function save($idFromEmail, $idToEmail, $idMessage, $dataEnvio){
        return  $this->insert($idFromEmail, $idToEmail, $idMessage, $dataEnvio);
    }
    
    public function delete($id) {
        $delete = "DELETE FROM psnScheduleSend WHERE agnID= :id";
        $stm = $this->DB->prepare($delete);
        $stm->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->DB->runQuery($stm);       
        return $this->testDelete($stm->rowCount());
    }
    
    public function selecCountIDsInFromEmail($id) {
        $sql = "SELECT count(agnIDFromEmail) AS 'repeated' FROM psnScheduleSend WHERE agnIDFromEmail = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":id", $id,\PDO::PARAM_INT);
        return  $this->DB->runSelect($stm);
    }
    
    public function selecCountIDsInToEmail($id) {
        $sql = "SELECT count(agnIDToEmail) AS 'repeated' FROM psnScheduleSend WHERE agnIDToEmail = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":id", $id, \PDO::PARAM_INT);
        return  $this->DB->runSelect($stm);
    }
    
    public function selectIDsToDelete($id) {
        $sql = "SELECT agnIDFromEmail AS IDFromEmail, agnIDToEmail AS IDToEmail, agnIDMessage AS IDMessage "
                . "FROM psnScheduleSend WHERE agnID = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":id", $id, \PDO::PARAM_INT);
        return  $this->DB->runSelect($stm);
    }

    
    private function insert($idFromEmail, $idToEmail, $idMessage, $dataEnvio) {
        $sql = "INSERT INTO psnScheduleSend (agnIDFromEmail, agnIDToEmail, agnIDMessage, agnDateToSend) "
                . "VALUES (:idFromEmail, :idToEmail, :idMessage, :dataEnvio)";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":idFromEmail", $idFromEmail, \PDO::PARAM_INT);
        $stm->bindParam(":idToEmail", $idToEmail, \PDO::PARAM_INT);
        $stm->bindParam(":idMessage", $idMessage, \PDO::PARAM_INT);
        $stm->bindParam(":dataEnvio", $dataEnvio, \PDO::PARAM_STR);
        $this->DB->runQuery($stm);
        return intval($this->DB->lastIdOnInsert());
    }
    
    public function selectAllRegisters() {
        $sql = "SELECT ss.agnID AS IDScheduleSend, fe.agnID AS IDFromEmail, te.agnID AS IDToEmail, ms.agnID AS IDMessage, 
                fe.agnEmail AS emailFromEmail, fe.agnName AS nameFromEmail, te.agnEmail AS emailToEmail, te.agnName AS nameToEmail, 
                agnMessage AS message, agnCreateDate AS createDate, agnDateToSend AS dateToSend FROM psnScheduleSend AS ss 
                INNER JOIN psnFromEmail AS fe ON (ss.agnIDFromEmail = fe.agnID) 
                INNER JOIN psnToEmail AS te ON (ss.agnIDToEmail = te.agnID)
                INNER JOIN psnMessageToSend AS ms ON (ss.agnIDMessage = ms.agnID)";
        $stm = $this->DB->prepare($sql);        
        return  $this->DB->runSelect($stm);
    }

    
    private function testDelete($rowDelete) {
        if($rowDelete == 1){
            return true;
        }
        return false;
    }
}
