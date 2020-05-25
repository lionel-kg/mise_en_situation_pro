<?php 

session_start();

//echo $_SESSION['name'];
session_destroy();
header("location: http://localhost/mise-en-situation-s.4/phpLegacy/connexion.html?msg=deconnecté");
exit;

?>