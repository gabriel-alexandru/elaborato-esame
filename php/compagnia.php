<?php
  session_start();
  $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');

  $id = $db->query('SELECT ID FROM compagniaTeatrale WHERE email="' . $_SESSION['emailCompagnia'] . '"')->fetch_assoc()['ID'];

  $result = $db->query('SELECT * FROM spettacolo WHERE IDCompagnia="' . $id .'"');
  include('php/listaSpettacoli.php');
  echo '<hr>';
  include('html/aggiungiSpettacolo.html');
  echo '<hr>';
  include('html/affittaTeatro.html');
  echo '<hr>';
  include('php/listaAffitti.php');
  echo '<hr>';
  $db->close();
?>