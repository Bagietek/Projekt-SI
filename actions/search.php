<?php
    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}

    $query = null;
    if(isset($_POST['szukaj'])){
        $term = $_POST['szukaj'];
        $place = 'all';
        if(str_starts_with($term,"forum:")){ // tylko forum
            $place = 'forum';
        }else if(str_starts_with($term,"recipe:")){ // tylko przepisy
            $place = 'recipe';
        }

        if($place = 'all'){
            $query = $db->query('SELECT u.photo, u.id, u.nick, u.description, f.title, f.content, f.picture, f.id AS fID FROM forum f INNER JOIN user u ON f.userID=u.id');
        }else{
            $query = $db->query('SELECT u.photo, u.id, u.nick, u.description, f.title, f.content, f.picture, f.id AS fID FROM forum f INNER JOIN user u ON f.userID=u.id');
        }
    }


    header('location: index.php?action=home');

    

    
    
?>