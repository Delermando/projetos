<?php

require_once 'clsDBConnection.class.php';

class QueryStatement extends DBConnection {
    private $DB;
    public function __construct() {
        $this->DB = new DBConnection();
    }

    public function selectUnicUserAgenda($id) {
        $sql = "SELECT agnRemetenteEmail,agnRemetenteNome, agnEmailDestinatario,agnNomeDestinatario,angMensagem,agnDataEnvio,agnDataCriacao
                    FROM psnAgendaEnvio AS e 
                    INNER JOIN psnAgendaRemetente AS r ON (e.agnIDRemetente = r.agnID) 
                    INNER JOIN psnAgendaDestinatario AS d ON (e.agnIDDestinatario = d.agnID)
                    INNER JOIN psnAgendaMensagem AS m ON (e.agnIDMensagem = m.agnID) 
                    WHERE e.agnID = :id;";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        return $this->RunSelect($stm);
    }

    public function selectAllUserAgenda() {
        $sql = "SELECT agnRemetenteEmail,agnRemetenteNome, agnEmailDestinatario,agnNomeDestinatario,angMensagem,agnDataEnvio,agnDataCriacao
                    FROM psnAgendaEnvio AS e 
                    INNER JOIN psnAgendaRemetente AS r ON (e.agnIDRemetente = r.agnID) 
                    INNER JOIN psnAgendaDestinatario AS d ON (e.agnIDDestinatario = d.agnID)
                    INNER JOIN psnAgendaMensagem AS m ON (e.agnIDMensagem = m.agnID)";
        $stm = $this->DB->prepare($sql);
        return $this->RunSelect($stm);
    }

    public function deleteUserAgenda($id) {
        $sql = "DELETE FROM psnAgendaEnvio WHERE agnID= :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        return $this->runQuery($stm); //nao retorna false caso nao seja encontrado o id para deletar
    }

    public function updateUserAgenda($array) {
        $sql = "UPDATE {$array['table']} SET {$array['column']} = :value WHERE agnID = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":value", $array['value'], PDO::PARAM_STR);
        $stm->bindParam(":id", $array['id'], PDO::PARAM_INT);
        return $this->runQuery($stm);
    }

    public function insertUserAgenda($destinatarioEmail, $destinatarioNome, $remetenteEmail, $remetenteNome, $mensagem, $dataEnvio) {
        $retorno = true;
        $sql1 = "INSERT INTO psnAgendaDestinatario(agnEmailDestinatario,agnNomeDestinatario) VALUES (:destinatarioEmail, :destinatarioNome)";
        $stm1 = $this->DB->prepare($sql1);
        $stm1->bindParam(":destinatarioEmail", $destinatarioEmail, PDO::PARAM_STR);
        $stm1->bindParam(":destinatarioNome", $destinatarioNome, PDO::PARAM_STR);
        $status[] = $this->runQuery($stm1);

        $sql2 = "INSERT INTO psnAgendaRemetente(agnRemetenteEmail,agnRemetenteNome) VALUES (:remetenteEmail, :remetenteNome)";
        $stm2 = $this->DB->prepare($sql2);
        $stm2->bindParam(":remetenteEmail", $remetenteEmail, PDO::PARAM_STR);
        $stm2->bindParam(":remetenteNome", $remetenteNome, PDO::PARAM_STR);
        $status[] = $this->runQuery($stm2);

        $sql3 = "INSERT INTO psnAgendaMensagem(angMensagem, agnDataEnvio) VALUES (:mensagem, :dataEnvio)";
        $stm3 = $this->DB->prepare($sql3);
        $stm3->bindParam(":mensagem", $mensagem, PDO::PARAM_STR);
        $stm3->bindParam(":dataEnvio", $dataEnvio, PDO::PARAM_STR);
        $status[] = $this->runQuery($stm3);

        if (array_search(false, $status) != false) {
            $retorno = false;
        }
        return $retorno;
    }

}
