<?php 
session_start();


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>gestion d'image</title>
</head>
<body>
    <h1>gestion d'une image</h1>
    <form action='profil2.php' method="POST" enctype="multipart/form-data">
    <label>image :</label>
        <input type="file" name="image" id="image">
        <br>
        <input type="submit" value="valider">
    </form>
    <br>
    <div></div>
</body>

</html>
