<?php
    require "conn.php";

    $asoyid = '3';

    $kys = "SELECT asunnot.*, taloyhtio.asoy FROM asunnot INNER JOIN taloyhtio ON asunnot.asoyid=taloyhtio.asoyid WHERE asunnot.asoyid = '$asoyid'";
    $muokkaa = $yhteys->query($kys);
    $data = $muokkaa->fetch(PDO::FETCH_ASSOC);
    

    $kys2 = "SELECT asuntoid, asunto FROM asunnot WHERE asoyid = '$asoyid'";

?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/mystyle.css">
      <title>Vikailmoitus</title>
    </head>
<body>
<div class="container mt-3 mb-3 col-xl-4 col-md-6 col-sm" id="kirjaudu">
        <br>
        <p id="isoteksti">Jätä vikailmoitus</p>
        <br>
      
    <form action="lisaahuoltoAsOy.php" method="POST">     
        <div class="mb-3 mt-3">
            <label for="asuntoid" class="form-label" id="pieniteksti">Valitse kohde: </label>
            <select name="asuntoid">
                <?php foreach ($yhteys->query($kys2) as $rivi) {
                   echo "<option value=$rivi[asuntoid]>$rivi[asunto]</option>"; } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="asoyid" class="form-label" id="pieniteksti">AsOy: </label>
            <input type="hidden" value="<?php echo $asoyid?>" name="asoyid" readonly><?php echo $data['asoy'] ?>
        </div>
        <div class="mb-3">
            <label for="ilmoittaja" class="form-label" id="pieniteksti">Ilmoittaja: </label>
            <input type="text" class="form-control" name="ilmoittaja">
        </div>
        <div class="mb-3">
            <label for="kuvaus" class="form-label" id="pieniteksti">Kuvaus: </label>
            <textarea class="form-control" name="kuvaus"></textarea>
        </div>
            <button type="submit" name="talleta" class="btn btn-primary mb-2">Lähetä</button>
            <a href="logout.php" class="btn btn-danger mb-2 float-end">Kirjaudu ulos</a>
    </form>
    </div>
</body>
</html>
