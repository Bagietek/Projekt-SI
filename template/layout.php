<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
   
    
    <div class="navbar">
        <input type="button" name = "przepisy" value="Przepisy">
        <input type="button" name = "forum" value="Forum">
        <a href="/?action=login"><input type="button" name = "zaloguj" value="Zaloguj"></a>
        <input type="button" name = "oNas" value="O nas">
        
        <div class="wyszukaj">
            <input type="search" name="szukaj" placeholder="wyszukaj">
            <input type="button" name="szukajButton" value="szukaj">
        </div>
       
    </div>

    <?php
        //if($page == 'login')
        //    require_once('views/'.$action.'_view.php');
      //  else
    ?>

    <div class = "witajka">
        <!-- Można coś dorobić np przepis dnia albo cuś -->
    </div>

    <div class= "container">
            <div class="middle">
            <div class="middleWhite">
                <h1>Przepis dnia</h1>
            </div>
            <div class="text">
                <p>Pieczony marynowany kurczak z ziemiaczkami i warzywami</p>
            </div>
        </div>
    

        <div class="right">
        <center><p>Najlepsze przepisy</p> </center>
                <ol id ="list">
                    <a href=""><li> <img src="https://cdn.galleries.smcloud.net/t/galleries/gf-5Egg-wV4M-Mn49_pieczona-kaczka-marynowana-w-piwie-nowy-rewelacyjny-przepis-na-kaczke-po-pekinsku-664x442-nocrop.jpg"
                     width="70" height="70"> <span>Placki ziemniaczne</span> </li></a>
                    
                    <a href=""> <li> <img src="https://cdn.galleries.smcloud.net/t/galleries/gf-5Egg-wV4M-Mn49_pieczona-kaczka-marynowana-w-piwie-nowy-rewelacyjny-przepis-na-kaczke-po-pekinsku-664x442-nocrop.jpg"
                     width="70" height="70"> <span>Rosołek</span> </li> </a>
                    
                     <a href=""><li><img src="https://cdn.galleries.smcloud.net/t/galleries/gf-5Egg-wV4M-Mn49_pieczona-kaczka-marynowana-w-piwie-nowy-rewelacyjny-przepis-na-kaczke-po-pekinsku-664x442-nocrop.jpg"
                     width="70" height="70"> <span>Marchewka Marynowana<span></li> </a>

                     <a href=""><li> <img src="https://cdn.galleries.smcloud.net/t/galleries/gf-5Egg-wV4M-Mn49_pieczona-kaczka-marynowana-w-piwie-nowy-rewelacyjny-przepis-na-kaczke-po-pekinsku-664x442-nocrop.jpg"
                     width="70" height="70"> <span>Placki ziemniaczne</span> </li></a>

                     <a href=""><li> <img src="https://cdn.galleries.smcloud.net/t/galleries/gf-5Egg-wV4M-Mn49_pieczona-kaczka-marynowana-w-piwie-nowy-rewelacyjny-przepis-na-kaczke-po-pekinsku-664x442-nocrop.jpg"
                     width="70" height="70"> <span>Placki ziemniaczne</span> </li></a>
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

    <div class = "inspiracje">
        <center> <h1>Inspiracje</h1> </center>
    <div class="inspiracjeSrodek">
        <div class="card card-1">
            <div class = "obrazek">
                <h1>Krewetki</h1>
                <img src="https://www.mojegotowanie.pl/media/cache/default_view/uploads/media/recipe/0001/99/krewetki-na-ostro.jpeg">
            </div>
                <div class="tresc">
                    <p>Krewetki smażone na maśle z czosnkiem, 
                        natką i papryczką chili. Podlewane białym winem, podawane z bagietką. 
                        Najlepszy i najprostszy sposób na krewetki!</p>
                </div>
        </div>

        <div class="card">
            <div class = "obrazek">
                <h1>Krewetki</h1>
                <img src="https://www.mojegotowanie.pl/media/cache/default_view/uploads/media/recipe/0001/99/krewetki-na-ostro.jpeg" alt="">
            </div>
                <div class="tresc">
                    <p>Krewetki smażone na maśle z czosnkiem, 
                        natką i papryczką chili. Podlewane białym winem, podawane z bagietką. 
                        Najlepszy i najprostszy sposób na krewetki!</p>
                </div>
        </div>

        <div class="card">
            <div class = "obrazek">
                <h1>Krewetki</h1>
                <img src="https://www.mojegotowanie.pl/media/cache/default_view/uploads/media/recipe/0001/99/krewetki-na-ostro.jpeg" alt="">
            </div>
                <div class="tresc">
                    <p>Krewetki smażone na maśle z czosnkiem, 
                        natką i papryczką chili. Podlewane białym winem, podawane z bagietką. 
                        Najlepszy i najprostszy sposób na krewetki!</p>
                </div>
        </div>

        <div class="card">
            <div class = "obrazek">
                <h1>Krewetki</h1>
                <img src="https://www.mojegotowanie.pl/media/cache/default_view/uploads/media/recipe/0001/99/krewetki-na-ostro.jpeg" alt="">
            </div>
                <div class="tresc">
                    <p>Krewetki smażone na maśle z czosnkiem, 
                        natką i papryczką chili. Podlewane białym winem, podawane z bagietką. 
                        Najlepszy i najprostszy sposób na krewetki!
                        Krewetki smażone na maśle z czosnkiem, 
                        natką i papryczką chili. Podlewane białym winem, podawane z bagietką. 
                        Najlepszy i najprostszy sposób na krewetki!</p>
                </div>
        </div>

        <div class="card">
            <div class = "obrazek">
                <h1>Krewetki</h1>
                <img src="https://www.mojegotowanie.pl/media/cache/default_view/uploads/media/recipe/0001/99/krewetki-na-ostro.jpeg" alt="">
            </div>
                <div class="tresc">
                    <p>Krewetki smażone na maśle z czosnkiem, 
                        natką i papryczką chili. Podlewane białym winem, podawane z bagietką. 
                        Najlepszy i najprostszy sposób na krewetki!</p>
                </div>
        </div>
    </div>    
    </div>


    

</body>
</html>