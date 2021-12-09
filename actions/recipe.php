<?php
    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}

	if(!isset($_GET['id'])){
		header("location: index.php?action=recipes");
	}

    $id = $_GET['id'];

    $statement = $db->prepare('SELECT * FROM recipe WHERE id=:id');
	$statement->bindValue(':id', $id, PDO::PARAM_INT);
	$statement->execute();
    $row = $statement->fetch();
    

    $statementUsers = $db->prepare('SELECT c.id AS id, c.content, u.photo, u.id AS userID FROM comment c INNER JOIN user u ON u.id=c.userID WHERE place="recipe" AND postID=:id');
    $statementUsers->bindValue(':id', $id, PDO::PARAM_INT);
	$statementUsers->execute();
	if(isset($_SESSION['logged']))
	{
		$statementLikes = $db->prepare('SELECT * FROM likes WHERE userID = :logged AND recipeID = :id');
		$statementLikes->bindValue(':id', $id, PDO::PARAM_INT);
		$statementLikes->bindValue(':logged', $_SESSION['logged'], PDO::PARAM_INT);
		$statementLikes->execute();
	}
	
?>