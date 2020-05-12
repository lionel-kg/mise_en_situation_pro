<?php
require_once('jeton.php');
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
}
$passwordEncode = sha1($password);

$stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT id , name , firstname 
    FROM user
    where email = :email
    and password = :password
SQL
);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':password',$passwordEncode);
    $stmt->execute();
    $user = $stmt->fetch();
    

    if($stmt->rowCount() == 0){
        header("Location: http://localhost/miseEnSituationS4/phpLegacy/connexion.html?msg=saisieinvalide");
        exit();
    }
    else{
        echo 'vous etes connecté ';
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['email'] = $email;
        header("Location: http://localhost/miseEnSituationS4/phpLegacy/php/profil.php");
        exit();
        
        
    }
    
