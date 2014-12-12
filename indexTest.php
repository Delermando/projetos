<?php 

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

define('DB_HOST', '192.168.0.198');
define('DB_NAME', 'agenda');
define('DB_USER', 'agenda');
define('DB_PASS', 'agenda');


require_once('model/core/CardModel.php');
require_once('model/repository/DataMap.php');
require_once('model/fileManager/HTML.php');

$arrayToSave = array('toEmail' => 'delsantos@hotmail.com.br',
                    'toName'=>'testeNameToName',
                    'fromEmail'=>'d.santos@personarel.com.br',
                    'fromName'=>'testNameFromName',
                    'message'=>'Mensagem',
                    'date'=>'24-01-1999');

$id = $_GET['id'];
//$cardModel = new CardModel();
//var_dump($cardModel->update('12-fe:ae', 'personare'));
//var_dump($cardModel->update('151-te:ae', 'deler'));
//var_dump($cardModel->update('3-ms:am', 'deler'));
//var_dump)$cardModel->save($arrayToSave));
//var_dump($cardModel->delete($id));
//var_dump($cardModel->select());



$DataMap = new DataMap();

$pathHTML = 'views/html/%s';
$arrayPathHTMLFiles = array(
    'home', 
    'header',
    'footer',
    'signUpPage',    
    'erroMessage',  
    'editePage'  
);

$pathCSS = 'views/css/%s';
$arrayPathCSSFiles = array(
    'editOnPage',
    'style'
);

$pathJS = 'views/js/%s';
$arrayPathJSFiles = array(
    'configJeditable', 
    'editOnPage',
    'jQuery',
    'jeditable',    
    'placeHolderFormLoginEng',  
    'scripts',  
    'scriptsConfiguracoes'  
);

$DataMap->addHTMLFile($pathHTML, $arrayPathHTMLFiles);
$DataMap->addCSSFile($pathCSS, $arrayPathCSSFiles);
$DataMap->addJSLFile($pathJS, $arrayPathJSFiles);

//var_dump($DataMap->get('html', 'erroMessage'));
echo var_dump($DataMap->get('css', 'style'));
//var_dump($DataMap->get('js', 'jQuery'));

//$HTML = NEW HTML($DataMap);
//$HTML->setPage('home', 'delermando');
//$HTML->pageRender();




