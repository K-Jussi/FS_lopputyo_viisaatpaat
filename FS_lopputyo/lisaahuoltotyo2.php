<?php 
require "conn.php";

if(isset($_POST['talleta'])){
    
    $asuntoid = $_POST['asuntoid'];
    $asoyid = $_POST['asoyid'];
    $ilmoittaja = $_POST['ilmoittaja'];
    $kuvaus = $_POST['kuvaus'];
    $statusid = $_POST['statusid'];
    $tyontekijaid = $_POST['tyontekijaid'];
    $kommentit = $_POST['kommentit'];

    $komento = "INSERT INTO huoltotyo(asuntoid, asoyid, ilmoittaja, kuvaus, statusid, tyontekijaid, kommentit) VALUES (:asuntoid, :asoyid, :ilmoittaja, :kuvaus, :statusid, :tyontekijaid, :kommentit)";
    $lisaa = $yhteys->prepare($komento); 
        
    $lisaa->bindValue(':asuntoid', $asuntoid, PDO::PARAM_INT);
    $lisaa->bindValue(':asoyid', $asoyid, PDO::PARAM_INT);
    $lisaa->bindValue(':ilmoittaja', $ilmoittaja, PDO::PARAM_STR);
    $lisaa->bindValue(':kuvaus', $kuvaus, PDO::PARAM_STR);
    $lisaa->bindValue(':statusid', $statusid, PDO::PARAM_INT);
    $lisaa->bindValue(':tyontekijaid', $tyontekijaid, PDO::PARAM_INT);
    $lisaa->bindValue(':kommentit', $kommentit, PDO::PARAM_STR);
    $lisaa->execute();
}

header("location:huoltotyoindex2.php");
?>