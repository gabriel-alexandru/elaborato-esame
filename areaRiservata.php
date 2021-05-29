<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Area Riservata</title>
  <link rel="stylesheet" href="fa/css/font-awesome.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <?php
    session_start();

    if(!isset($_SESSION['nomeUtente']) && !isset($_SESSION['nomeCompagnia'])) {
      header('Location: login.php');
    }

    include('html/header.html');

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
      if(isset($_GET['messaggio'])) {
          echo '<script>alert("' . $_GET['messaggio'] . '");</script>';
      }
    }

    if(isset($_SESSION['nomeUtente'])) {
      echo '<h1 id="title">Ciao ' . $_SESSION['nomeUtente'] . ' ' . $_SESSION['cognomeUtente'] .'</h1>';
      if($_SESSION['tipoUtente'] == 'utente') {
        // area privata utente
        include('php/utente.php');
        echo '<div id="divComandi">';
      } else if($_SESSION['tipoUtente'] == 'admin') {
        // area privata admin
        include('php/admin.php');
        echo '<div id="divComandi">';
        echo '<a id="comandi" href="backend/scaricaResoconto.php">Scarica resoconto</a>';
      }
      echo '<a id="comandi" href="cambiaDati.php">Modifica Dati Personali</a>';
    } else if(isset($_SESSION['nomeCompagnia'])) {
      echo '<h1 id="title">Ciao ' . $_SESSION['nomeCompagnia'] . '</h1>';
      include('php/compagnia.php');
      echo '<div id="divComandi">';
    }

  ?>
  <a id="comandi" href="backend/logout.php">Logout</a>
  
  <?php
    echo '</div>';
  ?>
</body>
</html>