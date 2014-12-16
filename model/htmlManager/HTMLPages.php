<?php namespace Cartao\model\htmlManager;

class HTMLPages extends HTMLStructure{
    protected  $DataMap;
    protected  $values;
    
    public function __construct($objectDataMap) {
        $this->DataMap = $objectDataMap;
    }
    
    protected  function htmlDefault() {
        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'default');
        $this->valuesToReplace['dataForContent'] = $this->values; 
        return $this->defaultPage();
    }
}