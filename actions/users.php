<?php

    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}
    $query = $db->query('SELECT id,login,nick,email,permission FROM user');
    $users = $query->fetchAll();
?>