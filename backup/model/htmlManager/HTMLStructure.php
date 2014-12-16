<?php 

class HTMLStructure {

    private $page;
    protected $flags = array('[:linksCSS:]', '[:linksJS:]', '[:message:]', '[:dataForContent:]', '[:title:]');
    protected $valuesToReplace = array('css' => '', 'js' => '', 'message' => '', 'dataForContent' => '', 'title' => '');

    public function pageRender() {
        echo $this->page;
    }

    public function setPage($functionNameReferToPage) {
        $this->page = $this->constructPage($functionNameReferToPage);
    }

    public function setMessageFeedBack($message) {
        if (isset($message) && $message !== "") {
            $this->valuesToReplace['message'] = $message;
        }
    }

    public function setContent($content = '') {
        $this->values = $content;
    }

    protected function defaultPage() {
        return $this->getHeader() . $this->getContent('home') . $this->getFooter();
    }

    private function constructPage($functionNameReferToPage) {
        $html = $this->$functionNameReferToPage();
        return $this->replaceFlag($this->valuesToReplace, $html);
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

    private function constructMessage($message) {
        return sprintf("<div class='message %s'>%s</div>", $message);
    }

    private function replaceFlag($valuesToFlags, $html) {
        return str_replace($this->flags, $valuesToFlags, $html);
    }

}
