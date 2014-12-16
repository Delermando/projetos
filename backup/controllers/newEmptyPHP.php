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
$Router = New \Cartao\model\router\Router($DataMap->get('get', 'action'), $CardController);
$Router->set('', 'pageHomeBase');
$Router->set('home', 'pageHome');
$Router->set('cadastro', 'pageCadastro');
$Router->set('editar', 'pageEditar');
//$Router->set('jsonSelect', 'jsonSelectAllCards');
//
echo 'passou!';