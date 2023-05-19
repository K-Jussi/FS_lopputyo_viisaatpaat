<?php 
require "conn.php";
if(isset($_POST['submit'])){
    
    $viestiid = $_POST['viestiid'];
    $nimi = $_POST['nimi'];
    $puhelin = $_POST['puhelin'];
    $sahkoposti = $_POST['sahkoposti'];
    $viesti = $_POST['viesti'];
    
    $komento = "INSERT INTO viestit(viestiid, nimi, puhelin, sahkoposti, viesti) VALUES (:viestiid, :nimi, :puhelin, :sahkoposti, :viesti)";
    $lisaa = $yhteys->prepare($komento); 

    $lisaa->bindValue(':viestiid', $viestiid, PDO::PARAM_INT);
    $lisaa->bindValue(':nimi', $nimi, PDO::PARAM_STR);
    $lisaa->bindValue(':puhelin', $puhelin, PDO::PARAM_INT);
    $lisaa->bindValue(':sahkoposti', $sahkoposti, PDO::PARAM_STR);
    $lisaa->bindValue(':viesti', $viesti, PDO::PARAM_STR);
    $lisaa->execute();
}


header("location:onnistui.php");
?>

