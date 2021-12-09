<?php

try 
{
    $db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} 
catch (PDOException $e) 
{
    echo 'Błąd: '.$e->getMessage();
}

        $query = $db->prepare('SELECT nick, email, description FROM user WHERE id = :id');
        $query->bindValue(':id', $_SESSION['logged'], PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();
        $id = $_SESSION['logged'];


if(isset($_POST['submit']))
{
    if($_POST['nick']!=null&&$_POST['password']!=null&&$_POST['password1']!=null&&$_POST['email']!=null)
    {

            if($_POST['password']!=$_POST['password1'])
            {
                $_SESSION['editAccountEmptyError'] = 0;
                $_SESSION['editAccountNotEqualError'] = 1;
                header('location: index.php');
            }
            else
            {
                $nick = $_POST['nick'];
                $password = sha1($_POST['password']);
                $email = $_POST['email'];
                $description = $_POST['description'];

                try
                {
                    $statement = $db->prepare('UPDATE user SET nick=:nick, password=:password, email=:email, description=:description WHERE id=:id');
                    $statement->bindValue(':id', $id, PDO::PARAM_INT);
                    $statement->bindValue(':nick',$nick, PDO::PARAM_STR);
                    $statement->bindValue(':password', $password, PDO::PARAM_STR);
                    $statement->bindValue(':email', $email, PDO::PARAM_STR);
                    $statement->bindValue(':description', $description, PDO::PARAM_STR);
                    $statement->execute();
                }catch(PDOException $e){
                    $db->rollBack();
                    echo $e->getMessage();
                }
                if(isset($_FILES['imgUpload']['tmp_name']))
                {
                    if(is_uploaded_file($_FILES['imgUpload']['tmp_name']))
                    {
                    
                        $max = 500000 * 10; // ~5 MB max
                        $size = $_FILES['imgUpload']['size'];
                        $temp_name = $_FILES['imgUpload']['tmp_name'];
                        
                        // poprawnione nadawanie nazwy pliku na podstawie sumy kontrolnej sha1
                        $type = $_FILES['imgUpload']['type']; // wypluwa .image/png naprawione niżej
                        $type = '.'. substr($type,6); // 6 = .image/
                        $name = sha1_file($_FILES['imgUpload']['tmp_name'],false); // obliczanie sumy kontrolnej
                        $name .= $type;
                        $destination = './images/profile/'.$name;
                        if(!file_exists($destination)){ // sprawdzenie czy takie samo zdjęcie nie znajduje się już na dysku
                            if($size <= 0){
                                $errors['addPostPhoto'] = 1;
                            }elseif($size > $max){
                                $errors['addPostPhoto'] = 1;
                            }else{
                                if(!move_uploaded_file($temp_name,$destination))
                                {
                                    $errors['addPostPhoto'] = 1;
                                }
                            }
                        }
                        $statement = $db->prepare('UPDATE user SET photo=:photo WHERE id=:id');
                        $statement->bindValue(':id', $id, PDO::PARAM_INT);
                        $statement->bindValue(':photo', $name, PDO::PARAM_STR);
                        $statement->execute();
                    }
                }
                $_SESSION['action'] = 'editAccount';
                $_SESSION['editAccountEmptyError'] = 0;
                $_SESSION['editAccountNotEqualError'] = 0;
                //header('location: index.php'); 
            }
            
        
    }
    else
    {
        $_SESSION['editAccountEmptyError'] = 1;
        $_SESSION['editAccountNotEqualError'] = 0;
        header('location: index.php'); 
    }
        
}

?>