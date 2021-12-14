<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class = "inspiracje">
        <?php
            if(isset($_GET['search'])){
                echo "<center> <h1>Forum wyszukanie: $_GET[search]</h1> </center>";
            }else{
                echo "<center> <h1>Forum</h1> </center>";
            }

            if(isset($_SESSION['permission'])){
                echo "<center><a href='/?action=addpost'><input class=card-forum type='button' value='Dodaj post'></a></center>";
            } 
        ?>
        <br>
    <div class="inspiracjeSrodek">
        <?php
            foreach($query as $row){
                echo "<div class=card-forum>";
                    echo "<div class=forumPic>";
                        echo "<h1>$row[title]</h1>";
                        if($row['picture'] != null){
                            echo "<img src=images/forum/$row[picture] width=200 height=200>";
                        }
                    echo "</div>";  
                    echo "<div class=tresc>";
                    $cuttedString = $row['content'];
                        if(strlen($cuttedString)>30)
                        {
                            $cuttedString = substr( $cuttedString,0,30);//niewyświetlanie całej treści w podglądzie przepisów
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
                    
                    echo "<center><a href='/?action=post&id=$row[fID]'><input type='button' value='Zobacz więcej...'></a></center>";
            
                echo "</div>";
            }
        ?>
    </div>    
</div>
</body>
</html>
