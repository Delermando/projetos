<?php
require_once('model/fileManager/Pages.php');
require_once('model/core/CardModel.php');
class Interactor{
    private $CardModel;
    private $Pages;
    private $dataMap;
       
    public function __construct($DataMap) {
        $this->dataMap = $DataMap;
        $this->CardModel = New CardModel();
        $this->Pages = New Pages($DataMap);
    }
    
    public function homeBase() {
        
          
//       $date = $this->dataMap->get('post', 'selectDia')."-".$this->dataMap->get('post', 'selectMes')."-".$this->dataMap->get('post', 'selectAno');   
//       $arrayToSave['toEmail'] = $this->dataMap->get('post', 'txtEmailDestinatario');
//       $arrayToSave['toName'] = $this->dataMap->get('post', 'txtNomeDestinatario');
//       $arrayToSave['fromEmail'] = $this->dataMap->get('post', 'txtEmailRemetente');
//       $arrayToSave['fromName'] = $this->dataMap->get('post', 'txtNomeDestinatario');
//       $arrayToSave['message'] = $this->dataMap->get('post', 'txtMensagem');
//       $arrayToSave['date'] = $date;
//       
        $arrayToSave['toEmail'] = 'delsantos@hotmail.com.br';
        $arrayToSave['toName'] = 'delermando';
        $arrayToSave['fromEmail'] = 'd.santos@personare.com.br';
        $arrayToSave['fromName'] = 'deler';
        $arrayToSave['message'] = 'teste teste teste';
        $arrayToSave['date'] =  '24-01-1992';
        $this->setMessageToSave($this->CardModel->save($arrayToSave));
        $this->Pages->setContent('teste ok');

        $this->Pages->setPage('htmlDefault');
    }
    private function setMessageToSave($backOfClass) {
        if(is_int($backOfClass)){
            $this->Pages->setMessageFeedBack($this->dataMap->get('message', 'registrationSucess'));
        }else{
            $this->Pages->setMessageFeedBack($this->dataMap->get('message', 'registratioFailed'));
        }
    }
    
    public  function home() {
        $this->Pages->setContent('home');
        return $this->Pages->setPage('htmlDefault');
    }
    public  function teste () {
        $this->Pages->setContent('teste');
        return $this->Pages->setPage('htmlDefault');
    }
    
    public  function deler () {
        $this->Pages->setContent('deler');
        return $this->Pages->setPage('htmlDefault');
    }
    
    public function jsonSelectAllCards(){
         echo json_encode($this->CardModel->select());
    }
            
    public function render() {
        return $this->Pages->pageRender();
    }
    
    


}
