<?php
        
try 
{
    $db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} 
catch (PDOException $e) 
{
    echo 'Błąd: '.$e->getMessage();
}

$errors = array();
$validation = false;
$errors['addCommentEmpty'] = 0;
$place = null;
$id = null;
if(isset($_GET['type']) && isset($_GET['id'])){
    $place = $_GET['type'];
    $id = $_GET['id'];
}else{
    header("Refresh: 0; URL = /index.php?action=home");
}

if(isset($_POST['submit'])){
    if($_POST['content'] != null){
        try{
            $db->beginTransaction();
            $stmt = $db->prepare('INSERT INTO comment (userID, content, place, postID) VALUES (:userID,:content,:place,:postID)');
            $stmt->bindValue(':postID',$id,PDO::PARAM_INT);
            $stmt->bindValue(':content',$_POST['content'],PDO::PARAM_STR);
            $stmt->bindValue(':place',$place,PDO::PARAM_STR);
            $stmt->bindValue(':userID',$_SESSION['logged'],PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
            $db->commit();
            $validation = true;
        }catch(PDOException $e){
            $db->rollBack();
            echo 'Błąd: '.$e->getMessage(); 
        }
    }else{
        $errors['addCommentEmpty'] = 1;
    }
}

// zabezpieczenie przed odsiwezaniem strony here
if($validation){
    if($place == 'forum'){
        header("Refresh: 0; URL = /index.php?action=post&id=$id");
    }else{
        header("Refresh: 0; URL = /index.php?action=recipe&id=$id");
    }
    
}


?>