<?php 
require_once('jeton.php');

$nom = $_POST['firstname'];
$prenom = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
//var_dump($password);
$passwordEncode = sha1($password);

//var_dump($nom);
//var_dump($prenom);
//var_dump($email);
//var_dump($passwordEncode);

$req = MyPDO::getInstance()->prepare(<<<SQL
    select * 
    from  user 
    where email = :email
SQL
);
    $req->bindParam(':email',$email);
    $req->execute();
    if($req->rowCount() == 0){
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        INSERT INTO user(name,firstname,email,password) values (:nom, :prenom,:email, :password)
SQL
);
        $stmt->bindParam(':nom',$nom);
        $stmt->bindParam(':prenom',$prenom);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$passwordEncode);

        $stmt->execute();
        echo 'insertion effectuée';
        header("location: http://localhost/miseEnSituationS4/phpLegacy/connexion.html");
        exit();
    }
    echo 'cet email est deja utilisé';
    header("location: http://localhost/miseEnSituationS4/phpLegacy/inscription.html?error=email");
    exit();
