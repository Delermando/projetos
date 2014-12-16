<?php 
require_once ('model/db/DBConnection.php');

class Message extends DBConnection{
    private $DB;

    public function __construct() {
        $conn = new DBConnection();
        $this->DB = $conn->Connect();
    }
    
    public function save($message){
        return  $this->insert($message);
    }
    
    public function delete($id) {
        $delete = "DELETE FROM psnMessageToSend WHERE agnID= :id";
        $stm = $this->DB->prepare($delete);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $this->runQuery($stm);       
        return $this->testDelete($stm->rowCount());
    }
    
    public function update($column, $value, $id){
        $sql = "UPDATE psnMessageToSend SET {$column} = :value WHERE agnID = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":value", $value, PDO::PARAM_STR);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        return $this->runQuery($stm);
    }
    
    private function insert($message) {
        $sql = "INSERT INTO psnMessageToSend (agnMessage) VALUES (:message)";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":message", $message, PDO::PARAM_STR);
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
