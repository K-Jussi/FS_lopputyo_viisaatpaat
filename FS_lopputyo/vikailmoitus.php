<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/mystyle.css">
      <title>Vikailmoitus</title>
    </head>

<body>
   <div class="container-fluid">
        <br>
      <h1>Jätä vikailmoitus</h1>
      <br>

      <!-- vikailmoituslomake -->
        <table class="table-bordered">
        <form action="lisaahuoltotyo.php" method="POST">
        <div class="form-group">
            <label for="asuntoid">Asuntoid:</label>
            <input type="text" class="form-control" id="asuntoid" name="asuntoid">
        </div>
        <div class="form-group">
            <label for="asoyid">Asoyid:</label>
            <input type="text" class="form-control" id="asoyid" name="asoyid">
        </div>
        <div class="form-group">
            <label for="ilmoittaja">Ilmoittaja:</label>
            <input type="text" class="form-control" id="ilmoittaja" name="ilmoittaja">
            </div>
        <div class="form-group">
            <label for="kuvaus">Kuvaus:</label>
            <input type="text" class="form-control" id="kuvaus" name="kuvaus">
        </div>
        <div class="form-group">
            <label for="statusid">Statusid:</label>
            <input type="number" class="form-control" id="statusid" name="statusid" value="1">
        </div>
        <div class="form-group">
            <label for="tyontekijaid">Työntekijäid:</label>
            <input type="number" class="form-control" id="tyontekijaid" name="tyontekijaid" value="2">
        </div>
        <div class="form-group">
            <label for="kommentit">Kommentit:</label>
            <input type="text" class="form-control" id="kommentit" name="kommentit">
        </div>

        <br>
        <input type="submit" value="Lähetä" class="btn btn-info" name="talleta" >
        <a href="logout.php" class="btn btn-danger mb-2 float-end">Kirjaudu ulos</a>
            
        </form>
        </table>
    </div>
</body>
</html>