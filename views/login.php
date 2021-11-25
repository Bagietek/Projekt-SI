
<!DOCTYPE html>

<body>

<form action="index.php" method="post">
<div class="loginContainer">
    <h2 class="header">Zaloguj</h2>
    <div class="items">

        <input type="text" name="login">
        <p>Podaj nazwę użytkownika</p>
        <input type="password" name="password" placeholder="hasło...">
        <p>Podaj Hasło</p>
        <?php if(isset($_SESSION['loginerror'])&&$_SESSION['loginerror']==1) echo '<br><p style="color:red;">Zła nazwa użytkownika lub hasło!</p>';?>
        <input type="submit" name="submitlogin" value="zaloguj">
    </div>

    
    <a href="/?action=signup"><p>Zarejestruj się</p></a>
</div>

</form>
    
</body>
</html>