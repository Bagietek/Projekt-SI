<?php
        



if(isset($_POST['submit']))
{
    if($_POST['login']!=null&&$_POST['password']!=null&&$_POST['email']!=null)
    {
        try 
        {
            $db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } 
        catch (PDOException $e) 
        {
            echo 'Błąd: '.$e->getMessage();
        }
        $query = $db->prepare('SELECT login FROM user WHERE login = :login');
        $query->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
        $query->execute();
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