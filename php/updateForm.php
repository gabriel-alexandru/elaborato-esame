<section id="updateForm">
  <form action="backend/updateUtente.php" method="post">
    <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $_SESSION['nomeUtente'] ?>"/>
    <input type="text" name="cognome" id="cognome" placeholder="Cognome" value="<?php echo $_SESSION['cognomeUtente'] ?>"/>
    <br />

    <input
      type="date"
      name="dataNascita"
      id="dataNascita"
      placeholder="Data di nascita"
      value="<?php echo $_SESSION['dataNascitaUtente'] ?>"
    />
    <input
      type="text"
      name="luogoNascita"
      id="luogoNascita"
      placeholder="Luogo di nascita"
      value="<?php echo $_SESSION['luogoNascitaUtente'] ?>"
    />
    <br />

    <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $_SESSION['emailUtente'] ?>"/>
    <input
      type="password"
      name="password"
      id="password"
      placeholder="Nuova Password"
    />
    <input
      type="password"
      name="confermaPassword"
      id="confermaPassword"
      placeholder="Conferma Nuova Password"
    />
    <input type="submit" id="button" value="Update" />
  </form>
</section>
