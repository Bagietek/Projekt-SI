<?php
    try 
	{
		$db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) 
	{
		echo 'Błąd: '.$e->getMessage();
	}

    $place = null;
    $order = array();
    $term = $_POST['szukaj'];
    if(strpos($term,'order:score') !== 'false'){
        $order['score'] = true;
        $term = str_replace("order:score","",$term); // wyrzucenie z zapytania
    }
    if(isset($_POST['szukaj'])){
        if(str_starts_with($term,"forum:")){ // tylko forum
            $place = 'forum';
            $term = str_replace("forum:","",$term);
        }else if(str_starts_with($term,"recipe:")){ // tylko przepisy
            $place = 'recipe';
            $term = str_replace("recipe:","",$term);
        }else{
            $place = 'all';
        }
    }

    if($place == 'forum'){
        header('location: index.php?action=forum&search='.$term);
    }else if($place == 'recipe'){
        if(isset($order['score'])){
            header('location: index.php?action=recipes&search='.$term.'&order=score');
        }else{
            header('location: index.php?action=recipes&search='.$term);
        }
        
    }else if($place == null){
        header('location: index.php?action=home');
    }

    if(isset($order['score'])){
        $queryR = $db->prepare('SELECT u.photo, u.id, u.nick, u.description, r.title, r.content, r.picture, r.likes, r.id AS rID FROM recipe r INNER JOIN user u ON r.userID=u.id WHERE r.title LIKE :search OR r.content LIKE :search ORDER BY r.likes DESC');
    }else{
        $queryR = $db->prepare('SELECT u.photo, u.id, u.nick, u.description, r.title, r.content, r.picture, r.id AS rID FROM recipe r INNER JOIN user u ON r.userID=u.id WHERE r.title LIKE :search OR r.content LIKE :search');
    }
    $queryR->bindValue(':search', "%$term%", PDO::PARAM_STR);
    $queryR->execute();
    $queryF = $db->prepare('SELECT u.photo, u.id, u.nick, u.description, f.title, f.content, f.picture, f.id AS fID FROM forum f INNER JOIN user u ON f.userID=u.id WHERE f.title LIKE :search OR f.content LIKE :search');
    $queryF->bindValue(':search', "%$term%", PDO::PARAM_STR);
    $queryF->execute();
?>