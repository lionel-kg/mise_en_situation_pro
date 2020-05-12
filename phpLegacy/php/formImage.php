<?php 
session_start();
require_once('jeton.php');
require_once('../class/user.class.php');

if(isset($_FILES['image'])){
    $imgAtc = $_FILES['image'];
    var_dump($imgAtc);
    $user = User::createFromId($_SESSION['id']);
    $extensionUpload = strtolower(substr(strchr($imgAtc['username'],'.'),1));
    $user->setImage(file_get_contents($_FILES['image']['tmp_name']));

    header('location: profil.php');
}
/*
                                //version fichier

    $target_dir = $_SESSION['firstname'];
    $user = User::createFromId($_SESSION['id']);
    $img = '../userimage/'.$_SESSION['id'].$target_dir;
    if(isset($_FILES['image'])){
        var_dump($_FILES['image']);
        $tailleMax = 2097152;
        $extensionsValides = array('jpg','jpeg','gif','png');
        $imgAtc = $_FILES['image'];
        if($imgAtc['size'] <= $tailleMax ){
            $extensionUpload = strtolower(substr(strchr($imgAtc['name'],'.'),1));
            if(in_array($extensionUpload,$extensionsValides))
            {
                $target_file = $_SESSION['id'].$target_dir.'.'.strtolower(substr(strchr($imgAtc['name'],'.'),1));
                if (move_uploaded_file($imgAtc['tmp_name'],'../userimage/'.$target_file)){
                    echo "The file ". basename( $imgAtc["name"]). " has been uploaded.";
                    $img = '../userimage/'.$_SESSION['id'].$target_dir;
                    var_dump($img);
                }
                //echo $extensionUpload.'<br>';
            }
            else
            {
                echo 'extension incorrect';
                header("location: http://localhost/miseEnSituationS4/phpLegacy/php/formImage.php"); 
            }
        }
        else
        {
            echo 'votre photo de profil trop grande';
        }
        
    }
*/



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>gestion d'image</title>
</head>
<body>
    <h1>gestion d'une image</h1>
    <form action='' method="POST" enctype="multipart/form-data">
    <label>image :</label>
        <input type="file" name="image" id="image">
        <br>
        <input type="submit" value="valider">
    </form>
    <br>
    <div></div>
</body>

</html>
