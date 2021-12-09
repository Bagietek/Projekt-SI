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
        <a href="/?action=home"><input type="button" name = "home" value="Strona główna"></a>
        <a href="/?action=recipes"><input type="button" name = "recipes" value="Przepisy"></a>
        <a href="/?action=forum"><input type="button" name = "forum" value="Forum"></a>
        <?php
            if(isset($_SESSION['logged']))
            {
                echo "<a href='/?action=logout'><input type='button' name = 'logout' value='Wyloguj'></a>";
                echo "<a href='/?action=editAccount'><input type='button' name = 'editAccount' value='Edytuj dane konta'></a>";
            }
            else
                echo "<a href='/?action=login'><input type='button' name = 'login' value='Zaloguj'></a>";
        ?>
        <a href="/?action=aboutus"><input type="button" name = "aboutus" value="O nas"></a>
        <?php
            if(isset($_SESSION['logged'])&&$_SESSION['permission']=='admin')
            echo "<a href='/?action=users'><input type='button' name = 'users' value='Użytkownicy'></a>";
        ?>
        
        <!-- funkcjonalność search, css nie styka usunąć form do powrotu poprzedniego wyglądu -->

        <form action='index.php?action=search' method='post'>
            <div class="wyszukaj">
                <input type="search" name="szukaj" placeholder="Wyszukaj">
                <input type="button" name="szukajButton" value="Szukaj">
            </div>
        </form>
       
    </div>
</body>
</html>