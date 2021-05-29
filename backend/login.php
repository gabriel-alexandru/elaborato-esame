<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['email'] == '') {
            header('Location: /elaborato-esame/login.php?messaggio=Campo email vuoto.');
        } else if($_POST['password'] == '') {
            header('Location: /elaborato-esame/login.php?messaggio=Campo password vuoto.');
        } else {
            $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');

            if($db->connect_error) {
                die('Errore durante la connessione al database');
            }

            $result = $db->query('SELECT * FROM utente WHERE email="' . $_POST['email'] . '" AND password="' . hash('ripemd160', $_POST['password']) . '"');

            if($result->num_rows == 0) {
                $result = $db->query('SELECT * FROM compagniaTeatrale WHERE email="' . $_POST['email'] . '" AND password="' . hash('ripemd160', $_POST['password']) . '"');

                if($result->num_rows == 0) {
                    header('Location: /elaborato-esame/login.php?messaggio=Credenziali errate.');
                } else  {
                    $row = $result->fetch_assoc();
                    $_SESSION['nomeCompagnia'] = $row['nome'];
                    $_SESSION['partitaIVA'] = $row['partitaIVA'];
                    $_SESSION['emailCompagnia'] = $row['email'];
                    header('Location: /elaborato-esame/areaRiservata.php');
                }
            } else {
                $row = $result->fetch_assoc();
                $_SESSION['nomeUtente'] = $row['nome'];
                $_SESSION['cognomeUtente'] = $row['cognome'];
                $_SESSION['dataNascitaUtente'] = $row['dataNascita'];
                $_SESSION['luogoNascitaUtente'] = $row['luogoNascita'];
                $_SESSION['emailUtente'] = $row['email'];
                $_SESSION['tipoUtente'] = $row['tipo'];
                header('Location: /elaborato-esame/areaRiservata.php');
            }

            $db->close();
        }
    }

?>