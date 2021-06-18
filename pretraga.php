<?php 


header("Content-type:application/json");


include "php/funkcije.php";
include "konekcija/konekcija.php";


$vrednostt=$_POST["vrednostP"];
//$vrrednost=strlower($vrednostt);
$vrednosti="";

$vrednost=strtolower($vrednostt);

try{

    $vrednosti=pretrazi($vrednost);
  echo  json_encode($vrednosti);
    

}

catch(PDOExceptiom $e){

    echo $e->getMessage();
}

?>