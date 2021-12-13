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
    $perm = $_GET['type'];


	try{
		$statement = $db->prepare('UPDATE user SET permission=:perm WHERE id=:id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(':perm',$perm,PDO::PARAM_STR);
		$statement->execute();
	}catch(PDOException $e){
		$db->rollBack();
        echo $e->getMessage();
	}
	
    $_SESSION['action'] = 'users';
	header('location: index.php');
	exit;
?>