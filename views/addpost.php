<html>
<body>

<form action="index.php?addpost" method="post" enctype="multipart/form-data">

<div class="loginContainer">
    <center><h2 class="header">Dodaj post</h2></center>
    <br>
    <div class="items">
	<div class="add-user-container">
        <label>Temat: </label>
        <br>
		<input type="text" name="topic" id="">
		<?php if($errors['addPostLenght']==1) echo '<br><p class="error-forum">Temat jest zbyt długi</p>';?>
		<br>
        <label>Treść posta</label>
        <br>
        <textarea  name="content" rows="4" cols="50"></textarea>
		<br>
        <br>
        <label>Zdjęcie: </label>    
        <br>
		<input type="file" name="imgUpload" accept="image/png">
        <br>
        <?php if($errors['addPostPhoto']==1) echo '<br><p class="error-forum">Błąd przesyłu zdjęcia, akceptowalny format PNG max 5MB!</p>';?>
        <br>
        <?php if($errors['addPostEmpty']==1) echo '<br><p class="error-forum">Musisz wypełnić temat oraz treść!</p>';?>
		<input type="submit" name="submit" value="Opublikuj">

        
	</div>
    </div>
</div>

</form>
</form>
</body>
</html>

