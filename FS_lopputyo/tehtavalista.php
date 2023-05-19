<?php 
include('conn.php');

session_start();

$tyontekijaid = $_SESSION['tyontekijaid'];

$kysely="SELECT huoltotyo.*, asunnot.asunto, taloyhtio.asoy, taloyhtio.katuosoite 
         FROM huoltotyo  
         INNER JOIN asunnot 
         ON huoltotyo.asuntoid=asunnot.asuntoid 
         INNER JOIN taloyhtio 
         ON huoltotyo.asoyid=taloyhtio.asoyid
         WHERE tyontekijaid = '$tyontekijaid'";
$data = $yhteys->query($kysely);


$JSON='{"tehtava":[';
$laskuri = 0;
$riveja = $data->rowCount();
while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    
    $laskuri++;
    $JSON.='{"huoltoid":"'.$rivi['huoltoid'].'","asunto":"'.$rivi['asunto'].'","asoy":"'.$rivi['asoy'].'", "katuosoite":"'.$rivi['katuosoite'].'", "ilmoittaja":"'.$rivi['ilmoittaja'].'" ,"kuvaus":"'.$rivi['kuvaus'].'", "kommentit":"'.$rivi['kommentit'].'"}';

    if($laskuri<$riveja) $JSON.=",";
}

$JSON.=']}';
$yhteys = null;

$handler = fopen("data4.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>