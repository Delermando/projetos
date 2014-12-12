<?php
define('DB_HOST', '192.168.0.198');
define('DB_NAME', 'agenda');
define('DB_USER', 'agenda');
define('DB_PASS', 'agenda');

$msgInformativo = "";

$varSet = array(
    "default"
);

$varPOST = array(
    "default",
    "txtMensagem",
    "txtNomeRemetente",
    "txtEmailRemetente",
    "txtNomeDestinatario",
    "txtEmailDestinatario",
    "selectDia",
    "selectMes",
    "selectAno",
    "btnEnviar",
    "arrayExcluir"
);

$varGET = array(
    "action",
    "cadastrar",
    "cadastrarCartoes",
    "excluirMensagens"
);

$arrayTitle = array(
    'home' => 'Personare - Sistema agenda',
    'error' => 'Personare - Error',
    'editar' => 'Personare - Editar',
    'cadastro' => 'Personare - Cadastro' 
);

$systemMensages = array(
    'default' => "",
    'sendSucess' => "Mensagem enviada com sucesso!",
    'sendFailed' => "Por favor tente novamente! Ocorreu durante o envio!",
    'registratioFailed' => "Por favor tente novamente! Ocorreu algum erro durante o cadastro!",
    'registrationSucess' => 'Cadastro realizado com sucesso!',
    'fieldIncomplete' => 'Preencha todos os campos!',
    'dataExclusionSucess'=> 'Os dados foram excluidos com sucesso! Total de linhas: ',
    'dataExclusionFailed'=> 'Nem todos os dados foram excluidos com sucesso!'
);


$arrayLinksCabecalho = array(
    'default' => '',
    'jquery' => '<script type="text/javascript" src="views/js/jQuery.js"></script>',
    'scripts' => '<script type="text/javascript" src="views/js/scripts.js"></script>',
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



//data map, nova estrutura para disponibilizacao de dados
//$dataMap = new DataMap();
//
//$arrayTables = array(
//    'destinatario' => 'psnAgendaDestinatario',
//    'relacao' => 'psnAgendaEnvio',
//    'mensagem'=>'psnAgendaMensagem',
//    'remetente'=>'psnAgendaRemetente'
//);
//
//$arrayQueries = array(
//    'destinatario' => 'INSERT INTO %s (%s) VALUES (%s)',
//    'select' => 'SELECT %s FROM %s WHERE %s',
//);
//
//
//$arrayColumns = array(
//    'idGeral' => 'agnID',
//    'padEmail' => 'agnEmailDestinatario',
//    'padDestinatario' => 'agnNomeDestinatario',
//    'parEmail' => 'agnRemetenteEmail',
//    'parNome' => 'agnRemetenteNome',
//    'pamMensagem' => 'angMensagem',
//    'pamDataCriacao'=>'agnDataCriacao',
//    'paeDataEnvio' => 'agnDataEnvio',
//    'paeIDDestinatario' => 'agnIDDestinatario',
//    'paeIDRemetente' => 'agnIDRemetente',
//    'paeIDMensagem' => 'agnIDMensagem',
//  
//);


//$dataMap->addQuerie($arrayQueries);
//$dataMap->addTable($arrayTables);
//$dataMap->addColumn($arrayColumns);
//
