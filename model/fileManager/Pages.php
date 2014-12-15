<?php
require_once 'CreateHTML.php';
class Pages extends CreateHTML{
    protected  $DataMap;
    protected  $values;
    protected  $valuesToReplace = array('css'=>'', 'js'=>'', 'message'=>'', 'dataForContent'=>'', 'title'=>'');

    public function __construct($objectDapaMap) {
        $this->DataMap = $objectDapaMap;
    }
    
    protected  function home() {
        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'home');
        $this->valuesToReplace['dataForContent'] = $this->values; 
        return $this->defaultPage();
    }
    
}