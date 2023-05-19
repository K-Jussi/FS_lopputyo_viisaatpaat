<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
    <title>Huolto</title>
  </head>

  <body>
    <div class="container">
      <h1 id="isoteksti">R-HuoltoApp</h1>
      <a href="logout.php" class="btn btn-danger mb-2">Kirjaudu ulos</a>

      <!-- Lisätään välilehdet -->
      <ul class="nav nav-tabs">
      <li class="nav-item">
          <a class="nav-link active" id="tyolistaus-tab" data-bs-toggle="tab" href="#tyolistaus" role="tab">Työlistaus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="tyontekijat-tab" data-bs-toggle="tab" href="#tyontekijat" role="tab">Työntekijät</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="vikalista-tab" data-bs-toggle="tab" href="#vikalista" role="tab">Vikalista</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="viestit-tab" data-bs-toggle="tab" href="#viestit" role="tab">Viestit</a>
        </li>
      </ul>

      <div class="tab-content">
      <!-- Työlistaus-välilehti -->
      <div class="tab-pane fade show active" id="tyolistaus" role="tabpanel">
          <div class="row">
            <div class="col-sm-6">
              <h3>Työlistaus</h3>
              <table class="table table-striped">
                <tr>
                  <th>Asunto</th>
                  <th>AsOy</th>
                  <th>Osoite</th>
                  <th>Ilmoittaja</th>
                  <th>Kuvaus</th>
                  <th>Kommentit</th>
                </tr>

                <?php 
                  include('tehtavalista.php');
                  $json_data = file_get_contents("data4.json");
                  $tehtava = json_decode($json_data, true);

                  if(count($tehtava) != 0){
                    foreach($tehtava as $key){
                      foreach($key as $tehtava){
                ?>
                        <tr>
                          <td><?php echo $tehtava['asunto']; ?></td>
                          <td><?php echo $tehtava['asoy']; ?></td>
                          <td><?php echo $tehtava['katuosoite']; ?></td>
                          <td><?php echo $tehtava['ilmoittaja']; ?></td>
                          <td><?php echo $tehtava['kuvaus']; ?></td>
                          <td><?php echo $tehtava['kommentit']; ?></td>
                        </tr>
                <?php
                      }
                    }
                  }
                ?>
              </table>
      </div>
      </div>
      </div>
  
        <!-- Työntekijät-välilehti -->
        <div class="tab-pane fade" id="tyontekijat" role="tabpanel">
          <div class="row">
            <div class="col-sm-6">
              <h3>Työntekijät</h3>
              <table class="table table-striped">
                <tr>
                  <th>Nimi</th>
                  <th>Status</th>
                </tr>

                <!-- Työntekijöiden listaus -->
                <?php 
                  include('tyontekijalistaus.php');
                  $json_data = file_get_contents("data2.json");
                  $tyontekijat = json_decode($json_data, true);

                  if(count($tyontekijat) != 0){
                    foreach($tyontekijat as $key){
                      foreach($key as $tyontekijat){
                ?>
                        <tr>
                          <td><?php echo $tyontekijat['nimi']; ?></td>
                          <td><?php echo $tyontekijat['status']; ?></td>
                          <td><?php echo '<a href="muokkaaTyontekija.php?tyontekijaid='.$tyontekijat['tyontekijaid'].'" class="btn btn-warning">Muokkaa</a>'; ?></td>
                        </tr>
                <?php
                      }
                    }
                  }
                ?>
              </table>
            </div>
          </div>
        </div>

        <!-- Vikalista-välilehti -->
        <div class="tab-pane fade" id="vikalista" role="tabpanel">
          <div class="row">
            <div class="col-sm-6">
              <h3>Vikalista</h3>
              <table class="table table-striped table-responsive">
                <tr>
                  <th>Huoltoid</th>
                  <th>Asunto</th>
                  <th>Asoy</th>
                  <th>Ilmoittaja</th>
                  <th>Kuvaus</th>
                  <th>Status</th>
                  <th>Nimi</th>
                  <th>Kommentit</th>
                </tr>

                <!-- Vikailmoitusten listaus -->
                <?php 
                  include('huoltotyolistaus.php');
                  $json_data = file_get_contents("data.json");
                  $huoltotyo = json_decode($json_data, true);

                  if(count($huoltotyo) != 0){
                    foreach($huoltotyo as $key){
                      foreach($key as $huoltotyo){
                ?>
                        <tr>
                          <td><?php echo $huoltotyo['huoltoid']; ?></td>
                          <td><?php echo $huoltotyo['asunto']; ?></td>
                          <td><?php echo $huoltotyo['asoy']; ?></td>
                          <td><?php echo $huoltotyo['ilmoittaja']; ?></td>
                          <td><?php echo $huoltotyo['kuvaus']; ?></td>
                          <td><?php echo $huoltotyo['status']; ?></td>
                          <td><?php echo $huoltotyo['nimi']; ?></td>
                          <td><?php echo $huoltotyo['kommentit']; ?></td>
                          <td><?php echo '<a href="muokkaaHuoltotyo.php?huoltoid='.$huoltotyo['huoltoid'].'" class="btn btn-warning">Muokkaa</a>'; ?></td>
                            <td><?php echo '<a href="poistaHuoltotyo.php?huoltoid='.$huoltotyo['huoltoid'].'" class="btn btn-secondary">Poista</a>'; ?></td>
                        </tr>
                <?php
                      }
                    }
                  }
                ?>
                <div class="row">
                <div class="col-sm-6">
                  <p><a href="vikatyontekija.php">Lisää tästä uusi vikailmoitus</a></p>
              </div>
            </div>
              </table>
            </div>
          </div>
           
        </div>

        <!-- Viestit-välilehti -->
        <div class="tab-pane fade" id="viestit" role="tabpanel">
          <div class="row">
            <div class="col-sm-6">
              <h3>Viestit</h3>
              <table class="table table-striped table-responsive">
                <tr>
                  <th>Nimi</th>
                  <th>Puhelin</th>
                  <th>Sähköposti</th>
                  <th>Viesti</th>
                </tr>

                <!-- Yhteydenottopyyntöjen listaus -->
                <?php 
                  include('viestilistaus.php');
                  $json_data = file_get_contents("data3.json");
                  $viestit = json_decode($json_data, true);

                  if(count($viestit) != 0){
                    foreach($viestit as $key){
                      foreach($key as $viestit){
                ?>
                        <tr>
                          <td><?php echo $viestit['nimi']; ?></td>
                          <td><?php echo $viestit['puhelin']; ?></td>
                          <td><?php echo $viestit['sahkoposti']; ?></td>
                          <td><?php echo $viestit['viesti']; ?></td>
                        </tr>
                <?php
                      }
                    }
                  }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>



       
