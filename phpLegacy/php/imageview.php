<?php 
require_once('jeton.php');
require_once('../class/user.class.php');
session_start();


$user = User::createFromId($_SESSION['id']);
$img = $user->getImage();

echo $img; 
?>