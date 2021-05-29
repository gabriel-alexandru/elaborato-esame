<?php
  echo '<h3 id="title">Spettacoli del giorno</h3>';
  $result = $db->query('SELECT s.*, COUNT(b.IDSpettacolo) as prenotazioni FROM spettacolo AS s LEFT JOIN biglietto AS b ON s.ID = b.IDSpettacolo WHERE s.data = "' . date('Y-m-d') . '" GROUP BY s.ID');
  
  if($result->num_rows != 0) {
  ?>
  <section id="tabella">
    <table>
      <thead><td>Titolo</td> <td>Data</td> <td>Ora Inzio</td> <td>Durata</td> <td>Numero Prenotazioni</td></thead>

      <tbody>

        <?php
          while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['titolo'] . '</td>';
            echo '<td>' . $row['data'] . '</td>';
            echo '<td>' . $row['oraInizio'] . '</td>';
            echo '<td>' . $row['durata'] . ' minuti</td>';
            echo '<td>' . $row['prenotazioni'] . '</td>';
            echo '</tr>';
          }
        ?>

      </tbody>

    </table>
  </section>

  <?php
  } else {
    echo 'Oggi non ci sono stati spettacoli!';
  }
?>