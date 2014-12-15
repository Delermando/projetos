<?php

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

$DataMap->addHTMLFile($pathHTML, $arrayPathHTMLFiles);
$DataMap->addCSSFile($pathCSS, $arrayPathCSSFiles);
$DataMap->addJSLFile($pathJS, $arrayPathJSFiles);
$DataMap->addTitle($arrayTitle);