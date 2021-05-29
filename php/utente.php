<?php

  $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');

  if($db->connect_error) {
    die('errore durante la connessione al database');
  }
?>

<hr>
<h3 id="title">Lista spettacoli prenotati</h3>
<section id="tabella">
  <table>
    <thead><td>Spettacolo</td> <td>Data</td> <td>Orario Inizio</td> <td>Azioni</td></thead>
    <tbody>

    <?php

      $result = $db->query('SELECT b.ID as idBiglietto, s.* FROM (biglietto AS b JOIN utente AS u ON b.IDSpettatore = u.ID) JOIN spettacolo AS s ON b.IDSpettacolo = s.ID WHERE u.email="' . $_SESSION['emailUtente'] . '"');

      while($row = $result->fetch_assoc()) {
        echo '<tr> <td>' . $row['titolo'] . '</td> <td>' . $row['data'] . '</td> <td>' . $row['oraInizio'] . '</td><td>';
        if((date('Y-m-d') < $row['data']) || (date('Y-m-d') == $row['data'] && date('h:i:s') < $row['oraInizio'])) {
          echo '<a href="backend/cancellaBiglietto.php?id=' . $row['idBiglietto'] . '"><i class="fa fa-trash" aria-hidden="true"></i></a>';
        }
        echo '</td></tr>';
      }

      $db->close();
    ?>
    </tbody>
  </table>
</section>

<hr>