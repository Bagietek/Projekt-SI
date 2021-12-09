<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="index.php" method="post" enctype="multipart/form-data">
<div class="loginContainer">
    <h2 class="header">Edytuj dane</h2>
    <div class="items">

    <input type="text" name="nick" id="" value = <?php echo $data['nick'];?>>
		<p>Nick: </p>
		
		<input type="password" name="password" id="">
        <p>Hasło: </p>

        <input type="password" name="password1" id="">
        <p>Powtórz Hasło: </p>
        <?php if(isset($_SESSION['editAccountNotEqualError'])&&$_SESSION['editAccountNotEqualError']==1) echo '<br><p style="color:red;">Podano różne hasła!</p>';?>
		
		<input type="email" name="email" id="" value = <?php echo $data['email'];?>>
        <p>Email: </p>
        <br>
        <?php if(isset($_SESSION['editAccountEmptyError'])&&$_SESSION['editAccountEmptyError']==1) echo '<br><p style="color:red;">Wypełnij wszystkie pola!</p>';?>

        <textarea  name="description" rows="4" cols="50" ><?php echo $data['description']?></textarea>
		<br>
        <label>Zdjęcie: </label>
        <input type="file" name="imgUpload" accept="image/png/jpg/jpeg">
        
        <br>
		<input type="submit" name="submit" value="Zatwierdź">
    </div>
</form>

</body>