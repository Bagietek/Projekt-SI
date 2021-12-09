<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css">
</head>
<body>
   
        

    <?php
        //if($page == 'login')
        //    require_once('views/'.$action.'_view.php');
      //  else
    ?>

    <div class = "witajka">
        <!-- Można coś dorobić np przepis dnia albo cuś -->
    </div>
    <?php echo"<a href='/?action=recipe&id=$recipeOfTheDay[id]'>"?>
    <div class= "container">
            <div class="middle">
            <div class="middleWhite">
                <h1>Przepis dnia</h1>
            </div>
            <div class="text">
            <p><?php echo $recipeOfTheDay['title']?></p>
            </div>
        </div>
    </a>

        <div class="right">
       <p>Najlepsze przepisy:</p>
                <ol id ="list">
                    <?php
                    foreach($query as $bestRecipe)
                    {
                        $cuttedString = $bestRecipe['title'];
                        if(strlen($cuttedString)>26)
                        {
                            $cuttedString = substr($bestRecipe['title'],0,26);
                            $cuttedString = $cuttedString.'...';
                        }

                        echo "<a href='/?action=recipe&id=$bestRecipe[id]'><li> <img src=images/recipes/$bestRecipe[picture]
                        width=70 height=70> <span>$cuttedString</span> </li></a>";
                    }
                    ?>
                </ol>

        </div>

    </div>

    <!-- <div class="opinieUzytkownikow">
        <div class="wrapper">
            <div class="slide">
                <div class="user">
                    <img src="" alt="">
                </div>
                    <div class="uzytkownikInfo">
                        <h3>Mariusz Pudzianowski</h3>
                    </div>

            </div>
        </div>
    </div> -->



    

</body>
</html>