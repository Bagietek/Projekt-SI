<?php
    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}
    $id = $_GET['recpieID'];

    $statement = $db->prepare('SELECT likes FROM recipe WHERE id=:id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    
    $likes = $statement->fetchColumn();

    if($_GET['wtd'] == 'like')
    {
        $stmt = $db->prepare("INSERT INTO likes (userID, recipeID) VALUES (:userID, :recipeID)");
        
        $stmt->bindValue(':userID', $_SESSION['logged']);
        $stmt->bindValue(':recipeID', $id);
        $stmt->execute();
        $_SESSION['action'] = 'recipe';

        $likes++;
    }
    elseif($_GET['wtd'] == 'dislike')
    {
        try{
            $db->beginTransaction();
            $statement = $db->prepare('DELETE FROM likes WHERE userID = :userID && recipeID = :recipeID');
            $statement->bindValue(':userID', $_SESSION['logged']);
            $statement->bindValue(':recipeID', $id);
            $statement->execute();
            $statement->closeCursor();
            $db->commit();
        }catch(PDOException $e){
            $db->rollBack();
            echo $e->getMessage();
        }

        $likes--;

    }

    try{
        $statement = $db->prepare('UPDATE recipe SET likes=:likes WHERE id=:id');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(':likes',$likes,PDO::PARAM_INT);
        $statement->execute();
    }catch(PDOException $e){
        $db->rollBack();
        echo $e->getMessage();
    }
	//header("Refresh: 0; URL = /index.php?action=recipe&id=$id");
    header("location: index.php?action=recipe&id=$id");
    exit;


?>