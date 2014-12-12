<?php

class HTML {
    private $DataMap;
    private $flags = array('[:linksCSS:]', '[:linksJS:]','[:message:]', '[:dataForContent:]', '[:title:]');
    private $valuesToReplace = array('css'=>'', 'js'=>'', 'message'=>'', 'dataForContent'=>'', 'title'=>'');
    private $values;
    private $page;
    
    public function __construct($objectDapaMap) {
        $this->DataMap = $objectDapaMap;
    }
    public function pageRender() {
        echo $this->page;
    }

    public function setPage($functionNameReferToPage,$valuesToPutIntoHTML = '') {
        $this->values = $valuesToPutIntoHTML;
        $this->page =  $this->constructPage($functionNameReferToPage);
    }
    
    private function home() {
        $this->homeSetValuesToReplace();
        return $this->getHeader().$this->getContent('home').$this->getFooter();
    }
    private function homeSetValuesToReplace() {
//        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['css'];
        $this->valuesToReplace['js'];
        $this->valuesToReplace['message'] = 'message';
        $this->valuesToReplace['title'] ='title';
        $this->valuesToReplace['dataForContent'] = $this->values;  
        return $this->valuesToReplace;
    }

    private function constructPage($functionNameReferToPage) {
        $html = $this->$functionNameReferToPage();
        return $this->replaceFlag($this->valuesToReplace,$html);
    }

    private function getHeader() {
        return $this->getHTML($this->DataMap->get('html', 'header'));
    }
    private function getContent($content) {
        return $this->getHTML($this->DataMap->get('html', 'home'));
    }
    private function getFooter() {
        return $this->getHTML($this->DataMap->get('html', 'footer'));
    }
    private function replaceFlag($valuesToFlags, $html) {
        return str_replace($this->flags, $valuesToFlags, $html);
    }
    private function getHTML($pathFile) {
        return file_get_contents($pathFile);
    }

}

