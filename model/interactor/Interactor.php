<?php
require_once('model/fileManager/Pages.php');
require_once('model/core/CardModel.php');
class Interactor{
    private  $CardModel;
    private  $Pages;
       
    public function __construct($DataMap) {
        $this->CardModel = New CardModel();
        $this->Pages = New Pages($DataMap);
    }
    
    public function homeBase() {
        return $this->Pages->setPage('home', 'home');
    }
    
    public  function home() {
        return $this->Pages->setPage('home', 'home');
    }
    public  function teste () {
        return $this->Pages->setPage('teste', 'teste');
    }
    
    public  function deler () {
        return $this->Pages->setPage('teste', 'deler');
    }
    
    public function jsonSelectAllCards(){
        
        $arrayToSave = array('toEmail' => 'delsantos@hotmail.com.br',
                    'toName'=>'testeNameToName',
                    'fromEmail'=>'d.santos@personarel.com.br',
                    'fromName'=>'testNameFromName',
                    'message'=>'Mensagem',
                    'date'=>'24-01-1999');
//        $this->CardModel->save($arrayToSave);
//        $this->cardModel->save($arrayToSave);
//        var_dump($this->CardModel->select());
         echo json_encode($this->CardModel->select());
    }
            
    public function render() {
        return $this->Pages->pageRender();
    }
    

}
