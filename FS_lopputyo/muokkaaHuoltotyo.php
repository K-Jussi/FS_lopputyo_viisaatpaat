<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<title>Muokkaa huoltotyö</title>
</head>
<body>

<?php require "conn.php";
if(isset($_GET['huoltoid'])){
    $huoltoid = $_GET['huoltoid'];
    $kysely = "SELECT huoltotyo.*, asunnot.asunto, taloyhtio.asoy, hstatus.status, tyontekijat.nimi FROM huoltotyo 
    INNER JOIN tyontekijat 
    ON huoltotyo.tyontekijaid = tyontekijat.tyontekijaid 
    INNER JOIN hstatus 
    ON huoltotyo.statusid =hstatus.statusid 
    INNER JOIN asunnot 
    ON huoltotyo.asuntoid=asunnot.asuntoid 
    INNER JOIN taloyhtio 
    ON huoltotyo.asoyid=taloyhtio.asoyid WHERE huoltoid = :huoltoid";
    $hae = $yhteys->prepare($kysely);
    $hae->execute([
        ':huoltoid' => $huoltoid
    ]);
    $huolto = $hae->fetch(PDO::FETCH_ASSOC);}

    $kys2 = "SELECT * FROM hstatus";
    $hae2  = $yhteys->query($kys2);
    $data = $hae2->fetch(PDO::FETCH_ASSOC);

    $kys3 = "SELECT * FROM tyontekijat";
    $hae3  = $yhteys->query($kys3);
    $data2 = $hae3->fetch(PDO::FETCH_ASSOC);


?>


<div class="container ">
    <h1>Muokkaa huoltotyön tietoja - <br>
    </h1>
    <table class="table table-striped" id="mhuolto">
        <tr>
         <th>Asunto</th>
         <th>Asoy</th>
         <th>ilmoittaja</th>
         <th>Kuvaus</th>
         <th>Status</th>
         <th>Tyontekija</th>
         <th>Kommentit</th>
        
        </tr>
                    <tr>
                      
                      <td><?php echo $huolto['asunto']; ?></td>
                      <td><?php echo $huolto['asoy']; ?></td>
                      <td><?php echo $huolto['ilmoittaja']; ?></td>
                      <td><?php echo $huolto['kuvaus']; ?></td>
                      <td><?php echo $huolto['status']; ?></td>
                      <td><?php echo $huolto['nimi']; ?></td>
                      <td><?php echo $huolto['kommentit']; ?></td>
                
                    </tr>
        
    </table>

        
    <h3>Uudet huoltotiedot:</h3>
    <form method="POST" action="paivitaHuoltotyo.php">
        <input type="hidden" name="huoltoid" value="<?php echo $huoltoid; ?>">
        <div class="form-group">
            <label for="asuntoid">Asunto:</label>
            <input type="hidden" class="form-control" id="asuntoid" name="asuntoid" value="<?php echo $huolto['asuntoid']; ?>"><?php echo $huolto['asunto']; ?>
        </div>
        <div class="form-group">
            <label for="asoyid">Asoy:</label>
            <input type="hidden" class="form-control" id="asoyid" name="asoyid" value="<?php echo $huolto['asoyid']; ?>"><?php echo $huolto['asoy']; ?>
        </div>
        <div class="form-group">
            <label for="ilmoittaja">Ilmoittaja:</label>
            <input type="text" class="form-control" id="ilmoittaja" name="ilmoittaja" value="<?php echo $huolto['ilmoittaja']; ?>">
            </div>
        <div class="form-group">
            <label for="kuvaus">Kuvaus:</label>
            <input type="text" class="form-control" id="kuvaus" name="kuvaus" value="<?php echo $huolto['kuvaus']; ?>">
        </div>
        <div class="form-group">
            <label for="statusid" class="form-label">Status:</label>
            <select class="form-select" name="statusid">
                <?php foreach ($yhteys->query($kys2) as $rivi) {
                    echo "<option value=$rivi[statusid]>$rivi[status]</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tyontekijaid">Työntekijä:</label>
            <select class="form-select" name="tyontekijaid">
                <?php foreach ($yhteys->query($kys3) as $rivi) {
                    echo "<option value=$rivi[tyontekijaid]>$rivi[nimi]</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="kommentit">Kommentit:</label>
            <input type="text" class="form-control" id="kommentit" name="kommentit" value="<?php echo $huolto['kommentit']; ?>">
        </div>
        <button name="talleta" type="submit" class="btn btn-primary">Muokkaa</button>
    </form>

        <br><a href="huoltotyoindex2.php">Takaisin listaan</a>
</div>
</body>
</html>

            

    
    
