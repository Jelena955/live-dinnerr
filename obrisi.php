<?php
header("Location:admin/template/pages/tables/basic-table.php");
include "konekcija/konekcija.php";
$id=$_GET['id'];
var_dump($id);

$upit4=$konekcija->prepare("DELETE from poruke WHERE idporuka=:id");
$upit4->bindParam(":id", $id);
$upit4->execute();



?>