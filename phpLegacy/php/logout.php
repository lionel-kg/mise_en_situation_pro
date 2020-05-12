<?php 

session_start();

//echo $_SESSION['name'];
session_destroy();
header("location: http://localhost/miseEnSituationS4/phpLegacy/connexion.html?msg=deconnecté");
exit;

?>