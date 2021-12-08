<!DOCTYPE html>
<html>
<head>
    <title>Post</title>
</head>
<body>
<div class = "inspiracje-post">
        <center>  
        <?php
            if(isset($_SESSION['permission'])){
                if($_SESSION['permission'] == 'admin' || $_SESSION['permission'] == 'mod' || $row['userID'] == $_SESSION['logged']){
                    echo "<center><a href='/?action=deletepost&id=$row[id]&place=forum'><input type='button' class='deleteButton' value='Usuń post'></a></center>";
                }
            }
        ?>
        </center>
    <div class="inspiracjeSrodek-post">
        <center>
            <div class="card-post">
                <div class = "postPic">
                    <?php
                        echo "<h1>$row[title]</h1>";
                        if($row['picture'] != null){
                            echo "<img src=images/forum/$row[picture] width=200 height=200>";
                        }
                    ?>
                </div>
                    <div class="tresc">
                        <p><?php echo nl2br(chunk_split($row['content'], 50, "\r\n")); ?></p>
                        
                    </div>

                    <?php
                        // komentarze
                        if($statementUsers->rowCount() > 0){
                            echo "<h1>Komentarze</h1>";
                        }
                        
                        foreach($statementUsers as $rowK){
                            echo "<div class=tresc>";
                            echo "$rowK[content]";
                            echo "<br>";
                            if($rowK['photo'] != null){
                                echo "<img src=images/profile/$rowK[photo] width=50 height=50>";
                            }else{
                                echo "<img src=images/profile/stock.png width=50 height=50>";
                            }
                            if(isset($_SESSION['permission'])){
                                if($_SESSION['permission'] == 'admin' || $_SESSION['permission'] == 'mod' ||  $rowK['userID'] == $_SESSION['logged']){
                                    echo "<center><a href='/?action=deletecomment&id=$rowK[id]&idP=$id&place=forum'><input type='button' class='deleteButton' value='Usuń komentarz'></a></center>";
                                }
                            }
                            echo "</div>";
                        }
                    


                    
                    if(isset($_SESSION['logged'])){
                        echo "<center><a href='/?action=addcomment&type=forum&id=$row[id]'><input type='button' value='Dodaj komentarz'></a></center>"; 
                    }else{
                        echo "<center><a href='/?action=login'><input type='button' value='Zaloguj się aby dodać komentarz'></a></center>"; 
                    }
                    ?>
            </div>
        </center>
        
        <br>
        
    </div>    
    
</div>
        
</body>
</html>

