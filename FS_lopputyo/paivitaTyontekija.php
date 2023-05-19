<?php
require "conn.php";

if(isset($_POST['talletaT'])){
    $tyontekijaid = $_POST['tyontekijaid'];
    $nimi = $_POST['nimi'];
    $status = $_POST['status'];

    $komento = "UPDATE tyontekijat SET nimi = :nimi, status = :status WHERE tyontekijaid = :tyontekijaid";
    $lisaa = $yhteys->prepare($komento); 

    $lisaa->bindValue(':tyontekijaid', $tyontekijaid, PDO::PARAM_INT);
    $lisaa->bindValue(':nimi', $nimi, PDO::PARAM_STR);
    $lisaa->bindValue(':status', $status, PDO::PARAM_INT);
    $lisaa->execute();
}

header("location:huoltotyoindex2.php");
?>
