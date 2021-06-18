<?php
session_start();
//Ako je kliknuto na dugme za login
 if(isset($_SESSION["uloga"])) {
//Ako je verifikovan mejl
   if($_SESSION['status']==1){ 
//Ako je admin
      if($_SESSION["uloga"]=="1") {


 
         header('Location:admin/template/pages/tables/basic-table.php');
         }
         //Ako je korisnik
         else if($_SESSION['uloga']=="2") {
        
            //$korisnik=$_SESSION["korisnik"];
         
         //var_dump($korisnik);
        
         include('korisnik.php');
         } 




   }

   else{

     //Ako nije verifikovan mejl
      unset($_SESSION['uloga']);
unset($_SESSION['korisnik']);
unset($_SESSION['ime']);
unset($_SESSION['mejl']);
unset($_SESSION['status']);
   }



}
else{
   echo "Neiste verifikovali mejl.<br>";

   echo "Nemate pravo pristupa ovoj stranici jer niste ulogovani.<br>
 <a href='index.php'>Logovanje</a>"; 

}




?>

