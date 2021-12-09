<?php
    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}

	if(!isset($_GET['recipeID'])){
		header("location: index.php?action=recipes");
	}

    $id = $_GET['recipeID'];
	$picture = $_GET['picture'];
    //var_dump($id);
    try{
		$statement = $db->prepare('UPDATE recipe SET dayRecipe=0 WHERE dayRecipe=1');
		$statement->execute();
	}catch(PDOException $e){
		$db->rollBack();
        echo $e->getMessage();
	}

    try{
		$statement = $db->prepare('UPDATE recipe SET dayRecipe=1 WHERE id=:id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
	}catch(PDOException $e){
		$db->rollBack();
        echo $e->getMessage();
	}




    header("location:/index.php?action=recipe&id=$id");

?>