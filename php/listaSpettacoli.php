<h3 id="title">Lista spettacoli</h3>
<section id="tabella">
  <table>
    <thead>
      <td>Titolo</td>
      <td>Data</td>
      <td>Orario Inizio</td>
      <td>Durata</td>
      <td>Azioni</td>
    </thead>
    <tbody>
      <?php

      $result = $db->query('SELECT * FROM spettacolo WHERE IDCompagnia="' . $id
      . '"'); while($row = $result->fetch_assoc()) { echo '
      <tr>
        <td>' . $row['titolo'] . '</td>
        <td>' . $row['data'] . '</td>
        <td>' . $row['oraInizio'] . '</td>
        <td>' . $row['durata'] . ' minuti</td>
        <td>';
        if((date('Y-m-d') < $row['data']) || (date('Y-m-d') == $row['data'] && date('h:i:s') < $row['oraInizio'])) {
          echo '<a href="backend/cancellaSpettacolo.php?id=' . $row['ID'] . '"
          ><i class="fa fa-trash" aria-hidden="true"></i
        ></a>';
        }
        echo '</td>
      </tr>
      '; } ?>
    </tbody>
  </table>
</section>
