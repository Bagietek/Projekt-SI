<?php
        
try 
{
    $db = new PDO('mysql:host=localhost;dbname=siproj', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} 
catch (PDOException $e) 
{
    echo 'Błąd: '.$e->getMessage();
}

$errors = array();
$validation = false;
$name = null; // nazwa pliku, jesli nie został przesłany 
$errors['addPostEmpty'] = 0;
$errors['addPostLenght'] = 0;
$errors['addPostPhoto'] = 0;

if(isset($_POST['submit'])){
    if($_POST['content']!=null && $_POST['topic']!=null){
        $topic = $_POST['topic'];
        $content = $_POST['content'];
        if(strlen($topic)>32){ // max 32 w bazie, można zmienić
            $errors['addPostLenght'] = 1;
        }else{
            // image check
            if(isset($_FILES['imgUpload']['tmp_name'])){
                if(is_uploaded_file($_FILES['imgUpload']['tmp_name'])){
                
                    $max = 500000 * 10; // ~5 MB max
                    $size = $_FILES['imgUpload']['size'];
                    $temp_name = $_FILES['imgUpload']['tmp_name'];
                    
                    // poprawnione nadawanie nazwy pliku na podstawie sumy kontrolnej sha1
                    $type = $_FILES['imgUpload']['type']; // wypluwa .image/png naprawione niżej
                    $type = '.'. substr($type,6); // 6 = .image/
                    $name = sha1_file($_FILES['imgUpload']['tmp_name'],false); // obliczanie sumy kontrolnej
                    $name .= $type;
                    $destination = './images/forum/'.$name;
                    if(!file_exists($destination)){ // sprawdzenie czy takie samo zdjęcie nie znajduje się już na dysku
                        if($size <= 0){
                            $errors['addPostPhoto'] = 1;
                        }elseif($size > $max){
                            $errors['addPostPhoto'] = 1;
                        }else{
                            if(!move_uploaded_file($temp_name,$destination)){
                                $errors['addPostPhoto'] = 1;
                            }
                        }
                    }
                    
                }
            }
            // zapis do bazy
            try{
                $db->beginTransaction();
                $stmt = $db->prepare('INSERT INTO forum (userID,title,picture,content) VAlUES (:id,:topic,:picture,:content)');
                $stmt->bindValue(':id',$_SESSION['logged'],PDO::PARAM_INT);
                $stmt->bindValue(':topic',$topic,PDO::PARAM_STR);
                $stmt->bindValue(':picture',$name,PDO::PARAM_STR);
                $stmt->bindValue(':content',$content,PDO::PARAM_STR);
                $stmt->execute();
                $stmt->closeCursor();
                $db->commit();
            }catch(PDOException $e){
                $db->rollBack();
                echo "Błąd: ".$e->getMessage();  
            }
            $validation = true;
        }
    }else{
        $errors['addPostEmpty'] = 1;
    }
}else{
    $errors['addPostEmpty'] = 1;
}

// zabezpieczenie przed odsiwezaniem strony here
if($validation){
    header("Refresh: 0; URL = /index.php?action=forum");
}


?>