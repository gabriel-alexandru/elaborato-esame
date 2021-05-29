<?php

  if($_SERVER['REQUEST_METHOD'] == 'GET') {

    if(isset($_GET['id'])) {
      $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');

      $db->query('DELETE FROM biglietto WHERE IDSpettacolo=' . $_GET['id']);
      $db->query('DELETE FROM spettacolo WHERE ID=' . $_GET['id']);

      $db->close();

      header('Location: /elaborato-esame/areaRiservata.php?messaggio=Cancellazione avvenuta con successo.');
    } 

  }

?>