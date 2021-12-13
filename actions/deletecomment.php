<?php

try 
{
    $db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} 
catch (PDOException $e) 
{
    echo 'Błąd: '.$e->getMessage();
}
// id = id komentarza
// idP = id posta, w którym jest komentarz
// place = miejsce - forum lub recipe
if(isset($_SESSION['permission'])){
    if(isset($_GET['id']) && isset($_GET['idP']) && isset($_GET['place'])){
        // sprawdzenie czy ten użytkownik jest autorem komentarza
        $stmt = $db->prepare('SELECT userID FROM comment WHERE id=:id AND place=:place');
        $stmt->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
        $stmt->bindValue(':place',$_GET['place'],PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        if($_SESSION['permission'] == 'admin' || $_SESSION['permission'] == 'mod' || $row['userID'] == $_SESSION['logged']){
            try{
                $db->beginTransaction();
                $stmt = $db->prepare('DELETE FROM comment WHERE id=:id');
                $stmt->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
                $stmt->execute();
                $stmt->closeCursor();
                $db->commit();
            }catch(PDOException $e){
                $db->rollBack();
                echo 'Błąd: '.$e->getMessage(); 
            }
        }else{
            header("location: index.php?action=home");
        }

        if($_GET['place'] == 'forum'){ // powrót do posta w forum
            header("location: index.php?action=post&id=$_GET[idP]");
        }else{ // powrót do przepisu
            header("location: index.php?action=recipe&id=$_GET[idP]");
        }
    }else{
        header("location: index.php?action=home");
    }
}else{
    header("location: index.php?action=home");
}
exit;

?>