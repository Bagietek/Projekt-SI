<!DOCTYPE html>
<html>
<head>
    <title>Wyszukiwanie</title>
</head>
<body>
<div class = "inspiracje">

        <?php 
        if(isset($_POST['szukaj'])){
            echo "<center> <h1>Wyszukanie: $_POST[szukaj]</h1> </center>";
        }

        ?>
    <div class="inspiracjeSrodek">
        
        <?php
            foreach($queryR as $row){
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

            foreach($queryF as $row){
                echo "<div class=card-forum>";
                    echo "<div class=forumPic>";
                        echo "<h1>$row[title]</h1>";
                        if($row['picture'] != null){
                            echo "<img src=images/forum/$row[picture] width=200 height=200>";
                        }
                    echo "</div>";  
                    echo "<div class=tresc>";
                        $cuttedString = substr($row['content'],0,30);//niewyświetlanie całej treści w podglądzie przepisów
                        $cuttedString = $cuttedString.'...';
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
