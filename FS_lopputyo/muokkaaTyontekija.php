<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <title>Työntekijän status</title>
</head>
<body>

<?php require "conn.php";
if(isset($_GET['tyontekijaid'])){
    $tyontekijaid = $_GET['tyontekijaid'];
    $kysely = "SELECT tyontekijat.tyontekijaid, tyontekijat.nimi, tyontekijat.status FROM tyontekijat WHERE tyontekijaid = :tyontekijaid";
    $hae = $yhteys->prepare($kysely);
    $hae->execute([
        ':tyontekijaid' => $tyontekijaid
    ]);
    $tyontekija = $hae->fetch(PDO::FETCH_ASSOC);
}?>

<div class="container col-md-6 ">

<h3>Vaihda status:</h3>
    <form method="POST" action="paivitaTyontekija.php">
    <input type="hidden" name="tyontekijaid" value="<?php echo $tyontekijaid; ?>">
    <div class="form-group">
        <label for="nimi">Nimi:</label>
        <input type="text" class="form-control" id="nimi" name="nimi" value="<?php echo $tyontekija['nimi']; ?>">
    </div>
    <div class="form-group">
    <div class="form-group">
        
<label for="status">Status:</label>
<select class="form-control" id="status" name="status">
    <?php
    $kysely = "SELECT * FROM tstatus";
    $tulokset = $yhteys->query($kysely);

    while ($rivi = $tulokset->fetch(PDO::FETCH_ASSOC)) {
        $value = $rivi['statusid'];
        $teksti = $rivi['status'];
        echo '<option value="' . $value . '">' . $teksti . '</option>';
    }
    ?>
</select>
</div>
</select>
</div>
    <button name="talletaT" type="submit" class="btn btn-primary">Muokkaa</button>
    </form>
    <br><a href="huoltotyoindex2.php">Takaisin listaan</a>
</div> 
</div>
</body>
</html>