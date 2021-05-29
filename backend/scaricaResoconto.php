<?php
  session_start();
  $db = new mysqli('', '', '', 'my_gabrielalexandru');

  $result = $db->query('SELECT c.nome AS nomeCompagnia, c.partitaIVA, a.durataAffitto, t.nome AS nomeTeatro, t.costoGiornaliero FROM (compagniaTeatrale AS c JOIN affitti AS a ON c.ID = a.IDCompagnia) JOIN teatro AS t ON a.IDTeatro = t.ID');
  if($result->num_rows > 0) {
    file_put_contents('../../elaborato-esame/csv/resoconto.csv', 'Nome Compagnia, Partita IVA, Nome Teatro, Durata Affitto, Incasso' . PHP_EOL);
    while($row = $result->fetch_assoc()) {
      file_put_contents('../../elaborato-esame/csv/resoconto.csv', $row['nomeCompagnia'] . ', ' . $row['partitaIVA'] . ', ' . $row['nomeTeatro'] . ', ' . $row['durataAffitto'] . ', ' . $row['durataAffitto'] * $row['costoGiornaliero'] . PHP_EOL, FILE_APPEND);
    }
  } else {
    file_put_contents('../../elaborato-esame/csv/resoconto.csv', '');
  }

  header("Content-Disposition: attachment; filename=resoconto.csv");
  header("Content-Type: application/vnd.ms-excel");
  readfile('../../elaborato-esame/csv/resoconto.csv');
  sleep(3);
  header('Refresh: 5; URL=https://gabrielalexandru.altervista.org/elaborato-esame/areaRiservata.php');

  $db->close();
?>