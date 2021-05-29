<?php
  session_start();

  unset($_SESSION['nomeUtente']);
  unset($_SESSION['cognomeUtente']);
  unset($_SESSION['dataNascitaUtente']);
  unset($_SESSION['luogoNascitaUtente']);
  unset($_SESSION['emailUtente']);
  unset($_SESSION['tipoUtente']);
  unset($_SESSION['nomeCompagnia']);
  unset($_SESSION['partitaIVA']);
  unset($_SESSION['emailCompagnia']);
  header('Location: /elaborato-esame/index.php?messaggio=Logout avvenuto con successo!');
?>