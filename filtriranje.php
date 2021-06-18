<?php 

header("Content-type:application/json");


include "php/funkcije.php";


$kategoriju=$_POST["kategorijaP"];

$kategorije="";



    try{ 

        //var_dump($kategoriju);
        

        if($kategoriju=="all"){

    

       $kategorije= ispisfiltsve();
         
       
          echo json_encode($kategorije);
         
            
       
           
            
          
        }

        else {

            $kategorije=ispisfilt($kategoriju);
          echo  json_encode($kategorije);
          

        }

      

    

    }

    catch(PDOExceptiom $e){

        echo $e->getMessage();
    }

    




?>