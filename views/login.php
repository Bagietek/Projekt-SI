
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

<form action="index.php" method="post">
<div class="loginContainer">
    <h2 class="header">Zaloguj</h2>
    <div class="items">

        <input type="text" name="login">
        <p>Podaj nazwę użytkownika</p>
        <input type="password" name="password" placeholder="hasło...">
        <p>Podaj Hasło</p>
        <?php if(isset($_SESSION['error'])&&$_SESSION['error']==1) echo '<br><p style="color:red;">Zła nazwa użytkownika lub hasło!</p>';?>
        <input type="submit" name="submitlogin" value="zaloguj">
    </div>

    
    <a href=""><p>Nie masz konta?</p></a>
</div>

</form>
    
</body>
</html>