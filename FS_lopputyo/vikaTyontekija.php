<?php
    session_start();

    require "conn.php";

    

    $kys = "SELECT asunnot.*, taloyhtio.asoy FROM asunnot INNER JOIN taloyhtio ON asunnot.asoyid=taloyhtio.asoyid";
    $muokkaa = $yhteys->query($kys);
    $data = $muokkaa->fetch(PDO::FETCH_ASSOC);

    $tyontekijaid = $_SESSION['tyontekijaid'];

    $kys2 = "SELECT * FROM tyontekijat WHERE tyontekijaid = '$tyontekijaid'";
    $muokkaa2 = $yhteys->query($kys2);
    $data2 = $muokkaa2->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/mystyle.css">
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="js/min.js"></script>
        <script src="js/vanilla.js"></script>
      <title>Vikailmoitus</title>
    </head>
<body>
<div class="container mt-3 mb-3 col-xl-4 col-md-6 col-sm" id="kirjaudu">
        <br>
        <p id="isoteksti">Jätä vikailmoitus</p>
        <br>
      
    <form action="lisaahuoltoTyontekija.php" method="POST">     
        <div class="mb-3 mt-3">
            <label for="asuntoid" class="form-label" id="pieniteksti">Valitse kohde: </label>
            <select name="asuntoid" id="asuntoid">
              <?php foreach ($yhteys->query($kys) as $rivi) {
                  echo "<option value=$rivi[asuntoid]>$rivi[asunto] $rivi[asoy]</option>"; } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ilmoittaja" class="form-label" id="pieniteksti">Ilmoittaja: </label>
            <input type="hidden" value="<?php echo $data2['nimi']?>" name="ilmoittaja" readonly><?php echo $data2['nimi'] ?>
        </div>
        <div class="mb-3">
            <label for="kuvaus" class="form-label" id="pieniteksti">Kuvaus: </label>
            <textarea class="form-control" name="kuvaus"></textarea>
        </div>
        <div class="mb-3">
            <label for="kommentit" class="form-label" id="pieniteksti">Kommentit: </label>
            <textarea class="form-control" name="kommentit"></textarea>
        </div>
            <button type="submit" name="talleta" class="btn btn-primary mb-2">Lähetä</button>
            <a href="huoltotyoIndex2.php" class="btn btn-warning mb-2">Takaisin listaukseen</a>
            <a href="logout.php" class="btn btn-danger mb-2 float-end">Kirjaudu ulos</a>

    </form>
    </div>
</body>
</html>

