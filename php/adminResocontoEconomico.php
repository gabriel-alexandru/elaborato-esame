<?php

  echo '<h3 id="title">Resoconto Economico</h3>';
  $result = $db->query('SELECT c.nome AS nomeCompagnia, c.partitaIVA, a.durataAffitto, t.nome AS nomeTeatro, t.costoGiornaliero FROM (compagniaTeatrale AS c JOIN affitti AS a ON c.ID = a.IDCompagnia) JOIN teatro AS t ON a.IDTeatro = t.ID');
  if($result->num_rows != 0) {
    ?>
    <section id="tabella">
      <table>
        <thead><td>Nome Compagnia</td> <td>Partita IVA</td> <td>Nome Teatro</td> <td>Durata Affitto</td> <td>Incasso</td></thead>
  
        <tbody>
  
          <?php
            while($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . $row['nomeCompagnia'] . '</td>';
              echo '<td>' . $row['partitaIVA'] . '</td>';
              echo '<td>' . $row['nomeTeatro'] . '</td>';
              echo '<td>' . $row['durataAffitto'] . ' giorni</td>';
              echo '<td>' . $row['durataAffitto'] * $row['costoGiornaliero'] . '€</td>';
              echo '</tr>';
            }
          ?>
  
        </tbody>
  
      </table>
    </section>
  
    <?php
    } else {
      echo 'Non ci sono affitti!';
    }
  ?>