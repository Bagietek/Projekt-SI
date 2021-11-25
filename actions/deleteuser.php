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
	$statement = $db->prepare('DELETE FROM user WHERE id = :id');
	$statement->bindValue(':id', $id, PDO::PARAM_INT);
	$statement->execute();
    $_SESSION['action'] = 'users';
	header('location: index.php');
?>