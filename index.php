<?php

session_start();
//session_unset();
include("views/View.php");


define('_ROOT_PATH', dirname(__FILE__));
$actions = array("home","form","login","logout"); // nazwy podstron
if(!isset($_SESSION['action']))
    $_SESSION['action'] = 'home';
if(!empty($_GET['action'] )){
    if(in_array($_GET['action'] , $actions)){
        $_SESSION['action'] = $_GET["action"];
    }else{
        $_SESSION['action'] = 'pageNotFound';
    }
}

$view = new View();

$view->render($_SESSION['action']);
//require_once("views/login_view.php");

//include(_ROOT_PATH.DIRECTORY_SEPARATOR . 'actions'.DIRECTORY_SEPARATOR.$action.'.php');
//include(_ROOT_PATH.DIRECTORY_SEPARATOR . 'views'.DIRECTORY_SEPARATOR.$action.'.php');
//test
?>