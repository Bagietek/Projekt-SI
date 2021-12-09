<?php
    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}

    
    $stmt = $db->query("SELECT title, picture, id FROM recipe WHERE dayRecipe = 1");
    $stmt->execute();
    $recipeOfTheDay = $stmt->fetch();
    $query = $db->query("SELECT title, picture, id, likes FROM recipe ORDER BY likes DESC");
    $stmt->execute();
?>