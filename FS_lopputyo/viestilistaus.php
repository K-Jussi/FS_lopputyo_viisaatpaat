<?php
require('conn.php');
$kysely="SELECT * FROM viestit";
$data = $yhteys->query($kysely);


$JSON='{"viestit":[';
$laskuri = 0;
$riveja = $data->rowCount();
while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    
    $laskuri++;
    $JSON.='{"nimi":"'.$rivi['nimi'].'","puhelin":"'.$rivi['puhelin'].'", "sahkoposti":"'.$rivi['sahkoposti'].'", "viesti":"'.$rivi['viesti'].'"}';

    if($laskuri<$riveja) $JSON.=",";
}

$JSON.=']}';
$yhteys = null;

$handler = fopen("data3.json", "w");
fwrite($handler, $JSON);
fclose($handler);

//echo $JSON;


?>