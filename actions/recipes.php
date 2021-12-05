<?php
    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}

    

    $query = $db->query('SELECT u.photo, u.id, u.nick, u.description, r.title, r.content, r.picture, r.id AS rID FROM recipe r INNER JOIN user u ON r.userID=u.id');
    // query w taki sposób bo gryzło się u.id i r.id
?>