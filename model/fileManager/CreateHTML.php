<?php

class CreateHTML {
    protected  $flags = array('[:linksCSS:]', '[:linksJS:]','[:message:]', '[:dataForContent:]', '[:title:]');
    private $page;
    
    public function pageRender() {
        echo $this->page;
    }
    public function setPage($functionNameReferToPage,$valuesToPutIntoHTML = '') {
        $this->values = $valuesToPutIntoHTML;
        $this->page =  $this->constructPage($functionNameReferToPage);
    }
    
    protected  function defaultPage() {
        return $this->getHeader().$this->getContent('home').$this->getFooter();
    }
    
    private function constructPage($functionNameReferToPage) {
        $html = $this->$functionNameReferToPage();
        return $this->replaceFlag($this->valuesToReplace,$html);
    }
    private function getHTML($pathFile) {
        return file_get_contents($pathFile);
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
}

