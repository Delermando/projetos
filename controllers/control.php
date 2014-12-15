<?php 

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

require_once('model/repository/DataMap.php');
require_once ('globals.php');
require_once('model/router/Router.php');
require_once('model/interactor/Interactor.php');
require_once('model/core/CardModel.php');
//$cardModel = new CardModel();

$arrayToSave = array('toEmail' => 'delsantos@hotmail.com.br',
                    'toName'=>'testeNameToName',
                    'fromEmail'=>'d.santos@personarel.com.br',
                    'fromName'=>'testNameFromName',
                    'message'=>'Mensagem',
                    'date'=>'24-01-1999');


//$id = $_GET['id'];
//$cardModel = new CardModel();
//var_dump($cardModel->update('12-fe:ae', 'personare'));
//var_dump($cardModel->update('151-te:ae', 'deler'));
//var_dump($cardModel->update('3-ms:am', 'deler'));
//var_dump($cardModel->save($arrayToSave));
//var_dump($cardModel->delete($id));
//var_dump($cardModel->select());

                      

$Interactor = New Interactor($DataMap);
$Router = New Router($DataMap->get('get', 'action'), $Interactor);

$Router->set('', 'homeBase');
$Router->set('home', 'home');
$Router->set('teste', 'teste');;
$Router->set('deler', 'deler');
$Router->set('jsonSelect', 'jsonSelectAllCards');



