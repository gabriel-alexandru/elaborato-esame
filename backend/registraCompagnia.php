<?php

  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['nome'] == '') {
      header('Location: /elaborato-esame/registraCompagnia.php?messaggio=Devi compilare il campo nome compagnia.');
    } else if($_POST['partitaIVA'] == '') {
      header('Location: /elaborato-esame/registraCompagnia.php?messaggio=Devi compilare il campo partita IVA.');
    } else if($_POST['email'] == '') {
      header('Location: /elaborato-esame/registraCompagnia.php?messaggio=Devi compilare il campo email.');
    } else if($_POST['password'] == '') {
      header('Location: /elaborato-esame/registraCompagnia.php?messaggio=Devi compilare il campo passowrd.');
    } else if($_POST['confermaPassword'] == '') {
      header('Location: /elaborato-esame/registraCompagnia.php?messaggio=Devi compilare il campo password.');
    } else {
      // Gestione password diverse
      if($_POST['password'] != $_POST['confermaPassword']) {
          header('Location: /elaborato-esame/registraCompagnia.php?messaggio=I campi password non coincidono.');
      } else {
        $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');

        if($db->connect_error) {
          die('Errore di connessione al database');
        }

        $result = $db->query('INSERT INTO compagniaTeatrale (ID, nome, partitaIVA, email, password)
                    VALUES (NULL, "' . $_POST['nome'] . '", "' . $_POST['partitaIVA'] . '", "' . $_POST['email'] . '", "' . hash('ripemd160', $_POST['password']) . '");');
        if($result) {
          $_SESSION['nomeCompagnia'] = $_POST['nome'];
          $_SESSION['emailCompagnia'] = $_POST['email'];
          $_SESSION['partitaIVA'] = $_POST['partitaIVA'];
          header('Location: /elaborato-esame/index.php?messaggio=Registrazione avvenuta con successo.');
        } else {
          header('Location: /elaborato-esame/registrati.php?messaggio=Compagnia già presente.');
        }

        $db->close();
      }
    }
  }

?>