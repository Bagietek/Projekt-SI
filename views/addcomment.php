<html>
<body>

<?php echo "<form action=index.php?action=addcomment&id=$id&type=$place method=post>"; ?>

<div class="loginContainer">
    <center><h2 class="header">Dodaj komentarz</h2></center>
    <br>
    <div class="items">
	<div class="add-user-container">
        <label>Treść posta</label>
        <br>
        <textarea  name="content" rows="4" cols="50"></textarea>
		<br>
        <?php if($errors['addCommentEmpty']==1) echo '<br><p class="error-forum">Musisz wypełnić treść!</p>';?>
		<input type="submit" name="submit" value="Opublikuj">

        
	</div>
    </div>
</div>

</form>
</body>
</html>

