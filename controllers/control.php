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


$Interactor = New Interactor($DataMap);
$Router = New Router($DataMap->get('get', 'action'), $Interactor);

$Router->set('', 'homeBase');
$Router->set('home', 'home');
$Router->set('teste', 'teste');
$Router->set('tanc', 'testeTanc');

$Router->set('deler', 'deler');
$Router->set('jsonSelect', 'jsonSelectAllCards');

