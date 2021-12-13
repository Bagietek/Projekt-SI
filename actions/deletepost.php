<?php

try 
{
    $db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} 
catch (PDOException $e) 
{
    echo 'Błąd: '.$e->getMessage();
}

// id = id posta
// place = tj. forum lub przepisy
if(isset($_SESSION['permission'])){
    if(isset($_GET['id'])  && isset($_GET['place'])){
        // sprawdzenie czy ten użytkownik jest autorem posta
        if($_GET['place'] == 'forum'){
            $stmt = $db->prepare('SELECT userID FROM forum WHERE id=:id');
        }else{
            $stmt = $db->prepare('SELECT userID FROM recipe WHERE id=:id');
        }
        $stmt->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch();
        if($_SESSION['permission'] == 'admin' || $_SESSION['permission'] == 'mod' || $row['userID'] == $_SESSION['logged']){
            // usuwanie posta
            $place = "forum";
            try{
                $db->beginTransaction();
                if($_GET['place'] == 'forum'){
                    $stmt = $db->prepare('DELETE FROM forum WHERE id=:id');
                    $place = "forum";
                }else{
                    $stmt = $db->prepare('DELETE FROM recipe WHERE id=:id');
                    $place = "recipe";
                }
                $stmt->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
                $stmt->execute();
                $stmt->closeCursor();
                $db->commit();
            }catch(PDOException $e){
                $db->rollBack();
                echo 'Błąd: '.$e->getMessage(); 
            }
            // usuwanie komentarzy posta
            try{
                $db->beginTransaction();
                $stmt = $db->prepare('DELETE FROM comment WHERE postID=:id AND place=:place');
                $stmt->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
                $stmt->bindValue(':place',$place,PDO::PARAM_STR);
                $stmt->execute();
                $stmt->closeCursor();
                $db->commit();
            }catch(PDOException $e){
                $db->rollBack();
                echo 'Błąd: '.$e->getMessage(); 
            }
            header("location: index.php?action=$place");
        }
        
    }else{
        header("location: index.php?action=home");
    }
}else{
    header("location: index.php?action=home");
}
exit;

?>