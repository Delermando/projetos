<?php namespace Cartao\model\htmlManager;

class HTMLPages extends HTMLStructure{
    protected  $DataMap;
    protected  $values;
    
    public function __construct($objectDataMap) {
        $this->DataMap = $objectDataMap;
    }
    
    protected  function pageDefault() {
        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'default');
        $this->valuesToReplace['dataForContent'] = $this->values; 
        return $this->setContentHTML('home');
    }
    
    protected  function pageHome() {
        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'home');
        $this->valuesToReplace['dataForContent'] = $this->values; 
        return $this->setContentHTML('home');
    }
    protected  function pageSignUp() {
        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'signUp');
        $this->valuesToReplace['dataForContent'] = $this->values; 
        return $this->setContentHTML('signUpPage');
    }
    protected  function pageEdit() {
        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'edit');
        $this->valuesToReplace['dataForContent'] = $this->values; 
        return $this->setContentHTML('editePage');
    }
}