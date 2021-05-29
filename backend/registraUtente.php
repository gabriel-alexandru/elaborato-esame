<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Gestione campi non compilati
        if($_POST['nome'] == '') {
            header('Location: /elaborato-esame/registrati.php?messaggio=Devi compilare il campo nome.');
        } else if($_POST['cognome'] == '') {
            header('Location: /elaborato-esame/registrati.php?messaggio=Devi compilare il campo cognome.');
        } else if($_POST['dataNascita'] == '') {
            header('Location: /elaborato-esame/registrati.php?messaggio=Devi compilare il campo data di nascita.');
        } else if($_POST['luogoNascita'] == '') {
            header('Location: /elaborato-esame/registrati.php?messaggio=Devi compilare il campo luogo di nascita.');
        } else if($_POST['email'] == '') {
            header('Location: /elaborato-esame/registrati.php?messaggio=Devi compilare il campo email.');
        } else if($_POST['password'] == '') {
            header('Location: /elaborato-esame/registrati.php?messaggio=Devi compilare il campo password.');
        } else if($_POST['confermaPassword'] == ''){
            header('Location: /elaborato-esame/registrati.php?messaggio=Devi compilare il campo password.');
        } else {
            // Gestione password diverse
            if($_POST['password'] != $_POST['confermaPassword']) {
                header('Location: /elaborato-esame/registrati.php?messaggio=I campi password non coincidono.');
            } else {
                $db = new mysqli('localhost', '', '', 'my_gabrielalexandru');

                if($db->connect_error) {
                    die('Errore di connessione al database');
                }

                $result = $db->query('INSERT INTO utente (ID, nome, cognome, dataNascita, luogoNascita, email, password, tipo)
                            VALUES (NULL, "' . $_POST['nome'] . '", "' . $_POST['cognome'] . '", "' . $_POST['dataNascita'] . '", "' . $_POST['luogoNascita'] . '", "' . $_POST['email'] . '", "' . hash('ripemd160', $_POST['password']) . '", "' . $_POST['tipoUtente'] . '");');
                if($result) {
                    $_SESSION['nomeUtente'] = $_POST['nome'];
                    $_SESSION['cognomeUtente'] = $_POST['cognome'];
                    $_SESSION['dataNascitaUtente'] = $_POST['dataNascita'];
                    $_SESSION['luogoNascitaUtente'] = $_POST['luogoNascita'];
                    $_SESSION['emailUtente'] = $_POST['email'];
                    $_SESSION['tipoUtente'] = 'utente';
                    header('Location: /elaborato-esame/index.php?messaggio=Registrazione avvenuta con successo.');
                } else {
                    header('Location: /elaborato-esame/registrati.php?messaggio=Utente già presente.');
                }

                $db->close();
            }
        }
    }
?>