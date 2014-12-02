<?php
define('DB_HOST', '192.168.0.198');
define('DB_NAME', 'agenda');
define('DB_USER', 'agenda');
define('DB_PASS', 'agenda');

$varSet = array(
    "default"
);

$varPOST = array(
    "default"
);

$varGET = array(
    "action"
);

$arrayTitle = array(
    'home' => 'Personare - Sistema agenda',
    'error' => 'Personare - Error',
    'editar' => 'Personare - Editar',
    'cadastrar' => 'Personare - Cadastro' 
);

$systemMensages = array(
    'default' => "",
    'sendSucess' => "Mensagem enviada com sucesso",
    'fieldIncomplete' => 'Preencha todos os campos!'
);


$arrayLinksCabecalho = array(
    'default' => '',
    'editOnPageJS' => '<script type="text/javascript" lang="javascript" src="views/js/editOnPage.js"></script>',
    'editOnPageCSS' => '<link type="text/css" rel="stylesheet" href="views/css/editOnPage.css" />',
    'jeditable' => '<script type="text/javascript" src="views/js/jeditable.js"></script>',
    'configJeditable' => '<script type="text/javascript" src="views/js/configJeditable.js"></script>'
);

$varSetadas = setVar::varIsSet($varSet);
extract($varSetadas);

$postSetadas = setVar::post($varPOST);
extract($postSetadas);

$getSetadas = setVar::get($varGET);
extract($getSetadas);

if (isset($action)) {
    $action = explode("-", $action);
    $action = $action[0];
}

$enderecoSubmit = $_SERVER['PHP_SELF'];

