<?php 
include('conn.php');

$kysely="SELECT huoltotyo.*, tyontekijat.nimi, asunnot.asunto, taloyhtio.asoy, hstatus.status
         FROM huoltotyo 
         INNER JOIN tyontekijat 
         ON huoltotyo.tyontekijaid = tyontekijat.tyontekijaid 
         INNER JOIN hstatus 
         ON huoltotyo.statusid =hstatus.statusid 
         INNER JOIN asunnot 
         ON huoltotyo.asuntoid=asunnot.asuntoid 
         INNER JOIN taloyhtio 
         ON huoltotyo.asoyid=taloyhtio.asoyid";
$data = $yhteys->query($kysely);


$JSON='{"huoltotyo":[';
$laskuri = 0;
$riveja = $data->rowCount();
while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    
    $laskuri++;
    $JSON.='{"huoltoid":"'.$rivi['huoltoid'].'","asunto":"'.$rivi['asunto'].'","asoy":"'.$rivi['asoy'].'","ilmoittaja":"'.$rivi['ilmoittaja'].'" ,"kuvaus":"'.$rivi['kuvaus'].'","status":"'.$rivi['status'].'","nimi":"'.$rivi['nimi'].'","kommentit":"'.$rivi['kommentit'].'"}';

    if($laskuri<$riveja) $JSON.=",";
}

$JSON.=']}';
$yhteys = null;

$handler = fopen("data.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>