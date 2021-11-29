<!DOCTYPE html>
<html>
<head>
    <title>Nie działa</title>
</head>
<body>
    <!-- trzeba zrobić osobny css do tego  -->
<div class = "inspiracje">
        <center> <h1><?php echo "$row[title]"; ?></h1> </center>
    <div class="inspiracjeSrodek">
        <div class="card-forum">
            <div class = "forumPic">
                <?php
                    echo "<h1>$row[title]</h1>";
                    if($row['picture'] != null){
                        echo "<img src=images/forum/$row[picture] width=200 height=200>";
                    }
                ?>
            </div>
                <div class="tresc">
                    <p><?php echo "$row[content]"; ?></p>
                    
                </div>
                <?php echo "<center><a href='/?action=forum'><input type='button' value='Komentarze'></a></center>"; ?>
        </div>
        
        <br>
        <?php
            /*foreach($query as $row){
                echo "<div class=card-forum>";
                    echo "<div class=forumPic>";
                        echo "<h1>$row[title]</h1>";
                        if($row['picture'] != null){
                            echo "<img src=images/forum/$row[picture] width=200 height=200>";
                        }
                    echo "</div>";  
                    echo "<div class=tresc>";
                        echo "<p>$row[content]</p>";
                    echo "</div>";
                    echo "<div class=tresc>";
                        echo "<div class=profilePic>";
                        if($row['photo'] == null){
                            echo "<img src=images/profile/stock.png width=50 height=50>";
                        }else{
                            echo "<img src=images/profile/$row[photo] width=50 height=50>";
                        }
                    
                        echo "<p>$row[nick]: $row[description]</p>";
                        echo "</div>";
                    echo "</div>";
                    
                    echo "<center><a href='/?action=post&id=$row[fID]'><input type='button' value='Komentarze'></a></center>";
            
                echo "</div>";
            }*/
        ?>
    </div>    
</div>

</body>
</html>

<!-- 
        <div class="card-forum">
            <div class = "obrazek">
                <h1>Krewetki</h1>
                <img src="https://www.mojegotowanie.pl/media/cache/default_view/uploads/media/recipe/0001/99/krewetki-na-ostro.jpeg" width="200" height="200">
            </div>
                <div class="tresc">
                    <p>Krewetki smażone na maśle z czosnkiem, 
                        natką i papryczką chili. Podlewane białym winem, podawane z bagietką. 
                        Najlepszy i najprostszy sposób na krewetki!</p>
                </div>
        </div>

 -->