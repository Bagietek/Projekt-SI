<?php

try 
{
    $db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} 
catch (PDOException $e) 
{
    echo 'Błąd: '.$e->getMessage();
}

        $query = $db->prepare('SELECT nick, email, photo, description FROM user WHERE id = :id');
        $query->bindValue(':id', $_SESSION['logged'], PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();



if(isset($_POST['submit']))
{
    if($_POST['nick']!=null&&$_POST['password']!=null&&$_POST['email']!=null)
    {

        if($query->rowCount()>0)
        {
            $_SESSION['signUpEmptyError'] = 0;
            $_SESSION['signUpExistError'] = 1;
            $_SESSION['signUpNotEqualError'] = 0;
            header('location: index.php');
        }
        else
        {
            if($_POST['password']!=$_POST['password1'])
            {
                $_SESSION['signUpEmptyError'] = 0;
                $_SESSION['signUpExistError'] = 0;
                $_SESSION['signUpNotEqualError'] = 1;
                header('location: index.php');
            }
            else
            {
                try
                {   
                    $stmt = $db->prepare("INSERT INTO user (login, password, nick, email, permission) VALUES (:login, :password, :nick, :email, 'user')");
        
                    $stmt->bindValue(':login', $_POST['login']);
                    $stmt->bindValue(':password', sha1($_POST['password']));
                    $stmt->bindValue(':nick', $_POST['login']);
                    $stmt->bindValue(':email', $_POST['email']);
                    $stmt->execute();
                    $_SESSION['action'] = 'login';
                    $_SESSION['signUpEmptyError'] = 0;
                    $_SESSION['signUpExistError'] = 0;
                    $_SESSION['signUpNotEqualError'] = 0;
                    header('location: index.php'); 
                }
                catch (PDOException $e) 
                {
                    $db->rollBack();
                    echo "Błąd: ".$e->getMessage();  
                } 
            }
            
        }
        
    }
    else
    {
        $_SESSION['signUpEmptyError'] = 1;
        $_SESSION['signUpExistError'] = 0;
        $_SESSION['signUpNotEqualError'] = 0;
        header('location: index.php'); 
    }
        
}

?>