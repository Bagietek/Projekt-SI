<?php
    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}

    $id = $_GET['id'];

    $statement = $db->prepare('SELECT * FROM forum WHERE id=:id');
	$statement->bindValue(':id', $id, PDO::PARAM_INT);
	$statement->execute();
    $row = $statement->fetch();
    

    $statementUsers = $db->prepare('SELECT * FROM comment c INNER JOIN user u ON u.id=c.userID WHERE place="forum" AND postID=:id');
    $statementUsers->bindValue(':id', $id, PDO::PARAM_INT);
	$statementUsers->execute();
?>