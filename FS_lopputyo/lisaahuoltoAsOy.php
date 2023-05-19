<?php 
require "conn.php";

if(isset($_POST['talleta'])){
    
    $asuntoid = $_POST['asuntoid'];
    $asoyid = $_POST['asoyid'];
    $ilmoittaja = $_POST['ilmoittaja'];
    $kuvaus = $_POST['kuvaus'];
    
    

    $komento = "INSERT INTO huoltotyo(asuntoid, asoyid, ilmoittaja, kuvaus) VALUES ( :asuntoid, :asoyid, :ilmoittaja, :kuvaus)";

    $lisaa = $yhteys->prepare($komento); 
    $lisaa->bindValue(':asuntoid', $asuntoid, PDO::PARAM_INT);
    $lisaa->bindValue(':asoyid', $asoyid, PDO::PARAM_INT);
    $lisaa->bindValue(':ilmoittaja', $ilmoittaja, PDO::PARAM_STR);
    $lisaa->bindValue(':kuvaus', $kuvaus, PDO::PARAM_STR);
    $lisaa->execute();
}

header("location:onnistui.php");
?>