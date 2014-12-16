<?php

require_once('model/htmlManager/HTMLPages.php');
require_once('model/core/CardModel.php');

class CardController{
    
    private $CardModel;
    private $Pages;
    private $DataMap;
       
    public function __construct($DataMap) {
        $this->DataMap = $DataMap;
        $this->CardModel = New CardModel();
        $this->HTMLPage = New HTMLPages($DataMap);
    }
    
    public function pageHomeBase() {
        $this->HTMLPage->setContent('homeBase');
        return $this->HTMLPage->setPage('htmlDefault');
    }
    
        
    public  function pageHome() {
        $this->Pages->setContent('home');
        return $this->HTMLPage->setPage('htmlDefault');
    }
    public  function pageCadastro() {
        //       $date = $this->dataMap->get('post', 'selectDia')."-".$this->dataMap->get('post', 'selectMes')."-".$this->dataMap->get('post', 'selectAno');   
//       $arrayToSave['toEmail'] = $this->dataMap->get('post', 'txtEmailDestinatario');
//       $arrayToSave['toName'] = $this->dataMap->get('post', 'txtNomeDestinatario');
//       $arrayToSave['fromEmail'] = $this->dataMap->get('post', 'txtEmailRemetente');
//       $arrayToSave['fromName'] = $this->dataMap->get('post', 'txtNomeDestinatario');
//       $arrayToSave['message'] = $this->dataMap->get('post', 'txtMensagem');
//       $arrayToSave['date'] = $date;
//       
       
        $this->setMessageToSave($this->CardModel->save($this->arrayDadosToSave()));
        $this->HTMLPage->setContent('cadastrar');
        return $this->HTMLPage->setPage('htmlDefault');      
    }
    
    private function setMessageToSave($backOfClass) {
        if(is_int($backOfClass)){
            $this->HTMLPage->setMessageFeedBack($this->DataMap->get('message', 'registrationSucess'));
        }else{
            $this->HTMLPage->setMessageFeedBack($this->DataMap->get('message', 'registratioFailed'));
        }
    }
    
    private function arrayDadosToSave() {
        $arrayToSave['toEmail'] = 'delsantos@hotmail.com.br';
        $arrayToSave['toName'] = 'delermando';
        $arrayToSave['fromEmail'] = 'd.santos@personare.com.br';
        $arrayToSave['fromName'] = 'deler';
        $arrayToSave['message'] = 'teste teste teste';
        $arrayToSave['date'] =  '24-01-1992';
        return $arrayToSave;
    }

    public  function pageEditar() {
        $this->HTMLPage->setContent('editar');
        return $this->HTMLPage->setPage('htmlDefault');
    }
    
    public function jsonSelectAllCards(){
         echo json_encode($this->CardModel->select());
    }
            
    public function render() {
        return $this->HTMLPage->pageRender();
    }    
}
