<?php include "konekcija/konekcija.php";

if(isset($_GET['broj'])){
    

    $broj=$_GET['broj'];
    $mejl=$_GET['mejl'];

    $upit="SELECT * FROM korisnik WHERE broj=$broj AND email=$mejl";
    $rezultat=$konekcija->query($upit);
    $rez=$rezultat->fetchAll();

    if($rez->rowCount()==1){
        $status=1;

        $upit2=prepare("UPDATE korisnik SET status=:status WHERE broj=$broj AND email=$mejl");
        $upit2->bindParam(':status', $status);
        $upit2->execute();
       




    }

    else{

        http_response_code(500);


    }
}

else{

    http_response_code(404);

}



?>