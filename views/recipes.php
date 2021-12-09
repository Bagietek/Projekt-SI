<!DOCTYPE html>
<html>
<head>
    <title>Przepisy</title>
</head>
<body>
    <!-- CSS taki sam jak forum, nie ma potrzeby zmieniać -->
<div class = "inspiracje">
        <center> <h1>Przepisy</h1> </center>
        <?php 
        if(isset($_SESSION['permission'])){
            echo "<center><a href='/?action=addrecipe'><input class=card-forum type='button' value='Dodaj przepis'></a></center>";
        } 
        ?>
    <div class="inspiracjeSrodek">
        
        <?php
            foreach($query as $row){
                echo "<div class=card-forum>";
                    echo "<div class=forumPic>";
                        echo "<h1>$row[title]</h1>";
                        if($row['picture'] != null){
                            echo "<img src=images/recipes/$row[picture] width=200 height=200>";
                        }
                        echo "</div>";  
                        echo "<div class=tresc>";
                        $cuttedString = $row['content'];
                        if(strlen($cuttedString)>30)
                        {
                            $cuttedString = substr($row['content'],0,30);//niewyświetlanie całej treści w podglądzie przepisów
                            $cuttedString = $cuttedString.'...';
                        }

                        echo "<p>$cuttedString</p>";
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
                    
                    echo "<center><a href='/?action=recipe&id=$row[rID]'><input type='button' value='Zobacz więcej...'></a></center>";
            
                echo "</div>";
            }
        ?>
    </div>    
</div>
</body>
</html>
