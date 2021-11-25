<?php

    try 
    {
        $db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } 
    catch (PDOException $e) 
    {
        echo 'Błąd: '.$e->getMessage();
    }
    
    if(isset($_POST['submitlogin']))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $query = $db->prepare('SELECT id, password, permission FROM user WHERE login = :login');
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->execute();
            
        $user = $query->fetch();
        if($query->rowCount()>0)
        {
            if($user['password'] == sha1($password))
            {
                    //var_dump($user['permission']);
                $_SESSION['logged'] = $user['id'];
                $_SESSION['permission'] = $user['permission'];
                    //var_dump($_SESSION['permission']);
                $_SESSION['action'] = 'home';
                $_SESSION['error'] = 0;
                header('location: index.php');   
            }
            else
            {
                $_SESSION['error'] = 1;
                header('location: index.php'); 
            }
        }
        else
        {
            $_SESSION['error'] = 1;
            header('location: index.php'); 
        }
    }







//include("views/login.php")



?>