<html>
<body>

<form action="index.php" method="post">

<div class="loginContainer">
    <h2 class="header">Zarejestruj się</h2>
    <div class="items">
	<div class="add-user-container">

		<input type="text" name="login" id="">
		<p>Login: </p>
        <?php if(isset($_SESSION['signUpExistError'])&&$_SESSION['signUpExistError']==1) echo '<br><p style="color:red;">Konto o podanym loginie już istnieje!</p>';?>
		
		<input type="password" name="password" id="">
        <p>Hasło: </p>

        <input type="password" name="password1" id="">
        <p>Powtórz Hasło: </p>
        <?php if(isset($_SESSION['signUpNotEqualError'])&&$_SESSION['signUpNotEqualError']==1) echo '<br><p style="color:red;">Podano różne hasła!</p>';?>
		
		<input type="email" name="email" id="">
        <p>Email: </p>
        <br>
        <?php if(isset($_SESSION['signUpEmptyError'])&&$_SESSION['signUpEmptyError']==1) echo '<br><p style="color:red;">Wypełnij wszystkie pola!</p>';?>
		<input type="submit" name="submit" value="Zarejestruj się">

        <a href="/?action=login"><p>Powrót do logowania</p></a>
	</div>
    </div>
</div>

</form>
</form>
</body>
</html>

