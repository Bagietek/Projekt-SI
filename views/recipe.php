<!DOCTYPE html>
<html>
<head>
    <title>Przepis</title>
</head>
<body>
    <!-- CSS taki sam jak post -->
<div class = "inspiracje-post">
        <center>  
        <?php
            if(isset($_SESSION['permission'])){
                if($_SESSION['permission'] == 'admin' || $_SESSION['permission'] == 'mod' || $row['userID'] == $_SESSION['logged']){
                    echo "<center><a href='/?action=deletepost&id=$row[id]&place=recipe'><input type='button' class='deleteButton' value='Usuń przepis'></a></center>";
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
                        if(isset($_SESSION['logged']))
                        {
                            
                            if(isset($statementLikes) && $statementLikes->rowCount() == 0 && isset($_SESSION['logged']))
                            {
                                echo "<a href='/?action=like&recpieID=$id&wtd=like'><input type='button' name = 'like' value='Lubię ten przepis'></a>";
                            }
                            elseif(isset($statementLikes) && $statementLikes->rowCount() == 1 && isset($_SESSION['logged']))
                            {
                                echo "<a href='/?action=like&recpieID=$id&wtd=dislike'><input type='button' name = 'dislike' value='Nie lubię tego przepisu'></a>";
                            }
                            if(($_SESSION['permission'] == 'admin' || $_SESSION['permission'] == 'mod')&&$row['dayRecipe'] == 0 && isset($_SESSION['logged'])&&($_SESSION['permission'] == 'admin')||($_SESSION['permission'] == 'mod'))
                            {
                                $picture = $row['picture'];
                                echo "<a href='/?action=recipeOfTheDay&recipeID=$id&picture=$picture'><input type='button' name = 'recipeOfTheDay' value='Ustaw jako przepis dnia'></a>";
                            }  
                        }
            


                        
                        if($row['picture'] != null)
                        {
                            echo "<img src=images/recipes/$row[picture] width=200 height=200>";
                        }
                    ?>
                </div>
                    <div class="tresc">
                        <p><?php 
                            echo nl2br(chunk_split($row['content'], 50, "\r\n"));//przedzielenie stringa znakami nowej linii
                        ?></p>
                        
                    </div>

                    <?php
                        // komentarze
                        if($statementUsers->rowCount() > 0){
                            echo "<h1>Komentarze</h1>";
                        }
                        
                        foreach($statementUsers as $rowK){
                            echo "<div class=tresc>";
                            echo nl2br(chunk_split($rowK['content'], 50, "\r\n"));
                            echo "<br>";
                            if($rowK['photo'] != null){
                                echo "<img src=images/profile/$rowK[photo] width=50 height=50>";
                            }else{
                                echo "<img src=images/profile/stock.png width=50 height=50>";
                            }
                            if(isset($_SESSION['permission'])){
                                if($_SESSION['permission'] == 'admin' || $_SESSION['permission'] == 'mod' ||  $rowK['userID'] == $_SESSION['logged']){
                                    echo "<center><a href='/?action=deletecomment&id=$rowK[id]&idP=$id&place=recipe'><input type='button' class='deleteButton' value='Usuń komentarz'></a></center>";
                                }
                            }
                            echo "</div>";
                        }
                    


                    
                    if(isset($_SESSION['logged'])){
                        echo "<center><a href='/?action=addcomment&type=recipe&id=$row[id]'><input type='button' value='Dodaj komentarz'></a></center>"; 
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

