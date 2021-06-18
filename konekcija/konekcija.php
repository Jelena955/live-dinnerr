<?php
include("podaci.php");
$konekcija=new PDO("mysql:host=$serverBaze; dbname=$imeBaze",$username,$password);
//echo "Uspesna konekcija";
$konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);