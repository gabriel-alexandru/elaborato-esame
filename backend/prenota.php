<?php

  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');

    if($db->connect_error) {
      die('errore durante la connessione al database');
    }

    $id = $db->query('SELECT ID FROM utente WHERE email="' . $_SESSION['emailUtente'] . '";')->fetch_assoc()['ID'];
    $res = $db->query('INSERT INTO biglietto(IDSpettacolo, IDSpettatore) VALUES("' . $_GET['spettacolo'] . '", "' . $id . '");');
    $db->close();

    if($res) {
      header('Location: /elaborato-esame/index.php?messaggio=Prenotazione avvenuta con successo');
    }
  }

?>