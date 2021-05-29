<?php

  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_POST['teatro'])) {
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Selezionare un teatro.');
    } else if($_POST['durataAffitto'] == '') {
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Compilare il campo durata.');
    } else {
      $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');
      $id = $db->query('SELECT ID FROM compagniaTeatrale WHERE email="' . $_SESSION['emailCompagnia'] . '"')->fetch_assoc()['ID'];
      $db->query('INSERT INTO affitti(ID, IDCompagnia, IDTeatro, durataAffitto) VALUES (NULL, ' . $id . ', ' . $_POST['teatro'] . ', ' . $_POST['durataAffitto'] . ')');
      $db->close();
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Teatro affittato con successo');
    }
  }

?>