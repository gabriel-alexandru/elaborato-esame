<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registra Compagnia</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
      if(isset($_GET['messaggio'])) {
        echo '<script>alert("' . $_GET['messaggio'] . '");</script>';
      }
    }
    include('html/header.html');
    include('html/formCompagnia.html');
  ?>
</body>
</html>