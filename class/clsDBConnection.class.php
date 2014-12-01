<?php

class DBConnection {

    private $conn;

    protected function Connect() {
        try {
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $this->conn;
    }

    protected function Prepare($sql) {
        return $this->Connect()->prepare($sql);
    }

    protected function RunQuery($stm) {//INSERT, UPDATE, DELETE
        return $stm->execute(); //RETORNA TRUE OR FALSE
    }

    protected function RunSelect($stm) {//SELECT
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

}
