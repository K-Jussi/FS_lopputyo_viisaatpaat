<?php 
// header('Content-Type: text/html; charset=utf-8');

$palvelin = "localhost";
$tietokanta = "kiinteistohuolto";
$tunnus = "root";
$salasana = "";

$yhteys = new PDO("mysql:host=$palvelin;dbname=$tietokanta", $tunnus, $salasana);
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>