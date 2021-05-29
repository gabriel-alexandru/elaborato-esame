<h3 id="title">Lista affitti</h3>
<section id="tabella">
  <table>
    <thead>
      <td>Teatro</td>
      <td>Durata Affitto</td>
    </thead>
    <tbody>
      <?php

        $result = $db->query('SELECT a.ID, t.nome, a.durataAffitto FROM teatro
      AS t JOIN affitti AS a ON t.ID = a.IDTeatro WHERE a.IDCompagnia="' . $id .
      '"'); while($row = $result->fetch_assoc()) { echo '
      <tr>
        <td>' . $row['nome'] . '</td>
        <td>' . $row['durataAffitto'] . ' giorni</td>
      </tr>
      '; } ?>
    </tbody>
  </table>
</section>
