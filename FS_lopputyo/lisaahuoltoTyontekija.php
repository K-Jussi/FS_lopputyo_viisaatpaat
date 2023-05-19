<?php 
require "conn.php";

if(isset($_POST['talleta'])){
    $asuntoid = $_POST['asuntoid'];
    $ilmoittaja = $_POST['ilmoittaja'];
    $kuvaus = $_POST['kuvaus'];
    $kommentit = $_POST['kommentit'];

    $kysely = "SELECT * FROM asunnot WHERE asuntoid = '$asuntoid'";
    $muokkaa = $yhteys->query($kysely);
    $data = $muokkaa->fetch(PDO::FETCH_ASSOC);

    $asoyid = $data['asoyid'];



    $komento = "INSERT INTO huoltotyo(asuntoid, asoyid, ilmoittaja, kuvaus, kommentit) VALUES ( :asuntoid, :asoyid, :ilmoittaja, :kuvaus, :kommentit)";

    $lisaa = $yhteys->prepare($komento); 
    $lisaa->bindValue(':asuntoid', $asuntoid, PDO::PARAM_INT);
    $lisaa->bindValue(':asoyid', $asoyid, PDO::PARAM_INT);
    $lisaa->bindValue(':ilmoittaja', $ilmoittaja, PDO::PARAM_STR);
    $lisaa->bindValue(':kuvaus', $kuvaus, PDO::PARAM_STR);
    $lisaa->bindValue(':kommentit', $kommentit, PDO::PARAM_STR);
    $lisaa->execute();
}

header("location:vikaTyontekija.php");
?>