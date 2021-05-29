<?php

  $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');

  if($db->connect_error) {
    die('errore durante la connessione al database');
  }

  $result = $db->query('SELECT * FROM spettacolo');

?>
  <h1 id="title">Spettacoli</h1>
  <div id="spettacoli">
<?php
  while($row = $result->fetch_assoc()) {
?>
  <figure id="spettacolo">
    <img src="img/<?php echo $row['locandina']; ?>.png" alt="<?php echo $row['titolo']; ?>">
    <figcaption>
      <h2 id="titolo-spettacolo"><?php echo $row['titolo']; ?></h2>
      <a id="link-spettacolo" href="scheda.php?spettacolo=<?php echo $row['ID']; ?>">Scheda</a>
    </figcaption>
  </figure>
<?php
  }

  $db->close();
?>
</div>