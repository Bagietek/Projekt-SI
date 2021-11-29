<?php
    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}

    

    $query = $db->query('SELECT u.photo, u.id, u.nick, u.description, f.title, f.content, f.picture, f.id AS fID FROM forum f INNER JOIN user u ON f.userID=u.id');
    // query w taki sposób bo gryzło się u.id i f.id, tak samo photo ale tam zmieniłem nazwę w bazie
?>