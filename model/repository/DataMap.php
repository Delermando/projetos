<?php

class DataMap {

    private $html;
    private $css;
    private $js;

    public function get($dataType, $key) {
        //if($this->isArray($this->$dataType)){
            $return = $this->testKeyExist($this->$dataType, $key);
        //}else{
            //return 'false';
       // }
//        if($return[0] !== 'wrongName'){
//            $return = $this->checkIfFIleExist($return);
//        }
        return $return;
    }
    
    
    public function addHTMLFile($path, $arrayHTMLFile) {
        if ($this->isArray($arrayHTMLFile)) {
            $this->html = $this->constructArray($path, $arrayHTMLFile, 'php');
            return true;
        }
        return false;
    }

    public function addCSSFile($path, $arrayCSSLFile) {
        if ($this->isArray($arrayCSSLFile)) {
            $this->css = $this->constructArray($path, $arrayCSSLFile, 'css');
            $this->css = $this->wrapPath('<link type="text/css" rel="stylesheet" href="%s" />', $this->css);
            return true;
        }
        return false;
    }

    public function addJSLFile($path, $arrayJSFile) {
        if ($this->isArray($arrayJSFile)) {
            $this->js = $this->constructArray($path, $arrayJSFile, 'js');
            $this->js = $this->wrapPath('<script type="text/javascript" lang="javascript" src="%s">', $this->js);
            return true;
        }
        return false;
    }

    private function constructArray($path, $arrayToAdd, $fileType) {
        return array_combine($arrayToAdd, array_map(function($fileName) use ($path, $fileType) {
                    return sprintf($path, $fileName . '.' . $fileType);
                }, $arrayToAdd));
    }
    private function wrapPath($format, $arrayPaths) {
        array_map(function($path) use ($format) {return sprintf($format, $path);}, $arrayPaths);
    }
    // sprintf('<script type="text/javascript" lang="javascript" src="%s">', $this->js)

    private function isArray($varInto) {
        if (is_array($varInto)) {
            return true;
        }
        return false;
    }

    private function testKeyExist($array, $key) {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
        return array('wrongName');
    }

    private function checkIfFIleExist($fileName) {
        if (file_exists($fileName)) {
            return $fileName;
        }
        return array('fileNotExist');
    }

}
