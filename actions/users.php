<?php

    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}
    $query = $db->query('SELECT * FROM user');
    $users = $query->fetchAll();
?>