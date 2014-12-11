<?php
require_once ('model/db/DBConnection.php');

class RelationCard extends DBConnection{
    private $DB;

    public function __construct() {
        $conn = new DBConnection();
        $this->DB = $conn->Connect();
    }
    
    public function save($idFromEmail, $idToEmail, $idMessage, $dataEnvio){
        return  $this->insert($idFromEmail, $idToEmail, $idMessage, $dataEnvio);
    }
    
    public function delete($id) {
        $delete = "DELETE FROM psnScheduleSend WHERE agnID= :id";
        $stm = $this->DB->prepare($delete);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $this->runQuery($stm);       
        return $this->testDelete($stm->rowCount());
    }
    
    public function selecCountIDsInFromEmail($id) {
        $sql = "SELECT count(agnIDFromEmail) AS 'repeated' FROM psnScheduleSend WHERE agnIDFromEmail = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        return  $this->RunSelect($stm);
    }
    
    public function selecCountIDsInToEmail($id) {
        $sql = "SELECT count(agnIDToEmail) AS 'repeated' FROM psnScheduleSend WHERE agnIDToEmail = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        return  $this->RunSelect($stm);
    }
    
    private function insert($idFromEmail, $idToEmail, $idMessage, $dataEnvio) {
        $sql = "INSERT INTO psnScheduleSend (agnIDFromEmail, agnIDToEmail, agnIDMessage, agnDateToSend) "
                . "VALUES (:idFromEmail, :idToEmail, :idMessage, :dataEnvio)";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":idFromEmail", $idFromEmail, PDO::PARAM_INT);
        $stm->bindParam(":idToEmail", $idToEmail, PDO::PARAM_INT);
        $stm->bindParam(":idMessage", $idMessage, PDO::PARAM_INT);
        $stm->bindParam(":dataEnvio", $dataEnvio, PDO::PARAM_STR);
        $this->runQuery($stm);
        return intval($this->DB->lastInsertId());
    }
    
    private function testDelete($rowDelete) {
        if($rowDelete == 1){
            return true;
        }
        return false;
    }
}
