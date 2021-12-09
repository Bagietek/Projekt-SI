<?php
try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}
    $id =  $_GET['param'];
	
	// usunięcie użytkownika
	try{
		$db->beginTransaction();
		$statement = $db->prepare('DELETE FROM user WHERE id = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
		$statement->closeCursor();
        $db->commit();
	}catch(PDOException $e){
		$db->rollBack();
        echo $e->getMessage();
	}
	// usunięcie postów
	try{
		$db->beginTransaction();
		$statement = $db->prepare('DELETE FROM forum WHERE userID = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
		$statement->closeCursor();
        $db->commit();
	}catch(PDOException $e){
		$db->rollBack();
        echo $e->getMessage();
	}
	// usunięcie komentarzy
	try{
		$db->beginTransaction();
		$statement = $db->prepare('DELETE FROM comment WHERE userID = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
		$statement->closeCursor();
        $db->commit();
	}catch(PDOException $e){
		$db->rollBack();
        echo $e->getMessage();
	}
	// usunięcie przepisów
	try{
		$db->beginTransaction();
		$statement = $db->prepare('DELETE FROM recipe WHERE userID = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
		$statement->closeCursor();
        $db->commit();
	}catch(PDOException $e){
		$db->rollBack();
        echo $e->getMessage();
	}

    $_SESSION['action'] = 'users';
	header('location: index.php');
?>