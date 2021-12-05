<?php

session_start();
//session_unset();
include("views/View.php");


define('_ROOT_PATH', dirname(__FILE__));
// nazwy podstron
$actions = array("home","login","logout","recipes","forum","aboutus","users","deleteuser","signup","changeperm","post","addpost","search","deletecomment","deletepost","addcomment","addrecipe","recipe");
if(!isset($_SESSION['action']))
    $_SESSION['action'] = 'home';
if(!empty($_GET['action'] )){
    if(in_array($_GET['action'] , $actions)){
        $_SESSION['action'] = $_GET["action"];
    }else{
        $_SESSION['action'] = 'pageNotFound';
    }
}
if(isset($_SESSION['loginerror'])&&$_SESSION['action']!='login')
{
    $_SESSION['loginerror'] = 0;
}
if(($_SESSION['action']!='signup')&&(isset($_SESSION['signUpEmptyError'])||isset($_SESSION['signUpExistError'])||isset($_SESSION['signUpNotEqualError'])))
{
    $_SESSION['signUpEmptyError'] = 0;
    $_SESSION['signUpExistError'] = 0;
    $_SESSION['signUpNotEqualError'] = 0;
}

$view = new View();

$view->render($_SESSION['action']);


//include(_ROOT_PATH.DIRECTORY_SEPARATOR . 'actions'.DIRECTORY_SEPARATOR.$action.'.php');
//include(_ROOT_PATH.DIRECTORY_SEPARATOR . 'views'.DIRECTORY_SEPARATOR.$action.'.php');
//test
?>