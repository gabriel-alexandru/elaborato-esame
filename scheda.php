<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['spettacolo'])) {
      $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');

      if($db->connect_error) {
        die('errore durante la connessione al database');
      }

      $result = $db->query('SELECT titolo, data, oraInizio, durata, locandina FROM spettacolo WHERE ID=' . $_GET['spettacolo']);
      $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $row['titolo'];?></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
    include('html/header.html');
  ?>
  <section id="scheda-spettacolo">
    <div id="img-div">
      <img id="img-spettacolo" src="img/<?php echo $row['locandina'];?>.png" alt="<?php echo $row['titolo'];?>">
    </div>
    <div id="info-div">
      <h1 id="titolo-spettacolo"><?php echo $row['titolo'];?></h1>
      
      <p id="info-spettacolo"><b>Data:</b> <?php echo $row['data'];?></p>

      <p id="info-spettacolo"><b>Orario di inzio:</b> <?php echo $row['oraInizio'];?></p>

      <p id="info-spettacolo"><b>Durata:</b> <?php echo $row['durata'];?> minuti</p>

      <?php

          if(isset($_SESSION['nomeUtente']) && $_SESSION['tipoUtente'] == 'utente') {
            echo '<a href="backend/prenota.php?spettacolo=' . $_GET['spettacolo'] . '">Prenota</a>';
          }
        }
      }

      $db->close();
    ?>
    </div>
  </section>
</body>
</html>