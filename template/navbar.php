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
        <a href="/?action=home"><input type="button" name = "glowna" value="Strona główna"></a>
        <input type="button" name = "przepisy" value="Przepisy">
        <input type="button" name = "forum" value="Forum">
        <?php
            if(isset($_SESSION['logged']))
                echo "<a href='/?action=logout'><input type='button' name = 'wyloguj' value='wyloguj'></a>";
            else
                echo "<a href='/?action=login'><input type='button' name = 'zaloguj' value='Zaloguj'></a>";
        ?>
        <input type="button" name = "oNas" value="O nas">
        
        <div class="wyszukaj">
            <input type="search" name="szukaj" placeholder="wyszukaj">
            <input type="button" name="szukajButton" value="szukaj">
        </div>
       
    </div>
</body>
</html>