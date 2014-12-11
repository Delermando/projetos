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

$arrayToSave = array('toEmail' => 'destancmansssss@hotmail.com.br',
                'toName'=>'dadasdasada',
                'fromEmail'=>'stancmansssss@hotmail.com.bf',
                'fromName'=>'dododasdaso',
                'message'=>'dudusdsdu',
                'date'=>'24-01-1999');

$cardModel = new CardModel();
//var_dump($cardModel->update('12-fe:ae', 'personare'));
//var_dump($cardModel->update('151-te:ae', 'deler'));
//var_dump($cardModel->update('3-ms:am', 'deler'));
//$de = $cardModel->save($arrayToSave);
//var_dump($de);
var_dump($cardModel->delete(23, 155, 39, 32));

//var_dump($cardModel->de(23));
