<?php
include("views/View.php");

session_start();
define('_ROOT_PATH', dirname(__FILE__));
$actions = array("home","form"); // nazwy podstron
$action = "form";
if(!empty($_GET['action'] )){
    if(in_array($_GET['action'] , $actions)){
        $action = $_GET["action"];
    }else{
        $action = 'pageNotFound';
    }
}

$view = new View();

$view->render($action);

//require_once("views/login_view.php");

//include(_ROOT_PATH.DIRECTORY_SEPARATOR . 'actions'.DIRECTORY_SEPARATOR.$action.'.php');
//include(_ROOT_PATH.DIRECTORY_SEPARATOR . 'views'.DIRECTORY_SEPARATOR.$action.'.php');
//test
?>