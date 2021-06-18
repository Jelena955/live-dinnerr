<?php  


unset($_SESSION['uloga']);
unset($_SESSION['korisnik']);
unset($_SESSION['ime']);
unset($_SESSION['mejl']);
unset($_SESSION['status']);

header("Location: index.php");


?>