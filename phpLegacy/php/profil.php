<?php
require_once('jeton.php');
require_once('../class/user.class.php');
session_start();
/*$stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT image 
    from user
SQL
);

$stmt->execute();
$tab = $stmt->fetchAll();
var_dump($tab);
*/
//$user = User::createFromId($id);
//var_dump($user->getName());
//var_dump($user->getFirstName());


//var_dump($img);
/*if(isset($_FILES['image'])){
    $imgAtc = $_FILES['image'];
    
    $target_file = $target_dir.'.'.strtolower(substr(strchr($imgAtc['name'],'.'),1));
    $user->setImage($target_file);
    $img = '../userImage/'.$user->getImage();
    if (move_uploaded_file($imgAtc['tmp_name'],'../userImage/'.$target_file)){
        //echo "The file ". basename( $imgAtc["name"]). " has been uploaded.";
}
}*/

/*$imgAtc = $_FILES['image'];
$user = User::createFromId($_SESSION['id']);

$target_file = $target_dir.'.'.strtolower(substr(strchr($imgAtc['name'],'.'),1));
$user->setImage($_SESSION['firstname'].'.'.strtolower(substr(strchr($imgAtc['name'],'.'),1)));
$img = $user->getImage();
var_dump($img);
if (move_uploaded_file($imgAtc['tmp_name'],$target_file)){
    echo "The file ". basename( $imgAtc["name"]). " has been uploaded.";
}*/

//$user->setImage($imgAtc);
//$img = $user->getImage();
//if(isset($img) and !empty($img['name'])){
   

                                //version fichier
    /*
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

                                    // version bd

    /*if(isset($_FILES['image'])){
        $tailleMax = 2097152;
        $extensionsValides = array('jpg','jpeg','gif','png');
        //var_dump($_FILES['image']);
        $imgAtc = $_FILES['image'];
        if($imgAtc['size'] <= $tailleMax ){
            $extensionUpload = strtolower(substr(strchr($imgAtc['name'],'.'),1));
            if(in_array($extensionUpload,$extensionsValides))
            {
                $target_file = $_SESSION['id'].$target_dir.'.'.strtolower(substr(strchr($imgAtc['name'],'.'),1));
                $user->setImage(file_get_contents($_FILES['image']['tmp_name']));
                $img = $user->getImage();
                header("Content-type: image/jpg"); 
                    echo $img;
                    
            }
                //echo $extensionUpload.'<br>';
            }
            else
            {
                header("location: http://localhost/miseEnSituationS4/phpLegacy/php/formImage.php"); 
            }
        }
        else
        {
            echo 'votre photo de profil trop grande';
        }
        */
    
    
    /*$tailleMax = 2097152;
    $extensionsValides = array('jpg','jpeg','gif','png');
    if($img['size'] <= $tailleMax ){
        
    }
    else{
        echo 'votre photo de profil trop grande';
    }
    $extensionUpload = strtolower(substr(strchr($img['name'],'.'),1));
    if(in_array($extensionUpload,$extensionsValides))
    {
        
        echo $extensionUpload.'<br>';
    }
    else{
        echo 'extension invalide <br>';
    }*/
    //$user->setImage($_FILES['image']);
//}
//var_dump($user);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/profil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    <meta charset="utf-8">
    <title>gestion d'image</title>
</head>
<body>
    <div class="container">
            <div class="card col-6 ml-5">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title m-auto">Mon profil</h5>
                    </div>
                    <div class="column col-12">
                        <div class="column col-md-12">
                            <div class="img-profil column col-6 mt-2">
                                <img src='imageview.php' alt="" width="170px" height="200px">
                                
                                <div><a class='change-img' href='formImage.php'>changer de photo</a></div>
                            </div>
                            <div class="column col-6 mt-2">
                                <div>
                                    <label>nom:</label>  <span><?php echo $_SESSION['firstname'];?></span> 
                                </div>
                                <div>
                                    <label>prenom:</label> <span><?php echo $_SESSION['name'];?></span>
                                </div>
                                <div>
                                    <label>age:</label> <span>18 ans</span>
                                </div>
                                <div>
                                    <label>ranked:</label> <span>gold III</span>
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    </div><div class="btn-deco"><a class="button" href="http://localhost/mise-en-situation-s.4/phpLegacy/php/logout.php">deconnexion</a></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>