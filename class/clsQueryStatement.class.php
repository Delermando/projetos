<?php
require_once 'clsDBConnection.class.php';

 class QueryStatement extends DBConnection{
        private $DB;
        public function __construct() {
             $this->DB = new DBConnection();
        }
      
        public function selectUnicUserAgenda($id){
            $sql =  "SELECT * FROM psnagendamento WHERE id = :id";
            $stm = $this->DB->prepare($sql);
            $stm->bindParam(":id",$id, PDO::PARAM_INT);
            return $this->RunSelect($stm);
        }
        
        public function selectAllUserAgenda(){
            $sql =  "SELECT * FROM psnagendamento WHERE 1";
            $stm = $this->DB->prepare($sql);
            return $this->RunSelect($stm);
        }
        
        public function deleteUserAgenda($id){
                $sql = "DELETE FROM psnagendamento WHERE id= :id";
                $stm = $this->DB->prepare($sql);
                $stm->bindParam(":id",$id, PDO::PARAM_INT);
                return $this->RunQuery($stm);
        }
        public function updateUserAgenda($id){
                $sql = "DELETE FROM psnagendamento WHERE id= :id";
                $stm = $this->DB->prepare($sql);
                $stm->bindParam(":id",$id, PDO::PARAM_INT);
                return $this->RunQuery($stm);
        }
        public function insertUserAgenda($id){
                $sql = "DELETE FROM psnagendamento WHERE id= :id";
                $stm = $this->DB->prepare($sql);
                $stm->bindParam(":id",$id, PDO::PARAM_INT);
                return $this->RunQuery($stm);
        }
}