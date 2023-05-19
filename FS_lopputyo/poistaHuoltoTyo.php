<?php 
require "conn.php";

if(isset($_GET['huoltoid'])){
    $huoltoid = $_GET['huoltoid'];
    $kysely = "DELETE FROM huoltotyo WHERE huoltoid=:huoltoid";
    $poista = $yhteys->prepare($kysely);
    $poista ->bindValue(':huoltoid', $huoltoid, PDO::PARAM_STR);
    $poista->execute();
}

header("location: huoltotyoindex2.php");
?>