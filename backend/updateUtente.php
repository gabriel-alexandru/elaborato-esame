<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $db = new mysqli('localhost', 'root', '', 'my_gabrielalexandru');
    if($db->connect_error) {
      die('errore di connessione al database');
    }

    if($_POST['password'] != '' && $_POST['confermaPassword'] != ''){
      // update anche password
      if($_POST['password'] == $_POST['confermaPassword']) {
        $result = $db->query('UPDATE utente SET nome="' . $_POST['nome'] . '", cognome="' . $_POST['cognome'] . '", dataNascita="' . $_POST['dataNascita'] . '", luogoNascita="' . $_POST['luogoNascita'] . '", email="' . $_POST['email'] . '", password="' . hash('ripemd160', $_POST['password']) . '" WHERE email="' . $_POST['email'] . '"');
      } else {
        header('Location: /elaborato-esame/cambiaDati.php?messaggio=Le password non coincidono.');
      }

    } else if($_POST['password'] == '' && $_POST['confermaPassword'] == '') {
      // update no password
      $result = $db->query('UPDATE utente SET nome="' . $_POST['nome'] . '", cognome="' . $_POST['cognome'] . '", dataNascita="' . $_POST['dataNascita'] . '", luogoNascita="' . $_POST['luogoNascita'] . '", email="' . $_POST['email'] . '" WHERE email="' . $_POST['email'] . '"');
    }

    if($result) {
      $_SESSION['nomeUtente'] = $_POST['nome'];
      $_SESSION['cognomeUtente'] = $_POST['cognome'];
      $_SESSION['dataNascitaUtente'] = $_POST['dataNascita'];
      $_SESSION['luogoNascitaUtente'] = $_POST['luogoNascita'];
      $_SESSION['emailUtente'] = $_POST['email'];
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Modifica avvenuta con successo!');
    } else {
      header('Location: /elaborato-esame/areaRiservata.php?messaggio=La modifica dei dati personali non è andata a buon fine.');
    }

    $db->close();
  }

?>