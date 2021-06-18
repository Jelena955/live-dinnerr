<?php

include "konekcija/konekcija.php";


if(isset($_POST["idP"])){


    $id=$_POST["idP"];

    $upit=$konekcija->prepare("DELETE FROM jelo WHERE idjelo=:id ");
    $upit->bindParam(':id', $id);
    $upit->execute();
    return true;
    

}

else{

    echo("Ne moze");
    return false;
}


?>



