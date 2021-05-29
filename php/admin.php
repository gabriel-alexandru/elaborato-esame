<?php

  $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');

  if($db->connect_error) {
    die('errore durante la connessione al database.');
  }
  echo '<hr>';
  include('php/adminListaSpettacoli.php');
  echo '<hr>';
  include('php/adminResocontoEconomico.php');
  
  $db->close();
?>
<hr>