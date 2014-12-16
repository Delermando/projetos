<?php 

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

require_once ('globals.php');
$CardController = New \Cartao\controllers\CardController($DataMap);
$Router = new \Cartao\model\router\Router($DataMap->get('get', 'action'), $CardController);

$Router->set('', 'pageHomeBase');
$Router->set('home', 'pageHome');
$Router->set('cadastro', 'pageCadastro');
$Router->set('editar', 'pageEditar');
$Router->set('jsonSelect', 'jsonSelectAllCards');


//
//
//define('DB_HOST', '192.168.0.198');
//define('DB_NAME', 'agenda');
//define('DB_USER', 'agenda');
//define('DB_PASS', 'agenda');
//
//$RelationCard = new \Cartao\model\core\RelationCard();
////$teste = $RelationCard->selectIDsToDelete(2);
////var_dump($teste);
//
//
////$db = new Cartao\model\db\DBConnection();
////$db->Connect();
////$cardModel = new \Cartao\model\core\CardModel();
//////$cardModel->delete(1);
////
////
////$arrayToSave['toEmail'] = 'delsantos@hotmail.com.br';
////        $arrayToSave['toName'] = 'delermando';
////        $arrayToSave['fromEmail'] = 'dd.santos@personare.com.br';
////        $arrayToSave['fromName'] = 'deler';
////        $arrayToSave['message'] = 'teste teste teste';
////        $arrayToSave['date'] =  '24-01-1992';
////$teste = $cardModel->save($arrayToSave);
////var_dump($teste);
////
