<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Post</title>
</head>
<body>

<?php //funkcja do wyświetlania stringów
        function writeString($string) 
        {
            $words = explode('\n', $string);

            $maxLineLength = 50;

            $currentLength = 0;
            $index = 0;
            $output[$index] = null;
            foreach ($words as $word) 
            {
                $wordLength = strlen($word) + 1;
                if (($currentLength + $wordLength) <= $maxLineLength)
                {
                    $output[$index] .= $word . ' ';
                    $currentLength += $wordLength;
                } 
                else 
                {
                    $index += 1;
                    $currentLength = $wordLength;
                    $output[$index] = $word;
                }
            }
            foreach ($output as $line)
            {
                echo $line;
            }

        }

    ?>

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
                        echo "<h1>$creatorNick[nick]: ";
                        echo "$row[title]</h1>";
                        if($row['picture'] != null){
                            echo "<img src=images/forum/$row[picture] width=200 height=200>";
                        }
                    ?>
                </div>
                    <div class="tresc">
                        <p><?php writeString($row['content']); ?></p>
                        
                    </div>

                    <?php
                        // komentarze
                        if($statementUsers->rowCount() > 0){
                            echo "<h1>Komentarze</h1>";
                        }
                        
                        foreach($statementUsers as $rowK){
                            echo "<div class=tresc>";
                            echo $rowK['nick'].": ";
                            writeString($rowK['content']);
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

