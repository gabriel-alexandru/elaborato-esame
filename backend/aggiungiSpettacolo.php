<?php

  session_start(); 

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if($_POST['titolo'] == '') {
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Compilare il campo titolo.');
    } else if($_POST['data'] == '') {
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Compilare il campo data.');
    } else if($_POST['ora'] == '') {
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Compilare il campo ora.');
    } else if($_POST['durata'] == '') {
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Compilare il campo durata.');
    } else if (!isset($_FILES['locandina']) || !is_uploaded_file($_FILES['locandina']['tmp_name'])) {
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Inserire un file per la locandina.');  
    } else if($_FILES['locandina']['type'] != 'image/png' && $_FILES['locandina']['type'] != 'image/jpeg') {
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Il formato di file inserito non va bene. Inserire solo file png o jpg');
    } else if(getimagesize($_FILES['locandina']['tmp_name'])[0] > 512 || getimagesize($_FILES['locandina']['tmp_name'])[1] > 512) {
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Le dimensioni del file non sono giuste. Sono supportati solo file di dimensioni 512x512 o inferiori.');
    } else {
      move_uploaded_file($_FILES['locandina']['tmp_name'], '../../elaborato-esame/img/' . basename($_FILES['locandina']['name']));
      rename('../../elaborato-esame/img/' . basename($_FILES['locandina']['name']), '../../elaborato-esame/img/' . $_POST['titolo'] . '.png');
      
      $db = new mysqli('', '', '', 'my_gabrielalexandru');
      $id = $db->query('SELECT ID FROM compagniaTeatrale WHERE email="' . $_SESSION['emailCompagnia'] . '"')->fetch_assoc()['ID'];
      $db->query('INSERT INTO spettacolo(ID, titolo, data, oraInizio, durata, locandina, IDCompagnia) VALUES(NULL, "' . $_POST['titolo'] . '", "' . $_POST['data'] . '", "' . $_POST['ora'] . '", "' . $_POST['durata'] . '", "' . $_POST['titolo'] . '", ' . $id . ')');
  
      $db->close();
  
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Spettacolo aggiunto con successo.');
    }

  }

?>