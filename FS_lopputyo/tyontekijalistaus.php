<?php 


require('conn.php');


$kysely="SELECT tyontekijat.*, tstatus.status FROM tyontekijat INNER JOIN tstatus ON tyontekijat.status = tstatus.statusid WHERE tyontekijat.tyontekijaid <> 1";
$data = $yhteys->query($kysely);


$JSON='{"tyontekijat":[';
$laskuri = 0;
$riveja = $data->rowCount();

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    
    $laskuri++;
    $JSON.='{"tyontekijaid":"'.$rivi['tyontekijaid'].'","nimi":"'.$rivi['nimi'].'","status":"'.$rivi['status'].'"}';

    if($laskuri<$riveja) $JSON.=",";
}

$JSON.=']}';
$yhteys = null;

$handler = fopen("data2.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>