<?php
require_once 'CreateHTML.php';
class Pages extends CreateHTML{
    protected  $DataMap;
    protected  $values;
    

    public function __construct($objectDapaMap) {
        $this->DataMap = $objectDapaMap;
    }
    
    protected  function htmlDefault() {
        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'default');
        $this->valuesToReplace['dataForContent'] = $this->values; 
        return $this->defaultPage();
    }
}