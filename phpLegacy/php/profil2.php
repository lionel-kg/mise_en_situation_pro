<?php
require_once('jeton.php');
require_once('../class/user.class.php');
session_start();

                                //version fichier

    $target_dir = $_SESSION['firstname'];
    $user = User::createFromId($_SESSION['id']);
    $img = '../userImage/'.$user->getImageName();
    if(isset($_FILES['image'])){
        
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
                    $img = '../userimage/'.$_SESSION['id'].$target_dir.'.'.$extensionUpload;
                    $user->setImageName($img);
                }
                //echo $extensionUpload.'<br>';
            }
            else
            {
                echo 'extension incorrect';
                header("location: formImage2.php?error=extension incorrect"); 
            }
        }
        else
        {
            echo 'votre photo de profil trop grande';
        }
        
    }

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
                                <img src=<?php echo $img ?> alt="" width="200px">
                                <div><a class='change-img' href='http://localhost/mise-en-situation-s.4/phpLegacy/php/formImage2.php'>changer de photo</a></div>
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