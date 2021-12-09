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
		header("location: index.php?action=forum");
	}

    $id = $_GET['id'];

    $statement = $db->prepare('SELECT * FROM forum WHERE id=:id');
	$statement->bindValue(':id', $id, PDO::PARAM_INT);
	$statement->execute();
    $row = $statement->fetch();
    
	$userID = $row['userID'];
	$creator = $db->prepare('SELECT nick FROM user WHERE id=:userid');
	$creator->bindValue(':userid', $userID, PDO::PARAM_INT);
	$creator->execute();
	$creatorNick = $creator->fetch();

    $statementUsers = $db->prepare('SELECT c.id AS id, c.content, u.photo, u.nick, u.id AS userID FROM comment c INNER JOIN user u ON u.id=c.userID WHERE place="forum" AND postID=:id');
    $statementUsers->bindValue(':id', $id, PDO::PARAM_INT);
	$statementUsers->execute();
?>