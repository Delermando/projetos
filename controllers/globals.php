<?php

define('DB_HOST', '192.168.0.198');
define('DB_NAME', 'agenda');
define('DB_USER', 'agenda');
define('DB_PASS', 'agenda');

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

$arrayTitle = array( 
  'home' => 'Homepage Personare',      
);

$arrayDatabaseInfo = array(
    'bd'=>'agenda',
    'host' => '192.168.0.198',
    'user' => 'agenda',
    'pass' => 'agenda'
);


$DataMap->addHTMLFile($pathHTML, $arrayPathHTMLFiles);
$DataMap->addCSSFile($pathCSS, $arrayPathCSSFiles);
$DataMap->addJSLFile($pathJS, $arrayPathJSFiles);
$DataMap->addTitle($arrayTitle);
//$DataMap->addDabaseInfo($arrayDatabaseInfo);