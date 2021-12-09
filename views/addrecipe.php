<html>
<body>

<form action="index.php?action=addrecipe" method="post" enctype="multipart/form-data">

<div class="loginContainer">
    <center><h2 class="header">Dodaj post</h2></center>
    <br>
    <div class="items">
	<div class="add-user-container">
        <label>Temat: </label>
        <br>
		<input type="text" name="topic" id="">
		<?php if($errors['addRecipeLenght']==1) echo '<br><p class="error-forum">Temat jest zbyt długi</p>';?>
		<br>
        <label>Treść przepisu</label>
        <br>
        <textarea  name="content" rows="4" cols="50"></textarea>
		<br>
        <br>
        <label>Zdjęcie: </label>    
        <br>
		<input type="file" name="imgUpload" accept="image/png/jpg/jpeg">
        <br>
        <?php if($errors['addRecipePhoto']==1) echo '<br><p class="error-forum">Błąd przesyłu zdjęcia, akceptowalne formaty /png/jpg/jpeg max 5MB!</p>';?>
        <br>
        <?php if($errors['addRecipeEmpty']==1) echo '<br><p class="error-forum">Musisz wypełnić temat oraz treść!</p>';?>
		<input type="submit" name="submit" value="Opublikuj">

        
	</div>
    </div>
</div>

</form>
</form>
</body>
</html>

