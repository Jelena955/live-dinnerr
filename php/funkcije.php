<?php

function ispis (){
    include "konekcija/konekcija.php";




$upit3="SELECT * FROM jelo j INNER JOIN vrsta v ON j.idvrsta=v.idvrsta INNER JOIN slika s ON j.idslika=s.idslika ";
$rezultat=$konekcija->query($upit3);
$rez=$rezultat->fetchall();





foreach($rez as $red){
    $id=$red->idjelo; 
    $upit4="SELECT * FROM jelo j INNER JOIN jelo_sastojci js ON j.idjelo=js.idjelo INNER JOIN sastojci s ON js.idsastojak=s.idsastojak WHERE j.idjelo='".$id."'";
    $rezultat4=$konekcija->query($upit4);
    $rez4=$rezultat4->fetchall();
    
    ?>

<div class="col-lg-4 col-md-6 special-grid hrana <?=$red->tempklasa?>">
        <div class="gallery-single fix">
            <img src="images/<?=$red->src?>.jpg" class="img-fluid" alt="Image">
            <div class="why-text">
                <h4><?=$red->ime?></h4> 
  

                <p><?=$red->opis?></p> 
                <h6 style="font-size:10px">Proteins:<?=$red->proteini?>g </h6>
                <h6 style="font-size:10px">Fats:<?=$red->proteini?>g </h6>
                <h6 style="font-size:10px">Carbohydrates:<?=$red->proteini?>g </h6>
            </div>
        </div>
    </div>
    <div class="opis" style="display:none"><img src="images/<?=$red->src?>.jpg" class="img-fluid" alt="Image">
     <p>Sastojci:</p>
    <?php foreach($rez4 as $red4){
      
        $niz=$red4->naziv;
        echo( " 

    
    <p>$niz
    </p>");}?>
    <p><?=$red->recept?>
    </p>
    <button type="button" class="btn btn-dark dugme">Close</button>

</div>
    







<?php }
}


function ispisfilt($koji){
    include "konekcija/konekcija.php";




$upit4="SELECT * FROM jelo j INNER JOIN vrsta v ON j.idvrsta=v.idvrsta INNER JOIN slika s ON j.idslika=s.idslika WHERE v.tempklasa='$koji'";
$rezultat=$konekcija->query($upit4);
$rez=$rezultat->fetchall();
  return $rez;}

  
  function ispisfiltsve(){
    include "konekcija/konekcija.php";




$upit4="SELECT * FROM jelo j INNER JOIN vrsta v ON j.idvrsta=v.idvrsta INNER JOIN slika s ON j.idslika=s.idslika ";
$rezultat=$konekcija->query($upit4);
$rez=$rezultat->fetchall();
  return $rez;}

  function pretrazi($sta){

    include "konekcija/konekcija.php";
    $upit="SELECT * FROM jelo j INNER JOIN slika s ON j.idslika=s.idslika WHERE j.ime LIKE LOWER( '%".$sta."%') ";
    $rezultat=$konekcija->query($upit);
    $rez=$rezultat->fetchAll();
    return $rez;
  }

  function ispisPreporuceno($koji){

    include "konekcija/konekcija.php";

    $upit6="SELECT * FROM jelo j INNER JOIN preporuceno p ON j.idpreporuceno=p.idpreporuceno INNER JOIN slika s ON j.idslika=s.idslika WHERE p.opcija='$koji'";
$rezultat6=$konekcija->query($upit6);
$rez6=$rezultat6->fetchall();


foreach($rez6 as $red6){
    $id=$red6->idjelo; 
    $upit5="SELECT * FROM jelo j INNER JOIN jelo_sastojci js ON j.idjelo=js.idjelo INNER JOIN sastojci s ON js.idsastojak=s.idsastojak WHERE j.idjelo='".$id."'";
    $rezultat5=$konekcija->query($upit5);
    $rez5=$rezultat5->fetchall();
    
    ?>

<div class="col-lg-4 col-md-6 special-grid hrana <?=$red6->tempklasa?>">
        <div class="gallery-single fix">
            <img src="images/<?=$red6->src?>.jpg" class="img-fluid" alt="Image">
            <div class="why-text">
                <h4><?=$red6->ime?></h4> 
  

                <p><?=$red6->opis?></p> 
                <h6 style="font-size:10px">Proteins:<?=$red6->proteini?>g </h6>
                <h6 style="font-size:10px">Fats:<?=$red6->proteini?>g </h6>
                <h6 style="font-size:10px">Carbohydrates:<?=$red6->proteini?>g </h6>
            </div>
        </div>
    </div>
    <div class="opis" style="display:none"><img src="images/<?=$red6->src?>.jpg" class="img-fluid" alt="Image">
     <p>Sastojci:</p>
    <?php foreach($rez5 as $red5){
      
        $niz=$red5->naziv;
        echo( " 

    
    <p>$niz
    </p>");}?>
    <p><?=$red6->recept?>
    </p>
    <button type="button" class="btn btn-dark dugme">Close</button>

</div>
    







<?php }
}



