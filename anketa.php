<?php
session_start();
include "konekcija/konekcija.php";
if(isset($_POST["idodgovorP"])){

    $idodgovor=$_POST["idodgovorP"];
    $idkorisnik=$_SESSION["korisnik"];
    
   $idkorisnikk= (int) $idkorisnik;
    $idodgovorr=(int) $idodgovor;
    var_dump($idodgovorr);
    var_dump($idkorisnikk);

    if($konekcija){

        try{ 

        $upit=$konekcija->prepare("INSERT INTO korisnik_odgovor (idodgovor, idkorisnik) VALUES(:idodgovor, :idkorisnik)");
       $upit->bindParam(":idodgovor", $idodgovorr);
        $upit->bindParam(":idkorisnik", $idkorisnikk);
        //$rezultat=$konekcija->query($upit);
        $upit->execute();

        

        }

        catch(PDOException $e){
            http_response_code(500);
            echo $e->getMessage();
            header("Content-type: application/json");
            //$response['odgovor'] = 'Everything went better than expected.';
            $message="Llalaal";
            echo json_encode(['message' => $message]); 

            
           


        }

    



    }

    else{
        echo("Nije dobra konekcija");


    }
}
else{
    http_response_code(404);
}






?>