<?php 

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

require_once('model/dataRepository/DataMap.php');
require_once ('globals.php');
require_once('CardController.php');
require_once('model/router/Router.php');

$CardController = New CardController($DataMap);
$Router = New Router($DataMap->get('get', 'action'), $CardController);

$Router->set('', 'pageHomeBase');
$Router->set('home', 'pageHome');
$Router->set('cadastro', 'pageCadastro');
$Router->set('editar', 'pageEditar');
$Router->set('jsonSelect', 'jsonSelectAllCards');

